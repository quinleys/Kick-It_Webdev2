@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
<a href="{{ url('/abouts/create') }}" class="btn btn-primary">Make about page</a>
        <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Last updated</th>
                            <th> </th>
                            <th> </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($abouts as $about)
                            <tr>
                                <th> {{ $about->id }} </th>
                                <td> {{ $about->title }} </td>
                                <td> {{$about->updated_at }} </td>
                                <td><a class="btn btn-primary" href=" {{ route('about_path', ['about' => $about->id]) }}"> view</a> </td>
                                <td><a class="btn btn-success" href=" {{ route('edit_about_path', ['about'=>$about->id]) }}"> edit</a> </td>
                                <td>
                                <form action="{{ route('delete_about_path', ['about'=>$about->id]) }}" method="POST">
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
</div>

</div>
@endsection