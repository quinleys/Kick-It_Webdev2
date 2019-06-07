<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
    public function donations()
    {
        return $this->belongsToMany('App\Donation');
    }
}
