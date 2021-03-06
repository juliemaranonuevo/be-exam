<?php

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

// Auth::routes();

//LOGIN and LOGOUT
Route::get('/login', 'AuthController@index')->name('login');
Route::post('/login', 'AuthController@store');
Route::post('/logout', 'AuthController@destroy')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/{any}', function () {
        return view('home');
    })->where('any', '.*');
});