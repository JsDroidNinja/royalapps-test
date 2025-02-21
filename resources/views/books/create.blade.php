@extends('layout.app')
@section('title', 'Add New Book')
@section('content')
    <h2>Add New Book</h2>
    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Author</label>
            <select name="author_id" class="form-control">
                @foreach($authors['items'] as $author)
                    <option value="{{ $author['id'] }}">{{ $author['first_name'] }} {{ $author['last_name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Release Date</label>
            <input type="date" name="release_date" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">ISBN</label>
            <input type="text" name="isbn" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Format</label>
            <input type="text" name="format" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Number of Pages</label>
            <input type="number" name="number_of_pages" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
@endsection