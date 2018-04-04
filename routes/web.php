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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'access'], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});

Route::get('admin', function () {
    return view('admin_templatenew');
});

Route::resource('posts','PostsController');
Route::resource('comments','CommentsController', ['except'=>['index', 'create', 'show']]);

Route::get('/errors', function() {
    return view ('errors.403');
    
}) ->name('errors') ;

Route::match(['get', 'post'], '/search', 'PostsController@search')->name('post.search');


