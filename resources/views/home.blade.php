@extends('layouts.app')

@section('content')
{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    /*@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>--}}


<a href="{{ route ('questionnaire')}}" class="button">Questionnaire</a>
<a href="{{ route ('cours')}}" class="button gray" class="gray">Cours</a>

@endsection
    <style>

        body{
            text-align: center;
        }
        .button {
            background: #76B3FA;
            border-radius: 100px;
            padding: 20px 60px;
            color: #fff;
            text-decoration: none;
            font-size: 1.45em;
            margin: 0 15px;
            text-align: center;
        }

        .gray { background: #D2D2D2; }
        .gray:active { background: #b9b9b9; }







    </style>


