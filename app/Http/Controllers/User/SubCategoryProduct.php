<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\brand;
use App\Models\sub_category;

class SubCategoryProduct extends Controller
{
    public function index($slug)
    {
        $all_cate = category::latest()->take(12)->get();
        $brand    = brand::inRandomOrder()->take(16)->get();

        $sub_category = sub_category::where('slug',$slug)->first();
        $product = product::where('sub_cat_id',$sub_category->id)->paginate(25);


        return view('user.product.sub_category_product', compact(
            'slug',
            'all_cate',
            'brand',
            'product'
        ));
    }
}
