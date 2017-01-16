<?php

namespace App\Http\Controllers;

use App\Game;
use App\Record;
use Illuminate\Http\Request;

class GameController extends Controller
{
    //
    public function header($title){
        $game = Game::with('categories')->where( 'title' , '=' , $title)->get();

        $result = ["game" => $game[0]];
        $response = ["ok" => true, "result" => $result];
        $final = ["response" => $response];
        return $final;
    }

    public function infoTab($title){
        $game = Game::with('categories')->where( 'title' , '=' , $title)->get();

        $result = ["game" => $game[0]];
        $response = ["ok" => true, "result" => $result];
        $final = ["response" => $response];
        return $final;
    }

    public function leaderBoardTab($title){
        $game = Game::with('categories')->where( 'title' , '=' , $title)->get();
        $records = $game[0]->records->load('user');
        $result = ["leaderboard" => $records];
        $response = ["ok" => true, "result" => $result];
        $final = ["response" => $response];
        return $final;
    }

    public function commentsTab(){

    }

    public function commentsOffset($offset){

    }

    public function relatedGamesTab(){

    }

    public function galleryTab(){

    }
}
