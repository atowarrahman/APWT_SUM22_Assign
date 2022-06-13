<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;

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



Route::get('/registration', [pageController::class, 'registration'])->name('register');
Route::post('/registration', [pageController::class, 'createSubmit'])->name('register');
Route::get('/login', [pageController::class, 'login'])->name('login');

Route::post('/login', [pageController::class, 'loginAuth'])->name('login');