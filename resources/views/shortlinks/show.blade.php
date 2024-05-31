@extends('layouts.app')

@section('title', 'Detail Shortlink - ZipLink')

@section('content')
    <strong>Short URL:</strong><a href="{{ url($shortlink->short_url) }}">{{ $shortlink->short_url }}</a><br>
    <strong>Real URL:</strong> {{ $shortlink->real_url }}<br>
    <strong>Created At:</strong> {{ $shortlink->created_at }}<br>
    <strong>Updated At:</strong> {{ $shortlink->updated_at }}<br>

    <section>
        <a href="{{ route('shortlinks.edit', $shortlink->id) }}">Edit</a>
        <form action="{{ route('shortlinks.destroy', $shortlink->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </section>

    <h2>Clicks</h2>
    <table>
        <thead>
            <tr>
                <th>IP Address</th>
                <th>Device Info</th>
                <th>Click Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shortlink->clicks as $click)
                <tr>
                    <td>{{ $click->ip }}</td>
                    <td>{{ $click->device_info }}</td>
                    <td>{{ $click->click_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
