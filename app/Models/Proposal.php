<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $table = 'proposals';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'lead_id',
        'title',
        'details',
        'amount',
    ];

    // Define relationships if needed
    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // If you have any dates you need to cast
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Optionally, add any custom methods or accessors
}
