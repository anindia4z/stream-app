<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    
    use HasFactory, SoftDeletes, HasUuids;
    
    protected $table = 'movies';

    protected $fillable = [
        'title',
        'trailer',
        'movie',
        'cats',
        'categories',
        'small_thumbnail',
        'large_thumbnail',
        'release_date',
        'about',
        'short_about',
        'duration',
        'featured'
    ];

    public function favoriteByUsers():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
