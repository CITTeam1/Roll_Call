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



Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/message', 'Controller@message');

Route::get('/event/create/', 'EventController@create');
Route::post('/event/create/store', 'EventController@store');
Route::get('/event/edit/{id}', 'EventController@edit');
Route::patch('/event/edit/{id}/update', 'EventController@update');
Route::delete('/event/edit/{id}/delete', 'EventController@destroy');

Route::get('/event/view/past/', 'EventController@pastView');
Route::get('/event/view/past/search', 'EventController@pastSearch');

Route::get('/event/admit/{id}', 'AdmissionController@index');
Route::post('/event/admit/{eventid}/store', 'AdmissionController@store');
Route::get('/event/admit/{id}/view/', 'AdmissionController@view');
Route::get('/event/admit/{id}/export/', 'AdmissionController@export');
Route::post('/event/admit/{eventid}/student/find', 'AdmissionController@find');
Route::get('/event/admit/{id}/out', 'AdmissionController@out');
Route::post('/event/admit/{eventid}/update', 'AdmissionController@update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get( '/event/pointsPage', 'GuestController@pointsPage');
//Routing to point page -DB
