@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/post" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">

            <div class="col-8 offset-2">
                <h1>Publish A New Post</h1>
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Post caption</label>
                    <input type="text"
                           name="caption"
                           id="caption"
                           class="form-control"
                           placeholder="caption"
                           aria-label="Username"
                           aria-describedby="basic-addon1">
                </div>
                <label for="image" class="col-md-4 col-form-label">Post Image</label>
                <input type="file" class="form-control-file" id="image" name="image">

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
                    <button class="btn btn-primary">Add Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
