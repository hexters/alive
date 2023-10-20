<?php

namespace Modules\Alive\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Hexters\Alive\Models\UlidGenerator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Alive\Menus\Role;

class AliveAccount extends Authenticatable
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

    public function avatar(): Attribute
    {
        return Attribute::make(
            get: fn () => is_null($this->profile_pic) ? 'https://www.gravatar.com/avatar/' . hash('sha256', $this->email) : $this->profile_pic
        );
    }

    public function roles()
    {
        return $this->belongsToMany(AliveRole::class, 'alive_role_user');
    }
}
