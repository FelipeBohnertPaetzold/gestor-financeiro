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

    Route::group(['prefix' => 'users'], function () {
        Route::get('/temas', 'TemaController@trocarTemaView');
        Route::post('/temas/atualizar', 'TemaController@update');
    });

    Route::group(['prefix' => 'contas'], function () {
        Route::get('/', 'ContaController@listaTodasView');
        Route::get('/nova', 'ContaController@criaNovaView');
        Route::get('/editar/{id}', 'ContaController@editarView');
        Route::get('/deletar/{id}', 'ContaController@deletarView');
        Route::get('/destroy/{id}', 'ContaController@destroy');
        Route::get('/{id}', 'ContaController@detalhes');
        Route::post('/criar', 'ContaController@store');
        Route::post('/update', 'ContaController@update');
    });

    Route::group(['prefix' => 'despesas'], function () {
        Route::get('/', 'DespesaController@listaTodasView');
        Route::get('/nova', 'DespesaController@criaNovaView');
        Route::get('/{id}', 'DespesaController@detalhes');
        Route::get('/deletar/{id}', 'DespesaController@deletarView');
        Route::get('/destroy/{id}', 'DespesaController@destroy');
        Route::post('/criar', 'DespesaController@store');
        Route::post('/filtro/data', 'DespesaController@filtroData');
    });

    Route::group(['prefix' => 'depositos'], function () {
        Route::get('/', 'DepositoController@listaTodosView');
        Route::get('/novo/{conta_id}', 'DepositoController@criarNovoView');
        Route::get('/{id}', 'DepositoController@detalhes');
        Route::post('/criar', 'DepositoController@store');
    });

    Route::group(['prefix' => 'pagamentos'], function () {
        Route::get('/pagar/{despesaId}', 'PagamentoController@pagarView');
        Route::post('/criar', 'PagamentoController@store');
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

Route::get('/despesas/debito/automatico', 'DespesaController@debitoAutomatico');