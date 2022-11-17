<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Media;

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

    public function playlist($mediaIds) 
    {   
        // Log::info(gettype($mediaIds)); 
        // string
        // Log::info(explode(',', $mediaIds));
        $test=[];
        foreach (explode(',', $mediaIds) as $id) {
            Log::info($id);
            $media = Media::find($id);
            Log::info($media);
            $test[]=$media;
        }

        return $test;

        
        // dd($mediaIds);
        // foreach (array($mediaByIds) as $id)
        // {
        //     Log::info($id);
        // }
        // // dd($id);
        // dd($mediaIds);
        // $test=$mediaIds;
        // Log::info($test[1]);
        // output is [
        // foreach ($mediaIds as $id) {
        //     Log::info($id);
        //     $mediaById = Media::all()->where('id', $id);
        //     Log::info($mediaById);
        // }
        // Log::info($test);
        // dd($test);
        // $media = Media::all()->where('id', $mediaIds);
        // dd($media);
        // return $playlists;
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

    public function deleteMediaFromPlaylist(Request $request) 
    {
        // dd($request);
        

        $playlistId = $request->playlist_id;
        $mediaId = $request->media_id;

        // Log::info($mediaId);

        // // dd($playlistId);

        $playlist = Playlist::find($playlistId);
        Log::info($playlist);
        dd($playlist->media);
        // // dd($playlist);
        // // remove [ and ] from string
        // // dd($playlist->media);
        // $playlistMediaArray = explode(',', trim(str_replace(" ", "", $playlist->media), "[]"));
        // // dd($playlistMediaArray);


        // foreach ($playlistMediaArray as $i) {
        //     Log::info($i);
        //     if ($mediaId == $i) {
        //         Log::info('yes');
        //         unset($playlistMediaArray[$i]);
        //     } else {
        //         Log::info('no');
        //     }
            
        // } 
        

        // dd($oldMediaArray);
        // get playlist media array
        // $playlistMediaArray = explode(',', str_replace('[', ']', '', $playlist->media));
        // dd($playlistMediaArray);


        // Log::info(Playlist::find($playlistId));

        // $playlist = Playlist::find($playlistId);

        // $playlistMedia = $playlist->media;

        // $explodedMedia = explode(',', $playlistMedia);
        // // dd(gettype($explodedMedia));
        // foreach($explodedMedia as $id) 
        // {
        //     // Log::info($mediaId);
        //     if ($id == $mediaId) 
        //     {
        //         //remove id num from media
        //         unset($explodedMedia[$mediaId]);
        //     }
        // }
        // Log::info($explodedMedia);
        // $explodedMedia->save();
        // dd($request);
        // find media in playlist table and delete it

        // $mediaArray = Media::all('id');
        // dd($mediaArray);
    }
}
