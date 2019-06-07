<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
@extends('layouts.app')


@section('content')
@auth


<div class="container" id="app">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Hello, {{ Auth::user()->name }} !</h1>
            <h3> Do you have a great idea? Don't wait any longer.</h3>
            <h4> Start today!</h4>
            <a href="{{ url('/projects/create') }}" class="btn btn-primary" role="button">start a project </a>
        </div>
    </div>


<div class="row">
    <div class="col-md-10 col-md-offset-1">
    <h1>your projects: </h1>
    </div>

</div>

<div class="row">

    @foreach($projects as $project)
        @if($project->user_id == Auth::user()->id)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"> 
                        <a href=" {{ route('project_path', ['project' => $project->id]) }}"> {{ $project->name }} </a> 
                    </div>
                    <div class='card-body' data-projectId="{{ $project->id }}"> <br>
                        description:{{ $project->intro }} <br>
                        description:{{ $project->description }} <br>
                        Credits:{{ $project->credits }}/{{ $project->creditgoal }} <br>
                        @if($project->category_id){
                        <p> Category: {{ $project->category->name}}</p>
                        }
                        @endif
                        Made by: {{ $project->user->name }}

                        <p class="lead">
                            posted
                            {{ $project->created_at->diffForHumans() }}
                        </p>
                        <a class="btn btn-primary" role="button" href="{{ route('edit_project_path', ['project'=>$project->id]) }}">Edit</a>

                        <form action="{{ route('delete_project_path', ['project'=>$project->id]) }}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <ul>
                            <li><button>like</button> {{ $project->favorite_to_users }}</li>
                            <li><a href=" {{ route('project_path', ['project' => $project->id]) }}"> {{ $project->comments()->count() }} comments</li></a>
                            <a href=""> 
                                <small> 0 </small>
                                <i class="fa fa-thumbs-up" aria-hidden="true"> </i>
                            </a>
                        </ul>
                        <div>
                          
                        </div>
                        

                    </div>

                    
                </div>
            </div>
        @endif

    @endforeach

</div>
</div>
@endauth
@guest 
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Hello, guest! </h1>
                <h3> Do you have a great idea? Don't wait any longer. Register and spread your idea!</h3>

                        <a class="btn btn-primary" role="button" href="{{ route('register') }}">{{ __('Register') }}</a>
                        <br>
                        already have an account? <a class="button" href="c </a>
            </div>
        </div>
    </div>
@endguest
@endsection 

