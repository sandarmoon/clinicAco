-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 08, 2020 at 09:27 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_GP`
--

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nrc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `owner_id`, `user_id`, `nrc`, `age`, `dob`, `degree`, `certificate`, `license`, `experience`, `avatar`, `address`, `phone`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 4, '9/AMZ(n)093211', '25', '2020-03-02', 'DM', '[\"storages\\/doctor\\/certificate\\/5e6b3cbb3e7551584086203.jpg\"]', '[\"storages\\/doctor\\/license\\/5e6b3cbb3eafc1584086203.pdf\"]', 'A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.', 'storages/doctor/profile/5e6b3cbb3ee271584086203.jpg', 'mandalay', '09256574390', NULL, '2020-03-13 01:26:43', '2020-03-13 01:26:43'),
(2, 3, 7, '9/AHMAZA(N)041258', '25', '1996-09-10', 'Master', '[\"storages\\/doctor\\/certificate\\/5f55ddf043db91599462896.jpg\"]', '[\"storages\\/doctor\\/license\\/5f55ddf0442771599462896.jpg\"]', 'A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.', 'storages/doctor/profile/5f55ddf0444151599462896.png', 'hlaing', '0987654234', NULL, '2020-09-07 00:44:56', '2020-09-07 00:44:56');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `files` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicinetype_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chemical` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `medicinetype_id`, `name`, `chemical`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'mmm', 'dfghjkfghj', NULL, '2020-07-25 21:40:56', '2020-07-25 21:40:56'),
(2, 1, 'Bo bo', 'asadfghjkl', NULL, '2020-07-25 21:41:48', '2020-07-25 21:41:48'),
(3, 2, 'injection', 'nothing', NULL, '2020-07-25 21:41:48', '2020-07-25 21:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `medicinetypes`
--

CREATE TABLE `medicinetypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicinetypes`
--

INSERT INTO `medicinetypes` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'oral', NULL, '2020-03-13 01:13:02', '2020-03-13 01:13:02'),
(2, 'injection', NULL, '2020-03-13 01:13:02', '2020-03-13 01:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_treatment`
--

CREATE TABLE `medicine_treatment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `treatment_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `tab` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interval` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `during` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_treatment`
--

INSERT INTO `medicine_treatment` (`id`, `treatment_id`, `medicine_id`, `tab`, `interval`, `meal`, `during`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 2, '3', 'od', 'After', 'good', NULL, NULL, '2020-09-07 00:58:51', '2020-09-07 00:58:51'),
(2, 6, 2, '3', 'bd', 'Before', 'for lung to be large', NULL, NULL, '2020-09-07 08:33:26', '2020-09-07 08:33:26'),
(3, 6, 1, '6', 'qid', 'After', 'for lung to be better shape', NULL, NULL, '2020-09-07 08:33:26', '2020-09-07 08:33:26'),
(4, 6, 3, NULL, NULL, NULL, NULL, 'IM', NULL, '2020-09-07 08:33:26', '2020-09-07 08:33:26');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_02_04_040148_create_medicinetypes_table', 1),
(5, '2020_02_04_040205_create_medicines_table', 1),
(6, '2020_02_04_040423_create_costs_table', 1),
(7, '2020_02_04_040424_create_owners_table', 1),
(8, '2020_02_04_040425_create_receptions_table', 1),
(9, '2020_02_04_040426_create_doctors_table', 1),
(10, '2020_02_04_040427_create_patients_table', 1),
(11, '2020_02_04_040428_create_treatments_table', 1),
(12, '2020_02_04_040429_create_medicine_treatment_table', 1),
(13, '2020_02_18_050834_create_expenses_table', 1),
(14, '2020_02_25_044925_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 3),
(2, 'App\\User', 6),
(3, 'App\\User', 4),
(3, 'App\\User', 7),
(4, 'App\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nrc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clinic_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clinic_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clinic_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `user_id`, `nrc`, `age`, `dob`, `avatar`, `clinic_name`, `clinic_logo`, `clinic_time`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 2, '9/AMZ(n)093211', '25', '2020-03-12', 'storages/owner/5e6b3b8a240111584085898.jpg', 'Thet Paing htut', 'storages/logo/5e6b3b8a2437d1584085898.jpg', '7:00', 'aaaaaaaaaaaaaaaaaaaaaaaaaaa', '09256574390', '2020-03-13 01:21:38', '2020-03-13 01:21:38'),
(2, 3, '9/AMZ(n)093211', '25', '2020-03-15', 'storages/owner/5e6b3bc2c5d971584085954.jpg', 'Kyaw Thein Htay', 'storages/logo/5e6b3bc2c61601584085954.jpg', '7:00', 'mmmmmmmmmmmmmmmmm', '09256574390', '2020-03-13 01:22:34', '2020-03-13 01:22:34'),
(3, 6, '9/AHMAZA(N)041255', '25', '1996-09-16', 'storages/owner/5f55dc35405781599462453.jpg', 'MayKaLar', 'storages/logo/5f55dc35406d11599462453.png', '9-5', 'wireless,yangon', '0987654322', '2020-09-07 00:37:33', '2020-09-07 00:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reception_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fatherName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `child` tinyint(1) NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `married_status` tinyint(1) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `pregnant` tinyint(1) NOT NULL,
  `body_weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allergy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `reception_id`, `name`, `fatherName`, `age`, `child`, `gender`, `phoneno`, `address`, `married_status`, `status`, `pregnant`, `body_weight`, `allergy`, `job`, `file`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hein hein', 'U Mg San', 23, 0, 'female', '22211211345', 'mmmmmmmm', 0, 0, 0, '115', 'dsdaFa', 'Web developer', '[\"storages\\/files\\/158408741918339665095e6b417bc5fd8.jpg\"]', NULL, '2020-03-13 01:46:59', '2020-03-13 01:46:59'),
(2, 1, 'Hein Min', 'U Mg San', 23, 0, 'female', '22211211345', 'mmmmmmmm', 0, 0, 0, '115', 'dsdaFa', 'Web developer', '[\"storages\\/files\\/15840874546867301735e6b419ecf6fe.jpg\"]', '2020-03-13 01:49:44', '2020-03-13 01:47:34', '2020-03-13 01:49:44'),
(3, 1, 'Bo bo gyi', 'U Win Bo', 23, 0, 'male', '09256574390', 'nnnnnnnnnnnnnn', 0, 0, 0, '130', 'no', 'data Analyst,web developer', '[\"storages\\/files\\/1584090056813325835e6b4bc8206cd.jpg\"]', NULL, '2020-03-13 02:30:56', '2020-03-13 02:30:56'),
(4, 1, 'Daw Mya', 'U Hla', 25, 0, 'female', '0987655433', 'hlaiing,yangon', 0, 0, 0, '150', 'no', 'finance manager', '[\"storages\\/files\\/159946334415006630955f55dfb0a3b04.jpg\"]', NULL, '2020-09-07 00:52:24', '2020-09-07 00:52:24'),
(5, 1, 'min khant ko', 'U khant', 25, 0, 'male', '0987655433', 'daef', 0, 0, 0, '150', 'no', 'web developer', '[\"storages\\/files\\/159948958113990121815f56462dbd73d.jpg\"]', NULL, '2020-09-07 08:09:41', '2020-09-07 08:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receptions`
--

CREATE TABLE `receptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receptions`
--

INSERT INTO `receptions` (`id`, `owner_id`, `user_id`, `gender`, `phoneno`, `education`, `address`, `file`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 'male', '0987654300', 'bscnnnnnn', 'zzzzzzzzzz', '/storages/files/kyaw.jpg', NULL, '2020-03-13 01:27:50', '2020-03-13 01:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super_Admin', 'web', '2020-03-13 01:13:02', '2020-03-13 01:13:02'),
(2, 'Admin', 'web', '2020-03-13 01:13:02', '2020-03-13 01:13:02'),
(3, 'Doctor', 'web', '2020-03-13 01:13:02', '2020-03-13 01:13:02'),
(4, 'Reception', 'web', '2020-03-13 01:13:02', '2020-03-13 01:13:02');

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
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gc_level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temperature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spo2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rbs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complaint` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examination` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relevant_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chronic_disease` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_medicine` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_visit_date` date DEFAULT NULL,
  `next_visit_date2` date DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `charges` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `file`, `gc_level`, `temperature`, `body_weight`, `spo2`, `pr`, `bp`, `rbs`, `complaint`, `examination`, `relevant_info`, `chronic_disease`, `diagnosis`, `external_medicine`, `next_visit_date`, `next_visit_date2`, `patient_id`, `doctor_id`, `charges`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, '2020-03-11 17:30:00', '2020-03-13 01:47:34', '2020-03-13 01:47:34'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '2020-03-13 01:51:08', '2020-03-13 01:51:08'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, NULL, '2020-03-13 02:30:56', '2020-03-13 02:30:56'),
(4, '[\"storages\\/files\\/159946373119572251805f55e13322087.docx\"]', '54', '37', '150', '9', '87', '72', '87', 'nothing', 'nothing', 'good to go', 'heart disease', 'faster heart beat', 'nothing', '2020-09-09', '2020-09-10', 4, 1, '6000', NULL, '2020-09-07 00:52:24', '2020-09-07 00:58:51'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '2020-09-07 01:00:12', '2020-09-07 01:00:12'),
(6, '[\"storages\\/files\\/159949100620164896285f564bbe27c0f.jpg\"]', '120', '37', '150', '1000', '1200', '1200', '3000', 'non-stopped Coughing   and he started smoking and drunking because of heart broken recently!', 'his lung is not good! there is spot!', 'he is going to die if he keeps smoking and drinking!', 'lung cancer', 'tired after heavy running', 'no need to take but go to your girlfriend', '2020-09-09', '2020-09-11', 5, 1, '120000', NULL, '2020-09-07 08:09:41', '2020-09-07 08:33:26'),
(7, '[\"storages\\/files\\/159949100620164896285f564bbe27c0f.jpg\"]', '120', '37', '150', '1000', '1200', '1200', '3000', 'non-stopped Coughing   and he started smoking and drunking because of heart broken recently!', 'his lung is not good! there is spot!', 'he is going to die if he keeps smoking and drinking!', 'lung cancer', 'tired after heavy running', 'no need to take but go to your girlfriend', '2020-09-09', '2020-09-11', 5, 1, '120000', NULL, '2020-09-07 08:09:41', '2020-09-07 08:33:26'),
(8, '[\"storages\\/files\\/159949100620164896285f564bbe27c0f.jpg\"]', '120', '37', '150', '1000', '1200', '1200', '3000', 'non-stopped Coughing   and he started smoking and drunking because of heart broken recently!', 'his lung is not good! there is spot!', 'he is going to die if he keeps smoking and drinking!', 'lung cancer', 'tired after heavy running', 'no need to take but go to your girlfriend', '2020-09-09', '2020-09-11', 5, 1, '120000', NULL, '2020-09-07 08:09:41', '2020-09-07 08:33:26'),
(9, '[\"storages\\/files\\/159949100620164896285f564bbe27c0f.jpg\"]', '120', '37', '150', '1000', '1200', '1200', '3000', 'non-stopped Coughing   and he started smoking and drunking because of heart broken recently!', 'his lung is not good! there is spot!', 'he is going to die if he keeps smoking and drinking!', 'lung cancer', 'tired after heavy running', 'no need to take but go to your girlfriend', '2020-09-09', '2020-09-11', 5, 1, '120000', NULL, '2020-09-07 08:09:41', '2020-09-07 08:33:26'),
(10, '[\"storages\\/files\\/159949100620164896285f564bbe27c0f.jpg\"]', '120', '37', '150', '1000', '1200', '1200', '3000', 'non-stopped Coughing   and he started smoking and drunking because of heart broken recently!', 'his lung is not good! there is spot!', 'he is going to die if he keeps smoking and drinking!', 'lung cancer', 'tired after heavy running', 'no need to take but go to your girlfriend', '2020-09-09', '2020-09-11', 5, 1, '120000', NULL, '2020-09-07 08:09:41', '2020-09-07 08:33:26'),
(11, '[\"storages\\/files\\/159949100620164896285f564bbe27c0f.jpg\"]', '120', '37', '150', '1000', '1200', '1200', '3000', 'non-stopped Coughing   and he started smoking and drunking because of heart broken recently!', 'his lung is not good! there is spot!', 'he is going to die if he keeps smoking and drinking!', 'lung cancer', 'tired after heavy running', 'no need to take but go to your girlfriend', '2020-09-09', '2020-09-11', 5, 1, '120000', NULL, '2020-09-05 08:09:41', '2020-09-07 08:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@mail.com', NULL, '$2y$10$Bxfrea2vShDsGtMIU7bqUeZTZbPGIOXPR6WR2VNqIEU.WqDhOxG5C', NULL, NULL, '2020-03-13 01:13:02', '2020-03-13 01:13:02'),
(2, 'Thet Paing Htut', 'thetpainghtut@gmail.com', NULL, '$2y$10$phlXzs3TgqxtWDinmpk9a.nw.XCytzLtjPQ1kor6FVQCY9R4rV7ni', NULL, NULL, '2020-03-13 01:21:38', '2020-03-13 01:21:38'),
(3, 'Kyaw zin aung', 'kyawg1316@gmail.com', NULL, '$2y$10$HB5qaV8LFiiXPyOHHkUUU.b0vtw97Dke2lZNGmVna7qzO141BHEIW', NULL, NULL, '2020-03-13 01:22:34', '2020-03-13 01:22:34'),
(4, 'minpike', 'minpikehmu11@gmail.com', NULL, '$2y$10$FClFipWZZjSabDGWYJbXXu0asxWWfEsLD7hPqUARJleAsG.Oh8ssu', NULL, NULL, '2020-03-13 01:26:43', '2020-03-13 01:26:43'),
(5, 'minpike', 'minpikehmu@gmail.com', NULL, '$2y$10$Z8cnPC4zTRXtNSvAH.Df6O.tAbM3GoL/Ws6zM4f61J9QKyoEaGe/C', NULL, NULL, '2020-03-13 01:27:50', '2020-03-13 01:27:50'),
(6, 'ayechanoo', 'ayechanooaco@gmail.com', NULL, '$2y$10$31ApXJgpL/hDK07vGIOb2O9.J7OBFzPHMAkuhcR1vXt54Uqmd5MtW', NULL, NULL, '2020-09-07 00:37:33', '2020-09-07 00:37:33'),
(7, 'Daw Ni Ni Win', 'niniwin@gmail.com', NULL, '$2y$10$ir89hFnxmo6V3igkFDaDseIly4bP1HZKu0Lcfl6r4td/PgNxERfz.', NULL, NULL, '2020-09-07 00:44:56', '2020-09-07 00:44:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_owner_id_foreign` (`owner_id`),
  ADD KEY `doctors_user_id_foreign` (`user_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicines_medicinetype_id_foreign` (`medicinetype_id`);

--
-- Indexes for table `medicinetypes`
--
ALTER TABLE `medicinetypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_treatment`
--
ALTER TABLE `medicine_treatment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicine_treatment_treatment_id_foreign` (`treatment_id`),
  ADD KEY `medicine_treatment_medicine_id_foreign` (`medicine_id`);

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
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owners_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_reception_id_foreign` (`reception_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptions`
--
ALTER TABLE `receptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receptions_owner_id_foreign` (`owner_id`),
  ADD KEY `receptions_user_id_foreign` (`user_id`);

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
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `treatments_patient_id_foreign` (`patient_id`),
  ADD KEY `treatments_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicinetypes`
--
ALTER TABLE `medicinetypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine_treatment`
--
ALTER TABLE `medicine_treatment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receptions`
--
ALTER TABLE `receptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `medicines_medicinetype_id_foreign` FOREIGN KEY (`medicinetype_id`) REFERENCES `medicinetypes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `medicine_treatment`
--
ALTER TABLE `medicine_treatment`
  ADD CONSTRAINT `medicine_treatment_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medicine_treatment_treatment_id_foreign` FOREIGN KEY (`treatment_id`) REFERENCES `treatments` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `owners`
--
ALTER TABLE `owners`
  ADD CONSTRAINT `owners_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_reception_id_foreign` FOREIGN KEY (`reception_id`) REFERENCES `receptions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `receptions`
--
ALTER TABLE `receptions`
  ADD CONSTRAINT `receptions_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `receptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `treatments`
--
ALTER TABLE `treatments`
  ADD CONSTRAINT `treatments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `treatments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
