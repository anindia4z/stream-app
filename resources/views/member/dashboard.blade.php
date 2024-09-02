@extends('member.layouts.base')

@section('title-desc', 'Our Selected Movie For Your Mood')

@section('title', 'Watch Today')

@section('content')
    <!-- Featured -->
    <div>
        <div class="font-semibold text-2xl text-white mb-5">Featured</div>
        <div class="overflow-x-auto snap-x snap-mandatory" style="scrollbar-width: none; -ms-overflow-style: none;">
            <div class="flex gap-5">
                @foreach ($movies as $movie)
                    <div class="relative group overflow-hidden flex-shrink-0 mr-8 ">
                        <img src="{{ asset('storage/thumbnail/' . $movie->large_thumbnail) }}" class="object-cover rounded-[30px] w-160 h-80"
                            alt="">
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black rounded-bl-[28px] rounded-br-[28px] z-10 translate-y-0 group-hover:translate-y-[300px] transition ease-in-out duration-500 group-hover:bg-transparent">
                            <div class="px-7 pb-7">
                                <div class="font-medium text-xl text-white">{{ $movie->title }}</div>
                                <p class="mb-0 text-stream-gray text-base mt-[10px]">
                                    {{ date('Y', strtotime($movie->release_date)) }}
                                </p>
                            </div>
                        </div>
                        <div
                            class="absolute top-1/2 left-1/2 -translate-y-[500px] group-hover:-translate-y-1/2
                    -translate-x-1/2 z-20 transition ease-in-out duration-500">
                            <img src="{{ asset('stream/assets/images/ic_play.svg') }}" class="" width="80"
                                alt="">
                        </div>
                        <a href="{{ route('member.movie.detail', $movie->id) }}" class="inset-0 absolute z-50"></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- /Featured -->
    <!-- Continue Watching -->
    <div>
        <div class="font-semibold text-2xl text-white mb-5">Continue Watching</div>
        <div class="overflow-x-auto snap-x snap-mandatory" style="scrollbar-width: none; -ms-overflow-style: none;">
            <div class="flex gap-3">
                @foreach ($movies as $movie)
                    <div class="relative group overflow-hidden flex-shrink-0 mr-8">
                        <img src="{{ asset('storage/thumbnail/' . $movie->small_thumbnail) }}"
                            class="object-cover rounded-[30px] w-[240px] h-[300px]" alt="">
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black rounded-bl-[28px] rounded-br-[28px] z-10 translate-y-0 group-hover:translate-y-[300px] transition ease-in-out duration-500 group-hover:bg-transparent overflow-hidden">
                            <div class="px-7 pb-7">
                                <div class="font-medium text-xl text-white">{{ $movie->title }}</div>
                                <p class="mb-0 text-stream-gray text-base mt-[10px]">
                                    {{ date('Y', strtotime($movie->release_date)) }}</p>
                            </div>
                        </div>
                        <div
                            class="absolute top-1/2 left-1/2 -translate-y-[500px] group-hover:-translate-y-1/2
                        -translate-x-1/2 z-20 transition ease-in-out duration-500">
                            <img src="{{ asset('stream/assets/images/ic_play.svg') }}" class="" width="80"
                                alt="">
                        </div>
                        <a href="{{ route('member.movie.detail', $movie->id) }}" class="inset-0 absolute z-50"></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- /Continue Watching -->
@endsection
