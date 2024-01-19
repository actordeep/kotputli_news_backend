<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); //return user to the login page
    }

    public function Create(){
    	$category = DB::table('categories')->get();
    	$district = DB::table('districts')->get();

    	return view('backend.post.create', compact('category','district'));
    }

    public function GetSubCategory($category_id){
    	$subcateogry = DB::table('subcategories')->where('category_id', $category_id)->get();
    	return response()->json($subcateogry);
    }

    public function GetSubDistrict($district_id){
    	$subdistrict = DB::table('subdistricts')->where('district_id', $district_id)->get();
    	return response()->json($subdistrict);
    }

    public function StorePost(Request $request){

    	$validated = $request->validate([

        'category_id' => 'required',
        'district_id' => 'required',
        'title_en' => 'required',
        'title_bg' => 'required',
        'image' => 'required',

    ]);

    	$data = array(); // This is Query Builder
    	$data['title_en'] = $request->title_en;
    	$data['title_bg'] = $request->title_bg;
    	$data['slug'] = str_replace(' ', '-', $request->title_en);
    	$data['user_id'] = Auth::id();
    	$data['category_id'] = $request->category_id;
    	$data['subcategory_id'] = $request->subcategory_id;
    	$data['district_id'] = $request->district_id;
    	$data['subdistrict_id'] = $request->subdistrict_id;
    	$data['tags_en'] = $request->tags_en;
    	$data['tags_bg'] = $request->tags_bg;
    	$data['details_en'] = $request->details_en;
    	$data['details_bg'] = $request->details_bg;
    	$data['headline'] = $request->headline;
    	$data['first_section_thumbnail'] = $request->first_section_thumbnail;
    	$data['first_section'] = $request->first_section;
    	$data['bigthumbnail'] = $request->bigthumbnail;
    	$data['post_month'] = date("F");
    	$data['post_date'] = date('d-m-Y');

    	$image = $request->image;
    		if ($image) {
   	$image_one = uniqid() . '.' . $image->getClientOriginalExtension(); 
    		/*$image_one = 123123123.jpg or 123123123.png*/ 
    // 		Image::make($image)->resize(500,300)->save('image/postimg/' . $image_one);
    		Image::make($image)->save('image/postimg/' . $image_one);

    	$data['image'] = 'image/postimg/' . $image_one;
    		 // image/postimg/343434343.png

    	DB::table('posts')->insert($data);

    	$notification = array(

    		'message' => 'Post Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.post')->with($notification);
    } else {
    	return redirect()->back();
    }

  } // END Method

  public function AllPost(){

  	$post = DB::table('posts')
  		->join('categories', 'posts.category_id', 'categories.id')
  		->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
  		->join('districts', 'posts.district_id', 'districts.id')
  		->join('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
  		->select('posts.*', 'categories.category_en', 'subcategories.subcategory_en', 'districts.district_en', 'subdistricts.subdistrict_en' )
  		->orderBy('id', 'desc')->paginate(5);

  		return view('backend.post.index', compact('post'));


  }

  public function EditPost($id){

  	$post = DB::table('posts')->where('id', $id)->first();
  	$category = DB::table('categories')->get();
  	$district = DB::table('districts')->get();


  	return view('backend.post.edit', compact('post','category', 'district'));

  }

  public function UpdatePost(Request $request, $id){


    	$data = array(); // This is Query Builder
    	$data['title_en'] = $request->title_en;
    	$data['title_bg'] = $request->title_bg;
		$data['slug'] = str_replace(' ', '-', $request->title_en);
    	$data['user_id'] = Auth::id();
    	$data['category_id'] = $request->category_id;
    	$data['subcategory_id'] = $request->subcategory_id;
    	$data['district_id'] = $request->district_id;
    	$data['subdistrict_id'] = $request->subdistrict_id;
    	$data['tags_en'] = $request->tags_en;
    	$data['tags_bg'] = $request->tags_bg;
    	$data['details_en'] = $request->details_en;
    	$data['details_bg'] = $request->details_bg;
    	$data['headline'] = $request->headline;
    	$data['first_section_thumbnail'] = $request->first_section_thumbnail;
    	$data['first_section'] = $request->first_section;
    	$data['bigthumbnail'] = $request->bigthumbnail;

      $oldimage = $request->oldimage;
      $image = $request->image;
      if ($image) {
        $image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
        // Image::make($image)->resizeCanvas(500,300)->save('image/postimg/'.$image_one);
        Image::make($image)->save('image/postimg/'.$image_one);
        $data['image'] = 'image/postimg/'.$image_one;
        // image/postimg/343434.png
        DB::table('posts')->where('id',$id)->update($data);
        unlink($oldimage);

        $notification = array(
        'message' => 'Post Updated Successfully',
        'alert-type' => 'success'
       );

       return Redirect()->route('all.post')->with($notification);
      
      }else{
        $data['image'] = $oldimage;
        DB::table('posts')->where('id',$id)->update($data);
         
        $notification = array(
        'message' => 'Post Updated Successfully',
        'alert-type' => 'success'
       );
         return Redirect()->route('all.post')->with($notification);
      } // End Condition
  }  // End Method

  public function DeletePost($id){

  	$post = DB::table('posts')->where('id', $id)->first();
  	unlink($post->image);

  	DB::table('posts')->where('id', $id)->delete();

  	$notification = array(

    		'message' => 'Post Deleted Successfully',
    		'alert-type' => 'error'
    	);

    return redirect()->route('all.post')->with($notification);
  }

}
