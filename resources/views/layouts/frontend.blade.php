<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    
    <!-- Page Title and Favicon -->
    <title>BlogNest</title>
    <link rel="icon" type="image/png" href="{{ asset('images/blog.png') }}">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
</head>

<body>

    <header class="blog-header py-3">
        <div class="container">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 text-left">
                    <a class="blog-header-logo text-dark" href="#" style="text-decoration: none;">BlogNest</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="btn btn-sm btn-outline-secondary m-2" href="{{ route('register') }}">Sign up</a>
                    <a class="btn btn-sm btn-outline-primary m-2" href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </div>
    </header>

    <main class="container m-3">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-muted py-4 bg-light">
        <div class="container">
            <p class="mb-1">© 2024 BlogNest. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
