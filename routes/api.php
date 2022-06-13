<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PengumumanApiController;
use App\Http\Controllers\api\LoginController;
// use App\Http\Controllers\AuthController;

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

Route::get('/pengumuman', 'PengumumanApiController@index');
// Route::get('auth/index' [AuthController::class, 'index']);
Route::get('auth/index', [LoginController::class, 'index']);
Route::post('auth/login', [LoginController::class, 'login']);
