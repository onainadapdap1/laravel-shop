<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index() {
        $group = Group::where('status', '!=', '2')->get();
        return view('admin.collection.group.index', compact('group'));
    }
    public function create() {
        return view('admin.collection.group.create');
    }
    public function store(Request $request) {
        $group = new Group();
        $group->url = $request->input('url');
        $group->name = $request->input('name');
        $group->description = $request->input('description');
        if($request->input('status') == true) {
            $group->status = "1";
        } else {
            $group->status = "0";
        }

        $group->save();
        return redirect()->back()->with('status', 'Group data added successfully');
    }
    public function edit($id) {
        $group = Group::find($id);
        return view('admin.collection.group.edit', compact('group'));
    }
    public function update(Request $request, $id) {
        $group = Group::find($id);
        $group->url = $request->input('url');

        $group->name = $request->input('name');
        $group->description = $request->input('description');
        $group->status = $request->input('status') == true ? '1' : '0';
        $group->update();

        return redirect()->back()->with('status', 'Group data UPDATED successfully');
    }
    public function delete($id){
        $group = Group::find($id);
        $group->status = "2";
        $group->update();

        return redirect()->back()->with('status', 'Group data DELETED successfully');
    }
    public function deletedrecords() {
        $group = Group::where('status', '2')->get();
        return view('admin.collection.group.deleted', compact('group'));
    }
    public function deletedrestore($id) {
        $group = Group::find($id);
        $group->status = "0";
        $group->update();

        return redirect('/group')->with('status', 'Group data RE-STORED successfully');
    }
}
