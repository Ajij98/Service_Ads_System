-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2021-02-25 23:08:49
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for service_ads_system
DROP DATABASE IF EXISTS `service_ads_system`;
CREATE DATABASE IF NOT EXISTS `service_ads_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `service_ads_system`;


-- Dumping structure for table service_ads_system.tb_admin
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `admin_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_phone` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_image` varchar(255) DEFAULT NULL,
  `verified` int(11) DEFAULT '0',
  `admin_verification_code` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='admin_username,admin_email,admin_phone,admin_password,admin_image,verified,admin_verification_code,entry_time';

-- Dumping data for table service_ads_system.tb_admin: ~0 rows (approximately)
DELETE FROM `tb_admin`;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` (`admin_id`, `admin_username`, `admin_email`, `admin_phone`, `admin_password`, `admin_image`, `verified`, `admin_verification_code`, `entry_time`) VALUES
	(1, 'armunh53', 'armunh53@gmail.com', '01846110699', 'f62f673a215edb9b2ae5031aabd2badf', 'admin_images/a048c98b0b1ae8d0b33f433ca5d49aab1048441.png', 1, '8b4aac5b4d2897fbe181597cead8a78a', '2021-02-11 09:58:37'),
	(2, 'arman', 'armanuddin@gmail.com', '01852451468', '123', 'admin_images/c40be8dd00793084e962cc53a7b83bf3291379.png', 1, NULL, '2021-02-25 21:52:10');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;


-- Dumping structure for table service_ads_system.tb_upload_ads
DROP TABLE IF EXISTS `tb_upload_ads`;
CREATE TABLE IF NOT EXISTS `tb_upload_ads` (
  `ad_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ad_title` varchar(255) DEFAULT NULL,
  `ad_category` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `ad_fixed_price_or_not` varchar(255) DEFAULT NULL,
  `ad_price` double DEFAULT NULL,
  `ad_brand_name` varchar(255) DEFAULT NULL,
  `ad_description` varchar(255) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `ad_image` varchar(255) DEFAULT NULL,
  `upload_date` varchar(255) DEFAULT NULL,
  `ad_status` int(11) DEFAULT '0',
  `u_name` varchar(100) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COMMENT='ad_title,ad_category,area,ad_fixed_price_or_not,ad_price,ad_brand_name,ad_description,ad_image';

-- Dumping data for table service_ads_system.tb_upload_ads: ~18 rows (approximately)
DELETE FROM `tb_upload_ads`;
/*!40000 ALTER TABLE `tb_upload_ads` DISABLE KEYS */;
INSERT INTO `tb_upload_ads` (`ad_id`, `ad_title`, `ad_category`, `area`, `ad_fixed_price_or_not`, `ad_price`, `ad_brand_name`, `ad_description`, `product_code`, `ad_image`, `upload_date`, `ad_status`, `u_name`, `entry_time`) VALUES
	(1, 'Redmi Note 9 Pro', 'Mobiles', 'New Market', 'YES', 18500, 'Shawmi', 'Official Product', '32ea83776f1b4d628a2e9371aab9107c', 'ad_images/c4b229dff1e082694a14cb7393789855Redmi Note 9 Pro.jpg', NULL, 1, 'salman', '2021-01-16 15:13:16'),
	(3, 'BMW X15', 'Vehicle', 'New Market', 'YES', 25000000, 'BMW', 'This is our signature product.', '41ac9bb2ea7ecf26ff169031b3f06953', 'ad_images/da76279e1300e134927a551dfca0a057car.jpg', NULL, 1, 'salman', '2021-01-16 15:33:25'),
	(8, 'Yamaha MT 15 ', 'Vehicle', 'Agrabad', 'YES', 394000, 'YAMAHA', 'This is an orginal Yamaha product', 'b788fde9508c2be61de4277e1043d8f5', 'ad_images/4ce76baa7d020fe4ca317bf57c254e74bike2.jpg', NULL, 1, 'salman', '2021-01-19 12:08:59'),
	(9, 'Royel Enfield 1947', 'Vehicle', 'New Market', 'NO', 500000, 'Royal Enfield', 'This is an original product.', 'e983ecb63196bebd05fbc8c2221965a2', 'ad_images/41268afc8939a6b6704916fd2886d659meteor.jpg', NULL, 1, 'salman', '2021-01-19 12:11:35'),
	(10, 'Rolax curran', 'Watch', 'New Market', 'YES', 1250, 'Rolax', 'This is an original product.', '9f25df62ea59c4ea4b005d0efe03006f', 'ad_images/b3f730e6819b734809b623b202ba18f0Rolax.jpg', NULL, 1, 'salman', '2021-01-19 12:13:21'),
	(11, 'Timex 105', 'Watch', 'Agrabad', 'NO', 1590, 'Timex', 'This is an original product', 'c508a65e8209f5809278d17e1a6d4ea7', 'ad_images/1db929ffc27f3d7cfcd5068f8e28de75curren.jpg', NULL, 1, 'salman', '2021-01-19 12:14:50'),
	(12, 'Commercial Flat', 'House', 'Agrabad', 'YES', 22500, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, perspiciatis.', 'd1dd96fb3d3c2a5ba233728de356dd32', 'ad_images/fdc897ead2f2df63af5d28539685f614flat2.jpeg', NULL, 1, 'salman', '2021-01-19 12:17:00'),
	(13, 'Living House', 'House', 'New Market', 'YES', 25000, '', '4 bed room, 1 drawing room, 1 dyning room, 3 wash room, 1 kitchen room', '2465025e27fdd4c4d0b9a3bd32635831', 'ad_images/1bb0536090aa85185a9b3bdd9739ef28flat1.jpg', NULL, 1, 'salman', '2021-01-19 12:18:56'),
	(14, '1+ Plus', 'Mobiles', 'New Market', 'YES', 32500, '1+ Plus', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, perspiciatis.', '753e20ad09f12e012614686424f9d029', 'ad_images/d765fd9f3eda6529a4514ef946e7c04a1+.jpg', NULL, 1, 'salman', '2021-01-19 12:20:16'),
	(17, 'Office Flat', 'House', 'New Market', 'NO', 50000, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, consequatur.', '2cf57d9a0c428d8d165797cf6a3f7238', 'ad_images/6c848fea61b7ffb9cbae42cefba5885cslide-3.jpg', NULL, 1, 'salman', '2021-01-19 12:37:06'),
	(18, 'Rolax 360', 'Watch', 'Agrabad', 'YES', 2250, 'Rolax', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, consequatur.', '30e16e84997fc4eaf33a1d0c60a212ac', 'ad_images/43f51462318a5981c33893da465f1bb4watch.jpg', NULL, 1, 'salman', '2021-01-19 12:38:00'),
	(23, 'Iphone 12 back cover', 'Mobiles', 'Agrabad', 'YES', 1250, 'IPhone Cover', 'thfjghgjh hggh jhghg yuk', '62b77956310212e0047f391648312777', 'ad_images/392edc7f35601baa79f135793ae0241ciphone coer.jpg', NULL, 1, 'b', '2021-01-20 16:13:21'),
	(24, 'Samsung S20', 'Mobiles', 'New Market', 'NO', 90000, 'Samsung', 'We are giving the best products.', '220681e5a310fd2ccacd0d614c29140a', 'ad_images/c1fa08ca4ec193f7188aced5af4c445fSamsung S20.jpg', NULL, 1, 'salman', '2021-01-16 15:36:50'),
	(25, 'a', 'Mobiles', 'Agrabad', 'YES', 10, 'a', 'a', 'dd53249ece9cc3fb9959d3b88634505c', 'ad_images/6d51191f40706d25bf7567ba81cd250cMI A2 Lite.jpg', NULL, 0, 'salman', '2021-02-24 10:44:03'),
	(26, 'b', 'Mobiles', 'Boddarhat', 'NO', 12, 'b', 'b', 'ebe81dac975038b3aa7fd438aac1c53b', 'ad_images/62bde9b41a608bc2ac4f2d3e306cb4dfflat3.jpg', NULL, 0, 'salman', '2021-02-24 10:47:00'),
	(27, 'Nokia 1200', 'Mobiles', 'Agrabad', 'NO', 1200, 'Nokia', 'lorenjkdf jkdfjjkf jkhdf djkfhk dkfhk dfjk', '1c1563fd4bbc8c8c12b7a8e15ab3e927', 'ad_images/418cdac7288c84e199b198ab15e63782Iphone 12.jpg', NULL, 0, 'arman', '2021-02-25 13:57:45'),
	(28, 'a', 'Mobiles', 'New Market', 'YES', 10200, 'a', 'aaaaa', '7cf2d6ee0a5773d42fd7c9cb4dc27adb', 'ad_images/a86c5cab78e57fefe024ad7b69e057beRolax.jpg', NULL, 1, 'salman', '2021-02-25 14:03:12'),
	(29, 'Bike', 'Vehicle', 'Agrabad', 'NO', 1200000, 'YAMAHA', 'jhsdbf', '18fcc180290dd54b076a0ae394138768', 'ad_images/bdbb17c6c49e095fdcfd943ef5bc16f2bike1.jpg', '2021-02-25', 1, 'salman', '2021-02-25 14:16:46');
/*!40000 ALTER TABLE `tb_upload_ads` ENABLE KEYS */;


-- Dumping structure for table service_ads_system.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `user_gender` varchar(100) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_contact` varchar(50) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_birthdate` varchar(255) DEFAULT NULL,
  `user_username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `verified` int(11) DEFAULT '0',
  `user_verification_code` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table service_ads_system.tb_user: ~3 rows (approximately)
DELETE FROM `tb_user`;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`user_id`, `name`, `user_gender`, `user_email`, `user_contact`, `user_address`, `user_birthdate`, `user_username`, `user_password`, `verified`, `user_verification_code`, `entry_time`) VALUES
	(1, 'salman', 'male', 'mflooper53@gmail.com', '01872781821', 'raozan', '1998-12-11', 'b', 'f62f673a215edb9b2ae5031aabd2badf', 1, '71fecee656ddcf2892b1db626e13dfa3', '2021-02-11 10:22:54'),
	(2, 'salman', 'male', 'armunh53@gmail.com', '01872781821', 'raozan', '1998-12-11', 'a', '123', 1, '081f85609e5521b33e9eb818fdf9e108', '2021-02-11 10:23:34'),
	(3, 'Md salman', 'male', 'salman123@gmail.com', '01854745488', 'CTG', '2021-02-09', 'salman', '12345', 1, '33156908aa1a1d5c7f748219435b0605', '2021-02-25 21:35:52');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
