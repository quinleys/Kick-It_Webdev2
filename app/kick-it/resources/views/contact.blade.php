@extends('layouts.app')

@section('content')
    <div class="container">
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
                <input class="btn btn-primary" type="submit" value="Send Message">
            </form>
        </div>
    </div>
@endsection