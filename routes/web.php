<?php

use Illuminate\Support\Facades\Route;
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

Route::post('/signUp', [
    UserController::class, 
    'postSignUp'
    ///'uses' => 'UserController@postSignUp',
    ///'as' => 'signup'
])->name('signUp');

Route::post('/signIn', [
    UserController::class, 
    'postSignIn'
    ///'uses' => 'UserController@postSignUp',
    ///'as' => 'signup'
])->name('signIn');

Route::get('/dashboard',[
    UserController::class,
    'getDashboard'
])->name('dashboard');
