<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'issuer',
        'credential_id',
        'issue_date',
        'expiry_date',
        'description',
        'image_path',
        'url',
        'category',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'expiry_date' => 'date',
    ];

    /**
     * Check if certificate is expired
     */
    public function isExpired(): bool
    {
        if (!$this->expiry_date) {
            return false;
        }
        return $this->expiry_date->isPast();
    }

    /**
     * Get formatted issue date
     */
    public function getFormattedIssueDateAttribute(): string
    {
        return $this->issue_date->format('F Y');
    }
}
