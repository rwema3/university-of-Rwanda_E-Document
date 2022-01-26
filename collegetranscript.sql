-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 24, 2022 at 02:23 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collegetranscript`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_levels`
--

CREATE TABLE `academic_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_levels`
--

INSERT INTO `academic_levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Level 1', '2022-01-05 10:18:37', '2022-01-05 10:18:37'),
(2, 'Level 2', '2022-01-05 10:18:37', '2022-01-05 10:18:37'),
(3, 'Level 3', '2022-01-05 10:20:12', '2022-01-05 10:20:12'),
(4, 'Level 4', '2022-01-05 10:20:12', '2022-01-05 10:20:12'),
(5, 'Level 5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stamp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `name`, `stamp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CST', '16412103421640639735stamp.jpeg', 1, '2022-01-03 09:45:42', '2022-01-03 09:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `dean_of_schools`
--

CREATE TABLE `dean_of_schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

CREATE TABLE `departements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stamp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `school_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departements`
--

INSERT INTO `departements` (`id`, `name`, `stamp`, `status`, `school_id`, `college_id`, `created_at`, `updated_at`) VALUES
(1, 'Computer science', '16412104061640639698approved.jpeg', 1, 1, 1, '2022-01-03 09:46:46', '2022-01-03 09:46:46'),
(2, 'IS', '16412968801640639698approved.jpeg', 1, 1, 1, '2022-01-04 09:48:00', '2022-01-04 09:48:00'),
(3, 'IT', '16413886141640639735stamp.jpeg', 1, 1, 1, '2022-01-05 11:16:54', '2022-01-05 11:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `departement_action_requests`
--

CREATE TABLE `departement_action_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `staffrequest_id` int(11) NOT NULL,
  `sansation` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `actionDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `head_of_departements`
--

CREATE TABLE `head_of_departements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `departement_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marks` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `marks`, `user_id`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 80, 7, 1, '2022-01-04 06:49:23', '2022-01-04 06:49:23'),
(4, 54, 7, 3, '2022-01-05 12:12:38', '2022-01-05 12:12:38'),
(5, 60, 7, 4, '2022-01-05 12:13:07', '2022-01-05 12:13:07'),
(6, 80, 11, 3, '2022-01-14 08:23:30', '2022-01-14 08:23:30'),
(7, 70, 8, 3, '2022-01-24 10:07:58', '2022-01-24 10:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(35, '2014_10_12_000000_create_users_table', 1),
(36, '2014_10_12_100000_create_password_resets_table', 1),
(37, '2019_08_19_000000_create_failed_jobs_table', 1),
(38, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(39, '2021_06_28_111115_create_colleges_table', 1),
(40, '2021_07_19_235728_create_schools_table', 1),
(41, '2021_07_20_001009_create_departements_table', 1),
(42, '2021_08_27_134858_create_head_of_departements_table', 1),
(43, '2021_08_28_225713_create_dean_of_schools_table', 1),
(44, '2021_09_02_171624_create_departement_action_requests_table', 1),
(45, '2021_12_27_174631_laratrust_setup_tables', 1),
(46, '2021_12_27_223943_create_modules_table', 1),
(47, '2021_12_28_041519_create_transcript_requests_table', 1),
(48, '2021_12_28_094225_create_payment_orders_table', 1),
(49, '2021_12_28_143642_create_marks_table', 1),
(50, '2022_01_05_041512_create_academic_levels_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `credits` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `departement_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `code`, `level`, `credits`, `semester`, `user_id`, `departement_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Math', 'MATH2532', 1, 10, 1, 2, 1, 1, '2022-01-03 16:25:58', '2022-01-03 16:25:58'),
(2, 'Java', 'JV2532', 2, 10, 2, 9, 2, 1, '2022-01-05 11:21:23', '2022-01-05 11:21:23'),
(3, 'Data Structure & Argorithm', 'DSA2134', 2, 10, 1, 2, 1, 1, '2022-01-05 12:04:37', '2022-01-05 12:04:37'),
(4, 'Web design', 'WBD321', 2, 10, 2, 2, 1, 1, '2022-01-05 12:05:18', '2022-01-05 12:05:18'),
(5, 'software development', 'CSC345', 2, 10, 1, 13, 1, 1, '2022-01-24 09:51:38', '2022-01-24 09:51:38'),
(6, 'software development', 'CSC345', 2, 10, 2, 2, 1, 1, '2022-01-24 10:06:22', '2022-01-24 10:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_orders`
--

CREATE TABLE `payment_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `amaunt` int(11) NOT NULL,
  `telphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_request_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDUNG',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(2, 'users-read', 'Read Users', 'Read Users', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(3, 'users-update', 'Update Users', 'Update Users', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(11, 'module_1_name-create', 'Create Module_1_name', 'Create Module_1_name', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(12, 'module_1_name-read', 'Read Module_1_name', 'Read Module_1_name', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(13, 'module_1_name-update', 'Update Module_1_name', 'Update Module_1_name', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(14, 'module_1_name-delete', 'Delete Module_1_name', 'Delete Module_1_name', '2022-01-03 09:42:53', '2022-01-03 09:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(11, 6),
(12, 6),
(13, 6),
(14, 6);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'Administrator', 'Administrator', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(2, 'lecturer', 'Lecturer', 'Lecturer', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(3, 'hod', 'Hod', 'Hod', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(4, 'hof', 'Hof', 'Hof', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(5, 'user', 'User', 'User', '2022-01-03 09:42:53', '2022-01-03 09:42:53'),
(6, 'role_name', 'Role Name', 'Role Name', '2022-01-03 09:42:53', '2022-01-03 09:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 2, 'App\\Models\\User'),
(3, 3, 'App\\Models\\User'),
(3, 4, 'App\\Models\\User'),
(3, 5, 'App\\Models\\User'),
(4, 6, 'App\\Models\\User'),
(5, 7, 'App\\Models\\User'),
(5, 8, 'App\\Models\\User'),
(2, 9, 'App\\Models\\User'),
(2, 10, 'App\\Models\\User'),
(5, 11, 'App\\Models\\User'),
(5, 12, 'App\\Models\\User'),
(2, 13, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stamp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `college_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `stamp`, `status`, `college_id`, `created_at`, `updated_at`) VALUES
(1, 'ICT', '16412103711640639735stamp.jpeg', 1, 1, '2022-01-03 09:46:11', '2022-01-03 09:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `transcript_requests`
--

CREATE TABLE `transcript_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UNPAID',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transcript_requests`
--

INSERT INTO `transcript_requests` (`id`, `level`, `payment_status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'PAID', 7, '2022-01-04 12:02:42', '2022-01-04 12:02:42'),
(2, 3, 'UNPAID', 7, '2022-01-05 11:27:30', '2022-01-05 11:27:30'),
(3, 1, 'UNPAID', 7, '2022-01-05 11:29:21', '2022-01-05 11:29:21'),
(4, 1, 'UNPAID', 7, '2022-01-05 15:41:12', '2022-01-05 15:41:12'),
(5, 1, 'UNPAID', 8, '2022-01-06 11:44:00', '2022-01-06 11:44:00'),
(6, 2, 'PAID', 11, '2022-01-14 08:24:56', '2022-01-14 08:24:56'),
(7, 3, 'UNPAID', 12, '2022-01-24 09:44:50', '2022-01-24 09:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `staffCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `cleared_finace` tinyint(1) NOT NULL DEFAULT 0,
  `has_defended` tinyint(1) NOT NULL DEFAULT 0,
  `departement_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `telphone`, `gender`, `profile_pic`, `signature`, `email`, `email_verified_at`, `password`, `status`, `staffCode`, `level_id`, `cleared_finace`, `has_defended`, `departement_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, 'M', NULL, NULL, 'admin@gmail.com', NULL, '$2y$10$cWZ6jiyReSyOlXXyAwJh/Oo50NsyMjbfU83GWo7BWj9JOxy2UAIB.', 1, '12345678', NULL, 0, 0, NULL, NULL, '2022-01-03 09:43:04', '2022-01-06 11:41:45'),
(2, 'KARINGANIRE', 'Anathole', '0783544533', 'M', NULL, '1641289993_KARINGANIRE.png', 'lecture1@gmail.com', NULL, '$2y$10$VaOW8zzDcLdoJgZrISI3bOr6DAOZ0LZyZkzwhwi06wbUHRUVm27pa', 1, '23454678657', NULL, 0, 0, 1, NULL, '2022-01-03 09:47:34', '2022-01-04 07:53:13'),
(3, 'hod1', 'hod', NULL, 'M', NULL, NULL, 'hod1@gmail.com', NULL, '$2y$10$cptWBbPJ3UB60cFDsziaVuskQkyfP7ksU2d0Uhl2hrbo9EjEaQAIy', 1, '23456786570', NULL, 0, 0, 1, NULL, '2022-01-03 09:58:55', '2022-01-03 09:58:55'),
(6, 'fin3', 'fin', NULL, 'M', NULL, NULL, 'fin1@gmail.com', NULL, '$2y$10$PcJIN.jQrbGUUPXCysJgg.yIZidWlUU.KDNfVOnQoQvOp4PGT7eBa', 1, '7856473785', NULL, 0, 0, NULL, NULL, '2022-01-03 10:23:48', '2022-01-03 10:25:07'),
(7, 'student1', 'student', NULL, 'F', '1641478255blog-1.jpg', NULL, 'student1@gmail.com', NULL, '$2y$10$Bmn8Kun44Mwq9rUlIciF9etzB6Gbsvvn3ztFFg0sILyR4X3I48Kw.', 1, '20345678657', 2, 1, 1, 1, NULL, '2022-01-04 03:27:01', '2022-01-20 12:30:16'),
(8, 'student2', 'student', NULL, 'M', NULL, NULL, 'student2@gmail.com', NULL, '$2y$10$6PgWIdCFyIFp1iS8hCpPiePlNQzYr4rsOI0WzZ9ppJZwXEFAoFRAa', 1, '2344678657', 3, 1, 1, 1, NULL, '2022-01-04 09:43:56', '2022-01-24 09:40:23'),
(9, 'lecturer2', 'Lecturer', NULL, 'M', NULL, NULL, 'lecture2@gmail.com', NULL, '$2y$10$3gKx5X1MxdAdboJxawV66OMChzs581JALG28omE8/LPXXJi3xdnYe', 1, 'AD12345678C', NULL, 0, 0, 1, NULL, '2022-01-04 09:54:20', '2022-01-04 09:54:20'),
(10, 'Silas', 'Majyambere', NULL, 'M', NULL, NULL, 'majyasilas@gmail.com', NULL, '$2y$10$8Jv3cMWbNV9PfSoBv9Zx7OAChR2sH9Kz0089x/WC/rGLWdPCHllyS', 1, '234567865789', NULL, 0, 0, 1, NULL, '2022-01-05 11:19:33', '2022-01-05 11:19:33'),
(11, 'student3', 'student', NULL, 'M', '1642688143media.jpg', NULL, 'student3@gmail.com', NULL, '$2y$10$FjIg6u3C10YeWomBdNcEj.gWMuUm57x6Ts8yTd1zOWE3ukWe0PZRu', 1, '2678659765', 3, 1, 1, 1, NULL, '2022-01-14 08:20:46', '2022-01-20 12:15:43'),
(12, 'media', 'kampire', NULL, 'F', NULL, NULL, 'student4@gmail.com', NULL, '$2y$10$aorCR66qadKQxsyf/bhpPOSQX0nrP0fPBT.JHpz9bv6NPW9scgXge', 1, '457899', 4, 0, 0, 1, NULL, '2022-01-24 09:43:39', '2022-01-24 09:43:39'),
(13, 'Gatera', 'alex', NULL, 'M', NULL, NULL, 'alex@gmail.com', NULL, '$2y$10$u/OPI6ol4S4A9EFKlynZ0Od0zy2iv15zpNoIFe24zNZja8lvi7v6q', 1, '6666666', NULL, 0, 0, 1, NULL, '2022-01-24 09:50:12', '2022-01-24 09:50:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_levels`
--
ALTER TABLE `academic_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dean_of_schools`
--
ALTER TABLE `dean_of_schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departement_action_requests`
--
ALTER TABLE `departement_action_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `head_of_departements`
--
ALTER TABLE `head_of_departements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_orders`
--
ALTER TABLE `payment_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transcript_requests`
--
ALTER TABLE `transcript_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_staffcode_unique` (`staffCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_levels`
--
ALTER TABLE `academic_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dean_of_schools`
--
ALTER TABLE `dean_of_schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departement_action_requests`
--
ALTER TABLE `departement_action_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `head_of_departements`
--
ALTER TABLE `head_of_departements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_orders`
--
ALTER TABLE `payment_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transcript_requests`
--
ALTER TABLE `transcript_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
