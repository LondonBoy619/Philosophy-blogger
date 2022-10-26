<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\NotVerified;
use GuzzleHttp\Middleware;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

// Post-related Routes

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/showpost', [PostController::class, 'show'])->name('showpost');

Route::get('/createpost', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('createpost');

Route::post('/createpost', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name('storepost');

Route::get('/editpost/{id}', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('editpost');

Route::put('/editpost', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('updatepost');

Route::delete('/deletepost', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('destroypost');




// User-related Routes

Route::get('/register', [UserController::class, 'create'])->middleware(['throttle:60,1', 'guest'])->name('register');

Route::post('/users', [UserController::class, 'store'])->middleware('throttle:10,1')->name('storeuser');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/login', [UserController::class, 'login'])->middleware(['throttle:50,1', 'guest'])->name('login');

Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');


//1

Route::get('/email/verify', [UserController::class, 'verifyNotice'])->middleware(['auth', NotVerified::class, 'throttle:6,1'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [UserController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', [UserController::class, 'resend'])->middleware(['auth', 'throttle:5,60'])->name('verification.send');

Route::get('/forgot-password', [UserController::class, 'passResetNotice'])->middleware('guest')->name('password.notice');

Route::post('/forgot-password', [UserController::class, 'sendPassResetLink'])->middleware(['guest', 'throttle:2,1'])->name('password.email');

Route::get('/forgot-password{token}', [UserController::class, 'resetPassNotice'])->middleware('throttle:10,1')->name('password.reset');

Route::post('/reset-password', [UserController::class, 'resetPassword'])->middleware('guest')->name('password.update');