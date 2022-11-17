<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'playlist_name',
        'playlist_type',
        'created_by',
        'media'
    ];

    protected $casts = [
        'media' => 'array'
    ];
}
