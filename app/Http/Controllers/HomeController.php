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

        $homepage = ["slider" => $slider, "new_games" => $new_games, "comments" => $comments];
        $result = ["homepage" => $homepage];
        $response = ["ok" => true, "result" => $result];
        $final = ["response" => $response];
        return $final;
    }

    private function getComments()
    {
        return Comment::query()->orderBy('created_at', 'desc')->take(5)->get();
    }

    private function makeSlider()
    {
        $slider = array();
        $categories = Category::all();
        $index = 0;
        foreach ($categories as $category) {
            $games = $category->games;
            $popularGame = $this->findPopularGame($games);
            $slider[$index] = $popularGame;
            $index++;
        }

        return $slider;
    }

    private function findPopularGame($gamesCategory)
    {
        $popularGame = new Game();
        $rate = 0;
        foreach ($gamesCategory as $gameCategory) {
            $game = $gameCategory->game;
            if ($game->rate > $rate) {
                $rate = $game->rate;
                $popularGame = $game;
            }
        }

        return $popularGame;
    }

    private function makeNewGames()
    {
        $newGames = Game::query()->orderBy('created_at', 'desc')->take(5)->get();
        return $newGames;
    }
}
