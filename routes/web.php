<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', function () {
    return view('home');
});

Route::middleware(['auth:web'])->group(function () {
    Route::get('/user/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/user/profile', [UserController::class, 'update'])->name('profile.update');
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/product/add', [ProductController::class, 'create']);
    Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
    Route::get('/product/{id}/delete', [ProductController::class, 'destroy']);

    Route::post('/product', [ProductController::class, 'store']);
    Route::put('/product/{id}', [ProductController::class, 'update']);

    Route::get('/cart', [CartController::class, 'index']);
    Route::get('/cart/add/{id}', [CartController::class, 'store']);
    Route::get('/cart/delete/{id}',[CartController::class, 'destroy']);
});

Route::get('/auth/register', [AuthController::class, "register"])->name('register');
Route::get('/auth/login', [AuthController::class, "login"])->name('login');
Route::get('/logout', [AuthController::class, "logout"])->name('logout');

Route::post('/auth/register', [AuthController::class, "doRegister"])->name('do.register');
Route::post('/auth/login', [AuthController::class, "doLogin"])->name('do.login');

// Route::get('/', [ProductController::class, 'index']);
// Route::get('/product/add', [ProductController::class, 'create']);
// Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
// Route::get('/product/{id}/delete', [ProductController::class, 'destroy']);

// Route::post('/product', [ProductController::class, 'store']);
// Route::put('/product/{id}', [ProductController::class, 'update']);

// Route::get('/cart', [CartController::class, 'index']);
// Route::get('/cart/add/{id}', [CartController::class, 'store']);
// Route::get('/cart/delete/{id}',[CartController::class, 'destroy']);

