<?php

namespace Modules\Alive\Access\Menus;

use Hexters\Alive\Foundation\AliveMenu;

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
