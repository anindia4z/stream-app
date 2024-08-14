@extends('member.layouts.base')

@section('title-desc', 'Update your personal details and manage account preferences here for a better experience.')

@section('title', 'Account Setting')

@section('content')
    <div class="flex space-x-4">
        <div class="rounded-2xl bg-[#19152E] p-[20px] w-1/4 h-72">
            <img id="profileImage" src="{{ asset('stream/assets/images/photo.png') }}" alt="Profile Picture"
                class="rounded-full w-30 h-30 m-10 my-7">
            <div class="flex justify-end">
                <button type="button" onclick="document.getElementById('fileInput').click();"
                    class="inline-flex items-center p-2 text-sm font-medium text-white bg-yellow-500 hover:bg-yellow-600 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 512 512" fill="currentColor">
                        <path
                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z" />
                    </svg>
                </button>
            </div>
            <!-- Input File (Hidden) -->
            <input type="file" id="fileInput" class="hidden" onchange="previewImage(event)" />
        </div>
        <!-- /Stop Subscribe -->
        <div class="rounded-2xl p-[30px] bg-[#19152E] w-2/3">
            <!-- <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots"
                                    class="inline-flex justify-end items-center mb-3 p-2 text-sm font-medium text-center text-gray-900 rounded-lg  focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="white"
                                        viewBox="0 0 4 15">
                                        <path
                                            d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                </button> -->
            <!-- Dropdown menu -->
            <!-- <div id="dropdownDots"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                        </li>
                                    </ul>
                                </div> -->
            <form method="" action="" class="flex flex-col rounded-2xl gap-6">
                <div class="form-input flex flex-col gap-3">
                    <label for="name" class="text-base font-medium text-white">Name</label>
                    <input type="text"
                        class="rounded-lg py-3 pr-3 pl-6 bg-[#19152E] text-white placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base focus:outline-indigo-600 input-stream"
                        placeholder="Your complete name" value="{{ ucwords($user->name) }}" />
                </div>
                <div class="form-input flex flex-col gap-3">
                    <label for="email" class="text-base font-medium text-white">Email</label>
                    <input type="email"
                        class="rounded-lg py-3 pr-3 pl-6  bg-[#19152E] text-white placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base focus:outline-indigo-600 input-stream"
                        placeholder="Your email address" value="{{ $user->email }}" />
                </div>
                <div class="form-input flex flex-col gap-3">
                    <label for="phone_number" class="text-base font-medium text-white">Phone Number</label>
                    <input type="text"
                        class="rounded-lg py-3 pr-3 pl-6  bg-[#19152E] text-white placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base focus:outline-indigo-600 input-stream"
                        placeholder="Your email address" value="{{ $user->phone_number }}" />
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-indigo-600 rounded-md py-2 px-2 mt-4 w-24 h-10 text-center">
                        <span class="font-semibold text-white text-base">Save</span>
                    </button>

                </div>
            </form>
        </div>
    </div>
@endsection


<script>
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
</script>
