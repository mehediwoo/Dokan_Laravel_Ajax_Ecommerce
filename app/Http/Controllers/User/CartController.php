<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\cart;

class CartController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'size'=>'required',
            'color'=>'required',
            'qty'=>'required'
        ],[
            'qty.required'=>'Quantity is empty'
        ]);

        $user_id = session()->get('user_id');
        $p_id    = $request->input('product_id');
        $stock   = $request->input('stock');
        $price   = $request->input('selling_price');

        $iteam   = cart::where('p_id',$p_id)->where('user_id',$user_id)->first();

        if ($stock < $request->qty) {
            return response()->json(['error'=>'Quantiy is more then our stck']);
        }elseif(!empty($iteam)  && $iteam->p_id == $p_id and $iteam->user_id == $user_id){
            return response()->json(['error'=>'Iteam allready in your cart']);
        }else{
            $cart = new cart;
            $cart->user_id  = $user_id;
            $cart->p_id     = $p_id;
            $cart->size     = $request->input('size');
            $cart->color    = $request->input('color');
            $cart->quantity = $request->input('qty');
            $cart->price    = $price;
            $cart->total_price  = $request->input('qty') * $price;
            $result = $cart->save();
            if ($result) {
                //  product quantity managment
                $product = product::where('id',$p_id)->first();
                $product->p_qty = $product->p_qty - $request->input('qty');
                $product->save();
                return response()->json(['success'=>'Iteam has been added to cart successfully']);
            }
        }
    }

    public function view_cart()
    {
        return view('user.cart.cart');
    }

    // get cart iteam
    public function get_cart_iteam()
    {
        $user_id= session()->get('user_id');
        $cart = cart::where('user_id',$user_id)->get();
        return view('user.cart.ajax.cart_list', compact('cart'));
    }

    public function remove_cart(Request $request)
    {
        $id = $request->id;
        $cart = cart::findOrFail($id);
        if ($cart==true) {
            $cart->delete();
            return true;
        }
    }

    public function plus_cart(Request $request)
    {
        $id = $request->input('id');
        $cart = cart::findOrFail($id);
        if ($cart) {
            $cart->quantity = $cart->quantity +1;
            $cart->total_price = $cart->quantity * $cart->price;
            $cart->update();
            //  product quantity managment
            $product = product::where('id',$cart->p_id)->first();
            $product->p_qty = $product->p_qty - 1;
            $product->save();
            return response()->json(['success'=>'Quantity added successfully']);

        }
    }

    public function minus_cart(Request $request)
    {
        $id = $request->input('id');
        $cart = cart::findOrFail($id);
        if ($cart->quantity > 1) {
            $cart->quantity = $cart->quantity -1;
            $cart->total_price = $cart->quantity * $cart->price;
            $cart->update();
            //  product quantity managment
            $product = product::where('id',$cart->p_id)->first();
            $product->p_qty = $product->p_qty + 1;
            $product->save();
            return response()->json(['info'=>'Quantity less successfully']);

        }else{
            return response()->json(['error'=>'Quantity is not les then 1 pice']);
        }
    }
}
