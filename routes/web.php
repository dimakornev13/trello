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

Route::get('/', function () {
    return view('welcome');
});

Route::post('login', 'AuthController@login')->name('login');
Route::post('logout', 'AuthController@logout')->name('logout');
Route::post('refresh', 'AuthController@refresh');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{vue_capture?}', 'HomeController@index')->where('vue_capture', '[\/\w\.-]*');
