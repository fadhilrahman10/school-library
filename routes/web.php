<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CreatorController;

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



Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('book', BookController::class)->except('show');

    Route::resource('creator', CreatorController::class);

    Route::get('/change-password/{id}', [ChangePasswordController::class, 'edit'])->name('reset-password');
    Route::put('/change-password/{user}', [ChangePasswordController::class, 'update'])->name('update-password');
});

Route::resource('user', UserController::class)->except('show', 'edit', 'update')->middleware(['auth', 'admin']);
