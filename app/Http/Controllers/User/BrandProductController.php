<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\brand;

class BrandProductController extends Controller
{
    public function index($slug)
    {
        $all_cate = category::latest()->take(12)->get();
        $brand    = brand::inRandomOrder()->take(16)->get();

        $brand_id = brand::where('slug',$slug)->first();
        $product = product::where('brand_id',$brand_id->id)->paginate(16);


        return view('user.product.child_category_product', compact(
            'slug',
            'all_cate',
            'brand',
            'product'
        ));
    }
}
