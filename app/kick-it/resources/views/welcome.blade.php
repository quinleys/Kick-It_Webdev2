
@extends('layouts.app')

<style>
    .carousel{
        background: #2f4357;
        margin-top: 20px;
    }
    .carousel-item{
        text-align: center;
        min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
        max-height: 500px;
        width: 100%;
    }
    .carousel-caption{
        text-align: center;
        color:"black";
    }

    </style>
@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            @foreach($features as $feature)
              <div class="carousel-item @if($loop->first) active @endif">
                  @foreach ($images as $image)
                  @if($image->project_id === $feature->id)
                  <img class="d-block w-100"  src="{{ asset($image->filepath . '/' . $image->filename) }}" alt="{{ $image->title }}">
                  @break
                  @endif
                  @endforeach
                  <div class="carousel-caption d-none d-md-block">
                        <h5>{{$feature->name}}</h5>
                        <p>{{ $feature->category->name}}</p>
                      </div>
              </div>
            @endforeach
        </div>
        
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      
    <div class="container">
            <div class="row h-25" style="display:block">
                    <div class="col-12 align-self-center">
                            <h3> Latest news </h3>
                            <div class="media align-self-cente">
                                <img  class=" mr-3" src=" {{asset('images/'.$post->image)}}">
                            <div class="media-body">
                                <h5> {{ $post->name }}</h5>
                                <p> {{$post->intro }} </p>
                                <p> posted {{$post->created_at->diffForHumans()}}
                                <p> Written by: {{$post->user->name}}</p>
                            </div>
                            <a  href="{{route('post_path', ['post' => $post->id])}}">Read More</a>
                        </div>
                    </div>
            </div>
            <div class="row">
                    <h3>Fan favorites!</h3> 
            </div>  
            <div class="row">
                    @foreach($fanfavs as $fanfav)
                        <div class="col-6 col-md-4">
                            <div class="card">
                                @foreach ($images as $image)
                                    @if($image->project_id === $fanfav->id)
                                        <img src="{{ asset($image->filepath . '/' . $image->filename) }}" class="card-img-top" alt="">
                                        @break
                                    @endif
                                @endforeach
                                <div class="card-body">
                                    <h3 class="card-title">{{ $fanfav->name }}</h3>
                                    <p class="card-text">{{ $fanfav->intro }} </p>
                                        <a href="{{ route('category',['category' => $fanfav->category->id] )}}">
                                                    <p class="card-text"> Category: {{ $fanfav->category->name}}</p></a>
                                                    <p class="card-text"><small class="text-muted"> posted {{ $fanfav->created_at->diffForHumans() }}</small></p>
                                                    <a href="{{ route('project_path', ['project' => $fanfav->id]) }}" class="btn btn-primary">View</a>
                                                    <br>
                                                    <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{$fanfav->credits}}" aria-valuemin="0" aria-valuemax="{{$fanfav->creditgoal}}" style="width:{{$fanfav->credits / $fanfav->creditgoal * 100 }}%">
                                                                {{$fanfav->credits}} credits of {{$fanfav->creditgoal}}
                                                            </div>
                                                        </div>
                                                    <footer class="blockquote-footer">Made by: <cite title="Source Title">{{ $fanfav->user->name }}</cite></footer>
                                </div>
                            </div>
                        </div>
                    @endforeach
                
            </div>
            <div class="row h-25">
                    <div class="col-12 align-self-center">
                    <h3> About us</h3>
                    
                        <h5> {{ $about->hometitle }}</h5>
                        <p> {{$about->homeintro }} </p>
                    
                    <a class="btn btn-primary" href="{{url('/about')}}">Learn More</a>
                </div>
            </div>        
        <div class="row">
            <h3 class="text-right">Help the new guy!</h3> 
        </div>  
        <div class="row">
                @foreach($projects as $project)
                    <div class="col-6 col-md-4">
                        <div class="card">
                            @foreach ($images as $image)
                                @if($image->project_id === $project->id)
                                    <img src="{{ asset($image->filepath . '/' . $image->filename) }}" class="card-img-top" alt="">
                                    @break
                                @endif
                            @endforeach
                            <div class="card-body">
                                <h3 class="card-title">{{ $project->name }}</h3>
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
                    </div>
                @endforeach
            
        </div>
        
        
    </div>


@endsection