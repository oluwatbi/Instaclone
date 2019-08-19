@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Show posts</h1>

        <h1>{{ $post->caption }}</h1>
        <div>
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
    </div>
@endsection
