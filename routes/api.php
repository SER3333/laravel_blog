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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'post', 'prefix' => 'post'], function(){
    Route::group(['namespace' => 'liked', 'prefix' => 'liked'], function(){
        Route::get('/{post}/{user}', 'ShowController');
        Route::post('/{post}/{user}', 'StoreController');
    });
    Route::group(['namespace' => 'comment', 'prefix' => 'comment'], function(){
       Route::get('/{post}', 'ShowController');
       Route::post('/{post}/{user}', 'StoreController');
        
    });

});