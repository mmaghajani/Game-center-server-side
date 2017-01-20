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


use Illuminate\Support\Facades\Auth;

Route::get('/home.json' , 'HomeController@index');
Route::get('/games/{title}/header.json' , 'GameController@header');
Route::get('/games/{title}/info.json' , 'GameController@infoTab');
Route::get('/games/{title}/leaderboard.json' , 'GameController@leaderBoardTab');
Route::get('/games/{title}/comments' , 'GameController@commentsOffset');
Route::get('/games/{title}/comments.json' , 'GameController@commentsTab');
Route::get('/games/{title}/related_games.json' , 'GameController@relatedGamesTab');
Route::get('/games/{title}/gallery.json' , 'GameController@galleryTab');
Route::get('/games.json' , 'GameListController@index');

Route::get('/home' , 'SiteController@index');
Route::get('/' , 'SiteController@index');
Route::get('/index.html' , 'SiteController@index');
Route::get('/games_list.html' , 'SiteController@listOfGame');
Route::get('/games.html' , 'SiteController@game');
Route::get('/register' , 'SiteController@register');
Route::get('/register.html' , 'SiteController@register');
Route::get('/login' , 'SiteController@login');
Route::get('/login.html' , 'SiteController@login');
Route::post('/submit_comment' , 'GameController@submitComment');

Auth::routes();
