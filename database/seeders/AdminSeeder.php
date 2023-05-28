<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('TechSwivel#001');
        $user = User::create([
            'name' => 'TechSwivel QA',
            'email' => 'qa@techswivel.com',
            'password' => $password,
        ]);
        if ($user){
            // $user->assignRole('Admin');
        }
    }
}
