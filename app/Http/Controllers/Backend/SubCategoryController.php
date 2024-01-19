<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); //return user to the login page
    }
    
    public function Index(){
    	$subcategory = DB::table('subcategories')
    	->join('categories', 'subcategories.category_id', 'categories.id')
    	->select('subcategories.*','categories.category_en')
    	->orderBy('id', 'desc')->paginate(3);
    	return view('backend.subcategory.index', compact('subcategory'));
    	
    	//join(table, field to join from table 1, field to join from table 2)

    }

    public function AddSubCategory(){
    	$category = DB::table('categories')->get();
    	return view('backend.subcategory.create', compact('category'));
    }

    public function StoreSubCategory(Request $request){


    $validated = $request->validate([

        'subcategory_en' => 'required|unique:subcategories|max:255',
        'subcategory_bg' => 'required|unique:subcategories|max:255',
    ]);

    	$data = array(); // This is Query Builder
    	$data['subcategory_en'] = $request->subcategory_en;
    	$data['subcategory_bg'] = $request->subcategory_bg;
    	$data['category_id'] = $request->category_id;
    	DB::table('subcategories')->insert($data);

    	$notification = array(

    		'message' => 'SubCategory Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('subcategories')->with($notification);

    }

    public function EditSubCategory($id){
    	$subcategory = DB::table('subcategories')->where('id', $id)->first();
    	$category = DB::table('categories')->get();
    	return view('backend.subcategory.edit', compact('subcategory', 'category'));
    }

    public function UpdateSubCategory(Request $request, $id){

    	 $validated = $request->validate([

        'subcategory_en' => 'required|unique:subcategories|max:255',
        'subcategory_bg' => 'required|unique:subcategories|max:255',
    	]);

    	$data = array(); // This is Query Builder
    	$data['subcategory_en'] = $request->subcategory_en;
    	$data['subcategory_bg'] = $request->subcategory_bg;
    	$data['category_id'] = $request->category_id;

    	DB::table('subcategories')->where('id', $id)->update($data);

    	$notification = array(

    		'message' => 'SubCategory Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('subcategories')->with($notification);

    }

    public function DeleteSubCategory($id){

    	DB::table('subcategories')->where('id', $id)->delete();

    	$notification = array(

    		'message' => 'SubCategory Deleted Successfully',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('subcategories')->with($notification);

    }
}
