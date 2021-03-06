
@extends('layouts.app')


@section('content')
<div class="container containerstyle">
  <div class="row">
    <h1> Blog posts </h1> <br>
  </div>
  <div class="row">
    <a href="{{ url('/posts/create') }}" class="btn buttonstyle">Make Post</a>
    <br/>
  </div>
  <div class="row rowstyle">
        <table class="table">
            <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Intro</th>
                      <th scope="col">By</th>
                      <th scope="col">Last updated</th>
                      <th scope="col">Created </th>
                    </tr>
                  </thead>
                  <tbody>

                      @foreach ($posts as $post)
                      
                    <tr>
                      <th scope="row"> {{ $post->id }}</th>
                      <td>{{ $post->name }}</td>
                      <td>{{ $post->user->name }}</td>
                      <td>{{ $post->updated_at}}</td>
                      <td>{{ $post->created_at}}</td>

                      <td><a href="{{ route('edit_post_path', ['post'=>$post->id]) }}" class="btn buttonstyle">Edit Post</a></td>
                      <td><form action="{{ route('delete_post_path', ['post'=>$post->id]) }}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn buttonstyle-danger">Delete</button>
                        </form>
                    </td>
                    <td><a class="btn buttonstyle" href=" {{ route('post_path', ['post' => $post->id]) }}"> view</a> </td>
                    </tr>
                    @endforeach

                  </tbody>
    </table>
</div>
</div>
@endsection