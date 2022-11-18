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
        // dd(Playlist::find($id)->media);

        // // Log::info(gettype($mediaIds)); 
        // // string
        // // Log::info(explode(',', $mediaIds));
        // $test=[];
        // foreach (explode(',', $mediaIds) as $id) {
        //     Log::info($id);
        //     $media = Media::find($id);
        //     Log::info($media);
        //     $test[]=$media;
        // }

        return Playlist::find($id)->media;

        
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

    public function createNewPlaylist(Request $request)
    {
        $playlist = new Playlist;
        
        $playlist->playlist_name = $request->newPlaylistName;
        $playlist->playlist_type = $request->playlistType;
        $playlist->created_by = Auth::user()->name;

        $playlist->id = Media::max('playlist_id') + 1;
        $playlist->save();

        // $user_name = Auth::user()->name;
        // Log::info($user_name);
    }

    public function editPlaylist(Request $request) 
    {
        $playlist = Playlist::find($request->id);
        // dd($playlist);
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

    public function deletePlaylist(Request $request)
    {
        $id = $request->playlistId;

        Playlist::find($id)->delete();
    }







    public function deleteMediaFromPlaylist(Request $request) 
    {
        // $playlist_id = $request->id; 

        Playlist::where('id', $request->id)->delete();
        
        // $id_playlist = $request->playlistId;
        // $input_media = $request->mediaId;

        // $playlist = Playlist::find($id_playlist);
        // // dd($playlist);

        // $hello= $playlist->media;
        // // Log::info("before");

        // // Log::info($hello);
        // foreach($hello as $key=>$value) 
        // {
        //     // Log::info($key);
        //     if ($input_media === $value) {
        //         unset($hello[$key]);
        //     }
        // }
        // // Log::info("after");
        
        // // Log::info($hello);
        // // Log::info(json_encode($hello));

        // $list=[];

        // foreach($hello as $k=>$v) {
        //     array_push($list, $v);
        // }


        // $playlist->update([
        //     'playlist_name' => 'changed',
        //     'media' => $list
        // ]);

        

        
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

        



    //     $data = array(
    //     0 => "hello",
    //     "description" => "test test test"
    //   );

    //     // $test = array (1,3,5);
    //     $media = Playlist::find(2);
    //     $media->update([
    //         "playlist_name" => 'fdfads',
    //         "playlist_type" => "tfgjkdfs",
    //         "created_by" => 'fdjoifds',
    //         "media" => [0=>[2]]
    //     ]);
        // Log::info(gettype($media->media));
        // $media->media->update();
        // $media->media->update([1=>1]);


        // $media->update([
        //     'playlist_name' => 'test'
        // ]);


        // dd($request);
        

        // $playlistId = $request->playlist_id;
        // $mediaId = $request->media_id;



        // $playlist = Playlist::find($playlistId);

        // // $dataArray = $playlist->media;
        // Log::info($playlist->media);
        // $playlist->update([
        //     'playlist_mame' => 'gary'
        // ]);
        // $test= null;
        // foreach ($playlist->media as $key=>$media) {
        //     // Log::info($key+1);
        //     if ($media === $mediaId) {
        //         // Log::info('yes');
        //         unset($playlist->media[$key]);

        //         // $test = $playlist->media;
        //         // Log::info($playlist->media);

                
                
        //     } else {
        //         // Log::info('no');
        //     }
        // }
        // // $playlist->media->delete();
        // Log::info($test);
        // $playlist->update([
        //     'playlist_name' => 'gaz'
        // ]);

        // $dataArray->update();
        // dd($dataArray);
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
