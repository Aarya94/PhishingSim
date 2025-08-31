<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhishingLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'email',
        'password',
        'ip_address',
        'user_agent',
    ];

    // Relationship: Each log belongs to a campaign
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
