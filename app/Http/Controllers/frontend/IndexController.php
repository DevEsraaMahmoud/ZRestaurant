<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index(){
        return view('frontend.index');

    }
    public function userLogout(){
        Auth::logout();
        return redirect()->route('login')->with('error', 'Admin logout Successfully');

    }
    public function userProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
         return view('frontend.profile.user_profile', compact('user'));
    }
    public function updateProfile(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/').$data->profile_photo_path );
            $fileName = date('/YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$fileName);
            $data['profile_photo_path'] = $fileName;
        }

        $data->save();
        $notification = array(
            'message' => 'User updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }
    public function updatePassword(){
        $user = User::find(Auth::user()->id);
        return view('frontend.profile.change_password',compact('user'));
    }

    public function savePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = User::find(Auth::user()->id)->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
        }
    }
    public function BookingPage(){
        return view('frontend.booking.index');
    }


}
