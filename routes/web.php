<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['uses' => 'Controller@homepage']);
Route::get('/cadastro', ['uses' => 'Controller@cadastrar']);

/**
 * Routes to Login Auth
 */
Route::get('/login', ['uses' => 'Controller@login']);
Route::post('/login', ['as' => 'user.login', 'uses' => 'DashboardController@auth']);
Route::get('/dashboard', ['as' => 'user.dashboard', 'uses' => 'DashboardController@index']);

/**
 * Routes to Dashboard User
 */

 Route::get('/user/create', ['as' => 'user.create', 'uses' => 'UsersController@create']);
 Route::get('/users', ['as' => 'user.index', 'uses' => 'UsersController@index']);
 Route::resource('user', 'UsersController');
 Route::resource('instituition', 'InstituitionsController');
 Route::get('groups/create', ['uses' => 'GroupsController@create']);
 Route::resource('groups', 'GroupsController');