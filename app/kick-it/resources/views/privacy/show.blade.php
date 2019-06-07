@extends('layouts.app')
@section('content') 
@if($privacy->image)
    <img src="{{asset('images/'.$privacy->image)}}">
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $privacy->title }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="lead"> {{ $privacy->intro }} </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p> {{ $privacy->bodyText}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-success" href=" {{ route('edit_privacy_path', ['privacy'=>$privacy->id]) }}"> edit</a> 

            <form action="{{ route('delete_privacy_path', ['privacy'=>$privacy->id]) }}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
        </div>
    </div>
</div>
@endsection