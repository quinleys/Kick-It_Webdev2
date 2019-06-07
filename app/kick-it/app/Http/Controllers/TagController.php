<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Tag;
use App\Models\Project;
class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->withTags($tags);
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:225'
        ));
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success','Nieuwe tag is succesvol gecreerd!');

        return redirect()->route('tags.index');
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        $projects=Project::all();

        return view('tags.show')->withTag($tag)->withProjects($projects);
    }
}
