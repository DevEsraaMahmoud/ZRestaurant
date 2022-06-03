<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chef;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Meal;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;

class MealController extends Controller
{
    public function Index(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $chef = Chef::orderBy('chef_name_en', 'ASC')->get();
        $meal = Meal::latest()->get();
        return view('backend.meal.index', compact('chef','subcategories','categories','meal'));
    }
    public function AddMeal(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $chefs = Chef::orderBy('chef_name_en', 'ASC')->get();
        return view('backend.meal.add', compact('chefs','subcategories','categories'));
    }
    public function StoreMeal(Request $request){

        /*$request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        ]);*/

        /*if ($files = $request->file('file')) {
            $destinationPath = 'upload/pdf'; // upload path
            $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$digitalItem);
        }*/



        $image = $request->file('meal_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/meals/thambnail/'.$name_gen);
        $save_url = 'upload/meals/thambnail/'.$name_gen;

        $meal_id = Meal::insertGetId([
            'chef_id' => $request->chef_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'meal_name_en' => $request->meal_name_en,
            'meal_name_ar' => $request->meal_name_ar,

            'meal_code' => $request->meal_code,

            'meal_qty' => $request->meal_qty,
            'meal_tags_en' => $request->meal_tags_en,
            'meal_tags_ar' => $request->meal_tags_ar,
            'meal_size_en' => $request->meal_size_en,
            'meal_size_ar' => $request->meal_size_ar,
            'meal_type_en' => $request->meal_type_en,
            'meal_type_ar' => $request->meal_type_ar,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ar' => $request->short_descp_ar,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_ar' => $request->long_descp_ar,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'meal_thambnail' => $save_url,

            //'digital_file' => $digitalItem,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);
        ////////// Multiple Image Upload Start ///////////

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/meals/multi-image/'.$make_name);
            $uploadPath = 'upload/meals/multi-image/'.$make_name;

            MultiImg::insert([

                'meal_id' => $meal_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);

        }

        ////////// Een Multiple Image Upload Start ///////////


        $notification = array(
            'message' => 'meal Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.meals')->with($notification);


    } // end method


    public function mealEdit ($id){

        $multiImgs = MultiImg::where('meal_id',$id)->get();
        $categories = Category::latest()->get();
        $chefs = Chef::latest()->get();
        $subcategory = SubCategory::latest()->get();
         $meals = meal::findOrFail($id);
        return view('backend.meal.edit',compact('categories','chefs','subcategory','meals','multiImgs'));

    }

    public function mealUpdate(Request $request){
        $meal_id = $request->id;
        Meal::findOrFail($meal_id)->update([
            'chef_id' => $request->chef_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'meal_name_en' => $request->meal_name_en,
            'meal_name_ar' => $request->meal_name_ar,

            'meal_code' => $request->meal_code,

            'meal_qty' => $request->meal_qty,
            'meal_tags_en' => $request->meal_tags_en,
            'meal_tags_ar' => $request->meal_tags_ar,
            'meal_size_en' => $request->meal_size_en,
            'meal_size_ar' => $request->meal_size_ar,
            'meal_type_en' => $request->meal_type_en,
            'meal_type_ar' => $request->meal_type_ar,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ar' => $request->short_descp_ar,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_ar' => $request->long_descp_ar,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,


            //'digital_file' => $digitalItem,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'meal Updated Successfully without changing images',
            'alert-type' => 'success'
        );

        return redirect()->route('all.meals')->with($notification);
    }

    public function multiImgUpdate (Request $request){
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/meals/multi-image/'.$make_name);
            $uploadPath = 'upload/meals/multi-image/'.$make_name;

            MultiImg::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ]);

        } // end foreach

        $notification = array(
            'message' => 'meal Image Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    } // end mehtod
//// Multi Image Delete ////
    public function MultiImageDelete($id){
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Meal Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method

    /// meal Main Thambnail Update /// 
    public function ThambnailImageUpdate(Request $request){
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        
        unlink($oldImage);

        $image = $request->file('meal_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/meals/thambnail/'.$name_gen);
        $save_url = 'upload/meals/thambnail/'.$name_gen;

       Meal::findOrFail($pro_id)->update([
            'meal_thambnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'meal Image Thambnail Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    } // end method
    public function MealDelete($id){
        $meal = Meal::findOrFail($id);
        unlink($meal->meal_thambnail);
        Meal::findOrFail($id)->delete();

        $images = MultiImg::where('meal_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('meal_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Meal Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// end method 

    public function mealInactive($id){
        Meal::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'meal Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function mealActive($id){
        Meal::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'meal Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
    
    
    
    
    
    
    
    
    
    
    
    
}
