<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'fullname','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function favorites()
    {
        return $this->belongsToMany(Project::class, 'favorites', 'user_id', 'post_id')->withTimeStamps();
    }
    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    public function donations()
    {
        return $this->hasMany('App\Donation');
    }
    public function  isAdmin()
    {
        // look for admin column in users table
        return $this->admin;
    }
    public function user()
    {
        return $this;
    }
    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
