<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;  //trait - Allows you to create fake users for testing.
use Illuminate\Foundation\Auth\User as Authenticatable; //gives User model abilities like login, logout, etc
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'role',
        'status',
        'google-id',
        'facebook-id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



    public function businesses(){
        return $this->hasMany(Business::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function favorites(){
        return $this->belongsToMany(Business::class, 'favorites')->withTimestamps();
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isBusinessOwner()
    {
        return $this->role === 'business_owner';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }


}
