<?php

namespace Hexters\Alive\Foundation;

use Illuminate\Support\Str;

abstract class AliveMenu
{

    protected $gate;

    protected $name;

    protected $description;

    protected $target = '_self';

    protected $sort = 10000;

    abstract protected function route();

    abstract protected function icon();

    protected function badge()
    {
        /**
         * [count, class]
         */
        return [0, 'badge badge-sm badge-error text-white'];
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
        return [
            'count' => $this->badge()[0] ?? 0,
            'class' => $this->badge()[1] ?? ''
        ];
    }

    public function render($divider = null)
    {
        $path = Str::of($this->route())->replace(config('app.url'), '')->ltrim('/');

        return [
            'id' => (string) Str::ulid(),
            'type' => 'menu',
            'open' => false,
            'path' => $path,
            'sort' => $this->sort,
            'divider' => $divider,
            'gate' => $this->gate,
            'name' => __($this->name),
            'description' => __($this->description),
            'source' => $this::class,
            'target' => $this->target,
            'icon' => $this->icon(),
            'url' => $this->route(),
            'submenu' => $this->getSubmenus(),
            'permissions' => $this->permissions(),
        ];
    }
}
