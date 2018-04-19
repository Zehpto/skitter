CREATE DATABASE  IF NOT EXISTS `skitter` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `skitter`;

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

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `rit_user` char(7) NOT NULL,
  `email` varchar(100) NOT NULL,
  `display_name` varchar(30) NOT NULL,
  `profile_picture` blob,
  PRIMARY KEY (`rit_user`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `rit_user_UNIQUE` (`rit_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `influencer_id` char(7) NOT NULL,
  `follower_id` char(7) NOT NULL,
  PRIMARY KEY (`influencer_id`,`follower_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `follower_data_idx` (`follower_id`),
  CONSTRAINT `follower_data` FOREIGN KEY (`follower_id`) REFERENCES `users` (`rit_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `influencer_data` FOREIGN KEY (`influencer_id`) REFERENCES `users` (`rit_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('bob1234','bob@skitter.com','Bob McAlister', NULL), ('joe5678','joe@skitter.com','Joe Smith', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
INSERT INTO `follows` VALUES (1,'bob1234','joe5678'),(2,'joe5678','bob1234');
/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

