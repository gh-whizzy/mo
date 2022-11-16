<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Playlist>
 */
class PlaylistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'playlist_name' => fake()->name(),
            'playlist_type' => fake()->randomElement(['video', 'audio', 'images']),
            'created_by' => fake()->name(),
            'media' => fake()->url()
        ];
    }
}
