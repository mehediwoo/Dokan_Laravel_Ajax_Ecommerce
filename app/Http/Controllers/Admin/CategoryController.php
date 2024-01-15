<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\category;
use App\Models\sub_category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|unique:categories,title',
            'icon'=> 'required',
        ]);

        $data = new category;
        $data->title = $request->title;
        $data->slug = Str::slug($request->title, '-');
        $data->icon = $request->icon;
        $result = $data->save();
        if ($result) {
            return true;
        }else{
            return false;
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCategory(Request $request)
    {
        $id = $request->id;
        $data = category::findOrFail($id);
        $data->icon = $request->icon;
        $data->title = $request->title;
        $data->slug = Str::slug($request->title, '-');
        $result = $data->update();
        if ($result) {
           return true;
        }else{
            return false;
        }
    }



    // Get Category
    public function getCate(){
        $category = category::orderBy('id','desc')->get();
        return view('admin.category.ajax.show', compact('category'));
    }
    // Delete Category
    public function deleteCate(Request $request)
    {
        $id = $request->id;
        $data = category::findOrFail($id);
        $subCat = sub_category::where('cat_id',$id)->get();
        if ($subCat->count()==true) {
            return false;
        }else{
            $result = $data->delete();
            return true;
        }

    }
    // Category Status
    public function CategoryStatus(Request $request)
    {
        $id = $request->id;
        $category = category::findOrFail($id);
        if ($category->status=='1') {
            $category->status='0';
            $category->update();
            return 0;
        }else{
            $category->status='1';
            $category->update();
            return 1;
        }
    }
}
