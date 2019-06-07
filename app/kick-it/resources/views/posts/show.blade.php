@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <img src=" {{asset('images/'.$post->image)}}" width=100%>
    <br/>
        <div class="col-md-12">


            <h3> {{$post->name}}</h3>

            <p class="lead"> {{ $post->intro}} </p>

            <p> {{ $post->description}}</p>

        <p>written by: <strong> {{ $post->user->name }} </strong> </p>
@endsection 