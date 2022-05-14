-- --------------------------------------------------------
-- Hoszt:                        127.0.0.1
-- Szerver verzió:               10.4.22-MariaDB - mariadb.org binary distribution
-- Szerver OS:                   Win64
-- HeidiSQL Verzió:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Adatbázis struktúra mentése a vizsga_2.
CREATE DATABASE IF NOT EXISTS `vizsga_2` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `vizsga_2`;

-- Struktúra mentése tábla vizsga_2. erdeklodo
CREATE TABLE IF NOT EXISTS `erdeklodo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nev` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `uzenet` text DEFAULT NULL,
  `b_datum` datetime DEFAULT NULL,
  `foto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK1_foto_id` (`foto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Tábla adatainak mentése vizsga_2.erdeklodo: ~0 rows (hozzávetőleg)
REPLACE INTO `erdeklodo` (`id`, `nev`, `email`, `datum`, `uzenet`, `b_datum`, `foto_id`) VALUES
	(1, 'Kíváncsi Fáncsi', 'kivancsif@gmail.com', '2022-05-24', 'Visszajelzést kérek szépen, hogy alkalmas-e az időpont.', '2022-05-14 16:53:13', 1),
	(2, 'Kerekes Géza', 'kerekesg@gmail.com', '2022-05-21', 'Esküvői fotózást szeretnék kérni 16-22 óra között a megjelölt napon.', '2022-05-14 16:55:08', 2),
	(3, 'Kovács Péter', 'kovacsp@gmail.com', '2022-05-22', 'Ételfotózást fotózást kérek a szokott helyen, 11-15 óra között.', '2022-05-14 16:58:16', 3),
	(4, 'Mokka Miklós', 'mokkam@fekete.hu', '2022-05-25', 'Az új itallaphoz kérek fotózást 16-18 óra között.', '2022-05-14 17:00:19', 8),
	(5, 'Futó Kornélia', 'futok@deminek.hu', '2022-05-26', 'Szeretném ha a futóversenyen célba éréskor lefotózna. 16-17 óra között a Hősök terén.', '2022-05-14 17:34:18', 1),
	(6, 'Kováts Ede', 'kovatse672@gmail.com', '2022-09-22', 'Szeretném ha megörökítené a szüleim családi házát mielőtt lebontjuk.', '2022-05-14 17:36:21', 6),
	(7, 'Papp Jánosné', 'pappne@yahoo.com', '2022-05-29', 'A családi éttermem megnyitóján kérek fotózást, étel és hangulat fotókat.', '2022-05-14 17:39:15', 3),
	(8, 'Juhász Ágota', 'juhasza@gmail.hu', '2022-05-30', 'Fazekas munkáimról szeretnék részletes termék fotózást kérni a katalógusomhoz.', '2022-05-14 17:40:49', 4),
	(9, 'Huszár Jenő', 'hjeno@hjeno.com', '2022-06-19', 'Mennyibe kerül az esküvő fotózás 10 óra időtartamban Budapesten?', '2022-05-14 17:42:45', 2),
	(10, 'dr. Nagy Dezső', 'dr.nagy@gmail.com', '2022-08-21', 'A Tiszakürti Arborétum prospektusába szeretnénk néhány képet kérni.', '2022-05-14 17:46:15', 5),
	(11, 'Kiss Imre', 'kissimi@tvmail.hu', '2022-06-17', 'Barista verseny fotózására szeretném kérni.', '2022-05-14 17:54:00', 8);

-- Struktúra mentése tábla vizsga_2. fotokategoria
CREATE TABLE IF NOT EXISTS `fotokategoria` (
  `foto_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategoria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `filter` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  PRIMARY KEY (`foto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Tábla adatainak mentése vizsga_2.fotokategoria: ~8 rows (hozzávetőleg)
REPLACE INTO `fotokategoria` (`foto_id`, `kategoria`, `filter`) VALUES
	(1, 'Portré', 'portre'),
	(2, 'Esküvő', 'eskuvo'),
	(3, 'Gasztronómia', 'gasztro'),
	(4, 'Termék', 'termek'),
	(5, 'Természet', 'termeszet'),
	(6, 'Építészet', 'epiteszet'),
	(8, 'Kávézó', 'kavezo'),
	(9, 'Utazás', 'utazas');

-- Struktúra mentése tábla vizsga_2. galeria
CREATE TABLE IF NOT EXISTS `galeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` char(50) DEFAULT NULL,
  `type` char(50) DEFAULT NULL,
  `size` double DEFAULT NULL,
  `cim` char(50) DEFAULT NULL,
  `foto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK1_foto_id` (`foto_id`),
  CONSTRAINT `FK1_foto_id` FOREIGN KEY (`foto_id`) REFERENCES `fotokategoria` (`foto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

-- Tábla adatainak mentése vizsga_2.galeria: ~0 rows (hozzávetőleg)
REPLACE INTO `galeria` (`id`, `filename`, `type`, `size`, `cim`, `foto_id`) VALUES
	(1, 'analog01.jpg', 'image/jpeg', 187007, 'Portré 1', 1),
	(2, 'kavezo01.jpg', 'image/jpeg', 118560, 'Kávézó 1', 8),
	(3, 'kavezo02.jpg', 'image/jpeg', 114841, 'Kávézó 2', 8),
	(4, 'analog02.jpg', 'image/jpeg', 177157, 'Portré 2', 1),
	(5, 'termek01.jpg', 'image/jpeg', 106935, 'Termék 1', 4),
	(6, 'eskuvo01.jpg', 'image/jpeg', 128273, 'Esküvő 1', 2),
	(7, 'epiteszet01.jpg', 'image/jpeg', 207304, 'Építészet 1', 6),
	(8, 'termeszet01.jpg', 'image/jpeg', 294315, 'Természet 1', 5),
	(9, 'analog03.jpg', 'image/jpeg', 191470, 'Portré 3', 1),
	(10, 'eskuvo02.jpg', 'image/jpeg', 73175, 'Esküvő 2', 2),
	(11, 'gasztro01.jpg', 'image/jpeg', 141575, 'Gasztronómia 1', 3),
	(12, 'termek02.jpg', 'image/jpeg', 130296, 'Termék 2', 4),
	(13, 'termeszet02.jpg', 'image/jpeg', 189481, 'Természet 2', 5),
	(14, 'eskuvo03.jpg', 'image/jpeg', 86418, 'Esküvő 3', 2),
	(15, 'kavezo03.jpg', 'image/jpeg', 83045, 'Kávézó 3', 8),
	(16, 'termek03.jpg', 'image/jpeg', 172396, 'Termék 3', 4),
	(17, 'termeszet03.jpg', 'image/jpeg', 140022, 'Természet 3', 5),
	(18, 'gasztro02.jpg', 'image/jpeg', 116709, 'Gasztronómia 2', 3),
	(19, 'analog06.jpg', 'image/jpeg', 229455, 'Portré 4', 1),
	(20, 'eskuvo04.jpg', 'image/jpeg', 107513, 'Esküvő 4', 2),
	(21, 'utazas01.jpg', 'image/jpeg', 212561, 'Utazás 1', 9),
	(22, 'termek04.jpg', 'image/jpeg', 237647, 'Termék 4', 4),
	(23, 'epiteszet02.jpg', 'image/jpeg', 170206, 'Építészet 2', 6),
	(24, 'utazas03.jpg', 'image/jpeg', 186518, 'Utazás 3', 9),
	(25, 'epiteszet03.jpg', 'image/jpeg', 219520, 'Építészet 3', 6),
	(26, 'gasztro03.jpg', 'image/jpeg', 151507, 'Gasztronómia 3', 3),
	(27, 'gasztro04.jpg', 'image/jpeg', 134887, 'Gasztronómia 4', 3),
	(28, 'kavezo04.jpg', 'image/jpeg', 47594, 'Kávézó 4', 8),
	(29, 'termeszet04.jpg', 'image/jpeg', 345155, 'Természet 4', 5),
	(30, 'utazas04.jpg', 'image/jpeg', 167842, 'Utazás 4', 9),
	(31, 'epiteszet04.jpg', 'image/jpeg', 247631, 'Építészet 4', 6),
	(32, 'termeszet05.jpg', 'image/jpeg', 181366, 'Természet 5', 5),
	(33, 'kavezo05.jpg', 'image/jpeg', 303489, 'Kávézó 5', 8),
	(34, 'termek05.jpg', 'image/jpeg', 163348, 'Termék 5', 4),
	(35, 'utazas05.jpg', 'image/jpeg', 171758, 'Utazás 5', 9),
	(36, 'termeszet06.jpg', 'image/jpeg', 273121, 'Természet 6', 5),
	(37, 'analog08.jpg', 'image/jpeg', 130654, 'Portré 5', 1),
	(38, 'eskuvo05.jpg', 'image/jpeg', 144126, 'Esküvő 5', 2),
	(39, 'termek06.jpg', 'image/jpeg', 203685, 'Termék 6', 4),
	(40, 'kavezo06.jpg', 'image/jpeg', 197761, 'Kávézó 6', 8),
	(41, 'epiteszet05.jpg', 'image/jpeg', 123681, 'Építészet 5', 6),
	(42, 'epiteszet06.jpg', 'image/jpeg', 144308, 'Építészet 6', 1),
	(43, 'epiteszet07.jpg', 'image/jpeg', 225435, 'Építészet 6', 6),
	(44, 'eskuvo06.jpg', 'image/jpeg', 115248, 'Esküvő 6', 2),
	(45, 'eskuvo07.jpg', 'image/jpeg', 102660, 'Esküvő 7', 2),
	(46, 'gasztro07.jpg', 'image/jpeg', 142958, 'Gasztronómia 7', 3),
	(47, 'gasztro08.jpg', 'image/jpeg', 117673, 'Gasztronómia 8', 3),
	(49, 'vizsla-2.jpg', 'image/jpeg', 138397, 'Vizsla 2', 1);

-- Struktúra mentése tábla vizsga_2. login
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `felhasznalo` varchar(50) NOT NULL,
  `jelszo` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Tábla adatainak mentése vizsga_2.login: ~0 rows (hozzávetőleg)
REPLACE INTO `login` (`id`, `felhasznalo`, `jelszo`) VALUES
	(1, 'teszt', '$2y$10$aGAYkwMUIzdffsijwVNNde31smPWvpk9zqN7jUZ.9XRNcH8E4XKcm');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
