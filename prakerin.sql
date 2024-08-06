/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 5.7.24 : Database - prakerin
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`prakerin` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `prakerin`;

/*Table structure for table `absen` */

DROP TABLE IF EXISTS `absen`;

CREATE TABLE `absen` (
  `id_absen` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `kehadiran` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_absen`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `absen` */

insert  into `absen`(`id_absen`,`user_id`,`kehadiran`,`date`,`time_in`,`time_out`,`note`,`created_at`,`updated_at`) values 
(34,104,'Hadir','2021-05-20','11:24:10','11:24:19','belajar react js','2021-05-23 11:24:10','2021-05-23 11:24:19'),
(36,77,'Hadir','2021-05-22','11:49:59','11:50:25','Belajar HTML','2021-05-23 11:49:59','2021-05-23 11:50:25'),
(37,104,'Hadir','2021-05-21','12:48:20','12:48:27','Belajar Vue JS','2021-05-23 12:48:20','2021-05-23 12:48:27'),
(38,104,'Hadir','2021-05-22','12:51:09','12:51:14','Belajar Angular','2021-05-23 12:51:09','2021-05-23 12:51:14'),
(39,104,'Alfa','2021-05-23','12:52:03','12:52:08','Tidak Ada','2021-05-23 12:52:03','2021-05-23 12:52:08'),
(40,77,'Hadir','2021-05-23','12:53:20','12:53:23','Belajar CSS','2021-05-23 12:53:20','2021-05-23 12:53:23');

/*Table structure for table `admin_hubin` */

DROP TABLE IF EXISTS `admin_hubin`;

CREATE TABLE `admin_hubin` (
  `kode_admin_hubin` varchar(13) NOT NULL,
  `user_id` bigint(20) unsigned zerofill DEFAULT NULL,
  `nama_admin_hubin` varchar(150) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_admin_hubin`),
  UNIQUE KEY `kode_admin_hubin` (`kode_admin_hubin`),
  UNIQUE KEY `user_id_2` (`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `admin_hubin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin_hubin` */

insert  into `admin_hubin`(`kode_admin_hubin`,`user_id`,`nama_admin_hubin`,`foto`) values 
('',00000000000000000017,'Iwan Fals Asli',NULL),
('1212123331121',00000000000000000025,'admin hubin',NULL),
('2001232333233',00000000000000000034,'Iwan S.KOM',NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `jenis_perusahaan` */

DROP TABLE IF EXISTS `jenis_perusahaan`;

CREATE TABLE `jenis_perusahaan` (
  `id` int(5) NOT NULL,
  `nama_jenis_perusahaan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jenis_perusahaan` */

insert  into `jenis_perusahaan`(`id`,`nama_jenis_perusahaan`) values 
(1,'TI'),
(2,'BISMEN');

/*Table structure for table `jurusan` */

DROP TABLE IF EXISTS `jurusan`;

CREATE TABLE `jurusan` (
  `id` bigint(20) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jurusan` */

insert  into `jurusan`(`id`,`nama_jurusan`) values 
(1,'Rekayasa Perangkat Lunak'),
(2,'Teknik Komputer Dan Jaringan'),
(3,'Multimedia'),
(4,'Bisnis Daring Dan Pemasaran'),
(5,'Otomatisasi Dan Tata Kelola Perkantoran'),
(6,'Akuntansi Dan Lembaga Keuangan'),
(7,'Management Logistik');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2021_02_16_090324_create_contacts_table',1),
(6,'2021_02_20_162758_create_siswa_table',1);

/*Table structure for table `mst_info` */

DROP TABLE IF EXISTS `mst_info`;

CREATE TABLE `mst_info` (
  `id_info` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_informasi` varchar(50) DEFAULT NULL,
  `dimulai` timestamp NULL DEFAULT NULL,
  `diakhiri` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `mst_info` */

insert  into `mst_info`(`id_info`,`nama_informasi`,`dimulai`,`diakhiri`,`created_at`,`updated_at`) values 
(1,'Pendaftaran Prakerin Kelas 12','2021-05-21 15:25:56','2021-05-25 15:25:58','2021-05-21 15:36:33','2021-05-21 16:11:15'),
(6,'dddsdsd','2021-05-21 00:00:00','2021-05-28 00:00:00','2021-05-22 07:23:06','2021-05-22 07:23:06'),
(12,'asdaddasd','2021-05-21 00:00:00','2021-05-28 00:00:00','2021-05-22 08:08:57','2021-05-22 08:08:57'),
(13,'sasaas','2021-05-21 00:00:00','2021-05-27 00:00:00','2021-05-22 08:10:55','2021-05-22 08:10:55'),
(14,'dasdad','2021-05-20 00:00:00','2021-05-28 00:00:00','2021-05-22 08:13:50','2021-05-22 08:13:50'),
(15,'saasas','2021-05-15 00:00:00','2021-05-29 00:00:00','2021-05-22 08:14:48','2021-05-22 08:14:48');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values 
('testing1@gmail.com','$2y$10$Lz19GYJNXL6uL1GH0Ny9Qud8QW0xlNH.KW/BrdCgwfYc87cKsUp6.','2021-03-30 10:44:32'),
('ayuni@gmail.com','$2y$10$HsJd6jtonS/ZAreW4BNFpOsIVZImoMJI1LEilC3ryka9d11T3LOle','2021-05-22 08:44:29');

/*Table structure for table `pembimbing_guru` */

DROP TABLE IF EXISTS `pembimbing_guru`;

CREATE TABLE `pembimbing_guru` (
  `kode_pemguru` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned zerofill DEFAULT NULL,
  `nama_pemguru` varchar(70) DEFAULT NULL,
  `foto` varchar(70) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_pemguru`),
  UNIQUE KEY `user_id_2` (`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `pembimbing_guru_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `pembimbing_guru` */

insert  into `pembimbing_guru`(`kode_pemguru`,`user_id`,`nama_pemguru`,`foto`,`created_at`,`updated_at`) values 
(1,00000000000000000078,'Asep Wahyu',NULL,NULL,NULL),
(2,00000000000000000099,'Nani',NULL,'2021-05-22 22:54:01','2021-05-22 22:54:01'),
(3,00000000000000000100,'Nino',NULL,'2021-05-22 23:00:11','2021-05-22 23:00:11'),
(4,00000000000000000101,'Putri',NULL,'2021-05-22 23:18:07','2021-05-22 23:18:07'),
(5,00000000000000000106,'test 12',NULL,'2021-05-23 16:10:29','2021-05-23 16:10:29'),
(6,00000000000000000108,'test14',NULL,'2021-05-23 16:43:11','2021-05-23 16:43:11');

/*Table structure for table `pembimbing_perusahaan` */

DROP TABLE IF EXISTS `pembimbing_perusahaan`;

CREATE TABLE `pembimbing_perusahaan` (
  `kode_pemperus` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `nama_perpem` varchar(30) DEFAULT NULL,
  `jk_perpem` enum('P','L') DEFAULT NULL,
  `alamat_perpem` varchar(255) DEFAULT NULL,
  `kontak_perpem` varchar(13) DEFAULT NULL,
  `foto` varchar(70) DEFAULT NULL,
  `jabatan_perpem` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_pemperus`),
  KEY `id_user` (`user_id`),
  CONSTRAINT `pembimbing_perusahaan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `pembimbing_perusahaan` */

insert  into `pembimbing_perusahaan`(`kode_pemperus`,`user_id`,`nama_perpem`,`jk_perpem`,`alamat_perpem`,`kontak_perpem`,`foto`,`jabatan_perpem`,`created_at`,`updated_at`) values 
(1,79,'Nino','L',NULL,NULL,NULL,NULL,NULL,NULL),
(2,94,'Bayu',NULL,NULL,NULL,NULL,NULL,'2021-05-22 15:37:35','2021-05-22 15:37:35'),
(3,95,'Dimas',NULL,NULL,NULL,NULL,NULL,'2021-05-22 16:43:48','2021-05-22 16:43:48'),
(4,96,'Sugeng',NULL,NULL,NULL,NULL,NULL,'2021-05-22 16:57:36','2021-05-22 16:57:36'),
(5,107,'test13',NULL,NULL,NULL,NULL,NULL,'2021-05-23 16:18:54','2021-05-23 16:18:54'),
(6,109,'test 15',NULL,NULL,NULL,NULL,NULL,'2021-05-23 16:55:07','2021-05-23 16:55:07');

/*Table structure for table `pemetaan_siswa` */

DROP TABLE IF EXISTS `pemetaan_siswa`;

CREATE TABLE `pemetaan_siswa` (
  `id_pemetaan` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_perusahaan` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siswa_nis_pemetaan` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemperus_kode` bigint(20) DEFAULT NULL,
  `pemguru_kode` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pemetaan`),
  UNIQUE KEY `siswa_nis_pemetaan_2` (`siswa_nis_pemetaan`),
  KEY `siswa_nis_pemetaan` (`siswa_nis_pemetaan`),
  KEY `kode_perusahaan` (`kode_perusahaan`),
  KEY `pemperus_kode` (`pemperus_kode`),
  KEY `pemguru_kode` (`pemguru_kode`),
  CONSTRAINT `pemetaan_siswa_ibfk_1` FOREIGN KEY (`siswa_nis_pemetaan`) REFERENCES `siswa` (`nis`),
  CONSTRAINT `pemetaan_siswa_ibfk_2` FOREIGN KEY (`kode_perusahaan`) REFERENCES `perusahaan` (`kode_perusahaan`),
  CONSTRAINT `pemetaan_siswa_ibfk_4` FOREIGN KEY (`pemperus_kode`) REFERENCES `pembimbing_perusahaan` (`kode_pemperus`),
  CONSTRAINT `pemetaan_siswa_ibfk_5` FOREIGN KEY (`pemguru_kode`) REFERENCES `pembimbing_guru` (`kode_pemguru`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pemetaan_siswa` */

insert  into `pemetaan_siswa`(`id_pemetaan`,`kode_perusahaan`,`siswa_nis_pemetaan`,`pemperus_kode`,`pemguru_kode`,`created_at`,`updated_at`) values 
(2,'vQ4t7','1806510129',1,1,'2021-05-23 12:45:55',NULL),
(3,'kmf3u','1234567897',4,4,'2021-05-23 13:17:18',NULL),
(4,'kmf3u','1234567900',4,4,'2021-05-23 13:17:20',NULL),
(5,'kmf3u','1806510122',4,4,'2021-05-23 13:17:22',NULL),
(6,'uB9l5','1806510130',5,5,'2021-05-23 16:30:47',NULL),
(7,'PSn48','1806510135',6,6,'2021-05-23 17:01:38',NULL);

/*Table structure for table `pengajuan` */

DROP TABLE IF EXISTS `pengajuan`;

CREATE TABLE `pengajuan` (
  `id_sp` bigint(20) NOT NULL AUTO_INCREMENT,
  `siswa_nis` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_perusahaan` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pengajuan` int(2) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_sp`),
  UNIQUE KEY `siswa_nis` (`siswa_nis`),
  KEY `siswa_nis_2` (`siswa_nis`),
  KEY `kode_perusahaan` (`kode_perusahaan`),
  KEY `status_pengajuan` (`status_pengajuan`),
  CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`siswa_nis`) REFERENCES `siswa` (`nis`),
  CONSTRAINT `pengajuan_ibfk_3` FOREIGN KEY (`status_pengajuan`) REFERENCES `status_pengajuan` (`id_status`),
  CONSTRAINT `pengajuan_ibfk_4` FOREIGN KEY (`kode_perusahaan`) REFERENCES `perusahaan` (`kode_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

/*Data for the table `pengajuan` */

insert  into `pengajuan`(`id_sp`,`siswa_nis`,`kode_perusahaan`,`status_pengajuan`,`created_at`,`updated_at`) values 
(80,'1234567891','0X0sg',2,'2021-03-30 19:44:03','2021-03-31 15:23:45'),
(81,'1234567892','0X0sg',2,'2021-03-30 19:49:57','2021-03-30 19:53:07'),
(83,'1234567893','rdu1X',3,'2021-03-30 19:52:47','2021-03-30 22:43:44'),
(84,'1234567894','PEJKF',2,'2021-03-30 22:10:35','2021-03-31 16:45:02'),
(85,'1234567896','rdu1X',3,'2021-03-31 13:09:02','2021-03-31 15:05:15'),
(86,'1234567897','kmf3u',2,'2021-03-31 15:15:03','2021-03-31 15:52:30'),
(87,'1234567898','PEJKF',2,'2021-03-31 15:19:04','2021-03-31 15:19:20'),
(88,'1234567899','rdu1X',2,'2021-03-31 15:25:54','2021-03-31 15:29:48'),
(90,'1234567900','kmf3u',2,'2021-03-31 16:22:46','2021-03-31 16:29:37'),
(91,'1234511154','jwJqG',2,'2021-03-31 16:53:54','2021-03-31 16:56:25'),
(92,'123456543','0X0sg',2,'2021-04-01 08:27:45','2021-04-01 08:35:31'),
(93,'12312243','gYV5Y',3,'2021-04-01 08:56:40','2021-04-01 11:04:22'),
(94,'1806510122','kmf3u',2,'2021-04-01 10:46:31','2021-04-01 10:58:18'),
(95,'1806510126','aPdcA',1,'2021-04-01 17:29:49','2021-04-01 17:29:49'),
(96,'1806510127','aPdcA',1,'2021-04-02 10:17:42','2021-04-02 10:17:42'),
(97,'12345672122','Fsf7D',1,'2021-04-02 10:32:29','2021-04-02 10:32:29'),
(100,'1806510158','gYV5Y',2,'2021-05-23 00:04:53','2021-05-23 00:07:14'),
(101,'1806510129','vQ4t7',2,'2021-05-23 10:34:44','2021-05-23 10:35:24'),
(102,'1806510165','e1L2L',2,'2021-05-23 11:47:40','2021-05-23 11:48:04'),
(103,'1806510130','uB9l5',2,'2021-05-23 16:27:21','2021-05-23 16:28:04'),
(104,'1806510135','PSn48',2,'2021-05-23 17:00:00','2021-05-23 17:00:20');

/*Table structure for table `perusahaan` */

DROP TABLE IF EXISTS `perusahaan`;

CREATE TABLE `perusahaan` (
  `kode_perusahaan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_perusahaan` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan_id` bigint(20) DEFAULT NULL,
  `pemperus_kode_perusahaan` bigint(20) DEFAULT NULL,
  `pemsekul_kode_guru` bigint(20) DEFAULT NULL,
  `nama_perusahaan` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_perusahaan` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pimpinan_perusahaan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_perusahaan` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_perusahaan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontak_perusahaan` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_perusahaan` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota_perusahaan` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kuota_perusahaan` int(10) DEFAULT NULL,
  `siswa_prakerin` int(10) DEFAULT '0',
  `kode_pos` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_perusahaan`),
  KEY `jenis_perusahaan_id` (`jenis_perusahaan`),
  KEY `jurusan_id` (`jurusan_id`),
  KEY `pemperus_kode_perusahaan` (`pemperus_kode_perusahaan`),
  KEY `pemsekul_kode_guru` (`pemsekul_kode_guru`),
  CONSTRAINT `perusahaan_ibfk_2` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`),
  CONSTRAINT `perusahaan_ibfk_3` FOREIGN KEY (`pemperus_kode_perusahaan`) REFERENCES `pembimbing_perusahaan` (`kode_pemperus`),
  CONSTRAINT `perusahaan_ibfk_4` FOREIGN KEY (`pemsekul_kode_guru`) REFERENCES `pembimbing_guru` (`kode_pemguru`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `perusahaan` */

INSERT INTO `perusahaan`(`kode_perusahaan`,`jenis_perusahaan`,`jurusan_id`,`pemperus_kode_perusahaan`,`pemsekul_kode_guru`,`nama_perusahaan`,`deskripsi_perusahaan`,`pimpinan_perusahaan`,`email_perusahaan`,`website_perusahaan`,`kontak_perusahaan`,`alamat_perusahaan`,`kota_perusahaan`,`image`,`kuota_perusahaan`,`siswa_prakerin`,`kode_pos`,`long`,`lat`,`created_at`,`updated_at`) VALUES 
('0X0AB','2',1,NULL,NULL,'PT Alpha','perusahaan teknologi berdiri sejak 2020','John Doe','john.doe@company.com','www.alpha.com','123456','Jl. Example No.1','Bandung','image1.png',0,4,'40123','107.56887115509983','-6.926819055105923','2022-01-10 10:30:00','2022-01-10 10:30:00'),
('2DEYZ','1',4,NULL,NULL,'Bravo Co',NULL,'Jane Smith','jane.smith@bravo.com','www.bravo.com','789012','Jl. Example No.2','Jakarta','image2.jpg',0,0,'40124','107.6180719702','-6.8804292126543','2022-02-15 14:45:00','2022-02-15 14:45:00'),
('6QXZY','1',1,2,2,'PT Charlie Sejahtera',NULL,'Charlie Manager','charlie@company.com',NULL,'345678','Jl. Example No.3','Surabaya',NULL,0,0,NULL,'107.6470064955','-6.8982336447146','2022-03-20 12:50:00','2022-03-20 12:50:00'),
('aPdcB','1',3,NULL,NULL,'Delta Films',NULL,'Delta Leader','delta.leader@films.com',NULL,'567890','Jl. Example No.4','Yogyakarta','image3.png',0,0,NULL,NULL,NULL,'2022-04-25 16:20:00','2022-04-25 16:20:00'),
('b59ZR',NULL,2,NULL,NULL,'Epsilon Foods','Gourmet Delights','Emily Chef','emily@epsilon.com','www.epsilon.com','098765','Jl. Example No.5','Medan','image4.jpg',NULL,0,'40125','107.66116445887','-6.9379682489237','2022-05-30 18:10:00','2022-05-30 18:10:00'),
('e1L3L','1',1,3,3,'Foxtrot Tryouts','Join Us','Frank Tester','frank@foxtrot.com',NULL,'112233','Jl. Example No.6','Bali','image5.png',0,2,NULL,'107.60467004256','-6.9371566734642','2022-06-15 09:30:00','2022-06-15 09:30:00'),
('E8NfN','1',1,NULL,NULL,'Golf Enterprises','Innovative Solutions','George Director','george@golf.com',NULL,'445566','Jl. Example No.7','Bandung','image1.png',2,0,NULL,'107.62538659729','-6.9302770231752','2022-07-10 15:55:00','2022-07-10 15:55:00'),
('FEVkN','1',5,NULL,NULL,'Hotel Services','Best Hospitality','Helen Manager','helen@hotel.com','www.hotel.com','778899','Jl. Example No.8','Bandung','image6.jpg',3,0,'40126','107.59264378857398','-6.937796806793855','2022-08-25 08:20:00','2022-08-25 08:20:00'),
('Fsf8D',NULL,7,NULL,NULL,'PT Whatever',NULL,'Ardi','ardi@whatever.com','www.whatever.com','101010','Jl. Pasirkoja No.9','Bandung','image7.jpg',4,0,'40232',NULL,NULL,'2022-09-15 15:10:00','2022-09-15 15:10:00'),
('gx9KB','1',1,NULL,NULL,'Testing Co',NULL,'Tester','tester@testing.com','www.testing.com','111111','Jl. Test No.10','Semarang',NULL,0,0,'40127',NULL,NULL,'2022-10-05 16:10:00','2022-10-05 16:10:00'),
('gYV6Y','1',1,NULL,NULL,'Sample Inc','Just Testing','Sample Tester','sample@test.com',NULL,'222222','Jl. Test No.11','Bandung','image8.jpg',0,1,NULL,'107.64539088699','-6.9584014081319','2022-11-20 09:40:00','2022-11-20 09:40:00'),
('HODWO','1',6,NULL,NULL,'Demo Corp','Tech Innovators','Demo Leader','demo@demo.com','www.demo.com','333333','Jl. Demo No.12','Bandung','image9.jpg',2,0,'40128','107.5968802894447','-6.921331015118213','2022-12-25 08:42:00','2022-12-25 08:42:00'),
('JDDzm',NULL,1,NULL,NULL,'Anonymous','Private','Anonymous Leader','anon@anon.com','www.anon.com','444444','Jl. Hidden No.13','Jakarta','image10.png',NULL,0,'40129','107.61636989761','-6.9671983641914','2023-01-15 19:24:00','2023-01-15 19:24:00'),
('jwJqG','1',1,NULL,NULL,'Quick Services',NULL,'Quick Manager','quick@services.com','www.quick.com','555555','Jl. Quick No.14','Bandung',NULL,1,1,'40130',NULL,NULL,'2023-02-05 18:51:00','2023-02-05 18:51:00'),
('kf4Uh','1',1,NULL,NULL,'Sample Inc',NULL,'Sample Leader','sample@inc.com','www.sample.com','666666','Jl. Sample No.15','Bandung',NULL,1,0,'40131',NULL,NULL,'2023-03-10 13:20:00','2023-03-10 13:20:00'),
('kmf3u','1',2,4,4,'Gamma House',NULL,'Gamma Manager','gamma@house.com','www.gamma.com','777777','Jl. Gamma No.16','Bandung','image11.jpg',0,3,'40132','107.61719558007','-6.9075212518324','2023-04-15 09:12:00','2023-04-15 09:12:00'),
('KToS2','1',1,NULL,NULL,'Testing Grounds',NULL,'Test Leader','test@grounds.com',NULL,'888888','Jl. Test No.17','Surabaya',NULL,1,0,NULL,'107.61222929789','-6.9195659321187','2023-05-10 15:44:00','2023-05-10 15:44:00'),
('PEJKF','0',2,NULL,NULL,'Echo Enterprises','Expanding Horizons','Echo Leader','echo@enterprises.com','www.echo.com','999999','Jl. Echo No.18','Medan','image12.png',1,1,'40133','107.6744843699','-6.8904113019729','2023-06-20 09:24:00','2023-06-20 09:24:00'),
('PSn48','1',4,6,6,'Hotel XYZ','Hospitality Redefined','Hotel Manager','manager@hotelxyz.com','www.hotelxyz.com','123123','Jl. Hotel No.19','Bandung','image13.jpg',1,1,'40134','107.56312787513','-6.897156371466','2023-07-15 16:19:00','2023-07-15 16:19:00'),
('PxuDt',NULL,2,NULL,NULL,'Echo Echo',NULL,'Echo Leader','echo@echo.com','www.echo.com','456456','Jl. Echo No.20','Bandung',NULL,0,0,'40135',NULL,NULL,'2023-08-01 11:57:00','2023-08-01 11:57:00'),
('qQ92s',NULL,4,NULL,NULL,'Bravo School','Entrepreneurial School','Sukma','sukma@school.com',NULL,'789789','Jl. School No.21','Bandung','image14.jpg',NULL,0,NULL,NULL,NULL,'2023-09-05 09:51:00','2023-09-05 09:51:00'),
('rdu1X','1',2,NULL,NULL,'Alpha Test','Testing the Limits','Alpha Tester','alpha@test.com','www.alpha.com','101112','Jl. Alpha No.22','Bandung','image15.jpg',1,0,'40136','107.61151634324','-6.9549886476416','2023-10-20 17:07:00','2023-10-20 17:07:00'),
('tGm8P','1',1,NULL,NULL,'Beta Tech','Leading Innovations','Beta Leader','beta@tech.com',NULL,'131415','Jl. Beta No.23','Jakarta',NULL,2,0,NULL,'107.60279952924958','-6.904936192705961','2023-11-10 15:06:00','2023-11-10 15:06:00'),
('uB9l5','1',2,5,5,'Gamma Industries','Economic Solutions','Gamma Leader','gamma@industries.com',NULL,'161718','Jl. Gamma No.24','Bandung','image16.jpg',0,1,NULL,'107.58695021096','-6.8930253251029','2023-12-15 16:24:00','2023-12-15 16:24:00'),
('vQ4t7','1',3,1,NULL,'Delta Group','Tech Pioneers','Delta Leader','delta@group.com',NULL,'192021','Jl. Delta No.25','Surabaya',NULL,1,1,NULL,'107.63377219746894','-6.9063867505025485','2024-01-10 12:52:00','2024-01-10 12:52:00'),
('Wv1Ao','1',5,NULL,NULL,'Foxtrot Innovators','Pushing Boundaries','Foxtrot Leader','foxtrot@innovators.com','www.foxtrot.com','222324','Jl. Foxtrot No.26','Bandung','image17.jpg',2,0,'40137','107.58158577698242','-6.874771383135808','2024-02-15 08:42:00','2024-02-15 08:42:00');
/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(5) NOT NULL,
  `nama_role` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`id`,`nama_role`) values 
(1,'Super Admin'),
(2,'Admin Hubin'),
(3,'Siswa'),
(4,'Pembimbing Sekolah'),
(5,'Pembimbing Perusahaan');

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `nis` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) unsigned zerofill DEFAULT NULL,
  `nama_siswa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_siswa` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk_siswa` enum('P','L') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_siswa` int(2) NOT NULL DEFAULT '0',
  `status_prakerin` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci DEFAULT 'Tidak Aktif',
  `created_by` bigint(20) unsigned zerofill DEFAULT NULL,
  `updated_by` bigint(20) unsigned zerofill DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nis`),
  UNIQUE KEY `email_siswa` (`email_siswa`),
  UNIQUE KEY `user_id_2` (`user_id`),
  KEY `jurusan_id` (`jurusan_id`),
  KEY `user_id` (`user_id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`),
  CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `siswa` */
INSERT INTO `siswa`(`nis`,`jurusan_id`,`user_id`,`nama_siswa`,`kelas`,`alamat`,`kontak_siswa`,`email_siswa`,`angkatan`,`jk_siswa`,`foto`,`status_siswa`,`status_prakerin`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
('12312243',1,00000000000000000068,'Alex Johnson','12','123 Main St','895321','alex.johnson@gmail.com','2021','L','4425ebaae5d1220aa1d161e24ab5c979.jpg',2,'Tidak Aktif',00000000000000000017,00000000000000000017,'2021-04-01 08:46:47','2021-04-02 10:09:41'),
('1234511154',1,00000000000000000054,'John Smith','12','456 Elm St','122212','john.smith@gmail.com','2021','L','9e731451379d41838ef7ec9aa357dee1.jpg',2,'Tidak Aktif',00000000000000000025,00000000000000000017,'2021-03-17 10:59:50','2021-03-31 16:53:54'),
('123456543',1,00000000000000000067,'Emily Davis','12','789 Maple Ave','123456789','emily.davis@gmail.com','2021','L','8030f3f947d0a98b9cb0cf0cf4fd1741.jpg',2,'Tidak Aktif',00000000000000000017,NULL,'2021-04-01 07:41:36','2021-04-01 08:27:45'),
('12345672122',7,00000000000000000075,'Michael Brown','11','321 Oak St','+62089543432','michael.brown@gmail.com','2021','P','128669a14f1ff7bafafc889192e7d33c.jpg',2,'Tidak Aktif',00000000000000000017,00000000000000000017,'2021-04-02 08:20:58','2021-04-02 10:32:29'),
('1234567891',1,00000000000000000044,'Olivia Wilson','12','654 Pine St','8975425122','olivia.wilson@gmail.com','2021','L','62ade31036a3b281e591de8892570d4f.jpg',2,'Tidak Aktif',00000000000000000017,NULL,'2021-03-30 19:39:44','2021-03-30 19:44:03'),
('1234567892',1,00000000000000000045,'Sophia Taylor','12','987 Cedar Ave','876545678','sophia.taylor@gmail.com','2021','L','b176c8f222ad960f68895dd34053897a.png',2,'Tidak Aktif',00000000000000000017,NULL,'2021-03-30 19:39:44','2021-03-30 19:49:57'),
('1234567893',2,00000000000000000046,'Isabella Martinez','11','123 Birch Blvd','9876545678','isabella.martinez@gmail.com','2021','L','6bd218cff2c11e2f3aa4175dc1d1c3a3.jpg',2,'Tidak Aktif',00000000000000000017,NULL,'2021-03-30 19:39:44','2021-03-30 19:52:47'),
('1234567894',2,00000000000000000047,'Lucas Thomas','11','456 Spruce St','9098765555','lucas.thomas@gmail.com','2021','L','ef9f876c6daee573fc26f99152789543.jpg',2,'Tidak Aktif',00000000000000000017,NULL,'2021-03-30 19:39:44','2021-03-30 22:10:35'),
('1234567895',2,00000000000000000048,'Mia Garcia','11','789 Aspen Way','4200926546','mia.garcia@gmail.com','2021','L',NULL,0,'Tidak Aktif',00000000000000000017,NULL,'2021-03-30 19:39:44','2021-03-30 19:39:44'),
('1234567896',2,00000000000000000049,'Ethan Anderson','12','321 Sycamore St','1518972098','ethan.anderson@gmail.com','2021','L','d499b55f782841e9f54b39d5692263d4.jpg',2,'Tidak Aktif',00000000000000000017,NULL,'2021-03-30 19:39:44','2021-03-31 13:09:02'),
('1234567897',2,00000000000000000050,'Ava Jackson','11','654 Redwood Dr','617851542','ava.jackson@gmail.com','2021','L','41c10c7613e866b53277a3b38cd57e49.jpg',2,'Tidak Aktif',00000000000000000017,NULL,'2021-03-30 19:39:44','2021-03-31 15:15:03'),
('1234567898',2,00000000000000000051,'James White','11','987 Hemlock St','7716730986','james.white@gmail.com','2021','L','9302714b8c62813049ca3681efce4725.jpg',2,'Tidak Aktif',00000000000000000017,NULL,'2021-03-30 19:39:44','2021-03-31 15:19:04'),
('1234567899',2,00000000000000000052,'Amelia Harris','11','123 Cypress Ave','5815610430','amelia.harris@gmail.com','2021','L','c6bdcbd14c87118af132137658030860.jpg',2,'Tidak Aktif',00000000000000000017,NULL,'2021-03-30 19:39:44','2021-03-31 15:25:54'),
('1234567900',2,00000000000000000053,'Elijah Clark','11','456 Fir Ln','914489874','elijah.clark@gmail.com','2021','P','8cea4cd091b5d5587759aa12c472880d.png',2,'Aktif',00000000000000000017,00000000000000000017,'2021-03-30 19:39:44','2021-04-01 10:30:18'),
('1806510122',2,00000000000000000069,'Henry Young','11','789 Willow St','85353669567','henry.young@gmail.com','2021','L','e4335765aada40ed03fc5c0f51e813f7.jpg',2,'Tidak Aktif',00000000000000000017,00000000000000000017,'2021-04-01 10:29:40','2021-05-21 16:58:28'),
('1806510123',2,00000000000000000070,'Charlotte King','11','321 Pine Ave','89654324178','charlotte.king@gmail.com','2019','L',NULL,0,'Tidak Aktif',00000000000000000017,NULL,'2021-04-01 10:29:40','2021-04-01 10:29:40'),
('1806510124',2,00000000000000000072,'William Lee','11','654 Cedar Blvd','83805655154','william.lee@gmail.com','2019','P','a392238e7706f27fff14c50a51e96f99.jpg',1,'Tidak Aktif',00000000000000000017,NULL,'2021-04-01 10:29:40','2021-04-01 13:18:39'),
('1806510125',2,00000000000000000073,'Abigail Hill','11','987 Birch Ln','89609935827','abigail.hill@gmail.com','2019','P','abdb5f90e202f1527960b1faa396ee33.jpg',1,'Tidak Aktif',00000000000000000017,NULL,'2021-04-01 10:29:40','2021-04-01 15:14:16'),
('1806510126',3,00000000000000000074,'David Scott','11','123 Maple Dr','87822818585','david.scott@gmail.com','2019','L','a0a1e5fab5a0c81f6a37aed1f8491ce2.jpg',2,'Tidak Aktif',00000000000000000017,NULL,'2021-04-01 10:29:40','2021-04-01 17:29:49'),
('1806510127',3,00000000000000000076,'Samantha Wright','11','456 Elm St','21782643546','samantha.wright@gmail.com','2019','L','1efb3e3ba5791b7ed1f80824bb5a6f2f.jpg',2,'Tidak Aktif',00000000000000000017,NULL,'2021-04-01 10:29:40','2021-04-02 10:17:42'),
('1806510128',3,00000000000000000103,'Ella Green','11','789 Oak Ave','81380024065','ella.green@gmail.com','2019','L',NULL,0,'Tidak Aktif',00000000000000000017,NULL,'2021-04-01 10:29:40','2021-04-01 10:29:40'),
('1806510129',3,00000000000000000104,'Jackson Adams','11','321 Spruce St','87364443654','jackson.adams@gmail.com','2019','P','dfea14a76cc04b80ad6e7f1af6a45434.jpg',2,'Tidak Aktif',00000000000000000017,NULL,'2021-04-01 10:29:40','2021-05-23 10:34:45'),
('1806510130',2,00000000000000000105,'Liam Roberts','11','654 Pine St','89533212736','liam.roberts@gmail.com','2019','L','d58b7ab9e50e3007e7d131a0f7655b20.png',2,'Tidak Aktif',00000000000000000017,NULL,'2021-04-01 10:29:40','2021-05-23 16:27:22'),
('1806510135',4,00000000000000000110,'Grace Lewis','11','987 Maple Dr','87825285654','grace.lewis@gmail.com','2020','P','27dafafc8d7a6ef1e1a8062348aed99f.jpg',2,'Tidak Aktif',00000000000000000017,NULL,'2021-04-01 10:29:40','2021-05-23 17:00:00'),
('1806510158',1,00000000000000000102,'Aiden Walker','12','321 Oak St','89525732955','aiden.walker@gmail.com','2020','L','06a0b8dd9dd77a29fcec137486b7a753.jpg',2,'Tidak Aktif',00000000000000000017,00000000000000000017,'2021-04-01 10:29:40','2021-05-23 00:04:53'),
('1806510165',1,00000000000000000077,'Madison Hall','12','654 Cedar Ave','81394289626','madison.hall@gmail.com','2021','L','89c71b210476e034b9e0c857c37e909f.jpg',2,'Tidak Aktif',00000000000000000017,00000000000000000017,'2021-04-01 10:29:40','2021-05-23 11:47:40');

/*Table structure for table `status_pengajuan` */

DROP TABLE IF EXISTS `status_pengajuan`;

CREATE TABLE `status_pengajuan` (
  `id_status` int(2) NOT NULL,
  `nama_status_pengajuan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `status_pengajuan` */

insert  into `status_pengajuan`(`id_status`,`nama_status_pengajuan`) values 
(1,'Proses Pemeriksaan'),
(2,'Proses Diterima'),
(3,'Proses di tolak');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` int(5) NOT NULL DEFAULT '3' COMMENT '1 for Super Admin, 2 for Admin Hubin, 3 for Siswa, 4 for Pembimbing Sekolah, 5 for Pembimbing Perusahaan',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `roles_id` (`roles`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roles`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`roles`,`email`,`email_verified_at`,`password`,`two_factor_secret`,`two_factor_recovery_codes`,`status`,`remember_token`,`created_at`,`updated_at`) values 
(17,'ardinur_03',2,'hubin@gamail.com',NULL,'$2y$10$/Tlua1lQey0aaOc6OOv4Xeg.MXwokYyE4ORUoIBYKzhLStOU8cWQ6',NULL,NULL,'active','IP4zYBoYCskIQ71OsTyhSNKp0mLbtZnmh5hx0Zj3Wva8UCX7K0SGQqEjvFra','2021-03-13 13:38:35',NULL),
(25,'1212123331121',2,'adminhubinbaru@gmail.com','2021-03-19 19:36:39','$2y$10$p4mw/LuUoKwmg2uwweH2Mu3OoAPb9Nx9N/ejKTYE.5mBUBKbVwDnu',NULL,NULL,'active',NULL,'2021-03-13 13:38:47','2021-03-19 19:36:39'),
(34,'2001232333233',2,'iwan@gmail.com',NULL,'$2y$10$/Tlua1lQey0aaOc6OOv4Xeg.MXwokYyE4ORUoIBYKzhLStOU8cWQ6',NULL,NULL,'active',NULL,NULL,NULL),
(44,'1234567891',3,'test1@gmail.com','2021-03-30 19:41:39','$2y$10$LAS/tvt7L0.bxht1eeUt/.gqbdJpIo5r54MHBJuGLPkPIeHBVZ4Ym',NULL,NULL,'active',NULL,'2021-03-30 19:40:06','2021-03-30 19:41:39'),
(45,'1234567892',3,'test2@gmail.com','2021-03-30 19:48:20','$2y$10$QhHuCQGJhWiPbctMyn7/Ru7rcN2k0zvCbKONYgfKxdlVdYK0Btr/m',NULL,NULL,'active',NULL,'2021-03-30 19:47:26','2021-03-30 19:48:20'),
(46,'1234567893',3,'test3@gmail.com','2021-03-30 19:52:22','$2y$10$oBxn6.m1bn2kwnkSsfdT0uN7kFu7Wgz20GavGHYbZQGgNTQ3BZJwO',NULL,NULL,'active',NULL,'2021-03-30 19:51:41','2021-03-30 19:52:22'),
(47,'1234567894',3,'test4@gmail.com','2021-03-30 22:09:06','$2y$10$/7qAiFjU/89wx/uD0mfu4e28vOWJ7cU9WljLbZOpLyzBMNJwRd7Xe',NULL,NULL,'active',NULL,'2021-03-30 22:08:29','2021-03-30 22:09:06'),
(48,'1234567895',3,'test5@gmail.com',NULL,'$2y$10$F3juROnnRfthhK/FR2KoS.VryVXgynlJ/2WiHiq6Ek2uNF/m2ulyS',NULL,NULL,'active',NULL,'2021-03-31 10:04:18','2021-03-31 10:04:18'),
(49,'1234567896',3,'test6@gmail.com','2021-03-31 12:59:23','$2y$10$XCPX4Ni6m5RwjsMwUWx1PePa6mWOQdZxvMiUuKqMMdpngnZtwA8pm',NULL,NULL,'active',NULL,'2021-03-31 12:57:25','2021-03-31 12:59:23'),
(50,'1234567897',3,'test7@gmail.com','2021-03-31 15:14:15','$2y$10$k2zUkdWaCcJPswz/5yZW.ulCePzPRhc3Fgg/0FnZ.EDKLc.YudZJy',NULL,NULL,'active',NULL,'2021-03-31 15:11:47','2021-03-31 15:14:15'),
(51,'1234567898',3,'test8@gmail.com','2021-03-31 15:18:14','$2y$10$UYbSmmaC0jyTzTo1dzQCu.Mel/EFrQxdsNujPPlNGU4wyiEYU.Kwi',NULL,NULL,'active',NULL,'2021-03-31 15:17:26','2021-03-31 15:18:14'),
(52,'1234567899',3,'test9@gmail.com','2021-03-31 15:25:14','$2y$10$57VhMN6eJKhuhXwyIdEyGOTWHNut1NuPLJbQbAnhUigDSDPFEJNnW',NULL,NULL,'active',NULL,'2021-03-31 15:24:23','2021-03-31 15:25:14'),
(53,'1234567900',3,'test10@gmail.com','2021-03-31 15:54:07','$2y$10$zJk5U62okMD86hXQPovcbemCRvMDjhbgc8xHAiEEBB1APEZm7oTVO',NULL,NULL,'active','665Gh2yFL3f47tp5Cu9n8nHGh5arn0fEwziQNkiBV3wSnIqPkr73jVYe7EDm','2021-03-31 15:53:17','2021-03-31 15:54:07'),
(54,'1234511154',3,'testing2321@gmail.com','2021-03-31 16:48:19','$2y$10$ilTTA18LXr7WRNXKS8x5suFaaRXfWsyTnlHlaJnN/XaDwvn7YLkay',NULL,NULL,'active','jiDEzEj8KaPDjw1wLgaF8vN3khjYBripZpn9lOLAigNEYANWotQ0R97kOB8Z','2021-03-31 16:47:18','2021-03-31 20:51:52'),
(55,'superadmin',1,'sadmin@gmail.com',NULL,'$2y$10$DKKI863.HrDzD29XMWhLk.TOpEKNkOzNOx29wxNvuGK5Ad//IQ8du',NULL,NULL,'active',NULL,'2021-03-31 20:57:03','2021-03-31 20:57:03'),
(66,'asasa',2,'sassas@sdfgh.lolo',NULL,'$2y$10$tNybykLcxPiO9sDAFqMwLOZAWUtVttSqZ7V/PRb9CdzuU/O2VScva',NULL,NULL,'active',NULL,'2021-03-31 22:01:52','2021-03-31 22:04:42'),
(67,'123456543',3,'testing1@gmail.com','2021-04-01 08:00:20','$2y$10$4nMAiPKXRAgeMbI3nkFKrOa/0oLZ8h4YmS5FVxppGWc7SSChuJ/fS',NULL,NULL,'active',NULL,'2021-04-01 07:42:10','2021-04-01 08:00:20'),
(68,'12312243',3,'dummy1@gmail.com','2021-04-01 08:48:29','$2y$10$g6pskAT5aisx7/32nQENGOVKJYAx2W/mkGdo06WSGbHl79tSdyAz6',NULL,NULL,'active',NULL,'2021-04-01 08:47:07','2021-04-01 08:48:29'),
(69,'1806510122',3,'arialdi@gmail.com','2021-04-01 10:32:46','$2y$10$UAnUH1bqv1ahSO5C4c6NQutRGPNAXG0NGhdXUv3MTwjVsYOIKfm0i',NULL,NULL,'active',NULL,'2021-04-01 10:30:51','2021-04-01 10:32:46'),
(70,'1806510123',3,'asep@gmail.com','2021-05-21 14:45:41','$2y$10$uc7QaqoKfbR7K7PKB.Sa0e9tgVGsEC.3IWQmUv/7U1PrhCwYx7yyK',NULL,NULL,'active',NULL,'2021-04-01 12:40:55','2021-05-21 14:45:41'),
(71,'assadd',2,'asas@assd.lol',NULL,'$2y$10$Y/1xWvrZNm.tlkrBBkkbF.crglOT1NYvHmN.O2sIAbixEJMBb4tYC',NULL,NULL,'active',NULL,'2021-04-01 12:51:34','2021-04-01 12:52:03'),
(72,'1806510124',3,'aulia@gmail.com','2021-04-01 13:17:58','$2y$10$1DOmE091QtaLHfcxcZGt8.lK3dEdPmOj4e.pCPj40RwPlyapzKnaC',NULL,NULL,'active',NULL,'2021-04-01 13:17:09','2021-04-01 13:17:58'),
(73,'1806510125',3,'ayuni@gmail.com','2021-04-01 15:13:17','$2y$10$GdUWaEhh7oo9u9jQfGmS/O/Tw2OUfG5QXrQ.bZPIwqRdP0nDBAHOO',NULL,NULL,'active',NULL,'2021-04-01 15:11:49','2021-04-01 15:13:17'),
(74,'1806510126',3,'azie@gmail.com','2021-04-01 17:29:12','$2y$10$oZEELTBGgrtfeFw3nuJaDOIup8gVRkT1W0Wy9IqMESP3yu2/Z6iYi',NULL,NULL,'active',NULL,'2021-04-01 17:28:29','2021-04-01 17:29:12'),
(75,'12345672122',3,'dummy@gmail.lol','2021-04-02 10:28:57','$2y$10$yA5haTYv8ZzzHDmqbKTa3uaGfB..Bj0TyJTnLHZXRuWFVo63Fd8Cm',NULL,NULL,'active',NULL,'2021-04-02 08:21:27','2021-04-02 10:28:57'),
(76,'1806510127',3,'azwar@gmail.com','2021-04-02 10:15:18','$2y$10$ewGxNHgO5EpSoGCUrO8DkONWTcY0QXuRDoaXLZOdggrUBpH7nwJ.K',NULL,NULL,'active',NULL,'2021-04-02 10:10:48','2021-04-02 10:15:18'),
(77,'1806510165',3,'avvv@gmail.com','2021-04-02 14:03:00','$2y$10$Mpu2o4O..DKxSJFVo3ww7OX20XuFB8Nq9IrlBo4jXQdGYlh7Um3B2',NULL,NULL,'active','j2FRve7wd3Rzms5nOm4Bh6fMnDxUfhI27LLuCjAcQykNyeW4r52EFf42V0jh','2021-04-02 14:01:11','2021-05-23 14:45:00'),
(78,'pemguru',4,'guru@gmail.com',NULL,'$2y$10$XPXT.OAPjAVjXJXfCVTccOwn303rT9JhF5bvdh0cZKzsRcJym7t36',NULL,NULL,'active',NULL,'2021-05-22 08:39:44','2021-05-22 08:39:44'),
(79,'pemperus',5,'perus@gmail.com',NULL,'$2y$10$4vE2ZA0nUOLxbG5giTLWl.l70iMUoRCRrDt9jLqsAL.oBxdc2VZE2',NULL,NULL,'active',NULL,'2021-05-22 08:40:14','2021-05-22 08:40:14'),
(80,'asdfghjkl',3,'asdasd@mail.lol',NULL,'$2y$10$m0D0SuZm8DuV8.V00gVTyO/u0mYfdDUP7qqk3v5DP12KWWJRQlo/K',NULL,NULL,'active',NULL,'2021-05-22 15:20:21','2021-05-22 15:20:21'),
(83,'qwertyuisa',3,'asdasdsa@mail.lol',NULL,'$2y$10$Bt9GdTEs3PY6vIMPazPNX.a9hBqPKIPqOQOncSlsbhESaEhkF00fy',NULL,NULL,'active',NULL,'2021-05-22 15:22:40','2021-05-22 15:22:40'),
(85,'zxcvbb',3,'asasas@mail.lol',NULL,'$2y$10$WpEDGDKGsRL3yiJmvyjgMeHzGhkDUvXt1tq9ubM5rH5ysTJ.v1uUm',NULL,NULL,'active',NULL,'2021-05-22 15:24:03','2021-05-22 15:24:03'),
(88,'zxcvzcxxc',3,'zxzxzx@mail.lol',NULL,'$2y$10$.gM/pgLKkhpXFjx4LHpsuOmkU3YmFNihEKu89mMdWbS0H64v7gYjC',NULL,NULL,'active',NULL,'2021-05-22 15:25:42','2021-05-22 15:25:42'),
(89,'mnbvcxz',3,'azsazsa@dfgh.lol',NULL,'$2y$10$s/8MbVk87GQS3/9MVfYAXerzgfLPOXQILQOVBmfjwTrhmvYV1vC4a',NULL,NULL,'active',NULL,'2021-05-22 15:28:35','2021-05-22 15:28:35'),
(91,'zxasas',3,'azsazsxxa@dfgh.lol',NULL,'$2y$10$shaRtptN7UOR1CXSlftC.uppodzoQBH0wWEm9cCyg8AZoUxHYC/JO',NULL,NULL,'active',NULL,'2021-05-22 15:29:04','2021-05-22 15:29:04'),
(93,'zxcvzxzx',3,'azasasxxa@dfgh.lol',NULL,'$2y$10$t17P/z9gzTkHYYFQkom1nuzEcuYDvNUsGS1gPWCp/NzqU3u.kJkyK',NULL,NULL,'active',NULL,'2021-05-22 15:30:01','2021-05-22 15:30:01'),
(94,'lokijuj',3,'zsdadcd@hjl.olol',NULL,'$2y$10$TCTFaEmq4IQ4aTYOyo/2d.AkN5qH.RnhA.CbHDBGyqGGm2AnXeC7S',NULL,NULL,'active',NULL,'2021-05-22 15:37:35','2021-05-22 15:37:35'),
(95,'ardiinsan03',5,'insani@gmail.com',NULL,'$2y$10$MxRO4sUm7clbkWvXHeU6k.kNZ7sNjCpWNWqvLYRacl6r.Gx1lmbCu',NULL,NULL,'active',NULL,'2021-05-22 16:43:48','2021-05-22 16:43:48'),
(96,'yayan',5,'yayan@gmail.com',NULL,'$2y$10$YhP9l5nOczd3IKbP2vbzDuQAGUo7/2gTfFhBzVi1jNQejUPhGwk8u',NULL,NULL,'active',NULL,'2021-05-22 16:57:35','2021-05-22 16:57:35'),
(99,'inanina',4,'nina@gmai.com',NULL,'$2y$10$P5L1fMwlPrlFW2AGZBDWrO2vXJi1KjTaBp8LILkIM2Y81bdUfbSoK',NULL,NULL,'active',NULL,'2021-05-22 22:54:01','2021-05-22 22:54:01'),
(100,'zcvbnm',4,'asdsa@asds.lol',NULL,'$2y$10$xM7s12L9iyY7JI/o8HIJ0uijDIpThRauQir29UeYq6m5thXWJtog6',NULL,NULL,'active',NULL,'2021-05-22 23:00:11','2021-05-22 23:00:11'),
(101,'putri',4,'putri@gmail.com',NULL,'$2y$10$8G3mDxrp4Bu/eX6uayvFQOil103oh.bNYOyutSF1sgLxbC/LYJ0yO',NULL,NULL,'active',NULL,'2021-05-22 23:18:07','2021-05-22 23:18:07'),
(102,'1806510158',3,'ardinur03@gmail.com','2021-05-22 23:57:42','$2y$10$/fWjpOicp4o4G5nQOuHeSu.FBkqQ01bJE9TeeIL52o6baAUr3Ifqm',NULL,NULL,'active',NULL,'2021-05-22 23:53:24','2021-05-22 23:57:42'),
(103,'1806510128',3,'claudio@gmail.com',NULL,'$2y$10$/p4QOElytzre3uXxrPOHGujowjW1UHcylTu7wRHcGMDbQVj4IMlUe',NULL,NULL,'active',NULL,'2021-05-23 00:00:56','2021-05-23 00:00:56'),
(104,'1806510129',3,'cynthia@gmail.com','2021-05-23 10:34:01','$2y$10$pepRLao8NUPov36W4O7M4uiAnz0xVyv6u7eS8bpaDJTKPYWHPLRjK',NULL,NULL,'active',NULL,'2021-05-23 10:32:46','2021-05-23 10:34:01'),
(105,'1806510130',3,'dadang@gmail.com','2021-05-23 16:25:34','$2y$10$EU4Aj8zCPrAbRO615iilbOTv8ZpBwWmAXL.ZM9mOjjwPeGMSmBr.C',NULL,NULL,'active',NULL,'2021-05-23 15:28:49','2021-05-23 16:25:34'),
(106,'test12',4,'test12@gmail.com',NULL,'$2y$10$NiqKSd3.PrFMHKiCWFcFROjYwqODHfOmuEFbIAdzm4uZJWgd3idjy',NULL,NULL,'active',NULL,'2021-05-23 16:10:29','2021-05-23 16:10:29'),
(107,'test13',5,'test13@gmail.lol',NULL,'$2y$10$ht0ln608U7lMVE1hZ4jaSurOwnJj11nWQyew0LqhhXn9bdnURCiFO',NULL,NULL,'active',NULL,'2021-05-23 16:18:54','2021-05-23 16:18:54'),
(108,'test14',4,'test14@gmail.com',NULL,'$2y$10$1quP084MANhz3J1NkTE7ZejjdFFS.tP6oaQcN7KsU7ST2MSxqEQ1W',NULL,NULL,'active',NULL,'2021-05-23 16:43:11','2021-05-23 16:43:11'),
(109,'test15',5,'test15@gmail.com',NULL,'$2y$10$BoVDLEKHFFyS94sEzsD8/.e.BUTHyjP8oEkdk86iyEE7UUUCOBNHm',NULL,NULL,'active',NULL,'2021-05-23 16:55:07','2021-05-23 16:55:07'),
(110,'1806510135',3,'falia@gmail.com','2021-05-23 16:58:38','$2y$10$cTs8A0OXkdeR5kvFLRxo3eLFq9wna7sJgoErcGTBxfCalWzkdhZRK',NULL,NULL,'active',NULL,'2021-05-23 16:57:41','2021-05-23 16:58:38');

/*Table structure for table `users_akun` */

DROP TABLE IF EXISTS `users_akun`;

CREATE TABLE `users_akun` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `new_users_id` bigint(20) unsigned NOT NULL,
  `new_users_username` varchar(13) NOT NULL COMMENT 'ini merupakan gabungan antara nis, kode pembimbing, kode hubin',
  `new_role` varchar(5) NOT NULL,
  `new_users_email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `new_users_id` (`new_users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

/*Data for the table `users_akun` */

insert  into `users_akun`(`id`,`new_users_id`,`new_users_username`,`new_role`,`new_users_email`,`created_at`) values 
(7,34,'2001232333233','2','iwan@gmail.com','2021-03-14 21:36:37'),
(17,44,'1234567891','3','test1@gmail.com','2021-03-30 19:40:06'),
(18,45,'1234567892','3','test2@gmail.com','2021-03-30 19:47:26'),
(19,46,'1234567893','3','test3@gmail.com','2021-03-30 19:51:41'),
(20,47,'1234567894','3','test4@gmail.com','2021-03-30 22:08:29'),
(21,48,'1234567895','3','test5@gmail.com','2021-03-31 10:04:18'),
(22,49,'1234567896','3','test6@gmail.com','2021-03-31 12:57:25'),
(23,50,'1234567897','3','test7@gmail.com','2021-03-31 15:11:47'),
(24,51,'1234567898','3','test8@gmail.com','2021-03-31 15:17:26'),
(25,52,'1234567899','3','test9@gmail.com','2021-03-31 15:24:23'),
(26,53,'1234567900','3','test10@gmail.com','2021-03-31 15:53:17'),
(27,54,'1234511154','3','testing2321@gmail.com','2021-03-31 16:47:18'),
(28,55,'superadmin','3','sadmin@gmail.com','2021-03-31 20:57:03'),
(39,66,'asasa','1','sassas@sdfgh.lolo','2021-03-31 22:01:52'),
(40,67,'123456543','3','testing1@gmail.com','2021-04-01 07:42:10'),
(41,68,'12312243','3','dummy1@gmail.com','2021-04-01 08:47:07'),
(42,69,'1806510122','3','arialdi@gmail.com','2021-04-01 10:30:51'),
(43,70,'1806510123','3','asep@gmail.com','2021-04-01 12:40:55'),
(44,71,'assadd','1','asas@assd.lol','2021-04-01 12:51:34'),
(45,72,'1806510124','3','aulia@gmail.com','2021-04-01 13:17:09'),
(46,73,'1806510125','3','ayuni@gmail.com','2021-04-01 15:11:49'),
(47,74,'1806510126','3','azie@gmail.com','2021-04-01 17:28:29'),
(48,75,'12345672122','3','dummy@gmail.lol','2021-04-02 08:21:27'),
(49,76,'1806510127','3','azwar@gmail.com','2021-04-02 10:10:48'),
(50,77,'1806510165','3','ardinurinsan03@gmail.com','2021-04-02 14:01:11'),
(51,78,'pemguru','4','guru@gmail.com','2021-05-22 08:39:44'),
(52,79,'pemperus','5','perus@gmail.com','2021-05-22 08:40:14'),
(53,80,'asdfghjkl','3','asdasd@mail.lol','2021-05-22 15:20:21'),
(54,83,'qwertyuisa','3','asdasdsa@mail.lol','2021-05-22 15:22:40'),
(55,85,'zxcvbb','3','asasas@mail.lol','2021-05-22 15:24:03'),
(56,88,'zxcvzcxxc','3','zxzxzx@mail.lol','2021-05-22 15:25:42'),
(57,89,'mnbvcxz','3','azsazsa@dfgh.lol','2021-05-22 15:28:35'),
(58,91,'zxasas','3','azsazsxxa@dfgh.lol','2021-05-22 15:29:04'),
(59,93,'zxcvzxzx','3','azasasxxa@dfgh.lol','2021-05-22 15:30:01'),
(60,94,'lokijuj','3','zsdadcd@hjl.olol','2021-05-22 15:37:35'),
(61,95,'ardiinsan03','5','insani@gmail.com','2021-05-22 16:43:48'),
(62,96,'yayan','5','yayan@gmail.com','2021-05-22 16:57:35'),
(64,99,'inanina','4','nina@gmai.com','2021-05-22 22:54:01'),
(65,100,'zcvbnm','4','asdsa@asds.lol','2021-05-22 23:00:11'),
(66,101,'putri','4','putri@gmail.com','2021-05-22 23:18:07'),
(67,102,'1806510158','3','ardiansyah@gmail.com','2021-05-22 23:53:24'),
(68,103,'1806510128','3','claudio@gmail.com','2021-05-23 00:00:56'),
(69,104,'1806510129','3','cynthia@gmail.com','2021-05-23 10:32:46'),
(70,105,'1806510130','3','dadang@gmail.com','2021-05-23 15:28:49'),
(71,106,'test12','4','test12@gmail.com','2021-05-23 16:10:29'),
(72,107,'test13','5','test13@gmail.lol','2021-05-23 16:18:54'),
(73,108,'test14','4','test14@gmail.com','2021-05-23 16:43:11'),
(74,109,'test15','5','test15@gmail.com','2021-05-23 16:55:07'),
(75,110,'1806510135','3','falia@gmail.com','2021-05-23 16:57:41');

/* Trigger structure for table `admin_hubin` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `after_delete_acc_admin_hubin_relasi_users` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `after_delete_acc_admin_hubin_relasi_users` AFTER DELETE ON `admin_hubin` FOR EACH ROW BEGIN
	DELETE FROM users WHERE id in (old.user_id);
END */$$


DELIMITER ;

/* Trigger structure for table `pengajuan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `after_insert_pengajuan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `after_insert_pengajuan` AFTER INSERT ON `pengajuan` FOR EACH ROW BEGIN
	UPDATE perusahaan SET kuota_perusahaan = kuota_perusahaan - 1  WHERE kode_perusahaan=new.kode_perusahaan;
END */$$


DELIMITER ;

/* Trigger structure for table `pengajuan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `after_update_tolak_pengajuan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `after_update_tolak_pengajuan` AFTER UPDATE ON `pengajuan` FOR EACH ROW BEGIN
	if new.status_pengajuan = 3 THEN
		UPDATE perusahaan SET kuota_perusahaan = kuota_perusahaan + 1  WHERE kode_perusahaan=new.kode_perusahaan;
    end if;
END */$$


DELIMITER ;

/* Trigger structure for table `pengajuan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `after_update_diterima_pengajuan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `after_update_diterima_pengajuan` AFTER UPDATE ON `pengajuan` FOR EACH ROW BEGIN
	if new.status_pengajuan = 2 THEN
		UPDATE perusahaan SET siswa_prakerin=siswa_prakerin + 1  WHERE kode_perusahaan=new.kode_perusahaan;
    end if;
END */$$


DELIMITER ;

/* Trigger structure for table `siswa` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `after_delete_siswa_relasi_users` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `after_delete_siswa_relasi_users` AFTER DELETE ON `siswa` FOR EACH ROW BEGIN
		DELETE FROM users WHERE id in (old.user_id);
END */$$


DELIMITER ;

/* Trigger structure for table `users` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `save_id` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `save_id` AFTER INSERT ON `users` FOR EACH ROW BEGIN	

	  INSERT INTO users_akun (new_users_id, new_users_username, new_role, new_users_email, created_at) VALUES (new.id, new.username, new.roles, new.email, NOW());
	
END */$$


DELIMITER ;

/* Trigger structure for table `users` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_row_tbl_users_akun` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_row_tbl_users_akun` AFTER DELETE ON `users` FOR EACH ROW DELETE from users_akun where new_users_id in(old.id) */$$


DELIMITER ;

/* Trigger structure for table `users_akun` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_id_hubin` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_id_hubin` BEFORE INSERT ON `users_akun` FOR EACH ROW BEGIN

	if new.new_role = 2 THEN
		UPDATE admin_hubin SET user_id = new.new_users_id WHERE kode_admin_hubin=new.new_users_username;
	end if;
    END */$$


DELIMITER ;

/* Trigger structure for table `users_akun` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_id_siswa` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_id_siswa` BEFORE INSERT ON `users_akun` FOR EACH ROW BEGIN

	if new.new_role = 3 THEN
		UPDATE siswa SET user_id = new.new_users_id WHERE nis=new.new_users_username;
	end if;
    END */$$


DELIMITER ;

/* Procedure structure for procedure `getAllPerusahaanExcel` */

/*!50003 DROP PROCEDURE IF EXISTS  `getAllPerusahaanExcel` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllPerusahaanExcel`()
BEGIN 
SELECT 
kode_perusahaan, 
nama_perusahaan, 
nama_jurusan,
deskripsi_perusahaan, 
pimpinan_perusahaan, 
email_perusahaan, 
website_perusahaan, 
kontak_perusahaan,
alamat_perusahaan, 
kota_perusahaan, 
kode_pos 
FROM perusahaan 
INNER JOIN jurusan 
ON perusahaan.jurusan_id = jurusan.id;
END */$$
DELIMITER ;

/*Table structure for table `all_siswa` */

DROP TABLE IF EXISTS `all_siswa`;

/*!50001 DROP VIEW IF EXISTS `all_siswa` */;
/*!50001 DROP TABLE IF EXISTS `all_siswa` */;

/*!50001 CREATE TABLE  `all_siswa`(
 `nis` varchar(13) ,
 `nama_siswa` varchar(50) ,
 `kelas` varchar(3) ,
 `nama_jurusan` varchar(50) ,
 `jk_siswa` enum('P','L') ,
 `alamat` varchar(255) ,
 `kontak_siswa` varchar(15) ,
 `angkatan` varchar(4) 
)*/;

/*View structure for view all_siswa */

/*!50001 DROP TABLE IF EXISTS `all_siswa` */;
/*!50001 DROP VIEW IF EXISTS `all_siswa` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_siswa` AS select `siswa`.`nis` AS `nis`,`siswa`.`nama_siswa` AS `nama_siswa`,`siswa`.`kelas` AS `kelas`,`jurusan`.`nama_jurusan` AS `nama_jurusan`,`siswa`.`jk_siswa` AS `jk_siswa`,`siswa`.`alamat` AS `alamat`,`siswa`.`kontak_siswa` AS `kontak_siswa`,`siswa`.`angkatan` AS `angkatan` from (`siswa` join `jurusan` on((`siswa`.`jurusan_id` = `jurusan`.`id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
