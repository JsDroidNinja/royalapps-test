<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index() {
        $user = Session::get('user');
        return view('profile.index', compact('user'));
    }
}
