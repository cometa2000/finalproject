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
-- Table structure for table `t_alumnos`
--

DROP TABLE IF EXISTS `t_alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_alumnos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `materia` varchar(45) NOT NULL,
  `profesor` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_alumnos`
--

LOCK TABLES `t_alumnos` WRITE;
/*!40000 ALTER TABLE `t_alumnos` DISABLE KEYS */;
INSERT INTO `t_alumnos` VALUES (1,'Jorge','fisica','Ermita'),(2,'Juan','Fisica','Juan');
/*!40000 ALTER TABLE `t_alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_animales`
--

DROP TABLE IF EXISTS `t_animales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_animales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `especie` varchar(45) NOT NULL,
  `habitat` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_animales`
--

LOCK TABLES `t_animales` WRITE;
/*!40000 ALTER TABLE `t_animales` DISABLE KEYS */;
INSERT INTO `t_animales` VALUES (1,'leon','panthera leo','sabana y praderas de áfrica'),(2,'tigre de bengala','panthera tigris tigris','bosues y manglares de la india'),(4,'orangután','pongo pygmaeus','selvas tropicales de borneo'),(5,'pingüino Emperador','aptenodytes forsteri','plataformas de hielo y aguas antárticas'),(6,'delfín Nariz de Botella','tursiops truncatus','aguas oceánicas y costeras en todo el mundo'),(7,'oso Polar','ursus maritimus','regiones árticas y zonas heladas del océano'),(9,'elefante Africano',' loxodonta africana','sabanas y bosques de África');
/*!40000 ALTER TABLE `t_animales` ENABLE KEYS */;
UNLOCK TABLES;

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
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_login`
--

LOCK TABLES `t_login` WRITE;
/*!40000 ALTER TABLE `t_login` DISABLE KEYS */;
INSERT INTO `t_login` VALUES (1,'Brayan','Solis','Brayan1029','mrbrayansolis@gmail.com','123456'),(2,'admin','test','test','usuario1@gmail.com','123456'),(4,'brayan','solis','cortes','a3@gmail.com','cometa50');
/*!40000 ALTER TABLE `t_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_maestros`
--

DROP TABLE IF EXISTS `t_maestros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_maestros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `materia` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_maestros`
--

LOCK TABLES `t_maestros` WRITE;
/*!40000 ALTER TABLE `t_maestros` DISABLE KEYS */;
INSERT INTO `t_maestros` VALUES (1,'Juan','Fisica'),(2,'Fernanda','Quimica'),(3,'Flor','Gastronomia'),(4,'Angel','Matematicas'),(5,'Axel','Finanzas');
/*!40000 ALTER TABLE `t_maestros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_materias`
--

DROP TABLE IF EXISTS `t_materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_materias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_materias`
--

LOCK TABLES `t_materias` WRITE;
/*!40000 ALTER TABLE `t_materias` DISABLE KEYS */;
INSERT INTO `t_materias` VALUES (1,'Fisica'),(2,'Quimica'),(4,'Matematicas'),(5,'Programacion'),(6,'Ciencia de datos'),(7,'Finanzas');
/*!40000 ALTER TABLE `t_materias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_productos`
--

DROP TABLE IF EXISTS `t_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `presio` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_productos`
--

LOCK TABLES `t_productos` WRITE;
/*!40000 ALTER TABLE `t_productos` DISABLE KEYS */;
INSERT INTO `t_productos` VALUES (1,'leche','leche de vaca','lacteo','34'),(2,'huevos','huevos de granja','aves','12'),(3,'jamon','jamon de pavo','carnes','54'),(4,'manzana','manzana de temporada','frutas','12');
/*!40000 ALTER TABLE `t_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_pueba`
--

DROP TABLE IF EXISTS `t_pueba`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_pueba` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `carrera` varchar(45) NOT NULL,
  `semestre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_pueba`
--

LOCK TABLES `t_pueba` WRITE;
/*!40000 ALTER TABLE `t_pueba` DISABLE KEYS */;
INSERT INTO `t_pueba` VALUES (2,'Brayan','Solis','SIS','8'),(3,'Angel','Cerezo','SIS','3'),(4,'Ariel','Segura','SIS','2'),(5,'Pepe','Barrera','GES','1'),(6,'Diego','Bollas','SIS','16'),(8,'random','random','random','random'),(17,'Brayan','Cortes','SIS','2'),(18,'Brayan','Perez','GES','5'),(19,'Brayan','Gonzales','IND','7');
/*!40000 ALTER TABLE `t_pueba` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-22 16:52:22
