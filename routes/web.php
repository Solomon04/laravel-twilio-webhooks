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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('/assign', 'HomeController@assign')->name('assign');

Route::get('/sms', function(){
   return "sms";
})->name('sms');

Route::get('/voice', function(){
    return "voice";
})->name('voice');