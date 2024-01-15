<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\banner;
use App\Models\brand;
use App\Models\category;

class HomeController extends Controller
{
    public function home()
    {
        $banner = banner::first();
        $hot_deal = product::where('p_hot_deal','on')->latest()->take(4)->get();
        $feature_product = product::where('p_feature','on')->latest()->take(16)->get();
        $category_product = category::inRandomOrder()->take(3)->get();
        return view('user.home', compact(
            'banner',
            'hot_deal',
            'category_product',
            'feature_product'
        ));
    }

    // Product quick view
    public function quick_view(Request $request)
    {
        $id = $request->id;
        $product = product::findOrFail($id);
        return view('user.assets.quick_view', compact('product'));
    }
}
