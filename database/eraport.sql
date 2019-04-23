# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.3.12-MariaDB)
# Database: eraport
# Generation Time: 2019-01-20 16:52:39 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ak_data_guru
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_guru`;

CREATE TABLE `ak_data_guru` (
  `guru_id` char(20) NOT NULL DEFAULT '',
  `user_id` char(20) NOT NULL DEFAULT '',
  `mapel_id` char(20) NOT NULL DEFAULT '',
  `guru_nama` varchar(128) NOT NULL DEFAULT '',
  `jenis_kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `tempat_lahir` varchar(128) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(128) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` char(18) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`guru_id`),
  KEY `user_id` (`user_id`),
  KEY `mapel_id` (`mapel_id`),
  CONSTRAINT `ak_data_guru_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `ak_data_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ak_data_guru_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `ak_data_mapel` (`mapel_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `ak_data_guru` WRITE;
/*!40000 ALTER TABLE `ak_data_guru` DISABLE KEYS */;

INSERT INTO `ak_data_guru` (`guru_id`, `user_id`, `mapel_id`, `guru_nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `telepon`, `deleted`)
VALUES
	('TCH190120000001','USR19011700000001','MAP190120000001','Gilang Pratama Priadi','Pria','Bandung','1996-05-04','ISLAM','Jl. Raya Banjaran No. 112 D RT. 03 RW. 03','087710545682',0);

/*!40000 ALTER TABLE `ak_data_guru` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_kehadiran
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_kehadiran`;

CREATE TABLE `ak_data_kehadiran` (
  `kehadiran_id` char(20) NOT NULL DEFAULT '',
  `siswa_id` char(20) NOT NULL DEFAULT '',
  `tanggal_masuk` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`kehadiran_id`),
  KEY `siswa_id` (`siswa_id`),
  CONSTRAINT `ak_data_kehadiran_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `ak_data_siswa` (`siswa_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `ak_data_kehadiran` WRITE;
/*!40000 ALTER TABLE `ak_data_kehadiran` DISABLE KEYS */;

INSERT INTO `ak_data_kehadiran` (`kehadiran_id`, `siswa_id`, `tanggal_masuk`, `jam_masuk`, `deleted`)
VALUES
	('ABS190120000001','STU190120000001','2019-01-21','09:00:00',0);

/*!40000 ALTER TABLE `ak_data_kehadiran` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_kelas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_kelas`;

CREATE TABLE `ak_data_kelas` (
  `kelas_id` char(20) NOT NULL DEFAULT '',
  `kelas_nama` char(20) NOT NULL DEFAULT '',
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`kelas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `ak_data_kelas` WRITE;
/*!40000 ALTER TABLE `ak_data_kelas` DISABLE KEYS */;

INSERT INTO `ak_data_kelas` (`kelas_id`, `kelas_nama`, `deleted`)
VALUES
	('KLS190120000001','X TKJ 1',0),
	('KLS190120000002','XI TKJ 1',0),
	('KLS190120000003','XII TKJ 1',0);

/*!40000 ALTER TABLE `ak_data_kelas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_mapel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_mapel`;

CREATE TABLE `ak_data_mapel` (
  `mapel_id` char(20) NOT NULL DEFAULT '',
  `mapel_nama` varchar(128) NOT NULL DEFAULT '',
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`mapel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `ak_data_mapel` WRITE;
/*!40000 ALTER TABLE `ak_data_mapel` DISABLE KEYS */;

INSERT INTO `ak_data_mapel` (`mapel_id`, `mapel_nama`, `deleted`)
VALUES
	('MAP190120000001','Bahasa Indonesia',0),
	('MAP190120000002','Bahasa Inggris',0),
	('MAP190120000003','Matematika',0),
	('MAP190120000004','Fisika',0),
	('MAP190120000005','Kimia',0);

/*!40000 ALTER TABLE `ak_data_mapel` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_nilai
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_nilai`;

CREATE TABLE `ak_data_nilai` (
  `nilai_id` char(20) NOT NULL DEFAULT '',
  `guru_id` char(20) NOT NULL DEFAULT '',
  `siswa_id` char(20) NOT NULL DEFAULT '',
  `tahun_ajaran_id` char(20) NOT NULL DEFAULT '',
  `nilai_tugas` int(11) NOT NULL DEFAULT 0,
  `nilai_harian` int(11) NOT NULL DEFAULT 0,
  `nilai_portofolio` int(11) NOT NULL DEFAULT 0,
  `nilai_proyek` int(11) NOT NULL DEFAULT 0,
  `nilai_praktek` int(11) NOT NULL DEFAULT 0,
  `nilai_uts` int(11) NOT NULL DEFAULT 0,
  `nilai_uas` int(11) NOT NULL DEFAULT 0,
  `pd` int(11) NOT NULL DEFAULT 0,
  `jur` int(11) NOT NULL DEFAULT 0,
  `obs` int(11) NOT NULL DEFAULT 0,
  `ps` int(11) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`nilai_id`),
  KEY `guru_id` (`guru_id`),
  KEY `siswa_id` (`siswa_id`),
  KEY `tahun_ajaran_id` (`tahun_ajaran_id`),
  CONSTRAINT `ak_data_nilai_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `ak_data_guru` (`guru_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ak_data_nilai_ibfk_2` FOREIGN KEY (`siswa_id`) REFERENCES `ak_data_siswa` (`siswa_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ak_data_nilai_ibfk_3` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `ak_data_tahun_ajaran` (`tahun_ajaran_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `ak_data_nilai` WRITE;
/*!40000 ALTER TABLE `ak_data_nilai` DISABLE KEYS */;

INSERT INTO `ak_data_nilai` (`nilai_id`, `guru_id`, `siswa_id`, `tahun_ajaran_id`, `nilai_tugas`, `nilai_harian`, `nilai_portofolio`, `nilai_proyek`, `nilai_praktek`, `nilai_uts`, `nilai_uas`, `pd`, `jur`, `obs`, `ps`, `deleted`)
VALUES
	('NIL190120000001','TCH190120000001','STU190120000001','TA190120000001',100,100,100,100,100,100,100,100,100,100,100,0);

/*!40000 ALTER TABLE `ak_data_nilai` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_sistem_app_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_sistem_app_info`;

CREATE TABLE `ak_data_sistem_app_info` (
  `app_info_id` char(20) NOT NULL DEFAULT '',
  `app_info_name` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`app_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_sistem_app_info` WRITE;
/*!40000 ALTER TABLE `ak_data_sistem_app_info` DISABLE KEYS */;

INSERT INTO `ak_data_sistem_app_info` (`app_info_id`, `app_info_name`)
VALUES
	('APP1901170001','E-RAPORT');

/*!40000 ALTER TABLE `ak_data_sistem_app_info` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_sistem_instansi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_sistem_instansi`;

CREATE TABLE `ak_data_sistem_instansi` (
  `instansi_id` char(20) NOT NULL DEFAULT '',
  `instansi_nama` varchar(128) NOT NULL DEFAULT '',
  `instansi_alamat` text DEFAULT NULL,
  `instansi_kontak` char(18) NOT NULL DEFAULT '',
  PRIMARY KEY (`instansi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_sistem_instansi` WRITE;
/*!40000 ALTER TABLE `ak_data_sistem_instansi` DISABLE KEYS */;

INSERT INTO `ak_data_sistem_instansi` (`instansi_id`, `instansi_nama`, `instansi_alamat`, `instansi_kontak`)
VALUES
	('INS19011700001','SMKN 2 BALEENDAH','Jalan R.A.A Wiranata Kusumah No. 11, Baleendah, Bandung','(022) 5940714');

/*!40000 ALTER TABLE `ak_data_sistem_instansi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_sistem_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_sistem_log`;

CREATE TABLE `ak_data_sistem_log` (
  `id` varchar(128) NOT NULL DEFAULT '',
  `ip_address` varchar(45) NOT NULL DEFAULT '',
  `timestamp` int(10) unsigned NOT NULL,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_sistem_log` WRITE;
/*!40000 ALTER TABLE `ak_data_sistem_log` DISABLE KEYS */;

INSERT INTO `ak_data_sistem_log` (`id`, `ip_address`, `timestamp`, `data`)
VALUES
	('gkf8b41fhicdga85kd4davfn4huqkl94','::1',1548003125,X'5F5F63695F6C6173745F726567656E65726174657C693A313534383030333038333B69647C733A31373A225553523139303131373030303030303031223B6E616D617C733A363A224D6173746572223B6C6576656C7C733A363A224D6173746572223B637265617465647C733A31393A22323031392D30312D31372030303A30303A3030223B6170706E616D657C733A383A22452D5241504F5254223B4C6F67676564496E7C623A313B'),
	('mhheoothg6fbfo7aljuumibo9uulnpgb','::1',1547784531,X'5F5F63695F6C6173745F726567656E65726174657C693A313534373738343533313B'),
	('qc1a0u1utgq23l3mfgr5h8cqsauo7tsk','::1',1547782221,X'5F5F63695F6C6173745F726567656E65726174657C693A313534373738323231303B'),
	('vo2mbvlj8hm8fnkvlq9ge21hgnpjtdrs','::1',1547748483,X'5F5F63695F6C6173745F726567656E65726174657C693A313534373734383238383B69647C733A31343A225553523139303131373030303031223B6E616D617C733A363A224D6173746572223B6C6576656C7C733A363A224D6173746572223B637265617465647C733A31393A22323031392D30312D31372030303A30303A3030223B6170706E616D657C733A383A22452D5241504F5254223B4C6F67676564496E7C623A313B');

/*!40000 ALTER TABLE `ak_data_sistem_log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_siswa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_siswa`;

CREATE TABLE `ak_data_siswa` (
  `siswa_id` char(20) NOT NULL DEFAULT '',
  `user_id` char(20) NOT NULL DEFAULT '',
  `kelas_id` char(20) NOT NULL DEFAULT '',
  `siswa_nama` varchar(128) NOT NULL DEFAULT '',
  `jenis_kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `tempat_lahir` varchar(128) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(128) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` char(18) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`siswa_id`),
  KEY `user_id` (`user_id`),
  KEY `kelas_id` (`kelas_id`),
  CONSTRAINT `ak_data_siswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `ak_data_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ak_data_siswa_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `ak_data_kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `ak_data_siswa` WRITE;
/*!40000 ALTER TABLE `ak_data_siswa` DISABLE KEYS */;

INSERT INTO `ak_data_siswa` (`siswa_id`, `user_id`, `kelas_id`, `siswa_nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `telepon`, `deleted`)
VALUES
	('STU190120000001','USR20190120000003','KLS190120000001','Winda M','Wanita','Garut Maybe?','2019-01-20','ISLAM','I don\'t know','0',0);

/*!40000 ALTER TABLE `ak_data_siswa` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_tahun_ajaran
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_tahun_ajaran`;

CREATE TABLE `ak_data_tahun_ajaran` (
  `tahun_ajaran_id` char(20) NOT NULL DEFAULT '',
  `tahun_ajaran` char(10) NOT NULL DEFAULT '',
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Tidak Aktif',
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`tahun_ajaran_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `ak_data_tahun_ajaran` WRITE;
/*!40000 ALTER TABLE `ak_data_tahun_ajaran` DISABLE KEYS */;

INSERT INTO `ak_data_tahun_ajaran` (`tahun_ajaran_id`, `tahun_ajaran`, `status`, `deleted`)
VALUES
	('TA190120000001','2018/2019','Aktif',0);

/*!40000 ALTER TABLE `ak_data_tahun_ajaran` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_user`;

CREATE TABLE `ak_data_user` (
  `user_id` char(20) NOT NULL DEFAULT '',
  `level_id` char(20) NOT NULL DEFAULT '',
  `user_nama` varchar(128) NOT NULL DEFAULT '',
  `user_login` char(20) NOT NULL DEFAULT '',
  `user_pass` varchar(60) NOT NULL DEFAULT '',
  `last_login` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`),
  KEY `level_id` (`level_id`),
  CONSTRAINT `ak_data_user_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `ak_data_user_level` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `ak_data_user` WRITE;
/*!40000 ALTER TABLE `ak_data_user` DISABLE KEYS */;

INSERT INTO `ak_data_user` (`user_id`, `level_id`, `user_nama`, `user_login`, `user_pass`, `last_login`, `created_date`, `deleted`)
VALUES
	('USR19011700000001','LVL19011700001','Master','master','$2y$10$pecyvbJsq/UFRqr7giyiOOG1YuIy5qMztsZWCLwHhKXkKV8IQvVUe','2019-01-20 23:30:12','2019-01-17 00:00:00',0),
	('USR20190120000002','LVL19011700002','Gilang Pratama Priadi','USR20190120000002','$2y$10$.S.CLs2kjiJg5h1eoHc5Denx5KBrKVAFixN9zolC5YawRGv877s06','2019-01-20 22:17:55','2019-01-20 22:16:47',0),
	('USR20190120000003','LVL19011700003','Winda M','USR20190120000003','$2y$10$I4B2qL8w8xzyX9jD.xKKUutwU.sbCX34zGl4kUzWbK2v8qpWJ./Zi',NULL,'2019-01-20 22:25:04',0);

/*!40000 ALTER TABLE `ak_data_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_user_level
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_user_level`;

CREATE TABLE `ak_data_user_level` (
  `level_id` char(20) NOT NULL DEFAULT '',
  `level_nama` varchar(128) NOT NULL DEFAULT '',
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `ak_data_user_level` WRITE;
/*!40000 ALTER TABLE `ak_data_user_level` DISABLE KEYS */;

INSERT INTO `ak_data_user_level` (`level_id`, `level_nama`, `deleted`)
VALUES
	('LVL19011700001','Master',0),
	('LVL19011700002','Guru',0),
	('LVL19011700003','Siswa',0);

/*!40000 ALTER TABLE `ak_data_user_level` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
