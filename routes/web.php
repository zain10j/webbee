<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/fetchData', [App\Http\Controllers\HomeController::class, 'anyData'])->name('datatables.data');
Route::get('/getUsers', [App\Http\Controllers\HomeController::class, 'getUsers'])->name('listing');
Route::group( ['middleware' => 'auth' ], function(){
 /*============================Admin auth routes goes here========================== */
});


/*==============================================Artisan routes here============================================= */
Route::get('artisan-login', [App\Http\Controllers\ArtisanCommandController::class, 'configurationPassword'])->middleware('artisan_view');
Route::post('artisanlogin', [App\Http\Controllers\ArtisanCommandController::class, 'checkConfigurationPassword'])->name('artisanlogin');
Route::get('php_artisan_cmd', [App\Http\Controllers\ArtisanCommandController::class, 'runCommand'])->middleware('artisan_view');
Route::get('artisan', [App\Http\Controllers\ArtisanCommandController::class, 'indexArtisan'])->middleware(['artisan_view','artisan']);
Route::get('artisan-logout', [App\Http\Controllers\ArtisanCommandController::class, 'configurationLogout'])->name('artisanLogout')->middleware('artisan_view');

