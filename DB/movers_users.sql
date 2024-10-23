-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: movers
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `admin` int(1) DEFAULT NULL,
  `createdby` varchar(45) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `updatedby` varchar(45) DEFAULT NULL,
  `updateddate` datetime DEFAULT NULL,
  `activeflag` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ian Baarde','Ian Conrad Broqueza Baarde','2024-10-01','ianconrad.baarde@gmail.com',NULL,0,NULL,'2024-01-10 15:03:42','admin','2024-10-10 22:09:47',1),(2,'ianconrad.baarde@gmail.com21','ianconrad.baarde@gmail.com2','2024-10-19','ianconrad.baarde@gmail.com2',NULL,0,'Ian Conrad Broqueza Baarde','2024-02-10 15:04:00','admin','2024-10-11 00:13:00',1),(3,'Ian Conrad Broqueza Baarde1','Ian Conrad Broqueza Baarde','2024-10-01','ianconrad.baarde@gmail.com',NULL,0,'Ian Conrad Broqueza Baarde','2024-03-10 17:23:24','admin','2024-10-10 22:09:49',1),(4,'Ian Conrad Broqueza Baarde1','Ian Conrad Broqueza Baarde','2024-10-01','ianconrad.baarde@gmail.com',NULL,0,'Ian Conrad Broqueza Baarde','2024-10-10 17:23:24',NULL,NULL,1),(5,'admin2','admin','2024-10-11','admin@admin.com',NULL,0,NULL,'2024-12-10 20:07:47','admin','2024-10-11 00:11:30',1),(6,'admin2','admin22','2024-10-09','admin2@admin2.com','3f6bc9b8f5682d20eb6b9fe6b99c9d08',0,NULL,'2024-10-11 14:38:27',NULL,NULL,1),(7,'arvin','arvin','2024-10-03','arvin@arvin.com','679ea2f0b8e4a66531ca63a0f0c26edf',0,NULL,'2024-10-14 20:32:24','arvin','2024-10-14 20:37:22',1),(8,'yeb','yeb','2024-10-09','yeb@yeb.com','e9bbd14bcde85cb7217a2e06e514d047',0,'arvin','2024-10-14 20:36:05','admin22','2024-10-14 20:41:48',1),(9,'kenkenekn123','kenkenekn','2024-10-22','kenkenekn@kenkenekn.com',NULL,0,'admin22','2024-10-22 22:26:37','kenkenekn','2024-10-22 22:37:24',1);
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

-- Dump completed on 2024-10-24  1:15:34
