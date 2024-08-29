<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    // Specify which fields can be mass-assigned
    protected $fillable = [
        'proposal_id',
        'invoice_amount',
        'due_date',
    ];

    /**
     * Get the proposal that this invoice is associated with.
     */
    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}
