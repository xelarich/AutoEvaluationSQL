<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        return view('questionnaire');
    }

    public function requete(Request $requete)
    {

        return view('questionnaire', ['traitement' => $requete->input('requete')]);
    }
}
