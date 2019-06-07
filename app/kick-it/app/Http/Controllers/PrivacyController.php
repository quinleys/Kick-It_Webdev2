<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Privacy;
use Session;

class PrivacyController extends Controller
{
    public function index()
    {
        $privacys = Privacy::all();
        return view('privacy.index',['privacys'=>$privacys]);
    }

    public function create()
    {
        return view('privacy.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,array(
            'title'=>'required|max:255',
            'intro'=>'required',
            'bodyText'=>'required',
        ));

        $privacy = new Privacy;

        $privacy->title = $request->title;
        $privacy->intro = $request->intro;
        $privacy->bodyText = $request->bodyText;
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $privacy->image = $filename;
        }
        $privacy->save();

        Session::flash('success','Je hebt succesvol jouw privacypage opgeslaan');

        return redirect()->route('privacys_path');
    }
    public function edit($id)
    {
        $privacy = Privacy::find($id);
        return view('privacy.edit',['privacy'=>$privacy]);
    }
    public function update(Request $request,$id)
    {
        $privacy = Privacy::find($id);

        
        $privacy->title = $request->title;
        $privacy->intro = $request->intro;
        $privacy->bodyText = $request->bodyText;
        

        $privacy->update();

        if($privacy->status=='succeeded'){
    
            $request->session()->flash('success',
            'Je hebt succesvol jouw post aangepast');
        }

        
        return redirect()->route('privacys_path');

    }
    public function show($id)
    {
        $privacy = Privacy::find($id);
        return view('privacy.show',['privacy'=>$privacy]); 
    }
    public function destroy($id)
    {
        $privacy = Privacy::find($id);
    
        $privacys = Privacy::all();
        if($privacys->count() > 2){
            $privacy->delete();

            Session::flash('success','Je hebt succesvol de privacypage verwijderd');
            return redirect()->route('privacys_path');
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
