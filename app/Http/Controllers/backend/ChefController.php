<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chef;
use Image;

class ChefController extends Controller
{
    public function Index(){
        $chef = Chef::latest()->get();
        return view('backend.chef.index', compact('chef'));
    }
    public function AddChef(){
        return view('backend.chef.add');
    }
    public function chefStore(Request $request){

        $image = $request->file('chef_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/chef/'.$name_gen);
        $save_url = 'upload/chef/'.$name_gen;

        $saved =  Chef::insert([
            'chef_name_en' => $request->chef_name_en,
            'chef_name_ar' => $request->chef_name_ar,
            'position_name_en' => $request->position_name_en,
            'position_name_ar' => $request->position_name_ar,
            'chef_facebook_profile' => $request->chef_facebook_profile,
            'chef_twitter_profile' => $request->chef_twitter_profile,
            'chef_instagram_profile' => $request->chef_instagram_profile,
            'chef_image'=> $save_url
        ]);

        $notification = array(
            'message' => 'chef Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.chefs')->with($notification);
    }
    public function chefEdit($id){
        $chef = Chef::findOrFail($id);
        return view('backend.chef.edit', compact('chef'));
    }

    public function chefUpdate(Request $request){
        $chef_id = $request->id;
        $old_image = $request->old_image;
        if($request->file('chef_image')){
            unlink($old_image);
            $image = $request->file('chef_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/chef/'.$name_gen);
            $save_url = 'upload/chef/'.$name_gen;
            Chef::findOrFail($chef_id)->update([
                'chef_name_en' => $request->chef_name_en,
                'chef_name_ar' => $request->chef_name_ar,
                'position_name_en' => $request->position_name_en,
                'position_name_ar' => $request->position_name_ar,
                'chef_facebook_profile' => $request->chef_facebook_profile,
                'chef_twitter_profile' => $request->chef_twitter_profile,
                'chef_instagram_profile' => $request->chef_instagram_profile,
                'chef_image'=> $save_url
            ]);

            $notification = array(
                'message' => 'chef Updated successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.chefs')->with($notification);
        }else{
            Chef::findOrFail($chef_id)->update([
                'chef_name_en' => $request->chef_name_en,
                'chef_name_ar' => $request->chef_name_ar,
                'position_name_en' => $request->position_name_en,
                'position_name_ar' => $request->position_name_ar,
                'chef_facebook_profile' => $request->chef_facebook_profile,
                'chef_twitter_profile' => $request->chef_twitter_profile,
                'chef_instagram_profile' => $request->chef_instagram_profile,
            ]);

            $notification = array(
                'message' => 'chef Updated successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.chefs')->with($notification);
        }
    }
    public function chefDelete($id){
        $chef = Chef::findOrFail($id);
        $img = $chef->chef_image;
        unlink($img);

        Chef::findOrFail($id)->delete();
        $notification = array(
            'message' => 'chef deleted successfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

}
