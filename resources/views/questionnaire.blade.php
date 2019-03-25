@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $question->question }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="container">
                                <form method="post">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="input-group">
                                            <input class="form-control" name="requete"
                                                   placeholder="Entrez votre requête" required>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="input-group offset-5 col-2">
                                            <input type="submit" class="btn btn-outline-dark" name="Tester"
                                                   value="Tester" formaction="{{ url('questionnaire?question='.$question->idQ) }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-group offset-5 col-2">
                                            <input type="submit" class="btn btn-outline-dark" name="Valider"
                                                   value="Valider" formaction="{{ url('questionnaireValidate?question='.$question->idQ) }}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        Réponse traitement
                    </div>
                    @if(!empty($traitement)) )
                    @if (sizeof($traitement)== 1)
                        <div class="card-body">
                            {{ utf8_encode($traitement[0]) }}
                        </div>
                    @else
                        <div class="card-body">
                            <table class="col-12">
                                <thead>
                                <tr>
                                    @foreach ($traitement[0] as $key => $valeur)
                                        <th class="">{{ $key }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @for ($i = 1; $i < sizeof($traitement); $i++)
                                    <tr>
                                        @foreach ($traitement[$i] as $key => $valeur)
                                            <td scope="col"> {{ utf8_encode($valeur) }} </td>
                                        @endforeach
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                            @endif

                            @else
                                Aucune requête mentionnée
                        </div>
                </div>
                @endif


            </div>
        </div>
    </div>
@endsection
