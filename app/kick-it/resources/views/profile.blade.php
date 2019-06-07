@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="storage/avatars/{{ Auth::user()->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->name }}'s Profile</h2>
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
            <p> My credits: {{$user->credits}} </p>
            <a href="{{ url('/stripe') }}" class="btn btn-primary" role="button">add credits</a>
        </div>
    </div>
    <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <br>
            <h3>your projects: </h3>
            </div>
            @foreach($projects as $project)
                @if($project->user_id == Auth::user()->id)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"> 
                                <a href=" {{ route('project_path', ['project' => $project->id]) }}"> {{ $project->name }} </a> 
                            </div>
                            <div class='card-body'>
                                label: {{ $project->label }} <br>
                                description:{{ $project->description }} <br>
                                Credits:{{ $project->credits }}/{{ $project->creditgoal }} <br>
                                Made by: {{ $project->user_id  }}
        
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
                                    <li><a href=" {{ route('project_path', ['project' => $project->id]) }}"> {{ $project->comments()->count() }}  comments </a></li>
                                </ul>
                            </div>
        
                            
                        </div>
                    </div>
                @endif
        
            @endforeach
        
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
                                    @foreach ($packages as $package)
                                        @if($package->id = $donation->package_id)
                                        <tr>
                                                <th> {{ $package->id}} </th>
                                                <td> {{ $package->title }} </td>
                                                <td> {{ $package->description }} </td>
                                                <td> {{ $package->min_value }} </td>
                                                <td> {{ $package->max_value }} </td>
                                            </tr>
                                            @endif
                                    @endforeach
                                </tbody>
                        </table>
                </div>
        
        
</div>
@endsection