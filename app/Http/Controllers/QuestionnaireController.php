<?php

namespace App\Http\Controllers;

use App\Question;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;
use TheSeer\Tokenizer\Exception;

class QuestionnaireController extends Controller
{


    public function index()
    {
        return view('questionnaire');
    }
    public function show($id){

        return view("questionnaire",array('question' =>Question::find($id)));
    }

    public function requete(Request $requete)
    {
        $tableau = [];
        $error = false;
        try {
            $connexion = NEW PDO('mysql:host=localhost;dbname=autoevaluationsql', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,));
            $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $sql = $requete->input('requete');
            $query = $connexion->prepare($sql);
            $query->execute();
            $resultat = $query->fetchAll();
        } catch (PDOException $e) {
            $error = true;
            $tableau[0] = $e->getCode();
            switch ($e->getCode()) {
                case 42000:
                    $tableau[0] = utf8_encode("Erreur syntaxe de la requête");
                    break;
                case '42S22':
                    $tableau[0] = utf8_encode('Le champ spécifié n\'existe pas');
                    break;
                case '42S02':
                    $tableau[0] = utf8_encode('La/Les table(s) spécifié n\'existe pas');
                    break;
            }
        }
        if ($error) {
            return view('questionnaire', ['traitement' => $tableau]);
        }
        return view('questionnaire', ['traitement' => $resultat]);

    }
}
