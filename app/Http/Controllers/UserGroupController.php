<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserGroup;



class UserGroupController extends Controller
{
   public function index() {
    $groups = UserGroup::all();
    return view('user-groups.index', compact('groups'));
}
public function create() {
    return view('user-groups.create');
}
public function store(Request $request) {
    $request->validate(['name' => 'required|unique:user_groups']);
    UserGroup::create($request->only('name'));
    return redirect()->route('user-groups.index');
}
public function edit(UserGroup $userGroup) {
    return view('user-groups.edit', compact('userGroup'));
}
public function update(Request $request, UserGroup $userGroup) {
    $request->validate(['name' => 'required|unique:user_groups,name,' . $userGroup->id]);
    $userGroup->update($request->only('name'));
    return redirect()->route('user-groups.index')->with('success', 'User group updated successfully.');
}
public function destroy(UserGroup $userGroup) {
    $userGroup->delete();
    return redirect()->route('user-groups.index');
}
}
