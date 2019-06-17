@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
            <h1>Add New Post</h1>
                <div class="form-group row">
                    <label for="caption">Post Caption</label>
                    
                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">

                <div class="form-group row">
                    <label for="image">Post Image</label>
                    <input type="file" class="form-control-file" name="image" id="image">
                </div>

                @error('image')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <button class="btn btn-primary">Add New Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
