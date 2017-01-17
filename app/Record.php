<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    //
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id','created_at','updated_at','player', 'game',
    ];

    public function game(){
        return $this->hasOne(Game::class , 'title' , 'game');
    }

    public function user(){
        return $this->hasOne(User::class , 'email' , 'player');
    }
}
