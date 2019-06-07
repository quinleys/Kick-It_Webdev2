<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Session;
use App\Models\Project;

class PackagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $project = Project::latest()->first();
        $packages = Package::where('project_id','=', $project->id)->get();
        return view('packages.index',['project'=>$project,'packages'=>$packages ]);
    }
    public function store(Request $request){

        $this->validate($request, array(
            'title' => 'required|max:225',
            'description' => 'required|min:3',
            'min_value' => 'required|integer',
            'max_value' => 'required|integer',
        ));
        $package = new Package;
        $package->project_id = $request->project_id;
        $package->title = $request->title;
        $package->description = $request->description;
        $package->min_value = $request->min_value;
        $package->max_value = $request->max_value;
        $package->save();
        $project = Project::find($package->project_id);
        Session::flash('success','Nieuwe package is succesvol gecreerd!');

        return redirect()->route('packages.edit',['project'=>$project]);
    }
    public function edit($id)
    {
        $project = Project::find($id);
        $packages = Package::where('project_id','=', $project->id)->get();
        return view('packages.edit',['project'=>$project,'packages'=>$packages ]);
    }
    public function store2(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:225',
            'description' => 'required|min:3',
            'min_value' => 'required|integer',
            'max_value' => 'required|integer',
        ));
        $package = new Package;
        $package->project_id = $request->project_id;
        $package->title = $request->title;
        $package->description = $request->description;
        $package->min_value = $request->min_value;
        $package->max_value = $request->max_value;
        $package->save();

        Session::flash('success','Nieuwe package is succesvol gecreerd!');

        return redirect()->route('packages.edit');
    }
}
