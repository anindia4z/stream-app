<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return view('admin.movie');
    }

    public function create()
    {
        return view('admin.movie-create');
    }
}
