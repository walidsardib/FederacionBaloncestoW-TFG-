-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: federacion2
-- ------------------------------------------------------
-- Server version	8.0.37

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acciones_partido`
--

DROP TABLE IF EXISTS `acciones_partido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acciones_partido` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `idPartido` bigint unsigned NOT NULL,
  `idJugador` bigint unsigned NOT NULL,
  `idEquipo` bigint unsigned NOT NULL,
  `accion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acciones_partido_idpartido_foreign` (`idPartido`),
  KEY `acciones_partido_idjugador_foreign` (`idJugador`),
  KEY `acciones_partido_idequipo_foreign` (`idEquipo`),
  CONSTRAINT `acciones_partido_idequipo_foreign` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `acciones_partido_idjugador_foreign` FOREIGN KEY (`idJugador`) REFERENCES `jugadores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `acciones_partido_idpartido_foreign` FOREIGN KEY (`idPartido`) REFERENCES `partidos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acciones_partido`
--

LOCK TABLES `acciones_partido` WRITE;
/*!40000 ALTER TABLE `acciones_partido` DISABLE KEYS */;
INSERT INTO `acciones_partido` VALUES (11,242,6,2,'acierto2P',2,'2025-05-19 11:22:47','2025-05-19 11:22:47'),(12,242,11,3,'acierto2P',2,'2025-05-19 11:22:50','2025-05-19 11:22:50'),(13,242,11,3,'acierto3P',3,'2025-05-19 11:22:51','2025-05-19 11:22:51'),(14,242,12,3,'acierto3P',3,'2025-05-19 11:22:54','2025-05-19 11:22:54'),(15,242,12,3,'aciertoTL',1,'2025-05-19 11:22:55','2025-05-19 11:22:55'),(16,242,6,2,'acierto3P',3,'2025-05-19 11:23:00','2025-05-19 11:23:00'),(17,242,9,2,'intento3P',NULL,'2025-05-19 11:23:03','2025-05-19 11:23:03'),(18,242,9,2,'intento2P',NULL,'2025-05-19 11:23:04','2025-05-19 11:23:04'),(19,242,9,2,'aciertoTL',1,'2025-05-19 11:23:06','2025-05-19 11:23:06'),(20,242,9,2,'acierto3P',3,'2025-05-19 11:23:07','2025-05-19 11:23:07'),(21,242,51,2,'acierto2P',2,'2025-05-19 11:23:09','2025-05-19 11:23:09'),(22,242,51,2,'acierto3P',3,'2025-05-19 11:23:10','2025-05-19 11:23:10'),(23,242,51,2,'acierto3P',3,'2025-05-19 11:23:10','2025-05-19 11:23:10'),(24,242,51,2,'acierto3P',3,'2025-05-19 11:23:10','2025-05-19 11:23:10'),(25,242,51,2,'acierto3P',3,'2025-05-19 11:23:11','2025-05-19 11:23:11'),(26,242,51,2,'intento3P',NULL,'2025-05-19 11:23:11','2025-05-19 11:23:11'),(27,242,51,2,'intento2P',NULL,'2025-05-19 11:23:12','2025-05-19 11:23:12'),(28,242,51,2,'acierto2P',2,'2025-05-19 11:23:12','2025-05-19 11:23:12'),(29,242,51,2,'acierto2P',2,'2025-05-19 11:23:12','2025-05-19 11:23:12'),(30,242,51,2,'acierto2P',2,'2025-05-19 11:23:13','2025-05-19 11:23:13'),(31,242,51,2,'acierto2P',2,'2025-05-19 11:23:13','2025-05-19 11:23:13'),(32,242,51,2,'aciertoTL',1,'2025-05-19 11:23:14','2025-05-19 11:23:14'),(33,242,11,3,'intento2P',NULL,'2025-05-19 11:23:17','2025-05-19 11:23:17'),(34,242,11,3,'acierto2P',2,'2025-05-19 11:23:17','2025-05-19 11:23:17'),(35,242,11,3,'acierto2P',2,'2025-05-19 11:23:18','2025-05-19 11:23:18'),(36,242,11,3,'acierto3P',3,'2025-05-19 11:23:18','2025-05-19 11:23:18'),(37,242,11,3,'aciertoTL',1,'2025-05-19 11:23:20','2025-05-19 11:23:20'),(38,242,12,3,'acierto2P',2,'2025-05-19 11:23:25','2025-05-19 11:23:25'),(39,242,12,3,'acierto3P',3,'2025-05-19 11:23:26','2025-05-19 11:23:26'),(40,242,13,3,'acierto2P',2,'2025-05-19 11:23:28','2025-05-19 11:23:28'),(41,242,13,3,'acierto3P',3,'2025-05-19 11:23:29','2025-05-19 11:23:29'),(42,242,13,3,'intento2P',NULL,'2025-05-19 11:23:29','2025-05-19 11:23:29'),(43,242,13,3,'acierto2P',2,'2025-05-19 11:23:31','2025-05-19 11:23:31'),(44,242,13,3,'intento3P',NULL,'2025-05-19 11:23:31','2025-05-19 11:23:31'),(45,242,15,3,'rebote',NULL,'2025-05-19 11:23:50','2025-05-19 11:23:50'),(46,242,15,3,'asistencia',NULL,'2025-05-19 11:23:51','2025-05-19 11:23:51'),(47,242,15,3,'robo',NULL,'2025-05-19 11:23:52','2025-05-19 11:23:52'),(48,242,14,3,'acierto2P',2,'2025-05-19 11:23:54','2025-05-19 11:23:54'),(49,242,14,3,'acierto3P',3,'2025-05-19 11:23:54','2025-05-19 11:23:54'),(50,242,10,2,'acierto2P',2,'2025-05-19 11:24:05','2025-05-19 11:24:05'),(51,242,10,2,'acierto3P',3,'2025-05-19 11:24:05','2025-05-19 11:24:05'),(52,242,10,2,'aciertoTL',1,'2025-05-19 11:24:07','2025-05-19 11:24:07');
/*!40000 ALTER TABLE `acciones_partido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clubes`
--

DROP TABLE IF EXISTS `clubes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clubes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `escudo` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clubes_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clubes`
--

LOCK TABLES `clubes` WRITE;
/*!40000 ALTER TABLE `clubes` DISABLE KEYS */;
INSERT INTO `clubes` VALUES (1,'Real Madrid Club de Fútbol','Madrid, España','912345678','escudos/real_madrid.png','2025-05-06 14:20:00','2025-05-06 13:05:14'),(2,'Futbol Club Barcelona','Barcelona, España','934567890','escudos/fc_barcelona.png','2025-05-06 14:20:00','2025-05-08 05:29:19'),(3,'Unicaja Baloncesto','Málaga, España','951234567','escudos/unicaja.png','2025-05-06 14:20:00','2025-05-07 05:46:49'),(4,'Valencia Basket','Valencia, España','962345678','escudos/valencia_basket.png','2025-05-06 14:20:00','2025-05-07 06:03:21'),(5,'Baskonia','Vitoria-Gasteiz, España','945678901','escudos/baskonia.png','2025-05-06 14:20:00','2025-05-08 05:29:19'),(6,'UCAM Murcia','Murcia, España','968234567','escudos/ucam_murcia.png','2025-05-06 14:20:00','2025-05-06 12:57:22'),(7,'Lenovo Tenerife','San Cristóbal de La Laguna, España','922345678','escudos/lenovo_tenerife.png','2025-05-06 14:20:00','2025-05-08 05:26:12'),(8,'Joventut Badalona','Badalona, España','933456789','escudos/joventut_badalona.png','2025-05-06 14:20:00','2025-05-07 05:46:49'),(9,'Gran Canaria','Las Palmas, España','928234567','escudos/gran_canaria.png','2025-05-06 14:20:00','2025-05-07 05:21:21'),(10,'Baxi Manresa','Manresa, España','938765432','escudos/baxi_manresa.png','2025-05-06 14:20:00','2025-05-06 13:05:14'),(11,'Los Angeles Lakers','Los Ángeles, EE.UU.','123456789','escudos/lakers.png','2025-05-14 10:53:11','2025-05-14 10:53:11'),(12,'Golden State Warriors','San Francisco, EE.UU.','123456780','escudos/warriors.png','2025-05-14 10:53:11','2025-05-14 10:53:11'),(13,'Boston Celtics','Boston, EE.UU.','123456781','escudos/celtics.png','2025-05-14 10:53:11','2025-05-14 10:53:11'),(14,'Chicago Bulls','Chicago, EE.UU.','123456782','escudos/bulls.png','2025-05-14 10:53:11','2025-05-14 10:53:11'),(15,'Miami Heat','Miami, EE.UU.','123456783','escudos/heat.png','2025-05-14 10:53:11','2025-05-14 10:53:11'),(16,'Brooklyn Nets','Brooklyn, EE.UU.','123456784','escudos/nets.png','2025-05-14 10:53:11','2025-05-14 10:53:11'),(17,'Dallas Mavericks','Dallas, EE.UU.','123456785','escudos/mavericks.png','2025-05-14 10:53:11','2025-05-14 10:53:11'),(18,'Phoenix Suns','Phoenix, EE.UU.','123456786','escudos/suns.png','2025-05-14 10:53:11','2025-05-14 10:53:11'),(19,'Philadelphia 76ers','Philadelphia, EE.UU.','123456787','escudos/76ers.png','2025-05-14 10:53:11','2025-05-14 10:53:11'),(20,'Milwaukee Bucks','Milwaukee, EE.UU.','123456788','escudos/bucks.png','2025-05-14 10:53:11','2025-05-14 10:53:11');
/*!40000 ALTER TABLE `clubes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipos`
--

DROP TABLE IF EXISTS `equipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pJugados` int NOT NULL DEFAULT '0',
  `pGanados` int NOT NULL DEFAULT '0',
  `pPerdidos` int NOT NULL DEFAULT '0',
  `puntosFinalizados` int NOT NULL DEFAULT '0',
  `puntosContra` int NOT NULL DEFAULT '0',
  `pts` int NOT NULL DEFAULT '0',
  `entrenador` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pabellon` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `escudo` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idLiga` bigint unsigned DEFAULT NULL,
  `idClub` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `equipos_idliga_foreign` (`idLiga`),
  KEY `equipos_idclub_foreign` (`idClub`),
  CONSTRAINT `equipos_idclub_foreign` FOREIGN KEY (`idClub`) REFERENCES `clubes` (`id`) ON DELETE SET NULL,
  CONSTRAINT `equipos_idliga_foreign` FOREIGN KEY (`idLiga`) REFERENCES `liga` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipos`
--

LOCK TABLES `equipos` WRITE;
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
INSERT INTO `equipos` VALUES (1,'Real Madrid',2,0,2,56,85,2,'Chus Mateo','WiZink Center','Madrid','escudos/IGSNsb6uy2h6NLWwNHO3JQNZH4PmKS4wmsNZ7bUk.jpg',2,1,'2025-05-06 14:20:00','2025-05-15 08:55:12'),(2,'FC Barcelona',7,7,0,263,150,14,'Joan Peñarroya','Palau Blaugrana','Barcelona','escudos/c3fQB0wCEoJRWJlaG7Z4bmoOtHrQuTaTOzPecsgk.png',2,2,'2025-05-06 14:20:00','2025-05-19 11:24:46'),(3,'Unicaja',3,1,2,82,98,4,'Ibon Navarro','Palacio de Deportes José María Martín Carpena','Málaga','escudos/unicaja.png',2,3,'2025-05-06 14:20:00','2025-05-19 11:24:46'),(4,'Valencia Basket',1,1,0,18,16,2,'Pedro Martínez','La Fonteta','Valencia','escudos/valencia.png',2,4,'2025-05-06 14:20:00','2025-05-07 06:03:21'),(5,'Baskonia',2,0,2,36,41,2,'Pablo Laso','Fernando Buesa Arena','Vitoria-Gasteiz','escudos/baskonia.jfif',2,5,'2025-05-06 14:20:00','2025-05-13 09:26:16'),(6,'UCAM Murcia',1,1,0,36,34,2,'Sito Alonso','Palacio de los Deportes','Murcia','escudos/murcia.png',2,6,'2025-05-06 14:20:00','2025-05-13 09:26:16'),(7,'Lenovo Tenerife',2,0,2,16,22,2,'Txus Vidorreta','Santiago Martín','San Cristóbal de La Laguna','escudos/tenerife.jfif',2,7,'2025-05-06 14:20:00','2025-05-08 05:26:12'),(8,'Joventut Badalona',1,0,1,12,19,1,'Carles Duran','Palau Olímpic','Badalona','escudos/badalona.png',2,8,'2025-05-06 14:20:00','2025-05-07 05:46:49'),(9,'Gran Canaria',1,0,1,12,56,1,'Jaka Lakovic','Gran Canaria Arena','Las Palmas','escudos/canarias.png',2,9,'2025-05-06 14:20:00','2025-05-07 05:21:21'),(10,'Baxi Manresa',2,1,1,64,74,3,'Pedro Martínez','Nou Congost','Manresa','escudos/baxi.png',2,10,'2025-05-06 14:20:00','2025-05-14 05:10:53'),(11,'Los Angeles Lakers',1,0,1,61,66,1,'Darvin Ham','Crypto.com Arena','Los Ángeles','escudos/lakers.png',4,11,'2025-05-14 10:53:20','2025-05-14 09:31:23'),(12,'Golden State Warriors',1,0,1,33,42,1,'Steve Kerr','Chase Center','San Francisco','escudos/warriors.png',4,12,'2025-05-14 10:53:20','2025-05-14 09:34:11'),(13,'Boston Celtics',0,0,0,0,0,0,'Joe Mazzulla','TD Garden','Boston','escudos/celtics.png',4,13,'2025-05-14 10:53:20','2025-05-14 09:31:23'),(14,'Chicago Bulls',0,0,0,0,0,0,'Billy Donovan','United Center','Chicago','escudos/bulls.png',4,14,'2025-05-14 10:53:20','2025-05-14 09:31:23'),(15,'Miami Heat',0,0,0,0,0,0,'Erik Spoelstra','Kaseya Center','Miami','escudos/heat.png',4,15,'2025-05-14 10:53:20','2025-05-14 09:31:23'),(16,'Brooklyn Nets',0,0,0,0,0,0,'Kevin Ollie','Barclays Center','Brooklyn','escudos/nets.png',4,16,'2025-05-14 10:53:20','2025-05-14 09:31:23'),(17,'Dallas Mavericks',1,1,0,42,33,2,'Jason Kidd','American Airlines Center','Dallas','escudos/mavericks.png',4,17,'2025-05-14 10:53:20','2025-05-14 09:34:11'),(18,'Phoenix Suns',0,0,0,0,0,0,'Frank Vogel','Footprint Center','Phoenix','escudos/suns.png',4,18,'2025-05-14 10:53:20','2025-05-14 09:31:23'),(19,'Philadelphia 76ers',1,1,0,57,48,2,'Nick Nurse','Wells Fargo Center','Philadelphia','escudos/76ers.png',6,19,'2025-05-14 10:53:20','2025-05-29 16:37:35'),(20,'Milwaukee Bucks',2,1,1,114,118,3,'Doc Rivers','Fiserv Forum','Milwaukee','escudos/bucks.png',6,20,'2025-05-14 10:53:20','2025-05-29 16:37:35'),(21,'heredia fc',0,0,0,0,0,0,'scorpion','la calle','malaga','escudos/0LlEv1mVpWjFPZHoaoeeoKzofsjdoormCVRir7fS.jpg',7,NULL,'2025-05-15 08:48:11','2025-05-29 16:39:12');
/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadisticas_partido`
--

DROP TABLE IF EXISTS `estadisticas_partido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estadisticas_partido` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `idJugador` bigint unsigned NOT NULL,
  `idPartido` bigint unsigned NOT NULL,
  `minutosJugados` int NOT NULL DEFAULT '0',
  `puntos` int NOT NULL DEFAULT '0',
  `rebotes` int NOT NULL DEFAULT '0',
  `asistencias` int NOT NULL DEFAULT '0',
  `intentos2P` int NOT NULL DEFAULT '0',
  `aciertos2P` int NOT NULL DEFAULT '0',
  `intentos3P` int NOT NULL DEFAULT '0',
  `aciertos3P` int NOT NULL DEFAULT '0',
  `intentosTL` int NOT NULL DEFAULT '0',
  `aciertosTL` int NOT NULL DEFAULT '0',
  `robos` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estadisticas_partido_idjugador_foreign` (`idJugador`),
  KEY `estadisticas_partido_idpartido_foreign` (`idPartido`),
  CONSTRAINT `estadisticas_partido_idjugador_foreign` FOREIGN KEY (`idJugador`) REFERENCES `jugadores` (`id`),
  CONSTRAINT `estadisticas_partido_idpartido_foreign` FOREIGN KEY (`idPartido`) REFERENCES `partidos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadisticas_partido`
--

LOCK TABLES `estadisticas_partido` WRITE;
/*!40000 ALTER TABLE `estadisticas_partido` DISABLE KEYS */;
INSERT INTO `estadisticas_partido` VALUES (25,1,6,121,6,1,1,2,1,2,1,2,1,1,'2025-05-06 13:01:20','2025-05-06 13:05:14'),(26,47,6,121,22,2,3,2,2,5,5,4,3,1,'2025-05-06 13:01:30','2025-05-06 13:05:14'),(27,2,6,121,6,1,2,1,1,1,1,1,1,0,'2025-05-06 13:01:38','2025-05-06 13:05:14'),(28,3,6,121,5,1,1,1,1,1,1,0,0,0,'2025-05-06 13:01:45','2025-05-06 13:05:14'),(29,48,6,121,5,0,0,1,1,1,1,0,0,0,'2025-05-06 13:01:47','2025-05-06 13:05:14'),(30,49,6,121,3,0,0,0,0,1,1,0,0,0,'2025-05-06 13:01:50','2025-05-06 13:05:14'),(31,4,6,121,0,0,0,0,0,0,0,0,0,0,'2025-05-06 13:05:14','2025-05-06 13:05:14'),(32,5,6,121,0,0,0,0,0,0,0,0,0,0,'2025-05-06 13:05:14','2025-05-06 13:05:14'),(33,46,6,121,0,0,0,0,0,0,0,0,0,0,'2025-05-06 13:05:14','2025-05-06 13:05:14'),(34,50,6,121,0,0,0,0,0,0,0,0,0,0,'2025-05-06 13:05:14','2025-05-06 13:05:14'),(35,6,8,66,24,2,3,3,3,6,5,3,3,5,'2025-05-06 13:20:57','2025-05-07 05:21:21'),(36,41,8,66,10,2,2,2,1,3,2,3,2,1,'2025-05-07 05:20:24','2025-05-07 05:21:21'),(37,42,8,66,2,0,0,4,1,2,0,2,0,0,'2025-05-07 05:20:58','2025-05-07 05:21:21'),(38,51,8,66,32,2,2,6,3,10,8,3,2,2,'2025-05-07 05:21:03','2025-05-07 05:21:21'),(40,8,8,66,0,0,0,0,0,0,0,0,0,0,'2025-05-07 05:21:21','2025-05-07 05:21:21'),(41,9,8,66,0,0,0,0,0,0,0,0,0,0,'2025-05-07 05:21:21','2025-05-07 05:21:21'),(42,43,8,66,0,0,0,0,0,0,0,0,0,0,'2025-05-07 05:21:21','2025-05-07 05:21:21'),(43,44,8,66,0,0,0,0,0,0,0,0,0,0,'2025-05-07 05:21:21','2025-05-07 05:21:21'),(44,45,8,66,0,0,0,0,0,0,0,0,0,0,'2025-05-07 05:21:21','2025-05-07 05:21:21'),(45,11,10,2,10,0,0,2,2,2,2,0,0,0,'2025-05-07 05:42:41','2025-05-07 05:46:48'),(46,12,10,2,3,1,1,0,0,2,1,0,0,1,'2025-05-07 05:42:45','2025-05-07 05:46:48'),(47,36,10,2,0,1,1,0,0,0,0,0,0,1,'2025-05-07 05:42:49','2025-05-07 05:46:49'),(48,37,10,2,11,0,0,3,2,3,2,2,1,0,'2025-05-07 05:42:51','2025-05-07 05:46:49'),(49,38,10,2,1,0,0,0,0,0,0,1,1,0,'2025-05-07 05:42:57','2025-05-07 05:46:49'),(50,13,10,2,6,0,0,1,1,1,1,1,1,0,'2025-05-07 05:46:44','2025-05-07 05:46:48'),(51,14,10,2,0,0,0,0,0,0,0,0,0,0,'2025-05-07 05:46:48','2025-05-07 05:46:48'),(52,15,10,2,0,0,0,0,0,0,0,0,0,0,'2025-05-07 05:46:48','2025-05-07 05:46:48'),(53,39,10,2,0,0,0,0,0,0,0,0,0,0,'2025-05-07 05:46:49','2025-05-07 05:46:49'),(54,40,10,2,0,0,0,0,0,0,0,0,0,0,'2025-05-07 05:46:49','2025-05-07 05:46:49'),(55,16,12,0,6,0,0,1,1,1,1,1,1,0,'2025-05-07 06:02:55','2025-05-07 06:03:21'),(56,18,12,0,6,1,1,2,1,1,1,3,1,1,'2025-05-07 06:03:00','2025-05-07 06:03:21'),(57,33,12,0,3,1,1,2,1,1,0,2,1,1,'2025-05-07 06:03:05','2025-05-07 06:03:21'),(58,35,12,0,2,0,0,2,1,2,0,1,0,0,'2025-05-07 06:03:09','2025-05-07 06:03:21'),(59,34,12,0,11,2,2,2,2,3,2,1,1,1,'2025-05-07 06:03:14','2025-05-07 06:03:21'),(60,19,12,0,6,1,0,0,0,3,2,1,0,0,'2025-05-07 06:03:19','2025-05-07 06:03:21'),(61,17,12,0,0,0,0,0,0,0,0,0,0,0,'2025-05-07 06:03:21','2025-05-07 06:03:21'),(62,20,12,0,0,0,0,0,0,0,0,0,0,0,'2025-05-07 06:03:21','2025-05-07 06:03:21'),(63,31,12,0,0,0,0,0,0,0,0,0,0,0,'2025-05-07 06:03:21','2025-05-07 06:03:21'),(64,32,12,0,0,0,0,0,0,0,0,0,0,0,'2025-05-07 06:03:21','2025-05-07 06:03:21'),(65,6,20,0,2,0,0,2,1,0,0,0,0,0,'2025-05-08 05:26:01','2025-05-08 05:26:12'),(66,9,20,0,2,1,2,1,1,0,0,1,0,1,'2025-05-08 05:26:07','2025-05-08 05:26:12'),(67,32,20,0,0,1,2,0,0,0,0,2,0,0,'2025-05-08 05:26:10','2025-05-08 05:26:12'),(69,8,20,0,0,0,0,0,0,0,0,0,0,0,'2025-05-08 05:26:12','2025-05-08 05:26:12'),(70,10,20,0,0,0,0,0,0,0,0,0,0,0,'2025-05-08 05:26:12','2025-05-08 05:26:12'),(71,31,20,0,0,0,0,0,0,0,0,0,0,0,'2025-05-08 05:26:12','2025-05-08 05:26:12'),(72,33,20,0,0,0,0,0,0,0,0,0,0,0,'2025-05-08 05:26:12','2025-05-08 05:26:12'),(73,34,20,0,0,0,0,0,0,0,0,0,0,0,'2025-05-08 05:26:12','2025-05-08 05:26:12'),(74,35,20,0,0,0,0,0,0,0,0,0,0,0,'2025-05-08 05:26:12','2025-05-08 05:26:12'),(75,8,32,3,5,2,0,1,1,2,1,0,0,0,'2025-05-08 05:27:38','2025-05-08 05:29:19'),(76,9,32,3,0,1,1,0,0,0,0,0,0,0,'2025-05-08 05:27:46','2025-05-08 05:29:19'),(77,22,32,3,2,0,0,2,1,0,0,0,0,0,'2025-05-08 05:28:48','2025-05-08 05:29:19'),(78,6,32,2,0,0,0,0,0,0,0,0,0,0,'2025-05-08 05:29:19','2025-05-08 05:29:19'),(80,10,32,1,0,0,0,0,0,0,0,0,0,0,'2025-05-08 05:29:19','2025-05-08 05:29:19'),(81,51,32,3,0,0,0,0,0,0,0,0,0,0,'2025-05-08 05:29:19','2025-05-08 05:29:19'),(82,21,32,3,0,0,0,0,0,0,0,0,0,0,'2025-05-08 05:29:19','2025-05-08 05:29:19'),(83,23,32,3,0,0,0,0,0,0,0,0,0,0,'2025-05-08 05:29:19','2025-05-08 05:29:19'),(84,24,32,3,0,0,0,0,0,0,0,0,0,0,'2025-05-08 05:29:19','2025-05-08 05:29:19'),(85,25,32,3,0,0,0,0,0,0,0,0,0,0,'2025-05-08 05:29:19','2025-05-08 05:29:19'),(86,21,14,2,8,0,0,3,2,1,1,1,1,0,'2025-05-13 09:23:23','2025-05-13 09:26:16'),(87,26,14,2,9,0,0,1,1,2,2,1,1,0,'2025-05-13 09:24:02','2025-05-13 09:26:16'),(88,23,14,2,6,0,0,1,1,1,1,2,1,0,'2025-05-13 09:24:12','2025-05-13 09:26:16'),(89,27,14,2,6,0,0,3,1,3,1,3,1,0,'2025-05-13 09:24:18','2025-05-13 09:26:16'),(90,29,14,2,10,0,0,4,2,2,2,0,0,0,'2025-05-13 09:24:25','2025-05-13 09:26:16'),(91,24,14,2,3,1,0,2,1,0,0,2,1,0,'2025-05-13 09:24:29','2025-05-13 09:26:16'),(92,25,14,2,3,0,0,1,0,2,1,0,0,0,'2025-05-13 09:24:50','2025-05-13 09:26:16'),(93,30,14,2,11,1,0,1,1,3,2,3,3,0,'2025-05-13 09:24:54','2025-05-13 09:26:16'),(94,22,14,2,14,0,0,1,1,5,3,3,3,0,'2025-05-13 09:25:59','2025-05-13 09:26:16'),(95,28,14,2,0,0,0,0,0,0,0,0,0,0,'2025-05-13 09:26:16','2025-05-13 09:26:16'),(96,6,44,1,2,0,0,2,1,0,0,0,0,0,'2025-05-13 09:33:45','2025-05-13 09:35:15'),(97,11,44,1,3,0,0,3,1,0,0,1,1,0,'2025-05-13 09:33:48','2025-05-13 09:35:15'),(98,51,44,1,10,1,1,1,1,5,2,9,2,1,'2025-05-13 09:33:58','2025-05-13 09:35:15'),(99,12,44,1,10,0,0,1,1,2,2,3,2,0,'2025-05-13 09:34:12','2025-05-13 09:35:15'),(100,9,44,1,13,0,0,3,3,3,2,1,1,0,'2025-05-13 09:34:17','2025-05-13 09:35:15'),(101,13,44,1,8,0,0,2,2,2,1,1,1,0,'2025-05-13 09:34:20','2025-05-13 09:35:15'),(102,8,44,1,6,0,0,0,0,2,2,0,0,0,'2025-05-13 09:34:30','2025-05-13 09:35:15'),(104,10,44,0,0,0,0,0,0,0,0,0,0,0,'2025-05-13 09:35:15','2025-05-13 09:35:15'),(105,14,44,1,0,0,0,0,0,0,0,0,0,0,'2025-05-13 09:35:15','2025-05-13 09:35:15'),(106,15,44,1,0,0,0,0,0,0,0,0,0,0,'2025-05-13 09:35:15','2025-05-13 09:35:15'),(107,1,26,0,17,1,1,6,5,2,2,1,1,2,'2025-05-13 11:59:01','2025-05-13 12:15:06'),(108,37,26,0,12,1,1,3,2,3,2,3,2,0,'2025-05-13 11:59:08','2025-05-13 11:59:17'),(109,3,26,0,8,0,0,2,2,1,1,2,1,0,'2025-05-13 11:59:13','2025-05-13 11:59:19'),(110,4,26,0,6,0,0,1,1,1,1,1,1,0,'2025-05-13 11:59:21','2025-05-13 12:00:31'),(111,38,26,0,21,6,4,7,3,10,4,5,3,4,'2025-05-13 11:59:26','2025-05-13 12:07:10'),(112,2,26,0,7,0,0,3,2,1,1,1,0,0,'2025-05-13 12:06:01','2025-05-13 12:06:02'),(113,36,26,0,12,1,1,3,2,3,2,2,2,0,'2025-05-13 12:13:02','2025-05-13 12:15:15'),(114,1,46,0,17,0,0,3,3,2,2,0,0,0,'2025-05-13 12:18:47','2025-05-13 12:28:47'),(115,26,46,0,24,0,0,1,1,2,2,1,1,0,'2025-05-13 12:24:40','2025-05-13 12:25:09'),(116,30,46,0,3,0,0,1,1,0,0,0,0,0,'2025-05-13 12:27:50','2025-05-13 12:28:03'),(117,46,54,1,3,0,0,2,2,2,2,1,1,0,'2025-05-14 04:55:50','2025-05-14 05:10:53'),(118,6,54,0,5,0,0,0,0,1,1,0,0,0,'2025-05-14 04:55:52','2025-05-14 05:05:28'),(119,49,54,1,1,0,0,0,0,0,0,0,0,2,'2025-05-14 05:01:22','2025-05-14 05:10:53'),(121,47,54,1,12,1,2,6,4,3,1,1,0,2,'2025-05-14 05:04:51','2025-05-14 05:10:53'),(122,9,54,1,6,0,0,1,1,1,1,1,1,0,'2025-05-14 05:10:12','2025-05-14 05:10:53'),(123,51,54,1,6,3,1,1,1,1,1,1,1,1,'2025-05-14 05:10:20','2025-05-14 05:10:53'),(124,10,54,1,35,2,1,2,1,14,10,7,3,1,'2025-05-14 05:10:28','2025-05-14 05:10:53'),(125,48,54,1,6,1,2,3,1,2,1,3,1,0,'2025-05-14 05:10:36','2025-05-14 05:10:53'),(126,50,54,1,12,0,2,2,2,3,2,2,2,1,'2025-05-14 05:10:43','2025-05-14 05:10:53'),(127,8,54,1,0,0,0,0,0,0,0,0,0,0,'2025-05-14 05:10:53','2025-05-14 05:10:53'),(138,59,188,2,10,5,0,0,0,6,4,0,0,0,'2025-05-14 09:32:12','2025-05-14 09:34:11'),(139,94,188,2,10,3,2,1,1,1,1,1,1,0,'2025-05-14 09:32:17','2025-05-14 09:34:11'),(140,60,188,2,19,1,1,4,2,6,4,3,2,0,'2025-05-14 09:32:22','2025-05-14 09:34:11'),(141,61,188,2,4,0,0,2,2,0,0,0,0,0,'2025-05-14 09:32:30','2025-05-14 09:34:11'),(142,95,188,2,16,1,1,3,2,4,4,1,0,1,'2025-05-14 09:32:33','2025-05-14 09:34:11'),(143,99,188,1,1,0,0,2,0,1,0,1,1,0,'2025-05-14 09:32:37','2025-05-14 09:34:11'),(144,96,188,1,9,0,0,5,3,4,1,1,0,1,'2025-05-14 09:32:51','2025-05-14 09:34:11'),(145,98,188,2,6,1,0,1,1,1,1,1,1,1,'2025-05-14 09:34:02','2025-05-14 09:34:11'),(146,62,188,2,0,0,0,0,0,0,0,0,0,0,'2025-05-14 09:34:11','2025-05-14 09:34:11'),(147,65,188,2,0,0,0,0,0,0,0,0,0,0,'2025-05-14 09:34:11','2025-05-14 09:34:11'),(148,100,188,2,0,0,0,0,0,0,0,0,0,0,'2025-05-14 09:34:11','2025-05-14 09:34:11'),(149,1,86,1,6,0,0,2,1,1,1,2,1,0,'2025-05-15 08:54:10','2025-05-15 08:55:11'),(150,6,86,1,12,2,1,2,1,6,2,8,4,1,'2025-05-15 08:54:14','2025-05-15 08:55:11'),(151,9,86,1,12,1,1,2,1,3,3,2,1,1,'2025-05-15 08:54:22','2025-05-15 08:55:12'),(152,3,86,1,5,0,0,2,1,1,1,0,0,0,'2025-05-15 08:54:26','2025-05-15 08:55:11'),(153,2,86,1,15,2,1,4,3,3,3,2,0,1,'2025-05-15 08:54:28','2025-05-15 08:55:11'),(154,8,86,1,7,1,2,2,2,2,1,1,0,1,'2025-05-15 08:54:34','2025-05-15 08:55:12'),(155,5,86,1,13,1,1,0,0,6,4,1,1,1,'2025-05-15 08:54:40','2025-05-15 08:55:11'),(156,51,86,1,16,1,1,2,2,5,4,1,0,1,'2025-05-15 08:54:46','2025-05-15 08:55:12'),(158,4,86,1,0,0,0,0,0,0,0,0,0,0,'2025-05-15 08:55:11','2025-05-15 08:55:11'),(159,10,86,1,0,0,0,0,0,0,0,0,0,0,'2025-05-15 08:55:12','2025-05-15 08:55:12'),(160,11,242,2,13,8,3,5,4,2,2,1,1,0,'2025-05-15 09:54:39','2025-05-19 11:24:46'),(162,8,242,2,9,0,0,0,0,3,3,0,0,0,'2025-05-15 10:41:21','2025-05-19 11:24:46'),(163,51,242,2,23,8,7,7,6,6,5,1,1,0,'2025-05-15 11:00:44','2025-05-19 11:24:46'),(164,12,242,2,12,1,1,3,2,4,4,1,1,1,'2025-05-15 11:00:56','2025-05-19 11:24:46'),(165,14,242,2,10,0,0,2,2,2,2,0,0,0,'2025-05-15 11:02:26','2025-05-19 11:24:46'),(180,6,242,2,5,0,0,1,1,1,1,0,0,0,'2025-05-19 11:22:47','2025-05-19 11:24:46'),(181,9,242,2,4,0,0,1,0,2,1,1,1,0,'2025-05-19 11:23:03','2025-05-19 11:24:46'),(182,13,242,2,7,0,0,3,2,2,1,0,0,0,'2025-05-19 11:23:28','2025-05-19 11:24:46'),(183,15,242,2,0,1,1,0,0,0,0,0,0,1,'2025-05-19 11:23:50','2025-05-19 11:24:46'),(184,10,242,1,6,0,0,1,1,1,1,1,1,0,'2025-05-19 11:24:05','2025-05-19 11:24:46');
/*!40000 ALTER TABLE `estadisticas_partido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jornadas`
--

DROP TABLE IF EXISTS `jornadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jornadas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `idLiga` bigint unsigned NOT NULL,
  `nombre` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechaInicio` datetime DEFAULT NULL,
  `fechaFin` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jornadas_idliga_foreign` (`idLiga`),
  CONSTRAINT `jornadas_idliga_foreign` FOREIGN KEY (`idLiga`) REFERENCES `liga` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jornadas`
--

LOCK TABLES `jornadas` WRITE;
/*!40000 ALTER TABLE `jornadas` DISABLE KEYS */;
INSERT INTO `jornadas` VALUES (11,2,'Jornada 1',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(12,2,'Jornada 2',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(13,2,'Jornada 3',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(14,2,'Jornada 4',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(15,2,'Jornada 5',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(16,2,'Jornada 6',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(17,2,'Jornada 7',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(18,2,'Jornada 8',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(19,2,'Jornada 9',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(20,2,'Jornada 10',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(21,2,'Jornada 11',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(22,2,'Jornada 12',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(23,2,'Jornada 13',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(24,2,'Jornada 14',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(25,2,'Jornada 15',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(26,2,'Jornada 16',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(27,2,'Jornada 17',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(28,2,'Jornada 18',NULL,NULL,'2025-05-06 12:57:22','2025-05-06 12:57:22'),(52,4,'Jornada 1',NULL,NULL,'2025-05-14 09:31:23','2025-05-14 09:31:23'),(53,4,'Jornada 2',NULL,NULL,'2025-05-14 09:31:23','2025-05-14 09:31:23'),(54,4,'Jornada 3',NULL,NULL,'2025-05-14 09:31:23','2025-05-14 09:31:23'),(55,4,'Jornada 4',NULL,NULL,'2025-05-14 09:31:23','2025-05-14 09:31:23'),(56,4,'Jornada 5',NULL,NULL,'2025-05-14 09:31:23','2025-05-14 09:31:23'),(57,4,'Jornada 6',NULL,NULL,'2025-05-14 09:31:23','2025-05-14 09:31:23'),(58,4,'Jornada 7',NULL,NULL,'2025-05-14 09:31:23','2025-05-14 09:31:23'),(59,4,'Jornada 8',NULL,NULL,'2025-05-14 09:31:23','2025-05-14 09:31:23'),(60,4,'Jornada 9',NULL,NULL,'2025-05-14 09:31:23','2025-05-14 09:31:23'),(61,4,'Jornada 10',NULL,NULL,'2025-05-14 09:31:23','2025-05-14 09:31:23'),(62,4,'Jornada 11',NULL,NULL,'2025-05-14 09:31:23','2025-05-14 09:31:23'),(63,4,'Jornada 12',NULL,NULL,'2025-05-14 09:31:23','2025-05-14 09:31:23'),(64,4,'Jornada 13',NULL,NULL,'2025-05-14 09:31:23','2025-05-14 09:31:23'),(65,4,'Jornada 14',NULL,NULL,'2025-05-14 09:31:23','2025-05-14 09:31:23'),(68,6,'Jornada 1',NULL,NULL,'2025-05-29 16:37:35','2025-05-29 16:37:35'),(69,6,'Jornada 2',NULL,NULL,'2025-05-29 16:37:35','2025-05-29 16:37:35');
/*!40000 ALTER TABLE `jornadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jugadores`
--

DROP TABLE IF EXISTS `jugadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jugadores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dorsal` int NOT NULL,
  `idEquipo` bigint unsigned NOT NULL,
  `pJugados` int NOT NULL DEFAULT '0',
  `mins` int NOT NULL DEFAULT '0',
  `minsPP` int NOT NULL DEFAULT '0',
  `pts` int NOT NULL DEFAULT '0',
  `ptsPP` int NOT NULL DEFAULT '0',
  `rebotes` int NOT NULL DEFAULT '0',
  `asistencias` int NOT NULL DEFAULT '0',
  `intentos2P` int NOT NULL DEFAULT '0',
  `aciertos2P` int NOT NULL DEFAULT '0',
  `intentos3P` int NOT NULL DEFAULT '0',
  `aciertos3P` int NOT NULL DEFAULT '0',
  `intentosTL` int NOT NULL DEFAULT '0',
  `aciertosTL` int NOT NULL DEFAULT '0',
  `robos` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jugadores_idequipo_foreign` (`idEquipo`),
  CONSTRAINT `jugadores_idequipo_foreign` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jugadores`
--

LOCK TABLES `jugadores` WRITE;
/*!40000 ALTER TABLE `jugadores` DISABLE KEYS */;
INSERT INTO `jugadores` VALUES (1,'Sergio Llull','jugadores/hmPARhyQlVMs0deCCHycPeagUTJqGmcYlAetuyEV.jpg',23,1,1,122,122,46,46,2,2,13,10,7,6,5,3,3,'2025-05-06 14:21:08','2025-05-15 08:55:12'),(2,'Walter Tavares','jugadores/yb0NVecdwkTEqg5LyfC6pMi5g9N84HoTy1PoaOia.jpg',22,1,1,122,122,28,28,3,3,8,6,5,5,4,1,1,'2025-05-06 14:21:08','2025-05-15 08:55:12'),(3,'Dzanan Musa','jugadores/Fjx0bkffthfgDLksuwGPbK4p5J3A2qq7JI3hdIqm.jpg',33,1,1,122,122,18,18,1,1,5,4,3,3,2,1,0,'2025-05-06 14:21:08','2025-05-15 08:55:12'),(4,'Mario Hezonja','jugadores/TNuviB7C9odC8YB7nBH1FsVePg85Nq5A1LbRh4RP.jpg',11,1,1,122,122,6,6,0,0,1,1,1,1,1,1,0,'2025-05-06 14:21:08','2025-05-15 08:55:12'),(5,'Facundo Campazzo','jugadores/z8jfTVBYuS2EoZJ15sbTegxNV1O1pzpPpSVUgxdF.jpg',7,1,1,122,122,13,13,1,1,0,0,6,4,1,1,1,'2025-05-06 14:21:08','2025-05-15 08:55:12'),(6,'Nicolás Laprovittola','jugadores/YKjGzHThsOBpGmYZqS5jFmSZWScRBU2QGfKtsPsU.jpg',20,2,7,72,10,50,7,4,4,10,7,14,9,11,7,6,'2025-05-06 14:21:08','2025-05-19 11:24:46'),(8,'Álex Abrines','jugadores/wl1A68mpqXJesrZYxu2BdDpo5vjSIMe6iTVRimCy.jpg',21,2,7,74,11,27,4,3,2,3,3,9,7,1,0,1,'2025-05-06 14:21:08','2025-05-19 11:24:46'),(9,'Jabari Parker','jugadores/iISwHwnN47CCztpNvAAonYprZIpLT2wrBjzmiaAm.jpg',22,2,7,74,11,37,5,3,4,8,6,9,7,6,4,2,'2025-05-06 14:21:08','2025-05-19 11:24:46'),(10,'Kevin Punter','jugadores/QvCRGvVcarsyBfEtEINzuOiMjA10iz1bMUVRUy4Z.jpg',0,2,7,4,1,41,6,2,1,3,2,15,11,8,4,1,'2025-05-06 14:21:08','2025-05-19 11:24:46'),(11,'Alberto Díaz',NULL,9,3,3,5,2,26,9,8,3,10,7,4,4,2,2,0,'2025-05-06 14:21:08','2025-05-19 11:24:46'),(12,'Dario Brizuela',NULL,8,3,3,5,2,25,8,2,2,4,3,8,7,4,3,2,'2025-05-06 14:21:08','2025-05-19 11:24:46'),(13,'Tyson Carter',NULL,1,3,3,5,2,21,7,0,0,6,5,5,3,2,2,0,'2025-05-06 14:21:08','2025-05-19 11:24:46'),(14,'Melvin Ejim',NULL,3,3,3,5,2,10,3,0,0,2,2,2,2,0,0,0,'2025-05-06 14:21:08','2025-05-19 11:24:46'),(15,'David Kravish',NULL,45,3,3,5,2,0,0,1,1,0,0,0,0,0,0,1,'2025-05-06 14:21:08','2025-05-19 11:24:46'),(16,'Chris Jones',NULL,3,4,1,0,0,6,6,0,0,1,1,1,1,1,1,0,'2025-05-06 14:21:08','2025-05-07 06:03:22'),(17,'Bojan Dubljevic',NULL,14,4,1,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-06 14:21:08','2025-05-07 06:03:22'),(18,'Klemen Prepelic',NULL,7,4,1,0,0,6,6,1,1,2,1,1,1,3,1,1,'2025-05-06 14:21:08','2025-05-07 06:03:22'),(19,'Xavi López-Arostegui',NULL,6,4,1,0,0,6,6,1,0,0,0,3,2,1,0,0,'2025-05-06 14:21:08','2025-05-07 06:03:22'),(20,'Mike Tobey',NULL,10,4,1,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-06 14:21:08','2025-05-07 06:03:22'),(21,'Markus Howard',NULL,0,5,2,5,3,8,4,0,0,3,2,1,1,1,1,0,'2025-05-06 14:21:08','2025-05-13 09:26:16'),(22,'Rokas Giedraitis',NULL,31,5,2,5,3,16,8,0,0,3,2,5,3,3,3,0,'2025-05-06 14:21:08','2025-05-13 09:26:16'),(23,'Matt Costello',NULL,24,5,2,5,3,6,3,0,0,1,1,1,1,2,1,0,'2025-05-06 14:21:08','2025-05-13 09:26:16'),(24,'Daulton Hommes',NULL,34,5,2,5,3,3,2,1,0,2,1,0,0,2,1,0,'2025-05-06 14:21:08','2025-05-13 09:26:16'),(25,'Steven Enoch',NULL,23,5,2,5,3,3,2,0,0,1,0,2,1,0,0,0,'2025-05-06 14:21:08','2025-05-13 09:26:16'),(26,'Thad McFadden',NULL,12,6,1,2,2,9,9,0,0,1,1,2,2,1,1,0,'2025-05-06 14:21:08','2025-05-13 09:26:16'),(27,'Jordan Davis',NULL,1,6,1,2,2,6,6,0,0,3,1,3,1,3,1,0,'2025-05-06 14:21:08','2025-05-13 09:26:16'),(28,'Nemanja Radovic',NULL,11,6,1,2,2,0,0,0,0,0,0,0,0,0,0,0,'2025-05-06 14:21:08','2025-05-13 09:26:16'),(29,'Augusto Lima',NULL,5,6,1,2,2,10,10,0,0,4,2,2,2,0,0,0,'2025-05-06 14:21:08','2025-05-13 09:26:16'),(30,'Sadiel Rojas',NULL,27,6,1,2,2,11,11,1,0,1,1,3,2,3,3,0,'2025-05-06 14:21:08','2025-05-13 09:26:16'),(31,'Marcelinho Huertas',NULL,9,7,2,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-06 14:21:08','2025-05-08 05:26:12'),(32,'Giorgi Shermadini',NULL,19,7,2,0,0,0,0,1,2,0,0,0,0,2,0,0,'2025-05-06 14:21:08','2025-05-08 05:26:12'),(33,'Sasu Salin',NULL,3,7,2,0,0,3,2,1,1,2,1,1,0,2,1,1,'2025-05-06 14:21:08','2025-05-08 05:26:12'),(34,'Aaron Doornekamp',NULL,42,7,2,0,0,11,6,2,2,2,2,3,2,1,1,1,'2025-05-06 14:21:08','2025-05-08 05:26:12'),(35,'Bruno Fitipaldo',NULL,6,7,2,0,0,2,1,0,0,2,1,2,0,1,0,0,'2025-05-06 14:21:08','2025-05-08 05:26:12'),(36,'Ante Tomic',NULL,44,8,1,2,2,0,0,1,1,0,0,0,0,0,0,1,'2025-05-06 14:21:08','2025-05-07 05:46:49'),(37,'Pau Ribas',NULL,5,8,1,2,2,11,11,0,0,3,2,3,2,2,1,0,'2025-05-06 14:21:08','2025-05-07 05:46:49'),(38,'Joel Parra',NULL,11,8,1,2,2,1,1,0,0,0,0,0,0,1,1,0,'2025-05-06 14:21:08','2025-05-07 05:46:49'),(39,'Ferran Bassas',NULL,20,8,1,2,2,0,0,0,0,0,0,0,0,0,0,0,'2025-05-06 14:21:08','2025-05-07 05:46:49'),(40,'Vladimir Brodziansky',NULL,10,8,1,2,2,0,0,0,0,0,0,0,0,0,0,0,'2025-05-06 14:21:08','2025-05-07 05:46:49'),(41,'Andrew Albicy',NULL,6,9,1,66,66,10,10,2,2,2,1,3,2,3,2,1,'2025-05-06 14:21:08','2025-05-07 05:21:21'),(42,'John Shurna',NULL,24,9,1,66,66,2,2,0,0,4,1,2,0,2,0,0,'2025-05-06 14:21:08','2025-05-07 05:21:21'),(43,'Nico Brussino',NULL,9,9,1,66,66,0,0,0,0,0,0,0,0,0,0,0,'2025-05-06 14:21:08','2025-05-07 05:21:21'),(44,'Miquel Salvó',NULL,22,9,1,66,66,0,0,0,0,0,0,0,0,0,0,0,'2025-05-06 14:21:08','2025-05-07 05:21:21'),(45,'Olek Balcerowski',NULL,13,9,1,66,66,0,0,0,0,0,0,0,0,0,0,0,'2025-05-06 14:21:08','2025-05-07 05:21:21'),(46,'Dani Pérez',NULL,55,10,1,122,122,3,3,0,0,2,2,2,2,1,1,0,'2025-05-06 14:21:08','2025-05-14 05:10:53'),(47,'Guillem Jou',NULL,23,10,1,122,122,34,34,3,5,8,6,8,6,5,3,3,'2025-05-06 14:21:08','2025-05-14 05:10:53'),(48,'Chima Moneke',NULL,4,10,1,122,122,11,11,1,2,4,2,3,2,3,1,0,'2025-05-06 14:21:08','2025-05-14 05:10:53'),(49,'Martín Hermannsson',NULL,7,10,1,122,122,4,4,0,0,0,0,1,1,0,0,2,'2025-05-06 14:21:08','2025-05-14 05:10:53'),(50,'Yankuba Sima',NULL,14,10,1,122,122,12,12,0,2,2,2,3,2,2,2,1,'2025-05-06 14:21:08','2025-05-14 05:10:53'),(51,'Willy Hernangomez','jugadores/GyC52u5ZMBWmXLvrRx6eahVHCliY86LehZZubJ2u.jpg',41,2,7,74,11,87,12,15,12,17,13,27,20,15,6,5,'2025-05-06 12:45:53','2025-05-19 11:24:46'),(52,'LeBron James',NULL,23,11,1,1,1,36,36,8,3,8,4,12,9,4,1,2,'2025-05-14 10:59:31','2025-05-14 09:00:27'),(53,'Anthony Davis',NULL,3,11,1,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 09:00:27'),(54,'D\'Angelo Russell',NULL,1,11,1,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 09:00:27'),(55,'Austin Reaves',NULL,15,11,1,1,1,25,25,0,4,8,7,3,3,4,2,0,'2025-05-14 10:59:31','2025-05-14 09:00:27'),(56,'Jarred Vanderbilt',NULL,2,11,1,1,1,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 09:00:27'),(57,'Rui Hachimura',NULL,28,11,1,1,1,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 09:00:27'),(58,'Gabe Vincent',NULL,7,11,1,1,1,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 09:00:27'),(59,'Stephen Curry',NULL,30,12,1,2,2,10,10,5,0,0,0,6,4,0,0,0,'2025-05-14 10:59:31','2025-05-14 09:34:11'),(60,'Klay Thompson',NULL,11,12,1,2,2,19,19,1,1,4,2,6,4,3,2,0,'2025-05-14 10:59:31','2025-05-14 09:34:11'),(61,'Draymond Green',NULL,23,12,1,2,2,4,4,0,0,2,2,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 09:34:11'),(62,'Andrew Wiggins',NULL,22,12,1,2,2,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 09:34:12'),(63,'Kevon Looney',NULL,5,12,1,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 09:34:12'),(64,'Jonathan Kuminga',NULL,0,12,1,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 09:34:12'),(65,'Gary Payton II',NULL,8,12,1,2,2,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 09:34:12'),(66,'Jayson Tatum',NULL,0,13,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(67,'Jaylen Brown',NULL,7,13,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(68,'Kristaps Porzingis',NULL,8,13,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(69,'Derrick White',NULL,9,13,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(70,'Al Horford',NULL,42,13,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(71,'Jrue Holiday',NULL,4,13,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(72,'Payton Pritchard',NULL,11,13,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(73,'Zach LaVine',NULL,8,14,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(74,'DeMar DeRozan',NULL,11,14,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(75,'Nikola Vucevic',NULL,9,14,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(76,'Coby White',NULL,0,14,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(77,'Patrick Williams',NULL,44,14,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(78,'Andre Drummond',NULL,3,14,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(79,'Ayo Dosunmu',NULL,12,14,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(80,'Jimmy Butler',NULL,22,15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(81,'Bam Adebayo',NULL,13,15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(82,'Tyler Herro',NULL,14,15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(83,'Duncan Robinson',NULL,55,15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(84,'Kyle Lowry',NULL,7,15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(85,'Caleb Martin',NULL,16,15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(86,'Haywood Highsmith',NULL,24,15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(87,'Mikal Bridges',NULL,1,16,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(88,'Cam Thomas',NULL,24,16,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(89,'Nic Claxton',NULL,33,16,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(90,'Spencer Dinwiddie',NULL,26,16,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(91,'Dorian Finney-Smith',NULL,28,16,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(92,'Dennis Smith Jr.',NULL,4,16,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(93,'Day\'Ron Sharpe',NULL,20,16,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(94,'Luka Doncic',NULL,77,17,1,2,2,10,10,3,2,1,1,1,1,1,1,0,'2025-05-14 10:59:31','2025-05-14 09:34:12'),(95,'Kyrie Irving',NULL,11,17,1,2,2,16,16,1,1,3,2,4,4,1,0,1,'2025-05-14 10:59:31','2025-05-14 09:34:12'),(96,'Tim Hardaway Jr.',NULL,10,17,1,1,1,9,9,0,0,5,3,4,1,1,0,1,'2025-05-14 10:59:31','2025-05-14 09:34:12'),(97,'Dereck Lively II',NULL,2,17,1,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 09:34:12'),(98,'Josh Green',NULL,8,17,1,2,2,6,6,1,0,1,1,1,1,1,1,1,'2025-05-14 10:59:31','2025-05-14 09:34:12'),(99,'Maxi Kleber',NULL,42,17,1,1,1,1,1,0,0,2,0,1,0,1,1,0,'2025-05-14 10:59:31','2025-05-14 09:34:12'),(100,'Dwight Powell',NULL,7,17,1,2,2,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 09:34:12'),(101,'Kevin Durant',NULL,35,18,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(102,'Devin Booker',NULL,1,18,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(103,'Bradley Beal',NULL,3,18,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(104,'Jusuf Nurkic',NULL,20,18,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(105,'Grayson Allen',NULL,8,18,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(106,'Eric Gordon',NULL,10,18,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(107,'Bol Bol',NULL,11,18,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-14 10:59:31'),(108,'Joel Embiid',NULL,21,19,1,3,3,30,30,20,10,1,1,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-19 06:40:22'),(109,'Tyrese Maxey',NULL,0,19,1,3,3,3,3,0,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-19 06:40:22'),(110,'Tobias Harris',NULL,12,19,1,0,0,10,10,2,2,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-19 06:40:22'),(111,'Nicolas Batum',NULL,40,19,1,2,2,3,3,0,0,0,0,1,1,0,0,0,'2025-05-14 10:59:31','2025-05-19 06:40:22'),(112,'Paul Reed',NULL,44,19,1,3,3,5,5,3,3,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-19 06:40:22'),(113,'De\'Anthony Melton',NULL,8,19,1,0,0,3,3,2,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-19 06:40:22'),(114,'Kelly Oubre Jr.',NULL,9,19,1,3,3,3,3,2,3,0,0,1,0,0,0,0,'2025-05-14 10:59:31','2025-05-19 06:40:22'),(115,'Giannis Antetokounmpo',NULL,34,20,2,3,2,9,5,4,1,1,1,2,2,1,1,1,'2025-05-14 10:59:31','2025-05-19 06:40:22'),(116,'Damian Lillard',NULL,0,20,2,3,2,2,1,23,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-19 06:40:22'),(117,'Khris Middleton',NULL,22,20,2,0,0,5,3,0,4,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-19 06:40:22'),(118,'Brook Lopez',NULL,11,20,2,3,2,2,1,3,6,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-19 06:40:22'),(119,'Bobby Portis',NULL,9,20,2,3,2,3,2,3,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-19 06:40:22'),(120,'Malik Beasley',NULL,5,20,2,0,0,22,11,20,0,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-19 06:40:22'),(121,'Jae Crowder',NULL,99,20,2,3,2,5,3,3,4,0,0,0,0,0,0,0,'2025-05-14 10:59:31','2025-05-19 06:40:22');
/*!40000 ALTER TABLE `jugadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liga`
--

DROP TABLE IF EXISTS `liga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `liga` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idTemporada` bigint unsigned DEFAULT NULL,
  `fechaInicio` datetime DEFAULT NULL,
  `fechaFin` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liga`
--

LOCK TABLES `liga` WRITE;
/*!40000 ALTER TABLE `liga` DISABLE KEYS */;
INSERT INTO `liga` VALUES (2,'LF ENDESA',1,NULL,NULL,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(4,'NBA',1,NULL,NULL,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(6,'Playoff',3,NULL,NULL,'2025-05-29 16:37:35','2025-05-29 16:37:35'),(8,'demo',2,NULL,NULL,'2025-05-29 17:01:19','2025-05-29 17:01:19');
/*!40000 ALTER TABLE `liga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2025_04_25_062325_create_liga_table',1),(2,'2025_04_25_062331_create_equipos_table',1),(3,'2025_04_25_062336_create_jugadores_table',1),(4,'2025_04_25_062340_create_jornadas_table',1),(5,'2025_04_25_062344_create_partidos_table',1),(6,'2025_04_25_062347_create_estadisticas_partido_table',1),(7,'2025_04_25_080817_create_cache_table',1),(8,'X0001_01_01_000000_create_users_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticias`
--

DROP TABLE IF EXISTS `noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `noticias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticias`
--

LOCK TABLES `noticias` WRITE;
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
INSERT INTO `noticias` VALUES (2,'Anuel Firma con la nba','brrrr El artisasta puerto riqueño jugara el all-star  games of stars','noticias/l4o2MQyZ0KnzSjF7g5JxtgOT7x6KqyARppiCi6FV.jpg','2025-05-15 06:15:23','2025-05-28 06:15:04'),(4,'3x3','El 3x3 de fiba llega a la federacion de baloncesto W el 6 de junio','noticias/yF1eJ9k43rofmYZVQAVWJqWYeVYQ9IFXRbYFwH94.jpg','2025-05-26 11:35:52','2025-05-26 11:35:52');
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partidos`
--

DROP TABLE IF EXISTS `partidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partidos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `idLocal` bigint unsigned NOT NULL,
  `idVisitante` bigint unsigned NOT NULL,
  `ptsLocal` int NOT NULL DEFAULT '0',
  `ptsVisitante` int NOT NULL DEFAULT '0',
  `fecha` datetime NOT NULL,
  `hora` time NOT NULL,
  `finalizado` tinyint(1) NOT NULL DEFAULT '0',
  `idJornada` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `partidos_idlocal_foreign` (`idLocal`),
  KEY `partidos_idvisitante_foreign` (`idVisitante`),
  KEY `partidos_idjornada_foreign` (`idJornada`),
  CONSTRAINT `partidos_idjornada_foreign` FOREIGN KEY (`idJornada`) REFERENCES `jornadas` (`id`),
  CONSTRAINT `partidos_idlocal_foreign` FOREIGN KEY (`idLocal`) REFERENCES `equipos` (`id`),
  CONSTRAINT `partidos_idvisitante_foreign` FOREIGN KEY (`idVisitante`) REFERENCES `equipos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partidos`
--

LOCK TABLES `partidos` WRITE;
/*!40000 ALTER TABLE `partidos` DISABLE KEYS */;
INSERT INTO `partidos` VALUES (6,1,10,17,30,'2025-05-06 14:57:22','18:00:00',1,11,'2025-05-06 10:57:22','2025-05-06 11:05:14'),(7,10,1,0,0,'2025-07-08 14:57:22','18:00:00',0,20,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(8,2,9,56,12,'2025-05-06 14:57:22','18:00:00',1,11,'2025-05-06 10:57:22','2025-05-07 03:21:21'),(9,9,2,0,0,'2025-07-08 14:57:22','18:00:00',0,20,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(10,3,8,19,12,'2025-05-06 14:57:22','18:00:00',1,11,'2025-05-06 10:57:22','2025-05-07 03:46:49'),(11,8,3,0,0,'2025-07-08 14:57:22','18:00:00',0,20,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(12,4,7,18,16,'2025-05-06 14:57:22','18:00:00',1,11,'2025-05-06 10:57:22','2025-05-07 04:03:21'),(13,7,4,0,0,'2025-07-08 14:57:22','18:00:00',0,20,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(14,5,6,34,36,'2025-05-06 14:57:22','18:00:00',1,11,'2025-05-06 10:57:22','2025-05-13 07:26:16'),(15,6,5,0,0,'2025-07-08 14:57:22','18:00:00',0,20,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(16,1,9,0,0,'2025-05-13 14:57:22','18:00:00',0,12,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(17,9,1,0,0,'2025-07-15 14:57:22','18:00:00',0,21,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(18,10,8,0,0,'2025-05-13 14:57:22','18:00:00',0,12,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(19,8,10,0,0,'2025-07-15 14:57:22','18:00:00',0,21,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(20,2,7,4,0,'2025-05-13 14:57:22','18:00:00',1,12,'2025-05-06 10:57:22','2025-05-08 03:26:12'),(21,7,2,0,0,'2025-07-15 14:57:22','18:00:00',0,21,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(22,3,6,0,0,'2025-05-13 14:57:22','18:00:00',0,12,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(23,6,3,0,0,'2025-07-15 14:57:22','18:00:00',0,21,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(24,4,5,0,0,'2025-05-13 14:57:22','18:00:00',0,12,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(25,5,4,0,0,'2025-07-15 14:57:22','18:00:00',0,21,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(26,1,8,0,0,'2025-05-20 14:57:22','18:00:00',0,13,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(27,8,1,0,0,'2025-07-22 14:57:22','18:00:00',0,22,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(28,9,7,0,0,'2025-05-20 14:57:22','18:00:00',0,13,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(29,7,9,0,0,'2025-07-22 14:57:22','18:00:00',0,22,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(30,10,6,0,0,'2025-05-20 14:57:22','18:00:00',0,13,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(31,6,10,0,0,'2025-07-22 14:57:22','18:00:00',0,22,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(32,2,5,5,2,'2025-05-20 14:57:22','18:00:00',1,13,'2025-05-06 10:57:22','2025-05-08 03:29:19'),(33,5,2,0,0,'2025-07-22 14:57:22','18:00:00',0,22,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(34,3,4,0,0,'2025-05-20 14:57:22','18:00:00',0,13,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(35,4,3,0,0,'2025-07-22 14:57:22','18:00:00',0,22,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(36,1,7,0,0,'2025-05-27 14:57:22','18:00:00',0,14,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(37,7,1,0,0,'2025-07-29 14:57:22','18:00:00',0,23,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(38,8,6,0,0,'2025-05-27 14:57:22','18:00:00',0,14,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(39,6,8,0,0,'2025-07-29 14:57:22','18:00:00',0,23,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(40,9,5,0,0,'2025-05-27 14:57:22','18:00:00',0,14,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(41,5,9,0,0,'2025-07-29 14:57:22','18:00:00',0,23,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(42,10,4,0,0,'2025-05-27 14:57:22','18:00:00',0,14,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(43,4,10,0,0,'2025-07-29 14:57:22','18:00:00',0,23,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(44,2,3,36,21,'2025-05-27 14:57:22','18:00:00',1,14,'2025-05-06 10:57:22','2025-05-13 07:35:15'),(45,3,2,0,0,'2025-07-29 14:57:22','18:00:00',0,23,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(46,1,6,0,0,'2025-06-03 14:57:22','18:00:00',0,15,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(47,6,1,0,0,'2025-08-05 14:57:22','18:00:00',0,24,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(48,7,5,0,0,'2025-06-03 14:57:22','18:00:00',0,15,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(49,5,7,0,0,'2025-08-05 14:57:22','18:00:00',0,24,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(50,8,4,0,0,'2025-06-03 14:57:22','18:00:00',0,15,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(51,4,8,0,0,'2025-08-05 14:57:22','18:00:00',0,24,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(52,9,3,0,0,'2025-06-03 14:57:22','18:00:00',0,15,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(53,3,9,0,0,'2025-08-05 14:57:22','18:00:00',0,24,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(54,10,2,34,57,'2025-06-03 14:57:22','18:00:00',1,15,'2025-05-06 10:57:22','2025-05-14 03:10:53'),(55,2,10,0,0,'2025-08-05 14:57:22','18:00:00',0,24,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(56,1,5,0,0,'2025-06-10 14:57:22','18:00:00',0,16,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(57,5,1,0,0,'2025-08-12 14:57:22','18:00:00',0,25,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(58,6,4,0,0,'2025-06-10 14:57:22','18:00:00',0,16,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(59,4,6,0,0,'2025-08-12 14:57:22','18:00:00',0,25,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(60,7,3,0,0,'2025-06-10 14:57:22','18:00:00',0,16,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(61,3,7,0,0,'2025-08-12 14:57:22','18:00:00',0,25,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(62,8,2,0,0,'2025-06-10 14:57:22','18:00:00',0,16,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(63,2,8,0,0,'2025-08-12 14:57:22','18:00:00',0,25,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(64,9,10,0,0,'2025-06-10 14:57:22','18:00:00',0,16,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(65,10,9,0,0,'2025-08-12 14:57:22','18:00:00',0,25,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(66,1,4,0,0,'2025-06-17 14:57:22','18:00:00',0,17,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(67,4,1,0,0,'2025-08-19 14:57:22','18:00:00',0,26,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(68,5,3,0,0,'2025-06-17 14:57:22','18:00:00',0,17,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(69,3,5,0,0,'2025-08-19 14:57:22','18:00:00',0,26,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(70,6,2,0,0,'2025-06-17 14:57:22','18:00:00',0,17,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(71,2,6,0,0,'2025-08-19 14:57:22','18:00:00',0,26,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(72,7,10,0,0,'2025-06-17 14:57:22','18:00:00',0,17,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(73,10,7,0,0,'2025-08-19 14:57:22','18:00:00',0,26,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(74,8,9,0,0,'2025-06-17 14:57:22','18:00:00',0,17,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(75,9,8,0,0,'2025-08-19 14:57:22','18:00:00',0,26,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(76,1,3,0,0,'2025-06-24 14:57:22','18:00:00',0,18,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(77,3,1,0,0,'2025-08-26 14:57:22','18:00:00',0,27,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(78,4,2,0,0,'2025-06-24 14:57:22','18:00:00',0,18,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(79,2,4,0,0,'2025-08-26 14:57:22','18:00:00',0,27,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(80,5,10,0,0,'2025-06-24 14:57:22','18:00:00',0,18,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(81,10,5,0,0,'2025-08-26 14:57:22','18:00:00',0,27,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(82,6,9,0,0,'2025-06-24 14:57:22','18:00:00',0,18,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(83,9,6,0,0,'2025-08-26 14:57:22','18:00:00',0,27,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(84,7,8,0,0,'2025-06-24 14:57:22','18:00:00',0,18,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(85,8,7,0,0,'2025-08-26 14:57:22','18:00:00',0,27,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(86,1,2,39,55,'2025-07-01 14:57:22','18:00:00',1,19,'2025-05-06 10:57:22','2025-05-15 06:55:12'),(87,2,1,0,0,'2025-09-02 14:57:22','18:00:00',0,28,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(88,3,10,0,0,'2025-07-01 14:57:22','18:00:00',0,19,'2025-05-06 10:57:22','2025-05-06 10:57:22'),(89,10,3,0,0,'2025-09-02 14:57:23','18:00:00',0,28,'2025-05-06 10:57:23','2025-05-06 10:57:23'),(90,4,9,0,0,'2025-07-01 14:57:23','18:00:00',0,19,'2025-05-06 10:57:23','2025-05-06 10:57:23'),(91,9,4,0,0,'2025-09-02 14:57:23','18:00:00',0,28,'2025-05-06 10:57:23','2025-05-06 10:57:23'),(92,5,8,0,0,'2025-07-01 14:57:23','18:00:00',0,19,'2025-05-06 10:57:23','2025-05-06 10:57:23'),(93,8,5,0,0,'2025-09-02 14:57:23','18:00:00',0,28,'2025-05-06 10:57:23','2025-05-06 10:57:23'),(94,6,7,0,0,'2025-07-01 14:57:23','18:00:00',0,19,'2025-05-06 10:57:23','2025-05-06 10:57:23'),(95,7,6,0,0,'2025-09-02 14:57:23','18:00:00',0,28,'2025-05-06 10:57:23','2025-05-06 10:57:23'),(186,11,18,0,0,'2025-05-14 11:31:23','18:00:00',0,52,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(187,18,11,0,0,'2025-07-02 11:31:23','18:00:00',0,59,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(188,12,17,33,42,'2025-05-14 11:31:23','18:00:00',1,52,'2025-05-14 07:31:23','2025-05-14 07:34:11'),(189,17,12,0,0,'2025-07-02 11:31:23','18:00:00',0,59,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(190,13,16,0,0,'2025-05-14 11:31:23','18:00:00',0,52,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(191,16,13,0,0,'2025-07-02 11:31:23','18:00:00',0,59,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(192,14,15,0,0,'2025-05-14 11:31:23','18:00:00',0,52,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(193,15,14,0,0,'2025-07-02 11:31:23','18:00:00',0,59,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(194,11,17,0,0,'2025-05-21 11:31:23','18:00:00',0,53,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(195,17,11,0,0,'2025-07-09 11:31:23','18:00:00',0,60,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(196,18,16,0,0,'2025-05-21 11:31:23','18:00:00',0,53,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(197,16,18,0,0,'2025-07-09 11:31:23','18:00:00',0,60,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(198,12,15,0,0,'2025-05-21 11:31:23','18:00:00',0,53,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(199,15,12,0,0,'2025-07-09 11:31:23','18:00:00',0,60,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(200,13,14,0,0,'2025-05-21 11:31:23','18:00:00',0,53,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(201,14,13,0,0,'2025-07-09 11:31:23','18:00:00',0,60,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(202,11,16,0,0,'2025-05-28 11:31:23','18:00:00',0,54,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(203,16,11,0,0,'2025-07-16 11:31:23','18:00:00',0,61,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(204,17,15,0,0,'2025-05-28 11:31:23','18:00:00',0,54,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(205,15,17,0,0,'2025-07-16 11:31:23','18:00:00',0,61,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(206,18,14,0,0,'2025-05-28 11:31:23','18:00:00',0,54,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(207,14,18,0,0,'2025-07-16 11:31:23','18:00:00',0,61,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(208,12,13,0,0,'2025-05-28 11:31:23','18:00:00',0,54,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(209,13,12,0,0,'2025-07-16 11:31:23','18:00:00',0,61,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(210,11,15,0,0,'2025-06-04 11:31:23','18:00:00',0,55,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(211,15,11,0,0,'2025-07-23 11:31:23','18:00:00',0,62,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(212,16,14,0,0,'2025-06-04 11:31:23','18:00:00',0,55,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(213,14,16,0,0,'2025-07-23 11:31:23','18:00:00',0,62,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(214,17,13,0,0,'2025-06-04 11:31:23','18:00:00',0,55,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(215,13,17,0,0,'2025-07-23 11:31:23','18:00:00',0,62,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(216,18,12,0,0,'2025-06-04 11:31:23','18:00:00',0,55,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(217,12,18,0,0,'2025-07-23 11:31:23','18:00:00',0,62,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(218,11,14,0,0,'2025-06-11 11:31:23','18:00:00',0,56,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(219,14,11,0,0,'2025-07-30 11:31:23','18:00:00',0,63,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(220,15,13,0,0,'2025-06-11 11:31:23','18:00:00',0,56,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(221,13,15,0,0,'2025-07-30 11:31:23','18:00:00',0,63,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(222,16,12,0,0,'2025-06-11 11:31:23','18:00:00',0,56,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(223,12,16,0,0,'2025-07-30 11:31:23','18:00:00',0,63,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(224,17,18,0,0,'2025-06-11 11:31:23','18:00:00',0,56,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(225,18,17,0,0,'2025-07-30 11:31:23','18:00:00',0,63,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(226,11,13,0,0,'2025-06-18 11:31:23','18:00:00',0,57,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(227,13,11,0,0,'2025-08-06 11:31:23','18:00:00',0,64,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(228,14,12,0,0,'2025-06-18 11:31:23','18:00:00',0,57,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(229,12,14,0,0,'2025-08-06 11:31:23','18:00:00',0,64,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(230,15,18,0,0,'2025-06-18 11:31:23','18:00:00',0,57,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(231,18,15,0,0,'2025-08-06 11:31:23','18:00:00',0,64,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(232,16,17,0,0,'2025-06-18 11:31:23','18:00:00',0,57,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(233,17,16,0,0,'2025-08-06 11:31:23','18:00:00',0,64,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(234,11,12,0,0,'2025-06-25 11:31:23','18:00:00',0,58,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(235,12,11,0,0,'2025-08-13 11:31:23','18:00:00',0,65,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(236,13,18,0,0,'2025-06-25 11:31:23','18:00:00',0,58,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(237,18,13,0,0,'2025-08-13 11:31:23','18:00:00',0,65,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(238,14,17,0,0,'2025-06-25 11:31:23','18:00:00',0,58,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(239,17,14,0,0,'2025-08-13 11:31:23','18:00:00',0,65,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(240,15,16,0,0,'2025-06-25 11:31:23','18:00:00',0,58,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(241,16,15,0,0,'2025-08-13 11:31:23','18:00:00',0,65,'2025-05-14 07:31:23','2025-05-14 07:31:23'),(242,3,2,42,50,'2025-05-15 00:00:00','14:00:00',1,11,'2025-05-15 07:38:06','2025-05-19 11:24:46'),(245,19,20,0,0,'2025-05-29 18:37:35','18:00:00',0,68,'2025-05-29 16:37:35','2025-05-29 16:37:35'),(246,20,19,0,0,'2025-06-05 18:37:35','18:00:00',0,69,'2025-05-29 16:37:35','2025-05-29 16:37:35');
/*!40000 ALTER TABLE `partidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('26Ys1mR7TXJDM6kJooLLItcOug9Ek0XpuqjRJq5I',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiU3BKd0VSWk1lbkRRNzdVOXl1R3RlaGxMTlB0Q1lsTFBCRHl4R1VCUSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1748547338);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temporadas`
--

DROP TABLE IF EXISTS `temporadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `temporadas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temporadas`
--

LOCK TABLES `temporadas` WRITE;
/*!40000 ALTER TABLE `temporadas` DISABLE KEYS */;
INSERT INTO `temporadas` VALUES (1,'2025/2026','2025-05-19 06:03:54','2025-05-19 06:03:54'),(2,'2024/2025','2025-05-19 06:18:15','2025-05-19 06:18:15'),(3,'Playoff 2024/2025','2025-05-29 16:37:35','2025-05-29 16:37:35');
/*!40000 ALTER TABLE `temporadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `idEquipo` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_idequipo_foreign` (`idEquipo`),
  CONSTRAINT `users_idequipo_foreign` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'prueba','prueba@example.com',NULL,'$2y$12$5/kg1eWSikvHxosurGNI.OCw8GGselAXn4LyMyoPE8r2eUCXxP7Fy','x8UBhlMFzO9CB7yLGlSSDVK5cH0aTlzH0uIWPst6qhIDfEAqH1qwvl1afFF3','2025-05-06 10:17:46','2025-05-06 10:17:46',NULL,1,2),(2,'churumbel','churumbel@example.com',NULL,'$2y$12$cbAN89KbKZ73ALeuL2sr0OWTUQraO5paub7nvnTLpBeX0LIOQreHC',NULL,'2025-05-14 03:13:10','2025-05-15 06:48:11',NULL,0,21),(3,'anuel','anuel@example.com',NULL,'$2y$12$P3qV5b1SJT9.vw5xItnQ0u.kjCceT2td2xqTIW0fiVXS7oFoZvpXK',NULL,'2025-05-26 11:23:17','2025-05-26 11:23:17',NULL,0,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-29 21:37:10
