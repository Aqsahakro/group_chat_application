/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - group_chat_application
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`group_chat_application` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `group_chat_application`;

/*Table structure for table `chat_message` */

DROP TABLE IF EXISTS `chat_message`;

CREATE TABLE `chat_message` (
  `chat_message` int(11) NOT NULL AUTO_INCREMENT,
  `message` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message_time` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`chat_message`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `chat_message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `chat_message` */

insert  into `chat_message`(`chat_message`,`message`,`user_id`,`message_time`) values 
(1,'my name is Aqsa',1,NULL),
(37,'hidaya trust',1,NULL),
(42,'hello ',2,NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_online` varchar(200) DEFAULT '0',
  `log_time` varchar(250) DEFAULT NULL,
  `user_profile` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`user_id`,`first_name`,`last_name`,`email`,`password`,`is_online`,`log_time`,`user_profile`) values 
(1,'Aqsa','Hakro','hakroaqsa@gmail.com','12345','1',NULL,'images/image3.png'),
(2,'Ahmed','Shaikh','ahmedshaikh@gmail.com','12345','1',NULL,'images/image4.png'),
(3,'Fatima','Memon','fatima12@gmail.com','12345','1',NULL,'images/image3.png');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
