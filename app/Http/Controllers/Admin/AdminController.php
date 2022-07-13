<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function LogOut(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function UpdateProfilePage()
    {
        return view('Admin.profile.update-profile-page');
    }

    public function UpdateProfile(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'username' => 'required',
        ]);

        if(Auth::user()) {
           User::find(Auth::user()->id)->update([
               'name'=>$request->username,
               'email'=>$request->email,
            ]);
        }

        $custom_msg =[
            'message'=>'Successfully Updated Profile',
            'alert-type'=>'success',
        ];

        return redirect()->back()->with($custom_msg);
    }

    public function changePasswordPage()
    {
       $admin_user =  Auth::user();
        return view('Admin.profile.change-password',compact('admin_user'));
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
           'old_password'=>'required',
           'new_password'=>'required',
           'confirm_password'=>'required|same:new_password',
        ]);

        $old_pass = $request->oldpass;
        if(Hash::check($request->old_password,$old_pass)){
            User::find(Auth::user()->id)->update([
               'password'=>Hash::make($request->new_password)
            ]);
            session()->flash('message','Password Updated Successfully');
            return redirect()->back();
        }
        session()->flash('message','old password not correct');
        return redirect()->back();
    }

    public function UpdateProfilePhoto(Request $request)
    {
        $selected_photo  = $request->file('photo');

        $old_image = $request->oldImage;
        #dd($selected_photo)->toArray();
        $new_name = hexdec(uniqid()).'.'.$selected_photo->getClientOriginalExtension();
        $img_loc = 'assets/images/profiles/';
        $selected_photo->move($img_loc,$new_name);
        $save_img = $img_loc.$new_name;


        if(!empty($old_image)){
            unlink($old_image);
        }

        User::find(Auth::user()->id)->update([
           'profile_picture'=> $save_img,
        ]);


        $custom_msg =[
            'message'=>'Successfully Updated Profile Picture',
            'alert-type'=>'success',
        ];

        return redirect()->back()->with($custom_msg);

    }
}
