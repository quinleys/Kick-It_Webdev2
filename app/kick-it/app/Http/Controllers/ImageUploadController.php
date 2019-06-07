<?php
namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Project;
use App\Donation;
Use App\Post;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ImageUploadController extends Controller
{
 public function index(){
     
     $project = Project::latest()->first();
     return view ('uploader.index',['project'=>$project]);
 }

    public function store(Request $request){

        // validatie-regels

        $rules = [
            'project_id' => 'required|numeric',
            'file' => 'required',
            'file.*' => 'image|mimes:jpeg,png,gif,svg,jpg|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect::back()
            ->withInput()
            ->withErrors($validator)
            ->with(
                [
                    'notification' => 'danger',
                    'message'=> 'Er is iets mis :('
                ]
                );
        }
        if($request-> hasFile('file')) {

            $directory= '/project-' . $request->project_id;

            foreach($request->file('file') as $image){
                $project = $request->project_id;
                $name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();

                $filename = pathinfo($name, PATHINFO_FILENAME). '-' . uniqid(5) .'.' . $extension;

                $image->storeAs($directory, $filename, 'public');

                $this->storeImageToDatabase($request->project_id, $filename, 'storage' .$directory);
            }

            Session::flash('success','Je hebt succesvol jouw project opgeslaan');
            return redirect()->route('packages.edit',['project'=>$project]);
        }
    }

    private function storeImageToDatabase($project_id, $filename, $filepath){

        $image = new Image();
        $image->project_id= $project_id;
        $image->filename = $filename;
        $image->filepath = $filepath;

        $image->save();

    }
}
