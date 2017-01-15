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


Route::get('/home' , 'HomeController@index');
Route::get('/games/{title}/header' , 'GameController@header');
Route::get('/games/{title}/info' , 'GameController@infoTab');
Route::get('/games/{title}/leaderboard' , 'GameController@leaderBoardTab');
Route::get('/games/{title}/comments' , 'GameController@commentsTab');
Route::get('/games/{title}/comments?offset={offset}' , 'GameController@commentsTab');
Route::get('/games/{title}/related_games' , 'GameController@relatedGamesTab');
Route::get('/games/{title}/gallery' , 'GameController@galleryTab');
Route::get('/games?q={search_keyword}' , 'GamesListController@index');