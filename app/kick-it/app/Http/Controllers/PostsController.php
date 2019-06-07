<?php

namespace App\Http\Controllers;
use App\Post;
use Image;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',['posts'=>$posts]);
    }
    public function create(){
        return view('posts.create');
    }
    public function store(Request $request){

        $this->validate($request,array(

            'name'=>'required|max:255',
            'intro'=>'required',
            'description'=>'required',
            

        ));

        
        $user = Auth::user();
        $userid = $user->id;

        $post = new Post;


        $post->name = $request->name;
        $post->description = $request->description;
        $post->intro = $request->intro;
        $post->user_id = $userid;

        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $post->image = $filename;
        }
        $post->save();

        Session::flash('success','Je hebt succesvol jouw post opgeslaan');

        return redirect()->route('posts_path');
    }
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', ['post'=>$post]);
    }
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit',['post'=>$post]);
    }
    public function update(Request $request,$id)
    {
        $post = Post::find($id);

        $post->name=$request->name;
        $post->intro=$request->intro;
        $post->description=$request->description;

        $post->update();

        if($post->status=='succeeded'){
    
            $request->session()->flash('success',
            'Je hebt succesvol jouw post aangepast');
        }

        
        return redirect()->route('posts_path');
        //return redirect()->route('project_path',['project'=> $project]);
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        $posts = Post::all();
        if($posts > 2){
            $post->delete();

        Session::flash('success','Je hebt succesvol jouw post verwijderd');
        return redirect()->route('posts_path');
        } else {
            return Redirect::back()
            ->withInput()
            ->with(
                [
                    'notification' => 'danger',
                    'message'=> 'Er is iets mis :('
                ]
                );
        }
        
    }
}
