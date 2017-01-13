<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    //
    public function game(){
        return $this->hasOne(Game::class , 'title' , 'game');
    }

    public function user(){
        return $this->hasOne(User::class , 'email' , 'player');
    }
}
