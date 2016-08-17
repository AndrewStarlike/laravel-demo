<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', ['as' => 'index', 'uses' => 'VirusController@index']);

Route::get('/create', ['middleware' => 'auth', 'as' => 'create', 'uses' => 'VirusController@create']);

Route::post('/store', ['middleware' => 'auth', 'as' => 'store', 'uses' => 'VirusController@store']);

Route::get('/edit/{id}', ['middleware' => 'auth', 'as' => 'edit', 'uses' => 'VirusController@edit']);

Route::post('/update/{id}', ['middleware' => 'auth', 'as' => 'update', 'uses' => 'VirusController@update']);

Route::get('/description/{id}', ['as' => 'description', 'uses' => 'VirusController@description']);

Route::post('/rating/{id}', ['as' => 'rating', 'uses' => 'VirusController@rating']);

Route::auth();