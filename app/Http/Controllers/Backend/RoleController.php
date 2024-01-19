<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); //return user to the login page
    }

    public function InsertWriter(){

        return view('backend.role.insert');

    }

    public function StoreWriter(Request $request){

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;
        $data['ads'] = $request->ads;
        $data['gallery'] = $request->gallery;
        $data['website'] = $request->website;
        $data['setting'] = $request->setting;
        $data['post'] = $request->post;
        $data['district'] = $request->district;
        $data['category'] = $request->category;
        $data['type'] = 0;

        //return response()->json($data);

        DB::table('users')->insert($data);

        $notification = array(

            'message' => 'Writer Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.writer')->with($notification);

    }

    public function AllWriter(){

        $writer = DB::table('users')->where('type',0)->get();

        return view('backend.role.index',compact('writer'));

    }

    public function EditWriter($id){

        $writer = DB::table('users')->where('id',$id)->first();

        return view('backend.role.edit', compact('writer'));

    }

    public function UpdateWriter(Request $request, $id){

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role'] = $request->role;
        $data['ads'] = $request->ads;
        $data['gallery'] = $request->gallery;
        $data['website'] = $request->website;
        $data['setting'] = $request->setting;
        $data['post'] = $request->post;
        $data['district'] = $request->district;
        $data['category'] = $request->category;

        //return response()->json($data);

        DB::table('users')->where('id', $id)->update($data);

        $notification = array(

            'message' => 'Writer Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.writer')->with($notification);

    }

    public function DeleteWriter($id){

        DB::table('users')->where('id', $id)->delete();

        $notification = array(

                'message' => 'Writer Deleted Successfully',
                'alert-type' => 'error'
            );

        return redirect()->route('all.writer')->with($notification);
  }
}
