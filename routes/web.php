<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('products.home');
});

Route::resource('products', ProductController::class);

Route::post('/register', [ProductController::class, 'register'])->name('register');
Route::post('/login', [ProductController::class, 'login'])->name('login');
Route::post('/logout', [ProductController::class, 'logout'])->name('logout');


Route::get('/products.signup', [ProductController::class, 'signUpForm'])->name('products.signup');
Route::get('/products.login', [ProductController::class, 'loginForm'])->name('products.login');



