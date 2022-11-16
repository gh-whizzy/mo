<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function getAllPlaylists() 
    {
        $playlists = Playlist::all();

        return $playlists;
    }
}
