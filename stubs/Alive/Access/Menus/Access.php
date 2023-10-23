<?php

namespace Modules\Alive\Access\Menus;

use Hexters\Alive\Foundation\AliveMenu;
use Modules\Member\Access\Menus\Admin;

class Access extends AliveMenu
{
    protected $gate = 'access.index';

    protected $name = 'Access';

    protected $description = 'Access group menu';

    protected function icon()
    {
        return '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
        </svg>';
    }

    protected function badge()
    {
        return [9, 'badge badge-sm badge-error text-white'];
    }
    
    protected function route()
    {
        return '';
    }

    protected function submenus()
    {
        return [
            Role::class,
            Admin::class,
        ];
    }
    
}
