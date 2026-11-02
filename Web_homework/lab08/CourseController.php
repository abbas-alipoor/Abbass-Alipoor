<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // View all courses
    public function index()
    {
        $courses = Course::latest()->paginate(10);

        return view('courses.index', compact('courses'));
    }

    // Show create form
    public function create()
    {
        return view('courses.create');
    }

    // Store new course
    public function store(Request $request)
    {
        $data = $request->validate([
            'course_code' => 'required|string|max:20|unique:courses,course_code',
            'title' => 'required|string|max:150',
            'credit_hours' => 'required|integer|min:1|max:6',
            'semester' => 'required|string|max:50',
        ]);

        Course::create($data);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course added successfully.');
    }

    // View one course
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // Show edit form
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // Update course
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'course_code' => 'required|string|max:20|unique:courses,course_code,' . $course->id,
            'title' => 'required|string|max:150',
            'credit_hours' => 'required|integer|min:1|max:6',
            'semester' => 'required|string|max:50',
        ]);

        $course->update($data);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    // Delete course
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}