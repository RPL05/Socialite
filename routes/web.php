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

Route::get('login/github', 'GithubController@redirectToProvider');
Route::get('login/github/callback', 'GithubController@handleProviderCallback');

Route::get('login/google', 'GoogleController@redirectToGoogle');
Route::get('login/google/callback', 'GoogleController@handleGoogleCallback');

Route::get('login/facebook', 'FacebookController@redirectToProvider');
Route::get('login/facebook/callback', 'FacebookController@handleProviderCallback');

Route::get('login/twitter', 'TwitterController@redirectToProvider');
Route::get('login/twitter/callback', 'TwitterController@handleProviderCallback');
