@extends('layouts.app')
<style>
        .carousel{
            background: #2f4357;
            margin-top: 20px;
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
                  <img  class="d-block w-100"src=" {{asset('images/'.$post->image)}}" >
              </div>

              </div>
        </div>
<div class="container containerstyle">
    <div class="row">
        <div class="col-md-12">
                        <h1> {{$post->name}}</h1>

            <div class="card">
                
                <div class="card-body">
            <p class="lead"> {{ $post->intro}} </p>
            <p>{{$post->description}}</p>
            
        <p>written by: <strong> {{ $post->user->name }} </strong> </p>
                </div>
        </div>
    </div>
</div>
</div>
@endsection 