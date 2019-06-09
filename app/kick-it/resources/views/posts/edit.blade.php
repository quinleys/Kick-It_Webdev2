@extends('layouts.app')

@section('content')
<div class="container">

    @if (Session::has('success'))
        <div class="alert alert-success text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                <form action=" {{ route('update_post_path', ['post'=>$post->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <h1>What do you want to change about your post?</h1>
                <div class="form-group">
                    <label for='name'>Title</label>
                    <input type="text" class="form-control" name='name' value="{{ $post->name }}">
                </div>
                <div class="form-group">
                        <label for="intro">Intro</label>
                        <textarea class="form-control" name='intro' id="description" rows="10" > {{ $post->intro }}</textarea>
                    </div>
                <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea class="form-control" name='description' id="description" rows="10" > {{ $post->description }}</textarea>
                </div>
                <div class="form-group">
                <button type="submit" class="btn buttonstyle mb-2">Edit my post!</button>
                </div>
                </form>

        </div>
    </div>
</div>
@endsection 