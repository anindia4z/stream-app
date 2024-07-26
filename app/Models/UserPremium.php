<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function diff()
    {
        $created_at = Carbon::parse($this->created_at);
        $now = Carbon::now();
        $diff = $created_at->diffInDays($now)+1;

        return $diff;
    }
}
