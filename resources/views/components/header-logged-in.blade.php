<div class="my-md-0 my-3 flex-row">
    <! - Add authenticated user navigation items here →

    @auth
        <p>Welcome back, {{ Str::before(Auth::user()->name, ' ') }}!</p>
    @endauth
</div>
