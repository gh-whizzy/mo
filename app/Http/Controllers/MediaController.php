<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Playlist;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    //
    public function upload(Request $request)
    {
        //if request video

        $mediaType = strtok($request->file('file')->getMimeType(), '/');
        
        if ($request->file('file')){
            if ($mediaType === 'video') {
                $file = $request->file('file');
                $file_name = time().'_'.$file->getClientOriginalName();
    
                $file->move(public_path('video'), $file_name);
    
                $media = new Media;
    
                $media->playlist_id = $request->playlist_id;
                $media->media_name = $file_name;
                $media->media_type = 'video';
                $media->file_path = str_replace('\\', '/', public_path('video/')).$file_name;
    
                $media->save();
            }

            elseif ($mediaType === 'audio') {
                $file = $request->file('file');
                $file_name = time().'_'.$file->getClientOriginalName();
    
                $file->move(public_path('audio'), $file_name);
    
                $media = new Media;
    
                $media->playlist_id = $request->playlist_id;
                $media->media_name = $file_name;
                $media->media_type = 'audio';
                $media->file_path = str_replace('\\', '/', public_path('audio/')).$file_name;
    
                $media->save();
            }

            elseif ($mediaType === 'image') {
                $file = $request->file('file');
                $file_name = time().'_'.$file->getClientOriginalName();
    
                $file->move(public_path('image'), $file_name);
    
                $media = new Media;
                dd($request);
                dd($media);
    
                $media->playlist_id = $request->playlist_id;
                $media->media_name = $file_name;
                $media->media_type = 'image';
                $media->file_path = str_replace('\\', '/', public_path('image/')).$file_name;
    
                $media->save();
            }

        }

        
        return response()->json([
            'message' => 'File uploaded success'
        ], 200);
    }

    public function deleteMediaFromPlaylist(Request $request, $id)
    {
        // dd($id);
        

        Media::find($id)->delete();
    }

    public function getAllMediaBelongingToPlaylist($id) 
    {
        $playlist = Playlist::find($id);
        return $playlist->media;
    }

    public function getSelectedMedia($id) 
    {
        $media = Media::find($id);
        return $media;
    }
}
