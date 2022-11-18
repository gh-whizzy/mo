<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    //
    public function upload(Request $request)
    {
        //if request video
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $file_name = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('media'), $file_name);

            $media = new Media;

            $media->playlist_id = $request->playlist_id;
            $media->media_name = $file_name;
            $media->media_type = 'video';
            $media->file_path = 'public';

            $media->save();
            
            

            return response()->json([
                'message' => 'File uploaded success'
            ], 200);
        }
    }

        // audio

        // image
}
