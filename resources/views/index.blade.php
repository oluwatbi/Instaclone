@extends('layouts.app')

@section('content')
<div class="container">
<div class="row m-3">
    <div class="col-3 p-0">
        <img src="/storage/{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
    </div>
    <div class="col-9 pt-5 pl-5">
        <div class="d-flex justify-content-between align-items-basement">
            <div class="d-flex align-items-center p-3">
                <div class="h4 pr-3">{{ $user->username}}</div>
                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
            </div>
        </div>
        @can('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
            <a href="/post/create">New Post</a>
        @endcan

        <div class="d-flex">
            <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
            <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
            <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
        </div>
        <div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title ?? ''}}</div>
        <div>{{ $user->profile->description ?? ''}}</div>
        <div><a href="#"></a>{{ $user->profile->url ?? ''}}</div>
    </div>
</div>
</div>
<div class="row pt-4">
@foreach($user->posts as $post)
    <div class="col-4 p-2">
        <a href="/post/{{ $post->id }}">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </a>
    </div>
@endforeach
</div>
</div>
@endsection
