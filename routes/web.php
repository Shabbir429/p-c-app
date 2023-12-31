<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth/login');
});

Auth::routes();


Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/addnew', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dilemma', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/argument', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

