@extends('layouts.app')

@section('content')
<div class="container">
<h1> images for {{ $project->name }} </h1>
<div class="column">
        <form action="{{route('postUpload')}}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" id="amountOfImages" name="amountOfImages" value="{{ old('amountOfImages', 1) }}">

            <div class="field">
                <div class="control">
                    <input class="input" type="hidden" name="project_id" placeholder=" {{ $project->id }}" value ="{{ $project->id }}">
                    {{ $project->id }}
                </div>
            </div>
            
            <table id="imageUploadTable" class="table is-striped">
                <tbody>
                    <tr id="first">
                        <td>
                            <input type="file" name="file[]">
                        </td>
                        <td>
                            <div class="control">
                                <button type="button" class="button is-success"><i class="fas fa-plus"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="display: none;">
                <tbody id="clone">
                    <tr>
                        <td>
                            <input type="file" name="file[]">
                        </td>
                        <td>
                            <div class="control">
                                <button type="button" class="button is-danger"><i class="fas fa-minus"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="control">
                <button type="submit" class="button is-primary">
                    @lang('labels.send')
                </button>
            </div>
        </form>
        @if(count($errors) > 0)
        <div class="notification is-danger">
            @lang('messages.somethingwentwrong')
            <ul>
                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>

        @endif
    </div>
</div> 
</div>

@endsection