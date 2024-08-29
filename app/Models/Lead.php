<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    // Specify which fields can be mass-assigned
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'status',
        'source',
    ];

    /**
     * Get the proposals associated with this lead.
     */
    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    /**
     * Get the estimates associated with this lead.
     */
    public function estimates()
    {
        return $this->hasManyThrough(Estimate::class, Proposal::class);
    }

    /**
     * Get the invoices associated with this lead.
     */
    public function invoices()
    {
        return $this->hasManyThrough(Invoice::class, Proposal::class);
    }
}
