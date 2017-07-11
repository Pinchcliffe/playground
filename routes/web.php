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
Route::get('/users/new', 'UserController@create');
Route::get('/users/{user}', 'UserController@show');
Route::get('/users/{user}/edit', 'UserController@edit');
Route::post('/users', 'UserController@store');
Route::put('/users/{user}', 'UserController@update');
Route::post('/users/{user}/delete', 'UserController@delete');

/*
 * ----------------------------------------------------------
 * NEWS
 * ----------------------------------------------------------
 */

Route::get('/news/create', 'NewsController@create');
Route::get('/news/{news}', 'NewsController@show');
Route::get('/news/{news}/edit', 'NewsController@edit');
Route::put('/news/{news}', 'NewsController@update');
Route::get('/news', 'NewsController@index');
Route::post('/news', 'NewsController@store');
Route::post('/news/{news}/delete', 'NewsController@delete');
Route::post('/news/{news}', 'CommentsController@store');

/*
 * ----------------------------------------------------------
 * COMMENTS
 * ----------------------------------------------------------
 */


/*
 * ----------------------------------------------------------
 * MESSAGES
 * ----------------------------------------------------------
 */

//Route::get('messages', 'MessagesController@index');
//Route::get('messages/new', 'MessagesController@create');
