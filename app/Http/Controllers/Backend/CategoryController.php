<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); //return user to the login page
    }
    
    public function Index(){
    	$category = DB::table('categories')->orderBy('id', 'desc')->paginate(3); // get all the data
    	//last one displayed first - 'desc' //(3) data per page
    	return view('backend.category.index', compact('category'));
    	
    }

    public function AddCategory(){
    	return view('backend.category.create');
    }

    public function StoreCategory(Request $request){


    $validated = $request->validate([

        'category_en' => 'required|unique:categories|max:255',
        'category_bg' => 'required|unique:categories|max:255',
    ]);

    	$data = array(); // This is Query Builder
    	$data['category_en'] = $request->category_en;
    	$data['category_bg'] = $request->category_bg;
    	DB::table('categories')->insert($data);

    	$notification = array(

    		'message' => 'Category Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('categories')->with($notification);

    }

    public function EditCategory($id){
    	$category = DB::table('categories')->where('id', $id)->first();
    	return view('backend.category.edit', compact('category'));
    }

    public function UpdateCategory(Request $request, $id){
    	 $validated = $request->validate([

        'category_en' => 'required|unique:categories|max:255',
        'category_bg' => 'required|unique:categories|max:255',

    	]);

    	$data = array(); // This is Query Builder
    	$data['category_en'] = $request->category_en;
    	$data['category_bg'] = $request->category_bg;
    	DB::table('categories')->where('id', $id)->update($data);

    	$notification = array(

    		'message' => 'Category Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('categories')->with($notification);

    }

    public function DeleteCategory($id){

    	DB::table('categories')->where('id', $id)->delete();

    	$notification = array(

    		'message' => 'Category Deleted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('categories')->with($notification);
    }
}
