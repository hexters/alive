<?php

namespace Modules\Alive\Livewire\Auth;

use Hexters\Wirehmvc\Component;
use Modules\Alive\Livewire\Forms\LoginForm;

class Login extends Component
{
    public LoginForm $form;

    public function attempt()
    {
        return $this->form->handle();
    }

    public function render()
    {
        return view('alive::livewire.auth.login')
            ->title(__('Administrator | Sign In'));
    }
}
