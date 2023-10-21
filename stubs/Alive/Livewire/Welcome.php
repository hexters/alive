<?php

namespace Modules\Alive\Livewire;

use Hexters\Wirehmvc\Component;

class Welcome extends Component
{
    public function render()
    {
        return view('alive::livewire.welcome');
    }
}
