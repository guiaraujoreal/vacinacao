CREATE DATABASE  IF NOT EXISTS `academia` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `academia`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: academia
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `racas`
--

DROP TABLE IF EXISTS `racas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `racas` (
  `idracas` int NOT NULL AUTO_INCREMENT,
  `id_categoria` int NOT NULL,
  `racas` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idracas`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `racas`
--

LOCK TABLES `racas` WRITE;
/*!40000 ALTER TABLE `racas` DISABLE KEYS */;
INSERT INTO `racas` VALUES (1,1,'Akita'),(2,1,'Beagle'),(3,1,'Buldogue'),(4,1,'Chihuahua'),(5,1,'Chow Chow'),(6,1,'Dálmata'),(7,1,'Doberman'),(8,1,'Dogue Alemão'),(9,1,'Fila Brasileiro'),(10,1,'Golden Retriever'),(11,1,'Husky Siberiano'),(12,1,'Jack Russell Terrier'),(13,1,'Labrador Retriever'),(14,1,'Lulu da Pomerânia'),(15,1,'Maltês'),(16,1,'Mastim Tibetano'),(17,1,'Pastor Alemão'),(18,1,'Pastor australiano'),(19,1,'Pequinês'),(20,1,'Pinscher'),(21,1,'Pit bull'),(22,1,'Poodle'),(23,1,'Pug'),(24,1,'Rottweiler'),(25,1,'Shiba'),(26,1,'Shih tzu'),(27,1,'Yorkshire'),(28,2,'SRD'),(29,2,'Siamês'),(30,2,'Maine Coon'),(31,2,'Angorá'),(32,2,'Persa'),(33,2,'Sphynx'),(34,2,'Ragdoll'),(35,2,'Ashera'),(36,2,'American Shorthair'),(37,2,'Exótico'),(38,3,'Galinha'),(39,3,'Papagaio'),(40,3,'Pato'),(41,3,'Canário'),(42,3,'Periquito'),(43,3,'Maritaca'),(44,3,'Demais Aves'),(45,4,'Piton'),(46,4,'Cascavel'),(47,4,'Demais Cobras'),(48,5,'Demais Vertebrados'),(49,5,'Demais Invertebrados');
/*!40000 ALTER TABLE `racas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-02 16:31:25
