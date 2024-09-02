<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class AccountSettingController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id);
        return view('member.account-setting', compact('user'));
    }

    public function edit($id)
    {
        // Mengambil user berdasarkan ID
        $user = User::find($id);
        return view('member.account-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Validasi input dari pengguna
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:15',
            'birth' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Siapkan data yang akan diperbarui
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'birth' => $request->birth,
        ];

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = $avatar->hashName(); // Nama file gambar

            // Simpan gambar baru
            $avatar->storeAs('public/profile', $avatarName);

            // Hapus gambar lama jika ada
            if ($user->avatar && Storage::exists('public/profile/' . $user->avatar)) {
                Storage::delete('public/profile/' . $user->avatar);
            }

            // Tambahkan nama gambar ke data yang diperbarui
            $data['avatar'] = $avatarName;
        }

        // Perbarui data pengguna
        $user->update($data);

        return redirect()->route('account.setting', $id)->with('success', 'Profile updated successfully');
    }

    public function indexPassword($id)
    {
         // Menampilkan formulir perubahan password untuk pengguna dengan ID tertentu
         $user = User::findOrFail($id);
         return view('member.password', compact('user'));
    }

    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = User::findOrFail($id);

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Current password is incorrect'])->withInput();
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('account.setting', ['id' => $id])->with('status', 'Password successfully updated!');
    }
}
