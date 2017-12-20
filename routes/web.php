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

Route::prefix('app')->group(function(){
	//Pages routes
	Route::get('index', array('as' => 'index', 'uses' => 'PagesController@getIndex'));
	Route::get('admin', array('as' => 'admin', 'uses' => 'PagesController@getAdmin'));

	Route::prefix('admin')->group(function(){
		//CRUD users routes
		Route::resource('users', 'UserController', array('only' => ['index', 'edit', 'update', 'destroy']));
	});
	
	//CRUD documents routes
	Route::resource('qdocs', 'QdocsController');

	//CRUD added method to cancel docs
	Route::get('qdocs/{qdoc}/cancel', array('as'=>'qdocs.cancel', 'uses'=>'QdocsController@cancel'));

	//Jquery & Ajax routes for dropdown dependent in forms
	Route::get('qdocs/create', array('as'=>'qdocs.create', 'uses'=>'DropDownController@makes'));
	Route::get('types/{id}', 'DropDownController@types');

	//Data passing to qdocs.create page
	Route::get('qdocs/create', array('as'=>'qdocs.create', 'uses'=>'QdocsController@create'));

	//Snappy pdfcreator route
	Route::get('qdocs/{qdoc}/pdf', array('as'=>'qdocs.pdf', 'uses'=>'PdfController@getQdocsPdf'));

	//CRUD Mail route
	Route::get('qdocs/{qdoc}/mail', array('as'=>'qdocs.mail','uses'=>'SendMailController@qdocSendMail'));

	Route::get('/', function () {
	    return view('auth.login');

	})->name('root');

	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');
});

//Redirects for login and logout
Route::get('/', function () {
	return redirect()->route('root');
});

Route::get('/home', function () {
	return redirect()->route('home');
});



