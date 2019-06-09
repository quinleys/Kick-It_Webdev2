@extends('layouts.app')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="stripe-token" content="{{ env('STRIPE_KEY') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/stripe-demo.css') }}">
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const creditRatio = {{ env('CREDIT_RATIO')}};
    </script>
</head>
@section('content') 

        @guest 
        <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1>Hello, guest! </h1>
                        <h3>We're very happy that you want to help other people! But make an account first!</h3>
        
                                <a class="btn btn-primary" role="button" href="{{ route('register') }}">{{ __('Register') }}</a>
                                <br>
                                already have an account? <a class="button" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                    </div>
                </div>
            </div>
        @endguest
@Auth
    <div class="container containerstyle">
        <div class="row">
            <div class="col-md-">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table" >
                        <div class="row display-tr" >
                            <h3 class="panel-title display-td" >Credits kopen!</h3>
                            <div class="display-td" >
                                <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
 
                        
 
                        <form action="{{ route('stripe.post') }}" method="post" id="payment-form">
                            <div class="form-group">
                                <label class="control-label" for="inpCredits">Hoeveel credits wil je kopen?</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-gem"></i></span>
                                    <input type="number" class="form-control" name="credits" id="inpCredits">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="inpCost">Kostprijs</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-euro-sign"></i></span>
                                    <input type="text" class="form-control" name="cost" disabled id="inpCost">
                                </div>
                            </div>
 
                            @csrf
                            <div class="form-group">
                                <label for="card-element">
                                    Credit/Debit Kaartnummer
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
 
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
 
                            <button class="btn btn-primary">
                                Kopen die handel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        let convertUrl = '{{route('api.convert') }}';
    </script>
    <script src="{{ asset('js/stripe-demo.js') }}"></script>
    @endAuth

@endsection
