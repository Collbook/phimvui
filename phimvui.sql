-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2018 at 11:36 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phimvui`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `biography` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `fullname`, `slug`, `image`, `birthday`, `id_country`, `biography`, `created_at`, `updated_at`) VALUES
(1, 'Keanu Reeves', 'keanu-reeves', '', '2018-07-04', '10', 'Keanu Reeves', '2018-07-27 03:24:01', '2018-07-27 03:24:01'),
(2, 'Boris Gulyarin,', 'boris-gulyarin-', '', '2018-07-05', '10', 'Boris Gulyarin,', '2018-07-27 03:24:45', '2018-07-27 03:24:45'),
(3, 'Tony Jaa', 'tony-jaa', '', '2018-07-11', '11', 'tony jaa là diễn viên người thái', '2018-07-27 03:26:04', '2018-07-27 03:26:04'),
(4, 'Jon Hamm', 'jon-hamm', '', '2018-07-12', '10', 'Jon Hamm là diên viên gạo cội', '2018-07-27 03:33:47', '2018-07-27 03:33:47'),
(5, 'Khalid Benchagra', 'khalid-benchagra', '', '2018-07-25', '10', 'Khalid Benchagra', '2018-07-27 03:34:09', '2018-07-27 03:34:09'),
(6, 'Jay Potter', 'jay-potter', '', '2018-07-12', '10', 'Jay Potter là ngôi sao làng điện ảnh thế giới', '2018-07-27 03:34:51', '2018-07-27 03:34:51'),
(7, 'Neve Campbell', 'neve-campbell', '', '2018-07-20', '10', 'Neve Campbell là ngôi sao làng điện ảnh thế giới', '2018-07-27 03:44:37', '2018-07-27 03:44:37'),
(8, 'Park Hae Jin', 'park-hae-jin', '', '2018-07-05', '12', 'Park Hae Jin', '2018-07-27 03:49:31', '2018-07-27 03:49:31'),
(9, 'Shim Eun Kyung,', 'shim-eun-kyung-', '', '2018-07-13', '12', 'Shim Eun Kyung,', '2018-07-27 04:06:35', '2018-07-27 04:06:35'),
(10, 'Hoàng Bột', 'hoang-bot', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:03:55', '2018-07-27 07:03:55'),
(11, 'Ashley St', 'ashley-st', '', 'Chưa có thông tin', '10', 'Đang cập nhật thông tin', '2018-07-27 07:20:22', '2018-07-27 07:20:22'),
(12, 'Jeffrey Wahlberg', 'jeffrey-wahlberg', '', 'Chưa có thông tin', '10', 'Đang cập nhật thông tin', '2018-07-27 07:22:46', '2018-07-27 07:22:46'),
(13, 'Jim Gaffigan', 'jim-gaffigan', '', 'Chưa có thông tin', '10', 'Đang cập nhật thông tin', '2018-07-27 07:29:12', '2018-07-27 07:29:12'),
(14, 'Andy Nyman', 'andy-nyman', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:30:50', '2018-07-27 07:30:50'),
(15, 'Rachel Weisz', 'rachel-weisz', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:32:05', '2018-07-27 07:32:05'),
(16, 'Trần Vỹ Đình,', 'tran-vy-dinh-', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:32:59', '2018-07-27 07:32:59'),
(17, 'Chutavuth Pattarakampol', 'chutavuth-pattarakampol', '', 'Chưa có thông tin', '11', 'Đang cập nhật thông tin', '2018-07-27 07:35:04', '2018-07-27 07:35:04'),
(18, 'Marlon Wayans', 'marlon-wayans', '', 'Chưa có thông tin', '10', 'Đang cập nhật thông tin', '2018-07-27 07:37:07', '2018-07-27 07:37:07'),
(19, 'Caitlyn de Abrue', 'caitlyn-de-abrue', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:41:19', '2018-07-27 07:41:19'),
(20, 'Tưởng Lộ Hà', 'tuong-lo-ha', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:45:07', '2018-07-27 07:45:07'),
(21, 'Giang Kỳ Lâm', 'giang-ky-lam', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:54:43', '2018-07-27 07:54:43'),
(22, 'Triệu Can Cảnh', 'trieu-can-canh', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:58:29', '2018-07-27 07:58:29'),
(23, 'Frank Welker', 'frank-welker', '', 'Chưa có thông tin', '10', 'Đang cập nhật thông tin', '2018-07-27 08:01:33', '2018-07-27 08:01:33'),
(24, 'Joel Kinnaman', 'joel-kinnaman', '', 'Chưa có thông tin', '10', 'Đang cập nhật thông tin', '2018-07-27 08:08:22', '2018-07-27 08:08:22'),
(25, ' Dylan O\'Brien', '-dylan-obrien', '', 'Chưa có thông tin', '10', 'Đang cập nhật thông tin', '2018-07-27 08:14:58', '2018-07-27 08:14:58'),
(26, 'Ulrich Noethen', 'ulrich-noethen', '', 'Chưa có thông tin', '9', 'Đang cập nhật thông tin', '2018-07-27 08:22:35', '2018-07-27 08:22:35'),
(27, 'Ken`ichi Suzumura', 'ken-ichi-suzumura', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 08:23:52', '2018-07-27 08:23:52'),
(28, 'Takahiro Sakurai,', 'takahiro-sakurai-', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 08:42:12', '2018-07-27 08:42:12'),
(29, 'Takahiro Sakurai', 'takahiro-sakurai', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 08:45:26', '2018-07-27 08:45:26'),
(30, 'Mizunaka Masaaki', 'mizunaka-masaaki', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 08:49:08', '2018-07-27 08:49:08'),
(31, 'Ryuuichi Kijima', 'ryuuichi-kijima', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 08:58:09', '2018-07-27 08:58:09'),
(32, 'Kenichi Kawamura', 'kenichi-kawamura', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 09:01:39', '2018-07-27 09:01:39'),
(33, 'Kanta Satoo', 'kanta-satoo', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 09:07:20', '2018-07-27 09:07:20'),
(34, 'Hiroshi Kamiya', 'hiroshi-kamiya', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 09:15:11', '2018-07-27 09:15:11'),
(35, 'Kiyotaka Furushima', 'kiyotaka-furushima', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 09:17:20', '2018-07-27 09:17:20'),
(36, 'Yumi Hara', 'yumi-hara', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 09:20:58', '2018-07-27 09:20:58'),
(37, 'Yoshimasa Hosoya', 'yoshimasa-hosoya', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 09:23:16', '2018-07-27 09:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `actor_film`
--

CREATE TABLE `actor_film` (
  `id` int(10) UNSIGNED NOT NULL,
  `actor_id` int(10) UNSIGNED NOT NULL,
  `film_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `actor_film`
--

INSERT INTO `actor_film` (`id`, `actor_id`, `film_id`, `created_at`, `updated_at`) VALUES
(1, 23, 67, NULL, NULL),
(2, 31, 75, NULL, NULL),
(3, 17, 59, NULL, NULL),
(4, 11, 50, NULL, NULL),
(5, 12, 49, NULL, NULL),
(6, 5, 51, NULL, NULL),
(7, 7, 52, NULL, NULL),
(8, 8, 53, NULL, NULL),
(9, 1, 54, NULL, NULL),
(10, 14, 55, NULL, NULL),
(11, 1, 56, NULL, NULL),
(12, 15, 56, NULL, NULL),
(13, 16, 57, NULL, NULL),
(14, 9, 58, NULL, NULL),
(15, 18, 60, NULL, NULL),
(16, 1, 61, NULL, NULL),
(17, 7, 61, NULL, NULL),
(18, 9, 61, NULL, NULL),
(19, 10, 62, NULL, NULL),
(20, 7, 64, NULL, NULL),
(21, 20, 64, NULL, NULL),
(22, 21, 65, NULL, NULL),
(23, 25, 66, NULL, NULL),
(24, 24, 68, NULL, NULL),
(25, 25, 69, NULL, NULL),
(26, 3, 70, NULL, NULL),
(27, 4, 70, NULL, NULL),
(28, 5, 71, NULL, NULL),
(29, 7, 71, NULL, NULL),
(30, 27, 72, NULL, NULL),
(31, 28, 73, NULL, NULL),
(32, 29, 73, NULL, NULL),
(33, 30, 74, NULL, NULL),
(34, 29, 76, NULL, NULL),
(35, 33, 77, NULL, NULL),
(36, 31, 78, NULL, NULL),
(37, 34, 79, NULL, NULL),
(38, 4, 80, NULL, NULL),
(39, 6, 80, NULL, NULL),
(40, 8, 80, NULL, NULL),
(41, 36, 81, NULL, NULL),
(42, 37, 82, NULL, NULL),
(43, 4, 83, NULL, NULL),
(44, 5, 83, NULL, NULL),
(45, 2, 84, NULL, NULL),
(46, 3, 84, NULL, NULL),
(47, 4, 84, NULL, NULL),
(49, 1, 87, NULL, NULL),
(50, 2, 87, NULL, NULL),
(51, 3, 87, NULL, NULL),
(52, 3, 88, NULL, NULL),
(53, 4, 88, NULL, NULL),
(54, 5, 88, NULL, NULL),
(55, 14, 89, NULL, NULL),
(56, 15, 89, NULL, NULL),
(57, 16, 89, NULL, NULL),
(58, 17, 89, NULL, NULL),
(59, 1, 90, NULL, NULL),
(60, 3, 90, NULL, NULL),
(61, 1, 91, NULL, NULL),
(62, 5, 91, NULL, NULL),
(63, 6, 91, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `birthday` date DEFAULT NULL,
  `avatar` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `email_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_lock_end` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `fullname`, `status`, `birthday`, `avatar`, `password`, `level`, `active`, `email_token`, `time_lock_end`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'qdhv@gmail.com', 'qdhv', 1, '2018-07-17', 'avatar.jpg', '$2y$10$s8BS.GvGUpM6AwThpgUqMenEacYaSADdtHCKJLXGHmKl279Ens0tS', 1, 1, NULL, NULL, 'chXurbXdanwTiueaKLCzb8zcCZ0B5UG0iyA1meRr4JrO1SImZaoLI7KqHxT4', '2018-07-17 08:26:13', '2018-09-05 13:38:47'),
(2, 'editor1', 'editor1@gmail.com', 'Editor 1', 1, '2018-07-17', 'avatar.jpg', '$2y$10$s8BS.GvGUpM6AwThpgUqMenEacYaSADdtHCKJLXGHmKl279Ens0tS', 2, 1, NULL, NULL, '3t5HcySj9GvocjFj8QtM8HcCrXmMV9d7Rs6oFAAeQDd8mtWSq2ZEzX2qKqfG', '2018-07-17 08:26:13', '2018-07-19 15:41:49'),
(3, 'editor2', 'editor2@gmail.com', 'Editer 2', 1, '2018-07-17', 'avatar.jpg', '$2y$10$s8BS.GvGUpM6AwThpgUqMenEacYaSADdtHCKJLXGHmKl279Ens0tS', 3, 1, NULL, NULL, 'hM5At6lhKbNFXm4OhVh95AVzVoFc2RIAAaYKmdhEXBTF31pmN91l8tYF3Buo', '2018-07-17 08:26:13', '2018-07-19 15:07:04'),
(5, 'admin', 'qadmin@gmail.com', 'Lê Nguyễn Quyền', 1, '2018-07-17', 'avatar.png', '$2y$10$s8BS.GvGUpM6AwThpgUqMenEacYaSADdtHCKJLXGHmKl279Ens0tS', 1, 1, NULL, NULL, 'gvBihrQF102x39SW2jkheXA7hQkkKPbtX7Ljyjdvzdm3PAOyuhL1vCtjuoD8', '2018-07-17 08:26:13', '2018-07-25 10:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`id`, `admin_id`, `role_id`, `created_at`, `updated_at`) VALUES
(44, 1, 4, NULL, NULL),
(45, 1, 6, NULL, NULL),
(47, 2, 1, NULL, NULL),
(57, 2, 2, NULL, NULL),
(59, 1, 2, NULL, NULL),
(60, 1, 5, NULL, NULL),
(61, 1, 11, NULL, NULL),
(62, 1, 20, NULL, NULL),
(63, 1, 34, NULL, NULL),
(64, 1, 35, NULL, NULL),
(65, 1, 36, NULL, NULL),
(67, 1, 1, NULL, NULL),
(68, 3, 13, NULL, NULL),
(69, 3, 20, NULL, NULL),
(72, 3, 36, NULL, NULL),
(74, 2, 5, NULL, NULL),
(75, 1, 13, NULL, NULL),
(76, 2, 34, NULL, NULL),
(77, 3, 11, NULL, NULL),
(78, 5, 1, NULL, NULL),
(79, 5, 2, NULL, NULL),
(80, 5, 4, NULL, NULL),
(81, 5, 5, NULL, NULL),
(82, 5, 6, NULL, NULL),
(83, 5, 11, NULL, NULL),
(84, 5, 13, NULL, NULL),
(85, 5, 20, NULL, NULL),
(86, 5, 34, NULL, NULL),
(87, 5, 35, NULL, NULL),
(88, 5, 36, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(5, 'Âm nhạc', 'am-nhac', 'Các phim về thể loại âm nhạc', '2018-07-16 20:00:00', '2018-07-24 08:12:26'),
(14, 'Anime', 'anime', 'Các thể loại phim anime', '2018-07-05 12:53:19', '2018-07-24 08:13:54'),
(17, 'Bí ẩn', 'bi-an', 'Các thể loại phim bí ẩn', '2018-07-05 12:55:59', '2018-07-24 08:14:37'),
(18, 'Chiến tranh', 'chien-tranh', 'Các phim về đề tài chiến tranh', '2018-07-05 12:56:39', '2018-07-24 08:14:59'),
(19, 'Đam mỹ - Bách hợp', 'dam-my-bach-hop', 'Các phim về đam mỹ - bách hợp', '2018-07-05 12:57:19', '2018-07-24 08:15:50'),
(21, 'Gia đình', 'gia-dinh', 'Các phim về gia đình', '2018-07-05 13:00:33', '2018-07-24 08:16:13'),
(23, 'Giả tưởng - Thần thoại', 'gia-tuong-than-thoai', 'Các phim về giả tưởng, thần thoại', '2018-07-11 03:35:53', '2018-07-24 08:16:57'),
(24, 'Giật gân', 'giat-gan', 'Các phim về đề tài giật gân', '2018-07-11 03:36:07', '2018-07-24 08:17:27'),
(26, 'Hành động', 'hanh-dong', 'Các phim về thể loại hành động', '2018-07-11 03:36:26', '2018-07-24 08:18:13'),
(27, 'Hình sự', 'hinh-su', 'Các phim về đề tài hình sự', '2018-07-11 03:36:42', '2018-07-24 08:18:37'),
(28, 'TV Show', 'tv-show', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.', '2018-07-11 03:42:02', '2018-07-11 03:42:02'),
(30, 'Hoạt hình', 'hoat-hinh', 'Các phim hoạt hình', '2018-07-24 08:19:28', '2018-07-24 08:19:28'),
(31, 'Khoa học - Tài liệu', 'khoa-hoc-tai-lieu', 'Các phim về khoa học và phim tài liệu', '2018-07-24 08:19:57', '2018-07-24 08:19:57'),
(32, 'Khoa học viễn tưỡng', 'khoa-hoc-vien-tuong', 'Các phim về khoa học viễn tưởng', '2018-07-24 08:20:23', '2018-07-24 08:20:23'),
(33, 'Kiếm hiệp - Cổ trang', 'kiem-hiep-co-trang', 'Các phim về kiếm hiệp và phim cổ trang', '2018-07-24 08:20:48', '2018-07-24 08:20:48'),
(34, 'Kinh dị', 'kinh-di', 'Các phim kinh dị', '2018-07-24 08:21:03', '2018-07-24 08:21:03'),
(35, 'Phiêu lưu', 'phieu-luu', 'Các phim phiêu lưu', '2018-07-24 08:21:24', '2018-07-24 08:21:24'),
(36, 'Tâm lý', 'tam-ly', 'Các phim tâm lý', '2018-07-24 08:21:39', '2018-07-24 08:21:39'),
(37, 'Thanh xuân - Học đường', 'thanh-xuan-hoc-duong', 'Các phim về học đường', '2018-07-24 08:22:00', '2018-07-24 08:22:00'),
(38, 'Thể thao', 'the-thao', 'Các phim về thể thao', '2018-07-24 08:22:19', '2018-07-24 08:22:19'),
(39, 'Thời trang', 'thoi-trang', 'Các phim về thời trang', '2018-07-24 08:22:36', '2018-07-24 08:22:36'),
(40, 'Tình cảm - Lãng mạn', 'tinh-cam-lang-man', 'Các phim về tình cảm', '2018-07-24 08:23:14', '2018-07-24 08:23:14'),
(41, 'Viễn tây', 'vien-tay', 'Các phim về viễn Tây', '2018-07-24 08:23:32', '2018-07-24 08:23:32'),
(42, 'Truyền hình thực tế', 'truyen-hinh-thuc-te', 'Các phim về đề tài thực tế', '2018-07-24 08:23:52', '2018-07-24 08:23:52'),
(43, 'Phim hài', 'phim-hai', 'Các thể loại phim hài hước', '2018-07-25 02:36:53', '2018-07-25 02:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `category_film`
--

CREATE TABLE `category_film` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `film_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_film`
--

INSERT INTO `category_film` (`id`, `category_id`, `film_id`, `created_at`, `updated_at`) VALUES
(6, 26, 49, NULL, NULL),
(7, 32, 49, NULL, NULL),
(8, 41, 49, NULL, NULL),
(9, 26, 50, NULL, NULL),
(10, 34, 50, NULL, NULL),
(11, 24, 51, NULL, NULL),
(12, 36, 51, NULL, NULL),
(13, 24, 52, NULL, NULL),
(14, 26, 52, NULL, NULL),
(15, 35, 52, NULL, NULL),
(16, 36, 52, NULL, NULL),
(17, 40, 53, NULL, NULL),
(18, 14, 54, NULL, NULL),
(19, 21, 54, NULL, NULL),
(20, 30, 54, NULL, NULL),
(21, 35, 54, NULL, NULL),
(22, 43, 54, NULL, NULL),
(23, 34, 55, NULL, NULL),
(24, 36, 55, NULL, NULL),
(25, 21, 56, NULL, NULL),
(26, 28, 56, NULL, NULL),
(27, 36, 56, NULL, NULL),
(28, 23, 57, NULL, NULL),
(29, 26, 57, NULL, NULL),
(30, 27, 57, NULL, NULL),
(31, 33, 57, NULL, NULL),
(32, 18, 58, NULL, NULL),
(33, 23, 58, NULL, NULL),
(34, 33, 58, NULL, NULL),
(35, 17, 59, NULL, NULL),
(36, 34, 59, NULL, NULL),
(37, 36, 59, NULL, NULL),
(38, 34, 60, NULL, NULL),
(39, 43, 60, NULL, NULL),
(40, 14, 61, NULL, NULL),
(41, 26, 61, NULL, NULL),
(42, 30, 61, NULL, NULL),
(43, 32, 61, NULL, NULL),
(44, 40, 62, NULL, NULL),
(45, 43, 62, NULL, NULL),
(46, 40, 63, NULL, NULL),
(47, 43, 63, NULL, NULL),
(48, 18, 64, NULL, NULL),
(49, 24, 64, NULL, NULL),
(50, 26, 64, NULL, NULL),
(51, 36, 64, NULL, NULL),
(52, 23, 65, NULL, NULL),
(53, 26, 65, NULL, NULL),
(54, 32, 65, NULL, NULL),
(55, 33, 65, NULL, NULL),
(56, 35, 65, NULL, NULL),
(57, 26, 66, NULL, NULL),
(58, 30, 66, NULL, NULL),
(59, 35, 66, NULL, NULL),
(60, 5, 67, NULL, NULL),
(61, 17, 67, NULL, NULL),
(62, 19, 67, NULL, NULL),
(63, 26, 67, NULL, NULL),
(64, 32, 67, NULL, NULL),
(65, 18, 68, NULL, NULL),
(66, 26, 68, NULL, NULL),
(67, 32, 68, NULL, NULL),
(68, 17, 69, NULL, NULL),
(69, 18, 69, NULL, NULL),
(70, 23, 69, NULL, NULL),
(71, 32, 69, NULL, NULL),
(72, 5, 71, NULL, NULL),
(73, 14, 71, NULL, NULL),
(74, 17, 71, NULL, NULL),
(75, 18, 71, NULL, NULL),
(76, 19, 71, NULL, NULL),
(77, 5, 72, NULL, NULL),
(78, 14, 72, NULL, NULL),
(79, 19, 72, NULL, NULL),
(80, 28, 72, NULL, NULL),
(81, 5, 73, NULL, NULL),
(82, 14, 73, NULL, NULL),
(83, 17, 73, NULL, NULL),
(84, 18, 73, NULL, NULL),
(85, 19, 73, NULL, NULL),
(86, 28, 73, NULL, NULL),
(87, 30, 73, NULL, NULL),
(88, 34, 73, NULL, NULL),
(89, 5, 74, NULL, NULL),
(90, 14, 74, NULL, NULL),
(91, 17, 74, NULL, NULL),
(92, 28, 74, NULL, NULL),
(93, 37, 74, NULL, NULL),
(94, 40, 74, NULL, NULL),
(95, 5, 75, NULL, NULL),
(96, 14, 75, NULL, NULL),
(97, 17, 75, NULL, NULL),
(98, 18, 75, NULL, NULL),
(99, 14, 76, NULL, NULL),
(100, 28, 76, NULL, NULL),
(101, 30, 76, NULL, NULL),
(102, 14, 77, NULL, NULL),
(103, 21, 77, NULL, NULL),
(104, 28, 77, NULL, NULL),
(105, 37, 77, NULL, NULL),
(106, 5, 79, NULL, NULL),
(107, 14, 79, NULL, NULL),
(108, 17, 79, NULL, NULL),
(109, 28, 79, NULL, NULL),
(110, 36, 79, NULL, NULL),
(111, 37, 79, NULL, NULL),
(112, 5, 80, NULL, NULL),
(113, 14, 80, NULL, NULL),
(114, 28, 80, NULL, NULL),
(115, 32, 80, NULL, NULL),
(116, 34, 80, NULL, NULL),
(117, 14, 81, NULL, NULL),
(118, 17, 81, NULL, NULL),
(119, 18, 81, NULL, NULL),
(120, 19, 81, NULL, NULL),
(121, 28, 81, NULL, NULL),
(122, 37, 81, NULL, NULL),
(123, 5, 82, NULL, NULL),
(124, 14, 82, NULL, NULL),
(125, 28, 82, NULL, NULL),
(126, 5, 83, NULL, NULL),
(127, 14, 83, NULL, NULL),
(128, 17, 83, NULL, NULL),
(129, 18, 83, NULL, NULL),
(130, 19, 83, NULL, NULL),
(131, 21, 83, NULL, NULL),
(132, 23, 83, NULL, NULL),
(133, 5, 84, NULL, NULL),
(134, 14, 84, NULL, NULL),
(135, 17, 84, NULL, NULL),
(136, 18, 84, NULL, NULL),
(137, 19, 84, NULL, NULL),
(138, 21, 84, NULL, NULL),
(139, 5, 87, NULL, NULL),
(140, 14, 87, NULL, NULL),
(141, 17, 87, NULL, NULL),
(142, 18, 87, NULL, NULL),
(143, 19, 87, NULL, NULL),
(144, 21, 87, NULL, NULL),
(145, 5, 88, NULL, NULL),
(146, 17, 88, NULL, NULL),
(147, 18, 88, NULL, NULL),
(148, 19, 88, NULL, NULL),
(149, 38, 88, NULL, NULL),
(150, 39, 88, NULL, NULL),
(151, 42, 88, NULL, NULL),
(152, 5, 89, NULL, NULL),
(153, 14, 89, NULL, NULL),
(154, 17, 89, NULL, NULL),
(155, 18, 89, NULL, NULL),
(156, 38, 89, NULL, NULL),
(157, 39, 89, NULL, NULL),
(158, 40, 89, NULL, NULL),
(159, 5, 90, NULL, NULL),
(160, 14, 90, NULL, NULL),
(161, 17, 90, NULL, NULL),
(162, 18, 90, NULL, NULL),
(163, 19, 90, NULL, NULL),
(164, 21, 90, NULL, NULL),
(165, 5, 91, NULL, NULL),
(166, 14, 91, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `film_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feedback` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(9, 'Ấn Độ', 'an-do', '2018-07-27 03:02:02', '2018-07-27 03:02:02'),
(10, 'Mỹ', 'my', '2018-07-27 03:02:14', '2018-07-27 03:02:14'),
(11, 'Thái Lan', 'thai-lan', '2018-07-27 03:02:22', '2018-07-27 03:02:22'),
(12, 'Hàn Quốc', 'han-quoc', '2018-07-27 03:02:33', '2018-07-27 03:02:33'),
(13, 'Pháp', 'phap', '2018-07-27 03:02:45', '2018-07-27 03:02:45'),
(14, 'Việt Nam', 'viet-nam', '2018-07-27 03:02:56', '2018-07-27 03:02:56'),
(15, 'Chưa có thông tin', 'chua-co-thong-tin', '2018-07-27 06:56:36', '2018-07-27 06:56:36'),
(16, 'Anh', 'anh', '2018-07-28 01:36:11', '2018-07-28 01:36:11'),
(17, 'Nhật Bản', 'nhat-ban', '2018-07-28 01:36:23', '2018-07-28 01:36:23'),
(18, 'Trung Quốc', 'trung-quoc', '2018-07-28 01:36:31', '2018-07-28 01:36:31'),
(19, 'Hồng Kông', 'hong-kong', '2018-07-28 01:36:54', '2018-07-28 01:36:54'),
(20, 'Tây Ban Nha', 'tay-ban-nha', '2018-07-28 01:37:02', '2018-07-28 01:37:23'),
(21, 'Đài Loan', 'dai-loan', '2018-07-28 01:37:12', '2018-07-28 01:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `country_film`
--

CREATE TABLE `country_film` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `film_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country_film`
--

INSERT INTO `country_film` (`id`, `country_id`, `film_id`, `created_at`, `updated_at`) VALUES
(1, 10, 67, NULL, NULL),
(2, 17, 75, NULL, NULL),
(3, 11, 59, NULL, NULL),
(4, 10, 50, NULL, NULL),
(5, 10, 49, NULL, NULL),
(6, 10, 51, NULL, NULL),
(7, 10, 52, NULL, NULL),
(8, 16, 52, NULL, NULL),
(9, 12, 53, NULL, NULL),
(10, 10, 54, NULL, NULL),
(11, 18, 54, NULL, NULL),
(12, 10, 55, NULL, NULL),
(13, 11, 55, NULL, NULL),
(14, 16, 55, NULL, NULL),
(15, 20, 55, NULL, NULL),
(16, 10, 56, NULL, NULL),
(17, 16, 56, NULL, NULL),
(18, 12, 57, NULL, NULL),
(19, 18, 57, NULL, NULL),
(20, 21, 57, NULL, NULL),
(21, 9, 58, NULL, NULL),
(22, 11, 58, NULL, NULL),
(23, 12, 58, NULL, NULL),
(24, 10, 60, NULL, NULL),
(25, 17, 61, NULL, NULL),
(26, 18, 61, NULL, NULL),
(27, 18, 62, NULL, NULL),
(28, 19, 62, NULL, NULL),
(29, 10, 63, NULL, NULL),
(30, 16, 63, NULL, NULL),
(31, 18, 64, NULL, NULL),
(32, 18, 65, NULL, NULL),
(33, 19, 65, NULL, NULL),
(34, 18, 66, NULL, NULL),
(35, 10, 68, NULL, NULL),
(36, 20, 68, NULL, NULL),
(37, 10, 69, NULL, NULL),
(38, 16, 69, NULL, NULL),
(39, 11, 70, NULL, NULL),
(40, 12, 70, NULL, NULL),
(41, 16, 70, NULL, NULL),
(42, 17, 71, NULL, NULL),
(43, 17, 72, NULL, NULL),
(44, 17, 73, NULL, NULL),
(45, 17, 74, NULL, NULL),
(46, 17, 76, NULL, NULL),
(47, 17, 77, NULL, NULL),
(48, 17, 78, NULL, NULL),
(49, 18, 78, NULL, NULL),
(50, 19, 78, NULL, NULL),
(51, 11, 79, NULL, NULL),
(52, 12, 79, NULL, NULL),
(53, 17, 79, NULL, NULL),
(54, 17, 80, NULL, NULL),
(55, 12, 81, NULL, NULL),
(56, 17, 81, NULL, NULL),
(57, 17, 82, NULL, NULL),
(58, 20, 82, NULL, NULL),
(59, 12, 83, NULL, NULL),
(60, 16, 83, NULL, NULL),
(61, 19, 83, NULL, NULL),
(62, 20, 83, NULL, NULL),
(63, 9, 84, NULL, NULL),
(64, 10, 84, NULL, NULL),
(65, 12, 84, NULL, NULL),
(66, 13, 84, NULL, NULL),
(67, 10, 87, NULL, NULL),
(68, 11, 87, NULL, NULL),
(69, 12, 87, NULL, NULL),
(70, 13, 87, NULL, NULL),
(71, 9, 88, NULL, NULL),
(72, 10, 88, NULL, NULL),
(73, 11, 88, NULL, NULL),
(74, 12, 88, NULL, NULL),
(75, 13, 88, NULL, NULL),
(76, 10, 89, NULL, NULL),
(77, 11, 89, NULL, NULL),
(78, 12, 89, NULL, NULL),
(79, 9, 90, NULL, NULL),
(80, 10, 90, NULL, NULL),
(81, 11, 90, NULL, NULL),
(82, 12, 90, NULL, NULL),
(83, 13, 90, NULL, NULL),
(84, 14, 90, NULL, NULL),
(85, 12, 91, NULL, NULL),
(86, 13, 91, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `time_lock_end` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `email`, `fullname`, `birthday`, `avatar`, `password`, `status`, `time_lock_end`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user1', 'user1@gmail.com', 'Hello', '2018-07-19', '6.jpg', '123123', 1, NULL, NULL, '2018-07-19 11:52:14', '2018-07-19 11:52:14'),
(2, 'user2', 'user2@gmail.com', 'Hello', '2018-07-19', '6.jpg', '123123', 1, NULL, NULL, '2018-07-19 11:52:14', '2018-07-19 11:52:14'),
(3, 'user3', 'user3@gmail.com', 'Hello', '2018-07-19', '6.jpg', '123123', 1, NULL, NULL, '2018-07-19 11:52:14', '2018-07-19 11:52:14'),
(4, 'user4', 'user4@gmail.com', 'Hello', '2018-07-19', '6.jpg', '123123', 0, '2018-07-26', NULL, '2018-07-19 11:52:14', '2018-07-23 03:17:48'),
(5, 'cuongcx10', 'cuongcx10@gmail.com', 'cuong', '0011-11-11', '6.jpg', '$2y$10$..U1jMzdX9IDEjVodi0R.e2CLVgNtJS/Eq87JrdR.1yAu1WEccAI2', 1, NULL, 'uh5LVoLaxFGZP8Ac9gyYqvUAbn3Pb3PlBtv80hV6uKWxQdOYQuYT8nksoOwm', '2018-07-24 03:45:07', '2018-07-24 03:45:07'),
(6, 'hungkaka', 'chodaihoc003@gmail.com', 'HÙNG KAKA', '1995-11-27', 'img.png', '$2y$10$zRbX0/7J8JMzKz9YZoEF6O6p1sofUqEtKNeTcANt3K.uhPCxlhJmq', 1, NULL, NULL, '2018-07-24 07:56:40', '2018-07-24 07:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `biography` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `fullname`, `slug`, `image`, `birthday`, `id_country`, `biography`, `created_at`, `updated_at`) VALUES
(9, 'Brad Anderson', 'brad-anderson', '', '2018-07-05', '10', 'Brad Anderson là đạo diễn xuất sắc thế giới 222 ', '2018-07-27 03:35:42', '2018-07-30 17:34:30'),
(10, 'James Franco', 'james-franco', '', '2018-07-13', '10', 'James Franco là đạo diễn xuất sắc thế giới', '2018-07-27 03:36:17', '2018-07-27 03:36:17'),
(11, 'Matthew Ross', 'matthew-ross', '', '2018-07-12', '10', 'Matthew Ross  là đạo diễn xuất sắc thế giới', '2018-07-27 03:37:14', '2018-07-27 03:37:14'),
(12, 'Rawson Marshall Thurber', 'rawson-marshall-thurber', '', '2018-07-10', '13', 'Rawson Marshall Thurber  là đạo diễn xuất sắc thế giới', '2018-07-27 03:43:48', '2018-07-27 03:43:48'),
(13, 'Je Yeong Kim', 'je-yeong-kim', '', '2018-07-18', '12', 'Je Yeong Kim', '2018-07-27 03:49:12', '2018-07-27 03:49:12'),
(14, 'Hong Chang Pyo', 'hong-chang-pyo', '', '2018-07-14', '12', 'Hong Chang Pyo', '2018-07-27 04:07:11', '2018-07-27 04:07:11'),
(15, 'Ninh Hạo', 'ninh-hao', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:04:20', '2018-07-27 07:04:20'),
(16, 'Christopher Jenkins', 'christopher-jenkins', '', 'Chưa có thông tin', '10', 'Đang cập nhật thông tin', '2018-07-27 07:29:24', '2018-07-27 07:29:24'),
(17, 'Jeremy Dyson', 'jeremy-dyson', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:30:22', '2018-07-27 07:30:22'),
(18, 'James Marsh', 'james-marsh', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:31:39', '2018-07-27 07:31:39'),
(19, 'Hà Tư Triều Lỗ', 'ha-tu-trieu-lo', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:32:38', '2018-07-27 07:32:38'),
(20, 'Sopon Sukdapisit', 'sopon-sukdapisit', '', 'Chưa có thông tin', '11', 'Đang cập nhật thông tin', '2018-07-27 07:34:46', '2018-07-27 07:34:46'),
(21, 'Michael Tiddes', 'michael-tiddes', '', 'Chưa có thông tin', '10', 'Đang cập nhật thông tin', '2018-07-27 07:36:43', '2018-07-27 07:36:43'),
(22, 'Kazuchika Kise', 'kazuchika-kise', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:37:58', '2018-07-27 07:37:58'),
(23, 'Elizabeth Maxwell', 'elizabeth-maxwell', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:38:23', '2018-07-27 07:38:23'),
(24, ' Vince Marcello', 'vince-marcello', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:41:02', '2018-07-27 07:41:02'),
(25, 'Lâm Siêu Hiền', 'lam-sieu-hien', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:45:18', '2018-07-27 07:45:18'),
(26, 'Tôn Tiêu', 'ton-tieu', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:54:15', '2018-07-27 07:54:15'),
(27, 'Lý Luyện', 'ly-luyen', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 07:58:17', '2018-07-27 07:58:17'),
(28, 'Jake Castorena', 'jake-castorena', '', 'Chưa có thông tin', '10', 'Đang cập nhật thông tin', '2018-07-27 08:01:25', '2018-07-27 08:01:25'),
(29, 'José Padilha', 'jose-padilha', '', 'Chưa có thông tin', '10', 'Đang cập nhật thông tin', '2018-07-27 08:08:43', '2018-07-27 08:08:43'),
(30, 'Wes Ball', 'wes-ball', '', 'Chưa có thông tin', '10', 'Đang cập nhật thông tin', '2018-07-27 08:15:06', '2018-07-27 08:15:06'),
(31, 'Ali Samadi Ahadi', 'ali-samadi-ahadi', '', 'Chưa có thông tin', '9', 'Đang cập nhật thông tin', '2018-07-27 08:22:11', '2018-07-27 08:22:11'),
(32, 'Yukina Hiiro', 'yukina-hiiro', '', 'Chưa có thông tin', '9', 'Đang cập nhật thông tin', '2018-07-27 08:23:07', '2018-07-27 08:23:07'),
(33, 'Masahiko Murata', 'masahiko-murata', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 08:44:36', '2018-07-27 08:44:36'),
(34, ' Murano Yuuta', 'murano-yuuta', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 08:48:50', '2018-07-27 08:48:50'),
(35, 'Hiroyuki Yamashita', 'hiroyuki-yamashita', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 08:58:12', '2018-07-27 08:58:12'),
(36, 'Kenichi Kawamura', 'kenichi-kawamura', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 09:01:26', '2018-07-27 09:01:26'),
(37, 'Minoru Mizoguchi', 'minoru-mizoguchi', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 09:07:05', '2018-07-27 09:07:05'),
(38, 'Tetsuya Yanagisawa', 'tetsuya-yanagisawa', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 09:14:52', '2018-07-27 09:14:52'),
(39, 'Kunihiko Yuyama', 'kunihiko-yuyama', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 09:17:09', '2018-07-27 09:17:09'),
(40, 'Masakazu Obara', 'masakazu-obara', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 09:21:12', '2018-07-27 09:21:12'),
(41, 'Sunao Katabuchi', 'sunao-katabuchi', '', 'Chưa có thông tin', '15', 'Đang cập nhật thông tin', '2018-07-27 09:23:09', '2018-07-27 09:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `director_film`
--

CREATE TABLE `director_film` (
  `id` int(10) UNSIGNED NOT NULL,
  `director_id` int(10) UNSIGNED NOT NULL,
  `film_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_vi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_film_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_background` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date_theater` date DEFAULT NULL,
  `quality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resolution` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IMDb` double(2,1) NOT NULL,
  `company_production` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `published_year` int(11) DEFAULT NULL,
  `film_hot` tinyint(1) NOT NULL,
  `film_cinema` tinyint(1) NOT NULL,
  `film_type` tinyint(4) NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `total_episodes` int(11) DEFAULT NULL,
  `active_slide` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `theater_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `title_vi`, `slug`, `parent_film_id`, `title_en`, `img_thumbnail`, `img_background`, `description`, `time`, `status`, `date_theater`, `quality`, `resolution`, `IMDb`, `company_production`, `view_count`, `published_year`, `film_hot`, `film_cinema`, `film_type`, `admin_id`, `total_episodes`, `active_slide`, `created_at`, `updated_at`, `theater_status`) VALUES
(49, 'Thế Giới Tương Lai', 'the-gioi-tuong-lai', '0', 'Future World (2018)', '2018-07/97a7168ef44b9a6fb699d19d2afdc710.jpg', '2018-07/dd8ad527db335b6e3d67608c8e7e864e.jpg', 'Phim Future World (Thế Giới Tương Lai): Một cậu bé tìm kiếm một khu đất hoang trên thế giới trong tương lai để chữa bệnh cho người mẹ sắp chết của mình.', 104, 1, '2018-05-25', 'HD', '1080', 9.0, 'Jeremy Cheung, Jay Davis', 1, 2018, 1, 1, 0, 1, NULL, 1, '2018-07-27 03:18:14', '2018-07-28 03:24:59', 1),
(50, 'Cuộc Chiến Kim Cương Xanh', 'cuoc-chien-kim-cuong-xanh', '0', 'Siberia (2018)', '2018-07/058a03a6bc4a04f62f5ccb441d4718d6.jpg', '2018-07/897bdd5816b401482050e90a02e4ce5b.jpg', 'Siberia (Cuộc Chiến Kim Cương Xanh): Lucas Hill một thương gia kim cương đến Nga để bán những viên kim cương quý hiếm đáng ngờ. Tuy nhiên cuộc giao dịch không thành công và anh trở thành đối tượng bị săn đuổi không chỉ bởi những băng nhóm tội phạm mà dường như còn có sự tham gia của những lực lượng chức năng khác. Với kĩ năng chiến đấu của mình, anh thoát chết và tìm đường rời khỏi nước Nga. Trên đường trốn chạy Lucas gặp gỡ và đắm chìm trong tình yêu với một cô chủ quán cà phê xinh đẹp ở một thị trấn nhỏ ở Siberia. Liệu cô gái này xuất hiện một cách tình cờ hay đây là một cái bẫy mà con mồi chính là anh thương gia giàu sụ.', 104, 1, '2018-07-13', 'HD', '1080', 6.0, 'Stephen Hamel,Scott B. Smith', 4, 2018, 1, 1, 0, 1, NULL, 1, '2018-07-27 03:28:07', '2018-09-05 13:49:30', 0),
(51, 'Cuộc Giải Cứu', 'cuoc-giai-cuu', '0', 'Beirut (2018)', '2018-07/f6b42fe69a237511e93d5704d1ff394e.jpg', '2018-07/6a240895ae9ec735d66bd98450ebbf8b.jpg', 'Beirut (Cuộc Giải Cứu): Được “nhào nặn” dưới bàn tay của đạo diễn tài năng Tony Gilroy, người được biết đến rộng rãi qua series phim hành động nổi tiếng Bourne. Beirut là câu chuyện về một nhà cựu ngoại giao Mỹ (John Hamm) quay trở lại công việc cũ của mình để giải cứu cô bạn đồng nghiệp (Rosamund Pike).', 104, 1, '2018-07-13', 'HD', '720', 8.0, 'Tony Gilroy', 0, 2018, 1, 1, 0, 1, NULL, 1, '2018-07-27 03:38:56', '2018-07-28 02:29:12', 0),
(52, 'Tòa Tháp Chọc Trời', 'toa-thap-choc-troi', '0', 'Skyscraper (2018)', '2018-07/f743e27173afefeba828c688e6f0862c.jpg', '2018-07/41ef6165dc93b0412efd772868221211.jpg', 'Skyscraper (Tòa Tháp Chọc Trời): Dwayne Johnson (The Rock) sẽ vào vai cựu quân nhân và cựu trưởng nhóm đặc nhiệm giải cứu của FBI đầy dũng cảm. Không may trong một nhiệm vụ nguy hiểm, tai nạn khủng khiếp xảy đến làm anh mất đi chân trái của mình. Kể từ đó, Will từ bỏ công việc tại FBI và trở thành chuyên gia đánh giá an ninh cho các tòa nhà. Trong một lần làm việc, Tòa nhà cao 240 tầng với hệ thống an ninh tối tân đột nhiên bị cháy lớn ở tầng 96. Những con người, cạm bẫy và thế lực nào đứng sau thảm họa này chắc chắn đang nhắm vào cựu quân nhân và lấy gia đình anh ra làm con tin. Với kinh nghiệm, sự gan dạ của một người lính cùng tình yêu gia đình mãnh liệt, liệu anh có tìm ra được kẻ chủ mưu và cứu lấy gia đình của anh?', 157, 1, '2018-07-13', 'HD', '720', 7.0, 'Rawson Marshall Thurber', 3, 2018, 1, 1, 0, 1, NULL, 1, '2018-07-27 03:42:58', '2018-09-05 13:42:08', 0),
(53, 'Bẫy Tình Yêu (Bản Điện Ảnh)', 'bay-tinh-yeu-ban-dien-anh', '0', 'Cheese in the Trap (Movie) (2018)', '2018-07/d5986d83d62cc219b181ab9e330c83b6.jpg', '2018-07/c8f208a5369969d3cddc51f2f57e00a6.jpg', 'Cheese in the Trap Movie (Bẫy Tình Yêu Bản Điện Ảnh): Sau khi làm mưa làm gió mùa Valentine năm 2016, kịch bản tình yêu trường đại học của Cheese In The Trap một lần nữa lại được dựng thành phim để chiếu trên màn ảnh rộng. Bản thân bộ truyện cùng tên vốn đã cực kỳ nổi tiếng trên mạng xã hội Hàn Quốc', 50, 1, '2018-07-13', 'HD', '1080', 5.0, 'Soonkki', 0, 2018, 1, 1, 0, 1, NULL, 1, '2018-07-27 03:48:22', '2018-07-28 02:29:12', 1),
(54, 'Ngỗng Vịt Phiêu Lưu Ký', 'ngong-vit-phieu-luu-ky', '0', 'Duck Duck Goose (2018)', '2018-07/3ce203bd3d1a5e1da4468d30a553343c.jpg', '2018-07/c2140defb10b92b32587cc09a611a6f7.jpg', 'Duck Duck Goose (Ngỗng Vịt Phiêu Lưu Ký) : Duck Duck Goose xoay quanh cuộc hành trình của chú ngỗng tên Peng. Cậu ta luôn nghĩ rằng mình giỏi hơn những chú ngỗng khác', 201, 1, '2018-07-14', 'HD', '1080', 9.0, 'Rob Muir, Christopher Jenkins', 3, 2018, 1, 1, 0, 1, NULL, 1, '2018-07-27 03:53:40', '2018-09-05 13:33:44', 1),
(55, 'Chuyện Ma Lúc Nửa Đêm', 'chuyen-ma-luc-nua-dem', '0', 'Ghost Stories (2018)', '2018-07/ff021b5750f261f4d3272fb22e50c611.jpg', '2018-07/d2befa02885c52ea128520f97d507cfa.jpg', 'Ghost Stories (2018)', 156, 1, '2018-07-13', 'HD', '1080', 7.0, 'Ghost Stories (2018)', 0, 2018, 1, 1, 0, 1, NULL, 0, '2018-07-27 03:57:52', '2018-07-28 02:29:12', 1),
(56, 'The Mercy (2018)', 'the-mercy-2018', '0', 'The Mercy (2018)', '2018-07/f2fe4e861b53664a0f25c05f6a84e37b.jpg', '2018-07/6a5a9d018f50ff2df632d8fb97bd0e36.jpg', 'The Mercy (2018)', 112, 1, '2018-07-07', 'HD', '1080', 5.0, 'The Mercy (2018)', 0, 2018, 1, 1, 0, 1, NULL, 0, '2018-07-27 04:00:32', '2018-07-28 02:29:12', 1),
(57, 'Chiến Thần Ký', 'chien-than-ky', '0', 'Genghis Khan (2018)', '2018-07/31ba573f7071959e87dbd31a4b956290.jpg', '2018-07/6fdaeaf04ec08839ad1e8a01003da9ec.jpg', 'Chiến Thần Ký', 50, 1, '2018-07-21', 'HD', '1080', 7.0, 'Chiến Thần Ký', 0, 2018, 1, 1, 0, 1, NULL, 0, '2018-07-27 04:03:18', '2018-07-28 02:29:12', 1),
(58, 'Công Chúa Và Chàng Mai', 'cong-chua-va-chang-mai', '0', 'The Princess and the Matchmaker (2018)', '2018-07/9632014beb9876f0c9672a26b890f75d.jpg', '2018-07/4060f1d661261ad9cedc88fc4cd7767f.jpg', 'The Princess and the Matchmaker (Công Chúa Và Chàng Mai): xoay quanh chuyện tuyển phò mã cho một cô công chúa bướng bỉnh Songhwa (Shim Eun Kyung) thời Joseon', 165, 1, '2018-07-14', 'HD', '1080', 9.0, 'Bang Mi Jung', 0, 2018, 1, 1, 0, 1, NULL, 0, '2018-07-27 04:05:45', '2018-07-28 02:29:12', 1),
(59, 'Bí Ẩn Tại Hồ Bơi', 'bi-an-tai-ho-boi', '0', 'The Swimmers (2014)', '2018-07/bdd476324d67ec2720316c00e7844f22.jpg', '2018-07/f46a923c6b00c95412203018b7f52622.jpg', 'The Swimmers (Bí Ẩn Tại Hồ Bơi): Bộ phim xoay quanh câu chuyện của 2 người bạn thân đồng thời là đối thủ của nhau Perth và Tan. Dù là bạn thân nhưng Perth luôn ghen tỵ với tài năng của Tan', 50, 1, '2014-07-13', 'HD', '1080', 8.0, 'The Swimmers', 0, 2014, 1, 1, 0, 1, NULL, 0, '2018-07-27 04:08:54', '2018-07-28 02:29:12', 0),
(60, 'Ngôi Nhà Ma Ám 2', 'ngoi-nha-ma-am-2', '0', 'A Haunted House 2 (2014)', '2018-07/1204986c2baa5f1dc135f8c9da75d322.jpg', '2018-07/0ffdf3c106801ee2d40a12a6d37b5083.jpg', 'A Haunted House 2 (2014)', 150, 1, '2014-07-05', 'HD', '1080', 6.0, 'A Haunted House 2', 0, 2014, 1, 1, 0, 1, NULL, 0, '2018-07-27 04:15:23', '2018-07-28 02:29:12', 1),
(61, 'Linh Hồn Của Máy - Phần 4', 'linh-hon-cua-may-phan-4', '0', 'Ghost in the Shell Arise: Border 4 - Ghost Stands Alone (2014)', '2018-07/97e0113b90c4a3f12d43080a80d08134.jpg', '2018-07/61acd67c464f3d8207b47dfcc008e6fb.jpg', 'Ghost in the Shell Arise: Border 4 - Ghost Stands Alone (2014)', 213, 1, '2014-07-21', 'HD', '1080', 9.0, 'Ghost in the Shell Arise', 0, 2014, 1, 1, 0, 1, NULL, 0, '2018-07-27 04:19:55', '2018-07-28 02:29:12', 0),
(62, 'Tâm Hoa Lộ Phóng', 'tam-hoa-lo-phong', '0', 'Breakup Buddies (2014)', '2018-07/47000ad23140cdccb385b9b2e76dde3e.jpg', '2018-07/2129835c6753d1f397871f6baa8ee00e.jpg', 'Breakup Buddies (Tâm Hoa Lộ Phóng): Cảnh Hạo hôn nhân thất bại, có người tình nhỏ, rơi vào thứ tình cảm éo le. Đối diện với sự phản bội, Cảnh Hạo cảm thấy đau khổ day dứt không thể nào thoát ra được', 145, 1, '2014-07-13', 'HD', '1080', 6.0, 'Nhạc Tiểu Quân', 0, 2014, 1, 1, 0, 1, NULL, 0, '2018-07-27 07:00:10', '2018-07-28 02:29:12', 1),
(63, 'Bốt Hôn', 'bot-hon', '0', 'The Kissing Booth (2018)', '2018-07/d30e9ea61860a17ab2c8f72ec49abc6e.jpg', '2018-07/b216cae3d085695e63a697ee4320df4d.jpg', 'The Kissing Booth: Khi Elle Evans (Joey King), một người khá muộn, người không bao giờ hôn, quyết định điều hành một buồng hôn tại lễ hội mùa xuân của trường trung học', 126, 1, '2018-07-21', 'HD', '1080', 9.0, 'The Kissing Booth', 0, 2018, 1, 1, 0, 1, NULL, 0, '2018-07-27 07:42:59', '2018-07-28 02:29:12', 0),
(64, 'Điệp Vụ Biển Đỏ', 'diep-vu-bien-do', '0', 'Operation Red Sea (2018)', '2018-07/96b5935841a79e57ef8ee3e0572065f1.jpg', '2018-07/c91d47b7a272d882a656c73cb48cd76e.jpg', 'Operation Red Sea (Điệp Vụ Biển Đỏ): Cuộc đảo chính ở Cộng hòa Bắc Phi khiến cuộc sống của người dân Trung bản địa gặp nhiều nguy hiểm. Tình thế ở nên cấp bách hơn khi một tổ chức khủng bố quyết tâm chiếm lấy nguồn nhiên liệu hạt nhân. Đối với nhiệm vụ lần này, không những chỉ có tính mệnh của người dân bị đe dọa nghiêm trọng mà cả vùng lãnh thổ có nguy cơ bị diệt vong. Biệt đội Giao Long có thể sẽ phải đánh cược mạng sống của từng thành viên trong tổ..', 140, 1, '2018-07-06', 'HD', '1080', 6.0, 'Lâm Minh Kiệt', 0, 2018, 1, 1, 0, 1, NULL, 0, '2018-07-27 07:47:17', '2018-07-28 02:29:12', 0),
(65, 'Sứ Mệnh Xuyên Không', 'su-menh-xuyen-khong', '0', 'Recontroller (2018)', '2018-07/47741d96dada78dc4be22bc618e1e028.jpg', '2018-07/fb9c95776ae1be4d2df5e0ad7120281d.jpg', 'Recontroller (Sứ Mệnh Xuyên Không): Từ một người bình thường, Hiểu Minh bất ngờ được truyền đạt năng lực kiểm soát thời gian, có khả năng xuyên không đến mọi không gian. Nhưng điều này cũng mang đến nguy hiểm cho anh khi phải đương đầu với những người máy sở hữu sức mạnh, trí tuệ siêu phàm đang có âm mưu tạo dựng một thế giới không có loài người.', 50, 1, '2018-07-20', 'HD', '1080', 5.0, 'Lý Tuyền', 0, 2018, 1, 1, 0, 1, NULL, 0, '2018-07-27 07:55:04', '2018-07-28 02:29:12', 1),
(66, 'Đội Anh Hùng Nhí', 'doi-anh-hung-nhi', '0', 'Axel 2: Adventures of the Spacekids (2018)', '2018-07/7fe040c62931ac2746c0bf3cb5712a0b.jpg', '2018-07/6dcdc8b949bb5b4a3c19052d21d7f71e.jpg', 'Axel 2: Adventures of the Spacekids (Đội Anh Hùng Nhí): Một hành tinh xa xôi ngoài vũ trụ đột nhiên bị người Trái Đất xâm chiếm, biến nó từ một nơi đầy những thực vật đa dạng trở nên khô cằn. Không thể đứng nhìn quê hương tiếp tục bị huỷ hoại, một nhóm gồm 3 người bạn đã dũng cảm lên đường tìm kiếm những hạt giống còn sót lại, đối đầu với người Trái Đất để bảo vệ quê hương', 50, 1, '2018-07-14', 'HD', '1080', 8.0, 'Mã Hoa', 0, 2018, 0, 0, 0, 1, NULL, 0, '2018-07-27 07:59:56', '2018-07-28 02:29:12', 0),
(67, 'Biệt Đội Giải Cứu Gotham', 'biet-doi-giai-cuu-gotham', '0', 'Scooby-Doo & Batman: The Brave and the Bold (2018)', '2018-07/fc9da4c4d7cb5cf96547ae8df6f2d139.jpg', '2018-07/e9d9bd9d587f13f292d060dbdc1194a0.jpg', 'Scooby-Doo & Batman: The Brave and the Bold (Biệt Đội Giải Cứu Gotham): Sau 16 năm Batman và Scooby- Doo mới lại có cơ hội lên film gặp lại nhau. Lần này Batman cùng Plastic Man, Black Canary, Martian Manhunter, The Question, Aquaman và Câu lạc bộ Bí ẩn sẽ hợp tác cùng nhau chống lại lũ tội phạm Gotham và điều tra về con quái vật \"Khăn Quàng Đỏ\"', 75, 1, '2018-07-21', 'HD', '1080', 9.0, 'Paul Giacoppo', 0, 2018, 1, 1, 0, 1, NULL, 0, '2018-07-27 08:03:19', '2018-07-28 02:29:12', 1),
(68, 'Cảnh Sát Người Máy', 'canh-sat-nguoi-may', '0', 'RoboCop (2014)', '2018-07/55c92650c3b596123dbd5e596cd53203.jpg', '2018-07/36f77035c25ce5ed65eee622eb322065.jpg', 'Cảnh Sát Người Máy - RoboCop: RoboCop lấy bối cảnh giả tưởng vào năm 2028, 1 tập đoàn đa quốc gia có tên Omni Corp nổi lên như diều gặp gió với công nghệ chế tạo rô-bốt bậc nhất. Trong khi đó, Alex Murphy, ngoài việc là 1 người cha, người chồng yêu vợ con hết mực, anh còn giữ nhiệm vụ bảo vệ thành phố Detroit khỏi những tên tội phạm khét tiếng. Trong 1 lần làm nhiệm vụ, Alex bị thương nặng và Omni Corp đã giúp anh hồi sinh nhờ công nghệ của họ. Trở về với công việc cảnh sát thường ngày với khả năng siêu việt nhưng Alex lại phải đối mặt với những điều anh chưa từng gặp phải trước đây.', 94, 1, '2014-07-06', 'HD', '720', 9.0, 'Edward Neumeier', 0, 2014, 0, 0, 0, 1, NULL, 0, '2018-07-27 08:10:39', '2018-07-28 02:29:12', 0),
(69, 'Giải Mã Mê Cung', 'giai-ma-me-cung', '0', 'The Maze Runner (2014)', '2018-07/94c8080ff5abd273a5a959c1d1d5fb0f.jpg', '2018-07/7cff16b6014473cee707d20e6e18506c.jpg', 'The Maze Runner (2014)', 150, 1, '2014-07-07', 'HD', '1080', 6.0, 'Grant Pierce Myers', 0, 2014, 1, 1, 0, 1, NULL, 0, '2018-07-27 08:13:45', '2018-07-28 02:29:12', 1),
(70, 'Một Phiền Toái Nhỏ - Một Tình Bạn Lớn', 'mot-phien-toai-nho-mot-tinh-ban-lon', '0', 'Pettson and Findus: A Little Nuisance, a Great Friendship (2014)', '2018-07/a2d5ea625d1b98dc8a2cf1cdccacdd6d.jpg', '2018-07/4ea748b8af4e48b9036acdfad2c4b989.jpg', 'Phim Pettson and Findus: A Little Nuisance, a Great Friendship (Một Phiền Toái Nhỏ - Một Tình Bạn Lớn): Một câu chuyện cảm động về tình yêu, tình bạn, sự tin tưởng và nơi chúng ta thuộc về. Ông lão Pettson sống cô đơn trong một căn nhà gỗ đỏ, nhỏ bé, hàng ngày đốn củi, nuôi gà và sáng chế. Bà lão hàng xóm tặng ông một chú mèo để làm bạn, một chú mèo biết nói... Dựa trên câu chuyện cổ tích của Thụy Điển, bộ phim là cuộc phiêu lưu hài hước và thú vị của ông lão Pettson và chú mèo biết nói Findus để tìm ra ý nghĩa của cuộc sống.', 160, 1, '2014-07-14', 'HD', '1080', 8.0, 'Thomas Springer', 0, 2014, 1, 1, 0, 1, NULL, 0, '2018-07-27 08:17:32', '2018-07-28 02:29:12', 0),
(71, 'Yume Oukoku to Nemureru 100 Nin no Ouji-sama (2018)', 'yume-oukoku-to-nemureru-100-nin-no-ouji-sama-2018', '0', 'Yume Oukoku to Nemureru 100 Nin no Ouji-sama (2018)', '2018-07/b67025fcf60b17906e725ef1ad8db5b3.jpg', '2018-07/0ba0d969eeafa443f3f06e6cd6c3c001.jpg', 'Phim Future World (Thế Giới Tương Lai): Một cậu bé tìm kiếm một khu đất hoang trên thế giới trong tương lai để chữa bệnh cho người mẹ sắp chết của mình.', 142, 1, '2014-07-06', 'HD', '1080', 7.0, 'Yume Oukoku', 1, 2014, 1, 1, 0, 1, NULL, 0, '2018-07-27 08:26:15', '2018-07-28 21:38:01', 0),
(72, 'Tsubasa Giấc Mơ sân Cỏ', 'tsubasa-giac-mo-san-co', '0', 'Captain Tsubasa (2018)', '2018-07/c1bf2d14a558cf72457b0eb596912b4c.jpg', '2018-07/d05666ab09519c683dd285b57258b696.jpg', 'zora Tsubasa là một cậu bé thần đồng bóng đá, người luôn ấp ủ ước mơ được thi đấu cho Đội tuyển bóng đá quốc gia Nhật Bản và giành chức vô địch Giải vô địch bóng đá thế giới. Khi chuyển tới Nankatsu, Tsubasa kết bạn với Ishizaki Ryou, một cậu bé bằng tuổi cũng yêu thích bóng đá', 80, 1, '2014-07-02', 'HD', '1080', 5.0, 'Atsuhiro Tomioka', 0, 2014, 1, 1, 0, 1, NULL, 0, '2018-07-27 08:35:49', '2018-07-28 02:29:12', 0),
(73, 'Tsukumogami Kashimasu (2018)', 'tsukumogami-kashimasu-2018', '0', 'Tsukumogami Kashimasu (2018)', '2018-07/6d8c2dedcda0d6b62cc4f5cf5dee77a7.jpg', '2018-07/ed1878ad16985ff6200cfc96e3f0b3d9.jpg', 'Masahiko Murata', 95, 1, '2014-07-04', 'Trung Bình', '480', 5.0, 'Masahiko Murata', 0, 2014, 1, 1, 0, 1, NULL, 0, '2018-07-27 08:46:20', '2018-07-28 02:29:12', 0),
(74, 'Isekai Maou to Shoukan Shoujo no Dorei Majutsu (2018)', 'isekai-maou-to-shoukan-shoujo-no-dorei-majutsu-2018', '0', 'Isekai Maou to Shoukan Shoujo no Dorei Majutsu (2018)', '2018-07/bbaf9b9545cec43ca965512845cc1be1.jpg', '2018-07/08fab8afacdf93542d0402035000ab6e.jpg', 'Isekai Maou to Shoukan Shoujo no Dorei Majutsu (2018)', 85, 1, '2014-07-12', 'HD', '1080', 5.0, 'Isekai Maou to Shoukan Shoujo no Dorei Majutsu (2018)', 0, 2014, 0, 0, 0, 1, NULL, 0, '2018-07-27 08:50:49', '2018-07-28 02:29:12', 0),
(75, 'Boruto: Naruto Những Thế Hệ Kế Tiếp', 'boruto-naruto-nhung-the-he-ke-tiep', '0', 'Boruto: Naruto Next Generations (2017)', '2018-07/281bae326097adb74b15d7f2d5d634cd.jpg', '2018-07/4c6ecbb7f8879d6af90f1aa699f9589d.jpg', 'Naruto là một chàng trai trẻ đầy nhiệt huyết cũng như rất nghịch ngợm. Sau tất cả thì cậu cũng đã đạt được ước mơ của mình trở thành một Hokage vĩ đại nhất. Nhưng câu chuyện này không phải về Naruto, mà là câu chuyện về con trai của Naruto.... Chính là Boruto, thế hệ Ninja tiếp theo.', 50, 1, '2014-07-12', 'HD', '1080', 7.0, 'Boruto', 0, 2014, 1, 1, 0, 1, NULL, 0, '2018-07-27 08:57:30', '2018-07-28 02:29:12', 1),
(76, 'Steins;Gate 0', 'steins-gate-0', '0', 'Steins,Gate Zero (2018)', '2018-07/78705b2cf0271d8f9eb80c17c25d74cb.jpg', '2018-07/ee04689e39dac700d9cc6105dae710cc.jpg', 'Câu chuyện của Steins;Gate 0 (Steins,Gate Zero) bắt đầu vào tháng Mười một, năm 2010 ở vùng hội tụ Beta, không phải ở đường thế giới Steins Gate; vẽ nên chân dung của một Okabe Rintarou đã từ bỏ nỗ lực cứu Makise Kurisu sau thất bại đầu tiên. Rơi vào đau đớn, tuyệt vọng, Rintarou từ bỏ cái tên \"Hououin Kyouma\" hư cấu', 75, 1, '2014-06-04', 'HD', '1080', 5.0, 'Jukki Hanada', 0, 2014, 1, 1, 0, 1, NULL, 0, '2018-07-27 09:00:55', '2018-07-28 02:29:12', 0),
(77, 'Nụ Hôn Tinh Nghịch: Trường Trung Học', 'nu-hon-tinh-nghich-truong-trung-hoc', '0', 'Itazurana Kiss Part 1: High School Hen (2016)', '2018-07/7242ac3e42ee0a252cd344e3d1bd0fe1.jpg', '2018-07/ac382069f81f85979201187ab6c3165b.jpg', 'Itazurana Kiss Part 1: High School Hen (Nụ Hôn Tinh Nghịch: Trường Trung Học): Dựa trên bộ truyện manga nổi tiếng cùng tên, bộ phim hài lãng mạn Nhật Bản này theo dõi cuộc sống của hai học sinh trung học, Kotoko, một cô gái bốc lửa vô vọng ở trường, và Naoki, thông minh và đẹp trai. Mặc dù Kotoko tập trung sự dũng cảm để thú nhận tình yêu của mình với anh, anh thẳng thừng từ chối cô trước công chúng. Nhưng số phận hoạt động theo những cách bí ẩn – khi căn nhà của cô sụp đổ, một người bạn thời thơ ấu của cha cô, ông Irie, mời họ sống với gia đình, và cô biết rằng con trai của ông Irie không ai khác chính là Naoki', 126, 1, '2016-07-13', 'HD', '1080', 8.0, 'Minoru Mizoguchi', 0, 2016, 1, 1, 0, 1, NULL, 0, '2018-07-27 09:05:58', '2018-07-28 02:29:12', 0),
(78, 'Persona 5 the Animation: Special', 'persona-5-the-animation-special', '0', 'Persona 5 the Animation: The Day Breakers (2016)', '2018-07/a8c630bdb46aef3c6336039a2fa9500b.jpg', '2018-07/afccdc09bd1c6c6c219cfcf62b201120.jpg', 'Câu chuyện tập trung vào nhân vật chính 16 tuổi sau khi được chuyển đến Trung học Shujin ở Tokyo. Ở lại với bạn bè của cha mẹ mình, anh gặp hai bạn học,và biến hình sinh vật giống như con mèo được gọi là Morgana. Trong suốt thời gian của mình ở đó, cảm thấy bị ức chế bởi môi trường của họ, bốn tạo thành một nhóm gọi là \"Kẻ trộm Phantom\", làm việc với nhau để thực hiện trộm cắp và gặp phải hiện tượng bí ẩn trên đường đi.', 75, 1, '2016-07-05', 'HD', '1080', 7.0, 'Takaharu Ozaki', 0, 2016, 1, 1, 0, 1, NULL, 0, '2018-07-27 09:09:48', '2018-07-28 02:29:12', 0),
(79, 'Em Đã Yêu Anh Từ Rất Lâu', 'em-da-yeu-anh-tu-rat-lau', '0', 'I\'ve Always Liked You (2016)', '2018-07/81a114f0ef4e8979916b84955a20ed2c.jpg', '2018-07/4161648f67937c3d5a0956d241a5eaf4.jpg', 'I\'ve Always Liked You (2016)', 85, 1, '2016-07-11', 'HD', '1080', 9.0, 'I\'ve Always Liked You (2016)', 0, 2016, 1, 1, 0, 1, NULL, 0, '2018-07-27 09:13:50', '2018-07-28 02:29:12', 1),
(80, 'Pokemon Movie 19: Volcanion Và Magearna Siêu Máy Móc', 'pokemon-movie-19-volcanion-va-magearna-sieu-may-moc', '0', 'Pokemon the Movie XY&Z: Volcanion to Karakuri no Magearna (2016)', '2018-07/19f91a446dcaca5d21ebe3ade136e46a.jpg', '2018-07/e70bf831a68648db510b8670f6f8fb02.jpg', 'Pokemon the Movie XY&Z: Volcanion to Karakuri no Magearna (2016)', 150, 1, '2016-03-04', 'HD', '1080', 8.0, 'Pokemon the Movie XY&Z', 0, 2016, 1, 1, 0, 1, NULL, 0, '2018-07-27 09:16:43', '2018-07-28 02:29:12', 0),
(81, 'Thế Giới Gia Tốc: Movie', 'the-gioi-gia-toc-movie', '0', 'Accel World: Infinite Burst (2016)', '2018-07/3c0dff62b1102b5bbe741a5b5adde119.jpg', '2018-07/fc7c48c89a85486c94bf6acba65d2592.jpg', 'Accel World: Infinite Burst (2016)', 95, 1, '2016-07-04', 'HD', '1080', 8.0, 'Accel World: Infinite Burst (2016)', 0, 2016, 1, 1, 0, 1, NULL, 0, '2018-07-27 09:19:51', '2018-07-28 02:29:12', 0),
(82, 'Góc Khuất Của Thế Giới', 'goc-khuat-cua-the-gioi', '0', 'In This Corner of the World (2016)', '2018-07/54434eed362a469d42072281a2af80a9.jpg', '2018-07/1a908eb79a35937e371f630eb97e340a.jpg', 'In This Corner of the World (2016)', 75, 1, '2016-07-13', 'HD', '1080', 5.0, 'In This Corner of the World', 0, 2016, 1, 1, 0, 1, NULL, 0, '2018-07-27 09:24:35', '2018-07-28 02:29:12', 0),
(83, 'HÁT', 'hat', '0', 'Sing', '2018-07/b354c0de4a56ca51424e075583701f15.jpg', '2018-07/544ad8e697811e44010d98a9cd1ed5d3.jpg', 'Mindenki là phim ngắn của Hungary, thuộc thể loại nhân văn, âm nhạc, đã chiến thắng hạng mục Phim ngắn hay nhất Oscar 2017.', 89, 1, '2016-07-13', 'HD', '720', 8.0, 'Meteor-Film', 0, 2016, 1, 1, 0, 1, NULL, 0, '2018-07-28 02:17:10', '2018-07-28 02:29:12', 1),
(84, 'MADE - BIGBANG', 'made-bigbang', '0', 'Big Bang Made the Movie (2016)', '2018-07/b08d063f7070eb21347129959637de39.jpg', '2018-07/bd7233afb24473f575505fa24c2c7867.jpg', 'Phim Future World (Thế Giới Tương Lai): Một cậu bé tìm kiếm một khu đất hoang trên thế giới trong tương lai để chữa bệnh cho người mẹ sắp chết của mình.', 152, 1, '2016-07-13', 'HD', '1080', 8.0, 'The Mercy (2018)', 0, 2016, 1, 1, 0, 1, NULL, 0, '2018-07-28 02:20:04', '2018-07-28 02:29:12', 1),
(85, 'CÚ NÉM KINH ĐIỂN', 'cu-nem-kinh-dien', '0', 'split', '2018-07/672b079b338090ea7f2c7dae1fd308f9.jpg', '2018-07/2d6a2ca99f0b9139cdac3af1f58e8fc6.jpg', 'Cheese in the Trap Movie (Bẫy Tình Yêu Bản Điện Ảnh): Sau khi làm mưa làm gió mùa Valentine năm 2016, kịch bản tình yêu trường đại học của Cheese In The Trap một lần nữa lại được dựng thành phim để chiếu trên màn ảnh rộng. Bản thân bộ truyện cùng tên vốn đã cực kỳ nổi tiếng trên mạng xã hội Hàn Quốc', 152, 1, '2016-07-07', 'HD', '1080', 6.0, 'Chưa rõ', 0, 2016, 1, 1, 0, 1, NULL, 0, '2018-07-28 02:24:44', '2018-07-28 02:29:12', 1),
(87, 'That girl', 'that-girl', '0', 'That girl', '2018-07/4f748e561609395fd414d5e6f8de50f1.jpg', '2018-07/b21b6891e2ae0da9bcf49f26e39fff03.jpg', 'Phim Future World (Thế Giới Tương Lai): Một cậu bé tìm kiếm một khu đất hoang trên thế giới trong tương lai để chữa bệnh cho người mẹ sắp chết của mình.', 123, 1, '2016-07-14', 'HD', '1080', 6.0, 'Chưa rõ', 0, 2016, 1, 1, 0, 1, NULL, 0, '2018-07-28 02:27:46', '2018-07-28 02:29:12', 1),
(88, 'HUYỀN THOẠI PELÉ', 'huyen-thoai-pele', '0', 'Pelé: Birth of a Legend (2016)', '2018-07/726cabeb7ac24161664cb794b9d77f55.jpg', '2018-07/faf33969bb352f4012b3a59a15a699f9.jpg', 'Pelé: Birth of a Legend (2016)', 132, 1, '2016-07-13', 'HD', '1080', 9.0, 'Imagine Entertainment, Seine Pictures, Zohar International', 0, 2016, 1, 0, 0, 1, NULL, 0, '2018-07-28 02:32:49', '2018-07-28 04:13:29', 1),
(89, 'ANH TÔI VÔ SỐ TỘI', 'anh-toi-vo-so-toi', '0', 'My Annoying Brother / Brother (2016', '2018-07/05608d112337fa16037de79b620d099e.jpg', '2018-07/564ea99c0ae380c1e26bad5c7210083b.jpg', 'My Annoying Brother / Brother (2016', 152, 1, '2016-07-20', 'HD', '1080', 6.0, 'My Annoying Brother', 0, 2016, 1, 0, 0, 1, NULL, 0, '2018-07-28 02:34:39', '2018-07-28 04:13:29', 1),
(90, 'CHUYẾN LƯU DIỄN KỲ QUẶC', 'chuyen-luu-dien-ky-quac', '0', 'David Brent: Life on the Road (2016)', '2018-07/73df37b88f66215e32e94687a12ccc98.jpg', '2018-07/a66f43a40ed6226daf1c6ac98cf87c30.jpg', 'David Brent: Life on the Road (2016)', 156, 1, '2016-07-12', 'HD', '1080', 7.0, 'David Brent', 0, 2016, 1, 0, 0, 1, NULL, 0, '2018-07-28 02:41:51', '2018-07-28 04:13:29', 1),
(91, 'CHUYẾN BAY KỲ QUẶC', 'chuyen-bay-ky-quac', '0', 'Fasten Your Seatbelt / Roller Coaster (2013)', '2018-07/ecf773b05c0451abfc6db6873a5bb9a8.jpg', '2018-07/910b192babae835cc3b7e0618f6453de.jpg', 'Fasten Your Seatbelt / Roller Coaster (2013)', 126, 1, '2016-07-11', 'HD', '1080', 7.0, 'Fasten Your Seatbelt', 1, 2016, 1, 0, 0, 1, NULL, 0, '2018-07-28 02:43:54', '2018-07-28 04:13:29', NULL),
(128, 'ĐỔ THÀNH PHONG VÂN 2', 'do-thanh-phong-van-2', '0', 'From Vegas to Macau II (2015)', '2018-07/c5326428d5f52f0c311ee198413da32f.jpg', '2018-07/2becd654d78ebde676009b7cdf0b972a.jpg', 'Tài tử gạo cội vào vai Thạch Nhất Kiên – tay chơi bạc không có địch thủ. Anh được mời tham gia một cuộc truy quét tội phạm quy mô lớn. Trong quá trình này, Nhất Kiên gặp lại Mạc Sầu (Gia Linh đóng) – người mà anh yêu thương nhất. Tình cảm lại bùng cháy giữa hai người.', 111, 1, '2015-02-19', 'SD', '480', 5.0, 'Bona International Film Group, Media Asia Films, Mega-Vision Pictures (MVP)', 0, 2015, 0, 1, 0, 1, 1, 0, '2018-07-28 01:31:26', '2018-07-30 08:29:48', NULL),
(129, 'Oan hồn trong phòng', 'oan-hon-trong-phong', '0', 'Bong Srolanh Oun (2015)', '2018-07/fa97ecd75cd59f5762b036083bb5df58.jpg', '2018-07/ac10d2c25c75a0898ab47d7c384d42b7.jpg', 'Dol, là một nhà thiết kế đồ họa tuổi đời còn trẻ, anh quyết định dọn đến một căn hộ sống riêng mình. Từ khi dọn đến căn hộ, anh cảm thấy như trong căn phòng còn có một ai khác, làm anh cảm thấy lo lắng. Sau đó, Dol cảm thấy tự hỏi về những điều kì lạ xảy ra trong phòng của mình, nên đã quyết định đi tìm sự thật. Anh hỏi về người đã thuê căn hộ trước đó mới phát hiện là do một cô gái trẻ thuê để ở, nhưng cô ấy đã biến mất một cách bí ẩn...', 86, 1, '2015-02-20', 'HD', '720', 6.0, 'Chưa rõ', 2, 2015, 0, 1, 0, 1, 1, 0, '2018-07-28 01:58:06', '2018-07-30 08:29:48', NULL),
(130, 'Giải cứu ông chủ Ngô', 'giai-cuu-ong-chu-ngo', '0', 'Saving Mr. Wu (2015)', '2018-07/29c6184b2491cf47ec308dc65d8b6395.jpg', '2018-07/59fc141086dd0702bb0d64f023747d6b.jpg', 'Một đêm trong kỳ nghỉ Tết, tại quán bar ở trung tâm thành phố ồn ào náo nhiệt, ông Ngô (Lưu Đức Hoa thủ vai) – ngôi sao điện ảnh Hongkong – vừa bước ra khỏi bar đã bị một đám người giả mạo cảnh sát của Trương Hoa (Vương Thiên Nguyên thủ vai) bắt cóc, đưa đến một ngôi nhà nhỏ ở vùng ngoại ô hẻo lánh. Ông Ngô bất ngờ phát hiện ra bọn bắt cóc còn bắt một con tin khác tên là Tiểu Đậu ( Sái Lộc thủ vai), sau cuộc đàm phán với Trương hoa, ông Ngô đã cứu được Tiểu Ngô từ cõi chết trở về.', 90, 1, '2015-09-30', 'HD', '720', 7.0, 'Chưa rõ', 32, 2015, 0, 1, 0, 1, 1, 0, '2018-07-28 02:07:12', '2018-07-30 09:17:25', NULL),
(131, 'Trùm bài (Lá bài số phận)', 'trum-bai-la-bai-so-phan', '0', 'Wild Card (2015)', '2018-07/da2e079bd70c7e3c5d5c5bc2aeeed871.jpg', '2018-07/42b29ff2cf140c60eb7c6ed1a28484ce.jpg', 'Bộ phim TRÙM BÀI bắt đầu bởi khung cảnh đầu đông của thành phố Las Vegas phồn hoa, nơi những con bạc lao mình vào những cuộc chơi đỏ đen xa xỉ và bất tận. Nick Wild (do Jason Statham thủ vai) là một cựu quân nhân đang kiếm sống bằng nghề bảo vệ tại sòng bài Las Vegas. Anh cũng từng là một tay chơi bạc có tiếng và vướng vào không ít rắc rối về các khoản nợ nần hay ẩu đả với các dân chơi.', 92, 1, '2015-01-31', 'HD', '720', 5.0, 'Lionsgate, SJ Heat Productions, Sierra / Affinity', 0, 2015, 0, 1, 0, 1, 1, 0, '2018-07-28 02:15:36', '2018-07-30 08:29:48', NULL),
(132, 'Kiếm Rồng', 'kiem-rong', '0', 'Dragon Blade (2015)', '2018-07/7986a28b4848c7ce8093d388259e1fd1.jpg', '2018-07/5759cf29a09684f534585d9820214607.jpg', 'Phim Kiếm Rồng lấy bối cảnh diễn ra dưới thời Tây Hán, phim xoay quanh câu chuyện của đại tướng quân Hoắc An (Thành Long) với sứ mệnh bảo vệ sự bình yên cho các nước chư hầu ở Tây Vực. Với tài năng, sự kiên trung và tình yêu hòa bình, Hoắc An đã liên kết với các huynh đệ từng vào sinh ra tử với mình lập nên liên minh “Quyết tử cho hòa bình”.', 126, 1, '2015-02-19', 'HD', '720', 9.0, 'Sparkle Roll Media, Huayi Brothers Media, Shanghai Film Group', 3, 2015, 0, 1, 0, 1, 1, 0, '2018-07-28 02:21:06', '2018-07-30 08:29:48', NULL),
(133, 'Người Phán Xử', 'nguoi-phan-xu', '0', 'Người Phán Xử', '2018-07/16321d23a85bd088709e51befdb72e52.jpg', '2018-07/a8a7df2af3ee105f63089eb0a20b0b3a.jpg', 'Người Phán Xử là bộ phim được Việt hóa từ kịch bản phim của Israel với nhiều tình tiết kịch tính, hấp dẫn, song có sự điều chỉnh nội dung một cách uyển chuyển để phù hợp với đời sống xã hội và thị hiếu khán giả Việt. Phim là một bức tranh đa chiều về hành trình chống tội phạm và cuộc chiến giành quyền lực trong giới giang hồ hiện đại, tiếp nối loạt phim Cảnh sát hình sự đã ghi dấu ấn với khán giả VTV. Nói đến loạt phim Cảnh sát hình sự là nhắc đến cuộc chiến chống tội phạm của các chiến sĩ cảnh sát', 47, 1, NULL, 'HD', '720', 7.0, 'Việt Nam', 0, 2017, 0, 0, 1, 1, 47, 0, '2018-07-28 02:42:15', '2018-07-30 08:29:48', NULL),
(134, 'Cưỡng Đoạt: Phần 2', 'cuong-doat-phan-2', '0', 'Taken: Season 2', '2018-07/3c0a1770a7e17ccd134b3c9096bbbfa8.jpg', '2018-07/4a022cb584820aa95c9dd7b78cb02e95.jpg', 'Bạn vẫn nhớ loạt phim Taken siêu đình đám của thánh Liam Neeson và câu thoại thần thánh được chế thành meme khắp nơi chứ? Phiên bản reboot này của Taken kể về quá trình làm việc cho CIA và gầy dựng \"những kĩ năng cần thiết\" của Bryan Mills (để đặng sau này còn đi cứu con gái). Với sự góp mặt của trai đẹp Clive Standen, phiên bản reboot này hứa hẹn những pha hành động hoành tráng và cả những vụ giải cứu con nhà người khác hấp dẫn không kém loạt phim gốc.', 45, 1, '2018-08-09', 'SD', '480', 5.0, 'Good Universe, New Line Cinema, Point', 0, 2018, 1, 0, 1, 1, 16, 0, '2018-07-28 08:53:13', '2018-07-30 08:29:48', NULL),
(135, 'Dì Mick Phần 1', 'di-mick-phan-1', '0', 'The Mick Season 1', '2018-07/c46b07bc1fa22ac291c3da11316c88ba.jpg', '2018-07/b235b9e15672ffad9df442ee8d0db3c9.jpg', 'Mackenzie \"Mickey\" Molng, một phụ nữ vô trách nhiệm, di chuyển từ Warwick, Rhode Island đến Greenwich, Connecticut. Cô trở thành người giám hộ của cha mẹ cho cháu gái và cháu trai của cô sau khi cô con gái đáng yêu và giàu có Poodle và Christopher chồng cô bị FBI bắt giữ vì gian lận và trốn thuế. Sau một ngày xem ba đứa trẻ (Sabrina, Chip, và Ben), Mickey nhận được cuộc gọi từ Poodle nói với cô ấy rằng cô ấy và Christopher đang chạy trốn khỏi đất nước. Kết quả là, Mickey đấu tranh để nuôi ba đứa trẻ với sự giúp đỡ từ bạn trai giả trai Jimmy của cô và người quản gia Alba, trong khi dâng lên với người hàng xóm Liz.', 45, 1, '2018-07-11', 'HD', '1080', 8.0, 'Nordisk Film Production AS, Zwart', 2, 2018, 1, 0, 1, 1, 17, 0, '2018-07-28 08:56:07', '2018-07-30 08:29:48', NULL),
(136, 'Khu Phố Vui Nhộn: Hổ Phụ Sinh Hổ Nữ', 'khu-pho-vui-nhon-ho-phu-sinh-ho-nu', '0', 'Ban Saran Land: Suparburoot Sut Soi', '2018-07/e0afbda0f9143f67311616db1cbc71d3.jpg', '2018-07/2b9fa7f994f9fca394c97fb00ddd73b9.jpg', 'Khu Phố Vui Nhộn (Ban Saran Land) là phim Sitcom hài tình huống. Câu chuyện hài hước vui nhộn về 4 gia đình trong Khu Phố Saran Land. Câu chuyện 1: Cuộc Chiến Tình Yêu: Khi tình cờ gặp lại người yêu cũ bạn sẽ làm gì? Cuộc chiến người tình cũ sẽ không có hồi kết được nổ ra. Câu chuyện 2: Những Ông Bố Độc Thân: Khi 3 chàng độc thân bị quẳng cho đứa bé gái 5 tuổi để chăm sóc. Họ phải làm gì để vượt qua nghịch cảnh trớ trêu này? Câu chuyện 3: Cô Nàng Ế Ẩm: Khi cô nàng cho rằng tình yêu thật là một thứ vô vị, lãng phí thời gian thì phải làm sao để cải tổ tư duy cho cô nàng nhận ra tình yêu đích thực trên đời đây? Câu chuyện 4: Ngôi Nhà Tràn Ngập Tình Yêu: Cặp vợ chồng mới cưới được 7 ngày thì nhà bị cháy nên phải chuyển đến sống tại Khu phố Saran Land. Liệu họ sẽ hòa nhập với nơi ở mới như thế nào đây? Mỗi ngày là một câu chuyện hài hước của mỗi gia đình khác nhau. Ban Saran Land: Suparburoot Sut Soi (Khu Phố Vui Nhộn: Hổ Phụ Sinh Hổ Nữ): kể về 3 anh em trong một gia đình gồm Earth (R Arnattapon đóng), Win (Tao Phiangphor đóng) và Sun (March Chutavuth đóng). Earth là anh cả mắc chứng bệnh sạch sẽ và có hơi “gay”, Win là anh ba tính tình phóng túng dẫn phụ nữ về nhà và ngủ ngay trên sofa ngoài phòng khách, Sun là em út tính tình hài hước và chưa có suy nghĩ chín chắn. Đột nhiên có một ngày không biết từ đâu xuất hiện một cô em gái 5 tuổi bắt họ phải chăm sóc cho cô bé. Liệu trong gia đình này sẽ xảy ra những chuyện thú vị gì đây?', 45, 1, '2018-07-18', 'HD', '1080', 8.0, 'Nordisk Film Production AS, Zwart', 5, 2018, 1, 0, 1, 1, 22, 0, '2018-07-28 09:03:43', '2018-07-30 08:46:06', NULL),
(137, 'Kiêu Hãnh Và Định Kiến', 'kieu-hanh-va-dinh-kien', '0', 'Mia', '2018-07/77a7fa3107873917ff4752277103b63e.jpg', '2018-07/d4bc7dcae69ac1c716ca08e0db9c40f5.jpg', 'Bộ phim Kiêu Hãnh Và Định Kiến (Mia) xoay quanh câu chuyện vợ chồng của Aruna (Bee Namthip) và Tada (Pong Nawat). Sau khi kết hôn, Aruna đã chấp nhận từ bỏ công việc văn phòng để ở nhà chăm sóc cho Tada và cô con gái nhỏ. Rồi trái ngang xảy đến khi em họ của Aruna là Kunya xin chuyển tới sống cùng. Đó là tác nhân làm nảy sinh mối quan hệ bất chính giữa Kunya và Tada. Tuy nhiên, lúc đó duyên số đã khiến Aruna gặp được Vasin, một chàng CEO trẻ tuổi. Vasin cố gắng thuyết phục Aruna từ bỏ cuộc sống nội trợ để quay lại với công việc. Vasin làm mọi cách để Aruna đổi ý. Tuy nhiên, anh đặt ra một điều kiện là Aruna phải ly hôn trước khi tới công ty anh làm. Liệu câu chuyện sẽ đi về đâu? Aruna sẽ chọn tha thứ cho người chồng phản bội hay bắt đầu một cuộc sống mới với chàng CEO điển trai?', 45, 1, '2018-08-22', 'HD', '1080', 5.0, 'Thái', 0, 2018, 1, 0, 1, 1, 55, 0, '2018-07-28 09:16:35', '2018-07-30 08:29:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `film_language`
--

CREATE TABLE `film_language` (
  `language_id` int(10) UNSIGNED NOT NULL,
  `film_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `film_language`
--

INSERT INTO `film_language` (`language_id`, `film_id`, `created_at`, `updated_at`) VALUES
(17, 49, NULL, NULL),
(18, 49, NULL, NULL),
(17, 50, NULL, NULL),
(18, 51, NULL, NULL),
(17, 52, NULL, NULL),
(18, 52, NULL, NULL),
(18, 53, NULL, NULL),
(17, 54, NULL, NULL),
(18, 54, NULL, NULL),
(17, 55, NULL, NULL),
(18, 55, NULL, NULL),
(17, 56, NULL, NULL),
(18, 57, NULL, NULL),
(17, 58, NULL, NULL),
(17, 59, NULL, NULL),
(18, 60, NULL, NULL),
(17, 62, NULL, NULL),
(17, 63, NULL, NULL),
(17, 64, NULL, NULL),
(18, 65, NULL, NULL),
(18, 66, NULL, NULL),
(17, 67, NULL, NULL),
(17, 68, NULL, NULL),
(17, 69, NULL, NULL),
(18, 69, NULL, NULL),
(18, 71, NULL, NULL),
(17, 74, NULL, NULL),
(17, 75, NULL, NULL),
(17, 76, NULL, NULL),
(17, 77, NULL, NULL),
(18, 77, NULL, NULL),
(17, 79, NULL, NULL),
(18, 79, NULL, NULL),
(18, 80, NULL, NULL),
(17, 81, NULL, NULL),
(17, 82, NULL, NULL),
(17, 83, NULL, NULL),
(18, 83, NULL, NULL),
(17, 84, NULL, NULL),
(18, 84, NULL, NULL),
(17, 85, NULL, NULL),
(18, 85, NULL, NULL),
(17, 87, NULL, NULL),
(18, 87, NULL, NULL),
(17, 88, NULL, NULL),
(18, 88, NULL, NULL),
(18, 89, NULL, NULL),
(17, 90, NULL, NULL),
(18, 90, NULL, NULL),
(17, 91, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `film_tag`
--

CREATE TABLE `film_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `film_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `film_tag`
--

INSERT INTO `film_tag` (`id`, `film_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(46, 49, 47, NULL, NULL),
(47, 50, 48, NULL, NULL),
(48, 51, 49, NULL, NULL),
(49, 52, 50, NULL, NULL),
(50, 52, 51, NULL, NULL),
(51, 53, 52, NULL, NULL),
(52, 54, 53, NULL, NULL),
(53, 54, 54, NULL, NULL),
(54, 55, 55, NULL, NULL),
(55, 56, 56, NULL, NULL),
(56, 57, 57, NULL, NULL),
(57, 58, 58, NULL, NULL),
(58, 59, 59, NULL, NULL),
(59, 60, 60, NULL, NULL),
(60, 61, 61, NULL, NULL),
(61, 62, 62, NULL, NULL),
(62, 63, 63, NULL, NULL),
(63, 64, 64, NULL, NULL),
(64, 65, 65, NULL, NULL),
(65, 66, 66, NULL, NULL),
(66, 67, 67, NULL, NULL),
(67, 68, 68, NULL, NULL),
(68, 69, 69, NULL, NULL),
(69, 70, 70, NULL, NULL),
(70, 70, 71, NULL, NULL),
(71, 71, 72, NULL, NULL),
(72, 72, 73, NULL, NULL),
(73, 73, 74, NULL, NULL),
(74, 74, 75, NULL, NULL),
(75, 75, 76, NULL, NULL),
(76, 76, 77, NULL, NULL),
(77, 77, 78, NULL, NULL),
(78, 77, 79, NULL, NULL),
(79, 77, 80, NULL, NULL),
(80, 78, 81, NULL, NULL),
(81, 79, 82, NULL, NULL),
(82, 80, 83, NULL, NULL),
(83, 81, 84, NULL, NULL),
(84, 82, 85, NULL, NULL),
(85, 83, 86, NULL, NULL),
(86, 84, 87, NULL, NULL),
(87, 87, 88, NULL, NULL),
(88, 88, 89, NULL, NULL),
(89, 88, 90, NULL, NULL),
(90, 88, 91, NULL, NULL),
(91, 89, 92, NULL, NULL),
(92, 91, 93, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `slug`, `created_at`, `updated_at`) VALUES
(17, 'Thuyết Minh', 'thuyet-minh', '2018-07-27 03:15:05', '2018-07-27 03:15:05'),
(18, 'Phụ Đề', 'phu-de', '2018-07-27 03:15:15', '2018-07-27 03:15:15'),
(19, 'No sub', 'no-sub', '2018-07-27 03:15:26', '2018-07-27 03:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `link_films`
--

CREATE TABLE `link_films` (
  `id` int(10) UNSIGNED NOT NULL,
  `film_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'xem phim',
  `type` tinyint(4) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `link_films`
--

INSERT INTO `link_films` (`id`, `film_id`, `description`, `type`, `link`, `created_at`, `updated_at`) VALUES
(2, 49, 'xem phim', 3, 'https://www.youtube.com/embed/zl0s1ahHVb4', '2018-07-28 03:24:35', '2018-09-05 13:44:57'),
(3, 50, 'xem phim', 3, 'https://www.youtube.com/embed/zl0s1ahHVb4', '2018-07-28 03:26:35', '2018-09-05 13:43:54'),
(4, 51, 'xem phim', 3, 'https://www.youtube.com/embed/zl0s1ahHVb4', '2018-07-28 03:27:30', '2018-09-05 13:45:02'),
(5, 52, 'xem phim', 3, 'https://www.youtube.com/embed/zl0s1ahHVb4', '2018-07-28 03:29:35', '2018-09-05 13:45:07'),
(6, 53, 'xem phim', 3, 'https://www.youtube.com/embed/zl0s1ahHVb4', '2018-07-28 03:30:19', '2018-09-05 13:45:13'),
(7, 54, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_639161129794534_3201667028452638720_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=701&oh=1bcf05332e8f1fbc230b17898e1fe9fd&oe=5B5E4CD4', '2018-07-28 03:31:23', '2018-07-28 03:31:23'),
(8, 55, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_214040295971345_4108127568559865856_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=378&oh=a40636431d7b5ecb1f2f22b5510f7e1f&oe=5B5DDEEF', '2018-07-28 03:41:46', '2018-07-28 03:41:46'),
(9, 56, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_417960478717013_2131743602177474560_n.mp4?_nc_cat=0&efg=eyJybHIiOjMwMCwicmxhIjo0MDk2LCJ2ZW5jb2RlX3RhZyI6InByZW11dGVfc3ZlX3NkIn0%3D&rl=300&vabr=153&oh=9ffa70cc06f1bd5318bbdf5f96e737ba&oe=5B5ECD56', '2018-07-28 03:42:34', '2018-07-28 03:42:34'),
(10, 57, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_418579558549985_505596691022348288_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=991&oh=f381b5972bbcf71aaa526aff9253348d&oe=5B5DCC5A', '2018-07-28 03:43:18', '2018-07-28 03:43:18'),
(11, 58, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_248968872495015_8838574921689858048_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=669&oh=19d5522f36a9a0873966ffe04a5edb31&oe=5B5EDBDD', '2018-07-28 03:43:53', '2018-07-28 03:43:53'),
(12, 59, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_504056796699511_9144844031635750912_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=544&oh=2cd09ccba3b681d42f9cdbddbb2ad165&oe=5B5EF711', '2018-07-28 03:44:40', '2018-07-28 03:44:40'),
(13, 60, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_2119365371685641_4968223258101940224_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=861&oh=61fb5290f39eaf4b8b4f88204d29e369&oe=5B5E07CC', '2018-07-28 03:45:40', '2018-07-28 03:45:40'),
(14, 61, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_233406170637604_1391600344848400384_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=697&oh=5c31ea50d16fd998e6f477045b10aca8&oe=5B5DDAE1', '2018-07-28 03:46:27', '2018-07-28 03:46:27'),
(15, 62, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_231714794139085_2571615302022332416_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=827&oh=4698bddc4a9875e25732987a3783ad0e&oe=5B5EEAA9', '2018-07-28 03:47:19', '2018-07-28 03:47:19'),
(16, 63, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_500718327037897_7282107610029883392_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=838&oh=45aa9ceb87e4bb4c37fe53d64ad0f88f&oe=5B5DD035', '2018-07-28 03:48:03', '2018-07-28 03:48:03'),
(17, 64, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_2006678212976568_5302734513913200640_n.mp4?_nc_cat=0&efg=eyJybHIiOjE4MjUsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1825&vabr=1217&oh=fcd3c30efdb0a6179f910fc3a9a80357&oe=5B5DF9E2', '2018-07-28 03:48:29', '2018-07-28 03:48:29'),
(18, 65, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_1839448106118968_885616565603532800_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=623&oh=694151f1571952f220ab8182bca725c7&oe=5B5E0499', '2018-07-28 03:48:52', '2018-07-28 03:48:52'),
(19, 66, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_632665723783551_3945273962157572096_n.mp4?_nc_cat=0&efg=eyJybHIiOjM5NCwicmxhIjo0MDk2LCJ2ZW5jb2RlX3RhZyI6InNkIn0%3D&rl=394&vabr=219&oh=f984dd528649accd8365838215ecd31e&oe=5B5EEAE2', '2018-07-28 03:49:25', '2018-07-28 03:49:25'),
(20, 67, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_417558852086282_5664727190982361088_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=681&oh=2704d9b0c6ad41c1f40c083538b8f041&oe=5B5E188F', '2018-07-28 03:50:31', '2018-07-28 03:50:31'),
(21, 68, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_1728120867305464_2278836748777684992_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=728&oh=fb0feab3417e66ff658a93a7298e4efd&oe=5B5DB978', '2018-07-28 04:02:06', '2018-07-28 04:02:06'),
(22, 69, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_264103851039487_8184513464786485248_n.mp4?_nc_cat=0&efg=eyJybHIiOjMwMCwicmxhIjo0MDk2LCJ2ZW5jb2RlX3RhZyI6InNkIn0%3D&rl=300&vabr=140&oh=757ee5a4fa19fcfa47a2f50bca642138&oe=5B5EDAC7', '2018-07-28 04:03:15', '2018-07-28 04:03:15'),
(23, 70, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_860619460798781_1398046914666037248_n.mp4?_nc_cat=0&efg=eyJybHIiOjE2MDIsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1602&vabr=1068&oh=d278330866860b348a22850389712baa&oe=5B5DE3A5', '2018-07-28 04:03:52', '2018-07-28 04:03:52'),
(24, 71, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_1890046664352016_1149107612302704640_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=681&oh=062f63d7a1e53f50b8ef5efc334b8daa&oe=5B5E14F2', '2018-07-28 04:05:06', '2018-07-28 04:05:06'),
(25, 72, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_1890046664352016_1149107612302704640_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=681&oh=062f63d7a1e53f50b8ef5efc334b8daa&oe=5B5E14F2', '2018-07-28 04:05:26', '2018-07-28 04:05:26'),
(26, 73, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_1890046664352016_1149107612302704640_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=681&oh=062f63d7a1e53f50b8ef5efc334b8daa&oe=5B5E14F2', '2018-07-28 04:05:40', '2018-07-28 04:05:40'),
(27, 73, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_1890046664352016_1149107612302704640_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=681&oh=062f63d7a1e53f50b8ef5efc334b8daa&oe=5B5E14F2', '2018-07-28 04:05:53', '2018-07-28 04:05:53'),
(28, 74, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_1890046664352016_1149107612302704640_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=681&oh=062f63d7a1e53f50b8ef5efc334b8daa&oe=5B5E14F2', '2018-07-28 04:06:05', '2018-07-28 04:06:05'),
(29, 75, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_1890046664352016_1149107612302704640_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=681&oh=062f63d7a1e53f50b8ef5efc334b8daa&oe=5B5E14F2', '2018-07-28 04:06:18', '2018-07-28 04:06:18'),
(30, 76, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_1890046664352016_1149107612302704640_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=681&oh=062f63d7a1e53f50b8ef5efc334b8daa&oe=5B5E14F2', '2018-07-28 04:06:31', '2018-07-28 04:06:31'),
(31, 78, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_1890046664352016_1149107612302704640_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=681&oh=062f63d7a1e53f50b8ef5efc334b8daa&oe=5B5E14F2', '2018-07-28 04:06:44', '2018-07-28 04:06:44'),
(32, 77, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_1882365512059917_3966602387497418752_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=718&oh=a91f81b8eaaf352076e9d2d1d07ac5bc&oe=5B5EF056', '2018-07-28 04:07:41', '2018-07-28 04:07:41'),
(33, 79, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_1882365512059917_3966602387497418752_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=718&oh=a91f81b8eaaf352076e9d2d1d07ac5bc&oe=5B5EF056', '2018-07-28 04:07:52', '2018-07-28 04:07:52'),
(34, 80, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_388613644996979_2944612127685476352_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=804&oh=ee54eba077c621abe6fa0f3cd8bcea02&oe=5B5DDE57', '2018-07-28 04:08:02', '2018-07-28 04:08:02'),
(35, 81, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_437950806711446_6588440125091348480_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=507&oh=578b4dbecd8fd204d856e8fc2c702731&oe=5B5D14C4', '2018-07-28 04:08:18', '2018-07-28 04:08:18'),
(36, 82, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_1882365512059917_3966602387497418752_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=718&oh=a91f81b8eaaf352076e9d2d1d07ac5bc&oe=5B5EF056', '2018-07-28 04:08:29', '2018-07-28 04:08:29'),
(37, 83, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_437950806711446_6588440125091348480_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=507&oh=578b4dbecd8fd204d856e8fc2c702731&oe=5B5D14C4', '2018-07-28 04:08:40', '2018-07-28 04:08:40'),
(38, 84, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_388613644996979_2944612127685476352_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=804&oh=ee54eba077c621abe6fa0f3cd8bcea02&oe=5B5DDE57', '2018-07-28 04:09:00', '2018-07-28 04:09:00'),
(39, 85, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_214040295971345_4108127568559865856_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=378&oh=a40636431d7b5ecb1f2f22b5510f7e1f&oe=5B5DDEEF', '2018-07-28 04:09:10', '2018-07-28 04:09:10'),
(40, 87, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_437950806711446_6588440125091348480_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=507&oh=578b4dbecd8fd204d856e8fc2c702731&oe=5B5D14C4', '2018-07-28 04:09:20', '2018-07-28 04:09:20'),
(41, 88, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_1882365512059917_3966602387497418752_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=718&oh=a91f81b8eaaf352076e9d2d1d07ac5bc&oe=5B5EF056', '2018-07-28 04:09:37', '2018-07-28 04:09:37'),
(42, 89, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_437950806711446_6588440125091348480_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=507&oh=578b4dbecd8fd204d856e8fc2c702731&oe=5B5D14C4', '2018-07-28 04:09:46', '2018-07-28 04:09:46'),
(43, 90, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_231974444118068_2864736215700078592_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=520&oh=e128eaaf4c1d7421245c7845b1914cbe&oe=5B5DE669', '2018-07-28 04:09:54', '2018-07-28 04:09:54'),
(44, 91, 'xem phim', 3, 'https://video.xx.fbcdn.net/v/t42.9040-2/10000000_1890046664352016_1149107612302704640_n.mp4?_nc_cat=0&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=681&oh=062f63d7a1e53f50b8ef5efc334b8daa&oe=5B5E14F2', '2018-07-28 04:10:02', '2018-07-28 04:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Thêm phim mới', 'them-phim-moi', 'Có thể thêm phim mới', '2018-07-17 15:05:29', '2018-07-18 21:57:49'),
(2, 'Sửa phim', 'sua-phim', 'Có thể sửa phim', '2018-07-17 15:05:29', '2018-07-18 21:56:05'),
(4, 'Xóa phim', 'xoa-phim', 'Có thể xóa phim', '2018-07-17 15:05:29', '2018-07-18 21:53:25'),
(5, 'Xem thông tin phim', 'xem-thong-tin-phim', 'Có thể xem thông tin', '2018-07-17 15:05:29', '2018-07-18 21:58:31'),
(6, 'Quản lý thành viên quản trị', 'quan-ly-thanh-vien-quan-tri', 'Có thể thêm, cấp quyền, xem thông tin, khóa, mở khóa và xóa tài khoản thành viên quản trị', '2018-07-17 15:05:29', '2018-07-18 22:03:56'),
(11, 'Quản lý khách đăng nhập', 'quan-ly-khach-dang-nhap', 'Có thể xóa hoặc khóa tài khoản khách đăng nhập', '2018-07-17 15:10:32', '2018-07-18 22:01:14'),
(13, 'Quản lý bình luận', 'quan-ly-binh-luan', 'Quản lý bình luận của khách đăng nhập như duyệt và xóa bình luận', '2018-07-17 15:11:31', '2018-07-18 22:00:31'),
(20, 'Duyệt phim', 'duyet-phim', 'Có thể duyệt các phim khi post lên', '2018-07-18 15:38:24', '2018-07-24 08:08:37'),
(34, 'Quản lý danh mục phim', 'quan-ly-danh-muc-phim', 'Quản lý các quyền như thêm, sửa, xóa danh mục phim', '2018-07-18 21:29:09', '2018-07-18 21:29:09'),
(35, 'Quản lý phân quyền quản trị', 'quan-ly-phan-quyen-quan-tri', 'Thêm, chỉnh sửa quyền quản trị', '2018-07-18 22:06:02', '2018-07-18 22:25:57'),
(36, 'Quản lý các danh mục khác', 'quan-ly-cac-danh-muc-khac', 'Quản lý các danh mục link phim, thẻ tags, quốc gia, ngôn ngữ, diễn viên, đạo diễn', '2018-07-18 22:07:27', '2018-07-18 22:07:27'),
(37, 'Cập nhật phim', 'cap-nhat-phim', 'cap-nhat-phim', '2018-09-05 13:07:31', '2018-09-05 13:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(47, 'Thế Giới Tương Lai', 'the-gioi-tuong-lai', '2018-07-27 03:18:15', '2018-07-27 03:18:15'),
(48, 'Cuộc Chiến Kim Cương Xanh', 'cuoc-chien-kim-cuong-xanh', '2018-07-27 03:28:07', '2018-07-27 03:28:07'),
(49, 'Khalid Benchagra', 'khalid-benchagra', '2018-07-27 03:38:57', '2018-07-27 03:38:57'),
(50, 'Rawson Marshall Thurber', 'rawson-marshall-thurber', '2018-07-27 03:42:59', '2018-07-27 03:42:59'),
(51, 'Tòa Tháp Chọc Trời', 'toa-thap-choc-troi', '2018-07-27 03:42:59', '2018-07-27 03:42:59'),
(52, 'lãng mạn', 'lang-man', '2018-07-27 03:48:23', '2018-07-27 03:48:23'),
(53, 'Duck Duck Goose', 'duck-duck-goose', '2018-07-27 03:53:40', '2018-07-27 03:53:40'),
(54, 'Ngỗng Vịt Phiêu Lưu Ký', 'ngong-vit-phieu-luu-ky', '2018-07-27 03:53:40', '2018-07-27 03:53:40'),
(55, 'Ghost Stories (2018)', 'ghost-stories-2018', '2018-07-27 03:57:52', '2018-07-27 03:57:52'),
(56, 'The Mercy (2018)', 'the-mercy-2018', '2018-07-27 04:00:32', '2018-07-27 04:00:32'),
(57, 'Chiến Thần Ký', 'chien-than-ky', '2018-07-27 04:03:19', '2018-07-27 04:03:19'),
(58, 'Bang Mi Jung', 'bang-mi-jung', '2018-07-27 04:05:45', '2018-07-27 04:05:45'),
(59, 'The Swimmers', 'the-swimmers', '2018-07-27 04:08:54', '2018-07-27 04:08:54'),
(60, 'A Haunted House 2', 'a-haunted-house-2', '2018-07-27 04:15:23', '2018-07-27 04:15:23'),
(61, 'Ghost in the Shell Arise', 'ghost-in-the-shell-arise', '2018-07-27 04:19:56', '2018-07-27 04:19:56'),
(62, 'Nhạc Tiểu Quân', 'nhac-tieu-quan', '2018-07-27 07:00:11', '2018-07-27 07:00:11'),
(63, 'The Kissing Booth', 'the-kissing-booth', '2018-07-27 07:43:00', '2018-07-27 07:43:00'),
(64, 'Operation Red Sea', 'operation-red-sea', '2018-07-27 07:47:18', '2018-07-27 07:47:18'),
(65, 'Sứ Mệnh Xuyên Không', 'su-menh-xuyen-khong', '2018-07-27 07:55:05', '2018-07-27 07:55:05'),
(66, 'Đội Anh Hùng Nhí', 'doi-anh-hung-nhi', '2018-07-27 07:59:57', '2018-07-27 07:59:57'),
(67, 'Scooby Doo Batman The Brave and the Bold', 'scooby-doo-batman-the-brave-and-the-bold', '2018-07-27 08:03:20', '2018-07-27 08:03:20'),
(68, 'Cảnh Sát Người Máy', 'canh-sat-nguoi-may', '2018-07-27 08:10:39', '2018-07-27 08:10:39'),
(69, 'Giải Mã Mê Cung', 'giai-ma-me-cung', '2018-07-27 08:13:45', '2018-07-27 08:13:45'),
(70, 'Pettson and Findus A Little Nuisance a Great Friendship', 'pettson-and-findus-a-little-nuisance-a-great-friendship', '2018-07-27 08:17:32', '2018-07-27 08:17:32'),
(71, 'Một Phiền Toái Nhỏ Một Tình Bạn Lớn', 'mot-phien-toai-nho-mot-tinh-ban-lon', '2018-07-27 08:17:32', '2018-07-27 08:17:32'),
(72, 'Yukina Hiiro', 'yukina-hiiro', '2018-07-27 08:26:15', '2018-07-27 08:26:15'),
(73, 'Tsubasa Giấc Mơ sân Cỏ Phần 4', 'tsubasa-giac-mo-san-co-phan-4', '2018-07-27 08:35:49', '2018-07-27 08:35:49'),
(74, 'Masahiko Murata', 'masahiko-murata', '2018-07-27 08:46:21', '2018-07-27 08:46:21'),
(75, 'Isekai Maou to Shoukan Shoujo no Dorei Majutsu', 'isekai-maou-to-shoukan-shoujo-no-dorei-majutsu', '2018-07-27 08:50:50', '2018-07-27 08:50:50'),
(76, 'Naruto Những Thế Hệ Kế Tiếp', 'naruto-nhung-the-he-ke-tiep', '2018-07-27 08:57:30', '2018-07-27 08:57:30'),
(77, 'Jukki Hanada', 'jukki-hanada', '2018-07-27 09:00:55', '2018-07-27 09:00:55'),
(78, 'Kanta Satoo', 'kanta-satoo', '2018-07-27 09:05:59', '2018-07-27 09:05:59'),
(79, 'Reina Visa', 'reina-visa', '2018-07-27 09:05:59', '2018-07-27 09:05:59'),
(80, 'Takanor', 'takanor', '2018-07-27 09:05:59', '2018-07-27 09:05:59'),
(81, 'Takaharu Ozaki', 'takaharu-ozaki', '2018-07-27 09:09:48', '2018-07-27 09:09:48'),
(82, 'HoneyWorks', 'honeyworks', '2018-07-27 09:13:51', '2018-07-27 09:13:51'),
(83, 'Pokemon the Movie XY&Z', 'pokemon-the-movie-xyz', '2018-07-27 09:16:44', '2018-07-27 09:16:44'),
(84, 'Accel World: Infinite Burst', 'accel-world-infinite-burst', '2018-07-27 09:19:52', '2018-07-27 09:19:52'),
(85, 'In This Corner of the World', 'in-this-corner-of-the-world', '2018-07-27 09:24:35', '2018-07-27 09:24:35'),
(86, 'Meteor-Film', 'meteor-film', '2018-07-28 02:17:11', '2018-07-28 02:17:11'),
(87, 'Chưa rõ', 'chua-ro', '2018-07-28 02:20:05', '2018-07-28 02:20:05'),
(88, 'CÚ NÉM KINH ĐIỂN', 'cu-nem-kinh-dien', '2018-07-28 02:27:47', '2018-07-28 02:27:47'),
(89, 'Imagine Entertainment', 'imagine-entertainment', '2018-07-28 02:32:50', '2018-07-28 02:32:50'),
(90, 'Seine Pictures', 'seine-pictures', '2018-07-28 02:32:51', '2018-07-28 02:32:51'),
(91, 'Zohar', 'zohar', '2018-07-28 02:32:51', '2018-07-28 02:32:51'),
(92, 'My Annoying Brother', 'my-annoying-brother', '2018-07-28 02:34:41', '2018-07-28 02:34:41'),
(93, 'Fasten Your Seatbelt', 'fasten-your-seatbelt', '2018-07-28 02:43:54', '2018-07-28 02:43:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actor_film`
--
ALTER TABLE `actor_film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actor_films_actor_id_foreign` (`actor_id`),
  ADD KEY `actor_films_film_id_foreign` (`film_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_role_admin_id_foreign` (`admin_id`),
  ADD KEY `admin_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `category_film`
--
ALTER TABLE `category_film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_films_category_id_foreign` (`category_id`),
  ADD KEY `category_films_film_id_foreign` (`film_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_film_id_foreign` (`film_id`),
  ADD KEY `comments_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_name_unique` (`name`);

--
-- Indexes for table `country_film`
--
ALTER TABLE `country_film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_films_country_id_foreign` (`country_id`),
  ADD KEY `country_films_film_id_foreign` (`film_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_username_unique` (`username`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `director_film`
--
ALTER TABLE `director_film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `director_films_director_id_foreign` (`director_id`),
  ADD KEY `director_films_film_id_foreign` (`film_id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `films_title_vi_unique` (`title_vi`),
  ADD UNIQUE KEY `films_title_en_unique` (`title_en`),
  ADD KEY `films_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `film_language`
--
ALTER TABLE `film_language`
  ADD KEY `film_language_film_id_foreign` (`film_id`),
  ADD KEY `film_language_language_id_foreign` (`language_id`);

--
-- Indexes for table `film_tag`
--
ALTER TABLE `film_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_tags_film_id_foreign` (`film_id`),
  ADD KEY `film_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link_films`
--
ALTER TABLE `link_films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link_films_film_id_foreign` (`film_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `actor_film`
--
ALTER TABLE `actor_film`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `category_film`
--
ALTER TABLE `category_film`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `country_film`
--
ALTER TABLE `country_film`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `director_film`
--
ALTER TABLE `director_film`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `film_tag`
--
ALTER TABLE `film_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `link_films`
--
ALTER TABLE `link_films`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actor_film`
--
ALTER TABLE `actor_film`
  ADD CONSTRAINT `actor_film_actor_id_foreign` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actor_film_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_film`
--
ALTER TABLE `category_film`
  ADD CONSTRAINT `category_film_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_film_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`);

--
-- Constraints for table `country_film`
--
ALTER TABLE `country_film`
  ADD CONSTRAINT `country_film_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `country_film_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `director_film`
--
ALTER TABLE `director_film`
  ADD CONSTRAINT `director_film_director_id_foreign` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `director_film_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `film_language`
--
ALTER TABLE `film_language`
  ADD CONSTRAINT `film_language_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`),
  ADD CONSTRAINT `film_language_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `film_tag`
--
ALTER TABLE `film_tag`
  ADD CONSTRAINT `film_tag_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `film_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `link_films`
--
ALTER TABLE `link_films`
  ADD CONSTRAINT `link_films_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
