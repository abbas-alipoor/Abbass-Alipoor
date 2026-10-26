
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Reading Portal') | BookNest</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        :root {
            --ink: #20213b;
            --accent: #6558d3;
            --paper: #f5f6fb;
        }

        body {
            background: var(--paper);
            color: var(--ink);
            min-height: 100vh;
        }

        .navbar {
            background: #20213b;
        }

        .brand-mark {
            display: inline-grid;
            place-items: center;
            width: 34px;
            height: 34px;
            border-radius: 11px;
            background: #6558d3;
            color: white;
            font-weight: 800;
            margin-right: .55rem;
        }

        .navbar-brand {
            font-weight: 750;
        }

        .btn-primary {
            background: var(--accent);
            border-color: var(--accent);
        }

        .btn-primary:hover {
            background: #5144bd;
            border-color: #5144bd;
        }

        .page-wrap {
            max-width: 1080px;
        }

        .panel {
            border: 1px solid #e5e6f0;
            border-radius: 18px;
            background: white;
            box-shadow: 0 12px 35px #20213b0f;
        }

        .eyebrow {
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--accent);
            font-size: .72rem;
            font-weight: 800;
        }

        .form-control {
            border-color: #dfe1ed;
            padding: .7rem .85rem;
        }

        .form-control:focus {
            border-color: #9188e6;
            box-shadow: 0 0 0 .2rem #6558d31f;
        }

        .table thead th {
            color: #6c6d85;
            font-size: .78rem;
            text-transform: uppercase;
            background: #f7f7fc;
        }

        .stat-tile {
            border-radius: 15px;
            background: #f0efff;
            padding: 1rem;
        }

        footer {
            color: #777991;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center"
           href="{{ auth()->check() ? route('dashboard') : route('login') }}">
            <span class="brand-mark">B</span>
            BookNest
        </a>

        <div class="ms-auto d-flex align-items-center gap-3">
            @auth
                <span class="text-white-50 small d-none d-sm-inline">
                    Hello, {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-sm btn-outline-light" type="submit">
                        Sign out
                    </button>
                </form>
            @else
                <a class="nav-link text-white" href="{{ route('login') }}">
                    Sign in
                </a>

                <a class="btn btn-sm btn-primary" href="{{ route('register') }}">
                    Create account
                </a>
            @endauth
        </div>
    </div>
</nav>

<main class="container page-wrap py-5">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please check the form:</strong>

            <ul class="mb-0 mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</main>

<footer class="container text-center small py-4">
    BookNest · Personal Reading Library
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
