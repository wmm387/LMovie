<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
use Illuminate\Support\Facades\Auth;
use Validator;

class MovieController extends Controller
{
    public function index()
    {
    	if (\Auth::user()) {
    		$movies = Movie::orderBy('created_at', 'desc')
                      ->paginate(config('movie.movies_per_page'));

    		return view('admin.movie.index', compact('movies'));
    	}else {
    		return redirect('login');
    	}

    }

    public function create()
    {
    	return view('admin.movie.create');
    }

    public function store(Request $request)
    {
        //验证
        $validator = Validator::make($request->input(), [
            'title' => 'required|string|max:100|min:1',
            'url' => 'required|string|min:10',
            'desc' => 'string',
            'release_time' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //逻辑
        $params = array_merge(request(['title', 'url', 'desc', 'release_time']));
        //创建文章模型,即插入数据库
        $movie = Movie::create($params);

        //渲染
        return redirect("wmm/movie");
    }

    public function edit(Movie $movie) {
        return view('admin.movie.edit', compact('movie'));
    }

    public function update(Movie $movie, Request $request) {
        $validator = Validator::make($request->input(), [
            'title' => 'required|string|max:100|min:1',
            'url' => 'required|string|min:10',
            'desc' => 'string',
            'release_time' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //逻辑(更新数据库)
        $movie->title = request('title');
        $movie->desc = request('desc');
        $movie->url = request('url');
        $movie->release_time = request('release_time');
        $movie->save();

        //渲染
        return redirect("wmm/movie");
    }

    public function delete(Movie $movie) {
        $movie->delete();
        return redirect('wmm/movie');
    }
}