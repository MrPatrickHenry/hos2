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
    return view('home');
});


Route::get('/entries', function () {
    return view('entries');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::POST('/vlog/entry','VlogController@create');
Route::get('/vlog/entry','VlogController@index');