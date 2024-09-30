<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Playlist;
use App\Models\User;
use App\Models\UserPremium;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class MovieController extends Controller
{
    public function show($id)
    {
        $movie = Movie::findorFail($id);
        $user = auth()->user();

        $playlists = Playlist::where('user_id', auth()->user()->id)->get();
        return view('member.movie-detail', ['movie' => $movie, 'user' => $user, 'playlists' => $playlists ]);
    }

    public function watch($id)
    {
        $userId = auth()->user()->id;

        $userPremium = UserPremium::where('user_id', $userId)->first();

        if ($userPremium) {
            $endOfSubcription = $userPremium->end_of_subcription;

            $date = Carbon::createFromFormat('Y-m-d', $endOfSubcription);
            $isValidSubcription = $date->greaterThan(now());

            if ($isValidSubcription) {
                $movie  = Movie::find($id);
                return view('member.movie-watching', ['movie' => $movie]);
            }
        }

        return redirect()->route('pricing');
    }

    public function like($id)
    {
        $userId = auth()->user()->id;

        $user = User::where('id', $userId)->first();
        $movie = Movie::where('id', $id)->first();

        if ($user && $movie) {
            if (!$user->favoriteMovies()->where('movie_id', $movie->id)->exists()) {
                $user->favoriteMovies()->attach($movie);
            } else {
                $user->favoriteMovies()->detach($movie);
            }
        }
        return redirect()->back();
    }

    public function addToPlaylist(Request $request, $id)
    {
        $data = $request->except('_token');
        $movie = Movie::where('id', $id)->first();

        if ($data['playlist'] == 'custom') { 
            $playlist = Playlist::create([
                'user_id'=>auth()->user()->id,
                'nama'=>$data['name']
            ]);
            $playlist->movies()->attach($movie);
        } else {
            $playlist = Playlist::where('id', $data['playlist'])->first();
            $playlist->movies()->syncWithoutDetaching($movie);
        }

        return redirect()->back();
    }

    public function deleteFromPlaylist($movieId, $playlistId)
    {
        $playlist = Playlist::find($playlistId);
        $playlist->movies()->detach($movieId); 

        return redirect()->back();
    }
}
