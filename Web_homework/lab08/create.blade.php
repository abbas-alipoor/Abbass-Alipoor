@extends('layouts.app')

@section('content')

<div class="card shadow-sm">

    <div class="card-body p-4">

        <h3 class="mb-4">Add New IT Course</h3>

        <form method="POST" action="{{ route('courses.store') }}">

            @csrf

            @include('courses._form')

            <button class="btn btn-primary">
                Save Course
            </button>

            <a href="{{ route('courses.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>

@endsection