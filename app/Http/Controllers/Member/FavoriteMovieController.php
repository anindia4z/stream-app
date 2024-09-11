<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteMovieController extends Controller
{
    public function index()
    {
        $movies = auth()->user()->favoriteMovies;
        return view('member.favorite-movie', ['movies' => $movies]);
    }

    public function destroy($id)
    {
        $user = User::find(auth()->user()->id);
        $movie = Movie::where('id', $id)->first();

        $user->favoriteMovies()->detach($movie);

        return redirect()->route('favorite.movie')->with('success', 'Movie removed from favorites.');

    }
}
