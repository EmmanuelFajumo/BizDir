<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningHour extends Model
{
    /** @use HasFactory<\Database\Factories\OpeningHourFactory> */
    use HasFactory;

    protected $fillable = [

        'business_id',
        'day',
        'opens_at',
        'closes_at',
        'is_closed'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
