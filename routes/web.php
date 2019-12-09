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
Route::get('/', 'PostController@index');
Route::get('/', function () {
    return view ('posts');
});
Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
//Route::get('/users', 'PagesController@users');


Route::resource('posts', 'PostController');
Route::get('/', 'PostController@index');
Route::post('/search', 'PostController@search');

Route::get('/dashboard', 'DashboardController@index');
Route::get('/workboard', 'WorkBoardController@index');



Auth::routes();
Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@update_avatar');
Route::get('/profile/doer', 'UserController@doer_profile');
Route::post('/profile/doer', 'UserController@doer_profile');
Route::get('/users', 'UserController@users');
Route::get('/users/{id}', 'UserController@show');

Route::get('/doer/create', 'UserController@create_doer');
Route::post('/doer/create', 'UserController@store_doer');