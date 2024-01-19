<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubDistrictController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); //return user to the login page
    }

    public function Index(){
    	$subdistrict = DB::table('subdistricts')
    	->join('districts', 'subdistricts.district_id', 'districts.id')
    	->select('subdistricts.*','districts.district_en')
    	->orderBy('id', 'desc')->paginate(3);
    	return view('backend.subdistrict.index', compact('subdistrict'));
    	
    	//join(table, field to join from table 1, field to join from table 2)

    }

    public function AddSubDistrict(){
    	$district = DB::table('districts')->get();
    	return view('backend.subdistrict.create', compact('district'));
    }

    public function StoreSubDistrict(Request $request){


    $validated = $request->validate([

        'subdistrict_en' => 'required|unique:subdistricts|max:255',
        'subdistrict_bg' => 'required|unique:subdistricts|max:255',
    ]);

    	$data = array(); // This is Query Builder
    	$data['subdistrict_en'] = $request->subdistrict_en;
    	$data['subdistrict_bg'] = $request->subdistrict_bg;
    	$data['district_id'] = $request->district_id;
    	DB::table('subdistricts')->insert($data);

    	$notification = array(

    		'message' => 'SubDistrict Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('subdistrict')->with($notification);

    }
    
    public function EditSubDistrict($id){
    	$subdistrict = DB::table('subdistricts')->where('id', $id)->first();
    	$district = DB::table('districts')->get();
    	return view('backend.subdistrict.edit', compact('subdistrict', 'district'));
    }

    public function UpdateSubDistrict(Request $request, $id){

    	 $validated = $request->validate([

        'subdistrict_en' => 'required|unique:subdistricts|max:255',
        'subdistrict_bg' => 'required|unique:subdistricts|max:255',
    	]);

    	$data = array(); // This is Query Builder
    	$data['subdistrict_en'] = $request->subdistrict_en;
    	$data['subdistrict_bg'] = $request->subdistrict_bg;
    	$data['district_id'] = $request->district_id;

    	DB::table('subdistricts')->where('id', $id)->update($data);

    	$notification = array(

    		'message' => 'SubDistrict Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('subdistrict')->with($notification);

    }

    public function DeleteSubDistrict($id){

    	DB::table('subdistricts')->where('id', $id)->delete();

    	$notification = array(

    		'message' => 'SubDistrict Deleted Successfully',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('subdistrict')->with($notification);

    }
}
