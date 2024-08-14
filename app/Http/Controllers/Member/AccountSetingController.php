<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountSetingController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('member.account-setting', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = User::all();

        


    }
}
