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

Route::get('/messages', 'MessageController@index');
Route::get('/message/{message}', 'MessageController@show');
Route::post('/message', 'MessageController@store');
Route::get('messages/{message}/edit','MessageController@edit');
Route::patch('messages/{message}', 'MessageController@update');
Route::delete('/message/{message}', 'MessageController@destroy');

// Comments
Route::post('/messages/{message}/comments', 'CommentController@store');
Route::get('/message/{message}/comments', 'MessageController@show');
Route::delete('/comment/{comment}', 'CommentController@destroy');

Auth::routes();
Route::get('/home','HomeController@index');