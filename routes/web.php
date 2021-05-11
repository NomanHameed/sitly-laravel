<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {return view('welcome');});

Route::get('/webrole', 'HomeController@webrole')->name('webrole');
Route::post('/webrole', 'HomeController@addWebRole')->name('webrole-save');
Route::get('/profile', 'HomeController@profile')->name('profile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
