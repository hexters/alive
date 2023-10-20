<?php

namespace Modules\Alive\Access;

use Hexters\Alive\Foundation\MenuKernel;
use Modules\Alive\Access\Menus\Role;

class Kernel extends MenuKernel
{
    protected $menuDefault = [

        Role::class,

        '' => [
            Role::class,
        ],

    ];
}
