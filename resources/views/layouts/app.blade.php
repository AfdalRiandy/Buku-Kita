<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="\bootstrap-5.0.2\dist\css\bootstrap.css">
    <link rel="stylesheet" href="\css\custom.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0B5ED7;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('bukus.index') }}">Buku Kita</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tentangkami') }}">Tentang Kami</a>
                    </li>                    
                    @if(session('is_admin'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
                    <form class="d-flex" action="{{ route('search') }}" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
                        <button class="btn btn-outline-success" style="background-color: #BB2D3B;" type="submit">Search</button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('\bootstrap-5.0.2\dist\js\bootstrap.js') }}"></script>
</body>
</html>
