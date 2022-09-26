<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    public function software(): HasMany
    {
        return $this->hasMany(Software::class);
    }

    public function userMusic(): HasMany
    {
        return $this->hasMany(Music::class);
    }

    public function userOther(): HasMany
    {
        return $this->hasMany(Other::class);
    }

}
