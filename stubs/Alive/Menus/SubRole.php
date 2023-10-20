<?php

namespace Modules\Alive\Menus;

use Hexters\Alive\Supports\AliveMenu;

class SubRole extends AliveMenu
{
    protected $gate = 'role.index';

    protected $name = 'Sub Role';

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
            CuRole::class,
        ];
    }
    
}
