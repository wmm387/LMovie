<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Movie</title>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
            .big {
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>{{ config('movie.title') }}</h1>
            <h5>Page {{ $movies->currentPage() }} of {{ $movies->lastPage() }}</h5>
            <hr>
            <ul>
            @foreach ($movies as $movie)
                <li>
                    <a target="_blank" href="{{ $movie->url }}"><b class="big">{{ $movie->title }} </b></a>
                    <em> ({{ $movie->release_time }}年作品)</em>
                    <p>
                        {{ $movie->desc }}
                    </p>
                </li>
                <hr>
            @endforeach
            </ul>
            {{ $movies->links() }}
        </div>
    </body>
</html>