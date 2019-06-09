@extends('layouts.app')

@section('content')
<div class="container containerstyle">
    <h1>Blog </h1> <br/>
    <h5>We found <strong>{{$posts->count()}} blogs</strong></h5>

    <div class="row">
        @if($posts->count() > 0)
            @foreach($posts as $post)
                <div class="col-md-6">
                        <div class="card cardstyle">
                            <div class='card-body' data-projectId="{{ $post->id }}"> 
                                <h3 class="card-title">{{ $post->name }}</h3>
                                <p class="card-text">{{ $post->intro }} </p>
                                    <p class="card-text"><small class="text-muted"> posted {{ $post->created_at->diffForHumans() }}</small></p>
                                    <a href="{{ route('post_path', ['post' => $post->id]) }}" class="btn btn-primary">View</a>
                                    <footer class="blockquote-footer">Made by: <cite title="Source Title">{{ $post->user->name }}</cite></footer>
                                   
                                </div>
                            </div>
                            <br/>
                        </div>
                
                
            @endforeach
        @else 
            <p>We didnt find any projects</p>
        @endif
        
    </div>
    <div class="row">
            <div class="text-center">
                {!! $posts->links(); !!}
            </div>
        </div>
</div>
@endsection