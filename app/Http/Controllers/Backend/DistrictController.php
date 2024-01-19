<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DistrictController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); //return user to the login page
    }

    public function Index(){
    	$district = DB::table('districts')->orderBy('id', 'desc')->paginate(3); // get all the data
    	//last one displayed first - 'desc' //(3) data per page
    	return view('backend.district.index', compact('district'));
    	
    }

    public function AddDistrict(){
    	return view('backend.district.create');
    }

    public function StoreDistrict(Request $request){


    $validated = $request->validate([

        'district_en' => 'required|unique:districts|max:255',
        'district_bg' => 'required|unique:districts|max:255',
    ]);

    	$data = array(); // This is Query Builder
    	$data['district_en'] = $request->district_en;
    	$data['district_bg'] = $request->district_bg;
    	DB::table('districts')->insert($data);

    	$notification = array(

    		'message' => 'District Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('district')->with($notification);

    }

    public function EditDistrict($id){
    	$district = DB::table('districts')->where('id', $id)->first();
    	return view('backend.district.edit', compact('district'));
    }

    public function UpdateDistrict(Request $request, $id){
    	 $validated = $request->validate([

        'district_en' => 'required|unique:districts|max:255',
        'district_bg' => 'required|unique:districts|max:255',

    	]);

    	$data = array(); // This is Query Builder
    	$data['district_en'] = $request->district_en;
    	$data['district_bg'] = $request->district_bg;
    	DB::table('districts')->where('id', $id)->update($data);

    	$notification = array(

    		'message' => 'District Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('district')->with($notification);

    }

    public function DeleteDistrict($id){

    	DB::table('districts')->where('id', $id)->delete();

    	$notification = array(

    		'message' => 'District Deleted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('district')->with($notification);
    }
}
