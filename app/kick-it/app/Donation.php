<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function package()
    {
        return $this->belongsTo('App\Package');
    }
}
