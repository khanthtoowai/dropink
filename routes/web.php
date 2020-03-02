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

use App\Mail\NewUserWelcomeMail;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// stories
Route::get('/stories', 'StoryController@index')->name('stories.index');
Route::get('/stories/create', 'StoryController@create')->name('stories.create');
Route::post('/stories', 'StoryController@store')->name('stories.store');
Route::get('/stories/{story}', 'StoryController@show')->name('stories.show');

// profiles
Route::get('/profiles/{user}', 'ProfileController@show')->name('profiles.show');
Route::get('/profiles/{user}/edit', 'ProfileController@edit')->name('profiles.edit');
Route::patch('/profiles/{user}', 'ProfileController@update')->name('profiles.update');

// follow
Route::post('/follows/{user}', 'FollowController@store')->name('follows.store');


