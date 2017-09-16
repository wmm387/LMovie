<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;

class MovieController extends Controller
{
    public function index()
    {
    	$movies = Movie::paginate(config('movie.movies_per_page'));

    	return view('admin.movie.index', compact('movies'));
    }
}
