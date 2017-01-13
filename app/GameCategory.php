<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameCategory extends Model
{
    //
    public function game(){
        return $this->hasOne(Game::class , 'title' , 'game_id');
    }

    public function category(){
        return $this->hasOne(Category::class , 'id' , 'category_id');
    }
}
