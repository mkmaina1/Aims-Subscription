<?php

namespace App\Http\Controllers;

use App\Models\UserGroup;
use App\Models\EntityStatus;
use App\Models\Permissions; 
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    public function index() {
        $groups = UserGroup::with('entityStatus')->get(); // Eager load entity status
        return view('user-groups.index', compact('groups'));
    }

    public function create()
    {
        $entityStatuses = EntityStatus::all(); // Fetch all entity statuses
        $permissions = Permissions::all(); // Fetch all permissions
        return view('user-groups.create', compact('entityStatuses', 'permissions'));
    }

//     public function store(Request $request)
// {
//     $request->validate([
//         'name' => 'required|unique:user_groups,name',
//         'entity_status_id' => 'required|exists:entity_statuses,id',
//         'permissions' => 'required|array',
//         // 'permissions.*' => 'exists:permissions,name', // Ensure permission names exist
//     ]);

//     $userGroup = UserGroup::create([
//         'name' => $request->name,
//         'entity_status_id' => $request->entity_status_id,
//     ]);

//     // Update permissions with the user group's name
//     Permissions::whereIn('name', $request->permissions)->update([
//         'permission_group' => $userGroup->name,
//     ]);

//     return redirect()->route('user-groups.index')->with('success', 'User group created and permissions assigned.');
// }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'entity_status_id' => 'required|exists:entity_statuses,id', // Validate entity status
         'permissions' => 'required|array',
    ]);

    $userGroup = UserGroup::create([
        'name' => $request->name,
        'entity_status_id' => $request->entity_status_id,
    ]);

    // Update permissions with the user group's name
    Permissions::whereIn('name', $request->permissions)->update([
        'permission_group' => $userGroup->name,
    ]);

    return redirect()->route('user-groups.index')->with('success', 'User  group created and permissions assigned.');
}
        
    public function edit(UserGroup $userGroup)
    {
        $entityStatuses = EntityStatus::all(); // Fetch all entity statuses
        $permissions = Permissions::all(); // Fetch all permissions
        return view('user-groups.edit', compact('userGroup', 'entityStatuses', 'permissions'));
    }

    // public function update(Request $request, UserGroup $userGroup)
    // {
    //     $request->validate([
    //         'name' => 'required|unique:user_groups,name,' . $userGroup->id,
    //         'entity_status_id' => 'required|exists:entity_statuses,id', // Validate entity status
    //         'permissions' => 'required|array', // Validate permissions
    //     ]);

    //     $userGroup->update([
    //         'name' => $request->name,
    //         'entity_status_id' => $request->entity_status_id, // Update entity status
    //     ]);

    //     // Sync permissions
    //     // $userGroup->permissions()->sync($request->permissions);

    //     return redirect()->route('user-groups.index')->with('success', 'User  group updated successfully.');
    // }
    public function update(Request $request, UserGroup $userGroup)
{
    $request->validate([
        'name' => 'required|unique:user_groups,name,' . $userGroup->id,
        'entity_status_id' => 'required|exists:entity_statuses,id', // Validate entity status
        'permissions' => 'required|array', // Validate permissions
    ]);

    $userGroup->update([
        'name' => $request->name,
        'entity_status_id' => $request->entity_status_id, // Update entity status
    ]);

    // Sync permissions
    // $userGroup->permissions()->sync($request->permissions);

    return redirect()->route('user-groups.index')->with('success', 'User  group updated successfully.');
}

    public function destroy(UserGroup $userGroup) {
        $userGroup->delete();
        return redirect()->route('user-groups.index')->with('success', 'User  group deleted successfully.');
    }
}
