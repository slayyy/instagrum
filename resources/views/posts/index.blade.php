@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row">
        <div class="col-8 offset-2">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
    </div>
        <div class="row pt-2 pb-5">
            <div class="col-8 offset-2">
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id}}">
                            <span class="text-dark">{{ $post->user->username}}</span>
                        </a>
                    </span> 
                    {{ $post->caption }}
                </p>
            </div>
        </div>
    @endforeach
</div>
@endsection
