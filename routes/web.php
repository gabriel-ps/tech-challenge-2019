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

Route::resource('tickets', 'TicketController');

// Any other route will return the single page aplication html
Route::get('/{any}', 'SpaController@index')->where('any', '.*');
