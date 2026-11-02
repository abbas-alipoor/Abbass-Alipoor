<div class="mb-3">

    <label class="form-label">Course Code</label>

    <input type="text"
           name="course_code"
           class="form-control"
           value="{{ old('course_code', $course->course_code ?? '') }}"
           placeholder="Example: PY101"
           required>

</div>

<div class="mb-3">

    <label class="form-label">Course Name</label>

    <input type="text"
           name="title"
           class="form-control"
           value="{{ old('title', $course->title ?? '') }}"
           placeholder="Example: Python Programming"
           required>

</div>

<div class="mb-3">

    <label class="form-label">Credit Hours</label>

    <select name="credit_hours" class="form-select" required>

        @for($i = 1; $i <= 6; $i++)

            <option value="{{ $i }}"
                @selected(old('credit_hours', $course->credit_hours ?? 3) == $i)>
                {{ $i }}
            </option>

        @endfor

    </select>

</div>

<div class="mb-3">

    <label class="form-label">Semester</label>

    <select name="semester" class="form-select" required>

        <option value="Fall 2026"
            @selected(old('semester', $course->semester ?? '') == 'Fall 2026')>
            Fall 2026
        </option>

        <option value="Spring 2027"
            @selected(old('semester', $course->semester ?? '') == 'Spring 2027')>
            Spring 2027
        </option>

    </select>

</div>