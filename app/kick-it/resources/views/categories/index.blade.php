@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8">
        <h1> Categories </h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th> {{ $category->id }} </th>
                        <td> {{ $category->name }} </td>
                        <td>
                        <form action="{{ route('categories.destroy', ['category'=>$category->id]) }}" method="POST">
                                @csrf 
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-md-3">
            <div class="well">
                            <form action=" {{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for='name'>Category</label>
                                <input type="text" class="form-control" name='name' placeholder="category">
                            </div>
    
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary mb-2">Add category</button>
                            </div>
                            </form>
            
                    </div>
                </div>
</div>





@endsection