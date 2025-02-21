<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiService;
use Illuminate\Support\Facades\Session;
class AuthorsController extends Controller
{
    public function index(Request $request) {
        $params = $request->query();
        $authors = ApiService::getAuthors($params);
        return view('authors.index', compact('authors'));
    }

    public function show($id) {
        $author = ApiService::getAuthor($id);
        return view('authors.show', compact('author'));
    }

    public function delete($id) {
        $response = ApiService::deleteAuthor($id);
        
        if ($response->successful()) {
            return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
        }
        
        return back()->withErrors(['message' => 'Failed to delete author: ' . $response->json()['error'] ?? 'Unknown error']);
    }
}
