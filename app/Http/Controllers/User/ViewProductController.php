<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;

class ViewProductController extends Controller
{
    public function index($slug)
    {
        // Product count
        $count = product::where('p_slug',$slug)->first();
        $count->product_count= $count->product_count +1;
        $count->update();
        // Single Product
        $product = product::where('p_slug',$slug)->first();
        // Recent View product
        $recent = product::orderBy('updated_at','desc')->take(18)->get();
        return view('user.product.view_product', compact('slug','product','recent'));
    }
}
