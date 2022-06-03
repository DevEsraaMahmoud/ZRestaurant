<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chef;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Meal;
use App\Models\MultiImg;
use Carbon\Carbon;

class MenuController extends Controller
{
    public function Index(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
         $chefs = Chef::orderBy('chef_name_en', 'ASC')->get();

        return view('frontend.menu.index', compact('chefs','categories'));
    }
}
