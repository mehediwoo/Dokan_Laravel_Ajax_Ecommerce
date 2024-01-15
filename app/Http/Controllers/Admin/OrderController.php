<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;

class OrderController extends Controller
{
    public function order()
    {
        return view('admin.order.order');
    }
    // get pending order
    public function pending_order()
    {
        $order = order::where('status','pending')->get();
        return view('admin.order.ajax.show', compact('order'));
    }
    // get shipped order
    public function order_filter(Request $request)
    {
        $filter_data = $request->filterData;
        $order = order::where('status',$filter_data)->get();
        return view('admin.order.ajax.show', compact('order'));
    }
}
