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
    Route::delete('/{id}/delete', 'AuthorController@delete');
});

Route::group(['prefix' => '/editorials'], function () {
    Route::get('/', 'EditorialController@index');
    Route::get('/create', 'EditorialController@create');
    Route::post('/store', 'EditorialController@store');
    Route::get('/{id}', 'EditorialController@show');
    Route::get('/{id}/edit', 'EditorialController@edit');
    Route::post('/{id}/update', 'EditorialController@update');
    Route::post('/{id}/restore', 'EditorialController@restore');
    Route::delete('/{id}/delete', 'EditorialController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
