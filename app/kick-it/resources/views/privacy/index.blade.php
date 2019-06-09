@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
<a href="{{ url('/privacys/create') }}" class="btn buttonstyle">Make privacy page</a>
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
                            @foreach ($privacys as $privacy)
                            <tr>
                                <th> {{ $privacy->id }} </th>
                                <td> {{ $privacy->title }} </td>
                                <td> {{$privacy->updated_at }} </td>
                                <td><a class="btn buttonstyle" href=" {{ route('privacy_path', ['privacy' => $privacy->id]) }}"> view</a> </td>
                                <td><a class="btn buttonstyle" href=" {{ route('edit_privacy_path', ['privacy'=>$privacy->id]) }}"> edit</a> </td>
                                <td>
                                <form action="{{ route('delete_privacy_path', ['privacy'=>$privacy->id]) }}" method="POST">
                                        @csrf 
                                        @method('DELETE')
                                        <button class="btn buttonstyle-danger">Delete</button>
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