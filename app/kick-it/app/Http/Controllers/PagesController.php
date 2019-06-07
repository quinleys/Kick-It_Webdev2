<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\Models\Project;
use App\Models\Image;
use App\About;
use App\Privacy;
use Mail;
use Session;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome(){

        $post= Post::orderBy('created_at','desc')->first();
        $about = About::orderBy('created_at','desc')->first();
        $project = Project::orderBy('credits','desc')->first();
        $fanfavs = Project::orderBy('credits','desc')->paginate(3);
        $features = Project::inRandomOrder()->paginate(3);
        $images = Image::all();
        $projects = Project::orderBy('created_at','desc')->paginate(3);
        return view('welcome', ['post'=>$post,'project'=>$project,'about'=>$about,'projects'=>$projects,'images'=>$images,'fanfavs'=>$fanfavs,'features'=>$features]);
    }

    public function explore(){

        $categories = Category::with('projects')->orderBy('name', 'asc')->get();
        $projects = Project::paginate(6);
        $images = Image::all();
    return view('explore',['categories'=>$categories,'projects'=>$projects,'images'=>$images]);
    }
    public function category($id){

        $categories = Category::with('projects')->orderBy('name', 'asc')->get();
        $category = Category::find($id);
        $images = Image::all();
        $projects = Project::where('category_id','=', $category->id)->paginate(6);
        
    return view('category',['categories'=>$categories,'projects'=>$projects,'category'=>$category,'images'=>$images]);
    }

    public function contact(){

        return view('contact');
    }
    public function postContact(Request $request){

        $this->validate($request, [
            'email'=>'required|email',
            'subject'=>'min:3',
            'message'=>'min:10'
        ]);
        
        $data = array(
            'email' => $request->email,
            'subject'=> $request->subject,
            'bodymessage' => $request->message

        );

        Mail::send('emails.contactus',$data,function($message) use ($data){
            $message->from($data['email']);
            $message->to('quinleys@student.arteveldehs.be');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your email was sent!');
        return redirect()->route('welcome');

    }
    public function about(){
        
        $aboutpage = About::orderBy('updated_at','desc')->first();
        return view('about',['aboutpage'=>$aboutpage]);
    }
    public function privacy(){
        
        $privacy = Privacy::orderBy('updated_at','desc')->first();
        return view('privacy',['privacy'=>$privacy]);
    }
    public function blog()
    {
        $posts = Post::paginate(6);
        return view('blog',['posts'=>$posts]);
    }
    public function invoice($id){

        $project = Project::find($id);
        $images = Image::where('project_id','=',$project->id)->get();
        /*
        $pdf = \PDF::loadView('pdf.invoice',['project'=>$project,'images'=>$images]);
        return $pdf->download('invoice.pdf');
        */
        
        return view('pdf.invoice', ['project'=>$project,'images'=>$images]);
    }

}
