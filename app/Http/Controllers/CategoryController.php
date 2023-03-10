<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::where('status', '!=', '2')->get();
        return view('admin.collection.category.index', compact('category'));
    }
    public function create() {
        $group = Group::where('status', '!=', '2')->get();
        return view('admin.collection.category.create', compact('group'));
    }
    public function store(Request $request) {
        $category = new Category();
        $category->group_id = $request->input('group_id');
        $category->url = $request->input('url');
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        if($request->hasFile('category_img')) {
            $image_file = $request->file('category_img');
            $img_filename = time()."_".$image_file->getClientOriginalName();
            $image_file->move('uploads/categoryimage/', $img_filename);
            $category->image = $img_filename;
        }
        if($request->hasFile('category_icon')) {
            $icon_file = $request->file('category_icon');
            $icon_filename = time()."_".$icon_file->getClientOriginalName();
            $icon_file->move('uploads/categoryicon/', $icon_filename);
            $category->icon = $icon_filename;
        }

        $category->status = $request->input('status') == true ? '1' : '0';
        $category->save();

        return redirect('/category')->with('status', 'category ADDED successfully');
    }
    public function edit($id) {
        $group = Group::where('status', '!=', '2')->get();
        $category = Category::find($id);
        return view('admin.collection.category.edit')
        ->with('group', $group)
        ->with('category', $category);
    }
    public function update(Request $request, $id) {
        $category = Category::find($id);
        $category->group_id = $request->input('group_id');
        $category->url = $request->input('url');
        $category->name = $request->input('name');
        $category->description = $request->input('description');

        if($request->hasFile('category_img')) {
            $filepath_image = 'uploads/categoryimage/' . $category->image;
            if(File::exists($filepath_image)) {
                File::delete($filepath_image);
            }

            $image_file = $request->file('category_img');
            $img_filename = time()."_".$image_file->getClientOriginalName();
            $image_file->move('uploads/categoryimage/', $img_filename);
            $category->image = $img_filename;
        }

        if($request->hasFile('category_icon')) {
            $filepath_image = 'uploads/categoryicon/' . $category->icon;
            if(File::exists($filepath_image)) {
                File::delete($filepath_image);
            }

            $icon_file = $request->file('category_icon');
            $icon_filename = time()."_".$icon_file->getClientOriginalName();
            $icon_file->move('uploads/categoryicon/', $icon_filename);
            $category->icon = $icon_filename;
        }
        $category->status = $request->input('status') == true ? '1' : '0';
        $category->update();

        return redirect('/category')->with('status', 'category UPDATED successfully');
    }
    public function delete($id) {
        $category = Category::find($id);
        $category->status = "2";
        $category->update();

        return redirect('/category')->with('status', 'category DELETED successfully');
    }
    public function deletedrecords() {
        $category = Category::where('status', '=', '2')->get();
        return view('admin.collection.category.deleted', compact('category'));
    }
    public function deletedrestore($id) {
        $category = Category::find($id);
        $category->status = "0";
        $category->update();

        return redirect('/category')->with('status', 'Category data RE-STORED successfully');
    }
}
