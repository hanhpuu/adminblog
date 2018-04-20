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
//for frontend
Route::get('/',function () {
    return view('frontend.home.index');
})->name('home');

Route::get('/categories',function () {
    return view('frontend.categories.index');})->name('frontend.cat');
Route::get('categories/{categories}','CategoryController@showFrontend')->name('frontend.cat.show');

Route::get('/tags',function () {
    return view('frontend.tags.index');})->name('frontend.tags');
Route::get('tags/{tags}','TagController@showFrontend')->name('frontend.tags.show');

Route::get('/posts',function () {
    return view('frontend.posts.index'); })->name('frontend.posts');
Route::get('posts/{posts}','PostsController@showFrontend')->name('frontend.posts.show');

Route::post('comments','CommentsController@storeFrontend')->name('frontend.comments.store');

Auth::routes();

//for dashboard
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['prefix' => 'dashboard'], function() {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::match(['get', 'post'], '/search', 'PostsController@search')->name('post.search');
    Route::resource('posts','PostsController');
    Route::resource('comments','CommentsController', ['except'=>['index', 'create', 'show']]);
    Route::resource('tags','TagController',['except'=>['create']]);
    Route::resource('categories','CategoryController',['except'=>['create']]);
    Route::get('/profile','UserController@profile')->name('profile');
    Route::post('/profile', 'UserController@update_avatar');
});

//only for admin
Route::group(['prefix' => 'admin', 'middleware' => 'access'], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});

Route::get('admin', function () {
    return view('admin_templatenew');
});


Route::get('/errors', function() {
    return view ('errors.403');}) ->name('errors') ;

Route::get('user/verify/{token}', 'UserController@verifyUser');

