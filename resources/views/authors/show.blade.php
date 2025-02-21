@extends('layout.app')

@section('title', 'Author Details')

@section('content')
    <h2>{{ $author['first_name'] }} {{ $author['last_name'] }}</h2>
    <p><strong>Birthday:</strong> {{ date('Y-m-d', strtotime($author['birthday'])) }}</p>
    <p><strong>Biography:</strong> {{ $author['biography'] }}</p>
    <p><strong>Gender:</strong> {{ ucfirst($author['gender']) }}</p>
    <p><strong>Place of Birth:</strong> {{ $author['place_of_birth'] }}</p>
    
    <h3>Books</h3>
    @if(empty($author['books']))
        <p>No books found.</p>
        <form action="{{ route('authors.delete', $author['id']) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Author</button>
        </form>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Release Date</th>
                    <th>Description</th>
                    <th>ISBN</th>
                    <th>Format</th>
                    <th>Number of Pages</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($author['books'] as $book)
                    <tr>
                        <td>{{ $book['id'] }}</td>
                        <td>{{ $book['title'] }}</td>
                        <td>{{ date('Y-m-d', strtotime($book['release_date'])) }}</td>
                        <td>{{ $book['description'] }}</td>
                        <td>{{ $book['isbn'] }}</td>
                        <td>{{ $book['format'] }}</td>
                        <td>{{ $book['number_of_pages'] }}</td>
                        <td>
                            <form action="{{ route('books.delete', $book['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection