<?php

namespace App\Http\Controllers;

use App\Question;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use PDO;
use PDOException;
use TheSeer\Tokenizer\Exception;

class QuestionnaireController extends Controller
{


    public function index()

    {
        return view('questionnaire', ['question' => Question::where('idQ', 1)->first()]);
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
                case '42000':
                    $tableau[0] = "Erreur syntaxe de la requête";
                    break;
                case '42S22':
                    $tableau[0] = 'Le champ spécifié n\'existe pas';
                    break;
                case '42S02':
                    $tableau[0] = 'La/Les table(s) spécifié n\'existe pas';
                    break;
            }
        }
        if ($error) {
            return view('questionnaire', ['traitement' => $tableau, 'question' => Question::where('idQ', $requete->input('question'))->first()]);
        }
        return view('questionnaire', ['sql' => $sql, 'traitement' => $resultat, 'question' => Question::where('idQ', $requete->input('question'))->first()]);

    }

    public function validateNext(Request $requete)
    {
        $connexion = NEW PDO('mysql:host=localhost;dbname=autoevaluationsql', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,));
        $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $sql = $requete->input('requete');
        $query = $connexion->prepare($sql);
        $query->execute();
        $resultatUser = $query->fetchAll();
        //---------------------------------------//
        $good = false;
        $reponse = $requete->input('question');
        $tmp = DB::table('questions')->where('idQ', $reponse)->pluck('reponse');
        $sql = substr($tmp, 2, sizeof($tmp) - 3);
        $connexion = NEW PDO('mysql:host=localhost;dbname=autoevaluationsql', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,));
        $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $query = $connexion->prepare($sql);
        $query->execute();
        $resultat = $query->fetchAll();


        if ($resultatUser[0] == $resultat[0]) {
            var_dump('cegal');
            var_dump($resultatUser[0] , $resultat[0]);
            foreach ($resultatUser as $key => $valeur) {
                if (array_key_exists($key, $resultat)) {
                    $tabres = (array_diff_assoc($resultat[$key], $resultatUser[$key]));
                    if (!$tabres) {
                        var_dump($tabres);
                        var_dump("gg");
                        $good=true;
                    } else {
                        var_dump($tabres);
                        var_dump("pas gg");
                        $good=false;
                    }
                }

            }
        } else {
            var_dump($resultatUser[0] , $resultat[0]);
            var_dump("cestpasegal");
            /*$tableau[0] = utf8_encode('Erreur de requête');
            return view('questionnaire', ['traitement' => $tableau, 'question' => Question::where('idQ', $requete->input('question'))->first()]);*/
            $good = false;
        }
        /*$tabres=array_diff_assoc($resultat[$key],$resultatUser[$key]);
            if(array_key_exists($key,$resultat)){
                var_dump($tabres);

            }*/


        if ($good) {
            $tableau[0] = utf8_encode('Bravo ! Vous pouvez passer à la question suivante !');
            return view('questionnaire', ['traitement' => $tableau, 'question' => Question::where('idQ', $requete->input('question'))->first()]);
        } else {
            $tableau[0] = utf8_encode("Erreur, votre requete n'est pas correcte");

            return view('questionnaire', ['traitement' => $tableau, 'question' => Question::where('idQ', $requete->input('question'))->first()]);
        }
    }

}
