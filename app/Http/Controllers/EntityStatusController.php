<?php

namespace App\Http\Controllers;

use App\Models\EntityStatus;
use Illuminate\Http\Request;

class EntityStatusController extends Controller
{
    /**
     * Display a listing of the entity statuses.
     */
    public function index()
    {
        $statuses = EntityStatus::all();
        return view('entity_statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new entity status.
     */
    public function create()
    {
        return view('entity_statuses.create');
    }

    /**
     * Store a newly created entity status in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        EntityStatus::create([
            'name' => $request->name,
        ]);

        return redirect()->route('entity_statuses.index')->with('success', 'Entity Status created successfully.');
    }

    /**
     * Show the form for editing the specified entity status.
     */
    public function edit(EntityStatus $entityStatus)
    {
        return view('entity_statuses.edit', compact('entityStatus'));
    }

    /**
     * Update the specified entity status in storage.
     */
    public function update(Request $request, EntityStatus $entityStatus)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $entityStatus->update([
            'name' => $request->name,
        ]);

        return redirect()->route('entity_statuses.index')->with('success', 'Entity Status updated successfully.');
    }

    /**
     * Remove the specified entity status from storage.
     * Before deletion, consider checking if any UserGroup uses this status.
     */
    public function destroy(EntityStatus $entityStatus)
    {
        $entityStatus->delete();

        return redirect()->route('entity_statuses.index')->with('success', 'Entity Status deleted successfully.');
    }
}

