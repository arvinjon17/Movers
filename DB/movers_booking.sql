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
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drivername` varchar(100) DEFAULT NULL,
  `clientname` varchar(100) DEFAULT NULL,
  `tripfrom` varchar(100) DEFAULT NULL,
  `tripto` varchar(100) DEFAULT NULL,
  `service` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `tip` int(2) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `createdby` varchar(45) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `updatedby` varchar(45) DEFAULT NULL,
  `updateddate` datetime DEFAULT NULL,
  `paidflag` int(2) DEFAULT NULL,
  `activeflag` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (1,'test','test','test','test',4,100,10,110,'admin22','2024-10-11 17:35:45','admin22','2024-10-24 00:57:12',1,1),(2,'draft','draft','draft','draft',4,3423,10,3765.3,'admin22','2024-10-11 18:37:44','admin22','2024-10-12 04:29:32',1,NULL),(3,'draft','draft','draft','draft',4,3423,10,3765.3,'admin22','2024-10-11 18:38:29','admin22','2024-10-24 00:57:01',1,1),(4,'draft','draft','draft','draft',4,4324,10,4756.4,'admin22','2024-10-11 18:38:43',NULL,NULL,0,2),(5,'dradf','dradf','dradf','dradf',4,4234,10,4657.4,'admin22','2024-10-11 18:39:55','admin22','2024-10-12 04:28:31',1,2),(6,'Successfully','Successfully','Successfully','Successfully',4,3242,10,3566.2,'admin22','2024-10-11 18:41:24','admin22','2024-10-24 01:06:50',1,1),(7,'trest','trest','trest','trest',4,546,30,709.8,'admin22','2024-11-12 13:18:10',NULL,NULL,1,1),(8,'arvin','yeb','manila','rizal',6,500,30,650,'admin22','2024-11-14 20:48:05','yeb','2024-10-14 20:50:18',1,1),(9,'arvin','yeb','rizal','manila',4,800,0,800,'yeb','2024-11-14 20:49:18','kenkenekn','2024-10-22 22:42:25',1,1),(10,'test','test','test','test',4,500,50,750,'kenkenekn','2024-10-22 22:37:54',NULL,NULL,1,2),(11,'test','test','test','test',4,600,10,660,'admin22','2024-10-24 01:00:17',NULL,NULL,1,1),(12,'test','test','test','test',6,500,10,550,'admin22','2024-10-24 01:00:41',NULL,NULL,1,1),(13,'test','test','test','test',4,55656,10,61221.6,'admin22','2024-10-24 01:06:24',NULL,NULL,1,1);
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
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
