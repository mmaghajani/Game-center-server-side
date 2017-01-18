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
Route::get('/games/{title}/comments/{offset}' , 'GameController@commentsOffset');
Route::get('/games/{title}/comments.json' , 'GameController@commentsTab');
Route::get('/games/{title}/related_games.json' , 'GameController@relatedGamesTab');
Route::get('/games/{title}/gallery.json' , 'GameController@galleryTab');
Route::get('/games/{search_keyword}' , 'GameListController@index');

Route::get('/home' , 'SiteController@index');
Route::get('/register' , 'SiteController@register');
Route::get('/login' , 'SiteController@login');

Auth::routes();
