<?php

namespace Modules\Alive\Access\Menus;

use Hexters\Alive\Supports\AliveMenu;
use Hexters\Alive\Supports\Permission;

class Role extends AliveMenu
{
    protected $gate = 'account.index';

    protected $name = 'Role';

    protected $description = 'Admin can view a list of roles';

    protected function icon()
    {
        return null;
    }

    protected function route()
    {
        return '';
    }

    protected function submenus()
    {
        return [
            SubRole::class,
        ];
    }

    protected function permissions()
    {
        return [
            Permission::make('role.create', 'Add new Role', 'Admin can add new role'),
        ];
    }
}
