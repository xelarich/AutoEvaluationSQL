@extends('layouts.app')


@section('content')
{{--
<div class="container">
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

<br>
<br>
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
    <div class="w3-display-middle" style="white-space:nowrap;">
        <span class="w3-center w3-padding-large w3-black w3-xxlarge w3-wide w3-animate-opacity">Plateforme d’autoévaluation SQL<span
                class="w3-hide-small"></span> </span>
    </div>
</div>

<br><br>
<br><p class="w3-center w3-padding-large w3-large">Testez vos compétences sur le langage SQL. Cours et questionnaire sont à votre disposition<p/>

<br><br><br>



<img src="images\database-icon.png" class="centrer">


@endsection



