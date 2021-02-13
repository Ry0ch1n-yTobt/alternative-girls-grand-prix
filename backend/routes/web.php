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

Route::get('/', 'App\Http\Controllers\TopController@index');

Route::get('/search', 'App\Http\Controllers\SearchController@index');

Route::get('/ajax/search', 'App\Http\Controllers\SearchController@search');

Route::get('/detail/{albumNo}', 'App\Http\Controllers\DetailController@index');
