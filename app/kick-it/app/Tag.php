<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function projects()
    {
        return $this->belongsToMany( 'App\Tag', 'project_tag', 'project_id', 'tag_id' );
    }
}
