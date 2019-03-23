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
        try {
            $connexion = NEW PDO('mysql:host=localhost;dbname=autoevaluationsql', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,));
            $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Erreur : " . $exception;
        }

        try {
            $sql = $requete->input('requete');
            $query = $connexion->prepare($sql);

            $query->execute();
            $resultat = $query->fetchAll();

            $tableau = [];
            $tableauReponse = [];
            for ($i = 0; $i < sizeof($resultat); $i++) {
                $donnees = "";
                foreach ($resultat[$i] as $key => $valeur) {
                    $donnees .= $key . ' : ' . $valeur . ' ';
                }
                $tableau[$i] = $donnees;
            }
            $sqlRep = $requete->input('Select * from film');
            $queryRep = $connexion -prepare($sqlRep);
            $queryRep->execute();
            $reponse = $queryRep->fetchAll();
            for ($i = 0; $i < sizeof($reponse); $i++) {
                $donnees = "";
                foreach ($reponse[$i] as $key => $valeur) {
                    $donnees .= $key . ' : ' . $valeur . ' ';
                }
                $tableauReponse[$i] = $donnees;
            }



            return view('questionnaire', ['traitement' => $tableau]);

        }
catch (Exception $e)
{
return view('questionnaire');
}

}
}
