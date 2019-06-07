@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h1>  {{ $tag->name}} Tag <small> {{$tag->projects()->count()}} Posts</small></h1>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="btn btn-primary pull-right">Edit</a>
                    </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Tags </th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                            @foreach ($tag->projects as $project)
                            <tr>
                                
                                    
                                
                                <th> {{ $project->name }}</th>
                                <td> {{ $project->title }}</td>
                                @foreach ( $project->tags as $tag)
                                    <span class="label label-default">{{ $tag->name }} </span>
                                    @endforeach
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
</div>

@endsection