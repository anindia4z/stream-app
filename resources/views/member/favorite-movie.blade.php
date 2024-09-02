@extends('member.layouts.base')

@section('title', 'Favorite Movie')

@section('title-desc', 'Update your personal details and manage account preferences here for a better experience.')

@section('content')
    <div>
        <div class="watched-movies hidden">
            <!-- Movies 1 -->
            <div class="relative group overflow-hidden mr-[30px]">
                <img src="{{ asset('stream/assets/images/film-1.png') }}"
                    class="object-cover rounded-[30px] w-full h-[300px] w-[240px] mb-3" alt="">
                <div
                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black rounded-bl-[28px] rounded-br-[28px] z-10 translate-y-0 group-hover:translate-y-[300px] transition ease-in-out duration-500 group-hover:bg-transparent overflow-hidden">
                </div>
                <div
                    class="absolute top-1/2 left-1/2 -translate-y-[500px] group-hover:-translate-y-1/2
            -translate-x-1/2 z-20 transition ease-in-out duration-500">
                    <img src="{{ asset('stream/assets/images/ic_play.svg') }}" class="" width="80" alt="">
                </div>
                <a href="#" class="inset-0 absolute z-50"></a>
                <div class="px-3 ">
                    <div class="font-medium text-xl text-white">Roro Jonggrang</div>
                    <p class="mb-0 text-stream-gray text-base mt-2">2024</p>
                </div>
            </div>

            {{-- Movie 2 --}}
            <div class="relative group overflow-hidden mr-[30px]">
                <img src="{{ asset('stream/assets/images/film-2.png') }}"
                    class="object-cover rounded-[30px] w-full h-[300px] w-[240px] mb-3" alt="">
                <div
                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black rounded-bl-[28px] rounded-br-[28px] z-10 translate-y-0 group-hover:translate-y-[300px] transition ease-in-out duration-500 group-hover:bg-transparent overflow-hidden">
                </div>
                <div
                    class="absolute top-1/2 left-1/2 -translate-y-[500px] group-hover:-translate-y-1/2
                -translate-x-1/2 z-20 transition ease-in-out duration-500">
                    <img src="{{ asset('stream/assets/images/ic_play.svg') }}" class="" width="80" alt="">
                </div>
                <a href="#" class="inset-0 absolute z-50"></a>
                <div class="px-3 ">
                    <div class="font-medium text-xl text-white">Roro Jonggrang</div>
                    <p class="mb-0 text-stream-gray text-base mt-2">2024</p>
                </div>
            </div>
        </div>
    </div>
@endsection
