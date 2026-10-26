
@extends('layouts.app')

@section('title', 'My reading shelf')

@section('content')

<div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
    <div>
        <div class="eyebrow mb-2">Personal library</div>

        <h1 class="display-6 fw-bold mb-1">
            My reading shelf
        </h1>

        <p class="text-secondary mb-0">
            Organize the books you are learning from,
            one entry at a time.
        </p>
    </div>

    <div class="stat-tile">
        <div class="small text-secondary">Books saved</div>
        <div class="h3 fw-bold mb-0">{{ $books->count() }}</div>
    </div>
</div>

<div class="row g-4">

    <div class="col-lg-4">
        <section class="panel p-4">
            <div class="eyebrow mb-2">New entry</div>
            <h2 class="h4 fw-bold mb-3">Add a book</h2>

            <form method="POST" action="{{ route('books.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="title">
                        Book title
                    </label>

                    <input
                        class="form-control @error('title') is-invalid @enderror"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        maxlength="150"
                        required
                    >

                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="author">
                        Author
                    </label>

                    <input
                        class="form-control @error('author') is-invalid @enderror"
                        id="author"
                        name="author"
                        value="{{ old('author') }}"
                        maxlength="100"
                        required
                    >

                    @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label" for="pages">
                        Number of pages
                    </label>

                    <input
                        class="form-control @error('pages') is-invalid @enderror"
                        id="pages"
                        type="number"
                        name="pages"
                        value="{{ old('pages') }}"
                        min="1"
                        max="10000"
                        required
                    >

                    @error('pages')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary w-100 py-2" type="submit">
                    Save to my shelf
                </button>
            </form>
        </section>

        <div class="small text-secondary mt-3 px-2">
            Page count must be between 1 and 10,000.
        </div>
    </div>

    <div class="col-lg-8">
        <section class="panel p-3 p-md-4">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <div class="eyebrow mb-1">Your collection</div>
                    <h2 class="h4 fw-bold mb-0">My books</h2>
                </div>

                <span class="badge rounded-pill text-bg-light border">
                    {{ $books->count() }} total
                </span>
            </div>

            @if ($books->isEmpty())

                <div class="text-center py-5">
                    <div class="display-6 mb-2">📚</div>

                    <h3 class="h5 fw-bold">
                        Your shelf is empty
                    </h3>

                    <p class="text-secondary mb-0">
                        Add your first book using the form.
                    </p>
                </div>

            @else

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th class="text-end">Pages</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td class="text-secondary">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="fw-semibold">
                                        {{ $book->title }}
                                    </td>

                                    <td>{{ $book->author }}</td>

                                    <td class="text-end">
                                        {{ number_format($book->pages) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @endif
        </section>
    </div>

</div>

@endsection
