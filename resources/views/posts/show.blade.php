@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="mr-3 w-100">
                    <img src="/storage/{{ $post->image }}" class="w-75">
                </div>
            </div>
            <div class="col-4">
                <div class="pr-3">
                    <div class="d-flex align-items-center-center">
                        <div class="pl-3">
                            <img src="/storage/{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width:50px;">
                        </div>
                        <div>
                            <div class="font-weight-bold">
                                <a href="/profile/{{ $post->user->id }}">
                                    <span class="text-dark">{{ $post->user->username }}</span></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <hr>
                        <p>
                            <span class="font-weight-bold">
                                <a href="/profile/{{ $post->user->id }}">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                </a>
                            </span>
                            {{ $post->caption }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
