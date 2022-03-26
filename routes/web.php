<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CreatorController;
use App\Http\Controllers\UserController;
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

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('book', BookController::class)->except('show')->middleware('auth');

Route::resource('creator', CreatorController::class)->middleware('auth');

Route::resource('user', UserController::class)->except('show')->middleware('auth');
