-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2025 at 11:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_mobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_sms`
--

CREATE TABLE `active_sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expire` int(11) NOT NULL,
  `code` varchar(6) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addressables`
--

CREATE TABLE `addressables` (
  `address_id` int(11) NOT NULL,
  `addressables_id` int(11) NOT NULL,
  `addressables_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addressables`
--

INSERT INTO `addressables` (`address_id`, `addressables_id`, `addressables_type`) VALUES
(1, 1, 'App\\Models\\Pay');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `post` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `plaque` varchar(10) NOT NULL,
  `unit` varchar(10) DEFAULT NULL,
  `originLat` varchar(200) DEFAULT NULL,
  `originLng` varchar(200) DEFAULT NULL,
  `number` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `show` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `address`, `post`, `name`, `state`, `city`, `plaque`, `unit`, `originLat`, `originLng`, `number`, `status`, `show`, `created_at`, `updated_at`) VALUES
(1, 'شیراز-بلوار مدرس-بلوار رازی-کوچه 15-ساختمان نگین 1-واحد 7', '1234567460', 'علی مولایی', 'فارس', 'شیراز', '7', NULL, NULL, NULL, '503', 0, 0, '2025-04-06 19:11:28', '2025-04-06 19:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `asks`
--

CREATE TABLE `asks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `language` varchar(3) NOT NULL DEFAULT 'fa',
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brandables`
--

CREATE TABLE `brandables` (
  `brand_id` int(11) NOT NULL,
  `brandables_id` int(11) NOT NULL,
  `brandables_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nameSeo` varchar(255) NOT NULL,
  `bodySeo` text DEFAULT NULL,
  `language` varchar(3) DEFAULT 'fa',
  `keyword` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `nameSeo`, `bodySeo`, `language`, `keyword`, `body`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'سامسونگ', 'سامسونگ', NULL, 'fa', 'سامسونگ', NULL, '/upload/image/2025/1743273911.jpg', 'سامسونگ', '2025-03-29 18:45:11', '2025-03-29 18:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `carriables`
--

CREATE TABLE `carriables` (
  `carrier_id` int(11) NOT NULL,
  `carriables_id` int(11) NOT NULL,
  `carriables_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carriers`
--

CREATE TABLE `carriers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `language` varchar(3) DEFAULT 'fa',
  `city` varchar(255) DEFAULT NULL,
  `limit` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `weight` bigint(20) DEFAULT 9999999999,
  `weightPrice` bigint(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carrier_cities`
--

CREATE TABLE `carrier_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(50) NOT NULL,
  `carrier` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `collect_id` bigint(20) DEFAULT 0,
  `inquiry` tinyint(4) NOT NULL DEFAULT 0,
  `price` bigint(20) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `pack` tinyint(1) NOT NULL DEFAULT 0,
  `number` tinyint(4) NOT NULL DEFAULT 0,
  `time` varchar(255) DEFAULT NULL,
  `prebuy` tinyint(1) DEFAULT 0,
  `guarantee_id` varchar(10) DEFAULT NULL,
  `product_id` varchar(10) DEFAULT NULL,
  `count` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `options` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catables`
--

CREATE TABLE `catables` (
  `category_id` int(11) NOT NULL,
  `catables_id` int(11) NOT NULL,
  `catables_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nameSeo` varchar(255) DEFAULT NULL,
  `language` varchar(3) DEFAULT 'fa',
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `bodySeo` text DEFAULT NULL,
  `percent` varchar(3) NOT NULL DEFAULT '0',
  `keyword` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `nameSeo`, `language`, `type`, `bodySeo`, `percent`, `keyword`, `body`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'گوشی موبایل', 'گوشی موبایل', 'fa', 0, NULL, '0', 'گوشی موبایل', NULL, NULL, 'گوشی-موبایل', '2025-03-29 18:45:11', '2025-03-29 18:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `collectables`
--

CREATE TABLE `collectables` (
  `collection_id` int(11) NOT NULL,
  `collectables_id` int(11) NOT NULL,
  `collectables_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `titleSeo` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `bodySeo` text NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT 0,
  `language` varchar(3) DEFAULT 'fa',
  `keyword` varchar(255) NOT NULL,
  `image` varchar(400) DEFAULT NULL,
  `off` tinyint(4) DEFAULT NULL,
  `offPrice` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `count` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `options` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `bad` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `good` text DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `type` smallint(6) NOT NULL,
  `registration` bigint(20) NOT NULL,
  `NationalID` bigint(20) NOT NULL,
  `residenceAddress` varchar(255) NOT NULL,
  `economicCode` bigint(20) NOT NULL,
  `signer` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compare_products`
--

CREATE TABLE `compare_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image1` varchar(300) DEFAULT NULL,
  `image2` varchar(300) DEFAULT NULL,
  `language` varchar(5) DEFAULT NULL,
  `link` varchar(400) DEFAULT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `converters`
--

CREATE TABLE `converters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `score` varchar(255) DEFAULT NULL,
  `reward` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cooperations`
--

CREATE TABLE `cooperations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `percent` tinyint(4) DEFAULT NULL,
  `cat_id` bigint(20) DEFAULT NULL,
  `pay_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `meta_id` bigint(20) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counselings`
--

CREATE TABLE `counselings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `number` bigint(20) NOT NULL,
  `answer` text DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(20) NOT NULL,
  `percent` tinyint(4) NOT NULL,
  `day` varchar(30) DEFAULT NULL,
  `count` bigint(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `frontNaturalId` varchar(255) NOT NULL,
  `backNaturalId` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `body` text NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `type` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `disable_status` tinyint(1) NOT NULL,
  `value` text DEFAULT NULL,
  `choice` text DEFAULT NULL,
  `show_status` tinyint(1) NOT NULL DEFAULT 0,
  `type` tinyint(4) NOT NULL,
  `required_status` tinyint(1) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `field_data`
--

CREATE TABLE `field_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) NOT NULL,
  `value` text DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `model_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `float_accesses`
--

CREATE TABLE `float_accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT '0',
  `link` varchar(255) DEFAULT '0',
  `type` tinyint(4) DEFAULT 0,
  `icon` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(5) NOT NULL,
  `path` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT '0',
  `size` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `type`, `path`, `url`, `user_id`, `size`, `created_at`, `updated_at`) VALUES
(1, '1743260803.webp', 'png', '/home/myizonek/public_html/upload/image/2025/1743260803.webp', '/upload/image/2025/1743260803.webp', '4', '76kb', '2025-03-29 15:06:43', '2025-03-29 15:06:43'),
(2, '1743260807.webp', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743260807.webp', '/upload/image/2025/1743260807.webp', '4', '44kb', '2025-03-29 15:06:47', '2025-03-29 15:06:47'),
(3, '1743260808.webp', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743260808.webp', '/upload/image/2025/1743260808.webp', '4', '44kb', '2025-03-29 15:06:48', '2025-03-29 15:06:48'),
(4, '1743260812.webp', 'png', '/home/myizonek/public_html/upload/image/2025/1743260812.webp', '/upload/image/2025/1743260812.webp', '4', '9kb', '2025-03-29 15:06:52', '2025-03-29 15:06:52'),
(5, '1743260821.webp', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743260821.webp', '/upload/image/2025/1743260821.webp', '4', '140kb', '2025-03-29 15:07:05', '2025-03-29 15:07:05'),
(6, '1743260825.webp', 'png', '/home/myizonek/public_html/upload/image/2025/1743260825.webp', '/upload/image/2025/1743260825.webp', '4', '8kb', '2025-03-29 15:07:06', '2025-03-29 15:07:06'),
(7, '1743260842.webp', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743260842.webp', '/upload/image/2025/1743260842.webp', '4', '152kb', '2025-03-29 15:07:25', '2025-03-29 15:07:25'),
(8, '1743260853.webp', 'png', '/home/myizonek/public_html/upload/image/2025/1743260853.webp', '/upload/image/2025/1743260853.webp', '4', '84kb', '2025-03-29 15:07:35', '2025-03-29 15:07:35'),
(9, '1743260869.webp', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743260869.webp', '/upload/image/2025/1743260869.webp', '4', '277kb', '2025-03-29 15:07:53', '2025-03-29 15:07:53'),
(10, '1743260875.webp', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743260875.webp', '/upload/image/2025/1743260875.webp', '4', '8.56mb', '2025-03-29 15:08:02', '2025-03-29 15:08:02'),
(11, '1743273895.jpg', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743273895.jpg', '/upload/image/2025/1743273895.jpg', '4', '176kb', '2025-03-29 18:44:55', '2025-03-29 18:44:55'),
(12, '1743273896.jpg', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743273896.jpg', '/upload/image/2025/1743273896.jpg', '4', '184kb', '2025-03-29 18:44:56', '2025-03-29 18:44:56'),
(13, '1743273897.jpg', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743273897.jpg', '/upload/image/2025/1743273897.jpg', '4', '216kb', '2025-03-29 18:44:57', '2025-03-29 18:44:57'),
(14, '1743273898.jpg', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743273898.jpg', '/upload/image/2025/1743273898.jpg', '4', '220kb', '2025-03-29 18:44:58', '2025-03-29 18:44:58'),
(15, '1743273899.jpg', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743273899.jpg', '/upload/image/2025/1743273899.jpg', '4', '194kb', '2025-03-29 18:45:00', '2025-03-29 18:45:00'),
(16, '1743273901.jpg', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743273901.jpg', '/upload/image/2025/1743273901.jpg', '4', '121kb', '2025-03-29 18:45:01', '2025-03-29 18:45:01'),
(17, '1743273902.jpg', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743273902.jpg', '/upload/image/2025/1743273902.jpg', '4', '98kb', '2025-03-29 18:45:02', '2025-03-29 18:45:02'),
(18, '1743273903.jpg', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743273903.jpg', '/upload/image/2025/1743273903.jpg', '4', '49kb', '2025-03-29 18:45:03', '2025-03-29 18:45:03'),
(19, '1743273904.jpg', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743273904.jpg', '/upload/image/2025/1743273904.jpg', '4', '335kb', '2025-03-29 18:45:04', '2025-03-29 18:45:04'),
(20, '1743273905.jpg', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743273905.jpg', '/upload/image/2025/1743273905.jpg', '4', '137kb', '2025-03-29 18:45:05', '2025-03-29 18:45:05'),
(21, '1743273906.jpg', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743273906.jpg', '/upload/image/2025/1743273906.jpg', '4', '219kb', '2025-03-29 18:45:06', '2025-03-29 18:45:06'),
(22, '1743273907.jpg', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743273907.jpg', '/upload/image/2025/1743273907.jpg', '4', '331kb', '2025-03-29 18:45:07', '2025-03-29 18:45:07'),
(23, '1743273908.jpg', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743273908.jpg', '/upload/image/2025/1743273908.jpg', '4', '449kb', '2025-03-29 18:45:08', '2025-03-29 18:45:08'),
(24, '1743273909.jpg', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743273909.jpg', '/upload/image/2025/1743273909.jpg', '4', '395kb', '2025-03-29 18:45:10', '2025-03-29 18:45:10'),
(25, '1743273911.jpg', 'jpg', '/home/myizonek/public_html/upload/image/2025/1743273911.jpg', '/upload/image/2025/1743273911.jpg', '4', '7kb', '2025-03-29 18:45:11', '2025-03-29 18:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `genuines`
--

CREATE TABLE `genuines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `post` bigint(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `residenceAddress` varchar(250) DEFAULT NULL,
  `code` bigint(20) DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL,
  `date` varchar(11) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT 0,
  `discount` bigint(20) DEFAULT 0,
  `type` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`id`, `user_id`, `discount`, `type`, `created_at`, `updated_at`) VALUES
(1, 4, 10, 3, '2025-03-29 14:56:26', '2025-03-29 14:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `guarantables`
--

CREATE TABLE `guarantables` (
  `guarantee_id` int(11) NOT NULL,
  `guarantables_id` int(11) NOT NULL,
  `guarantables_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guarantees`
--

CREATE TABLE `guarantees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `language` varchar(3) DEFAULT 'fa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `installments`
--

CREATE TABLE `installments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `pay` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `pay_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lands`
--

CREATE TABLE `lands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `html` mediumtext DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `language` varchar(3) NOT NULL DEFAULT 'fa',
  `type` tinyint(4) DEFAULT 0,
  `tooltip` varchar(40) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number` bigint(20) DEFAULT 0,
  `parent_id` bigint(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` bigint(20) NOT NULL,
  `refund` bigint(20) NOT NULL,
  `percent` tinyint(4) NOT NULL,
  `month` tinyint(4) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `monthProfit` bigint(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lotteries`
--

CREATE TABLE `lotteries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` varchar(10) NOT NULL DEFAULT '0',
  `body` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `round` tinyint(4) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT 0,
  `code` varchar(25) DEFAULT NULL,
  `product_id` varchar(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lottery_codes`
--

CREATE TABLE `lottery_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL DEFAULT '0',
  `letter` varchar(2) DEFAULT NULL,
  `number` bigint(20) DEFAULT NULL,
  `round` bigint(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `lottery_id` bigint(20) NOT NULL DEFAULT 0,
  `product_id` varchar(10) NOT NULL DEFAULT '0',
  `user_id` varchar(10) NOT NULL DEFAULT '0',
  `pay_id` varchar(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `luckies`
--

CREATE TABLE `luckies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `background` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `language` varchar(3) DEFAULT 'fa',
  `type` tinyint(4) NOT NULL,
  `value` varchar(50) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_09_14_083818_create_categories_table', 1),
(7, '2022_09_14_093145_create_brands_table', 1),
(8, '2022_09_14_101226_create_guarantees_table', 1),
(9, '2022_09_14_111602_create_times_table', 1),
(10, '2022_09_15_091020_create_products_table', 1),
(11, '2022_09_15_180458_create_galleries_table', 1),
(12, '2022_09_18_142749_create_widgets_table', 1),
(13, '2022_09_19_151231_create_carts_table', 1),
(14, '2022_09_20_134830_create_comments_table', 1),
(15, '2022_09_21_063915_create_rates_table', 1),
(16, '2022_09_21_113934_create_active_sms_table', 1),
(17, '2022_09_22_074355_create_settings_table', 1),
(18, '2022_09_22_092727_create_likes_table', 1),
(19, '2022_09_22_102048_create_bookmarks_table', 1),
(20, '2022_09_23_121729_create_addresses_table', 1),
(21, '2022_09_24_073357_create_carriers_table', 1),
(22, '2022_09_24_091744_create_pays_table', 1),
(23, '2022_09_24_091755_create_pay_metas_table', 1),
(24, '2022_09_24_100901_create_discounts_table', 1),
(25, '2022_09_24_201518_create_news_table', 1),
(26, '2022_09_25_070928_create_tags_table', 1),
(27, '2022_10_01_074803_create_views_table', 1),
(28, '2022_10_01_174936_create_reports_table', 1),
(29, '2022_10_02_060411_create_packs_table', 1),
(30, '2022_10_02_090412_create_installments_table', 1),
(31, '2022_10_02_122819_create_pages_table', 1),
(32, '2022_10_02_132105_create_links_table', 1),
(33, '2022_10_02_142553_create_subscribes_table', 1),
(34, '2022_10_03_071654_create_asks_table', 1),
(35, '2022_10_04_061344_create_tickets_table', 1),
(36, '2022_10_04_103347_create_wallets_table', 1),
(37, '2022_10_07_110554_create_cooperations_table', 1),
(38, '2022_10_08_124311_create_genuines_table', 1),
(39, '2022_10_08_124400_create_companies_table', 1),
(40, '2022_10_08_204214_create_documents_table', 1),
(41, '2022_10_13_205212_create_counselings_table', 1),
(42, '2022_10_15_081503_create_lotteries_table', 1),
(43, '2022_10_15_082001_create_lottery_codes_table', 1),
(44, '2022_10_17_120155_create_float_accesses_table', 1),
(45, '2022_10_17_175247_create_currencies_table', 1),
(46, '2022_10_22_142022_create_videos_table', 1),
(47, '2022_11_06_140233_create_collections_table', 1),
(48, '2022_11_15_120451_create_loans_table', 1),
(49, '2022_12_13_155530_create_converters_table', 1),
(50, '2022_12_14_105739_create_scores_table', 1),
(51, '2023_03_09_095323_create_gifts_table', 1),
(52, '2023_03_09_171021_create_price_changes_table', 1),
(53, '2023_03_19_180649_create_stories_table', 1),
(54, '2023_08_03_095600_create_lands_table', 1),
(55, '2023_08_26_092722_create_fields_table', 1),
(56, '2023_08_26_092915_create_field_data_table', 1),
(57, '2023_08_27_153316_create_events_table', 1),
(58, '2023_08_31_121915_create_luckies_table', 1),
(59, '2023_10_23_191852_create_carrier_cities_table', 1),
(60, '2023_10_29_140137_create_compare_products_table', 1),
(61, '2023_11_10_162618_create_tanks_table', 1),
(62, '2023_11_13_173620_create_menus_table', 2),
(63, '2023_11_17_154807_add_test_to_posts_table', 3),
(64, '2023_11_17_154807_add_data_to_posts_table', 3),
(65, '2023_12_02_234208_create_jobs_table', 1),
(66, '2023_12_05_134719_create_add_setting_table', 4),
(67, '2023_12_05_134719_create_add_gallery_table', 5),
(68, '2023_12_05_134719_create_version_gallery_table', 5),
(70, '2023_12_05_134719_create_chat_table', 6),
(71, '2023_12_05_134719_create_seo1_table', 7),
(72, '2024_01_03_172700_create_redirects_table', 7),
(73, '2023_12_05_134719_create_update15_table', 8),
(74, '2023_12_05_134719_create_update16_table', 9),
(75, '2024_05_05_134719_create_update20_table', 10),
(76, '2024_05_05_134719_create_update24_table', 10),
(77, '2025_04_01_035748_edit_product_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `titleSeo` varchar(255) DEFAULT NULL,
  `bodySeo` text DEFAULT NULL,
  `imageAlt` varchar(255) DEFAULT NULL,
  `keyword` varchar(400) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `time` smallint(6) DEFAULT NULL,
  `language` varchar(3) DEFAULT 'fa',
  `image` text DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `suggest` tinyint(1) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packs`
--

CREATE TABLE `packs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count` bigint(20) DEFAULT NULL,
  `month` bigint(20) DEFAULT NULL,
  `percent` tinyint(4) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `titleSeo` varchar(255) DEFAULT NULL,
  `language` varchar(3) DEFAULT 'fa',
  `slug` varchar(255) NOT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `lat` varchar(150) DEFAULT NULL,
  `longitude` varchar(150) DEFAULT NULL,
  `body` text NOT NULL,
  `bodySeo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `refId` varchar(255) DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `deposit` bigint(20) DEFAULT NULL,
  `tax` tinyint(4) DEFAULT 0,
  `auth` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `time` varchar(300) DEFAULT NULL,
  `gate` tinyint(4) DEFAULT NULL,
  `pin` tinyint(1) DEFAULT 0,
  `back` tinyint(4) NOT NULL DEFAULT 0,
  `method` tinyint(4) NOT NULL DEFAULT 0,
  `deliver` tinyint(4) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `carrier` varchar(255) DEFAULT NULL,
  `carrier_price` bigint(20) NOT NULL,
  `track` varchar(255) DEFAULT NULL,
  `discount_off` varchar(3) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `property` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`id`, `refId`, `price`, `deposit`, `tax`, `auth`, `status`, `time`, `gate`, `pin`, `back`, `method`, `deliver`, `note`, `carrier`, `carrier_price`, `track`, `discount_off`, `user_id`, `property`, `created_at`, `updated_at`) VALUES
(1, '', 100000000, 100000000, NULL, '5535689', 100, '', NULL, 0, 0, 0, 0, NULL, 'test', 1000000, NULL, NULL, 151, '5535689', '2025-04-06 19:11:28', '2025-04-06 19:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `pay_metas`
--

CREATE TABLE `pay_metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `track` varchar(255) DEFAULT NULL,
  `profit` float NOT NULL DEFAULT 0,
  `guarantee_name` varchar(255) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `count` smallint(6) NOT NULL,
  `cancel` tinyint(1) DEFAULT 0,
  `status` smallint(6) NOT NULL,
  `deliver` tinyint(4) NOT NULL DEFAULT 0,
  `method` tinyint(4) NOT NULL DEFAULT 0,
  `discount_off` tinyint(4) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) DEFAULT 0,
  `collect_id` bigint(20) DEFAULT 0,
  `prebuy` tinyint(1) NOT NULL DEFAULT 0,
  `pay_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pay_metas`
--

INSERT INTO `pay_metas` (`id`, `color`, `size`, `track`, `profit`, `guarantee_name`, `price`, `count`, `cancel`, `status`, `deliver`, `method`, `discount_off`, `user_id`, `product_id`, `collect_id`, `prebuy`, `pay_id`, `created_at`, `updated_at`) VALUES
(1, 'red', NULL, NULL, 0, NULL, 20000, 1000, 0, 0, 0, 0, NULL, 17, 2, 1, 0, 1, '2025-04-07 08:55:30', '2025-04-07 08:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'گالری', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(2, 'دیدگاه', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(3, 'افزودن محصول', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(4, 'همه محصولات', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(5, 'همه بلاگ ها', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(6, 'افزودن بلاگ', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(7, 'همه سفارشات', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(8, 'ویرایش سفارشات', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(9, 'وضعیت موجودی', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(10, 'تاکسونامی', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(11, 'ویجت', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(12, 'تنظیمات دسته بندی', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(13, 'تنظیمات سئو', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(14, 'تنظیمات سایت', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(15, 'تنظیمات پرداخت', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(16, 'کد تخفیف', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(17, 'کاربران', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(18, 'داشبورد', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(19, 'افزودن کاربر', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(20, 'همه کاربر ها', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(21, 'شرایط اقساط', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(22, 'برگه ها', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(23, 'لینک هدر', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(130, 'خروجی اکسل', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(131, 'درخواست ها', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(132, 'کیف پول', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(133, 'تغییر قیمت', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(134, 'تنظیمات پیامک', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(135, 'فروشنده', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(136, 'بررسی فروشنده', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(137, 'تنظیمات شناور', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(138, 'فعالیت ها', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(139, 'فیلد های سفارشی', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11'),
(140, 'گردونه شانس', 'web', '2022-02-17 20:40:11', '2022-02-17 20:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_changes`
--

CREATE TABLE `price_changes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_changes`
--

INSERT INTO `price_changes` (`id`, `price`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1400000, 1, '2025-03-29 15:01:19', '2025-03-29 15:01:19'),
(2, 7299000, 2, '2025-03-29 19:00:53', '2025-03-29 19:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  `numLottery1` smallint(6) DEFAULT NULL,
  `numLottery2` smallint(6) DEFAULT NULL,
  `letterLottery` varchar(5) DEFAULT NULL,
  `lotteryStatus` tinyint(1) NOT NULL DEFAULT 0,
  `slug` varchar(255) NOT NULL,
  `count` smallint(6) NOT NULL,
  `showcase` tinyint(1) NOT NULL DEFAULT 0,
  `used` tinyint(1) NOT NULL DEFAULT 0,
  `original` tinyint(1) NOT NULL DEFAULT 0,
  `product_id` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `suggest` varchar(255) DEFAULT NULL,
  `titleSeo` varchar(255) DEFAULT NULL,
  `bodySeo` text DEFAULT NULL,
  `keywordSeo` varchar(255) DEFAULT NULL,
  `imageAlt` varchar(255) DEFAULT NULL,
  `currency_id` bigint(20) NOT NULL DEFAULT 0,
  `size` text DEFAULT NULL,
  `colors` text DEFAULT NULL,
  `specifications` text DEFAULT NULL,
  `short` text DEFAULT NULL,
  `ability` text DEFAULT NULL,
  `type` smallint(1) NOT NULL DEFAULT 0,
  `inquiry` tinyint(1) NOT NULL DEFAULT 0,
  `score` varchar(50) DEFAULT '0',
  `off` varchar(3) DEFAULT NULL,
  `weight` bigint(20) DEFAULT 0,
  `rate` varchar(400) DEFAULT '[]',
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `image3d` varchar(255) DEFAULT NULL,
  `levels` varchar(400) DEFAULT NULL,
  `imageCount3d` varchar(3) DEFAULT '34',
  `note` text DEFAULT NULL,
  `imageFirstCount` varchar(2) DEFAULT '6',
  `body` text DEFAULT NULL,
  `prebuy` tinyint(1) DEFAULT 0,
  `prePrice` bigint(20) DEFAULT NULL,
  `priceBuy` bigint(20) DEFAULT NULL,
  `language` varchar(3) DEFAULT 'fa',
  `prepare` varchar(255) DEFAULT NULL,
  `bodyEn` text DEFAULT NULL,
  `maxCart` bigint(20) DEFAULT 20,
  `minCart` tinyint(4) DEFAULT 1,
  `variety` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `priceCurrency` bigint(20) DEFAULT NULL,
  `offPrice` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `skima` varchar(255) DEFAULT NULL,
  `robots` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `meta` varchar(255) DEFAULT NULL,
  `varName1` varchar(255) DEFAULT 'رنگ',
  `varName2` varchar(255) DEFAULT 'ظریفت',
  `varName3` text DEFAULT NULL COMMENT 'گارانتی',
  `varName4` text DEFAULT NULL COMMENT 'ریجستر',
  `register` tinyint(1) DEFAULT NULL,
  `guarantee` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `titleEn`, `image`, `numLottery1`, `numLottery2`, `letterLottery`, `lotteryStatus`, `slug`, `count`, `showcase`, `used`, `original`, `product_id`, `status`, `suggest`, `titleSeo`, `bodySeo`, `keywordSeo`, `imageAlt`, `currency_id`, `size`, `colors`, `specifications`, `short`, `ability`, `type`, `inquiry`, `score`, `off`, `weight`, `rate`, `state`, `city`, `image3d`, `levels`, `imageCount3d`, `note`, `imageFirstCount`, `body`, `prebuy`, `prePrice`, `priceBuy`, `language`, `prepare`, `bodyEn`, `maxCart`, `minCart`, `variety`, `user_id`, `price`, `priceCurrency`, `offPrice`, `created_at`, `updated_at`, `skima`, `robots`, `rating`, `meta`, `varName1`, `varName2`, `varName3`, `varName4`, `register`, `guarantee`) VALUES
(1, 'ضصثضصث', 'Qweqwe', '[]', NULL, NULL, NULL, 0, 'ضصثضصث', 3, 0, 0, 1, 'SEO-561016', 1, NULL, 'eqwe', 'wqeqe', 'eq', 'wqeqwe', 0, '[{\"name\":\"qwe\",\"count\":\"2\",\"price\":\"2\",\"image\":\"\"}]', '[{\"name\":\"ضصثضصث\",\"color\":\"#fff\",\"image\":\"\",\"count\":\"2\",\"price\":\"2\"}]', '[{\"title\":\"ثضصثض\",\"body\":\"صثضث\"}]', 'ضصثضصثضصثصضث', '[{\"name\":\"صضثضصثضصثصثضصثضص\"},{\"name\":\"شسیشی\"}]', 0, 0, NULL, NULL, NULL, '[{\"name\":\"222\",\"rate\":\"2\"},{\"name\":\"ضصثضصث\",\"rate\":\"3\"},{\"name\":\"صضثضصث\",\"rate\":\"2\"}]', NULL, NULL, NULL, '[]', NULL, NULL, NULL, '<p>ضصثضصث</p>', 0, NULL, NULL, 'fa', NULL, NULL, 5, 1, 0, 4, 1400000, 1400000, '1400000', '2025-03-29 15:01:19', '2025-03-29 15:01:19', NULL, 'index', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'گوشی موبایل سامسونگ مدل Galaxy A06 دو سیم کارت ظرفیت 64 گیگابایت و رم 4 گیگابایت', 'Samsung Galaxy A06 Dual SIM Storage 64GB And RAM 4GB Mobile Phone', '[\"https://new.izonekala.com/upload/image/2025/1743273895.jpg\",\"https://new.izonekala.com/upload/image/2025/1743273896.jpg\",\"https://new.izonekala.com/upload/image/2025/1743273897.jpg\",\"https://new.izonekala.com/upload/image/2025/1743273898.jpg\",\"https://new.izonekala.com/upload/image/2025/1743273899.jpg\",\"https://new.izonekala.com/upload/image/2025/1743273901.jpg\",\"https://new.izonekala.com/upload/image/2025/1743273902.jpg\",\"https://new.izonekala.com/upload/image/2025/1743273903.jpg\",\"https://new.izonekala.com/upload/image/2025/1743273904.jpg\",\"https://new.izonekala.com/upload/image/2025/1743273905.jpg\",\"https://new.izonekala.com/upload/image/2025/1743273906.jpg\",\"https://new.izonekala.com/upload/image/2025/1743273907.jpg\",\"https://new.izonekala.com/upload/image/2025/1743273908.jpg\",\"https://new.izonekala.com/upload/image/2025/1743273909.jpg\"]', NULL, NULL, NULL, 0, 'گوشی-موبایل-سامسونگ-مدل-Galaxy-A06-دو-سیم-کارت-ظرفیت-64-گیگابایت-و-رم-4-گیگابایت', 10, 0, 0, 0, 'SEO-578952', 1, NULL, 'قیمت و خرید  گوشی موبایل سامسونگ مدل Galaxy A06 دو سیم کارت ظرفیت 64 گیگابایت و رم 4 گیگابایت', 'خرید اینترنتی  گوشی موبایل سامسونگ مدل Galaxy A06 دو سیم کارت ظرفیت 64 گیگابایت و رم 4 گیگابایت با رنگبندی مشکی، طلایی، آبی روشن به همراه مقایسه، بررسی مشخصات و لیست قیمت امروز در فروشگاه اینترنتی دیجی‌کالا', 'eq', 'قیمت و خرید  گوشی موبایل سامسونگ مدل Galaxy A06 دو سیم کارت ظرفیت 64 گیگابایت و رم 4 گیگابایت', 0, '[{\"name\":\"علی مولائی\",\"count\":\"552\",\"price\":\"9633\",\"image\":\"https://new.izonekala.com/upload/image/2025/1743273896.jpg\"}]', '[{\"name\":\"علی مولایی\",\"color\":\"#000000\",\"image\":\"https://new.izonekala.com/upload/image/2025/1743273895.jpg\",\"count\":\"10\",\"price\":\"10\"}]', '[{\"title\":\"نوع گوشی موبایل\",\"body\":\"سیستم عامل اندروید \"},{\"title\":\"دسته ‌بندی\",\"body\":\"اقتصادی \"},{\"title\":\"مدل\",\"body\":\"Galaxy A06 \"},{\"title\":\"زمان معرفی\",\"body\":\"16 آگوست 2024 \"},{\"title\":\"ابعاد\",\"body\":\"167.3x77.3x8 میلی‌متر\"},{\"title\":\"وزن\",\"body\":\"189 گرم\"},{\"title\":\"توضیحات بدنه\",\"body\":\"قاب جلو از جنس شیشه / قاب پشت و فریم از جنس پلاستیک \"},{\"title\":\"تعداد سیم کارت\",\"body\":\"دو عدد \"},{\"title\":\"نوع سیم کارت\",\"body\":\"سایز نانو (8.8 × 12.3 میلی‌متر) \"}]', 'Samsung Galaxy A06 یکی از گوشی‌های اقتصادی و جدید سامسونگ است که با طراحی شیک، صفحه‌نمایش بزرگ و باتری قدرتمند، گزینه‌ای ایده‌آل برای کاربران روزمره محسوب می‌شود. این گوشی دارای نمایشگر 6.7 اینچی PLS LCD با رزولوشن 720x1600 پیکسل است که تجربه بصری مناسبی را ارائه می‌دهد. در بخش دوربین، از یک حسگر 50 مگاپیکسلی در کنار دوربین ماکرو 2 مگاپیکسلی استفاده شده است که در شرایط نوری مناسب، تصاویر واضح و باکیفیتی ثبت می‌کند.\nسامسونگ در این مدل از پردازنده MediaTek Helio G85 استفاده کرده که برای کارهای روزمره و اجرای برنامه‌های معمولی، عملکرد خوبی دارد. این گوشی با سیستم‌عامل اندروید 14 و رابط کاربری One UI 6.1 عرضه شده که تجربه نرم‌افزاری به‌روزی را برای کاربران به همراه دارد. همچنین، باتری 5000 میلی‌آمپر ساعتی آن، شارژدهی بالایی دارد و از شارژ سریع 25 واتی پشتیبانی می‌کند. اگر به دنبال یک گوشی هوشمند با قیمت مناسب و امکانات قابل قبول هستید، Galaxy A06 گزینه‌ای ارزشمند خواهد بود.', '[{\"name\":\"فناوری صفحه‌ نمایش : PLS\"},{\"name\":\"نسخه سیستم عامل : Android 14\"},{\"name\":\"رزولوشن دوربین اصلی : 50 مگاپیکسل\"},{\"name\":\"اندازه : 6.7\"},{\"name\":\"اقلام همراه : دفترچه‌ راهنما\"}]', 0, 0, NULL, NULL, NULL, '[]', 'فارس', NULL, NULL, '[]', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'fa', NULL, NULL, NULL, 1, 0, 4, 7299000, 7299000, '7299000', '2025-03-29 19:00:53', '2025-04-01 09:35:23', NULL, 'index', NULL, NULL, 'jjjjj', 'llkjhh', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rate` float NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `comment_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redirects`
--

CREATE TABLE `redirects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start` varchar(500) NOT NULL,
  `end` varchar(500) DEFAULT NULL,
  `type` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redirects`
--

INSERT INTO `redirects` (`id`, `start`, `end`, `type`, `created_at`, `updated_at`) VALUES
(1, 'https://new.izonekala.com/page/صفحه-اصلی', 'https://new.izonekala.com', 410, '2025-03-29 16:02:59', '2025-03-29 16:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data` varchar(255) DEFAULT NULL,
  `reportable_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `reportable_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `name`, `type`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '10', 0, '4', '2025-03-29 14:56:26', '2025-03-29 14:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'catHeader', '31,27,37', '2022-09-22 04:17:19', '2024-10-09 09:14:23'),
(2, 'choicePay', '0', '2022-09-22 04:17:19', '2023-04-15 07:07:13'),
(3, 'name', 'آی زون', '2022-09-22 04:17:19', '2025-03-29 16:06:19'),
(4, 'title', 'فروشگاه آزون فروش موبایل و لپتاپ', '2022-09-22 04:17:19', '2025-03-29 16:06:20'),
(5, 'email', 'info@golden-site.ir', '2022-09-22 04:17:19', '2022-09-24 10:55:35'),
(6, 'address', 'یزد؛ بندر عباس', '2022-09-22 04:17:19', '2025-03-29 16:06:20'),
(7, 'about', 'سئوشاپ فروشگاهی اینترنتی برای خرید انواع وسایل برای خود و خانوادهتان', '2022-09-22 04:17:19', '2022-09-24 11:06:29'),
(8, 'productId', 'SEO', '2022-09-22 04:17:19', '2022-09-24 10:55:35'),
(9, 'telegram', '/', '2022-09-22 04:17:19', '2022-09-24 10:56:26'),
(10, 'twitter', '/', '2022-09-22 04:17:19', '2022-09-24 10:56:26'),
(11, 'instagram', '/', '2022-09-22 04:17:19', '2022-09-24 10:56:26'),
(12, 'facebook', '/', '2022-09-22 04:17:19', '2022-09-24 10:56:26'),
(13, 'number', '0936999999', '2022-09-22 04:17:19', '2022-09-24 10:56:26'),
(14, 'etemad', '<a href=\"/\"><img src=\"https://bazar.rayganapp.ir/img/etemad.png\" alt=\"نماد اعتماد\"></a>', '2022-09-22 04:17:19', '2022-09-24 10:55:35'),
(15, 'fanavari', '<a href=\"/\"><img src=\"https://bazar.rayganapp.ir/img/samandehi-logo.png\" alt=\"نماد اعتماد\"></a>', '2022-09-22 04:17:19', '2022-09-24 10:55:35'),
(16, 'email', '', '2022-09-22 04:17:19', '2022-09-22 05:41:37'),
(17, 'logo', 'https://rayganapp.ir/upload/image/2022/black-hat.png', '2022-09-22 04:17:19', '2022-09-24 10:56:26'),
(18, 'titleSeo', NULL, '2022-09-22 04:17:19', '2023-12-05 11:08:33'),
(19, 'keyword', NULL, '2022-09-22 04:17:19', '2023-12-05 11:08:33'),
(20, 'aboutSeo', NULL, '2022-09-22 04:17:19', '2023-12-05 11:08:33'),
(21, 'zarinpal', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2022-09-22 04:17:19', '2023-11-21 14:47:01'),
(22, 'zibal', 'd sad asd', '2022-09-22 04:17:19', '2022-09-24 12:03:35'),
(23, 'nextpay', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2022-09-22 04:17:19', '2022-09-22 05:41:37'),
(24, 'idpay', '0', '2022-09-22 04:17:19', '2022-09-22 05:41:37'),
(25, 'deposit', '10', '2022-09-22 04:17:19', '2022-09-24 10:56:26'),
(26, 'gateway', '1', '2022-09-22 04:17:19', '2023-11-21 14:44:59'),
(27, 'installment', '0', '2022-09-22 04:17:19', '2024-11-17 17:25:51'),
(28, 'spot', '0', '2022-09-22 04:17:19', '2024-11-17 17:25:51'),
(29, 'wallet', '1', '2022-09-22 04:17:19', '2022-09-24 10:55:35'),
(30, 'heightHeader', '99', '2022-09-22 04:17:19', '2023-11-06 16:13:59'),
(31, 'imageHeader', 'https://rayganapp.ir/upload/image/2022/adHeader.png', '2022-09-22 04:17:19', '2022-10-06 06:03:48'),
(32, 'linkHeader', '/', '2022-09-22 04:17:19', '2022-09-24 10:56:26'),
(33, 'adHeaderStatus', '0', '2022-09-22 04:17:19', '2023-10-14 13:08:07'),
(34, 'imagePopUp', 'https://rayganapp.ir/upload/image/2022/black-hat.png', '2022-09-22 04:17:19', '2022-09-24 10:56:26'),
(35, 'titlePopUp', 'دریافت جایزه با اعلام پیشنهادات', '2022-09-22 04:17:19', '2023-05-16 05:07:13'),
(36, 'addressPopUp', '/faq', '2022-09-22 04:17:19', '2023-05-16 05:07:13'),
(37, 'popUpStatus', '0', '2022-09-22 04:17:19', '2023-09-26 09:02:17'),
(38, 'buttonPopUp', 'ارسال پیشنهاد', '2022-09-22 04:17:19', '2023-05-16 05:07:13'),
(39, 'descriptionPopUp', 'با اعلام مشکل و پیشنهاد برای اسکریپت سئوشاپ جایزه دریافت کنید', '2022-09-22 04:17:19', '2023-05-16 05:07:13'),
(40, 'messageAuth', NULL, '2022-09-22 04:17:19', '2023-02-19 07:54:20'),
(41, 'messageSuccess', NULL, '2022-09-22 04:17:19', '2023-02-19 07:54:20'),
(42, 'messageSuggest', NULL, '2022-09-22 04:17:19', '2023-02-19 07:54:20'),
(43, 'messageCancel', NULL, '2022-09-22 04:17:19', '2023-02-19 07:54:20'),
(44, 'messageBack', NULL, '2022-09-22 04:17:19', '2023-02-19 07:54:20'),
(45, 'messageManager', NULL, '2022-09-22 04:17:19', '2023-02-19 07:54:20'),
(46, 'cooperationPercent', '10', '2022-09-22 04:17:19', '2022-09-24 12:12:42'),
(47, 'cooperationStatus', '1', '2022-09-22 04:17:19', '2024-10-09 09:16:31'),
(48, 'messageCounseling', NULL, '2022-09-22 04:17:19', '2022-09-24 10:55:35'),
(49, 'card', '1', '2022-09-22 04:17:19', '2023-11-21 14:44:59'),
(50, 'cardText', '<p style=\"text-align:center\"><span style=\"font-size:16px\">شماره کارت جهت خرید : </span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"color:#e74c3c\">0000000</span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\">شماره حساب جهت خرید : </span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"color:#e74c3c\">0000000</span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\">شماره شبا جهت خرید : </span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"color:#e74c3c\">0000000</span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\">بعد از واریز حتما رسید را به تلگرام یا واتساپ ما ارسال کنید</span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"color:#2ecc71\">@reza_n_j</span></span></p>', '2022-09-22 04:17:19', '2022-09-24 12:12:42'),
(51, 'userSms', NULL, '2022-09-22 04:17:19', '2023-02-19 07:54:20'),
(52, 'passSms', NULL, '2022-09-22 04:17:19', '2022-09-24 10:55:35'),
(53, 'kaveKey', NULL, '2022-09-22 04:17:19', '2022-09-24 10:56:26'),
(54, 'smsType', '1', '2022-09-22 04:17:19', '2023-02-19 07:54:20'),
(55, 'userFaraz', NULL, '2022-09-22 04:17:19', '2023-02-19 07:54:20'),
(56, 'passFaraz', NULL, '2022-09-22 04:17:19', '2022-09-24 10:55:35'),
(57, 'numberFaraz', NULL, '2022-09-22 04:17:19', '2022-09-24 10:55:35'),
(58, 'minifySource', '1', '2022-09-22 04:17:19', '2023-01-01 15:28:42'),
(59, 'sideColor', '#000000', '2022-09-22 04:17:19', '2023-09-01 09:25:32'),
(60, 'headerColor', '#ffffff', '2022-09-22 04:17:19', '2023-01-02 11:23:48'),
(61, 'headScript', '', '2022-09-22 04:17:19', '2022-09-24 10:56:26'),
(62, 'bodyScript', '', '2022-09-22 04:17:19', '2022-09-24 10:55:35'),
(63, 'giftDis', '10', '2022-09-22 04:17:19', '2022-09-24 10:55:35'),
(64, 'keySadad', NULL, '2022-09-22 04:17:19', '2023-04-15 07:07:13'),
(65, 'merchantSadad', NULL, '2022-09-22 04:17:19', '2023-04-15 07:07:13'),
(66, 'terminalSadad', NULL, '2022-09-22 04:17:19', '2023-04-15 07:07:13'),
(67, 'terminalBeh', NULL, '2022-09-22 04:17:19', '2023-04-15 07:07:13'),
(68, 'userBeh', NULL, '2022-09-22 04:17:19', '2023-04-15 07:07:13'),
(69, 'passwordBeh', NULL, '2022-09-22 04:17:19', '2023-04-15 07:07:13'),
(70, 'profitLoan', '1.5', '2022-09-22 04:17:19', '2022-09-24 10:56:26'),
(71, 'maxPriceLoan', '50000000', '2022-09-22 04:17:19', '2022-09-24 10:56:26'),
(72, 'maxMonthLoan', '40', '2022-09-22 04:17:19', '2022-09-24 10:56:26'),
(73, 'zarinpalStatus', '0', '2022-09-22 04:17:19', '2024-11-17 17:25:51'),
(74, 'zibalStatus', '0', '2022-09-22 04:17:19', '2024-11-17 17:25:51'),
(75, 'nextpayStatus', '0', '2022-09-22 04:17:19', '2024-11-17 17:25:51'),
(76, 'idpayStatus', '0', '2022-09-22 04:17:19', '2024-11-17 17:25:51'),
(77, 'statusBeh', '1', '2022-09-22 04:17:19', '2023-11-21 14:44:59'),
(78, 'statusSadad', '1', '2022-09-22 04:17:19', '2023-11-21 14:44:59'),
(79, 'holidays', '[\"\\u062c\\u0645\\u0639\\u0647\"]', '2022-09-22 04:17:19', '2025-03-29 16:06:20'),
(80, 'tax', '1', '2022-09-22 04:17:19', '2023-04-15 07:07:13'),
(81, 'messageStatus0', NULL, '2022-09-22 04:17:19', '2023-11-21 14:38:19'),
(82, 'messageStatus1', NULL, '2022-09-22 04:17:19', '2023-11-21 14:38:19'),
(83, 'messageStatus2', NULL, '2022-09-22 04:17:19', '2023-04-15 07:07:13'),
(84, 'messageStatus3', NULL, '2022-09-22 04:17:19', '2023-11-21 14:38:19'),
(85, 'statusPasargad', '1', '2022-09-22 04:17:19', '2023-11-21 14:47:01'),
(86, 'statusAsan', '1', '2022-09-22 04:17:19', '2023-11-21 14:44:59'),
(87, 'merchantPasargad', NULL, '2022-09-22 04:17:19', '2023-11-21 14:39:20'),
(88, 'terminalPasargad', NULL, '2022-09-22 04:17:19', '2023-11-21 14:39:20'),
(89, 'certificatePasargad', NULL, '2022-09-22 04:17:19', '2023-11-21 14:39:20'),
(90, 'terminalAsan', NULL, '2022-09-22 04:17:19', '2023-11-21 14:39:20'),
(91, 'userAsan', NULL, '2022-09-22 04:17:19', '2023-11-21 14:39:20'),
(92, 'passwordAsan', NULL, '2022-09-22 04:17:19', '2023-11-21 14:39:20'),
(93, 'textFloat', 'این متن قابل تغییر و حذف است', '2022-09-22 04:17:19', '2022-09-24 10:55:35'),
(94, 'singleDesign', '3', '2022-09-22 04:17:19', '2024-06-18 20:53:31'),
(95, 'messageRegister', NULL, '2022-09-22 04:17:19', '2023-11-21 14:38:19'),
(96, 'headerDesign', '1', '2022-09-22 04:17:19', '2025-03-29 16:16:34'),
(97, 'footerDesign', '2', '2022-09-22 04:17:19', '2024-03-10 06:39:08'),
(98, 'loginDesign', '1', '2022-09-22 04:17:19', '2023-09-03 05:40:06'),
(99, 'google', '0', '2022-09-22 04:17:19', '2024-01-10 16:01:06'),
(100, 'github', '0', '2022-09-22 04:17:19', '2023-09-12 12:38:20'),
(101, 'captchaType', '2', '2022-09-22 04:17:19', '2022-09-22 05:41:37'),
(102, 'captchaStatus', '0', '2022-09-22 04:17:19', '2024-01-10 15:47:41'),
(103, 'font', '1', '2022-09-22 04:17:19', '2024-06-18 20:34:42'),
(104, 'maxGift', '1', '2022-09-22 04:17:19', '2023-09-15 05:22:58'),
(105, 'nameAr', 'SeoShop', '2022-09-22 04:17:19', '2023-04-15 07:07:13'),
(106, 'titleAr', 'متجر سيوشوب الإلكتروني', '2022-09-22 04:17:19', '2023-10-13 14:20:00'),
(107, 'nameEn', 'SeoShop', '2022-09-22 04:17:19', '2022-09-24 10:56:26'),
(108, 'titleEn', 'Seoshop online store', '2022-09-22 04:17:19', '2023-10-13 14:20:00'),
(109, 'nameTr', 'SeoShop', '2022-09-22 04:17:19', '2022-09-24 10:56:26'),
(110, 'titleTr', 'Seoshop çevrimiçi mağazası', '2022-09-22 04:17:19', '2023-10-13 14:20:00'),
(111, 'addressEn', '0', '2022-09-22 04:17:19', '2023-04-15 07:07:13'),
(112, 'addressAr', '0', '2022-09-22 04:17:19', '2023-04-15 07:07:13'),
(113, 'addressTr', '0', '2022-09-22 04:17:19', '2023-04-15 07:07:13'),
(114, 'aboutEn', 'SeoShop is an online store to buy all kinds of things for yourself and your family', '2022-09-22 04:17:19', '2023-10-13 14:20:00'),
(115, 'aboutAr', 'SeoShop هو متجر إلكتروني لشراء جميع أنواع الأشياء لك ولعائلتك', '2022-09-22 04:17:19', '2023-10-13 14:20:00'),
(116, 'aboutTr', 'SeoShop, kendiniz ve aileniz için her türlü şeyi satın alabileceğiniz çevrimiçi bir mağazadır', '2022-09-22 04:17:19', '2023-10-13 14:20:00'),
(117, 'textFloatEn', 'This text can be changed and deleted', '2022-09-22 04:17:19', '2023-10-13 14:20:34'),
(118, 'textFloatAr', 'يمكن تغيير هذا النص وحذفه', '2022-09-22 04:17:19', '2023-10-13 14:20:34'),
(119, 'textFloatTr', 'Bu metin değiştirilebilir ve silinebilir', '2022-09-22 04:17:19', '2023-10-13 14:20:34'),
(120, 'greenColorLight', '#ff8000', '2023-11-18 07:51:18', '2024-06-18 20:48:34'),
(121, 'redColorLight', '#00aa2b', '2023-11-18 07:51:18', '2024-06-18 20:53:31'),
(122, 'backColorLight1', '#f5f5f5', '2023-11-18 07:51:18', '2023-11-18 07:51:18'),
(123, 'headerColorLight', '#ffffff', '2023-11-18 07:51:18', '2023-11-18 07:51:18'),
(124, 'headerColor2Light', '#fcf2de', '2023-11-18 07:51:18', '2024-06-18 20:48:34'),
(125, 'widgetColorLight', '#ffffff', '2023-11-18 07:51:18', '2023-11-18 07:51:18'),
(126, 'singleColorLight', '#ffffff', '2023-11-18 07:51:18', '2023-11-18 07:51:18'),
(127, 'greenColorDark', '#3eba03', '2023-11-18 07:51:18', '2023-11-18 07:51:18'),
(128, 'redColorDark', '#f00000', '2023-11-18 07:51:18', '2023-11-18 07:51:18'),
(129, 'backColorDark1', '#06283d', '2023-11-18 07:51:18', '2023-12-25 12:47:04'),
(130, 'headerColorDark', '#041c32', '2023-11-18 07:51:18', '2023-12-25 12:47:04'),
(131, 'headerColor2Dark', '#001b35', '2023-11-18 07:51:18', '2023-12-25 12:47:04'),
(132, 'widgetColorDark', '#041c32', '2023-11-18 07:51:18', '2023-12-25 12:47:04'),
(133, 'singleColorDark', '#041c32', '2023-11-18 07:51:18', '2023-12-25 12:47:04'),
(134, 'samansep', NULL, '2022-09-22 04:17:19', '2024-11-17 17:25:51'),
(135, 'messageTrack', '', '2022-09-22 04:17:19', '2023-04-15 07:07:13'),
(136, 'statusSaman', '1', '2022-09-22 04:17:19', '2024-11-17 17:25:51'),
(138, 'languageStatus', '0', '2023-11-18 07:51:18', '2024-01-03 19:34:18'),
(139, 'darkStatus', '1', '2022-09-22 04:17:19', '2024-01-03 19:34:18'),
(140, 'cacheTime', '500', '2022-09-22 04:17:19', '2023-04-15 07:07:13'),
(141, 'cacheStatus', '0', '2022-09-22 04:17:19', '2024-02-10 09:24:20'),
(144, 'optimizeImage', '70', '2023-12-15 21:36:34', '2023-12-15 21:36:34'),
(145, 'changeImage', 'webp', '2023-12-15 21:36:34', '2023-12-15 21:36:34'),
(146, 'watermarkImage', '', '2023-12-15 21:36:34', '2023-12-15 21:36:34'),
(147, 'watermarkStatus', '0', '2023-12-15 21:36:34', '2023-12-15 21:36:34'),
(148, 'deliverStatus', '1', '2023-12-15 21:36:34', '2025-03-29 16:06:20'),
(149, 'sellerStatus', '0', '2023-12-15 21:36:34', '2025-03-29 16:06:20'),
(150, 'floatDesign', '1', '2023-12-15 21:36:34', '2023-12-25 12:47:04'),
(158, 'chatStatus', '1', '2023-12-25 12:42:17', '2024-01-16 14:01:33'),
(159, 'ticketStatus', '1', '2023-12-25 12:42:17', '2023-12-25 12:42:17'),
(160, 'userSnap', NULL, '2023-12-25 12:42:17', '2024-11-17 17:25:51'),
(161, 'passwordSnap', NULL, '2023-12-25 12:42:17', '2024-11-17 17:25:51'),
(162, 'idSnap', NULL, '2023-12-25 12:42:17', '2024-11-17 17:25:51'),
(163, 'secretSnap', NULL, '2023-12-25 12:42:17', '2024-11-17 17:25:51'),
(164, 'statusSnap', '0', '2023-12-25 12:42:17', '2023-12-25 12:42:17'),
(165, 'preLoaderStatus', '1', '2024-01-04 15:22:17', '2025-03-29 16:06:20'),
(166, 'newRedirect', NULL, '2024-01-04 15:22:17', '2024-01-10 15:47:41'),
(167, 'redirectStatus', '0', '2024-01-04 15:22:17', '2024-01-10 15:47:41'),
(168, 'backIndex', 'https://false.rayganapp.ir/upload/image/2023/backIndex111.png', '2022-09-22 04:17:19', '2024-06-18 20:29:43'),
(169, 'scoreDay', '10', '2024-09-21 12:13:55', '2024-09-21 12:13:55'),
(170, 'messageTicket', '', '2023-12-25 12:42:17', '2023-12-25 12:42:17'),
(171, 'messageTicketManager', '', '2022-09-22 04:17:19', '2023-04-15 07:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `day` varchar(100) DEFAULT NULL,
  `expire` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `parent_id` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `tag_id` int(11) NOT NULL,
  `taggables_id` int(11) NOT NULL,
  `taggables_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` tinyint(4) DEFAULT 0,
  `slug` varchar(255) NOT NULL,
  `nameSeo` varchar(255) DEFAULT NULL,
  `language` varchar(3) DEFAULT 'fa',
  `bodySeo` text DEFAULT NULL,
  `image` varchar(400) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `keyword` varchar(400) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tanks`
--

CREATE TABLE `tanks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT 0,
  `product_id` bigint(20) NOT NULL DEFAULT 0,
  `count` bigint(20) NOT NULL DEFAULT 0,
  `type` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `answer` text DEFAULT NULL,
  `property` varchar(20) DEFAULT NULL,
  `body` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `type` tinyint(4) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT '0',
  `file` varchar(255) DEFAULT NULL,
  `parent_id` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timables`
--

CREATE TABLE `timables` (
  `time_id` int(11) NOT NULL,
  `timables_id` int(11) NOT NULL,
  `timables_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nameEn` varchar(255) DEFAULT NULL,
  `from` smallint(6) NOT NULL,
  `to` smallint(6) NOT NULL,
  `day` smallint(6) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `buy` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `landingPhone` varchar(20) DEFAULT NULL,
  `shaba` varchar(40) DEFAULT NULL,
  `seller` tinyint(4) NOT NULL DEFAULT 0,
  `number` varchar(15) DEFAULT NULL,
  `referral` bigint(20) DEFAULT NULL,
  `profile` varchar(400) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `suspension` tinyint(1) NOT NULL DEFAULT 0,
  `parent_id` bigint(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `buy`, `body`, `landingPhone`, `shaba`, `seller`, `number`, `referral`, `profile`, `slug`, `suspension`, `parent_id`, `email`, `admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SeoShop', NULL, NULL, NULL, NULL, 0, NULL, 1234567, NULL, 'SeoShop', 0, 0, NULL, 1, NULL, '$2y$10$pyIQBQ.M9q1kzRqSiEHc9uJvrvc5L8b7oXvTPdmSRtOJ/A0cgTbLG', NULL, NULL, '2023-11-14 16:40:01'),
(4, 'Reza', '0', NULL, NULL, NULL, 0, NULL, 7894561, NULL, 'reza', 0, 0, 'admin111@gmail.com', 1, NULL, '$2y$10$RCp2Z7GhMRbkdDAul69lMehKBKw93rTpcWzae4tFxHlB7wgPzgPFu', NULL, '2022-09-21 09:57:29', '2023-08-04 12:22:09'),
(13, '1665772772', NULL, NULL, NULL, NULL, 0, NULL, 5346842, NULL, '1665772772', 0, 0, NULL, 0, NULL, '$2y$10$JOLKSLFFfoAjJ8y6SBvQG.WasJzLvZST8bXbY1eS2A9Exz9QKagXS', NULL, '2022-10-14 15:09:32', '2022-10-14 15:09:32'),
(14, '1665816901', NULL, NULL, NULL, NULL, 0, NULL, 3686926, NULL, '1665816901', 0, 0, NULL, 0, NULL, '$2y$10$1szEdKoFsSjXuZDpdw2ExOZELqYQkTv6dkb341OMG6qdB6Ki/Xu8K', NULL, '2022-10-15 03:25:02', '2022-10-15 03:25:02'),
(15, 'adminqc3', NULL, NULL, NULL, NULL, 0, NULL, 3554784, NULL, 'adminqc3', 0, NULL, NULL, 0, NULL, '$2y$10$qHKSufwsTq0E53wf.DicHuJ.IyEEHBbom.8qMCcCTws03slKCuOIC', NULL, '2022-10-15 08:45:48', '2023-11-14 16:40:01'),
(16, '1665928782', NULL, NULL, NULL, NULL, 0, NULL, 5675661, NULL, '1665928782', 0, 0, NULL, 0, NULL, '$2y$10$knNmXOFj0fo4tJ07PKMP0O/Hu5xipxC7//yfp/XUgR22hAwBL0nkG', NULL, '2022-10-16 10:29:42', '2022-10-16 10:29:42'),
(17, '1665928824', NULL, NULL, NULL, NULL, 0, NULL, 4567431, NULL, '1665928824', 0, 0, NULL, 0, NULL, '$2y$10$x5kC3jWCSIg7248eimf2c.tpg.OhKcjQfAMLXAF3wodcRTYg6MQ..', NULL, '2022-10-16 10:30:24', '2022-10-16 10:30:24'),
(18, 'Firozeh', NULL, NULL, NULL, NULL, 0, NULL, 7413018, NULL, 'firozeh', 0, 0, NULL, 0, NULL, '$2y$10$5w9kajamK2Gwcbs9.gDcWOiY6LlE/tePKUz9ia0tjA0IWZ0UtOfpO', NULL, '2022-10-16 10:38:49', '2023-11-14 16:40:01'),
(19, '1666550548', NULL, NULL, NULL, NULL, 0, NULL, 2703435, NULL, '1666550548', 0, 0, NULL, 0, NULL, '$2y$10$FXHYoAJxgf3hGK.yx.RN5eQACteOz4sO.fU14qw0r9wACMuV3ZXhK', NULL, '2022-10-23 15:12:29', '2022-10-23 15:12:29'),
(20, '1666733913', NULL, NULL, NULL, NULL, 0, NULL, 7516731, NULL, '1666733913', 0, 0, NULL, 0, NULL, '$2y$10$LVrmPh0IeHrKY6R8xA.ZreY.PU6ta9uvEg/DscUJqD.tomQlKP/Fi', NULL, '2022-10-25 18:08:33', '2022-10-25 18:08:33'),
(21, 'Negar70', NULL, NULL, NULL, NULL, 0, NULL, 5612186, NULL, 'negar70', 0, 0, NULL, 0, NULL, '$2y$10$toO7GROzT/HzAABh6/skWuDJ6YKifaDHlDsGLnSuwG/XroGBswrUK', NULL, '2022-10-27 10:46:23', '2023-11-14 16:40:01'),
(22, '1667279833', NULL, NULL, NULL, NULL, 0, NULL, 8471313, NULL, '1667279833', 0, 0, NULL, 0, NULL, '$2y$10$tseHmJOE8CVrAokq3ENIseVXcGiR6MZZhG4/KbYe6Rnw4KeGx463.', NULL, '2022-11-01 01:47:13', '2023-11-14 16:40:01'),
(23, 'app', NULL, NULL, NULL, NULL, 0, NULL, 6133517, NULL, 'app', 0, 0, NULL, 0, NULL, '$2y$10$La2/l8nPeBoxp3eXE.Q6ROjegWySwwOoMLXKY4utwwWQkGJYeYvK6', NULL, '2022-11-01 01:48:57', '2023-11-14 16:40:01'),
(24, 'milad', NULL, NULL, NULL, NULL, 0, NULL, 7379019, NULL, 'milad', 0, 0, NULL, 0, NULL, '$2y$10$94sWCRPyuFR.XtGVGZXpK.l71kNCC07k2/16.U9EmbRPtMplaapd.', NULL, '2022-11-01 01:51:03', '2023-11-14 16:40:01'),
(25, '1667658994', NULL, NULL, NULL, NULL, 0, NULL, 7378086, NULL, '1667658994', 0, 0, NULL, 0, NULL, '$2y$10$rFI9Vtb5zj8vARnHAIzfPuVcWYh8yIQquRqgqZIuHhpSCWhYXCOKC', NULL, '2022-11-05 11:06:34', '2023-11-14 16:40:01'),
(26, 'mrdivax', NULL, NULL, NULL, NULL, 0, NULL, 8355219, NULL, 'mrdivax', 0, 0, NULL, 0, NULL, '$2y$10$MpYfuBgEkdwLzYVUkbwt/uIynhzHcCcNCpiS.TyONOlmhrGK858pi', NULL, '2022-11-05 13:45:23', '2023-11-14 16:40:01'),
(27, '1668191475', NULL, NULL, NULL, NULL, 0, NULL, 8713217, NULL, '1668191475', 0, 0, NULL, 0, NULL, '$2y$10$3ipvu6p1/U8UCYBvccAHWuQVHoi8BwGvzMzK3GLaBX1.HLOfuZCna', NULL, '2022-11-11 15:01:15', '2023-11-14 16:40:01'),
(28, '1669493546', NULL, NULL, NULL, NULL, 0, NULL, 6244241, NULL, '1669493546', 0, 0, NULL, 0, NULL, '$2y$10$QtD.zoVmN2x/1S49ECXmBeQGBsntJ58ATKqoeW7qv5AwFfx68BaSC', NULL, '2022-11-26 16:42:26', '2023-11-14 16:40:01'),
(29, 'امیر', NULL, NULL, NULL, NULL, 0, NULL, 9635037, NULL, 'm-r', 0, 0, NULL, 0, NULL, '$2y$10$Aqm0sT.op1P634PlJQR9E.w1FfFtOipNl/CR44XOc1TeznZN2igG2', NULL, '2022-11-30 13:55:18', '2023-11-14 16:40:01'),
(30, 'mrhedyehzadeh', NULL, NULL, NULL, NULL, 0, NULL, 9983965, NULL, 'mrhedyehzadeh', 0, 0, NULL, 0, NULL, '$2y$10$7ArjUOE02KttLM9QJkAHVuw2QPI9lmMqda5gZ.FOoN.3oeqR90/ZG', NULL, '2022-12-07 01:08:11', '2023-11-14 16:40:01'),
(31, '1670632455', NULL, NULL, NULL, NULL, 0, NULL, 7484736, NULL, '1670632455', 0, 0, NULL, 0, NULL, '$2y$10$VYhzlZGJTO/LW2sulbPE2.ZP/1oAlP4crga./LPYXn19ZCTy2Ltqq', NULL, '2022-12-09 21:04:15', '2023-11-14 16:40:01'),
(32, 'Mikel', NULL, NULL, NULL, NULL, 0, NULL, 9098701, NULL, 'mikel', 0, 0, NULL, 0, NULL, '$2y$10$IlUPicQ2gcG4pdrcOAIOSuM0GxOdndfvPMl5m5Txezpd04eT8ZFIe', NULL, '2022-12-10 00:12:44', '2023-11-14 16:40:01'),
(33, 'test', NULL, NULL, NULL, NULL, 0, NULL, 3177708, NULL, 'test', 0, 0, NULL, 0, NULL, '$2y$10$e.Vq9Gi7J5RDhAXA63eB/u2Ase863/iigY6yJY/QKMAd36cu/rbou', NULL, '2022-12-11 13:44:47', '2023-11-14 16:40:01'),
(34, 'faridepc78', NULL, NULL, NULL, NULL, 0, NULL, 2872087, NULL, 'faridepc78', 0, 0, NULL, 0, NULL, '$2y$10$t8JRoaLxH4Fqz6R6qfJ.W.8pwygPhOcIo/jJ0qmwTSVSoWBVBDtNe', NULL, '2022-12-11 18:08:46', '2023-11-14 16:40:01'),
(35, 'MiooZi', NULL, NULL, NULL, NULL, 0, NULL, 4686724, NULL, 'mioozi', 0, 0, NULL, 0, NULL, '$2y$10$DZdMPKrXs20hM.Ry6mmjsuhh5v0ISl97aGjtBBj9YPByzEUnjJima', NULL, '2022-12-12 10:47:25', '2023-11-14 16:40:01'),
(36, 'aydin', NULL, NULL, NULL, NULL, 0, NULL, 8369346, NULL, 'aydin', 0, 0, NULL, 0, NULL, '$2y$10$3mQ5d6YKZNitVJXpXQQotuwMEEmwqEpI4Lt2zdUBTkggoTj5Gh7D.', NULL, '2022-12-13 12:08:17', '2023-11-14 16:40:01'),
(37, 'ethandii', NULL, NULL, NULL, NULL, 0, NULL, 8454633, NULL, 'ethandii', 0, 0, NULL, 0, NULL, '$2y$10$6iIoi6Yg4p9KQAUV5etodeuttHx.nCbO.QtTuNKhQKpQKOaPmVjjC', NULL, '2022-12-16 13:42:54', '2023-11-14 16:40:01'),
(38, 'Ots', NULL, NULL, NULL, NULL, 0, NULL, 6371349, NULL, 'ots', 0, 0, NULL, 0, NULL, '$2y$10$1JaV5glipaoo.c99sfe8/ecS8RvNSeWerOVW4i0rocdMd0N0MUy7i', NULL, '2022-12-18 12:01:21', '2023-11-14 16:40:01'),
(39, 'Morteza9012', NULL, NULL, NULL, NULL, 0, NULL, 7033495, NULL, 'morteza9012', 0, 0, NULL, 0, NULL, '$2y$10$s1SIngw538SiL9dFFbOUquK0kZ4w9VQbV/wE8rcq3n.USV/xoTBIW', NULL, '2022-12-18 14:07:48', '2023-11-14 16:40:01'),
(40, 'Amir', NULL, NULL, '07136278696', NULL, 0, NULL, 4293188, NULL, 'amir', 0, 0, NULL, 0, NULL, '$2y$10$DmcD7D.BChkhHF/VEWN3meH7H.oM2xUEa6G9.6Z/lqDdjfBfbDtwe', NULL, '2022-12-20 03:48:54', '2023-11-14 16:40:01'),
(41, 'فاطمه رئوفی', NULL, NULL, NULL, NULL, 0, NULL, 8988845, NULL, 'f-tmh-r-of', 0, 0, NULL, 0, NULL, '$2y$10$x6UMESw9VTWV.ARiKQRdzejXP86Krc9qmmxd7PDoEdTQySA3Nnora', NULL, '2022-12-20 07:23:50', '2023-11-14 16:40:01'),
(42, 'omid68.yousefi', NULL, NULL, NULL, NULL, 0, NULL, 1672678, NULL, 'omid68-yousefi', 0, 0, NULL, 0, NULL, '$2y$10$h.MEwLszelkC3cM9dphPQ.WbTUAs5YOZHG3WPCGyBPZ/MinQX13Uy', NULL, '2022-12-21 06:00:09', '2023-11-14 16:40:01'),
(43, 'Yasx8010', NULL, NULL, NULL, NULL, 0, NULL, 8580678, NULL, 'yasx8010', 0, 0, NULL, 0, NULL, '$2y$10$z8FU4vW3kGrvuYVafrV2H.gohPtqr.0yhbUVTBDN7AwdN4PtVMFrm', NULL, '2022-12-21 07:01:45', '2023-11-14 16:40:01'),
(44, 'vendor', NULL, NULL, NULL, NULL, 0, NULL, 4722332, NULL, 'vendor', 0, NULL, NULL, 0, NULL, '$2y$10$tRiaK86opnnqV8k74k6YJ.0d4/CjDTYpEMbXO4WmfNFUg/NOn1GzO', NULL, '2022-12-30 15:40:49', '2023-11-14 16:40:01'),
(45, '1672981713', NULL, NULL, NULL, NULL, 0, NULL, 1450065, NULL, '1672981713', 0, 0, NULL, 0, NULL, '$2y$10$1Kb1WemR5n1PrnitWWmCUOQx9FJbwOuoJlT8I3Q0b4sEt4g0l8wfC', NULL, '2023-01-06 04:08:33', '2023-11-14 16:40:01'),
(46, '123456', NULL, NULL, NULL, NULL, 0, NULL, 4130469, NULL, '123456', 0, NULL, NULL, 0, NULL, '$2y$10$vCGO9gQCBqEZhEWDBvj6eeNRZkKxQQJWM909HO7VqDdAGpR0wMf/2', NULL, '2023-01-14 10:08:54', '2023-11-14 16:40:01'),
(47, '1674734125', NULL, NULL, NULL, NULL, 0, NULL, 2152229, NULL, '1674734125', 0, 0, NULL, 0, NULL, '$2y$10$r67y2oskR5J2EfFWaPX7.Oztx4egiyeUkLLKNOtpMj4CW0by5.q0.', NULL, '2023-01-26 10:55:25', '2023-11-14 16:40:01'),
(48, '1677325756', NULL, NULL, NULL, NULL, 0, NULL, 2210146, NULL, '1677325756', 0, 0, NULL, 0, NULL, '$2y$10$MIIii.uigfHvUsxM4KNPg.T780kmUskN7/cNYW.KXUlIRF4mf0CS6', NULL, '2023-02-25 10:49:16', '2023-11-14 16:40:01'),
(49, 'mr', NULL, NULL, NULL, NULL, 0, NULL, 1410397, NULL, 'mr', 0, NULL, NULL, 0, NULL, '$2y$10$LUh3RMRA0f6qxuKm1p1ILu/Ygdt.qrg/umnmLbeQCVayCPNoi.t3O', NULL, '2023-03-09 16:41:22', '2023-11-14 16:40:01'),
(50, '1679502374', NULL, NULL, NULL, NULL, 0, NULL, 5292608, NULL, '1679502374', 0, 0, NULL, 0, NULL, '$2y$10$UEHD96VH1XzfwcLqIcv6ceF9u/6jhDLoxdgMUmIt5L3CWiqq8oUfS', NULL, '2023-03-22 15:26:14', '2023-11-14 16:40:01'),
(51, 'Bij97', NULL, NULL, NULL, NULL, 0, NULL, 9189915, NULL, 'bij97', 0, 0, NULL, 0, NULL, '$2y$10$fH8ibpgSptfvB/7WWHJbyOPjE3M.kAcTEqMm8RAHvfHVD4mVfmtBG', NULL, '2023-05-06 09:47:09', '2023-11-14 16:40:01'),
(52, 'lsms', NULL, NULL, NULL, NULL, 0, NULL, 7792312, NULL, 'lsms', 0, 0, NULL, 0, NULL, '$2y$10$KyV4yBDCuGCOhXOmOqBkouzezRPT9umKXAhWKHlu4TAfjLH78vdvC', NULL, '2023-05-08 03:46:48', '2023-11-14 16:40:01'),
(53, 'مجتبی', NULL, NULL, NULL, NULL, 0, NULL, 1386473, NULL, 'mgtb', 0, 0, NULL, 0, NULL, '$2y$10$FYhr/FOyE7IKEqGTw8w1i.KO7dyy/IW7dPGn/hTs7KFXgMofaBOuO', NULL, '2023-05-08 21:07:08', '2023-11-14 16:40:01'),
(54, 'البرز سربازی', NULL, NULL, NULL, NULL, 0, NULL, 7432036, NULL, 'lbrz-srb-z', 0, 0, NULL, 0, NULL, '$2y$10$sb6YJ1ro5TJ6ciQtEHYyeuzAhM6tqeBotbldCT84a4vEkgL.4tz7y', NULL, '2023-05-09 15:44:05', '2023-11-14 16:40:01'),
(55, '1683906484', NULL, NULL, NULL, NULL, 0, NULL, 6772355, NULL, '1683906484', 0, 0, NULL, 0, NULL, '$2y$10$KQTKafNlqwFtmh1F9YPi8eMri5IQbN13QRuBaslleUxnl/C98aXZO', NULL, '2023-05-12 13:48:04', '2023-11-14 16:40:01'),
(56, '1683906505', '0', NULL, NULL, NULL, 0, NULL, 5570551, NULL, '1683906505', 0, 0, NULL, 0, NULL, '$2y$10$UvuwkzwC6fueOpdUualCIudU9qyH5fEzDVJw6eIoHucs0zT8WIASe', NULL, '2023-05-12 13:48:25', '2023-11-14 16:40:01'),
(57, 'taha', NULL, NULL, NULL, NULL, 0, NULL, 2184952, NULL, 'taha', 0, 0, NULL, 0, NULL, '$2y$10$eHR30oIaGWkJ/rUTaX.wP.U4h8lwXY3OTUr.JxR5Mp9kPlTGLkYya', NULL, '2023-05-15 12:14:22', '2023-11-14 16:40:01'),
(58, 'Mahdi Khodashahri', NULL, NULL, NULL, NULL, 0, NULL, 4780114, NULL, 'mahdi-khodashahri', 0, 0, NULL, 0, NULL, '$2y$10$Q8xejm6S7c/0tajdXRQ.zuGD2XxtVCeTtQa28OMWhGb0j3aqFcgVS', NULL, '2023-05-18 19:30:57', '2023-11-14 16:40:01'),
(59, 'اشکان جمالی', NULL, NULL, NULL, NULL, 0, NULL, 9887391, NULL, 'sh-n-gm-l', 0, 0, NULL, 0, NULL, '$2y$10$fNNahTdM.1iR0WaF4p/F7OLHBUsjDq75Xh/UffW7o2NHrDZzPZDUG', NULL, '2023-05-20 04:16:29', '2023-11-14 16:40:01'),
(60, 'Habibmortazavi', NULL, NULL, NULL, NULL, 0, NULL, 2599848, NULL, 'habibmortazavi', 0, 0, NULL, 0, NULL, '$2y$10$U0TfS9xrFAqKwJ8WxRKbBuLJtIL1UmDKBreGPA/NF8Jm3BmHxulkC', NULL, '2023-05-21 03:17:30', '2023-11-14 16:40:01'),
(61, 'day_mori', NULL, NULL, NULL, NULL, 0, NULL, 1211113, NULL, 'day-mori', 0, 0, NULL, 0, NULL, '$2y$10$G.bZCK5aJyDWusNUkIOjC.RpE3P4G3GtrhvUtZxGhDsn86EbnLbNa', NULL, '2023-05-22 07:41:24', '2023-11-14 16:40:01'),
(62, 'Esi', NULL, NULL, NULL, NULL, 0, NULL, 4299165, NULL, 'esi', 0, 0, NULL, 0, NULL, '$2y$10$v5/0RRjplVTFOlDATWS.LOtIRM1Vl7y0Bx0PWuctnrmW530VYoY1u', NULL, '2023-05-23 04:47:40', '2023-11-14 16:40:01'),
(63, 'Yashar', NULL, NULL, NULL, NULL, 0, NULL, 3783003, NULL, 'yashar', 0, 0, NULL, 0, NULL, '$2y$10$EFC92a9lcdz1AXLVF4BLyup2fj9IOyowdYeKTn2V4LONF.Mb9jN6i', NULL, '2023-05-23 07:30:09', '2023-11-14 16:40:01'),
(64, '5620', NULL, NULL, NULL, NULL, 0, NULL, 1265077, NULL, '5620', 0, 0, NULL, 0, NULL, '$2y$10$NDmmf3v.fFPfZhzeoamo4e5SQlWAShIFvuXYuBfs6kBTd4txqhoVu', NULL, '2023-05-25 12:13:17', '2023-11-14 16:40:01'),
(65, 'hossein9h', NULL, NULL, NULL, NULL, 0, NULL, 6435282, NULL, 'hossein9h', 0, 0, NULL, 0, NULL, '$2y$10$EFKAe6WvJp1eyN6VMqhLNuSwYXjGof4pl17dO3.2vYYwXRNrMI.46', NULL, '2023-05-26 20:05:57', '2023-11-14 16:40:01'),
(66, 'mehdiii082', NULL, NULL, NULL, NULL, 0, NULL, 5952466, NULL, 'mehdiii082', 0, 0, NULL, 0, NULL, '$2y$10$gBljAkudtPmbp04ZAXNFYOe1sRxqqR/g28VDTOCkvOL0QZpkTk6SO', NULL, '2023-05-27 09:39:30', '2023-11-14 16:40:01'),
(67, 'علی', NULL, NULL, NULL, NULL, 0, NULL, 2032423, NULL, 'aal', 0, 0, NULL, 0, NULL, '$2y$10$SHGrJP1m.v9iUAijYqDhBOXbGpHWIBmkDdhS70ghEBYQ85XJwoJYS', NULL, '2023-05-28 11:11:00', '2023-11-14 16:40:01'),
(68, 'Amin00988', NULL, NULL, NULL, NULL, 0, NULL, 1114851, NULL, 'amin00988', 0, 0, NULL, 0, NULL, '$2y$10$jF6XJJcrA3.ecQyhE0UGA.limxYFdfUaitUePV.f75EbzUanv5iEO', NULL, '2023-06-14 17:46:25', '2023-11-14 16:40:01'),
(69, 'مهدی', NULL, NULL, NULL, NULL, 0, NULL, 1666639, NULL, 'mhd', 0, 0, NULL, 0, NULL, '$2y$10$ijIFvGvVUrus8Kd/4yNs8OKCHJ85bWGjxrIGp2kcmaEtmLpMgpz0q', NULL, '2023-06-14 19:27:48', '2023-11-14 16:40:01'),
(70, 'حسنیه کشاورز', NULL, NULL, NULL, NULL, 0, NULL, 4835668, NULL, 'hsn-h-sh-orz', 0, 0, NULL, 0, NULL, '$2y$10$JrFI9Dn91UGyqztCJupDruLhl09dSkYwqElBPc04O69v6u0zOligu', NULL, '2023-06-15 07:43:29', '2023-11-14 16:40:01'),
(71, 'j.pakdel@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, 9431449, NULL, 'j-pakdelatgmail-com', 0, 0, NULL, 0, NULL, '$2y$10$JLKM3OtqCpRe7Mzf8nGwk.eOjtFqf.XrzQzadJ3bKV6tAKZYeCfoK', NULL, '2023-06-15 18:28:57', '2023-11-14 16:40:01'),
(72, 'Alireza', NULL, NULL, NULL, NULL, 0, NULL, 5873098, NULL, 'alireza', 0, 0, NULL, 0, NULL, '$2y$10$f1s7FrwtisrgfbNTFU8KIOoPgEQvsoShgjlLOtDfUPlhl14L3Tl2y', NULL, '2023-06-16 08:29:13', '2023-11-14 16:40:01'),
(73, 'pedrampishdad', NULL, NULL, NULL, NULL, 0, NULL, 5435926, NULL, 'pedrampishdad', 0, 0, NULL, 0, NULL, '$2y$10$RnqS.TlB7mCWYEjiHMMJYeQ.y8n.HrtZPOBIYigdzZOojjzANdfV.', NULL, '2023-06-16 08:49:01', '2023-11-14 16:40:01'),
(74, 'احسان آهنگر دارابی', NULL, NULL, NULL, NULL, 0, NULL, 7284133, NULL, 'hs-n-hn-r-d-r-b', 0, 0, NULL, 0, NULL, '$2y$10$aASTHb4KC.7PcblfKEbdm.afu4ebZDQgg47TIg2MIM2MVENzfpokG', NULL, '2023-06-16 17:36:07', '2023-11-14 16:40:01'),
(75, 'Mortezataj777', NULL, NULL, NULL, NULL, 0, NULL, 2240803, NULL, 'mortezataj777', 0, 0, NULL, 0, NULL, '$2y$10$/aQloPTcKPQKYnAPL1q74e6ec46OQ3Oz11dL.XCQmSDQd2Eimo8oW', NULL, '2023-06-17 08:59:31', '2023-11-14 16:40:01'),
(76, 'Hamed.arsin', NULL, NULL, NULL, NULL, 0, NULL, 4578450, NULL, 'hamed-arsin', 0, 0, NULL, 0, NULL, '$2y$10$JuOu2LzVgq9lh3MK/fNs7uAUSQru6/MRqKHT7vbLGcqrc4a58Cw16', NULL, '2023-06-17 16:16:18', '2023-11-14 16:40:01'),
(77, 'متین قدسی', NULL, NULL, NULL, NULL, 0, NULL, 7848292, NULL, 'mt-n-kds', 0, 0, NULL, 0, NULL, '$2y$10$SgbQZ3ipp3lwM8p.0tup2uamkwI6MsfnWFfDQbLpTYf67vPCECteq', NULL, '2023-06-18 11:35:27', '2023-11-14 16:40:01'),
(78, 'مجید', NULL, NULL, NULL, NULL, 0, NULL, 8684453, NULL, 'mg-d', 0, 0, NULL, 0, NULL, '$2y$10$LZcxI29rLIKpoBjTDWQ.uuulnsRBgm/0ufeZn1Kl0W49pE/zBYpwW', NULL, '2023-06-19 02:09:33', '2023-11-14 16:40:01'),
(80, 'فرزاد هنرمند ابراهیمی', NULL, NULL, NULL, NULL, 0, NULL, 8280665, NULL, 'frz-d-hnrmnd-br-h-m', 0, 0, NULL, 0, NULL, '$2y$10$XTLifvfIboRhxG3DNzPvK.ili9toZwkcbnX3/Q/FvrbyONsCDT9lm', NULL, '2023-06-19 12:16:38', '2023-11-14 16:40:01'),
(81, 'علیرضا زین العابدین زاده', NULL, NULL, NULL, NULL, 0, NULL, 2128135, NULL, 'aal-rd-z-n-laa-bd-n-z-dh', 0, 0, NULL, 0, NULL, '$2y$10$6LIydzcFOhlNOPLr5dXQ5..oymnYHlfrDWpl9Cmt7u98hksG8IzRO', NULL, '2023-06-21 10:36:08', '2023-11-14 16:40:01'),
(82, 'mohamad4m', NULL, NULL, NULL, NULL, 0, NULL, 8865480, NULL, 'mohamad4m', 0, 0, NULL, 0, NULL, '$2y$10$plY4DBltjww3./nAiOVN9u4i09Ho8AQnPS9HSHxPzW4ouak3NHTkq', NULL, '2023-06-22 11:38:59', '2023-11-14 16:40:01'),
(83, 'محسن بوالحسنی', NULL, NULL, NULL, NULL, 0, NULL, 2059289, NULL, 'mhsn-bo-lhsn', 0, 0, NULL, 0, NULL, '$2y$10$WeVYLHj9oED17USEoyqUF.MswScb4ULj8e1sgPAed15m9jbDePOJe', NULL, '2023-06-23 05:29:28', '2023-11-14 16:40:01'),
(84, 'هادی', NULL, NULL, NULL, NULL, 0, NULL, 8994799, NULL, 'h-d', 0, 0, NULL, 0, NULL, '$2y$10$bhnB/.TRASkfXbRBCNLg5uU3CY2PqLluS0g32HmWaR60V22E6KprW', NULL, '2023-06-24 02:59:23', '2023-11-14 16:40:01'),
(85, 'shirintm', NULL, NULL, NULL, NULL, 0, NULL, 3427129, NULL, 'shirintm', 0, 0, NULL, 0, NULL, '$2y$10$SGC4434GBEOMMmLwbbQI2uLLxTPaEdfy6baAA6ITT8VO5Yyq8GriK', NULL, '2023-06-26 18:29:57', '2023-11-14 16:40:01'),
(86, 'Saeid', NULL, NULL, NULL, NULL, 0, NULL, 4183128, NULL, 'saeid', 0, 0, NULL, 0, NULL, '$2y$10$oXgrQ9EPIv6zpVLLeI3OaO/Wo54TCYNANBCIVLIjDAKZPGJR5s9SS', NULL, '2023-06-27 03:30:18', '2023-11-14 16:40:01'),
(87, 'ehsan', NULL, NULL, NULL, NULL, 0, NULL, 2253831, NULL, 'ehsan', 0, 0, NULL, 0, NULL, '$2y$10$oUEKb7xo.h8qpFd9QURdMuHZ2Yyr/AmhHovjBxr1AUbEzvuzn.S3K', NULL, '2023-06-27 05:13:22', '2023-11-14 16:40:01'),
(88, 'امین تیموری', NULL, NULL, NULL, NULL, 0, NULL, 6738054, NULL, 'm-n-t-mor', 0, 0, NULL, 0, NULL, '$2y$10$XMBXkzY9wMt/IfrYQ3OntO54DbL26UjTfwIj/5DeX8cTPbXsmqBy2', NULL, '2023-06-27 08:58:11', '2023-11-14 16:40:01'),
(89, 'Nader', NULL, NULL, NULL, NULL, 0, NULL, 9261360, NULL, 'nader', 0, 0, NULL, 0, NULL, '$2y$10$8dNGM11v8dZKrFchiXTlk.2RyihRLea83SZHDnGG2eN9.eiCECCiq', NULL, '2023-06-28 02:49:13', '2023-11-14 16:40:01'),
(90, 'lord_blood', NULL, NULL, NULL, NULL, 0, NULL, 1656052, NULL, 'lord-blood', 0, 0, NULL, 0, NULL, '$2y$10$CmessncN9tb4o0gIPPZwAOT3m.FdqvgEI6K6.4gl73riFbkecVZuu', NULL, '2023-06-29 20:26:56', '2023-11-14 16:40:01'),
(91, 'کاویان', NULL, NULL, NULL, NULL, 0, NULL, 6542049, NULL, 'o-n', 0, 0, NULL, 0, NULL, '$2y$10$xhP/3AoLmte4PojFdMTMQe6rkc8aG7tkrxFW/2n7wubz1I6HoMhDS', NULL, '2023-06-30 13:39:43', '2023-11-14 16:40:01'),
(92, 'نیلوفر حاجی زاده', NULL, NULL, NULL, NULL, 0, NULL, 8330512, NULL, 'n-lofr-h-g-z-dh', 0, 0, NULL, 0, NULL, '$2y$10$MsJwALgvN38C/.KbavHxVOWAWL2fTQsIR6oT1ho/Z1H4sCKfKDU.u', NULL, '2023-07-04 11:56:04', '2023-11-14 16:40:01'),
(93, 'yousefieee', NULL, NULL, NULL, NULL, 0, NULL, 2146504, NULL, 'yousefieee', 0, 0, NULL, 0, NULL, '$2y$10$BNlWQg78pFb2YpQyRbc6SunZE0Fq14Fdo8.MzmGewVac46NTnE7vC', NULL, '2023-07-05 08:42:28', '2023-11-14 16:40:01'),
(94, 'chook', NULL, NULL, NULL, NULL, 0, NULL, 8953286, NULL, 'chook', 0, 0, NULL, 0, NULL, '$2y$10$Ve88YMn8/sAonlW6wo0QWO3cnBgQb.Q2MLSkdAHEqKrCUK4wQtiPu', NULL, '2023-07-05 11:49:37', '2023-11-14 16:40:01'),
(95, 'Drmostafa', '0', NULL, NULL, NULL, 0, NULL, 2618161, NULL, 'drmostafa', 0, 0, NULL, 0, NULL, '$2y$10$jIUpV4ZaQXLMvxZ5MjIsPulKrq3/bYFfcb6hk8QQUGonbJkXUTxHm', NULL, '2023-07-06 16:21:45', '2023-11-14 16:40:01'),
(96, 'زهرا', NULL, NULL, NULL, NULL, 0, NULL, 3448095, NULL, 'zhr', 0, 0, NULL, 0, NULL, '$2y$10$L2byrbRq9wB5FfNO14uMDO8f2.zJ73TaREwt.5JKebq2pNLPuCvjW', NULL, '2023-07-07 07:03:59', '2023-11-14 16:40:01'),
(97, 'mmehr', NULL, NULL, NULL, NULL, 0, NULL, 2052328, NULL, 'mmehr', 0, 0, NULL, 0, NULL, '$2y$10$Y3dK.Xbv0DfQ7t8Vp.Gj5.rdVcR/PtYa.gmTBApCNMtI8K3GPFoz2', NULL, '2023-07-07 19:13:06', '2023-11-14 16:40:01'),
(98, 'h11.khalkhali@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, 9427929, NULL, 'h11-khalkhaliatgmail-com', 0, 0, NULL, 0, NULL, '$2y$10$54mzInz3EjwHD8hEFwaBSe0liBD.Z2/1sYSE.10rxJuoDlGN8P5QC', NULL, '2023-07-09 04:16:13', '2023-11-14 16:40:01'),
(99, 'سید محمد جلال پور', NULL, NULL, NULL, NULL, 0, NULL, 6845884, NULL, 's-d-mhmd-gl-l-or', 0, 0, NULL, 0, NULL, '$2y$10$kfacuwnSZascnCvMoG0wwOdz4uldDSQfhmx4jLi.Mf3PC0.TSAAr.', NULL, '2023-07-12 06:58:07', '2023-11-14 16:40:01'),
(100, 'mehraboon', NULL, NULL, NULL, NULL, 0, NULL, 9899111, NULL, 'mehraboon', 0, 0, NULL, 0, NULL, '$2y$10$0EP1SydLFePb7zNUXyzoFeRPRAyfN9vXbuwTBGdnn0BRxknbg.qXW', NULL, '2023-07-12 13:59:38', '2023-11-14 16:40:01'),
(101, 'علی شیرزاد', NULL, NULL, NULL, NULL, 0, NULL, 8013272, NULL, 'aal-sh-rz-d', 0, 0, NULL, 0, NULL, '$2y$10$myHbz6d4RU7voFcf1wOp5uHEEazoBccaQIQIHI9.3WApwyXlEg7Cu', NULL, '2023-07-12 19:11:54', '2023-11-14 16:40:01'),
(102, 'ehsanghandi', NULL, NULL, NULL, NULL, 0, NULL, 2589204, NULL, 'ehsanghandi', 0, 0, NULL, 0, NULL, '$2y$10$/ZvrSBsOSpPkc6E1DwHDj.xWgb3N/YdLEEa1iLVhch5wc3SKRmxxe', NULL, '2023-07-12 22:01:17', '2023-11-14 16:40:01'),
(103, 'ابوالفضل', NULL, NULL, NULL, NULL, 0, NULL, 5609252, NULL, 'bo-lfdl', 0, 0, NULL, 0, NULL, '$2y$10$0LFG54AzaDoYPLPynvSuI.qBes/a1iG9oHngHTUsTIvuPq1IduVCC', NULL, '2023-07-14 15:08:03', '2023-11-14 16:40:01'),
(104, 'مهدی حسینی', NULL, NULL, NULL, NULL, 0, NULL, 6414749, NULL, 'mhd-hs-n', 0, 0, NULL, 0, NULL, '$2y$10$paGZJJYpRzYPdCcCCfqJOu/1DlxPqdFquirRkVviqMrdFm/KL5iWK', NULL, '2023-07-14 21:36:21', '2023-11-14 16:40:01'),
(105, 'ارشیا منبتی', NULL, NULL, NULL, NULL, 0, NULL, 4372324, NULL, 'rsh-mnbt', 0, 0, NULL, 0, NULL, '$2y$10$BAHQgLQtL9jcZiaUYfuPDOfUXyv2p5gPP1mf/qfugfjEfNhScXeOq', NULL, '2023-07-15 15:49:21', '2023-11-14 16:40:01'),
(106, 'Ardalan', NULL, NULL, NULL, NULL, 0, NULL, 8314528, NULL, 'ardalan', 0, 0, NULL, 0, NULL, '$2y$10$uMadwVbd1P4vnrldXkpGfee.M.0Nr1VI6AzX9PbrsFdPsXCjk7Lj.', NULL, '2023-07-17 20:55:01', '2023-11-14 16:40:01'),
(107, 'soheil pakzad', NULL, NULL, NULL, NULL, 0, NULL, 2423368, NULL, 'soheil-pakzad', 0, 0, NULL, 0, NULL, '$2y$10$fXE1lg2k0EJhmybD3Z5CLOxbZVnrRjxfrgE6.p6l4ZE8xFqq7UACm', NULL, '2023-07-18 17:17:05', '2023-11-14 16:40:01'),
(108, 'alizadeh22', NULL, NULL, NULL, NULL, 0, NULL, 8205094, NULL, 'alizadeh22', 0, 0, NULL, 0, NULL, '$2y$10$0uzjbWXjxI7K21WE5bUoFenuLKDmEamQ9QqF8zRKXdoUUTSjTwzAy', NULL, '2023-07-18 18:11:29', '2023-11-14 16:40:01'),
(109, 'babree_2006', NULL, NULL, NULL, NULL, 0, NULL, 6344581, NULL, 'babree-2006', 0, 0, NULL, 0, NULL, '$2y$10$iSaDOtcxY4nmsswWmiHaXOabllO/B5c2ME5RgdrfiJRvNK..paYhe', NULL, '2023-07-19 05:58:03', '2023-11-14 16:40:01'),
(110, 'Ali', NULL, NULL, NULL, NULL, 0, NULL, 3175594, NULL, 'ali', 0, 0, NULL, 0, NULL, '$2y$10$XxHVxF2Rkx5cnOVUoYxeLebYrpj6/abMw6Yx0rU0NkD/wG4EgFldm', NULL, '2023-07-19 10:30:40', '2023-11-14 16:40:01'),
(111, 'Mohammad', NULL, NULL, NULL, NULL, 0, NULL, 6572162, NULL, 'mohammad', 0, 0, NULL, 0, NULL, '$2y$10$rjLQPAEpIpqzwoa1OYEyWuP3ZSHnbzIFQ/zsgqr.VOlHhx9pAznUe', NULL, '2023-07-20 07:39:28', '2023-11-14 16:40:01'),
(112, 'sasan', NULL, NULL, NULL, NULL, 0, NULL, 7530788, NULL, 'sasan', 0, 0, NULL, 0, NULL, '$2y$10$ZY0BrJYp8tNLXWfPkBOz9uf6V6MXvMdDw98kiSYF//Uqlbs.JxhpC', NULL, '2023-07-20 11:45:40', '2023-11-14 16:40:01'),
(113, 'arashmehr', NULL, NULL, NULL, NULL, 0, NULL, 1176199, NULL, 'arashmehr', 0, 0, NULL, 0, NULL, '$2y$10$4JcNy.RVqLSW7kAxGu6zu.x6pWOM5/IoDFHBNgoEFQakYIbEOV3Ee', NULL, '2023-07-20 17:17:51', '2023-11-14 16:40:01'),
(114, 'ehsankia', NULL, NULL, NULL, NULL, 0, NULL, 1690383, NULL, 'ehsankia', 0, 0, NULL, 0, NULL, '$2y$10$QdArVv.k96TCiMmRwoRj5e9IilfJ5BdKKDPR6VCTG8rOxt7h0rB6q', NULL, '2023-07-22 16:57:01', '2023-11-14 16:40:01'),
(115, 'siperick', NULL, NULL, NULL, NULL, 0, NULL, 5478064, NULL, 'siperick', 0, 0, NULL, 0, NULL, '$2y$10$l/Tlq.3x8fSd284CI7feV.R24OtYae.6B5F8sFx9MmgUztFm2dz5q', NULL, '2023-07-23 15:11:40', '2023-11-14 16:40:01'),
(116, 'uban97', NULL, NULL, NULL, NULL, 0, NULL, 5874623, NULL, 'uban97', 0, 0, NULL, 0, NULL, '$2y$10$rHf6vRKFIMdUmGmMSZUBHOUfMqWSd2VWv73RWxbeKguD0pX4D3cd6', NULL, '2023-07-25 12:06:58', '2023-11-14 16:40:01'),
(117, 'غزال مایه', NULL, NULL, NULL, NULL, 0, NULL, 1248345, NULL, 'ghz-l-m-h', 0, 0, NULL, 0, NULL, '$2y$10$6EozJW17WYK2cTI6SC7fFeENcrOsCQUepL4WYApZY48bG2NunUEgO', NULL, '2023-07-26 03:30:11', '2023-11-14 16:40:01'),
(118, 'test123', NULL, NULL, NULL, NULL, 0, NULL, 1798368, NULL, 'test123', 0, 0, NULL, 0, NULL, '$2y$10$58bTF6wWi1vkr/HFaeMg5un0EXYNjaYhTVBNvehhLfglAqusqHnQe', NULL, '2023-07-27 23:40:11', '2023-11-14 16:40:02'),
(119, 'مصطفی نوروزی', NULL, NULL, NULL, NULL, 0, NULL, 9461450, NULL, 'mstf-noroz', 0, 0, NULL, 0, NULL, '$2y$10$5bTHm/mpt2qzj7W/yQvmJuQBSqvuCFFQceS85ipna0DgZZYaAu88K', NULL, '2023-07-29 17:25:34', '2023-11-14 16:40:02'),
(120, 'dani', NULL, NULL, NULL, NULL, 0, NULL, 6629599, NULL, 'dani', 0, 0, NULL, 0, NULL, '$2y$10$SdHF1NgdB.7P3pAgr/cEb.0WOXCQ.p0B2bUCm3fhqf1Y00Bi0Kzrq', NULL, '2023-07-30 01:35:29', '2023-11-14 16:40:02'),
(121, 'Mobin', NULL, NULL, NULL, NULL, 0, NULL, 7371422, NULL, 'mobin', 0, 0, NULL, 0, NULL, '$2y$10$bMUa4hGUFn2P5SraLN9qouGVzybYHIQlzrpW1JJloDyQQGQWDw9U.', NULL, '2023-07-30 05:39:18', '2023-11-14 16:40:02'),
(122, 'محمد ابراهیمی', NULL, NULL, NULL, NULL, 0, NULL, 5522487, NULL, 'mhmd-br-h-m', 0, 0, NULL, 0, NULL, '$2y$10$SvXYHiv446kW50WzQwlQtuydlsHxisEDlws2zwsHYHV0o9pdRUsQe', NULL, '2023-08-01 09:49:41', '2023-11-14 16:40:02'),
(123, 'Mahdi : )', NULL, NULL, NULL, NULL, 0, NULL, 2561649, NULL, 'mahdi', 0, 0, NULL, 0, NULL, '$2y$10$Q8PSjCt/Yfw9CnnAnSxm7.ZV8A302UWyo.hG6zVQmj4UDaJ8WYE16', NULL, '2023-08-02 06:47:09', '2023-11-14 16:40:02'),
(124, 'Nari', NULL, NULL, NULL, NULL, 0, NULL, 3100327, NULL, 'nari', 0, 0, NULL, 0, NULL, '$2y$10$HRpjzPWOk91oC9dn8tvx4OBSSqwDBo8yiDOXHCeZsAS5DUvyEHIHW', NULL, '2023-08-05 10:52:45', '2023-11-14 16:40:02'),
(125, 'شهاب الدین حداد', NULL, NULL, NULL, NULL, 0, NULL, 8470939, NULL, 'shh-b-ld-n-hd-d', 0, 0, NULL, 0, NULL, '$2y$10$729r.XOLUu8g6yzJupcfsuRivNI8R4X/eKHUYqwGhTCtrKq39upra', NULL, '2023-08-05 16:14:33', '2023-11-14 16:40:02'),
(126, 'Masoud', NULL, NULL, NULL, NULL, 0, NULL, 7386352, NULL, 'masoud', 0, 0, NULL, 0, NULL, '$2y$10$eYH7BgLiJOCAIQtm5HL7fuyhQW1MgDepe.52l7iGI5iUR/BMMv6PC', NULL, '2023-08-06 19:54:39', '2023-11-14 16:40:02'),
(127, 'Fahim', NULL, NULL, NULL, NULL, 0, NULL, 3072468, NULL, 'fahim', 0, 0, NULL, 0, NULL, '$2y$10$nO6XHYC84SLA0AK9ENfNKuszVKJTPAl37dgRmrbWcu5mgyBN/kQ4S', NULL, '2023-08-07 05:57:51', '2023-11-14 16:40:02'),
(128, 'amir22222', NULL, NULL, NULL, NULL, 0, NULL, 9642610, NULL, 'amir22222', 0, 0, NULL, 0, NULL, '$2y$10$I2yKhk7x4UYSs7VakXTLeutVkyDgvWv.ZqEVF3HxR4D2.KC6kFjLm', NULL, '2023-08-07 07:47:01', '2023-11-14 16:40:02'),
(129, 'امیرمحمد اقبال کیانی', NULL, NULL, NULL, NULL, 0, NULL, 5125328, NULL, 'm-rmhmd-kb-l-n', 0, 0, NULL, 0, NULL, '$2y$10$YkAhBJWLdvy4dyTd5fyNbebTSr4.fCEM5UINXTU6vHv1kGlYT3SuK', NULL, '2023-08-07 09:54:37', '2023-11-14 16:40:02'),
(130, 'sohil', NULL, NULL, NULL, NULL, 0, NULL, 9456019, NULL, 'sohil', 0, 0, NULL, 0, NULL, '$2y$10$.OOghXcLtACDv9Hq3gutyOI7iKnc10SE0XB/Uqx7TkXf.rL1KNIXq', NULL, '2023-08-08 08:09:15', '2023-11-14 16:40:02'),
(131, 'علی حسین پور', NULL, NULL, NULL, NULL, 0, NULL, 3415512, NULL, 'aal-hs-n-or', 0, 0, NULL, 0, NULL, '$2y$10$i3SdjD2/6C.XiQoeORiP7ewzZM0LKUw6I9DyBXmGV2jaRBW6AvpaW', NULL, '2023-08-08 18:19:13', '2023-11-14 16:40:02'),
(132, 'Saeed 444', NULL, NULL, NULL, NULL, 0, NULL, 6043093, NULL, 'saeed-444', 0, 0, NULL, 0, NULL, '$2y$10$ghDSwTGC34.HgInoIhysP.OGbGs5NP9ReZfVeLF7wRtIsV2WbOjwa', NULL, '2023-08-12 10:26:34', '2023-11-14 16:40:02'),
(133, 'حسین نادری', NULL, NULL, NULL, NULL, 0, NULL, 6027229, NULL, 'hs-n-n-dr', 0, 0, NULL, 0, NULL, '$2y$10$Aj3kL3UUHVl71TzHKTLzVu2NNru9LPFZH94m70c9gGuogAVEsm3Rq', NULL, '2023-08-12 15:10:41', '2023-11-14 16:40:02'),
(134, 'علیرضا نیکوکردار', NULL, NULL, NULL, NULL, 0, NULL, 3839979, NULL, 'aal-rd-n-o-rd-r', 0, 0, NULL, 0, NULL, '$2y$10$hRcvwxmWXZsFEfWeUJfbNOmOgeCfSBjIV7KmUl4fRHN2fZSeABVqC', NULL, '2023-08-12 15:58:44', '2023-11-14 16:40:02'),
(135, 'آرش شهنی زاده', NULL, NULL, NULL, NULL, 0, NULL, 5517739, NULL, 'rsh-shhn-z-dh', 0, 0, NULL, 0, NULL, '$2y$10$6N89YMGYHCtl4ErWZB2eHu49ROeYAp8Wt0Y6JiWdoOQSv7gvZ8wYO', NULL, '2023-08-15 06:40:24', '2023-11-14 16:40:02'),
(136, 'محمدعرفان اعتمادیه', NULL, NULL, NULL, NULL, 0, NULL, 1518555, NULL, 'mhmdaarf-n-aatm-d-h', 0, 0, NULL, 0, NULL, '$2y$10$u21rrZLhVLrnCqZXC6xose.WjZFKnP42WHIRDQ/D5zkV/NSyPOii2', NULL, '2023-08-18 08:50:59', '2023-11-14 16:40:02'),
(137, 'erfanzargari', NULL, NULL, NULL, NULL, 0, NULL, 7185749, NULL, 'erfanzargari', 0, 0, NULL, 0, NULL, '$2y$10$XAbCMwhYqvixhuVskKbWTeJ/VTRyfYt3eOXthUZOiHFcFHGdRzv32', NULL, '2023-08-18 09:51:34', '2023-11-14 16:40:02'),
(138, 'آرین', NULL, NULL, NULL, NULL, 0, NULL, 7052566, NULL, 'r-n', 0, 0, NULL, 0, NULL, '$2y$10$TlNue.II5knS03NRWfFko.qxGyebZPis644L4mrR2.AG/8pJl4SAa', NULL, '2023-08-18 14:48:18', '2023-11-14 16:40:02'),
(139, 'امین شاهقلیان', NULL, NULL, NULL, NULL, 0, NULL, 6581142, NULL, 'm-n-sh-hkl-n', 0, 0, NULL, 0, NULL, '$2y$10$xyG4H5IJafkWN0i0m3ULxOOjfjSu3JBCwuTQfZgHkf/z3.GHbGX8y', NULL, '2023-08-19 07:33:44', '2023-11-14 16:40:02'),
(140, 'mohsen', NULL, NULL, NULL, NULL, 0, NULL, 4247057, NULL, 'mohsen', 0, 0, NULL, 0, NULL, '$2y$10$SYulShrB7RZ98.AaercBe..lvpmNw7HwUV0RoGUGAPL4/5/fj9K2y', NULL, '2023-08-21 05:16:32', '2023-11-14 16:40:02'),
(141, 'dsadospad', NULL, NULL, NULL, NULL, 0, NULL, 3061170, NULL, 'dsadospad', 0, 0, NULL, 0, NULL, '$2y$10$EMngV9o8qP72VZ5YzcdKDe83IJnj9Vs6hJUWFn5G3i/rZQL6z3Z/C', NULL, '2023-08-26 10:42:03', '2023-11-14 16:40:02'),
(142, 'kjbkkfds', NULL, NULL, NULL, NULL, 0, NULL, 2766588, NULL, 'kjbkkfds', 0, 0, NULL, 0, NULL, '$2y$10$6PLnZ9BRJkWM11KC7DSO4.eYf8LbYW14iSHgWmqpOiCxa0nUYltUO', NULL, '2023-08-31 05:09:03', '2023-11-14 16:40:02'),
(143, 'lllkjbkkfds', NULL, NULL, NULL, NULL, 0, NULL, 4276274, NULL, 'lllkjbkkfds', 0, 0, NULL, 0, NULL, '$2y$10$GWvn37BU8jnO5jdcF3P2Se9pc.y8Xf78MvDUCogULq.GQSBHOIHzO', NULL, '2023-08-31 05:09:24', '2023-11-14 16:40:02'),
(144, 'dksjadksjd', NULL, NULL, NULL, NULL, 0, NULL, 5358487, NULL, 'dksjadksjd', 0, 0, NULL, 0, NULL, '$2y$10$dqhXBF9YVs0LJGzObXz8k.HQcgtpWWA6Yv8eu.T63XJClxYsYJSuq', NULL, '2023-08-31 05:32:18', '2023-11-14 16:40:02'),
(145, 'reza joibari', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'reza-joibari', 0, NULL, NULL, 0, NULL, '4182988541814fb9eb4e059c4cd340de', NULL, '2023-09-12 06:14:31', '2023-11-14 16:40:02'),
(146, 'Ali Fotoohi', '0', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'Ali-Fotoohi', 0, NULL, NULL, 0, NULL, 'cf3ff3cab93439d0f9da870b5432ae64', NULL, '2023-09-13 05:24:23', '2023-11-14 16:40:02'),
(147, 'Parham Soleimany', '0', NULL, NULL, NULL, 0, NULL, 5172939, NULL, 'Parham-Soleimany', 0, 0, NULL, 0, NULL, '$2y$10$YGUSPfSzDVPX2vYQLq/LduQSg8upI55Y7g18b/HyxRA5N6YB6TabS', NULL, '2023-10-16 15:57:32', '2023-11-14 16:40:02'),
(148, 'کوروش', NULL, NULL, NULL, NULL, 0, NULL, 9501364, NULL, 'orosh', 0, NULL, NULL, 1, NULL, '$2y$10$J0VbubhbG7On3cg0BH8TZONsVGCy2P8UHvcIBNKm1Cv4EfXaouSAq', NULL, '2023-11-06 19:13:18', '2023-11-14 16:40:02'),
(149, '1699947610', NULL, NULL, NULL, NULL, 0, NULL, 1646439, NULL, '1699947610', 0, 0, NULL, 0, NULL, '$2y$10$.s.ZHUQaVpVnXm.2c5TyqeCs5ZURQrhB2O0Er2CAizSpaDazlEFZO', NULL, '2023-11-14 07:40:10', '2023-11-14 16:40:02'),
(150, '1699948902', '0', NULL, NULL, NULL, 0, NULL, 3352098, NULL, '1699948902', 0, 0, NULL, 0, NULL, '$2y$10$F0U8Kij9SPryOgn9RQMA8OS5Yh0G0n5Jw9TIvLyBxY07HraYH.gNa', NULL, '2023-11-14 08:01:42', '2023-11-14 16:40:02'),
(151, '1700246388', '0', NULL, NULL, NULL, 0, '09359999999', 2882055, NULL, '1700246388', 0, 0, NULL, 0, NULL, '$2y$10$TVTJAIst406emRQVOZcl.u5p/OmKlpV.VD42iHT76no3EC09Vco46', NULL, '2023-11-17 18:39:48', '2023-11-17 18:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(400) NOT NULL,
  `videoable_id` int(11) NOT NULL,
  `videoable_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_id` bigint(20) DEFAULT 0,
  `browser` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `viewable_id` int(11) DEFAULT NULL,
  `viewable_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `user_ip`, `user_id`, `browser`, `platform`, `viewable_id`, `viewable_type`, `created_at`, `updated_at`) VALUES
(1, '2.147.255.191', 0, 'Firefox', 'Windows', 0, 'App\\Models\\Product', '2025-03-28 18:06:12', '2025-03-28 18:06:12'),
(2, '93.119.213.193', 0, 'Chrome', 'Windows', 0, 'App\\Models\\Product', '2025-03-28 18:06:52', '2025-03-28 18:06:52'),
(3, '88.99.189.175', 0, 'Firefox', 'Windows', 0, 'App\\Models\\Product', '2025-03-28 22:47:50', '2025-03-28 22:47:50'),
(4, '35.90.214.221', 0, 'Chrome', 'OS X', 0, 'App\\Models\\Product', '2025-03-29 02:32:54', '2025-03-29 02:32:54'),
(5, '93.119.213.93', 4, 'Chrome', 'Windows', 0, 'App\\Models\\Product', '2025-03-29 13:37:51', '2025-03-29 13:37:51'),
(6, '65.21.253.150', 0, 'Firefox', 'Windows', 0, 'App\\Models\\Product', '2025-03-29 15:28:18', '2025-03-29 15:28:18'),
(7, '81.92.206.131', 4, 'Chrome', 'Windows', 0, 'App\\Models\\Product', '2025-03-29 16:01:33', '2025-03-29 16:01:33'),
(8, '93.119.213.93', 4, 'Chrome', 'Windows', 2, 'App\\Models\\Product', '2025-03-29 19:01:20', '2025-03-29 19:01:20'),
(9, '127.0.0.1', 0, 'Chrome', 'Windows', 0, 'App\\Models\\Product', '2025-03-30 12:41:05', '2025-03-30 12:41:05'),
(10, '127.0.0.1', 0, 'Chrome', 'Windows', 0, 'App\\Models\\Product', '2025-03-31 17:40:33', '2025-03-31 17:40:33'),
(11, '127.0.0.1', 4, 'Chrome', 'Windows', 0, 'App\\Models\\Product', '2025-04-01 08:15:39', '2025-04-01 08:15:39'),
(12, '127.0.0.1', 4, 'Chrome', 'Windows', 0, 'App\\Models\\Product', '2025-04-03 03:29:47', '2025-04-03 03:29:47'),
(13, '127.0.0.1', 4, 'Chrome', 'Windows', 0, 'App\\Models\\Product', '2025-04-04 06:22:00', '2025-04-04 06:22:00'),
(14, '127.0.0.1', 4, 'Chrome', 'Windows', 0, 'App\\Models\\Product', '2025-04-06 05:21:16', '2025-04-06 05:21:16'),
(15, '127.0.0.1', 4, 'Chrome', 'Windows', 0, 'App\\Models\\Product', '2025-04-06 07:57:05', '2025-04-06 07:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `refId` varchar(255) DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `property` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `more` varchar(255) DEFAULT NULL,
  `number` bigint(20) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `background` varchar(400) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `background2` varchar(400) DEFAULT NULL,
  `count` bigint(20) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `brands` varchar(400) DEFAULT NULL,
  `move` tinyint(1) DEFAULT 0,
  `height` varchar(30) DEFAULT '10',
  `responsive` tinyint(1) NOT NULL DEFAULT 0,
  `cats` varchar(400) DEFAULT NULL,
  `language` varchar(3) DEFAULT 'fa',
  `ads1` text DEFAULT NULL,
  `ads2` text DEFAULT NULL,
  `ads3` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `name`, `title`, `more`, `number`, `description`, `background`, `slug`, `background2`, `count`, `sort`, `type`, `status`, `brands`, `move`, `height`, `responsive`, `cats`, `language`, `ads1`, `ads2`, `ads3`, `created_at`, `updated_at`) VALUES
(4, 'تبلیغ اسلایدری', NULL, NULL, 0, NULL, '#000000', NULL, NULL, NULL, 0, 3, 1, '[]', 0, '10', 0, '[]', 'fa', '[]', '[{\"image\":\"https://rayganapp.ir/upload/image/2022/ad8.jpg\",\"address\":\"/\"}]', '[{\"image\":\"https://rayganapp.ir/upload/image/2022/ad9.jpg\",\"address\":\"/\"},{\"image\":\"https://rayganapp.ir/upload/image/2022/ad9.jpg\",\"address\":\"/\"}]', '2025-03-29 16:16:34', '2025-03-29 16:16:34'),
(5, 'استوری', 'استوری و هایلایت ها', NULL, 0, NULL, '#000000', NULL, NULL, NULL, 0, 3, 1, '[]', 0, '15', 0, '[]', 'fa', '[]', '[]', '[]', '2025-03-29 16:16:34', '2025-03-29 16:16:34'),
(6, 'محصولات اسلایدری', 'محصولات اصل', 'مشاهده بیشتر', 0, 'lfkndslf', '#000000', 'محصولات-اصل', NULL, 6, 0, 3, 1, '[]', 0, '16', 0, '[]', 'fa', '[]', '[]', '[]', '2025-03-29 16:16:34', '2025-03-29 16:16:34'),
(7, 'تبلیغ ساده', NULL, NULL, 0, NULL, '#000000', NULL, NULL, NULL, 0, 3, 1, '[]', 0, '10', 0, '[]', 'fa', '[{\"image\":\"https://rayganapp.ir/upload/image/2024/pp.webp\",\"address\":\"/\"},{\"image\":\"https://rayganapp.ir/upload/image/2024/ll.webp\",\"address\":\"/\"}]', '[]', '[]', '2025-03-29 16:16:34', '2025-03-29 16:16:34'),
(8, 'شگفت انگیز', 'شگفت انگیز', 'مشاهده همه', 0, 'تست', '#1141ff', 'شگفت-انگیز', 'https://rayganapp.ir/upload/image/2022/amazing-typo.svg', 6, 0, 3, 1, '[]', 0, '16', 0, '[]', 'fa', '[]', '[]', '[]', '2025-03-29 16:16:34', '2025-03-29 16:16:34'),
(9, 'جستجو2', NULL, NULL, 0, NULL, '#000000', NULL, NULL, NULL, 0, 3, 1, '[]', 0, '15', 0, '[]', 'fa', '[]', '[]', '[]', '2025-03-29 16:16:34', '2025-03-29 16:16:34'),
(10, 'وام', 'وام درخواستی جهت خرید از سئوشاپ', NULL, 0, NULL, '#000000', NULL, NULL, NULL, 0, 3, 1, '[]', 0, '15', 0, '[]', 'fa', '[]', '[]', '[]', '2025-03-29 16:16:34', '2025-03-29 16:16:34'),
(11, 'تبلیغ ساده', NULL, NULL, 0, NULL, '#000000', NULL, NULL, NULL, 0, 3, 1, '[]', 0, '20', 0, '[]', 'fa', '[{\"image\":\"https://rayganapp.ir/upload/image/2024/gg.webp\",\"address\":\"/\"}]', '[]', '[]', '2025-03-29 16:16:34', '2025-03-29 16:16:34'),
(12, 'خبر', 'آخرین خبر ها', NULL, 0, NULL, '#000000', NULL, NULL, NULL, 0, 3, 1, '[]', 0, '10', 0, '[]', 'fa', '[]', '[]', '[]', '2025-03-29 16:16:34', '2025-03-29 16:16:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_sms`
--
ALTER TABLE `active_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asks`
--
ALTER TABLE `asks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carriers`
--
ALTER TABLE `carriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrier_cities`
--
ALTER TABLE `carrier_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compare_products`
--
ALTER TABLE `compare_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `converters`
--
ALTER TABLE `converters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cooperations`
--
ALTER TABLE `cooperations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counselings`
--
ALTER TABLE `counselings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `field_data`
--
ALTER TABLE `field_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `float_accesses`
--
ALTER TABLE `float_accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genuines`
--
ALTER TABLE `genuines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guarantees`
--
ALTER TABLE `guarantees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installments`
--
ALTER TABLE `installments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `lands`
--
ALTER TABLE `lands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lotteries`
--
ALTER TABLE `lotteries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lottery_codes`
--
ALTER TABLE `lottery_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `luckies`
--
ALTER TABLE `luckies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pays_user_id_foreign` (`user_id`);

--
-- Indexes for table `pay_metas`
--
ALTER TABLE `pay_metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pay_metas_user_id_foreign` (`user_id`),
  ADD KEY `pay_metas_pay_id_foreign` (`pay_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `price_changes`
--
ALTER TABLE `price_changes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redirects`
--
ALTER TABLE `redirects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanks`
--
ALTER TABLE `tanks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_sms`
--
ALTER TABLE `active_sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `asks`
--
ALTER TABLE `asks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carriers`
--
ALTER TABLE `carriers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carrier_cities`
--
ALTER TABLE `carrier_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compare_products`
--
ALTER TABLE `compare_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `converters`
--
ALTER TABLE `converters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cooperations`
--
ALTER TABLE `cooperations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counselings`
--
ALTER TABLE `counselings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `field_data`
--
ALTER TABLE `field_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `float_accesses`
--
ALTER TABLE `float_accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `genuines`
--
ALTER TABLE `genuines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guarantees`
--
ALTER TABLE `guarantees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `installments`
--
ALTER TABLE `installments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lands`
--
ALTER TABLE `lands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lotteries`
--
ALTER TABLE `lotteries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lottery_codes`
--
ALTER TABLE `lottery_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `luckies`
--
ALTER TABLE `luckies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packs`
--
ALTER TABLE `packs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pay_metas`
--
ALTER TABLE `pay_metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_changes`
--
ALTER TABLE `price_changes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redirects`
--
ALTER TABLE `redirects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tanks`
--
ALTER TABLE `tanks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pay_metas`
--
ALTER TABLE `pay_metas`
  ADD CONSTRAINT `pay_metas_pay_id_foreign` FOREIGN KEY (`pay_id`) REFERENCES `pays` (`id`),
  ADD CONSTRAINT `pay_metas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
