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

/*Route::get('/', function () {
    return view('welcome');
}); */

if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}

header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');

Route::post('/send', 'EmailController@send');

Auth::routes();

Route::get('/', 'ArticleController@index')->name('accueil')->middleware('auth');
Route::get('logout', 'Auth\LoginController@logout');
Route::post('/article/{id}', 'ArticleController@store')->name('article.store');
Route::delete('/article/{id}', 'ArticleController@destroy')->name('article.destroy');
Route::match(['put', 'patch'], '/article/{id}', ['as' => 'article.update', 'uses' => 'ArticleController@update']);
Route::resource('article', 'ArticleController')->except([
    'update'
])->middleware('is_admin');

Route::get('/mesparis', 'BetsController@index')->name('mesparis')->middleware('auth');
Route::post('/bets/{id}', 'BetsController@store')->name('bets.store');
Route::delete('/bets/{id}', 'BetsController@destroy')->name('bets.destroy');
Route::match(['put', 'patch'], '/bets/{id}', ['as' => 'bets.update', 'uses' => 'BetsController@update']);
Route::resource('bets', 'BetsController')->except(['update'])->middleware('auth');

Route::get('/moncompte', 'AccountController@index')->name('account')->middleware('auth');

Route::get('/benefices', 'ChartsController@index')->name('chart')->middleware('auth');

Route::get('/utilisateurs', 'UserController@index')->name('users')->middleware('is_admin');
Route::match(['put', 'patch'], '/users/{id}', ['as' => 'users.update', 'uses' => 'UserController@update']);
Route::resource('users', 'UserController')->except(['update'])->middleware('auth');