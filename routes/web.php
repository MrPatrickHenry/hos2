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
    return view('mainpage');
});

Route::get('/{state}', function () {
    return view('mainpage');
});

Route::get('/shopping/{shoppingfor}', function () {
    return view('shopping');
});

Route::post('/shopping/', function () {
    return view('shopping');
});