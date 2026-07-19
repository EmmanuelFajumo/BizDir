<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessImage extends Model
{
    /** @use HasFactory<\Database\Factories\BusinessImageFactory> */
    use HasFactory;

    public function images()
    {
        return $this->hasMany(BusinessImage::class);
    }
}
