@if(Session::has('success'))
    <div class="alert alert-success" role="alert" text-center>
        <strong>Success:</strong> {{ Session::get('success')}}
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    </div>
@endif


@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert" text-center>
        <strong>Alert:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    </div>

@endif
