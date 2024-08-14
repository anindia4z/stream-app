@extends('member.layouts.base')

@section('title', 'Watch Today')

@section('title-desc', 'Our Selected Movie For Your Mood')

@section('content')
    <!-- Details -->
    <div class="flex gap-14 items-start">
        <a href="{{ route('member.dashboard') }}">
            <img src="{{ asset('stream/assets/images/ic_arrow-left-normal.svg') }}" alt="">
        </a>
        <div class="flex flex-col gap-10">
            <!-- Thumbnail -->
            <div class="w-full relative overflow-hidden group">
                <img src="{{ asset('storage/thumbnail/' . $movie->large_thumbnail) }}" class="object-cover rounded-[30px]"
                    alt="">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20">
                    <img src="{{ asset('stream/assets/images/ic_play.svg') }}" width="80" alt="">
                </div>
                <a href="{{ route('member.movie.watch', $movie->id) }}" class="inset-0 absolute z-50"></a>
            </div>
            <!-- Judul & Rating -->

            <div class="flex items-center justify-between">
                <div>
                    <div class="text-white font-medium text-[28px] capitalize">
                        {{ $movie->title }}
                    </div>
                    <p class="text-stream-gray text-base mt-[6px]">
                        {{ $movie->categories }} - Released at {{ date('Y', strtotime($movie->release_date)) }}
                    </p>
                </div>
                <button
                    class="flex items-center justify-center text-white font-semibold py-2 px-2 rounded-lg hover:bg-[#FF0000] ms-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-6 w-6 fill-white">
                        <path
                            d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                    </svg>
                </button>
                <button id="dropdownButton"
                    class="flex items-center justify-center text-white font-semibold py-2 px-2 rounded-lg hover:bg-[#3D3762] focus:outline-none focus:ring-2 focus:ring-red-500 ms-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512" class="h-6 w-6 fill-white">
                        <path
                            d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z" />
                    </svg>
                    <div id="dropdownMenu"
                        class="absolute right-0 mt-2 w-48 bg-white text-black rounded-lg shadow-lg hidden">
                        <ul class="py-1">
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Option 1</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Option 2</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Option 3</a></li>
                        </ul>
                    </div>
                </button>
            </div>
            <!-- Synopsis -->
            <div>
                <div class="text-xl text-white">About</div>
                <p class="max-w-[700px] mt-[10px] text-stream-gray text-base leading-8">
                    {{ $movie->about }}
                </p>
            </div>
        </div>
    </div>
    <!-- ./Details -->
@endsection
