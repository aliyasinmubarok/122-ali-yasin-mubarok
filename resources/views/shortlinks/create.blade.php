@extends('layouts.app')

@section('title', 'Create Shortlink - ZipLink')

@section('content')
<h1>Create Shortlink</h1>
<form action="{{ route('shortlinks.store') }}" method="POST">
    @csrf
    <label for="real_url">Original URL:</label>
    <input type="url" id="real_url" name="real_url" required>
    <button type="submit">Create</button>
</form>
@endsection