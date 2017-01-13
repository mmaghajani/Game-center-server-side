<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function user(){
        return $this->hasOne(User::class , 'email' , 'player');
    }

    public function game(){
        return $this->hasOne(Game::class , 'title' , 'game');
    }
}
