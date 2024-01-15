<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\category;
use App\Models\sub_category;
use App\Models\childCategory;

class ChildCategoryController extends Controller
{
    public function index()
    {
        $sub_cat = sub_category::orderBy('id','desc')->get();
        return view('admin.child_category.index', compact('sub_cat'));
    }
    // Get Child Category
    public function getChildCategory()
    {
        $child_cat = childCategory::orderBy('id','desc')->get();
        return view('admin.child_category.ajax.show', compact('child_cat'));
    }
    // Child category store in database
    public function store(Request $request)
    {
        $request->validate([
            'subCat'=>'required',
            'title' =>'required|unique:child_categories,title'
        ],[
            'subCat.required'=>'Sub Category is required!'
        ]);

        $data = new childCategory;
        $data->sub_cat_id= $request->subCat;
        $data->title= $request->title;
        $data->slug= Str::slug($request->title,'-');
        $result = $data->save();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    // Destroy Child Category
    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = childCategory::findOrFail($id);
        $result = $data->delete();
        if ($result) {
            return true;
        }else{

            return false;
        }
    }
    // Update Child Category
    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'parentSubCategory'=>'required',
            'title' =>'required|unique:child_categories,title,'.$id,
        ],[
            'parentSubCategory.required'=>'Sub Category is required!'
        ]);

        $data = childCategory::findOrFail($id);
        $data->sub_cat_id= $request->parentSubCategory;
        $data->title= $request->title;
        $data->slug= Str::slug($request->title,'-');
        $result = $data->update();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }
    // Change child category status
    public function status(Request $request)
    {
        $id = $request->id;
        $data = childCategory::findOrFail($id);
        if ($data->status=='1') {
            $data->status='0';
            $data->update();
            return 0;
        }else{
            $data->status='1';
            $data->update();
            return 1;
        }
    }
}
