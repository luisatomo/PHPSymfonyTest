-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: symfonytest
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

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
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `industry` longtext COLLATE utf8_unicode_ci NOT NULL,
  `revenue_billion` decimal(10,0) NOT NULL,
  `market_capital_billion` decimal(10,0) NOT NULL,
  `employees` int(11) NOT NULL,
  `headquarters` longtext COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'Amazon','E-commerce',107,268900,329.7,'Seattle, WA, USA','amazon@example.com');
INSERT INTO `company` VALUES (2,'Google','Search',74.98,61814,493.2,'Mountain View, California, USA','google@example.com');
INSERT INTO `company` VALUES (3,'Facebook','Social',17.93,12691,332.1,'Menlo Park, CA, USA','facebook@example.com');
INSERT INTO `company` VALUES (4,'Tencent','Social',15.84,25517,194.4,'Shenzhen, Guangdong, China','tencent@example.com');
INSERT INTO `company` VALUES (5,'Alibaba','E-commerce',12.29,26000,204.8,'Hangzhou, Zhejiang, China','alibaba@example.com');
INSERT INTO `company` VALUES (6,'Baidu','Search',10.56,41467,62.27,'Beijing, China','baidu@example.com');
INSERT INTO `company` VALUES (7,'Priceline Group','Travel',9.22,9000,63.83,'Norwalk, CT, USA','priceline group@example.com');
INSERT INTO `company` VALUES (8,'eBay','E-commerce',8.59,34600,26.98,'San Jose, CA, USA','ebay@example.com');
INSERT INTO `company` VALUES (9,'Netflix','Web portal',6.77,3500,41.89,'Los Gatos, CA, USA','netflix@example.com');
INSERT INTO `company` VALUES (10,'Expedia,Inc.','Travel',6.67,18000,16.61,'Bellevue, Washington, USA','expedia,inc.@example.com');
INSERT INTO `company` VALUES (11,'Rakuten','E-commerce',6.3,12981,13.06,'Tokyo, Japan','rakuten@example.com');
INSERT INTO `company` VALUES (12,'Salesforce.com','Cloud computing',5.37,16227,47.89,'San Francisco, CA, USA','salesforce.com@example.com');
INSERT INTO `company` VALUES (13,'Yahoo','Search Engine',4.97,12500,36.34,'Sunnyvale, CA, USA','yahoo@example.com');
INSERT INTO `company` VALUES (14,'ODIGEO','Travel',4.9,1700,0.22,'Barcelona, Spain','odigeo@example.com');
INSERT INTO `company` VALUES (15,'NetEase','Online Services',3.63,12919,22.65,'Guangzhou, Guangdong, China','netease@example.com');
INSERT INTO `company` VALUES (16,'Zalando','E-commerce',3.28,10000,8.7,'Berlin, Germany','zalando@example.com');
INSERT INTO `company` VALUES (17,'Groupon','E-commerce',3.1,10000,1.96,'Chicago, Illinois, USA','groupon@example.com');
INSERT INTO `company` VALUES (18,'LinkedIn','Social',2.99,8735,17.48,'Mountain View, CA, USA','linkedin@example.com');
INSERT INTO `company` VALUES (19,'Twitter','Social',2.22,3638,10.2,'San Francisco, CA, USA','twitter@example.com');
INSERT INTO `company` VALUES (20,'Naver Corporation','Search engine',2.2,2501,16.15,'Seoul, South Korea','naver corporation@example.com');
INSERT INTO `company` VALUES (21,'Cimpress','Mass Customization',1.78,8000,2.7,'Venlo, Netherlands','cimpress@example.com');
INSERT INTO `company` VALUES (22,'TripAdvisor','Travel',1.5,2793,8.55,'Needham, Massachusetts,USA','tripadvisor@example.com');
INSERT INTO `company` VALUES (23,'flipkart','E-Commerce',1.5,35000,9.39,'Bangalore, Karnataka, India','flipkart@example.com');
INSERT INTO `company` VALUES (24,'ASOS.com','E-Commerce',1.4,7500,4.8,'London, UK','asos.com@example.com');
INSERT INTO `company` VALUES (25,'Yandex','Search',0.9,5514,6.15,'Moscow, Russia','yandex@example.com');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-22 21:31:04
