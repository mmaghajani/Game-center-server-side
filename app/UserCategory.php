<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
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

    public function user(){
        return $this->hasOne(UserCategory::class , 'user' , 'email');
    }

    public function category(){
        return $this->hasOne(Category::class , 'title' , 'category');
    }
}
