<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
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
