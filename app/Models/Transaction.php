<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasUuids;
    protected $table = 'transaction';

    protected $fillable = [
        'package_id',
        'user_id',
        'amount',
        'transaction_code',
        'status'
    ];

    public function package()
    {
        return $this->belongsTo(Packages::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
