CREATE DATABASE  IF NOT EXISTS `escola` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `escola`;
-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: escola
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Dumping data for table `dados_aluno`
--

LOCK TABLES `dados_aluno` WRITE;
/*!40000 ALTER TABLE `dados_aluno` DISABLE KEYS */;
INSERT INTO `dados_aluno` VALUES (20211,1,12,1,'M','Colégio Computex',2011004,'ARTHUR MEDEIROS INF','A','A','21/08/2008',0,'yes','no');
/*!40000 ALTER TABLE `dados_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` VALUES ('Segunda-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Ciências','0720','0810','ROSEANE'),('Segunda-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Ciências','0810','0900','ROSEANE'),('Segunda-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Gramatica','0930','1020','ROSEANE'),('Segunda-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Matemática','1010','1100','JOÃO PAULO'),('Terça-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','História','0720','0810','ROSEANE'),('Terça-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','História','0810','0900','ROSEANE'),('Terça-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Matemática','0930','1020','ROSEANE'),('Terça-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Matemática','1020','1105','ROSEANE'),('Quarta-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Geografia','0720','0810','ROSEANE'),('Quarta-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Geografia','0810','0900','ROSEANE'),('Quarta-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Inglês','0930','1020','NEILA'),('Quarta-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Gramatica','1020','1105','ROSEANE'),('Quinta-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Recreação','0720','0810','ROSEANE'),('Quinta-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Gramatica','0810','0900','ROSEANE'),('Quinta-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Matemática','0930','1020','ROSEANE'),('Quinta-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Matemática','1020','1105','ROSEANE'),('Sexta-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Prod. Text','0720','0810','ROSEANE'),('Sexta-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Matemática','0810','0900','ROSEANE'),('Sexta-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','FormHumana','0930','1020','ROSEANE'),('Sexta-feira',1,12,'Ensino Fundamental/2º Ano','M',1,'','Artes','1020','1105','ROSEANE');
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'escola'
--

--
-- Dumping routines for database 'escola'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-18 12:32:42
