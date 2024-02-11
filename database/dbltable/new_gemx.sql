-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2023 at 10:25 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_gemx`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$TwG7cVpSAExfktF2XPWA3.G1ONTTH1GPFz3kDj4nZFtih9/DRqPqi', '2023-11-16 00:17:34', '2023-11-16 00:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'apple', 0, '2023-11-16 00:18:55', '2023-11-16 00:18:55'),
(2, '24k', 0, '2023-11-17 00:03:37', '2023-11-17 00:03:37'),
(3, '22k', 0, '2023-11-17 00:07:16', '2023-11-17 00:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_details`
--

DROP TABLE IF EXISTS `buyer_details`;
CREATE TABLE IF NOT EXISTS `buyer_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `catalogue_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buyername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pin_no` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `buyer_details`
--

INSERT INTO `buyer_details` (`id`, `catalogue_name`, `buyername`, `buyer_email`, `pin_no`, `created_at`, `updated_at`) VALUES
(1, 'Gold Catalogue', 'krishan', 'krishan@bluespaceweb.com', NULL, '2023-11-20 03:09:06', '2023-11-20 03:09:06'),
(2, 'Gold Catalogue', 'krishan sharma', 'krishan@bluespaceweb.com', NULL, '2023-11-20 03:15:15', '2023-11-20 03:15:15'),
(3, 'Gold Catalogue', 'krishan sharma', 'krishan@bluespaceweb.com', NULL, '2023-11-20 03:15:25', '2023-11-20 03:15:25'),
(4, 'Gold Catalogue', 'krishan sharma', 'krishan@bluespaceweb.com', NULL, '2023-11-20 03:16:29', '2023-11-20 03:16:29'),
(5, 'Gold Catalogue', 'krishan sharma', 'krishan@bluespaceweb.com', NULL, '2023-11-20 03:17:40', '2023-11-20 03:17:40'),
(6, 'Gold Catalogue', 'krishan sharma', 'krishan@bluespaceweb.com', NULL, '2023-11-20 03:18:19', '2023-11-20 03:18:19'),
(7, 'Gold Catalogue', 'krishan', 'krishan@bluespaceweb.com', NULL, '2023-11-20 03:20:04', '2023-11-20 03:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_prod_show_permissions`
--

DROP TABLE IF EXISTS `buyer_prod_show_permissions`;
CREATE TABLE IF NOT EXISTS `buyer_prod_show_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buyer_id` int(11) NOT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `securitycode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prod_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripation` text COLLATE utf8_unicode_ci,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `production_technique` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `material` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shape` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sampling_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `production_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `moq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_shape` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `buyer_prod_show_permissions`
--

INSERT INTO `buyer_prod_show_permissions` (`id`, `buyer_id`, `product_id`, `catalog_id`, `securitycode`, `selling_price`, `prod_name`, `descripation`, `color`, `production_technique`, `material`, `size`, `shape`, `sampling_time`, `production_time`, `moq`, `remarks`, `image_shape`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '6', 1, 'f7536b52', 'selling_price', NULL, 'descripation', 'color', NULL, 'material', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(2, 1, '2', 1, 'f7536b52', 'selling_price', NULL, 'descripation', 'color', NULL, 'material', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(3, 1, '3', 1, 'f7536b52', 'selling_price', NULL, 'descripation', 'color', NULL, 'material', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(4, 1, '5', 1, 'f7536b52', 'selling_price', NULL, 'descripation', 'color', NULL, 'material', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(5, 2, '3', 2, 'b1c198cc', 'selling_price', 'name', NULL, 'color', NULL, 'material', NULL, 'shape', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(6, 2, '4', 2, 'b1c198cc', 'selling_price', 'name', NULL, 'color', NULL, 'material', NULL, 'shape', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(7, 3, '6', 3, 'b2aed4c5', 'selling_price', NULL, 'descripation', NULL, 'production_technique', NULL, 'size', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(8, 3, '2', 3, 'b2aed4c5', 'selling_price', NULL, 'descripation', NULL, 'production_technique', NULL, 'size', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(9, 3, '3', 3, 'b2aed4c5', 'selling_price', NULL, 'descripation', NULL, 'production_technique', NULL, 'size', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(10, 5, '2', 4, 'e75d7f24', 'selling_price', 'name', NULL, 'color', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(11, 5, '6', 4, 'e75d7f24', 'selling_price', 'name', NULL, 'color', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(12, 6, '6', 5, '9b7631b8', 'selling_price', 'name', NULL, 'color', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(13, 6, '2', 5, '9b7631b8', 'selling_price', 'name', NULL, 'color', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(14, 6, '3', 5, '9b7631b8', 'selling_price', 'name', NULL, 'color', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(15, 7, '6', 6, 'db4e9d6b', 'selling_price', 'name', 'descripation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(16, 7, '4', 6, 'db4e9d6b', 'selling_price', 'name', 'descripation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(17, 7, '5', 6, 'db4e9d6b', 'selling_price', 'name', 'descripation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(18, 2, '6', 1, '71911ca3', NULL, 'name', NULL, 'color', NULL, 'material', NULL, 'shape', NULL, 'production_time', NULL, NULL, NULL, 0, NULL, NULL),
(19, 2, '5', 1, '71911ca3', NULL, 'name', NULL, 'color', NULL, 'material', NULL, 'shape', NULL, 'production_time', NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buyer_quotations`
--

DROP TABLE IF EXISTS `buyer_quotations`;
CREATE TABLE IF NOT EXISTS `buyer_quotations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buyer_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grandtotal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `totaldiscount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `buyer_quotations`
--

INSERT INTO `buyer_quotations` (`id`, `buyer_id`, `catalog_id`, `company_id`, `product_id`, `quantity`, `total_amount`, `grandtotal`, `discount`, `totaldiscount`, `token`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 2, 6, 2, '30', '18172.70', '70', '9', 'c2f19695', 2, 'kmnjm', '2023-12-02 05:40:04', '2023-12-02 05:40:04'),
(2, '1', 1, 2, 5, 5, '9000', '18172.70', '-80', '9', 'c2f19695', 2, 'kmnjm', '2023-12-02 05:40:04', '2023-12-02 05:40:04'),
(3, '1', 1, 2, 3, 3, '90', '18172.70', '14', '9', 'c2f19695', 2, 'kmnjm', '2023-12-02 05:40:04', '2023-12-02 05:40:04'),
(7, '3', 3, 2, 6, 5, '50', '133.00', '80', '5', '9dc0aee1', 3, 'ok i am add 5% discount in all product', '2023-12-05 08:59:48', '2023-12-05 08:59:48'),
(8, '3', 3, 2, 3, 3, '90', '133.00', '14', '5', '9dc0aee1', 3, 'ok i am add 5% discount in all product', '2023-12-05 08:59:48', '2023-12-05 08:59:48'),
(9, '1', 1, 2, 6, 5, '50', '18172.70', '80', '9', '06fc5bd6', 2, 'kmnjm', '2023-12-05 09:37:16', '2023-12-05 09:37:16'),
(10, '1', 1, 2, 5, 6, '10800', '18172.70', '-80', '9', '06fc5bd6', 2, 'kmnjm', '2023-12-05 09:37:17', '2023-12-05 09:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

DROP TABLE IF EXISTS `catalogs`;
CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gold Catalogue', 0, '2023-11-24 05:23:25', '2023-11-24 05:23:25'),
(2, 'Jewelry Catalogue', 0, '2023-11-24 10:34:27', '2023-11-24 10:34:27'),
(3, 'ram cat', 0, '2023-11-30 06:19:37', '2023-11-30 06:19:37'),
(4, 'rk', 0, '2023-11-30 09:46:00', '2023-11-30 09:46:00'),
(5, 'dk', 0, '2023-11-30 09:50:23', '2023-11-30 09:50:23'),
(6, 'siya catalog', 0, '2023-12-05 09:50:56', '2023-12-05 09:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `catalogues`
--

DROP TABLE IF EXISTS `catalogues`;
CREATE TABLE IF NOT EXISTS `catalogues` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `satatus` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `satatus`, `created_at`, `updated_at`) VALUES
(1, 'cat', 0, '2023-11-16 00:18:32', '2023-11-16 00:18:32'),
(2, 'Gold', 0, '2023-11-17 00:03:06', '2023-11-17 00:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'red', NULL, '2023-11-16 00:23:00', '2023-11-16 00:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `company_accounts`
--

DROP TABLE IF EXISTS `company_accounts`;
CREATE TABLE IF NOT EXISTS `company_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `worktype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_account` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ifsc_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company_accounts`
--

INSERT INTO `company_accounts` (`id`, `company_name`, `company_email`, `company_address`, `company_phone`, `worktype`, `image`, `bank_account`, `bank_name`, `ifsc_code`, `country_name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Bluesapceweb.com', 'krishan@bluespaceweb.com', 'jadtpura,jaipur,rajsathan,india', '7232012936', 'Spring Collection', '', '12345657890', 'State Bank', 'df55vff', 'Argentina', 1, '2023-11-28 11:09:18', '2023-11-30 04:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fName`, `lName`, `email`, `phone`, `address`, `tin`, `company`, `created_at`, `updated_at`) VALUES
(1, 'sdfs fsdf', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-28 09:09:08', '2023-11-28 09:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'cloth', 0, '2023-11-16 00:19:06', '2023-11-16 00:19:06'),
(2, 'Jewellery', 0, '2023-11-17 00:04:09', '2023-11-17 00:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_02_061629_create_admins_table', 1),
(7, '2023_10_04_115600_create_customers_table', 1),
(8, '2023_10_05_101534_create_categories_table', 1),
(9, '2023_10_05_101835_create_products_table', 1),
(10, '2023_10_10_071616_create_units_table', 1),
(11, '2023_10_10_084730_create_brands_table', 1),
(12, '2023_10_10_095745_create_groups_table', 1),
(13, '2023_10_13_040046_create_colors_table', 1),
(14, '2023_10_13_040336_create_sizes_table', 1),
(15, '2023_10_13_040540_create_product_variants_table', 1),
(16, '2023_10_13_110044_create_product_images_table', 1),
(17, '2023_10_21_090432_create_quantities_table', 1),
(18, '2023_11_07_093230_create_catalogues_table', 1),
(19, '2023_11_16_062556_create_variant_attributes_table', 2),
(20, '2023_11_18_063001_add_column_form_product_variants_table', 2),
(25, '2023_11_20_053335_create_buyer_details_table', 3),
(26, '2023_11_20_053851_create_buyer_prod_show_permissions_table', 3),
(27, '2023_11_20_093343_add_buyer_prod_show_permissions_to_catname', 4),
(28, '2023_11_24_040906_create_catalogs_table', 5),
(30, '2023_11_24_100314_add_buyer_prod_show_permissions_to_catalog_id', 6),
(31, '2023_11_25_101735_create_tempcatalogs_table', 7),
(32, '2023_11_27_172817_create_company_accounts_table', 8),
(33, '2023_11_30_171607_create_orders_table', 9),
(34, '2023_12_01_123759_add_company_accounts_to_worktype', 10),
(35, '2023_12_01_124018_add_company_accounts_to_image', 11),
(36, '2023_12_01_124709_change_image_type_in_company_accounts', 12),
(37, '2023_12_01_124948_change_worktype_type_in_company_accounts', 13),
(38, '2023_12_01_140232_create_buyer_quotations_table', 14),
(39, '2023_12_01_173453_add_buyer_quotations_to_catalog_id', 15),
(40, '2023_12_02_094243_add_buyer_quotations_to_token', 16),
(41, '2023_12_02_162016_add_buyer_quotations_to_grandtotal', 17),
(42, '2023_12_02_162455_change_grandtotal_type_in_buyer_quotations', 18),
(43, '2023_12_05_104639_create_order_invoices_table', 19),
(44, '2023_12_05_112547_add_order_invoices_to_order_invoices', 20),
(45, '2023_12_05_122733_add_buyer_quotations_to_totaldiscount', 21);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buyer_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `buyer_id`, `company_id`, `product_id`, `quantity`, `total_amount`, `discount`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(1, '1', 2, 6, 5, '75', '25', 0, 'Thank you for doing business with us.', '2023-12-01 05:37:45', '2023-12-01 05:37:45'),
(2, '1', 2, 5, 3, '5400', '40', 0, 'Thank you for doing business with us.', '2023-12-01 05:37:45', '2023-12-01 05:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_invoices`
--

DROP TABLE IF EXISTS `order_invoices`;
CREATE TABLE IF NOT EXISTS `order_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buyer_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grandtotal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_invoices`
--

INSERT INTO `order_invoices` (`id`, `buyer_id`, `catalog_id`, `company_id`, `product_id`, `quantity`, `total_amount`, `grandtotal`, `discount`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 2, 6, 2, '9120', '8208.00', '10', 0, 'Thankyou', '2023-12-05 07:13:55', '2023-12-05 07:13:55'),
(2, '1', 1, 2, 5, 5, '9120', '8208.00', '10', 0, 'Thankyou', '2023-12-05 07:13:55', '2023-12-05 07:13:55'),
(3, '1', 1, 2, 3, 3, '9120', '8208.00', '10', 0, 'Thankyou', '2023-12-05 07:13:55', '2023-12-05 07:13:55'),
(4, '3', 3, 2, 6, 5, '140', '133.00', '5', 0, 'thankyou', '2023-12-05 09:17:28', '2023-12-05 09:17:28'),
(5, '3', 3, 2, 3, 3, '140', '133.00', '5', 0, 'thankyou', '2023-12-05 09:17:28', '2023-12-05 09:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_price` decimal(10,2) DEFAULT NULL,
  `selling_price` decimal(10,2) DEFAULT NULL,
  `tax` decimal(5,2) DEFAULT NULL,
  `product_themlin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_unit_id_foreign` (`unit_id`),
  KEY `products_brand_id_foreign` (`brand_id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_group_id_foreign` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `unit_id`, `brand_id`, `category_id`, `group_id`, `sku`, `product_type`, `quantity`, `purchase_price`, `selling_price`, `tax`, `product_themlin`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Kangan', 'Description Kangan', 2, 2, 2, 2, NULL, 'variant', '5', '44.00', '50.00', '0.00', 'download.png', '0', '2023-11-18 01:33:36', '2023-12-02 05:32:48'),
(2, 'Gold jewellery', 'Gold jewellery on a table with other gold jewellery', 2, 2, 1, 2, NULL, 'variant', '2', '33.00', '30.00', '0.00', 'images.png', '0', '2023-11-17 00:06:38', '2023-11-25 09:17:43'),
(3, 'Gold jewellery', 'Gold jewellery on a table with other gold jewellery', 2, 3, 2, 2, 'ki44', 'standrad', '1', '40.00', '35.00', '0.00', 'images (1).png', '0', '2023-11-17 00:08:19', '2023-12-02 05:36:02'),
(4, 'Kangan', 'Gold jewellery on a table with other gold jewellery', 2, 2, 2, 2, NULL, 'standrad', '3', '20.00', '15.00', '0.00', 'download.png', '0', '2023-11-17 00:10:33', '2023-12-02 05:35:17'),
(5, 'Gold jewellery', 'Gold jewellery on a table with other gold jewellery', 1, 3, 2, 2, '87df', 'standrad', '2', '1500.00', '1000.00', '0.00', 'download (1).png', '0', '2023-11-17 00:12:16', '2023-12-02 05:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

DROP TABLE IF EXISTS `product_variants`;
CREATE TABLE IF NOT EXISTS `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `varian_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `varian_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `color_id`, `size_id`, `varian_1`, `varian_2`, `purchase_price`, `selling_price`, `sku`, `image`, `created_at`, `updated_at`) VALUES
(12, 6, 3, 4, 'blue', '34', '33.00', '40.00', 'd3', '1700291017_download.png', '2023-12-02 05:32:48', '2023-12-02 05:32:48'),
(11, 6, 3, 4, 'red', '34', '22.00', '30.00', 'd2', '1700291017_gold-jewellery-table-with-other-gold-jewellery_1340-42836.png', '2023-12-02 05:32:48', '2023-12-02 05:32:48'),
(10, 6, 3, 4, 'red', '32', '11.00', '20.00', 'd1', '1700291016_images (1).png', '2023-12-02 05:32:48', '2023-12-02 05:32:48'),
(6, 2, 3, 5, '35', 'red', '30.00', '25.00', 'ghj', '1700903863_catlog-front-dash.png', '2023-11-25 09:17:44', '2023-11-25 09:17:44'),
(7, 2, 3, 5, '32', 'red', '20.00', '14.00', 'd1', '1700903864_images (2).png', '2023-11-25 09:17:44', '2023-11-25 09:17:44'),
(8, 2, 3, 5, '35', 'blue', '25.00', '20.00', 'ju1', '1700903864_images.png', '2023-11-25 09:17:44', '2023-11-25 09:17:44'),
(9, 2, 3, 5, '32', 'blue', '33.00', '30.00', 'h5j', '1700903864_download (1).png', '2023-11-25 09:17:44', '2023-11-25 09:17:44'),
(13, 6, 3, 4, 'blue', '36', '44.00', '50.00', 'd4', '1700291017_download (1).png', '2023-12-02 05:32:48', '2023-12-02 05:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `quantities`
--

DROP TABLE IF EXISTS `quantities`;
CREATE TABLE IF NOT EXISTS `quantities` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quantities`
--

INSERT INTO `quantities` (`id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(35, 1, '2', '6', '2023-11-17 01:19:18', '2023-11-17 01:19:18'),
(34, 1, '20', '5', '2023-11-17 01:19:18', '2023-11-17 01:19:18'),
(65, 2, '2', '35', '2023-11-25 09:17:43', '2023-11-25 09:17:43'),
(64, 2, '1', '20', '2023-11-25 09:17:43', '2023-11-25 09:17:43'),
(76, 3, '1', '35', '2023-12-02 05:36:02', '2023-12-02 05:36:02'),
(75, 3, '3', '30', '2023-12-02 05:36:02', '2023-12-02 05:36:02'),
(74, 4, '3', '13', '2023-12-02 05:35:17', '2023-12-02 05:35:17'),
(73, 4, '2', '14', '2023-12-02 05:35:17', '2023-12-02 05:35:17'),
(72, 4, '1', '15', '2023-12-02 05:35:17', '2023-12-02 05:35:17'),
(71, 5, '2', '1800', '2023-12-02 05:34:23', '2023-12-02 05:34:23'),
(70, 5, '1', '1000', '2023-12-02 05:34:23', '2023-12-02 05:34:23'),
(69, 6, '5', '10', '2023-12-02 05:32:48', '2023-12-02 05:32:48'),
(68, 6, '4', '15', '2023-12-02 05:32:48', '2023-12-02 05:32:48'),
(67, 6, '1', '20', '2023-12-02 05:32:48', '2023-12-02 05:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE IF NOT EXISTS `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '32M', '2023-11-16 00:23:11', '2023-11-16 00:23:11'),
(2, '34L', '2023-11-16 00:23:18', '2023-11-16 00:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `tempcatalogs`
--

DROP TABLE IF EXISTS `tempcatalogs`;
CREATE TABLE IF NOT EXISTS `tempcatalogs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tempcatalogs`
--

INSERT INTO `tempcatalogs` (`id`, `product_id`, `catalog_id`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '2023-11-25 06:42:29', '2023-11-25 06:42:29'),
(2, 5, 1, '2023-11-25 06:42:29', '2023-11-25 06:42:29'),
(3, 6, 1, '2023-11-25 06:42:33', '2023-11-25 06:42:33'),
(4, 5, 1, '2023-11-25 06:42:33', '2023-11-25 06:42:33'),
(5, 6, 1, '2023-11-25 06:46:36', '2023-11-25 06:46:36'),
(6, 5, 1, '2023-11-25 06:46:36', '2023-11-25 06:46:36'),
(7, 6, 1, '2023-11-25 06:46:38', '2023-11-25 06:46:38'),
(8, 5, 1, '2023-11-25 06:46:38', '2023-11-25 06:46:38'),
(9, 6, 1, '2023-11-25 06:46:58', '2023-11-25 06:46:58'),
(10, 5, 1, '2023-11-25 06:46:58', '2023-11-25 06:46:58'),
(11, 6, 1, '2023-11-25 06:47:01', '2023-11-25 06:47:01'),
(12, 5, 1, '2023-11-25 06:47:01', '2023-11-25 06:47:01'),
(13, 6, 1, '2023-11-25 06:48:49', '2023-11-25 06:48:49'),
(14, 5, 1, '2023-11-25 06:48:49', '2023-11-25 06:48:49'),
(15, 6, 1, '2023-11-25 06:48:52', '2023-11-25 06:48:52'),
(16, 5, 1, '2023-11-25 06:48:52', '2023-11-25 06:48:52'),
(17, 6, 1, '2023-11-25 06:49:21', '2023-11-25 06:49:21'),
(18, 5, 1, '2023-11-25 06:49:21', '2023-11-25 06:49:21'),
(19, 6, 1, '2023-11-25 06:49:23', '2023-11-25 06:49:23'),
(20, 5, 1, '2023-11-25 06:49:23', '2023-11-25 06:49:23'),
(21, 6, 1, '2023-11-25 06:49:39', '2023-11-25 06:49:39'),
(22, 5, 1, '2023-11-25 06:49:39', '2023-11-25 06:49:39'),
(23, 6, 1, '2023-11-25 06:49:42', '2023-11-25 06:49:42'),
(24, 5, 1, '2023-11-25 06:49:42', '2023-11-25 06:49:42'),
(25, 6, 1, '2023-11-25 06:52:21', '2023-11-25 06:52:21'),
(26, 5, 1, '2023-11-25 06:52:21', '2023-11-25 06:52:21'),
(27, 6, 1, '2023-11-25 06:52:24', '2023-11-25 06:52:24'),
(28, 5, 1, '2023-11-25 06:52:24', '2023-11-25 06:52:24'),
(29, 6, 1, '2023-11-25 06:56:39', '2023-11-25 06:56:39'),
(30, 5, 1, '2023-11-25 06:56:39', '2023-11-25 06:56:39'),
(31, 6, 1, '2023-11-25 06:56:39', '2023-11-25 06:56:39'),
(32, 5, 1, '2023-11-25 06:56:39', '2023-11-25 06:56:39'),
(33, 6, 1, '2023-11-25 06:56:58', '2023-11-25 06:56:58'),
(34, 5, 1, '2023-11-25 06:56:58', '2023-11-25 06:56:58'),
(35, 6, 1, '2023-11-25 06:56:59', '2023-11-25 06:56:59'),
(36, 5, 1, '2023-11-25 06:56:59', '2023-11-25 06:56:59'),
(37, 6, 1, '2023-11-25 06:59:04', '2023-11-25 06:59:04'),
(38, 5, 1, '2023-11-25 06:59:04', '2023-11-25 06:59:04'),
(39, 6, 1, '2023-11-25 06:59:05', '2023-11-25 06:59:05'),
(40, 5, 1, '2023-11-25 06:59:05', '2023-11-25 06:59:05'),
(41, 6, 1, '2023-11-25 06:59:53', '2023-11-25 06:59:53'),
(42, 5, 1, '2023-11-25 06:59:53', '2023-11-25 06:59:53'),
(43, 4, 1, '2023-11-25 06:59:53', '2023-11-25 06:59:53'),
(44, 6, 1, '2023-11-25 06:59:54', '2023-11-25 06:59:54'),
(45, 5, 1, '2023-11-25 06:59:54', '2023-11-25 06:59:54'),
(46, 4, 1, '2023-11-25 06:59:54', '2023-11-25 06:59:54'),
(47, 6, 1, '2023-11-25 07:03:34', '2023-11-25 07:03:34'),
(48, 5, 1, '2023-11-25 07:03:34', '2023-11-25 07:03:34'),
(49, 4, 1, '2023-11-25 07:03:34', '2023-11-25 07:03:34'),
(50, 6, 1, '2023-11-25 07:03:35', '2023-11-25 07:03:35'),
(51, 5, 1, '2023-11-25 07:03:35', '2023-11-25 07:03:35'),
(52, 4, 1, '2023-11-25 07:03:35', '2023-11-25 07:03:35'),
(53, 6, 1, '2023-11-25 07:04:23', '2023-11-25 07:04:23'),
(54, 5, 1, '2023-11-25 07:04:23', '2023-11-25 07:04:23'),
(55, 4, 1, '2023-11-25 07:04:23', '2023-11-25 07:04:23'),
(56, 6, 1, '2023-11-25 07:04:23', '2023-11-25 07:04:23'),
(57, 5, 1, '2023-11-25 07:04:23', '2023-11-25 07:04:23'),
(58, 4, 1, '2023-11-25 07:04:23', '2023-11-25 07:04:23'),
(59, 6, 1, '2023-11-25 07:07:08', '2023-11-25 07:07:08'),
(60, 5, 1, '2023-11-25 07:07:08', '2023-11-25 07:07:08'),
(61, 4, 1, '2023-11-25 07:07:08', '2023-11-25 07:07:08'),
(62, 6, 1, '2023-11-25 07:07:08', '2023-11-25 07:07:08'),
(63, 5, 1, '2023-11-25 07:07:08', '2023-11-25 07:07:08'),
(64, 4, 1, '2023-11-25 07:07:08', '2023-11-25 07:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `sort_name`, `created_at`, `updated_at`) VALUES
(1, 'kilo Gram', 'kl', '2023-11-16 00:19:45', '2023-11-16 00:19:45'),
(2, 'Gram', 'g', '2023-11-17 00:04:33', '2023-11-17 00:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'krishan sharma', 'krishan@bluespaceweb.com', NULL, '$2y$10$YI.CBwaRvs36BpHPnDQbM.RlFqWqTxYhP7OKFWmuXhP4c5cq49S2.', '6yOP0VLqGCpZr8MQCqWx7Bkdf14pQ5yXDVYnrikpF6MVWpTFuzKUtp1oz1xX', '2023-11-20 04:36:46', '2023-11-21 23:55:03'),
(2, 'Dileep', 'dileep@bluespaceweb.com', NULL, '$2y$10$xmMRvZMydYStSRhTxIOHY.S6nYjLVx.forTrmczq6HAKKXwvAgLnu', NULL, '2023-11-21 05:18:15', '2023-11-21 05:18:15'),
(3, 'ram gold', 'ram@bluespaceweb.com', NULL, '$2y$10$VxeDtP0AuoziwO9F7R71.eNHApij30JHg5nUwm8SoqkSU7FI7EvYG', NULL, '2023-11-30 09:04:38', '2023-11-30 09:04:38'),
(4, 'rete', 'etr', NULL, '$2y$10$9mgzAuPtd9UR/wPlEnHfMOXAvpaph13l5iUwgZ596VT7.RciCBYmy', NULL, '2023-11-30 09:26:32', '2023-11-30 09:26:32'),
(5, 'rk', 'rk@bluespaceweb.com', NULL, '$2y$10$LTvx.YTIkzCB2VgUuZfqb.zr4zKRCjfKd.Huc83OT3IPPcKeyyHIC', NULL, '2023-11-30 09:46:01', '2023-11-30 09:46:01'),
(6, 'Dileepd', 'dk@bluespaceweb.com', NULL, '$2y$10$LNfRfkK13HSRpM814.79vOf6dbXB6U4QEFMrOD0CMvc8gSuh.XVxC', NULL, '2023-11-30 09:50:23', '2023-11-30 09:50:23'),
(7, 'siya', 'siya@bluespaceweb.com', NULL, '$2y$10$Rr2oXuADCEbEWnBDDIg6dOA8Oj8eC/cMOsJdPNMIm49w7nPKS8r1q', NULL, '2023-12-05 09:50:56', '2023-12-05 09:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `variant_attributes`
--

DROP TABLE IF EXISTS `variant_attributes`;
CREATE TABLE IF NOT EXISTS `variant_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `variant_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `variant_attributes`
--

INSERT INTO `variant_attributes` (`id`, `variant_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kangan', 0, '2023-11-18 01:30:14', '2023-11-18 01:30:14'),
(2, 'kangan gold', 0, '2023-11-18 01:30:25', '2023-11-18 01:30:25'),
(3, 'size', 0, '2023-11-18 01:31:17', '2023-11-18 01:31:17'),
(4, 'length', 0, '2023-11-18 01:31:25', '2023-11-18 01:31:25'),
(5, 'color', 0, '2023-11-24 06:23:02', '2023-11-24 06:23:02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
