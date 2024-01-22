<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/forgot', function () {
    return view('auth.forgot');
})->name('forgot');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/postlogin', 'postLogin')->name('postLogin');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(UserController::class)->group(function () {
    Route::post('/register', 'store')->name('register');
    Route::prefix('/user')->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
})->middleware('auth');

Route::controller(DashboardController::class)->group(function () {
    Route::post('/admin/dashboard', 'index')->name('dashboard');
});

Route::resource('categories', CategoriesController::class);
