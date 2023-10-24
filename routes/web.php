<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [PostController::class, 'index']);

Route::get('/register', [UserController::class, 'create']);
Route::post('/post-register', [UserController::class, 'store']);


Route::post('/tmp-upload', [UserController::class, 'tmpUpload']);
Route::delete('/tmp-delete', [UserController::class, 'tmpDelete']);
