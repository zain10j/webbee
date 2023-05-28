<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use stdClass;

class FirebaseService
{
    public $factory;

//   Library :  composer require kreait/firebase-php
    public function __construct()
    {
        $this->factory = (new Factory())
            ->withServiceAccount(config('firebase.credentials.file'));
        $this->auth = $this->factory->createAuth();
    }

    public function getRemoteConfigValue($name)
    {
        $remoteConfig = $this->factory->createRemoteConfig()->get();
        $config = json_decode(json_encode($remoteConfig->jsonSerialize()['parameters'][$name], true));
        return $config->defaultValue->value;
    }

    public function createUserAccount(array $data)
    {
        $addUser = array(
            'email' => $data['email'],
            'password' => $data['password']
        );
        try {
            $createdUser = $this->auth->createUser($addUser);
            $createdUser->data = $createdUser;
            $createdUser->status = true;
        } catch (Firebase\Exception\FirebaseException $e) {
            $createdUser = new stdClass();
            $createdUser->message = $e->getMessage();
            $createdUser->status = false;
        }
        return $createdUser;
    }

    /**
     * @param $uid
     * @param $password
     * @throws Firebase\Exception\AuthException
     * @throws Firebase\Exception\FirebaseException
     */
    public function updateUserPassword($uid, $password)
    {
        $this->factory->changeUserPassword($uid, $password);
    }

    public function getToken(string $uid): string
    {
        return (string)$this->auth->createCustomToken($uid);
    }
    public function deleteFirebaseUser()
    {

        try {
            $users = $this->auth->listUsers();

            foreach ($users as $user) {
                /** @var \Kreait\Firebase\Auth\UserRecord $user */
                  $this->auth->deleteUser($user->uid);
            }

        }catch (Firebase\Exception\FirebaseException $e){
            return  false;

        }
    }
    public function deleteMultiFirebaseUser(string $uid)
    {

        try {
            return (string) $this->auth->deleteUser($uid);
        }catch (Firebase\Exception\FirebaseException $e){
            return  false;

        }
    }

//    TODO:cloudMessageToTopic
    public function cloudMessageToMultipleDevice($data)
    {
        $messaging = $this->factory->createMessaging();
        $title = $data['title'] ?? null;
        $body = $data['body'] ?? null;
        $imageUrl = $data['imageUrl'] ?? null;
        $notification = Notification::create($title, $body, $imageUrl);
        try {
            $message = CloudMessage::new();
            $message->withNotification($notification)
                ->withData($data['data']);
            $messaging->sendMulticast($message, $data['FCMRegistrationTokens']);
        } catch (Firebase\Exception\FirebaseException $e) {
            if (env('FIREBASE_LOGGER') == false) {
                return false;
            }
            $data = [
                'Time' => gmdate("F j, Y, g:i a"),
                'Status Code' => $e->getCode(),
                'Message' => $e->getMessage(),
            ];
            Log::error('Firebase' . $data);
            return false;
        }
    }

    public function cloudMessageToSingleDevice($data)
    {
        $messaging = $this->factory->createMessaging();
        $title = $data['title'] ?? null;
        $body = $data['body'] ?? null;
        $imageUrl = $data['imageUrl'] ?? null;
        $notification = Notification::create($title, $body, $imageUrl);
        try {
            $message = CloudMessage::withTarget('token', $data['FCMRegistrationToken'])
                ->withNotification($notification)
                ->withData($data['data']);
            $message = $messaging->send($message);
            Log::info('Firebase Notification', ['messageId' => $message, 'token' => $data['FCMRegistrationToken'], 'data' => $data['data']]);
        } catch (Firebase\Exception\FirebaseException $e) {
            if (env('FIREBASE_LOGGER') == false) {
                return false;
            }
            $data = [
                'Time' => gmdate("F j, Y, g:i a"),
                'Status Code' => $e->getCode(),
                'Message' => $e->getMessage(),
            ];
            Log::error('Firebase', $data);
            return false;
        }
    }
}
