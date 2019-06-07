@extends('layouts.app')

@section('content')
<div class="container">
        
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                <form action=" {{ route('update_about_path',['about'=>$about->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for='title'>Title</label>
                    <input type="text" class="form-control" name='title' value="{{$about->title}}">
                </div>
                <div class="form-group">
                        <label for="intro">Intro</label>
                        <textarea class="form-control" name='intro'  rows="5" value="{{$about->intro}}">{{$about->intro}}</textarea>
                    </div>
                    
                <div class="form-group">
                    <label for="bodyText">Text</label>
                    <textarea class="form-control" name='bodyText'  rows="20" >{{$about->bodyText}}</textarea>
                </div>
                <h5>Dont forget about the homepage!</h5>
                <div class="form-group">
                        <label for='hometitle'>Hometitle</label>
                        <input type="text" class="form-control" name='hometitle' value="{{$about->hometitle}}">
                    </div>
                    <div class="form-group">
                            <label for="homeintro">Homeintro</label>
                            <textarea class="form-control" name='homeintro'  rows="5" >{{$about->homeintro}}</textarea>
                        </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary mb-2">Save</button>
                </div>
                </form>

        </div>
    </div>
</div>
@endsection 