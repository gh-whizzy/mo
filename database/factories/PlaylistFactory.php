<?php

namespace Database\Factories;

use App\Models\Media;
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
        $randomIdsOfAudio = Media::all()->where('media_type', 'audio')->random(10);
        $randomIdsOfVideo = Media::all()->where('media_type', 'video')->random(10);
        $randomIdsOfImage = Media::all()->where('media_type', 'images')->random(10);

        $randomMediaType = Media::all()->random(1)->pluck('media_type');
        Log::info($randomMediaType[0]);
        


        // Log::info(Media::all()->random(1)->pluck('media_type'));
        // Log::info(gettype($randomMediaType));

        // if (gettype($randomMediaType) == 'audio') {
        //     Log::info('yes');
        // } else {
        //     Log::info('no');
        // }

        return [
            'playlist_name' => fake()->name(),
            // 'playlist_type' => fake()->randomElement(['video', 'audio', 'image']),
            // 'playlist_type' => Media::all()->random()->pluck('media_type') == 'audio' ? $allIdsOfAudio : 'bar',
            'playlist_type' => ($randomMediaType[0] === 'audio' ? 'audio' : ($randomMediaType[0] === 'video' ? 'video' : 'images')),
            'created_by' => fake()->name(),
            'media' => ($randomMediaType[0] === 'audio' ? $randomIdsOfAudio : ($randomMediaType[0] === 'video' ? $randomIdsOfVideo : $randomIdsOfImage))
        ];
    }
}
