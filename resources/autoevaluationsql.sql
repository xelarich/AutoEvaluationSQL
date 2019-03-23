-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour autoevaluationsql
DROP DATABASE IF EXISTS `autoevaluationsql`;
CREATE DATABASE IF NOT EXISTS `autoevaluationsql` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `autoevaluationsql`;

-- Listage de la structure de la table autoevaluationsql. film
DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `idFilm` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `anneeSortie` int(11) NOT NULL,
  `duree` int(11) NOT NULL,
  PRIMARY KEY (`idFilm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table autoevaluationsql.film : ~31 rows (environ)
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`idFilm`, `titre`, `anneeSortie`, `duree`) VALUES
	(0, 'A jamais', 2016, 90),
	(1, 'Au fond des bois', 2010, 102),
	(2, 'La fille seule', 1995, 90),
	(3, 'Elle', 2016, 130),
	(4, 'There will be blood', 2008, 158),
	(5, 'Magnolia', 2000, 184),
	(6, 'Gangs of New York', 2003, 170),
	(7, 'Taxi driver', 1976, 115),
	(8, 'Arrête ou je continue', 2014, 102),
	(9, 'Arès', 2016, 80),
	(10, 'Vendeur', 2016, 89),
	(11, 'Les noces de Dieu', 1999, 150),
	(12, 'Souvenirs de la maison jaune', 1989, 122),
	(13, 'La comédie de Dieu', 1995, 163),
	(14, 'Django unchained', 2012, 164),
	(15, 'Les huit salopards', 2016, 168),
	(16, 'Kill Bill volume 1', 2003, 112),
	(17, 'Mon âme par toi guérie', 2013, 124),
	(18, 'Le promeneur d\'oiseau', 2014, 100),
	(19, 'La maman et la putain', 1973, 220),
	(20, 'Ghost in the shell', 2017, 107),
	(21, 'Conjuring : les dossiers Warren', 2013, 110),
	(22, 'Blade runner', 1982, 117),
	(23, 'Au-delà des collines', 2012, 152),
	(24, 'Le retour', 2003, 106),
	(25, 'Julieta', 2016, 100),
	(26, 'The lobster', 2015, 114),
	(27, 'Taxi Téhéran', 2015, 86),
	(28, 'Les innocentes', 2016, 115),
	(29, 'Dune', 1985, 140),
	(30, 'The big Lebowski', 1998, 117);
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Listage de la structure de la table autoevaluationsql. genre
DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `idFilm` int(11) NOT NULL,
  `nomGenre` varchar(100) NOT NULL,
  PRIMARY KEY (`idFilm`,`nomGenre`),
  CONSTRAINT `genre_ibfk_1` FOREIGN KEY (`idFilm`) REFERENCES `film` (`idFilm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table autoevaluationsql.genre : ~50 rows (environ)
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`idFilm`, `nomGenre`) VALUES
	(0, 'Drame'),
	(1, 'Drame'),
	(2, 'Drame'),
	(3, 'Thriller'),
	(4, 'Drame'),
	(5, 'Drame'),
	(6, 'Action'),
	(6, 'Drame'),
	(6, 'Historique'),
	(7, 'Drame'),
	(7, 'Policier'),
	(8, 'Comédie'),
	(9, 'Action'),
	(9, 'Science fiction'),
	(10, 'Drame'),
	(11, 'Comédie'),
	(11, 'Drame'),
	(12, 'Comédie'),
	(12, 'Drame'),
	(13, 'Comédie'),
	(13, 'Drame'),
	(14, 'Western'),
	(15, 'Western'),
	(16, 'Action'),
	(16, 'Drame'),
	(16, 'Thriller'),
	(17, 'Drame'),
	(18, 'Comédie dramatique'),
	(18, 'Famille'),
	(19, 'Drame'),
	(19, 'Romance'),
	(20, 'Action'),
	(20, 'Science fiction'),
	(21, 'Epouvante-horreur'),
	(22, 'Science fiction'),
	(23, 'Drame'),
	(24, 'Drame'),
	(25, 'Drame'),
	(26, 'Comédie'),
	(26, 'Drame'),
	(26, 'Science fiction'),
	(27, 'Comédie'),
	(27, 'Drame'),
	(28, 'Drame'),
	(28, 'Historique'),
	(29, 'Action'),
	(29, 'Fantastique'),
	(29, 'Science fiction'),
	(30, 'Comédie'),
	(30, 'Policier');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Listage de la structure de la table autoevaluationsql. realisateur
DROP TABLE IF EXISTS `realisateur`;
CREATE TABLE IF NOT EXISTS `realisateur` (
  `idReal` int(11) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `anneeN` int(11) DEFAULT NULL,
  `villeN` varchar(100) DEFAULT NULL,
  `paysN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idReal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table autoevaluationsql.realisateur : ~24 rows (environ)
/*!40000 ALTER TABLE `realisateur` DISABLE KEYS */;
INSERT INTO `realisateur` (`idReal`, `prenom`, `nom`, `anneeN`, `villeN`, `paysN`) VALUES
	(0, 'Benoît', 'Jacquot', 1947, 'Paris', 'France'),
	(1, 'Paul', 'Verhoeven', 1938, 'Amsterdam', 'Pays-Bas'),
	(2, 'Paul Thomas', 'Anderson', 1970, 'Los Angeles', 'Etats-Unis'),
	(3, 'Martin', 'Scorsese', 1942, 'New York', 'Etats-Unis'),
	(4, 'Sophie', 'Fillières', 1964, 'Paris', 'France'),
	(5, 'Jean-Patrick', 'Benes', NULL, NULL, NULL),
	(6, 'Sylvain', 'Desclous', NULL, NULL, NULL),
	(7, 'João César', 'Monteiro', 1939, 'Figueira da Foz', 'Portugal'),
	(8, 'Quentin', 'Tarantino', 1963, 'Knoxville', 'Etats-Unis'),
	(9, 'François', 'Dupeyron', 1950, 'Tartas', 'France'),
	(10, 'Philippe', 'Muyl', 1953, 'Lille', 'France'),
	(11, 'Jean', 'Eustache', 1938, 'Pessac', 'France'),
	(12, 'Rupert', 'Sanders', 1971, 'Westminster', 'Royaume-Uni'),
	(13, 'James', 'Wan', 1977, 'Kuching', 'Malaisie'),
	(14, 'Ridley', 'Scott', 1937, 'South Shields', 'Royaume-Uni'),
	(15, 'Cristian', 'Mungiu', 1968, 'Iasi', 'Roumanie'),
	(16, 'Andrey', 'Zvyagintsev', 1964, 'Novossibirsk', 'Russie'),
	(17, 'Pedro', 'Almodóvar', 1949, 'Calzada de Calatrava', 'Espagne'),
	(18, 'Yórgos', 'Lánthimos', 1973, 'Athènes', 'Grèce'),
	(19, 'Jafar', 'Panahi', 1960, 'Mianeh', 'Iran'),
	(20, 'Anne', 'Fontaine', 1959, 'Luxembourg', 'Luxembourg'),
	(21, 'David', 'Lynch', 1946, 'Missoula', 'Etats-Unis'),
	(22, 'Joel', 'Coen', 1953, 'Minneapolis', 'Etats-Unis'),
	(23, 'Ethan', 'Coen', 1957, 'Minneapolis', 'Etats-Unis');
/*!40000 ALTER TABLE `realisateur` ENABLE KEYS */;

-- Listage de la structure de la table autoevaluationsql. realise
DROP TABLE IF EXISTS `realise`;
CREATE TABLE IF NOT EXISTS `realise` (
  `idFilm` int(11) NOT NULL,
  `idReal` int(11) NOT NULL,
  PRIMARY KEY (`idFilm`,`idReal`),
  KEY `idReal` (`idReal`),
  CONSTRAINT `realise_ibfk_1` FOREIGN KEY (`idFilm`) REFERENCES `film` (`idFilm`),
  CONSTRAINT `realise_ibfk_2` FOREIGN KEY (`idReal`) REFERENCES `realisateur` (`idReal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table autoevaluationsql.realise : ~32 rows (environ)
/*!40000 ALTER TABLE `realise` DISABLE KEYS */;
INSERT INTO `realise` (`idFilm`, `idReal`) VALUES
	(0, 0),
	(1, 0),
	(2, 0),
	(3, 1),
	(4, 2),
	(5, 2),
	(6, 3),
	(7, 3),
	(8, 4),
	(9, 5),
	(10, 6),
	(11, 7),
	(12, 7),
	(13, 7),
	(14, 8),
	(15, 8),
	(16, 8),
	(17, 9),
	(18, 10),
	(19, 11),
	(20, 12),
	(21, 13),
	(22, 14),
	(23, 15),
	(24, 16),
	(25, 17),
	(26, 18),
	(27, 19),
	(28, 20),
	(29, 21),
	(30, 22),
	(30, 23);
/*!40000 ALTER TABLE `realise` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
