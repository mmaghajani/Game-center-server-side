<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    /**
     * Returns all game that associated with this category
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function games(){
        return $this->hasMany(GameCategory::class);
    }
    /**
     * Returns all users interested this category
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(){
        return $this->hasMany(UserCategory::class);
    }
}
