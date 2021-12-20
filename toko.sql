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

-- Dumping structure for table ge_antrian_loket.dokter
CREATE TABLE IF NOT EXISTS `dokter` (
  `iddokter` varchar(5) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` text,
  `jeniskelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `jenisdokter` enum('umum','spesialis') DEFAULT NULL,
  `tgl_aktif` date DEFAULT NULL,
  `nikd` varchar(100) DEFAULT NULL,
  `img` blob,
  `kode` varchar(5) DEFAULT NULL,
  `kode_simbol` varchar(5) DEFAULT NULL,
  `kode_no` int(12) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`iddokter`) USING BTREE,
  UNIQUE KEY `kode_simbol` (`kode_simbol`),
  KEY `FK_dokter_poliklinik` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=142;

-- Dumping data for table ge_antrian_loket.dokter: ~0 rows (approximately)
/*!40000 ALTER TABLE `dokter` DISABLE KEYS */;
/*!40000 ALTER TABLE `dokter` ENABLE KEYS */;

-- Dumping structure for table ge_antrian_loket.poliklinik
CREATE TABLE IF NOT EXISTS `poliklinik` (
  `kode` varchar(5) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `jenispoli` enum('umum','spesialis') DEFAULT NULL,
  `nonaktif` tinyint(1) NOT NULL,
  `no_kode` varchar(10) NOT NULL,
  `no_urut` tinyint(5) NOT NULL,
  `lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=655;

-- Dumping data for table ge_antrian_loket.poliklinik: ~16 rows (approximately)
/*!40000 ALTER TABLE `poliklinik` DISABLE KEYS */;
INSERT INTO `poliklinik` (`kode`, `nama`, `jenispoli`, `nonaktif`, `no_kode`, `no_urut`, `lastupdate`) VALUES
	('00001', 'Instalasi Gawat Darurat', 'umum', 1, 'GD', 0, '2018-10-09 05:12:08'),
	('00002', 'Poli Umum', 'umum', 1, 'UM', 0, '2018-10-09 05:12:08'),
	('00004', 'Poli Orthopedi', 'spesialis', 0, 'OP', 15, '2018-10-09 15:36:35'),
	('00005', 'Poli Kandungan', 'spesialis', 1, 'KD', 0, '2018-10-09 05:12:08'),
	('00006', 'Poli Saraf', 'spesialis', 0, 'SR', 1, '2018-10-09 05:47:11'),
	('00007', 'Poli Anak', 'spesialis', 0, 'AN', 3, '2018-10-09 16:02:25'),
	('00008', 'Poli Gigi', 'spesialis', 1, 'GG', 0, '2018-10-09 05:12:08'),
	('00009', 'Poli Fisiotherapy', 'spesialis', 0, 'FT', 0, '2018-10-09 05:12:08'),
	('0001', 'Poli Bedah', 'spesialis', 0, 'BD', 0, '2018-10-09 05:12:08'),
	('00010', 'Poli Dalam', 'spesialis', 0, 'DL', 0, '2018-10-09 16:22:39'),
	('00011', 'Poli Kecantikan (Estetika)', 'spesialis', 1, 'KC', 0, '2018-10-09 05:12:08'),
	('00012', 'Poli USG', 'spesialis', 0, 'US', 0, '2018-10-09 05:12:08'),
	('00013', 'Poli Kemoterapy', 'spesialis', 1, 'KT', 0, '2018-10-09 05:12:08'),
	('00014', 'Poli Mata', 'spesialis', 1, 'MT', 0, '2018-10-09 05:12:08'),
	('00015', 'Poli Urologi', 'spesialis', 0, 'UL', 0, '2018-10-09 05:12:08'),
	('00016', 'Poli Jantung', 'spesialis', 0, 'JT', 12, '2018-10-09 14:47:14');
/*!40000 ALTER TABLE `poliklinik` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
