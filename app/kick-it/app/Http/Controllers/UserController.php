<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use App\Package;
use App\User;
use App\Donation;
use App\Models\Project;

class UserController extends Controller
{
    public function profile(){
        $user = Auth::user();

        $projects = Project::where('user_id','=', $user->id)->paginate(4);
        //$d = Donation::all();
        $donations = Donation::where('user_id','=',$user->id)->get();
        
        $packages = Package::all();
        
    	return view('profile', array('user' => Auth::user()),['projects'=>$projects,'donations'=>$donations,'packages'=>$packages] );
    }
    public function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
            
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/storage/avatars/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $filename;
            $user->save();
            $request->session()->flash('success',
            'Je hebt succesvol je profielfoto aangepast.');

            
        }
        return back();
        }


    	//return view('profile', array('user' => Auth::user()) );

    }

    


