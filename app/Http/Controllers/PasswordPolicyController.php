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
        $data = $request->validate([
            'min_length' => 'required|integer|min:6|max:64',
            'require_uppercase' => 'nullable|boolean',
            'require_number' => 'nullable|boolean',
            'require_special' => 'nullable|boolean',
            'alphanumeric' => 'nullable|boolean',
            'expiry_days' => 'nullable|integer',
            'start_warning_days' => 'nullable|integer',
            'max_login_attempts' => 'nullable|integer',
            'lockout_duration' => 'nullable|integer',
            'use_otp' => 'nullable|boolean',
            'otp_expiry_duration' => 'nullable|integer',
            'inactive_days' => 'nullable|integer',
            'session_lifetime' => 'nullable|integer',
            'password_reuse_limit' => 'nullable|integer',
            'max_partial_lockouts' => 'nullable|integer',
            'password_reuse_time_limit' => 'nullable|integer',
            'password_reuse_time_period' => 'nullable|string|in:days,weeks,months',
        ]);

        // Ensure checkboxes default to false if not present
        $data = $this->normalizeCheckboxes($request, $data);

        PasswordPolicy::create($data);

        return redirect()->route('password-policies.index')->with('success', 'Password policy created successfully.');
    }

    public function edit(PasswordPolicy $passwordPolicy)
    {
        return view('password-policies.edit', compact('passwordPolicy'));
    }

    public function update(Request $request, PasswordPolicy $passwordPolicy)
    {
        $data = $request->validate([
            'min_length' => 'required|integer|min:6|max:64',
            'require_uppercase' => 'nullable|boolean',
            'require_number' => 'nullable|boolean',
            'require_special' => 'nullable|boolean',
            'alphanumeric' => 'nullable|boolean',
            'expiry_days' => 'nullable|integer',
            'start_warning_days' => 'nullable|integer',
            'max_login_attempts' => 'nullable|integer',
            'lockout_duration' => 'nullable|integer',
            'use_otp' => 'nullable|boolean',
            'otp_expiry_duration' => 'nullable|integer',
            'inactive_days' => 'nullable|integer',
            'session_lifetime' => 'nullable|integer',
            'password_reuse_limit' => 'nullable|integer',
            'max_partial_lockouts' => 'nullable|integer',
            'password_reuse_time_limit' => 'nullable|integer',
            'password_reuse_time_period' => 'nullable|string|in:days,weeks,months',
        ]);

        $data = $this->normalizeCheckboxes($request, $data);

        $passwordPolicy->update($data);

        return redirect()->route('password-policies.index')->with('success', 'Password policy updated successfully.');
    }

    public function destroy(PasswordPolicy $passwordPolicy)
    {
        $passwordPolicy->delete();
        return redirect()->route('password-policies.index')->with('success', 'Password policy deleted.');
    }

    /**
     * Ensures all checkboxes default to false (0) if unchecked.
     */
    private function normalizeCheckboxes(Request $request, array $data): array
    {
        $checkboxes = [
            'require_uppercase',
            'require_number',
            'require_special',
            'alphanumeric',
            'use_otp'
        ];

        foreach ($checkboxes as $field) {
            $data[$field] = $request->has($field) ? (bool)$request->input($field) : false;
        }

        return $data;
    }
}
