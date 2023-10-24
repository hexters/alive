<?php

namespace Hexters\Alive\Attributes;

use Illuminate\Support\Facades\Config;
use Livewire\Attribute as LivewireAttribute;

#[\Attribute]
class PageTitle extends LivewireAttribute
{
    
    public function __construct(
        protected $content
    ) {
    }

    public function mount()
    {
        Config::set('alive.page_title', __($this->content));
    }
}
