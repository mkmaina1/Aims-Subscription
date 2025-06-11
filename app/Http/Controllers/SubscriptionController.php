<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubscriptionController extends Controller
{
   public function index()
{
    if (auth()->user()->is_admin) {
        $subscriptions = Subscription::latest()->get();
    } else {
        $subscriptions = Subscription::where('user_id', auth()->id())->latest()->get();
    }

    return view('subscriptions.index', compact('subscriptions'));
}


    public function create()
    {
        return view('subscriptions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'plan_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'renewal_date' => 'nullable|date',
            'auto_renew' => 'nullable|boolean',
            'invoice' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['auto_renew'] = $request->has('auto_renew');

        if ($request->hasFile('invoice')) {
            $validated['invoice_path'] = $request->file('invoice')->store('invoices', 'public');
        }

        Subscription::create($validated);

        return redirect()->route('subscriptions.index')->with('success', 'Subscription created successfully.');
    }

    public function edit(Subscription $subscription)
    {
        $this->authorize('update', $subscription); // Optional: if using policies
        return view('subscriptions.edit', compact('subscription'));
    }

    public function update(Request $request, Subscription $subscription)
    {
        $this->authorize('update', $subscription); // Optional

        $validated = $request->validate([
            'plan_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'renewal_date' => 'nullable|date',
            'auto_renew' => 'nullable|boolean',
            'invoice' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $validated['auto_renew'] = $request->has('auto_renew');

        if ($request->hasFile('invoice')) {
            // Delete old invoice if it exists
            if ($subscription->invoice_path) {
                Storage::disk('public')->delete($subscription->invoice_path);
            }
            $validated['invoice_path'] = $request->file('invoice')->store('invoices', 'public');
        }

        $subscription->update($validated);

        return redirect()->route('subscriptions.index')->with('success', 'Subscription updated successfully.');
    }

    public function destroy(Subscription $subscription)
    {
        $this->authorize('delete', $subscription); 

        if ($subscription->invoice_path) {
            Storage::disk('public')->delete($subscription->invoice_path);
        }

        $subscription->delete();

        return redirect()->route('subscriptions.index')->with('success', 'Subscription deleted.');
    }
}
