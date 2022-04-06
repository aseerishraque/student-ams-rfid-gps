-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2021 at 03:00 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_gps_versity`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
CREATE TABLE IF NOT EXISTS `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `is_present` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `classroom_id`, `student_id`, `date`, `is_present`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-08-01', 1, '2021-08-10 13:19:42', '2021-08-10 13:19:42'),
(2, 1, 2, '2021-08-02', 1, '2021-08-10 13:19:42', '2021-08-10 13:19:42'),
(3, 1, 2, '2021-08-03', 1, '2021-08-10 13:19:42', '2021-08-10 13:19:42'),
(4, 1, 2, '2021-08-04', 1, '2021-08-10 13:19:42', '2021-08-10 13:19:42'),
(5, 1, 2, '2021-08-19', 1, '2021-10-01 11:55:01', '2021-10-01 11:55:01'),
(6, 1, 3, '2021-08-19', 1, '2021-10-01 11:55:01', '2021-10-01 11:55:01'),
(7, 1, 4, '2021-08-19', 0, '2021-10-01 11:55:01', '2021-10-01 11:55:01'),
(8, 1, 5, '2021-08-19', 1, '2021-10-01 11:55:01', '2021-10-01 11:55:01'),
(9, 1, 6, '2021-08-19', 0, '2021-10-01 11:55:01', '2021-10-01 11:55:01'),
(10, 1, 7, '2021-08-19', 1, '2021-10-01 11:55:01', '2021-10-01 11:55:01'),
(11, 1, 8, '2021-08-19', 1, '2021-10-01 11:55:01', '2021-10-01 11:55:01'),
(12, 1, 9, '2021-08-19', 1, '2021-10-01 11:55:01', '2021-10-01 11:55:01'),
(13, 1, 10, '2021-08-19', 0, '2021-10-01 11:55:01', '2021-10-01 11:55:01'),
(14, 1, 11, '2021-08-19', 1, '2021-10-01 11:55:01', '2021-10-01 11:55:01'),
(15, 1, 2, '2021-08-07', 0, '2021-10-01 11:55:37', '2021-10-01 11:55:37'),
(16, 1, 3, '2021-08-07', 0, '2021-10-01 11:55:37', '2021-10-01 11:55:37'),
(17, 1, 4, '2021-08-07', 0, '2021-10-01 11:55:37', '2021-10-01 11:55:37'),
(18, 1, 5, '2021-08-07', 1, '2021-10-01 11:55:37', '2021-10-01 11:55:37'),
(19, 1, 6, '2021-08-07', 1, '2021-10-01 11:55:37', '2021-10-01 11:55:37'),
(20, 1, 7, '2021-08-07', 1, '2021-10-01 11:55:37', '2021-10-01 11:55:37'),
(21, 1, 8, '2021-08-07', 1, '2021-10-01 11:55:37', '2021-10-01 11:55:37'),
(22, 1, 9, '2021-08-07', 1, '2021-10-01 11:55:37', '2021-10-01 11:55:37'),
(23, 1, 10, '2021-08-07', 1, '2021-10-01 11:55:37', '2021-10-01 11:55:37'),
(24, 1, 11, '2021-08-07', 1, '2021-10-01 11:55:37', '2021-10-01 11:55:37'),
(25, 1, 2, '2021-08-15', 1, '2021-10-01 11:55:54', '2021-10-01 11:55:54'),
(26, 1, 3, '2021-08-15', 1, '2021-10-01 11:55:54', '2021-10-01 11:55:54'),
(27, 1, 4, '2021-08-15', 1, '2021-10-01 11:55:54', '2021-10-01 11:55:54'),
(28, 1, 5, '2021-08-15', 1, '2021-10-01 11:55:54', '2021-10-01 11:55:54'),
(29, 1, 6, '2021-08-15', 1, '2021-10-01 11:55:54', '2021-10-01 11:55:54'),
(30, 1, 7, '2021-08-15', 1, '2021-10-01 11:55:54', '2021-10-01 11:55:54'),
(31, 1, 8, '2021-08-15', 1, '2021-10-01 11:55:54', '2021-10-01 11:55:54'),
(32, 1, 9, '2021-08-15', 1, '2021-10-01 11:55:54', '2021-10-01 11:55:54'),
(33, 1, 10, '2021-08-15', 1, '2021-10-01 11:55:54', '2021-10-01 11:55:54'),
(34, 1, 11, '2021-08-15', 1, '2021-10-01 11:55:54', '2021-10-01 11:55:54'),
(35, 1, 2, '2021-08-17', 1, '2021-10-01 11:56:06', '2021-10-01 11:56:06'),
(36, 1, 3, '2021-08-17', 1, '2021-10-01 11:56:06', '2021-10-01 11:56:06'),
(37, 1, 4, '2021-08-17', 1, '2021-10-01 11:56:06', '2021-10-01 11:56:06'),
(38, 1, 5, '2021-08-17', 0, '2021-10-01 11:56:06', '2021-10-01 11:56:06'),
(39, 1, 6, '2021-08-17', 1, '2021-10-01 11:56:06', '2021-10-01 11:56:06'),
(40, 1, 7, '2021-08-17', 1, '2021-10-01 11:56:06', '2021-10-01 11:56:06'),
(41, 1, 8, '2021-08-17', 1, '2021-10-01 11:56:06', '2021-10-01 11:56:06'),
(42, 1, 9, '2021-08-17', 1, '2021-10-01 11:56:06', '2021-10-01 11:56:06'),
(43, 1, 10, '2021-08-17', 0, '2021-10-01 11:56:06', '2021-10-01 11:56:06'),
(44, 1, 11, '2021-08-17', 1, '2021-10-01 11:56:06', '2021-10-01 11:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

DROP TABLE IF EXISTS `classrooms`;
CREATE TABLE IF NOT EXISTS `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_days` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `join_code` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_msg_guardian` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `user_id`, `name`, `section`, `working_days`, `marks`, `join_code`, `send_msg_guardian`, `created_at`, `updated_at`) VALUES
(1, 1, 'Class 9', 'A', 32, 100, '668QVC', 1, '2021-08-05 09:47:21', '2021-10-01 11:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

DROP TABLE IF EXISTS `enrollments`;
CREATE TABLE IF NOT EXISTS `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `classroom_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(2, 1, 3, '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(3, 1, 4, '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(4, 1, 5, '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(5, 1, 6, '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(6, 1, 7, '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(7, 1, 8, '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(8, 1, 9, '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(9, 1, 10, '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(10, 1, 11, '2021-08-10 12:08:02', '2021-08-10 12:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_approvals`
--

DROP TABLE IF EXISTS `leave_approvals`;
CREATE TABLE IF NOT EXISTS `leave_approvals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approve` tinyint(4) NOT NULL DEFAULT '0',
  `start_date` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(60, '2014_10_12_000000_create_users_table', 1),
(61, '2014_10_12_100000_create_password_resets_table', 1),
(62, '2019_08_19_000000_create_failed_jobs_table', 1),
(63, '2021_08_01_152402_create_permission_tables', 1),
(64, '2021_08_04_151053_create_classrooms_table', 1),
(65, '2021_08_05_062125_create_enrollments_table', 1),
(66, '2021_08_05_155229_create_attendances_table', 1),
(67, '2021_08_10_160243_create_leave_approvals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', 1),
(3, 'App\\User', 2),
(3, 'App\\User', 3),
(3, 'App\\User', 4),
(3, 'App\\User', 5),
(3, 'App\\User', 6),
(3, 'App\\User', 7),
(3, 'App\\User', 8),
(3, 'App\\User', 9),
(3, 'App\\User', 10),
(3, 'App\\User', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'web', 'dashboard', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(2, 'dashboard.edit', 'web', 'dashboard', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(3, 'blog.create', 'web', 'blog', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(4, 'blog.view', 'web', 'blog', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(5, 'blog.edit', 'web', 'blog', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(6, 'blog.delete', 'web', 'blog', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(7, 'blog.approve', 'web', 'blog', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(8, 'admin.create', 'web', 'admin', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(9, 'admin.view', 'web', 'admin', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(10, 'admin.edit', 'web', 'admin', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(11, 'admin.delete', 'web', 'admin', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(12, 'admin.approve', 'web', 'admin', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(13, 'role.create', 'web', 'Role', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(14, 'role.view', 'web', 'Role', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(15, 'role.edit', 'web', 'Role', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(16, 'role.delete', 'web', 'Role', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(17, 'role.approve', 'web', 'Role', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(18, 'profile.view', 'web', 'profile', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(19, 'profile.edit', 'web', 'profile', '2021-08-10 12:08:01', '2021-08-10 12:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(2, 'superadmin', 'web', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(3, 'student', 'web', '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(4, 'guardian', 'web', '2021-08-10 12:08:01', '2021-08-10 12:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aseer Ishraqul Hoque', 'admin', 'aseer@gmail.com', NULL, '$2y$10$HsuBHMPe30Wl3I3VPNbATuWDONj7ZZ9WBDGsG9N0nYNZ6Nq4RVBhu', NULL, '2021-08-10 12:08:01', '2021-08-10 12:08:01'),
(2, 'Eldora Brown', 'student', 'patsy.moen@example.org', '2021-08-10 12:08:02', '$2y$10$ciMVW5T6fsopB5XnF3jptuDMkRpadaQh4K7XSSjhl3cihC6q6QsU.', '7gNQkVmmrV7RNdap7wKqtdRXrxRZoAjssFnqcT6h4thYMrhcFwCMovAmKW6U', '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(3, 'Eleanore Jones', 'russel.jayme', 'lbraun@example.net', '2021-08-10 12:08:02', '$2y$10$80AQ.1TFt2BwVZwYWK9aNulwhv533K0edLkxiqETXSkKvFTNQ.p5S', 'Ttz0fK7Kk1', '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(4, 'Olaf Conn II', 'nicholaus58', 'reichert.nicklaus@example.org', '2021-08-10 12:08:02', '$2y$10$MqEbsLm53YhFqVHxYY.G0OsV.4LQ/cWgo736uEVfvorxCClPE2H0W', 'kJnoj9VS9b', '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(5, 'Mr. Angus Klein', 'danika.johnson', 'langworth.kenneth@example.net', '2021-08-10 12:08:02', '$2y$10$xggKKbe7drORzUwrj0NM3.zTxu52MQTnIn.elmGx1SjxsgqPZ4ynC', 'i2b6PFJPfs', '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(6, 'Ole Lynch', 'emile52', 'melyna.upton@example.com', '2021-08-10 12:08:02', '$2y$10$NC1mDPuQs303If6RZDrm4emRHZhYPDxblZRZn7XBJ.voh9QGDvhGC', 'MWYlb8P5Ob', '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(7, 'Prof. Hipolito Cormier PhD', 'sharon.kozey', 'ole.graham@example.org', '2021-08-10 12:08:02', '$2y$10$4efA9zNVerxKW78K.4bqb.1X26kMSAD4vPCpAsgEl5sDsY/yhlCqW', '2Fx6dxvkiw', '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(8, 'Ms. Lila Powlowski', 'sarah.sporer', 'amelia.ward@example.org', '2021-08-10 12:08:02', '$2y$10$mDEvuiKsf80t53XD/WrhHO3cAs2rxVmOEka/FAVYoODRM650OfK5C', 'M8Q0SmCfIk', '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(9, 'Bridie Daniel DVM', 'rhoppe', 'eva15@example.net', '2021-08-10 12:08:02', '$2y$10$yfD5BQLjdeMyNcqUnw7PCeazmbWWWL/xyZ.Bneq9TEXHWd9YdQ2ym', 'iswhRdijmP', '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(10, 'Mr. Lucious Bashirian', 'bonita.auer', 'alvah.homenick@example.com', '2021-08-10 12:08:02', '$2y$10$l0v5lm3otUeDL/haqA8Azu.9G1QQb22nA5g2K5kQawpQmah33V6.y', '6fBaGQdSIh', '2021-08-10 12:08:02', '2021-08-10 12:08:02'),
(11, 'Dr. Wayne Schoen II', 'nconroy', 'ruth.kunde@example.com', '2021-08-10 12:08:02', '$2y$10$m3fp1Vs9ApdOpTtCdAP18.Ac8Jvox83o/108XzmlNVXrZnXLeCMdy', 'An46B9ijuh', '2021-08-10 12:08:02', '2021-08-10 12:08:02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
