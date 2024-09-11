@extends('member.layouts.base')

@section('title', 'Favorite Movie')

@section('title-desc', 'Update your personal details and manage account preferences here for a better experience.')

@section('content')
    <div>
        <div class="grid grid-cols-4 gap-6">
            <!-- Movies 1 -->
            @foreach ($movies as $movie)
                <div class="relative group overflow-hidden mr-[30px]">
                    <a href="{{ route('member.movie.watch', $movie->id) }}">
                        <img src="{{ asset('storage/thumbnail/' . $movie->small_thumbnail) }}"
                            class="object-cover rounded-[30px] w-[240px] h-[300px] mb-3" alt="">
                    </a>
                    <div
                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black rounded-bl-[28px] rounded-br-[28px] z-10 translate-y-0 group-hover:translate-y-[300px] transition ease-in-out duration-500 group-hover:bg-transparent overflow-hidden">
                </div>
                    <div
                        class="absolute top-1/2 left-1/2 -translate-y-[500px] group-hover:-translate-y-1/2
            -translate-x-1/2 z-20 transition ease-in-out duration-500">
                        <img src="{{ asset('stream/assets/images/ic_play.svg') }}" class="" width="80"
                            alt="">
                    </div>
                    <div class=" flex justify-between items-center z-30 ">
                        <div class="font-medium text-base text-white">{{ $movie->title }}</div>
                        <form action="{{ route('favorite.movie.destroy', ['id'=>$movie->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                class="flex items-center justify-center text-white font-semibold py-2 px-2 rounded-lg ms-2 z-50">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 h-5 fill-red-600">
                                    <path
                                        d="M170.5 51.6L151.5 80l145 0-19-28.4c-1.5-2.2-4-3.6-6.7-3.6l-93.7 0c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80 368 80l48 0 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-8 0 0 304c0 44.2-35.8 80-80 80l-224 0c-44.2 0-80-35.8-80-80l0-304-8 0c-13.3 0-24-10.7-24-24S10.7 80 24 80l8 0 48 0 13.8 0 36.7-55.1C140.9 9.4 158.4 0 177.1 0l93.7 0c18.7 0 36.2 9.4 46.6 24.9zM80 128l0 304c0 17.7 14.3 32 32 32l224 0c17.7 0 32-14.3 32-32l0-304L80 128zm80 64l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    <p class="mb-0 text-stream-gray text-sm mt-2">{{ date('Y', strtotime($movie->release_date)) }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
