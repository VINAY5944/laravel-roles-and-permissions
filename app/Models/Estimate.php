<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proposal_id',
        'estimated_amount',
        'description',
        'valid_until',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'estimated_amount' => 'decimal:2',
        'valid_until' => 'date',
    ];

    /**
     * Get the proposal that owns the estimate.
     */
    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    /**
     * Get the items for the estimate.
     */
    public function items()
    {
        return $this->hasMany(EstimateItem::class);
    }

    /**
     * Get the invoices associated with the estimate.
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
