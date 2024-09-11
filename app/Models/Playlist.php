<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Playlist extends Model
{
    use HasFactory;

    protected $table = 'playlist';

    protected $fillable = [
        'nama',
        'user_id'
    ];

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'playlist_movie', 'playlist_id', 'movie_id');
    }
}
