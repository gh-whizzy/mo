<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

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
            'playlist_name' => fake()->word(),
            'playlist_type' => fake()->randomElement(['video', 'audio', 'image']),
            'created_by' => User::all()->random()->name,
        ];
    }
}
