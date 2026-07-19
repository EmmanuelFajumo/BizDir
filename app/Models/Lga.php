<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    /** @use HasFactory<\Database\Factories\LgaFactory> */
    use HasFactory;

    protected $fillable = [
        'state_id',
        'name',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

     public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}
