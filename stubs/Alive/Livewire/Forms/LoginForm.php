<?php

namespace Modules\Alive\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Modules\Alive\Models\AliveAccount;

class LoginForm extends Form
{

    #[Rule(['required', 'email', 'max:100'])]
    public $email;

    #[Rule(['required', 'max:100'])]
    public $password;

    #[Rule('nullable', 'boolean')]
    public $remember = false;

    public function handle()
    {
        $this->validate();

        if (Auth::guard('alive')->attempt($this->only(['email', 'password']), $this->remember)) {
            $user = auth()->guard('alive')->user();
            if (!in_array($user->state, ['active'])) {
                $this->addError('failed', __('Your account is inactive please contact admin.'));
                auth()->guard('alive')->logout();
                return back();
            }
            session()->regenerate();
            return redirect()->intended(config('alive.prefix'));
        }

        $this->addError('failed', __('auth.failed'));
        return back();
    }
}
