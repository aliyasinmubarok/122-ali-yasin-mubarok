@extends('layouts.app')

@section('title', 'Edit Shortlink - ZipLink')

@section('content')
<h1>Edit Shortlink</h1>
<form action="{{ route('shortlinks.update', $shortlink) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="real_url">Original URL:</label>
    <input type="url" id="real_url" name="real_url" value="{{ $shortlink->real_url }}" required>
    <button type="submit">Update</button>
</form>
@endsection
