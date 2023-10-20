<?php

namespace Hexters\Alive\Supports;

abstract class AliveMenu
{

    protected $gate;

    protected $name;

    protected $description;

    protected $target = '_self';

    abstract protected function route();

    abstract protected function icon();

    protected function badge()
    {
        return null;
    }

    protected function submenus()
    {
        return [];
    }

    protected function permissions()
    {
        return [];
    }

    public function getSubmenus()
    {
        $submenus = [];

        foreach ($this->submenus() as $sub) {
            $submenus[] = app($sub)->render();
        }

        return $submenus;
    }

    public function getPermissions()
    {
        $permissions = [];

        foreach ($this->permissions() as $render) {
            $permissions[] = $render;
        }

        return $permissions;
    }

    public function render()
    {
        return [
            'type' => 'menu',
            'gate' => $this->gate,
            'name' => $this->name,
            'description' => $this->description,
            'target' => $this->target,
            'icon' => $this->icon(),
            'route' => $this->route(),
            'badge' => $this->badge(),
            'submenu' => $this->getSubmenus(),
            'permissions' => $this->permissions(),
        ];
    }
}
