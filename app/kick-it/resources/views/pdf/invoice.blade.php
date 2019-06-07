<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>
<body>
    <div class="container">
            <div class="row">
                    <div class="col-md-8">
                        <br/>
                        <h1> {{$project->name}}</h1>
                        <div>
                            <p class="lead"> {{$project->intro}}</p>
                        </div>
                        <div>
                            <p> {{$project->description}}</p>
                        </div>
                        
                    </div>
                        <div class="col-4">
                            <br/>
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">
                                    <h1>Info</h1>
                                </div>
                                <div class="card-body">
                                    @if($project->category_id)
                                        <p class="card-text">Category: <strong> {{ $project->category->name}} </strong></p>
                                    @endif
                                        <p> Current credits: <strong>{{ $project->credits }}</strong></p>
                                        <p> creditgoal: <strong>{{$project->creditgoal}}</strong></p>
                                        <p> Made by: <strong> {{$project->user->name}} </strong></p>
                                        <p> Created: <strong>{{ $project->created_at }}</strong></p>
                                        
                                </div>
                            </div>
                        </div>
            </div>
            <div class="row">
                @foreach ($images as $image)
                    <img src="{{ asset($image->filepath . '/' . $image->filename) }}">
                @endforeach
            </div>
    </div>
</body>
</html>