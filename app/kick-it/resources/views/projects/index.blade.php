<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
@extends('layouts.app')


@section('content')
@auth


<div class="container containerstyle" id="app">

    <div class="row">
        <div class="col">
            <h1>Hello, {{ Auth::user()->name }} !</h1>
            <h3> Do you have a great idea? Don't wait any longer.</h3>
            <h4> Start today!</h4>
            <a href="{{ url('/projects/create') }}" class="btn btn-primary" role="button">start a project </a>
        </div>
    </div>


<div class="row">
    <div class="col">
    <h1>your projects: </h1>
    </div>

</div>

        <div class="row">
                @foreach($projects as $project)
                    <div class="col-md-4">
                        <div class="card cardstyle">
                            @foreach ($images as $image)
                                @if($image->project_id === $project->id)
                                    <img src="{{ asset($image->filepath . '/' . $image->filename) }}" class="card-img-top" alt="">
                                    @break
                                @endif
                            @endforeach
                            <div class="card-body">
                                <h3 class="card-title">{{ $project->name }}</h3>
                                @foreach ($project->tags as $tag)
                                        <span class="badge badge-primary"> {{ $tag->name }} </span>
                                    @endforeach
                                <p class="card-text">{{ $project->intro }} </p>
                                    <a href="{{ route('category',['category' => $project->category->id] )}}">
                                                <p class="card-text"> Category: {{ $project->category->name}}</p></a>
                                                <p class="card-text"><small class="text-muted"> posted {{ $project->created_at->diffForHumans() }}</small></p>
                                                <a href="{{ route('project_path', ['project' => $project->id]) }}" class="btn btn-primary">View</a>
                                                <br>
                                                <div class="progress">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{$project->credits}}" aria-valuemin="0" aria-valuemax="{{$project->creditgoal}}" style="width:{{$project->credits / $project->creditgoal * 100 }}%">
                                                            {{$project->credits}} credits of {{$project->creditgoal}}
                                                        </div>
                                                    </div>
                                                <footer class="blockquote-footer">Made by: <cite title="Source Title">{{ $project->user->name }}</cite></footer>
                            </div>
                        </div>
                        <br/>
                    </div>
                @endforeach
            
        </div>
        <div class="row">
                <div class="text-center">
                    {!! $projects->links(); !!}
                </div>
            </div>
</div>
@endauth
@guest 
<div class="container containerstyle">
        <div class="row">
            <div class="col">
                <h1>Hello, guest! </h1>
                <h3> Do you have a great idea? Don't wait any longer. Register and spread your idea!</h3>

                        <a class="btn btn-primary" role="button" href="{{ route('register') }}">{{ __('Register') }}</a>
                        <br>
                        <a href="{{ route('login') }}">
                        already have an account?</a>
            </div>
        </div>
    </div>
@endguest
@endsection 

