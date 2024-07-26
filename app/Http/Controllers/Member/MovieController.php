<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\UserPremium;
use Illuminate\Support\Carbon;


class MovieController extends Controller
{
    public function show($id)
    {
        $movie = Movie::findorFail($id);

        return view('member.movie-detail', ['movie' => $movie]);
    }

    public function watch($id)
    {
        $userId = auth()->user()->id;

        $userPremium = UserPremium::where('user_id', $userId)->first();

        if($userPremium) {
            $endOfSubcription = $userPremium->end_of_subcription;

            $date = Carbon::createFromFormat('Y-m-d', $endOfSubcription);
            $isValidSubcription = $date->greaterThan(now());

            if ($isValidSubcription)
            {
                $movie  = Movie::find($id);
                return view('member.movie-watching', ['movie' => $movie] );
            }
        }

        return redirect()->route('pricing');
    }
}
