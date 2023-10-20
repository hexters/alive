<?php

namespace Hexters\Alive\Supports;

class Permission
{
    protected $gate;
    protected $name;
    protected $description;

    public static function make($gate, $name, $description)
    {
        $class = app(self::class);
        $class->initData($gate, $name, $description);
        return $class->render();
    }

    public function initData($gate, $name, $description)
    {
        $this->gate = $gate;
        $this->name = $name;
        $this->description = $description;
    }

    public function render()
    {
        return [
            'gate' => $this->gate,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
