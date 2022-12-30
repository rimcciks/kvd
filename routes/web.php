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
Route::get('/post', [CustomAuthController::class, 'post'])->name('post')->middleware('isLoggedIn');
Route::get('/add-post', [CustomAuthController::class, 'addPost'])->name('add-post')->middleware('isLoggedIn');
Route::get('/editProfile', [UserController::class,'editProfile'])->middleware('alreadyLoggedIn');
Route::post('/update-user', [UserController::class,'updateUser'])->name('update-user');

Route::resource('/post', 'App\Http\Controllers\PostController');
