@extends('layouts.app')

@section('content')
       <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img src="images\test.jpg" class="img-fluid">

                    <div class="card-header">{{$question->question }}</div>
                    <div class="card-body">
                        <div class="form-group">

                            <div class="container">
                                <form method="post">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="input-group">
                                            <input class="form-control" name="requete"
                                                   placeholder="Entrez votre requête">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="input-group justify-content-lg-center">
                                            <input type="submit" class="btn btn-outline-dark" name="Tester la requête"
                                                   value="Tester la requête"
                                                   formaction="{{ url('questionnaire?question='.$question->idQ) }}">
                                        </div>
                                    </div>

                                    <hr>

                                    @if(!empty($traitement))
                                        <input name="traitement" type="hidden" value="$traitement">
                                        @if (sizeof($traitement)== 1)
                                            <div class="card-body">
                                                {{ ($traitement[0]) }}
                                            </div>
                                        @else
                                            <div class="card-body">
                                                Votre requête renvoie :
                                            </div>
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
                                                <hr>
                                                <div class="row">
                                                    @if(!empty($traitement))
                                                        <div class="input-group offset-2 col-2">
                                                            <?php $id = $question->idQ + 1;?>
                                                                <input type="submit"
                                                                                                      class="btn btn-outline-dark"
                                                                                                      name="Passer"
                                                                                                      value="Passer la question"
                                                                                                      formaction="{{ url('questionnaire?question='.$id)  }}">
                                                        </div>
                                                    @endif
                                                </div>
                                                @endif

                                                @else
                                                    Aucune requête mentionnée
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="input-group justify-content-center">
                                                <input type="submit" class="btn btn-outline-dark" name="Valider"
                                                       value="Valider"
                                                       formaction="{{ url('questionnaireValidate?question='.$question->idQ) }}">
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
