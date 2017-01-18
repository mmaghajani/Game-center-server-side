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

    public function game(){
        return view('game');
    }

    public function listOfGame(){
        return view('game_list');
    }
}
