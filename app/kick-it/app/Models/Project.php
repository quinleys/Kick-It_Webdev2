<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Favorite;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    public function user()
    {
    return $this->belongsTo('App\User');
    }
    public function images(){
        return $this->hasMany('App\Models\Image');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function donations(){
        return $this->hasMany('App\Donation');
    }
    public function favorited()
    {
        return (bool) Favorite::where('user_id', Auth::id())
                            ->where('project_id', $this->id)
                            ->first();
    }
    public function likes()
    {
    return $this->belongsTo('App\Like');
    }
    public function tags()
    {
        return $this->belongsToMany( 'App\Tag', 'project_tag', 'project_id', 'tag_id' );
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function packages()
    {
        return $this->hasMany('App\Package');
    }

}
