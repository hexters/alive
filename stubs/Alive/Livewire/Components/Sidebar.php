<?php

namespace Modules\Alive\Livewire\Components;

use Illuminate\Support\Str;
use Hexters\Wirehmvc\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Modules\Alive\Models\AliveAccount;

class Sidebar extends Component
{

    public $hide = false;

    public $menus = [];

    public AliveAccount $user;

    public function mount()
    {
        parent::mount();

        $this->hide = Cookie::get('alive-sidebar-' . $this->user->id, false);
        $this->initMenu();
    }

    public function toggle()
    {
        $this->hide = !$this->hide;
        Cookie::queue('alive-sidebar-' . $this->user->id, $this->hide);
    }

    public function loadBadge($class)
    {
        return app($class)->getBadge();
    }

    public function menuToggle($id, $open)
    {
        $this->menus = $this->toggleProccess($this->menus, $id, $open);
    }

    protected function initMenu()
    {
        $this->menus = $this->initMenuProcess(auth()->user()->menus());
    }

    protected function initMenuProcess($menus)
    {
        return collect($menus)->map(function ($menu) {


            $active = strlen($menu['path']) > 0 && request()->is($menu['path'] . '*');
            return [
                ...$menu,
                "active" => $active,
                'submenu' => count($menu['submenu']) > 0 ? $submenus = $this->initMenuProcess($menu['submenu']) : $submenus = [],
                'open' => !$this->hide && collect($submenus)->some('active', '=', 'true'),
            ];
        });
    }


    protected function toggleProccess($menus, $id, $open)
    {

        $menus = collect($menus)->map((function ($menu) {
            return [
                ...$menu,
                'open' => false,
            ];
        }));
        return collect($menus)->map(function ($menu) use ($id, $open) {
            return [
                ...$menu,
                'open' => $menu['id'] == $id ? !$open : $menu['open'],
                'submenu' => count($menu['submenu']) > 0 ? $this->toggleProccess($menu['submenu'], $id, $open) : []
            ];
        });
    }

    public function render()
    {
        return view('alive::components.components.sidebar');
    }
}
