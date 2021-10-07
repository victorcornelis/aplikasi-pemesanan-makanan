/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.1.41 : Database - primaya
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`primaya` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `primaya`;

/*Table structure for table `daftarmenu` */

DROP TABLE IF EXISTS `daftarmenu`;

CREATE TABLE `daftarmenu` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `namaMenu` varchar(15) DEFAULT NULL,
  `tipe` int(1) DEFAULT NULL COMMENT '1:Makanan, 2:Minuman',
  `gambar` text,
  `harga` int(15) NOT NULL,
  `stock` int(2) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0:ready, 1:habis',
  `user` varchar(15) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `daftarmenu` */

insert  into `daftarmenu`(`id`,`namaMenu`,`tipe`,`gambar`,`harga`,`stock`,`status`,`user`,`createdate`) values 
(1,'Menu Makanan 1',1,'images/menu1.jpg',12500,68,0,NULL,'2021-10-06 19:56:07'),
(2,'Menu Makanan 2',1,'images/menu2.jpg',23000,40,0,NULL,'2021-10-06 19:56:13'),
(3,'Menu Makanan 3',1,'images/menu3.jpg',20000,0,1,NULL,'2021-10-06 19:56:22'),
(4,'Menu Makanan 4',1,'images/menu4.jpg',21500,55,0,NULL,'2021-10-06 19:56:27'),
(5,'Menu Makanan 5',1,'images/menu5.jpg',19900,0,1,NULL,'2021-10-06 19:56:33'),
(6,'Menu minuman 1',2,'images/minum1.jpg',13000,54,0,NULL,'2021-10-06 19:56:41'),
(7,'Menu minuman 2',2,'images/minum2.jpg',15000,50,0,NULL,'2021-10-06 19:56:46'),
(10,'asda',2,'images/map.png',4353,2,0,'Nama Pelayan','2021-10-07 11:13:59'),
(11,'asdasdasd',1,'images/logo.png',55653,441,0,'','2021-10-07 12:03:26');

/*Table structure for table `datapesanan` */

DROP TABLE IF EXISTS `datapesanan`;

CREATE TABLE `datapesanan` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `noTransaksi` varchar(15) NOT NULL,
  `idMeja` int(1) NOT NULL,
  `idMenu` int(2) DEFAULT NULL,
  `harga` int(15) NOT NULL,
  `lunas` int(1) NOT NULL COMMENT '0:Blm Lunas, 1:Lunas',
  `user` varchar(15) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `datapesanan` */

insert  into `datapesanan`(`id`,`noTransaksi`,`idMeja`,`idMenu`,`harga`,`lunas`,`user`,`createdate`) values 
(29,'PSN20211007-001',3,1,12500,0,'Pelayan','2021-10-07 02:10:04'),
(33,'PSN20211007-002',1,6,13000,1,'Pelayan','2021-10-07 02:10:05'),
(34,'PSN20211007-002',1,1,12500,1,'Pelayan','2021-10-07 02:10:05'),
(35,'PSN20211007-002',1,7,15000,1,'Pelayan','2021-10-07 02:10:07'),
(36,'PSN20211007-003',5,7,15000,0,'Pelayan','2021-10-07 02:10:08');

/*Table structure for table `datausers` */

DROP TABLE IF EXISTS `datausers`;

CREATE TABLE `datausers` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` text,
  `nama` varbinary(20) DEFAULT NULL,
  `role` int(1) NOT NULL COMMENT '1:Pelayan, 2:kasir',
  `status` int(1) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `datausers` */

insert  into `datausers`(`id`,`username`,`password`,`nama`,`role`,`status`,`createdate`) values 
(1,'123','202cb962ac59075b964b07152d234b70','Nama Pelayan',1,0,'2021-10-07 02:11:05'),
(2,'456','250cf8b51c773f3f8dc8b4be867a9a02','Nama Kasir',2,0,'2021-10-07 02:11:09');

/*Table structure for table `logs` */

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `activity` text,
  `status` int(1) NOT NULL COMMENT '1:Success, 2:gagal',
  `username` varchar(20) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `logs` */

insert  into `logs`(`id`,`activity`,`status`,`username`,`createdate`) values 
(1,'Login Aplikasi',1,'Victor','2021-10-07 00:14:02'),
(2,'Tambah Pemesanan dengan ID Meja : \"5\" dan ID Menu : \"7\"',1,'Victor','2021-10-07 01:22:09'),
(3,'Login Aplikasi',1,'Victor','2021-10-07 01:26:03'),
(4,'Login Aplikasi',1,'Pelayan','2021-10-07 02:10:27'),
(5,'Login Aplikasi',1,'Nama Pelayan','2021-10-07 02:39:19'),
(6,'Login Aplikasi',1,'Nama Pelayan','2021-10-07 08:59:15'),
(7,'\"\" menambahkan menu baru : \"dsfsdfsd\"',1,'Nama Pelayan','2021-10-07 11:07:53'),
(8,'\"\" menambahkan menu baru : \"dsfsdfsd\"',1,'Nama Pelayan','2021-10-07 11:11:36'),
(9,'\"\" menambahkan menu baru : \"asda\"',1,'Nama Pelayan','2021-10-07 11:13:59'),
(10,'Login Aplikasi',1,'Nama Pelayan','2021-10-07 11:38:55'),
(11,'\"\" menambahkan menu baru : \"asdasdasd\"',1,'Nama Pelayan','2021-10-07 12:03:26'),
(12,'Tambah Pemesanan dengan ID Meja : \"1\" dan ID Menu : \"11\"',1,'Nama Pelayan','2021-10-07 12:08:29'),
(13,'Batalkan pemesanan ID Menu : \"11\" di ID Meja \"1\"',1,'Nama Pelayan','2021-10-07 12:08:32'),
(14,'Batalkan pemesanan ID Menu : \"11\" di ID Meja \"1\"',2,'Nama Pelayan','2021-10-07 12:08:32'),
(15,'\"\" edit menu : \"asdasdasd\"',1,'','2021-10-07 12:39:51'),
(16,'\"\" edit menu : \"asdasdasd\"',1,'','2021-10-07 12:39:57'),
(17,'\"\" edit menu : \"dsfsdfsd\"',1,'','2021-10-07 12:41:06'),
(18,'\"\" edit menu : \"asdasdasd\"',1,'','2021-10-07 12:44:52'),
(19,'\"Nama Pelayan\" menghapus ID Menu : \"9\"',1,'Nama Pelayan','2021-10-07 12:53:06'),
(20,'\"Nama Pelayan\" menghapus ID Menu : \"8\"',1,'Nama Pelayan','2021-10-07 12:53:15');

/*Table structure for table `nomeja` */

DROP TABLE IF EXISTS `nomeja`;

CREATE TABLE `nomeja` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(15) DEFAULT NULL,
  `status` int(1) NOT NULL COMMENT '0:Kosong, 1:Terpakai',
  `block` int(1) NOT NULL COMMENT '0:Aktif, 1:Block',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `nomeja` */

insert  into `nomeja`(`id`,`nomor`,`status`,`block`) values 
(1,'Meja No.1',0,0),
(2,'Meja No.2',0,0),
(3,'Meja No.3',0,0),
(4,'Meja No.4',0,0),
(5,'Meja No.5',0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
