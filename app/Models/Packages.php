<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasUuids;
    protected $table = 'packages';

    protected $fillable = [
        'name',
        'price',
        'max_days',
        'max_user',
        'is_download',
        'is_4k'
    ];
}
