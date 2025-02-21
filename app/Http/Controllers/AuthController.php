<?php

namespace App\Http\Controllers;

use App\Models\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller {
    public function showLoginForm() {
        return view('auth.login');
    }
    
    public function login(Request $request) {
        if (ApiService::login($request->only('email', 'password'))) {
            return redirect()->route('authors.index');
        }
        return back()->withErrors(['message' => 'Invalid credentials']);
    }
    
    public function logout() {
        Session::flush();
        return redirect('/login');
    }
}
