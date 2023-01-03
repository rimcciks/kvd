<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\CustomAuthController;
use App\HTTP\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [CustomAuthController::class,'login'])->middleware('alreadyLoggedIn');
Route::get('/registration', [CustomAuthController::class,'registration'])->middleware('alreadyLoggedIn');
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/Profile', [CustomAuthController::class, 'Profile'])->middleware('isLoggedIn');
Route::get('/logout', [CustomAuthController::class,'logout']);
//Route::get('/post', [CustomAuthController::class, 'post'])->name('post')->middleware('isLoggedIn');
Route::get('/add-post', [CustomAuthController::class, 'addPost'])->name('add-post')->middleware('isLoggedIn');
Route::get('/editProfile', [UserController::class,'editProfile'])->middleware('alreadyLoggedIn');
Route::post('/update-user', [UserController::class,'updateUser'])->name('update-user');

Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::put('/post/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::DELETE('/post/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
Route::get('/post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');

Route::post('comments', [App\Http\Controllers\Frontend\CommentController::class, 'store']);
Route::post('/delete-comment', [App\Http\Controllers\Frontend\CommentController::class, 'destroy']);

//Route::resource('/post', 'App\Http\Controllers\PostController');
