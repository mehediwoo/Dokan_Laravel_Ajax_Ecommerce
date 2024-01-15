<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\shipping;
use App\Models\order;

class CheckoutController extends Controller
{
    public function index()
    {
        $user_id = session()->get('user_id');
        $shipping_info = shipping::where('user_id',$user_id)->first();
        $cart    = cart::where('user_id',$user_id)->get();
        return view('user.checkout.index',compact('shipping_info','cart'));
    }

    // Confirm order
    public function ConfirmOrder(Request $request)
    {
        if ($request->all() == null) {
            return response()->json(['error'=>'Select your payment method']);
        }else{
            $user_id = session()->get('user_id');
            $shipp = shipping::where('user_id',$user_id)->first();
            $cart  = cart::where('user_id',$user_id)->get();
            foreach ($cart as $iteam) {
                $order = new order;
                $order->user_id     = $user_id;
                $order->shipping_id = $shipp->id;
                $order->product_id = $iteam->p_id;
                $order->size = $iteam->size;
                $order->color = $iteam->color;
                $order->quantity = $iteam->quantity;
                $order->price = $iteam->price;
                $order->total_price = $iteam->quantity * $iteam->price;
                $order->payment_method = $request->input('payment_method');
                $result = $order->save();
            }
            if ($result) {
                Cart::where('user_id',$user_id)->delete();
                return response()->json(['success'=>'Order is complete, please wait for confarmation']);
            }else{
                return response()->json(['error'=>'Internal error, please try again']);
            }
        }
    }
}
