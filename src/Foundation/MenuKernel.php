<?php

namespace Hexters\Alive\Foundation;

abstract class MenuKernel
{

    protected $menuDefault = [];

    public function default()
    {
        return $this->menuDefault;
    }
}
