-- MySQL dump 10.16  Distrib 10.1.35-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: meritus
-- ------------------------------------------------------
-- Server version	10.1.35-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schools` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `names` varchar(51) DEFAULT NULL,
  `postalcode` int(9) DEFAULT NULL,
  `town` varchar(32) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `api_secret` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schools`
--

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
INSERT INTO `schools` VALUES (1,'KISUMU BOYS',40100,'KISUMU',NULL,NULL,NULL,'2018-09-24 13:50:40');
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selections`
--

DROP TABLE IF EXISTS `selections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `selections` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `scode` int(9) DEFAULT NULL,
  `subjectlist` varchar(51) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selections`
--

LOCK TABLES `selections` WRITE;
/*!40000 ALTER TABLE `selections` DISABLE KEYS */;
INSERT INTO `selections` VALUES (1,1,'101,102,121,232','2018-09-24 13:56:24');
/*!40000 ALTER TABLE `selections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `subj_code` int(11) NOT NULL,
  `long_name` varchar(30) DEFAULT NULL,
  `short_name` varchar(20) DEFAULT NULL,
  `department` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`subj_code`),
  UNIQUE KEY `Code` (`subj_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (101,'ENGLISH','ENG','LANGUAGE'),(102,'KISWAHILI','KIS','LANGUAGE'),(121,'MATHEMATICS','MAT','MATHEMATICS'),(231,'BIOLOGY','BIO','SCIENCE'),(232,'PHYSICS','PHY','SCIENCE'),(233,'CHEMISTRY','CHE','SCIENCE'),(311,'HISTORY AND GOVERNMENT','HIS','HUMANITY'),(312,'GEOGRAPHY','GEO','HUMANITY'),(313,'CHRISTIAN RELIGIOUS EDUCATION','CRE','HUMANITY'),(314,'ISLAMIC RELIGIOUS EDUCATION','IRE','HUMANITY'),(315,'HINDU RELIGIOUS EDUCTAION','HRE','HUMANITY'),(441,'HOME SCIENCE','HSC','TECHNICAL'),(442,'ART AND DESIGN','AD','TECHNICAL'),(443,'AGRICULTURE','AGR','TECHNICAL'),(449,'DRAWING AND DESIGN','DD','TECHNICAL'),(450,'AVIATION TECHNOLOGY','AVI','TECHNICAL'),(451,'COMPUTER STUDIES','CPS','TECHNICAL'),(501,'FRENCH','FRE','LANGUAGE'),(502,'GERMAN','GER','LANGUAGE'),(503,'ARABIC','ARA','LANGUAGE'),(511,'MUSIC','MUS','TECHNICAL'),(565,'BUSINESS STUDIES','BUS','TECHNICAL');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uploads` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `scode` int(9) DEFAULT NULL,
  `file` varchar(32) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploads`
--

LOCK TABLES `uploads` WRITE;
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
INSERT INTO `uploads` VALUES (2,1,'','2018-09-24 15:59:23'),(3,1,'15379808463274_1.csv','2018-09-26 09:05:07');
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(254) NOT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `phone` varchar(16) NOT NULL,
  `scode` int(9) NOT NULL,
  `school` varchar(50) NOT NULL,
  `postal code` varchar(32) NOT NULL,
  `names` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'meritus'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-06 12:17:48
