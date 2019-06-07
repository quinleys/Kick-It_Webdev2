<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\UserWelcome;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }
    public function email()
    {
       // $username = Auth::user()->name;
        /*
        Mail::to(Auth::user()->email)->send(new UserWelcome());
        Mail::to('leysenquinten@gmail.com')->send(new UserWelcome());
        // Mail::to('frederick.roegiers@arteveldehs.be')->send(new UserWelcome());
        // send email
        return redirect('/welcome');
        */

    }
}
