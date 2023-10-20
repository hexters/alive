<?php

namespace Modules\Alive\Menus;

use Hexters\Alive\Supports\AliveMenu;

class CuRole extends AliveMenu
{
    protected $gate = 'role.index';

    protected $name = 'Cucu Role';

    protected $description = 'Admin can view a list of roles';
    
    protected function icon()
    {
        return null;
    }
    
    protected function route()
    {
        return '';
    }
    
}
