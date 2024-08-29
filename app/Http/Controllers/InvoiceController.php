<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    // Display a listing of invoices
    public function index()
    {
        $this->authorize('view invoices');

        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }

    // Show the form for creating a new invoice
    public function create()
    {
        $this->authorize('create invoices');

        return view('invoices.create');
    }

    // Store a newly created invoice in the database
    public function store(Request $request)
    {
        $this->authorize('create invoices');

        $request->validate([
            'proposal_id' => 'required|exists:proposals,id',
            'invoice_amount' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        Invoice::create($request->all());

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    // Show the form for editing a specific invoice
    public function edit(Invoice $invoice)
    {
        $this->authorize('update invoices');

        return view('invoices.edit', compact('invoice'));
    }

    // Update a specific invoice in the database
    public function update(Request $request, Invoice $invoice)
    {
        $this->authorize('update invoices');

        $request->validate([
            'proposal_id' => 'required|exists:proposals,id',
            'invoice_amount' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        $invoice->update($request->all());

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    // Remove a specific invoice from the database
    public function destroy(Invoice $invoice)
    {
        $this->authorize('delete invoices');

        $invoice->delete();

        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}
