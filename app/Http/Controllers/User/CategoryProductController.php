<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\brand;

class CategoryProductController extends Controller
{
    public function index($slug)
    {
        $all_cate = category::latest()->take(12)->get();
        $categoryIteam = category::where('slug',$slug)->first();
        $category_product = product::where('cat_id',$categoryIteam->id)->paginate(25);
        $brand    = brand::inRandomOrder()->take(16)->get();

        return view('user.product.category_product',
         compact('slug','categoryIteam','category_product','brand','all_cate'));
    }
}
