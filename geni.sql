-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table test.gen_0101_user
DROP TABLE IF EXISTS `gen_0101_user`;
CREATE TABLE IF NOT EXISTS `gen_0101_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_company` varchar(100) DEFAULT NULL,
  `user_typecompany` varchar(50) DEFAULT NULL,
  `user_addresscompany` longtext,
  `user_timecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_tokenrest` varchar(100) DEFAULT NULL,
  `user_isactive` tinyint(4) DEFAULT '0',
  `user_isadmin` tinyint(4) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table test.gen_0101_user: ~5 rows (approximately)
DELETE FROM `gen_0101_user`;
/*!40000 ALTER TABLE `gen_0101_user` DISABLE KEYS */;
INSERT INTO `gen_0101_user` (`id`, `password`, `user_email`, `user_name`, `user_company`, `user_typecompany`, `user_addresscompany`, `user_timecreated`, `user_tokenrest`, `user_isactive`, `user_isadmin`, `deleted_at`) VALUES
	(1, '$2y$10$Jc0.Gh0QGvAgBWOwW6n4huDt8GE5KnetIrQ/.kXNc2hTOg1QXvYeW', 'nanda@gmail.com', 'nanda2', 'tahu gejrot', 'perorangan', 'jl.kenangan', '2016-07-29 03:02:51', NULL, 1, 1, NULL),
	(2, '$2y$10$EQBwm7BfhBcVku00USO0DuiQ2qUAFSitf4UTf0NiTMT9v3/r/VYWa', 'imam@gmail.com', 'imam2', 'beras ketan', 'perorangan', 'jalan kangkung', '2016-07-29 03:03:27', NULL, 1, 0, NULL),
	(5, '$2y$10$gnZNOZCjgSKZCo5ks0Wi1OsQ2FCFhpmXwsqXgt.RI2JBAJ3lSUqX6', 'coba@gmail.com', 'coba1', 'kacang bakar', 'perorangan', 'jl. bakar bakar', '2016-07-29 04:17:43', '$2y$10$M9UXN/gCk8XSu08pqUX4K.L9EjyZC9FadeQFtgB7n969dlDLsSRLC', 0, 0, NULL),
	(6, '$2y$10$lMBLbcWVueaeJcLN7f.Do.I9X5Wp4FIMK4YwHNoigmHB9L6n3z.EK', 'danzel@gmail.com', 'danzel kurniawan', 'cups inc.', 'dota', 'middle tower', '2016-08-04 14:38:59', '$2y$10$PgyjNt.V1VXDxdKVCsxZ8OlNAvepIqvTbSevjoXqwIechDqzHunX.', 0, 0, NULL),
	(7, '$2y$10$EYs23E8wrECttWoO.clCkunVlV5nypcWpId3Sg5DA4V7XHnJEkbJW', 'terong@gmail.com', 'terong goreng', 'temp', 'perorangan', 'jlkjlkasdf', '2016-08-04 15:13:54', '$2y$10$CwYwFAZzGV/80f1wUgfEluzOBjkJuVRXpUZD1rif7qLTIw7J55qny', 0, 0, NULL);
/*!40000 ALTER TABLE `gen_0101_user` ENABLE KEYS */;


-- Dumping structure for table test.gen_0102_payment
DROP TABLE IF EXISTS `gen_0102_payment`;
CREATE TABLE IF NOT EXISTS `gen_0102_payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_username` varchar(50) DEFAULT NULL,
  `payment_email` varchar(100) DEFAULT NULL,
  `payment_bank` varchar(50) DEFAULT NULL,
  `payment_description` longtext,
  `payment_isconfirmed` tinyint(4) DEFAULT NULL,
  `payment_payslip` varchar(100) DEFAULT NULL,
  `payment_timecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table test.gen_0102_payment: ~2 rows (approximately)
DELETE FROM `gen_0102_payment`;
/*!40000 ALTER TABLE `gen_0102_payment` DISABLE KEYS */;
INSERT INTO `gen_0102_payment` (`payment_id`, `payment_username`, `payment_email`, `payment_bank`, `payment_description`, `payment_isconfirmed`, `payment_payslip`, `payment_timecreated`) VALUES
	(1, 'renanda', 're@mail.com', 'BNI', 'untuk bayar utang', 1, '1234', '2016-08-08 13:48:42'),
	(2, 'izar', 'iz@mail.com', 'BRI', 'bayar makan', 1, '1235', '2016-08-08 13:49:15');
/*!40000 ALTER TABLE `gen_0102_payment` ENABLE KEYS */;


-- Dumping structure for table test.gen_0103_contact
DROP TABLE IF EXISTS `gen_0103_contact`;
CREATE TABLE IF NOT EXISTS `gen_0103_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(50) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `contact_subject` text,
  `contact_message` longtext,
  `contact_timecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table test.gen_0103_contact: ~6 rows (approximately)
DELETE FROM `gen_0103_contact`;
/*!40000 ALTER TABLE `gen_0103_contact` DISABLE KEYS */;
INSERT INTO `gen_0103_contact` (`contact_id`, `contact_name`, `contact_email`, `contact_subject`, `contact_message`, `contact_timecreated`, `deleted_at`) VALUES
	(1, 'ree', 'asda@gmail.com', 'fafaa', 'afafafafafa', '2016-08-09 11:51:17', NULL),
	(2, 'izar', 'sasa@gmail.com', 'asdada', '', '2016-08-09 12:17:02', '2016-08-09 12:17:01'),
	(3, 'renanda', 'rectarenanda2@gmail.com', 'coba contact', 'Assalamu\'alaykum Warahmatullohi Wabarakaatuh\r\n\r\nSelamat siang\r\nPerkenalkan saya M. Syaiful Jihad A. (5113100022) ingin mengajukan permohonan untuk bimbingan kerja praktik. Namun kelompok saya baru mendapat dosen pembimbing kemarin, dan sekarang sudah mulai kerja praktik diperusahaan BIOS-IT. Sekiranya bisa atau tidak jika bimbingan dilakukan selain hari kerja bu?\r\n\r\nTerima kasih\r\n\r\nWassalamualaykum Warahmatullohi Wabarakaatuh', '2016-08-09 12:17:32', NULL),
	(4, 'wiuwiu', 'wiwu@gmail.com', 'dadad', 'saiawkkwanfandka', '2016-07-29 13:17:02', NULL),
	(5, 'uul', 'uul@yahoo.com', 'coba', 'wiuwiuwiuwiu', '2016-08-09 11:51:17', NULL),
	(6, 'izar', 'izar@gmail.com', 'dasdasd', 'sadadadada', '2016-08-01 15:53:05', NULL);
/*!40000 ALTER TABLE `gen_0103_contact` ENABLE KEYS */;


-- Dumping structure for table test.gen_0104_news
DROP TABLE IF EXISTS `gen_0104_news`;
CREATE TABLE IF NOT EXISTS `gen_0104_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` text,
  `news_content` longtext NOT NULL,
  `news_image` varchar(100) NOT NULL,
  `news_timecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table test.gen_0104_news: ~22 rows (approximately)
DELETE FROM `gen_0104_news`;
/*!40000 ALTER TABLE `gen_0104_news` DISABLE KEYS */;
INSERT INTO `gen_0104_news` (`news_id`, `news_title`, `news_content`, `news_image`, `news_timecreated`, `deleted_at`) VALUES
	(1, 'test berita', '<p>ini adalah berita</p>\n\n<p><strong>pake bold</strong></p>\n\n<ul>\n	<li>satu</li>\n	<li>dua</li>\n</ul>\n', '', '2016-08-09 14:19:55', '2016-08-09 08:39:24'),
	(3, 'Mahakarya3', '<p>test again</p>\n', '', '2016-08-09 09:36:22', NULL),
	(5, 'test', '<p>controller baru test</p>\n', '', '2016-08-09 15:13:28', '2016-08-09 08:18:57'),
	(6, 'test2', '<p>controller baru ini</p>\n', '', '2016-08-09 15:15:32', '2016-08-09 08:17:22'),
	(7, 'test lagi', '<p>controller baru</p>\n', '', '2016-08-09 15:19:19', '2016-08-09 08:26:13'),
	(8, 'test', '<p>cek controller lagi</p>\n', '', '2016-08-09 15:26:54', '2016-08-09 08:41:34'),
	(9, 'test', '<p>lagi2</p>\n', '', '2016-08-09 15:29:03', '2016-08-09 08:31:50'),
	(10, 'test', '<p>muncul g</p>\n', '', '2016-08-09 15:32:14', '2016-08-09 09:36:02'),
	(11, 'muncul plis', '<p>data</p>\n\n<p>&nbsp;</p>\n', '', '2016-08-09 15:35:14', NULL),
	(12, 'test 7', '<p>muncul ya</p>\n', '', '2016-08-09 15:39:53', NULL),
	(13, 'test4', '<p>lagi</p>\n', '', '2016-08-09 15:40:26', '2016-08-09 08:41:21'),
	(14, 'test2', '<p>hhh</p>\n', '', '2016-08-09 15:41:06', '2016-08-09 08:51:40'),
	(15, 'hayoo', '<p>lagi</p>\n', '', '2016-08-09 15:41:52', '2016-08-09 08:51:29'),
	(16, 'input 5', '<p>beberan</p>\n', '', '2016-08-09 15:43:09', '2016-08-09 08:51:16'),
	(17, 'tes', '<p>chec</p>\n', '', '2016-08-09 15:52:34', '2016-08-09 08:55:39'),
	(18, 'bjbkj', '<p>hjgkjgkjhkj</p>\n', '', '2016-08-09 15:54:26', '2016-08-09 08:55:50'),
	(19, 'test', '<p>lagi</p>\n', '', '2016-08-09 15:57:34', NULL),
	(20, 'test oo', '<p>mana ni?</p>\n', '', '2016-08-09 16:02:08', '2016-08-09 09:06:24'),
	(21, 'test pp', '<p>laaa</p>\n', '', '2016-08-09 16:06:13', NULL),
	(22, 'tes ss', '<p>nih</p>\n', '', '2016-08-09 16:06:40', NULL),
	(23, 'coba terakhir', '<p>dan ternyata ?</p>\n', '', '2016-08-09 16:17:39', NULL),
	(24, 'test lllkk', '<p>jijiji</p>\n', '', '2016-08-09 16:37:43', NULL);
/*!40000 ALTER TABLE `gen_0104_news` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
