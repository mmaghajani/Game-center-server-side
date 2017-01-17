<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'created_at' , 'updated_at', 'player',
    ];

    public function user(){
        return $this->hasOne(User::class , 'email' , 'player');
    }

    public function game(){
        return $this->hasOne(Game::class , 'title' , 'game');
    }
}
