<?php

use Hexters\Alive\Helpers\Alive;

if (!function_exists('alive')) {
    function alive()
    {
        return new Alive();
    }
}
