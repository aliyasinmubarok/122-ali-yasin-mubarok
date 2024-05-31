@extends('layouts.app')

@section('title', 'Dashboard - ZipLink')

@section('content')
<h1>Dashboard</h1>
<ul>
    @foreach($shortlinks as $shortlink)
    <li>
        <a href="{{ route('shortlinks.show', $shortlink) }}">{{ $shortlink->short_url }}</a>
        <form action="{{ route('shortlinks.destroy', $shortlink) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection
