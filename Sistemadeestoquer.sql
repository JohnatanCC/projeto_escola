-- MySQL dump 10.13  Distrib 8.0.30, for Linux (x86_64)
--
-- Host: localhost    Database: sistema_estoque
-- ------------------------------------------------------
-- Server version	8.0.30-0ubuntu0.20.04.2

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
-- Table structure for table `estoque_alimento`
--

DROP TABLE IF EXISTS `estoque_alimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estoque_alimento` (
  `id_alimento` int NOT NULL AUTO_INCREMENT,
  `nome_alimento` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_alimento` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtd_alimento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_alimento`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estoque_alimento`
--

LOCK TABLES `estoque_alimento` WRITE;
/*!40000 ALTER TABLE `estoque_alimento` DISABLE KEYS */;
INSERT INTO `estoque_alimento` VALUES (90,'Ovo','6480b1887698e.png','11'),(91,'Leite','6480b1babd46a.jpg','94'),(93,'Arroz','6480b244a0107.jpg','0'),(94,'povo','6480c2a69b9a0.png','10');
/*!40000 ALTER TABLE `estoque_alimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estoque_user`
--

DROP TABLE IF EXISTS `estoque_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estoque_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nome_user` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha_user` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estoque_user`
--

LOCK TABLES `estoque_user` WRITE;
/*!40000 ALTER TABLE `estoque_user` DISABLE KEYS */;
INSERT INTO `estoque_user` VALUES (1,'ovo','ovo@gmail.com','MjAyY2I5NjJhYzU5MDc1Yjk2NGIwNzE1MmQyMzRiNzA='),(2,'Pessoa Aleatória','123@gmail.com','MjAyY2I5NjJhYzU5MDc1Yjk2NGIwNzE1MmQyMzRiNzA='),(3,'Johnatan Cavalcante Costa','123@gmail.com','MjAyY2I5NjJhYzU5MDc1Yjk2NGIwNzE1MmQyMzRiNzA=');
/*!40000 ALTER TABLE `estoque_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sistema_estoque'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-07 15:02:50
