<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AdminController;

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
Route::get('login', 'AuthController@login')->name('auth.login');
// Route::get('login', [ 'as' => 'login', 'uses' => 'AuthController@login'])->name('auth.login');
Route::get('login', 'AuthController@login')->name('auth.login');
Route::post('login', 'AuthController@postLogin')->name('auth.postLogin');
Route::get('register', 'AuthController@register')->name('auth.register');
Route::post('register', 'AuthController@postRegister')->name('auth.postRegister');
Route::get('logout', 'AuthController@logout')->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'GameController@index')->name('game.index');
    Route::get('get-word', 'GameController@getWord')->name('game.word');
    Route::post('check-answer', 'GameController@checkAnswer')->name('game.answer');
});

Route::get('admin', 'AdminController@index')->name('admin.index');
