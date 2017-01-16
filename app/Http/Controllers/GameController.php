<?php

namespace App\Http\Controllers;

use App\Game;

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

        $records = $game->records->load('user');

        $result = ["leaderboard" => $records];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function commentsTab($title)
    {
        $game = $this->getGameWithTitle($title);

        $comments = $game->comments->load('user');
        $result = ["comments" => $comments];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function commentsOffset($title, $offset)
    {
        $game = $this->getGameWithTitle($title);
        $comments = $game->comments->load(['user' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);

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
            $collection->push($category->games);
        }

        $result = ["games" => $collection->collapse()->unique('title')->values()];
        $final = $this->createFinalResponse($result);
        return $final;
    }

    public function galleryTab()
    {

    }

    private function getGameWithTitle($title)
    {
        $game = Game::with('categories')->where('title', '=', $title)->get();
        return $game[0];
    }

    private function createFinalResponse($result)
    {
        $response = ["ok" => true, "result" => $result];
        $final = ["response" => $response];
        return $final;
    }
}
