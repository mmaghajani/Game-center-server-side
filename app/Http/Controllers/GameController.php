<?php

namespace App\Http\Controllers;

use App\Game;
use App\Record;
use Illuminate\Http\Request;

class GameController extends Controller
{
    //
    public function header($title){
        $game = $this->getGameWithTitle($title);

        $result = ["game" => $game];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function infoTab($title){
        $game = $this->getGameWithTitle($title);

        $result = ["game" => $game];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function leaderBoardTab($title){
        $game = $this->getGameWithTitle($title);

        $records = $game->records->load('user');

        $result = ["leaderboard" => $records];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function commentsTab($title){
        $game = $this->getGameWithTitle($title);

        $comments = $game->comments->load('user');
        $result = ["comments" => $comments];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function commentsOffset($offset){

    }

    public function relatedGamesTab(){

    }

    public function galleryTab(){

    }

    private function getGameWithTitle($title){
        $game = Game::with('categories')->where( 'title' , '=' , $title)->get();
        return $game[0];
    }

    private function createFinalResponse($result){
        $response = ["ok" => true, "result" => $result];
        $final = ["response" => $response];
        return $final;
    }
}
