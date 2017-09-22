<html>
    <head>
        <title>{{ config('movie.title') }}</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
            @endforeach
            </ul>
            <hr>
            {{ $movies->links() }}
        </div>
    </body>
</html>