<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('questions')->insert([
        ['question' => 'Quels sont l'/'identifiant et le titre de chaque film  ?','reponse' => 'SELECT idFilm,titre FROM film;'],
        ['question' => 'Quels sont l'/'identifiant et le titre de chaque film  ? L'/'affichage devra être effectué par ordre alphabétique des titres des films.','reponse' => 'SELECT idFilm,titre FROM film ORDER BY titre;'],
        ['question' => 'Quels sont l'/'identifiant et le titre de chaque film  dont le titre commence par la lettre A ? L'/'affichage devra être effectué par ordre alphabétique des titres des films.','reponse' => 'SELECT idFilm,titre FROM film WHERE titre LIKE "A%" ORDER BY titre;'],
        ['question' => 'Quels sont l'/'identifiant et le titre de chaque film  dont le titre commence par la lettre A ou la lettre T ? L'/'affichage devra être effectué par ordre alphabétique des titres des films.','reponse' => 'SELECT idFilm,titre FROM film WHERE titre LIKE "A%" OR titre LIKE "T%" ORDER BY titre;'],
        ['question' => 'Quels sont l'/'identifiant et le titre de chaque film  dont le titre contient la chaîne de caractères ou ? L'/'affichage devra être effectué par ordre alphabétique des titres des films.','reponse' => 'SELECT idFilm,titre FROM film WHERE titre LIKE "%ou%" ORDER BY titre;'],
        ['question' => 'Quels sont l'/'identifiant, la durée et le titre de chaque film  dont la durée est comprise entre (au sens large) 150 et 200 minutes  ?  L'/'affichage devra être effectué par ordre décroissant des durées des films. D'/'autre part, vous utiliserez le prédicat between pour la requête SQL que vous proposerez.','reponse' => 'SELECT idFilm,titre,duree FROM film WHERE duree BETWEEN 150 AND 200 ORDER BY duree DESC;'],
        ['question' => 'Quels sont l'/'identifiant, la durée et le titre de chaque film  dont la durée est comprise entre (au sens large) 150 et 200 minutes  ?  L'/'affichage devra être effectué par ordre décroissant des durées des films. D'/'autre part, vous n'/'utiliserez pas le prédicat between pour la requête SQL que vous proposerez.','reponse' => 'SELECT idFilm,titre,duree FROM film WHERE duree <201 AND duree >149 ORDER BY duree DESC;'],
        ['question' => 'Quels sont l'/'identifiant, la durée et le titre de chaque film  ayant une durée strictement supérieure à 150 minutes et dont le titre commence par la lettre A ou la lettre T ? L'/'affichage devra être effectué par ordre alphabétique des titres des films.','reponse' => ' SELECT idFilm,titre,duree FROM film WHERE duree > 150 AND (titre LIKE "A%" OR titre LIKE "T%") ORDER BY titre;'],
        ['question' => 'Quels sont les différents noms de genre des films  ? L'/'affichage devra être effectué par ordre alphabétique des noms de genre des films.','reponse' => 'SELECT DISTINCT nomGenre FROM genre ORDER BY nomGenre;'],
        ['question' => 'Combien y a t-il de noms de genre des films  ?','reponse' => 'SELECT COUNT(DISTINCT nomGenre) FROM genre;'],
        ['question' => 'Quels sont les identifiants des films du genre Action  ? L'/'affichage devra être effectué par ordre croissant des identifiants des films.','reponse' => 'SELECT idFilm FROM genre WHERE nomGenre="Action" ORDER BY idFilm;'],
        ['question' => 'Combien y a t-il de films du genre Action  ?','reponse' => 'SELECT COUNT(idFilm) FROM genre WHERE nomGenre="Action";'],
        ['question' => 'Quels sont la durée moyenne, la durée minimale et la durée maximale des films  ?','reponse' => 'SELECT AVG(duree),MIN(duree),MAX(duree) FROM film;'],
        ['question' => 'Quels sont l'/'identifiant et le nom de chacun des réalisateurs pour lesquels la date de naissance n'/'est pas renseignée  ?','reponse' => 'SELECT idReal,nom FROM realisateur WHERE anneeN IS NULL;'],
        ['question' => 'Combien de réalisateurs ont leur date de naissance non renseignée  ?','reponse' => 'SELECT COUNT(*) FROM realisateur WHERE anneeN IS NULL;'],
        ['question' => 'Quels sont l'/'identifiant et le nom de chacun des réalisateurs pour lesquels la date de naissance est renseignée  ? L'/'affichage devra être effectué par ordre alphabétique des noms des réalisateurs.','reponse' => 'SELECT idReal,nom FROM realisateur WHERE anneeN IS NOT NULL ORDER BY nom;'],
      ]);
    }
}
