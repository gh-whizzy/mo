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
        // dd($request->id);

        $playlist = Playlist::where('id', request('id'))->first();
        // dd($playlist);
        $playlist->playlist_name = request('playlistName');
        // dd(request('id'));
        $playlist->save();
        
        // dd($request->id);
        // dd($playlist);
        // $playlist->playlist_name = $request->playlistName;
        // $playlist->save();
        // $playlistName = $request->playlist_name;

        // $playlist->where('id', request()->name)
        


        // Log::info($request);
        return redirect('/');
    }
}
