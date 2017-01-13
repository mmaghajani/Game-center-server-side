<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Game;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $slider = $this->makeSlider();
        $new_games = $this->makeNewGames();
        $comments = $this->getComments();

        $homepage = [ "slider" => $slider , "new_games" => $new_games , "comments" => $comments];
        $result = ["homepage" => $homepage];
        $response = ["ok" => true , "result" => $result];

        return "salam";
    }

    private function getComments(){
        $comments = Comment::query()->orderBy('created_at' , 'desc');

        $recentComments = array($comments[0] , $comments[1] , $comments[2] , $comments[3] , $comments[4]);
        return $recentComments;
    }

    private function makeSlider(){
        $slider = array();
        $categories = Category::all();
        $index = 0;
        foreach ($categories as $category) {
            $games = $category->games();
            $popularGame = $this->findPopularGame($games);
            $slider[$index] = $popularGame;
            $index++;
        }

        return $slider;
    }

    private function findPopularGame($games){
        $popularGame = new Game();
        $rate = 0 ;
        foreach ($games as $game){
            $gameModel = new Game($game);
            if( $gameModel->rate > $rate){
                $rate = $gameModel->rate;
                $popularGame = $gameModel;
            }
        }

        return $popularGame;
    }

    private function makeNewGames()
    {
        $games = Game::all();
        echo $games;
        $newGames = array($games[0] , $games[1] , $games[2] , $games[3] , $games[4]);
        return $newGames;
    }
}
