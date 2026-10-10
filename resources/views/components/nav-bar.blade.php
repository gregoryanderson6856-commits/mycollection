<div class="navbar bg-white shadow-sm">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </div>
        </div>
        <a href="{{ route('home') }}" class="btn btn-ghost text-xl">Collections</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>

            <li>
                <details>
                    <summary>Collections</summary>
                    <ul class="bg-base-100 z-1 w-40 p-2">
                        <li><a href="{{ route('albums.index') }}">Albums</a></li>
                        <li><a href="">Comicbooks</a></li>
                        <li><a href="{{ route('songs.index') }}">Songs</a></li>
                        <li><a href="{{ route('paintings.index') }}">Paintings</a></li>
                    </ul>
                </details>
            </li>
        </ul>
    </div>
    <div class="navbar-end">
        @guest
            <a href="{{ route('auth/register') }}" class="btn btn-outline btn-primary mr-2">Register</a>
            <a href="{{ route('auth/login') }}" class="btn btn-outline btn-primary">Login</a>
        @else
            <!-- Shown ONLY to authenticated users -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @endguest
    </div>
</div>
