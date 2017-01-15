<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
    /**
     * Returns all game that associated with this category
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function games(){
        return $this->belongsToMany(Game::class);
    }

    /**
     * Returns all users interested this category
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
