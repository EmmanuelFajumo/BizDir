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
        'logo_public_id',
        'cover_image',
        'cover_image_public_id',
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

    public function getLogoUrlAttribute()
    {
        if (!$this->logo) {
            return null;
        }
        return (str_starts_with($this->logo, 'http://') || str_starts_with($this->logo, 'https://'))
            ? $this->logo
            : asset('storage/' . $this->logo);
    }

    public function getCoverImageUrlAttribute()
    {
        if (!$this->cover_image) {
            return null;
        }
        return (str_starts_with($this->cover_image, 'http://') || str_starts_with($this->cover_image, 'https://'))
            ? $this->cover_image
            : asset('storage/' . $this->cover_image);
    }

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
