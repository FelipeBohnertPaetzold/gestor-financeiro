<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users'], function (){
        Route::get('/temas', 'TemaController@trocarTemaView');
        Route::post('/temas/atualizar', 'TemaController@update');
    });


    Route::get('/home', function () {
        return view('home.home');
    });
    Route::get('/', function () {
        return view('home.home');
    });
    Route::get('/logout', 'Auth\LoginController@logout');

    Route::get('/dashboard', function () {
        return view('home.home');
    });

});

Auth::routes();