CREATE DATABASE  IF NOT EXISTS `tucao` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `tucao`;
-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: 127.0.0.1    Database: tucao
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `tc_share`
--

DROP TABLE IF EXISTS `tc_share`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tc_share` (
  `SHARE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CONTENT` varchar(200) DEFAULT NULL,
  `TUCAO_ID` int(11) DEFAULT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `SHARE_DEST` int(11) DEFAULT NULL,
  `SHARE_STATUS` int(11) DEFAULT NULL,
  `CREATE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SHARE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tc_share`
--

LOCK TABLES `tc_share` WRITE;
/*!40000 ALTER TABLE `tc_share` DISABLE KEYS */;
/*!40000 ALTER TABLE `tc_share` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tc_topic`
--

DROP TABLE IF EXISTS `tc_topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tc_topic` (
  `TOPIC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TOPIC_TITLE` varchar(100) DEFAULT NULL,
  `TOPIC_CONTENT` text,
  `CREATE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `END_TIME` timestamp NULL DEFAULT NULL,
  `HAS_PIC` tinyint(4) DEFAULT NULL,
  `CREATE_USER` int(11) DEFAULT NULL,
  `LADTITUDE` decimal(10,0) DEFAULT NULL,
  `LONGITUDE` decimal(10,0) DEFAULT NULL,
  `CITY` varchar(50) DEFAULT NULL,
  `POSITION_DESC` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TOPIC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tc_topic`
--

LOCK TABLES `tc_topic` WRITE;
/*!40000 ALTER TABLE `tc_topic` DISABLE KEYS */;
/*!40000 ALTER TABLE `tc_topic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tc_tucao`
--

DROP TABLE IF EXISTS `tc_tucao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tc_tucao` (
  `TC_TUCAO` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(100) NOT NULL,
  `CONTENT` text NOT NULL,
  `HAS_PIC` tinyint(4) DEFAULT NULL,
  `SOURCE` tinyint(4) DEFAULT NULL,
  `FATHER_ID` int(11) DEFAULT NULL,
  `TOPIC_ID` int(11) DEFAULT NULL,
  `COMMENT_NUM` int(11) DEFAULT '0',
  `SUPPORT_NUM` int(11) DEFAULT '0',
  `SHARE_NUM` int(11) DEFAULT '0',
  `CREATE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_ANONYMOUS` tinyint(4) DEFAULT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `LADTITUDE` decimal(10,0) DEFAULT NULL,
  `LONGITUDE` decimal(10,0) DEFAULT NULL,
  `CITY` varchar(50) DEFAULT NULL,
  `POSITION_DESC` varchar(100) DEFAULT NULL,
  `TUCAO_STATUS` int(11) DEFAULT '0',
  PRIMARY KEY (`TC_TUCAO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tc_tucao`
--

LOCK TABLES `tc_tucao` WRITE;
/*!40000 ALTER TABLE `tc_tucao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tc_tucao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tc_tucao_comment`
--

DROP TABLE IF EXISTS `tc_tucao_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tc_tucao_comment` (
  `COMMENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TUCAO_ID` int(11) NOT NULL,
  `COMMENT_CONTENT` varchar(200) DEFAULT NULL,
  `CREATE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `COMMENT_USER` int(11) DEFAULT NULL,
  `REPLY_COMMENT` int(11) DEFAULT NULL,
  PRIMARY KEY (`COMMENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tc_tucao_comment`
--

LOCK TABLES `tc_tucao_comment` WRITE;
/*!40000 ALTER TABLE `tc_tucao_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `tc_tucao_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tc_tucao_pic`
--

DROP TABLE IF EXISTS `tc_tucao_pic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tc_tucao_pic` (
  `PIC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PIC_SRC` varchar(100) DEFAULT NULL,
  `SMALL_PIC_SRC` varchar(100) DEFAULT NULL,
  `TUCAO_ID` int(11) DEFAULT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `CREATE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `LENGTH` int(11) DEFAULT NULL,
  `WIDTH` int(11) DEFAULT NULL,
  PRIMARY KEY (`PIC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tc_tucao_pic`
--

LOCK TABLES `tc_tucao_pic` WRITE;
/*!40000 ALTER TABLE `tc_tucao_pic` DISABLE KEYS */;
/*!40000 ALTER TABLE `tc_tucao_pic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tc_tucao_support`
--

DROP TABLE IF EXISTS `tc_tucao_support`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tc_tucao_support` (
  `SUPPORT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TUCAO_ID` int(11) NOT NULL,
  `SUPPORT_STATUS` int(11) DEFAULT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `CREATE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SUPPORT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tc_tucao_support`
--

LOCK TABLES `tc_tucao_support` WRITE;
/*!40000 ALTER TABLE `tc_tucao_support` DISABLE KEYS */;
/*!40000 ALTER TABLE `tc_tucao_support` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tc_users`
--

DROP TABLE IF EXISTS `tc_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tc_users` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GENDER` tinyint(4) DEFAULT '0',
  `NICK_NAME` varchar(50) DEFAULT NULL,
  `REG_PHONE_NUM` varchar(50) DEFAULT NULL,
  `REG_EMAIL` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `LEVEL` int(11) DEFAULT '0',
  `SCORE` int(11) DEFAULT '0',
  `USER_STATUS` int(11) DEFAULT NULL,
  `DEFAULT_PIC` int(11) DEFAULT NULL,
  `HEAD_PIC` varchar(100) DEFAULT NULL,
  `CREATE_TIME` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`USER_ID`),
  UNIQUE KEY `USER_ID_UNIQUE` (`USER_ID`),
  UNIQUE KEY `REG_PHONE_NUM_UNIQUE` (`REG_PHONE_NUM`),
  UNIQUE KEY `REG_EMAIL_UNIQUE` (`REG_EMAIL`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tc_users`
--

LOCK TABLES `tc_users` WRITE;
/*!40000 ALTER TABLE `tc_users` DISABLE KEYS */;
INSERT INTO `tc_users` VALUES (1,1,'gongchen','15112345678','stevegc@163.com','123456',0,0,0,1,'','2014-11-12 22:48:01'),(2,1,'chenkaiyan','15887654321','kayyan@126.com','123456',1,5,0,2,NULL,'2014-11-12 22:57:16');
/*!40000 ALTER TABLE `tc_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tc_users_relation`
--

DROP TABLE IF EXISTS `tc_users_relation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tc_users_relation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `ATTENTION_USER_ID` int(11) NOT NULL,
  `CREATE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ATTENTION_STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tc_users_relation`
--

LOCK TABLES `tc_users_relation` WRITE;
/*!40000 ALTER TABLE `tc_users_relation` DISABLE KEYS */;
/*!40000 ALTER TABLE `tc_users_relation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-13  7:16:23
