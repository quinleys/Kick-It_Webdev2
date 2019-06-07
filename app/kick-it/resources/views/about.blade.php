@extends('layouts.app')
@section('content') 
@if($aboutpage->image)
    <img src="{{asset('images/'.$aboutpage->image)}}">
@endif
<div class="container">

    <h1>{{ $aboutpage->title }}</h1>
    <p class="lead"> {{ $aboutpage->intro }} </p>
    <p> {{ $aboutpage->bodyText}}
</div>
@endsection