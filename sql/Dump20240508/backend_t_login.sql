-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: backend
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `t_login`
--

DROP TABLE IF EXISTS `t_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `nombreUser` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(350) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_login`
--

LOCK TABLES `t_login` WRITE;
/*!40000 ALTER TABLE `t_login` DISABLE KEYS */;
INSERT INTO `t_login` VALUES (1,'Brayan','Solis','Brayan1029','mrbrayansolis@gmail.com','123456'),(2,'admin','test','test','usuario1@gmail.com','123456'),(4,'brayan','solis','cortes','a3@gmail.com','cometa50'),(11,'admin','Solis','cortessdasd','tuxmorro2016@gmail.com','$2y$10$1qDn2.hzJGYNfQNf1aArsONiKzbcNcImG9e80OzZ50Hiia.qW249S'),(12,'Tios','mrbrayan','mrbrayansdf','a@gmail.com','$2y$10$sL89fipCsdRhX9ASXy.EZeZ84eAzvFcNOe.32hSpTKJIjr5Zuq.0S'),(15,'Corea de Sur','paris','aaaaaaaaaaaaaaaaa','a3@gmail.com','$2y$10$xiaUlaa2heVS73Wc7vhn2eVgH3ufZykb3urkXxu5a4vWWkOEiaWEi'),(16,'Brayan','paris','cortes12341','tuxmorro2016@gmail.com','$2y$10$6wSL1RVtv10lbFn0Ge2xLuufmCTkLKQQoLxPc9iTMI1H4ywU2fhGW'),(17,'Brayan','paris','Brayan100','tuxmorro2016@gmail.com','$2y$10$3lIcS0uva/UDtk/8UqZuGeb6t9ZEWuR4pStFWslD87egpXDV/6plu'),(18,'Chile','tes','mrbrayan1234','tuxmorro2016@gmail.com','$2y$10$TCOTMbdpBaLahgb3X1kN/uEUK6NF0f3tx3Khv2MwUhWL9dxbu0rym'),(19,'Chile','paris','chileee','usuario1@gmail.com','$2y$10$sOfPy5wpmW97aDV1BjfiUu5pp29pN3F0U1ggjSmx9C0PPZ0ALGy/W'),(20,'test','test','test435324','user@gmail.com','$2y$10$IanOQQ8YiZTbTb4zCJUxTel.4vgvkTh6WHFeGqRukyzreyzl48jOu');
/*!40000 ALTER TABLE `t_login` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-08 16:51:59
