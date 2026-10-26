
@extends('layouts.app')

@section('title', 'Sign in')

@section('content')
<div class="row justify-content-center align-items-center g-4 py-lg-4">

    <div class="col-lg-5">
        <div class="eyebrow mb-2">Welcome back</div>

        <h1 class="display-6 fw-bold mb-3">
            Pick up where your reading left off.
        </h1>

        <p class="text-secondary">
            Sign in to manage your own reading list.
            Your saved books stay linked to your account.
        </p>
    </div>

    <div class="col-lg-6">
        <section class="panel p-4 p-md-5">
            <div class="eyebrow mb-2">BookNest account</div>
            <h2 class="h3 fw-bold mb-1">Sign in</h2>

            <p class="text-secondary mb-4">
                Enter your account credentials.
            </p>

            <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="email">
                        Email address
                    </label>

                    <input
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        autofocus
                    >

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">
                        Password
                    </label>

                    <input
                        class="form-control"
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    >
                </div>

                <div class="form-check mb-4">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="remember"
                        id="remember"
                        value="1"
                    >

                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>

                <button class="btn btn-primary w-100 py-2" type="submit">
                    Sign in to BookNest
                </button>
            </form>

            <p class="text-center small text-secondary mt-4 mb-0">
                New to BookNest?
                <a href="{{ route('register') }}">Create an account</a>
            </p>
        </section>
    </div>
</div>
@endsection
