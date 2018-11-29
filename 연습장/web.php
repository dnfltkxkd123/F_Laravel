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

 

Route::get('/', function () {

    return view('welcome');

});

 

Route::get('test/{name?}', function($name="홍길동"){

	return $name . ' 님, Test입니다.';

});

 

Route::get('json', function() {

	$data = ['name'=>'Iron Man', 'gender'=>'Man'];

	return response()->json($data);

});

 

Route::get('hello', function(){	

	return View::make('hello.html');

});

 

Route::get('bbs', 'BBSController@index');

 

Route::get('view', 'BBSController@show');

 

Route::get('modify', 'BBSController@edit');

 

Route::post('modify','BBSController@update');

 

Route::get('write','BBSController@create');

 

Route::post('write', 'BBSController@store');

 

Route::post('delete', 'BBSController@destroy');

 

Route::get('template', function(){

	return view('layouts.template');

});
