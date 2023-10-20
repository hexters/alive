<?php

namespace Modules\Alive\Menus;

use Hexters\Alive\Supports\AliveMenu;

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
}
