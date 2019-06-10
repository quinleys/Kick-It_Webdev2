@extends('layouts.app')

@section('content')
<div class="container containerstyle">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="storage/avatars/{{ Auth::user()->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->name }}'s Profile</h2>
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm buttonstyle">
            </form>
            <p> My credits: {{$user->credits}} </p>
            <a href="{{ url('/stripe') }}" class="btn buttonstyle" role="button">add credits</a>
        </div>
    </div>
    <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <br>
            <h3>your projects: </h3>
            </div>
                    
        </div>
        <div class="row rowstyle">
            @foreach($projects as $project)
                @if($project->user_id == Auth::user()->id)
                            <div class="col-md-4">
                                <div class="card cardstyle">
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
                                                            
                                                        <footer class="blockquote-footer">Made by: <cite title="Source Title">{{ $project->user->name }}</cite></footer>
                                                        <a href="{{ route('project_path', ['project' => $project->id]) }}" class="btn buttonstyle">View</a>
                                                        <a class="btn buttonstyle" role="button" href="{{ route('edit_project_path', ['project'=>$project->id]) }}">Edit</a>
                                                        <form action="{{ route('delete_project_path', ['project'=>$project->id]) }}" method="POST">
                                                                @csrf 
                                                                @method('DELETE')
                                                                <button type="submit" class="btn buttonstyle-danger">Delete</button>
                                                            </form>
                                                    </div>
                                <ul>
                                    <li><a href=" {{ route('project_path', ['project' => $project->id]) }}"> {{ $project->comments()->count() }}  comments </a></li>
                                </ul>
                            </div>
        
                            
                        </div>
                        @endif
            @endforeach
                    </div>
                
            

        <div class="row">
                <div class="text-center">
                    {!! $projects->links(); !!}
                </div>
            </div>
        <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <br>
                <h3>your donations: </h3>
                <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">To </th>
                            <th scope="col">How much</th>
                            <th scope="col">When</th>
                            <th scope="col">Package name</th>
                          </tr>
                        </thead>
                        @if($donations->count()>0)
                            @foreach ($donations as $donation)
                                
                            
                            <tbody>
                            <tr>
                                <th scope="row"> {{ $donation->id }} </th>
                                <td>{{ $donation->project->name }}</td>
                                <td>{{ $donation->project->user->name }}</td>
                                <td>{{ $donation->amount }} credits</td>
                                <td>{{ $donation->package->title }} </td>
                                
                            </tr>
                            @endforeach
                          @else 
                                    <tr>
                                    <td>you dont have any donations</td>
                                    </tr>
                            @endif
                        </tbody>
                      </table>
                </div>
            
        </div>
                        <h4>Recieving Packages</h4>
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Min Value</th>
                                        <th>Max Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($packages->count()>0)
                                        @foreach ($donations as $donation)
                                            @foreach ($packages as $package)
                                            @if($package->id === $donation->package_id)
                                            <tr>
                                                    <th> {{ $package->id}} </th>
                                                    <td> {{ $package->title }} </td>
                                                    <td> {{ $package->description }} </td>
                                                    <td> {{ $package->min_value }} </td>
                                                    <td> {{ $package->max_value }} </td>
                                                </tr>
                                                @endif
                                        @endforeach
                                        @endforeach
                                    @else 
                                    <tr>
                                    <td>you dont have any packages</td>
                                    </tr>
                                    @endif
                                </tbody>
                        </table>
                </div>
        
        
</div>
@endsection