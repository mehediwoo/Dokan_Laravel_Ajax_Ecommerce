<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\brand;
use App\Models\childCategory;

class ChildCategoryProduct extends Controller
{
    public function index($slug)
    {
        $all_cate = category::latest()->take(12)->get();
        $brand    = brand::inRandomOrder()->take(16)->get();

        $child_category = childCategory::where('slug',$slug)->first();
        $product = product::where('child_cat_id',$child_category->id)->paginate(16);


        return view('user.product.child_category_product', compact(
            'slug',
            'all_cate',
            'brand',
            'product'
        ));
    }
}
