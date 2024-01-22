<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::controller(AuthController::class)->group(function() {
  Route::get('/login', 'index')->name('login');
  Route::post('/postlogin', 'postLogin')->name('postLogin');
});

Route::controller(UserController::class)->group(function() {
  Route::post('/register', 'store')->name('register');
  Route::prefix('/user')->group(function() {
    Route::get('/dashboard', 'index')->name('dashboard');
  });
});

Route::controller(CategoriesController::class)->group(function () {
  Route::prefix('/categories')->group(function () {
  Route::post('/store', 'store')->name('categories.store');
  Route::post('/update/{categories}', 'update')->name('categories.update');
  Route::get('/show/{categories}', 'show')->name('categories.show');
  Route::delete('/delete/{categories}', 'destroy')->name('categories.delete');
  });
});

Route::controller(ProductController::class)->group(function () {
  Route::prefix('/products')->group(function () {
    Route::post('/store', 'store')->name('products.store');
    Route::post('/update/{products}', 'update')->name('products.update');
    Route::get('/show/{products}', 'show')->name('products.show');
    Route::delete('/delete/{products}', 'destroy')->name('products.delete');
  });
});
