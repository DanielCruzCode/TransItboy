<?php

Route::get('/', function ()
{
	return view('home');
});

// BOOKS ROUTES
// Route::resource('/books','BookController')->middleware('auth');
// END BOOKS ROUTES

// CAR REGISTRATION ROUTES
Route::resource('/car-registration','CarRegistrationController')->middleware('auth');

Route::post('/import-car-registration-excel','CarRegistrationController@importExcel')->name('import.car-registration.excel');
Route::post('/import-car-registration-json','CarRegistrationController@importJson')->name('import.car-registration.json');

Route::get('/export-car-registration-pdf','CarRegistrationController@exportPdf')->name('export.car-registration.pdf');
Route::get('/export-car-registration-excel','CarRegistrationController@exportExcel')->name('export.car-registration.excel');

// END CAR REGISTRATION ROUTES

// AUTH ROUTES
Auth::routes();
// END AUTH ROUTES

// HOME ROUTES
Route::get('/home', 'HomeController@index')->name('home.index');
// END HOME ROUTES
