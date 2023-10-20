<?php

namespace Modules\Alive\Models;

use Hexters\Alive\Models\UlidGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AliveRole extends Model
{
    use HasFactory, UlidGenerator;

    protected $fillable = [
        'ulid',
        'name',
        'description',
        'menus',
        'gates',
        'state',
        'type',
    ];

    protected $casts = [
        'menus' => 'array',
        'gates' => 'array',
    ];
}
