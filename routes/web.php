<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterContoller;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('user')->group(function() {
Route::middleware(['guest'])->group( function () {
    // register routes
    Route::controller(RegisterContoller::class)->group(function () {
        Route::get('register' , 'show')->name('register');
            Route::post('user', 'store')->name('user.store');
        });
    });
    Route::controller(LoginController::class)->group(function() {
        Route::get('login', 'show')->name('login');
    });
});
Route::prefix('user')->group(function() {
    Route::middleware(['auth'])->group(function() {
        Route::controller(LoginController::class)->group(function() {
            Route::get('home', 'index')->name('home');
            Route::get('logout', 'destroy')->name('logout');
        });
});
});
