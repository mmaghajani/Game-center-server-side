<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'abstract', 'info','rate','large_image', 'small_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token','id','created_at' , 'updated_at', 'pivot',
    ];

    /**
     * return categories for this game
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    /**
     * Get all comments that written for this game
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    /**
     * Returns scoreboard for this game
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function records(){
        return $this->hasMany(Record::class);
    }
}
