<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function Index(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.subcategory.index',compact('subcategory','categories'));

    }
    public function subcategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_ar' => 'required',
            'category_id' => 'required',
        ],
            [
                'subcategory_name_en.required' => 'You must insert an English subcategory name ',
                'subcategory_name_ar.required' => 'You must insert an Arabic subcategory name ',

            ]);

        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en'=> strtolower(str_replace(' ','_',$request->subcategory_name_en)),
            'subcategory_slug_ar'=> str_replace(' ','_',$request->subcategory_name_ar),
        ]);

        $notification = array(
            'message' => 'subcategory Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function subcategoryEdit($id){
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        return view('backend.subcategory.edit', compact('categories','subcategory'));
    }

    public function subcategoryUpdate(Request $request){
        $sub_cat = $request->id;
        Subcategory::findOrFail($sub_cat)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en'=> strtolower(str_replace(' ','_',$request->subcategory_name_en)),
            'subcategory_slug_ar'=> str_replace(' ','_',$request->subcategory_name_ar),
        ]);

        $notification = array(
            'message' => 'subcategory Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subcategory')->with($notification);

    }
    public function subcategoryDelete($id){

        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'category deleted successfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function getSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);

    }






}
