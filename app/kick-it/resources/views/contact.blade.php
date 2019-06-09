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
                    <img  class="d-block w-100" src="../../storage/contact.jpg">
                </div>

                </div>
            </div>

    <div class="container containerstyle">
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Us</h1>
            <form action="{{url('contact') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input id="email" name="email" class="form-control" @Auth value='{{Auth::user()->email}}' @endauth>
                </div>
                <div class="form-group">
                        <label name="subject">Subject:</label>
                        <input id="subject" name="subject" class="form-control" placeholder="enter a subject">
                </div>
                <div class="form-group">
                        <label name="message">Message:</label>
                        <textarea id="message" name="message" class="form-control">enter your message... </textarea>
                </div>
                <input class="btn buttonstyle" type="submit" value="Send Message">
            </form>
        </div>
    </div>
@endsection