<?php

use Illuminate\Http\Request;

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

//   post api
Route::post('/quote',[
    'uses' => 'quoteController@postQuote',
    'middleware' => 'authJWT'
]);
Route::get('/quote',[
    'uses' => 'quoteController@getQuote'
]);
Route::PUT('/quote/{id}',[
    'uses' => 'quoteController@putQuote',
    'middleware' => 'authJWT'
]);
Route::DELETE('/quote/{id}',[
    'uses' => 'quoteController@deleteQuote',
    'middleware' => 'authJWT'
]);
// -----------------
// user api
//------------------
Route::POST('/user',[
    'uses' => 'userController@signup'
]);
Route::POST('/user/signin',[
    'uses' => 'userController@signin'
]);
