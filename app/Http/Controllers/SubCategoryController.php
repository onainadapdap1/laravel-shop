<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SubCategoryController extends Controller
{
    public function index() {
        $category = Category::where('status', '!=', '2')->get();
        $subcategory = SubCategory::where('status', '!=', '2')->get();
        return view('admin.collection.subcategory.index')
        ->with('category', $category)
        ->with('subcategory', $subcategory)
        ;
    }

    public function store(Request $request) {
        $subcategory = new SubCategory();
        $subcategory->category_id = $request->input('category_id');
        $subcategory->url = $request->input('url');
        $subcategory->name = $request->input('name');
        $subcategory->description = $request->input('description');
        if($request->hasFile('subcategory_image')) {
            $image_file = $request->file('subcategory_image');
            $img_filename = time()."_".$image_file->getClientOriginalName();
            $image_file->move('uploads/subcategory/', $img_filename);
            $subcategory->image = $img_filename;
        }

        $subcategory->priority = $request->input('priority');
        $subcategory->status = $request->input('status') == true ? '1' : '0';
        $subcategory->save();

        return redirect()->back()->with('status', 'Sub category ADDED successfully');

    }

    public function edit($id) {
        $category = Category::where('status', '!=', '2')->get();
        $subcategory = SubCategory::find($id);
        return view('admin.collection.subcategory.edit')
        ->with('category', $category)
        ->with('subcategory', $subcategory);
    }

    public function update(Request $request, $id) {
        $subcategory = Subcategory::find($id);
        $subcategory->category_id = $request->input('category_id');
        $subcategory->url = $request->input('url');
        $subcategory->name = $request->input('name');
        $subcategory->description = $request->input('description');

        if($request->hasFile('subcategory_image')) {
            $filepath_image = 'uploads/subcategory/' . $subcategory->subcategory_image;
            if(File::exists($filepath_image)) {
                File::delete($filepath_image);
            }
            $image_file = $request->file('subcategory_image');
            $img_filename = time()."_".$image_file->getClientOriginalName();
            $image_file->move('uploads/subcategory/', $img_filename);
            $subcategory->image = $img_filename;
        }
        $subcategory->priority = $request->input('priority');
        $subcategory->status = $request->input('status') == true ? '1' : '0';
        $subcategory->update();

        return redirect('/sub-category')->with('status', 'Sub category UPDATED successfully');
    }

    public function delete($id) {
        $subcategory = Subcategory::find($id);
        $subcategory->status = '2';
        $subcategory->update();

        return redirect()->back()->with('status', 'Subcategory DELETED successfully!');
    }
}
