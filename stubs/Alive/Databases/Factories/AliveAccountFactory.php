<?php

namespace Modules\Alive\Databases\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Inspiring;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Alive\Models\AliveAccount>
 */
class AliveAccountFactory extends Factory
{

    /**
     * Get the application namespace for the application.
     *
     * @return string
     */
    protected static function appNamespace()
    {
        return 'Modules\\Alive\\Models\\';
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'mood_status' => Inspiring::quote(),
            'state' => 'active',
        ];
    }
}
