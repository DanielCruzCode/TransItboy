<?php

Route::get('/', function ()
{
	return view('index');
});
Route::resource('books','BookController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
