<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Exceptions\InvalidOrderException;
class AdminController extends Controller
{

    public function Dashboard(){
        return view('admin.index');
    }
    public function Login(){
        return view('admin.login');
    }
    public function adminLogin(Request $request){

        /*        dd($request->all());*/
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'] ,
            'password' => $check['password'] ])){
            return redirect()->route('admin.dashboard')->with('error', 'Admin login Successfully');
        }else{
            return back()->with('error', 'Invalid email or password');
        }
    }

    public function Logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error', 'Admin logout Successfully');

    }
    public function Register(){
        return view('admin.register');
    }
    public function adminRegister(Request $request){
        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),

        ]);
        return redirect()->route('admin.login')->with('error', 'Admin Created Successfully');    }

    public function Profile(){
        $AdminData = Admin::find(1);
        return view('admin.profile', compact('AdminData'));
    }

    public function EditProfile(){
        $AdminData = Admin::find(1);
        return view('admin.edit_profile', compact('AdminData'));
    }

    public function SaveProfile( Request $request){
        $data = Admin::find(1);
        $data-> name = $request->name;
        $data-> email = $request->email;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/').$data->profile_photo_path );
            $fileName = date('/YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$fileName);
            $data['profile_photo_path'] = $fileName;
        }

        $data->save();
        $notification = array(
            'message' => 'Admin updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    public function ChangePassword(){
        $AdminData = Admin::find(1);
        return view('admin.change_password',compact('AdminData'));
    }


    public function SavePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Admin::find(3)->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $admin = Admin::find(3);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }
    }
}
