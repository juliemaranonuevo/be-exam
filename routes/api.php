<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/logout', 'API\AuthController@logout');

Route::group(['prefix'=>'v1'],function() { 
    Route::group(['prefix'=>'products'],function() {
        Route::get('/', 'API\ProductController@index');
        Route::post('/', 'API\ProductController@store');
        Route::get('/{product}/edit', 'API\ProductController@edit');
        Route::put('/{product}/edit', 'API\ProductController@update');
        Route::delete('/{product}', 'API\ProductController@destroy');
        
        Route::get('/search', 'API\ProductController@search');
        Route::get('/product-categories', 'API\ProductController@category');
        Route::get('/filtered-by', 'API\ProductController@filter');
    });
});
