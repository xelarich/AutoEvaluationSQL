<?php

namespace App\Http\Controllers;

use Egulias\EmailValidator\Exception\ExpectingCTEXT;
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
                    $tableau[0] = utf8_encode("Erreur Syntaxe de la requête");
                    break;
                case '42S22':
                    $tableau[0] = "Le champ spécifié n'existe pas";
                    break;
                case '42S02':
                    $tableau[0] = "La/Les table(s) spécifié n'existe pas";
                    break;
            }
        }
        if (!$error) {
            $tableau = [];
            $tableauReponse = [];
            for ($i = 0; $i < sizeof($resultat); $i++) {
                $donnees = "";
                foreach ($resultat[$i] as $key => $valeur) {
                    $donnees .= $valeur . ' ';
                }
                $tableau[$i] = $donnees;
            }
        }
        /*            $sqlRep = $requete->input('Select * from film');
                    $queryRep = $connexion -prepare($sqlRep);
                    $queryRep->execute();
                    $reponse = $queryRep->fetchAll();
                    for ($i = 0; $i < sizeof($reponse); $i++) {
                        $donnees = "";
                        foreach ($reponse[$i] as $key => $valeur) {
                            $donnees .= $key . ' : ' . $valeur . ' ';
                        }
                        $tableauReponse[$i] = $donnees;
                    }*/

        return view('questionnaire', ['traitement' => $tableau]);

    }
}
