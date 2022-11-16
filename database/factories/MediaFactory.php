<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'media_name' => fake()->name(),
            'media_type' => fake()->randomElement(['video', 'audio', 'images']),
            'file_path' => fake()->url()
        ];
    }
}
