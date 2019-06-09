@extends('layouts.app')
<style>
        .carousel{
            background: #2f4357;
        }
        .carousel-item{
            text-align: center;
            min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
            max-height: 500px;
            width: 100%;
        }
        .carousel-caption{
            text-align: center;
            color:"black";
        }
    </style>
@section('content') 
@if($about->image)
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img  class="d-block w-100" src="{{asset('images/'.$about->image)}}">
                </div>

                </div>
            </div>
@endif
<div class="container containerstyle">
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