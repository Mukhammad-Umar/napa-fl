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

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return success_response($request->user());
    });


});


Route::post('login', 'ApiAuthController@login');


/*Route::get('latest-projects', function () {
    return error_response([]);
});

Route::get('latest-orders', function () {
    return success_response([]);
});*/


