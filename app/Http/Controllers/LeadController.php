<?php
namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $this->authorize('view leads');
        $leads = Lead::all();
        return view('leads.index', compact('leads'));
    }

    public function create()
    {
        $this->authorize('create leads');
        return view('leads.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create leads');
        Lead::create($request->all());
        return redirect()->route('leads.index');
    }

    public function edit(Lead $lead)
    {
        $this->authorize('update leads');
        return view('leads.edit', compact('lead'));
    }

    public function update(Request $request, Lead $lead)
    {
        $this->authorize('update leads');
        $lead->update($request->all());
        return redirect()->route('leads.index');
    }

    public function destroy(Lead $lead)
    {
        $this->authorize('delete leads');
        $lead->delete();
        return redirect()->route('leads.index');
    }
}
