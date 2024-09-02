@extends('member.layouts.base')

@section('title-desc', 'Update your personal details and manage account preferences here for a better experience.')

@section('title', 'Profile')

@section('content')
    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg relative" role="alert">
            <span class="font-medium">Success!</span> {{ session('status') }}
            <button type="button" class="absolute top-2 right-2 text-green-500 hover:text-green-600" data-dismiss="alert"
                aria-label="Close">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @endif
    <div class="flex gap-4">
        <div class="rounded-2xl bg-[#19152E] p-[20px] w-3/4 space-y-6">
            <div class="flex flex-col items-center gap-4">
                <label for="avatar" class="text-base font-medium text-white">Profile Picture</label>
                <!-- Image Preview -->
                <img id="imagePreview" src="{{ asset('storage/profile/' . $user->avatar) }}" alt="Profile Picture"
                    class="rounded-full w-32 h-32 object-cover border-2 border-white">
            </div>
            <div class="flex flex-col gap-3">
                <label for="name" class="text-base font-medium text-white">Name</label>
                <input type="text" name="name"
                    class="rounded-lg py-3 pr-3 pl-6 bg-[#19152E] text-gray-500 placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base"
                    placeholder="Your complete name" value="{{ ucwords($user->name) }}" readonly />
            </div>
            <div class="flex flex-col gap-3">
                <label for="email" class="text-base font-medium text-white">Email</label>
                <input type="email" name="email"
                    class="rounded-lg py-3 pr-3 pl-6 bg-[#19152E] text-gray-500 placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base"
                    placeholder="Your email address" value="{{ $user->email }}" readonly />
            </div>
            <div class="flex flex-col gap-3">
                <label for="birth" class="text-base font-medium text-white">Birth</label>
                <input type="date" name="birth"
                    class="rounded-lg py-3 pr-3 pl-6 bg-[#19152E] text-gray-500 placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base"
                    placeholder="YYYY-MM-DD" value="{{ $user->birth }}" readonly />
            </div>
            <div class="flex flex-col gap-3">
                <label for="phone_number" class="text-base font-medium text-white">Phone Number</label>
                <input type="text" name="phone_number"
                    class="rounded-lg py-3 pr-3 pl-6 bg-[#19152E] text-gray-500 placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base"
                    placeholder="Your phone number" value="{{ $user->phone_number }}" readonly />
            </div>
            <div class="flex justify-end gap-3">
                <a href="{{ route('account.setting.edit', $user->id) }}"
                    class="bg-yellow-500 rounded-md py-2 px-2 mt-4 w-24 h-10 text-center font-semibold text-white text-base">Edit
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

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownButton = document.getElementById('dropdownMenuIconButton');
        const dropdownMenu = document.getElementById('dropdownDots');

        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close the dropdown if the user clicks outside of it
        window.addEventListener('click', function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script> --}}


{{-- chatgpt --}}
{{-- <script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.readAsDataURL(event.target.files[0]);
        document.getElementById('fileInput').form.submit();
    }
</script>
 --}}
