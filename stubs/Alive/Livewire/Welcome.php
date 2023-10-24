<?php

namespace Modules\Alive\Livewire;

use Hexters\Alive\Attributes\PageTitle;
use Hexters\Wirehmvc\Component;

class Welcome extends Component
{
    #[PageTitle('Welcome')]
    public function render()
    {
        return view('alive::livewire.welcome');
    }
}
