@extends('layouts.app')

@section('content')

<div class="container">
    <h1> Donation </h1>
    <div class="row">
        <div class="col-md-12">
            <h3> Donation to: {{ $project->name }}</h3>
            <h4>Packages</h4>
            <h4> Current credits: {{ Auth::user()->credits }} </h4>
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
                        @if($packages)
                        @foreach ($packages as $package)
                            <tr>
                                <th> {{ $package->id }} </th>
                                <td> {{ $package->title }} </td>
                                <td> {{ $package->description }} </td>
                                <td> {{ $package->min_value }} </td>
                                <td> {{ $package->max_value }} </td>
                            </tr>
                        @endforeach
                        @endif  
                    </tbody>
                </table> 

            <form class="form-inline" action=" {{ route('donate.post', ['project'=>$project->id]) }}" method="POST">
                @csrf
                    <div class="form-group">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Package</label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name='package_id'>
                        @if($packages)
                            @foreach($packages as $package)
                                    <option value="{{$package->id}}">{{$package->title}}</option>
                            @endforeach
                        @endif
                </select>
                    </div>
                <div class="form-group">
                        <label for="creditgoal">Credit Donation:</label>
                        <input type="number" class="form-control" name='credits' id="credits"  min="1" max="{{ Auth::user()->credits }}" value="">
                    </div>
      
        <button type="submit" class="btn btn-primary my-1">Submit</button>
      </form>
        </div>
    </div>

@endsection 