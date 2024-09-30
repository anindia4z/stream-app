@extends('member.layouts.base')

@section('title-desc', 'Update your personal details and manage account preferences here for a better experience.')

@section('title', 'Edit Profile')

@section('content')
    <form action="{{ route('account.setting.update', $user->id) }}" method="POST" enctype="multipart/form-data"
        class="flex flex-col rounded-2xl gap-6">
        @csrf
        @method('PUT')
        <div class="rounded-2xl bg-[#19152E] p-5 w-3/4 space-y-6">
            <div class="form-input flex flex-col items-center gap-4">
                <label for="avatar" class="text-base font-medium text-white">Upload Profile Picture</label>
                <!-- Image Preview -->
                @if ($user->avatar != null)
                    <img id="imagePreview" src="{{ asset('storage/profile/' . $user->avatar) }}" alt="Profile Picture"
                        class="rounded-full w-24 h-24 object-cover border-2 border-white">
                @else
                    <img id="imagePreview" src="{{ asset('stream/assets/images/userr.jpg') }}" alt="Profile Picture"
                        class="rounded-full w-24 h-24 object-cover border-2 border-white">
                @endif
                <!-- File Input -->
                <input type="file" name="avatar" id="avatar" accept="image/*" class="hidden"
                    onchange="previewImage(event)" />
                <!-- Upload Button -->
                <button type="button" onclick="document.getElementById('avatar').click();"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-600 rounded-full">
                    Choose Image
                </button>
            </div>
            <div class="form-input flex flex-col gap-3">
                <label for="name" class="text-base font-medium text-white">Name</label>
                <input type="text" name="name"
                    class="rounded-lg py-3 pr-3 pl-6 bg-[#19152E] text-white placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base focus:outline-indigo-600 input-stream"
                    placeholder="Your complete name" value="{{ ucwords($user->name) }}" />
            </div>
            <div class="form-input flex flex-col gap-3">
                <label for="email" class="text-base font-medium text-white">Email</label>
                <input type="email" name="email"
                    class="rounded-lg py-3 pr-3 pl-6 bg-[#19152E] text-white placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base focus:outline-indigo-600 input-stream"
                    placeholder="Your email address" value="{{ $user->email }}" />
            </div>
            <div class="flex flex-col gap-3">
                <label for="birth" class="text-base font-medium text-white">Birth</label>
                <input type="date" name="birth"
                    class="rounded-lg py-3 pr-3 pl-6 bg-[#19152E] text-white placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base focus:outline-indigo-600 input-stream"
                    placeholder="YYYY-MM-DD" value="{{ $user->birth }}" />
            </div>
            <div class="form-input flex flex-col gap-3">
                <label for="phone_number" class="text-base font-medium text-white">Phone Number</label>
                <input type="text" name="phone_number"
                    class="rounded-lg py-3 pr-3 pl-6 bg-[#19152E] text-white placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base focus:outline-indigo-600 input-stream"
                    placeholder="Your email address" value="{{ $user->phone_number }}" />
            </div>
            <div class="flex justify-end gap-3">
                <a href="{{ route('account.setting', Auth::user()->id) }}"
                    class="bg-red-500 rounded-md py-2 px-2 mt-4 w-24 h-10 text-center font-semibold text-white text-base">Batal
                </a>
                <button type="submit" class="bg-indigo-600 rounded-md py-2 px-2 mt-4 w-24 h-10 text-center">
                    <span class="font-semibold text-white text-base">Simpan
                    </span>
                </button>
            </div>
        </div>
    </form>
@endsection
<script>
    function previewImage(event) {
        const input = event.target;
        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            // Perbarui gambar di halaman edit
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = e.target.result;

            // Perbarui gambar di navbar
            const navbarImagePreview = document.getElementById('navbarImagePreview');
            if (navbarImagePreview) {
                navbarImagePreview.src = e.target.result;
            }
        }

        if (file) {
            reader.readAsDataURL(file); // Membaca file sebagai data URL
        }
    }
</script>
