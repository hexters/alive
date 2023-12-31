<?php

namespace Modules\Alive\Access\Menus;

use Hexters\Alive\Foundation\AliveMenu;
use Hexters\Alive\Supports\Permission;

class Role extends AliveMenu
{
    protected $gate = 'role.index';

    protected $name = 'Role';

    protected $description = 'Admin can view a list of roles';

    protected function icon()
    {
        return '';
    }

    protected function badge()
    {
        return null;
    }

    protected function route()
    {
        return route('alive.role.index');
    }
    
    protected function permissions()
    {
        return [
            Permission::make('role.create', 'Add new Role', 'Admin can add new role'),
        ];
    }
}
