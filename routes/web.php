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

Route::get('/',  'HomeController@index');

Route::get('/login',  'HomeController@login')->name('login');

Route::post('/do_login',  'HomeController@do_login');

Route::get('/logout',  'HomeController@do_logout');

Route::get('/menus/list',  'MenusController@listView');

Route::get('/menu/edit/{id}',  'MenusController@editView');

Route::post('/menu/do_edit/{id}',  'MenusController@doEdit');