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
                <form action=" {{ route('update_project_path', ['project'=>$project->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <h1>What do you want to change about your project?</h1>
                <div class="form-group">
                    <label for='name'>Title</label>
                    <input type="text" class="form-control" name='name' value="{{ $project->name }}">
                </div>

                <div class="form-group">
                        <label for="category_id">Category</label>
                        <select  class="form-control "  name='category_id' value =" {{ $project->category->name }}">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}"> {{ $category->name}} </option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                        <label for="tags">Tags</label>
                        <select class="form-control select2-multi" id="select2-multi" name='tags' multiple="multiple">
                            @foreach ($tags as $tag)
                                <section @if(in_array($tag->id, $projecttags)) selected @endif value="{{$tag->id}}"> {{ $tag->name }} </option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea class="form-control" name='description' id="description" rows="10" > {{ $project->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="creditgoal">Credit goal:</label>
                    <input type="number" class="form-control" name='creditgoal' id="creditgoal" value="{{ $project->creditgoal }}">
                </div>
                <div class="form-group">
                <button type="submit" class="btn buttonstyle mb-2">Edit my project!</button>
                </div>
                </form>

        </div>
    </div>
</div>
@endsection 
@section('scripts')

<script type="text/javascript">

$.noConflict();
jQuery( document ).ready(function( $ ) {
    jQuery('.select2-multi').select2();
});
</script>

@endsection