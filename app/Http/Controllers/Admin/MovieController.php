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
}
