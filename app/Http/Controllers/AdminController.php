<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function Logout(){

    	Auth::logout();
    	return Redirect()->route('login')->with('success', 'User Logout');
    }

    public function AccountSetting(){

        $id = Auth::user()->id; // which user is logged in
        $editData = User::find($id); //gets user data

        return view('backend.account.profile',compact('editData'));

    }

    public function ProfileEdit(){

        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('backend.account.profile_edit',compact('editData'));

    }

    public function ProfileStore(Request $request){

        $data = User::find(Auth::user()->id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->position = $request->position;

        if($request->file('image')){

            $file = $request->file('image');
            @unlink(public_path('upload/user_image/' . $data->image)); 
            //unlink the old image
            $filename = date('YmdHi') . $file->getClientOriginalName();
            // change image name to dateformat
            $file->move(public_path('upload/user_image'), $filename);
            // transfer image to folder
            $data['image'] = $filename; 
            // we save the new filename in the DB

        }

        $data->save();   

        $notification = array(

            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('account.setting')->with($notification);
         

    } // End Method

    public function ShowPassword(){

        return view('backend.account.show_password');

    }

    public function ChangePassword(Request $request){

        $validated = $request->validate([

        'oldpassword' => 'required',
        'password' => 'required|confirmed',

        ]);

        $hashedPassword = Auth::user()->password;
        // checking if passwords match
        if(Hash::check($request->oldpassword, $hashedPassword)){

            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password); // hashing the password and storing it in the DB
            $user->save();
            Auth::logout();

            $notification = array(

            'message' => 'Password Changed Successfully',
            'alert-type' => 'success'
            );

            return redirect()->route('login')->with($notification);

        } else {

            return redirect()->back();

        }   // End Else

    }   // End Method
}
