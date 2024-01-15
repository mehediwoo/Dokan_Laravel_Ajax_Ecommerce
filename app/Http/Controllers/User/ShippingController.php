<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shipping;

class ShippingController extends Controller
{
    public function index()
    {
        $user_id = session()->get('user_id');
        $data = shipping::where('user_id',$user_id)->first();
        if ($data->user_id==$user_id) {
            return redirect()->route('checkout');
        }else{
            return view('user.shipping.index');
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'mobile'=>'required',
            'home_phone'=>'required',
            'division'=>'required',
            'city'=>'required',
            'address'=>'required',
        ]);

        $data = new shipping;
        $data->user_id = session()->get('user_id');
        $data->name = $request->name;
        $data->cell_phone = $request->mobile;
        $data->home_phone = $request->home_phone;
        $data->division = $request->division;
        $data->city     = $request->city;
        $data->address  = $request->address;
        $data->save();
        return response()->json(['success'=>'Data save successfully!']);
    }
}
