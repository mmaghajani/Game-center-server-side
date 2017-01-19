<?php

namespace App\Http\Controllers;

use App\Category;
use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    //
    public function header($title)
    {
        $game = $this->getGameWithTitle($title);

        $result = ["game" => $game];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function infoTab($title)
    {
        $game = $this->getGameWithTitle($title);

        $result = ["game" => $game];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function leaderBoardTab($title)
    {
        $game = $this->getGameWithTitle($title);

        $records = $game->records->load('user')->sortByDesc('score')->values();

        $result = ["leaderboard" => $records];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function commentsTab($title)
    {
        $game = $this->getGameWithTitle($title);

        $comments = $game->comments->load('user', 'game')->sortByDesc('created_at')->values();
        $comments = $comments->map(function($item , $key){
           return [ 'text' => $item['text'] , 'rate' => $item['rate'] , 'date' => $item['date'] ,
                'player' => $item['user'] , 'game' => $item['game']];
        });

        $cut_point = rand(1, $comments->count());
        $comments = $comments->slice(0, $cut_point);

        $result = ["comments" => $comments];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function commentsOffset($title, Request $request)
    {
        $url = $request->fullUrl();
        $offset = intval(explode('=' , explode('?' , $url)[1])[1]);

        $game = $this->getGameWithTitle($title);
        $comments = $game->comments->load('user', 'game')->sortByDesc('created_at')->values();

        $comments = $comments->map(function($item , $key){
            return [ 'text' => $item['text'] , 'rate' => $item['rate'] , 'date' => $item['date'] ,
                'player' => $item['user'] , 'game' => $item['game']];
        });
        $remainingComments = array_slice($comments->toArray(), $offset);

        $result = ["comments" => $remainingComments];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function relatedGamesTab($title)
    {
        $game = $this->getGameWithTitle($title);
        $categories = $game->categories;
        $collection = collect();
        foreach ($categories as $category) {
            $category_record = Category::all()->where('title' , '=' , $category)->pop();
            foreach ($category_record->games->load('categories') as $game){
                $fgame = $this->fetchCategory($game);
                $collection->push($fgame);
            }

        }

        $result = ["games" => $collection->unique('title')->values()];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function galleryTab()
    {

    }

    private function getGameWithTitle($title)
    {
        $game = Game::with('categories')->where('title', '=', $title)->get();
        $game = $this->fetchCategory($game[0]);
        return $game;
    }

    private function createFinalResponse($result)
    {
        $response = ["ok" => true, "result" => $result];
        $final = ["response" => $response];
        return $final;
    }

    private function fetchCategory($game)
    {
        foreach ($game->categories as $key) {
            $game->categories->prepend($key->title);
            $game->categories->pop();
        }

        return $game;
    }
}
