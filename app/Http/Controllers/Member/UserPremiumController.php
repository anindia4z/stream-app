<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserPremium;
use Carbon\Carbon;

class UserPremiumController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $userPremium = UserPremium::with('package')
            ->where('user_id', $userId)
            ->first();

        if (!$userPremium) {
            return redirect()->route('pricing');
        }

        $diff = $userPremium->diff();

        if ($diff > 30) {
            return redirect()->route('pricing');
        }
        
        return view('member.subcription', ['user_premium' => $userPremium, 'diff' => $userPremium->diff()]);
    }


    public function destroy($id)
    {
        UserPremium::destroy($id);

        return redirect()->route('member.dashboard');
    }
}
