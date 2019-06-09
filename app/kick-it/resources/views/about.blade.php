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
@if($aboutpage->image)
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img  class="d-block w-100" src="{{asset('images/'.$aboutpage->image)}}">
                </div>

                </div>
            </div>
@endif
<div class="container containerstyle">
 
            <h1>{{ $aboutpage->title }}</h1>

            <p class="lead"> {{ $aboutpage->intro }} </p>
            <p> {{ $aboutpage->bodyText}} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection