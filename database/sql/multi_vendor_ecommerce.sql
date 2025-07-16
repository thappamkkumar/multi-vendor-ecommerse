-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 07:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_vendor_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `webSiteName` varchar(255) NOT NULL,
  `merchantId` varchar(255) NOT NULL,
  `saltKey` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `addressMapUrl` longtext DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `instagram` longtext DEFAULT NULL,
  `facbook` longtext DEFAULT NULL,
  `youtube` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `webSiteName`, `merchantId`, `saltKey`, `email`, `address`, `addressMapUrl`, `contact`, `instagram`, `facbook`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'ShopHub', 'PGTESTPAYUAT86', '96434309-7796-489d-8924-ab56988a6076', 'support@shophub.com', 'Kathua, Jammu And Kashmir, India', 'https://maps.app.goo.gl/A5jaRcvJpaNd2kHd7', '6005819576', 'https://www.instagram.com', 'https://www.facebook.com', 'https://www.youtube.com', '2024-01-14 09:59:24', '2025-06-26 04:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 3, 25, 1, '2025-06-27 01:51:02', '2025-06-27 01:51:02'),
(2, 3, 24, 1, '2025-06-27 01:51:12', '2025-06-27 01:51:12'),
(3, 3, 23, 1, '2025-06-27 01:51:19', '2025-06-27 01:51:19'),
(4, 2, 24, 2, '2025-07-11 02:10:16', '2025-07-11 02:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `gst` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `gst`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Unisex', 'men-women-unisex', 18, 1, '2025-06-26 05:17:55', '2025-06-26 05:17:55'),
(2, 'Lifestyle', 'lifestyle', 18, 1, '2025-06-26 05:32:10', '2025-06-26 05:32:10'),
(3, 'Activewear', 'activewear', 18, 1, '2025-06-26 05:32:29', '2025-06-26 05:32:29'),
(4, 'Accessories', 'accessories-daily-product', 18, 1, '2025-06-26 05:32:46', '2025-06-26 05:32:46'),
(5, 'Footwear', 'men-woman-child-shoes', 18, 1, '2025-06-26 05:33:06', '2025-06-26 05:33:06'),
(6, 'Women’s Clothing', 'women-clothing-fashion-style-wear-dress-cloth', 18, 1, '2025-06-26 05:33:25', '2025-06-26 05:33:25'),
(7, 'Men’s Clothing', 'men-clothing-fashion-style-wear-dress-cloth', 18, 1, '2025-06-26 05:33:44', '2025-06-26 05:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `area_street_sector_village` varchar(255) NOT NULL,
  `flat_houseno_building_company` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `profile_image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `area_street_sector_village`, `flat_houseno_building_company`, `landmark`, `district`, `state`, `country`, `pincode`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 2, 'Rohan', 'Gandhi Nagar', '120', 'KVC.H. School', 'Pathankot', 'Punjab', 'India', '184125', 'rohan123_image.jpg', '2025-06-26 04:32:08', '2025-06-26 04:40:46'),
(2, 3, 'Suresh', 'Ludhiyana', '45', 'Center Park', 'Ludhiyana', 'Punjab', 'India', '184105', 'suresh123_image.jpg', '2025-06-26 04:32:29', '2025-06-26 04:44:08'),
(3, 4, 'Priya Sharma', '72 sector', '90', 'tech street', 'Mohali', 'Punjab', 'India', '145098', 'priya123_image.jpg', '2025-06-26 04:33:09', '2025-06-26 04:45:59'),
(4, 5, 'Ruhani', 'Malak Pure', '456', 'DownTown', 'Pathankot', 'Punjab', 'India', '145025', 'ruhani123_image.jpg', '2025-06-26 04:33:53', '2025-06-26 04:49:21'),
(5, 6, 'Komal', 'Sundar Chack', '12', 'GHS School', 'Pathankot', 'Punjab', 'India', '145025', 'komal123_image.jpg', '2025-06-26 04:34:13', '2025-06-26 04:49:01'),
(6, 7, 'Raj Mehra', 'Mumbai', '123', 'Near FC Road', 'Mumbai', 'Maharashtra', 'India', '411001', 'raj123_profile_image.jpg', '2025-06-26 04:35:19', '2025-06-27 02:41:11'),
(7, 8, 'Vikram Singh', 'street-13', '123', 'Near Hazratganj', 'Lucknow', 'Lucknow', 'India', '226001', '', '2025-06-26 04:36:15', '2025-06-26 04:57:39'),
(8, 10, 'Farhan Qureshi', 'sub bazar', '456', 'MG Road Junction', 'Bengaluru', 'Karnataka', 'India', '560001', 'farhan123_image.jpg', '2025-06-26 04:37:32', '2025-06-26 05:09:50');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_07_134921_create_vendors_table', 1),
(6, '2024_03_07_135218_create_customers_table', 1),
(7, '2024_03_07_135232_create_admins_table', 1),
(8, '2024_03_07_135353_create_categories_table', 1),
(9, '2024_03_07_135414_create_products_table', 1),
(10, '2024_03_07_135530_create_carts_table', 1),
(11, '2024_03_07_135541_create_orders_table', 1),
(12, '2024_03_07_135622_create_reviews_table', 1),
(13, '2024_03_07_135632_create_payments_table', 1),
(14, '2024_03_07_135653_create_transactions_table', 1),
(15, '2024_03_08_115805_add_column_to_orders', 1),
(16, '2024_03_12_102002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `delivery_charges` decimal(10,2) NOT NULL,
  `gst` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'pending',
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `product_id`, `address`, `price`, `delivery_charges`, `gst`, `order_status`, `quantity`, `created_at`, `updated_at`, `transaction_id`) VALUES
(1, 'Suresh_order_number_1', 3, 19, '45, Ludhiyana, Ludhiyana, Punjab, India, 184105', 460.00, 40.00, 96, 'Delivered', 1, '2025-06-27 02:24:53', '2025-06-28 02:31:45', 1),
(2, 'Suresh_order_number_2', 3, 20, '45, Ludhiyana, Ludhiyana, Punjab, India, 184105', 190.00, 60.00, 91, 'Delivered', 1, '2025-06-27 02:25:47', '2025-06-28 02:33:46', 2),
(3, 'Priya Sharma_order_number_3', 4, 14, '90, 72 sector, Mohali, Punjab, India, 145098', 120.00, 40.00, 85, 'pending', 1, '2025-06-27 02:32:18', '2025-06-27 02:32:18', 3),
(4, 'Priya Sharma_order_number_4', 4, 14, '90, 72 sector, Mohali, Punjab, India, 145098', 120.00, 40.00, 85, 'pending', 1, '2025-06-27 02:33:10', '2025-06-27 02:33:10', 4),
(5, 'Raj Mehra_order_number_5', 7, 10, '123, Mumbai, Mumbai, Maharashtra, India, 411001', 59.00, 30.00, 69, 'pending', 1, '2025-06-27 02:37:42', '2025-06-27 02:37:42', 5),
(6, 'Raj Mehra_order_number_6', 7, 10, '123, Mumbai, Mumbai, Maharashtra, India, 411001', 59.00, 30.00, 69, 'pending', 1, '2025-06-27 02:38:42', '2025-06-27 02:38:42', 6),
(7, 'Raj Mehra_order_number_7', 7, 8, '123, Mumbai, Mumbai, Maharashtra, India, 411001', 670.00, 40.00, 97, 'Delivered', 1, '2025-06-27 02:39:41', '2025-07-12 03:12:38', 7),
(8, 'Suresh_order_number_8', 3, 24, '45, Ludhiyana, Ludhiyana, Punjab, India, 184105', 590.00, 60.00, 97, 'pending', 1, '2025-06-27 07:02:39', '2025-06-27 07:02:39', 8),
(9, 'Suresh_order_number_9', 3, 15, '45, Ludhiyana, Ludhiyana, Punjab, India, 184105', 360.00, 60.00, 95, 'pending', 1, '2025-06-27 07:05:20', '2025-06-27 07:05:20', 9),
(10, 'Suresh_order_number_10', 3, 12, '45, Ludhiyana, Ludhiyana, Punjab, India, 184105', 550.00, 60.00, 97, 'pending', 1, '2025-06-27 07:09:36', '2025-06-27 07:09:36', 10),
(11, 'Suresh_order_number_11', 3, 12, '45, Ludhiyana, Ludhiyana, Punjab, India, 184105', 550.00, 60.00, 97, 'Delivered', 1, '2025-06-27 07:11:22', '2025-06-28 03:23:37', 11),
(12, 'Suresh_order_number_12', 3, 13, '45, Ludhiyana, Ludhiyana, Punjab, India, 184105', 300.00, 70.00, 94, 'pending', 1, '2025-06-27 07:12:28', '2025-06-27 07:12:28', 12),
(13, 'Suresh_order_number_13', 3, 8, '45, Ludhiyana, Ludhiyana, Punjab, India, 184105', 670.00, 40.00, 97, 'Delivered', 1, '2025-06-27 07:14:53', '2025-06-28 00:22:26', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `vendor_id`, `order_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 13, 13, 726.30, '2025-06-28 02:24:44', '2025-06-28 02:24:44'),
(2, 11, 1, 536.40, '2025-06-28 02:31:48', '2025-06-28 02:31:48'),
(3, 11, 2, 306.90, '2025-06-28 02:33:49', '2025-06-28 02:33:49');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `delivery_charges` decimal(10,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `specification` text DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `video_url` text DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `thumnail` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `user_id`, `name`, `slug`, `price`, `sale_price`, `delivery_charges`, `description`, `specification`, `stock`, `video_url`, `images`, `thumnail`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 6, 9, 'Leather Blazer', 'leather-blazer-women', 660.00, 590.00, 60.00, '<p>Leather Blazer by MetroMode is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Black\",\"material\",\"Polyester Blend\",\"size\",\"M\",\"fit\",\"Slim\",\"wash\",\"Machine Washable\"]', 45, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/pGDxyycoUKg?si=yx_BeB88TJogIcWD\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Women\\u2019s Clothing_Leather_Blazer_13_1.png\",\"Women\\u2019s Clothing_Leather_Blazer__2.png\",\"Women\\u2019s Clothing_Leather_Blazer__3.png\",\"Women\\u2019s Clothing_Leather_Blazer__4.png\",\"Women\\u2019s Clothing_Leather_Blazer_13_5.png\"]', 'Women’s Clothing_Leather_Blazer_13_thumbnail.png', 1, '2025-06-26 12:33:48', '2025-06-26 12:46:27'),
(2, 6, 9, 'Crop Top & Skirt Set', 'crop-top-&-skirt-set', 630.00, 580.00, 70.00, '<p>Crop Top &amp; Skirt Set by CoreWear is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Red\",\"material\",\"Denim\",\"size\",\"6\",\"fit\",\"Regular\",\"wash\",\"Machine Washable\",\"hand made\",\"No\"]', 25, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/7gSjgsRgDYw?si=Z-Qk980pyHhJFZwQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Women\\u2019s Clothing_Crop_Top___Skirt_Set__1.jpg\",\"Women\\u2019s Clothing_Crop_Top___Skirt_Set__2.jpg\",\"Women\\u2019s Clothing_Crop_Top___Skirt_Set__3.jpg\",\"Women\\u2019s Clothing_Crop_Top___Skirt_Set__4.jpg\"]', 'Women’s Clothing_Crop_Top___Skirt_Set__thumbnail.jpg', 1, '2025-06-26 12:45:36', '2025-06-26 12:45:36'),
(3, 6, 9, 'High-Waisted Mom Jeans', 'high-waisted-mom-jeans', 610.00, 570.00, 30.00, '<p>High-Waisted Mom Jeans by VibeFit is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Blue\",\"material\",\"Nylon\\/Spandex\",\"size\",\"8\",\"fit\",\"Regular\",\"wash\",\"Machine Washable\"]', 24, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/_MVY-MDv-IU?si=y4OelRwUwbVo49aH\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Women\\u2019s Clothing_High-Waisted_Mom_Jeans__1.jpg\",\"Women\\u2019s Clothing_High-Waisted_Mom_Jeans__2.jpg\",\"Women\\u2019s Clothing_High-Waisted_Mom_Jeans__3.jpg\",\"Women\\u2019s Clothing_High-Waisted_Mom_Jeans__4.jpg\"]', 'Women’s Clothing_High-Waisted_Mom_Jeans__thumbnail.jpg', 1, '2025-06-26 12:51:30', '2025-06-26 12:51:30'),
(4, 6, 9, 'Oversized Sweater', 'oversized-sweater', 220.00, 180.00, 60.00, '<p>Oversized Sweater by StyleNest is a stylish item crafted for comfort and everyday wear.\"</p>', '[\"color\",\"Red\",\"material\",\"Linen\",\"size\",\"7\",\"fit\",\"Loose\",\"wash\",\"Machine Washable\"]', 94, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Jef_gWMJEtk?si=p_AEpMnfNRn-AJHt\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Women\\u2019s Clothing_Oversized_Sweater__1.png\",\"Women\\u2019s Clothing_Oversized_Sweater__2.png\",\"Women\\u2019s Clothing_Oversized_Sweater__3.png\"]', 'Women’s Clothing_Oversized_Sweater__thumbnail.png', 1, '2025-06-26 12:54:01', '2025-06-26 12:54:01'),
(5, 6, 9, 'Floral Wrap Dress', 'floral-wrap-dress', 550.00, 520.00, 70.00, '<p>Floral Wrap Dress by CoreWear is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Red\",\"material\",\"Mesh & Rubber\",\"size\",\"M\",\"fit\",\"Athletic\",\"wash\",\"Machine Washable\"]', 40, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/FDHZlgjJT-o?si=mtYW6mfzbsu7HBfU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Women\\u2019s Clothing_Floral_Wrap_Dress__1.png\",\"Women\\u2019s Clothing_Floral_Wrap_Dress__2.png\",\"Women\\u2019s Clothing_Floral_Wrap_Dress__3.png\"]', 'Women’s Clothing_Floral_Wrap_Dress__thumbnail.png', 1, '2025-06-26 12:56:05', '2025-06-26 12:56:05'),
(6, 7, 13, 'Casual Hoodie', 'casual-hoodie', 630.00, 570.00, 50.00, '<p>Casual Hoodie by VibeFit is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Black\",\"material\",\"Mesh & Rubber\",\"size\",\"L\",\"fit\",\"Slim\",\"wash\",\"Machine Washable\"]', 83, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/sBiZZHtPtnU?si=Kwo6VLP-Hb4HYwnE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Men\\u2019s Clothing_Casual_Hoodie__1.jpg\",\"Men\\u2019s Clothing_Casual_Hoodie__2.jpg\",\"Men\\u2019s Clothing_Casual_Hoodie__3.jpg\",\"Men\\u2019s Clothing_Casual_Hoodie__4.jpg\"]', 'Men’s Clothing_Casual_Hoodie__thumbnail.jpg', 1, '2025-06-27 00:41:27', '2025-06-27 00:41:27'),
(7, 7, 13, 'Black Chino Pants', 'black-chino-pants', 670.00, 640.00, 50.00, '<p>Black Chino Pants by StyleNest is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Black\",\"material\",\"Linen\",\"size\",\"M\",\"fit\",\"Regular\",\"wash\",\"Machine Washable\"]', 36, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/HjT1RU3nskc?si=t4Uy6zc8qFyRk6aI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Men\\u2019s Clothing_Black_Chino_Pants__1.jpg\",\"Men\\u2019s Clothing_Black_Chino_Pants__2.jpg\",\"Men\\u2019s Clothing_Black_Chino_Pants__3.jpg\",\"Men\\u2019s Clothing_Black_Chino_Pants__4.jpg\"]', 'Men’s Clothing_Black_Chino_Pants__thumbnail.jpg', 1, '2025-06-27 00:43:50', '2025-06-27 00:43:50'),
(8, 7, 13, 'Linen Button-Up Shirt', 'linen-button-up-shirt', 720.00, 670.00, 40.00, '<p>Linen Button-Up Shirt by CoreWear is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"White\",\"material\",\"Linen\",\"size\",\"XS\",\"fit\",\"Athletic\",\"wash\",\"Machine Washable\"]', 83, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iKZ-UXoYQq8?si=03LdlOjiw_qsqu-g\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Men\\u2019s Clothing_Linen_Button-Up_Shirt__1.jpg\",\"Men\\u2019s Clothing_Linen_Button-Up_Shirt__2.jpg\",\"Men\\u2019s Clothing_Linen_Button-Up_Shirt__3.jpg\"]', 'Men’s Clothing_Linen_Button-Up_Shirt__thumbnail.jpg', 1, '2025-06-27 00:45:58', '2025-06-27 00:45:58'),
(9, 7, 13, 'Slim Fit Denim Jacket', 'slim-fit-denim-jacket', 220.00, 190.00, 70.00, '<p>Slim Fit Denim Jacket by UrbanEdge is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Blue\",\"material\",\"Fleece\",\"size\",\"S\",\"fit\",\"Slim\",\"wash\",\"Machine Washable\"]', 76, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dCgQirKJ4N8?si=SHxVyuuiXLrNR2YF\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Men\\u2019s Clothing_Slim_Fit_Denim_Jacket__1.jpg\",\"Men\\u2019s Clothing_Slim_Fit_Denim_Jacket__2.jpg\",\"Men\\u2019s Clothing_Slim_Fit_Denim_Jacket__3.jpg\",\"Men\\u2019s Clothing_Slim_Fit_Denim_Jacket__4.jpg\"]', 'Men’s Clothing_Slim_Fit_Denim_Jacket__thumbnail.jpg', 1, '2025-06-27 00:54:56', '2025-06-27 00:54:56'),
(10, 7, 13, 'Classic White T-Shirt', 'classic-white-t-shirt-best', 64.00, 59.00, 30.00, '<p>Classic White T-Shirt by UrbanEdge is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"White\",\"material\",\"Fleece\",\"size\",\"One Size\",\"fit\",\"Loose\",\"wash\",\"Machine Washable\"]', 82, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/GMM_Hl1fTQ0?si=GrrE57PK7tNkyK51\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Men\\u2019s Clothing_Classic_White_T-Shirt_13_1.jpg\",\"Men\\u2019s Clothing_Classic_White_T-Shirt__2.jpg\",\"Men\\u2019s Clothing_Classic_White_T-Shirt__3.jpg\",\"Men\\u2019s Clothing_Classic_White_T-Shirt_13_4.jpg\"]', 'Men’s Clothing_Classic_White_T-Shirt_13_thumbnail.jpg', 1, '2025-06-27 00:57:03', '2025-06-27 00:58:52'),
(11, 5, 12, 'Platform Heels', 'platform-heels', 760.00, 700.00, 50.00, '<p>Platform Heels by MetroMode is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Black\",\"material\",\"Linen\",\"size\",\"6\",\"fit\",\"Athletic\",\"wash\",\"Machine Washable\"]', 36, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/LFj1N21ykss?si=hg_EAg1dP9zcf8_t\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Footwear_Platform_Heels__1.png\",\"Footwear_Platform_Heels__2.png\",\"Footwear_Platform_Heels__3.png\"]', 'Footwear_Platform_Heels__thumbnail.png', 1, '2025-06-27 01:06:47', '2025-06-27 01:06:47'),
(12, 5, 12, 'Slide Sandals', 'slide-sandals', 630.00, 550.00, 60.00, '<p>Slide Sandals by UrbanEdge is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Black\",\"material\",\"Denim\",\"size\",\"9\",\"fit\",\"Regular\",\"wash\",\"Machine Washable\"]', 97, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/B3ZRiMBX8IA?si=mhcHRtkeF3LT8cay\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Footwear_Slide_Sandals__1.png\",\"Footwear_Slide_Sandals__2.png\",\"Footwear_Slide_Sandals__3.png\",\"Footwear_Slide_Sandals__4.png\"]', 'Footwear_Slide_Sandals__thumbnail.png', 1, '2025-06-27 01:09:27', '2025-06-27 01:09:27'),
(13, 5, 12, 'Ankle Boots', 'ankle-boots', 330.00, 300.00, 70.00, '<p>Ankle Boots by VibeFit is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Black\",\"material\",\"Fleece\",\"size\",\"XL\",\"fit\",\"Slim\",\"wash\",\"Machine Washable\"]', 28, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/nz8MR3ihsxw?si=80_piEpKG8MmOVHE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Footwear_Ankle_Boots__1.png\",\"Footwear_Ankle_Boots__2.png\",\"Footwear_Ankle_Boots__3.png\"]', 'Footwear_Ankle_Boots__thumbnail.png', 1, '2025-06-27 01:11:24', '2025-06-27 01:11:24'),
(14, 5, 12, 'Classic White Sneakers', 'classic-white-sneakers', 210.00, 120.00, 40.00, '<p>Classic White Sneakers by MetroMode is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"White\",\"material\",\"Mesh & Rubber\",\"size\",\"L\",\"fit\",\"Regular\",\"wash\",\"Machine Washable\"]', 44, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/nBQp7bbaqa8?si=fMKx0DcJ3TAxuBch\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Footwear_Classic_White_Sneakers__1.png\",\"Footwear_Classic_White_Sneakers__2.png\",\"Footwear_Classic_White_Sneakers__3.png\"]', 'Footwear_Classic_White_Sneakers__thumbnail.png', 1, '2025-06-27 01:13:54', '2025-06-27 01:13:54'),
(15, 5, 12, 'AirFlex Running Shoes', 'airflex-running-shoes', 440.00, 360.00, 60.00, '<p>AirFlex Running Shoes by VibeFit is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"White\",\"material\",\"Mesh & Rubber\",\"size\",\"8\",\"fit\",\"Regular\",\"wash\",\"Machine Washable\"]', 36, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/nBQp7bbaqa8\" title=\"Puma Basket Classic LFS Sneaker white (On-Feet) @Stylefile\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Footwear_AirFlex_Running_Shoes__1.png\",\"Footwear_AirFlex_Running_Shoes__2.png\",\"Footwear_AirFlex_Running_Shoes__3.png\"]', 'Footwear_AirFlex_Running_Shoes__thumbnail.png', 1, '2025-06-27 01:15:36', '2025-06-27 01:15:36'),
(16, 4, 11, 'Silk Printed Scarf', 'silk-printed-scarf', 520.00, 440.00, 30.00, '<p>Silk Printed Scarf by VibeFit is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Charcoal\",\"material\",\"Fleece\",\"size\",\"One Size\",\"fit\",\"Athletic\",\"wash\",\"Machine Washable\"]', 22, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/FGZvEVCEC_w?si=Ysk_l2hnykq7L--B\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Accessories_Silk_Printed_Scarf__1.png\",\"Accessories_Silk_Printed_Scarf__2.png\"]', 'Accessories_Silk_Printed_Scarf__thumbnail.png', 1, '2025-06-27 01:20:26', '2025-06-27 01:20:26'),
(17, 4, 11, 'Leather Belt', 'leather-belt', 770.00, 700.00, 70.00, '<p>Leather Belt by StyleNest is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Black\",\"material\",\"Polyester Blend\",\"size\",\"One Size\",\"fit\",\"Athletic\",\"wash\",\"Machine Washable\"]', 84, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/MGdiFpOfOgQ?si=1LEAUxScYeurqlfT\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Accessories_Leather_Belt__1.png\",\"Accessories_Leather_Belt__2.png\",\"Accessories_Leather_Belt__3.png\"]', 'Accessories_Leather_Belt__thumbnail.png', 1, '2025-06-27 01:22:22', '2025-06-27 01:22:22'),
(18, 4, 11, 'Canvas Tote Bag', 'canvas-tote-bag', 690.00, 640.00, 50.00, '<p>Canvas Tote Bag by VibeFit is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Black\",\"material\",\"100% Cotton\",\"size\",\"9\",\"fit\",\"Regular\",\"wash\",\"Machine Washable\"]', 71, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/DDkbM5eah-c?si=iDIzLAp4ymAif0jl\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Accessories_Canvas_Tote_Bag__1.png\",\"Accessories_Canvas_Tote_Bag__2.png\",\"Accessories_Canvas_Tote_Bag__3.png\",\"Accessories_Canvas_Tote_Bag__4.png\"]', 'Accessories_Canvas_Tote_Bag__thumbnail.png', 1, '2025-06-27 01:27:00', '2025-06-27 01:27:00'),
(19, 4, 11, 'Retro Sunglasses', 'retro-sunglasses', 540.00, 460.00, 40.00, '<p>Retro Sunglasses by VibeFit is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Black\",\"material\",\"100% Cotton\",\"size\",\"M\",\"fit\",\"Regular\",\"wash\",\"Machine Washable\"]', 80, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/tz_TjdyTMxE?si=dMtjnWbCfrne8yLG\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Accessories_Retro_Sunglasses__1.png\",\"Accessories_Retro_Sunglasses__2.png\",\"Accessories_Retro_Sunglasses__3.png\"]', 'Accessories_Retro_Sunglasses__thumbnail.png', 1, '2025-06-27 01:32:54', '2025-06-27 01:32:54'),
(20, 4, 11, 'Smart Leather Wallet', 'smart-leather-wallet', 230.00, 190.00, 60.00, '<p>Smart Leather Wallet by MetroMode is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Black\",\"material\",\"Nylon\\/Spandex\",\"size\",\"8\",\"fit\",\"Slim\",\"wash\",\"Machine Washable\"]', 77, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ezD7ZhfSlOY?si=PJs6Enp_51l61-XL\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Accessories_Smart_Leather_Wallet__1.png\",\"Accessories_Smart_Leather_Wallet__2.png\",\"Accessories_Smart_Leather_Wallet__3.png\"]', 'Accessories_Smart_Leather_Wallet__thumbnail.png', 1, '2025-06-27 01:35:01', '2025-06-27 01:35:01'),
(21, 3, 11, 'Sleeveless Gym Hoodie', 'sleeveless-gym-hoodie', 640.00, 550.00, 30.00, '<p>Sleeveless Gym Hoodie by MetroMode is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Gray\",\"material\",\"Mesh & Rubber\",\"size\",\"8\",\"fit\",\"Athletic\",\"wash\",\"Machine Washable\"]', 40, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/2gS22MVMkKc?si=SetpSgb0v0yYQWem\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Activewear_Sleeveless_Gym_Hoodie__1.jpg\",\"Activewear_Sleeveless_Gym_Hoodie__2.jpg\"]', 'Activewear_Sleeveless_Gym_Hoodie__thumbnail.jpg', 1, '2025-06-27 01:37:14', '2025-06-27 01:37:14'),
(22, 3, 11, 'Zip-Up Track Jacket', 'zip-up-track-jacket', 680.00, 600.00, 60.00, '<p>Zip-Up Track Jacket by StyleNest is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Black\",\"material\",\"100% Cotton\",\"size\",\"L\",\"fit\",\"Regular\",\"wash\",\"Machine Washable\"]', 55, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/8icLbrMaUaQ?si=n5srhMgZ4JuMMvS8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Activewear_Zip-Up_Track_Jacket__1.jpg\",\"Activewear_Zip-Up_Track_Jacket__2.jpg\",\"Activewear_Zip-Up_Track_Jacket__3.jpg\",\"Activewear_Zip-Up_Track_Jacket__4.jpg\",\"Activewear_Zip-Up_Track_Jacket__5.jpg\"]', 'Activewear_Zip-Up_Track_Jacket__thumbnail.jpg', 1, '2025-06-27 01:39:13', '2025-06-27 01:39:13'),
(23, 3, 11, 'Sports Bra & Shorts Set', 'sports-bra-&-shorts-set', 230.00, 200.00, 50.00, '<p>Sports Bra &amp; Shorts Set by MetroMode is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Red\",\"material\",\"Mesh & Rubber\",\"size\",\"One Size\",\"fit\",\"Athletic\",\"wash\",\"Machine Washable\"]', 24, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/itaFEJusKik?si=6vzx4ml5HwQTZ-nF\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Activewear_Sports_Bra___Shorts_Set__1.jpg\",\"Activewear_Sports_Bra___Shorts_Set__2.jpg\",\"Activewear_Sports_Bra___Shorts_Set__3.jpg\"]', 'Activewear_Sports_Bra___Shorts_Set__thumbnail.jpg', 1, '2025-06-27 01:41:05', '2025-06-27 01:41:05'),
(24, 3, 11, 'Performance Tee', 'performance-tee', 680.00, 590.00, 60.00, '<p>Performance Tee by StyleNest is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Green\",\"material\",\"Genuine Leather\",\"size\",\"XS\",\"fit\",\"Regular\",\"wash\",\"Machine Washable\"]', 18, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/56xR1C4_uAM?si=Z0hK2bp22Sk7Bhwl\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Activewear_Performance_Tee__1.png\",\"Activewear_Performance_Tee__2.png\",\"Activewear_Performance_Tee__3.png\"]', 'Activewear_Performance_Tee__thumbnail.png', 1, '2025-06-27 01:42:59', '2025-06-27 01:42:59'),
(25, 3, 11, 'Compression Leggings', 'compression-leggings', 330.00, 240.00, 60.00, '<p>Compression Leggings by UrbanEdge is a stylish item crafted for comfort and everyday wear.</p>', '[\"color\",\"Green\",\"material\",\"Linen\",\"size\",\"One Size\",\"fit\",\"Athletic\",\"wash\",\"Machine Washable\"]', 62, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/QZ-c2UujOh8?si=PaWoFC3Ya6Bnl0f-\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '[\"Activewear_Compression_Leggings__1.jpg\",\"Activewear_Compression_Leggings__2.jpg\",\"Activewear_Compression_Leggings__3.jpg\",\"Activewear_Compression_Leggings__4.jpg\"]', 'Activewear_Compression_Leggings__thumbnail.jpg', 1, '2025-06-27 01:44:45', '2025-06-27 01:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `review` text NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`transaction_details`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `product_id`, `transaction_id`, `status`, `amount`, `transaction_details`, `created_at`, `updated_at`) VALUES
(1, 3, 19, 'T2506271324037710302541', 'COMPLETED', 596.00, '{\"success\":true,\"code\":\"PAYMENT_SUCCESS\",\"message\":\"Your payment is successful.\",\"data\":{\"merchantId\":\"PGTESTPAYUAT86\",\"merchantTransactionId\":\"MT7850590068188104\",\"transactionId\":\"T2506271324037710302541\",\"amount\":59600,\"state\":\"COMPLETED\",\"responseCode\":\"SUCCESS\",\"paymentInstrument\":{\"type\":\"CARD\",\"cardType\":\"CREDIT_CARD\",\"bankTransactionId\":null,\"arn\":\"12121214455\",\"authRefId\":\"Dummy-auth12345\",\"bankId\":null,\"brn\":\"B12345\"}}}', '2025-06-27 02:24:53', '2025-06-27 02:24:53'),
(2, 3, 20, 'T2506271325056670302283', 'COMPLETED', 341.00, '{\"success\":true,\"code\":\"PAYMENT_SUCCESS\",\"message\":\"Your payment is successful.\",\"data\":{\"merchantId\":\"PGTESTPAYUAT86\",\"merchantTransactionId\":\"MT7850590068188104\",\"transactionId\":\"T2506271325056670302283\",\"amount\":34100,\"state\":\"COMPLETED\",\"responseCode\":\"SUCCESS\",\"paymentInstrument\":{\"type\":\"CARD\",\"cardType\":\"CREDIT_CARD\",\"bankTransactionId\":null,\"arn\":\"12121214455\",\"authRefId\":\"Dummy-auth12345\",\"bankId\":null,\"brn\":\"B12345\"}}}', '2025-06-27 02:25:47', '2025-06-27 02:25:47'),
(3, 4, 14, 'T2506271331271360302786', 'PENDING', 245.00, '{\"success\":true,\"code\":\"PAYMENT_PENDING\",\"message\":\"Your payment is in pending state.\",\"data\":{\"merchantId\":\"PGTESTPAYUAT86\",\"merchantTransactionId\":\"MT7850590068188104\",\"transactionId\":\"T2506271331271360302786\",\"amount\":24500,\"state\":\"PENDING\",\"responseCode\":null}}', '2025-06-27 02:32:18', '2025-06-27 02:32:18'),
(4, 4, 14, 'T2506271332307770302387', 'COMPLETED', 245.00, '{\"success\":true,\"code\":\"PAYMENT_SUCCESS\",\"message\":\"Your payment is successful.\",\"data\":{\"merchantId\":\"PGTESTPAYUAT86\",\"merchantTransactionId\":\"MT7850590068188104\",\"transactionId\":\"T2506271332307770302387\",\"amount\":24500,\"state\":\"COMPLETED\",\"responseCode\":\"SUCCESS\",\"paymentInstrument\":{\"type\":\"CARD\",\"cardType\":\"CREDIT_CARD\",\"bankTransactionId\":null,\"arn\":\"12121214455\",\"authRefId\":\"Dummy-auth12345\",\"bankId\":null,\"brn\":\"B12345\"}}}', '2025-06-27 02:33:10', '2025-06-27 02:33:10'),
(5, 7, 10, 'T2506271336485160302949', 'COMPLETED', 158.00, '{\"success\":true,\"code\":\"PAYMENT_SUCCESS\",\"message\":\"Your payment is successful.\",\"data\":{\"merchantId\":\"PGTESTPAYUAT86\",\"merchantTransactionId\":\"MT7850590068188104\",\"transactionId\":\"T2506271336485160302949\",\"amount\":15800,\"state\":\"COMPLETED\",\"responseCode\":\"SUCCESS\",\"paymentInstrument\":{\"type\":\"CARD\",\"cardType\":\"CREDIT_CARD\",\"bankTransactionId\":null,\"arn\":\"12121214455\",\"authRefId\":\"Dummy-auth12345\",\"bankId\":null,\"brn\":\"B12345\"}}}', '2025-06-27 02:37:42', '2025-06-27 02:37:42'),
(6, 7, 10, 'T2506271337599860302611', 'PENDING', 158.00, '{\"success\":true,\"code\":\"PAYMENT_PENDING\",\"message\":\"Your payment is in pending state.\",\"data\":{\"merchantId\":\"PGTESTPAYUAT86\",\"merchantTransactionId\":\"MT7850590068188104\",\"transactionId\":\"T2506271337599860302611\",\"amount\":15800,\"state\":\"PENDING\",\"responseCode\":null}}', '2025-06-27 02:38:42', '2025-06-27 02:38:42'),
(7, 7, 8, 'T2506271338598870302493', 'COMPLETED', 807.00, '{\"success\":true,\"code\":\"PAYMENT_SUCCESS\",\"message\":\"Your payment is successful.\",\"data\":{\"merchantId\":\"PGTESTPAYUAT86\",\"merchantTransactionId\":\"MT7850590068188104\",\"transactionId\":\"T2506271338598870302493\",\"amount\":80700,\"state\":\"COMPLETED\",\"responseCode\":\"SUCCESS\",\"paymentInstrument\":{\"type\":\"CARD\",\"cardType\":\"CREDIT_CARD\",\"bankTransactionId\":null,\"arn\":\"12121214455\",\"authRefId\":\"Dummy-auth12345\",\"bankId\":null,\"brn\":\"B12345\"}}}', '2025-06-27 02:39:41', '2025-06-27 02:39:41'),
(8, 3, 24, 'T2506271802011620302399', 'COMPLETED', 747.00, '{\"success\":true,\"code\":\"PAYMENT_SUCCESS\",\"message\":\"Your payment is successful.\",\"data\":{\"merchantId\":\"PGTESTPAYUAT86\",\"merchantTransactionId\":\"MT7850590068188104\",\"transactionId\":\"T2506271802011620302399\",\"amount\":74700,\"state\":\"COMPLETED\",\"responseCode\":\"SUCCESS\",\"paymentInstrument\":{\"type\":\"CARD\",\"cardType\":\"CREDIT_CARD\",\"bankTransactionId\":null,\"arn\":\"12121214455\",\"authRefId\":\"Dummy-auth12345\",\"bankId\":null,\"brn\":\"B12345\"}}}', '2025-06-27 07:02:39', '2025-06-27 07:02:39'),
(9, 3, 15, 'T2506271804353050302829', 'COMPLETED', 515.00, '{\"success\":true,\"code\":\"PAYMENT_SUCCESS\",\"message\":\"Your payment is successful.\",\"data\":{\"merchantId\":\"PGTESTPAYUAT86\",\"merchantTransactionId\":\"MT7850590068188104\",\"transactionId\":\"T2506271804353050302829\",\"amount\":51500,\"state\":\"COMPLETED\",\"responseCode\":\"SUCCESS\",\"paymentInstrument\":{\"type\":\"CARD\",\"cardType\":\"CREDIT_CARD\",\"bankTransactionId\":null,\"arn\":\"12121214455\",\"authRefId\":\"Dummy-auth12345\",\"bankId\":null,\"brn\":\"B12345\"}}}', '2025-06-27 07:05:20', '2025-06-27 07:05:20'),
(10, 3, 12, 'T2506271809012340302083', 'COMPLETED', 707.00, '{\"success\":true,\"code\":\"PAYMENT_SUCCESS\",\"message\":\"Your payment is successful.\",\"data\":{\"merchantId\":\"PGTESTPAYUAT86\",\"merchantTransactionId\":\"MT7850590068188104\",\"transactionId\":\"T2506271809012340302083\",\"amount\":70700,\"state\":\"COMPLETED\",\"responseCode\":\"SUCCESS\",\"paymentInstrument\":{\"type\":\"CARD\",\"cardType\":\"CREDIT_CARD\",\"bankTransactionId\":null,\"arn\":\"12121214455\",\"authRefId\":\"Dummy-auth12345\",\"bankId\":null,\"brn\":\"B12345\"}}}', '2025-06-27 07:09:36', '2025-06-27 07:09:36'),
(11, 3, 12, 'T2506271810411520302566', 'COMPLETED', 707.00, '{\"success\":true,\"code\":\"PAYMENT_SUCCESS\",\"message\":\"Your payment is successful.\",\"data\":{\"merchantId\":\"PGTESTPAYUAT86\",\"merchantTransactionId\":\"MT7850590068188104\",\"transactionId\":\"T2506271810411520302566\",\"amount\":70700,\"state\":\"COMPLETED\",\"responseCode\":\"SUCCESS\",\"paymentInstrument\":{\"type\":\"CARD\",\"cardType\":\"CREDIT_CARD\",\"bankTransactionId\":null,\"arn\":\"12121214455\",\"authRefId\":\"Dummy-auth12345\",\"bankId\":null,\"brn\":\"B12345\"}}}', '2025-06-27 07:11:22', '2025-06-27 07:11:22'),
(12, 3, 13, 'T2506271811469180302119', 'COMPLETED', 464.00, '{\"success\":true,\"code\":\"PAYMENT_SUCCESS\",\"message\":\"Your payment is successful.\",\"data\":{\"merchantId\":\"PGTESTPAYUAT86\",\"merchantTransactionId\":\"MT7850590068188104\",\"transactionId\":\"T2506271811469180302119\",\"amount\":46400,\"state\":\"COMPLETED\",\"responseCode\":\"SUCCESS\",\"paymentInstrument\":{\"type\":\"CARD\",\"cardType\":\"CREDIT_CARD\",\"bankTransactionId\":null,\"arn\":\"12121214455\",\"authRefId\":\"Dummy-auth12345\",\"bankId\":null,\"brn\":\"B12345\"}}}', '2025-06-27 07:12:28', '2025-06-27 07:12:28'),
(13, 3, 8, 'T2506271814229980302952', 'COMPLETED', 807.00, '{\"success\":true,\"code\":\"PAYMENT_SUCCESS\",\"message\":\"Your payment is successful.\",\"data\":{\"merchantId\":\"PGTESTPAYUAT86\",\"merchantTransactionId\":\"MT7850590068188104\",\"transactionId\":\"T2506271814229980302952\",\"amount\":80700,\"state\":\"COMPLETED\",\"responseCode\":\"SUCCESS\",\"paymentInstrument\":{\"type\":\"CARD\",\"cardType\":\"CREDIT_CARD\",\"bankTransactionId\":null,\"arn\":\"12121214455\",\"authRefId\":\"Dummy-auth12345\",\"bankId\":null,\"brn\":\"B12345\"}}}', '2025-06-27 07:14:53', '2025-06-27 07:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `user_role` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `mobile_number`, `user_role`, `is_active`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$12$LmdQa8aaZ5CQjRj6yhVM7O8Lz7nROHUPCn15ZUO96fjwmRkSQH.LS', '98769876', '1', 1, NULL, NULL, '2024-03-10 08:52:33', '2025-06-08 06:29:27'),
(2, 'rohan123@email.com', '$2y$12$wZVqdKhI7wNFWU02JAa3rO5V74E.J37/orpUb7qXYV3Ex0F1UOvV.', '9876543210', '3', 1, NULL, NULL, '2025-06-26 04:32:08', '2025-06-26 04:40:28'),
(3, 'suresh123@email.com', '$2y$12$B509IEtAt/Bo6A6vK.cku.U/hwDhuT9jLlaBweI39d2v3XYo/mTzC', '98765433210', '3', 1, 'QOyDtOLhZ226y5ankija7B7gRlQIARazlmMtqdNoXWpmHYw4dExap9MM24wY', NULL, '2025-06-26 04:32:29', '2025-06-26 04:44:00'),
(4, 'priya123@email.com', '$2y$12$Ek2cG4AO9JYv69FMpcMs/epMVv7Q1.qzx9rCEaI3sFTGvD09XBsaa', '9876543210', '3', 1, NULL, NULL, '2025-06-26 04:33:09', '2025-06-26 04:45:22'),
(5, 'ruhani123@email.com', '$2y$12$lk6EL9rZ.mTRnfwgAPVapuRdVucWD.GCTE9EL94RUcWOw9owFa3S6', '9876543210', '3', 1, NULL, NULL, '2025-06-26 04:33:53', '2025-06-26 04:47:46'),
(6, 'komal123@email.com', '$2y$12$7c9C4Ghd4fwBHKsptyRw0uOM5Y0qZuXMe2JJfyxPwsdhZikDufD32', '9876543210', '3', 1, NULL, NULL, '2025-06-26 04:34:13', '2025-06-26 04:48:51'),
(7, 'raj123@email.com', '$2y$12$r2Z77CoCqwG09Kb6TE1USuxtwI3iwYSFttfm94Y/PZ271WgReLodu', '9874543210', '3', 1, NULL, NULL, '2025-06-26 04:35:19', '2025-06-26 04:53:03'),
(8, 'vikram123@email.com', '$2y$12$Kpdbfl4Kmpw8IXjjCy8pUuTxT3QqDvHKuiqpDE9WwjQS7Xi.uiWO2', '9123456789', '3', 1, NULL, NULL, '2025-06-26 04:36:15', '2025-06-26 04:57:39'),
(9, 'anita123@email.com', '$2y$12$RMpxjvhTCUh9aILddRHTvO1G2sIfS3ik.0XM7KTToAP4oQQnak5NC', '9787654321', '2', 1, NULL, NULL, '2025-06-26 04:36:43', '2025-06-26 05:07:55'),
(10, 'farhan123@email.com', '$2y$12$gK7Gx2/0QtBR4S/3/Rf8t.tVBPy5NhJGtJxrXBThOoU0cQyyPggrC', '9090909090', '3', 1, NULL, NULL, '2025-06-26 04:37:32', '2025-06-26 05:09:41'),
(11, 'kavita123@email.com', '$2y$12$8QYXXWcqnt4yh1E7gVRSQOy1FPlA0l5o4zf85Mq6mVuBBBJE3Azza', '9810011223', '2', 1, NULL, NULL, '2025-06-26 04:38:19', '2025-06-26 05:13:48'),
(12, 'manoj123@email.com', '$2y$12$xZ8d1dneavz9Q0rebqx1o.KUoxl2sh8r.WAss4Tlw/YI51/8uD9rG', '9898989898', '2', 1, NULL, NULL, '2025-06-26 04:38:45', '2025-06-26 05:15:15'),
(13, 'rohit123@email.com', '$2y$12$A111krirV/bCc0MRqbKFX.ECWhqSr.tj443eEa9pR9hy0L3HIL1Vi', '9009090909', '2', 1, NULL, NULL, '2025-06-26 04:39:19', '2025-06-26 05:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `categories` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`categories`)),
  `gstin` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) NOT NULL,
  `brand_logo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `user_id`, `name`, `brand_name`, `categories`, `gstin`, `city`, `state`, `country`, `pincode`, `landmark`, `payment_id`, `brand_logo`, `created_at`, `updated_at`) VALUES
(1, 9, 'Anita Reddy', 'Anita Reddy', '[6,1]', '36AAACA1234F1Z3', 'Hyderabad', 'Telangana', 'India', '500001', 'Beside Charminar', 'pay\\_04Anita6521', 'anita123_image.jpg', '2025-06-26 04:36:43', '2025-06-26 05:08:07'),
(2, 11, 'Kavita Deshmukh', 'VibeFit', '[4,2,3,5]', '27AACCD2233J1Z2', 'Pune', 'Maharashtra', 'India', '411001', 'Near FC Road', 'pay\\_06Kavita8484', 'kavita123_image.jpg', '2025-06-26 04:38:19', '2025-07-11 03:52:27'),
(3, 12, 'Manoj Bhatnagar', 'StyleNest', '[5]', '06AABBC3344K1Z6', 'Chandigarh', 'Chandigarh', 'India', '160017', 'Sector 22 Market', 'pay\\_07Manoj2299', 'manoj123_image.jpg', '2025-06-26 04:38:45', '2025-06-27 01:03:38'),
(4, 13, 'Rohit Verma', 'UrbanEdge', '[7,1,2]', '24AAACT5566N1Z9', 'Ahmedabad', 'Gujarat', 'India', '380001', 'Opp. Law Garden', 'pay\\_09Rohit6677', 'rohit123_image.jpg', '2025-06-26 04:39:19', '2025-06-27 00:10:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`) USING HASH;

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_vendor_id_foreign` (`vendor_id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`) USING HASH,
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_slug_index` (`slug`(768));

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendors_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
