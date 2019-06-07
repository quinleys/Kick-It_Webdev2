<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add($project)
    {
        $user = Auth::user();
        $isFavorite = $user->favorite_projects()->where('project_id',$project)->count();
        if ($isFavorite == 0)
        {
            $user->favorite_projects()->attach($project);
            Session::success('Post successfully added to your favorite list :)','Success');
            return redirect()->back();
        } else {
            $user->favorite_projects()->detach($projects);
            Session::success('Post successfully removed form your favorite list :)','Success');
            return redirect()->back();
        }
    }
}
