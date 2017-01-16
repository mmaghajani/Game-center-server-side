<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GameListController extends Controller
{
    //
    public $search_word;
    function index($search_word){
        $this->search_word = $search_word;
        $games = Game::with("categories")->get();
        $filter_games = $games->filter(function ($value , $key){
            return strpos($value->title , $this->search_word);
        });

        $result = ["games" => $filter_games->values()];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    private function createFinalResponse($result)
    {
        $response = ["ok" => true, "result" => $result];
        $final = ["response" => $response];
        return $final;
    }
}
