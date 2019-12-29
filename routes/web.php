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

use App\Http\Controllers\DashboardController;

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PostController@showCategories');
//Route::get('/users', 'PagesController@users');

Route::get('offers/{offer}/accept', 'OfferController@accept');

Route::resource('posts', 'PostController');
Route::get('posts/{post}/apply', 'PostController@applyShowForm');
Route::post('posts/{post}/apply', 'PostController@apply');
Route::get('posts/{post}/offers', 'PostController@showOffers');
Route::get('/', 'PostController@index');
Route::post('/search', 'PostController@search');

//Route::get('/dashboard', 'DashboardController@index');
//Route::get('/workboard', 'WorkBoardController@index');

Route::group(['prefix'=>'dashboard', 'middleware'=>'auth'], function(){

        Route::get('/', 'DashboardController@index');

});

Route::group(['prefix'=>'workboard', 'middleware'=>'auth'], function(){

    Route::get('/', 'WorkboardController@index');

});

Auth::routes();
Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@update_avatar');
Route::get('/profile', 'UserController@showprofile');

Route::get('/profile/doer', 'UserController@doer_profile');
Route::post('/profile/doer', 'UserController@doer_profile');
Route::get('/users', 'UserController@users');
Route::get('/users/{id}', 'UserController@show');

Route::get('/doer/create', 'UserController@create_doer');
Route::post('/doer/create', 'UserController@store_doer');
