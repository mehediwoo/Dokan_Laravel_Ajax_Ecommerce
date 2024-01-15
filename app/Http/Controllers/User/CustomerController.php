<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\customer;

class CustomerController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'user_name'=>'required|unique:customers,user_name',
            'email'=>'required|unique:customers,email',
            'password'=>'required|min:6',
            're_type_password' => 'required_with:password|same:password|min:6'
        ]);

        $customer = new customer;
        $customer->name = $request->input('name');
        $customer->user_name = $request->input('user_name');
        $customer->email = $request->input('email');
        $customer->password = Hash::make($request->input('password'));
        $result = $customer->save();
        if ($result) {
            return true;
        }else{
            return false;
        }

    }

    // Customer Login
    public function login(Request $request)
    {
        $request->validate([
            'email_username' => 'required',
            'password' => 'required'
        ]);

        $email_username = $request->input('email_username');
        $password       = $request->input('password');

        $login_data = customer::where('email',$email_username)->orWhere('user_name',$email_username)->first();

        if ($login_data == true && Hash::check($password, $login_data->password)) {
            session()->put('user_id',$login_data->id);
            session()->put('name',$login_data->name);
            session()->put('user_name',$login_data->user_name);
            session()->put('email',$login_data->email);
            return true;
        }else{
            return false;
        }
    }

    // Customer Logout
    public function logOut()
    {
        session()->forget('name');
        session()->forget('user_name');
        session()->forget('user_id');
        session()->forget('email');
        if (request()->Is('/user/dashboard*') && request()->Is('/user/profile*')) {
            return redirect()->route('home')->with('warning','You are sign out!');
        }else{
            return redirect()->back()->with('warning','You are sign out!');
        }

    }
}
