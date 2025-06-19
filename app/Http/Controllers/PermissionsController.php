<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function index()
    {
        $permissions = Permissions::latest()->get();
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        $roles = Role::select('name')->get();
        return view('permissions.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'permission_group' => 'required|string|max:255',
        ]);

        try {
            Permissions::create([
                'name' => $request->name,
                'permission_group' => $request->permission_group,
            ]);

            return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
        } catch (\Exception $e) {
            // dd($e);
            return redirect()->back()->withErrors(['error' => 'Failed to create permission. Please try again.']);
        }
    }


    public function edit(Permissions $permission)
    {
        $roles = Role::select('name')->get();
        return view('permissions.edit', compact('permission', 'roles'));
    }

    public function update(Request $request, Permissions $permission)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'permission_group' => 'required|string|max:255',
        ]);

        try {
            $permission->update([
                'name' => $request->name,
                'permission_group' => $request->permission_group,
            ]);

            return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update permission. Please try again.']);
        }
    }



    public function destroy(Permissions $permission)
    {
        // dd($request->all());
        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permission deleted.');
    }
}


