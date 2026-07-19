<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /** @use HasFactory<\Database\Factories\StateFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'capital',
        'code'
    ];

    public function lgas()
    {
        return $this->hasMany(Lga::class);
    }

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}
