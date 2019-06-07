<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Mail;

class ContactMessageController extends Controller
{
    //
    public function create()
    {
        return view ('contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'min:3',
            'message' => 'min:10']);

         $data = array(
             'email' => $request->email,
             'name' => $request->name,
             'bodyMessage' => $request->message,
         );

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('leysenquinten@gmail.com');
            $message->subject($data['name']);
        });    
    }
}
