<?php

namespace Modules\Alive\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Hexters\Alive\Models\AliveAdmin;
use Hexters\Alive\Models\UlidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AliveAccount extends AliveAdmin
{
    use HasApiTokens, HasFactory, Notifiable, UlidGenerator;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'online_at',
        'profile_pic',
        'mood_status',
        'theme',
        'state',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'online_at' => 'datetime',
    ];


    /**
     * AliveAccount Factory
     *
     * @return \Modules\Alive\Databases\Factories\AliveAccountFactory;
     */
    protected static function newFactory()
    {
        return \Modules\Alive\Databases\Factories\AliveAccountFactory::new();
    }
    
}
