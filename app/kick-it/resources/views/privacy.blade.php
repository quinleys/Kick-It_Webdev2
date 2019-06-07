@extends('layouts.app')
@section('content') 
@if($privacy->image)
    <img src="{{asset('images/'.$privacy->image)}}">
@endif
<div class="container">

    <h1>{{ $privacy->title }}</h1>
    <p class="lead"> {{ $privacy->intro }} </p>
    <p> {{ $privacy->bodyText}}
</div>
@endsection