<?php

namespace App\Http\Controllers;

use App\Models\PasswordPolicy;
use Illuminate\Http\Request;

class PasswordPolicyController extends Controller
{
    public function index()
    {
        $policies = PasswordPolicy::all();
        return view('password-policies.index', compact('policies'));
    }

    public function create()
    {
        return view('password-policies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'min_length' => 'required|integer|min:6|max:64',
            'require_uppercase' => 'boolean',
            'require_number' => 'boolean',
            'require_special' => 'boolean',
        ]);

       PasswordPolicy::create($request->only([
    'min_length',
    'require_uppercase',
    'require_number',
    'require_special',
        ]));

        return redirect()->route('password-policies.index')->with('success', 'Password policy created successfully.');
    }

    public function edit(PasswordPolicy $passwordPolicy)
    {
        return view('password-policies.edit', compact('passwordPolicy'));
    }

    public function update(Request $request, PasswordPolicy $passwordPolicy)
    {
        $request->validate([
            'min_length' => 'required|integer|min:6|max:64',
            'require_uppercase' => 'boolean',
            'require_number' => 'boolean',
            'require_special' => 'boolean',
        ]);

        $passwordPolicy->update($request->all());
        return redirect()->route('password-policies.index')->with('success', 'Password policy updated.');
    }

    public function destroy(PasswordPolicy $passwordPolicy)
    {
        $passwordPolicy->delete();
        return redirect()->route('password-policies.index')->with('success', 'Password policy deleted.');
    }
}


