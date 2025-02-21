@extends('layout.app')
@section('title', 'Authors List')
@section('content')
    <h2>Authors List</h2>
    <form method="GET" action="{{ route('authors.index') }}" class="mb-3">
        <input type="text" name="query" value="{{ request('query') }}" placeholder="Search authors..." class="form-control">
        <button type="submit" class="btn btn-primary mt-2">Search</button>
    </form>
    <a href="{{ route('books.create') }}" class="btn btn-success mb-3">Create Book</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthday</th>
                <th>Gender</th>
                <th>Place of Birth</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors['items'] as $author)
                <tr>
                    <td>{{ $author['id'] }}</td>
                    <td>{{ $author['first_name'] }}</td>
                    <td>{{ $author['last_name'] }}</td>
                    <td>{{ date('Y-m-d', strtotime($author['birthday'])) }}</td>
                    <td>{{ ucfirst($author['gender']) }}</td>
                    <td>{{ $author['place_of_birth'] }}</td>
                    <td>
                        <a href="{{ route('authors.show', $author['id']) }}" class="btn btn-primary">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <nav>
        <ul class="pagination">
            @for ($i = 1; $i <= $authors['total_pages']; $i++)
                <li class="page-item {{ $authors['current_page'] == $i ? 'active' : '' }}">
                    <a class="page-link" href="?page={{ $i }}&query={{ request('query') }}">{{ $i }}</a>
                </li>
            @endfor
        </ul>
    </nav>
@endsection
