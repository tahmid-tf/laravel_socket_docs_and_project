<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// --------------------------- Live Data from model -----------------------------------------

Route::view("/users", "users.showAll")->name('users.all');

// --------------------------- Live Data from model -----------------------------------------


// ------------------------------------ Game ------------------------------------------------

Route::view('/game', 'game.show')->name('game.show');

// ------------------------------------ Game ------------------------------------------------


// ------------------------------------ Chat room ------------------------------------------------

Route::get('/chat', "ChatController@showChat")->name('chat.show');
Route::post('/chat/message', "ChatController@sendMessage")->name('chat.message');
Route::post('/chat/greet/{user}', "ChatController@greetReceived")->name('chat.greet');

// ------------------------------------ Chat room ------------------------------------------------
