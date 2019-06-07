<?php


namespace App\Http\Controllers;
use App\Category;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::all();
        return view('categories.index')->withCategories($categories);
    }
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:225'
        ));
        $category = new category;
        $category->name = $request->name;
        $category->save();

        Session::flash('success','Nieuwe category is succesvol opgeslaan!');

        return redirect()->route('categories.index');
    }
    public function destroy($id)
    {
        //need to fix
        

        $category = Category::find($id); 

        $category->delete();

        Session::flash('success','Je hebt succesvol jouw post verwijderd');
        return redirect()->route('categories.index');
        
    }
}
