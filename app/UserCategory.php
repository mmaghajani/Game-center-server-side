<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    //
    public function user(){
        return $this->hasOne(UserCategory::class , 'user' , 'email');
    }

    public function category(){
        return $this->hasOne(Category::class , 'title' , 'category');
    }
}
