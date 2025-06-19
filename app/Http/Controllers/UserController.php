<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('userGroup')->get(); 

        return view('users.index', compact('users'));
    }

    // public function create()
    // {
    //     $groups = UserGroup::all();
    //     return view('users.create', compact('groups'));
    // }
    public function create()
{
    // Fetch only active user groups
    $groups = UserGroup::where('entity_status_id', '=', 1) // Assuming 1 is the ID for active status
        ->get();
    return view('users.create', compact('groups'));
}


    public function store(Request $request)
    {
                // dd($request->all());

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'user_group_id' => 'required',
            'password' => 'required|min:6',
            'status' => 'required',


        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('users.index')->with('success', 'User created.');
    }

    // public function edit(User $user)
    // {
    //     $groups = UserGroup::all();
    //     return view('users.edit', compact('user', 'groups'));
    // }
    public function edit(User $user)
{
    // Fetch only active user groups
    $groups = UserGroup::where('entity_status_id', '=', 1) // Assuming 1 is the ID for active status
        ->get();
    return view('users.edit', compact('user', 'groups'));
}


    public function update(Request $request, User $user)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'email' => "required|email|unique:users,email,{$user->id}",
            'user_group_id' => 'required',
            'password' => 'nullable|min:6',
            'status'=> 'required',
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted.');
    }
}
