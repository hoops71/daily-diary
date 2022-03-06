<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">My Diary</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li>
                    <a class="p-2 text-dark" href="{{ route('welcome') }}">Home</a>
                </li>
                 @if (Auth::guest())
                <li>   
                    <a class="p-2 text-dark" href="{{ route('login') }}">Login</a>
                </li>
                <li>
                    <a class="p-2 text-dark" href="{{ route('register') }}">Register</a>
                </li>
                @else
                <li>
                    <a class="p-2 text-dark" href="{{ route('diary.index') }}">Show all posts</a>
                </li>
                <li>
                    <a class="p-2 text-dark" href="{{ route('diary.create') }}">Create post</a>
                </li>
            </div>
            <div class="d-flex me-2">
                <li>
                    <a class="btn btn-primary" href="#" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" >Logout {{ Auth::user()->name }}</a>
                </li>
            </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endif
        </ul>
    </div>
    </div>
</nav>
