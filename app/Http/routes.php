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

Route::get('/contact', function () {
    return view('Tickets.create');
});

Route::get('/ticket', 'TicketsController@create');
Route::post('/ticket', 'TicketsController@store');
Route::get('/contacts', 'TicketsController@index');
Route::get('/ticket/{id?}', 'TicketsController@show');
Route::get('/ticket/{id?}/edit','TicketsController@edit');
Route::post('/ticket/{id?}/edit','TicketsController@update');
Route::post('/ticket/{id?}/delete','TicketsController@destroy');

Route::get('/', 'ContactController@create');