<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Post;
use Image;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Session;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $abouts = About::all();
        $posts = Post::all();
        return view('abouts.index',['abouts'=>$abouts]);
    }
    public function create()
    {
        return view('abouts.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,array(
            'title'=>'required|max:255',
            'hometitle'=>'required|max:255',
            'intro'=>'required',
            'homeintro'=>'required',
            'bodyText'=>'required',
        ));

        $about = new About;

        $about->title = $request->title;
        $about->hometitle = $request->hometitle;
        $about->intro = $request->intro;
        $about->homeintro = $request->homeintro;
        $about->bodyText = $request->bodyText;
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $about->image = $filename;
        }
        $about->save();

        Session::flash('success','Je hebt succesvol jouw aboutpage opgeslaan');

        return redirect()->route('abouts_path');
    }
    public function edit($id)
    {
        $about = About::find($id);
        return view('abouts.edit',['about'=>$about]);
    }
    public function update(Request $request,$id)
    {
        $about = About::find($id);

        
        $about->title = $request->title;
        $about->hometitle = $request->hometitle;
        $about->intro = $request->intro;
        $about->homeintro = $request->homeintro;
        $about->bodyText = $request->bodyText;
        

        $about->update();

        if($about->status=='succeeded'){
    
            $request->session()->flash('success',
            'Je hebt succesvol jouw post aangepast');
        }

        
        return redirect()->route('abouts_path');

    }
    public function show($id)
    {
        $about = About::find($id);
        return view('abouts.show',['about'=>$about]); 
    }
    public function destroy($id)
    {
        $about = About::find($id);
        $abouts = About::all();
        if($abouts->count() > 2){
            $about->delete();

            Session::flash('success','Je hebt succesvol de aboutpage verwijderd');
            return redirect()->route('abouts_path');
        } else {
            return Redirect::back()
            ->with(
                [
                    'notification' => 'danger',
                    'message'=> 'Er is iets mis :('
                ]
                );
            
        }

        
    }
}
