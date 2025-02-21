@extends('layout.app')
@section('title', 'Profile')
@section('content')
    <h2>User Profile</h2>
    <p><strong>First Name:</strong> {{ $user['first_name'] }}</p>
    <p><strong>Last Name:</strong> {{ $user['last_name'] }}</p>
    <p><strong>Email:</strong> {{ $user['email'] }}</p>
@endsection