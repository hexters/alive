<?php

namespace Modules\Alive\Livewire\Components;

use Hexters\Wirehmvc\Component;

class Flash extends Component
{

    public $flash;

    public function render()
    {
        return view('alive::components.components.flash');
    }
}
