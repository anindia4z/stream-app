<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::where('user_id', auth()->user()->id)->get();
        return view('member.playlists', ['playlists' => $playlists]);
    }

    public function show($id)
    {
        $playlist = Playlist::where('id', $id)->first();
        return view('member.playlist-movie', ['playlist' => $playlist]);
    }
}
