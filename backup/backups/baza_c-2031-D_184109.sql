-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: baza
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

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
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents` (
  `documentID` int(10) NOT NULL AUTO_INCREMENT,
  `uploadTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastModifactionTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `notes` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) NOT NULL,
  PRIMARY KEY (`documentID`),
  UNIQUE KEY `filePath` (`filePath`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gear`
--

DROP TABLE IF EXISTS `gear`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gear` (
  `gearID` int(10) NOT NULL AUTO_INCREMENT,
  `purchaseInvoiceID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `serialNumber` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `netValue` float NOT NULL,
  `warrantyDate` date DEFAULT NULL,
  PRIMARY KEY (`gearID`),
  KEY `FKGear822160` (`userID`),
  KEY `FKGear532083` (`purchaseInvoiceID`),
  CONSTRAINT `FKGear532083` FOREIGN KEY (`purchaseInvoiceID`) REFERENCES `purchaseinvoices` (`purchaseInvoiceID`),
  CONSTRAINT `FKGear822160` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gear`
--

LOCK TABLES `gear` WRITE;
/*!40000 ALTER TABLE `gear` DISABLE KEYS */;
INSERT INTO `gear` VALUES (1,1,1,'Myszka komputerowa','543TFD-34GFB','Elegancka',89,'2020-12-26'),(2,1,1,'Klawiatura','54436',NULL,49,NULL),(3,1,1,'Podkladka','5436','normalna',19,'2021-01-02'),(4,1,1,'Kulka','65434','notka',39,'2021-01-02'),(5,1,1,'Klawiatura','76534',NULL,5,NULL),(6,1,1,'Klawiatura','54346',NULL,34,NULL),(20,1,1,'Głośniki','76534',NULL,45,'2020-12-29'),(21,1,1,'Głośniki','76534',NULL,45,'2020-12-29'),(22,1,1,'Głośniki','231',NULL,16,NULL);
/*!40000 ALTER TABLE `gear` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchaseinvoices`
--

DROP TABLE IF EXISTS `purchaseinvoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchaseinvoices` (
  `purchaseInvoiceID` int(10) NOT NULL AUTO_INCREMENT,
  `uploadTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastModificationTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `contractorData` varchar(255) NOT NULL,
  `amountNetto` float NOT NULL,
  `amountBrutto` float NOT NULL,
  `transactionDate` date NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `vat` float NOT NULL,
  PRIMARY KEY (`purchaseInvoiceID`),
  UNIQUE KEY `filePath` (`filePath`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchaseinvoices`
--

LOCK TABLES `purchaseinvoices` WRITE;
/*!40000 ALTER TABLE `purchaseinvoices` DISABLE KEYS */;
INSERT INTO `purchaseinvoices` VALUES (1,'2020-12-21 21:44:57','2020-12-21 21:44:57','Gospodarstwo domowe',450,390,'2020-12-07','fajnie','./documents/invoices/purchase','PLN',0.23);
/*!40000 ALTER TABLE `purchaseinvoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `reportID` int(10) NOT NULL AUTO_INCREMENT,
  `reportDate` date NOT NULL,
  PRIMARY KEY (`reportID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `roleID` int(10) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(255) NOT NULL,
  PRIMARY KEY (`roleID`),
  UNIQUE KEY `roleName` (`roleName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_users`
--

DROP TABLE IF EXISTS `roles_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_users` (
  `roleID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  PRIMARY KEY (`roleID`,`userID`),
  KEY `FKRoles_User780791` (`userID`),
  CONSTRAINT `FKRoles_User126221` FOREIGN KEY (`roleID`) REFERENCES `roles` (`roleID`),
  CONSTRAINT `FKRoles_User780791` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_users`
--

LOCK TABLES `roles_users` WRITE;
/*!40000 ALTER TABLE `roles_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saleinvoices`
--

DROP TABLE IF EXISTS `saleinvoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saleinvoices` (
  `saleInvoiceID` int(10) NOT NULL AUTO_INCREMENT,
  `uploadTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastModificationTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `contractorData` varchar(255) NOT NULL,
  `amountNetto` float NOT NULL,
  `amountBrutto` float NOT NULL,
  `transactionDate` date NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `vat` float NOT NULL,
  PRIMARY KEY (`saleInvoiceID`),
  UNIQUE KEY `filePath` (`filePath`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saleinvoices`
--

LOCK TABLES `saleinvoices` WRITE;
/*!40000 ALTER TABLE `saleinvoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `saleinvoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saleinvoices_users`
--

DROP TABLE IF EXISTS `saleinvoices_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saleinvoices_users` (
  `saleInvoiceID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  PRIMARY KEY (`saleInvoiceID`,`userID`),
  KEY `FKSaleInvoic516270` (`userID`),
  CONSTRAINT `FKSaleInvoic516270` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  CONSTRAINT `FKSaleInvoic884712` FOREIGN KEY (`saleInvoiceID`) REFERENCES `saleinvoices` (`saleInvoiceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saleinvoices_users`
--

LOCK TABLES `saleinvoices_users` WRITE;
/*!40000 ALTER TABLE `saleinvoices_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `saleinvoices_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `software`
--

DROP TABLE IF EXISTS `software`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `software` (
  `softwareID` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL,
  `purchaseInvoiceID` int(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `licenceKey` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `expirationDate` date DEFAULT NULL,
  `techSupportDate` date DEFAULT NULL,
  PRIMARY KEY (`softwareID`),
  KEY `FKSoftware61779` (`userID`),
  KEY `FKSoftware292465` (`purchaseInvoiceID`),
  CONSTRAINT `FKSoftware292465` FOREIGN KEY (`purchaseInvoiceID`) REFERENCES `purchaseinvoices` (`purchaseInvoiceID`),
  CONSTRAINT `FKSoftware61779` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `software`
--

LOCK TABLES `software` WRITE;
/*!40000 ALTER TABLE `software` DISABLE KEYS */;
INSERT INTO `software` VALUES (1,1,1,'Licencja na artykuły użytku domowego','6544-7543-2476-5434',NULL,NULL,NULL),(2,1,1,'Licencja testowa','5432-6542-6765-2367',NULL,'2020-12-30','2024-11-29');
/*!40000 ALTER TABLE `software` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Janek','Kowalski','Pracownik','543234125');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_documents`
--

DROP TABLE IF EXISTS `users_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_documents` (
  `userID` int(10) NOT NULL,
  `documentID` int(10) NOT NULL,
  PRIMARY KEY (`userID`,`documentID`),
  KEY `FKUsers_Docu66244` (`documentID`),
  CONSTRAINT `FKUsers_Docu602919` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  CONSTRAINT `FKUsers_Docu66244` FOREIGN KEY (`documentID`) REFERENCES `documents` (`documentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_documents`
--

LOCK TABLES `users_documents` WRITE;
/*!40000 ALTER TABLE `users_documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_purchaseinvoices`
--

DROP TABLE IF EXISTS `users_purchaseinvoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_purchaseinvoices` (
  `userID` int(10) NOT NULL,
  `purchaseInvoiceID` int(10) NOT NULL,
  PRIMARY KEY (`userID`,`purchaseInvoiceID`),
  KEY `FKUsers_Purc649896` (`purchaseInvoiceID`),
  CONSTRAINT `FKUsers_Purc649896` FOREIGN KEY (`purchaseInvoiceID`) REFERENCES `purchaseinvoices` (`purchaseInvoiceID`),
  CONSTRAINT `FKUsers_Purc967449` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_purchaseinvoices`
--

LOCK TABLES `users_purchaseinvoices` WRITE;
/*!40000 ALTER TABLE `users_purchaseinvoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_purchaseinvoices` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-31 18:41:09
