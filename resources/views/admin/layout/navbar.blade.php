<ul class="nav navbar-nav">
    <li><a href="#">Home</a></li>
    @if (Auth::check())
    <li @if (Request::is('wmm/movie*')) class="active" @endif>
        <a href="{{ url('/wmm/movie') }}">Movie</a>
    </li>
    <li @if (Request::is('wmm/music*')) class="active" @endif>
        <a href="{{ url('/wmm/music') }}">Music</a>
    </li>
    <li @if (Request::is('wmm/fiction*')) class="active" @endif>
        <a href="{{ url('/wmm/fiction') }}">Fiction</a>
    </li>
    @endif
</ul>

<ul class="nav navbar-nav navbar-right">
    @if (Auth::guest())
    <li><a href="{{ url('/login') }}">Login</a></li>
    @else
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
            aria-expanded="false">
            {{ Auth::user()->name }}
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
    @endif
</ul>