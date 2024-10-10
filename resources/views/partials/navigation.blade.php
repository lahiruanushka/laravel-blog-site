<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <img src="{{ asset('images/blog.png') }}" alt="" style="width: 30px;" class="me-3">
        <a class="navbar-brand" href="{{ url('/') }}">
            BlogNest
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.create') }}">New Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.manage') }}">Manage Posts</a>
                    </li>
                @endauth
                @if (Auth::check() && Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}">Manage Users</a>
                    </li>
                @endif
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
