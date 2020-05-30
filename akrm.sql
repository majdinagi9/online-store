-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: akrm
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

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
-- Table structure for table `cart_detail`
--

DROP TABLE IF EXISTS `cart_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_detail` (
  `item_num` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`item_num`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_detail`
--

LOCK TABLES `cart_detail` WRITE;
/*!40000 ALTER TABLE `cart_detail` DISABLE KEYS */;
INSERT INTO `cart_detail` VALUES (1,'7','Masks',12,10.00),(2,'7','Masks',12,10.00),(3,'7','Tissue',3,5.00),(4,'8','Tissue',3,5.00),(5,'majdi.naj','Wipes',1,15.00),(6,'majdi.naj','Wipes',1,15.00),(7,'majdi.naj','Hand Sanitizer',1,5.00),(8,'majdi.naj','Tissue',1,5.00),(9,'majdi.naj','Masks',1,10.00),(10,'majdi.naj','Wipes',1,15.00),(11,'majdi.naj','Wipes',1,15.00),(12,'majdi.naj','Wipes',1,15.00),(13,'majdi.naj','Wipes',1,15.00);
/*!40000 ALTER TABLE `cart_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (7,'Majd.nagi','majdi.nag12@stu.bmcc.cuny.edu','0f611815a7421cf889f47b45cccdfaeb','960 Sheridan Ave','Bronx',10456),(14,'Abdullah.alazzani','Abdullah.alazzani@stu.bmcc.cuny.edu','3980f8d3cedd4fb574c7d1a989fb9fcb','199 chambers st','New York',10007),(15,'majdi.naj','majdi.nagi@stu.bmcc.cuny.edu','0f611815a7421cf889f47b45cccdfaeb','960 Sheridan Ave','Bronx',10456),(16,'majdi142','magdigamil142@icloud.com','0f611815a7421cf889f47b45cccdfaeb','960 sheridan ave','bronx',10092),(17,'assays','sfasfaw@afwf.cpm','4124bc0a9335c27f086f24ba207a4912','aa','aa',11),(18,'Wajdi ','wajdinagi@claremontihs.org','e9ac64d993bf00e3de46fb9ebbfeafca','ny','bronx',10456),(19,'mohammed ','mohammedmozip@gmail.com','25f9e794323b453885f5181f1b624d0b','2345','123',987);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `item_num` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(255) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`item_num`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'Masks','images/mask.jpg',100,10.00,'Our masks are made of soft, high-quality cotton and individually packaged and sealed to ensure the highest standards\r\nMouth Masks are great for respiratory protection again. Each masks comes with pleat style ties to wrap around the head.'),(2,'Wipes','images/wipes.jpg',100,15.00,'Clorox Disinfecting Wipes are triple-layered to clean, disinfect, deodorize and remove allergens for 5x Cleaning and leave a pleasant scent. Wipes remove common allergens, germs and messes on surfaces like kitchen counters, bathroom surfaces and more.'),(3,'Hand Sanitizer','images/san.jpg',100,5.00,'America\'s #1 instant hand sanitizer delivers advanced antimicrobial germ kill while being very kind to the skin. PURELL Advanced Instant Hand Sanitizer kills more than 99.99% of most common germs.This hand sanitizer works in as little as 15 seconds..'),(4,'Tissue','images/tissue.jpg',100,15.00,'Tissues provide just the right balance of softness, strength, & absorbency, making them the #1 facial tissue in America among national brands. Stand up to sniffles, sneezes, runny noses, & even little drips & spills with a durable.'),(5,'Gloves','images/gloves.jpg',100,26.00,'Ultimate value and incredible toughness, these Gloves areumb suited for laboratory printing, beauty salons, factory workshops, vehicle maintenance, tattoo hairdressing and so on. Latex-free and powder-free but chlorinated.'),(6,'COVID-19 Test Kits','images/testkits.jpg',100,30.00,'The kit uses a small blood sample and a reagent, and according to Kurabo, it can have a verdict in 15 minutes. It will take a small blood sample and display a red line if the test is positive for the coronavirus.'),(7,'Clorox','images/clorox.jpg',100,10.00,'Clorox Liquid Bleach now keeps clothes whiter longer and protects surfaces while it cleans. When used as directed, it has whitening power to make whites whiter and removes 70% more stains than detergent alone.'),(8,'Disposable Booties','images/DisposableBooties.jpg',100,40.00,'Shoe Covers Disposable. Disposable Shoe & Boot Covers Waterproof Slip Resistant Shoe Booties. Waterproof design helps to protect your shoes from liquid and dust. Great for Medical.'),(9,'Hand Soap','images/handsoap.jpg',100,5.00,'Liquid Hand Softsoap is carefully formulated using safe, effective ingredients leaving hands clean and soft. Just add water, lather and rinse for a basic clean. Soothes your spirit while cleansing hands.'),(10,'Scott Toilet Paper','images/scott.jpg',100,10.00,'With Scott 1,000 Toilet Paper enjoy fewer roll changes and more value for each bathroom around the home. Individually, each toilet paper roll contains 1,000 sheets, in this 12-roll pack, that is a total of 12,000 sheets. '),(11,'Tylenol Extra Strength','images/tynenol.jpg',100,10.00,'100-count of Tylenol Extra Strength Caplets with acetaminophen to provide temporary relief of minor aches and pains and help reduce fever. Each extra strength caplet contains 500 mg of acetaminophen for effective.'),(12,'Emergen-C','images/vitamin.jpg',100,9.00,'Emergen-C Original Formula in Super Orange flavor. Each serving provides daily immune support* with more Vitamin C than 10 oranges(1). Also contains B Vitamins, Electrolytes, and other Antioxidants like Zinc and Manganese');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-08 21:58:32
