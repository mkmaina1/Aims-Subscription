<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;


class RoleController extends Controller
{
    public function index() {
    $roles = Role::all();
    return view('roles.index', compact('roles'));
}
public function create() {
    return view('roles.create');
}
public function store(Request $request) {
    $request->validate(['name' => 'required|unique:roles']);
    Role::create($request->only('name'));
    return redirect()->route('roles.index');
}
public function edit(Role $role) {
    return view('roles.edit', compact('role'));
}
public function update(Request $request, Role $role) {
    $request->validate(['name' => 'required|unique:roles,name,' . $role->id]);
    $role->update($request->only('name'));
     return redirect()->route('roles.index')->with('success', 'User Role updated successfully.');
}
public function destroy(Role $role) {
    $role->delete();
    return redirect()->route('roles.index');
}
}
