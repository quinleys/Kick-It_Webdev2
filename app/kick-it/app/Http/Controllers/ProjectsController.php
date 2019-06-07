<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Image;
use App\Like;
use App\Donation;
use App\Package;
use App\Tag;
use App\Category;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('created_at','desc')->get();
        return view('projects.index', ['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('projects.create')->withTags($tags)->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $this->validate($request,array(
            'name'=>'required|max:255',
            'intro'=>'required',
            'description'=>'required',
            'creditgoal'=>'required|numeric',
            'creditgoal'=>'required|integer',
            //'filename' => 'required',
            //'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ));
        /*
        if($request->hasfile('filename'))

            $directory= '/project-' . $request->project_id;
         {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $filename = pathinfo($name, PATHINFO_FILENAME). '-' . uniqid(5) .'.' . $extension;
                $image->move(public_path().'/images/', $filename);  
                $data[] = $filename;  
            }
         }*/

        $user = Auth::user();
        
        $userid = $user->id;

        $project = new Project;


        $project->name = $request->name;
        $project->intro = $request->intro;
        $project->description = $request->description;
        $project->creditgoal = $request->creditgoal;
        $project->user_id = $userid;
        $project->filename= 'test';
        $project->category_id =  $request->category;
        //$project->filename=json_encode($data);

        $project->save();

        $project->tags()->sync($request->tags,false);

        Session::flash('success','Je hebt succesvol jouw project opgeslaan');

        return redirect()->route('uploader.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $images = Image::where('project_id', '=', $project->id)->get();
        $donations = Donation::where('project_id', '=', $project->id)->get();
        $packages = Package::where('project_id', '=', $project->id)->get();
        return view('projects.show', ['project'=>$project,'images'=>$images,'packages'=>$packages,'donations'=>$donations]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $categories = Category::all();
        $projecttags = array();
        foreach($project->tags as $tag) {
            $projecttags[] = $tag->id;
        }

        $tags = Tag::all();
        return view('projects.edit', ['project'=>$project, 'tags' => $tags, 'projecttags' => $projecttags])->withCategories($categories);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        $project->name=$request->name;
        $project->label=$request->label;
        $project->description=$request->description;
        $project->creditgoal=$request->creditgoal;
        
        

        $project->update();

        $project->tags()->sync($request->tags,true);

        if($project->status=='succeeded'){
    
            $request->session()->flash('success',
            'Je hebt succesvol jouw post aangepast');
        }

        
        return redirect()->route('projects_path');
        //return redirect()->route('project_path',['project'=> $project]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id); 
        $project->tags()->detach();

        $project->delete();

        Session::flash('success','Je hebt succesvol jouw post verwijderd');
        return redirect()->route('projects_path');
    }

    public function search(Request $request)
    {
        $search=$request->get('search');

        $projects = DB::table('projects')->where('name','like','%'.$search.'%' )->paginate(5);

        return view('projects.search', ['projects'=>$projects]);
    }
    public function likeProject(Request $request){

        $project_id = $request['projectId'];
        $is_like = $request['isLike'] === true;
        $update = false;
        $project = Project::find($project_id);

        if(!$project){
            return null;
        }

        $user = Auth::user();

        $like = $user->likes()->where('project_id', $project_id)->first();

        if($like){
            $already_like= $like->like;
            $update = true;
            if($already_like == $is_like){
                $like->delete();
                return null;
            }else {
                $like = new Like();
            }
        }

        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->project_id = $project->id;

        if($update){
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
}
