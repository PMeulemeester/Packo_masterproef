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


$languages = array('nl','fr','en');
$locale = Request::segment(1);
if(in_array($locale, $languages)){
	\App::setLocale($locale);
}else{
	$locale=null;//substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	if(in_array($locale, $languages)){
		App::setLocale($locale);
	}
}

//View::share("talen",\App\Talen::geefTalen());
//View::share("rollen",\App\Roles::geefRoles());
Route::group(array('prefix'=>$locale),function() {
	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);
	Route::get('upload',['as'=>'upload','uses'=>'UploadController@upload']);
	Route::any('file-upload',['as'=>'file-upload','uses'=>'UploadController@file_upload']);
});
Route::group(array('prefix'=>$locale,'middleware'=>'auth'),function() {
	Route::get('/', 'HomeController@index');
	Route::controller('register','Register\RegisterController');
	Route::controller('admin','Admin\AdminController');
	Route::get('admin/user/{id}/{tankid}','Admin\AdminController@getUser');
	Route::get('admin/tank/{id}','Admin\AdminController@getTanks');
	Route::get('home',['as'=>'home','uses'=>'HomeController@index']);
	Route::get('tankdetail/{id}','HomeController@getTankdetail');
	Route::get('post',array('as'=>'post','uses'=>'OculusViewerController@getData'));
	Route::get('post_timer',array('as'=>'post_timer','uses'=>'OculusViewerController@getTimerData'));
});
Route::get('/', 'HomeController@lang');

