@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <a href="{{ url('/books') }}" class="text-decoration-none fw-semibold" style="color: #0d3b8e;">Back to listings</a>

        <h1 class="mt-3 mb-1">Add New Book</h1>
        <p class="text-muted mb-4">Fill out the form below to list your book for sale</p>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ url('/books') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter book title" required>
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label fw-bold">Author</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Enter author name" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="course_code" class="form-label fw-bold">Course Code</label>
                            <input type="text" class="form-control" id="course_code" name="course_code" placeholder="e.g. CS101" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label fw-bold">Price ($)</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="0.00" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="condition" class="form-label fw-bold">Condition</label>

                        <select class="form-select" id="condition" name="condition" required>
                            <option value="New">New</option>
                            <option value="Good">Good</option>
                            <option value="Fair">Fair</option>
                            <option value="Poor">Poor</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Describe the book's condition, highlights, notes, etc." required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="photo" class="form-label fw-bold">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept=".jpg,.jpeg,.png,.gif,.webp" required>
                    </div>

                    <button type="submit" class="btn w-100 text-white" style="background-color: #0d47a1;">Add Book</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection