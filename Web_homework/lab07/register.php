
@extends('layouts.app')

@section('title', 'Create account')

@section('content')
<div class="row justify-content-center align-items-center g-4 py-lg-3">

    <div class="col-lg-5">
        <div class="eyebrow mb-2">
            Your next chapter starts here
        </div>

        <h1 class="display-6 fw-bold mb-3">
            Build your personal reading shelf.
        </h1>

        <p class="text-secondary">
            Create an account to save books, track page counts,
            and keep your reading list private.
        </p>

        <div class="stat-tile mt-4">
            <div class="fw-bold">Private by design</div>
            <div class="small text-secondary">
                Only your account can view the books you add.
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <section class="panel p-4 p-md-5">
            <div class="eyebrow mb-2">Join BookNest</div>
            <h2 class="h3 fw-bold mb-1">Create account</h2>
            <p class="text-secondary mb-4">
                Fill in your details below.
            </p>

            <form method="POST" action="{{ route('register.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="name">Full name</label>
                    <input
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        maxlength="255"
                        autocomplete="name"
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="email">Email address</label>
                    <input
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">
                        Password (at least 8 characters)
                    </label>
                    <input
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        type="password"
                        name="password"
                        required
                        minlength="8"
                        autocomplete="new-password"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="password_confirmation">
                        Confirm password
                    </label>
                    <input
                        class="form-control"
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        minlength="8"
                        autocomplete="new-password"
                    >
                </div>

                <button class="btn btn-primary w-100 py-2" type="submit">
                    Create my account
                </button>
            </form>

            <p class="text-center small text-secondary mt-4 mb-0">
                Already registered?
                <a href="{{ route('login') }}">Sign in</a>
            </p>
        </section>
    </div>
</div>
@endsection
