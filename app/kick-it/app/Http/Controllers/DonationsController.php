<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\User;
use Mail;
use App\Donation;
use App\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class DonationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {

        $project = Project::find($id);
        $packages = Package::where('project_id', '=' ,$project->id)->get();
        return view('donate.index', ['project'=>$project,'packages'=>$packages]);
    }
    public function postDonate(Request $r, $id){
        
        $donation = new Donation;

        $donationAmount = $r->credits;

        $currentUser = Auth::user();

        $admin = User::find(1);

        $project = Project::find($id);


        if($currentUser->credits > $donationAmount){

            // tax 10%
            $tax = 0.1;
            $amountTax = $donationAmount * $tax;
            $projectAmount = $donationAmount - $amountTax;
            $project->credits = $project->credits + $projectAmount;
            $admin->credits = $admin->credits + $amountTax;
            $currentUser->credits = $currentUser->credits - $donationAmount;
            $admin->save();
            $project->save();
            $currentUser->save();

            $donation->user_id= $currentUser->id;
            $donation->project()->associate($project);
            $donation->amount=$donationAmount;
            $donation->package_id= $r->package_id;
            $donation->save();

            $email = $currentUser->email;
            $data = array(
                'email' => $email,
                'title' => $donation->project->name,
                'user'=> $donation->user->name,
                'package'=> $donation->package->title,
                'amount' => $donation->amount
    
            );
            Mail::send('emails.donation',$data,function($message) use ($data){
                $message->from('quinleys@student.arteveldehs.be');
                $message->to($data['email']);
                $message->subject('You have a new donation!');
            });
            

            Session::flash('success','Je hebt succesvol gedoneerd');
        }  

        return redirect('welcome');
        }

        
    }

