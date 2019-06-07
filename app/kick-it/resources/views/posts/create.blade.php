@extends('layouts.app')

@section('content')
<div class="container">
        
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                <form action=" {{ route('store_post_path') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for='name'>Title</label>
                    <input type="text" class="form-control" name='name' placeholder="sickest project ever!!!">
                </div>
                <div class="form-group">
                        <label for="Description">Intro</label>
                        <textarea class="form-control" name='intro'  rows="5" placeholder="Short intro"></textarea>
                    </div>
                <div class="form-group">
                    <label for="Description">Text</label>
                    <textarea class="form-control" name='description'  rows="20" placeholder="Tell us everything about it!"></textarea>
                </div>
                <div class="form-group">
                    <label for="featured_image">Add some sick photos</label>
                    <input type="file" name="featured_image" class="form-control-file">
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary mb-2">This is my post!</button>
                </div>
                </form>

        </div>
    </div>
</div>
@endsection 