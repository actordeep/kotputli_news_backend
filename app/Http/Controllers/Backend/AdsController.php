<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class AdsController extends Controller
{

	public function __construct(){
        $this->middleware('auth'); //return user to the login page
    }

	public function EditAds($id){

		$ads = DB::table('ads')->where('id', $id)->first();

		return view('backend.ads.editads', compact('ads'));

	}

	public function UpdateAds(Request $request, $id){

    	$data = array(); // This is Query Builder
    	$data['link'] = $request->link;

		$oldimage = $request->oldimage;

      if ($request->type == 2) {
        	$image = $request->ads;

   		$image_one = uniqid() . '.' . $image->getClientOriginalExtension(); 
    		Image::make($image)->resize(970,90)->save('image/brandad/' . $image_one);

    	$data['ads'] = 'image/brandad/' . $image_one;
    	$data['type'] = 2;


		DB::table('ads')->where('id', $id)->update($data);
    	unlink($oldimage);

    	$notification = array(

    		'message' => 'Horizontal Ad Updated Successfully',
    		'alert-type' => 'success'
    	);

	    	return redirect()->route('list.ad')->with($notification);
	    
      } else {

        	$image = $request->ads;
   		$image_one = uniqid() . '.' . $image->getClientOriginalExtension(); 
    		Image::make($image)->resize(500,500)->save('image/brandad/' . $image_one);

    	$data['ads'] = 'image/brandad/' . $image_one;
    	$data['type'] = 1;

    	DB::table('ads')->where('id', $id)->update($data);
    	unlink($oldimage);

    	$notification = array(

    		'message' => 'Vertical Ad Updated Successfully',
    		'alert-type' => 'info'
    	);

	    	return redirect()->route('list.ad')->with($notification);
	    
      } 


  	}


	// ***************

    

    public function ListAds(){

    	$ads = DB::table('ads')->orderBy('id', 'desc')->get();

    	return view('backend.ads.listads', compact('ads'));

    }

    public function AddAds(){
    	return view('backend.ads.add_ads');
    }

    public function StoreAd(Request $request){

    	$data = array(); // This is Query Builder
    	$data['link'] = $request->link;

      if ($request->type == 2) {
        	$image = $request->ads;

   		$image_one = uniqid() . '.' . $image->getClientOriginalExtension(); 
    		Image::make($image)->resize(970,90)->save('image/brandad/' . $image_one);

    	$data['ads'] = 'image/brandad/' . $image_one;
    	$data['type'] = 2;

    	DB::table('ads')->insert($data);

    	$notification = array(

    		'message' => 'Horizontal Ad Inserted Successfully',
    		'alert-type' => 'success'
    	);

	    	return redirect()->route('list.ad')->with($notification);
	    
      } else {

        	$image = $request->ads;
   		$image_one = uniqid() . '.' . $image->getClientOriginalExtension(); 
    		Image::make($image)->resize(500,500)->save('image/brandad/' . $image_one);

    	$data['ads'] = 'image/brandad/' . $image_one;
    	$data['type'] = 1;

    	DB::table('ads')->insert($data);

    	$notification = array(

    		'message' => 'Vertical Ad Inserted Successfully',
    		'alert-type' => 'info'
    	);

	    	return redirect()->route('list.ad')->with($notification);
	    
      } 

    } 
	
	
	public function DeleteAds($id){

		$ads = DB::table('ads')->where('id', $id)->first();
		unlink($ads->ads);

		DB::table('ads')->where('id', $id)->delete();

		$notification = array(

			  'message' => 'Ad Deleted Successfully',
			  'alert-type' => 'error'
		  );

	  return redirect()->route('list.ad')->with($notification);
}// End Method

}
