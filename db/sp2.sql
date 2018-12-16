-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2018 at 08:11 PM
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
-- Database: `sp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 'Apple', NULL, NULL),
(2, 'Asus', NULL, NULL),
(3, 'Dell', NULL, NULL),
(4, 'HP', NULL, NULL),
(5, 'Nova', NULL, NULL),
(6, 'Nikkon', NULL, NULL),
(7, 'Oppo', NULL, NULL),
(8, 'Huwaei', NULL, NULL),
(9, 'Xiaomi', NULL, NULL),
(10, 'TPLink', NULL, NULL),
(11, 'Sony', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(10) UNSIGNED NOT NULL,
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `total_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Computer and laptop', NULL, NULL),
(2, 'smartphones & mobile', NULL, NULL),
(3, 'electronic accessories', NULL, NULL),
(4, 'gaming console', NULL, NULL),
(5, 'Network components', NULL, NULL),
(6, 'consume electronics', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `id`, `name`, `email`, `phone_number`, `address`, `password`, `approval`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 3, 'susmoy', 'susmoy58@gmail.com', 1837222121, 'House Building, Uttara, Dhaka', '$2y$10$yCZuFKyWi/1G3lh12YICN.auwekTuqfTuWmF3q6CduJNUtzkM050u', 'online', 'user', NULL, NULL, NULL),
(3, 4, 'zahid-rahman', 'rahmanzahid94@gmail.com', 1795715448, 'malibag,dhaka', '$2y$10$SvoeDSSIFPKUSBZyw0qu7uQc37srhxPSPOpFQKxbt4LZn8AAFIFoq', 'online', 'user', NULL, NULL, NULL),
(4, 10, 'ratul', 'ratul@gmail.com', 1837222121, 'nikunja,dhaka', '$2y$10$bzINvIcRGCYO3pVF8rKZAOiwUYprJPt9aMR1tqZMEJxM2Q5IJQK3u', 'online', 'user', NULL, NULL, NULL),
(5, 11, 'arko-009', 'kh.hasan038@gmail.com', 1837222121, 'old dhaka', '$2y$10$GNqmZPzOwE8Jm0ufoIkC9e3o3QiICeeF33lny0L.WBK6OSxpLzuyK', 'online', 'user', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `discount_product_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discount_id`, `product_id`, `discount`, `discount_product_price`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0.00, NULL, NULL),
(2, 2, 0, 0.00, NULL, NULL),
(3, 3, 0, 0.00, NULL, NULL),
(4, 4, 0, 0.00, NULL, NULL),
(5, 5, 0, 0.00, NULL, NULL),
(6, 6, 0, 0.00, NULL, NULL),
(7, 7, 0, 0.00, NULL, NULL),
(8, 8, 0, 0.00, NULL, NULL),
(9, 9, 0, 0.00, NULL, NULL),
(10, 10, 0, 0.00, NULL, NULL),
(11, 11, 0, 0.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `email`, `feedback_message`, `created_at`, `updated_at`) VALUES
(1, 'susmoy58@gmail.com', 'hi,\r\ni am a new user in that e commerce site can you suggest me about the order delivery', NULL, NULL),
(2, 'hasanarko388@yahoo.com', 'test', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_16_182547_create_products_table', 1),
(4, '2018_10_16_183117_create_categories_table', 1),
(5, '2018_10_16_183131_create_offers_table', 1),
(6, '2018_10_16_183410_create_brands_table', 1),
(7, '2018_10_17_114505_create_product_images_table', 1),
(8, '2018_10_21_135019_create_orders_table', 1),
(9, '2018_10_21_135716_create_carts_table', 1),
(10, '2018_10_23_190001_create_order_infos_table', 1),
(11, '2018_10_29_121156_create_vendors_table', 1),
(12, '2018_10_29_121706_create_customers_table', 1),
(13, '2018_11_30_095040_create_feedback_table', 1),
(14, '2018_12_01_210609_create_mostvieweds_table', 1),
(15, '2018_12_12_111827_create_ratings_table', 1),
(16, '2018_12_12_111922_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mostvieweds`
--

CREATE TABLE `mostvieweds` (
  `most_viewed_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mostvieweds`
--

INSERT INTO `mostvieweds` (`most_viewed_id`, `product_id`, `counter`, `created_at`, `updated_at`) VALUES
(1, 1, 10, NULL, NULL),
(2, 2, 8, NULL, NULL),
(3, 4, 0, NULL, NULL),
(4, 3, 3, NULL, NULL),
(5, 6, 1, NULL, NULL),
(6, 9, 6, NULL, NULL),
(7, 8, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `token_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `total_price` double(10,2) NOT NULL DEFAULT '0.00',
  `recipient_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `token_number`, `id`, `total_price`, `recipient_address`, `phone_no`, `status`, `created_at`, `updated_at`) VALUES
(1, '083d2', 4, 240000.00, 'uttara,dhaka', '01795715448', 'delivered', '2018-12-12 21:24:42', '2018-12-12 21:24:42'),
(2, '8ff08', 3, 50000.00, 'House Building, Uttara, Dhaka', '01837222121', 'claimed', '2018-12-13 01:17:46', '2018-12-13 01:17:46'),
(3, '00ab0', 4, 290000.00, 'malibag,dhaka', '01795715448', 'delivered', '2018-12-13 01:58:10', '2018-12-13 01:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_infos`
--

CREATE TABLE `order_infos` (
  `order_info_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `order_token_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordered_product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_infos`
--

INSERT INTO `order_infos` (`order_info_id`, `product_id`, `id`, `order_token_number`, `ordered_product_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '083d2', 2, NULL, NULL),
(2, 4, 3, '8ff08', 1, NULL, NULL),
(3, 4, 4, '00ab0', 1, NULL, NULL),
(4, 1, 4, '00ab0', 2, NULL, NULL);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_visiblity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `product_avg_rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_details`, `product_thumbnail`, `product_quantity`, `product_visiblity`, `product_price`, `discount`, `brand_id`, `category_id`, `id`, `product_avg_rating`, `created_at`, `updated_at`) VALUES
(1, 'Iphone X', 'Technology:	GSM / HSPA / LTE\r\nAnnounced:	2017, September\r\nStatus:	Available. Released 2017, October\r\nBODY:	Dimensions	143.6 x 70.9 x 7.7 mm (5.65 x 2.79 x 0.30 in)\r\nWeight:	174 g (6.14 oz)\r\nBuild:	Front/back glass, stainless steel frame\r\nSIM:	Nano-SIM\r\n 	- IP67 dust/water resistant (up to 1m for 30 mins)\r\n	- Apple Pay (Visa, MasterCard, AMEX certified)\r\nDISPLAY	Type:	Super AMOLED capacitive touchscreen, 16M colors\r\nSize:	5.8 inches, 84.4 cm2 (~82.9% screen-to-body ratio)\r\nResolution:	1125 x 2436 pixels, 19.5:9 ratio (~458 ppi density)\r\nMultitouch:	Yes\r\nProtection:	Scratch-resistant glass, oleophobic coating\r\n 		- Dolby Vision/HDR10 compliant\r\n		- Wide color gamut display\r\n		- 3D Touch display\r\n		- True-tone display\r\n		- 120 Hz touch-sensing\r\nPLATFORM:	OS	iOS 11.1.1, upgradable to iOS 12.1\r\nChipset:	Apple A11 Bionic (10 nm)\r\nCPU:	Hexa-core 2.39 GHz (2x Monsoon + 4x Mistral)\r\nGPU:	Apple GPU (three-core graphics)\r\nCard slot:	No\r\nInternal:	64/256 GB, 3 GB RAM\r\nMAIN CAMERA:	Dual	12 MP, f/1.8, 28mm (wide), 1/3\", 1.22µm, OIS, PDAF \r\n12 MP, f/2.4, 52mm (telephoto), 1/3.4\", 1.0µm, OIS, PDAF, 2x optical zoom\r\nFeatures:	Quad-LED dual-tone flash, HDR (photo/panorama), panorama, HDR\r\nVideo:	2160p@24/30/60fps, 1080p@30/60/120/240fps\r\nSELFIE CAMERA:	Single	7 MP, f/2.2, 32mm (standard)\r\nFeatures:	HDR\r\nVideo:	1080p@30fps\r\nSOUND:	Alert types	Vibration, proprietary ringtones\r\nLoudspeaker:	Yes, with stereo speakers\r\n3.5mm jack:	No\r\n 	- Active noise cancellation with dedicated mic\r\nWLAN:	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot\r\nBluetooth:	5.0, A2DP, LE\r\nGPS:	Yes, with A-GPS, GLONASS, GALILEO, QZSS\r\nNFC:	Yes\r\nRadio:	No\r\nUSB:	2.0, proprietary reversible connector', '/storage/thumbnail_iphonex1.jpg', 5, 'online', 120000.00, 0, 1, 2, 2, 2, NULL, NULL),
(2, 'phone 6', 'Technology	\r\nGSM / CDMA / HSPA / EVDO / LTE\r\nLAUNCH	Announced	2014, September\r\nStatus	Available. Released 2014, September\r\nBODY	Dimensions	138.1 x 67 x 6.9 mm (5.44 x 2.64 x 0.27 in)\r\nWeight	129 g (4.55 oz)\r\nBuild	Front glass, aluminum body\r\nSIM	Nano-SIM\r\n 	- Apple Pay (Visa, MasterCard, AMEX certified)\r\nDISPLAY	Type	LED-backlit IPS LCD, capacitive touchscreen, 16M colors\r\nSize	4.7 inches, 60.9 cm2 (~65.8% screen-to-body ratio)\r\nResolution	750 x 1334 pixels, 16:9 ratio (~326 ppi density)\r\nMultitouch	Yes\r\nProtection:	Ion-strengthened glass, oleophobic coating\r\nPLATFORM	\r\nOS:	iOS 8, upgradable to iOS 12.1\r\nChipset:	Apple A8 (20 nm)\r\nCPU:	Dual-core 1.4 GHz Typhoon (ARM v8-based)\r\nGPU:	PowerVR GX6450 (quad-core graphics)\r\nMEMORY\r\nCard slot:	No\r\nInternal:	16/32/64/128 GB, 1 GB RAM DDR3\r\nMAIN CAMERA:	Single	8 MP, f/2.2, 29mm (standard), 1/3\", 1.5µm, PDAF\r\nFeatures: Dual-LED dual-tone flash, HDR\r\nVideo:	1080p@60fps, 720p@240fps\r\nSELFIE CAMERA:	Single	1.2 MP, f/2.2, 31mm (standard)\r\nFeatures:	face detection, HDR, FaceTime over Wi-Fi or Cellular\r\nVideo:	720p@30fps\r\nSOUND:	Alert types	Vibration, proprietary ringtones\r\nLoudspeaker:	Yes\r\n3.5mm jack:	Yes\r\n 	- 16-bit/44.1kHz audio\r\n	- Active noise cancellation with dedicated mic\r\nWLAN:	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot\r\nBluetooth:	4.0, A2DP, LE\r\nGPS:	Yes, with A-GPS, GLONASS\r\nNFC:	Yes (Apple Pay only)\r\nRadio:	No\r\nUSB:	2.0, proprietary reversible connector\r\nFEATURES:	Sensors	Fingerprint (front-mounted), accelerometer, gyro, proximity, compass, barometer\r\nMessaging:	iMessage, SMS(threaded view), MMS, Email, Push Email\r\n\r\nBATTERY:	Non-removable Li-Po 1810 mAh battery (6.9 Wh)\r\nStand-by:	Up to 250 h (3G)\r\nTalk time:	Up to 14 h (3G)\r\nMusic play:	Up to 50 h', '/storage/thumbnail_6.jpg', 7, 'online', 85000.00, 0, 1, 2, 2, 4, NULL, NULL),
(3, 'Iphone 7', 'Technology:	GSM / CDMA / HSPA / EVDO / LTE\r\nLAUNCH	Announced:	2016, September\r\nBODY	Dimensions:	138.3 x 67.1 x 7.1 mm (5.44 x 2.64 x 0.28 in)\r\nWeight:	138 g (4.87 oz)\r\nBuild:	Front glass, aluminum body\r\nSIM:	Nano-SIM\r\n 	- IP67 dust/water resistant (up to 1m for 30 mins)\r\n	- Apple Pay (Visa, MasterCard, AMEX certified)\r\nDISPLAY	Type:	LED-backlit IPS LCD, capacitive touchscreen, 16M colors\r\nSize:	4.7 inches, 60.9 cm2 (~65.6% screen-to-body ratio)\r\nResolution:	750 x 1334 pixels, 16:9 ratio (~326 ppi density)\r\nMultitouch:	Yes\r\nProtection:	Ion-strengthened glass, oleophobic coating\r\n 		- Wide color gamut display\r\n		- 3D Touch display & home button\r\nOS:	iOS 10.0.1, upgradable to iOS 12.1\r\nChipset:	Apple A10 Fusion (16 nm)\r\nCPU:	Quad-core 2.34 GHz (2x Hurricane + 2x Zephyr)\r\nGPU:	PowerVR Series7XT Plus (six-core graphics)\r\nMEMORY\r\nCard slot:	No\r\nInternal:	32/128/256 GB, 2 GB RAM\r\nMAIN CAMERA:	Single	12 MP, f/1.8, 28mm (wide), 1/3\", OIS, PDAF\r\nFeatures:	Quad-LED dual-tone flash, HDR\r\nVideo:	2160p@30fps, 1080p@30/60/120fps, 720p@240fps\r\nSELFIE CAMERA:	Single	7 MP, f/2.2, 32mm (standard)\r\nFeatures:	Face detection, HDR, panorama\r\nVideo:	1080p@30fps\r\nSOUND\r\nAlert types:	Vibration, proprietary ringtones\r\nLoudspeaker:	Yes, with stereo speakers\r\n3.5mm jack:	No\r\nWLAN:	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot\r\nBluetooth:	4.2, A2DP, LE\r\nGPS:	Yes, with A-GPS, GLONASS, GALILEO, QZSS\r\nNFC:	Yes\r\nRadio:	No\r\nUSB:	2.0, proprietary reversible connector', '/storage/thumbnail_7.jpg', 7, 'online', 95000.00, 0, 1, 2, 2, 3, NULL, NULL),
(4, 'HP 14-bs594tu Pentium', 'Processor:	Intel® Pentium® N3710 (1.6 GHz base frequency, up to 2.56 GHz burst frequency, 2 MB cache, 4 cores)\r\nDisplay:	14\" diagonal HD SVA BrightView WLED-backlit (1366 x 768)\r\nMemory:	4 GB DDR3L-1600 SDRAM (1 x 4 GB)\r\nStorage:	500 GB 5400 rpm SATA\r\nGraphics:	Intel® HD Graphics 405\r\nOperating System:	Win 10 Genuine\r\nBattery:	4-cell, 41 Wh Li-ion\r\nAdapter:	45 W AC power adapter\r\nAudio:	Dual speakers\r\nKeyboard:	Full-size island-style keyboard\r\nOptical Drive:	DVD-Writer\r\nWebCam:	HP TrueVision HD Camera with integrated digital microphone\r\nCard Reader:	1 multi-format SD media card reader\r\nLAN:	Integrated 10/100/1000 GbE \r\nWi-Fi:	Intel® 802.11a/b/g/n/ac (1x1)\r\nBluetooth:	4.2 Combo\r\nUSB (s):	1 USB 2.0 ;2 USB 3.1 Gen 1 (Data transfer only)\r\nHDMI:	1 HDM\r\nVGA:	1 VGA\r\nAudio Jack Combo:	1 headphone/microphone combo', '/storage/hp_product.jpg', 3, 'online', 50000.00, 0, 4, 1, 2, 0, NULL, NULL),
(5, 'Nikon dd5500', 'Brand Name:Nikon\r\nType:DSLR\r\nScreen Size:> 3\"\r\nMemory Card Type:SD Card\r\nBattery Type:Rechargeable Battery Pack\r\nVideo Capture:Yes\r\nColor:Black\r\nMegaPixel:> 20.0MP\r\nImage Stabilization:Yes\r\nOptical Zoom:> 7x', '/storage/thum_DSLR.jpeg', 12, 'online', 67000.00, 0, 6, 3, 2, 0, NULL, NULL),
(6, 'Oppo F7', 'Form factor:	Touchscreen\r\nDimensions (mm):	156.00 x 75.30 x 7.80\r\nWeight (g):	158.00\r\nBattery capacity (mAh):	3400\r\nRemovable battery:	No\r\nColours:	Diamond Black, Moonlight Silver, Solar Red,\r\nSAR value:	1.27\r\nDISPLAY\r\nScreen size (inches):	6.23\r\nTouchscreen:	Yes\r\nResolution:	1080x2280 pixels\r\nProtection type:	Gorilla Glass\r\nAspect ratio:	19:9\r\nPixels per inch (PPI):	405\r\nHARDWARE\r\nProcessor:	octa-core (4x2GHz + 4x2GHz)\r\nProcessor: make	MediaTek Helio P60\r\nRAM:	4GB\r\nInternal storage:	64GB\r\nExpandable storage:	Yes\r\nExpandable storage type:	microSD\r\nExpandable storage up to (GB):	256\r\nCAMERA\r\nRear camera:	16-megapixel (f/1.8)\r\nRear autofocus:	Phase detection autofocus\r\nRear flash:	LED\r\nFront camera:	25-megapixel (f/2.0)\r\nFront flash:	No\r\nOperating system:	Android 8.1\r\nSkin:	ColorOS 5.0\r\nCONNECTIVITY\r\nWi-Fi:	Yes\r\nWi-Fi standards supported:	802.11 b/g/n/ac\r\nGPS:	Yes\r\nBluetooth:	Yes, v 4.20\r\nNFC:	No\r\nInfrared:	No\r\nUSB OTG	Yes:\r\nHeadphones:	3.5mm\r\nFM:	Yes\r\nNumber of SIMs:	2\r\nSIM 1	\r\nSIM Type:	Nano-SIM\r\nGSM/CDMA:	GSM\r\n3G:	Yes\r\n4G/ LTE:	Yes\r\nSupports 4G (Band 40):	Yes\r\nSIM 2	\r\nSIM Type:	Nano-SIM\r\nGSM/CDMA:	GSM\r\n3G:	Yes\r\n4G/ LTE	:Yes\r\nSupports 4G(Band 40):	Yes', '/storage/thum_f7.jpg', 2, 'online', 25000.00, 0, 7, 2, 2, 0, NULL, NULL),
(7, 'TpLink TL WR720N', 'ROM+RAM:16MB+32MB\r\nChipset:Qualcomm AR9341\r\nMini-PCIe:Comply to mini-PCIe interface standard CEM1.2,can be accessed in a variety of LTE module or Wimax-LTE dual-mode module\r\nEthernet Port:one 10/100Mbps WAN port, one 10/100Mbps LAN port, two RJ45 port\r\nVoice POTS:One FXS RJ11 port\r\nUSIM Slot:Support 3.3V USIM\r\nPower Input: universal range 110-240V AC; Output: 12V/1A DC\r\nPower Switch:Mini rocker switch\r\nReset/Reboot:YES\r\nVPN:IP Sec, PPTP Sec, L2TP Sec.\r\nWIFI:Support 802.11b/g/n with 2x2 MIMO antenna inside ,300Mbps, 2.4GHz\r\nWireless Security:WEP, WPA2,WPA-Personal\r\nLTE Antenna:1T2R, support high gain antenna built-in or outside\r\nDMZ:Support\r\nLED Indicator:Power, Mode, Internet, WiFi\r\nWorking Temperature:-10?~45?\r\nDimensions:184x166x42 m\r\nDescription:Support TDD-LTE, FDD-LTE,UMTS,GSM, support voice, data and internet by internal LTE/UMTS/GSM module with Mini PCIE interface\r\nPlatform:ROM+RAM: 16+32MB\r\nChipset: Qualcomm MDM9x15/MDM9x25\r\nSpecification:Refer to LM111A/LM111C/LM112MD/LM113MD/LM121A/LM122M\r\nAT Instruction:Support standard AT instruction set', '/storage/thum_tp.jpg', 13, 'online', 1200.00, 0, 10, 5, 2, 0, NULL, NULL),
(8, 'Xiaomi Mi A2', 'Technology:	GSM / CDMA / HSPA / LTE\r\nLAUNCH	Announced:	2018, July\r\nBODY:	Dimensions	158.7 x 75.4 x 7.3 mm (6.25 x 2.97 x 0.29 in)\r\nWeight:	166 g (5.86 oz)\r\nBuild:	Front glass, aluminum body\r\nSIM:	Dual SIM (Nano-SIM, dual stand-by)\r\nDISPLAY	Type:	LTPS IPS LCD capacitive touchscreen, 16M colors\r\nSize:	5.99 inches, 92.6 cm2 (~77.4% screen-to-body ratio)\r\nResolution:	1080 x 2160 pixels, 18:9 ratio (~403 ppi density)\r\nMultitouch:	Yes\r\nOS:	Android 8.1 (Oreo); Android One\r\nChipset:	Qualcomm SDM660 Snapdragon 660 (14 nm)\r\nCPU:	Octa-core (4x2.2 GHz Kryo 260 & 4x1.8 GHz Kryo 260)\r\nGPU:	Adreno 512\r\nCard slot:	No\r\nInternal:	128 GB, 6 GB RAM or 32/64 GB, 4 GB RAM\r\nMAIN CAMERA:	Dual	12 MP, f/1.8, 1/2.9\", 1.25µm\r\n20 MP, f/1.8, 1/2.8\", 1.0µm, PDAF\r\nFeatures:	Dual-LED flash, HDR, panorama\r\nVideo:	2160p@30fps, 1080p@30fps (gyro-EIS), 720p@120fps\r\nSELFIE CAMERA:	Single	20 MP, f/2.2, 1/2.8\", 1.0µm\r\nFeatures:	LED flash, Auto-HDR\r\nVideo:	1080p@30fps\r\nAlert types:	Vibration; MP3, WAV ringtones\r\nLoudspeaker:	Yes\r\n3.5mm jack:	No\r\nWLAN:	Wi-Fi 802.11 a/b/g/n/ac, dual-band, WiFi Direct, hotspot\r\nBluetooth:	5.0, A2DP, LE\r\nGPS:	Yes, with A-GPS, GLONASS, BDS\r\nInfrared port:	Yes\r\nRadio:	No\r\nUSB:	2.0, Type-C 1.0 reversible connector\r\nSensors:	Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass', '/storage/thum_a2.jpg', 11, 'online', 16000.00, 0, 9, 2, 2, 0, NULL, NULL),
(9, 'Dell 22 inch S2218H IPS Monitor', 'Display Type			 LED-backlit LCD monitor / TFT active matrix\r\nViewable Size			 21.5\"\r\nPanel Type	 	  	 IPS\r\nBuilt in 			 Speakers\r\nPower Consumption (On mode)	 22 W\r\nAspect Ratio Widescreen -	 16:9\r\nNative Resolution		 Full HD 1920 x 1080 @ 60HZ\r\nPixel Pitch			 0.248 mm\r\nBrightness 			 250 cd/m²\r\nContrast Ratio 			 1000:1 / 8000000:1 (dynamic)\r\nResponse Time			 6 ms (gray-to-gray)\r\nColor Support 			 16.7 million colors\r\nInput Connectors 		 HDMI, VGA\r\nBacklight Technology 		 LED backlight', '/storage/thumbs_dell.jpg', 0, 'online', 10000.00, 0, 3, 1, 2, 0, NULL, NULL),
(10, 'Xiaomi Mi Notebook Pro', 'Brand Name:xiaomi\r\nPort:3.5 mm Audio Jack,HDMI,1*USB3.1 Type-C,3.5 mm Mic Jack,3*USB3.0,Card Reader\r\nDimensions (WxHxD):364.0mm x 265.2mm x 20.9mm\r\nHard Drive Type:SSD+HDD\r\nVideo Memory Type:GDDR5\r\nProcessor Core:Quad Core\r\nOperating System:Windows 10\r\nDisplay Ratio:16:9\r\nType:Laptop\r\nGraphics Card Type:Dedicated Card\r\nAverage Battery Life(in hours):5 Hours Video Playing\r\nFeature:Bluetooth,Backlit keyboard,Camera\r\nGraphics Card Model:GTX1060RAM:8GB\r\nGraphics Card Brand:NvidiaThickness:21 - 25mm', '/storage/thum_gaming.jpg', 6, 'online', 70000.00, 0, 9, 1, 2, 0, NULL, NULL),
(11, 'Sony Bravia R302D', 'Sony bravia R302D 32 inch LED television\r\n1366 x 768 TV screen resolution, \r\nintelligent picture plus, \r\nmotionflow XR 100 Hz,\r\ndigital noise reduction,\r\nX protection pro, l\r\nLive color, \r\nMHL enabled, \r\nadvanced contrast enhancer,\r\nMPEG noise reduction, FM radio, bass booster, bravia sync, 2 HDMI, 1 USB, AV, audio out port, USB playback.\r\n05 Years Service Warranty', '/storage/thum_bravia.jpg', 6, 'offline', 42000.00, 0, 11, 6, 2, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `pro_img_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`pro_img_id`, `product_id`, `v_id`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '/storage/item_XL_22153389_29502098.jpg', NULL, NULL),
(2, 1, 2, '/storage/Apple-iPhone-X-1.jpg', NULL, NULL),
(3, 1, 2, '/storage/iphonex-front-back-glass_new2-1024x768.jpg', NULL, NULL),
(4, 1, 2, '/storage/thumbnail_iphonex1.jpg', NULL, NULL),
(5, 2, 2, '/storage/41jUosGQiDL.jpg', NULL, NULL),
(6, 2, 2, '/storage/item_XL_22153389_29502098.jpg', NULL, NULL),
(7, 2, 2, '/storage/original-0746b2ce05.jpg', NULL, NULL),
(8, 2, 2, '/storage/thumbnail_6.jpg', NULL, NULL),
(9, 3, 2, '/storage/apple-iphone-7-gallery-img-3.jpg', NULL, NULL),
(10, 3, 2, '/storage/IPH-7P-128GB-RED.jpg', NULL, NULL),
(11, 3, 2, '/storage/iphone7_black.png', NULL, NULL),
(12, 3, 2, '/storage/thumbnail_7.jpg', NULL, NULL),
(13, 4, 2, '/storage/27500_3_.jpeg', NULL, NULL),
(14, 4, 2, '/storage/bw077au-500x500.png', NULL, NULL),
(15, 4, 2, '/storage/giant_73108.jpg', NULL, NULL),
(16, 4, 2, '/storage/hp_product.jpg', NULL, NULL),
(17, 5, 2, '/storage/44753be5-5899-4b94-b5dc-4af9fad4e056_1.36ad26cd105e388137c4d7c7ab0b313a - Copy.jpeg', NULL, NULL),
(18, 5, 2, '/storage/Nikon-D600-DSLR-camera-wholesale-dropship.jpg', NULL, NULL),
(19, 5, 2, '/storage/P14577899042509382b.jpg', NULL, NULL),
(20, 5, 2, '/storage/thum_DSLR.jpeg', NULL, NULL),
(21, 6, 2, '/storage/f7 black.jpg', NULL, NULL),
(22, 6, 2, '/storage/OPPO_R15__L_1.jpg', NULL, NULL),
(23, 6, 2, '/storage/oppo-f7-red-2.jpg', NULL, NULL),
(24, 6, 2, '/storage/thum_f7.jpg', NULL, NULL),
(25, 7, 2, '/storage/tp-link-tl-wr720n-1-500x500.jpg', NULL, NULL),
(26, 7, 2, '/storage/tp-link-tl-wr720n-3-500x500.jpg', NULL, NULL),
(27, 7, 2, '/storage/tp-link-tl-wr720n-4-500x500.jpg', NULL, NULL),
(28, 7, 2, '/storage/thum_tp.jpg', NULL, NULL),
(29, 8, 2, '/storage/cmobxim00219_a copy.jpg', NULL, NULL),
(30, 8, 2, '/storage/cmobxim00219_a.jpg', NULL, NULL),
(31, 8, 2, '/storage/a2.jpg', NULL, NULL),
(32, 8, 2, '/storage/thum_a2.jpg', NULL, NULL),
(33, 9, 2, '/storage/s2218h-1_1.jpg', NULL, NULL),
(34, 9, 2, '/storage/115ce792c454ab3a294fac.jpg', NULL, NULL),
(35, 9, 2, '/storage/thumbs_dell.jpg', NULL, NULL),
(36, 9, 2, '/storage/dell-e1916hv-18-5-led-monitor-1-x-vga-3-years-warranty-eitstore-1706-12-eitstore@2.jpg', NULL, NULL),
(37, 10, 2, '/storage/thum_a2.jpg', NULL, NULL),
(38, 10, 2, '/storage/cmobxim00219_a copy.jpg', NULL, NULL),
(39, 10, 2, '/storage/cmobxim00219_a.jpg', NULL, NULL),
(40, 10, 2, '/storage/a2.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(10) UNSIGNED NOT NULL,
  `rating_number` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `rating_number`, `product_id`, `id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 3, NULL, NULL),
(2, 4, 2, 3, NULL, NULL),
(3, 1, 1, 3, NULL, NULL),
(4, 2, 1, 3, NULL, NULL),
(5, 4, 2, 3, NULL, NULL),
(6, 3, 2, 3, NULL, NULL),
(7, 4, 3, 4, NULL, NULL),
(8, 3, 3, 4, NULL, NULL),
(9, 1, 3, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(10) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `rating_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `review`, `rating_id`, `product_id`, `id`, `created_at`, `updated_at`) VALUES
(1, 'not bad', 1, 1, 3, NULL, NULL),
(2, 'good', 2, 2, 3, NULL, NULL),
(3, NULL, 3, 1, 3, NULL, NULL),
(4, NULL, 4, 1, 3, NULL, NULL),
(5, NULL, 5, 2, 3, NULL, NULL),
(6, NULL, 6, 2, 3, NULL, NULL),
(7, 'nice one and good product', 7, 3, 4, NULL, NULL),
(8, NULL, 8, 3, 4, NULL, NULL),
(9, NULL, 9, 3, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `address`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'eleckart', 'eleckart2018@gmail.com', '01795715448', 'Dhaka', '$2y$10$p8NTY5dZFm59LMcR9q4MluXRYh.f1j1Rpe783hSmkEfR3FQ7S9Xhe', 'admin', 'r5I9wHO2v4N2clTaHp8evo1U5vOK7DzCEOTjo3GookCLfpCmLjcGQn7hbceZ', '2018-12-12 18:19:20', '2018-12-12 18:19:20'),
(2, 'abc electronics', 'abc@gmail.com', '01837222121', 'Uttara, Dhaka', '$2y$10$eD.0IiUqltYIQ74lMaqkeePcSkCpgc/MDy6P0DtixcI/p3cVCfUta', 'vendor', 'pomvt3WWeymfERHsD6gcQ6r494z4HV3eiQDOAP8Hg8QWNQYgsIT4i8fyVGzj', NULL, NULL),
(3, 'susmoy', 'susmoy58@gmail.com', '01837222121', 'House Building, Uttara, Dhaka', '$2y$10$HUT6c/YjaKVXfTU6tG16UuSSEvQLZa5JonmaSvCxKYJlZrN3hhoq6', 'user', 'DpL1cwP7VSEXdBRiW6HCr6owkwIGGWcDLiz5h9wDjLAZyC44o0qjwo5xhdE0', '2018-12-12 19:09:17', '2018-12-12 19:09:17'),
(4, 'zahid-rahman', 'rahmanzahid94@gmail.com', '01795715448', 'malibag,dhaka', '$2y$10$ORsOMcWjLlYxf9JAK222ruFmI.1HTJArB665DqUOm1fBsMuWExk7W', 'user', 'hWYAareWyU0TmdAd3ECo1z31ffvqjkPa7seRfvrE6aHDRXg4ayJBAZWRmsCe', '2018-12-12 21:24:12', '2018-12-12 21:24:12'),
(7, 'hasan tech', 'hasanarko388@yahoo.com', '01783334555', 'navana cordela - 10,floor-5th,uttara,dhaka', '$2y$10$ngHLhhjpRLXs6eQEI35jW.aFwJs6Hg3VzOHUUILA7Y3D/FnPmPxNy', 'vendor', 'tOW4sUehhHy2VWbMsPkjGMjoSAH9KLsjj79gqpAcmMkZXxxCLwYaeyDM1MEA', NULL, NULL),
(8, 'smart tech', 'bakshi@gmail.com', '01712312341', 'malibag ,dhaka', '$2y$10$Nsuny/z23XOFSkEeFPaqWeTNQbAui7bO6sg2vLsesnzz1M8qe.mJu', 'vendor', NULL, NULL, NULL),
(9, 'Vision tech', 'visiontech@gmail.com', '01893423434', 'Bns center,floor-4,house building,uttara,dhaka', '$2y$10$frVr54AOohdzU1Q1pAGaf.suwEWtiPflt7lQAHAmYnI.fNQrDgs.m', 'vendor', NULL, NULL, NULL),
(10, 'ratul', 'ratul@gmail.com', '01837222121', 'nikunja,dhaka', '$2y$10$hRJAS9UTlpVvZpXo6Pp2F.P6ToN.E7vVXw.W8IkOJrteOa7XI2EHG', 'user', 'QOMyki1fqvwnx78w9nxFsnhncSJzZKC6Ij4S3YQ2qgfKo0qrF5vG1JHC7nft', '2018-12-13 00:46:53', '2018-12-13 00:46:53'),
(11, 'arko-009', 'kh.hasan038@gmail.com', '01837222121', 'old dhaka', '$2y$10$dMWQl/LSZ2Fly7oR0xtinOpxuLL1qTnNq1x2LqaQpJ3xpislDbKB2', 'user', 'C1rp1OglqaLDXQ8TehEtvZoe4Ba8xGqDNji4oSmGy9vtTexc1wTNt3K2Tis4', '2018-12-13 00:56:11', '2018-12-13 00:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `id` int(11) NOT NULL,
  `com_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `id`, `com_name`, `email`, `phone_number`, `address`, `password`, `role`, `approval`, `created_at`, `updated_at`) VALUES
(1, 2, 'abc electronics', 'abc@gmail.com', '01837222121', 'Uttara, Dhaka', '123456', 'vendor', 'approve', NULL, NULL),
(4, 7, 'hasan tech', 'hasanarko388@yahoo.com', '01783334555', 'navana cordela - 10,floor-5th,uttara,dhaka', '123456', 'vendor', 'pending', NULL, NULL),
(5, 8, 'smart tech', 'bakshi@gmail.com', '01712312341', 'malibag ,dhaka', '123456', 'vendor', 'pending', NULL, NULL),
(6, 9, 'Vision tech', 'visiontech@gmail.com', '01893423434', 'Bns center,floor-4,house building,uttara,dhaka', '123456', 'vendor', 'pending', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`),
  ADD UNIQUE KEY `discount_product_id_unique` (`product_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mostvieweds`
--
ALTER TABLE `mostvieweds`
  ADD PRIMARY KEY (`most_viewed_id`),
  ADD UNIQUE KEY `mostvieweds_product_id_unique` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `orders_token_number_unique` (`token_number`);

--
-- Indexes for table `order_infos`
--
ALTER TABLE `order_infos`
  ADD PRIMARY KEY (`order_info_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);
ALTER TABLE `products` ADD FULLTEXT KEY `fulltext_index` (`product_name`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`pro_img_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

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
  ADD PRIMARY KEY (`vendor_id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mostvieweds`
--
ALTER TABLE `mostvieweds`
  MODIFY `most_viewed_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_infos`
--
ALTER TABLE `order_infos`
  MODIFY `order_info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `pro_img_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
