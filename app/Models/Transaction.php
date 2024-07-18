<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    protected $fillablle = [
        'package_id',
        'user_id',
        'amount',
        'transaction_code',
        'status'
    ];
}
