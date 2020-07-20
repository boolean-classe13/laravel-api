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

Route::middleware('api_auth')->namespace('Api')->group(function() {
    Route::get('/movies', 'MovieController@index');
    Route::get('/movies/best', 'MovieController@best');
    Route::get('/movies/{movie}', 'MovieController@show');
    Route::post('/movies', 'MovieController@store');
    Route::put('/movies/{movie}', 'MovieController@update');
    Route::delete('/movies/{movie}', 'MovieController@destroy');
});
