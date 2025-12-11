-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2025 at 08:36 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_of_department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_students` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_information`
--

DROP TABLE IF EXISTS `fees_information`;
CREATE TABLE IF NOT EXISTS `fees_information` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fees_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fees_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_information`
--

INSERT INTO `fees_information` (`id`, `student_id`, `student_name`, `gender`, `fees_type`, `fees_amount`, `file`, `paid_date`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '1', NULL, NULL, 'Exam Fees', '500', NULL, '10-12-2025', '2025-12-09 23:34:47', '2025-12-09 23:34:47', NULL, NULL),
(2, '1', NULL, NULL, 'Exam Fees', '1200', NULL, '10-12-2025', '2025-12-09 23:46:56', '2025-12-09 23:46:56', NULL, NULL),
(3, '1', NULL, NULL, 'Tuition Fees', '1200', NULL, '10-12-2025', '2025-12-09 23:48:14', '2025-12-09 23:48:14', NULL, NULL),
(4, '1', NULL, NULL, 'Exam Fees', '1200', NULL, '10-12-2025', '2025-12-09 23:56:17', '2025-12-09 23:56:17', NULL, NULL),
(5, '1', NULL, NULL, 'Tuition Fees', '500', NULL, '10-12-2025', '2025-12-10 00:03:16', '2025-12-10 00:03:16', NULL, NULL),
(6, '1', NULL, NULL, 'Tuition Fees', '500', 'uploads69390e2a22deb.jpg', '10-12-2025', '2025-12-10 00:07:38', '2025-12-10 00:07:38', NULL, NULL),
(7, '1', NULL, NULL, 'Exam Fees', '1200', 'uploads69390e9963275.pdf', '10-12-2025', '2025-12-10 00:09:29', '2025-12-10 00:09:29', NULL, NULL),
(8, '1', NULL, NULL, 'Exam Fees', '1200', NULL, '10-12-2025', '2025-12-10 00:29:32', '2025-12-10 00:29:32', NULL, NULL),
(9, '1', NULL, NULL, 'Exam Fees', '500', NULL, '10-12-2025', '2025-12-10 00:29:45', '2025-12-10 00:29:45', NULL, NULL),
(10, '1', NULL, NULL, 'Exam Fees', '500', NULL, '10-12-2025', '2025-12-10 00:29:52', '2025-12-10 00:29:52', NULL, NULL),
(11, '1', NULL, NULL, 'Tuition Fees', '500', NULL, '10-12-2025', '2025-12-10 00:29:59', '2025-12-10 00:29:59', NULL, NULL),
(12, '1', NULL, NULL, 'Exam Fees', '4560', 'collection-6939507ae5875-10_12_2025.pdf', '10-12-2025', '2025-12-10 00:57:14', '2025-12-10 04:50:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fees_types`
--

DROP TABLE IF EXISTS `fees_types`;
CREATE TABLE IF NOT EXISTS `fees_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fees_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_types`
--

INSERT INTO `fees_types` (`id`, `fees_type`, `created_at`, `updated_at`) VALUES
(1, 'Class Test', NULL, NULL),
(2, 'Exam Fees', NULL, NULL),
(3, 'Tuition Fees', NULL, NULL),
(4, 'Monthly Fees', NULL, NULL),
(5, 'Registration Fees', NULL, NULL),
(6, 'Others', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_additional_charges`
--

DROP TABLE IF EXISTS `invoice_additional_charges`;
CREATE TABLE IF NOT EXISTS `invoice_additional_charges` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_customer_names`
--

DROP TABLE IF EXISTS `invoice_customer_names`;
CREATE TABLE IF NOT EXISTS `invoice_customer_names` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recurring_incoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `by_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_from` longtext COLLATE utf8mb4_unicode_ci,
  `invoice_to` longtext COLLATE utf8mb4_unicode_ci,
  `status` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

DROP TABLE IF EXISTS `invoice_details`;
CREATE TABLE IF NOT EXISTS `invoice_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `items` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_discounts`
--

DROP TABLE IF EXISTS `invoice_discounts`;
CREATE TABLE IF NOT EXISTS `invoice_discounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_new` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payment_details`
--

DROP TABLE IF EXISTS `invoice_payment_details`;
CREATE TABLE IF NOT EXISTS `invoice_payment_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_terms_and_Conditions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_total_amounts`
--

DROP TABLE IF EXISTS `invoice_total_amounts`;
CREATE TABLE IF NOT EXISTS `invoice_total_amounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxable_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `round_off` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_the_signatuaory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_routes` json DEFAULT NULL,
  `pattern` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `icon`, `route`, `active_routes`, `pattern`, `parent_id`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'fas fa-tachometer-alt', '', '[\"dashboard\"]', NULL, NULL, 1, 1, NULL, NULL),
(3, 'Teacher Dashboard', NULL, 'teacher/dashboard', '[\"teacher/dashboard\"]', NULL, 0, 2, 0, NULL, NULL),
(4, 'Student Dashboard', NULL, 'student/dashboard', '[\"student/dashboard\"]', NULL, 0, 3, 0, NULL, NULL),
(5, 'User Management', 'fas fa-shield-alt', NULL, '[\"list/users\"]', 'view/user/edit/*', NULL, 2, 1, NULL, NULL),
(6, 'List Users', NULL, 'list/users', '[\"list/users\"]', 'view/user/edit/*', 5, 1, 1, NULL, NULL),
(7, 'Settings', 'fas fa-cog', NULL, '[\"setting/page\"]', NULL, NULL, 3, 1, NULL, NULL),
(8, 'General Settings', NULL, 'setting/page', '[\"setting/page\"]', NULL, 7, 1, 1, NULL, NULL),
(9, 'Students', 'fas fa-graduation-cap', NULL, '[\"student/list\", \"student/grid\", \"student/add/page\"]', 'student/edit/*|student/profile/*', NULL, 4, 1, NULL, NULL),
(10, 'Student List', NULL, 'student/list', '[\"student/list\", \"student/grid\"]', NULL, 9, 1, 1, NULL, NULL),
(11, 'Student Add', NULL, 'student/add/page', '[\"student/add/page\"]', NULL, 9, 2, 1, NULL, NULL),
(12, 'Student Edit', NULL, NULL, '[]', 'student/edit/*', 9, 3, 1, NULL, NULL),
(13, 'Student View', NULL, NULL, '[]', 'student/profile/*', 9, 4, 1, NULL, NULL),
(14, 'Teachers', 'fas fa-chalkboard-teacher', NULL, '[\"teacher/add/page\", \"teacher/list/page\"]', 'teacher/edit/*', NULL, 5, 1, NULL, NULL),
(15, 'Teacher List', NULL, 'teacher/list/page', '[\"teacher/list/page\"]', NULL, 14, 1, 1, NULL, NULL),
(16, 'Teacher Add', NULL, 'teacher/add/page', '[\"teacher/add/page\"]', NULL, 14, 2, 1, NULL, NULL),
(17, 'Teacher Edit', NULL, NULL, '[]', 'teacher/edit/*', 14, 3, 1, NULL, NULL),
(18, 'Departments', 'fas fa-building', NULL, '[\"department/list/page\"]', NULL, NULL, 6, 1, NULL, NULL),
(19, 'Department List', NULL, 'department/list/page', '[\"department/list/page\"]', NULL, 18, 1, 1, NULL, NULL),
(20, 'Department Add', NULL, 'department/add/page', '[\"department/add/page\"]', NULL, 18, 2, 1, NULL, NULL),
(21, 'Subjects', 'fas fa-book-reader', NULL, '[\"subject/list/page\"]', NULL, NULL, 7, 1, NULL, NULL),
(22, 'Subject List', NULL, 'subject/list/page', '[\"subject/list/page\"]', NULL, 21, 1, 1, NULL, NULL),
(23, 'Subject Add', NULL, 'subject/add/page', '[\"subject/add/page\"]', NULL, 21, 2, 1, NULL, NULL),
(24, 'Invoices', 'fas fa-clipboard', NULL, '[\"invoice/list/page\"]', NULL, NULL, 8, 1, NULL, NULL),
(25, 'Invoices List', NULL, 'invoice/list/page', '[\"invoice/list/page\"]', NULL, 24, 1, 1, NULL, NULL),
(26, 'Add Invoice', NULL, 'invoice/add/page', '[\"invoice/add/page\"]', NULL, 24, 2, 1, NULL, NULL),
(27, 'Accounts', 'fas fa-file-invoice-dollar', NULL, '[\"account/fees/collections/page\"]', NULL, NULL, 9, 1, NULL, NULL),
(28, 'Fees Collection', NULL, 'account/fees/collections/page', '[\"account/fees/collections/page\"]', NULL, 27, 1, 1, NULL, NULL),
(29, 'Expenses', NULL, NULL, '[]', NULL, 27, 2, 1, NULL, NULL),
(30, 'Salary', NULL, NULL, '[]', NULL, 27, 3, 1, NULL, NULL),
(31, 'Add Fees', NULL, 'add/fees/collection/page', '[\"add/fees/collection/page\"]', NULL, 27, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_08_12_000000_create_users_table', 1),
(2, '2022_08_03_061844_create_user_types_table', 1),
(3, '2022_08_03_061918_create_role_type_users_table', 1),
(4, '2023_02_26_224452_create_students_table', 1),
(5, '2023_04_17_223959_create_teachers_table', 1),
(6, '2023_10_15_120501_create_subjects_table', 1),
(7, '2023_11_06_120643_create_departments_table', 1),
(8, '2023_12_03_013131_create_invoice_customer_names_table', 1),
(9, '2023_12_03_013232_create_invoice_details_table', 1),
(10, '2023_12_03_013327_create_invoice_payment_details_table', 1),
(11, '2023_12_03_013436_create_invoice_total_amounts_table', 1),
(12, '2023_12_03_013554_create_invoice_additional_charges_table', 1),
(13, '2023_12_03_013631_create_invoice_discounts_table', 1),
(14, '2024_03_10_025955_create_fees_types_table', 1),
(15, '2024_03_13_104555_create_fees_information_table', 1),
(16, '2024_11_24_054324_create_menus_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_type_users`
--

DROP TABLE IF EXISTS `role_type_users`;
CREATE TABLE IF NOT EXISTS `role_type_users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_type_users`
--

INSERT INTO `role_type_users` (`id`, `role_type`, `created_at`, `updated_at`) VALUES
(1, 'User', NULL, NULL),
(2, 'Accountant', NULL, NULL),
(3, 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `name`, `gender`, `date_of_birth`, `roll`, `blood_group`, `religion`, `email`, `class`, `section`, `admission_id`, `phone`, `file`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Suchona Akter', 'Female', '09-12-2025', '23456543', 'B+', 'Others', 'sa@gmail.com', '11', 'B', '2345', '8801837632991', '', '2025-12-09 04:38:32', '2025-12-10 03:23:47'),
(2, NULL, 'Abuls', 'Male', '10-12-2025', '23456543', 'B+', 'Muslim', 'sa@gmail.com', '9', 'B', NULL, '8801837632991', 'student-69395445aa583-10_12_2025.png', '2025-12-10 04:12:27', '2025-12-10 05:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `full_name`, `gender`, `date_of_birth`, `qualification`, `religion`, `phone`, `address`, `city`, `email`, `blood_group`, `country`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Mims', 'Female', '10-12-2025', NULL, 'Christian', '8801837632991', NULL, NULL, 'sa@gmail.com', 'B+', NULL, '2025-12-10 05:55:52', '2025-12-10 06:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `date_of_birth`, `join_date`, `phone`, `status`, `role_name`, `avatar`, `position`, `department`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '000001', 'Md Anisur Rahaman', 'anasbinsabiet@gmail.com', '10-12-2025', 'Tue, Dec 9, 2025 10:35 AM', '8801837632991', 'Active', 'Admin', 'user-693a67ee51c93-11_12_2025.png', 'mn', 'mngjhmgjh', NULL, '$2y$10$sXY4PrhkBbfTjdoT2gO6YOpaZGN9Mk5/0nDMmtksDeoCSmwXmqesa', NULL, '2025-12-09 04:35:47', '2025-12-11 00:42:54'),
(2, '000002', 'Akkas', 'akkas@gmail.com', '10-12-2025', NULL, '01458779965', 'Inactive', 'Admin', 'user-693a6c68795e3-11_12_2025.png', 'mn', 'mngjhmgjh', NULL, '$2y$10$8nYVm4UZA1qwyn1nHxdTc.vPDDVJIKDEDI6XSGjufscmBzgF2SEk6', NULL, '2025-12-11 01:02:00', '2025-12-11 01:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
CREATE TABLE IF NOT EXISTS `user_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Active', NULL, NULL),
(2, 'Inactive', NULL, NULL),
(3, 'Disable', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
