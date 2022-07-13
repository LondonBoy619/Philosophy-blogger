<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Quote;
use Illuminate\Http\Request;
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

Route::get('/', [PostController::class, 'index']);

Route::get('showpost', [PostController::class, 'showPost']);

Route::get('createpost', [PostController::class, 'createPost']);

Route::get('deletepost', [PostController::class, 'deletePost']);