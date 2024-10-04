<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsersOTP;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VerifyController extends Controller
{
    /* public function index() {
        if (is_null(Auth::user()->email_verified_at)) {
            if (!UsersOTP::where('user_id', Auth::user()->id)->first()) {
                $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
                UsersOTP::create([
                    'user_id'=>Auth::user()->id,
                    'otp'=>$otp
                ]);
                Mail::send('member.verification-mail', ['otp'=>$otp], function($message){
                    $message->to(Auth::user()->email);
                });
            }
            return view('member.verification-email');
        }
        return redirect()->route('member.dashboard');
    }

    public function verify(Request $request) {
        $userotp = UsersOTP::where('otp', $request->otp)->where('user_id', Auth::user()->id)->first();
        if (is_null($userotp)) {
            return redirect()->back();
        }
        $userotp->user->email_verified_at = Carbon::now();
        $userotp->user->save();
        return redirect()->route('member.dashboard');
        
    } */

    public function showVerifyForm()
    {
        return view('member.verification-email');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
            'email' => 'required|email',
        ]);

        // Temukan user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek apakah OTP sesuai
        if ($user && $user->otp == $request->otp) {
            // Hapus OTP setelah diverifikasi
            $user->update(['otp' => null, 'email_verified_at' => now()]);

            // Redirect ke halaman login
            return redirect()->route('member.dashboard')->with('success', 'Account verified successfully. You can now log in.');
        } else {
            return back()->withErrors(['otp' => 'Invalid OTP.']);
        }
    }
}
