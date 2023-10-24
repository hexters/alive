<?php

namespace Modules\Alive\Livewire;

use Hexters\Alive\Attributes\PageTitle;
use Hexters\Wirehmvc\Component;

class Role extends Component
{
    #[PageTitle('List of Roles')]
    public function render()
    {
        return view('alive::livewire.role');
    }
}
