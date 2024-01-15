<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\Models\brand;

class BrandController extends Controller
{
    // Show Index page
    public function index()
    {
        return view('admin.brand.index',);
    }
    // Get Brands
    public function getBrand()
    {
        $brand = brand::orderBy('id','desc')->get();
        return view('admin.brand.ajax.show',compact('brand'));
    }
    // Insert Brand Data
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:brands,brand_name',
            'logo'=>'required|image'
        ]);

        $data = new brand;
        $data->brand_name = $request->input('title');
        $data->slug =Str::slug($request->input('title'));

        $folder = 'brand_images';

        if(!file_exists(base_path('storage/app/public/'). $folder)){
            mkdir(base_path('storage/app/public/') . $folder,755,true);
        }

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $name  = Str::random(25).".".$logo->extension();
            $image = Image::make($logo)->resize(80,40);
            $image->save(base_path('storage/app/public/').$folder."/".$name);
            $data->brand_logo = $folder."/".$name;
        }
        $result = $data->save();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }
    // delete brand
    public function deleteBrand(Request $request)
    {
        $id = $request->input('id');
        $data = brand::findOrFail($id);
        if ($data==true) {
            $delete = $data->delete();
            if (file_exists(base_path('storage/app/public/'.$data->brand_logo))) {
                unlink(base_path('storage/app/public/'.$data->brand_logo));
            }
            return true;
        }
    }
    // Update brand
    public function updateBrand(Request $request)
    {
        $id = $request->input('id');
        $request->validate([
            'title'=>'required|unique:brands,brand_name,'.$id,
            'logo'=>'image'
        ]);


        $data = brand::findOrFail($id);
        $data->brand_name = $request->input('title');
        $data->slug =Str::slug($request->input('title'));

        $folder = 'brand_images';

        if($request->hasFile('logo')){
            if (file_exists(base_path('storage/app/public/'.$data->brand_logo))) {
                unlink(
                    base_path('storage/app/public/'.$data->brand_logo)
                );
            }
            $logo = $request->file('logo');
            $name  = Str::random(25).".".$logo->extension();
            $image = Image::make($logo)->resize(80,40);
            $image->save(base_path('storage/app/public/').$folder."/".$name);
            $data->brand_logo = $folder."/".$name;
        }
        $result = $data->update();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }
    // Brand Status
    public function statusBrand(Request $request)
    {
        $id = $request->id;
        $brand = brand::findOrFail($id);
        if ($brand->status=='1') {
            $brand->status='0';
            $brand->update();
            return 0;
        }else{
            $brand->status='1';
            $brand->update();
            return 1;
        }
    }
}
