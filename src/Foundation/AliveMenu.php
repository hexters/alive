<?php

namespace Hexters\Alive\Foundation;

use Illuminate\Support\Str;

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
        return 0;
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

    public function getBadge()
    {
        return $this->badge();
    }

    public function render($divider = null)
    {
        $path = Str::of($this->route())->replace(config('app.url'), '')->ltrim('/');

        return [
            'id' => (string) Str::ulid(),
            'type' => 'menu',
            'open' => false,
            'path' => $path,
            'divider' => $divider,
            'gate' => $this->gate,
            'name' => __($this->name),
            'description' => __($this->description),
            'source' => $this::class,
            'target' => $this->target,
            'icon' => $this->icon(),
            'url' => $this->route(),
            'badge' => $this->badge(),
            'submenu' => $this->getSubmenus(),
            'permissions' => $this->permissions(),
        ];
    }
}
