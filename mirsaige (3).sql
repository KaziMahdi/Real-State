-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 01:56 PM
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
-- Database: `mirsaige`
--
CREATE DATABASE IF NOT EXISTS `mirsaige` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mirsaige`;

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_activity_logs`
--

DROP TABLE IF EXISTS `mpmc_activity_logs`;
CREATE TABLE IF NOT EXISTS `mpmc_activity_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `activity_type` varchar(30) NOT NULL,
  `ip_address` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_activity_logs`
--

TRUNCATE TABLE `mpmc_activity_logs`;
--
-- Dumping data for table `mpmc_activity_logs`
--

INSERT INTO `mpmc_activity_logs` (`id`, `user_id`, `activity_type`, `ip_address`, `created_at`, `updated_at`) VALUES
(24, 5, 'login', '113.21.229.39', '2024-01-14 20:02:40', '2024-01-14 20:02:40'),
(25, 5, 'logout', '113.21.229.38', '2024-01-14 20:20:49', '2024-01-14 20:20:49'),
(26, 5, 'login', '113.21.229.38', '2024-01-14 20:28:04', '2024-01-14 20:28:04'),
(27, 1, 'login', '59.153.103.205', '2024-01-14 22:16:55', '2024-01-14 22:16:55'),
(28, 1, 'login', '59.153.103.223', '2024-01-16 00:28:20', '2024-01-16 00:28:20'),
(29, 1, 'login', '59.153.103.213', '2024-01-16 05:03:01', '2024-01-16 05:03:01'),
(30, 1, 'login', '59.153.103.222', '2024-01-16 06:13:15', '2024-01-16 06:13:15'),
(31, 1, 'logout', '59.153.103.218', '2024-01-16 06:23:24', '2024-01-16 06:23:24'),
(66, 5, 'login', '103.60.175.198', '2024-02-16 23:11:47', '2024-02-16 23:11:47'),
(67, 10, 'login', '103.217.111.197', '2024-02-17 01:23:34', '2024-02-17 01:23:34'),
(68, 1, 'login', '103.217.111.201', '2024-02-19 22:17:54', '2024-02-19 22:17:54'),
(69, 1, 'login', '127.0.0.1', '2024-02-26 07:54:26', '2024-02-26 07:54:26'),
(70, 1, 'login', '127.0.0.1', '2024-02-26 09:36:53', '2024-02-26 09:36:53'),
(71, 1, 'login', '127.0.0.1', '2024-02-27 06:14:09', '2024-02-27 06:14:09'),
(72, 1, 'login', '127.0.0.1', '2024-02-28 10:19:59', '2024-02-28 10:19:59'),
(73, 1, 'login', '127.0.0.1', '2024-02-28 12:12:57', '2024-02-28 12:12:57'),
(74, 1, 'login', '127.0.0.1', '2024-02-29 04:28:22', '2024-02-29 04:28:22'),
(75, 1, 'login', '127.0.0.1', '2024-03-02 04:41:34', '2024-03-02 04:41:34'),
(76, 1, 'login', '127.0.0.1', '2024-03-02 06:35:10', '2024-03-02 06:35:10'),
(77, 1, 'login', '127.0.0.1', '2024-03-02 08:44:15', '2024-03-02 08:44:15'),
(78, 1, 'login', '127.0.0.1', '2024-03-02 09:46:41', '2024-03-02 09:46:41'),
(79, 1, 'login', '127.0.0.1', '2024-03-03 05:03:20', '2024-03-03 05:03:20'),
(80, 1, 'login', '127.0.0.1', '2024-03-03 07:30:20', '2024-03-03 07:30:20'),
(81, 1, 'logout', '127.0.0.1', '2024-03-03 07:31:48', '2024-03-03 07:31:48'),
(82, 1, 'login', '127.0.0.1', '2024-03-03 07:46:01', '2024-03-03 07:46:01'),
(83, 1, 'login', '127.0.0.1', '2024-03-03 09:25:49', '2024-03-03 09:25:49'),
(84, 1, 'login', '127.0.0.1', '2024-03-03 10:14:35', '2024-03-03 10:14:35'),
(85, 1, 'login', '127.0.0.1', '2024-03-03 10:16:00', '2024-03-03 10:16:00'),
(86, 1, 'login', '127.0.0.1', '2024-03-03 10:19:28', '2024-03-03 10:19:28'),
(87, 1, 'login', '127.0.0.1', '2024-03-03 10:26:18', '2024-03-03 10:26:18'),
(88, 1, 'login', '127.0.0.1', '2024-03-03 12:37:23', '2024-03-03 12:37:23'),
(89, 1, 'login', '127.0.0.1', '2024-03-05 04:40:08', '2024-03-05 04:40:08'),
(90, 1, 'login', '127.0.0.1', '2024-03-07 05:45:50', '2024-03-07 05:45:50'),
(91, 1, 'login', '127.0.0.1', '2024-03-07 08:10:11', '2024-03-07 08:10:11'),
(92, 1, 'login', '127.0.0.1', '2024-03-08 07:38:30', '2024-03-08 07:38:30'),
(93, 1, 'login', '127.0.0.1', '2024-03-08 09:42:58', '2024-03-08 09:42:58'),
(94, 1, 'login', '127.0.0.1', '2024-03-08 09:50:29', '2024-03-08 09:50:29'),
(95, 1, 'login', '127.0.0.1', '2024-03-08 09:52:04', '2024-03-08 09:52:04'),
(96, 1, 'login', '127.0.0.1', '2024-03-08 11:57:56', '2024-03-08 11:57:56'),
(97, 1, 'login', '127.0.0.1', '2024-03-08 13:48:21', '2024-03-08 13:48:21'),
(98, 1, 'logout', '127.0.0.1', '2024-03-08 18:03:47', '2024-03-08 18:03:47'),
(99, 1, 'login', '127.0.0.1', '2024-03-08 18:07:24', '2024-03-08 18:07:24'),
(100, 1, 'login', '127.0.0.1', '2024-03-08 23:10:42', '2024-03-08 23:10:42'),
(101, 1, 'login', '127.0.0.1', '2024-03-09 05:06:28', '2024-03-09 05:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_categories`
--

DROP TABLE IF EXISTS `mpmc_categories`;
CREATE TABLE IF NOT EXISTS `mpmc_categories` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_categories`
--

TRUNCATE TABLE `mpmc_categories`;
--
-- Dumping data for table `mpmc_categories`
--

INSERT INTO `mpmc_categories` (`id`, `name`, `department_id`, `created_at`, `updated_at`) VALUES
(2, 'Cement', 3, '2024-01-14 22:20:33', '2024-01-14 22:20:33'),
(3, 'Sand', 3, '2024-01-02 22:25:11', '2024-01-02 22:25:11'),
(4, 'Bricks', 3, '2024-01-10 00:50:25', '2024-01-10 00:50:25'),
(5, 'Tiles', 3, '2024-01-02 22:28:00', '2024-01-02 22:28:00'),
(6, 'Stone', 3, '2024-01-10 01:21:41', '2024-01-10 01:21:41'),
(7, 'Basin', 3, '2024-01-10 01:56:58', '2024-01-10 01:56:58'),
(8, 'Pedestal', 3, '2024-01-10 00:46:07', '2024-01-10 00:46:07'),
(10, 'Over Counter', 3, '2024-01-10 00:49:04', '2024-01-10 00:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_departments`
--

DROP TABLE IF EXISTS `mpmc_departments`;
CREATE TABLE IF NOT EXISTS `mpmc_departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_departments`
--

TRUNCATE TABLE `mpmc_departments`;
--
-- Dumping data for table `mpmc_departments`
--

INSERT INTO `mpmc_departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Human Resources Department (HR)', '2024-01-02 22:22:04', '2024-01-02 22:22:04'),
(2, 'Finance And Accounting Department', '2024-01-02 22:22:28', '2024-01-02 22:22:28'),
(3, 'Civil Engineering Department', '2024-01-02 22:22:36', '2024-01-02 22:22:36'),
(4, 'IT', '2023-10-17 04:20:52', '2023-10-17 04:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_password_resets`
--

DROP TABLE IF EXISTS `mpmc_password_resets`;
CREATE TABLE IF NOT EXISTS `mpmc_password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) DEFAULT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_password_resets`
--

TRUNCATE TABLE `mpmc_password_resets`;
--
-- Dumping data for table `mpmc_password_resets`
--

INSERT INTO `mpmc_password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 'mirarman123@gmail.com', 'lE7BR5pqwhkNAy6sFwV5OZdTcblJrEhuz3NXrsd6UkykULvS9Ey5FnNeatjhKs2u', '2024-01-16 00:10:46', '2024-01-16 00:10:46'),
(2, 'mirarman123@gmail.com', 't3jl2yFKtaJLHBhgGLDwJ581Ur0AHYM7UYvjWlXqSUxquiJyeeFQAYPsCsiNbFiU', '2024-01-16 00:11:27', '2024-01-16 00:11:27'),
(4, 'tahuranmitu@gmail.com', 'HmjMIXTtDGWaQGq1de6tgoBDAyPwPEMezkHw9HZ06qVQgxsHuSIYsoZZcuGEcrLi', '2024-01-16 00:29:27', '2024-01-16 00:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_permissions`
--

DROP TABLE IF EXISTS `mpmc_permissions`;
CREATE TABLE IF NOT EXISTS `mpmc_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(120) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_permissions`
--

TRUNCATE TABLE `mpmc_permissions`;
--
-- Dumping data for table `mpmc_permissions`
--

INSERT INTO `mpmc_permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Create User', 'This permission allows the user to create new user accounts within the system.', '2023-12-10 05:27:24', '2023-12-10 05:27:24'),
(2, 'Manage User', 'Users with this permission can oversee and control various aspects of user management, such as assigning roles, updating', '2023-12-10 05:27:14', '2023-12-10 05:27:14'),
(3, 'Edit User', 'Users with this permission can modify the details and settings of existing user accounts.', '2023-12-10 05:26:50', '2023-12-10 05:26:50'),
(4, 'Show User', 'This permission grants the ability to view the details and information of user accounts.', '2023-12-10 05:26:35', '2023-12-10 05:26:35'),
(5, 'Delete User', 'Users with this permission can delete user accounts from the system.', '2023-12-10 05:26:18', '2023-12-10 05:26:18'),
(6, 'Manage Roles', 'Roles Manages', '2023-12-08 10:56:45', '2023-12-08 10:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_products`
--

DROP TABLE IF EXISTS `mpmc_products`;
CREATE TABLE IF NOT EXISTS `mpmc_products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `offer_price` double DEFAULT NULL,
  `supplier_id` int(10) NOT NULL,
  `regular_price` double NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `uom_id` int(10) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `star` int(10) UNSIGNED DEFAULT NULL,
  `is_brand` tinyint(1) DEFAULT 0,
  `offer_discount` float DEFAULT 0,
  `weight` varchar(20) DEFAULT NULL,
  `barcode` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni_barcode` (`barcode`),
  UNIQUE KEY `uni_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_products`
--

TRUNCATE TABLE `mpmc_products`;
--
-- Dumping data for table `mpmc_products`
--

INSERT INTO `mpmc_products` (`id`, `name`, `offer_price`, `supplier_id`, `regular_price`, `description`, `photo`, `category_id`, `uom_id`, `is_featured`, `star`, `is_brand`, `offer_discount`, `weight`, `barcode`, `created_at`, `updated_at`) VALUES
(1, '12 mm rod', 4599, 1, 4800, '12mm BSRM Rod', '', 1, 1, NULL, 5, NULL, 299, '39', '4456342342', '2024-01-15 08:58:06', '2024-01-15 08:58:06'),
(2, 'Rod', 500, 2, 600, 'SRMB Rod', 'Supercrete Cement.jpg', 10, 2, NULL, 1, NULL, 100, '50', '124', '2024-01-15 13:35:44', '2024-01-15 13:35:44'),
(3, 'Floor Tiles', 76, 5, 80, 'code-001, DOUBLE CHARGE', 'Floor Tiles.png', 5, 4, NULL, 4, NULL, 4, '12.5', '002w', '2024-01-15 13:17:45', '2024-01-15 13:17:45'),
(4, 'Hand Shower', 550, 3, 620, 'stella star', 'Hand Shower.png', 8, 1, NULL, 4, NULL, 50, '500gm', 'xy2', '2024-02-29 11:09:33', '2024-02-29 11:09:33'),
(5, 'Akij Tiles(floor)', 180, 8, 190, '(Surface) Rustic', 'Akij Tiles(floor).png', 5, 4, NULL, 5, NULL, 10, '60x60CM/600x600MM', '6 SM 03 BE', '2024-02-29 11:17:52', '2024-02-29 11:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_projects`
--

DROP TABLE IF EXISTS `mpmc_projects`;
CREATE TABLE IF NOT EXISTS `mpmc_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `department_id` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `locations` varchar(30) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_projects`
--

TRUNCATE TABLE `mpmc_projects`;
--
-- Dumping data for table `mpmc_projects`
--

INSERT INTO `mpmc_projects` (`id`, `name`, `department_id`, `start_date`, `end_date`, `status`, `locations`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Sharavouge', 3, NULL, NULL, 'Completion: June 24', 'Baunia, Dhaka', '1.png', '2024-03-09 07:09:00', '2024-03-09 07:09:00'),
(2, 'Hazeldine', 3, NULL, NULL, 'Completon: June 24', 'Priyanka Runway City , Uttara', '2.png', '2024-03-09 07:09:20', '2024-03-09 07:09:20'),
(5, 'Biancaffe', 3, NULL, NULL, 'Coming Soon', 'Gulshan-2', '5.jpg', '2024-03-09 07:05:48', '2024-03-09 07:05:48'),
(6, 'SUNCROFT', 3, NULL, NULL, 'Coming Soon', 'Baunia', '6.png', '2024-03-09 06:46:08', '2024-03-09 06:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_purchases`
--

DROP TABLE IF EXISTS `mpmc_purchases`;
CREATE TABLE IF NOT EXISTS `mpmc_purchases` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) UNSIGNED DEFAULT NULL,
  `purchase_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `purchase_total` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `vat` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_purchases`
--

TRUNCATE TABLE `mpmc_purchases`;
--
-- Dumping data for table `mpmc_purchases`
--

INSERT INTO `mpmc_purchases` (`id`, `supplier_id`, `purchase_date`, `delivery_date`, `shipping_address`, `purchase_total`, `paid_amount`, `remark`, `discount`, `vat`, `created_at`, `updated_at`) VALUES
(9, 2, '2024-03-08 00:00:00', '2024-03-08 00:00:00', 'Banani', 78744.75, 78744, 'Del', NULL, NULL, '2024-03-08 18:42:30', '2024-03-08 18:42:30'),
(10, 4, '2024-03-08 00:00:00', '2024-03-08 00:00:00', 'iuu', 334183.5, 50000, 'yy', NULL, NULL, '2024-03-08 23:12:02', '2024-03-08 23:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_purchase_details`
--

DROP TABLE IF EXISTS `mpmc_purchase_details`;
CREATE TABLE IF NOT EXISTS `mpmc_purchase_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `uom_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL,
  `discount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_purchase_details`
--

TRUNCATE TABLE `mpmc_purchase_details`;
--
-- Dumping data for table `mpmc_purchase_details`
--

INSERT INTO `mpmc_purchase_details` (`id`, `purchase_id`, `product_id`, `qty`, `uom_id`, `price`, `vat`, `discount`, `created_at`, `updated_at`) VALUES
(12, 9, 2, 50, 2, 500, 0, 2, '2024-03-08 18:42:30', '2024-03-08 18:42:30'),
(13, 9, 3, 500, 4, 50, 0, 1, '2024-03-08 18:42:30', '2024-03-08 18:42:30'),
(14, 9, 5, 500, 4, 50, 0, 2, '2024-03-08 18:42:30', '2024-03-08 18:42:30'),
(15, 10, 3, 2180, 4, 56, 0, 5, '2024-03-08 23:12:02', '2024-03-08 23:12:02'),
(16, 10, 5, 2180, 4, 90, 0, 5, '2024-03-08 23:12:02', '2024-03-08 23:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_requisitions`
--

DROP TABLE IF EXISTS `mpmc_requisitions`;
CREATE TABLE IF NOT EXISTS `mpmc_requisitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `requisition_date` datetime NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `remark` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_requisitions`
--

TRUNCATE TABLE `mpmc_requisitions`;
--
-- Dumping data for table `mpmc_requisitions`
--

INSERT INTO `mpmc_requisitions` (`id`, `user_id`, `requisition_date`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(6, 3, '2024-03-08 00:00:00', 'as', 'as', '2024-03-08 23:16:36', '2024-03-08 23:16:36'),
(7, 10, '2024-03-08 00:00:00', 'uu', 'uu', '2024-03-08 23:17:41', '2024-03-08 23:17:41'),
(8, 5, '2024-03-09 00:00:00', 'yu', 'err', '2024-03-09 11:15:21', '2024-03-09 11:15:21'),
(9, 5, '2024-03-09 00:00:00', 'yu', 'err', '2024-03-09 11:16:07', '2024-03-09 11:16:07'),
(10, 3, '2024-03-09 00:00:00', 'h', 'et', '2024-03-09 11:22:25', '2024-03-09 11:22:25'),
(11, 10, '2024-03-09 00:00:00', 'gg', '4r5', '2024-03-09 11:29:17', '2024-03-09 11:29:17'),
(12, 3, '2024-03-09 00:00:00', 'Completion: June 24', 'Premium Luxury', '2024-03-09 11:58:07', '2024-03-09 11:58:07'),
(13, 9, '2024-03-09 00:00:00', 'onway', 'nv', '2024-03-09 12:23:55', '2024-03-09 12:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_requisition_details`
--

DROP TABLE IF EXISTS `mpmc_requisition_details`;
CREATE TABLE IF NOT EXISTS `mpmc_requisition_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requisition_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `uom_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_requisition_details`
--

TRUNCATE TABLE `mpmc_requisition_details`;
--
-- Dumping data for table `mpmc_requisition_details`
--

INSERT INTO `mpmc_requisition_details` (`id`, `requisition_id`, `project_id`, `task_id`, `product_id`, `qty`, `uom_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 5, 1, '2024-02-16 14:49:15', '0000-00-00 00:00:00'),
(2, 3, 2, 1, 2, 0, 2, '2024-03-08 22:41:24', '2024-03-08 22:41:24'),
(3, 4, 5, 1, 2, 0, 2, '2024-03-08 22:47:11', '2024-03-08 22:47:11'),
(4, 5, 2, 1, 2, 20, 2, '2024-03-08 22:51:04', '2024-03-08 22:51:04'),
(5, 6, 5, 1, 2, 50, 2, '2024-03-08 23:16:36', '2024-03-08 23:16:36'),
(6, 6, 2, 1, 3, 500, 4, '2024-03-08 23:16:36', '2024-03-08 23:16:36'),
(7, 7, 5, 1, 4, 1090, 1, '2024-03-08 23:17:41', '2024-03-08 23:17:41'),
(8, 8, 6, 1, 4, 5656, 4, '2024-03-09 11:15:21', '2024-03-09 11:15:21'),
(9, 8, 1, 1, 3, 51, 4, '2024-03-09 11:15:21', '2024-03-09 11:15:21'),
(10, 10, 2, 1, 1, 10901100, 4, '2024-03-09 11:22:25', '2024-03-09 11:22:25'),
(11, 10, 6, 1, 3, 10901100, 4, '2024-03-09 11:22:25', '2024-03-09 11:22:25'),
(12, 11, 5, 1, 5, 1090, 4, '2024-03-09 11:29:17', '2024-03-09 11:29:17'),
(13, 12, 1, 2, 3, 10901000, 4, '2024-03-09 11:58:07', '2024-03-09 11:58:07'),
(14, 13, 1, 1, 4, 1090, 1, '2024-03-09 12:23:55', '2024-03-09 12:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_roles`
--

DROP TABLE IF EXISTS `mpmc_roles`;
CREATE TABLE IF NOT EXISTS `mpmc_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `permission_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_roles`
--

TRUNCATE TABLE `mpmc_roles`;
--
-- Dumping data for table `mpmc_roles`
--

INSERT INTO `mpmc_roles` (`id`, `name`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 'Super-Admin', 1, '2023-12-08 12:38:17', '2023-12-08 12:38:17'),
(2, 'Admin', 1, '2023-12-08 12:55:29', '2023-12-08 12:55:29'),
(3, 'User', 1, '2023-12-08 13:25:07', '2023-12-08 13:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_role_permissions`
--

DROP TABLE IF EXISTS `mpmc_role_permissions`;
CREATE TABLE IF NOT EXISTS `mpmc_role_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `permission_id` (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_role_permissions`
--

TRUNCATE TABLE `mpmc_role_permissions`;
--
-- Dumping data for table `mpmc_role_permissions`
--

INSERT INTO `mpmc_role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-12-08 12:38:17', '2023-12-08 12:38:17'),
(2, 1, 2, '2023-12-08 12:38:17', '2023-12-08 12:38:17'),
(3, 1, 3, '2023-12-08 12:38:17', '2023-12-08 12:38:17'),
(4, 1, 4, '2023-12-08 12:38:17', '2023-12-08 12:38:17'),
(5, 1, 5, '2023-12-08 12:38:17', '2023-12-08 12:38:17'),
(6, 2, 1, '2023-12-08 12:39:28', '2023-12-08 12:39:28'),
(7, 2, 2, '2023-12-08 12:39:28', '2023-12-08 12:39:28'),
(9, 2, 5, '2023-12-08 12:39:28', '2023-12-08 12:39:28'),
(10, 2, 3, '2023-12-08 12:55:29', '2023-12-08 12:55:29'),
(11, 3, 1, '2023-12-08 13:25:07', '2023-12-08 13:25:07'),
(12, 3, 5, '2023-12-08 13:25:07', '2023-12-08 13:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_status`
--

DROP TABLE IF EXISTS `mpmc_status`;
CREATE TABLE IF NOT EXISTS `mpmc_status` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `descriptions` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_status`
--

TRUNCATE TABLE `mpmc_status`;
--
-- Dumping data for table `mpmc_status`
--

INSERT INTO `mpmc_status` (`id`, `name`, `descriptions`, `created_at`, `updated_at`) VALUES
(1, 'Processing', 'Processing', '0000-00-00 00:00:00', '2024-01-06 02:44:54'),
(2, 'Shifted', 'Shifted', '0000-00-00 00:00:00', '2024-01-06 02:44:54'),
(3, 'Delivered', 'Delivered', '0000-00-00 00:00:00', '2024-01-06 02:44:54'),
(4, 'Approved', 'approve', '2024-01-15 01:13:00', '2024-01-15 01:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_stocks`
--

DROP TABLE IF EXISTS `mpmc_stocks`;
CREATE TABLE IF NOT EXISTS `mpmc_stocks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `uom_id` int(11) NOT NULL,
  `transaction_type_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_stocks`
--

TRUNCATE TABLE `mpmc_stocks`;
--
-- Dumping data for table `mpmc_stocks`
--

INSERT INTO `mpmc_stocks` (`id`, `product_id`, `qty`, `uom_id`, `transaction_type_id`, `remark`, `created_at`, `updated_at`) VALUES
(1, 1, 100, 0, 1, 'Purchase', '2024-01-07 22:52:25', '2024-01-07 22:52:25'),
(2, 1, -10, 0, 2, 'Project Delivery', '2024-01-15 02:45:19', '2024-01-15 02:45:19'),
(3, 1, -10, 0, 3, 'Project Return', '2024-01-07 22:52:25', '2024-01-07 22:52:25'),
(4, 3, 25, 0, 1, 'RAK Floor tiles', '2024-01-16 00:47:24', '2024-01-16 00:47:24'),
(5, 2, 50, 2, 1, NULL, '2024-03-08 17:59:24', '2024-03-08 17:59:24'),
(6, 2, 500, 4, 1, NULL, '2024-03-08 18:40:20', '2024-03-08 18:40:20'),
(7, 3, 500, 4, 1, NULL, '2024-03-08 18:40:20', '2024-03-08 18:40:20'),
(8, 5, 500, 4, 1, NULL, '2024-03-08 18:40:20', '2024-03-08 18:40:20'),
(9, 1, 500, 4, 1, NULL, '2024-03-08 18:40:20', '2024-03-08 18:40:20'),
(10, 2, 50, 2, 1, NULL, '2024-03-08 18:42:30', '2024-03-08 18:42:30'),
(11, 3, 500, 4, 1, NULL, '2024-03-08 18:42:30', '2024-03-08 18:42:30'),
(12, 5, 500, 4, 1, NULL, '2024-03-08 18:42:30', '2024-03-08 18:42:30'),
(13, 3, 2180, 4, 1, NULL, '2024-03-08 23:12:02', '2024-03-08 23:12:02'),
(14, 5, 2180, 4, 1, NULL, '2024-03-08 23:12:02', '2024-03-08 23:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_stock_adjustments`
--

DROP TABLE IF EXISTS `mpmc_stock_adjustments`;
CREATE TABLE IF NOT EXISTS `mpmc_stock_adjustments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `stock_adjustment_type_id` int(10) DEFAULT NULL,
  `remark` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_stock_adjustments`
--

TRUNCATE TABLE `mpmc_stock_adjustments`;
--
-- Dumping data for table `mpmc_stock_adjustments`
--

INSERT INTO `mpmc_stock_adjustments` (`id`, `name`, `user_id`, `stock_adjustment_type_id`, `remark`, `created_at`, `updated_at`) VALUES
(1, NULL, 2, 1, 'abcdrfwef', '2024-01-31 05:05:16', '2024-01-31 05:05:16'),
(2, NULL, 2, NULL, 'sfge', '2024-01-31 04:29:58', '2024-01-31 04:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_stock_adjustment_details`
--

DROP TABLE IF EXISTS `mpmc_stock_adjustment_details`;
CREATE TABLE IF NOT EXISTS `mpmc_stock_adjustment_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stock_adjustment_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_stock_adjustment_details`
--

TRUNCATE TABLE `mpmc_stock_adjustment_details`;
--
-- Dumping data for table `mpmc_stock_adjustment_details`
--

INSERT INTO `mpmc_stock_adjustment_details` (`id`, `stock_adjustment_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 20, '2024-01-18 07:32:46', '2024-01-18 07:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_stock_adjustment_types`
--

DROP TABLE IF EXISTS `mpmc_stock_adjustment_types`;
CREATE TABLE IF NOT EXISTS `mpmc_stock_adjustment_types` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_stock_adjustment_types`
--

TRUNCATE TABLE `mpmc_stock_adjustment_types`;
--
-- Dumping data for table `mpmc_stock_adjustment_types`
--

INSERT INTO `mpmc_stock_adjustment_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'data', 'given', '2024-01-31 05:12:46', '2024-01-31 05:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_suppliers`
--

DROP TABLE IF EXISTS `mpmc_suppliers`;
CREATE TABLE IF NOT EXISTS `mpmc_suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(25) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `address` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_suppliers`
--

TRUNCATE TABLE `mpmc_suppliers`;
--
-- Dumping data for table `mpmc_suppliers`
--

INSERT INTO `mpmc_suppliers` (`id`, `name`, `phone`, `email`, `company_name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Joynul Abedin (BSRM Corporate)', '+8802333360301', 'mail@bsrm.com', 'BSRM Corporate Office, Motijheel, Dhaka', 'Ali Mansion, 1207/ 1099, Sadarghat Road, Dhaka, Bangladesh', '2024-01-16 01:08:19', '2024-01-16 01:08:19'),
(2, 'Shimul Mostafa (ADSR Corp)', '016398545556', 'abedin123@gmail.com', 'ADSR Corporate Office', 'Bangla Motor, Dhaka- 1212, Bangladesh', '2024-01-16 01:11:00', '2024-01-16 01:11:00'),
(3, 'Mofidul Haque (Stella Star)', '013698545663', 'stellastar@gmail.com', 'Stella Star', 'Bangla Motor, Dhaka, Bangladesh', '2024-01-16 01:11:23', '2024-01-16 01:11:23'),
(4, 'Amir Uddin (DBL Ceramics)', '0136958456', 'dbl@ceramics.gmail.com', 'DBL Ceramics Ltd.', 'Gulshan 1, Dhaka, Bangladesh', '2024-01-16 01:11:46', '2024-01-16 01:11:46'),
(5, 'Jony Sarkar (Great Wall)', '01369854569', 'greatwall@gmail.com', 'Great Wall Ceramic Industries Ltd.', 'Bangla Motor, Dhaka, Bangladesh', '2024-01-16 01:14:59', '2024-01-16 01:14:59'),
(6, 'Moidul Mridha (Fu-Wang)', '01369857458', 'fuwang@gmail.com', 'Fu-Wang Ceramics Industries Ltd.', 'Joint Venture Company', '2024-01-16 01:15:40', '2024-01-16 01:15:40'),
(7, 'Mridul Saha (Shinepukur)', '0136985695', 'shinepukur@gmail.com', 'Shinepukur Ceramics', 'BEXIMCO Industrial Park, Dhaka Export Processing Zone (DEPZ)', '2024-01-16 01:16:09', '2024-01-16 01:16:09'),
(8, 'Ruhul Mianji (Akij Ceramics)', '0156985696', 'akijceramics@gmail.com', 'Akij Ceramics Ltd.', 'Bangla Motor, Dhaka Bangladesh', '2024-01-16 01:16:33', '2024-01-16 01:16:33'),
(9, 'MD Atiqur Rahman', '0165894855', 'atiqur12@gmail.com', 'AhaminGroup', 'Banani, Dhaka, Bangladesh', '2024-03-03 10:30:11', '2024-03-03 10:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_tasks`
--

DROP TABLE IF EXISTS `mpmc_tasks`;
CREATE TABLE IF NOT EXISTS `mpmc_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `project_id` int(11) NOT NULL,
  `locations` text NOT NULL,
  `status` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_tasks`
--

TRUNCATE TABLE `mpmc_tasks`;
--
-- Dumping data for table `mpmc_tasks`
--

INSERT INTO `mpmc_tasks` (`id`, `name`, `project_id`, `locations`, `status`, `user_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 'Back Pilling', 1, 'Dhaka', 'Finished', 1, NULL, NULL, '2024-03-09 11:32:31', '2024-03-09 11:32:31'),
(2, 'Foundation Work', 1, 'Baunia, Dhaka', 'On work', 10, '2019-06-12', '2014-06-12', '2024-03-09 11:53:41', '2024-03-09 11:53:41'),
(3, 'Structural Framing', 1, 'Baunia, Dhaka', 'On Work', 1, '2019-06-12', '2014-06-12', '2024-03-09 11:55:33', '2024-03-09 11:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_teams`
--

DROP TABLE IF EXISTS `mpmc_teams`;
CREATE TABLE IF NOT EXISTS `mpmc_teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_teams`
--

TRUNCATE TABLE `mpmc_teams`;
-- --------------------------------------------------------

--
-- Table structure for table `mpmc_transaction_types`
--

DROP TABLE IF EXISTS `mpmc_transaction_types`;
CREATE TABLE IF NOT EXISTS `mpmc_transaction_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `descriptions` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_transaction_types`
--

TRUNCATE TABLE `mpmc_transaction_types`;
--
-- Dumping data for table `mpmc_transaction_types`
--

INSERT INTO `mpmc_transaction_types` (`id`, `name`, `descriptions`, `created_at`, `updated_at`) VALUES
(1, 'Purchase Order', 'Purchase Order', '2024-01-06 02:44:54', '2024-01-06 02:44:54'),
(2, 'Purchase Return', 'Purchase Return', '2024-01-06 02:44:54', '2024-01-06 02:44:54'),
(3, 'Project Deliverd', 'Project Deliverd', '2024-01-06 02:44:54', '2024-01-06 02:44:54'),
(4, 'Project Return', 'Project Return', '2024-01-06 02:44:54', '2024-01-06 02:44:54');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_uoms`
--

DROP TABLE IF EXISTS `mpmc_uoms`;
CREATE TABLE IF NOT EXISTS `mpmc_uoms` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_uoms`
--

TRUNCATE TABLE `mpmc_uoms`;
--
-- Dumping data for table `mpmc_uoms`
--

INSERT INTO `mpmc_uoms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Piece', '2023-12-25 03:38:17', '2023-12-25 03:38:17'),
(2, 'KG', '2023-12-25 03:38:17', '2023-12-25 03:38:17'),
(4, 'Square feet', '2024-01-15 11:55:04', '2024-01-15 11:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_users`
--

DROP TABLE IF EXISTS `mpmc_users`;
CREATE TABLE IF NOT EXISTS `mpmc_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(80) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `department_id` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_users`
--

TRUNCATE TABLE `mpmc_users`;
--
-- Dumping data for table `mpmc_users`
--

INSERT INTO `mpmc_users` (`id`, `name`, `username`, `email`, `phone`, `address`, `password`, `role_id`, `status`, `department_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Mir Arman', 'CEO Director', 'mirarman123@gmail.com', '0165984875', 'Uttara-14', '$2y$10$LdOsurOSpnzMb/0o3SI8tOv48yxNxVkQUZMpOIMVxU/7Nb4ndP32y', 1, 1, 3, 'CEO Director.jpg', '2023-12-19 22:41:18', '2024-01-02 18:18:29'),
(3, 'Emdadul Huque', 'Emdadul', 'emdadul123@gmail.com', '016589485596', 'Dhanmondi-27', '$2y$10$2vgpSxC2ICCtjERMKWh0dOq7cCYky0eApEj1vWZS0o.DLpu/hlxb.', 2, 1, 1, 'Emdadul.jpg', '2023-12-20 02:06:13', '2024-01-02 18:10:12'),
(5, 'Tuhura', 'tahura', 'tahurin1922@gmail.com', '01684159493', 'Dhaka', '$2y$10$SakeNhYEkxhizhCouHLnsuOATlO9xExA46wQueDo/Fi2CIch9pPvy', 2, 1, 6, '2.jpg', '2023-12-10 07:49:54', '2023-12-19 00:49:03'),
(7, 'Tahura Nasrin', 'Mitu', 'Mitu123@gmail.com', '01684159493', 'Uttara-14, Road-13, Dhaka', '$2y$10$im1MKoKuUAzWMeUInkIOgOxYN7dKx3SJXcU4Urdd0.9GXOYFeqTrq', 1, 1, 4, 'Mitu.jpg', '2024-01-02 22:41:56', '2024-01-02 16:45:35'),
(8, 'Hazeldine', 'project2', 'hazeldine@gmail.com', '01369854896', 'Priyanka Runway City', '$2y$10$WtP0ooXdlsvI4r0TG6wFN.CPy/4aMsqT/CPQTbnpWXx1MJVxKsUTe', 3, 1, 2, 'project2.jpg', '2024-01-12 23:21:22', '2024-01-15 19:34:07'),
(9, 'Tahmita Nasrin', 'Tahu', 'tahuranmitu@gmail.com', '01684159493', 'Sector-14, Uttara', '$2y$10$Si8w9BO1Vt/wYPOHfkPRm./IzjPXUQOidToUQscWP5jVo23.UHhgi', 1, 1, 4, 'Tahu.png', '2024-01-16 06:22:51', '2024-01-16 00:26:38'),
(10, 'Zishan', 'Mahboob', 'zmahboob12@gmail.com', '01756669091', 'Gulshan, Notun Bazar, Dhaka', '$2y$10$b9QAxO66P8PQ0cqiev5Qtu7TR/6slNHG.EOs4dDNvnjCqdhjxcKMm', 1, 5, 1, 'Mahboob.jpg', '2024-02-16 22:35:45', '2024-02-16 22:35:45');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mpmc_role_permissions`
--
ALTER TABLE `mpmc_role_permissions`
  ADD CONSTRAINT `mpmc_role_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `mpmc_roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mpmc_role_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `mpmc_permissions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
