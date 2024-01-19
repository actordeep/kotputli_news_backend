<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); //return user to the login page
    }
    
    public function SocialSetting(){

    	$social = DB::table('socials')->first();
    	return view('backend.setting.social', compact('social'));
    }

    public function UpdateSocials(Request $request, $id){

    	$data = array(); // This is Query Builder
    	$data['facebook'] = $request->facebook;
    	$data['twitter'] = $request->twitter;
    	$data['youtube'] = $request->youtube;
    	$data['linkedin'] = $request->linkedin;
    	$data['instagram'] = $request->instagram;

    	DB::table('socials')->where('id', $id)->update($data);

    	$notification = array(

    		'message' => 'Social Settings Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('social.setting')->with($notification);

    }

    public function SeoSetting(){
    	$seo = DB::table('seos')->first();
    	return view('backend.setting.seo', compact('seo'));
    }

    public function UpdateSeos(Request $request, $id){

    	$data = array(); // This is Query Builder
    	$data['meta_author'] = $request->meta_author;
    	$data['meta_title'] = $request->meta_title;
    	$data['meta_keyword'] = $request->meta_keyword;
    	$data['meta_description'] = $request->meta_description;
    	$data['google_analytics'] = $request->google_analytics;
    	$data['google_verification'] = $request->google_verification;
    	$data['alexa_analytics'] = $request->alexa_analytics;

    	DB::table('seos')->where('id', $id)->update($data);

    	$notification = array(

    		'message' => 'Seo Settings Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('seo.setting')->with($notification);
    }

    public function LiveTvSetting(){
    	$livetv = DB::table('livetvs')->first();
    	return view('backend.setting.livetv', compact('livetv'));
    }

    public function UpdateLiveTv(Request $request, $id){

    	$data = array(); // This is Query Builder
    	$data['embed_code'] = $request->embed_code;

    	DB::table('livetvs')->where('id', $id)->update($data);

    	$notification = array(

    		'message' => 'Social Settings Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('livetv.setting')->with($notification);

    }

    public function ActiveLiveTv(Request $request, $id){

    DB::table('livetvs')->where('id',$id)->update(['status'=>1]);

    $notification = array(

    		'message' => 'LiveTV Active',
    		'alert-type' => 'success'
    	);

    return redirect()->back()->with($notification);

    }

    public function DeactiveLiveTv(Request $request, $id){

    DB::table('livetvs')->where('id',$id)->update(['status'=>0]);

    $notification = array(

    		'message' => 'LiveTV Deactivated',
    		'alert-type' => 'error'
    	);

    return redirect()->back()->with($notification);

    }

    public function NoticeSetting(){
    	$notice = DB::table('notices')->first();
    	return view('backend.setting.notice', compact('notice'));
    }

    public function UpdateNotice(Request $request, $id){

    	$data = array(); // This is Query Builder
    	$data['notice'] = $request->notice;

    	DB::table('notices')->where('id', $id)->update($data);

    	$notification = array(

    		'message' => 'Notice Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('notice.setting')->with($notification);

    }

    public function ActiveNotice(Request $request, $id){

    DB::table('notices')->where('id',$id)->update(['status'=>1]);

    $notification = array(

    		'message' => 'Notice Active',
    		'alert-type' => 'success'
    	);

    return redirect()->back()->with($notification);

    }

    public function DeactiveNotice(Request $request, $id){

    DB::table('notices')->where('id',$id)->update(['status'=>0]);

    $notification = array(

    		'message' => 'Notice Deactivated',
    		'alert-type' => 'error'
    	);

    return redirect()->back()->with($notification);

    }

    public function WebsiteSetting(){

    	$website = DB::table('websites')->orderBy('id','desc')->paginate(5);
    	return view('backend.website.index', compact('website'));

    }

    public function AddWebsite(){

    	return view('backend.website.create');

    }

    public function StoreWebsite(Request $request){

    	$validated = $request->validate([

        'website_name' => 'required',
        'website_link' => 'required',

    	]);

    	$data = array(); // This is Query Builder
    	$data['website_name'] = $request->website_name;
    	$data['website_link'] = $request->website_link;

    	DB::table('websites')->insert($data);

    	$notification = array(

    		'message' => 'Website Link Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.website')->with($notification);

    }

    public function EditWebsite($id){
    	$website = DB::table('websites')->where('id', $id)->first();
    	return view('backend.website.edit', compact('website'));
    }

    public function UpdateWebsite(Request $request, $id){

    	$validated = $request->validate([

        'website_name' => 'required',
        'website_link' => 'required',

    	]);

    	$data = array(); // This is Query Builder
    	$data['website_name'] = $request->website_name;
    	$data['website_link'] = $request->website_link;
    	DB::table('websites')->where('id', $id)->update($data);

    	$notification = array(

    		'message' => 'Website Link Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.website')->with($notification);

    }

    public function DeleteWebsite($id){

    	DB::table('websites')->where('id', $id)->delete();

    	$notification = array(

    		'message' => 'Website Deleted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.website')->with($notification);
    }

    // MainWeb Settings

    public function MainWebSetting(){

        $websitesetting = DB::table('websitesettings')->first();

        return view('backend.setting.website', compact('websitesetting'));

    }

    public function UpdateWeb(Request $request, $id){

        $data = array(); // This is Query Builder
        $data['address'] = $request->address;
        $data['phone_en'] = $request->phone_en;
        $data['phone_bg'] = $request->phone_bg;
        $data['email'] = $request->email;
       
      $oldimage = $request->oldlogo;
      $image = $request->logo;
      if ($image) {
        $image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
        // Image::make($image)->resize(320,130)->save('image/logo/'.$image_one);
        Image::make($image)->save('image/logo/'.$image_one);
        $data['logo'] = 'image/logo/'.$image_one;
        // image/postimg/343434.png
        DB::table('websitesettings')->where('id',$id)->update($data);
        unlink($oldimage);

        $notification = array(
        'message' => 'Website Updated Successfully',
        'alert-type' => 'success'
       );

       return Redirect()->route('web.setting')->with($notification);
      
      }else{
        $data['logo'] = $oldimage;
        DB::table('websitesettings')->where('id',$id)->update($data);
         
        $notification = array(
        'message' => 'Website Updated Successfully',
        'alert-type' => 'success'
       );
         return Redirect()->route('web.setting')->with($notification);
      } // End Condition

    } // End Method

}
