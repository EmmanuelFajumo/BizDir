<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [

        'name',
        'description',
        'icon',
        'image',
        'is_active',
        'is_featured',
    ];

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}
