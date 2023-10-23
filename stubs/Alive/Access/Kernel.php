<?php

namespace Modules\Alive\Access;

use Hexters\Alive\Foundation\MenuKernel;
use Modules\Alive\Access\Menus\Access;


class Kernel extends MenuKernel
{
    protected $menuDefault = [
        
        // You can also store them without dividers
        // Role::class,

        // Menu list with dividers
        // The divider must be uniq so that the menu displayed is not mixed.
        'Application' => [ 
            Access::class,
        ],

    ];
}
