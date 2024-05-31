@extends('layouts.app')

@section('title', 'Login - ZipLink')

@section('content')
<h1>Login</h1>
<form action="{{ route('auth.login.post') }}" method="POST">
    @csrf
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    
    <button type="submit">Login</button>
</form>
@endsection
