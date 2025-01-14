-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: ecr
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `contact_number` varchar(12) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'samansilva@gmail.com','saman Admin',NULL,'0771111152','12345678'),(2,'pererasilva@gmail.com','perera Admin',NULL,'0772222222','12345678');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vehicle_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` int DEFAULT NULL,
  `pickup_date` date DEFAULT NULL,
  `drop_off_date` date DEFAULT NULL,
  `duration_hour` int DEFAULT NULL,
  `current_location` varchar(60) DEFAULT NULL,
  `additional_info` varchar(3000) DEFAULT NULL,
  `payment_recipt_id` varchar(45) DEFAULT NULL,
  `value` double DEFAULT NULL,
  `trip_advisor_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_booking_vehicle1_idx` (`vehicle_id`),
  KEY `fk_booking_customer1_idx` (`customer_id`),
  KEY `fk_trip_advisor_id_idx` (`trip_advisor_id`),
  CONSTRAINT `fk_booking_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  CONSTRAINT `fk_booking_vehicle1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`),
  CONSTRAINT `fk_trip_advisor_id` FOREIGN KEY (`trip_advisor_id`) REFERENCES `trip_advisor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (13,1,1,'2023-06-09 20:37:30',1,'2023-06-07','2023-06-16',NULL,'Ragama','...','#4255245634',10000,2),(14,1,1,'2023-06-09 20:37:57',1,'2023-06-10','2023-06-17',NULL,'Kirindiwela','...','#qw214245325',1500,2),(15,1,1,'2023-06-09 20:39:20',5,'2023-06-17','2023-06-22',NULL,'Gampaha','l....','235645',5000,2),(16,1,1,'2023-06-09 20:57:16',1,'2023-06-10','2023-06-17',NULL,'Gampaha','asdf','12345',200,2),(17,1,1,'2023-06-09 23:23:26',1,'2023-06-16','2023-06-24',NULL,'Negombo','q',NULL,NULL,2),(18,2,1,'2023-06-09 23:24:03',1,'2023-06-15','2023-06-15',NULL,'Sigiriya Town','yq',NULL,NULL,2),(19,2,1,'2023-06-10 03:34:18',1,'2023-06-10','2023-06-21',NULL,'Peradeniya','hi','#eedrrerefk',100000,2),(20,2,1,'2023-06-11 00:48:01',1,'2023-06-09','2023-06-16',NULL,'Peradeniya','hi',NULL,NULL,2),(21,1,1,'2023-06-11 17:15:11',1,'2023-06-06','2023-06-30',NULL,'pugoda','','',50000,1),(22,1,1,'2023-06-11 18:10:00',1,'2023-06-01','2023-06-29',NULL,'gampaha','',NULL,NULL,NULL),(23,1,1,'2023-06-11 18:25:40',5,'2023-06-13','2023-07-06',NULL,'kaduwela','','502545',5700,1),(24,1,1,'2023-06-22 14:48:13',0,'2023-06-24','2023-06-30',NULL,'malabe','',NULL,NULL,4);
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` varchar(1000) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `customer_id` int NOT NULL,
  `trip_advisor_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chat_customer1_idx` (`customer_id`),
  KEY `fk_chat_trip_advisor1_idx` (`trip_advisor_id`),
  CONSTRAINT `fk_chat_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  CONSTRAINT `fk_chat_trip_advisor1` FOREIGN KEY (`trip_advisor_id`) REFERENCES `trip_advisor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(180) DEFAULT NULL,
  `nic_number` varchar(12) DEFAULT NULL,
  `contact_number` varchar(12) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'shehan@gmail.com','shehan',NULL,'kirindiwela','2001232311','07558585454','12345678',0),(2,'pasidu@gamil.com','pasidu',NULL,'kadawatha','199455747v','07254585488','12345678',0),(3,'sahan@gmail.com','sahan',NULL,'gampaha','199595656v','07412514545','11111111',1),(4,'ravidu@gmail.com','ravidu',NULL,'malabe','20000005152','07582565416','22222222',0),(5,'roshan@gmail.com','rosan',NULL,'kaduwela','20022121515','07774445452','33333333',0),(6,'rangana@gmail.com','rangana',NULL,'athurugiriya','20024414158','07415255744','44444444',1),(7,'asanka@gmail.com','asanka',NULL,'kandy','20020212516','01158254955','55555555',0),(8,'shrimal@gmail.com','srimal',NULL,'gampaha','1994555898','07758545484','6666666',2),(9,'rohitha@gmail.com','rohitha',NULL,'gampola','19955885544','07585898798','7777777',0),(10,'sameera@gmail.com','sameera',NULL,'kaduwela','19999895525','07748585255','8888888',2);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance`
--

DROP TABLE IF EXISTS `insurance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Insurance_number` varchar(20) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `month_count` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance`
--

LOCK TABLES `insurance` WRITE;
/*!40000 ALTER TABLE `insurance` DISABLE KEYS */;
INSERT INTO `insurance` VALUES (3,'12514215','2023-06-11',NULL),(4,'32254541','2023-06-01',NULL),(5,'11552587','2023-05-11',NULL),(6,'25258787','2023-03-11',NULL),(7,'54524842','2023-02-02',NULL),(8,'11424525','2023-01-14',NULL),(9,'25445754','2023-04-02',NULL),(10,'11245445','2023-06-02',NULL);
/*!40000 ALTER TABLE `insurance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `license`
--

DROP TABLE IF EXISTS `license`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `license` (
  `id` int NOT NULL AUTO_INCREMENT,
  `license_number` varchar(25) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `mounth_cout` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `license`
--

LOCK TABLES `license` WRITE;
/*!40000 ALTER TABLE `license` DISABLE KEYS */;
INSERT INTO `license` VALUES (1,'2524545','2023-02-05',12),(2,'1415241','2023-06-05',NULL),(3,'1412552','2023-02-11',NULL),(4,'1425875','2023-08-05',NULL),(5,'2544874','2023-02-21',NULL),(6,'2522424','2023-07-01',NULL),(7,'1454587','2023-05-14',NULL),(8,'2524225','2023-06-20',NULL),(9,'4584525','2023-01-11',NULL),(10,'4545885','2023-01-11',NULL);
/*!40000 ALTER TABLE `license` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manager` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manager`
--

LOCK TABLES `manager` WRITE;
/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` VALUES (2,'piris@gmail.com','200214445','piris'),(3,'sadaru@gmail.com','25545856','sadaru'),(4,'lakshan@gmail.com','32288774','lakshan'),(5,'saman@gmail.com','21252548','saman'),(6,'pasidu@gmail.com','32545488','pasidu'),(7,'kasun@gmail.com','15545454','kasun'),(8,'lahiru@gmail.com','45452524','lahiru');
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pay_value` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `customer_id` int NOT NULL,
  `staff_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_customer1_idx` (`customer_id`),
  KEY `fk_payment_staff1_idx` (`staff_id`),
  CONSTRAINT `fk_payment_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  CONSTRAINT `fk_payment_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sallery`
--

DROP TABLE IF EXISTS `sallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sallery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `staff_id` int DEFAULT NULL,
  `month` varchar(45) DEFAULT NULL,
  `sallery` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_satff_id_idx` (`staff_id`),
  CONSTRAINT `fk_satff_id` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sallery`
--

LOCK TABLES `sallery` WRITE;
/*!40000 ALTER TABLE `sallery` DISABLE KEYS */;
INSERT INTO `sallery` VALUES (1,1,'2023-05','20000'),(2,1,'2023-07','25000'),(3,1,'2023-01','222000'),(4,1,'2023-05','50000');
/*!40000 ALTER TABLE `sallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_type`
--

DROP TABLE IF EXISTS `service_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_type`
--

LOCK TABLES `service_type` WRITE;
/*!40000 ALTER TABLE `service_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `service_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `service_type_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_staff_service_type_idx` (`service_type_id`),
  CONSTRAINT `fk_staff_service_type` FOREIGN KEY (`service_type_id`) REFERENCES `service_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'kalhara@gmail.com','kalhara',NULL,'12345678',NULL,0),(2,'samitha@gmail.com','samitha',NULL,'12345678',NULL,0),(3,'sumudu@gmail.com','sumudu',NULL,'23242321',NULL,0),(4,'nipuni@gamil.com','nipuni',NULL,'65858977',NULL,0),(5,'sadani@gmail.com','sadani',NULL,'58898858',NULL,0);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trip`
--

DROP TABLE IF EXISTS `trip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trip` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vehicle_return_status` int DEFAULT NULL,
  `booking_id` int NOT NULL,
  `trip_advisor_id` int NOT NULL,
  `vehicle_issues` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_trip_booking1_idx` (`booking_id`),
  KEY `fk_trip_trip_advisor1_idx` (`trip_advisor_id`),
  CONSTRAINT `fk_trip_booking1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`),
  CONSTRAINT `fk_trip_trip_advisor1` FOREIGN KEY (`trip_advisor_id`) REFERENCES `trip_advisor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trip`
--

LOCK TABLES `trip` WRITE;
/*!40000 ALTER TABLE `trip` DISABLE KEYS */;
/*!40000 ALTER TABLE `trip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trip_advisor`
--

DROP TABLE IF EXISTS `trip_advisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trip_advisor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `contact_number` varchar(12) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trip_advisor`
--

LOCK TABLES `trip_advisor` WRITE;
/*!40000 ALTER TABLE `trip_advisor` DISABLE KEYS */;
INSERT INTO `trip_advisor` VALUES (1,'kasun@gmail.com','kasun',NULL,'0775854587','12345678',0),(2,'pasiduperera@gmail.com','pasidu perera',NULL,'0753659288','12345678',0),(3,'malsha@gmail.com','malsha',NULL,'0725565678','23568978',0),(4,'samitha@gmail.com','samith',NULL,'0774745575','14424545',0),(5,'kavisha@gmail.coom','kavisha',NULL,'0778582526','35552558',0),(6,'maneesha@gmail.com','maneesha',NULL,'0774555888','36565958',NULL);
/*!40000 ALTER TABLE `trip_advisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `plate_number` varchar(10) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `passanger_count` int DEFAULT NULL,
  `price_for_24_hour` double DEFAULT NULL,
  `image_path` varchar(120) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `live_status` int DEFAULT NULL,
  `v_name` varchar(45) DEFAULT NULL,
  `vehicle_brand_id` int DEFAULT NULL,
  `vehicle_type_id` int DEFAULT NULL,
  `license_number` varchar(45) DEFAULT NULL,
  `license_start_date` date DEFAULT NULL,
  `insurance_number` varchar(45) DEFAULT NULL,
  `insurance_start_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vehicle_brand_id_idx` (`vehicle_brand_id`),
  KEY `fl_vehicle_type_id_idx` (`vehicle_type_id`),
  CONSTRAINT `fk_vehicle_brand_id` FOREIGN KEY (`vehicle_brand_id`) REFERENCES `vehicle_brand` (`id`),
  CONSTRAINT `fl_vehicle_type_id` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehicle_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
INSERT INTO `vehicle` VALUES (1,'ABC-4565','abccba',4,123,'public/image/vehicle_images/toyota1.jpg',0,0,'Toyota Fortuner TRD Limited Edition',1,1,'wrfe','2023-06-10','wefwfew','2023-06-10'),(2,'BCD-2134','The Toyota Rush is a compact SUV that combines versatility, style, and practicality. With its spacious interior and flexible seating options, it can comfortably accommodate both passengers and cargo. Equipped with advanced safety features and a reliable engine, the Toyota Rush is perfect for urban adventures and weekend getaways.',3,4500,'public/image/vehicle_images/toyota_rush.jpg',0,0,'Toyota Rush',1,1,'2524545','2023-02-05','12514215','2023-06-11'),(5,'ACC-2357','The Toyota Aqua, also known as the Prius C, is a hybrid subcompact car. It combines a gasoline engine with an electric motor to deliver impressive fuel economy. The Aqua offers a spacious interior and a smooth driving experience',3,3500,'public\\image\\vehicle_images\\alto.jpeg',0,0,'alto',1,1,'1415241','2023-06-05','32254541','2023-06-01'),(6,'AXS-3958','The Honda Insight is another hybrid car that focuses on fuel efficiency. It features a sleek design and advanced technology, making it an environmentally-friendly choice. The Insight provides a comfortable cabin and a range of safety features',3,4000,'public\\image\\vehicle_images\\insight.jpeg',0,0,'insight',3,1,'1412552','2023-02-11','11552587','2023-05-11'),(7,'ABC-3520','The Toyota Premio is a mid-size sedan that offers a blend of luxury and practicality. It features a stylish exterior, a refined interior, and a smooth ride. The Premio is equipped with modern amenities and advanced safety systems',3,5500,'public\\image\\vehicle_images\\premio.jpeg',0,0,'premio',1,1,'1425875','2022-08-05','25258787','2023-03-11'),(8,'CBB-1052','The Prius is a well-known hybrid vehicle that has gained popularity for its excellent fuel economy and low emissions. It offers a spacious interior, comfortable seats, and a host of advanced features. The Prius is a reliable and eco-friendly option for those seeking a compact car.',3,5500,'public\\image\\vehicle_images\\prius.jpeg',0,0,'prius',1,1,'2544874','2023-02-21','54524842','2023-02-02'),(9,'AAB-5020','The Toyota Vitz, also known as the Yaris, is a subcompact hatchback. It is known for its reliability, fuel efficiency, and maneuverability. The Vitz provides a comfortable ride, ample cargo space, and a range of features designed to enhance convenience and safety',3,5000,'public\\image\\vehicle_images\\vits.jpeg',0,0,'vits',1,1,'2522424','2022-07-01','11424525','2022-07-01'),(10,'PA-2132','The KDH van, produced by Toyota, is a popular choice for commercial transportation and passenger-carrying purposes. It is a spacious and versatile van that offers comfortable seating and ample cargo space.',10,8000,'public\\image\\vehicle_images\\KDH.jpeg',0,0,'KDH',1,3,'1454587','2023-05-14','25445754','2023-05-14');
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_brand`
--

DROP TABLE IF EXISTS `vehicle_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle_brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_brand`
--

LOCK TABLES `vehicle_brand` WRITE;
/*!40000 ALTER TABLE `vehicle_brand` DISABLE KEYS */;
INSERT INTO `vehicle_brand` VALUES (1,'Toyota'),(2,'xyz'),(3,'honda');
/*!40000 ALTER TABLE `vehicle_brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_type`
--

DROP TABLE IF EXISTS `vehicle_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_type`
--

LOCK TABLES `vehicle_type` WRITE;
/*!40000 ALTER TABLE `vehicle_type` DISABLE KEYS */;
INSERT INTO `vehicle_type` VALUES (1,'Car'),(2,'Jeep'),(3,'van'),(4,'carina');
/*!40000 ALTER TABLE `vehicle_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-22 15:49:07
