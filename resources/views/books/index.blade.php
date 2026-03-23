@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="container mt-4">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="py-5 mb-5 text-center" style="background-color: #eef3f3;">
        <div class="container">
            <h1 class="fw-bold mb-3">Buy and Sell Textbooks</h1>
            <p class="text-muted mb-0">
                The student marketplace for used textbooks. Find great deals or sell your old
                <br>
                books to fellow students.
            </p>
        </div>
    </div>

    <div class="container">
        <h3 class="fw-bold mb-1">Available Books</h3>
        <p class="text-muted small mb-4">{{ $books->count() }} listings available</p>

        <div class="row g-4">
            @foreach($books as $book)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3">

                        <div class="position-relative" style="height: 350px; background-color: #f3f4f6;">
                            <img src="{{ asset('storage/photos/' . $book->photo) }}"
                                 alt="{{ $book->title }}"
                                 class="w-100 h-100"
                                 style="object-fit: contain;">

                            <span class="badge position-absolute top-0 end-0 m-2
                                @if(strtolower($book->condition) == 'new') bg-success-subtle text-success
                                @elseif(strtolower($book->condition) == 'good') bg-primary-subtle text-primary
                                @elseif(strtolower($book->condition) == 'fair') bg-warning-subtle text-warning
                                @else bg-secondary-subtle text-secondary
                                @endif">
                                {{ $book->condition }}
                            </span>
                        </div>

                        <div class="card-body">
                            <p class="text-muted small mb-1">{{ $book->course_code }}</p>
                            <h6 class="fw-bold mb-2">{{ $book->title }}</h6>
                            <p class="text-muted small mb-3">by {{ $book->author }}</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold fs-5">${{ number_format($book->price, 2) }}</span>
                                <a href="{{ url('/books/' . $book->id) }}"
                                   class="btn btn-sm text-white"
                                   style="background-color: #0d47a1;">
                                    View Details
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection