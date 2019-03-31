@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <a href="{{ route ('courspi')}}" class="button gray" class="gray">Cours Partie I</a>
                    <a href="{{ route ('courspii')}}" class="button gray" class="gray">Cours Partie II</a>
                    <a href="{{ route ('courspiii')}}" class="button gray" class="gray">Cours Partie III</a>

                </div>
            </div>
        </div>
    </div>
    @endsection
