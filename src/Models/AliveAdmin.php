<?php

namespace Hexters\Alive\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Alive\Models\AliveRole;

class AliveAdmin extends Authenticatable
{

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

    public function menus()
    {
        $default = alive()->menus();
        $menus = [];
        foreach ($this->roles as $role) {
            $parseMenus = count($role->menus) > 0 ? $role->menus : $default;
            $menus = array_replace_recursive($menus, $parseMenus);
        }
        return $menus;
    }

    public function permissions()
    {
        $gates = [];
        foreach ($this->roles as $role) {
            $gates = array_replace_recursive($gates, $role->gates);
        }
        return (array) array_unique($gates);
    }
}
