<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//localhost:8000/api/login
Route::post('login', [AuthController::class, 'authenticate']);
Route::post('register', [AuthController::class, 'register']);

//body token
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('get_user', [UserController::class, 'get_user']);
    Route::post('/refresh', [AuthController::class, 'refresh']); 
  
});

Route::group(['middleware' => ['jwt.refresh']], function() {
   
});