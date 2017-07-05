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
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * ----------------------------------------------------------
 * USERS
 * ----------------------------------------------------------
 */

Route::get('/users', 'UserController@index');
Route::post('/users', 'UserController@store');
Route::get('/users/new', 'UserController@create');
Route::get('/users/{user}', 'UserController@show');

/*
 * ----------------------------------------------------------
 * NEWS
 * ----------------------------------------------------------
 */

Route::get('/news/create', 'NewsController@create');
Route::get('/news/{news}', 'NewsController@show');
Route::get('/news', 'NewsController@index');
Route::post('/news', 'NewsController@store');
