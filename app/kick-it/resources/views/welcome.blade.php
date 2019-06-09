
@extends('layouts.app')

<style>
    .carousel{
        background: #2f4357;
    }
    .carousel-item{
        text-align: center;
        min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
        max-height: 500px;
        width: 100%;
    }
    .carousel-caption{
        text-align: center;
        color:black;
    }
    .carousel-click
    {
        color: white;
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
            <a href="{{route('project_path', ['project' => $feature->id]) }}" class="carousel-click">
              <div class="carousel-item @if($loop->first) active @endif">
                  @foreach ($images as $image)
                  @if($image->project_id === $feature->id)
                  <img class="d-block w-100"  src="{{ asset($image->filepath . '/' . $image->filename) }}" alt="{{ $image->title }}">
                  @break
                  @endif
                  @endforeach
                  <div class="carousel-caption d-none d-md-block">
                      
                        <h5 class="titletest">{{$feature->name}}</h5>
                        <p>{{ $feature->category->name}}</p>
                      </a>
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
        @if($post)
            <div class="row align-self-center rowstyle" >
                    <div class="col-12 align-self-center">
                            <h3 class="titlestyle"> Latest news </h3>
                            <br/>
                            <div class="media">
                                <img  style="height: 200px" class=" mr-3" src=" {{asset('images/'.$post->image)}}">
                            <div class="media-body">
                                <h5> {{ $post->name }}</h5>
                                <p> {{$post->intro }} </p>
                                <p> posted {{$post->created_at->diffForHumans()}}
                                <p> Written by: {{$post->user->name}}</p>
                            </div>
                        </div>
                        <br/>
                        <a  class="btn buttonstyle" href="{{route('post_path', ['post' => $post->id])}}">Read More</a>
                    </div>
            </div>
            @endif
            <div class="row rowstyle">
                <div class="col-12 align-self-center">
                    <h3 class="titlestyle">Fan favorites!</h3> 

                </div>
            </div>  
            <div class="row">
                    @foreach($fanfavs as $fanfav)
                        <div class="col-md-4">
                            <div class="card cardstyle">
                                @foreach ($images as $image)
                                    @if($image->project_id === $fanfav->id)
                                        <img src="{{ asset($image->filepath . '/' . $image->filename) }}" class="card-img-top"  style="height: 25%"alt="">
                                        @break
                                    @endif
                                @endforeach
                                <div class="card-body">
                                    <h3 class="card-title">{{ $fanfav->name }}</h3>
                                    @foreach ($fanfav->tags as $tag)
                                        <span class="badge badge-primary"> {{ $tag->name }} </span>
                                    @endforeach
                                    <p class="card-text">{{ $fanfav->shortintro }} </p>
                                        <a href="{{ route('category',['category' => $fanfav->category->id] )}}">
                                                    <p class="card-text"> Category: {{ $fanfav->category->name}}</p></a>
                                                    <p class="card-text"><small class="text-muted"> posted {{ $fanfav->created_at->diffForHumans() }}</small></p>
                                                   
                                                    <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{$fanfav->credits}}" aria-valuemin="0" aria-valuemax="{{$fanfav->creditgoal}}" style="width:{{$fanfav->credits / $fanfav->creditgoal * 100 }}%">
                                                                {{$fanfav->credits}} credits of {{$fanfav->creditgoal}}
                                                            </div>
                                                        </div>
                                                        <br/>
                                                        <a href="{{ route('project_path', ['project' => $fanfav->id]) }}" class="btn buttonstyle">View</a>
                                                    <footer class="blockquote-footer">Made by: <cite title="Source Title">{{ $fanfav->user->name }}</cite></footer>
                                </div>
                            </div>
                            <br/>
                        </div>
                    @endforeach
            </div>
            @if($about)
            <div class="row rowstyle align-self-center">
                    <div class="col-12 align-self-center">
                    <h3 class="titlestyle"> About us</h3>
                    <br/>
                        <h5> {{ $about->hometitle }}</h5>
                        <p> {{$about->homeintro }} </p>
                    
                    <a class="btn buttonstyle" href="{{url('/about')}}">Learn More</a>
                </div>
            </div>     
            @endif   
        <div class="row rowstyle">
                <div class="col-12 align-self-center">
                        <h3 class="titlestyle">Help the new  guy!</h3> 
                    </div>
        </div>  
        <div class="row">
                @foreach($projects as $project)
                    <div class="col-md-4">
                        <div class="card cardstyle">
                            @foreach ($images as $image)
                                @if($image->project_id === $project->id)
                                    <img src="{{ asset($image->filepath . '/' . $image->filename) }}" class="card-img-top" style="height: 20%" alt="">
                                    @break
                                @endif
                            @endforeach
                            <div class="card-body ">
                                <h3 class="card-title">{{ $project->name }}</h3>
                                @foreach ($project->tags as $tag)
                                    <span class="badge badge-primary"> {{ $tag->name }} </span>
                                @endforeach
                                <p class="card-text">{{ $project->shortintro }} </p>
                                    <a href="{{ route('category',['category' => $project->category->id] )}}">
                                                <p class="card-text"> Category: {{ $project->category->name}}</p></a>
                                                <p class="card-text"><small class="text-muted"> posted {{ $project->created_at->diffForHumans() }}</small></p>
                                               
                                                <div class="progress">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{$project->credits}}" aria-valuemin="0" aria-valuemax="{{$project->creditgoal}}" style="width:{{$project->credits / $project->creditgoal * 100 }}%">
                                                            {{$project->credits}} credits of {{$project->creditgoal}}
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <a href="{{ route('project_path', ['project' => $project->id]) }}" class="btn buttonstyle">View</a>
                                                <footer class="blockquote-footer">Made by: <cite title="Source Title">{{ $project->user->name }}</cite></footer>
                            </div>
                        </div>
                        <br/>
                    </div>
                @endforeach
        </div>
        
        
    </div>


@endsection