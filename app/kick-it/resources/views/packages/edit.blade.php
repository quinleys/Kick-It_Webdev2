@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h1> Packages for project <strong>{{$project->name}}</strong> </h1>
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
                    <tr>
                        <th> {{ $package->id }} </th>
                        <td> {{ $package->title }} </td>
                        <td> {{ $package->description }} </td>
                        <td> {{ $package->min_value }} </td>
                        <td> {{ $package->max_value }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
    </div>

    <div class="col-md-3">
            <div class="well">
                            <form action=" {{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="field">
                                    <div class="control">
                                        <input class="input" type="hidden" name="project_id"  value ="{{ $project->id }}">
                                        
                                    </div>
                                </div>
                            <div class="form-group">
                                <label for='title'>Title</label>
                                <input type="text" class="form-control" name='title' placeholder="Package name">
                            </div>
                            <div class="form-group">
                                    <label for='description'>description</label>
                                    <textarea type="text" class="form-control" name='description'></textarea>
                                </div>
                                <div class="form-group">
                                        <label for='min_value'>Min Value</label>
                                        <input type="number" class="form-control" name='min_value' placeholder="min value">
                                    </div>
                                    <div class="form-group">
                                            <label for='max_value'>Max Value</label>
                                            <input type="number" class="form-control" name='max_value' placeholder="max value">
                                        </div>
                            <div class="form-group">
                            <button type="submit" class="btn buttonstyle mb-2">Add Package!</button>
                            </div>
                            </form>
            
                    </div>
                </div>
</div>
<a class="btn btn-primary" href="/welcome">Save Project</a>
</div>

@endsection