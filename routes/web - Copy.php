<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
// Home
Route::get('/', 'HomeController')->name('home');
Route::get('language/{lang}', 'LanguageController')
    ->where('lang', implode('|', config('app.languages')));

// Authentication 
Auth::routes();

// Admin
Route::get('admin', 'AdminController')->name('admin');

// Contact
Route::resource('contact', 'ContactController', ['except' => ['show', 'edit']]);

// Email confirmation 
Route::get('resend', 'Auth\RegisterController@resend');
Route::get('confirm/{token}', 'Auth\RegisterController@confirm');

//Route::get('/home', 'HomeController@index');
Route::get('/logout', function () {
    auth::logout();
});
// Blog 
Route::get('blog/tag', 'BlogFrontController@tag');
Route::get('blog/search', 'BlogFrontController@search');
Route::get('articles', 'BlogFrontController@index');
Route::get('blog/order', 'BlogController@indexOrder')->name('blog.order');
Route::resource('blog', 'BlogController', ['except' => 'show']);
Route::put('postseen/{id}', 'BlogAjaxController@updateSeen');
Route::put('postactive/{id}', 'BlogAjaxController@updateActive');
Route::get('blog/{blog}', 'BlogFrontController@show')->name('blog.show');