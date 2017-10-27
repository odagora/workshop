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

//Pages routes
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

//CRUD routes
Route::resource('qdocs', 'QdocsController');

Route::get('qdocs/create', array('as'=>'create', 'uses'=>'DropDownController@makes'));
Route::get('types/{id}', 'DropDownController@types');

//Jquery & Ajax routes for dropdown dependent in forms
// Route::get('qdocs/create', array('as'=>'create', 'uses'=>'DropDownController@myform'));
// Route::get('qdocs/create/ajax/{id}', array('as'=>'create.ajax', 'uses'=>'DropDownController@myformAjax'));



// Route::get('/', function () {
//     return view('welcome');
// });
