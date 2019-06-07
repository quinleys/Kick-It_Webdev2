@extends('layouts.app')

@section('content')
<div class="container">
        
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                <form action=" {{ route('store_about_path') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for='title'>Title</label>
                    <input type="text" class="form-control" name='title' placeholder="title about us">
                </div>
                <div class="form-group">
                        <label for="intro">Intro</label>
                        <textarea class="form-control" name='intro'  rows="5" placeholder="Short intro"></textarea>
                    </div>
                    
                <div class="form-group">
                    <label for="bodyText">Text</label>
                    <textarea class="form-control" name='bodyText'  rows="20" placeholder="Tell us everything about it!"></textarea>
                </div>
                <h5>Dont forget about the homepage!</h5>
                <div class="form-group">
                        <label for='hometitle'>Hometitle</label>
                        <input type="text" class="form-control" name='hometitle' placeholder="title about us">
                    </div>
                    <div class="form-group">
                            <label for="homeintro">Homeintro</label>
                            <textarea class="form-control" name='homeintro'  rows="5" placeholder="Short intro"></textarea>
                        </div>
                        
                        <div class="form-group">
                                <label for="image">Maybe a image? </label>
                                <input type="file" name="image" class="form-control-file">
                            </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary mb-2">Save</button>
                </div>
                </form>

        </div>
    </div>
</div>
@endsection 