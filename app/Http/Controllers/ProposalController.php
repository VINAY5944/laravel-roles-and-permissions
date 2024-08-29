<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    // Display a listing of proposals
    public function index()
    {
        $this->authorize('view proposals');

        $proposals = Proposal::all();
        return view('proposals.index', compact('proposals'));
    }

    // Show the form for creating a new proposal
    public function create()
    {
        $this->authorize('create proposals');

        return view('proposals.create');
    }

    // Store a newly created proposal in the database
    public function store(Request $request)
    {
        $this->authorize('create proposals');

        $request->validate([
            'lead_id' => 'required|exists:leads,id',
            'title' => 'required|string|max:255',
            'details' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        Proposal::create($request->all());

        return redirect()->route('proposals.index')->with('success', 'Proposal created successfully.');
    }

    // Show the form for editing a specific proposal
    public function edit(Proposal $proposal)
    {
        $this->authorize('update proposals');

        return view('proposals.edit', compact('proposal'));
    }

    // Update a specific proposal in the database
    public function update(Request $request, Proposal $proposal)
    {
        $this->authorize('update proposals');

        $request->validate([
            'lead_id' => 'required|exists:leads,id',
            'title' => 'required|string|max:255',
            'details' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $proposal->update($request->all());

        return redirect()->route('proposals.index')->with('success', 'Proposal updated successfully.');
    }

    // Remove a specific proposal from the database
    public function destroy(Proposal $proposal)
    {
        $this->authorize('delete proposals');

        $proposal->delete();

        return redirect()->route('proposals.index')->with('success', 'Proposal deleted successfully.');
    }
}
