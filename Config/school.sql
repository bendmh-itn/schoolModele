-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: school
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `option_ecole`
--

DROP TABLE IF EXISTS `option_ecole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `option_ecole` (
  `optionEcoleId` int NOT NULL AUTO_INCREMENT,
  `schoolId` int DEFAULT NULL,
  `optionScolaireId` int DEFAULT NULL,
  PRIMARY KEY (`optionEcoleId`),
  KEY `schoolId` (`schoolId`),
  KEY `optionScolaireId` (`optionScolaireId`),
  CONSTRAINT `option_ecole_ibfk_1` FOREIGN KEY (`schoolId`) REFERENCES `school` (`schoolId`),
  CONSTRAINT `option_ecole_ibfk_2` FOREIGN KEY (`optionScolaireId`) REFERENCES `optionscolaire` (`optionScolaireId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `option_ecole`
--

LOCK TABLES `option_ecole` WRITE;
/*!40000 ALTER TABLE `option_ecole` DISABLE KEYS */;
INSERT INTO `option_ecole` VALUES (1,1,2),(2,1,3),(3,2,1),(4,3,1),(5,4,1);
/*!40000 ALTER TABLE `option_ecole` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `optionscolaire`
--

DROP TABLE IF EXISTS `optionscolaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `optionscolaire` (
  `optionScolaireId` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`optionScolaireId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `optionscolaire`
--

LOCK TABLES `optionscolaire` WRITE;
/*!40000 ALTER TABLE `optionscolaire` DISABLE KEYS */;
INSERT INTO `optionscolaire` VALUES (1,'général'),(2,'Transition technique'),(3,'Qualification technique'),(4,'Qualification professionnel');
/*!40000 ALTER TABLE `optionscolaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `school` (
  `schoolId` int NOT NULL AUTO_INCREMENT,
  `schoolNom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `schoolAdresse` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `schoolVille` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `schoolCodePostal` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `schoolNumero` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `schoolImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `utilisateurId` int DEFAULT NULL,
  PRIMARY KEY (`schoolId`),
  KEY `utilisateurId` (`utilisateurId`),
  CONSTRAINT `school_ibfk_1` FOREIGN KEY (`utilisateurId`) REFERENCES `utilisateurs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school`
--

LOCK TABLES `school` WRITE;
/*!40000 ALTER TABLE `school` DISABLE KEYS */;
INSERT INTO `school` VALUES (1,'ITN','Rue de la pepinière 101','Namur','5002','081729011','https://i.ytimg.com/vi/7sWnSyBp1lE/maxresdefault.jpg',35),(2,'Collège saint Servais','chau de Waterloo 52','Namur','5000','0499689850','https://cloudfront-eu-central-1.images.arcpublishing.com/ipmgroup/NKIYZVJXG5BIDEFUQGA6LWPFOU.jpg',35),(3,'Institut saint Albert','Av. Fernand Charlot 35','Jodoigne','1370','010811250','https://ds.static.rtbf.be/article/image/1248x702/e/b/2/423514d82b9f6ddb2ceac21514b7c4be-1520325248.jpg',35),(4,'Ecole de l\'enfant Jésus','Rue de Sotriamont 1','Nivelles','1400','067893800','http://iejn.be/images/logo/gauche.png',35);
/*!40000 ALTER TABLE `school` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomUser` varchar(255) NOT NULL,
  `prenomUser` varchar(25) NOT NULL,
  `loginUser` varchar(25) NOT NULL,
  `passWordUser` varchar(25) NOT NULL,
  `role` varchar(255) DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (35,'test','test','test','test','user'),(37,'test','test','test2','test','user');
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-10 16:19:52
