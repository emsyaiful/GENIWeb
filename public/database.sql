/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.6.16 : Database - coba
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`coba` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `coba`;

/*Table structure for table `gen_0101_user` */

DROP TABLE IF EXISTS `gen_0101_user`;

CREATE TABLE `gen_0101_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_company` varchar(100) NOT NULL,
  `user_typecompany` varchar(50) NOT NULL,
  `user_addresscompany` longtext NOT NULL,
  `user_timecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_isactive` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `gen_0103_contact` */

DROP TABLE IF EXISTS `gen_0103_contact`;

CREATE TABLE `gen_0103_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(50) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `contact_subject` text,
  `contact_message` longtext,
  `contact_timecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_user_login` FOREIGN KEY (`id`) REFERENCES `gen_0101_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
