<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use Illuminate\Http\Request;

class EstimateController extends Controller
{
    // Display a listing of estimates
    public function index()
    {
        $this->authorize('view estimates');

        $estimates = Estimate::all();
        return view('estimates.index', compact('estimates'));
    }

    // Show the form for creating a new estimate
    public function create()
    {
        $this->authorize('create estimates');

        return view('estimates.create');
    }

    // Store a newly created estimate in the database
    public function store(Request $request)
    {
        $this->authorize('create estimates');

        $request->validate([
            'proposal_id' => 'required|exists:proposals,id',
            'estimated_amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        Estimate::create($request->all());

        return redirect()->route('estimates.index')->with('success', 'Estimate created successfully.');
    }

    // Show the form for editing a specific estimate
    public function edit(Estimate $estimate)
    {
        $this->authorize('update estimates');

        return view('estimates.edit', compact('estimate'));
    }

    // Update a specific estimate in the database
    public function update(Request $request, Estimate $estimate)
    {
        $this->authorize('update estimates');

        $request->validate([
            'proposal_id' => 'required|exists:proposals,id',
            'estimated_amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        $estimate->update($request->all());

        return redirect()->route('estimates.index')->with('success', 'Estimate updated successfully.');
    }

    // Remove a specific estimate from the database
    public function destroy(Estimate $estimate)
    {
        $this->authorize('delete estimates');

        $estimate->delete();

        return redirect()->route('estimates.index')->with('success', 'Estimate deleted successfully.');
    }
}
