-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: low
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

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
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(255) DEFAULT NULL,
  `branch_add` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` VALUES (1,'Branch 1','Lagasca St. Laoag City'),(2,'Branch 2',' Shamrock Laoag City'),(3,'Owner',NULL);
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `unit_price` decimal(12,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `critical_lvl` int(11) DEFAULT NULL,
  `archived` bit(1) DEFAULT b'0',
  `branch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (11,'Hand Grip (Domino)',150.00,30,30,'\0',1),(12,'Air Filter (Yamakoto)',150.00,250,20,'\0',1),(13,'Handle Lever (MTR)',500.00,70,20,'\0',1),(14,'Horn (Global)',200.00,79,20,'\0',1),(15,'Slider (Rizoma)',350.00,120,40,'\0',1),(16,'Brake Lamp (Type R)',100.00,50,10,'\0',1),(17,'Volt Meter (DSK)',200.00,50,15,'\0',1),(18,'Led (Global)',450.00,85,20,'\0',1),(19,'Ignition Switch (Tamago)',150.00,90,20,'\0',1),(20,'Spark Plug (NGK)',150.00,100,20,'\0',1),(21,'Flasher (POSH)',100.00,120,20,'\0',1),(22,'Break Shoe (Kawata)',100.00,90,15,'\0',1),(23,'Rear Sprocket (KSR)',250.00,120,20,'\0',1),(24,'Side Mirror (KMN)',100.00,110,30,'\0',1),(25,'Flyball (Global)',250.00,90,20,'\0',1),(26,'CDI (E-power)',250.00,100,20,'\0',1),(27,'Bulb (E-power)',35.00,130,20,'\0',1),(28,'Spray Paint (BOSNY)',120.00,90,10,'\0',1),(29,'Oil Filter (Yamaha)',85.00,110,20,'\0',1),(30,'Bering (KSR)',75.00,100,20,'\0',1),(31,'Break Pad (GPC)',100.00,115,20,'\0',1),(32,'Battery (Motolight)',570.00,15,10,'\0',1),(33,'Helmet (NHK)',3000.00,20,5,'\0',1),(34,'Shocks (RG3)',650.00,30,10,'\0',1),(35,'Sit Cover (Monster)',150.00,80,20,'\0',1),(36,'Brake Fluid (Total)',50.00,110,20,'\0',1),(37,'Knee Pad (MKT)',550.00,60,15,'\0',1),(38,'Battery (Motolight)',570.00,60,10,'\0',2),(39,'Head Packing (Gonvince)',250.00,100,10,'\0',2),(40,'Helmet (NHK)',3000.00,40,10,'\0',2),(41,'Electrical Tape (Armak)',30.00,100,20,'\0',2),(42,'Side Gasket (Apple)',85.00,50,10,'\0',2),(43,'Gear Oil (Top 1)',120.00,60,10,'\0',2),(44,'Mirror (Mokoto)',170.00,70,10,'\0',2),(45,'Headlight (Japan)',300.00,95,15,'\0',2),(46,'Tail Light (Japan)',200.00,50,10,'\0',2),(47,'Oil Filter (Yamaha)',85.00,80,15,'\0',2),(48,'Oil Filter (Suzuki)',85.00,60,10,'\0',2),(49,'Oil Filter (Kawasaki)',85.00,65,15,'\0',2),(50,'Spark Plug cap (E-power)',35.00,80,15,'\0',2),(51,'Throttle cable (YSK)',100.00,80,10,'\0',2),(52,'Clutch cable (YSK)',100.00,80,10,'\0',2),(53,'Brake cable (YSK)',100.00,85,10,'\0',2),(54,'Speedo cable (YSK)',100.00,90,15,'\0',2),(55,'Fuel tank cap (KSR)',250.00,80,15,'\0',2),(56,'Sprocket (Sun)',85.00,90,20,'\0',2),(57,'Spray Paint (BOSNY)',120.00,90,10,'\0',2),(58,'Rim (SPD)',1000.00,80,10,'\0',2),(59,'Sit Cover (Monster)',150.00,80,10,'\0',2),(60,'Volt Meter (DSK)',200.00,50,10,'\0',2),(61,'Horn (Global)',200.00,70,15,'\0',2);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin'),(2,'owner');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sold` date NOT NULL,
  `unit_price` decimal(13,2) DEFAULT NULL,
  `discount` decimal(11,2) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sales_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,12,10,'2019-04-01',150.00,20.00,1);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'pending'),(2,'approved'),(3,'denied');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_account`
--

DROP TABLE IF EXISTS `user_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_account` (
  `user_account_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `password_hint` varchar(255) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT '1',
  PRIMARY KEY (`user_account_id`),
  KEY `branch_id` (`branch_id`),
  CONSTRAINT `user_account_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_account`
--

LOCK TABLES `user_account` WRITE;
/*!40000 ALTER TABLE `user_account` DISABLE KEYS */;
INSERT INTO `user_account` VALUES (1,'branch1','5f4dcc3b5aa765d61d8327deb882cf99','Lowie Pogi','Brgy 12 Magat Salamat Street Laoag City','09175340121','p******d',1,1),(4,'owner','5f4dcc3b5aa765d61d8327deb882cf99','Owner','321321','321321','p******d',3,1),(6,'branch2','5f4dcc3b5aa765d61d8327deb882cf99','Pat','Brgy 12 Magat Salamat Street Laoag City','09055383063','p******d',2,1),(10,'jmsaldua','5f4dcc3b5aa765d61d8327deb882cf99','jm saldua','address','12313','p******d',1,1);
/*!40000 ALTER TABLE `user_account` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-02  0:03:14
