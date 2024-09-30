@extends('member.layouts.base')

@section('title', 'Playlists')

@section('title-desc', 'Our Selected Movie For Your Mood')

@section('content')
    <div class="container mx-auto p-2">
        <!-- Grid Menu -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Menu Item 1 -->
            @foreach ($playlists as $playlist)
            <a href="{{ route('member.playlists.detail', ['id' => $playlist->id]) }}" class="flex items-center bg-[#19152E] shadow-md rounded-lg p-6">
                <h3 class="text-lg font-medium text-white mr-auto">{{ $playlist->nama }}</h3>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-5 h-5 fill-white">
                    <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/>
                </svg>
            </a>
            @endforeach
        </div>
    </div>
@endsection
