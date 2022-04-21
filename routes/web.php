<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;

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
Route::get('/register',[RegisterController::class,'index'])->name ('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('/users/{user:username}/posts',[UserPostController::class,'index'])->name('users.posts');

Route::get('/post',[PostController::class,'index'])->name('posts');
Route::post('/post',[PostController::class,'store']);
Route::get('/post/{post}',[PostController::class,'show'])->name('posts.show');
Route::delete('/post/{post}',[PostController::class,'destroy'])->name('posts.destroy');

Route::post('/post/{post}/likes',[PostLikeController::class,'store'])->name('posts.likes');
Route::delete('/post/{post}/likes',[PostLikeController::class,'destroy'])->name('posts.likes');

Route::get('/',function(){
    return view('home');
})->name('home');
