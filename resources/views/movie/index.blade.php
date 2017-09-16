<html>
    <head>
        <title>{{ config('movie.title') }}</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1>{{ config('movie.title') }}</h1>
            <h5>Page {{ $movies->currentPage() }} of {{ $movies->lastPage() }}</h5>
            <hr>
            <ul>
            @foreach ($movies as $movie)
                <li>
                    <a href="{{ $movie->url }}">{{ $movie->title }}</a>
                    <em>({{ $movie->created_at }})</em>
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