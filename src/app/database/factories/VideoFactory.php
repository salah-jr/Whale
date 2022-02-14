<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->title,
            'des' => $this->faker->paragraph,
            'url' => $this->faker->url,
            'published' => rand(0,1),
        ];
    }

    public function pended(): Factory
    {
        return $this->state([
            'published' => false,
        ]);
    }

    public function published(): Factory
    {
        return $this->state([
            'published' => true,
        ]);
    }
}
