<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ExtraController extends Controller
{
    public function Hindi(){
    
    	Session::get('lang');
    	Session()->forget('lang');
    	Session()->put('lang', 'hindi');
    	return redirect()->back();

    }

    public function English(){
    
    	Session::get('lang');
    	Session()->forget('lang');
    	Session()->put('lang', 'english');
    	return redirect()->back();
    
    }

    public function SinglePost($slug){

        $post = DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
        ->join('users', 'posts.user_id', 'users.id')
        ->select('posts.*',
            'categories.category_en', 
            'categories.category_bg',  
            'subcategories.subcategory_en', 
            'subcategories.subcategory_bg', 
            'users.name')
        ->where('posts.slug', $slug)
        ->first();


        return view('main.single_post', compact('post'));

    }

    public function CatPost($id, $category_en){

        $catposts = DB::table('posts')->where('category_id', $id)->orderBy('id', 'desc')->paginate(5);
        $catname = DB::table('categories')->where('id', $id)->first();

        return view('main.allpost', compact('catposts','catname'));

    }

    public function SubCatPost($id, $subcategory_en){


        $subcatposts = DB::table('posts')->where('subcategory_id', $id)->orderBy('id', 'desc')->paginate(5);
        $subcatname = DB::table('subcategories')->where('id', $id)->first();
        return view('main.subpost', compact('subcatposts', 'subcatname'));

    }

    public function GetSubDist($district_id){
        $sub = DB::table('subdistricts')->where('district_id', $district_id)->get();
        return response()->json($sub);
    }

    public function SearchDistrict(Request $request){
        $district_id = $request->district_id;
        $subdistrict_id = $request->subdistrict_id;

        $catposts = DB::table('posts')->where('district_id', $district_id)->where('subdistrict_id', $subdistrict_id)->orderBy('id', 'desc')->paginate(5);
        $districtname = DB::table('posts')
        ->join('districts', 'posts.district_id', 'districts.id')
        ->join('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
        ->select('posts.*',
            'subdistricts.subdistrict_en', 
            'subdistricts.subdistrict_bg', 
            'districts.district_en', 
            'districts.district_bg')
        ->where('posts.district_id', $district_id)
        ->where('posts.subdistrict_id', $subdistrict_id)
        ->first();

       return view('main.search_district', compact('catposts','districtname'));
    }
}
