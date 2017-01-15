<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at' , 'updated_at',
    ];

    /**
     * This method returns all comments for this user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(){
        return $this->hasMany(Comment::class , 'player' , 'email' );
    }
    /**
     * returns all favorite categories for this user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favoriteCategories(){
        return $this->hasMany(UserCategory::class , 'user' , 'email' );
    }
    /**
     * Returns all user records
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function records(){
        return $this->hasMany(Record::class , 'player' , 'email');
    }
}
