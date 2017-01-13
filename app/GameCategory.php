<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameCategory extends Model
{
    //
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    public function game(){
        return $this->hasOne(Game::class , 'title' , 'game_id');
    }

    public function category(){
        return $this->hasOne(Category::class , 'id' , 'category_id');
    }
}
