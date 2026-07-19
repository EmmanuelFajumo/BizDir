<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    /** @use HasFactory<\Database\Factories\BusinessFactory> */
    use HasFactory;

    protected $fillable = [

        'user_id',
        'category_id',
        'state_id',
        'lga_id',
        'name',
        'description',
        'logo',
        'cover_image',
        'phone',
        'whatsapp',
        'facebook',
        'instagram',
        'linkedin',
        'youtube',
        'x',
        'email',
        'website',
        'address',
        'year_established',
        'employees',
        'status',
        'is_verified',
        'is_featured'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }

    public function images()
    {
        return $this->hasMany(BusinessImage::class);
    }

    public function openingHours()
    {
        return $this->hasMany(OpeningHour::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(
            User::class,
            'favorites'
        )->withTimestamps();
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

}
