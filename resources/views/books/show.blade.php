@extends('layouts.app')

@section('content')
<div class="container py-5">
    <a href="{{ url('/books') }}" class="text-decoration-none fw-semibold" style="color: #0d3b8e;">
        Back to listings
    </a>

    <div class="card mt-4 border rounded-3 overflow-hidden shadow-sm">
        <div class="row g-0">
            <div class="col-md-6">
                <div class="d-flex align-items-center justify-content-center p-3" style="background-color: #f3f4f6; height: 420px;">
                    <img src="{{ asset('storage/photos/' . $book->photo) }}"
                        alt="{{ $book->title }}"
                        class="w-100 h-100"
                        style="max-height: 100%; width: auto; object-fit: contain;">
                </div>
            </div>




            <div class="col-md-6">
                <div class="p-4 d-flex flex-column h-100">
                    <p class="text-muted small mb-1">{{ $book->course_code }}</p>

                    <h1 class="fw-bold mb-3" style="font-size: 2rem; line-height: 1.1;">
                        {{ $book->title }}
                    </h1>

                    <p class="text-muted small mb-2">by {{ $book->author }}</p>
                    <p class="text-muted small mb-2">Listed {{ $book->created_at->format('n/j/Y') }}</p>

                    <div class="mb-4">
                        <span class="badge
                            @if(strtolower($book->condition) == 'new') bg-success-subtle text-success
                            @elseif(strtolower($book->condition) == 'good') bg-primary-subtle text-primary
                            @elseif(strtolower($book->condition) == 'fair') bg-warning-subtle text-warning
                            @else bg-secondary-subtle text-secondary
                            @endif">
                            {{ $book->condition }} Condition
                        </span>
                    </div>

                    <div class="mb-4">
                        <h6 class="fw-bold mb-2">Description</h6>
                        <p class="text-muted mb-0">{{ $book->description }}</p>
                    </div>

                    <div class="mt-auto d-flex justify-content-between align-items-end">
                        <div>
                            <p class="text-muted small mb-1">Price</p>
                            <h2 class="fw-bold mb-0">${{ number_format($book->price, 2) }}</h2>
                        </div>

                        <button type="button" class="btn text-white px-4" style="background-color: #0d47a1; border-color: #0d47a1;">
                            Contact Seller
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection