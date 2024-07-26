<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPremium extends Model
{
    protected $table = 'user_premium';

    protected $fillable = [
        'package_id',
        'user_id',
        'end_of_subcription'
    ];

    public function package()
    {
        return $this->belongsTo(Packages::class);
    }
}
