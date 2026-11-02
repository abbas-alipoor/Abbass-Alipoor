@extends('layouts.app')

@section('content')

<div class="card shadow-sm">

    <div class="card-body p-4">

        <h2>{{ $course->title }}</h2>

        <hr>

        <p>
            <strong>Course Code:</strong>
            {{ $course->course_code }}
        </p>

        <p>
            <strong>Course Name:</strong>
            {{ $course->title }}
        </p>

        <p>
            <strong>Credit Hours:</strong>
            {{ $course->credit_hours }}
        </p>

        <p>
            <strong>Semester:</strong>
            {{ $course->semester }}
        </p>

        <a href="{{ route('courses.edit', $course) }}"
           class="btn btn-warning">
            Edit
        </a>

        <a href="{{ route('courses.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </div>

</div>

@endsection