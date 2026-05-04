<nav>
    <a href="{{ route('welcome') }}">Vote</a>

    @if (Route::has('login'))
        <div>
            @guest
              
                <a href="{{ route('login') }}">login</a>
                <a href="{{ route('register') }}">register</a>
            @endguest

            @auth
              
                <span>Hello, {{ Auth::user()->name }}</span>

                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">logout</button>
                </form>
            @endauth
        </div>
    @endif
</nav>