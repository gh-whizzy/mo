<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Media;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PlaylistController extends Controller
{
    public function getAllPlaylists() 
    {
        $playlists = Playlist::all();

        return $playlists;
    }

    public function getPlaylist($id) 
    {   
        return Playlist::find($id);
    }

    public function test($id)
    {
        $playlist = Playlist::find($id);
        return $playlist;
    }

    public function createNewPlaylist(Request $request)
    {
        $playlist = new Playlist;
        
        $playlist->playlist_name = $request->newPlaylistName;
        $playlist->playlist_type = $request->playlistType;
        $playlist->created_by = Auth::user()->name;

        $playlist->save();
    }

    public function editPlaylist(Request $request) 
    {
        $playlist = Playlist::find($request->id);
        $playlist->playlist_name = $request->name;
        $playlist->save();
        return redirect('/');
    }

    public function deletePlaylist(Request $request)
    {
        $id = $request->playlistId;

        Playlist::find($id)->delete();
    }

    public function deleteMediaFromPlaylist(Request $request) 
    {
        Playlist::where('id', $request->id)->delete();
    }
}
