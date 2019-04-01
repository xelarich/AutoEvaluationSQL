@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header-cours">
                    <h1 class="titre">COURS SQL</h1>
                    <i class="sous-titre">Différents cours sont à votre disposition</i>
                </div>

                <div class="card-body">
                    <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
                        <div class="w3-third w3-margin-bottom">
                            <div class="w3-container fond">
                                <p class="centrer"><b> Partie I</b></p><br>
                                <li>...</li>
                                <li>...</li>
                                <li>...</li>
                                <br>
                                <a class="w3-button w3-black w3-margin-bottom centrer" href="{{ route ('courspi')}}"
                                   target="_blank"> Ouvrir le cours </a>
                            </div>
                        </div>

                        <div class="w3-third w3-margin-bottom">
                            <div class="w3-container fond">
                                <p class="centrer"><b>Partie II</b></p><br>
                                <li>...</li>
                                <li>...</li>
                                <li>...</li>
                                <br>
                                <a class="w3-button w3-black w3-margin-bottom centrer" href="{{ route ('courspii')}}"
                                   target="_blank"> Ouvrir le cours </a>
                            </div>
                        </div>

                        <div class="w3-third w3-margin-bottom">
                            <div class="w3-container fond">
                                <p class="centrer"><b>Partie III</b></p><br>
                                <li>...</li>
                                <li>...</li>
                                <li>...</li>
                                <br>
                                <a class="w3-button w3-black w3-margin-bottom centrer" href="{{ route ('courspiii')}}"
                                   target="_blank"> Ouvrir le cours </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
