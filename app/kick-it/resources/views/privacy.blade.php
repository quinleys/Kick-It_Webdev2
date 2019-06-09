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

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img  class="d-block w-100" src="../../storage/privacy.jpg">
                </div>

                </div>
            </div>

<div class="container containerstyle">

    <h1>{{ $privacy->title }}</h1>
    <p class="lead"> {{ $privacy->intro }} </p>
    <p> {{ $privacy->bodyText}}
</div>
@endsection