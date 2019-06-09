@extends('layouts.app')

@section('content')
<div class="container containerstyle">
    <h1>Explore</h1>
    `<div class="row">
        @foreach ($categories as $category)
            <ul>
            <a href="{{ route('category',$category->id)}}"><li>{{ $category->name}}</li></a>
            </ul>
        @endforeach
    </div>
    <div class="row">
            @if($projects->count() > 0)
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
                                       
                                        <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{$project->credits}}" aria-valuemin="0" aria-valuemax="{{$project->creditgoal}}" style="width:{{$project->credits / $project->creditgoal * 100 }}%">
                                                    {{$project->credits}} credits of {{$project->creditgoal}}
                                                </div>
                                            </div>
                                            <br/>
                                            <a href="{{ route('project_path', ['project' => $project->id]) }}" class="btn btn-primary">View</a>
                                        <footer class="blockquote-footer">Made by: <cite title="Source Title">{{ $project->user->name }}</cite></footer>
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
                {!! $projects->links(); !!}
            </div>
        </div>
</div>
@endsection