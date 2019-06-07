@extends('layouts.app')

@section('content')
<div class="container">
        
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                <form action=" {{ route('update_privacy_path',['privacy'=>$privacy->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for='title'>Title</label>
                    <input type="text" class="form-control" name='title' value="{{$privacy->title}}">
                </div>
                <div class="form-group">
                        <label for="intro">Intro</label>
                        <textarea class="form-control" name='intro'  rows="5" >{{$privacy->intro}}</textarea>
                    </div>
                    
                <div class="form-group">
                    <label for="bodyText">Text</label>
                    <textarea class="form-control" name='bodyText'  rows="20" >{{$privacy->bodyText}}</textarea>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary mb-2">Save</button>
                </div>
                </form>

        </div>
    </div>
</div>
@endsection 