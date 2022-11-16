<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PlaylistController extends Controller
{
    public function getAllPlaylists() 
    {
        $playlists = Playlist::all();

        return $playlists;
    }

    public function editPlaylist(Response $request) 
    {
        Log::info($request);
    }
}
