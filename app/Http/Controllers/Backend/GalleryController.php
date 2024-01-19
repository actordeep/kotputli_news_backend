<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{

		public function __construct(){
        $this->middleware('auth'); //return user to the login page
    }

    public function PhotoGallery(){

    	$photo = DB::table('photos')->orderBy('id', 'desc')->paginate(5);
    	return view('backend.gallery.photos', compact('photo'));

    }

    public function AddGallery(){

    	return view('backend.gallery.createphoto');

    }

    public function StorePhoto(Request $request){

    	$data = array(); // This is Query Builder
    	$data['title'] = $request->title;
    	$data['type'] = $request->type;


    	$image = $request->photo;
    		if ($image) {
   		$image_one = uniqid() . '.' . $image->getClientOriginalExtension(); 
    		/*$image_one = 123123123.jpg or 123123123.png*/ 
    // 		Image::make($image)->resize(500,300)->save('image/photogallery/' . $image_one);
    		Image::make($image)->save('image/photogallery/' . $image_one);

    	$data['photo'] = 'image/photogallery/' . $image_one;
    		 // image/photogallery/343434343.png

    	DB::table('photos')->insert($data);

    	$notification = array(

    		'message' => 'Photo Inserted Successfully',
    		'alert-type' => 'success'
    	);

	    	return redirect()->route('photo.gallery')->with($notification);
	    } else {
	    	return redirect()->back();
	    } // End Condition

    } // End Method

    public function EditPhoto($id){ 

	  	$photo = DB::table('photos')->where('id', $id)->first();

	  	return view('backend.gallery.editphoto', compact('photo'));

  	}

  	public function UpdatePhoto(Request $request, $id){

    	$data = array(); // This is Query Builder
    	$data['title'] = $request->title;
    	$data['type'] = $request->type;

    	$oldimage = $request->oldimage;

    	$image = $request->photo;
    		if ($image) {
   		$image_one = uniqid() . '.' . $image->getClientOriginalExtension(); 
    		/*$image_one = 123123123.jpg or 123123123.png*/ 
    // 		Image::make($image)->resize(500,300)->save('image/photogallery/' . $image_one);
    		Image::make($image)->save('image/photogallery/' . $image_one);

    	$data['photo'] = 'image/photogallery/' . $image_one;
    		 // image/photogallery/343434343.png

    	DB::table('photos')->where('id', $id)->update($data);
    	unlink($oldimage);

    	$notification = array(

    		'message' => 'Gallery Image Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('photo.gallery')->with($notification);

	    } else {
		
	    	$data['photo'] = $oldimage;
	    	DB::table('photos')->where('id', $id)->update($data);

	    	$notification = array(

	    		'message' => 'Gallery Image Updated Successfully',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('photo.gallery')->with($notification);

	    }


  	}

  	public function DeletePhoto($id){

	  	$photo = DB::table('photos')->where('id', $id)->first();
	  	unlink($photo->photo);

	  	DB::table('photos')->where('id', $id)->delete();

	  	$notification = array(

	    		'message' => 'Photo Deleted Successfully',
	    		'alert-type' => 'error'
	    	);

	    return redirect()->route('photo.gallery')->with($notification);
  }


 							// Video Gallery



  public function VideoGallery(){

  	$video = DB::table('videos')->orderBy('id', 'desc')->paginate(5);
  	return view('backend.gallery.video', compact('video'));

  }

  public function AddVideo(){

  	return view('backend.gallery.createvideo');

  }

  public function StoreVideo(Request $request){

  	$data = array();
  	$data['title'] = $request->title;
  	$data['embed_code'] = $request->embed_code;
    $data['type'] = $request->type;

    DB::table('videos')->insert($data);

    $notification = array(

	    		'message' => 'Video Inserted Successfully',
	    		'alert-type' => 'success'
	    	);

 	return redirect()->route('video.gallery')->with($notification);

  }

  public function EditVideo($id){

	  	$video = DB::table('videos')->where('id', $id)->first();

	  	return view('backend.gallery.editvideo', compact('video'));

  	}


  public function UpdateVideo(Request $request, $id){

  	$data = array();
  	$data['title'] = $request->title;
  	$data['embed_code'] = $request->embed_code;
    $data['type'] = $request->type;

    DB::table('videos')->where('id', $id)->update($data);

    $notification = array(

	    		'message' => 'Video Updated Successfully',
	    		'alert-type' => 'success'
	    	);

 	return redirect()->route('video.gallery')->with($notification);

  }

  public function DeleteVideo($id){

	  	$photo = DB::table('videos')->where('id', $id)->first();

	  	DB::table('videos')->where('id', $id)->delete();

	  	$notification = array(

	    		'message' => 'Video Deleted Successfully',
	    		'alert-type' => 'error'
	    	);

	    return redirect()->route('video.gallery')->with($notification);
  }


}
