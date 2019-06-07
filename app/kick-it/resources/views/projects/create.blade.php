@extends('layouts.app')

@section('content')


<div class="container">
        
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                <form action=" {{ route('store_project_path') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h1>Tell us more about your project</h1>
                <div class="form-group">
                    <label for='name'>Title</label>
                    <input type="text" class="form-control" name='name' placeholder="sickest project ever!!!">
                </div>

                <div class="form-group">
                        <label for="category">Category</label>
                        <select  class="form-control "  name='category'>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}"> {{ $category->name}} </option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                        <label for="intro">Intro</label>
                        <textarea class="form-control" name='intro' rows="5" placeholder="Tell us a short intro about it!"></textarea>
                    </div>
                <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea class="form-control" name='description' id="description" rows="10" placeholder="Tell us everything about it!"></textarea>
                </div>
                <div class="form-group">
                    <label for="creditgoal">Credit goal:</label>
                    <input type="number" class="form-control" name='creditgoal' id="creditgoal" placeholder="Wayyyyy to much!">
                </div>
                <div class="form-group">
                        <label for="tags">Tags</label>
                        <select id="select2-multi" class="form-control select2-multi"  name='tags[]' multiple="true">
                            @foreach ($tags as $tag)
                                <option value="{{$tag->id}}"> {{ $tag->name}} </option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary mb-2">This is my project! Now let's add some photo's</button>
                </div>
                </form>

        </div>
    </div>
</div>
@endsection 

@section('scripts')

<script type="text/javascript">

$(document).ready(function() {

    $('#select2-multi').select2();

});

</script>
@endsection