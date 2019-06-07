@extends('layouts.app')


@section('content')

<div class="container">
    

    
<div class="row">

    @if($projects->isNotEmpty())
        @foreach($projects as $project)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"> 
                        <a href=" {{ route('project_path', ['project' => $project->id]) }}"> {{ $project->name }} </a> 
                    </div>
                    <div class='card-body'>
                        intro:{{ $project->intro }} <br>
                        description:{{ $project->description }} <br>
                        Credits:{{ $project->credits }}/{{ $project->creditgoal }} <br>
                        Made by: {{ $project->user_id  }}
            </div>
            
        </div>
    </div>
    @endforeach
    @else 
        <p class="lead">Sorry, we didnt find anything what you're looking for! :( </p>
    @endif


</div>


@endsection 