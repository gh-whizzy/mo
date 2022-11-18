<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Playlist;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'playlist_id',
        'media_name',
        'media_type',
        'file_path'
    ];

    public function playlist() 
    {
        return $this->belongsTo(Playlist::class);
    }
}
