<?php

use Illuminate\Support\Facades\Route;
$url = "App\Http\Controllers";

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
Route::get('product/{slug}', $url. "\ProductController@showProduct");
Route::get('tugas', $url. "\ProductController@index");
Route::get('edit/{slug}', $url . '\productController@edit');
Route::post('edit/update/{slug}', $url. '\productController@update');
Route::get('create', $url . '\ProductController@create');
Route::post('create/new', $url . '\ProductController@store');
Route::get('delete/{slug}', $url . '\ProductController@destroy');
 