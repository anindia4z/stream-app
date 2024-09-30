@extends('member.layouts.base')

@section('title-desc', 'Update your personal details and manage account preferences here for a better experience.')

@section('title', 'Profile')

@section('content')
    <div class="flex gap-4">
        <div class="rounded-2xl bg-[#19152E] p-[20px] w-3/4 space-y-6">
            <div class="flex flex-col items-center gap-4">
                <label for="avatar" class="text-base font-medium text-white">Profile Picture</label>
                <!-- Image Preview -->
                @if ($user->avatar != null)
                    <img id="imagePreview" src="{{ asset('storage/profile/' . $user->avatar) }}" alt="Profile Picture"
                        class="rounded-full w-24 h-24 object-cover border-2 border-white">
                @else
                    <img id="imagePreview" src="{{ asset('stream/assets/images/userr.jpg') }}" alt="Profile Picture"
                        class="rounded-full w-24 h-24 object-cover border-2 border-white">
                @endif
            </div>
            <div class="flex flex-col gap-3">
                <label for="name" class="text-base font-medium text-white">Name</label>
                <input type="text" name="name"
                    class="rounded-lg py-3 pr-3 pl-6 bg-[#19152E] text-gray-50 placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base"
                    placeholder="Your complete name" value="{{ ucwords($user->name) }}" readonly />
            </div>
            <div class="flex flex-col gap-3">
                <label for="email" class="text-base font-medium text-white">Email</label>
                <input type="email" name="email"
                    class="rounded-lg py-3 pr-3 pl-6 bg-[#19152E] text-gray-50 placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base"
                    placeholder="Your email address" value="{{ $user->email }}" readonly />
            </div>
            <div class="flex flex-col gap-3">
                <label for="birth" class="text-base font-medium text-white">Birth</label>
                <input type="date" name="birth"
                    class="rounded-lg py-3 pr-3 pl-6 bg-[#19152E] text-gray-50 placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base"
                    placeholder="YYYY-MM-DD" value="{{ $user->birth }}" readonly />
            </div>
            <div class="flex flex-col gap-3">
                <label for="phone_number" class="text-base font-medium text-white">Phone Number</label>
                <input type="text" name="phone_number"
                    class="rounded-lg py-3 pr-3 pl-6 bg-[#19152E] text-gray-50 placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base"
                    placeholder="Your phone number" value="{{ $user->phone_number }}" readonly />
            </div>
            <div class="flex justify-end gap-3">
                <a href="{{ route('account.setting.edit', $user->id) }}"
                    class="bg-indigo-500 rounded-md py-2 px-2 mt-4 w-24 h-10 text-center font-semibold text-white text-base">Edit
                </a>
            </div>
        </div>
        <div class="rounded-2xl bg-[#19152E] p-[20px] w-1/4 h-48">
            <div class="text-2xl text-indigo-500 font-semibold mb-2">Password</div>
            <p class="text-white">If you forgot your password or want to change it</p>
            <div class="flex gap-3">
                <a href="{{ route('password', $user->id) }}"
                    class="bg-indigo-500 rounded-lg py-2 px-2 mt-4 w-30 h-15 text-center font-semibold text-white text-sm">Change
                    Password
                </a>
            </div>
        </div>
    </div>

@endsection
<script>
    document.querySelectorAll('[data-dismiss="alert"]').forEach(button => {
        button.addEventListener('click', () => {
            const alert = button.closest('[role="alert"]');
            if (alert) {
                alert.style.display = 'none';
            }
        });
    });
</script>
