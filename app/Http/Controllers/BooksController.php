<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiService;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\BookRequest;
class BooksController extends Controller
{
    public function create() {
        $authors = ApiService::getAuthors();
        return view('books.create', compact('authors'));
    }

    public function store(BookRequest $request) {
        $data = [
            'author' => ['id' => $request->author_id],
            'title' => $request->title,
            'release_date' => $request->release_date,
            'description' => $request->description,
            'isbn' => $request->isbn,
            'format' => $request->format,
            'number_of_pages' => $request->number_of_pages,
        ];
        
        $response = ApiService::addBook($data);
        if ($response->successful()) {
            return redirect()->route('authors.index')->with('success', 'Book added successfully');
        }
        
        return back()->withErrors(['message' => 'Failed to add book: ' . $response->json()['detail'] ?? 'Unknown error']);
    }

    public function delete($id) {
        ApiService::deleteBook($id);
        return back()->with('success', 'Book deleted successfully');
    }
}
