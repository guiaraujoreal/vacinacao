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
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado` (
  `id` int NOT NULL,
  `nome` varchar(75) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `ibge` int DEFAULT NULL,
  `pais` int DEFAULT NULL,
  `ddd` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COMMENT='Unidades Federativas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Acre','AC',12,1,'68'),(2,'Alagoas','AL',27,1,'82'),(3,'Amazonas','AM',13,1,'97,92'),(4,'Amapá','AP',16,1,'96'),(5,'Bahia','BA',29,1,'77,75,73,74,71'),(6,'Ceará','CE',23,1,'88,85'),(7,'Distrito Federal','DF',53,1,'61'),(8,'Espírito Santo','ES',32,1,'28,27'),(9,'Goiás','GO',52,1,'62,64,61'),(10,'Maranhão','MA',21,1,'99,98'),(11,'Minas Gerais','MG',31,1,'34,37,31,33,35,38,32'),(12,'Mato Grosso do Sul','MS',50,1,'67'),(13,'Mato Grosso','MT',51,1,'65,66'),(14,'Pará','PA',15,1,'91,94,93'),(15,'Paraíba','PB',25,1,'83'),(16,'Pernambuco','PE',26,1,'81,87'),(17,'Piauí','PI',22,1,'89,86'),(18,'Paraná','PR',41,1,'43,41,42,44,45,46'),(19,'Rio de Janeiro','RJ',33,1,'24,22,21'),(20,'Rio Grande do Norte','RN',24,1,'84'),(21,'Rondônia','RO',11,1,'69'),(22,'Roraima','RR',14,1,'95'),(23,'Rio Grande do Sul','RS',43,1,'53,54,55,51'),(24,'Santa Catarina','SC',42,1,'47,48,49'),(25,'Sergipe','SE',28,1,'79'),(26,'São Paulo','SP',35,1,'11,12,13,14,15,16,17,18,19'),(27,'Tocantins','TO',17,1,'63'),(99,'Exterior','EX',99,NULL,NULL);
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-02 23:52:49
