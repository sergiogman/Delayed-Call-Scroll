-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.21-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema `delayed-call-scroll`
--

CREATE DATABASE IF NOT EXISTS `delayed-call-scroll`;
USE `delayed-call-scroll`;

--
-- Definition of table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `mes_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`mes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`mes_id`,`msg`) VALUES 
 (1,'a'),
 (2,'b'),
 (3,'c'),
 (4,'d'),
 (5,'e'),
 (6,'f'),
 (7,'g'),
 (8,'h'),
 (9,'i'),
 (10,'j'),
 (11,'k'),
 (12,'l'),
 (13,'m'),
 (14,'n'),
 (15,'o'),
 (16,'p'),
 (17,'r'),
 (18,'s'),
 (19,'t'),
 (20,'u'),
 (21,'v'),
 (22,'y'),
 (23,'z'),
 (24,'aa'),
 (25,'bb'),
 (27,'dd'),
 (28,'ee'),
 (29,'ff'),
 (30,'gg'),
 (31,'hh'),
 (32,'ii'),
 (33,'jj'),
 (34,'kk'),
 (35,'ll'),
 (36,'mm'),
 (37,'nn'),
 (38,'oo'),
 (39,'pp'),
 (40,'rr'),
 (41,'ss'),
 (42,'tt'),
 (43,'uu'),
 (44,'vv'),
 (45,'yy'),
 (46,'zz');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
