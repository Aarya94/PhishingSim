<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'subject',
        'email_body',
        'phishing_link',
    ];

    public function logs()
    {
        return $this->hasMany(PhishingLog::class);
    }
}
