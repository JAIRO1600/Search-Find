-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: s&fdatabase
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `apartment`
--

DROP TABLE IF EXISTS `apartment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(1000) NOT NULL,
  `info` varchar(500) NOT NULL,
  `description` varchar(800) NOT NULL,
  `price` int(11) NOT NULL,
  `location` varchar(300) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `idusers` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idusers_idx` (`idusers`),
  CONSTRAINT `idusers` FOREIGN KEY (`idusers`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartment`
--

LOCK TABLES `apartment` WRITE;
/*!40000 ALTER TABLE `apartment` DISABLE KEYS */;
INSERT INTO `apartment` VALUES (1,'piso_playa.jpg','Piso de alquiler en zona de playa','Precioso piso de alquiler en la zona de Santa Pola (Alicante), con dos habitaciones, un cuarto de baÃ±o y salÃ³n-comedor.',650,'Alicante','Lucia Perez Lopez','lucia@mail.com',656656656,1),(6,'foto_chalet.jpg','Chalet independiente','Chalet independiente con 1000m2 de parcela, dos habitaciones, 3 baÃ±os, piscina, y un salon comedor',1250,'Toledo','Joaquin Cruz Campo','Joaquin@mail.com',669669669,2),(7,'foto_chalet2.jpg','Chalet independiente','Chalet independiente con 800m2 de parcela, 2 habitaciones, 2 baÃ±os, cocina, y un salÃ³n enorme',1100,'Toledo','Joaquin Cruz Campo','Joaquin@mail.com',669669669,2),(8,'chalet_montana.jpg','Piso de alquiler en zona de montaÃ±a','Precioso piso en zona de montaÃ±a con 2 habitaciones, 1 cuarto de baÃ±o completo y salÃ³n-comedor',750,'Huesca','Francisco Garcia Garcia','paco@mail.com',662662662,3),(11,'piso_Gijon.jpg','Hermoso piso en la periferia de GijÃ³n','Alquilo un pequeÃ±o piso en la zona del llano (GijÃ³n), con dos habitaciones, 1 baÃ±o, salÃ³n y cocina reformada.',470,'GijÃ³n','Lucia Perez Lopez','lucia@mail.com',656656656,1),(12,'loft_barna.jpg','Maravilloso loft en el centro de Barcelona','Alquilamos un encantador loft en el centro de Barna, a escasos metros de la Sagrada Familia. 1 habitacion, 1 baÃ±o, cocina americana.',950,'Barcelona','Jose Luis Garcia Aparicio','pepe@mail.com',666666666,4),(13,'pisosmadrid.jpg','Piso de alquiler en Madrid','Lujoso piso en la zona de Arguelles. 2 habitaciones, 2 baÃ±os, terraza, cocina amueblada y salÃ³n.',1000,'Madrid','Jose Luis Garcia Aparicio','pepe@mail.com',666666666,4),(14,'Hurdes.jpg','Alquilo hermosa casa en las Hurdes','Se alquila hermosa casa en las Hurdes. ConstrucciÃ³n milenaria con gran terreno y buenos cimientos. 3 habitaciones, 1 baÃ±o y salÃ³n-comedor.',200,'Caceres','Francisco Garcia Garcia','paco@mail.com',662662662,3);
/*!40000 ALTER TABLE `apartment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-18 18:29:10
