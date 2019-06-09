@extends('layouts.app')
@section('content') 
@if($aboutpage->image)
    <img class="d-block w-100" src="{{asset('images/'.$aboutpage->image)}}">
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $aboutpage->title }}</h1>
            <p class="lead"> {{ $aboutpage->intro }} </p>
            <p> {{ $aboutpage->bodyText}} </p>
        </div>
    </div>
</div>
@endsection