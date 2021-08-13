-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 02:43 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigbazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `=settings`
--

CREATE TABLE `=settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `=settings`
--

INSERT INTO `=settings` (`id`, `vat`, `shipping_charge`, `shop_name`, `email`, `phone`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(1, '5', '20', 'Udemy Shop', 'udemy@gmail.com', '0188203641', 'georgia, usa', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `password`, `email_verified_at`, `category`, `coupon`, `product`, `blog`, `order`, `other`, `report`, `role`, `return`, `contact`, `comment`, `setting`, `stock`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Ashraf', NULL, 'admin@gmail.com', '$2y$10$.19w8K3lcF2..GSan2l48uhF8Vwa1Vq.IXXjOt7R7IVHYIJRqshUG', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '2021-07-19 05:10:35', '2021-07-19 10:11:06'),
(2, 'Rafiur Rahman', '0194343890', 'rafee@outlook.com', '$2y$10$agMs5ydTfepQxYpxpgLtlugEmMc29H4lrae3w0VqGH6ObHwsxHs7a', NULL, '1', NULL, '1', '1', NULL, NULL, NULL, '1', '1', '1', NULL, '1', '1', 2, NULL, NULL),
(3, 'Kasif Bhatti', '01778933009', 'kasif@yahoo.com', '$2y$10$iGNvE6n6.dXoVRYFQnH7ae9zGOVVBO6wdaHTIBKydiMYG0BEAFMFC', NULL, NULL, NULL, '1', '1', '1', NULL, '1', '1', '1', NULL, NULL, '1', NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bloggers`
--

CREATE TABLE `bloggers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_editor` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bloggers`
--

INSERT INTO `bloggers` (`id`, `name`, `email`, `password`, `is_editor`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Blogger', 'blogger@gmail.com', '$2y$10$znWHHZt93k0j4..z1.lJaOVWKhOMM6yh9BjkwW3UPrhrk5pQTLN8q', 0, NULL, '2021-07-19 05:11:31', '2021-07-19 05:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', 'public/media/brand/220721_08_43_56.png', NULL, NULL),
(2, 'Canon', 'public/media/brand/210721_17_53_41.png', NULL, NULL),
(3, 'Dell', 'public/media/brand/210721_17_08_42.png', NULL, NULL),
(4, 'Walton', 'public/media/brand/250721_12_43_43.jpg', NULL, NULL),
(5, 'Sony', 'public/media/brand/280721_14_36_55.png', NULL, NULL),
(6, 'Rado', 'public/media/brand/280721_14_52_55.png', NULL, NULL),
(7, 'Lenovo', 'public/media/brand/280721_14_11_56.png', NULL, NULL),
(8, 'Assus', 'public/media/brand/280721_14_23_56.png', NULL, NULL),
(9, 'Titan-Gucci', 'public/media/brand/280721_14_36_56.png', NULL, NULL),
(10, 'Levis', 'public/media/brand/280721_14_51_56.png', NULL, NULL),
(11, 'Nike', 'public/media/brand/280721_14_02_57.png', NULL, NULL),
(12, 'Xiaomi', 'public/media/brand/310721_16_39_29.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(2, 'Electronics', '2021-07-20 11:46:47', '2021-07-20 11:46:47'),
(3, 'Cloth', '2021-07-20 11:47:40', '2021-07-20 11:47:40'),
(4, 'Men', '2021-07-20 12:05:57', '2021-07-20 12:46:03'),
(5, 'Women', '2021-07-22 10:08:35', '2021-07-22 10:08:35'),
(6, 'Kids', '2021-07-22 10:08:42', '2021-07-22 10:08:42'),
(7, 'Mens Fashion', '2021-07-28 08:47:33', '2021-07-28 08:47:33'),
(8, 'Womens Fashion', '2021-07-28 08:48:45', '2021-07-28 08:48:45'),
(9, 'Childs', '2021-07-28 08:50:14', '2021-07-28 08:50:14'),
(10, 'Watch', '2021-07-28 08:51:28', '2021-07-28 08:51:28'),
(11, 'Furniture', '2021-07-28 08:52:11', '2021-07-28 08:52:11'),
(12, 'Health', '2021-07-28 08:52:20', '2021-07-28 08:52:20'),
(13, 'Beauty', '2021-07-28 08:52:27', '2021-07-28 08:52:27'),
(14, 'Sports & Outdoor', '2021-07-28 08:53:36', '2021-07-28 08:53:36'),
(15, 'Home & Living', '2021-07-28 08:53:45', '2021-07-28 08:53:45'),
(16, 'Kitchen', '2021-08-12 11:02:10', '2021-08-12 11:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Jamil', '01634989340', 'jamil@outlook.com', 'I\'m new customer to the BigBazar Online Shopping.', NULL, NULL),
(2, 'Kasif', '01872320932', 'kasif@yahoo.com', 'I very much like this BigBazar Online Shopping.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'Udemy', '20', '2021-07-23 08:08:34', '2021-07-23 11:49:10'),
(2, 'Coursera-Google', '20', '2021-07-23 08:09:14', '2021-07-23 11:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_13_145634_create_roles_table', 2),
(9, '2021_07_17_161948_create_admins_table', 4),
(10, '2021_07_19_105510_create_bloggers_table', 4),
(11, '2021_07_19_171003_create_categories_table', 5),
(12, '2021_07_19_171017_create_sub_categories_table', 5),
(13, '2021_07_19_171055_create_brands_table', 5),
(14, '2021_07_22_165807_create_coupons_table', 6),
(15, '2021_07_23_175704_create_news_letters_table', 7),
(16, '2021_07_24_044026_create_products_table', 8),
(17, '2021_07_27_161318_create_post_category_table', 9),
(18, '2021_07_27_161507_create_posts_table', 9),
(20, '2014_10_12_000000_create_users_table', 10),
(21, '2018_12_23_120000_create_shoppingcart_table', 11),
(22, '2021_07_31_134323_create_wishlists_table', 11),
(23, '2021_08_03_045527_create_settings_table', 12),
(24, '2016_06_01_000001_create_oauth_auth_codes_table', 13),
(25, '2016_06_01_000002_create_oauth_access_tokens_table', 13),
(26, '2016_06_01_000003_create_oauth_refresh_tokens_table', 13),
(27, '2016_06_01_000004_create_oauth_clients_table', 13),
(28, '2016_06_01_000005_create_oauth_personal_access_clients_table', 13),
(29, '2021_08_04_161803_create_orders_table', 14),
(30, '2021_08_04_162025_create_order_details_table', 14),
(31, '2021_08_04_162054_create_shippings_table', 14),
(32, '2021_08_07_143831_create_seos_table', 15),
(33, '2021_08_10_133132_create_site_settings_table', 16),
(34, '2021_08_11_143657_create_contacts_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `news_letters`
--

CREATE TABLE `news_letters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_letters`
--

INSERT INTO `news_letters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'jamil@yahoo.com', '2021-07-23 12:33:30', '2021-07-23 12:33:30'),
(2, 'ashrafulmd389@gmail.com', '2021-07-23 12:36:02', '2021-07-23 12:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'QqjNrwJyaG4i4JS9sZ1c0iS1KU9OVDOz0AFA1AxT', NULL, 'http://localhost', 1, 0, 0, '2021-08-03 10:22:31', '2021-08-03 10:22:31'),
(2, NULL, 'Laravel Password Grant Client', 'sPtpI0ptRSZZEkjrCGE7MHp96djdqayoD9gHj2Am', 'users', 'http://localhost', 0, 1, 0, '2021-08-03 10:22:32', '2021-08-03 10:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-08-03 10:22:32', '2021-08-03 10:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paying_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_transaction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `return_order` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_type`, `payment_id`, `paying_amount`, `balance_transaction`, `stripe_order_id`, `subtotal`, `shipping`, `vat`, `total`, `status`, `return_order`, `month`, `date`, `year`, `status_code`, `created_at`, `updated_at`) VALUES
(1, '4', 'stripe', 'card_1JKxrnCH6py4vIl3KTsa6O1s', '47500', 'txn_3JKxroCH6py4vIl30wgv5Abi', '610b6406424d6', '450.00', '20', '5', '475', '3', '0', 'August', '05-08-21', '2021', '123', NULL, NULL),
(2, '4', 'stripe', 'card_1JKxtFCH6py4vIl3YI7R5ZYw', '47500', 'txn_3JKxtGCH6py4vIl31LcBIy4R', '610b64606deff', '450.00', '20', '5', '475', '0', '0', 'August', '05-08-21', '2021', '345', NULL, NULL),
(3, '4', 'stripe', 'card_1JKxwZCH6py4vIl3VvrVzjsl', '47500', 'txn_3JKxwaCH6py4vIl310GhBUGJ', '610b652e572e1', '450.00', '20', '5', '475', '1', '0', 'August', '05-08-21', '2021', '456', NULL, NULL),
(4, '4', 'stripe', 'card_1JKzyVCH6py4vIl30xAA5IAK', '102500', 'txn_3JKzyWCH6py4vIl30Np27m9b', '610b83af143a4', '980', '20', '5', '1025', '4', '0', 'August', '05-08-21', '2021', '678', NULL, NULL),
(5, '4', 'stripe', 'card_1JMB9vCH6py4vIl3s6kAKlLl', '302500', 'txn_3JMB9yCH6py4vIl31xHEbopY', '610fce998153d', '3000.00', '20', '5', '3025', '3', '2', 'August', '08-08-21', '2021', '228070', NULL, NULL),
(6, '4', 'stripe', 'card_1JMXXiCH6py4vIl3vHmxrRSi', '147500', 'txn_3JMXXmCH6py4vIl30lR381M1', '61111eb540bc4', '1450.00', '20', '5', '1475', '3', '0', 'August', '09-08-21', '2021', '553731', NULL, NULL),
(7, '4', 'stripe', 'card_1JNEwkCH6py4vIl3CFp4RR1g', '1952500', 'txn_3JNEwoCH6py4vIl31CH1qIc7', '6113aa703537f', '19500.00', '20', '5', '19525', '3', '0', 'August', '11-08-21', '2021', '608445', NULL, NULL),
(8, '4', 'stripe', 'card_1JNxzjCH6py4vIl3lMryTLi7', '1952500', 'txn_3JNxzlCH6py4vIl30R4u4p5A', '61164edb7a111', '19500.00', '20', '5', '19525', '0', '0', 'August', '13-08-21', '2021', '258386', NULL, NULL),
(9, '4', 'oncash', NULL, NULL, NULL, NULL, '1000.00', '20', '5', '1025', '3', '0', 'August', '13-08-21', '2021', '466885', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `single_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `color`, `size`, `quantity`, `single_price`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 3, '4', 'Mens T-Shirt', 'red', 'l', '1', '450', '450', NULL, NULL),
(2, 4, '3', 'Mens Shirt', 'red', 'l', '1', '1000', '1000', NULL, NULL),
(3, 5, '5', 'Modern Watch', 'black', NULL, '1', '2000', '2000', NULL, NULL),
(4, 5, '3', 'Mens Shirt', 'red', 'l', '1', '1000', '1000', NULL, NULL),
(5, 6, '4', 'Mens T-Shirt', 'red', 'l', '1', '450', '450', NULL, NULL),
(6, 6, '3', 'Mens Shirt', 'red', 'l', '1', '1000', '1000', NULL, NULL),
(7, 7, '7', 'Redmi Phone', 'blue', 'L', '1', '19500', '19500', NULL, NULL),
(8, 8, '7', 'Redmi Phone', 'blue', 'L', '1', '19500', '19500', NULL, NULL),
(9, 9, '3', 'Mens Shirt', 'red', 'l', '1', '1000', '1000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_in` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_in` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `post_title_en`, `post_title_in`, `post_image`, `details_en`, `details_in`, `created_at`, `updated_at`) VALUES
(1, 3, 'Content Marketing Institute', 'सामग्री विपणन संस्थान', 'public/media/post/1706539842155253.jpg', '<p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.625rem; margin-left: 0px; padding: 0px; vertical-align: baseline; font-family: SSP-Regular; font-size: 16px; line-height: 25px; color: rgb(29, 29, 29);\">Welcome to the race for position no. 1.</p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.625rem; margin-left: 0px; padding: 0px; vertical-align: baseline; font-family: SSP-Regular; font-size: 16px; line-height: 25px; color: rgb(29, 29, 29);\">Except in this race, we are not the cars. We are not the drivers.</p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.625rem; margin-left: 0px; padding: 0px; vertical-align: baseline; font-family: SSP-Regular; font-size: 16px; line-height: 25px; color: rgb(29, 29, 29);\">We are the racetrack. And we are competing to be the first choice for every car and driver.</p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.625rem; margin-left: 0px; padding: 0px; vertical-align: baseline; font-family: SSP-Regular; font-size: 16px; line-height: 25px; color: rgb(29, 29, 29);\">The race is search. The most frequently chosen car? Google, which commands&nbsp;<a href=\"https://www.statista.com/statistics/216573/worldwide-market-share-of-search-engines/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; transition-duration: 0.1s; color: rgb(247, 147, 30); text-decoration-line: underline;\">almost 88% of the global search market</a>.<span id=\"more-121555\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: baseline;\"></span></p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.625rem; margin-left: 0px; padding: 0px; vertical-align: baseline; font-family: SSP-Regular; font-size: 16px; line-height: 25px; color: rgb(29, 29, 29);\">But it’s really no longer a single race car. Research shows, for example, if people are looking for specific products are&nbsp;<a href=\"https://www.emarketer.com/content/do-most-searchers-really-start-on-amazon\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; transition-duration: 0.1s; color: rgb(247, 147, 30); text-decoration-line: underline;\">much more likely to start with Amazon</a>. If they’re looking for images, they go to Google Image. And if they’re looking for&nbsp;<a href=\"https://www.tubics.com/blog/youtube-2nd-biggest-search-engine/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; transition-duration: 0.1s; color: rgb(247, 147, 30); text-decoration-line: underline;\">how-to videos</a>, they’re most likely to search YouTube.&nbsp;<a href=\"https://searchengineland.com/is-apple-getting-real-about-search-and-about-to-take-on-google-339893\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; transition-duration: 0.1s; color: rgb(247, 147, 30); text-decoration-line: underline;\">Apple has begun to eat into Google’s market share</a>&nbsp;of searching for directions.</p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.625rem; margin-left: 0px; padding: 0px; vertical-align: baseline; font-family: SSP-Regular; font-size: 16px; line-height: 25px; color: rgb(29, 29, 29);\">Looking for what people have said about products or things? Facebook surpassed more than&nbsp;<a href=\"https://www.searchenginejournal.com/seo-101/meet-search-engines/#close\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; transition-duration: 0.1s; color: rgb(247, 147, 30); text-decoration-line: underline;\">2 billion searches per day</a>. An estimated one in 10 internet users&nbsp;<a href=\"https://www.tripadvisor.com/TripAdvisorInsights/w828\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; transition-duration: 0.1s; color: rgb(247, 147, 30); text-decoration-line: underline;\">start</a>&nbsp;with TripAdvisor for travel searches. And there are more than 40 million&nbsp;<a href=\"https://blog.hootsuite.com/linkedin-statistics-business/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; transition-duration: 0.1s; color: rgb(247, 147, 30); text-decoration-line: underline;\">searches on LinkedIn for jobs</a>&nbsp;each week.</p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.625rem; margin-left: 0px; padding: 0px; vertical-align: baseline; font-family: SSP-Regular; font-size: 16px; line-height: 25px; color: rgb(29, 29, 29);\">All this begs the question: How are we as marketers thinking about optimizing our tracks – our content journey – for all these cars and drivers?</p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.625rem; margin-left: 0px; padding: 0px; vertical-align: baseline; font-family: SSP-Regular; font-size: 16px; line-height: 25px; color: rgb(29, 29, 29);\">In episode seven of&nbsp;<a href=\"https://youtu.be/zml-wm6ZkD4\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; transition-duration: 0.1s; color: rgb(247, 147, 30); text-decoration-line: underline;\">Marketing Makers</a>, CMI’s series for those who make marketing work, I take a leisurely pace to explore the evolution that led us to today’s world where we must optimize our content for the cars and their drivers. You can watch the show here or read on for some highlights.</p>', '<pre class=\"tw-data-text tw-text-large XcVN5d tw-ta\" data-placeholder=\"Translation\" id=\"tw-target-text\" dir=\"ltr\" style=\"font-family: inherit; unicode-bidi: isolate; font-size: 24px; line-height: 32px; background-color: rgb(248, 249, 250); border: none; padding: 2px 0.14em 2px 0px; position: relative; margin-top: -2px; margin-bottom: -2px; resize: none; overflow: hidden; width: 270.013px; white-space: pre-wrap; overflow-wrap: break-word; color: rgb(32, 33, 36);\"><span class=\"Y2IQFc\" lang=\"hi\">पोजीशन नंबर की दौड़ में आपका स्वागत है। 1.\r\n\r\nइस दौड़ को छोड़कर, हम कार नहीं हैं। हम ड्राइवर नहीं हैं।\r\n\r\nहम रेसट्रैक हैं। और हम हर कार और ड्राइवर की पहली पसंद बनने के लिए होड़ कर रहे हैं।\r\n\r\nदौड़ खोज है। सबसे ज्यादा चुनी जाने वाली कार? Google, जो वैश्विक खोज बाजार का लगभग 88% हिस्सा है।\r\n\r\nलेकिन यह वास्तव में अब एक एकल रेस कार नहीं है। शोध से पता चलता है, उदाहरण के लिए, यदि लोग विशिष्ट उत्पादों की तलाश में हैं तो अमेज़ॅन से शुरू होने की अधिक संभावना है। अगर वे छवियों की तलाश में हैं, तो वे Google छवि पर जाते हैं। और अगर वे कैसे-कैसे वीडियो खोज रहे हैं, तो उनके YouTube पर खोज करने की सबसे अधिक संभावना है। ऐप्पल ने दिशाओं की खोज के लिए Google की बाजार हिस्सेदारी में खाना शुरू कर दिया है।\r\n\r\nखोज रहे हैं कि लोगों ने उत्पादों या चीज़ों के बारे में क्या कहा है? फेसबुक ने प्रतिदिन 2 बिलियन से अधिक खोजों को पार किया। अनुमानित 10 में से एक इंटरनेट उपयोगकर्ता यात्रा खोजों के लिए TripAdvisor के साथ शुरुआत करता है। और लिंक्डइन पर हर हफ्ते नौकरियों के लिए 40 मिलियन से अधिक खोजें होती हैं।\r\n\r\nयह सब सवाल पूछता है: हम इन सभी कारों और ड्राइवरों के लिए अपने ट्रैक - हमारी सामग्री यात्रा - को अनुकूलित करने के बारे में एक विपणक के रूप में कैसे सोच रहे हैं?\r\n\r\nमार्केटिंग मेकर्स के एपिसोड सात में, मार्केटिंग का काम करने वालों के लिए सीएमआई की श्रृंखला, मैं उस विकास का पता लगाने के लिए इत्मीनान से गति लेता हूं जो हमें आज की दुनिया में ले गया जहां हमें कारों और उनके ड्राइवरों के लिए अपनी सामग्री का अनुकूलन करना चाहिए। आप यहां शो देख सकते हैं या कुछ हाइलाइट्स के लिए पढ़ सकते हैं।</span></pre>', NULL, NULL),
(2, 1, 'Affiliate Marketing in 2021: What It Is and How You Can Get Started', '2021 में एफिलिएट मार्केटिंग: यह क्या है और आप कैसे शुरुआत कर सकते हैं', 'public/media/post/1706539771821577.jpg', '<p style=\"margin-right: 0px; margin-bottom: 1.5rem; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 1.6; text-rendering: optimizelegibility; color: rgb(76, 75, 88); font-family: &quot;Gotham Narr&quot;, Helvetica, Arial, sans-serif; background-color: rgb(254, 254, 254);\">Wake up at an ungodly hour. Drive to the office through total gridlock, streets jammed with other half-asleep commuters. Slog through email after mind-numbing email until the sweet release at five o’clock.</p><p style=\"margin-right: 0px; margin-bottom: 1.5rem; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 1.6; text-rendering: optimizelegibility; color: rgb(76, 75, 88); font-family: &quot;Gotham Narr&quot;, Helvetica, Arial, sans-serif; background-color: rgb(254, 254, 254);\">Sound terrible?</p><p style=\"margin-right: 0px; margin-bottom: 1.5rem; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 1.6; text-rendering: optimizelegibility; color: rgb(76, 75, 88); font-family: &quot;Gotham Narr&quot;, Helvetica, Arial, sans-serif; background-color: rgb(254, 254, 254);\">What if, instead of dealing with the monotony and stupor of the rat race to earn a few bucks, you could make money at any time, from anywhere — even while you sleep?</p><p style=\"margin-right: 0px; margin-bottom: 1.5rem; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 1.6; text-rendering: optimizelegibility; color: rgb(76, 75, 88); font-family: &quot;Gotham Narr&quot;, Helvetica, Arial, sans-serif; background-color: rgb(254, 254, 254);\">That’s the concept behind affiliate marketing.</p><p style=\"margin-right: 0px; margin-bottom: 1.5rem; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 1.6; text-rendering: optimizelegibility; color: rgb(76, 75, 88); font-family: &quot;Gotham Narr&quot;, Helvetica, Arial, sans-serif; background-color: rgb(254, 254, 254);\">Affiliate marketing is a popular tactic to drive sales and generate significant online revenue. Extremely beneficial to both brands and affiliate marketers, the new push towards less traditional marketing tactics has paid off.&nbsp;In fact:</p><ul style=\"margin-top: 0.5rem; margin-right: 0px; margin-left: 0px; padding: 0px; list-style: none; line-height: 1.6; color: rgb(76, 75, 88); font-family: &quot;Gotham Narr&quot;, Helvetica, Arial, sans-serif; font-size: 20px; background-color: rgb(254, 254, 254);\"><li style=\"margin: 0px 0px 0.5rem; padding: 0px 0px 0px 1.875rem; font-size: inherit; position: relative;\"><a href=\"https://webmarketsupport.com/affiliate-marketing-statistics/\" target=\"_blank\" style=\"outline: none; line-height: inherit; color: rgb(75, 113, 252); cursor: pointer; transition-duration: 0.3s;\">81% of brands and 84% of publishers</a>&nbsp;leverage the power of affiliate marketing, a statistic that will continue to increase as affiliate marketing spending increases every year in the United States.</li><li style=\"margin: 0px 0px 0.5rem; padding: 0px 0px 0px 1.875rem; font-size: inherit; position: relative;\">There is a&nbsp;<a href=\"http://mediakix.com/2017/09/affiliate-marketing-statistics/#gs.lDcPsUI\" target=\"_blank\" style=\"outline: none; line-height: inherit; color: rgb(75, 113, 252); cursor: pointer; transition-duration: 0.3s;\">10.1% increase in affiliate marketing spending</a>&nbsp;in the United States each year, meaning that by 2020, that number will reach $6.8 billion.</li><li style=\"margin: 0px 0px 0.5rem; padding: 0px 0px 0px 1.875rem; font-size: inherit; position: relative;\">In 2018, content marketing costs were gauged to be 62% of traditional marketing schemes while simultaneously generating three times the leads of traditional methods. In fact, 16% of all orders made online can be attributed to the impact of affiliate marketing.</li><li style=\"margin: 0px 0px 0.5rem; padding: 0px 0px 0px 1.875rem; font-size: inherit; position: relative;\">In March of 2017,&nbsp;<a href=\"https://www.ecommerceceo.com/amazon-affiliate-store/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"outline: none; line-height: inherit; color: rgb(75, 113, 252); cursor: pointer; transition-duration: 0.3s;\">Amazon’s affiliate</a>&nbsp;structure changed, offering rates of 1-10% of product revenue for creators, providing the opportunity for affiliates to dramatically increase their passive income based on the vertical they’re selling on.</li><li style=\"margin: 0px 0px 0.5rem; padding: 0px 0px 0px 1.875rem; font-size: inherit; position: relative;\">The affiliate marketing of Jason Stone, otherwise known as Millionaire Mentor, was responsible for as much as $7 million in retailer sales just in the months of June and July in 2017.</li></ul>', '<pre class=\"tw-data-text tw-text-large XcVN5d tw-ta\" data-placeholder=\"Translation\" id=\"tw-target-text\" dir=\"ltr\" style=\"font-family: inherit; unicode-bidi: isolate; font-size: 24px; line-height: 32px; background-color: rgb(248, 249, 250); border: none; padding: 2px 0.14em 2px 0px; position: relative; margin-top: -2px; margin-bottom: -2px; resize: none; overflow: hidden; width: 270.013px; white-space: pre-wrap; overflow-wrap: break-word; color: rgb(32, 33, 36);\"><span class=\"Y2IQFc\" lang=\"hi\">एक अधर्मी घंटे पर जागो। कुल ग्रिडलॉक के माध्यम से कार्यालय तक ड्राइव करें, अन्य आधे सोए यात्रियों के साथ सड़कें जाम हो गईं। पांच बजे मिठाई रिलीज होने तक दिमागी-सुन्न ईमेल के बाद ईमेल के माध्यम से स्लोग करें।\r\n\r\nभयानक ध्वनि?\r\n\r\nक्या होगा अगर, कुछ रुपये कमाने के लिए चूहे की दौड़ की एकरसता और मूर्खता से निपटने के बजाय, आप किसी भी समय, कहीं से भी पैसा कमा सकते हैं - यहां तक ​​​​कि सोते समय भी?\r\n\r\nसहबद्ध विपणन के पीछे यही अवधारणा है।\r\n\r\nसंबद्ध विपणन बिक्री बढ़ाने और महत्वपूर्ण ऑनलाइन राजस्व उत्पन्न करने के लिए एक लोकप्रिय रणनीति है। ब्रांड और संबद्ध विपणक दोनों के लिए बेहद फायदेमंद, कम पारंपरिक मार्केटिंग रणनीति की ओर नए धक्का ने भुगतान किया है। असल में:\r\n\r\n८१% ब्रांड और ८४% प्रकाशक संबद्ध विपणन की शक्ति का लाभ उठाते हैं, एक ऐसा आँकड़ा जो संयुक्त राज्य में हर साल संबद्ध विपणन खर्च बढ़ने के साथ बढ़ता रहेगा।\r\nसंयुक्त राज्य अमेरिका में हर साल संबद्ध विपणन खर्च में 10.1% की वृद्धि होती है, जिसका अर्थ है कि 2020 तक यह संख्या 6.8 बिलियन डॉलर तक पहुंच जाएगी।\r\n2018 में, सामग्री विपणन लागत पारंपरिक विपणन योजनाओं का 62% होने का अनुमान लगाया गया था, साथ ही साथ पारंपरिक तरीकों से तीन गुना अधिक उत्पादन किया गया था। वास्तव में, ऑनलाइन किए गए सभी आदेशों का 16% सहबद्ध विपणन के प्रभाव के लिए जिम्मेदार ठहराया जा सकता है।\r\nमार्च 2017 में, अमेज़ॅन की संबद्ध संरचना बदल गई, रचनाकारों के लिए उत्पाद राजस्व के 1-10% की दरों की पेशकश की, सहयोगियों को उनकी बिक्री के आधार पर अपनी निष्क्रिय आय में नाटकीय रूप से वृद्धि करने का अवसर प्रदान किया।\r\nजेसन स्टोन का संबद्ध विपणन, जिसे अन्यथा मिलियनेयर मेंटर के रूप में जाना जाता है, 2017 में जून और जुलाई के महीनों में खुदरा बिक्री में $ 7 मिलियन तक के लिए जिम्मेदार था।</span></pre>', NULL, NULL),
(4, 2, 'Not our jurisdiction\': ICC on BCCI\'s attempt to have Kashmir Premier League unrecognised', 'हमारा अधिकार क्षेत्र नहीं\': बीसीसीआई के कश्मीर प्रीमियर लीग को मान्यता न देने के प्रयास पर आईसीसी', 'public/media/post/1707076396840281.jpg', '<p style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); margin-right: auto; margin-bottom: 1rem; margin-left: auto; line-height: 1.7; font-weight: 700; font-family: Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\">The International Cricket Council (ICC) has turned down the Board of Control for Cricket in India\'s (BCCI) request to not recognise the Kashmir Premier League (KPL), explaining that non-international cricket events do not fall under its jurisdiction.</p><p style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); margin-right: auto; margin-bottom: 1rem; margin-left: auto; line-height: 1.7; font-family: Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\">The BCCI and the Pakistan Cricket Board (PCB) have exchanged words the past week after it emerged that Indian officials were trying to prevent overseas players from participating in KPL 2021.</p><p style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); margin-right: auto; margin-bottom: 1rem; margin-left: auto; line-height: 1.7; font-family: Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\">After the PCB said it would&nbsp;<a href=\"https://www.dawn.com/news/1638138/pcb-irked-by-bccis-interference-in-kpl\" style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); color: rgb(144, 31, 31); text-decoration-line: underline;\">raise the matter</a>&nbsp;with the ICC, the BCCI, according to&nbsp;<em style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220);\">ESPNcricinfo</em>, wrote to the global governing body to unrecognise the league.</p><p style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); margin-right: auto; margin-bottom: 1rem; margin-left: auto; line-height: 1.7; font-family: Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\">As per&nbsp;<a href=\"https://www.espncricinfo.com/story/kashmir-premier-league-bcci-urges-icc-to-not-recognise-pcb-approved-tournament-1271711\" class=\"story__link--external\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); color: rgb(144, 31, 31); text-decoration-line: underline; padding: 0px 12px 0px 0px; background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAIAAAGuEPsmAAAAgElEQVQYlXWQyxHAIAhEbVLv0oZebCsWl2xYB2Ri3gVZPgLpVpKbNOd8bSnFA+8r54yQiGwaTe+dDw9eiiirW1ZC4c6SxhguFQUtgkS/1srcxK5QOfKSAMvPP0oE3c5JrbXdXUm2CCTsyYV5Bk/i3whgTh6DZXau0MmwkX9P9eUBgstUonKpVTIAAAAASUVORK5CYII=&quot;); background-position: 100% 0px; background-repeat: no-repeat;\"><em style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220);\">ESPNcricinfo</em></a>, the BCCI\'s letter had centered on \"the status of Kashmir as [a] disputed territory — and whether matches can be played in such territories — and its central place in the long-running dispute between the two countries.\"</p><div class=\"ad ad--adjustable my-4 hidden sm:block py-4\" aria-hidden=\"true\" style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); margin-top: 1rem; margin-bottom: 1rem; padding-top: 1rem; padding-bottom: 1rem; font-family: Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\"><div class=\"js-ad    clearfix\" style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); max-width: 728px; max-height: 90px; text-align: center; margin: 0px auto; overflow: hidden;\"><div class=\"radWrapper  ad__wrapper\" style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); position: relative; left: auto; z-index: 10; margin-left: 0px; width: 632.009px; height: 78.1334px; max-width: 100%;\"><div id=\"div-gpt-ad-1455520357400-2\" class=\"ad__wrapper__slot\" data-google-query-id=\"CM30mfvwlPICFSWgSwUdOfoKcQ\" style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); width: 728px; height: 90px; transform-origin: 0px 0px; position: absolute; transform: scale(0.867149);\"><div id=\"google_ads_iframe_/1029551/DAWN-LB-728x90-MIDDLE_0__container__\" style=\"box-sizing: border-box; border: 0pt none; display: inline-block; width: 728px; height: 90px;\"><iframe frameborder=\"0\" src=\"https://526d8e4907dd61c38511d319d2b3fa69.safeframe.googlesyndication.com/safeframe/1-0-38/html/container.html\" id=\"google_ads_iframe_/1029551/DAWN-LB-728x90-MIDDLE_0\" title=\"3rd party ad content\" name=\"\" scrolling=\"no\" marginwidth=\"0\" marginheight=\"0\" width=\"728\" height=\"90\" data-is-safeframe=\"true\" sandbox=\"allow-forms allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation\" data-google-container-id=\"1\" data-load-complete=\"true\" style=\"box-sizing: border-box; border-width: 0px; border-style: initial; display: block; vertical-align: bottom;\"></iframe></div></div></div></div></div><p style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); margin-right: auto; margin-bottom: 1rem; margin-left: auto; line-height: 1.7; font-family: Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\">When approached by&nbsp;<em style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220);\">Dawn.com</em>&nbsp;to comment on the request made by the BCCI in its letter, an ICC spokesperson answered: \"Non-international cricket is not our jurisdiction so it is not something we can be involved in.\"</p><p style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); margin-right: auto; margin-bottom: 1rem; margin-left: auto; line-height: 1.7; font-family: Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\">The cricketing authorities from both the sides have been trading barbs since former South Africa batsman Herschelle Gibbs&nbsp;<a href=\"https://www.dawn.com/news/1637961/pcb-to-move-icc-against-indian-cricket-board-for-pressuring-cricketers-against-playing-in-kashmir-premier-league\" style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); color: rgb(144, 31, 31); text-decoration-line: underline;\">accused the BCCI</a>&nbsp;of attempting to prevent him from participating in the KPL and threatening him with denying his entry in India if he participated.</p><p style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); margin-right: auto; margin-bottom: 1rem; margin-left: auto; line-height: 1.7; font-family: Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\">\"Completely unnecessary of the BCCI to bring their political agenda with Pakistan into the equation and trying to prevent me [from] playing in the KPL,\" the Proteas great said. \"[They are] also threatening me saying they won\'t allow me entry into India for any cricket-related work. Ludicrous,\" he tweeted.</p><figure class=\"media  w-full  w-full  media--stretch  media--uneven media--embed  \" style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); margin-bottom: 0.25rem; position: relative; max-width: 100%; clear: both; width: 632.009px; font-family: Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\"><div class=\"media__item    media__item--twitter  \" style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); user-select: none; text-align: center; position: relative; padding: 0px;\"><div class=\"twitter-tweet twitter-tweet-rendered\" style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); margin: 10px auto; display: flex; max-width: 550px; width: 549.991px;\"><iframe id=\"twitter-widget-0\" scrolling=\"no\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" class=\"\" title=\"Twitter Tweet\" src=\"https://platform.twitter.com/embed/Tweet.html?dnt=false&amp;embedId=twitter-widget-0&amp;features=eyJ0ZndfZXhwZXJpbWVudHNfY29va2llX2V4cGlyYXRpb24iOnsiYnVja2V0IjoxMjA5NjAwLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X2hvcml6b25fdHdlZXRfZW1iZWRfOTU1NSI6eyJidWNrZXQiOiJodGUiLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X3NwYWNlX2NhcmQiOnsiYnVja2V0Ijoib2ZmIiwidmVyc2lvbiI6bnVsbH19&amp;frame=false&amp;hideCard=false&amp;hideThread=false&amp;id=1421283813171384320&amp;lang=en&amp;origin=https%3A%2F%2Fwww.dawn.com%2Fnews%2F1638545&amp;sessionId=39cb4a1356f8d2561c9f8a479e5285ad550e9e80&amp;siteScreenName=dawn_com&amp;theme=light&amp;widgetsVersion=1890d59c%3A1627936082797&amp;width=550px\" data-tweet-id=\"1421283813171384320\" style=\"box-sizing: border-box; border-width: 0px; border-style: none; border-color: rgb(210, 214, 220); display: block; vertical-align: middle; position: static; inset: 0px; margin: auto; width: 550px; max-width: 100%; max-height: none; visibility: visible; height: 270px; flex-grow: 1;\"></iframe></div></div></figure><p style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); margin-right: auto; margin-bottom: 1rem; margin-left: auto; line-height: 1.7; font-family: Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\"></p><p style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); margin-right: auto; margin-bottom: 1rem; margin-left: auto; line-height: 1.7; font-family: Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\">Reacting to the development, the PCB had issued a statement, saying it would \"raise this matter at the appropriate ICC forum and also reserves the right to take any further action that is available to us within the ICC charter\".</p><p style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); margin-right: auto; margin-bottom: 1rem; margin-left: auto; line-height: 1.7; font-family: Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\">The BCCI&nbsp;<a href=\"https://www.dawn.com/news/1638180/well-within-our-rights-bcci-on-allegation-that-its-threatening-kashmir-league-participants\" style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); color: rgb(144, 31, 31); text-decoration-line: underline;\">responded to Gibbs\' allegations</a>&nbsp;and the PCB, saying that the Indian board was \"well within its rights\" to do anything in the best interest of its cricketing ecosystem.</p><p style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); margin-right: auto; margin-bottom: 1rem; margin-left: auto; line-height: 1.7; font-family: Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\">It later emerged on Monday that former England spinner Monty Panesar had&nbsp;<a href=\"https://www.dawn.com/news/1638389/former-england-cricketer-monty-panesar-pulls-out-from-kashmir-premier-league-due-to-political-pressure\" style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); color: rgb(144, 31, 31); text-decoration-line: underline;\">pulled out</a>&nbsp;of the KPL, saying that the BCCI had \"advised\" him that if he played in the event, the \"consequences\" of his decision could include not being granted a visa to India in the future and not being allowed to work in the country.</p><p style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); margin-right: auto; margin-bottom: 1rem; margin-left: auto; line-height: 1.7; font-family: Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\">The Kashmir Premier League T20 2021 is the first edition of the KPL. Of the six teams playing in the inaugural season, five teams are from Azad Kashmir while the sixth one is from outside the region.</p><p style=\"box-sizing: border-box; border: 0px solid rgb(210, 214, 220); margin-right: auto; margin-bottom: 1rem; margin-left: auto; line-height: 1.7; font-family: Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\">The league is the second T20 competition arranged by the PCB after the Pakistan Super League and is set to play from August 6-17 in Muzaffarabad.</p>', '<pre class=\"tw-data-text tw-text-large XcVN5d tw-ta\" data-placeholder=\"Translation\" id=\"tw-target-text\" dir=\"ltr\" style=\"unicode-bidi: isolate; line-height: 32px; background-color: rgb(248, 249, 250); border: none; padding: 2px 0.14em 2px 0px; position: relative; margin-top: -2px; margin-bottom: -2px; resize: none; overflow: hidden; width: 270.013px; overflow-wrap: break-word;\"><div style=\"color: rgb(32, 33, 36); font-family: inherit; font-size: 24px; white-space: pre-wrap; text-align: justify;\"><span style=\"font-family: inherit;\">अंतर्राष्ट्रीय क्रिकेट परिषद (ICC) ने भारतीय क्रिकेट कंट्रोल बोर्ड (BCCI) के कश्मीर प्रीमियर लीग (KPL) को मान्यता नहीं देने के अनुरोध को यह कहते हुए ठुकरा दिया है कि गैर-अंतर्राष्ट्रीय क्रिकेट आयोजन उसके अधिकार क्षेत्र में नहीं आते हैं।</span></div><span class=\"Y2IQFc\" lang=\"hi\" style=\"\"><div style=\"text-align: justify;\"><font color=\"#202124\" face=\"Roboto, Helvetica Neue, Arial, sans-serif\"><span style=\"font-size: 24px; white-space: pre-wrap;\"><br></span></font></div><font color=\"#202124\" face=\"inherit\"><span style=\"font-size: 24px; white-space: pre-wrap;\">बीसीसीआई और पाकिस्तान क्रिकेट बोर्ड (पीसीबी) ने पिछले सप्ताह शब्दों का आदान-प्रदान किया जब यह सामने आया कि भारतीय अधिकारी विदेशी खिलाड़ियों को केपीएल 2021 में भाग लेने से रोकने की कोशिश कर रहे थे।\r\n\r\nईएसपीएन क्रिकइन्फो के अनुसार, पीसीबी ने कहा कि वह आईसीसी के साथ इस मामले को उठाएगा, बीसीसीआई ने लीग को मान्यता न देने के लिए वैश्विक शासी निकाय को लिखा था।\r\n\r\nईएसपीएन क्रिकइन्फो के अनुसार, बीसीसीआई का पत्र \"कश्मीर की स्थिति [ए] विवादित क्षेत्र पर केंद्रित था - और क्या ऐसे क्षेत्रों में मैच खेले जा सकते हैं - और दोनों देशों के बीच लंबे समय से चल रहे विवाद में इसका केंद्रीय स्थान।\"\r\n\r\n\r\nजब डॉन डॉट कॉम ने बीसीसीआई द्वारा अपने पत्र में किए गए अनुरोध पर टिप्पणी करने के लिए संपर्क किया, तो आईसीसी के एक प्रवक्ता ने जवाब दिया: \"गैर-अंतर्राष्ट्रीय क्रिकेट हमारा अधिकार क्षेत्र नहीं है, इसलिए यह ऐसा कुछ नहीं है जिसमें हम शामिल हो सकते हैं।\"\r\n\r\nदक्षिण अफ्रीका के पूर्व बल्लेबाज हर्शल गिब्स ने बीसीसीआई पर उन्हें केपीएल में भाग लेने से रोकने का प्रयास करने का आरोप लगाया और भारत में भाग लेने से इनकार करने की धमकी देने के बाद से दोनों पक्षों के क्रिकेट अधिकारी व्यापार कर रहे हैं।\r\n\r\nप्रोटियाज महान ने कहा, \"बीसीसीआई द्वारा पाकिस्तान के साथ अपने राजनीतिक एजेंडे को समीकरण में लाने और मुझे केपीएल में खेलने से रोकने की कोशिश करना पूरी तरह से अनावश्यक है।\" उन्होंने ट्वीट किया, \"[वे] मुझे यह कहते हुए धमकी भी दे रहे हैं कि वे मुझे क्रिकेट से जुड़े किसी भी काम के लिए भारत में प्रवेश नहीं करने देंगे। यह हास्यास्पद है।\"\r\n\r\nइस घटनाक्रम पर प्रतिक्रिया देते हुए, पीसीबी ने एक बयान जारी कर कहा था कि वह \"इस मामले को उपयुक्त आईसीसी मंच पर उठाएगा और आईसीसी चार्टर के भीतर हमारे लिए उपलब्ध कोई भी कार्रवाई करने का अधिकार भी सुरक्षित रखता है\"।\r\n\r\nबीसीसीआई ने गिब्स के आरोपों और पीसीबी का जवाब देते हुए कहा कि भारतीय बोर्ड अपने क्रिकेट पारिस्थितिकी तंत्र के सर्वोत्तम हित में कुछ भी करने के लिए \"अपने अधिकारों के भीतर\" था।\r\n\r\nबाद में सोमवार को यह सामने आया कि इंग्लैंड के पूर्व स्पिनर मोंटी पनेसर ने केपीएल से यह कहते हुए बाहर कर दिया था कि बीसीसीआई ने उन्हें \"सलाह\" दी थी कि अगर वह इस आयोजन में खेलते हैं, तो उनके फैसले के \"परिणाम\" में उन्हें वीजा नहीं दिया जाना शामिल हो सकता है। भविष्य में भारत और देश में काम नहीं करने दिया जा रहा है।\r\n\r\nकश्मीर प्रीमियर लीग टी20 2021 केपीएल का पहला संस्करण है। उद्घाटन सत्र में खेलने वाली छह टीमों में से पांच टीमें आजाद कश्मीर से हैं जबकि छठी टीम क्षेत्र से बाहर की है।\r\n\r\n<div style=\"text-align: justify;\"><span style=\"font-family: inherit;\">यह लीग पाकिस्तान सुपर लीग के बाद पीसीबी द्वारा आयोजित दूसरी टी20 प्रतियोगिता है और मुजफ्फराबाद में 6-17 अगस्त तक खेली जाएगी।</span></div></span></font></span></pre>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_in` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `category_name_en`, `category_name_in`, `created_at`, `updated_at`) VALUES
(1, 'Services', 'सेवा', NULL, NULL),
(2, 'Locals', 'स्थानीय', NULL, NULL),
(3, 'Education & culture', 'शिक्षा तथा संस्कृति', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_slider` int(11) DEFAULT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `best_rated` int(11) DEFAULT NULL,
  `mid_slider` int(11) DEFAULT NULL,
  `hot_new` int(11) DEFAULT NULL,
  `buyone_getone` int(30) DEFAULT NULL,
  `trend` int(11) DEFAULT NULL,
  `image_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_three` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `product_name`, `product_code`, `product_quantity`, `product_details`, `product_color`, `product_size`, `product_price`, `discount_price`, `video_link`, `main_slider`, `hot_deal`, `best_rated`, `mid_slider`, `hot_new`, `buyone_getone`, `trend`, `image_one`, `image_two`, `image_three`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 10, 4, 'walton Refrigerator', 'BC01', '20', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br></p>', 'green,red,blue', 'l,m', '45000', '40000', 'https://www.youtube.com/watch?v=tYTUBV7s5zQ', 1, 1, 1, 1, 1, 1, 1, 'public/media/product/270721_15_17_56.jpg', 'public/media/product/270721_16_58_08.jpg', 'public/media/product/270721_15_31_56.jpg', 1, NULL, NULL),
(2, 1, 7, 1, 'Euro Football', 'euro-2020', '50', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Why do we use it?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><br></div>', 'red,green', 'l,m,s', '4000', NULL, 'https://www.youtube.com/watch?v=SJdv4oQFsXI', 1, 1, NULL, 1, NULL, NULL, 1, 'public/media/product/1706435385539599.jpg', 'public/media/product/1706435387305630.jpg', 'public/media/product/1706435387370882.jpg', 1, NULL, NULL),
(3, 7, 12, 10, 'Mens Shirt', 'MS--01', '98', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'red,blue,yello,white', 'l,m,s', '1200', '1000', 'https://www.youtube.com/watch?v=tYTUBV7s5zQ', 1, 1, 1, 1, 1, 1, 1, 'public/media/product/1706544779537709.jpg', 'public/media/product/1706544783360557.jpg', 'public/media/product/1706544784086105.jpg', 1, NULL, NULL),
(4, 7, 11, 6, 'Mens T-Shirt', 'mst-01', '199', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Why do we use it?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><br></div>', 'red,blue,black', 'l,m,s', '500', '450', 'https://www.youtube.com/watch?v=zlzhH82k86s', 1, 1, 1, 1, 1, 1, 1, 'public/media/product/1706544912419277.png', 'public/media/product/1706544912749937.png', 'public/media/product/1706544912876740.png', 1, NULL, NULL),
(5, 10, 21, 9, 'Modern Watch', 'watch-1001', '100', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Where can I get some?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'black,yellow,blue', NULL, '2300', '2000', 'https://www.youtube.com/watch?v=SJdv4oQFsXI', 1, 1, 1, 1, 1, 1, 1, 'public/media/product/1706545074217859.jpeg', 'public/media/product/1706545074379730.jpeg', 'public/media/product/1706545074520422.jpeg', 1, NULL, NULL),
(6, 2, 4, 12, 'MI TV 3000', 'Mi-001', '50', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Where can I get some?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'Blue,Black', 'L,M', '16000', '15500', 'https://www.creativebloq.com/news/new-Xiaomi-logo', 1, 1, 1, 1, 1, 1, 1, 'public/media/product/1706818800921840.jpg', 'public/media/product/1706818801912244.jpg', 'public/media/product/1706818802039485.jpg', 1, NULL, NULL),
(7, 2, 30, 12, 'Redmi Phone', 'RD-01', '39', '<p><br></p><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Where does it come from?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'blue,black,white', 'L,m', '20000', '19500', 'https://www.gsmarena.com/xiaomi_redmi_note_10-10247.php', 1, 1, 1, 1, 1, 1, 1, 'public/media/product/1706819017188531.jpg', 'public/media/product/1706819017317672.jpg', 'public/media/product/1706819017433882.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Author', 'author', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bing_analytic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_tag`, `meta_description`, `google_analytic`, `bing_analytic`, `created_at`, `updated_at`) VALUES
(1, 'Udemy Ecommerce', 'CodaYaccel', 'udemy-ecommerce', 'Udemy  ecommerce course description', 'google', 'bing', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `shipping_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `shipping_name`, `shipping_email`, `shipping_phone`, `shipping_address`, `shipping_city`, `created_at`, `updated_at`) VALUES
(1, 1, 'MD. Ashraf', 'jamil@yahoo.com', '01867396290', 'Colonel Taher Road, Munsipara', 'Saidpur', NULL, NULL),
(2, 2, 'MD. Ashraf', 'jamil@yahoo.com', '01867396290', 'Colonel Taher Road, Munsipara', 'Saidpur', NULL, NULL),
(3, 3, 'MD. Ashraf', 'jamil@yahoo.com', '01867396290', 'Colonel Taher Road, Munsipara', 'Saidpur', NULL, NULL),
(4, 4, 'MD. Ashraf', 'jamil@yahoo.com', '01867396290', 'Colonel Taher Road, Munsipara', 'Saidpur', NULL, NULL),
(5, 5, 'MD. Ashraf', 'jamil@yahoo.com', '01867396290', 'Colonel Taher Road, Munsipara', 'Saidpur', NULL, NULL),
(6, 6, 'MD. Ashraf', 'admin@admin.com', '01943438901', 'Colonel Taher Road, Munsipara', 'Saidpur', NULL, NULL),
(7, 7, 'MD. Ashraf', 'jamil@yahoo.com', '194343889', 'Colonel Taher Road, Munsipara', 'Saidpur', NULL, NULL),
(8, 8, 'MD. Ashraf', 'jamil@yahoo.com', '01943438901', 'Colonel Taher Road, Munsipara', 'Saidpur', NULL, NULL),
(9, 9, 'MD. Ashraf', 'jamil@yahoo.com', '01867396290', 'Colonel Taher Road, Munsipara', 'Saidpur', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `phone_one`, `phone_two`, `email`, `company_name`, `company_address`, `facebook`, `youtube`, `instagram`, `twitter`, `created_at`, `updated_at`) VALUES
(1, '01543229084', '01998734409', 'jamil@yahoo.com', 'BigBazar', 'Mirpur,Dhaka', 'facebook.com/bigbazar', 'youtube.com/bigbazar', 'instagram.com/instagram', 'twitter.com/bigbazar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bat', '2021-07-22 08:46:09', '2021-07-22 08:46:09'),
(2, 5, 'Half T-Shirt', '2021-07-22 08:46:39', '2021-07-22 08:46:39'),
(3, 6, 'Shoe', '2021-07-22 10:06:36', '2021-07-22 10:06:36'),
(4, 2, 'MI TV', '2021-07-22 10:55:49', '2021-07-22 10:55:49'),
(5, 4, 'UnderPant', '2021-07-24 10:38:23', '2021-07-24 10:38:23'),
(6, 2, 'Tablet', '2021-07-24 10:38:46', '2021-07-24 10:38:46'),
(7, 1, 'Football', '2021-07-24 10:39:05', '2021-07-24 10:39:05'),
(8, 5, 'Long Frok', '2021-07-24 10:39:23', '2021-07-24 10:39:23'),
(9, 4, 'Formal T-Shirt', '2021-07-24 10:39:44', '2021-07-24 10:39:44'),
(10, 2, 'Refrigerator', '2021-07-25 06:41:50', '2021-07-25 06:41:50'),
(11, 7, 'Gents Tshirt', '2021-07-28 08:48:07', '2021-07-28 08:48:07'),
(12, 7, 'Gents Shirt', '2021-07-28 08:48:20', '2021-07-28 08:48:20'),
(13, 7, 'Gents Pant', '2021-07-28 08:48:32', '2021-07-28 08:48:32'),
(14, 8, 'Womens Tshirt', '2021-07-28 08:49:16', '2021-07-28 08:49:16'),
(15, 8, 'Womens Shirt', '2021-07-28 08:49:30', '2021-07-28 08:49:30'),
(16, 8, 'Womens Pant', '2021-07-28 08:49:44', '2021-07-28 08:49:44'),
(17, 9, 'Child Dress & Footware', '2021-07-28 08:50:38', '2021-07-28 08:50:38'),
(18, 9, 'Child Body Care', '2021-07-28 08:50:55', '2021-07-28 08:50:55'),
(19, 9, 'Child Diaper', '2021-07-28 08:51:05', '2021-07-28 08:51:05'),
(20, 10, 'Gents Watch', '2021-07-28 08:51:41', '2021-07-28 08:51:41'),
(21, 10, 'Womans Watch', '2021-07-28 08:51:50', '2021-07-28 08:51:50'),
(22, 10, 'Kids Watch', '2021-07-28 08:52:00', '2021-07-28 08:52:00'),
(23, 13, 'Body Spray', '2021-07-28 08:52:41', '2021-07-28 08:52:41'),
(24, 13, 'Finger Ring', '2021-07-28 08:52:50', '2021-07-28 08:52:50'),
(25, 13, 'Jewelry', '2021-07-28 08:52:59', '2021-07-28 08:52:59'),
(26, 15, 'Appliances', '2021-07-28 08:54:03', '2021-07-28 08:54:03'),
(27, 15, 'Room Decoration', '2021-07-28 08:54:15', '2021-07-28 08:54:15'),
(28, 15, 'Light and Lamp', '2021-07-28 08:54:24', '2021-07-28 08:54:24'),
(29, 15, 'Security', '2021-07-28 08:54:34', '2021-07-28 08:54:34'),
(30, 2, 'SmartPhone', '2021-07-31 10:35:56', '2021-07-31 10:35:56'),
(31, 14, 'Football', '2021-08-01 10:39:59', '2021-08-01 10:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `provider`, `provider_id`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Javed', '', 'javed@yahoo.com', NULL, NULL, NULL, NULL, '$2y$10$/PJhi90UWTDzaqx9BZ076uHFuLbr2ckEUsxp1GwYcBRYw4kfLNw1y', NULL, '2021-07-30 09:56:36', '2021-07-30 09:56:36'),
(4, 'jamil', NULL, 'jamil@yahoo.com', NULL, NULL, NULL, '2021-07-30 10:35:11', '$2y$10$7/usvIqUKnozRbh1c0UsnuoauXVCSxHjPprj11LcOGBSvadVEPyjK', NULL, '2021-07-30 10:18:03', '2021-07-30 11:33:07'),
(5, 'Rasel', NULL, 'rasel@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$ychNYgeyZJj5eRBVACy3YOKkEkHq50.yBP7gBqHNBj8/6G8eaHJHm', NULL, '2021-07-30 10:21:59', '2021-07-30 10:21:59'),
(6, 'Rahul', NULL, 'rahul@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$mlNzOKPdcQ/vmwJ6.9HxDuDexxs2OjIcMVtoCdCyAYWu5uLFKkR3q', NULL, '2021-07-30 10:25:11', '2021-07-30 10:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 4, 5, NULL, NULL),
(2, 4, 3, NULL, NULL),
(3, 4, 2, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 4, 7, NULL, NULL),
(6, 4, 4, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `=settings`
--
ALTER TABLE `=settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bloggers`
--
ALTER TABLE `bloggers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bloggers_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_letters`
--
ALTER TABLE `news_letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `=settings`
--
ALTER TABLE `=settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bloggers`
--
ALTER TABLE `bloggers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `news_letters`
--
ALTER TABLE `news_letters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
