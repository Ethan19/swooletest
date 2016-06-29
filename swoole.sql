-- MySQL dump 10.13  Distrib 5.5.48, for Linux (x86_64)
--
-- Host: localhost    Database: swoole
-- ------------------------------------------------------
-- Server version	5.5.48-log

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
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` tinytext NOT NULL COMMENT '消息内容',
  `userId` varchar(20) NOT NULL COMMENT '记录用户的id',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '消息发送时间',
  `fd` varchar(20) NOT NULL COMMENT '客户端标示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=194514 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (194509,'1111','','0000-00-00 00:00:00','user-1'),(194510,'111','','0000-00-00 00:00:00','user-1'),(194511,'111','','0000-00-00 00:00:00','user-1'),(194512,'111','','2016-06-21 04:00:15','user-1'),(194513,'3333','','0000-00-00 00:00:00','user-1');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` char(10) DEFAULT NULL,
  `avator` varchar(100) DEFAULT NULL,
  `time` int(10) DEFAULT NULL,
  `fd` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=415 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (390,'name366','avator366',1465975031,366),(391,'name367','avator367',1465975031,367),(392,'name368','avator368',1465975031,368),(393,'name369','avator369',1465975031,369),(394,'name370','avator370',1465975031,370),(395,'name371','avator371',1465975031,371),(396,'name372','avator372',1465975032,372),(397,'name373','avator373',1465975032,373),(398,'name1','avator1',1465983378,1),(399,'name2','avator2',1465983422,2),(400,'name3','avator3',1465983433,3),(401,'name4','avator4',1465983462,4),(402,'name1','avator1',1465983494,1),(403,'name2','avator2',1465983500,2),(404,'name3','avator3',1465984079,3),(405,'name4','avator4',1465984103,4),(406,'name5','avator5',1465984158,5),(407,'name6','avator6',1465984164,6),(408,'name7','avator7',1465984175,7),(409,'name8','avator8',1465984177,8),(410,'name9','avator9',1465984184,9),(411,'name10','avator10',1465984184,10),(412,'name11','avator11',1465984200,11),(413,'name12','avator12',1465984285,12),(414,'name1','avator1',1465984645,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-22 11:48:03
