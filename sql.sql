-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.2.3-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for phimvui
CREATE DATABASE IF NOT EXISTS `phimvui` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `phimvui`;

-- Dumping structure for table phimvui.abouts
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` int(10) unsigned NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `provision` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rule` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.abouts: ~0 rows (approximately)
/*!40000 ALTER TABLE `abouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `abouts` ENABLE KEYS */;

-- Dumping structure for table phimvui.actors
CREATE TABLE IF NOT EXISTS `actors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.actors: ~0 rows (approximately)
/*!40000 ALTER TABLE `actors` DISABLE KEYS */;
REPLACE INTO `actors` (`id`, `fullname`, `slug`, `image`, `birthday`, `id_country`, `biography`, `created_at`, `updated_at`) VALUES
	(1, 'Lý Hùng', 'ly-hung', 'BWzY_1.jpg', '2018-07-10', '3', 'Lý Hùng quê ở Việt Nam', '2018-07-25 14:17:46', '2018-07-25 14:17:46');
/*!40000 ALTER TABLE `actors` ENABLE KEYS */;

-- Dumping structure for table phimvui.actor_film
CREATE TABLE IF NOT EXISTS `actor_film` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `actor_id` int(10) unsigned NOT NULL,
  `film_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `actor_films_actor_id_foreign` (`actor_id`),
  KEY `actor_films_film_id_foreign` (`film_id`),
  CONSTRAINT `actor_film_actor_id_foreign` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `actor_film_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.actor_film: ~0 rows (approximately)
/*!40000 ALTER TABLE `actor_film` DISABLE KEYS */;
/*!40000 ALTER TABLE `actor_film` ENABLE KEYS */;

-- Dumping structure for table phimvui.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `birthday` date DEFAULT NULL,
  `avatar` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 0,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `email_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_lock_end` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.admins: ~3 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
REPLACE INTO `admins` (`id`, `username`, `email`, `fullname`, `status`, `birthday`, `avatar`, `password`, `level`, `active`, `email_token`, `time_lock_end`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'ictnews123@gmail.com', 'Cao Xuan Cuong', 1, '2018-07-17', 'avatar.png', '$2y$10$s8BS.GvGUpM6AwThpgUqMenEacYaSADdtHCKJLXGHmKl279Ens0tS', 1, 1, NULL, NULL, 'VApAy8TWzomMXIq8xyiWVPVyYNsh6dC0Tkxi5nYpmTNvmshxfwP9QRBFm1hf', '2018-07-17 15:26:13', '2018-07-25 17:04:48'),
	(3, 'editor2', 'editor2@gmail.com', 'Editer 2', 1, '2018-07-17', 'avatar.jpg', '$2y$10$s8BS.GvGUpM6AwThpgUqMenEacYaSADdtHCKJLXGHmKl279Ens0tS', 3, 1, NULL, NULL, 'hM5At6lhKbNFXm4OhVh95AVzVoFc2RIAAaYKmdhEXBTF31pmN91l8tYF3Buo', '2018-07-17 15:26:13', '2018-07-26 07:45:53'),
	(6, NULL, 'cuongcx10@gmail.com', 'Họ Và Tên', 1, NULL, NULL, '$2y$10$jR5oE8pvAX7UGGTqHn364.v9/LsiK4UJuukGacogFLlvYCIijPWQq', 0, 0, 'Y3VvbmdjeDEwQGdtYWlsLmNvbQ==', NULL, '5shmhZahz8H7rUlQKFPKYiIHtcGDVVVUhMvTFnFN82LVBuRkYjTl5JQ6fpXh', '2018-07-26 21:47:04', '2018-07-26 21:47:04');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table phimvui.admin_role
CREATE TABLE IF NOT EXISTS `admin_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_role_admin_id_foreign` (`admin_id`),
  KEY `admin_role_role_id_foreign` (`role_id`),
  CONSTRAINT `admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `admin_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.admin_role: ~11 rows (approximately)
/*!40000 ALTER TABLE `admin_role` DISABLE KEYS */;
REPLACE INTO `admin_role` (`id`, `admin_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(44, 1, 4, NULL, NULL),
	(45, 1, 6, NULL, NULL),
	(59, 1, 2, NULL, NULL),
	(62, 1, 20, NULL, NULL),
	(108, 1, 1, NULL, NULL),
	(109, 1, 5, NULL, NULL),
	(111, 1, 35, NULL, NULL),
	(113, 1, 34, NULL, NULL),
	(114, 1, 11, NULL, NULL),
	(115, 1, 13, NULL, NULL),
	(116, 1, 36, NULL, NULL);
/*!40000 ALTER TABLE `admin_role` ENABLE KEYS */;

-- Dumping structure for table phimvui.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.categories: ~25 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
REPLACE INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
	(5, 'Âm nhạc', 'am-nhac', 'Các phim về thể loại âm nhạc', '2018-07-17 03:00:00', '2018-07-24 15:12:26'),
	(14, 'Anime', 'anime', 'Các thể loại phim anime', '2018-07-05 19:53:19', '2018-07-24 15:13:54'),
	(17, 'Bí ẩn', 'bi-an', 'Các thể loại phim bí ẩn', '2018-07-05 19:55:59', '2018-07-24 15:14:37'),
	(18, 'Chiến tranh', 'chien-tranh', 'Các phim về đề tài chiến tranh', '2018-07-05 19:56:39', '2018-07-24 15:14:59'),
	(19, 'Đam mỹ - Bách hợp', 'dam-my-bach-hop', 'Các phim về đam mỹ - bách hợp', '2018-07-05 19:57:19', '2018-07-24 15:15:50'),
	(21, 'Gia đình', 'gia-dinh', 'Các phim về gia đình', '2018-07-05 20:00:33', '2018-07-24 15:16:13'),
	(23, 'Giả tưởng - Thần thoại', 'gia-tuong-than-thoai', 'Các phim về giả tưởng, thần thoại', '2018-07-11 10:35:53', '2018-07-24 15:16:57'),
	(24, 'Giật gân', 'giat-gan', 'Các phim về đề tài giật gân', '2018-07-11 10:36:07', '2018-07-24 15:17:27'),
	(26, 'Hành động', 'hanh-dong', 'Các phim về thể loại hành động', '2018-07-11 10:36:26', '2018-07-24 15:18:13'),
	(27, 'Hình sự', 'hinh-su', 'Các phim về đề tài hình sự', '2018-07-11 10:36:42', '2018-07-24 15:18:37'),
	(28, 'TV Show', 'tv-show', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.', '2018-07-11 10:42:02', '2018-07-11 10:42:02'),
	(30, 'Hoạt hình', 'hoat-hinh', 'Các phim hoạt hình', '2018-07-24 15:19:28', '2018-07-24 15:19:28'),
	(31, 'Khoa học - Tài liệu', 'khoa-hoc-tai-lieu', 'Các phim về khoa học và phim tài liệu', '2018-07-24 15:19:57', '2018-07-24 15:19:57'),
	(32, 'Khoa học viễn tưỡng', 'khoa-hoc-vien-tuong', 'Các phim về khoa học viễn tưởng', '2018-07-24 15:20:23', '2018-07-24 15:20:23'),
	(33, 'Kiếm hiệp - Cổ trang', 'kiem-hiep-co-trang', 'Các phim về kiếm hiệp và phim cổ trang', '2018-07-24 15:20:48', '2018-07-24 15:20:48'),
	(34, 'Kinh dị', 'kinh-di', 'Các phim kinh dị', '2018-07-24 15:21:03', '2018-07-24 15:21:03'),
	(35, 'Phiêu lưu', 'phieu-luu', 'Các phim phiêu lưu', '2018-07-24 15:21:24', '2018-07-24 15:21:24'),
	(36, 'Tâm lý', 'tam-ly', 'Các phim tâm lý', '2018-07-24 15:21:39', '2018-07-24 15:21:39'),
	(37, 'Thanh xuân - Học đường', 'thanh-xuan-hoc-duong', 'Các phim về học đường', '2018-07-24 15:22:00', '2018-07-24 15:22:00'),
	(38, 'Thể thao', 'the-thao', 'Các phim về thể thao', '2018-07-24 15:22:19', '2018-07-24 15:22:19'),
	(39, 'Thời trang', 'thoi-trang', 'Các phim về thời trang', '2018-07-24 15:22:36', '2018-07-24 15:22:36'),
	(40, 'Tình cảm - Lãng mạn', 'tinh-cam-lang-man', 'Các phim về tình cảm', '2018-07-24 15:23:14', '2018-07-24 15:23:14'),
	(41, 'Viễn tây', 'vien-tay', 'Các phim về viễn Tây', '2018-07-24 15:23:32', '2018-07-24 15:23:32'),
	(42, 'Truyền hình thực tế', 'truyen-hinh-thuc-te', 'Các phim về đề tài thực tế', '2018-07-24 15:23:52', '2018-07-24 15:23:52'),
	(43, 'Phim hài', 'phim-hai', 'Các thể loại phim hài hước', '2018-07-25 09:36:53', '2018-07-25 09:36:53');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table phimvui.category_film
CREATE TABLE IF NOT EXISTS `category_film` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `film_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_films_category_id_foreign` (`category_id`),
  KEY `category_films_film_id_foreign` (`film_id`),
  CONSTRAINT `category_film_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `category_film_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.category_film: ~2 rows (approximately)
/*!40000 ALTER TABLE `category_film` DISABLE KEYS */;
REPLACE INTO `category_film` (`id`, `category_id`, `film_id`, `created_at`, `updated_at`) VALUES
	(1, 26, 33, NULL, NULL),
	(2, 34, 33, NULL, NULL);
/*!40000 ALTER TABLE `category_film` ENABLE KEYS */;

-- Dumping structure for table phimvui.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `film_id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feedback` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_film_id_foreign` (`film_id`),
  KEY `comments_customer_id_foreign` (`customer_id`),
  CONSTRAINT `comments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.comments: ~0 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table phimvui.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `countries_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.countries: ~13 rows (approximately)
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
REPLACE INTO `countries` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(2, 'Hàn Quốc', 'han-quoc', '2018-07-07 17:00:00', '2018-07-21 17:00:00'),
	(3, 'Việt Nam', 'viet-nam', '2018-07-07 17:00:00', '2018-07-17 17:00:00'),
	(4, 'Trung Quốc', 'trung-quoc', '2018-07-10 17:00:00', '2018-07-17 17:00:00'),
	(5, 'Thái lan', 'thai-lan', '2018-07-17 17:00:00', '2018-07-25 17:00:00'),
	(6, 'Singapo', 'singapo', '2018-07-10 17:00:00', '2018-07-20 17:00:00'),
	(7, 'Mỹ', 'my', '2018-07-17 17:00:00', '2018-07-24 16:45:40'),
	(8, 'Nhật Bản', 'nhat-ban', '2018-07-24 16:45:23', '2018-07-24 16:45:23'),
	(10, 'Pháp', 'phap', '2018-07-27 10:19:00', '2018-07-27 10:19:00'),
	(11, 'Tây Ban Nha', 'tay-ban-nha', '2018-07-27 10:19:09', '2018-07-27 10:19:09'),
	(12, 'Đài Loan', 'dai-loan', '2018-07-27 10:19:19', '2018-07-27 10:19:19'),
	(13, 'Hồng Kông', 'hong-kong', '2018-07-27 10:19:58', '2018-07-27 10:19:58'),
	(14, 'Anh', 'anh', '2018-07-27 10:20:06', '2018-07-27 10:20:06'),
	(15, 'Chưa có thông tin', 'chua-co-thong-tin', '2018-07-27 10:59:56', '2018-07-27 10:59:56');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;

-- Dumping structure for table phimvui.country_film
CREATE TABLE IF NOT EXISTS `country_film` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `film_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_films_country_id_foreign` (`country_id`),
  KEY `country_films_film_id_foreign` (`film_id`),
  CONSTRAINT `country_film_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `country_film_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.country_film: ~0 rows (approximately)
/*!40000 ALTER TABLE `country_film` DISABLE KEYS */;
/*!40000 ALTER TABLE `country_film` ENABLE KEYS */;

-- Dumping structure for table phimvui.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `time_lock_end` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_username_unique` (`username`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.customers: ~4 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
REPLACE INTO `customers` (`id`, `username`, `email`, `fullname`, `birthday`, `avatar`, `password`, `status`, `time_lock_end`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'user1', 'user1@gmail.com', 'Hello', '2018-07-19', '6.jpg', '123123', 1, NULL, NULL, '2018-07-19 18:52:14', '2018-07-19 18:52:14'),
	(2, 'user2', 'user2@gmail.com', 'Hello', '2018-07-19', '6.jpg', '123123', 1, NULL, NULL, '2018-07-19 18:52:14', '2018-07-26 09:11:54'),
	(3, 'user3', 'user3@gmail.com', 'Hello', '2018-07-19', '6.jpg', '123123', 1, NULL, NULL, '2018-07-19 18:52:14', '2018-07-19 18:52:14'),
	(5, 'cuongcx10', 'cuongcx10@gmail.com', 'cuong', '0011-11-11', '6.jpg', '$2y$10$..U1jMzdX9IDEjVodi0R.e2CLVgNtJS/Eq87JrdR.1yAu1WEccAI2', 1, NULL, '3L2RcwJELuwiYqHANvRB6J8ya5GSlHdZ9L4sgzYFbteOtrd1bfCeKr1xTMmS', '2018-07-24 10:45:07', '2018-07-24 10:45:07');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table phimvui.directors
CREATE TABLE IF NOT EXISTS `directors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.directors: ~5 rows (approximately)
/*!40000 ALTER TABLE `directors` DISABLE KEYS */;
REPLACE INTO `directors` (`id`, `fullname`, `slug`, `image`, `birthday`, `id_country`, `biography`, `created_at`, `updated_at`) VALUES
	(2, 'Lê Nguyễn  Quyền', 'le-nguyen-quyen', '7wLC_avata2.jpg', '1993-12-26', '6', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2018-07-10 01:33:27', '2018-07-10 01:52:02'),
	(3, 'Trần A A', 'tran-a-a', 'BzUe_avata5t.jpg', '2018-07-18', '5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2018-07-10 01:35:03', '2018-07-10 14:04:11'),
	(5, 'Lê Thùy Dương', 'le-thuy-duong', 'wBYx_avata3.jpg', '2018-07-18', '5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '2018-07-10 14:05:12', '2018-07-10 14:05:12'),
	(6, 'Trâm Anh', 'tram-anh', 'fh8J_avata3.jpg', '2018-07-18', '7', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.', '2018-07-11 11:20:44', '2018-07-11 11:20:44'),
	(7, 'Lê Nguyễn  Quyền 66', 'le-nguyen-quyen-66', 'VRtx_avata.jpg', '2018-07-18', '2', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.', '2018-07-11 11:22:43', '2018-07-11 11:22:43');
/*!40000 ALTER TABLE `directors` ENABLE KEYS */;

-- Dumping structure for table phimvui.director_film
CREATE TABLE IF NOT EXISTS `director_film` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `director_id` int(10) unsigned NOT NULL,
  `film_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `director_films_director_id_foreign` (`director_id`),
  KEY `director_films_film_id_foreign` (`film_id`),
  CONSTRAINT `director_film_director_id_foreign` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `director_film_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.director_film: ~0 rows (approximately)
/*!40000 ALTER TABLE `director_film` DISABLE KEYS */;
/*!40000 ALTER TABLE `director_film` ENABLE KEYS */;

-- Dumping structure for table phimvui.films
CREATE TABLE IF NOT EXISTS `films` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_vi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_film_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date_theater` date DEFAULT NULL,
  `quality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IMDb` double(2,1) NOT NULL,
  `company_production` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `published_year` int(11) DEFAULT NULL,
  `film_hot` tinyint(1) NOT NULL,
  `film_cinema` tinyint(1) NOT NULL,
  `film_type` tinyint(4) NOT NULL,
  `admin_id` int(10) unsigned NOT NULL,
  `total_episodes` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_slide` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `films_title_vi_unique` (`title_vi`),
  UNIQUE KEY `films_title_en_unique` (`title_en`),
  KEY `films_admin_id_foreign` (`admin_id`),
  CONSTRAINT `films_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.films: ~1 rows (approximately)
/*!40000 ALTER TABLE `films` DISABLE KEYS */;
REPLACE INTO `films` (`id`, `title_vi`, `slug`, `parent_film_id`, `title_en`, `img_thumbnail`, `img_background`, `description`, `time`, `status`, `date_theater`, `quality`, `resolution`, `IMDb`, `company_production`, `view_count`, `published_year`, `film_hot`, `film_cinema`, `film_type`, `admin_id`, `total_episodes`, `active_slide`, `created_at`, `updated_at`) VALUES
	(33, 'Xác Sống', 'xac-song', '0', 'Zombies (2017)', '2018-07/cd6291f6ef2f80b7d34b5c725d419c22.jpg', '2018-07/01e33231691d61b9a10e57904283b4d8.jpg', 'Zombies (Xác Sống): Khi thế giới đang ở trong tình trạng hỗn loạn, bị đe doạ bởi một ổ dịch zombie, chỉ có người mạnh sẽ sống sót, nhưng sẽ cần bao nhiêu quyết tâm? Liệu Luke và phi hành đoàn có đủ tham vọng và đạn dược để sống sót đủ lâu nhằm cứu vớt loài người hay không?', 50, 0, '2017-01-11', 'HD', '720', 9.0, 'N/A', 0, 2017, 1, 1, 0, 1, NULL, 0, '2018-07-27 10:12:09', '2018-07-27 10:12:09');
/*!40000 ALTER TABLE `films` ENABLE KEYS */;

-- Dumping structure for table phimvui.film_language
CREATE TABLE IF NOT EXISTS `film_language` (
  `id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  `film_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `film_language_film_id_foreign` (`film_id`),
  KEY `film_language_language_id_foreign` (`language_id`),
  CONSTRAINT `film_language_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`),
  CONSTRAINT `film_language_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.film_language: ~0 rows (approximately)
/*!40000 ALTER TABLE `film_language` DISABLE KEYS */;
/*!40000 ALTER TABLE `film_language` ENABLE KEYS */;

-- Dumping structure for table phimvui.film_tag
CREATE TABLE IF NOT EXISTS `film_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `film_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `film_tags_film_id_foreign` (`film_id`),
  KEY `film_tags_tag_id_foreign` (`tag_id`),
  CONSTRAINT `film_tag_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `film_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.film_tag: ~1 rows (approximately)
/*!40000 ALTER TABLE `film_tag` DISABLE KEYS */;
REPLACE INTO `film_tag` (`id`, `film_id`, `tag_id`, `created_at`, `updated_at`) VALUES
	(2, 33, 3, NULL, NULL);
/*!40000 ALTER TABLE `film_tag` ENABLE KEYS */;

-- Dumping structure for table phimvui.languages
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.languages: ~2 rows (approximately)
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
REPLACE INTO `languages` (`id`, `language`, `slug`, `created_at`, `updated_at`) VALUES
	(5, 'Thuyết Minh', 'thuyet-minh', '2018-07-08 00:00:00', '2018-07-24 16:46:20'),
	(7, 'Phụ đề', 'phu-de', '2018-07-18 00:00:00', '2018-07-26 00:00:00');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;

-- Dumping structure for table phimvui.link_films
CREATE TABLE IF NOT EXISTS `link_films` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `film_id` int(10) unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `link_films_film_id_foreign` (`film_id`),
  CONSTRAINT `link_films_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.link_films: ~0 rows (approximately)
/*!40000 ALTER TABLE `link_films` DISABLE KEYS */;
/*!40000 ALTER TABLE `link_films` ENABLE KEYS */;

-- Dumping structure for table phimvui.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.migrations: ~1 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table phimvui.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table phimvui.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.roles: ~11 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
REPLACE INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Thêm phim mới', 'them-phim-moi', 'Có thể thêm phim mới', '2018-07-17 22:05:29', '2018-07-19 04:57:49'),
	(2, 'Sửa phim', 'sua-phim', 'Có thể sửa phim', '2018-07-17 22:05:29', '2018-07-19 04:56:05'),
	(4, 'Xóa phim', 'xoa-phim', 'Có thể xóa phim', '2018-07-17 22:05:29', '2018-07-19 04:53:25'),
	(5, 'Xem thông tin phim', 'xem-thong-tin-phim', 'Có thể xem thông tin', '2018-07-17 22:05:29', '2018-07-25 09:18:28'),
	(6, 'Quản lý thành viên quản trị', 'quan-ly-thanh-vien-quan-tri', 'Có thể thêm, cấp quyền, xem thông tin, khóa, mở khóa và xóa tài khoản thành viên quản trị', '2018-07-17 22:05:29', '2018-07-19 05:03:56'),
	(11, 'Quản lý khách đăng nhập', 'quan-ly-khach-dang-nhap', 'Có thể xóa hoặc khóa tài khoản khách đăng nhập', '2018-07-17 22:10:32', '2018-07-19 05:01:14'),
	(13, 'Quản lý bình luận', 'quan-ly-binh-luan', 'Quản lý bình luận của khách đăng nhập như duyệt và xóa bình luận', '2018-07-17 22:11:31', '2018-07-19 05:00:31'),
	(20, 'Duyệt phim', 'duyet-phim', 'Có thể duyệt các phim khi post lên', '2018-07-18 22:38:24', '2018-07-25 09:15:03'),
	(34, 'Quản lý danh mục phim', 'quan-ly-danh-muc-phim', 'Quản lý các quyền như thêm, sửa, xóa danh mục phim', '2018-07-19 04:29:09', '2018-07-19 04:29:09'),
	(35, 'Quản lý phân quyền quản trị', 'quan-ly-phan-quyen-quan-tri', 'Thêm, chỉnh sửa quyền quản trị', '2018-07-19 05:06:02', '2018-07-19 05:25:57'),
	(36, 'Quản lý các danh mục khác', 'quan-ly-cac-danh-muc-khac', 'Quản lý các danh mục link phim, thẻ tags, quốc gia, ngôn ngữ, diễn viên, đạo diễn', '2018-07-19 05:07:27', '2018-07-19 05:07:27');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table phimvui.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table phimvui.tags: ~1 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
REPLACE INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'phimvui2', 'phimvui', '2018-07-25 10:15:02', '2018-07-25 10:16:21'),
	(2, 'bồ già', 'bo-gia', '2018-07-26 21:59:18', '2018-07-26 21:59:18'),
	(3, 'N/A', 'na', '2018-07-27 10:12:10', '2018-07-27 10:12:10');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
