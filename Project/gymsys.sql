-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: gymsys
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking` (
  `MemID` tinyint(4) DEFAULT NULL,
  `ClassID` tinyint(4) DEFAULT NULL,
  `DateBooked` date DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Status` enum('A','I') NOT NULL,
  `BookingID` tinyint(4) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`BookingID`),
  KEY `MemID` (`MemID`),
  KEY `ClassID` (`ClassID`,`Date`,`Time`),
  CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`MemID`) REFERENCES `member` (`MemID`),
  CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`ClassID`, `Date`, `Time`) REFERENCES `classtime` (`ClassID`, `Date`, `Time`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (1,1,'2024-04-28','2024-05-03','10:50:00','A',1),(2,2,'2024-04-28','2024-05-04','15:10:00','A',2),(3,3,'2024-04-28','2024-05-12','12:10:00','A',3),(4,4,'2024-04-28','2024-05-11','11:10:00','A',4),(5,5,'2024-04-28','2024-05-10','13:05:00','A',5);
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `ClassID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `Title` varchar(20) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `Status` enum('A','I') NOT NULL,
  `Duration` tinyint(4) DEFAULT NULL,
  `Size` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`ClassID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES (1,'Boxing',10,'A',3,10),(2,'Gym',5,'A',10,5),(3,'Zumba',20,'A',1,10),(4,'Kickboxing',30,'A',4,4),(5,'muay thai',25,'A',2,5);
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classtime`
--

DROP TABLE IF EXISTS `classtime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classtime` (
  `ClassID` tinyint(4) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Capacity` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`ClassID`,`Date`,`Time`),
  CONSTRAINT `classtime_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ClassID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classtime`
--

LOCK TABLES `classtime` WRITE;
/*!40000 ALTER TABLE `classtime` DISABLE KEYS */;
INSERT INTO `classtime` VALUES (1,'2024-05-03','10:50:00',8),(2,'2024-05-04','15:10:00',4),(3,'2024-05-12','12:10:00',9),(4,'2024-05-11','11:10:00',3),(5,'2024-05-10','13:05:00',4);
/*!40000 ALTER TABLE `classtime` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `MemID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(15) DEFAULT NULL,
  `Sname` varchar(15) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Status` enum('A','I') NOT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Wallet` decimal(10,0) DEFAULT 0,
  `DateRegistered` date DEFAULT NULL,
  PRIMARY KEY (`MemID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'Chris','Purcell','1994-06-08','A','chris@gmail.com','0871234567',30,'2024-04-28'),(2,'Kevin','Walker','2003-12-29','A','kevin@gmail.com','0871234589',25,'2024-04-28'),(3,'Nathan','Phillips','1999-01-05','A','nathan@gmail.com','0871234532',10,'2024-04-28'),(4,'Daniel','Wright','1993-01-22','A','daniel@gmail.com','0871234561',0,'2024-04-28'),(5,'John','Stevens','1989-01-22','A','john@gmail.com','0871234510',5,'2024-04-28');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-28  9:42:46
