@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Question n°1</div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="container">
                            <form method="post" action="{{ url('questionnaire') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="input-group">
                                        <input class="form-control" name="requete" placeholder="Entrez votre requête" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="input-group">
                                        <input type="submit" class="btn btn-outline-dark" name="Valider" value="Valider">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



                    @if(!empty($traitement))
                    <div class="card">
                        <div class="card-header">
                            Réponse traitement
                        </div>

                        <div class="card-body">
                            @for($i = 0; $i<count($traitement); $i++)
                                {{ utf8_encode($traitement[$i]) }} <br><hr>
                            @endfor
                        @else
                            Aucune requête mentionnée
                    </div>
                    </div>
                    @endif

        </div>
    </div>
</div>
@endsection
