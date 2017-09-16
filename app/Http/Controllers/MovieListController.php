<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieListController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('created_at', 'desc')
                ->paginate(config('movie.movies_per_page'));

        return view('movie.index', compact('movies'));
    }
}
