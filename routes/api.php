<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
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

Route::group(['middleware' => 'web'], function () {
    // Route::auth();
    Route::get('/signin', [UserController::class,'checkLogin']);
    Route::get('/save',[ItemController::class,'save']);
    Route::post('/title',[ItemController::class,'storetital']);
    Route::get('/getlist',[ItemController::class,'getlist']);
});
