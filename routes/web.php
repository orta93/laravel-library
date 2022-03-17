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

Route::get('/testing', function () {
    return 58;
});

Route::group(['prefix' => '/books'], function () {
    Route::get('/', 'BookController@index');
    Route::get('/create', 'BookController@create');
    Route::post('/store', 'BookController@store');
    Route::get('/{id}', 'BookController@show');
    Route::get('/{id}/edit', 'BookController@edit');
    Route::post('/{id}/update', 'BookController@update');
    Route::post('/{id}/delete', 'BookController@delete');

    //Route::get('/{id}/{version}', 'BookController@showVersion');
});

Route::group(['prefix' => '/authors'], function () {
    Route::get('/', 'AuthorController@index');
    Route::get('/create', 'AuthorController@create');
    Route::post('/store', 'AuthorController@store');
    Route::get('/{id}', 'AuthorController@show');
    Route::get('/{id}/edit', 'AuthorController@edit');
    Route::post('/{id}/update', 'AuthorController@update');
    Route::post('/{id}/delete', 'AuthorController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
