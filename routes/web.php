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

Route::get('collision', 'PagesController@getCollision');
Route::get('inspection', 'PagesController@getInspection');
Route::get('expert', 'PagesController@getExpert');
Route::get('quality', 'PagesController@getQuality');
Route::get('confirm', 'PagesController@getConfirm');
Route::get('print', 'PagesController@getPrint');
Route::get('config', 'PagesController@getConfig');
Route::get('profile', 'PagesController@getProfile');
Route::get('search', 'PagesController@getSearch');
Route::get('index', 'PagesController@getIndex');
Route::get('login', 'PagesController@getLogin');

// Route::get('/', function () {
//     return view('welcome');
// });
