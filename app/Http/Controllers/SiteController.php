<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function register(){
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }

    public function index(){
        return view('home');
    }

    public function game(Request $request){
        $url = $request->fullUrl();
        $game = urldecode(explode('=', explode('?', $url)[1])[1]);
        return view('game')->with(['game' => $game]);
    }

    public function listOfGame(){
        return view('game_list');
    }

    public function gameStart($title){
        return view('minesweeper');
    }

    public function profile(Request $request, $token = null){
        return view('profile')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
