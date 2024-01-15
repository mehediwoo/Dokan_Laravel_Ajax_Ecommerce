<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\category;
use App\Models\sub_category;
use App\Models\childCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::where('status','1')->get();
        return view('admin.sub_category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getSubCategory()
    {
        $subCategory = sub_category::orderBy('id','desc')->get();
        return view('admin.sub_category.ajax.show', compact('subCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'parentCat'=>'required',
            'title'=>'required|unique:sub_categories,title',
        ],
        [
            'parentCat.required'=>'Parrent Category field is required!'
        ]);

        $data = new sub_category;
        $data->cat_id = $request->parentCat;
        $data->title = $request->title;
        $data->slug = Str::slug($request->title, '-');
        $result = $data->save();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function UpdateSubCat(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'parentCatId'=>'required',
            'title'=>'required|unique:sub_categories,title,'.$id,
        ],
        [
            'parentCatId.required'=>'Parrent Category field is required!'
        ]);

        $data =  sub_category::findOrFail($id);
        $data->cat_id = $request->parentCatId;
        $data->title = $request->title;
        $data->slug = Str::slug($request->title, '-');
        $result = $data->update();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteSubCategory(Request $request)
    {
        $id = $request->id;
        $data = sub_category::findOrFail($id);
        $childCat = childCategory::where('sub_cat_id',$id)->get();
        if ($childCat->count()== true) {
            return false;
        }else{
            $data->delete();
            return true;
        }
    }

    // Sub Category Status Changes
    public function SubCatStatus(Request $request)
    {
        $id = $request->id;
        $sub_category = sub_category::findOrFail($id);
        $subCat = sub_category::where('cat_id',$id)->get();
        if ($sub_category->status=='1') {
            $sub_category->status='0';
            $sub_category->update();
            return 0;
        }else{
            $sub_category->status='1';
            $sub_category->update();
            return 1;
        }
    }


}
