<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentFinishController extends Controller
{
    public function index()
    {
        return view('member.payment-finish');
    }
}
