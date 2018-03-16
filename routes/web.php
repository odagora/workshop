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
		//CRUD makes routes
		Route::resource('makes', 'MakeController');
		//CRUD types routes
		Route::resource('types', 'TypeController');
	});
	
	//CRUD documents routes
	Route::resource('qdocs', 'QdocsController');
	Route::resource('edocs', 'EdocsController');
	Route::resource('idocs', 'IdocsController');
	Route::resource('cdocs', 'CdocsController');
	Route::resource('otdocs', 'OTdocsController');

	//CRUD added method to cancel docs
	Route::get('qdocs/{qdoc}/cancel', array('as'=>'qdocs.cancel', 'uses'=>'QdocsController@cancel'));
	Route::get('edocs/{edoc}/cancel', array('as'=>'edocs.cancel', 'uses'=>'EdocsController@cancel'));
	Route::get('idocs/{idoc}/cancel', array('as'=>'idocs.cancel', 'uses'=>'IdocsController@cancel'));
	Route::get('cdocs/{cdoc}/cancel', array('as'=>'cdocs.cancel', 'uses'=>'CdocsController@cancel'));
	Route::get('otdocs/{otdoc}/cancel', array('as'=>'otdocs.cancel', 'uses'=>'OTdocsController@cancel'));

	//Jquery & Ajax routes for dropdown dependent in forms
	Route::get('qdocs/create', array('as'=>'qdocs.create', 'uses'=>'DropDownController@makes'));
	Route::get('edocs/create', array('as'=>'edocs.create', 'uses'=>'DropDownController@makes'));
	Route::get('idocs/create', array('as'=>'idocs.create', 'uses'=>'DropDownController@makes'));
	Route::get('cdocs/create', array('as'=>'cdocs.create', 'uses'=>'DropDownController@makes'));
	Route::get('types/{id}', 'DropDownController@types');

	//Data passing to resource create pages
	Route::get('qdocs/create', array('as'=>'qdocs.create', 'uses'=>'QdocsController@create'));
	Route::get('edocs/create', array('as'=>'edocs.create', 'uses'=>'EdocsController@create'));
	Route::get('idocs/create', array('as'=>'idocs.create', 'uses'=>'IdocsController@create'));
	Route::get('cdocs/create', array('as'=>'cdocs.create', 'uses'=>'CdocsController@create'));

	//Snappy pdfcreator routes
	Route::get('qdocs/{qdoc}/pdf', array('as'=>'qdocs.pdf', 'uses'=>'QdocsPdfController@getQdocsPdf'));
	Route::get('edocs/{edoc}/pdf', array('as'=>'edocs.pdf', 'uses'=>'EdocsPdfController@getEdocsPdf'));
	Route::get('idocs/{idoc}/pdf', array('as'=>'idocs.pdf', 'uses'=>'IdocsPdfController@getIdocsPdf'));
	Route::get('cdocs/{cdoc}/pdf', array('as'=>'cdocs.pdf', 'uses'=>'CdocsPdfController@getCdocsPdf'));

	//CRUD Mail route
	Route::get('qdocs/{qdoc}/mail', array('as'=>'qdocs.mail','uses'=>'QdocsSendMailController@qdocSendMail'));
	Route::get('edocs/{edoc}/mail', array('as'=>'edocs.mail','uses'=>'EdocsSendMailController@edocSendMail'));
	Route::get('idocs/{idoc}/mail', array('as'=>'idocs.mail','uses'=>'IdocsSendMailController@idocSendMail'));
	Route::get('cdocs/{cdoc}/mail', array('as'=>'cdocs.mail','uses'=>'CdocsSendMailController@cdocSendMail'));

	//CRUD photo routes
	Route::resource('cdocs.photo', 'CdocsPhotoController', array('only' => ['index', 'create' , 'show', 'destroy']));
	Route::post('/cdocs/upload/images/{doc}', [
	  'uses'   =>  'CdocsImageUploadController@uploadImages',
	  'as'     =>  'cdocUploadImage'
	]);
	Route::resource('otdocs.photo', 'OTPhotoController', array('only' => ['index', 'create' , 'show', 'destroy']));
	Route::post('/otdocs/upload/images/{doc}', [
	  'uses'   =>  'OTdocsImageUploadController@otdocuploadImages',
	  'as'     =>  'otdocUploadImage'
	]);
	Route::resource('otdocs.dtc', 'OTDtcController', array('only' => ['index', 'create' , 'show', 'destroy']));
	Route::post('/otdocs/upload/dtc/{doc}', [
	  'uses'   =>  'OTdocsDTCUploadController@uploadDTCImages',
	  'as'     =>  'UploadDTCImage'
	]);


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



