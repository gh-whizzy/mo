<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();


        \App\Models\Playlist::factory()->create([
            'playlist_id' => 1,
            'playlist_name' => fake()->word(),
            'playlist_type' => fake()->randomElement(['video', 'audio', 'image']),
            'created_by' => \App\Models\User::all()->random()->name,
        ]);

        \App\Models\Playlist::factory(5)->create();

        \App\Models\Media::factory(200)->create();
    }
}
