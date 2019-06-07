@extends('layouts.app')
<style>
        .carousel{
            background: #2f4357;
            margin-top: 20px;
        }
        .carousel-item{
            text-align: center;
            min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
            max-height: 500px;
            width: 100%;
        }
        .carousel-caption{
            text-align: center;
            color:"black";
        }
    
        </style>
@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($images as $image)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class=" @if($loop->first) active @endif"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($images as $image)
              <div class="carousel-item @if($loop->first) active @endif">
                  <img class="d-block w-100"  src="{{ asset($image->filepath . '/' . $image->filename) }}" alt="{{ $image->title }}">
                </div>
               @endforeach
              
        </div>
        
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
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
                            @Auth
                                @if(Auth::user()->id == $project->user_id)
                                        <a class="btn btn-warning" role="button" href="{{ route('edit_project_path', ['project'=>$project->id]) }}">Edit</a>
                                        <a class="btn btn-success" href="{{ route('packages.edit',['project'=>$project->id]) }}">Add Packages </a>
                                        <a class="btn btn-success" href="{{ route('pdf.invoice',['project'=>$project->id]) }}">Download PDF </a>
                                        <form action="{{ route('delete_project_path', ['project'=>$project->id]) }}" method="POST">
                                                @csrf 
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                @endif

                                @if(Auth::user()->id != $project->user_id)
                                    <a class="btn btn-success"  href="{{ route('donate.index', ['project'=>$project->id]) }}">Donate </a>
                                    <a class="btn btn-success" href="{{ route('pdf.invoice',['project'=>$project->id]) }}">Download PDF </a>
                                
                                @endif
                                @endAuth

                                @guest
                                    <a class="btn btn-success" href="{{ route('login') }}">Donate </a>
                                    <a class="btn btn-success" href="{{ route('pdf.invoice',['project'=>$project->id]) }}">Download PDF </a>
                                @endguest
                    </div>
                </div>
            </div>
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{$project->credits}}" aria-valuemin="0" aria-valuemax="{{$project->creditgoal}}" style="width:{{$project->credits / $project->creditgoal * 100 }}%">
                                {{$project->credits}} credits of {{$project->creditgoal}}
                            </div>
                        </div>
                        @Auth
                            @if(Auth::user()->id != $project->user_id)
                                <br/>
                                <a class="btn btn-primary" href="{{ route('donate.index', ['project'=>$project->id]) }}"> Support us!</a>
                            @endif
                        @endAuth
                </div>
            </div>
                <div class="details" style="display:none">
                        <h4>Images</h4>
                        @foreach ($images as $image)
                        <div class="col-md-12">
                            <img src="{{ asset($image->filepath . '/' . $image->filename) }}">
                            <p>{{$image->filename}}</p>
                        </div>
                        @endforeach
                </div>
                <a id="more" href="#" onclick="$('.details').slideToggle(function(){$('#more').html($('.details').is(':visible')?'See Less Details':'See More Details');});">Look at the images</a>
                
                <div class="detailspackages" style="display:none">
                        <h4>Packages</h4>
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Min Value</th>
                                        <th>Max Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                        @foreach ($packages as $package)
                        <tr>
                                <th> {{ $package->id }} </th>
                                <td> {{ $package->title }} </td>
                                <td> {{ $package->description }} </td>
                                <td> {{ $package->min_value }} </td>
                                <td> {{ $package->max_value }} </td>
                            </tr>
                        @endforeach
                                </tbody>
                        </table>
                </div>
                <a id="morepackages" href="#" onclick="$('.detailspackages').slideToggle(function(){$('#morepackages').html($('.detailspackages').is(':visible')?'See Less Details':'See More Details');});">Look at the donation packages</a>
                
                @if(Auth::user()->id == $project->user_id)
                <div class="moredonation" style="display:none">
                        <h4>Donators</h4>
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Package</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                        @foreach ($donations as $donation)
                        <tr>
                                <th> {{ $donation->id }} </th>
                                <td> {{ $donation->user->name }} </td>
                                <td> {{ $donation->package->title }} </td>
                                <td> {{ $donation->amount }} </td>
                                <td> {{ $donation->created_at }} </td>
                            </tr>
                        @endforeach
                                </tbody>
                        </table>
                </div>
                <a id="moredonation" href="#" onclick="$('.moredonation').slideToggle(function(){$('#moredonation').html($('.moredonation').is(':visible')?'See Less Details':'See More Details');});">Look at the donations</a>                    
                @endif

            <div class="row">
                <div class="col-md-12 text-center">
                    <div>
                            <br>
                        <h3>Comments <small> {{ $project->comments()->count() }} total </small>  </h3>
                    </div>
                    @foreach ($project->comments as $comment)
                    <div class="card">
                        
                        <div class="card-body">
                                <img src="../../storage/avatars/{{ $comment->user->avatar }}" style="width:32px; height:32px; margin-right:10px; border-radius:50%">
                            <p class="lead">{{$comment->user->name}}</p>
                            
                            <p>{{$comment->comment}}</p>
                            <p>posted
                            {{ $comment->created_at->diffForHumans() }}
                        </p>
                        </div>
                    </div>    
                    @endforeach
                </div>
            </div>
            @Auth
            
            <div class="row">
                
                        <form action=" {{ route('comments.store',$project->id) }}" method="POST">
                        @csrf 
                            <div class="col-md-12">
                                    <div class="form-group ">
                                    <label for='comment'>comment:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name='comment'>
                                    </textarea>
                                    </div>
        
                                    <button type="submit" class="btn btn-primary mb-2">Add comment</button>
                                </div>
                            
                        
                        </form>
                </div>

                
            @endAuth

            @guest
                <a class="button" href="{{ route('login') }}">{{ __('Sign In') }} to write a comment.</a>
             @endguest
            </div>
        </div>
    </div>
</div>


@Auth
<!-- Modal -->
<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="background: orange">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ion-android-close"></span></button>
                    <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">Donation for {{$project -> name }}</h4>
                </div>            <!-- Modal Body -->
                <div class="modal-body">
                    <form  action=" {{ route('donate.post',['project'=>$project->id]) }}" method="POST">
                        @csrf
                    <p> Current credits: {{ Auth::user()->credits }}
                            <div class="form-group">
                                    <label for='credits'>How many credits ?</label>
                                    <input type="number" class="form-control" name='credits' placeholder="min: 1">
                                    <a class="btn btn-primary"> Donate </a>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
        @endAuth
</div>

<script>

$('#show').click(function()
{
 $('#data').show();
});
</script>
@endsection 
