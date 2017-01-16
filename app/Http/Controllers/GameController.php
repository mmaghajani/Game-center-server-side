<?php

namespace App\Http\Controllers;

use App\Game;
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

    public function infoTab(){

    }

    public function leaderBoardTab(){

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
