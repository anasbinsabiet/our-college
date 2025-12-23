-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2025 at 10:51 PM
-- Server version: 10.11.15-MariaDB
-- PHP Version: 8.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jhaudiak_bored`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'National Bank PLC ', NULL, NULL, NULL),
(2, 'Trust Bank PLC ', NULL, NULL, NULL),
(3, 'Sonali Bank PLC', NULL, NULL, NULL),
(4, 'Agrani Bank PLC', NULL, NULL, NULL),
(5, 'Dutch Bangla Bank', NULL, NULL, NULL),
(6, 'Bkash', NULL, NULL, NULL),
(7, 'Nagad', NULL, NULL, NULL),
(8, 'Others', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `fees_type` varchar(255) DEFAULT NULL,
  `collection_type` varchar(10) DEFAULT NULL,
  `fees_amount` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `paid_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `student_id`, `bank_id`, `gender`, `fees_type`, `collection_type`, `fees_amount`, `file`, `paid_date`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '1', 4, NULL, 'Exam Fees', NULL, '500', 'collection-6942aa3e799f0-17_12_2025.png', '10-12-2025', '2025-12-09 23:34:47', '2025-12-17 18:04:19', NULL, NULL),
(2, '1', NULL, NULL, 'Exam Fees', NULL, '1200', NULL, '10-12-2025', '2025-12-09 23:46:56', '2025-12-09 23:46:56', NULL, NULL),
(3, '1', NULL, NULL, 'Tuition Fees', NULL, '1200', NULL, '10-12-2025', '2025-12-09 23:48:14', '2025-12-09 23:48:14', NULL, NULL),
(4, '1', NULL, NULL, 'Exam Fees', NULL, '1200', NULL, '10-12-2025', '2025-12-09 23:56:17', '2025-12-09 23:56:17', NULL, NULL),
(5, '1', NULL, NULL, 'Tuition Fees', NULL, '500', NULL, '10-12-2025', '2025-12-10 00:03:16', '2025-12-10 00:03:16', NULL, NULL),
(6, '1', NULL, NULL, 'Tuition Fees', NULL, '500', 'uploads69390e2a22deb.jpg', '10-12-2025', '2025-12-10 00:07:38', '2025-12-10 00:07:38', NULL, NULL),
(7, '1', NULL, NULL, 'Exam Fees', NULL, '1200', 'uploads69390e9963275.pdf', '10-12-2025', '2025-12-10 00:09:29', '2025-12-10 00:09:29', NULL, NULL),
(8, '1', NULL, NULL, 'Exam Fees', NULL, '1200', NULL, '10-12-2025', '2025-12-10 00:29:32', '2025-12-10 00:29:32', NULL, NULL),
(9, '1', NULL, NULL, 'Exam Fees', NULL, '500', NULL, '10-12-2025', '2025-12-10 00:29:45', '2025-12-10 00:29:45', NULL, NULL),
(10, '1', NULL, NULL, 'Exam Fees', NULL, '500', NULL, '10-12-2025', '2025-12-10 00:29:52', '2025-12-10 00:29:52', NULL, NULL),
(11, '1', NULL, NULL, 'Tuition Fees', NULL, '500', NULL, '10-12-2025', '2025-12-10 00:29:59', '2025-12-10 00:29:59', NULL, NULL),
(12, '1', NULL, NULL, '2', NULL, '4560', 'collection-6939507ae5875-10_12_2025.pdf', '10-12-2025', '2025-12-10 00:57:14', '2025-12-17 17:52:22', NULL, NULL),
(13, NULL, 3, NULL, NULL, 'Bank', NULL, 'collection-6943fe3ce95eb-18_12_2025.png', '18-12-2025', '2025-12-18 12:55:27', '2025-12-18 18:14:36', NULL, NULL),
(14, NULL, 3, NULL, NULL, 'Office', NULL, 'collection-6943b71e6fc1a-18_12_2025.png', '18-12-2025', '2025-12-18 13:11:10', '2025-12-18 13:11:10', NULL, NULL),
(15, NULL, 2, NULL, NULL, 'Bank', NULL, 'collection-6943cb22eeaa4-18_12_2025.pdf', '18-12-2025', '2025-12-18 14:36:34', '2025-12-18 14:36:34', NULL, NULL),
(16, NULL, 3, NULL, NULL, 'Bank', NULL, 'collection-6943fe9c789dc-18_12_2025.pdf', '18-12-2025', '2025-12-18 18:16:12', '2025-12-18 18:16:12', NULL, NULL),
(17, NULL, 5, NULL, NULL, 'Bank', NULL, 'collection-6943fee779118-18_12_2025.pdf', '18-12-2025', '2025-12-18 18:17:27', '2025-12-18 18:17:27', NULL, NULL),
(18, NULL, 3, NULL, NULL, 'Bank', NULL, 'collection-6943ff8a207e9-18_12_2025.pdf', '18-12-2025', '2025-12-18 18:20:10', '2025-12-18 18:20:10', NULL, NULL),
(19, NULL, 2, NULL, NULL, 'Bank', NULL, 'collection-6943ffbdc0ff5-18_12_2025.png', '18-12-2025', '2025-12-18 18:21:01', '2025-12-18 18:21:01', NULL, NULL),
(20, NULL, 3, NULL, NULL, 'Bank', NULL, 'collection-69440068f0898-18_12_2025.PNG', '18-12-2025', '2025-12-18 18:23:52', '2025-12-18 18:23:52', NULL, NULL),
(21, NULL, 3, NULL, NULL, 'Bank', NULL, 'collection-694400811b48f-18_12_2025.pdf', '18-12-2025', '2025-12-18 18:24:17', '2025-12-18 18:24:17', NULL, NULL),
(22, NULL, 6, NULL, NULL, 'Bank', NULL, 'collection-69443ea993f9d-18_12_2025.jpg', '18-12-2025', '2025-12-18 22:49:29', '2025-12-18 22:49:29', NULL, NULL),
(23, NULL, 8, NULL, NULL, 'Bank', NULL, 'collection-69452638d2d37-19_12_2025.pdf', '19-12-2025', '2025-12-19 15:17:28', '2025-12-19 15:17:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `message`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'mr test', '01312638606', 'anas@hbdservices.com', 'cvbcfg', NULL, NULL, '2025-12-17 15:15:00', '2025-12-17 15:15:00'),
(3, 'mr test', '01312638606', 'anas@hbdservices.com', 'sdcvsf', NULL, NULL, '2025-12-17 17:28:37', '2025-12-17 17:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` varchar(255) DEFAULT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `head_of_department` varchar(255) DEFAULT NULL,
  `department_start_date` varchar(255) DEFAULT NULL,
  `no_of_students` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_types`
--

CREATE TABLE `fees_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fees_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `active_routes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`active_routes`)),
  `pattern` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `file`, `department`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'xcdv xdf', 'notice-693a9f51834d9-11122025.png', 'xv dfdfg', 1, NULL, '2025-12-11 04:39:13', '2025-12-11 04:39:13'),
(2, 'sxdcvsdf', 'collection-694405552148c-18_12_2025.png', 'mngjhmgjh', 1, NULL, '2025-12-18 18:44:53', '2025-12-18 18:44:53'),
(3, 'zxdvdfv', 'collection-69440584bee86-18_12_2025.png', 'mngjhmgjh', 1, NULL, '2025-12-18 18:45:40', '2025-12-18 18:45:40');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_type`, `created_at`, `updated_at`) VALUES
(1, 'User', NULL, NULL),
(2, 'Accountant', NULL, NULL),
(3, 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `chairman_avatar` varchar(255) DEFAULT NULL,
  `chairman_name` varchar(100) DEFAULT NULL,
  `chairman_designation` varchar(50) DEFAULT NULL,
  `chairman_message` text DEFAULT NULL,
  `principal_avatar` varchar(255) DEFAULT NULL,
  `principal_name` varchar(100) DEFAULT NULL,
  `principal_designation` varchar(50) DEFAULT NULL,
  `principal_message` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `description`, `logo`, `favicon`, `banner`, `phone`, `mobile`, `email`, `address`, `chairman_avatar`, `chairman_name`, `chairman_designation`, `chairman_message`, `principal_avatar`, `principal_name`, `principal_designation`, `principal_message`, `mission`, `vision`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Madhobdi College', 'Madhobdi College of Narsingdi, Bangladesh', 'logo-6944036b3a59f.png', 'favicon-693aa52b359e2.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2025-12-11 04:54:55', '2025-12-18 18:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `roll` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `semester` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `name`, `gender`, `date_of_birth`, `roll`, `blood_group`, `religion`, `email`, `class`, `section`, `department`, `phone`, `file`, `created_at`, `updated_at`, `semester`) VALUES
(1, NULL, 'Suchona Akter', 'Female', '09-12-2025', '23456543', 'B+', 'Others', 'sa@gmail.com', '11', 'B', '2345', '8801837632991', '', '2025-12-09 04:38:32', '2025-12-10 03:23:47', NULL),
(2, NULL, 'Abuls', 'Male', '10-12-2025', '23456543', 'B+', 'Muslim', 'sa@gmail.com', '9', 'B', NULL, '8801837632991', 'student-69395445aa583-10_12_2025.png', '2025-12-10 04:12:27', '2025-12-10 05:06:45', NULL),
(3, NULL, 'Izhan Muhammad', 'Male', '25-02-2023', '111657', 'B+', 'Muslim', 'izhan@gmail.com', '6', 'A', NULL, '0', NULL, '2025-12-13 10:35:06', '2025-12-13 10:35:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` varchar(255) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`id`, `title`, `file`, `department`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(8, 'ZXc zsdc', 'syllabus-694406e7afe17-18_12_2025.png', 'xx', 1, NULL, '2025-12-18 18:51:35', '2025-12-18 18:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `leaving_date` date DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `created_by`, `name`, `gender`, `date_of_birth`, `joining_date`, `leaving_date`, `religion`, `phone`, `address`, `status`, `email`, `blood_group`, `country`, `designation`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, NULL, 'Hamidur Rahaman', 'Male', '2020-11-20', '2020-11-20', '2020-12-20', 'Muslim', '8801837632991', 'Quia velit esse sae', 'Active', 'sa@gmail.com', 'B+', NULL, 'Assistant Professor', '2025-12-10 05:55:52', '2025-12-19 09:56:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `join_date` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Inactive',
  `role_name` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `date_of_birth`, `join_date`, `phone`, `status`, `role_name`, `avatar`, `position`, `department`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '000001', 'Md Anisur Rahaman', 'anasbinsabiet@gmail.com', '10-12-2025', 'Tue, Dec 9, 2025 10:35 AM', '01837632991', 'Active', 'Admin', 'user-694404905d310-18_12_2025.png', 'mn', 'mngjhmgjh', NULL, '$2y$10$qikbsGgJSpVJC6Z4/z4BdepqFm7HYE2pTy5qknYdyK1XjA4uvoZTy', NULL, '2025-12-09 04:35:47', '2025-12-18 18:41:36'),
(10, '000010', 'User', 'user@gmail.com', NULL, 'Thu, Dec 18, 2025 6:07 PM', NULL, 'Active', 'User', 'photo_defaults.png', NULL, NULL, NULL, '$2y$10$14DxTbwLqeTG7IRlUyp6u.hdgwB2NDyaqfRLb6qNUbo19h42QXbq2', NULL, '2025-12-18 23:07:20', '2025-12-18 23:07:45'),
(4, '000004', 'Argin Akter', 'arginaakter@gmail.com', NULL, 'Sat, Dec 13, 2025 4:09 AM', NULL, 'Active', 'User', 'photo_defaults.png', NULL, NULL, NULL, '$2y$10$l8QflWJocRfs/TQFgru5kOkVuxaFmeXdGG87irgBC0KQYLKiMWD6S', NULL, '2025-12-13 09:09:55', '2025-12-16 09:43:07'),
(9, '000009', 'Banking System', 'bankingsystem@gmail.com', NULL, 'Wed, Dec 17, 2025 12:30 PM', NULL, 'Active', 'Accountant', 'photo_defaults.png', NULL, NULL, NULL, '$2y$10$8ie7y2hKQiQieGwsaGXu6umyjdzwvs.pRlrJ.Cbu25gljhnCSAq7a', NULL, '2025-12-17 17:30:07', '2025-12-17 17:30:27'),
(6, '000006', 'sumaiya', 'sumaiya@gmail.com', NULL, 'Mon, Dec 15, 2025 9:31 AM', NULL, 'Active', 'User', 'photo_defaults.png', NULL, NULL, NULL, '$2y$10$uPUR.35TM5E9g48jvp9fN.MHaCZqRpg4vHqb8EJQW5nO6O42sLLB.', NULL, '2025-12-15 14:31:25', '2025-12-16 09:38:59'),
(7, '000007', 'Kamal Ahmed', 'madhabdicollege73@gmail.com', NULL, 'Tue, Dec 16, 2025 4:22 AM', NULL, 'Active', 'Admin', 'photo_defaults.png', NULL, NULL, NULL, '$2y$10$MWAbEWNKs.Fh3vhtnoakceQEeW29MepQp/l6P5oNqFhYmA3lbhg4.', NULL, '2025-12-16 09:22:13', '2025-12-16 09:35:24'),
(8, '000008', 'Argina Akter', 'arginaakter001@gmail.com', NULL, 'Tue, Dec 16, 2025 4:45 AM', NULL, 'Active', 'User', 'photo_defaults.png', NULL, NULL, NULL, '$2y$10$zhTjbLfIkGHhM15VdGmA6uflJLVi9bMq7xlom3omml.aP9E0nx3IW', NULL, '2025-12-16 09:45:27', '2025-12-16 09:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Active', NULL, NULL),
(2, 'Inactive', NULL, NULL),
(3, 'Disable', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_email_index` (`email`),
  ADD KEY `contacts_created_by_index` (`created_by`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_types`
--
ALTER TABLE `fees_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_types`
--
ALTER TABLE `fees_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
