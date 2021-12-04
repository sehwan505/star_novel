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

Route::get('/boards', 'App\Http\Controllers\BoardController@index');
Route::post('/boards/link_star', 'App\Http\Controllers\BoardController@link_star');
Route::post('/boards','App\Http\Controllers\BoardController@store');
Route::get('/boards/{board}', 'App\Http\Controllers\BoardController@show');
Route::delete('/boards/{board}', 'App\Http\Controllers\BoardController@destroy');

Route::get('/', function () {
    return view('welcome');
});

Route::get('detail/{id}', function () {
    return view('welcome');
});

Route::get('write/', function () {
    return view('welcome');
});