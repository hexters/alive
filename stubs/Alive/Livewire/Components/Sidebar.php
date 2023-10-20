<?php

namespace Modules\Alive\Livewire\Components;

use Hexters\Wirehmvc\Component;
use Illuminate\Support\Facades\Cookie;
use Modules\Alive\Models\AliveAccount;

class Sidebar extends Component
{

    public $hide = false;

    public AliveAccount $user;

    public function mount()
    {
        parent::mount();

        $this->hide = Cookie::get('alive-sidebar-' . $this->user->id, false);
    }

    public function toggle()
    {
        $this->hide = !$this->hide;
        Cookie::queue('alive-sidebar-' . $this->user->id, $this->hide);
    }

    public function render()
    {
        return view('alive::components.components.sidebar');
    }
}
