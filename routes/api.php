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

Route::group(['middleware'=> ['api']], function () {

    //admin
    Route::post('admin/login', 'Admin@login');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::post('admin/testing', 'Admin@testing');
    });

    //citizen
    Route::post('citizen/register', 'Citizen@register');
    Route::post('citizen/login', 'Citizen@login');

});


