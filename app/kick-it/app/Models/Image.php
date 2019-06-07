<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function projects(){
        return $this->hasOne('App\Models\Project');
    }
}
