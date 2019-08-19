@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">

            <div class="col-8 offset-2">
                <h1>Edit Profile</h1>
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Title</label>
                    <input type="text"
                           name="title"
                           id="title"
                           class="form-control"
                           value="{{ old('title') ?? $user->profile->title }}">
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>
                    <input type="text"
                           name="description"
                           id="description"
                           class="form-control"
                           value="{{ old('description') ?? $user->profile->description }}">
                </div>

                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">Url</label>
                    <input type="text"
                           name="url"
                           id="url"
                           class="form-control"
                           value="{{ old('url') ?? $user->profile->url }}">
                </div>
                <div>
                    <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger mt-5">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row pt-4">
                    <button class="btn btn-primary">Update Profile</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
