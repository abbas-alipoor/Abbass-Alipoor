@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <div>
        <h2>Course Management</h2>
        <p class="text-muted">
            Manage your Information Technology courses.
        </p>
    </div>

    <a href="{{ route('courses.create') }}"
       class="btn btn-primary">
        + Add Course
    </a>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <h5 class="mb-3">Your Courses</h5>

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Credit Hours</th>
                        <th>Semester</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($courses as $course)

                    <tr>
                        <td>{{ $course->id }}</td>

                        <td>{{ $course->course_code }}</td>

                        <td>{{ $course->title }}</td>

                        <td>{{ $course->credit_hours }}</td>

                        <td>{{ $course->semester }}</td>

                        <td>

                            <a href="{{ route('courses.show', $course) }}"
                               class="btn btn-sm btn-primary">
                                View
                            </a>

                            <a href="{{ route('courses.edit', $course) }}"
                               class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('courses.destroy', $course) }}"
                                  class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this course?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger">
                                    Delete
                                </button>

                            </form>

                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            No courses found.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        {{ $courses->links() }}

    </div>

</div>

@endsection