@extends('layouts.app')
@section('content') 
@if($about->image)
    <img src="{{asset('images/'.$about->image)}}">
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $about->title }}</h1>
        </div>
    </div>
    <div class="row">
            <div class="col-md-12">
                <p class="lead"> {{ $about->intro }} </p>
            </div>
    </div>
    <div class="row">
            <div class="col-md-12">
                <p> {{ $about->bodyText}}</p>
            </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-success" href=" {{ route('edit_about_path', ['about'=>$about->id]) }}"> edit</a> 

            <form action="{{ route('delete_about_path', ['about'=>$about->id]) }}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
        </div>
    </div>
</div>
@endsection