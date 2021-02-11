<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'address',
        'password', 'website', 'phone', 'company'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'address' => 'array',
        'company' => 'array',
        'email_verified_at' => 'datetime'
    ];

    /**
     * Get Address
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Get Albums
     */
    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    /**
     * Get Company
     */
    public function company()
    {
        return $this->hasOne(Company::class);
    }
}
