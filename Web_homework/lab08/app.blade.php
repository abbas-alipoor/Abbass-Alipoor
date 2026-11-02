<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IT Student Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f3f6fc;
        }

        .navbar {
            background: #172e52;
        }

        .sidebar {
            background: #172e52;
            min-height: 90vh;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 14px;
            text-decoration: none;
            border-radius: 6px;
        }

        .sidebar a:hover {
            background: #1769df;
        }

        .main-content {
            padding: 30px;
        }

        .card {
            border: none;
            border-radius: 12px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark px-4 py-3">
    <span class="navbar-brand fw-bold">
        IT Student Portal
    </span>

    <div class="text-white">
        Welcome, {{ auth()->user()->name }}

        <form method="POST" action="{{ route('logout') }}"
              class="d-inline">
            @csrf
            <button class="btn btn-primary btn-sm ms-3">
                Logout
            </button>
        </form>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-2 sidebar p-3">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('courses.index') }}">Courses</a>
        </div>

        <div class="col-md-10 main-content">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @yield('content')

        </div>

    </div>
</div>

</body>
</html>