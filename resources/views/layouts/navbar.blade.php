<nav>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('shortlinks.create') }}">Create Shortlink</a>
    @auth
        <form action="{{ route('auth.logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="{{ route('auth.login') }}">Login</a>
        <a href="{{ route('auth.register') }}">Register</a>
    @endauth
</nav>
