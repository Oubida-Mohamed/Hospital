-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 02, 2022 at 09:31 AM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hopitale`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `User` varchar(10) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `motcle` varchar(7) NOT NULL,
  PRIMARY KEY (`User`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`User`, `Password`, `motcle`) VALUES
('oub', '7612369c1227b1835a252d2e4f943a2bfe7c5d0b', 'ghalami');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `IdContact` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(45) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Tele` varchar(15) NOT NULL,
  `Message` varchar(500) NOT NULL,
  PRIMARY KEY (`IdContact`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`IdContact`, `FullName`, `Email`, `Tele`, `Message`) VALUES
(8, 'MOHAMED OUBIDA', 'mohamedoubida11@gmail.com', '0612115396', 'bravo');

-- --------------------------------------------------------

--
-- Table structure for table `medcin`
--

DROP TABLE IF EXISTS `medcin`;
CREATE TABLE IF NOT EXISTS `medcin` (
  `cinmed` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nommed` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenommed` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telemed` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photomed` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailmed` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codspecialiter` int(11) NOT NULL,
  `dplmmed` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cinmed`),
  KEY `fk1` (`codspecialiter`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medcin`
--

INSERT INTO `medcin` (`cinmed`, `nommed`, `prenommed`, `telemed`, `photomed`, `emailmed`, `codspecialiter`, `dplmmed`, `sexe`) VALUES
('med4', 'SAMIR', 'HAMID', '0612115396', 'medcin4.jpg', 'hgfsduhdy@gmail.com', 3, 'diplome-de-docteur-vierge (4).pdf', 'homme'),
('D321', 'taar', 'khadija', '0720206035', 'medcin3.jpg', 'khadijja@gmail.com', 3, 'diplome-de-docteur-vierge (3).pdf', 'femme'),
('D654', 'sarti', 'reda', '0600006600', 'medcin2.jpg', 'redasarti@gmail.com', 4, 'diplome-de-docteur-vierge (2).pdf', 'homme'),
('D987', 'oubakkii', 'ayoub', '0612346787', 'medcin1.jpg', 'oubakkiayoub@gmail.com', 1, 'diplome-de-docteur-vierge (1).pdf', 'homme'),
('D673', 'sayhe', 'oussama', '0612115396', 'medcin5.jpg', 'sayhoussama@gmail.com', 2, 'diplome-de-docteur-vierge (5).pdf', 'homme');

-- --------------------------------------------------------

--
-- Table structure for table `pacient`
--

DROP TABLE IF EXISTS `pacient`;
CREATE TABLE IF NOT EXISTS `pacient` (
  `cinpac` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nompac` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenompac` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genrePac` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datenaissancepac` date NOT NULL,
  `TelePac` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photopac` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cinpac`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pacient`
--

INSERT INTO `pacient` (`cinpac`, `nompac`, `prenompac`, `genrePac`, `datenaissancepac`, `TelePac`, `photopac`) VALUES
('pat4', 'OUBakki', 'ayoub', 'Homme', '2000-02-02', '0612115396', 'patient4.jpg'),
('Pat5', 'hanouch', 'ossama', 'Homme', '2000-12-20', '0612115396', 'patient5.jpg'),
('M987', 'SAMIR', 'HAMID', 'Homme', '2000-01-01', '0625558458', 'patient2.jpg'),
('D857942', 'OUBIDA', 'MOHAMED', 'Homme', '2022-07-01', '0612115396', 'profil_img.png'),
('M654', 'sayah', 'oussama', 'Homme', '2002-02-02', '0612115358', 'medcin2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rendezvous`
--

DROP TABLE IF EXISTS `rendezvous`;
CREATE TABLE IF NOT EXISTS `rendezvous` (
  `numrend` int(11) NOT NULL AUTO_INCREMENT,
  `daterend` date NOT NULL,
  `heurerend` time NOT NULL,
  `cinmed` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cinpac` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`numrend`),
  KEY `fk2` (`cinmed`),
  KEY `fk3` (`cinpac`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rendezvous`
--

INSERT INTO `rendezvous` (`numrend`, `daterend`, `heurerend`, `cinmed`, `cinpac`) VALUES
(86, '2022-07-02', '09:00:00', 'D987', 'pat4'),
(89, '2022-07-03', '09:00:00', 'D673', 'Pat5'),
(88, '2022-07-02', '11:00:00', 'D673', 'Pat5'),
(87, '2022-07-02', '10:00:00', 'D673', 'Pat5'),
(81, '2022-07-10', '10:30:00', 'D987', 'm1'),
(80, '2022-07-10', '10:00:00', 'D987', 'D857942');

-- --------------------------------------------------------

--
-- Table structure for table `specialiter`
--

DROP TABLE IF EXISTS `specialiter`;
CREATE TABLE IF NOT EXISTS `specialiter` (
  `codespecialiter` int(11) NOT NULL,
  `labelspecialiter` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentationspecialiter` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`codespecialiter`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialiter`
--

INSERT INTO `specialiter` (`codespecialiter`, `labelspecialiter`, `presentationspecialiter`) VALUES
(1, 'MÃ©dcin gÃ©nÃ©raliste', 'Le mÃ©decin gÃ©nÃ©raliste est confrontÃ© quotidiennement Ã  des cas plus ou moins graves, Ã  des patients qu\'il suit depuis des annÃ©es ou seulement quelques semaines. Quoi qu\'il en soit, il diagnostique, soigne et assure un suivi au long cours lorsqu\'il s\'agit de maladies chroniques.'),
(2, 'PÃ©dicure-Podologue', 'Le pÃ©dicure-podologue est un professionnel de santÃ©, il veille Ã  la santÃ© de nos pieds.\r\nLes soins quâ€™il prodigue concernent :\r\nLe diagnostic et le traitement des affections de la peau et des ongles du pied.\r\nLe traitement des complications des troubles statiques et dynamiques du membre infÃ©rieur avec si besoin la fabrication de semelles orthopÃ©diques (orthÃ¨ses).\r\nEn gÃ©nÃ©ral, le mÃ©decin envoie les patients souffrant de maladie et de douleurs du pied consulter le podologue afin dâ€™Ã©tablir un diagnostic prÃ©cis et une prise en charge complÃ¨te du patient.'),
(3, 'Chirurgien-Dentiste', 'Caries, fÃªlures, abcÃ¨s : le chirurgien-dentiste traite les maladies qui affectent les dents et les mÃ¢choires. SpÃ©cialisÃ© en orthodontie, il Â« redresse Â» les dentitions mal implantÃ©es au moyen d\'appareillages et redonne le sourire en faisant rÃ©aliser des couronnes, des bridges, des bagues, par un prothÃ©siste dentaire.'),
(4, 'Opticien', 'L\'opticien - lunetier / l\'opticienne - lunetiÃ¨re vend des montures et verres correcteurs, les lentilles de contact et autres accessoires (lunettes de soleil, produits d\'entretien, Ã©tuis, cordons...). L\'opticien a des connaissances techniques pour effectuer certains examens (analyse visuelle, centrage des yeux).');

-- --------------------------------------------------------

--
-- Table structure for table `usermed`
--

DROP TABLE IF EXISTS `usermed`;
CREATE TABLE IF NOT EXISTS `usermed` (
  `codeusermed` int(11) NOT NULL AUTO_INCREMENT,
  `passmed` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cinmed` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`codeusermed`),
  KEY `fk4` (`cinmed`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usermed`
--

INSERT INTO `usermed` (`codeusermed`, `passmed`, `cinmed`) VALUES
(13, 'b6692ea5df920cad691c20319a6fffd7a4a766b8', 'D321'),
(12, '12c6fc06c99a462375eeb3f43dfd832b08ca9e17', 'D654'),
(11, '17ba0791499db908433b80f37c5fbc89b870084b', 'D987'),
(16, '98fbc42faedc02492397cb5962ea3a3ffc0a9243', 'med4'),
(17, 'd3fc13dc12d8d7a58e7ae87295e93dbaddb5d36b', 'D673');

-- --------------------------------------------------------

--
-- Table structure for table `userpac`
--

DROP TABLE IF EXISTS `userpac`;
CREATE TABLE IF NOT EXISTS `userpac` (
  `codeuserpac` int(11) NOT NULL AUTO_INCREMENT,
  `passpac` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cinpac` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`codeuserpac`),
  KEY `fk5` (`cinpac`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userpac`
--

INSERT INTO `userpac` (`codeuserpac`, `passpac`, `cinpac`) VALUES
(39, '17ba0791499db908433b80f37c5fbc89b870084b', 'Pat5'),
(38, '98fbc42faedc02492397cb5962ea3a3ffc0a9243', 'pat4'),
(36, '17ba0791499db908433b80f37c5fbc89b870084b', 'M987'),
(34, 'fb96549631c835eb239cd614cc6b5cb7d295121a', 'D857942'),
(37, '12c6fc06c99a462375eeb3f43dfd832b08ca9e17', 'M654');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
