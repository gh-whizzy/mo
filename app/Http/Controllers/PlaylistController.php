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

    public function test($id)
    {
        $playlist = Playlist::find($id);
        return $playlist;
    }

    public function editPlaylist(Request $request) 
    {
        $playlist = Playlist::find($request->id);
        $playlist->playlist_name = $request->name;
        $playlist->save();
        return redirect('/');
        // dd($request->id);

        // $playlist = $request->all();
        
        // dd($request);
        // $playlist->playlist_name = request('playlistName');
        // // dd(request('id'));
        // $playlist->save();
        
        // dd($request->id);
        // dd($playlist);
        // $playlist->playlist_name = $request->playlistName;
        // $playlist->save();
        // $playlistName = $request->playlist_name;

        // $playlist->where('id', request()->name)
        


        // Log::info($request);
        // return redirect('/');
    }
}
