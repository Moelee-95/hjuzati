CREATE DATABASE  IF NOT EXISTS `hima` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `hima`;
-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: hima
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,'raza',200),(2,'dara',200);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `accounts_num`
--

DROP TABLE IF EXISTS `accounts_num`;
/*!50001 DROP VIEW IF EXISTS `accounts_num`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `accounts_num` AS SELECT 
 1 AS `Admins`,
 1 AS `count(aAdminID)`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `adminhistory`
--

DROP TABLE IF EXISTS `adminhistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminhistory` (
  `ahID` int NOT NULL AUTO_INCREMENT,
  `ahFullName` varchar(45) DEFAULT NULL,
  `ahUserName` varchar(45) DEFAULT NULL,
  `ahPassword` varchar(45) DEFAULT NULL,
  `ahEmail` varchar(45) DEFAULT NULL,
  `ahAtTime` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ahID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminhistory`
--

LOCK TABLES `adminhistory` WRITE;
/*!40000 ALTER TABLE `adminhistory` DISABLE KEYS */;
INSERT INTO `adminhistory` VALUES (2,'mohammed','mo','mo','mo@mo.com','2021-05-19 12:59:44');
/*!40000 ALTER TABLE `adminhistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `aAdminID` int NOT NULL AUTO_INCREMENT,
  `aFullName` varchar(45) DEFAULT NULL,
  `aUserName` varchar(45) DEFAULT NULL,
  `aPassword` varchar(45) DEFAULT NULL,
  `aEmail` varchar(45) DEFAULT NULL,
  `aCreatingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`aAdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'mohammed','mo','mo','mo@mo.com','2021-02-18 08:15:45'),(2,'ali','ali','ali','ali@ali.com','2021-02-18 08:15:45');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `adminToUpper` BEFORE INSERT ON `admins` FOR EACH ROW SET NEW.aUserName =lower(new.aUserName) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `adminInfoHistory` AFTER UPDATE ON `admins` FOR EACH ROW INSERT INTO adminhistory(ahFullName,ahUserName,ahPassword,ahEmail,ahAtTime)
VALUES(old.aFullName, old.aUserName, old.aPassword, old.aEmail, NOW()) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `amenitiesoptions`
--

DROP TABLE IF EXISTS `amenitiesoptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amenitiesoptions` (
  `aID` int NOT NULL AUTO_INCREMENT,
  `aEn` varchar(45) DEFAULT NULL,
  `aAr` varchar(45) DEFAULT NULL,
  `aKu` varchar(45) DEFAULT NULL,
  `aDescription` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`aID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amenitiesoptions`
--

LOCK TABLES `amenitiesoptions` WRITE;
/*!40000 ALTER TABLE `amenitiesoptions` DISABLE KEYS */;
INSERT INTO `amenitiesoptions` VALUES (1,'Room amenities','مرفقات الغرفة','',''),(2,'bathroom','حمّام','',''),(3,'media & technology','ميديا وتكنولوجيا','',''),(4,'Food & drink','مأكولات ومشروبات','',''),(5,'Services & extras','الخدمات والإضافات','',''),(6,'Outdoor & view','أنشطة خارجية وإطلالات','',''),(7,'Layout','التصميم','',''),(8,'Entertainment and family services','خدمات عائلية وترفيهية','',''),(9,'Bath/Hot spring','ينابيع حارة','','');
/*!40000 ALTER TABLE `amenitiesoptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `amenitiesvalues`
--

DROP TABLE IF EXISTS `amenitiesvalues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amenitiesvalues` (
  `avID` int NOT NULL AUTO_INCREMENT,
  `amenitieOptionID` int NOT NULL,
  `avEn` varchar(255) DEFAULT NULL,
  `avAr` varchar(255) DEFAULT NULL,
  `avKu` varchar(255) DEFAULT NULL,
  `avDescription` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`avID`),
  KEY `fk_amenities_amenitiesOptions1_idx` (`amenitieOptionID`),
  CONSTRAINT `fk_amenities_amenitiesOptions1` FOREIGN KEY (`amenitieOptionID`) REFERENCES `amenitiesoptions` (`aID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amenitiesvalues`
--

LOCK TABLES `amenitiesvalues` WRITE;
/*!40000 ALTER TABLE `amenitiesvalues` DISABLE KEYS */;
INSERT INTO `amenitiesvalues` VALUES (1,1,'Flat-screen TV','تلفزيون بشاشة مسطحة','',''),(2,1,'Electric kettle','غلاية كهربائية','',''),(3,1,'Balcony','شرفة','',''),(4,1,'View','إطلالة','',''),(5,1,'Terrace','تراس','',''),(6,2,'Clothes rack','حمّالة ملابس','',''),(7,2,'Drying rack for clothing','منشر للغسيل','',''),(8,2,'Fold-up bed','سرير يمكن طويه','',''),(9,2,'Sofa bed','سرير أريكة','',''),(10,2,'Air conditioning','تكييف','',''),(11,2,'Wardrobe or closet','خزانة','',''),(12,2,'Carpeted','أرض مغطاة بالسجاد','',''),(13,2,'Dressing Room','غرفة ملابس','',''),(14,2,'Extra Long Beds (&gt; 2 metres)','أسرّة طويلة (أطول من مترين)','',''),(15,2,'Fan','مروحة','',''),(16,2,'Fireplace','مدفأة','',''),(17,2,'Heating','تدفئة','',''),(18,2,'Interconnected room(s) available','تتوفر غرفة / غرف متصلة','',''),(19,2,'Ironing Facilities','مكواة','',''),(20,2,'Mosquito net','مرافق كي الملابس','',''),(21,2,'Private entrance','مدخل خاص','',''),(22,2,'Safety Deposit Box','صندوق أمانات','',''),(23,2,'Sofa','أريكة','',''),(24,2,'Soundproofing','عازل للصوت','',''),(25,2,'Seating Area','منطقة جلوس','',''),(26,2,'Tile/Marble floor','بلاط / أرضية رخامية','',''),(27,2,'Pants Press','مكواة بناطيل','',''),(28,2,'Hardwood or parquet floors','أرضيات خشبية','',''),(29,2,'Desk','مكتب','',''),(30,2,'Hypoallergenic','مضادة للحساسية','',''),(31,2,'Cleaning products','أدوات تنظيف','',''),(32,2,'Electric blankets','بطانية كهربائية','',''),(33,3,'Toilet paper','ورق حمام','',''),(34,3,'Bath','حوض استحمام','',''),(35,3,'Bidet','شطافة','',''),(36,3,'Bath or Shower','حوض استحمام أو دش','',''),(37,3,'Private bathroom','حمّام خاص','',''),(38,3,'Free toiletries','لوازم استحمام مجانية','',''),(39,3,'Hairdryer','مجفف شعر','',''),(40,3,'Spa Bath','حوض سبا','',''),(41,3,'Shared bathroom','حمّام مشترك','',''),(42,3,'Shower','دش','',''),(43,3,'Slippers','نعال','',''),(44,3,'Toilet','مرحاض','',''),(45,4,'Computer','كمبيوتر','',''),(46,4,'Game console','مشغل ألعاب','',''),(47,4,'Game console – Nintendo Wii','مع مشغل ألعاب Nintendo Wii','',''),(48,4,'Game console – PS2','مشغل ألعاب - PS2','',''),(49,4,'Game console – PS3','مشغل ألعاب - PS3','',''),(50,4,'Game console – Xbox 360','مشغل ألعاب - Xbox 360','',''),(51,4,'Laptop','لابتوب','',''),(52,4,'iPad','iPad','',''),(53,4,'Cable Channels','قنوات كابل','',''),(54,4,'CD Player','مشغل CD','',''),(55,4,'DVD Player','مشغل DVD','',''),(56,4,'Fax','فاكس','',''),(57,4,'iPod dock','قاعدة لتشغيل الـ iPod','',''),(58,4,'Laptop safe','خزنة لابتوب','',''),(59,4,'Flat-screen TV','تلفزيون بشاشة مسطحة','',''),(60,4,'Pay-per-view Channels','قنوات مدفوعة','',''),(61,4,'Radio','راديو','',''),(62,4,'Satellite Channels','قنوات فضائية','',''),(63,4,'Telephone','هاتف','',''),(64,4,'TV','تلفزيون','',''),(65,4,'Video','فيديو','',''),(66,4,'Video Games','ألعاب فيديو','',''),(67,4,'Blu-ray player','مشغل بلو راي (Blu-ray)','',''),(68,5,'Dining area','منطقة لتناول الطعام','',''),(69,5,'Dining table','طاولة لتناول الطعام','',''),(70,5,'Barbecue','مرافق شواء','',''),(71,5,'Stovetop','موقد','',''),(72,5,'Toaster','محمصة خبز','',''),(73,5,'Electric kettle','غلاية كهربائية','',''),(74,5,'Outdoor dining area','منطقة خارجية لتناول الطعام','',''),(75,5,'Outdoor furniture','أثاث خارجي','',''),(76,5,'Minibar','ميني بار','',''),(77,5,'Kitchenette','مطبخ صغير','',''),(78,5,'Kitchenware','أدوات مطبخ','',''),(79,5,'Microwave','ميكروويف','',''),(80,5,'Refrigerator','ثلاجة','',''),(81,5,'Tea/Coffee Maker','آلة صنع الشاي / القهوة','',''),(82,5,'Coffee machine','آلة صنع القهوة','',''),(83,5,'Children\'s high chair','كرسي مرتفع للأطفال','',''),(84,6,'Executive Lounge Access','إمكانية الدخول إلى الصالة التنفيذية','',''),(85,6,'Alarm clock','ساعة منبّهة','',''),(86,6,'Wake-up service','خدمة إيقاظ','',''),(87,6,'Wake Up Service/Alarm Clock','خدمة الإيقاظ / ساعة منبهة','',''),(88,6,'Linen','بياضات أسرّة','',''),(89,6,'Towels','مناشف','',''),(90,6,'Towels/Sheets (extra fee)','مناشف / بياضات (بتكلفة إضافية)','',''),(91,7,'Balcony','شرفة','',''),(92,7,'Patio','باحة','',''),(93,8,'View','إطلالة','',''),(94,8,'Terrace','تراس','',''),(95,8,'City view','إطلالة على المدينة','',''),(96,8,'Garden view','إطلالة على الحديقة','',''),(97,8,'Lake view','إطلالة على البحيرة','',''),(98,8,'Landmark view','إطلالة على معلم','',''),(99,8,'Mountain view','إطلالة على الجبل','',''),(100,8,'Pool view','إطلالة على المسبح','',''),(101,8,'River view','إطلالة على النهر','',''),(102,8,'Sea view','إطلالة على البحر','',''),(103,9,'Room is situated on the ground floor','الغرفة تقع في الطابق الأرضي','',''),(104,9,'Room is entirely wheelchair accessible','الغرفة مجهزة بالكامل لتناسب الضيوف على الكرسي المتحرك','',''),(105,9,'Upper floors accessible by elevator','يمكن الوصول إلى الطوابق العلوية عن طريق المصعد','',''),(106,9,'Upper floors accessible by stairs only','يمكن الوصول إلى الطوابق العليا عن طريق السلالم فقط','',''),(107,9,'Toilet with grab rails','مرحاض بمقابض','',''),(108,9,'Baby safety gates','بوابات سلامة للأطفال','',''),(109,9,'Board games/puzzles','ألعاب لوحية / ألغاز','',''),(110,9,'Books, DVDs, or music for children','كتب أو دي في دي (DVD) أو موسيقى للأطفال','',''),(111,9,'Child safety socket covers','مقابس محمية للأطفال','','');
/*!40000 ALTER TABLE `amenitiesvalues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `available_hotels`
--

DROP TABLE IF EXISTS `available_hotels`;
/*!50001 DROP VIEW IF EXISTS `available_hotels`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `available_hotels` AS SELECT 
 1 AS `hHotelID`,
 1 AS `hUserID`,
 1 AS `hHotelName`,
 1 AS `hHotelRating`,
 1 AS `hAddress2`,
 1 AS `hCity`,
 1 AS `hState`,
 1 AS `hZipCode`,
 1 AS `hMainPhoneNumber`,
 1 AS `hNormalNumber`,
 1 AS `hCompanyMailAddress`,
 1 AS `hWebsiteAddress`,
 1 AS `hLogoPath`,
 1 AS `hActive`,
 1 AS `hAddress`,
 1 AS `hMapsLocation`,
 1 AS `hCreatingDate`,
 1 AS `contact_name`,
 1 AS `contact_email`,
 1 AS `contact_phone`,
 1 AS `contact_phone_2`,
 1 AS `hMainPhotoID`,
 1 AS `rRoomID`,
 1 AS `rHotelID`,
 1 AS `rRoomStatusID`,
 1 AS `rRoomNameID`,
 1 AS `rMaxPas`,
 1 AS `rFloor`,
 1 AS `rRoomsNumbers`,
 1 AS `rDescription`,
 1 AS `rCustomName`,
 1 AS `rSmokingPolicy`,
 1 AS `rRoomSize`,
 1 AS `rLowestPrice`,
 1 AS `rOfferLower`,
 1 AS `rDisscount`,
 1 AS `rCreatingDate`,
 1 AS `num_bed_rooms`,
 1 AS `num_living_rooms`,
 1 AS `num_bathrooms`,
 1 AS `beds_kinds`,
 1 AS `bed_num`,
 1 AS `rRateID`,
 1 AS `rRoomsID`,
 1 AS `hotels_rates_id`,
 1 AS `rRate`,
 1 AS `rDate`,
 1 AS `rARoomsNum`,
 1 AS `rAddingDate`,
 1 AS `rOpenClose`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `blocked_list`
--

DROP TABLE IF EXISTS `blocked_list`;
/*!50001 DROP VIEW IF EXISTS `blocked_list`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `blocked_list` AS SELECT 
 1 AS `User Name`,
 1 AS `User ID`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `bBookingID` int NOT NULL AUTO_INCREMENT,
  `bHotelID` int NOT NULL,
  `bGuestID` int DEFAULT NULL,
  `bBookingStatusID` int DEFAULT NULL,
  `bPaymentStatusID` int NOT NULL DEFAULT '1',
  `bDateFrom` varchar(45) DEFAULT NULL,
  `bDateTo` varchar(45) DEFAULT NULL,
  `bNumOfNights` int DEFAULT NULL,
  `bNumOfGuests` int DEFAULT NULL,
  `bNumOfChildren` int DEFAULT NULL,
  `bCreatingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bDisscount` double DEFAULT NULL,
  `bRate` double DEFAULT NULL,
  `paymentMethod` int DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `totalAmount` double DEFAULT NULL,
  `fullName` varchar(45) DEFAULT NULL,
  `phoneNumber` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `paid` double DEFAULT NULL,
  `remaining` double DEFAULT NULL,
  PRIMARY KEY (`bBookingID`),
  KEY `fk_bookings_guests1_idx` (`bGuestID`),
  KEY `fk_bookings_bookingStatus1_idx` (`bBookingStatusID`),
  KEY `fk_bookings_paymentstatus1_idx` (`bPaymentStatusID`),
  KEY `fk_bookings_paymentMethod_idx` (`paymentMethod`),
  CONSTRAINT `fk_bookings_bookingStatus1` FOREIGN KEY (`bBookingStatusID`) REFERENCES `bookingstatus` (`bsBookingStatusID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_bookings_guests1` FOREIGN KEY (`bGuestID`) REFERENCES `guests` (`gGuestID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_bookings_payment` FOREIGN KEY (`paymentMethod`) REFERENCES `payments` (`pID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_bookings_paymentstatus1` FOREIGN KEY (`bPaymentStatusID`) REFERENCES `paymentstatus` (`paymentStatusId`)
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (227,24,NULL,NULL,1,'2022-01-19','2022-01-22',3,1,1,'2022-01-16 13:40:04',NULL,NULL,2,'1111111',180,'Mohammed Hazim','+9647701233211','mohamadsalah1995@yahoo.com','Erbil',NULL,NULL),(228,24,114,NULL,1,'2022-01-16','2022-01-18',2,1,1,'2022-01-16 16:10:00',NULL,NULL,2,'12249',400,'للا ليلا فلتب','+964770866665','mohamadsalah11998822@gmail.com','Baghdad',NULL,NULL),(229,24,NULL,NULL,1,'2022-01-18','2022-01-19',1,1,1,'2022-01-16 16:16:02',NULL,NULL,2,NULL,60,'i love mohammad','+9647701231231','mohamadsalah11998822@gmail.com','Baghdad',NULL,NULL),(230,25,114,NULL,1,'2022-01-17','2022-01-31',14,4,2,'2022-01-17 07:16:08',NULL,NULL,2,NULL,2800,'i love mohammad','+9647701231231','mohamadsalah11998822@gmail.com','Baghdad',NULL,NULL);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `insertNights` BEFORE INSERT ON `bookings` FOR EACH ROW SET NEW.bNumOfNights = DATEDIFF(NEW.bDateTo, NEW.bDateFrom) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `bookingstatus`
--

DROP TABLE IF EXISTS `bookingstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookingstatus` (
  `bsBookingStatusID` int NOT NULL,
  `bsStatus` varchar(45) DEFAULT NULL,
  `bsDescription` varchar(45) DEFAULT NULL,
  `bsSortOrder` varchar(45) DEFAULT NULL,
  `bsActive` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`bsBookingStatusID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookingstatus`
--

LOCK TABLES `bookingstatus` WRITE;
/*!40000 ALTER TABLE `bookingstatus` DISABLE KEYS */;
INSERT INTO `bookingstatus` VALUES (1,'Pending','wating for the hotel to confirm','',''),(2,'Canceled-hotel','Canceld by hotel','',''),(3,'Canceled-guest','Canceld by the guest or agency','',''),(4,'Paid-confirmd','Paid and confirmed','',''),(5,'Paid-unconfirmd','Paid but not confirmd by hotel','','');
/*!40000 ALTER TABLE `bookingstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `city` varchar(45) DEFAULT NULL,
  `city_ar` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'Baghdad',NULL),(2,'Mosul',NULL),(3,'Al Basrah',NULL),(4,'Kirkuk',NULL),(5,'Erbil',NULL),(6,'An Najaf',NULL),(7,'Karbala\'',NULL),(8,'As Sulaymaniyah',NULL),(9,'An Nasiriyah',NULL),(10,'Al Hillah',NULL),(11,'Ba`qubah',NULL),(12,'Ar Ramadi',NULL),(13,'Ad Diwaniyah',NULL),(14,'Az Zubayr',NULL),(15,'Al `Amarah',NULL),(16,'Dahuk',NULL),(17,'Al Fallujah',NULL),(18,'Al Kut',NULL),(19,'As Samawah',NULL),(20,'Al Kufah',NULL),(21,'Ash Shatrah',NULL),(22,'Samarra\'',NULL),(23,'Zakhu',NULL),(24,'Umm Qasr',NULL),(25,'Tikrit',NULL),(26,'Al Faw',NULL),(27,'Nahiyat al Karmah',NULL),(28,'Sinjar',NULL),(29,'Al Hayy',NULL),(30,'Tall `Afar',NULL),(31,'Balad',NULL),(32,'Al Musayyib',NULL),(33,'Az Zubaydiyah',NULL),(34,'Hit',NULL),(35,'Halabjah',NULL),(36,'Qaladizay',NULL),(37,'Mandali',NULL),(38,'Shaqlawah',NULL),(39,'Ar Rutbah',NULL),(40,'Kuysinjaq',NULL),(41,'Rawah',NULL),(42,'Hammam al `Alil',NULL),(43,'Al `Amadiyah',NULL);
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilitesvalues`
--

DROP TABLE IF EXISTS `facilitesvalues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facilitesvalues` (
  `fID` int NOT NULL AUTO_INCREMENT,
  `fFacilitesOptionsID` int NOT NULL,
  `fOptionsEn` varchar(45) DEFAULT NULL,
  `fOptionsAr` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`fID`),
  KEY `fk_facilites_facilitiesOptions1_idx` (`fFacilitesOptionsID`),
  CONSTRAINT `fk_facilites_facilitiesOptions1` FOREIGN KEY (`fFacilitesOptionsID`) REFERENCES `facilitiesoptions` (`fFaciliteID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilitesvalues`
--

LOCK TABLES `facilitesvalues` WRITE;
/*!40000 ALTER TABLE `facilitesvalues` DISABLE KEYS */;
INSERT INTO `facilitesvalues` VALUES (1,1,'Not Available','غير متاح'),(2,1,'Yes, Free','نعم ، مجانًا'),(3,1,'Yes, Paid','نعم ، مدفوع'),(4,2,'Not Available','غير متاح'),(5,2,'Yes, Free','نعم ، مجانًا'),(6,2,'Yes, Paid','نعم ، مدفوع'),(7,3,'Not Available','غير متاح'),(8,3,'Yes, included in the price','نعم ، مدرج في السعر'),(9,3,'Yes, it\'s Optional','نعم ، إنه اختياري'),(10,4,'English','الإنجليزية'),(11,4,'Arabic','عربى'),(12,4,'Kurdish','كردي'),(13,4,'French','فرنسي'),(14,4,'Russian','الروسية'),(15,4,'Spanish','الأسبانية'),(16,4,'Persian','اللغة الفارسية'),(17,4,'Turkish','اللغة التركية'),(18,5,'No','لا'),(19,5,'Yes','نعم'),(20,6,'No','لا'),(21,6,'Yes','نعم'),(22,7,'No','لا'),(23,7,'Yes','نعم'),(24,8,'No','لا'),(25,8,'Yes','نعم'),(26,9,'No','لا'),(27,9,'Yes','نعم'),(28,10,'No','لا'),(29,10,'Yes','نعم'),(30,11,'No','لا'),(31,11,'Yes','نعم'),(32,12,'No','لا'),(33,12,'Yes','نعم'),(34,13,'No','لا'),(35,13,'Yes','نعم'),(36,14,'No','لا'),(37,14,'Yes','نعم'),(38,15,'No','لا'),(39,15,'Yes','نعم'),(40,16,'No','لا'),(41,16,'Yes','نعم'),(42,17,'No','لا'),(43,17,'Yes','نعم'),(44,18,'No','لا'),(45,18,'Yes','نعم'),(46,19,'No','لا'),(47,19,'Yes','نعم'),(48,20,'No','لا'),(49,20,'Yes','نعم'),(50,21,'No','لا'),(51,21,'Yes','نعم'),(52,22,'No','لا'),(53,22,'Yes','نعم');
/*!40000 ALTER TABLE `facilitesvalues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilitiesoptions`
--

DROP TABLE IF EXISTS `facilitiesoptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facilitiesoptions` (
  `fFaciliteID` int NOT NULL AUTO_INCREMENT,
  `fFaciliteNameEn` varchar(45) NOT NULL,
  `fFaciliteNameAr` varchar(45) DEFAULT NULL,
  `fFaciliteNameKu` varchar(45) DEFAULT NULL,
  `fFaciliteDescription` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`fFaciliteID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilitiesoptions`
--

LOCK TABLES `facilitiesoptions` WRITE;
/*!40000 ALTER TABLE `facilitiesoptions` DISABLE KEYS */;
INSERT INTO `facilitiesoptions` VALUES (1,'Internet','خدمة الأنترنت','',''),(2,'Parking','كراج ركن السيارات','',''),(3,'Breakfast','فطور صباحي','',''),(4,'Languages Spoken','الغات المتحدث بها','',''),(5,'FreeWiFi','واي فاي مجاني','',''),(6,'Restaurant','مطعم','',''),(7,'Roomservice','خدمة الغرف','',''),(8,'Bar','بار','',''),(9,'24-hourfrontdesk','مكتب استقبال على مدار 24 ساعة','',''),(10,'Sauna','ساونا','',''),(11,'Fitnesscentre','مركز للياقة البدنية','',''),(12,'Garden','حديقة','',''),(13,'Terrace','تراس','',''),(14,'Non-smokingrooms','غرف لغير المدخنين','',''),(15,'Airportshuttle','خدمة نقل المطار','',''),(16,'Familyrooms','غرف عائلية','',''),(17,'Spaandwellnesscentre','منتجع صحي ومركز صحي','',''),(18,'Hottub/jacuzzi','حوض استحمام ساخن/جاكوزي','',''),(19,'Airconditioning','تكييف','',''),(20,'Waterpark','ملهى مائي','',''),(21,'Electricvehiclechargingstation','محطة شحن السيارات الكهربائية','',''),(22,'Swimmingpool','مسبح','','');
/*!40000 ALTER TABLE `facilitiesoptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guests`
--

DROP TABLE IF EXISTS `guests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guests` (
  `gGuestID` int NOT NULL AUTO_INCREMENT,
  `gFullName` varchar(45) DEFAULT NULL,
  `gUserName` varchar(45) DEFAULT NULL,
  `gPassword` varchar(45) DEFAULT NULL,
  `gAddress` varchar(45) DEFAULT NULL,
  `gAddress2` varchar(45) DEFAULT NULL,
  `gCity` varchar(45) DEFAULT NULL,
  `gState` varchar(45) DEFAULT NULL,
  `gZipCode` varchar(45) DEFAULT NULL,
  `gCountry` varchar(45) DEFAULT NULL,
  `gPhoneNumber` varchar(45) DEFAULT NULL,
  `gEmail` varchar(45) DEFAULT NULL,
  `gGender` varchar(45) DEFAULT NULL,
  `gStatus` int DEFAULT NULL,
  `avatar` varchar(254) DEFAULT NULL,
  `gCreatingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gDOB` date DEFAULT NULL,
  PRIMARY KEY (`gGuestID`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guests`
--

LOCK TABLES `guests` WRITE;
/*!40000 ALTER TABLE `guests` DISABLE KEYS */;
INSERT INTO `guests` VALUES (114,'ali','ali111','ali',NULL,NULL,NULL,NULL,NULL,NULL,'+9647701111111',NULL,'',NULL,NULL,'2022-01-17 11:38:32','1999-01-01');
/*!40000 ALTER TABLE `guests` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `guestToUpper` BEFORE INSERT ON `guests` FOR EACH ROW SET NEW.gUserName =lower(new.gUserName) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `guests_favorites`
--

DROP TABLE IF EXISTS `guests_favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guests_favorites` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hotels_hHotelID` int DEFAULT NULL,
  `guests_gGuestID` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_guests_favorites_hotels1_idx` (`hotels_hHotelID`),
  KEY `fk_guests_favorites_guests1_idx` (`guests_gGuestID`),
  CONSTRAINT `fk_guests_favorites_guests1` FOREIGN KEY (`guests_gGuestID`) REFERENCES `guests` (`gGuestID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_guests_favorites_hotels1` FOREIGN KEY (`hotels_hHotelID`) REFERENCES `hotels` (`hHotelID`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guests_favorites`
--

LOCK TABLES `guests_favorites` WRITE;
/*!40000 ALTER TABLE `guests_favorites` DISABLE KEYS */;
/*!40000 ALTER TABLE `guests_favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hotels` (
  `hHotelID` int NOT NULL AUTO_INCREMENT,
  `hUserID` int NOT NULL,
  `hHotelName` varchar(45) DEFAULT NULL,
  `hHotelRating` varchar(45) DEFAULT NULL,
  `hAddress2` varchar(45) DEFAULT NULL,
  `hCity` varchar(45) DEFAULT NULL,
  `hState` varchar(45) DEFAULT NULL,
  `hZipCode` varchar(45) DEFAULT NULL,
  `hMainPhoneNumber` varchar(45) DEFAULT NULL,
  `hNormalNumber` varchar(45) DEFAULT NULL,
  `hCompanyMailAddress` varchar(45) DEFAULT NULL,
  `hWebsiteAddress` varchar(45) DEFAULT NULL,
  `hLogoPath` varchar(45) DEFAULT NULL,
  `hActive` varchar(45) DEFAULT NULL,
  `hAddress` varchar(45) DEFAULT NULL,
  `hMapsLocation` varchar(255) DEFAULT NULL,
  `hCreatingDate` varchar(45) DEFAULT NULL,
  `contact_name` varchar(45) DEFAULT NULL,
  `contact_email` varchar(45) DEFAULT NULL,
  `contact_phone` varchar(45) DEFAULT NULL,
  `contact_phone_2` varchar(45) DEFAULT NULL,
  `hMainPhotoID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`hHotelID`),
  KEY `fk_hotels_users1_idx` (`hUserID`),
  CONSTRAINT `fk_hotels_users1` FOREIGN KEY (`hUserID`) REFERENCES `users` (`uUserID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels`
--

LOCK TABLES `hotels` WRITE;
/*!40000 ALTER TABLE `hotels` DISABLE KEYS */;
INSERT INTO `hotels` VALUES (24,41,'Hjuzati','4 ✯✯✯✯',NULL,'Sulaymaniyah',NULL,'4003','07708138928','+9647708138928','hjuzati@mail.com',NULL,NULL,NULL,'Sarchnar, Near Nali Cafee','https://www.google.com/maps/@35.6142523,45.3491238,20z',NULL,'Mohammed',NULL,NULL,NULL,'222'),(25,41,'Hima Hotel','5 ✯✯✯✯✯',NULL,'Sulaymaniyah',NULL,'46001','07708138928','','mohammed@mohammed.com',NULL,NULL,NULL,'','',NULL,'Mohammed Salahadin Hazim',NULL,NULL,NULL,'224');
/*!40000 ALTER TABLE `hotels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels_has_amenitiesvalues`
--

DROP TABLE IF EXISTS `hotels_has_amenitiesvalues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hotels_has_amenitiesvalues` (
  `id` int NOT NULL AUTO_INCREMENT,
  `amenitiesvalues_avID` int NOT NULL,
  `hotels_hHotelID` int NOT NULL,
  PRIMARY KEY (`id`,`amenitiesvalues_avID`,`hotels_hHotelID`),
  KEY `fk_hotels_has_amenitiesvalues_amenitiesvalues1_idx` (`amenitiesvalues_avID`),
  KEY `fk_hotels_has_amenitiesvalues_hotels1_idx` (`hotels_hHotelID`),
  CONSTRAINT `fk_hotels_has_amenitiesvalues_amenitiesvalues1` FOREIGN KEY (`amenitiesvalues_avID`) REFERENCES `amenitiesvalues` (`avID`),
  CONSTRAINT `fk_hotels_has_amenitiesvalues_hotels1` FOREIGN KEY (`hotels_hHotelID`) REFERENCES `hotels` (`hHotelID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels_has_amenitiesvalues`
--

LOCK TABLES `hotels_has_amenitiesvalues` WRITE;
/*!40000 ALTER TABLE `hotels_has_amenitiesvalues` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotels_has_amenitiesvalues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels_has_facilitesvalues`
--

DROP TABLE IF EXISTS `hotels_has_facilitesvalues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hotels_has_facilitesvalues` (
  `id` int NOT NULL AUTO_INCREMENT,
  `facilitesvalues_fID` int NOT NULL,
  `hotels_hHotelID` int NOT NULL,
  PRIMARY KEY (`id`,`facilitesvalues_fID`,`hotels_hHotelID`),
  KEY `fk_hotels_has_facilitesvalues_facilitesvalues1_idx` (`facilitesvalues_fID`),
  KEY `fk_hotels_has_facilitesvalues_hotels1_idx` (`hotels_hHotelID`),
  CONSTRAINT `fk_hotels_has_facilitesvalues_facilitesvalues1` FOREIGN KEY (`facilitesvalues_fID`) REFERENCES `facilitesvalues` (`fID`),
  CONSTRAINT `fk_hotels_has_facilitesvalues_hotels1` FOREIGN KEY (`hotels_hHotelID`) REFERENCES `hotels` (`hHotelID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels_has_facilitesvalues`
--

LOCK TABLES `hotels_has_facilitesvalues` WRITE;
/*!40000 ALTER TABLE `hotels_has_facilitesvalues` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotels_has_facilitesvalues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels_has_payments`
--

DROP TABLE IF EXISTS `hotels_has_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hotels_has_payments` (
  `payments_pID` int NOT NULL,
  `hotels_hHotelID` int NOT NULL,
  PRIMARY KEY (`payments_pID`,`hotels_hHotelID`),
  KEY `fk_hotels_has_payments_payments1_idx` (`payments_pID`),
  KEY `fk_hotels_has_payments_hotels1_idx` (`hotels_hHotelID`),
  CONSTRAINT `fk_hotels_has_payments_hotels1` FOREIGN KEY (`hotels_hHotelID`) REFERENCES `hotels` (`hHotelID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_hotels_has_payments_payments1` FOREIGN KEY (`payments_pID`) REFERENCES `payments` (`pID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels_has_payments`
--

LOCK TABLES `hotels_has_payments` WRITE;
/*!40000 ALTER TABLE `hotels_has_payments` DISABLE KEYS */;
INSERT INTO `hotels_has_payments` VALUES (1,24),(2,24),(3,24),(3,25);
/*!40000 ALTER TABLE `hotels_has_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels_has_policies`
--

DROP TABLE IF EXISTS `hotels_has_policies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hotels_has_policies` (
  `hotels_hHotelID` int NOT NULL,
  `policiesoptions` int NOT NULL,
  `policiesvalues_pID` int NOT NULL,
  PRIMARY KEY (`hotels_hHotelID`,`policiesoptions`),
  KEY `fk_hotels_has_policiesvalues_policiesvalues1_idx` (`policiesvalues_pID`),
  KEY `fk_hotels_has_policiesvalues_hotels1_idx` (`hotels_hHotelID`),
  KEY `link_to_policies_options_idx` (`policiesoptions`),
  CONSTRAINT `link_to_hotels` FOREIGN KEY (`hotels_hHotelID`) REFERENCES `hotels` (`hHotelID`),
  CONSTRAINT `link_to_policies` FOREIGN KEY (`policiesoptions`) REFERENCES `policiesoptions` (`pPoliceID`),
  CONSTRAINT `link_to_policies_values` FOREIGN KEY (`policiesvalues_pID`) REFERENCES `policiesvalues` (`pID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels_has_policies`
--

LOCK TABLES `hotels_has_policies` WRITE;
/*!40000 ALTER TABLE `hotels_has_policies` DISABLE KEYS */;
INSERT INTO `hotels_has_policies` VALUES (25,1,1),(24,1,2),(24,2,7),(25,2,8),(24,4,11),(25,4,12),(25,5,15),(24,6,17),(25,6,17),(25,7,21),(24,8,23),(25,8,23),(24,9,25),(25,9,25);
/*!40000 ALTER TABLE `hotels_has_policies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels_rates`
--

DROP TABLE IF EXISTS `hotels_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hotels_rates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rtID` int NOT NULL,
  `hotels_hHotelID` int NOT NULL,
  PRIMARY KEY (`id`,`hotels_hHotelID`),
  KEY `fk_hotels_rates_ratetypes1_idx` (`rtID`),
  KEY `fk_hotels_rates_hotels1_idx` (`hotels_hHotelID`),
  CONSTRAINT `fk_hotels_rates_hotels1` FOREIGN KEY (`hotels_hHotelID`) REFERENCES `hotels` (`hHotelID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_hotels_rates_ratetypes1` FOREIGN KEY (`rtID`) REFERENCES `ratetypes` (`rtRateTypeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels_rates`
--

LOCK TABLES `hotels_rates` WRITE;
/*!40000 ALTER TABLE `hotels_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotels_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `hotels_users`
--

DROP TABLE IF EXISTS `hotels_users`;
/*!50001 DROP VIEW IF EXISTS `hotels_users`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `hotels_users` AS SELECT 
 1 AS `hHotelName`,
 1 AS `uFullName`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `hotelsphotos`
--

DROP TABLE IF EXISTS `hotelsphotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hotelsphotos` (
  `hpID` int NOT NULL AUTO_INCREMENT,
  `hpPath` varchar(255) DEFAULT NULL,
  `hpDescription` varchar(255) DEFAULT NULL,
  `hotels_hHotelID` int NOT NULL,
  PRIMARY KEY (`hpID`,`hotels_hHotelID`),
  KEY `fk_hotelsphotos_hotels1_idx` (`hotels_hHotelID`),
  CONSTRAINT `fk_hotelsphotos_hotels1` FOREIGN KEY (`hotels_hHotelID`) REFERENCES `hotels` (`hHotelID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotelsphotos`
--

LOCK TABLES `hotelsphotos` WRITE;
/*!40000 ALTER TABLE `hotelsphotos` DISABLE KEYS */;
INSERT INTO `hotelsphotos` VALUES (222,'../../..//users/41/hotels/24/photos/1641935654photo1.jpg',NULL,24),(223,'../../..//users/41/hotels/25/photos/1642403630IMG_20211010_134000.jpg',NULL,25),(224,'../../..//users/41/hotels/25/photos/1642403637IMG_20211010_141845.jpg',NULL,25),(225,'../../..//users/41/hotels/25/photos/1642403647IMG_20211010_141748.jpg',NULL,25);
/*!40000 ALTER TABLE `hotelsphotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `no_of_hotels_in_each_city`
--

DROP TABLE IF EXISTS `no_of_hotels_in_each_city`;
/*!50001 DROP VIEW IF EXISTS `no_of_hotels_in_each_city`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `no_of_hotels_in_each_city` AS SELECT 
 1 AS `City`,
 1 AS `Number of hotels`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `pID` int NOT NULL AUTO_INCREMENT,
  `pName` varchar(45) DEFAULT NULL,
  `pType` varchar(45) DEFAULT NULL,
  `pPath` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`pID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,'Asia Hawala','Online','img/credit_cards/asia-hawala-en.png'),(2,'Fast Pay','Online','img/credit_cards/fast-pay.png'),(3,'Zain Cash','Online','img/credit_cards/zain-cash.png'),(4,'cash on arrival','Onsite','img/credit_cards/cash.png'),(5,'Cash','Onsite','img/credit_cards/cash.png');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentstatus`
--

DROP TABLE IF EXISTS `paymentstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paymentstatus` (
  `paymentStatusId` int NOT NULL AUTO_INCREMENT,
  `psStatus` varchar(45) DEFAULT NULL,
  `psDescription` varchar(255) DEFAULT NULL,
  `psActive` int DEFAULT NULL,
  PRIMARY KEY (`paymentStatusId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentstatus`
--

LOCK TABLES `paymentstatus` WRITE;
/*!40000 ALTER TABLE `paymentstatus` DISABLE KEYS */;
INSERT INTO `paymentstatus` VALUES (1,'Not paid','When the payment is not done',1),(2,'Paid','When the guest/ company paid the booking',1),(3,'Credit Card Expire','When guest/Company faces problem with their credit card because it\'s expire',1),(4,'Credit Card No enugh balance','When the Credit card of guest/ company doesn\'t have enugh balance to pay the booking',1);
/*!40000 ALTER TABLE `paymentstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `policiesoptions`
--

DROP TABLE IF EXISTS `policiesoptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `policiesoptions` (
  `pPoliceID` int NOT NULL AUTO_INCREMENT,
  `pPoliceNameEn` varchar(255) NOT NULL,
  `pPoliceNameAr` varchar(255) DEFAULT NULL,
  `pPoliceNameKu` varchar(255) DEFAULT NULL,
  `pPoliceDescriptioin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pPoliceID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `policiesoptions`
--

LOCK TABLES `policiesoptions` WRITE;
/*!40000 ALTER TABLE `policiesoptions` DISABLE KEYS */;
INSERT INTO `policiesoptions` VALUES (1,'days in advance can guests cancel free of charge','عدد الأيام التي يمكن للضيف الغاء الحجز بدون رسوم','',''),(2,'or guests will pay 100%','خلاف ذلك سيدفع الزبون 100%','',''),(3,'Protect against accidental bookings','الحماية من الحجوزات الوهمية','',''),(4,'Check-in from','وقت النزول الى الفندق من','',''),(5,'Check-in to','وقت النزول الى الفندق الى','',''),(6,'Check-out from','وقت الخروج الى الفندق من','',''),(7,'Check-out to','وقت الخروج الى الفندق الى','',''),(8,'Children','الأطفال','',''),(9,'allow pets','السماح للحيوانات','',''),(10,'additional charges for pets','رسوم اضافية على الحيوانات','','');
/*!40000 ALTER TABLE `policiesoptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `policiesvalues`
--

DROP TABLE IF EXISTS `policiesvalues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `policiesvalues` (
  `pID` int NOT NULL AUTO_INCREMENT,
  `pPoliciesID` int NOT NULL,
  `pOptionEn` varchar(255) DEFAULT NULL,
  `pOptionAr` varchar(255) DEFAULT NULL,
  `pDescription` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`pID`),
  KEY `fk_policies_policiesOptions1_idx` (`pPoliciesID`),
  CONSTRAINT `fk_policies_policiesOptions1` FOREIGN KEY (`pPoliciesID`) REFERENCES `policiesoptions` (`pPoliceID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `policiesvalues`
--

LOCK TABLES `policiesvalues` WRITE;
/*!40000 ALTER TABLE `policiesvalues` DISABLE KEYS */;
INSERT INTO `policiesvalues` VALUES (1,1,'Day of arrival (18:00)','يوم الوصول (18:00)',''),(2,1,'1 day','يوم 1',''),(3,1,'2 day','يومان',''),(4,1,'3 days','3 أيام',''),(5,1,'7 days','7 أيام',''),(6,1,'14 days','14 يوما',''),(7,2,'of the first night','الليلة الأولى',''),(8,2,'of the full stay','من الإقامة الكاملة',''),(9,3,'Yes','نعم',''),(10,3,'No','لا',''),(11,4,'12:00 PM','12:00 مسائا',''),(12,4,'2:00 PM','2:00:00 مسائا',''),(13,4,'3:00 PM','3:00:00 مسائا',''),(14,5,'12:00 PM','12:00 مسائا',''),(15,5,'10:00 PM','10:00 مسائا',''),(16,5,'12:00 AM','12:00 صباحا',''),(17,6,'12:00 AM','12:00 صباحا',''),(18,6,'10:00 AM','10:00 صباحا',''),(19,6,'12:00 PM','12:00 مسائا',''),(20,7,'10:00 AM','10:00 صباحا',''),(21,7,'11:00 AM','11:00 صباحا',''),(22,7,'12:00 PM','12:00 مسائا',''),(23,8,'Yes','نعم',''),(24,8,'No','لا',''),(25,9,'No','لا',''),(26,9,'Yes','نعم',''),(27,9,'Upon request','عند الطلب',''),(28,10,'Pets can stay for free (free)','يمكن للحيوانات الأليفة الإقامة مجانًا (مجانًا)',''),(29,10,'Charges may apply(paid)','قد يتم تطبيق رسوم (مدفوعة)','');
/*!40000 ALTER TABLE `policiesvalues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rates`
--

DROP TABLE IF EXISTS `rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rates` (
  `rRateID` int NOT NULL AUTO_INCREMENT,
  `rRoomsID` int NOT NULL,
  `hotels_rates_id` int DEFAULT NULL,
  `rRate` double DEFAULT NULL,
  `rDate` date DEFAULT NULL,
  `rARoomsNum` int DEFAULT NULL,
  `rAddingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rOpenClose` int DEFAULT NULL,
  `rRateTypeID` int DEFAULT NULL,
  PRIMARY KEY (`rRateID`),
  KEY `fk_rates_rooms1_idx` (`rRoomsID`),
  KEY `fk_rates_hotels_rates1_idx` (`hotels_rates_id`),
  KEY `fk_ratetypes_rates_idx` (`rRateTypeID`),
  CONSTRAINT `fk_rates_hotels_rates1` FOREIGN KEY (`hotels_rates_id`) REFERENCES `hotels_rates` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_rates_rooms1` FOREIGN KEY (`rRoomsID`) REFERENCES `rooms` (`rRoomID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ratetypes_rates` FOREIGN KEY (`rRateTypeID`) REFERENCES `ratetypes` (`rtRateTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=570 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rates`
--

LOCK TABLES `rates` WRITE;
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
INSERT INTO `rates` VALUES (503,76,NULL,20,'2022-01-05',11,'2022-01-11 21:16:32',1,1),(504,76,NULL,20,'2022-01-01',11,'2022-01-11 21:16:32',1,1),(505,76,NULL,20,'2022-01-04',11,'2022-01-11 21:16:32',1,1),(506,76,NULL,20,'2022-01-06',11,'2022-01-11 21:16:32',1,1),(507,76,NULL,20,'2022-01-02',11,'2022-01-11 21:16:32',1,1),(508,76,NULL,20,'2022-01-03',11,'2022-01-11 21:16:32',1,1),(509,76,NULL,20,'2022-01-07',11,'2022-01-11 21:16:32',1,1),(510,76,NULL,20,'2022-01-08',11,'2022-01-11 21:16:32',1,1),(511,76,NULL,20,'2022-01-09',11,'2022-01-11 21:16:32',1,1),(512,76,NULL,20,'2022-01-10',11,'2022-01-11 21:16:32',1,1),(513,76,NULL,20,'2022-01-11',11,'2022-01-11 21:16:32',1,1),(514,76,NULL,20,'2022-01-12',11,'2022-01-11 21:16:32',1,1),(515,76,NULL,20,'2022-01-13',11,'2022-01-11 21:16:32',1,1),(516,76,NULL,20,'2022-01-14',11,'2022-01-11 21:16:32',1,1),(517,76,NULL,20,'2022-01-15',11,'2022-01-11 21:16:32',1,1),(518,76,NULL,20,'2022-01-16',11,'2022-01-11 21:16:32',1,1),(519,76,NULL,20,'2022-01-17',11,'2022-01-11 21:16:32',1,1),(520,76,NULL,20,'2022-01-18',11,'2022-01-11 21:16:32',1,1),(521,76,NULL,20,'2022-01-19',11,'2022-01-11 21:16:32',1,1),(522,76,NULL,20,'2022-01-20',11,'2022-01-11 21:16:32',1,1),(523,76,NULL,20,'2022-01-21',11,'2022-01-11 21:16:32',1,1),(524,76,NULL,20,'2022-01-22',11,'2022-01-11 21:16:32',1,1),(525,76,NULL,20,'2022-01-23',11,'2022-01-11 21:16:32',1,1),(526,76,NULL,20,'2022-01-24',11,'2022-01-11 21:16:32',1,1),(527,76,NULL,20,'2022-01-25',11,'2022-01-11 21:16:32',1,1),(528,76,NULL,20,'2022-01-26',11,'2022-01-11 21:16:32',1,1),(529,76,NULL,20,'2022-01-27',11,'2022-01-11 21:16:32',1,1),(530,76,NULL,20,'2022-01-28',11,'2022-01-11 21:16:32',1,1),(531,76,NULL,20,'2022-01-29',11,'2022-01-11 21:16:32',1,1),(532,76,NULL,20,'2022-01-30',11,'2022-01-11 21:16:32',1,1),(533,76,NULL,20,'2022-01-31',11,'2022-01-11 21:16:32',1,1),(534,77,NULL,40,'2022-01-01',20,'2022-01-17 07:11:38',1,1),(535,77,NULL,40,'2022-01-02',20,'2022-01-17 07:11:38',1,1),(536,77,NULL,40,'2022-01-03',20,'2022-01-17 07:11:38',1,1),(537,77,NULL,40,'2022-01-04',20,'2022-01-17 07:11:38',1,1),(538,77,NULL,40,'2022-01-05',20,'2022-01-17 07:11:38',1,1),(539,77,NULL,40,'2022-01-06',20,'2022-01-17 07:11:38',1,1),(540,77,NULL,40,'2022-01-07',20,'2022-01-17 07:11:38',1,1),(541,77,NULL,40,'2022-01-08',20,'2022-01-17 07:11:38',1,1),(542,77,NULL,40,'2022-01-09',20,'2022-01-17 07:11:38',1,1),(543,77,NULL,40,'2022-01-10',20,'2022-01-17 07:11:38',1,1),(544,77,NULL,40,'2022-01-11',20,'2022-01-17 07:11:38',1,1),(545,77,NULL,40,'2022-01-12',20,'2022-01-17 07:11:38',1,1),(546,77,NULL,40,'2022-01-13',20,'2022-01-17 07:11:38',1,1),(547,77,NULL,40,'2022-01-14',20,'2022-01-17 07:11:38',1,1),(548,77,NULL,40,'2022-01-15',20,'2022-01-17 07:11:38',1,1),(549,77,NULL,40,'2022-01-16',20,'2022-01-17 07:11:38',1,1),(550,77,NULL,40,'2022-01-17',20,'2022-01-17 07:11:38',1,1),(551,77,NULL,40,'2022-01-18',20,'2022-01-17 07:11:39',1,1),(552,77,NULL,40,'2022-01-19',20,'2022-01-17 07:11:39',1,1),(553,77,NULL,40,'2022-01-20',20,'2022-01-17 07:11:39',1,1),(554,77,NULL,40,'2022-01-21',20,'2022-01-17 07:11:39',1,1),(555,77,NULL,40,'2022-01-22',20,'2022-01-17 07:11:39',1,1),(556,77,NULL,40,'2022-01-23',20,'2022-01-17 07:11:39',1,1),(557,77,NULL,40,'2022-01-24',20,'2022-01-17 07:11:39',1,1),(558,77,NULL,40,'2022-01-25',20,'2022-01-17 07:11:39',1,1),(559,77,NULL,40,'2022-01-26',20,'2022-01-17 07:11:39',1,1),(560,77,NULL,40,'2022-01-27',20,'2022-01-17 07:11:39',1,1),(561,77,NULL,40,'2022-01-28',20,'2022-01-17 07:11:39',1,1),(562,77,NULL,40,'2022-01-29',20,'2022-01-17 07:11:39',1,1),(563,77,NULL,40,'2022-01-30',20,'2022-01-17 07:11:39',1,1),(564,77,NULL,40,'2022-01-31',20,'2022-01-17 07:11:39',1,1),(565,77,NULL,40,'2022-02-01',20,'2022-01-17 07:11:39',1,1),(566,77,NULL,40,'2022-02-02',20,'2022-01-17 07:11:39',1,1),(567,77,NULL,40,'2022-02-03',20,'2022-01-17 07:11:39',1,1),(568,77,NULL,40,'2022-02-04',20,'2022-01-17 07:11:39',1,1),(569,77,NULL,40,'2022-02-05',20,'2022-01-17 07:11:39',1,1);
/*!40000 ALTER TABLE `rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratetypes`
--

DROP TABLE IF EXISTS `ratetypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ratetypes` (
  `rtRateTypeID` int NOT NULL,
  `rtRateType` varchar(45) DEFAULT NULL,
  `rtDescription` varchar(45) DEFAULT NULL,
  `rtSortOrder` varchar(45) DEFAULT NULL,
  `rtActive` int DEFAULT NULL,
  PRIMARY KEY (`rtRateTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratetypes`
--

LOCK TABLES `ratetypes` WRITE;
/*!40000 ALTER TABLE `ratetypes` DISABLE KEYS */;
INSERT INTO `ratetypes` VALUES (1,'Standerd','Standerd rate with breakfast',NULL,1);
/*!40000 ALTER TABLE `ratetypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rooms` (
  `rRoomID` int NOT NULL AUTO_INCREMENT,
  `rHotelID` int NOT NULL,
  `rRoomStatusID` int DEFAULT NULL,
  `rRoomNameID` int DEFAULT NULL,
  `rMaxPas` int NOT NULL,
  `rFloor` int DEFAULT NULL,
  `rRoomsNumbers` int DEFAULT NULL,
  `rDescription` varchar(45) DEFAULT NULL,
  `rCustomName` varchar(45) DEFAULT NULL,
  `rSmokingPolicy` int DEFAULT NULL,
  `rRoomSize` double DEFAULT NULL,
  `rLowestPrice` double DEFAULT NULL,
  `rOfferLower` int DEFAULT NULL,
  `rDisscount` varchar(45) DEFAULT NULL,
  `rCreatingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `num_bed_rooms` varchar(45) DEFAULT NULL,
  `num_living_rooms` varchar(45) DEFAULT NULL,
  `num_bathrooms` varchar(45) DEFAULT NULL,
  `beds_kinds` varchar(45) DEFAULT NULL,
  `bed_num` int DEFAULT NULL,
  PRIMARY KEY (`rRoomID`,`rHotelID`),
  KEY `fk_rooms_roomStatus1_idx` (`rRoomStatusID`),
  KEY `fk_rooms_roomsNames1_idx` (`rRoomNameID`),
  KEY `fk_rooms_hotels1_idx` (`rHotelID`),
  CONSTRAINT `fk_rooms_hotels1` FOREIGN KEY (`rHotelID`) REFERENCES `hotels` (`hHotelID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_rooms_roomsNames1` FOREIGN KEY (`rRoomNameID`) REFERENCES `roomsnames` (`rnRoomNameID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_rooms_roomStatus1` FOREIGN KEY (`rRoomStatusID`) REFERENCES `roomstatus` (`rsRoomStatusID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (76,24,2,38,2,NULL,17,NULL,'A double one',3,11,20,0,'','2022-01-11 21:15:22','1','1','1','1',2),(77,25,2,46,5,NULL,22,NULL,'First Double room',1,20,55,0,'','2022-01-17 07:10:31','1','1','1','1',5);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roomsbooked`
--

DROP TABLE IF EXISTS `roomsbooked`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roomsbooked` (
  `rbRoomBookedID` int NOT NULL AUTO_INCREMENT,
  `rbBookingID` int NOT NULL,
  `rbRoomID` int DEFAULT NULL,
  `rbNumOfRooms` int DEFAULT NULL,
  PRIMARY KEY (`rbRoomBookedID`),
  KEY `fk_roomsBooked_rooms1_idx` (`rbRoomID`),
  KEY `fk_roomsBooked_bookings1_idx` (`rbBookingID`),
  CONSTRAINT `fk_roomsBooked_bookings1` FOREIGN KEY (`rbBookingID`) REFERENCES `bookings` (`bBookingID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_roomsBooked_rooms1` FOREIGN KEY (`rbRoomID`) REFERENCES `rooms` (`rRoomID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=utf8mb3 COMMENT='When a room will be removed from the rooms table the rooms booked table records will not be effected, the id will be setted to null.\nBut when the room id get''s updated then the id will be updated as well.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roomsbooked`
--

LOCK TABLES `roomsbooked` WRITE;
/*!40000 ALTER TABLE `roomsbooked` DISABLE KEYS */;
INSERT INTO `roomsbooked` VALUES (267,227,76,3),(268,228,76,10),(269,229,76,3),(270,230,77,5);
/*!40000 ALTER TABLE `roomsbooked` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roomsnames`
--

DROP TABLE IF EXISTS `roomsnames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roomsnames` (
  `rnRoomNameID` int NOT NULL,
  `rnRoomTypeID` int NOT NULL,
  `rnRoomNameEn` varchar(255) NOT NULL,
  `rnRoomNameAr` varchar(255) DEFAULT NULL,
  `rnRoomNameKu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rnRoomNameID`),
  KEY `fk_roomsNames_roomsTypes1_idx` (`rnRoomTypeID`),
  CONSTRAINT `fk_roomsNames_roomsTypes1` FOREIGN KEY (`rnRoomTypeID`) REFERENCES `roomstypes` (`rtRoomTypeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roomsnames`
--

LOCK TABLES `roomsnames` WRITE;
/*!40000 ALTER TABLE `roomsnames` DISABLE KEYS */;
INSERT INTO `roomsnames` VALUES (1,1,'Budget Single Room','غرفة اقتصادية مفردة',''),(2,1,'Deluxe Single Room','غرفة ديلوكس مفردة',''),(3,1,'Deluxe Single Room with Balcony','غرفة ديلوكس مفردة مع شرفة',''),(4,1,'Deluxe Single Room with Sea View','غرفة ديلوكس مفردة مطلة على البحر',''),(5,1,'Economy Single Room','غرفة اقتصادية مفردة',''),(6,1,'Large Single Room','غرفة فردية كبيرة',''),(7,1,'New Year\'s Eve Special - Single Room','ليلة رأس السنة الخاصة - غرفة فردية',''),(8,1,'Single Room','غرفة مفردة',''),(9,1,'Single Room - Disability Access','غرفة مفردة - وصول ذوي الاحتياجات الخاصة',''),(10,1,'Single Room with Balcony','غرفة مفردة مع شرفة',''),(11,1,'Single Room with Bath','غرفة مفردة مع حمام',''),(12,1,'Single Room with Bathroom','غرفة مفردة مع حمام',''),(13,1,'Single Room with Garden View','غرفة مفردة مطلة على الحديقة',''),(14,1,'Single Room with Lake View','غرفة مفردة مطلة على البحيرة',''),(15,1,'Single Room with Mountain View','غرفة مفردة مطلة على الجبل',''),(16,1,'Single Room with Park View','غرفة مفردة مطلة على الحديقة',''),(17,1,'Single Room with Pool View','غرفة مفردة مطلة على المسبح',''),(18,1,'Single Room with Private Bathroom','غرفة مفردة مع حمام خاص',''),(19,1,'Single Room with Private External Bathroom','غرفة مفردة مع حمام خارجي خاص',''),(20,1,'Single Room with Sea View','غرفة مفردة مطلة على البحر',''),(21,1,'Single Room with Shared Bathroom','غرفة مفردة مع حمام مشترك',''),(22,1,'Single Room with Shared Shower and Toilet','غرفة مفردة مع دش ومرحاض مشتركين',''),(23,1,'Single Room with Shared Toilet','غرفة مفردة مع مرحاض مشترك',''),(24,1,'Single Room with Shower','غرفة مفردة مع دش',''),(25,1,'Single Room with Terrace','غرفة مفردة مع تراس',''),(26,1,'Small Single Room','غرفة مفردة صغيرة',''),(27,1,'Standard Single Room','غرفة قياسية مفردة',''),(28,1,'Standard Single Room with Mountain View','غرفة قياسية مفردة مطلة على الجبل',''),(29,1,'Standard Single Room with Sauna','غرفة قياسية مفردة مع ساونا',''),(30,1,'Standard Single Room with Sea View','غرفة قياسية مفردة مطلة على البحر',''),(31,1,'Standard Single Room with Shared Bathroom','غرفة قياسية مفردة مع حمام مشترك',''),(32,1,'Standard Single Room with Shower','غرفة قياسية مفردة مع دش',''),(33,1,'Superior Single Room','غرفة سوبيريور مفردة',''),(34,1,'Superior Single Room with Lake View','غرفة سوبيريور مفردة مطلة على البحيرة',''),(35,1,'Superior Single Room with Sea View','غرفة سوبيريور مفردة مطلة على البحر',''),(36,2,'Budget Double Room','غرفة اقتصادية مزدوجة',''),(37,2,'Business Double Room with Gym Access','غرفة رجال أعمال مزدوجة مع الدخول إلى صالة الألعاب الرياضية',''),(38,2,'Deluxe Double Room','غرفة ديلوكس مزدوجة',''),(39,2,'Deluxe Double Room (1 adult + 1 child)','غرفة ديلوكس مزدوجة (شخص بالغ + طفل واحد)',''),(40,2,'Deluxe Double Room (1 adult + 2 children)','غرفة ديلوكس مزدوجة (شخص بالغ + طفلان)',''),(41,2,'Deluxe Double Room (2 Adults + 1 Child)','غرفة ديلوكس مزدوجة (لشخصين بالغين + طفل واحد)',''),(42,2,'Deluxe Double Room with Balcony','غرفة ديلوكس مزدوجة مع شرفة',''),(43,2,'Deluxe Double Room with Balcony and Sea View','غرفة ديلوكس مزدوجة مع شرفة وإطلالة على البحر',''),(44,2,'Deluxe Double Room with Bath','غرفة ديلوكس مزدوجة مع حوض استحمام',''),(45,2,'Deluxe Double Room with Castle View','غرفة ديلوكس مزدوجة مطلة على القلعة',''),(46,2,'Deluxe Double Room with Extra Bed','غرفة ديلوكس مزدوجة مع سرير إضافي',''),(47,2,'Deluxe Double Room with Sea View','غرفة ديلوكس مزدوجة مطلة على البحر',''),(48,2,'Deluxe Double Room with Shower','غرفة ديلوكس مزدوجة مع دش',''),(49,2,'Deluxe Double Room with Side Sea View','غرفة ديلوكس مزدوجة مع إطلالة جانبية على البحر',''),(50,2,'Deluxe Double or Twin Room','غرفة ديلوكس مزدوجة أو توأم',''),(51,2,'Deluxe King Room','غرفة ديلوكس بحجم كينغ',''),(52,2,'Deluxe Queen Room','غرفة ديلوكس بحجم كوين',''),(53,2,'Deluxe Room','غرفة ديلوكس',''),(54,2,'Deluxe Room (1 adult + 1 child)','غرفة ديلوكس (شخص بالغ + طفل واحد)',''),(55,2,'Deluxe Room (1 adult + 2 children)','غرفة ديلوكس (شخص بالغ + طفلان)',''),(56,2,'Deluxe Room (2 Adults + 1 Child)','غرفة ديلوكس (لشخصين بالغين + طفل واحد)',''),(57,2,'Double Room','غرفة مزدوجة',''),(58,2,'Double Room (1 Adult + 1 Child)','غرفة مزدوجة (شخص بالغ + طفل واحد)',''),(59,2,'Double Room - Disability Access','غرفة مزدوجة - وصول ذوي الاحتياجات الخاصة',''),(60,2,'Double Room with Balcony','غرفة مزدوجة مع شرفة',''),(61,2,'Double Room with Balcony (2 Adults + 1 Child)','غرفة مزدوجة مع شرفة (شخصين بالغين + طفل واحد)',''),(62,2,'Double Room with Balcony (3 Adults)','غرفة مزدوجة مع شرفة (3 أشخاص بالغين)',''),(63,2,'Double Room with Balcony and Sea View','غرفة مزدوجة مع شرفة وإطلالة على البحر',''),(64,2,'Double Room with Extra Bed','غرفة مزدوجة مع سرير إضافي',''),(65,2,'Double Room with Garden View','غرفة مزدوجة مطلة على الحديقة',''),(66,2,'Double Room with Lake View','غرفة مزدوجة مطلة على البحيرة',''),(67,2,'Double Room with Mountain View','غرفة مزدوجة مطلة على الجبل',''),(68,2,'Double Room with Patio','غرفة مزدوجة مع فناء',''),(69,2,'Double Room with Pool View','غرفة مزدوجة مطلة على حمام السباحة',''),(70,2,'Double Room with Private Bathroom','غرفة مزدوجة مع حمام خاص',''),(71,2,'Double Room with Private External Bathroom','غرفة مزدوجة مع حمام خارجي خاص',''),(72,2,'Double Room with Sea View','غرفة مزدوجة مطلة على البحر',''),(73,2,'Double Room with Shared Bathroom','غرفة مزدوجة مع حمام مشترك',''),(74,2,'Double Room with Shared Toilet','غرفة مزدوجة مع مرحاض مشترك',''),(75,2,'Double Room with Spa Bath','غرفة مزدوجة مع حوض سبا',''),(76,2,'Double Room with Terrace','غرفة مزدوجة مع تراس',''),(77,2,'Economy Double Room','غرفة اقتصادية مزدوجة',''),(78,2,'King Room','غرفة الملك',''),(79,2,'King Room - Disability Access','غرفة بحجم كينغ - وصول ذوي الاحتياجات الخاصة',''),(80,2,'King Room with Balcony','غرفة كنغ مع شرفة',''),(81,2,'King Room with Garden View','غرفة كنغ مطلة على الحديقة',''),(82,2,'King Room with Lake View','غرفة كنغ مطلة على البحيرة',''),(83,2,'King Room with Mountain View','غرفة كنغ مطلة على الجبل',''),(84,2,'King Room with Pool View','غرفة كنغ مطلة على المسبح',''),(85,2,'King Room with Roll-In Shower - Disability Access','غرفة بحجم كينغ مع دش متحرك - إمكانية الوصول للمعاقين',''),(86,2,'King Room with Sea View','غرفة كنغ مطلة على البحر',''),(87,2,'King Room with Spa Bath','غرفة كنغ مع حوض سبا',''),(88,2,'Large Double Room','غرفة مزدوجة كبيرة',''),(89,2,'Queen Room','غرفة كوين',''),(90,2,'Queen Room - Disability Access','غرفة كوين - وصول ذوي الاحتياجات الخاصة',''),(91,2,'Queen Room with Balcony','غرفة كوين مع شرفة',''),(92,2,'Queen Room with Garden View','غرفة كوين مطلة على الحديقة',''),(93,2,'Queen Room with Pool View','غرفة كوين مطلة على حمام السباحة',''),(94,2,'Queen Room with Sea View','غرفة كوين مطلة على البحر',''),(95,2,'Queen Room with Shared Bathroom','غرفة كوين مع حمام مشترك',''),(96,2,'Queen Room with Spa Bath','غرفة كوين مع حوض سبا',''),(97,2,'Small Double Room','غرفة مزدوجة صغيرة',''),(98,2,'Standard Double Room','غرفة قياسية مزدوجة',''),(99,2,'Standard Double Room with Fan','غرفة قياسية مزدوجة مع مروحة',''),(100,2,'Standard Double Room with Shared Bathroom','غرفة قياسية مزدوجة مع حمام مشترك',''),(101,2,'Standard King Room','غرفة قياسية بحجم كينغ',''),(102,2,'Standard Queen Room','غرفة كوين عادية',''),(103,2,'Superior Double Room','غرفة سوبيريور مزدوجة',''),(104,2,'Superior King Room','غرفة سوبيريور كينج',''),(105,2,'Superior Queen Room','غرفة كوين سوبيريور',''),(106,3,'Budget Twin Room','غرفة توأم اقتصادية',''),(107,3,'Deluxe Double Room with Two Double Beds','غرفة ديلوكس مزدوجة بسريرين مزدوجين',''),(108,3,'Deluxe Queen Room with Two Queen Beds','غرفة ديلوكس بحجم كوين مع سريرين بحجم كوين',''),(109,3,'Deluxe Twin Room','غرفة ديلوكس توأم',''),(110,3,'Deluxe Twin Room with Sea View','غرفة ديلوكس توأم مطلة على البحر',''),(111,3,'Double Room with Two Double Beds','غرفة مزدوجة بسريرين مزدوجين',''),(112,3,'Economy Twin Room','غرفة توأم اقتصادية',''),(113,3,'King Room with Two King Beds','غرفة كنغ مع سريرين بحجم كينغ',''),(114,3,'Large Twin Room','غرفة توأم كبيرة',''),(115,3,'Queen Room with Two Queen Beds','غرفة كوين مع سريرين بحجم كوين',''),(116,3,'Queen Room with Two Queen Beds - Disability Access','غرفة كوين مع سريرين بحجم كوين - وصول ذوي الاحتياجات الخاصة',''),(117,3,'Small Twin Room','غرفة توأم صغيرة',''),(118,3,'Standard Double Room with Two Double Beds','غرفة قياسية مزدوجة بسريرين مزدوجين',''),(119,3,'Standard Queen Room with Two Queen Beds','غرفة قياسية بحجم كوين مع سريرين بحجم كوين',''),(120,3,'Standard Twin Room','غرفة قياسية توأم',''),(121,3,'Standard Twin Room with Garden View','غرفة قياسية توأم مطلة على الحديقة',''),(122,3,'Standard Twin Room with Mountain View','غرفة قياسية توأم مطلة على الجبل',''),(123,3,'Standard Twin Room with Sea View','غرفة قياسية توأم مطلة على البحر',''),(124,3,'Standard Twin Room with Shared Bathroom','غرفة قياسية توأم مع حمام مشترك',''),(125,3,'Standard Twin Room with Sofa','غرفة قياسية توأم مع أريكة',''),(126,3,'Superior Double Room with Two Double Beds','غرفة سوبيريور مزدوجة بسريرين مزدوجين',''),(127,3,'Superior King or Twin Room','غرفة سوبيريور بحجم كينغ أو توأم',''),(128,3,'Superior Queen Room with Two Queen Beds','غرفة سوبيريور بحجم كوين مع سريرين بحجم كوين',''),(129,3,'Superior Twin Room','غرفة سوبيريور توأم',''),(130,3,'Superior Twin Room with City View','غرفة سوبيريور توأم مطلة على المدينة',''),(131,3,'Superior Twin Room with Garden View','غرفة سوبيريور توأم مطلة على الحديقة',''),(132,3,'Superior Twin Room with Sauna','غرفة سوبيريور توأم مع ساونا',''),(133,3,'Superior Twin Room with Sea View','غرفة سوبيريور توأم مطلة على البحر',''),(134,3,'Twin Room','غرفة مزدوجة',''),(135,3,'Twin Room - Disability Access','غرفة توأمية - وصول للمعاقين',''),(136,3,'Twin Room with Balcony','غرفة توأم مع شرفة',''),(137,3,'Twin Room with Bath','غرفة توأم مع حمام',''),(138,3,'Twin Room with Bathroom','غرفة توأم مع حمام',''),(139,3,'Twin Room with City View','غرفة توأم مطلة على المدينة',''),(140,3,'Twin Room with Extra Bed','غرفة توأم مع سرير إضافي',''),(141,3,'Twin Room with Garden View','غرفة توأم مطلة على الحديقة',''),(142,3,'Twin Room with Lake View','غرفة توأم مطلة على البحيرة',''),(143,3,'Twin Room with Mountain View','غرفة توأم مطلة على الجبل',''),(144,3,'Twin Room with Pool View','غرفة توأم مطلة على حمام السباحة',''),(145,3,'Twin Room with Private Bathroom','غرفة توأم مع حمام خاص',''),(146,3,'Twin Room with Private External Bathroom','غرفة توأم مع حمام خارجي خاص',''),(147,3,'Twin Room with Sea View','غرفة توأم مطلة على البحر',''),(148,3,'Twin Room with Shared Bathroom','غرفة توأم مع حمام مشترك',''),(149,3,'Twin Room with Shared Toilet','غرفة توأم مع مرحاض مشترك',''),(150,3,'Twin Room with Shower','غرفة توأم مع دش',''),(151,3,'Twin Room with Terrace','غرفة توأم مع تراس',''),(152,3,'Twin Room with View','غرفة توأم مع إطلالة',''),(153,4,'Budget Double or Twin Room','غرفة اقتصادية مزدوجة أو توأم',''),(154,4,'Cabin on Boat','المقصورة على متن قارب',''),(155,4,'Deluxe Double or Twin Room','غرفة ديلوكس مزدوجة أو توأم',''),(156,4,'Deluxe Double or Twin Room with Balcony','غرفة ديلوكس مزدوجة أو توأم مع شرفة',''),(157,4,'Deluxe Double or Twin Room with City View','غرفة ديلوكس مزدوجة أو توأم مطلة على المدينة',''),(158,4,'Deluxe Double or Twin Room with Garden View','غرفة ديلوكس مزدوجة أو توأم مطلة على الحديقة',''),(159,4,'Deluxe Double or Twin Room with Lake View','غرفة ديلوكس مزدوجة أو توأم مطلة على البحيرة',''),(160,4,'Deluxe Double or Twin Room with Mountain View','غرفة ديلوكس مزدوجة أو توأم مطلة على الجبل',''),(161,4,'Deluxe Double or Twin Room with Ocean View','غرفة ديلوكس مزدوجة أو توأم مطلة على المحيط',''),(162,4,'Deluxe Double or Twin Room with Pool Access','غرفة ديلوكس مزدوجة أو توأم مع إمكانية الوصول إلى حمام السباحة',''),(163,4,'Deluxe Double or Twin Room with Pool View','غرفة ديلوكس مزدوجة أو توأم مطلة على المسبح',''),(164,4,'Deluxe Double or Twin Room with River View','غرفة ديلوكس مزدوجة أو توأم مطلة على النهر',''),(165,4,'Deluxe Double or Twin Room with Sea View','غرفة ديلوكس مزدوجة أو توأم مطلة على البحر',''),(166,4,'Deluxe Double or Twin Room with Spa Bath','غرفة ديلوكس مزدوجة أو توأم مع حوض سبا',''),(167,4,'Double or Twin Room','غرفتين ام غرفة مزدوجة',''),(168,4,'Double or Twin Room - Disability Access','غرفة مزدوجة أو توأم - يمكن لذوي الاحتياجات الخاصة',''),(169,4,'Double or Twin Room with Balcony','غرفة مزدوجة أو توأم مع شرفة',''),(170,4,'Double or Twin Room with Bathroom','غرفة مزدوجة أو توأم مع حمام',''),(171,4,'Double or Twin Room with Canal View','غرفة مزدوجة أو توأم مطلة على القناة',''),(172,4,'Double or Twin Room with City View','غرفة مزدوجة أو توأم مطلة على المدينة',''),(173,4,'Double or Twin Room with Extra Bed','غرفة مزدوجة أو توأم مع سرير إضافي',''),(174,4,'Double or Twin Room with Garden View','غرفة مزدوجة أو توأم مطلة على الحديقة',''),(175,4,'Double or Twin Room with Harbor View','غرفة مزدوجة أو توأم مطلة على المرفأ',''),(176,4,'Double or Twin Room with Lake View','غرفة مزدوجة أو توأم مطلة على البحيرة',''),(177,4,'Double or Twin Room with Mountain View','غرفة مزدوجة أو توأم مطلة على الجبل',''),(178,4,'Double or Twin Room with Partial Sea View','غرفة مزدوجة أو توأم مطلة جزئياً على البحر',''),(179,4,'Double or Twin Room with Pool View','غرفة مزدوجة أو توأم مطلة على المسبح',''),(180,4,'Double or Twin Room with Private Bathroom','غرفة مزدوجة أو توأم مع حمام خاص',''),(181,4,'Double or Twin Room with Private External Bathroom','غرفة مزدوجة أو توأم مع حمام خارجي خاص',''),(182,4,'Double or Twin Room with Sea View','غرفة مزدوجة أو توأم مطلة على البحر',''),(183,4,'Double or Twin Room with Shared Bathroom','غرفة مزدوجة أو توأم مع حمام مشترك',''),(184,4,'Double or Twin Room with Shower','غرفة مزدوجة أو توأم مع دش',''),(185,4,'Double or Twin Room with Side Sea View','غرفة مزدوجة أو توأم مع إطلالة جانبية على البحر',''),(186,4,'Double or Twin Room with Spa Access','غرفة مزدوجة أو توأم مع إمكانية الوصول إلى السبا',''),(187,4,'Double or Twin Room with Swimming Pool Access','غرفة مزدوجة أو توأم مع الوصول إلى حمام السباحة',''),(188,4,'Double or Twin Room with Terrace','غرفة مزدوجة أو توأم مع تراس',''),(189,4,'Double or Twin Room with View','غرفة مزدوجة أو توأم مع إطلالة',''),(190,4,'Economy Double or Twin Room','غرفة اقتصادية مزدوجة أو توأم',''),(191,4,'Large Double or Twin Room','غرفة كبيرة مزدوجة أو توأم',''),(192,4,'Small Double or Twin Room','غرفة صغيرة مزدوجة أو توأم',''),(193,4,'Standard Cabin on Boat','كابينة قياسية على القارب',''),(194,4,'Standard Double or Twin Room','غرفة قياسية مزدوجة أو توأم',''),(195,4,'Standard Double or Twin Room with Balcony','غرفة قياسية مزدوجة أو توأم مع شرفة',''),(196,4,'Standard Double or Twin Room with Garden View','غرفة قياسية مزدوجة أو توأم مطلة على الحديقة',''),(197,4,'Standard Double or Twin Room with Sea View','غرفة قياسية مزدوجة أو توأم مطلة على البحر',''),(198,4,'Superior Cabin on Boat','كابينة متفوقة على القارب',''),(199,4,'Superior Deluxe Double or Twin Room','غرفة ديلوكس سوبيريور مزدوجة أو توأم',''),(200,4,'Superior Double or Twin Room','غرفة سوبيريور مزدوجة أو توأم',''),(201,4,'Superior Double or Twin Room with City View','غرفة سوبيريور مزدوجة أو توأم مطلة على المدينة',''),(202,4,'Superior Double or Twin Room with Garden View','غرفة سوبيريور مزدوجة أو توأم مطلة على الحديقة',''),(203,4,'Superior Double or Twin Room with Lake View','غرفة سوبيريور مزدوجة أو توأم مطلة على البحيرة',''),(204,4,'Superior Double or Twin Room with Mountain View','غرفة سوبيريور مزدوجة أو توأم مطلة على الجبل',''),(205,4,'Superior Double or Twin Room with Pool View','غرفة سوبيريور مزدوجة أو توأم مطلة على حمام السباحة',''),(206,4,'Superior Double or Twin Room with Sea View','غرفة سوبيريور مزدوجة أو توأم مطلة على البحر',''),(207,4,'Superior Double or Twin Room with Terrace','غرفة سوبيريور مزدوجة أو توأم مع تراس',''),(208,5,'Basic Triple Room','غرفة أساسية ثلاثية',''),(209,5,'Basic Triple Room with Shared Bathroom','غرفة أساسية ثلاثية مع حمام مشترك',''),(210,5,'Budget Triple Room','غرفة ثلاثية اقتصادية',''),(211,5,'Classic Triple Room','غرفة ثلاثية كلاسيكية',''),(212,5,'Comfort Triple Room','غرفة كومفورت ثلاثية',''),(213,5,'Comfort Triple Room with Shower','غرفة كومفورت ثلاثية مع دش',''),(214,5,'Deluxe Triple Room','غرفة ديلوكس ثلاثية',''),(215,5,'Deluxe Triple Room with Sea View','غرفة ديلوكس ثلاثية مطلة على البحر',''),(216,5,'Economy Triple Room','غرفة اقتصادية ثلاثية',''),(217,5,'Economy Triple Room with Shared Bathroom','غرفة اقتصادية ثلاثية مع حمام مشترك',''),(218,5,'Executive Triple Room','غرفة ثلاثية تنفيذية',''),(219,5,'Luxury Triple Room','غرفة ثلاثية فاخرة',''),(220,5,'Standard Triple Room','غرفة قياسية ثلاثية',''),(221,5,'Standard Triple Room with Sea View','غرفة قياسية ثلاثية مطلة على البحر',''),(222,5,'Superior Triple Room','غرفة سوبيريور ثلاثية',''),(223,5,'Superior Triple Room with Sea View','غرفة سوبيريور ثلاثية مطلة على البحر',''),(224,5,'Triple Room','غرفة ثلاثية',''),(225,5,'Triple Room - Disability Access','غرفة ثلاثية - وصول ذوي الاحتياجات الخاصة',''),(226,5,'Triple Room with Balcony','غرفة ثلاثية مع شرفة',''),(227,5,'Triple Room with Bath','غرفة ثلاثية مع حمام',''),(228,5,'Triple Room with Bathroom','غرفة ثلاثية مع حمام',''),(229,5,'Triple Room with City View','غرفة ثلاثية مطلة على المدينة',''),(230,5,'Triple Room with Garden View','غرفة ثلاثية مطلة على الحديقة',''),(231,5,'Triple Room with Lake View','غرفة ثلاثية مطلة على البحيرة',''),(232,5,'Triple Room with Mountain View','غرفة ثلاثية مطلة على الجبل',''),(233,5,'Triple Room with Pool View','غرفة ثلاثية مطلة على حمام السباحة',''),(234,5,'Triple Room with Private Bathroom','غرفة ثلاثية مع حمام خاص',''),(235,5,'Triple Room with Private External Bathroom','غرفة ثلاثية مع حمام خارجي خاص',''),(236,5,'Triple Room with Sea View','غرفة ثلاثية مطلة على البحر',''),(237,5,'Triple Room with Shared Bathroom','غرفة ثلاثية مع حمام مشترك',''),(238,5,'Triple Room with Shared Toilet','غرفة ثلاثية مع مرحاض مشترك',''),(239,5,'Triple Room with Shower','غرفة ثلاثية مع دش',''),(240,5,'Triple Room with Terrace','غرفة ثلاثية مع تراس',''),(241,5,'Triple Room with View','غرفة ثلاثية مع إطلالة',''),(242,6,'Comfort Quadruple Room','غرفة كومفورت رباعية',''),(243,6,'Deluxe Quadruple Room','غرفة ديلوكس رباعية',''),(244,6,'Deluxe Queen Room with Two Queen Beds','غرفة ديلوكس بحجم كوين مع سريرين بحجم كوين',''),(245,6,'Duplex Quadruple Room','غرفة دوبلكس رباعية',''),(246,6,'Economy Quadruple Room','غرفة اقتصادية رباعية',''),(247,6,'Economy Quadruple Room with Shared Bathroom','غرفة اقتصادية رباعية مع حمام مشترك',''),(248,6,'Executive Queen Room with Two Queen Beds','غرفة تنفيذية بحجم كوين مع سريرين بحجم كوين',''),(249,6,'Japanese-Style Quadruple Room','غرفة رباعية على الطراز الياباني',''),(250,6,'King Room with Two King Beds','غرفة كنغ مع سريرين بحجم كينغ',''),(251,6,'Luxury Quadruple Room','غرفة رباعية فاخرة',''),(252,6,'Premium Quadruple Room','غرفة بريميوم رباعية',''),(253,6,'Quadruple Room','غرفة رباعية',''),(254,6,'Quadruple Room - Disability Access','غرفة رباعية - وصول ذوي الاحتياجات الخاصة',''),(255,6,'Quadruple Room with Balcony','غرفة رباعية مع شرفة',''),(256,6,'Quadruple Room with Bath','غرفة رباعية مع حمام',''),(257,6,'Quadruple Room with Bathroom','غرفة رباعية مع حمام',''),(258,6,'Quadruple Room with Garden View','غرفة رباعية مطلة على الحديقة',''),(259,6,'Quadruple Room with Lake View','غرفة رباعية مطلة على البحيرة',''),(260,6,'Quadruple Room with Mountain View','غرفة رباعية مطلة على الجبل',''),(261,6,'Quadruple Room with Private Bathroom','غرفة رباعية مع حمام خاص',''),(262,6,'Quadruple Room with Private External Bathroom','غرفة رباعية مع حمام خارجي خاص',''),(263,6,'Quadruple Room with Sea View','غرفة رباعية مطلة على البحر',''),(264,6,'Quadruple Room with Shared Bathroom','غرفة رباعية مع حمام مشترك',''),(265,6,'Quadruple Room with Shower','غرفة رباعية مع دش',''),(266,6,'Quadruple Room with Terrace','غرفة رباعية مع تراس',''),(267,6,'Queen Room with Two Queen Beds','غرفة كوين مع سريرين بحجم كوين',''),(268,6,'Queen Room with Two Queen Beds - Disability Access','غرفة كوين مع سريرين بحجم كوين - وصول ذوي الاحتياجات الخاصة',''),(269,6,'Standard Quadruple Room','غرفة قياسية رباعية',''),(270,6,'Standard Queen Room with Two Queen Beds','غرفة قياسية بحجم كوين مع سريرين بحجم كوين',''),(271,6,'Superior Quadruple Room','غرفة سوبيريور رباعية',''),(272,6,'Superior Queen Room with Two Queen Beds','غرفة سوبيريور بحجم كوين مع سريرين بحجم كوين',''),(273,7,'Deluxe Family Room','غرفة ديلوكس عائلية',''),(274,7,'Deluxe Family Suite','جناح ديلوكس عائلي',''),(275,7,'Family Bungalow','بنغل عائلي',''),(276,7,'Family Cabin on Boat','كابينة الأسرة على متن قارب',''),(277,7,'Family Double Room','غرفة عائلية مزدوجة',''),(278,7,'Family Junior Suite','جناح جونيور عائلي',''),(279,7,'Family Room','غرفة العائلة',''),(280,7,'Family Room - Disability Access','غرفة عائلية - وصول ذوي الاحتياجات الخاصة',''),(281,7,'Family Room with Balcony','غرفة عائلية مع شرفة',''),(282,7,'Family Room with Bath','غرفة عائلية مع حمام',''),(283,7,'Family Room with Bathroom','غرفة عائلية مع حمام',''),(284,7,'Family Room with Garden View','غرفة عائلية مطلة على الحديقة',''),(285,7,'Family Room with Lake View','غرفة عائلية مطلة على البحيرة',''),(286,7,'Family Room with Mountain View','غرفة عائلية مطلة على الجبل',''),(287,7,'Family Room with Private Bathroom','غرفة عائلية مع حمام خاص',''),(288,7,'Family Room with Sauna','غرفة عائلية مع ساونا',''),(289,7,'Family Room with Sea View','غرفة عائلية مطلة على البحر',''),(290,7,'Family Room with Shared Bathroom','غرفة عائلية مع حمام مشترك',''),(291,7,'Family Room with Shower','غرفة عائلية مع دش',''),(292,7,'Family Room with Side Sea View','غرفة عائلية مع إطلالة جانبية على البحر',''),(293,7,'Family Room with Terrace','غرفة عائلية مع تراس',''),(294,7,'Family Studio','استوديو عائلي',''),(295,7,'Family Suite','جناح الأسرة',''),(296,7,'Family Suite with Balcony','جناح عائلي مع شرفة',''),(297,7,'Japanese-Style Room','غرفة على الطراز الياباني',''),(298,7,'Standard Family Room','غرفة عائلية قياسية',''),(299,7,'Superior Family Room','غرفة عائلية سوبيريور',''),(300,8,'Deluxe Double Studio','استوديو ديلوكس مزدوج',''),(301,8,'Deluxe Junior Suite','جناح جونيور ديلوكس',''),(302,8,'Deluxe King Studio','استوديو ديلوكس كينج',''),(303,8,'Deluxe King Suite','جناح ديلوكس كينج',''),(304,8,'Deluxe Queen Studio','استوديو كوين ديلوكس',''),(305,8,'Deluxe Queen Suite','جناح كوين ديلوكس',''),(306,8,'Deluxe Studio','استوديو ديلوكس',''),(307,8,'Deluxe Suite','جناح ديلوكس',''),(308,8,'Deluxe Suite with Sea View','جناح ديلوكس مطل على البحر',''),(309,8,'Deluxe Suite with Spa Bath','جناح ديلوكس مع حوض سبا',''),(310,8,'Duplex Suite','جناح دوبلكس',''),(311,8,'Executive Suite','الجناح التنفيذي',''),(312,8,'Family Studio','استوديو عائلي',''),(313,8,'Family Suite','جناح الأسرة',''),(314,8,'Junior Suite','جناح صغير',''),(315,8,'Junior Suite with Balcony','جناح جونيور مع شرفة',''),(316,8,'Junior Suite with Canal View','جناح جونيور مطل على القناة',''),(317,8,'Junior Suite with Garden View','جناح جونيور مطل على الحديقة',''),(318,8,'Junior Suite with Mountain View','جناح جونيور مطل على الجبل',''),(319,8,'Junior Suite with Ocean View','جناح جونيور مطل على المحيط',''),(320,8,'Junior Suite with Pool View','جناح جونيور مطل على المسبح',''),(321,8,'Junior Suite with Private Pool','جناح جونيور مع بركة سباحة خاصة',''),(322,8,'Junior Suite with Sauna','جناح جونيور مع ساونا',''),(323,8,'Junior Suite with Sea View','جناح جونيور مطل على البحر',''),(324,8,'Junior Suite with Terrace','جناح جونيور مع تراس',''),(325,8,'King Studio','استوديو كينج',''),(326,8,'King Studio with Sofa Bed','استوديو كينج مع سرير أريكة',''),(327,8,'King Suite','جناح كينج',''),(328,8,'King Suite with Balcony','جناح كينج مع شرفة',''),(329,8,'King Suite with Ocean View','جناح كينج مطل على المحيط',''),(330,8,'King Suite with Pool View','جناح كينج مطل على حمام السباحة',''),(331,8,'King Suite with Sea View','جناح كينج مطل على البحر',''),(332,8,'King Suite with Spa Bath','جناح كينج مع حوض سبا',''),(333,8,'One-Bedroom Suite','جناح بغرفة نوم واحدة',''),(334,8,'Presidential Suite','جناح رئاسي',''),(335,8,'Queen Studio','استوديو كوين',''),(336,8,'Queen Studio - Disability Access','استوديو كوين - وصول ذوي الاحتياجات الخاصة',''),(337,8,'Queen Suite','جناح كوين',''),(338,8,'Queen Suite with Pool View','جناح كوين مطل على المسبح',''),(339,8,'Queen Suite with Sea View','جناح كوين مطل على البحر',''),(340,8,'Queen Suite with Spa Bath','جناح كوين مع حوض سبا',''),(341,8,'Standard Double Suite','جناح قياسي مزدوج',''),(342,8,'Standard Studio','استوديو قياسي',''),(343,8,'Standard Suite','جناح قياسي',''),(344,8,'Standard Triple Studio','استوديو قياسي ثلاثي',''),(345,8,'Studio','ستوديو',''),(346,8,'Studio - Disability Access','استوديو - وصول ذوي الاحتياجات الخاصة',''),(347,8,'Studio with Balcony','استوديو مع شرفة',''),(348,8,'Studio with Garden View','استوديو مطل على الحديقة',''),(349,8,'Studio with Ocean View','استوديو مطل على المحيط',''),(350,8,'Studio with Pool View','استوديو مطل على المسبح',''),(351,8,'Studio with Sea View','استوديو مطل على البحر',''),(352,8,'Studio with Sofa Bed','استوديو مع سرير أريكة',''),(353,8,'Studio with Spa Bath','استوديو مع حمام سبا',''),(354,8,'Studio with Terrace','استوديو مع تراس',''),(355,8,'Suite','جناح',''),(356,8,'Suite with Balcony','جناح مع شرفة',''),(357,8,'Suite with City View','جناح مطل على المدينة',''),(358,8,'Suite with Garden View','جناح مطل على الحديقة',''),(359,8,'Suite with Hot Tub','جناح مع حوض استحمام ساخن',''),(360,8,'Suite with Lake View','جناح مطل على البحيرة',''),(361,8,'Suite with Mountain View','جناح مطل على الجبل',''),(362,8,'Suite with Pool View','جناح مطل على حمام السباحة',''),(363,8,'Suite with Private Pool','جناح مع بركة سباحة خاصة',''),(364,8,'Suite with River View','جناح مطل على النهر',''),(365,8,'Suite with Sauna','جناح مع ساونا',''),(366,8,'Suite with Sea View','جناح مطل على البحر',''),(367,8,'Suite with Spa Access','جناح مع الوصول إلى السبا',''),(368,8,'Suite with Spa Bath','جناح مع حمام سبا',''),(369,8,'Suite with Terrace','جناح مع تراس',''),(370,8,'Superior King Suite','جناح سوبريور كينج',''),(371,8,'Superior Studio','استوديو سوبيريور',''),(372,8,'Superior Suite','جناح سوبيريور',''),(373,8,'Superior Suite with Sea View','جناح سوبيريور مطل على البحر',''),(374,8,'Three-Bedroom Suite','جناح بثلاث غرف نوم',''),(375,8,'Two-Bedroom Suite','جناح بغرفتي نوم',''),(376,9,'Deluxe Double Studio','استوديو ديلوكس مزدوج',''),(377,9,'Deluxe King Studio','استوديو ديلوكس كينج',''),(378,9,'Deluxe Queen Studio','استوديو كوين ديلوكس',''),(379,9,'Deluxe Studio','استوديو ديلوكس',''),(380,9,'Duplex Studio','استوديو دوبلكس',''),(381,9,'Family Studio','استوديو عائلي',''),(382,9,'King Studio','استوديو كينج',''),(383,9,'King Studio with Sofa Bed','استوديو كينج مع سرير أريكة',''),(384,9,'Queen Studio','استوديو كوين',''),(385,9,'Queen Studio - Disability Access','استوديو كوين - وصول ذوي الاحتياجات الخاصة',''),(386,9,'Standard Studio','استوديو قياسي',''),(387,9,'Standard Triple Studio','استوديو قياسي ثلاثي',''),(388,9,'Studio','ستوديو',''),(389,9,'Studio - Disability Access','استوديو - وصول ذوي الاحتياجات الخاصة',''),(390,9,'Studio - Split Level','استوديو - سبليت المستوى',''),(391,9,'Studio with Balcony','استوديو مع شرفة',''),(392,9,'Studio with Garden View','استوديو مطل على الحديقة',''),(393,9,'Studio with Lake View','استوديو مطل على البحيرة',''),(394,9,'Studio with Mountain View','استوديو مطل على الجبل',''),(395,9,'Studio with Ocean View','استوديو مطل على المحيط',''),(396,9,'Studio with Pool View','استوديو مطل على المسبح',''),(397,9,'Studio with Sea View','استوديو مطل على البحر',''),(398,9,'Studio with Sofa Bed','استوديو مع سرير أريكة',''),(399,9,'Studio with Spa Bath','استوديو مع حمام سبا',''),(400,9,'Studio with Terrace','استوديو مع تراس',''),(401,9,'Superior Studio','استوديو سوبيريور',''),(402,10,'Apartment - Ground Floor','شقة - الطابق الأرضي',''),(403,10,'Apartment - Split Level','شقة - سبليت المستوى',''),(404,10,'Apartment With Shared Bathroom','شقة مع حمام مشترك',''),(405,10,'Apartment with Balcony','شقة مع شرفة',''),(406,10,'Apartment with Garden View','شقة مطلة على الحديقة',''),(407,10,'Apartment with Lake View','شقة مطلة على البحيرة',''),(408,10,'Apartment with Mountain View','شقة مطلة على الجبل',''),(409,10,'Apartment with Pool View','شقة مطلة على حمام السباحة',''),(410,10,'Apartment with Sauna','شقة مع ساونا',''),(411,10,'Apartment with Sea View','شقة مطلة على البحر',''),(412,10,'Apartment with Shower','شقة مع دش',''),(413,10,'Apartment with Terrace','شقة مع تراس',''),(414,10,'Deluxe Apartment','شقة ديلوكس',''),(415,10,'Duplex Apartment','شقة دوبلكس',''),(416,10,'Loft','العلية',''),(417,10,'Maisonette','بيت صغير',''),(418,10,'One-Bedroom Apartment','شقة بغرفة نوم واحدة',''),(419,10,'Penthouse Apartment','شقة بنتهاوس',''),(420,10,'Standard Apartment','شقة قياسية',''),(421,10,'Studio Apartment','شقة استوديو',''),(422,10,'Studio Apartment with Sea View','شقة استوديو مطلة على البحر',''),(423,10,'Superior Apartment','شقة سوبيريور',''),(424,10,'Superior Apartment with Sauna','شقة سوبيريور مع ساونا',''),(425,10,'Three-Bedroom Apartment','شقة من 3 غرف نوم',''),(426,10,'Two-Bedroom Apartment','شقة من غرفتي نوم',''),(427,11,'10-Bed Male Dormitory Room','صالة نوم مشتركة للذكور من 10 أسرّة',''),(428,11,'10-Bed Mixed Dormitory Room','صالة نوم مشتركة مختلطة من 10 أسرّة',''),(429,11,'4-Bed Female Dormitory Room','صالة نوم مشتركة للإناث من 4 أسرّة',''),(430,11,'4-Bed Male Dormitory Room','غرفة مكان النَّوم للذكور بـ 4 أسرّة',''),(431,11,'4-Bed Mixed Dormitory Room','صالة نوم مشتركة مختلطة من 4 أسرّة',''),(432,11,'6-Bed Female Dormitory Room','صالة نوم مشتركة للإناث من 6 أسرّة',''),(433,11,'6-Bed Male Dormitory Room','غرفة مكان النَّوم للذكور بـ 6 أسرّة',''),(434,11,'6-Bed Mixed Dormitory Room','مكان النَّوم مختلط مكون من 6 أسرّة',''),(435,11,'8-Bed Female Dormitory Room','صالة نوم مشتركة للإناث من 8 أسرّة',''),(436,11,'8-Bed Male Dormitory Room','غرفة مكان النَّوم للذكور بـ 8 أسرّة',''),(437,11,'8-Bed Mixed Dormitory Room','صالة نوم مشتركة مختلطة من 8 أسرّة',''),(438,11,'Female Dormitory Room','غرفة مكان النَّوم للإناث',''),(439,11,'Male Dormitory Room','غرفة مكان النَّوم للذكور',''),(440,11,'Mixed Dormitory Room','غرفة مكان النَّوم مختلط',''),(441,12,'Bed in 10-Bed Mixed Dormitory Room','سرير في صالة نوم مشتركة مختلطة من 10 أسرّة',''),(442,12,'Bed in 4-Bed Dormitory Room','سرير في صالة نوم مشتركة من 4 أسرّة',''),(443,12,'Bed in 4-Bed Female Dormitory Room','سرير في غرفة مكان النَّوم للإناث من 4 أسرّة',''),(444,12,'Bed in 4-Bed Male Dormitory Room','سرير في غرفة مكان النَّوم للذكور بـ 4 أسرّة',''),(445,12,'Bed in 4-Bed Mixed Dormitory Room','سرير في صالة نوم مشتركة مختلطة من 4 أسرّة',''),(446,12,'Bed in 6-Bed Dormitory Room','سرير في صالة نوم مشتركة من 6 أسرّة',''),(447,12,'Bed in 6-Bed Female Dormitory Room','سرير في غرفة مكان النَّوم للإناث مكونة من 6 أسرّة',''),(448,12,'Bed in 6-Bed Mixed Dormitory Room','سرير في صالة نوم مشتركة مختلطة من 6 أسرّة',''),(449,12,'Bed in 8-Bed Dormitory Room','سرير في صالة نوم مشتركة من 8 أسرّة',''),(450,12,'Bed in 8-Bed Mixed Dormitory Room','سرير في صالة نوم مشتركة مختلطة من 8 أسرّة',''),(451,12,'Bed in Male Dormitory Room','سرير في صالة نوم مشتركة للذكور',''),(452,12,'Bunk Bed in Female Dormitory Room','سرير بطابقين في صالة نوم مشتركة للإناث',''),(453,12,'Bunk Bed in Male Dormitory Room','سرير بطابقين في صالة نوم مشتركة للذكور',''),(454,12,'Bunk Bed in Mixed Dormitory Room','سرير بطابقين في صالة نوم مشتركة مختلطة',''),(455,12,'Single Bed in 10-Bed Dormitory Room','سرير مفرد في صالة نوم مشتركة من 10 أسرّة',''),(456,12,'Single Bed in 4-Bed Dormitory Room','سرير مفرد في صالة نوم مشتركة من 4 أسرّة',''),(457,12,'Single Bed in 6-Bed Dormitory Room','سرير مفرد في صالة نوم مشتركة من 6 أسرّة',''),(458,12,'Single Bed in Dormitory Room','سرير مفرد في صالة نوم مشتركة','');
/*!40000 ALTER TABLE `roomsnames` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roomsphotos`
--

DROP TABLE IF EXISTS `roomsphotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roomsphotos` (
  `rpPhotoID` int NOT NULL AUTO_INCREMENT,
  `rpRoomsID` int NOT NULL,
  `rpPhotoPath` varchar(255) NOT NULL,
  `rpPhotoDescription` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`rpPhotoID`),
  KEY `fk_roomsPhotos_rooms1_idx` (`rpRoomsID`),
  CONSTRAINT `fk_roomsPhotos_rooms1` FOREIGN KEY (`rpRoomsID`) REFERENCES `rooms` (`rRoomID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roomsphotos`
--

LOCK TABLES `roomsphotos` WRITE;
/*!40000 ALTER TABLE `roomsphotos` DISABLE KEYS */;
INSERT INTO `roomsphotos` VALUES (74,76,'../../..//users/41/hotels/24/rooms/76/1641935737photo1.jpg',NULL),(75,76,'../../..//users/41/hotels/24/rooms/76/1641935737photo2.jpg',NULL);
/*!40000 ALTER TABLE `roomsphotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roomstatus`
--

DROP TABLE IF EXISTS `roomstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roomstatus` (
  `rsRoomStatusID` int NOT NULL,
  `rsRoomStatus` varchar(45) DEFAULT NULL,
  `rsDescription` varchar(45) DEFAULT NULL,
  `rsSortOrder` varchar(45) DEFAULT NULL,
  `rsActive` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`rsRoomStatusID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roomstatus`
--

LOCK TABLES `roomstatus` WRITE;
/*!40000 ALTER TABLE `roomstatus` DISABLE KEYS */;
INSERT INTO `roomstatus` VALUES (1,'Reserved','all rooms of this type are reserved','1',''),(2,'Available','There are Available rooms for reserving','1',''),(3,'Not-ready','All rooms are not clean or ready yet','1',''),(4,'Construction','All rooms are under construction','1',''),(5,'Closed','All rooms of this type are Closed by hotel','1','');
/*!40000 ALTER TABLE `roomstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roomstypes`
--

DROP TABLE IF EXISTS `roomstypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roomstypes` (
  `rtRoomTypeID` int NOT NULL,
  `rtRoomTypeEn` varchar(45) DEFAULT NULL,
  `rRoomTypeAr` varchar(45) DEFAULT NULL,
  `rRoomTypeKu` varchar(45) DEFAULT NULL,
  `rtDescription` varchar(45) DEFAULT NULL,
  `rtSortOrder` varchar(45) DEFAULT NULL,
  `trActive` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`rtRoomTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roomstypes`
--

LOCK TABLES `roomstypes` WRITE;
/*!40000 ALTER TABLE `roomstypes` DISABLE KEYS */;
INSERT INTO `roomstypes` VALUES (1,'Single','مفردة','','','',''),(2,'Double','مزدوجة','','','',''),(3,'Twin','توأمية','','','',''),(4,'Twin/Double','توأمية/مزدوجة','','','',''),(5,'Triple','غرفة ثلاثية','','','',''),(6,'Quad','غرفة رباعية','','','',''),(7,'Family','عائلية','','','',''),(8,'Suite','جناح','','','',''),(9,'Studio','استوديو','','','',''),(10,'Appartment','شقة','','','',''),(11,'Dorm Room','صالة نوم مشتركة','','','',''),(12,'Bed In Dorm Room','سرير في مكان النَّوم','','','','');
/*!40000 ALTER TABLE `roomstypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `todays_bookings`
--

DROP TABLE IF EXISTS `todays_bookings`;
/*!50001 DROP VIEW IF EXISTS `todays_bookings`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `todays_bookings` AS SELECT 
 1 AS `bBookingID`,
 1 AS `bGuestID`,
 1 AS `bBookingStatusID`,
 1 AS `bPaymentStatusID`,
 1 AS `bDateFrom`,
 1 AS `bDateTo`,
 1 AS `bNumOfNights`,
 1 AS `bNumOfGuests`,
 1 AS `bNumOfChildren`,
 1 AS `bCreatingDate`,
 1 AS `bDisscount`,
 1 AS `bRate`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `userinfohisory`
--

DROP TABLE IF EXISTS `userinfohisory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userinfohisory` (
  `tnID` int NOT NULL AUTO_INCREMENT,
  `tnUserName` varchar(45) DEFAULT NULL,
  `tnPassword` varchar(45) DEFAULT NULL,
  `tnEmail` varchar(45) DEFAULT NULL,
  `tnFullName` varchar(45) DEFAULT NULL,
  `tnPhoneNumber` varchar(45) DEFAULT NULL,
  `tnState` varchar(45) DEFAULT NULL,
  `tnAtTime` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tnID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userinfohisory`
--

LOCK TABLES `userinfohisory` WRITE;
/*!40000 ALTER TABLE `userinfohisory` DISABLE KEYS */;
/*!40000 ALTER TABLE `userinfohisory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `uUserID` int NOT NULL AUTO_INCREMENT,
  `uUserName` varchar(45) NOT NULL,
  `uUserEmail` varchar(45) NOT NULL,
  `uUserPassword` varchar(45) NOT NULL,
  `uFullName` varchar(255) DEFAULT NULL,
  `uUserPhoneNumber` varchar(45) NOT NULL,
  `uStatus` int DEFAULT NULL,
  `uCreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uUserID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (41,'m','mo@m.com','m','Mohammed Hazim','07708138928',NULL,'2022-01-11 21:12:07');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `userToUpper` BEFORE INSERT ON `users` FOR EACH ROW SET NEW.uUserName =lower(new.uUserName) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `userInfoHistory` AFTER UPDATE ON `users` FOR EACH ROW INSERT INTO userinfohisory(tnUserName,tnPassword,tnEmail,tnFullName,tnPhoneNumber,tnState,tnAtTime)
VALUES(old.uUserName, old.uUserEmail, old.uUserPassword, old.uFullName, old.uUserPhoneNumber, old.uStatus, NOW()) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `world_cities`
--

DROP TABLE IF EXISTS `world_cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `world_cities` (
  `id` int NOT NULL,
  `city` varchar(45) DEFAULT NULL,
  `city_ascii` varchar(45) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `iso2` varchar(45) DEFAULT NULL,
  `iso3` varchar(45) DEFAULT NULL,
  `admin_name` varchar(45) DEFAULT NULL,
  `capital` varchar(45) DEFAULT NULL,
  `population` int DEFAULT NULL,
  `cid` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `world_cities`
--

LOCK TABLES `world_cities` WRITE;
/*!40000 ALTER TABLE `world_cities` DISABLE KEYS */;
/*!40000 ALTER TABLE `world_cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'hima'
--

--
-- Dumping routines for database 'hima'
--
/*!50003 DROP FUNCTION IF EXISTS `get_bookings` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `get_bookings`(city VARCHAR(45), bStatus VARCHAR(45)) RETURNS int
    DETERMINISTIC
RETURN (SELECT COUNT(b.bHotelID) FROM bookings b
JOIN hotels h ON b.bHotelID = h.hHotelID
JOIN bookingStatus bs ON b.bBookingStatusID = bs.bsBookingStatusID
WHERE h.hCity LIKE concat('%',city,'%') and bs.bsStatus LIKE concat('%',bStatus,'%')
) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `get_hotel_bookings` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `get_hotel_bookings`(hotelID int) RETURNS int
    DETERMINISTIC
return (SELECT COUNT(b.bHotelID) FROM bookings b WHERE b.bHotelID = hotelID) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `get_room_type` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `get_room_type`(room_id INT) RETURNS varchar(254) CHARSET utf8mb3
BEGIN
RETURN(SELECT rtRoomTypeEn FROM rooms join roomsnames rn on rRoomNameID = rnRoomNameID
join roomstypes on rnRoomTypeID = rtRoomTypeID where rRoomID = room_id);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addReservation` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addReservation`(IN hotelID INT,IN guestID INT, IN dateFrom DATE, IN dateTo DATE, IN psNum INT, IN ChildrenNum INT,IN bPaymentStatusID INT, IN paymentMethod INT, IN totalAmount double, IN fullName Varchar(45), IN phoneNumber varchar(45), IN email varchar(45), IN address varchar(45))
BEGIN
DECLARE bookingID INT;

INSERT INTO `hima`.`bookings` (`bHotelID`, `bGuestID`, `bDateFrom`, `bDateTo`,  `bNumOfGuests`, `bNumOfChildren`,`bPaymentStatusID`, `paymentMethod`,`totalAmount`, `fullName`, `phoneNumber`, `email`, `address`) VALUES (hotelID, guestID, dateFrom, dateTo, psNum, ChildrenNum, bPaymentStatusID, paymentMethod,totalAmount, fullName, phoneNumber, email, address);
-- to get the booking id from the bookings table to insert it to the roomsBooked table
SET bookingID = LAST_INSERT_ID();
SELECT bookingID as "bookingID", guestID as "guestID";

-- To decrase the reserved rooms from the available rooms in the hotel for the specified dates
-- CALL decreserooms(dateFrom,dateTo,RoomID, numOfRooms); -- is used when order confirmed
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addReservationNoGuest` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addReservationNoGuest`(IN hotelID INT, IN dateFrom DATE, IN dateTo DATE, IN psNum INT, IN ChildrenNum INT,IN gFullName VARCHAR(30),IN gCity VARCHAR(30),IN gPhoneNumber VARCHAR(30), IN gEmail VARCHAR(30),IN bPaymentStatusID INT, IN paymentMethod INT, IN totalAmount double )
BEGIN
DECLARE bookingID INT;

INSERT INTO `hima`.`bookings` (`bHotelID`, `bDateFrom`, `bDateTo`,  `bNumOfGuests`, `bNumOfChildren`,`bPaymentStatusID`, `paymentMethod`,`totalAmount`, `fullName`, `phoneNumber`, `email`, `address`) VALUES (hotelID, dateFrom, dateTo, psNum, ChildrenNum, bPaymentStatusID, paymentMethod, totalAmount, gfullName, gPhoneNumber,gEmail,gCity);
-- to get the booking id from the bookings table to insert it to the roomsBooked table
SET bookingID = LAST_INSERT_ID();
SELECT bookingID as "bookingID";
-- To decrase the reserved rooms from the available rooms in the hotel for the specified dates
-- CALL decreserooms(dateFrom,dateTo,RoomID, numOfRooms); -- is used when order confirmed
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `add_guest` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_guest`(IN ggFullName varchar(254),IN ggUserName varchar(254),IN ggPassword varchar(254),IN ggPhoneNumber varchar(254))
BEGIN
	DECLARE guest_id INT;
    INSERT INTO guests(gFullName,gUserName,gPassword,gPhoneNumber) VALUES (ggFullName ,ggUserName ,ggPassword ,ggPhoneNumber);
    SET guest_id = LAST_INSERT_ID();
    Select guest_id as guest_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `add_hotel` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_hotel`(IN UserID varchar(254),IN HotelName varchar(254),IN HotelRating varchar(254),IN City varchar(254),IN State varchar(254),IN ZipCode varchar(254),IN MainPhoneNumber varchar(254),IN NormalNumber varchar(254),IN CompanyMailAddress varchar(254),IN Address varchar(254),IN MapsLocation varchar(254))
BEGIN
	DECLARE hotel_id INT;
   INSERT INTO hotels (`hUserID`, `hHotelName`, `hHotelRating`, `hCity`, `hState`, `hZipCode`, `hMainPhoneNumber`, `hNormalNumber`, `hCompanyMailAddress`, `hActive`, `hAddress`, `hMapsLocation`) VALUES (UserID, HotelName, HotelRating,City,State, ZipCode, MainPhoneNumber, NormalNumber, CompanyMailAddress, 1, Address, MapsLocation);
    SET hotel_id = LAST_INSERT_ID();
    Select hotel_id as hotel_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `add_user` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_user`(IN uUserEmail varchar(254),IN uUserName varchar(254),IN uUserPassword varchar(254),IN uUserPhoneNumber varchar(254),IN uFullName varchar(254))
BEGIN
	DECLARE user_id INT;
    INSERT INTO users(uUserEmail,uUserName,uUserPassword,uUserPhoneNumber,uFullName) VALUES (uUserEmail,uUserName, uUserPassword ,uUserPhoneNumber,uFullName);
    SET user_id = LAST_INSERT_ID();
    Select user_id as user_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `allAccounts` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `allAccounts`()
BEGIN
SELECT aFullName, 'Admin' as `User Type`  FROM admins union 
SELECT uUserName, 'User' as `User Type`  FROM users union
SELECT gFullName, 'Guest' as `User Type` FROM guests union
SELECT cOwnerFullName, 'Company' as `User Type` FROM companies;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `available_rooms` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `available_rooms`(IN roomID int, IN checkIN date, IN checkOut date)
BEGIN
################################# to select a list of dates between 2 dates #######################################################################
#screate a temp table contains list of the dates between check in and checkout dates
DROP TABLE IF EXISTS datesList;
CREATE TEMPORARY TABLE IF NOT EXISTS datesList AS (select * from 
(select adddate('1970-01-01',t4.i*10000 + t3.i*1000 + t2.i*100 + t1.i*10 + t0.i) selected_date from
 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2,
 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3,
 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4) v
where selected_date between checkIN and checkOut);

select MIN(rARoomsNum) as min_rooms from rates r join datesList dl on r.rDate = dl.selected_date where r.rRoomsID = roomID and r.rOpenClose = 1;

########################################################################

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `decreserooms` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `decreserooms`(IN dateStart DATE, IN dateEnd DATE,IN roomID INT, IN numOfRooms INT)
BEGIN
	WHILE dateStart <= dateEnd DO
    UPDATE `hima`.`rates` SET `rARoomsNum` = `rARoomsNum` - numOfRooms
    WHERE (`rRoomsID` = roomID and `rDate` = dateStart);
    SET dateStart = date_add(dateStart, INTERVAL 1 DAY);
  END WHILE;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_rooms_photos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_rooms_photos`(IN room_id INT)
BEGIN
SELECT rpPhotoPath as `path` FROM roomsphotos WHERE rpRoomsID = room_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `removehotel` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `removehotel`(hotelID int)
BEGIN
	SET SQL_SAFE_UPDATES = 0;
	DELETE FROM hotels_has_payments WHERE `hotels_hHotelID` = hotelID;
    DELETE FROM hotelsphotos WHERE `hotels_hHotelID` = hotelID;
    DELETE FROM bookings WHERE `bHotelID` = hotelID;
    DELETE FROM hotels_has_policies WHERE `hotels_hHotelID` = hotelID;
    DELETE FROM hotels_rates WHERE `hotels_hHotelID`  = hotelID;
    DELETE FROM hotels WHERE `hHotelID` = hotelID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `removeroom` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `removeroom`(IN hotelID INT, IN roomID INT)
BEGIN
	DELETE FROM rates WHERE (`rRoomsID` = roomID);
    DELETE FROM roomsphotos WHERE (`rpRoomsID` = roomID);
    -- since we are using cascade which automaticly removes the related records, therefore we don't need to go for removing them.
	DELETE FROM rooms WHERE (`rHotelID` = hotelID and `rRoomID` = roomID);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `roomRate` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `roomRate`(IN roomID int, IN checkIN date, IN checkOut date)
BEGIN
DROP TABLE IF EXISTS roomsRates;
CREATE TEMPORARY TABLE IF NOT EXISTS roomsRates AS (select * from 
(select adddate('1970-01-01',t4.i*10000 + t3.i*1000 + t2.i*100 + t1.i*10 + t0.i) selected_date from
 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2,
 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3,
 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4) v
where selected_date between checkIN and checkOut);
select SUM(rRate) from rates r join roomsRates rt on r.rDate = rt.selected_date where r.rRoomsID = roomID and r.rOpenClose = 1 and rDate != checkIN;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `rooms_info` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `rooms_info`(IN hotel_id int)
BEGIN
SELECT * FROM rooms r
        Join roomsnames rn ON r.rRoomNameID = rn.rnRoomNameID
        join roomstypes rt ON rn.rnRoomTypeID = rt.rtRoomTypeID
        JOIN hotels h ON r.rHotelID = h.hHotelID
        WHERE r.rHotelID = hotel_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `search2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `search2`(IN psNumbers INT,IN fromDate DATE, IN toDate DATE,IN roomsNumbers INT,IN searchCity varchar(254))
BEGIN
--
		-- SELECT h.hHotelID,rs.rRoomsID,rs.rRateTypeID, SUM(rRate) AS TOTAL_RATE, COUNT(rDate) AS NUMBEROFNIGHTS,rARoomsNum as roomsLeft
-- 		FROM rates rs
-- 		JOIN rooms r ON rs.rRoomsID = r.rRoomID
-- 		JOIN hotels h ON r.rHotelID = h.hHotelID
-- 		WHERE r.rMaxPas >= psNumbers AND rs.rDate BETWEEN FromDate AND toDate
-- 			 AND r.rRoomStatusID = '2' AND rs.rARoomsNum >= roomsNumbers
-- 		 GROUP BY rs.rRoomsID,rRateTypeID ;
         
-- This code outputs only the recoreds that have the same amount of nights accouding to the user date input
-- it removes the rows that doesn't have maching number of nights that associated with the user input date
-- 	CREATE OR REPLACE VIEW search2 AS
-- 		SELECT * FROM #firstResult WHERE NUMBEROFNIGHTS = datediff('2020-06-12','2020-06-09')+1;
-- -- This view is to output the lowest price according to each hotel
-- -- The outpur is going to be list of unique values of hotelsID each one with the lowest price.
-- SELECT * FROM #SecondResult WHERE NUMBEROFNIGHTS = datediff('2020-06-12','2020-06-09')+1;

-- ## By concatinating the three outputs we will get the final result which is what we are looking for
		SELECT hotelID, hotelName ,rating , city ,location, roomID,roomName,roomDetails,rateTypeID, rateType,fromDate,toDate,lower(TOTAL_RATE),
        NUMBEROFNIGHTS,roomsLeft FROM (SELECT * FROM
        (SELECT h.hHotelID as hotelID, h.hHotelName as hotelName , h.hHotelRating as rating , h.hCity as city ,h.hMapsLocation as location,
        rs.rRoomsID as roomID,rn.rnRoomNameEn as roomName,rDescription as roomDetails ,rs.rARoomsNum as roomsLeft,rs.rRateTypeID as rateTypeID, rt.rtRateType as rateType,fromDate,ToDate,
        SUM(rRate) AS TOTAL_RATE, COUNT(rDate) AS NUMBEROFNIGHTS
		FROM rates rs
		JOIN rooms r ON rs.rRoomsID = r.rRoomID
		JOIN hotels h ON r.rHotelID = h.hHotelID
        JOIN roomsnames rn ON r.rRoomNameID = rn.rnRoomNameID
        JOIN ratetypes rt ON rs.rRateTypeID = rt.rtRateTypeID
		WHERE r.rMaxPas >= psNumbers AND rs.rDate BETWEEN DATE_ADD(fromDate, INTERVAL 1 DAY) AND toDate
			 AND r.rRoomStatusID = '2' AND rs.rARoomsNum >= '1'
             AND h.hCity LIKE concat('%',searchCity,'%')
		 GROUP BY rs.rRoomsID,rRateTypeID) as T
         WHERE NUMBEROFNIGHTS = datediff(toDate,DATE_ADD(fromDate, INTERVAL 1 DAY))+1) as T1 group by hotelID;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `accounts_num`
--

/*!50001 DROP VIEW IF EXISTS `accounts_num`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `accounts_num` AS select 'Admins' AS `Admins`,count(`admins`.`aAdminID`) AS `count(aAdminID)` from `admins` union select 'Users' AS `Users`,count(`users`.`uUserID`) AS `count(uUserID)` from `users` union select 'Guests' AS `Guests`,count(`guests`.`gGuestID`) AS `count(gGuestID)` from `guests` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `available_hotels`
--

/*!50001 DROP VIEW IF EXISTS `available_hotels`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `available_hotels` AS select `h`.`hHotelID` AS `hHotelID`,`h`.`hUserID` AS `hUserID`,`h`.`hHotelName` AS `hHotelName`,`h`.`hHotelRating` AS `hHotelRating`,`h`.`hAddress2` AS `hAddress2`,`h`.`hCity` AS `hCity`,`h`.`hState` AS `hState`,`h`.`hZipCode` AS `hZipCode`,`h`.`hMainPhoneNumber` AS `hMainPhoneNumber`,`h`.`hNormalNumber` AS `hNormalNumber`,`h`.`hCompanyMailAddress` AS `hCompanyMailAddress`,`h`.`hWebsiteAddress` AS `hWebsiteAddress`,`h`.`hLogoPath` AS `hLogoPath`,`h`.`hActive` AS `hActive`,`h`.`hAddress` AS `hAddress`,`h`.`hMapsLocation` AS `hMapsLocation`,`h`.`hCreatingDate` AS `hCreatingDate`,`h`.`contact_name` AS `contact_name`,`h`.`contact_email` AS `contact_email`,`h`.`contact_phone` AS `contact_phone`,`h`.`contact_phone_2` AS `contact_phone_2`,`h`.`hMainPhotoID` AS `hMainPhotoID`,`r`.`rRoomID` AS `rRoomID`,`r`.`rHotelID` AS `rHotelID`,`r`.`rRoomStatusID` AS `rRoomStatusID`,`r`.`rRoomNameID` AS `rRoomNameID`,`r`.`rMaxPas` AS `rMaxPas`,`r`.`rFloor` AS `rFloor`,`r`.`rRoomsNumbers` AS `rRoomsNumbers`,`r`.`rDescription` AS `rDescription`,`r`.`rCustomName` AS `rCustomName`,`r`.`rSmokingPolicy` AS `rSmokingPolicy`,`r`.`rRoomSize` AS `rRoomSize`,`r`.`rLowestPrice` AS `rLowestPrice`,`r`.`rOfferLower` AS `rOfferLower`,`r`.`rDisscount` AS `rDisscount`,`r`.`rCreatingDate` AS `rCreatingDate`,`r`.`num_bed_rooms` AS `num_bed_rooms`,`r`.`num_living_rooms` AS `num_living_rooms`,`r`.`num_bathrooms` AS `num_bathrooms`,`r`.`beds_kinds` AS `beds_kinds`,`r`.`bed_num` AS `bed_num`,`rs`.`rRateID` AS `rRateID`,`rs`.`rRoomsID` AS `rRoomsID`,`rs`.`hotels_rates_id` AS `hotels_rates_id`,`rs`.`rRate` AS `rRate`,`rs`.`rDate` AS `rDate`,`rs`.`rARoomsNum` AS `rARoomsNum`,`rs`.`rAddingDate` AS `rAddingDate`,`rs`.`rOpenClose` AS `rOpenClose` from ((`hotels` `h` join `rooms` `r` on((`h`.`hHotelID` = `r`.`rHotelID`))) join `rates` `rs` on((`r`.`rRoomID` = `rs`.`rRoomsID`))) where ((`rs`.`rARoomsNum` > 0) and (`rs`.`rDate` >= now())) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `blocked_list`
--

/*!50001 DROP VIEW IF EXISTS `blocked_list`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `blocked_list` AS select `users`.`uUserName` AS `User Name`,`users`.`uUserID` AS `User ID` from `users` where (`users`.`uStatus` = '0') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `hotels_users`
--

/*!50001 DROP VIEW IF EXISTS `hotels_users`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `hotels_users` AS select `h`.`hHotelName` AS `hHotelName`,`u`.`uFullName` AS `uFullName` from (`hotels` `h` join `users` `u` on((`h`.`hHotelID` = `u`.`uUserID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `no_of_hotels_in_each_city`
--

/*!50001 DROP VIEW IF EXISTS `no_of_hotels_in_each_city`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `no_of_hotels_in_each_city` AS select `hotels`.`hCity` AS `City`,count(`hotels`.`hCity`) AS `Number of hotels` from `hotels` group by `hotels`.`hCity` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `todays_bookings`
--

/*!50001 DROP VIEW IF EXISTS `todays_bookings`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `todays_bookings` AS select `bookings`.`bBookingID` AS `bBookingID`,`bookings`.`bGuestID` AS `bGuestID`,`bookings`.`bBookingStatusID` AS `bBookingStatusID`,`bookings`.`bPaymentStatusID` AS `bPaymentStatusID`,`bookings`.`bDateFrom` AS `bDateFrom`,`bookings`.`bDateTo` AS `bDateTo`,`bookings`.`bNumOfNights` AS `bNumOfNights`,`bookings`.`bNumOfGuests` AS `bNumOfGuests`,`bookings`.`bNumOfChildren` AS `bNumOfChildren`,`bookings`.`bCreatingDate` AS `bCreatingDate`,`bookings`.`bDisscount` AS `bDisscount`,`bookings`.`bRate` AS `bRate` from `bookings` where (`bookings`.`bCreatingDate` = cast(now() as date)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-17 17:10:25
