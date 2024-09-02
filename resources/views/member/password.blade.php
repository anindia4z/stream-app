@extends('member.layouts.base')

@section('title', 'Reset Password')

@section('title-desc', 'Update your personal details and manage account preferences here for a better experience.')

@section('content')
    <form action="{{ route('password.update', ['id' => Auth::id()]) }}" method="POST"
        class="flex flex-col rounded-2xl gap-6">
        @csrf
        <div class="rounded-2xl bg-[#19152E] p-5 w-3/5 mx-auto space-y-6">
            <div class="text-2xl text-white font-semibold text-center">Reset Your Password</div>
            <div class="form-input flex flex-col gap-3">
                <label for="old_password" class="text-base font-medium text-white">Old Password</label>
                <input type="password" name="old_password" id="old_password"
                    class="rounded-lg py-3 pr-3 pl-6 bg-[#19152E] text-white placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base focus:outline-indigo-600 input-stream"
                    placeholder="Enter Your Current Password" required />
            </div>
            <div class="form-input flex flex-col gap-3">
                <label for="new_password" class="text-base font-medium text-white">New Password</label>
                <input type="password" name="new_password" id="new_password"
                    class="rounded-lg py-3 pr-3 pl-6 bg-[#19152E] text-white placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base focus:outline-indigo-600 input-stream"
                    placeholder="Enter Your New Password" required />
            </div>
            <div class="form-input flex flex-col gap-3">
                <label for="new_password_confirmation" class="text-base font-medium text-white">Confirm New Password</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                    class="rounded-lg py-3 pr-3 pl-6 bg-[#19152E] text-white placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base focus:outline-indigo-600 input-stream"
                    placeholder="Confirm Your New Password" required />
            </div>
            <div class="flex justify-end gap-3">
                <a href="{{ route('account.setting', ['id' => Auth::id()]) }}"
                    class="bg-red-500 rounded-md py-2 px-2 mt-4 w-24 h-10 text-center font-semibold text-white text-base">Batal</a>
                <button type="submit" class="bg-indigo-600 rounded-md py-2 px-2 mt-4 w-24 h-10 text-center">
                    <span class="font-semibold text-white text-base">Simpan</span>
                </button>
            </div>
        </div>
    </form>
@endsection

    
