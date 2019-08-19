@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row m-3">
        <div class="col-3 p-5">
            <img src="https://pbs.twimg.com/profile_images/1154703977876996096/R8rSmxWC_200x200.jpg" class="rounded-circle">
        </div>
        <div class="col-9pt-5 border-left-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>0</strong> followers</div>
                <div class="pr-5"><strong>0</strong> following</div>
            </div>
            <div>
                <div class="pt-4 font-weight-bold">{{ $user->profile->title ?? 'awrer'}}</div>
                <div>{{ $user->profile->description ?? 'Hka'}}</div>
                <div><a href="#"></a>{{ $user->profile->url ?? 'aefe'}}</div>
            </div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/post/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
