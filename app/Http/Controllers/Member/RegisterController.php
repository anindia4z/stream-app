<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\OtpNotification;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /* public function index()
    {
        return view('member.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' =>'required|email',
            'password' => 'required|min:6'
        ]); 

        $data = $request->except('_token');

        $isEmailExist = User::where('email', $request->email)->exists();

        if($isEmailExist) {
            return back()->withErrors([
                'email' => 'This email already exist'
            ])->withInput();
        }

        $data['role'] = 'member';
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('member.login');
    } */

    public function index()
    {
        return view('member.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Cek apakah email sudah terdaftar
        $isEmailExist = User::where('email', $request->email)->exists();

        if ($isEmailExist) {
            return back()->withErrors([
                'email' => 'This email already exist'
            ])->withInput();
        }

        // Generate OTP
        $otp = rand(100000, 999999);

        // Simpan user dengan OTP
        $data = $request->except('_token');
        $data['role'] = 'member';
        $data['password'] = Hash::make($request->password);
        $data['otp'] = $otp; // Simpan OTP ke dalam data user

        $user = User::create($data);

        // Kirim OTP ke email
        $user->notify(new OtpNotification($otp));

        // Redirect ke halaman verifikasi OTP
        return redirect()->route('otp.verify')->with('email', $user->email);
    }
    
}
