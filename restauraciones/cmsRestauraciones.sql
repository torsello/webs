CREATE DATABASE  IF NOT EXISTS `restauraciones` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `restauraciones`;
-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: localhost    Database: restauraciones
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `resimg`
--

DROP TABLE IF EXISTS `resimg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `resimg` (
  `idImg` int(11) NOT NULL AUTO_INCREMENT,
  `resImgName` varchar(45) DEFAULT NULL,
  `resImgUrl` varchar(45) NOT NULL,
  PRIMARY KEY (`idImg`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `resnosotros`
--

DROP TABLE IF EXISTS `resnosotros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `resnosotros` (
  `idNosotros` int(11) NOT NULL AUTO_INCREMENT,
  `resNosotrosTitulo` varchar(45) DEFAULT NULL,
  `resNosotrosDesc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idNosotros`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `restaller`
--

DROP TABLE IF EXISTS `restaller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `restaller` (
  `idTaller` int(11) NOT NULL AUTO_INCREMENT,
  `resTallerTitulo` varchar(45) DEFAULT NULL,
  `resTallerDesc` varchar(45) DEFAULT NULL,
  `resTallerTipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTaller`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `restalleres`
--

DROP TABLE IF EXISTS `restalleres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `restalleres` (
  `idTalleres` int(11) NOT NULL AUTO_INCREMENT,
  `resTalleresTitulo` varchar(45) DEFAULT NULL,
  `resTalleresDesc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTalleres`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `resuser`
--

DROP TABLE IF EXISTS `resuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `resuser` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `resUsername` varchar(45) NOT NULL,
  `resPassword` varchar(60) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `taller_img`
--

DROP TABLE IF EXISTS `taller_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `taller_img` (
  `idTaller` int(11) NOT NULL,
  `idImg` int(11) NOT NULL,
  PRIMARY KEY (`idTaller`,`idImg`),
  KEY `fk_resTaller_has_resImg_resImg1_idx` (`idImg`),
  KEY `fk_resTaller_has_resImg_resTaller_idx` (`idTaller`),
  CONSTRAINT `fk_resTaller_has_resImg_resImg1` FOREIGN KEY (`idImg`) REFERENCES `resimg` (`idImg`),
  CONSTRAINT `fk_resTaller_has_resImg_resTaller` FOREIGN KEY (`idTaller`) REFERENCES `restaller` (`idTaller`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-18 21:43:19
