<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Media;

class Playlist extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'playlist_id',
        'playlist_name',
        'playlist_type',
        'created_by',
    ];


        /**
     * Get the comments for the blog post.
     */
    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
