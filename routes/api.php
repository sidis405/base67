<?php


Route::group(['middleware' => ['api', 'cors']], function () {
    Route::post('auth/login', 'Api\LoginController@login');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('me', 'Api\LoginController@me');
        Route::get('posts', 'PostsController@index');
    });
});
