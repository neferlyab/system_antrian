-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ge_antrian_loket
CREATE DATABASE IF NOT EXISTS `ge_antrian_loket` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ge_antrian_loket`;

-- Dumping structure for table ge_antrian_loket.antrian
CREATE TABLE IF NOT EXISTS `antrian` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `waktu` time DEFAULT NULL,
  `nomor` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `loket` int(11) NOT NULL,
  `id_bagian` int(5) DEFAULT NULL,
  `idprsh` int(12) DEFAULT NULL,
  `cara_daftar` enum('Online','Langsung') DEFAULT NULL,
  `validasi` tinyint(1) NOT NULL COMMENT '1=orangnya sudah ada ditempat',
  `posisi` enum('Pendaftaran','Poli','Pelayanan','Selesai') NOT NULL DEFAULT 'Pendaftaran',
  `kode` varchar(5) DEFAULT NULL,
  `iddokter` varchar(5) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `nama_pasien` varchar(150) NOT NULL,
  `norm` varchar(20) DEFAULT NULL,
  `dipanggil` tinyint(1) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `last` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- Dumping data for table ge_antrian_loket.antrian: ~51 rows (approximately)
/*!40000 ALTER TABLE `antrian` DISABLE KEYS */;
INSERT INTO `antrian` (`id`, `tanggal`, `waktu`, `nomor`, `status`, `loket`, `id_bagian`, `idprsh`, `cara_daftar`, `validasi`, `posisi`, `kode`, `iddokter`, `jenis`, `nama_pasien`, `norm`, `dipanggil`, `iduser`, `last`) VALUES
	(1, '2019-11-03', '14:11:00', 'A001', 0, 1, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 1, 24, '2019-11-03 15:05:06'),
	(2, '2019-11-03', '14:12:00', 'B001', 0, 0, 2, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-03 14:12:03'),
	(3, '2019-11-03', '14:13:00', 'B002', 0, 1, 2, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 1, 24, '2019-11-03 15:05:45'),
	(4, '2019-11-03', '14:13:00', 'A002', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-03 14:13:11'),
	(5, '2019-11-03', '14:13:00', 'A003', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-03 14:13:42'),
	(6, '2019-11-03', '14:13:00', 'B003', 0, 0, 2, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-03 14:13:48'),
	(7, '2019-11-03', '15:02:00', 'A004', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-03 15:02:34'),
	(8, '2019-11-03', '15:03:00', 'B004', 0, 0, 2, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-03 15:03:06'),
	(9, '2019-11-03', '15:03:00', 'A005', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-03 15:03:25'),
	(10, '2019-11-03', '15:03:00', 'B005', 0, 0, 2, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-03 15:03:37'),
	(11, '2019-11-03', '17:27:00', 'A006', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-03 17:27:48'),
	(12, '2019-11-03', '17:27:00', 'B006', 0, 0, 2, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-03 17:27:55'),
	(13, '2019-11-03', '17:31:00', 'B007', 0, 0, 2, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-03 17:31:07'),
	(14, '2019-11-03', '21:13:00', 'A007', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-03 21:13:12'),
	(15, '2019-11-04', '23:48:00', 'A001', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-04 23:48:13'),
	(16, '2019-11-09', '13:23:00', 'A001', 0, 1, 1, NULL, 'Online', 0, 'Selesai', NULL, NULL, 'Pelayanan', '', NULL, 1, 24, '2019-11-09 13:25:48'),
	(17, '2019-11-09', '13:23:00', 'B001', 0, 1, 2, NULL, 'Online', 0, 'Selesai', NULL, NULL, 'Pelayanan', '', NULL, 1, 24, '2019-11-09 13:25:49'),
	(18, '2019-11-09', '13:23:00', 'B002', 0, 1, 2, NULL, 'Online', 0, 'Selesai', NULL, NULL, 'Pelayanan', '', NULL, 1, 24, '2019-11-09 13:25:52'),
	(19, '2019-11-09', '13:23:00', 'B003', 0, 0, 2, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-09 13:23:57'),
	(20, '2019-11-09', '13:24:00', 'B004', 0, 0, 2, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-09 13:24:01'),
	(21, '2019-11-09', '13:24:00', 'B005', 0, 0, 2, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-09 13:24:06'),
	(22, '2019-11-09', '13:24:00', 'A002', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-09 13:24:11'),
	(23, '2019-11-15', '22:44:00', 'A001', 0, 1, 1, NULL, 'Online', 0, 'Selesai', NULL, NULL, 'Pelayanan', '', NULL, 1, 24, '2019-11-15 22:46:40'),
	(24, '2019-11-15', '22:44:00', 'A002', 0, 1, 1, NULL, 'Online', 0, 'Selesai', NULL, NULL, 'Pelayanan', '', NULL, 1, 24, '2019-11-15 22:46:44'),
	(25, '2019-11-15', '22:45:00', 'B001', 0, 2, 2, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 1, 25, '2019-11-15 22:47:26'),
	(26, '2019-11-15', '22:45:00', 'B002', 0, 2, 2, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 1, 25, '2019-11-15 22:47:41'),
	(27, '2019-11-15', '22:45:00', 'B003', 0, 0, 2, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2019-11-15 22:45:32'),
	(28, '2019-11-15', '22:48:00', 'A003', 0, 2, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 1, 25, '2019-11-15 22:48:42'),
	(29, '2020-01-17', '05:51:00', 'A001', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 05:51:01'),
	(30, '2020-01-17', '05:58:00', 'A002', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 05:58:19'),
	(31, '2020-01-17', '05:59:00', 'A003', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 05:59:52'),
	(32, '2020-01-17', '06:12:00', 'A004', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 06:12:50'),
	(33, '2020-01-17', '06:15:00', 'A005', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 06:15:28'),
	(34, '2020-01-17', '06:15:00', 'A006', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 06:15:31'),
	(35, '2020-01-17', '06:18:00', 'A007', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 06:18:02'),
	(36, '2020-01-17', '06:18:00', 'A008', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 06:18:42'),
	(37, '2020-01-17', '06:23:00', 'A009', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 06:23:00'),
	(38, '2020-01-17', '06:24:00', 'A010', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 06:24:09'),
	(39, '2020-01-17', '06:24:00', 'A011', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 06:24:40'),
	(40, '2020-01-17', '22:50:00', 'A012', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 22:50:17'),
	(41, '2020-01-17', '22:52:00', 'A013', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 22:52:59'),
	(42, '2020-01-17', '22:55:00', 'A014', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 22:55:43'),
	(43, '2020-01-17', '22:58:00', 'A015', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 22:58:01'),
	(44, '2020-01-17', '22:59:00', 'A016', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 22:59:06'),
	(45, '2020-01-17', '23:16:00', 'A017', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-01-17 23:16:13'),
	(46, '2020-04-21', '18:01:00', 'A001', 0, 1, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 1, 24, '2020-04-21 18:12:45'),
	(47, '2020-04-21', '18:03:00', 'A002', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-04-21 18:03:38'),
	(48, '2020-04-21', '18:04:00', 'B001', 0, 0, 2, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-04-21 18:04:57'),
	(49, '2020-04-21', '18:06:00', 'A003', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-04-21 18:06:38'),
	(50, '2020-04-21', '18:06:00', 'A004', 0, 0, 1, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-04-21 18:06:46'),
	(51, '2020-04-21', '18:06:00', 'B002', 0, 0, 2, NULL, 'Online', 0, 'Pelayanan', NULL, NULL, 'Pelayanan', '', NULL, 0, NULL, '2020-04-21 18:06:51');
/*!40000 ALTER TABLE `antrian` ENABLE KEYS */;

-- Dumping structure for table ge_antrian_loket.antriandtl
CREATE TABLE IF NOT EXISTS `antriandtl` (
  `id` int(11) NOT NULL,
  `noantrian` varchar(15) NOT NULL,
  `jenis` enum('Pendaftaran','Poli','Pelayanan') DEFAULT NULL,
  `dipanggil` tinyint(1) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `last` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`noantrian`),
  CONSTRAINT `FK_antriandtl_antrian` FOREIGN KEY (`id`) REFERENCES `antrian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ge_antrian_loket.antriandtl: ~0 rows (approximately)
/*!40000 ALTER TABLE `antriandtl` DISABLE KEYS */;
/*!40000 ALTER TABLE `antriandtl` ENABLE KEYS */;

-- Dumping structure for table ge_antrian_loket.antrianlog
CREATE TABLE IF NOT EXISTS `antrianlog` (
  `id` int(15) DEFAULT NULL,
  `no_antrian` varchar(50) DEFAULT NULL,
  `bagian` varchar(50) DEFAULT NULL,
  `loket` varchar(50) DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ge_antrian_loket.antrianlog: ~20 rows (approximately)
/*!40000 ALTER TABLE `antrianlog` DISABLE KEYS */;
INSERT INTO `antrianlog` (`id`, `no_antrian`, `bagian`, `loket`, `aktif`, `tanggal`, `iduser`) VALUES
	(1, 'A001', 'Pelayanan', '1', 0, '2019-11-03 15:04:52', 24),
	(1, 'A001', 'Pelayanan', '1', 0, '2019-11-03 15:05:14', 24),
	(3, 'B002', 'Pelayanan', '1', 0, '2019-11-03 15:05:33', 24),
	(1, 'A001', 'Pelayanan', '1', 0, '2019-11-03 17:29:08', 24),
	(3, 'B002', 'Pelayanan', '1', 0, '2019-11-03 17:29:16', 24),
	(3, 'B002', 'Pelayanan', '1', 0, '2019-11-03 17:29:21', 24),
	(1, 'A001', 'Pelayanan', '1', 0, '2019-11-03 17:29:24', 24),
	(1, 'A001', 'Pelayanan', '1', 0, '2019-11-03 17:29:26', 24),
	(16, 'A001', 'Pelayanan', '1', 0, '2019-11-09 13:24:40', 24),
	(17, 'B001', 'Pelayanan', '1', 0, '2019-11-09 13:25:13', 24),
	(18, 'B002', 'Pelayanan', '1', 0, '2019-11-09 13:25:26', 24),
	(17, 'B001', 'Pelayanan', '1', 0, '2019-11-09 13:25:37', 24),
	(23, 'A001', 'Pelayanan', '1', 0, '2019-11-15 22:45:51', 24),
	(24, 'A002', 'Pelayanan', '1', 0, '2019-11-15 22:46:12', 24),
	(23, 'A001', 'Pelayanan', '1', 0, '2019-11-15 22:46:27', 24),
	(25, 'B001', 'Pelayanan', '2', 0, '2019-11-15 22:47:13', 25),
	(26, 'B002', 'Pelayanan', '2', 0, '2019-11-15 22:47:30', 25),
	(26, 'B002', 'Pelayanan', '2', 0, '2019-11-15 22:47:47', 25),
	(28, 'A003', 'Pelayanan', '2', 0, '2019-11-15 22:48:25', 25),
	(46, 'A001', 'Pelayanan', '1', 0, '2020-04-21 18:12:32', 24);
/*!40000 ALTER TABLE `antrianlog` ENABLE KEYS */;

-- Dumping structure for table ge_antrian_loket.bagian
CREATE TABLE IF NOT EXISTS `bagian` (
  `id_bagian` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `status` enum('aktif','tidak') NOT NULL,
  `loket` int(2) NOT NULL,
  `jenis` enum('umum','asuransi') NOT NULL DEFAULT 'umum',
  `code` varchar(2) NOT NULL,
  PRIMARY KEY (`id_bagian`),
  UNIQUE KEY `KODE` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ge_antrian_loket.bagian: ~3 rows (approximately)
/*!40000 ALTER TABLE `bagian` DISABLE KEYS */;
INSERT INTO `bagian` (`id_bagian`, `nama`, `status`, `loket`, `jenis`, `code`) VALUES
	(1, 'BPJS', 'aktif', 0, 'umum', 'A'),
	(2, 'NON BPJS', 'aktif', 0, 'umum', 'B'),
	(3, 'PELAYANAN', 'tidak', 0, 'umum', 'C');
/*!40000 ALTER TABLE `bagian` ENABLE KEYS */;

-- Dumping structure for table ge_antrian_loket.kode
CREATE TABLE IF NOT EXISTS `kode` (
  `idkode` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `nomor` int(11) DEFAULT '0',
  `digit` tinyint(5) DEFAULT '5',
  `nonaktif` tinyint(5) DEFAULT '0',
  `lastupdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idkode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ge_antrian_loket.kode: ~5 rows (approximately)
/*!40000 ALTER TABLE `kode` DISABLE KEYS */;
INSERT INTO `kode` (`idkode`, `nama`, `prefix`, `nomor`, `digit`, `nonaktif`, `lastupdate`) VALUES
	(1, 'Rawat Jalan', 'RJO', 2038, 7, 0, '2019-03-29 15:27:40'),
	(2, 'Pendaftaran', 'A', 1, 3, 0, '2019-03-29 15:27:39'),
	(3, 'Layanan Informasi', 'C', 0, 3, 0, '2018-08-08 09:25:36'),
	(4, 'Layanan SEP', 'B', 0, 3, 0, '2019-03-13 10:11:42'),
	(5, 'Pendaftaran Pasien', 'P', 1, 5, 0, '2019-03-29 15:27:38');
/*!40000 ALTER TABLE `kode` ENABLE KEYS */;

-- Dumping structure for table ge_antrian_loket.loket
CREATE TABLE IF NOT EXISTS `loket` (
  `idloket` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `status` enum('Aktif','Tidak') NOT NULL DEFAULT 'Aktif',
  PRIMARY KEY (`idloket`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ge_antrian_loket.loket: ~3 rows (approximately)
/*!40000 ALTER TABLE `loket` DISABLE KEYS */;
INSERT INTO `loket` (`idloket`, `nama`, `status`) VALUES
	(1, 'Loket 1', 'Aktif'),
	(2, 'Loket 2', 'Aktif'),
	(3, 'Loket 3', 'Aktif');
/*!40000 ALTER TABLE `loket` ENABLE KEYS */;

-- Dumping structure for table ge_antrian_loket.pengaturan
CREATE TABLE IF NOT EXISTS `pengaturan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namalembaga` varchar(50) DEFAULT NULL,
  `alamat` tinytext,
  `telepon` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `bg` varchar(150) DEFAULT NULL,
  `linkplaystore` varchar(255) NOT NULL,
  `about` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ge_antrian_loket.pengaturan: ~1 rows (approximately)
/*!40000 ALTER TABLE `pengaturan` DISABLE KEYS */;
INSERT INTO `pengaturan` (`id`, `namalembaga`, `alamat`, `telepon`, `email`, `website`, `logo`, `bg`, `linkplaystore`, `about`) VALUES
	(1, 'Rumah Sakit Umum', 'Yogyakarta', '-', 'rsu@yahoo.co.id', '-', '502e9-dokter.png', NULL, '', 'Rumah sakit umum');
/*!40000 ALTER TABLE `pengaturan` ENABLE KEYS */;

-- Dumping structure for table ge_antrian_loket.perusahaan
CREATE TABLE IF NOT EXISTS `perusahaan` (
  `idprsh` int(11) NOT NULL AUTO_INCREMENT,
  `namaprsh` varchar(30) DEFAULT NULL,
  `alamatprsh` varchar(60) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `jenisprsh` enum('Umum','Kredit','Asuransi') DEFAULT NULL,
  `kontak` varchar(30) DEFAULT NULL,
  `expired` datetime DEFAULT NULL,
  `idkategori` int(11) DEFAULT NULL,
  PRIMARY KEY (`idprsh`) USING BTREE,
  UNIQUE KEY `idprsh` (`idprsh`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=16384;

-- Dumping data for table ge_antrian_loket.perusahaan: ~0 rows (approximately)
/*!40000 ALTER TABLE `perusahaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `perusahaan` ENABLE KEYS */;

-- Dumping structure for table ge_antrian_loket.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `loket` tinyint(5) DEFAULT NULL,
  `bagian` enum('Pelayanan') DEFAULT NULL,
  `kode_poli` varchar(10) DEFAULT NULL,
  `iddokter` varchar(5) DEFAULT NULL,
  `max_panggil` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Dumping data for table ge_antrian_loket.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `loket`, `bagian`, `kode_poli`, `iddokter`, `max_panggil`) VALUES
	(1, '127.0.0.1', 'admin', '$2y$08$kOKAJEJTiIVHUBsQWwik1.VVHLOHl3F2Y8rGFRWzniUUO.fXL.8jC', '', 'admin@gloosoft.com', '', NULL, NULL, NULL, 1268889823, 1587467967, 1, 'Administrator', NULL, 'ADMIN', '0', NULL, NULL, NULL, NULL, 0),
	(24, '127.0.0.1', 'loket1', '$2y$08$dd9zVuljBZamiEnofqiyXOEo8utIL9QfcFVG7nSqIN23VnA.UxfYm', NULL, 'loket1@yahoo.com', NULL, NULL, NULL, NULL, 1506574646, 1587467541, 1, 'Loket', '1', NULL, NULL, 1, 'Pelayanan', NULL, NULL, 0),
	(25, '127.0.0.1', 'loket2', '$2y$08$dd9zVuljBZamiEnofqiyXOEo8utIL9QfcFVG7nSqIN23VnA.UxfYm', NULL, 'loket2@yahoo.com', NULL, NULL, NULL, NULL, 1506574646, 1573832821, 1, 'Loket', '2', NULL, NULL, 2, 'Pelayanan', NULL, NULL, 0),
	(26, '', 'loket3', '$2y$08$/DNzilR.Xs6hgrUI7bOWhuzA/cVK4iml5RucImQmxFIkaFYXLnnSi', NULL, 'loket3@gmail.com', NULL, NULL, NULL, NULL, 0, 1565527460, 1, 'loket', '3', NULL, NULL, 3, 'Pelayanan', NULL, NULL, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table ge_antrian_loket.users_groups
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id_group` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id_group`),
  KEY `id user` (`id`),
  KEY `id group` (`group_id`),
  CONSTRAINT `users_groups_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `users_jenis_groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- Dumping data for table ge_antrian_loket.users_groups: ~4 rows (approximately)
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`id_group`, `id`, `group_id`) VALUES
	(31, 1, 1),
	(52, 24, 2),
	(53, 25, 2),
	(54, 26, 2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;

-- Dumping structure for table ge_antrian_loket.users_jenis_groups
CREATE TABLE IF NOT EXISTS `users_jenis_groups` (
  `group_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ge_antrian_loket.users_jenis_groups: ~4 rows (approximately)
/*!40000 ALTER TABLE `users_jenis_groups` DISABLE KEYS */;
INSERT INTO `users_jenis_groups` (`group_id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'members', 'General User'),
	(3, 'daftarlangsung', 'Pendaftaran Langsung'),
	(4, 'pendaftaran', 'Pendaftaran');
/*!40000 ALTER TABLE `users_jenis_groups` ENABLE KEYS */;

-- Dumping structure for table ge_antrian_loket.users_login_attempts
CREATE TABLE IF NOT EXISTS `users_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ge_antrian_loket.users_login_attempts: ~0 rows (approximately)
/*!40000 ALTER TABLE `users_login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_login_attempts` ENABLE KEYS */;

-- Dumping structure for table ge_antrian_loket.video
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `status` enum('aktif','tidak') NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table ge_antrian_loket.video: ~2 rows (approximately)
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` (`id`, `nama`, `status`, `link`) VALUES
	(8, 'BPJS ketenagakerjaan', 'aktif', 'cnRRL2j84Wo'),
	(9, 'Aplikasi Mobile JKN', 'aktif', 'lzGnSTZZogQ');
/*!40000 ALTER TABLE `video` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
