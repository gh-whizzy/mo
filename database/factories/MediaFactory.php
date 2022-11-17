<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Playlist;

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
        // return [
        //     // 'playlist_id' => 1,
        //     'media_name' => fake()->words(),
        //     'media_type' => fake()->words(),
        //     'file_path' => fake()->words()
        // ];
        return [
            'playlist_id' => random_int(1, 20),
            'media_name' => fake()->word(),
            'media_type' => fake()->randomElement(['video', 'audio', 'images']),
            'file_path' => fake()->url()
        ];
    }
}
