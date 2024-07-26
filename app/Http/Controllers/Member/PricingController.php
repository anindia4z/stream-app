<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packages;

class PricingController extends Controller
{
    public function index()
    {
        $standarPackage = Packages::where('name', 'standart')->first();
        $goldPackage = Packages::where('name', 'gold')->first();
        return view('member.pricing', [
            'standart' => $standarPackage,
            'gold' => $goldPackage
        ]);
    }
}
