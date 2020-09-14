/*
TroSQL Free 2.0
Host - 5.5.5-10.1.38-MariaDB : Database - Calc
**********************************************************************/

CREATE DATABASE IF NOT EXISTS `Calc`;

USE `Calc`;

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

/*Table structure for table `Calc` */

DROP TABLE IF EXISTS `Calc`;

CREATE TABLE `Calc` (
  `Calc_id` int(11) NOT NULL AUTO_INCREMENT,
  `Calc_FirstNo` float DEFAULT NULL,
  `Calc_SecNo` float DEFAULT NULL,
  `Calc_Opreration` varchar(30) DEFAULT NULL,
  `Calc_Result` float DEFAULT NULL,
  `Calc_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Calc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `Calc` */

insert  into `Calc`(`Calc_id`,`Calc_FirstNo`,`Calc_SecNo`,`Calc_Opreration`,`Calc_Result`,`Calc_Date`) values (1,1,56,'minus',-55,'2020-09-08 23:50:14'),(2,1,56,'minus',-55,'2020-09-08 23:50:39'),(3,3,6,'plus',9,'2020-09-08 23:51:33'),(4,3,6,'plus',9,'2020-09-08 23:52:20'),(5,2,7,'plus',9,'2020-09-08 23:52:25'),(6,2,7,'plus',9,'2020-09-08 23:55:55'),(7,2,7,'plus',9,'2020-09-08 23:56:47'),(8,2,7,'plus',9,'2020-09-08 23:58:24'),(9,2,7,'plus',9,'2020-09-08 23:58:39'),(10,4,5,'plus',9,'2020-09-09 00:03:17'),(11,5,5,'plus',10,'2020-09-09 00:03:34'),(12,4,2,'plus',6,'2020-09-09 00:04:06'),(13,-1,-2,'plus',-3,'2020-09-09 00:23:01'),(14,1,3,'plus',4,'2020-09-09 01:23:41'),(15,2,3,'plus',5,'2020-09-09 01:25:37'),(16,1,1,'plus',2,'2020-09-09 01:28:15');

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
