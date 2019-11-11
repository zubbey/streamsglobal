-- MySQL dump 10.13  Distrib 8.0.17, for macos10.14 (x86_64)
--
-- Host: zubbeydbinstances.ci7kvfvnaegi.us-east-2.rds.amazonaws.com    Database: streamsSystem
-- ------------------------------------------------------
-- Server version	5.7.22-log

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
-- Table structure for table `adminAds`
--

DROP TABLE IF EXISTS `adminAds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminAds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `heading` text NOT NULL,
  `body` text NOT NULL,
  `creator` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='this table contents streams global Adverts';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminAds`
--

LOCK TABLES `adminAds` WRITE;
/*!40000 ALTER TABLE `adminAds` DISABLE KEYS */;
INSERT INTO `adminAds` VALUES (4,'banner01.jpg','invest the way you want. we can show you how.','Whether you’re new to investing, an experienced trader or somewhere in between, we offer investment choices with some of the lowest commissions in the industry.      ','zubbey'),(5,'banner2','Saving money should be easy.\r\nAutomate it with Trim.','Our users saved over $1,000,000 in the last month.\r\nGet your results in less than a minute.      ','zubbey'),(6,'banner03','Banking your way.','Wherever you are in life,\r\nwe’ve got an online bank account designed to make it more rewarding.','zubbey code');
/*!40000 ALTER TABLE `adminAds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profileimg`
--

DROP TABLE IF EXISTS `profileimg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=REDUNDANT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profileimg`
--

LOCK TABLES `profileimg` WRITE;
/*!40000 ALTER TABLE `profileimg` DISABLE KEYS */;
INSERT INTO `profileimg` VALUES (1,1,1);
/*!40000 ALTER TABLE `profileimg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `savingsData`
--

DROP TABLE IF EXISTS `savingsData`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `savingsData` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usersid` int(11) NOT NULL,
  `cus_code` varchar(200) NOT NULL,
  `plan_code` varchar(200) NOT NULL,
  `sub_code` varchar(200) NOT NULL,
  PRIMARY KEY (`id`,`usersid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='This table containers users plan';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `savingsData`
--

LOCK TABLES `savingsData` WRITE;
/*!40000 ALTER TABLE `savingsData` DISABLE KEYS */;
INSERT INTO `savingsData` VALUES (1,1,'CUS_ybbzp7m8utihx5t','PLN_rl31lm0x5sberm3',''),(2,1,'CUS_ybbzp7m8utihx5t','PLN_rd0oo9a6vipp3ta','');
/*!40000 ALTER TABLE `savingsData` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` longtext NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` longtext NOT NULL,
  `referralid` longtext,
  `usertype` tinyint(11) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `DOB` varchar(200) DEFAULT NULL,
  `address` longtext,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `LGA` longtext,
  `occupation` varchar(50) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `dateReg` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=REDUNDANT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'chibike','keleb','08067544432','com.zubbey@hotmail.com','$2y$10$wWH2zZFyu2UDDhPVmPbbJe4.Fm4frrgxHLTx099Fu6fWUy/VJ6HgG',1,'3a467b6173c23457d2ff87a795bb3c90b52c3674e998d570a7707dd1a192','e4b60b',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-11-11');
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

-- Dump completed on 2019-11-11 10:54:49
