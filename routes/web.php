<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
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

Route::get('/', [authController::class, 'account']);
Route::get('/signup', [authController::class, 'signup']);
Route::post('/checklogin', [authController::class, 'checkLogin']);
Route::post('/checksignup', [authController::class, 'checkSignup']);
Route::get('/home', [authController::class, 'successLogin']);
Route::get('/home/logout', [authController::class, 'logout']);
