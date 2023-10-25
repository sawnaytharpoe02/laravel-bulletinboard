<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;

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

// Posts
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts/{postId}/detail', [PostController::class, 'show']);
Route::get('/posts/{postId}/edit', [PostController::class, 'edit']);

// User Registration
Route::get('/register', [UserController::class, 'create']);
Route::post('/post-register', [UserController::class, 'store']);

// User Login
Route::get('/login', [UserController::class, 'login']);
Route::post('/post-login', [UserController::class, 'authenticate']);

// User Logout
Route::post('logout', [UserController::class, 'logout']);

// Forgot Password
Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password.get');
Route::post('forgot-password', [ForgotPasswordController::class, 'submitForgotPasswordForm'])->name('forgot.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// File Uploading
Route::post('/tmp-upload', [UserController::class, 'tmpUpload']);
Route::delete('/tmp-delete', [UserController::class, 'tmpDelete']);
