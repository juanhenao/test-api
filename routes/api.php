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

Route::middleware('auth:sanctum')->get('/user', function () {

});



Route::group([
    'prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'
], function(){

    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');

    Route::group(['middleware' => ['auth:sanctum']], function() {
        Route::get('hello', 'ApiController@hello');
        Route::get('howareyou', 'ApiController@howAreYou');
        Route::get('whattimeisit', 'ApiController@whatTimeIsIt');
        Route::get('in', 'ApiController@getCurrentTimeZone');
        Route::get('in/london', 'ApiController@getCurrentTimeInLondon');
        Route::post('in', 'ApiController@getTimeInSpecificTimeZone');
        Route::post('logout', 'AuthController@logout');
    });

});
