@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h1> tags </h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <th> {{ $tag->id }} </th>
                        <td> {{ $tag->name }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-md-3">
            <div class="well">
                            <form action=" {{ route('tags.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for='name'>Title</label>
                                <input type="text" class="form-control" name='name' placeholder="tags">
                            </div>
    
                            <div class="form-group">
                            <button type="submit" class="btn buttonstyle mb-2">Add Tag!</button>
                            </div>
                            </form>
            
                    </div>
                </div>
</div>





@endsection