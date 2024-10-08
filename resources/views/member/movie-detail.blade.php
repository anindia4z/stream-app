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
                <div class="flex items-center space-x-2">
                    <form action="{{ route('member.movie.like', ['id' => $movie->id]) }}" method="POST">
                        @csrf
                        <button type="submit" id="likeButton"
                            class="flex items-center justify-center text-white font-semibold py-2 px-2 rounded-lg ms-2">
                            @if ($user->favoriteMovies()->where('movie_id', $movie->id)->exists())
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 fill-red-500">
                                    <path
                                        d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 fill-white">
                                    <path
                                        d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                                </svg>
                            @endif
                        </button>
                    </form>
                    <button id="addPlaylist">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 h-6 fill-white">
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                        </svg>
                    </button>
                    <!-- Modal -->
                    <div id="playlistModal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden z-50">
                        <div
                            class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-[#19152E] p-6 rounded-lg w-full max-w-md">
                            <div class="flex justify-between items-center">
                                <h2 class="text-xl font-semibold text-white">Add to Playlist</h2>
                                <button id="closePlaylistModal" class="text-gray-500 hover:text-gray-700">&times;</button>
                            </div>
                            <form class="mt-4" method="post" action="{{ route('member.movie.playlist', ['id' => $movie->id]) }}">
                                @csrf
                                <select name="playlist" id="selectPlaylist" class="bg-[#19152E] text-white mb-2">
                                    <option value="" disabled selected>
                                        Pilih Playlist
                                    </option>
                                    @foreach ($playlists as $playlist)
                                        <option value="{{ $playlist->id }}">
                                            {{ $playlist->nama }}
                                        </option>
                                    @endforeach
                                    <option value="custom">
                                        Tambah Baru
                                    </option>
                                </select>
                                <input type="text" id="inputPlaylistName" name="name"
                                    class="rounded-lg py-5 pl-3 pr-2 bg-[#19152E] text-white placeholder:text-stream-gray placeholder:font-normal font-medium outline outline-stream-gray outline-1 text-base focus:outline-indigo-600 input-stream w-full h-5 hidden"
                                    placeholder="Enter playlist name">
                                <button type="submit"
                                    class="mt-4 w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    Add
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
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
