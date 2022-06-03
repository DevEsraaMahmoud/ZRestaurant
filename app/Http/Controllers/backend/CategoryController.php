<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;

class CategoryController extends Controller
{
    public function Index(){
        $category = Category::latest()->get();
        return view('backend.category.index', compact('category'));
    }
    public function categoryStore(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_ar' => 'required',
            'category_image' => 'required'
        ],
            [
                'category_name_en.required' => 'You must insert an English category name ',
                'category_name_ar.required' => 'You must insert an Arabic category name ',
                'category_image.required' => 'You must insert a category image'

            ]);
        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/category/'.$name_gen);
        $save_url = 'upload/category/'.$name_gen;
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_en'=> strtolower(str_replace(' ','_',$request->category_name_en)),
            'category_slug_ar'=> str_replace(' ','_',$request->category_name_ar),
            'category_image'=> $save_url
        ]);

        $notification = array(
            'message' => 'category Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function categoryEdit($id){
        $category = category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }
    public function categoryUpdate(Request $request){
        $category_id = $request->id;
        $old_image = $request->old_image;
        if($request->file('category_image')){
            unlink($old_image);
            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/category/'.$name_gen);
            $save_url = 'upload/category/'.$name_gen;
            Category::findOrFail($category_id)->update([
                'category_name_en' => $request->category_name_en,
                'category_name_ar' => $request->category_name_ar,
                'category_slug_en'=> strtolower(str_replace(' ','_',$request->category_name_en)),
                'category_slug_ar'=> str_replace(' ','_',$request->category_name_ar),
                'category_image'=> $save_url
            ]);

            $notification = array(
                'message' => 'category Updated successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.category')->with($notification);
        }else{
            Category::findOrFail($category_id)->update([
                'category_name_en' => $request->category_name_en,
                'category_name_ar' => $request->category_name_ar,
                'category_slug_en'=> strtolower(str_replace(' ','_',$request->category_name_en)),
                'category_slug_ar'=> str_replace(' ','_',$request->category_name_ar),
            ]);

            $notification = array(
                'message' => 'category Updated successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.category')->with($notification);
        }
    }
    public function categoryDelete($id){
        $category = category::findOrFail($id);
        $img = $category->category_image;
        unlink($img);

        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'category deleted successfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    
    
    
    
    
}
