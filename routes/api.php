<?php
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AuthController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::resource('leads', LeadController::class)->middleware('permission:view leads');
    Route::resource('proposals', ProposalController::class)->middleware('permission:view proposals');
    Route::resource('estimates', EstimateController::class)->middleware('permission:view estimates');
    Route::resource('invoices', InvoiceController::class)->middleware('permission:view invoices');
});

Route::resource('proposals', ProposalController::class)->middleware('auth');
Route::resource('invoices', InvoiceController::class)->middleware('auth');
