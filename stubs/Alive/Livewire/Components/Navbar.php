<?php

namespace Modules\Alive\Livewire\Components;

use Hexters\Wirehmvc\Component;
use Modules\Alive\Livewire\Auth\Login;
use Modules\Alive\Models\AliveAccount;

class Navbar extends Component
{
    public AliveAccount $user;

    public bool $confirm = false;

    public function toggleLogoutModal()
    {
        $this->confirm = !$this->confirm;
    }

    public function logout()
    {
        auth()->guard('alive')->logout();
        $this->confirm = false;
        return $this->redirect(Login::class);
    }

    public function render()
    {
        return view('alive::components.components.navbar');
    }
}
