/*
SQLyog Ultimate v11.33 (32 bit)
MySQL - 5.5.29-MariaDB : Database - eu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `vsrv_services` */

CREATE TABLE `vsrv_services` (
  `vsrv_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `vsrv_sys_ccmp_id` int(10) unsigned NOT NULL,
  `vsrv_name` varchar(256) NOT NULL,
  `vsrv_hidded` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vsrv_id`),
  KEY `vsrv_sys_ccmp_id` (`vsrv_sys_ccmp_id`),
  CONSTRAINT `vsrv_services_ibfk_1` FOREIGN KEY (`vsrv_sys_ccmp_id`) REFERENCES `ccmp_company` (`ccmp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Table structure for table `vtco_truc_odo_changes` */

CREATE TABLE `vtco_truc_odo_changes` (
  `vtco_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `vtco_vtrc_id` smallint(5) unsigned NOT NULL COMMENT 'truck',
  `vtco_vtro_id` int(10) unsigned DEFAULT NULL COMMENT 'odo reading',
  `vtco_datetime` datetime DEFAULT NULL,
  `vtco_old_odo` int(10) unsigned NOT NULL,
  `vtco_new_odo` int(10) unsigned NOT NULL,
  `vtco_notes` text,
  PRIMARY KEY (`vtco_id`),
  KEY `vtco_vtrc_id` (`vtco_vtrc_id`),
  KEY `vtco_vtro_id` (`vtco_vtro_id`),
  CONSTRAINT `vtco_truc_odo_changes_ibfk_1` FOREIGN KEY (`vtco_vtrc_id`) REFERENCES `vtrc_truck` (`vtrc_id`),
  CONSTRAINT `vtco_truc_odo_changes_ibfk_2` FOREIGN KEY (`vtco_vtro_id`) REFERENCES `vtro_truck_odometer` (`vtro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `vtdc_truck_doc` */

CREATE TABLE `vtdc_truck_doc` (
  `vtdc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vtdc_vtrc_id` smallint(5) unsigned NOT NULL,
  `vtdc_vtdt_id` tinyint(3) unsigned DEFAULT NULL,
  `vtdc_number` varchar(50) DEFAULT NULL,
  `vtdc_issue_date` date DEFAULT NULL,
  `vtdc_expire_date` date DEFAULT NULL,
  `vtdc_notes` text,
  `vtcd_fcrn_id` tinyint(5) unsigned DEFAULT NULL,
  `vtcd_price` decimal(10,2) DEFAULT NULL,
  `vtdc_deleted` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vtdc_id`),
  KEY `vtdc_vtdt_id` (`vtdc_vtdt_id`),
  KEY `vtdc_vtrc_id` (`vtdc_vtrc_id`),
  KEY `vtcd_fcrn_id` (`vtcd_fcrn_id`),
  CONSTRAINT `vtdc_truck_doc_ibfk_1` FOREIGN KEY (`vtdc_vtdt_id`) REFERENCES `vtdt_truck_doc_type` (`vtdt_id`),
  CONSTRAINT `vtdc_truck_doc_ibfk_2` FOREIGN KEY (`vtdc_vtrc_id`) REFERENCES `vtrc_truck` (`vtrc_id`),
  CONSTRAINT `vtdc_truck_doc_ibfk_3` FOREIGN KEY (`vtcd_fcrn_id`) REFERENCES `fcrn_currency` (`fcrn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Table structure for table `vtdt_truck_doc_type` */

CREATE TABLE `vtdt_truck_doc_type` (
  `vtdt_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `vtdt_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `vtdt_hidded` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vtdt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `vtls_trailer_service` */

CREATE TABLE `vtls_trailer_service` (
  `vtls_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vtls_vtrl_id` smallint(5) unsigned NOT NULL,
  `vtls_vsrv_id` smallint(5) unsigned DEFAULT NULL,
  `vtls_start_date` date DEFAULT NULL,
  `vtls_end_date` date DEFAULT NULL,
  `vtls_notes` text,
  `vtls_price` decimal(10,2) DEFAULT NULL,
  `vtls_fcrn_id` tinyint(3) unsigned DEFAULT NULL,
  `vtls_deleted` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vtls_id`),
  KEY `vtls_vtrl_id` (`vtls_vtrl_id`),
  KEY `vtls_fcrn_id` (`vtls_fcrn_id`),
  KEY `vtls_vsrv_id` (`vtls_vsrv_id`),
  CONSTRAINT `vtls_trailer_service_ibfk_1` FOREIGN KEY (`vtls_vtrl_id`) REFERENCES `vtrl_trailer` (`vtrl_id`),
  CONSTRAINT `vtls_trailer_service_ibfk_2` FOREIGN KEY (`vtls_fcrn_id`) REFERENCES `fcrn_currency` (`fcrn_id`),
  CONSTRAINT `vtls_trailer_service_ibfk_3` FOREIGN KEY (`vtls_vsrv_id`) REFERENCES `vsrv_services` (`vsrv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `vtrc_truck` */

CREATE TABLE `vtrc_truck` (
  `vtrc_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `vtrc_cmmp_id` int(10) unsigned DEFAULT NULL,
  `vtrc_car_reg_nr` char(20) DEFAULT NULL,
  `vtrc_year` smallint(6) DEFAULT NULL,
  `vtrc_car_certificate_number` varchar(100) DEFAULT NULL,
  `vtrc_self_weight` float(5,3) unsigned DEFAULT NULL,
  `vtrc_fuel_consumption` float(3,1) DEFAULT NULL,
  `vtrc_year_mileage` smallint(5) unsigned DEFAULT NULL,
  `vtrc_leased_from_cmmp_id` int(10) unsigned DEFAULT NULL,
  `vtrc_purchase_value` float(8,2) unsigned DEFAULT NULL,
  `vtrc_notes` text,
  PRIMARY KEY (`vtrc_id`),
  KEY `vtrc_cmmp_id` (`vtrc_cmmp_id`),
  KEY `vtrc_leased_from_cmmp_id` (`vtrc_leased_from_cmmp_id`),
  CONSTRAINT `vtrc_truck_ibfk_1` FOREIGN KEY (`vtrc_cmmp_id`) REFERENCES `ccmp_company` (`ccmp_id`),
  CONSTRAINT `vtrc_truck_ibfk_2` FOREIGN KEY (`vtrc_leased_from_cmmp_id`) REFERENCES `ccmp_company` (`ccmp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `vtrd_trailer_doc` */

CREATE TABLE `vtrd_trailer_doc` (
  `vtrd_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vtrd_vtrl_id` smallint(5) unsigned NOT NULL,
  `vtrd_vtdt_id` tinyint(3) unsigned DEFAULT NULL,
  `vtrd_number` varchar(50) DEFAULT NULL,
  `vtrd_issue_date` date DEFAULT NULL,
  `vtrd_expire_date` date DEFAULT NULL,
  `vtrd_notes` text,
  `vtrd_updated` date DEFAULT NULL,
  `vtcd_fcrn_id` tinyint(5) unsigned DEFAULT NULL,
  `vtcd_price` decimal(10,2) DEFAULT NULL,
  `vtrd_deleted` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vtrd_id`),
  KEY `vtrd_vtdt_id` (`vtrd_vtdt_id`),
  KEY `vtrd_vtrl_id` (`vtrd_vtrl_id`),
  KEY `vtcd_fcrn_id` (`vtcd_fcrn_id`),
  CONSTRAINT `vtrd_truck_doc_ibfk_1` FOREIGN KEY (`vtrd_vtdt_id`) REFERENCES `vtdt_truck_doc_type` (`vtdt_id`),
  CONSTRAINT `vtrd_truck_doc_ibfk_2` FOREIGN KEY (`vtrd_vtrl_id`) REFERENCES `vtrl_trailer` (`vtrl_id`),
  CONSTRAINT `vtrd_truck_doc_ibfk_3` FOREIGN KEY (`vtcd_fcrn_id`) REFERENCES `fcrn_currency` (`fcrn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Table structure for table `vtrl_trailer` */

CREATE TABLE `vtrl_trailer` (
  `vtrl_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `vtrl_ccmp_id` int(10) unsigned DEFAULT NULL,
  `vtrl_reg_nr` char(20) DEFAULT NULL,
  `vtrl_year` smallint(5) unsigned DEFAULT NULL,
  `vtrl_certificate_number` varchar(100) DEFAULT NULL,
  `vtrl_self_weight` float(5,3) unsigned DEFAULT NULL,
  `vtrl_notes` text,
  PRIMARY KEY (`vtrl_id`),
  KEY `vtrl_ccmp_id` (`vtrl_ccmp_id`),
  CONSTRAINT `vtrl_trailer_ibfk_1` FOREIGN KEY (`vtrl_ccmp_id`) REFERENCES `ccmp_company` (`ccmp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `vtro_truck_odometer` */

CREATE TABLE `vtro_truck_odometer` (
  `vtro_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vtro_vtrc_id` smallint(5) unsigned NOT NULL,
  `vtro_datetime` datetime NOT NULL,
  `vtro_odo` int(10) unsigned NOT NULL,
  `vtro_abs_odo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`vtro_id`),
  KEY `vtro_vtrc_id` (`vtro_vtrc_id`),
  CONSTRAINT `vtro_truck_odometer_ibfk_1` FOREIGN KEY (`vtro_vtrc_id`) REFERENCES `vtrc_truck` (`vtrc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Table structure for table `vtrs_truck_service` */

CREATE TABLE `vtrs_truck_service` (
  `vtrs_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vtrs_vtrc_id` smallint(5) unsigned NOT NULL,
  `vtrs_vsrv_id` smallint(5) unsigned DEFAULT NULL,
  `vtrs_start_date` date DEFAULT NULL,
  `vtrs_end_date` date DEFAULT NULL,
  `vtrs_notes` text,
  `vtrs_price` decimal(10,2) DEFAULT NULL,
  `vtrs_fcrn_id` tinyint(3) unsigned DEFAULT NULL,
  `vtrs_deleted` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vtrs_id`),
  KEY `vtrs_vtrc_id` (`vtrs_vtrc_id`),
  KEY `vtrs_fcrn_id` (`vtrs_fcrn_id`),
  KEY `vtrs_vsrv_id` (`vtrs_vsrv_id`),
  CONSTRAINT `vtrs_truck_service_ibfk_1` FOREIGN KEY (`vtrs_vtrc_id`) REFERENCES `vtrc_truck` (`vtrc_id`),
  CONSTRAINT `vtrs_truck_service_ibfk_2` FOREIGN KEY (`vtrs_fcrn_id`) REFERENCES `fcrn_currency` (`fcrn_id`),
  CONSTRAINT `vtrs_truck_service_ibfk_3` FOREIGN KEY (`vtrs_vsrv_id`) REFERENCES `vsrv_services` (`vsrv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
