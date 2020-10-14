-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 11:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=active, 0=inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `username`, `phone_no`, `email`, `email_verified_at`, `password`, `avatar`, `status`, `remember_token`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '', 'superadmin', '019XXXXXXXX', 'superadmin@example.com', NULL, '$2y$10$toOhHyV0FRqzSvOZQpZF2ekzZz113X4ysMbnzjfxQPhmLxgXWxCaO', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(2, 'Admin', '', 'admin', '018XXXXXXXX', 'admin@example.com', NULL, '$2y$10$DAbfwWrpXWwgOkQKJrpVPehwI1Tc7Nrzv/7TOZ1NzE3RDaWO5iJG.', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(3, 'Editor', '', 'editor', '017XXXXXXXX', 'editor@example.com', NULL, '$2y$10$8H3.4FzfuZefdVc/bVLsGOjvQNAabVyppQnSbZbVTmtqp1xmM5qTW', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>active, 0=>inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `total_reaction` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'total reaction count',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `image`, `description`, `meta_description`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `total_reaction`, `created_at`, `updated_at`) VALUES
(1, 'This is a simple blog from admin panel', 'this-is-a-simple-blog-from-admin-panel', NULL, '<div>Welcome to our blog <br /></div>', NULL, 1, NULL, NULL, NULL, NULL, 0, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(2, 'This is a another blog from admin panel', 'this-is-a-another-blog-from-admin-panel', NULL, '<div>Welcome to our blog <br /></div>', NULL, 1, NULL, NULL, NULL, NULL, 0, '2020-07-09 02:46:29', '2020-07-09 02:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_category_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null if category is parent, else parent id',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>active, 0=>inactive',
  `enable_bg` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=>active, 0=>inactive',
  `bg_color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#FFFFFF',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `total_reaction` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'total reaction count',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `banner_image`, `logo_image`, `description`, `meta_description`, `parent_category_id`, `status`, `enable_bg`, `bg_color`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `total_reaction`, `created_at`, `updated_at`) VALUES
(1, 'Life Style', 'life-style', NULL, NULL, NULL, NULL, NULL, 1, 0, '#FFFFFF', NULL, NULL, NULL, NULL, 0, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(2, 'Fashion', 'fashion', NULL, NULL, NULL, NULL, 1, 1, 0, '#FFFFFF', NULL, NULL, NULL, NULL, 0, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(3, 'Earning', 'earning', NULL, NULL, NULL, NULL, NULL, 1, 0, '#FFFFFF', NULL, NULL, NULL, NULL, 0, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(4, 'Featured', 'featured', NULL, NULL, NULL, NULL, 3, 1, 1, 'EEEEEE', NULL, 1, NULL, NULL, 0, '2020-07-14 04:26:47', '2020-07-14 04:26:47'),
(5, 'Sports', 'sports', NULL, NULL, NULL, NULL, 3, 1, 1, 'EEEEEE', NULL, 1, NULL, NULL, 0, '2020-07-14 04:27:29', '2020-07-14 04:27:29'),
(6, 'Noapara', 'noapara', NULL, NULL, '<p>New category for noapara, jessore</p>', 'noapara, jessore', 3, 1, 1, 'EEEEEE', NULL, 1, NULL, NULL, 0, '2020-07-19 23:35:35', '2020-07-19 23:35:35'),
(7, 'Economic', 'economic', NULL, NULL, '<p>economic</p>', 'economic', 3, 1, 1, 'EEEEEE', NULL, 1, NULL, NULL, 0, '2020-07-19 23:38:11', '2020-07-19 23:38:11'),
(8, 'Science', 'science', NULL, NULL, '<p>science</p>', 'science', 3, 1, 1, 'EEEEEE', NULL, 1, NULL, NULL, 0, '2020-07-19 23:38:56', '2020-07-19 23:38:56'),
(9, 'Bangladesh', 'bangladesh', NULL, NULL, '<p>bangladesh</p>', 'bangladesh', 3, 1, 1, 'EEEEEE', NULL, 1, NULL, NULL, 0, '2020-07-19 23:39:46', '2020-07-19 23:39:46'),
(10, 'Top News', 'topnews', NULL, NULL, '<p>top news</p>', 'top news', 3, 1, 1, 'EEEEEE', NULL, 1, NULL, NULL, 0, '2020-07-19 23:47:37', '2020-07-19 23:47:37'),
(11, 'Life', 'eiwryriweuzhcjczhGVjsg', NULL, NULL, '<p>fgasdgfjsdFGasdtgf</p>', 'dfhjsgfiasgfsdgfjsdg', 1, 1, 1, 'EEEEEE', NULL, 1, NULL, NULL, 0, '2020-07-22 10:09:55', '2020-07-22 10:09:55'),
(12, 'International', 'tfjksjhcgasdytfweut', NULL, NULL, '<p>hgjsdagfasdgifs</p>', 'ksdfgjgfgfsdgsdgasdifug', 1, 1, 1, 'EEEEEE', NULL, 1, NULL, NULL, 0, '2020-07-22 11:52:53', '2020-07-22 11:52:53'),
(13, 'Aljazeera', 'alzajeera', NULL, NULL, NULL, NULL, 3, 1, 1, 'EEEEEE', NULL, 1, 1, NULL, 0, '2020-08-27 01:10:10', '2020-08-27 01:14:10'),
(14, 'Reuters', 'reuters', NULL, NULL, NULL, NULL, 3, 1, 1, 'EEEEEE', NULL, 1, NULL, NULL, 0, '2020-08-27 03:34:07', '2020-08-27 03:34:07'),
(15, 'Education', 'education', NULL, NULL, NULL, NULL, 1, 1, 1, 'EEEEEE', NULL, 1, NULL, NULL, 0, '2020-09-14 11:01:43', '2020-09-14 11:01:43'),
(16, 'Quran Hadith', 'quranhadith', NULL, NULL, NULL, NULL, 1, 1, 1, 'EEEEEE', NULL, 1, NULL, NULL, 0, '2020-10-07 03:50:55', '2020-10-07 03:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = not seen by admin, 1 = seen by admin',
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Full URL after (/) => public/images/test.png || full url of youtube/facebook',
  `type` enum('image','video','document','code') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `link_type` enum('local','external','embedded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'local',
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` double(8,2) DEFAULT NULL,
  `height` double(8,2) DEFAULT NULL,
  `size` double(8,2) DEFAULT 0.00 COMMENT 'Size in KiloByte',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `description`, `file`, `type`, `link_type`, `extension`, `meta_title`, `meta_description`, `width`, `height`, `size`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'This is a Document from admin panel', NULL, 'public/assets/images/admins/superadmin.jpg', 'image', 'local', 'jpg', NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(2, 'This is a Document from admin panel', NULL, 'public/assets/images/admins/superadmin.jpg', 'image', 'local', 'jpg', NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29');

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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2020_05_01_000000_create_admins_table', 1),
(8, '2020_05_01_0000040_create_settings_table', 1),
(9, '2020_05_01_000010_create_users_table', 1),
(10, '2020_05_01_000015_create_reactions_table', 1),
(11, '2020_05_01_000020_create_failed_jobs_table', 1),
(12, '2020_05_01_000035_create_permission_tables', 1),
(13, '2020_05_01_000050_create_categories_table', 1),
(14, '2020_05_01_000060_create_pages_table', 1),
(15, '2020_05_01_000070_create_blogs_table', 1),
(16, '2020_05_01_000080_create_contacts_table', 1),
(17, '2020_05_01_000090_create_tracks_table', 1),
(18, '2020_06_11_160527_create_posts_table', 1),
(19, '2020_06_11_173826_create_tags_table', 1),
(20, '2020_06_11_174357_create_post_tags_table', 1),
(21, '2020_06_11_174819_create_post_comments_table', 1),
(22, '2020_06_11_184725_create_polls_table', 1),
(23, '2020_06_11_185607_create_poll_responses_table', 1),
(24, '2020_06_11_191800_create_sliders_table', 1),
(25, '2020_06_13_162622_create_documents_table', 1),
(26, '2020_07_08_095632_create_subscriptions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\Admin', 2),
(3, 'App\\Models\\Admin', 3),
(4, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null if page has no category',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>active, 0=>inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `total_reaction` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'total reaction count',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `meta_description`, `image`, `banner_image`, `category_id`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `total_reaction`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about-us', '<div>Welcome to our about us page <br /></div>', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(2, 'Contact Us', 'contact-us', '<div>Welcome to our contact us page <br /></div>', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, '2020-07-09 02:46:29', '2020-07-09 02:46:29');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'settings.view', 'admin', 'Settings', '2020-07-09 02:46:27', '2020-07-09 02:46:27'),
(2, 'settings.edit', 'admin', 'Settings', '2020-07-09 02:46:27', '2020-07-09 02:46:27'),
(3, 'permission.view', 'admin', 'Permissions', '2020-07-09 02:46:27', '2020-07-09 02:46:27'),
(4, 'permission.create', 'admin', 'Permissions', '2020-07-09 02:46:27', '2020-07-09 02:46:27'),
(5, 'permission.edit', 'admin', 'Permissions', '2020-07-09 02:46:27', '2020-07-09 02:46:27'),
(6, 'permission.delete', 'admin', 'Permissions', '2020-07-09 02:46:27', '2020-07-09 02:46:27'),
(7, 'admin.view', 'admin', 'Admin', '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(8, 'admin.create', 'admin', 'Admin', '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(9, 'admin.edit', 'admin', 'Admin', '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(10, 'admin.delete', 'admin', 'Admin', '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(11, 'admin_profile.view', 'admin', 'Admin', '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(12, 'admin_profile.edit', 'admin', 'Admin', '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(13, 'role.view', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(14, 'role.create', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(15, 'role.edit', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(16, 'role.delete', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(17, 'user.view', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(18, 'user.create', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(19, 'user.edit', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(20, 'user.delete', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(21, 'category.view', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(22, 'category.create', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(23, 'category.edit', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(24, 'category.delete', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(25, 'page.view', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(26, 'page.create', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(27, 'page.edit', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(28, 'page.delete', 'admin', 'Page', '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(29, 'post.view', 'admin', 'Post', '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(30, 'post.create', 'admin', 'Post', '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(31, 'post.edit', 'admin', 'Post', '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(32, 'post.delete', 'admin', 'Post', '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(33, 'blog.view', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(34, 'blog.create', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(35, 'blog.edit', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(36, 'blog.delete', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(37, 'document.view', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(38, 'document.create', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(39, 'document.edit', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(40, 'document.delete', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(41, 'tag.view', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(42, 'tag.create', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(43, 'tag.edit', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(44, 'tag.delete', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(45, 'postcomment.view', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(46, 'postcomment.create', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(47, 'postcomment.edit', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(48, 'postcomment.delete', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(49, 'slider.view', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(50, 'slider.create', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(51, 'slider.edit', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(52, 'slider.delete', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(53, 'tracking.view', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(54, 'tracking.delete', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(55, 'email_notification.view', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(56, 'email_notification.edit', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(57, 'email_message.view', 'admin', NULL, '2020-07-09 02:46:28', '2020-07-09 02:46:28'),
(58, 'email_message.edit', 'admin', NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(59, 'dashboard.view', 'admin', NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(60, 'module.view', 'admin', NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(61, 'module.create', 'admin', NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(62, 'module.edit', 'admin', NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(63, 'module.delete', 'admin', NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(64, 'module.toggle', 'admin', NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(65, 'poll.view', 'admin', NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(66, 'poll.create', 'admin', NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(67, 'poll.edit', 'admin', NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(68, 'poll.delete', 'admin', NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(69, 'subscription.view', 'admin', NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(70, 'subscription.create', 'admin', NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(71, 'subscription.edit', 'admin', NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(72, 'subscription.delete', 'admin', NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(73, 'post.approve', 'admin', 'Post', '2020-09-02 09:33:06', '2020-09-02 09:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=>approved, 0=>unapproved',
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `total_yes` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `total_no` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `total_no_comment` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `title`, `slug`, `status`, `start_date`, `end_date`, `total_yes`, `total_no`, `total_no_comment`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'This is a simple poll from admin panel', 'this-is-a-simple-poll-from-admin-panel', 1, '2020-06-14 00:00:00', '2020-06-15 00:00:00', 5, 2, 1, NULL, NULL, NULL, NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(2, 'This is another poll from admin panel', 'this-is-another-poll-from-admin-panel', 0, '2020-06-15 00:00:00', '2020-06-16 00:00:00', 7, 11, 3, NULL, NULL, NULL, NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `poll_responses`
--

CREATE TABLE `poll_responses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('yes','no','no_comment') COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poll_responses`
--

INSERT INTO `poll_responses` (`id`, `type`, `poll_id`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 'yes', 1, '192.168.10.10', '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(2, 'no', 1, '192.168.10.10', '2020-07-09 02:46:29', '2020-07-09 02:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image_caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>active, 0=>inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_slider` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=>active, 0=>inactive',
  `is_top` tinyint(4) DEFAULT 0,
  `total_view` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `total_search` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `total_liked` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `total_disliked` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `total_comment` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `total_reaction` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'total reaction count',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `short_description`, `description`, `meta_description`, `meta_keywords`, `featured_image`, `featured_image_caption`, `category_id`, `status`, `deleted_at`, `is_slider`, `is_top`, `total_view`, `total_search`, `total_liked`, `total_disliked`, `total_comment`, `total_reaction`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Donald Trump', 'firstpost', 'বাংলা গানের প্রশংসা করলেন আমেরিকার প্রেসিডেন্ট ডোনাল্ড ট্রাম্প।', '<p>dhdghdghghg</p>', 'hghgfhfghfghhghgh', NULL, 'Donald Trump-1594724422-featured_images.jpg', 'dhghgddgh', 2, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, '2020-07-09 05:12:23', '2020-07-14 05:00:22'),
(6, 'Pohela Boishakh', 'itisraining', 'সারাদেশে পালিত হল পহেলা বৈশাখ', '<p>fdgdfsgfds</p>', 'dfgdfgdfg', NULL, 'Pohela Boishakh-1594724404-featured_images.jpg', 'dfgdfsgdfg', 2, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, '2020-07-12 00:45:19', '2020-07-14 05:00:04'),
(8, 'Ananta Jalil', 'finalpost', 'অস্কার পেলো বাংলাদেশী অভিনেতা', '<p>fsgsfagsfagfsag</p>', 'fsgfsdgfsgfdgsdf', NULL, 'Ananta Jalil-1594724383-featured_images.jpg', 'sfsagsfg', 2, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, '2020-07-12 02:36:58', '2020-07-14 04:59:43'),
(9, 'একটি মানবিক আকুতি', 'rtrwtrw', 'একটি মানবিক আকুতি', '<p>dfgdfgdfgds<br></p>', 'dfgsfgdgbdggdbd', NULL, 'একটি মানবিক আকুতি-1594724365-featured_images.jpg', 'fgsfdgdgd', 4, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, '2020-07-14 04:31:53', '2020-07-14 04:59:25'),
(10, 'খুবই কম বেতনে খাটানো হচ্ছে সফটওয়্যার ইঞ্জিনিয়ার দের।', 'sfgsfgsfg', 'খুবই কম বেতনে খাটানো হচ্ছে সফটওয়্যার ইঞ্জিনিয়ার দের।', '<p>vccbvbcvcv<br></p>', 'vccvcvbcvbcv', NULL, 'খুবই কম বেতনে খাটানো হচ্ছে সফটওয়্যার ইঞ্জিনিয়ার দের।-1594724353-featured_images.jpg', 'fggfsgsf', 4, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, '2020-07-14 04:33:58', '2020-07-14 04:59:13'),
(11, 'শান্তি সমৃদ্ধি তে এগিয়ে যাচ্ছে বাংলাদেশ।', 'rtwrtrt', 'শান্তি সমৃদ্ধি তে এগিয়ে যাচ্ছে বাংলাদেশ।', '<p>trtwrtwrtwrtwr<br></p>', 'rtwratqwrtwrqwrtwr', NULL, 'শান্তি সমৃদ্ধি তে এগিয়ে যাচ্ছে বাংলাদেশ।-1594724343-featured_images.jpg', 'trrtartrtwt', 4, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, '2020-07-14 04:35:29', '2020-07-14 04:59:03'),
(12, 'বিশ্বকাপ জিতলো বাংলাদেশ ক্রিকেট টীম।', 'fdgdgfg', 'বিশ্বকাপ জিতলো বাংলাদেশ ক্রিকেট টীম।', '<p>xfgfzgfzgfz<br></p>', 'gfddfsdgsdfgdsf', NULL, 'বিশ্বকাপ জিতলো বাংলাদেশ ক্রিকেট টীম।-1594724323-featured_images.jpg', 'fdzgfzgzs', 5, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, '2020-07-14 04:46:58', '2020-07-14 04:58:43'),
(13, 'ফুটবল বিশ্বকাপের সেমিফাইনালে বাংলাদেশ।', 'tretrrtrtt', 'ফুটবল বিশ্বকাপের সেমিফাইনালে বাংলাদেশ।', '<p>terrtrwtwrt<br></p>', 'trrwtwrtwrt', NULL, 'ফুটবল বিশ্বকাপের সেমিফাইনালে বাংলাদেশ।-1594724311-featured_images.jpeg', 'trwrtwrtwr', 5, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, '2020-07-14 04:48:20', '2020-07-14 04:58:31'),
(14, 'অলিম্পিকে সর্বাধিক স্বর্ণ জয়ের গৌরব বাংলাদেশের।', 'gdfsgsdfgsdf', 'অলিম্পিকে সর্বাধিক স্বর্ণ জয়ের গৌরব বাংলাদেশের।', '<p>fgddfsgsdfgdf<br></p>', 'gsdfgdfgas', NULL, 'অলিম্পিকে সর্বাধিক স্বর্ণ জয়ের গৌরব বাংলাদেশের।-1594724300-featured_images.jpg', 'dfgsdfgfsdfg', 5, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, '2020-07-14 04:49:24', '2020-07-14 04:58:20'),
(15, 'হলিউডে মুক্তি পেলো বাংলাদেশী ছবি।', 'fdgsdfgsfsfggs', 'হলিউডে মুক্তি পেলো বাংলাদেশী ছবি।', '<p>fgdfhbdbdgb<br></p>', 'gaegeraer', NULL, 'হলিউডে মুক্তি পেলো বাংলাদেশী ছবি।-1594724855-featured_images.jpg', 'cbvfgdbd', 2, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-14 05:07:35', '2020-07-14 05:07:35'),
(16, 'কানাডায় আইয়ুব বাচ্চুর কনসার্টে উপচে পড়া ভিড়।', 'weqweqe', 'কানাডায় আইয়ুব বাচ্চুর কনসার্টে উপচে পড়া ভিড়।', '<p>sfgasfgasf<br></p>', 'sfggfgsa', NULL, 'কানাডায় আইয়ুব বাচ্চুর কনসার্টে উপচে পড়া ভিড়।-1594724915-featured_images.jpg', 'rwxcvf', 2, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-14 05:08:35', '2020-07-14 05:08:35'),
(17, 'এই ঈদে আসছে তাহসানের ২৭ টি নাটক।', 'fgdsgsdfggdtr', 'এই ঈদে আসছে তাহসানের ২৭ টি নাটক।', '<p>dfsggfsf<br></p>', 'dfgsdfgsd', NULL, 'এই ঈদে আসছে তাহসানের ২৭ টি নাটক।-1594724964-featured_images.jpg', 'fgrwter', 2, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-14 05:09:24', '2020-07-14 05:09:24'),
(18, 'আগামীকাল শুরু হচ্ছে এস.এস.সি এবং সমমানের পরীক্ষা', 'weerq', 'আগামীকাল শুরু হচ্ছে এস.এস.সি এবং সমমানের পরীক্ষা', '<p>cvn<br></p>', 'vbncv', NULL, 'আগামীকাল শুরু হচ্ছে এস.এস.সি এবং সমমানের পরীক্ষা-1594725339-featured_images.jpg', 'cvnnv', 4, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-14 05:15:39', '2020-07-14 05:15:39'),
(20, 'সফলভাবে রকেট উৎক্ষেপণ করলো বাংলাদেশ', 'wqqeqwqekhjk', 'সফলভাবে রকেট উৎক্ষেপণ করলো বাংলাদেশ', '<p>retet<br></p>', 'trertertr', NULL, 'সফলভাবে রকেট উৎক্ষেপণ করলো বাংলাদেশ-1594725432-featured_images.jpg', 'wertrwrr', 4, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-14 05:17:12', '2020-07-14 05:17:12'),
(21, 'রাজশাহী তে নতুন রাস্তা উদ্বোধন করলেন প্রধানমন্ত্রী', 'eyetdbsdg', 'রাজশাহী তে নতুন রাস্তা উদ্বোধন করলেন প্রধানমন্ত্রী', '<p>dfsgdgdr<br></p>', 'dfgdfs', NULL, 'রাজশাহী তে নতুন রাস্তা উদ্বোধন করলেন প্রধানমন্ত্রী-1594725479-featured_images.jpg', 'dfsgsdg', 4, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-14 05:17:59', '2020-07-14 05:17:59'),
(22, 'গার্মেন্টস শিল্পে সবার শীর্ষে বাংলাদেশ', 'qweghbvsdffs', 'গার্মেন্টস শিল্পে সবার শীর্ষে বাংলাদেশ', '<p>ytdyetye<br></p>', 'tyteytee', NULL, 'গার্মেন্টস শিল্পে সবার শীর্ষে বাংলাদেশ-1594725529-featured_images.jpg', 'teyety', 4, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-14 05:18:49', '2020-07-14 05:18:49'),
(23, 'উন্নয়নের রোল মডেল  - বাংলাদেশ', 'unnoyoner-role-model-bangladesh', 'আমার বাংলা নিয়ে প্রথম কাজ করবার সুযোগ তৈরি হয়েছিল অভ্র^ নামক এক যুগান্তকারী বাংলা সফ্‌টওয়্যার হাতে পাবার মধ্য দিয়ে। এর পর একে একে বাংলা উইকিপিডিয়া, ওয়ার্ডপ্রেস বাংলা কোডেক্সসহ বিভিন্ন বাংলা অনলাইন পত্রিকা তৈরির কাজ করতে করতে বাংলার সাথে নিজেকে বেঁধে নিয়েছি আষ্টেপৃষ্ঠে। বিশেষ করে অনলাইন পত্রিকা তৈরি করতে ডিযাইন করার সময়, সেই ডিযাইনকে কোডে রূপান্তর করবার সময় বারবার অনুভব করেছি কিছু নমুনা লেখার। যে লেখাগুলো ফটোশপে বসিয়ে বাংলায় ডিযাইন করা যাবে, আবার সেই লেখাই অনলাইনে ব্যবহার করা যাবে। কিন্তু দুঃখজনক হলেও সত্য যে, ইংরেজিতে লাতিন Lorem Ipsum… সূচক নমুনা লেখা (dummy texts) থাকলেও বাংলা ভাষায় এরকম কোনো লেখা নেই। তাই নিজের তাগিদেই বাংলা ভাষার জন্য প্রথম নমুনা লেখা তৈরি করলাম, এ হলো বাংলা Lorem ipsum – কিন্তু তার অনুবাদ নয়। আমি একে নামকরণ করেছি: অর্থহীন লেখা!', '<p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: &quot;Siyam Rupali&quot;; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো, তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, তুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো না, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো, আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি; এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p><p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: &quot;Siyam Rupali&quot;; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো বলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় না, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই কথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার প্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার প্রত্যুৎপন্নমতিত্ব।</p><p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: &quot;Siyam Rupali&quot;; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">তাই কোন কথাটি কাজে লাগবে, তা নির্ধারণ করবে তুমি— হ্যাঁ, তুমি। হয়তো সামান্য ক’টা বাংলা অক্ষর: খন্ড-ত, অনুস্বার, বিঃসর্গ কিংবা চন্দ্রবিন্দু— কিন্তু যদি তুমি বিশ্বাস করো, তাহলে হয়তো তুমি তা দিয়েই তৈরি করতে পারো এক উচ্চমার্গীয় মহাকাব্য- এক চিরসবুজ অর্ঘ্য। রচিত হতে পারে পৃথিবীর ১ম বিরাম চিহ্নের ইতিকথা – এক নতুন ঊষা। …মহাকাব্য লিখতে ঋষি-মুনি হওয়া লাগে না।<br style=\"box-sizing: border-box;\">অর্থহীনতা আর অর্থদ্যোতনার সেই ঈর্ষাকাতর মোহাবিষ্টতা তাই তৈরি করে নাও নিজের মাঝে- চাই একটুখানি ঔৎসুক্য। নিজেই ঠিক করো, নিজের ভাষাটা কি অর্থহীন, নাকি কিছু সত্যিই বলছে!</p>', 'top news', NULL, 'উন্নয়নের রোল মডেল  - বাংলাদেশ-1595224583-featured_images.jpg', 'bangladesh', 7, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, '2020-07-19 23:56:23', '2020-07-25 22:44:03'),
(24, 'যশোরে বাড়ছে পর্যটকদের ভিড়', 'gwrwrwrg', 'যশোরে বাড়ছে পর্যটকদের ভিড়', '<p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো, তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, তুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো না, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো, আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি; এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p><p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো বলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় না, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই কথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার প্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার প্রত্যুৎপন্নমতিত্ব।</p>', 'gfsdfgsfg', NULL, 'যশোরে বাড়ছে পর্যটকদের ভিড়-1595315991-featured_images.jpg', 'jessore', 6, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-21 01:19:51', '2020-07-21 01:19:51'),
(25, 'যশোরে বায়ু দূষণের পরিমাণ অধিক', 'trtsfgfgfgdfgdfg', 'যশোরে বায়ু দূষণের পরিমাণ অধিক', '<p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো, তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, তুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো না, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো, আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি; এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p><p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো বলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় না, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই কথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার প্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার প্রত্যুৎপন্নমতিত্ব।</p>', 'gsfgsfgfsg', NULL, 'যশোরে বায়ু দূষণের পরিমাণ অধিক-1595318292-featured_images.jpg', 'jessore', 6, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-21 01:58:12', '2020-07-21 01:58:12'),
(26, 'উদ্বোধন হলো আন্তর্জাতিক মানের এয়ারপোর্ট', 'rgdfggdfgfgdfgdfgg', 'উদ্বোধন হলো আন্তর্জাতিক মানের এয়ারপোর্ট', '<p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো, তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, তুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো না, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো, আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি; এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p><p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো বলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় না, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই কথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার প্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার প্রত্যুৎপন্নমতিত্ব।</p>', 'dfgdtrsg', NULL, 'উদ্বোধন হলো আন্তর্জাতিক মানের এয়ারপোর্ট-1595318484-featured_images.jpg', 'jessore', 6, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-21 02:01:24', '2020-07-21 02:01:24'),
(27, 'সুন্দর রাস্তার নগরী এই যশোর', 'ereerr', 'সুন্দর রাস্তার নগরী এই যশোর', '<p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো, তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, তুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো না, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো, আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি; এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p><p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো বলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় না, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই কথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার প্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার প্রত্যুৎপন্নমতিত্ব।</p>', 'aefddefeweefe', NULL, 'সুন্দর রাস্তার নগরী এই যশোর-1595318565-featured_images.jpg', 'jessore', 6, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-21 02:02:45', '2020-07-21 02:02:45'),
(28, 'দেশের প্রথম হাই টেক পার্ক চালু হলো যশোরে', 'rtrysvdftweersdfs', 'দেশের প্রথম হাই টেক পার্ক চালু হলো যশোরে', '<p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো, তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, তুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো না, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো, আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি; এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p><p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো বলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় না, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই কথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার প্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার প্রত্যুৎপন্নমতিত্ব।</p>', 'eeaaefaefae', NULL, 'দেশের প্রথম হাই টেক পার্ক চালু হলো যশোরে-1595318643-featured_images.jpg', 'jessore', 6, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-21 02:04:03', '2020-07-21 02:04:03'),
(29, 'মূল্যস্ফীতি কমেছে, বেড়েছে অর্থনীতি', 'sfgergevuiyireyuiey', 'মূল্যস্ফীতি কমেছে, বেড়েছে অর্থনীতি', '<p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো, তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, তুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো না, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো, আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি; এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p><p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো বলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় না, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই কথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার প্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার প্রত্যুৎপন্নমতিত্ব।</p>', 'trasrsrgfasr', NULL, 'মূল্যস্ফীতি কমেছে, বেড়েছে অর্থনীতি-1595323152-featured_images.jpg', 'economic', 7, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-21 03:19:12', '2020-07-21 03:19:12'),
(30, 'প্রবাসীদের আয়ে বাড়ছে  রেমিটেন্স', 'trsrsffgdfg', 'প্রবাসীদের আয়ে বাড়ছে  রেমিটেন্স', '<p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো, তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, তুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো না, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো, আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি; এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p><p style=\"box-sizing: border-box; margin: 0px 0px 13px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো বলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় না, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই কথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার প্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার প্রত্যুৎপন্নমতিত্ব।</p>', 'ttbcbxcdftt', NULL, 'প্রবাসীদের আয়ে বাড়ছে  রেমিটেন্স-1595323467-featured_images.jpg', 'economic', 7, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-21 03:24:27', '2020-07-21 03:24:27'),
(31, 'শেয়ার বাজারে বিনিয়োগে লাভ বাড়ছে', 'uiyfjksdgcnvjkasdgs', 'শেয়ার বাজারে বিনিয়োগে লাভ বাড়ছে', '<p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক \r\nকিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের\r\n ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে \r\nঅর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। \r\nযেকোনো লেখাই তোমার কাছে অর্থবোধকতা তৈরি করতে পারে, যদি তুমি সেখানে \r\nঅর্থদ্যোতনা দেখতে পাও। …ছিদ্রান্বেষণ? না, তা হবে কেন?</p>\r\n<p>যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো,\r\n তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, \r\nতুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো \r\nনা, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো,\r\n আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি;\r\n এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p>\r\n<p>কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো \r\nবলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় \r\nনা, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই \r\nকথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার \r\nপ্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু\r\n বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার \r\nপ্রত্যুৎপন্নমতিত্ব।</p>\r\n<p>তাই কোন কথাটি কাজে লাগবে, তা নির্ধারণ করবে তুমি— হ্যাঁ, তুমি। হয়তো \r\nসামান্য ক’টা বাংলা অক্ষর: খন্ড-ত, অনুস্বার, বিঃসর্গ কিংবা চন্দ্রবিন্দু— \r\nকিন্তু যদি তুমি বিশ্বাস করো, তাহলে হয়তো তুমি তা দিয়েই তৈরি করতে পারো এক \r\nউচ্চমার্গীয় মহাকাব্য- এক চিরসবুজ অর্ঘ্য। রচিত হতে পারে পৃথিবীর ১ম বিরাম \r\nচিহ্নের ইতিকথা – এক নতুন ঊষা। …মহাকাব্য লিখতে ঋষি-মুনি হওয়া লাগে না।<br>\r\nঅর্থহীনতা আর অর্থদ্যোতনার সেই ঈর্ষাকাতর মোহাবিষ্টতা তাই তৈরি করে নাও \r\nনিজের মাঝে- চাই একটুখানি ঔৎসুক্য। নিজেই ঠিক করো, নিজের ভাষাটা কি \r\nঅর্থহীন, নাকি কিছু সত্যিই বলছে!</p>', 'fgyasefykzgJHzcgJytg', NULL, 'শেয়ার বাজারে বিনিয়োগে লাভ বাড়ছে-1595434102-featured_images.jpg', 'economic', 7, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-22 10:08:23', '2020-07-22 10:08:23'),
(32, 'দারিদ্রতার হার কমছে সারা দেশে', 'jhafgasjhdfgjsG', 'দারিদ্রতার হার কমছে সারা দেশে', '<p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক \r\nকিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের\r\n ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে \r\nঅর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। \r\nযেকোনো লেখাই তোমার কাছে অর্থবোধকতা তৈরি করতে পারে, যদি তুমি সেখানে \r\nঅর্থদ্যোতনা দেখতে পাও। …ছিদ্রান্বেষণ? না, তা হবে কেন?</p>\r\n<p>যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো,\r\n তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, \r\nতুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো \r\nনা, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো,\r\n আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি;\r\n এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p>\r\n<p>কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো \r\nবলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় \r\nনা, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই \r\nকথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার \r\nপ্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু\r\n বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার \r\nপ্রত্যুৎপন্নমতিত্ব।</p>\r\n<p>তাই কোন কথাটি কাজে লাগবে, তা নির্ধারণ করবে তুমি— হ্যাঁ, তুমি। হয়তো \r\nসামান্য ক’টা বাংলা অক্ষর: খন্ড-ত, অনুস্বার, বিঃসর্গ কিংবা চন্দ্রবিন্দু— \r\nকিন্তু যদি তুমি বিশ্বাস করো, তাহলে হয়তো তুমি তা দিয়েই তৈরি করতে পারো এক \r\nউচ্চমার্গীয় মহাকাব্য- এক চিরসবুজ অর্ঘ্য। রচিত হতে পারে পৃথিবীর ১ম বিরাম \r\nচিহ্নের ইতিকথা – এক নতুন ঊষা। …মহাকাব্য লিখতে ঋষি-মুনি হওয়া লাগে না।<br>\r\nঅর্থহীনতা আর অর্থদ্যোতনার সেই ঈর্ষাকাতর মোহাবিষ্টতা তাই তৈরি করে নাও \r\nনিজের মাঝে- চাই একটুখানি ঔৎসুক্য। নিজেই ঠিক করো, নিজের ভাষাটা কি \r\nঅর্থহীন, নাকি কিছু সত্যিই বলছে!</p>', 'sfgetywetywethtyh', NULL, 'দারিদ্রতার হার কমছে সারা দেশে-1595434261-featured_images.jpg', 'life', 11, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-22 10:11:01', '2020-07-22 10:11:01'),
(33, 'স্বাস্থ্য সচেতন তরুন সমাজ', 'rtkbvfgtyygisguih', 'স্বাস্থ্য সচেতন তরুন সমাজ', '<p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক \r\nকিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের\r\n ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে \r\nঅর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। \r\nযেকোনো লেখাই তোমার কাছে অর্থবোধকতা তৈরি করতে পারে, যদি তুমি সেখানে \r\nঅর্থদ্যোতনা দেখতে পাও। …ছিদ্রান্বেষণ? না, তা হবে কেন?</p>\r\n<p>যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো,\r\n তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, \r\nতুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো \r\nনা, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো,\r\n আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি;\r\n এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p>\r\n<p>কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো \r\nবলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় \r\nনা, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই \r\nকথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার \r\nপ্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু\r\n বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার \r\nপ্রত্যুৎপন্নমতিত্ব।</p>\r\n<p>তাই কোন কথাটি কাজে লাগবে, তা নির্ধারণ করবে তুমি— হ্যাঁ, তুমি। হয়তো \r\nসামান্য ক’টা বাংলা অক্ষর: খন্ড-ত, অনুস্বার, বিঃসর্গ কিংবা চন্দ্রবিন্দু— \r\nকিন্তু যদি তুমি বিশ্বাস করো, তাহলে হয়তো তুমি তা দিয়েই তৈরি করতে পারো এক \r\nউচ্চমার্গীয় মহাকাব্য- এক চিরসবুজ অর্ঘ্য। রচিত হতে পারে পৃথিবীর ১ম বিরাম \r\nচিহ্নের ইতিকথা – এক নতুন ঊষা। …মহাকাব্য লিখতে ঋষি-মুনি হওয়া লাগে না।<br>\r\nঅর্থহীনতা আর অর্থদ্যোতনার সেই ঈর্ষাকাতর মোহাবিষ্টতা তাই তৈরি করে নাও \r\nনিজের মাঝে- চাই একটুখানি ঔৎসুক্য। নিজেই ঠিক করো, নিজের ভাষাটা কি \r\nঅর্থহীন, নাকি কিছু সত্যিই বলছে!</p>', 'dgsdfhsdfh', NULL, 'স্বাস্থ্য সচেতন তরুন সমাজ-1595434387-featured_images.jpg', 'life', 11, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-22 10:13:07', '2020-07-22 10:13:07'),
(34, 'বৃদ্ধ বয়সে উপার্জন করবেন যেভাবে', 'ysjsjdgfuasdyfistyi', 'বৃদ্ধ বয়সে উপার্জন করবেন যেভাবে', '<p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক \r\nকিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের\r\n ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে \r\nঅর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। \r\nযেকোনো লেখাই তোমার কাছে অর্থবোধকতা তৈরি করতে পারে, যদি তুমি সেখানে \r\nঅর্থদ্যোতনা দেখতে পাও। …ছিদ্রান্বেষণ? না, তা হবে কেন?</p>\r\n<p>যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো,\r\n তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, \r\nতুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো \r\nনা, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো,\r\n আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি;\r\n এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p>\r\n<p>কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো \r\nবলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় \r\nনা, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই \r\nকথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার \r\nপ্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু\r\n বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার \r\nপ্রত্যুৎপন্নমতিত্ব।</p>\r\n<p>তাই কোন কথাটি কাজে লাগবে, তা নির্ধারণ করবে তুমি— হ্যাঁ, তুমি। হয়তো \r\nসামান্য ক’টা বাংলা অক্ষর: খন্ড-ত, অনুস্বার, বিঃসর্গ কিংবা চন্দ্রবিন্দু— \r\nকিন্তু যদি তুমি বিশ্বাস করো, তাহলে হয়তো তুমি তা দিয়েই তৈরি করতে পারো এক \r\nউচ্চমার্গীয় মহাকাব্য- এক চিরসবুজ অর্ঘ্য। রচিত হতে পারে পৃথিবীর ১ম বিরাম \r\nচিহ্নের ইতিকথা – এক নতুন ঊষা। …মহাকাব্য লিখতে ঋষি-মুনি হওয়া লাগে না।<br>\r\nঅর্থহীনতা আর অর্থদ্যোতনার সেই ঈর্ষাকাতর মোহাবিষ্টতা তাই তৈরি করে নাও \r\nনিজের মাঝে- চাই একটুখানি ঔৎসুক্য। নিজেই ঠিক করো, নিজের ভাষাটা কি \r\nঅর্থহীন, নাকি কিছু সত্যিই বলছে!</p>', 'uiyiugfjsdgjf', NULL, 'বৃদ্ধ বয়সে উপার্জন করবেন যেভাবে-1595434512-featured_images.jpg', 'life', 11, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-22 10:15:12', '2020-07-22 10:15:12'),
(35, 'কৃত্রিম বুদ্ধিমত্তা নিয়ে কাজ করছে শিক্ষার্থীরা', 'yerriasgfagrytier', 'কৃত্রিম বুদ্ধিমত্তা নিয়ে কাজ করছে দেশের শিক্ষার্থীরা', '<p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক কিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে অর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। যেকোনো লেখাই তোমার কাছে অর্থবোধকতা তৈরি করতে পারে, যদি তুমি সেখানে অর্থদ্যোতনা দেখতে পাও। &hellip;ছিদ্রান্বেষণ? না, তা হবে কেন?</p>\r\n<p>যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো, তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, তুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো না, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো, আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি; এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p>\r\n<p>কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো বলবে &ldquo;আমি করবো না।&rdquo; হ্যা, &ldquo;আমি করবো না&rdquo; বললেই সবকিছু অস্বীকার করা যায় না, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই কথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো&mdash; তার প্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি&hellip; শুধু এতটুকু বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার প্রত্যুৎপন্নমতিত্ব।</p>\r\n<p>তাই কোন কথাটি কাজে লাগবে, তা নির্ধারণ করবে তুমি&mdash; হ্যাঁ, তুমি। হয়তো সামান্য ক&rsquo;টা বাংলা অক্ষর: খন্ড-ত, অনুস্বার, বিঃসর্গ কিংবা চন্দ্রবিন্দু&mdash; কিন্তু যদি তুমি বিশ্বাস করো, তাহলে হয়তো তুমি তা দিয়েই তৈরি করতে পারো এক উচ্চমার্গীয় মহাকাব্য- এক চিরসবুজ অর্ঘ্য। রচিত হতে পারে পৃথিবীর ১ম বিরাম চিহ্নের ইতিকথা &ndash; এক নতুন ঊষা। &hellip;মহাকাব্য লিখতে ঋষি-মুনি হওয়া লাগে না।<br />অর্থহীনতা আর অর্থদ্যোতনার সেই ঈর্ষাকাতর মোহাবিষ্টতা তাই তৈরি করে নাও নিজের মাঝে- চাই একটুখানি ঔৎসুক্য। নিজেই ঠিক করো, নিজের ভাষাটা কি অর্থহীন, নাকি কিছু সত্যিই বলছে!</p>', 'efgsfuksdhku', NULL, 'কৃত্রিম বুদ্ধিমত্তা নিয়ে কাজ করছে দেশের শিক্ষার্থীরা-1595434713-featured_images.jpg', 'science', 15, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, '2020-07-22 10:18:33', '2020-09-14 11:04:06'),
(36, 'আমেরিকায় রোবট প্রতিযোগিতায় প্রথম বুয়েট', 'tyuiwrirgkhrutiuy', 'আমেরিকায় রোবট প্রতিযোগিতায় প্রথম বুয়েটের শিক্ষার্থীরা', '<p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক \r\nকিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের\r\n ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে \r\nঅর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। \r\nযেকোনো লেখাই তোমার কাছে অর্থবোধকতা তৈরি করতে পারে, যদি তুমি সেখানে \r\nঅর্থদ্যোতনা দেখতে পাও। …ছিদ্রান্বেষণ? না, তা হবে কেন?</p>\r\n<p>যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো,\r\n তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, \r\nতুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো \r\nনা, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো,\r\n আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি;\r\n এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p>\r\n<p>কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো \r\nবলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় \r\nনা, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই \r\nকথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার \r\nপ্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু\r\n বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার \r\nপ্রত্যুৎপন্নমতিত্ব।</p>\r\n<p>তাই কোন কথাটি কাজে লাগবে, তা নির্ধারণ করবে তুমি— হ্যাঁ, তুমি। হয়তো \r\nসামান্য ক’টা বাংলা অক্ষর: খন্ড-ত, অনুস্বার, বিঃসর্গ কিংবা চন্দ্রবিন্দু— \r\nকিন্তু যদি তুমি বিশ্বাস করো, তাহলে হয়তো তুমি তা দিয়েই তৈরি করতে পারো এক \r\nউচ্চমার্গীয় মহাকাব্য- এক চিরসবুজ অর্ঘ্য। রচিত হতে পারে পৃথিবীর ১ম বিরাম \r\nচিহ্নের ইতিকথা – এক নতুন ঊষা। …মহাকাব্য লিখতে ঋষি-মুনি হওয়া লাগে না।<br>\r\nঅর্থহীনতা আর অর্থদ্যোতনার সেই ঈর্ষাকাতর মোহাবিষ্টতা তাই তৈরি করে নাও \r\nনিজের মাঝে- চাই একটুখানি ঔৎসুক্য। নিজেই ঠিক করো, নিজের ভাষাটা কি \r\nঅর্থহীন, নাকি কিছু সত্যিই বলছে!</p>', 'teehsefjdfgj', NULL, 'আমেরিকায় রোবট প্রতিযোগিতায় প্রথম বুয়েটের শিক্ষার্থীরা-1595434853-featured_images.jpg', 'science', 8, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, '2020-07-22 10:20:53', '2020-07-22 10:40:23'),
(37, 'মোবাইল ফোন রপ্তানি শুরু করলো বাংলাদেশ', 'uiysdfkzfvzxgisyi', 'মোবাইল ফোন রপ্তানি শুরু করলো বাংলাদেশ', '<p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক \r\nকিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের\r\n ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে \r\nঅর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। \r\nযেকোনো লেখাই তোমার কাছে অর্থবোধকতা তৈরি করতে পারে, যদি তুমি সেখানে \r\nঅর্থদ্যোতনা দেখতে পাও। …ছিদ্রান্বেষণ? না, তা হবে কেন?</p>\r\n<p>যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো,\r\n তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, \r\nতুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো \r\nনা, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো,\r\n আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি;\r\n এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p>\r\n<p>কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো \r\nবলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় \r\nনা, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই \r\nকথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার \r\nপ্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু\r\n বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার \r\nপ্রত্যুৎপন্নমতিত্ব।</p>\r\n<p>তাই কোন কথাটি কাজে লাগবে, তা নির্ধারণ করবে তুমি— হ্যাঁ, তুমি। হয়তো \r\nসামান্য ক’টা বাংলা অক্ষর: খন্ড-ত, অনুস্বার, বিঃসর্গ কিংবা চন্দ্রবিন্দু— \r\nকিন্তু যদি তুমি বিশ্বাস করো, তাহলে হয়তো তুমি তা দিয়েই তৈরি করতে পারো এক \r\nউচ্চমার্গীয় মহাকাব্য- এক চিরসবুজ অর্ঘ্য। রচিত হতে পারে পৃথিবীর ১ম বিরাম \r\nচিহ্নের ইতিকথা – এক নতুন ঊষা। …মহাকাব্য লিখতে ঋষি-মুনি হওয়া লাগে না।<br>\r\nঅর্থহীনতা আর অর্থদ্যোতনার সেই ঈর্ষাকাতর মোহাবিষ্টতা তাই তৈরি করে নাও \r\nনিজের মাঝে- চাই একটুখানি ঔৎসুক্য। নিজেই ঠিক করো, নিজের ভাষাটা কি \r\nঅর্থহীন, নাকি কিছু সত্যিই বলছে!</p>', 'setasegvxv', NULL, 'মোবাইল ফোন রপ্তানি শুরু করলো বাংলাদেশ-1595435061-featured_images.jpg', 'science', 8, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-22 10:24:21', '2020-07-22 10:24:21'),
(38, 'আগামী শনিবার পবিত্র ঈদুল আযহা', 'eytsegfhsdfsgfsy', 'আগামী শনিবার পবিত্র ঈদুল আযহা', '<p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক \r\nকিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের\r\n ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে \r\nঅর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। \r\nযেকোনো লেখাই তোমার কাছে অর্থবোধকতা তৈরি করতে পারে, যদি তুমি সেখানে \r\nঅর্থদ্যোতনা দেখতে পাও। …ছিদ্রান্বেষণ? না, তা হবে কেন?</p>\r\n<p>যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো,\r\n তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, \r\nতুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো \r\nনা, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো,\r\n আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি;\r\n এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p>\r\n<p>কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো \r\nবলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় \r\nনা, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই \r\nকথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার \r\nপ্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু\r\n বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার \r\nপ্রত্যুৎপন্নমতিত্ব।</p>\r\n<p>তাই কোন কথাটি কাজে লাগবে, তা নির্ধারণ করবে তুমি— হ্যাঁ, তুমি। হয়তো \r\nসামান্য ক’টা বাংলা অক্ষর: খন্ড-ত, অনুস্বার, বিঃসর্গ কিংবা চন্দ্রবিন্দু— \r\nকিন্তু যদি তুমি বিশ্বাস করো, তাহলে হয়তো তুমি তা দিয়েই তৈরি করতে পারো এক \r\nউচ্চমার্গীয় মহাকাব্য- এক চিরসবুজ অর্ঘ্য। রচিত হতে পারে পৃথিবীর ১ম বিরাম \r\nচিহ্নের ইতিকথা – এক নতুন ঊষা। …মহাকাব্য লিখতে ঋষি-মুনি হওয়া লাগে না।<br>\r\nঅর্থহীনতা আর অর্থদ্যোতনার সেই ঈর্ষাকাতর মোহাবিষ্টতা তাই তৈরি করে নাও \r\nনিজের মাঝে- চাই একটুখানি ঔৎসুক্য। নিজেই ঠিক করো, নিজের ভাষাটা কি \r\nঅর্থহীন, নাকি কিছু সত্যিই বলছে!</p>', 'twrtwrwrtqwrtwtw', NULL, 'আগামী শনিবার পবিত্র ঈদুল আযহা-1595435137-featured_images.jpg', 'bangladesh', 9, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-22 10:25:37', '2020-07-22 10:25:37'),
(39, 'নতুন জাতের ধান উৎপাদন শুরু', 'yerykefgjzxcvchgsjh', 'নতুন জাতের ধান উৎপাদন শুরু', '<p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক \r\nকিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের\r\n ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে \r\nঅর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। \r\nযেকোনো লেখাই তোমার কাছে অর্থবোধকতা তৈরি করতে পারে, যদি তুমি সেখানে \r\nঅর্থদ্যোতনা দেখতে পাও। …ছিদ্রান্বেষণ? না, তা হবে কেন?</p>\r\n<p>যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো,\r\n তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, \r\nতুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো \r\nনা, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো,\r\n আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি;\r\n এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p>\r\n<p>কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো \r\nবলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় \r\nনা, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই \r\nকথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার \r\nপ্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু\r\n বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার \r\nপ্রত্যুৎপন্নমতিত্ব।</p>\r\n<p>তাই কোন কথাটি কাজে লাগবে, তা নির্ধারণ করবে তুমি— হ্যাঁ, তুমি। হয়তো \r\nসামান্য ক’টা বাংলা অক্ষর: খন্ড-ত, অনুস্বার, বিঃসর্গ কিংবা চন্দ্রবিন্দু— \r\nকিন্তু যদি তুমি বিশ্বাস করো, তাহলে হয়তো তুমি তা দিয়েই তৈরি করতে পারো এক \r\nউচ্চমার্গীয় মহাকাব্য- এক চিরসবুজ অর্ঘ্য। রচিত হতে পারে পৃথিবীর ১ম বিরাম \r\nচিহ্নের ইতিকথা – এক নতুন ঊষা। …মহাকাব্য লিখতে ঋষি-মুনি হওয়া লাগে না।<br>\r\nঅর্থহীনতা আর অর্থদ্যোতনার সেই ঈর্ষাকাতর মোহাবিষ্টতা তাই তৈরি করে নাও \r\nনিজের মাঝে- চাই একটুখানি ঔৎসুক্য। নিজেই ঠিক করো, নিজের ভাষাটা কি \r\nঅর্থহীন, নাকি কিছু সত্যিই বলছে!</p>', 'asdasfastsrt', NULL, 'নতুন জাতের ধান উৎপাদন শুরু-1595435216-featured_images.jpg', 'bangladesh', 9, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-22 10:26:56', '2020-07-22 10:26:56'),
(40, 'দেশে শিক্ষিতের হার এখন শতকরা ৯৭ ভাগ', 'uifdvjgcnmbasjdtweutdfj', 'দেশে শিক্ষিতের হার এখন শতকরা ৯৭ ভাগ', '<p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক \r\nকিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের\r\n ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে \r\nঅর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। \r\nযেকোনো লেখাই তোমার কাছে অর্থবোধকতা তৈরি করতে পারে, যদি তুমি সেখানে \r\nঅর্থদ্যোতনা দেখতে পাও। …ছিদ্রান্বেষণ? না, তা হবে কেন?</p>\r\n<p>যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো,\r\n তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, \r\nতুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো \r\nনা, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো,\r\n আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি;\r\n এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p>\r\n<p>কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো \r\nবলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় \r\nনা, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই \r\nকথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার \r\nপ্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু\r\n বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার \r\nপ্রত্যুৎপন্নমতিত্ব।</p>\r\n<p>তাই কোন কথাটি কাজে লাগবে, তা নির্ধারণ করবে তুমি— হ্যাঁ, তুমি। হয়তো \r\nসামান্য ক’টা বাংলা অক্ষর: খন্ড-ত, অনুস্বার, বিঃসর্গ কিংবা চন্দ্রবিন্দু— \r\nকিন্তু যদি তুমি বিশ্বাস করো, তাহলে হয়তো তুমি তা দিয়েই তৈরি করতে পারো এক \r\nউচ্চমার্গীয় মহাকাব্য- এক চিরসবুজ অর্ঘ্য। রচিত হতে পারে পৃথিবীর ১ম বিরাম \r\nচিহ্নের ইতিকথা – এক নতুন ঊষা। …মহাকাব্য লিখতে ঋষি-মুনি হওয়া লাগে না।<br>\r\nঅর্থহীনতা আর অর্থদ্যোতনার সেই ঈর্ষাকাতর মোহাবিষ্টতা তাই তৈরি করে নাও \r\nনিজের মাঝে- চাই একটুখানি ঔৎসুক্য। নিজেই ঠিক করো, নিজের ভাষাটা কি \r\nঅর্থহীন, নাকি কিছু সত্যিই বলছে!</p>', 'tuyhcbcbgdtryr', NULL, 'দেশে শিক্ষিতের হার এখন শতকরা ৯৭ ভাগ-1595435312-featured_images.jpg', 'bangladesh', 9, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-22 10:28:32', '2020-07-22 10:28:32'),
(41, 'স্বাধীনতার স্বাদ পেলো ফিলিস্তিন', 'uerilckgsdcistdf7y', 'স্বাধীনতার স্বাদ পেলো ফিলিস্তিন', '<p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক \r\nকিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের\r\n ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে \r\nঅর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। \r\nযেকোনো লেখাই তোমার কাছে অর্থবোধকতা তৈরি করতে পারে, যদি তুমি সেখানে \r\nঅর্থদ্যোতনা দেখতে পাও। …ছিদ্রান্বেষণ? না, তা হবে কেন?</p>\r\n<p>যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো,\r\n তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, \r\nতুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো \r\nনা, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো,\r\n আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি;\r\n এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p>\r\n<p>কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো \r\nবলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় \r\nনা, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই \r\nকথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার \r\nপ্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু\r\n বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার \r\nপ্রত্যুৎপন্নমতিত্ব।</p>\r\n<p>তাই কোন কথাটি কাজে লাগবে, তা নির্ধারণ করবে তুমি— হ্যাঁ, তুমি। হয়তো \r\nসামান্য ক’টা বাংলা অক্ষর: খন্ড-ত, অনুস্বার, বিঃসর্গ কিংবা চন্দ্রবিন্দু— \r\nকিন্তু যদি তুমি বিশ্বাস করো, তাহলে হয়তো তুমি তা দিয়েই তৈরি করতে পারো এক \r\nউচ্চমার্গীয় মহাকাব্য- এক চিরসবুজ অর্ঘ্য। রচিত হতে পারে পৃথিবীর ১ম বিরাম \r\nচিহ্নের ইতিকথা – এক নতুন ঊষা। …মহাকাব্য লিখতে ঋষি-মুনি হওয়া লাগে না।<br>\r\nঅর্থহীনতা আর অর্থদ্যোতনার সেই ঈর্ষাকাতর মোহাবিষ্টতা তাই তৈরি করে নাও \r\nনিজের মাঝে- চাই একটুখানি ঔৎসুক্য। নিজেই ঠিক করো, নিজের ভাষাটা কি \r\nঅর্থহীন, নাকি কিছু সত্যিই বলছে!</p>', 'asdtastsgasgs', NULL, 'স্বাধীনতার স্বাদ পেলো ফিলিস্তিন-1595440466-featured_images.jpg', 'international', 12, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-22 11:54:26', '2020-07-22 11:54:26'),
(42, 'সৌদিতে ঈদ উদযাপন', 'yueayegfjagfay', 'সৌদিতে ঈদ উদযাপন', '<p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক \r\nকিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের\r\n ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে \r\nঅর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। \r\nযেকোনো লেখাই তোমার কাছে অর্থবোধকতা তৈরি করতে পারে, যদি তুমি সেখানে \r\nঅর্থদ্যোতনা দেখতে পাও। …ছিদ্রান্বেষণ? না, তা হবে কেন?</p>\r\n<p>যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো,\r\n তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, \r\nতুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো \r\nনা, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো,\r\n আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি;\r\n এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p>\r\n<p>কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো \r\nবলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় \r\nনা, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই \r\nকথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার \r\nপ্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু\r\n বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার \r\nপ্রত্যুৎপন্নমতিত্ব।</p>\r\n<p>তাই কোন কথাটি কাজে লাগবে, তা নির্ধারণ করবে তুমি— হ্যাঁ, তুমি। হয়তো \r\nসামান্য ক’টা বাংলা অক্ষর: খন্ড-ত, অনুস্বার, বিঃসর্গ কিংবা চন্দ্রবিন্দু— \r\nকিন্তু যদি তুমি বিশ্বাস করো, তাহলে হয়তো তুমি তা দিয়েই তৈরি করতে পারো এক \r\nউচ্চমার্গীয় মহাকাব্য- এক চিরসবুজ অর্ঘ্য। রচিত হতে পারে পৃথিবীর ১ম বিরাম \r\nচিহ্নের ইতিকথা – এক নতুন ঊষা। …মহাকাব্য লিখতে ঋষি-মুনি হওয়া লাগে না।<br>\r\nঅর্থহীনতা আর অর্থদ্যোতনার সেই ঈর্ষাকাতর মোহাবিষ্টতা তাই তৈরি করে নাও \r\nনিজের মাঝে- চাই একটুখানি ঔৎসুক্য। নিজেই ঠিক করো, নিজের ভাষাটা কি \r\nঅর্থহীন, নাকি কিছু সত্যিই বলছে!</p>', 'atatwratwrat', NULL, 'সৌদিতে ঈদ উদযাপন-1595440600-featured_images.jpg', 'international', 12, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-22 11:56:40', '2020-07-22 11:56:40');
INSERT INTO `posts` (`id`, `title`, `slug`, `short_description`, `description`, `meta_description`, `meta_keywords`, `featured_image`, `featured_image_caption`, `category_id`, `status`, `deleted_at`, `is_slider`, `is_top`, `total_view`, `total_search`, `total_liked`, `total_disliked`, `total_comment`, `total_reaction`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(43, 'মার্কিন প্রেসিডেন্ট নির্বাচন', 'rrtwrtrtr', 'মার্কিন প্রেসিডেন্ট নির্বাচন', '<p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক \r\nকিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের\r\n ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে \r\nঅর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। \r\nযেকোনো লেখাই তোমার কাছে অর্থবোধকতা তৈরি করতে পারে, যদি তুমি সেখানে \r\nঅর্থদ্যোতনা দেখতে পাও। …ছিদ্রান্বেষণ? না, তা হবে কেন?</p>\r\n<p>যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো,\r\n তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, \r\nতুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো \r\nনা, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো,\r\n আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি;\r\n এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p>\r\n<p>কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো \r\nবলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় \r\nনা, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই \r\nকথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার \r\nপ্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু\r\n বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার \r\nপ্রত্যুৎপন্নমতিত্ব।</p>\r\n<p>তাই কোন কথাটি কাজে লাগবে, তা নির্ধারণ করবে তুমি— হ্যাঁ, তুমি। হয়তো \r\nসামান্য ক’টা বাংলা অক্ষর: খন্ড-ত, অনুস্বার, বিঃসর্গ কিংবা চন্দ্রবিন্দু— \r\nকিন্তু যদি তুমি বিশ্বাস করো, তাহলে হয়তো তুমি তা দিয়েই তৈরি করতে পারো এক \r\nউচ্চমার্গীয় মহাকাব্য- এক চিরসবুজ অর্ঘ্য। রচিত হতে পারে পৃথিবীর ১ম বিরাম \r\nচিহ্নের ইতিকথা – এক নতুন ঊষা। …মহাকাব্য লিখতে ঋষি-মুনি হওয়া লাগে না।<br>\r\nঅর্থহীনতা আর অর্থদ্যোতনার সেই ঈর্ষাকাতর মোহাবিষ্টতা তাই তৈরি করে নাও \r\nনিজের মাঝে- চাই একটুখানি ঔৎসুক্য। নিজেই ঠিক করো, নিজের ভাষাটা কি \r\nঅর্থহীন, নাকি কিছু সত্যিই বলছে!</p>', 'argzsfgafgafg', NULL, 'মার্কিন প্রেসিডেন্ট নির্বাচন-1595440684-featured_images.jpg', 'international', 12, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-07-22 11:58:04', '2020-07-22 11:58:04'),
(44, 'আগামী শনিবার পবিত্র ঈদুল আযহা', 'gjsdgfystyufgsjhsg', 'আগামী শনিবার পবিত্র ঈদুল আযহা', '<p style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; text-align: justify;\">যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো, তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, তুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো না, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো, আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি; এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p><p style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; text-align: justify;\">কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো বলবে “আমি করবো না।” হ্যা, “আমি করবো না” বললেই সবকিছু অস্বীকার করা যায় না, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই কথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো— তার প্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি… শুধু এতটুকু বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার প্রত্যুৎপন্নমতিত্ব।</p><p style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; color: rgb(85, 85, 85); font-family: Roboto; font-size: 16px; text-align: justify;\">তাই কোন কথাটি কাজে লাগবে, তা নির্ধারণ করবে তুমি— হ্যাঁ, তুমি। হয়তো সামান্য ক’টা বাংলা অক্ষর: খন্ড-ত, অনুস্বার, বিঃসর্গ কিংবা চন্দ্রবিন্দু— কিন্তু যদি তুমি বিশ্বাস করো, তাহলে হয়তো তুমি তা দিয়েই তৈরি করতে পারো এক উচ্চমার্গীয় মহাকাব্য- এক চিরসবুজ অর্ঘ্য। রচিত হতে পারে পৃথিবীর ১ম বিরাম চিহ্নের ইতিকথা – এক নতুন ঊষা। …মহাকাব্য লিখতে ঋষি-মুনি হওয়া লাগে না।<br>অর্থহীনতা আর অর্থদ্যোতনার সেই ঈর্ষাকাতর মোহাবিষ্টতা তাই তৈরি করে নাও নিজের মাঝে- চাই একটুখানি ঔৎসুক্য। নিজেই ঠিক করো, নিজের ভাষাটা কি অর্থহীন, নাকি কিছু সত্যিই বলছে!</p>', 'tftygfasjgftwetsdtsd', NULL, 'আগামী শনিবার পবিত্র ঈদুল আযহা-1595739343-featured_images.png', 'news image', 10, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, '2020-07-25 22:55:43', '2020-08-15 13:15:36'),
(47, 'Final check', 'finalcheck', 'ARL ARL ARL ARL ARL ARL ARL ARL ARL ARL', '<p>Akij Resource Ltd.</p>', 'fsdvdffsds', NULL, 'Final check-1597897735-featured_images.png', 'arl logo', 12, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-08-19 22:28:55', '2020-08-19 22:28:55'),
(48, 'United States Teenager charged over killings at Kenosha protest', 'unitedstatesteenagerchargedoverkillingsatkenoshaprotest', NULL, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is\r\n reproduced below for those interested. Sections 1.10.32 and 1.10.33 \r\nfrom \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in \r\ntheir exact original form, accompanied by English versions from the 1914\r\n translation by H. Rackham.</p>', NULL, NULL, 'defaultNews.jpg', NULL, 13, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-08-27 01:56:37', '2020-08-27 01:56:37'),
(49, 'China fires \'aircraft-carrier killer\' missile in warning to US', 'chinafires\'aircraft-carrierkiller\'missileinwarningtous', NULL, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is\r\n reproduced below for those interested. Sections 1.10.32 and 1.10.33 \r\nfrom \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in \r\ntheir exact original form, accompanied by English versions from the 1914\r\n translation by H. Rackham.</p>', NULL, NULL, 'defaultNews.jpg', NULL, 13, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-08-27 01:57:11', '2020-08-27 01:57:11'),
(50, 'Pompeo blasts HSBC again over Hong Kong', 'pompeoblastshsbcagainoverhongkong', NULL, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is\r\n reproduced below for those interested. Sections 1.10.32 and 1.10.33 \r\nfrom \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in \r\ntheir exact original form, accompanied by English versions from the 1914\r\n translation by H. Rackham.</p>', NULL, NULL, 'defaultNews.jpg', NULL, 13, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-08-27 01:58:01', '2020-08-27 01:58:01'),
(51, 'Novavax CEO expects filing for COVID-19 vaccine approval in December: paper', 'novavaxceoexpectsfilingforcovid-19vaccineapprovalindecember:paper', 'Novavax CEO expects filing for COVID-19 vaccine approval in December: paper', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is\r\n reproduced below for those interested. Sections 1.10.32 and 1.10.33 \r\nfrom \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in \r\ntheir exact original form, accompanied by English versions from the 1914\r\n translation by H. Rackham.</p>', NULL, NULL, 'defaultNews.jpg', NULL, 14, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-08-27 03:55:01', '2020-08-27 03:55:01'),
(52, 'China\'s offer of coronavirus tests for all in Hong Kong meets with public distrust', 'china\'sofferofcoronavirustestsforallinhongkongmeetswithpublicdistrust', 'China\'s offer of coronavirus tests for all in Hong Kong meets with public distrust', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is\r\n reproduced below for those interested. Sections 1.10.32 and 1.10.33 \r\nfrom \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in \r\ntheir exact original form, accompanied by English versions from the 1914\r\n translation by H. Rackham.</p>', NULL, NULL, 'defaultNews.jpg', NULL, 14, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-08-27 03:55:42', '2020-08-27 03:55:42'),
(53, 'Abbott wins U.S. authorization for $5 rapid COVID-19 antigen test', 'abbottwinsu.s.authorizationfor$5rapidcovid-19antigentest', 'Abbott wins U.S. authorization for $5 rapid COVID-19 antigen test', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical literature, discovered the \r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 \r\nof \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by \r\nCicero, written in 45 BC. This book is a treatise on the theory of \r\nethics, very popular during the Renaissance. The first line of Lorem \r\nIpsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section \r\n1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is\r\n reproduced below for those interested. Sections 1.10.32 and 1.10.33 \r\nfrom \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in \r\ntheir exact original form, accompanied by English versions from the 1914\r\n translation by H. Rackham.</p>', NULL, NULL, 'defaultNews.jpg', NULL, 14, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-08-27 03:56:47', '2020-08-27 03:56:47'),
(54, 'Test Alzajeera News', 'testalzajeeranews', 'Test Alzajeera News', '<p>jhfgsuftsdufgsidfsilfslfgdfgsydfgsdfgsdgfsygfyfgdj</p>', NULL, NULL, 'defaultNews.jpg', NULL, 13, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-08-31 10:32:35', '2020-08-31 10:32:35'),
(55, 'Test Auth', 'testauth', 'Test Auth', '<p>Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth<span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><span style=\"font-size: 0.875rem;\">Test Auth&nbsp;Test AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest AuthTest Auth</span><br></p>', NULL, NULL, 'Test Auth-1599046084-featured_images.png', 'sfsfs', 5, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, NULL, '2020-09-02 11:28:04', '2020-09-03 04:08:58'),
(56, 'একটি সুন্দর পৃথিবীর আশায় আমরা সবাই', 'সুন্দর-পৃথিবীর-আশায়-আম্রা-সবাই', 'সুন্দর পৃথিবীর আশায়', '<p>gdhdghghdghghg</p>', NULL, NULL, 'defaultNews.jpg', NULL, 9, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, NULL, '2020-09-03 06:12:26', '2020-09-03 06:18:16'),
(57, 'Global Environment', 'globalenvironment', 'global testgretrtrtre', '<p>uiyadfiuydaidfyiudyiudyfiudifudiudiaigadfifg difyuidu dfiauioadfu ifuiodud fuioufioaa iuooafu<span style=\"font-size: 0.875rem;\">uiyadfiuydaidfyiudyiudyfiudifudiudiaigadfifg difyuidu dfiauioadfu ifuiodud fuioufioaa iuooafu</span><span style=\"font-size: 0.875rem;\">uiyadfiuydaidfyiudyiudyfiudifudiudiaigadfifg difyuidu dfiauioadfu ifuiodud fuioufioaa iuooafu</span><span style=\"font-size: 0.875rem;\">uiyadfiuydaidfyiudyiudyfiudifudiudiaigadfifg difyuidu dfiauioadfu ifuiodud fuioufioaa iuooafu</span><span style=\"font-size: 0.875rem;\">uiyadfiuydaidfyiudyiudyfiudifudiudiaigadfifg difyuidu dfiauioadfu ifuiodud fuioufioaa iuooafu</span><span style=\"font-size: 0.875rem;\">uiyadfiuydaidfyiudyiudyfiudifudiudiaigadfifg difyuidu dfiauioadfu ifuiodud fuioufioaa iuooafu</span><span style=\"font-size: 0.875rem;\">uiyadfiuydaidfyiudyiudyfiudifudiudiaigadfifg difyuidu dfiauioadfu ifuiodud fuioufioaa iuooafu</span><span style=\"font-size: 0.875rem;\">uiyadfiuydaidfyiudyiudyfiudifudiudiaigadfifg difyuidu dfiauioadfu ifuiodud fuioufioaa iuooafu</span><span style=\"font-size: 0.875rem;\">uiyadfiuydaidfyiudyiudyfiudifudiudiaigadfifg difyuidu dfiauioadfu ifuiodud fuioufioaa iuooafu test test</span></p>', NULL, NULL, 'Global Environment-1599113958-featured_images.png', NULL, 8, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, NULL, '2020-09-03 06:19:18', '2020-09-03 06:29:21'),
(58, 'বন্যা পরিস্থিতি স্বাভাবিক হচ্ছে', 'বন্যাপরিস্থিতিস্বাভাবিকহচ্ছে', 'sdgfsdugsfjjsvjhk', '<p>ufufhgksdfhgkudfhk hello&nbsp; updated</p>', NULL, NULL, 'defaultNews.jpg', NULL, 10, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1, NULL, '2020-09-03 06:22:49', '2020-09-03 08:46:24'),
(59, 'Test post', 'testpost', 'test post', '<p>jhdgafdgfjdgfjdgjdh</p><p>djfgjdhgfjdhghk</p><p>dhfjdgfjadg</p>', NULL, NULL, 'Test post-1600665932-featured_images.png', NULL, 9, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-09-21 05:25:32', '2020-09-21 05:25:32'),
(60, 'বাংলা লিখছি বাংলা বুঝে নাও', 'বাংলালিখছিবাংলাবুঝেনাও', NULL, '<p>বাংলা লিখছি বাংলা বুঝে নাও&nbsp;<br></p>', 'বাংলা লিখছি বাংলা বুঝে নাও', NULL, 'defaultNews.jpg', NULL, 11, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-10-02 18:41:39', '2020-10-02 18:41:39'),
(61, 'বাংলা লিখছি বাংলা বুঝে নাও', 'বাংলা লিখছি বাংলা বুঝে নাও', NULL, '<p>বাংলা লিখছি বাংলা বুঝে নাও&nbsp;<br></p>', 'বাংলা লিখছি বাংলা বুঝে নাও', NULL, 'defaultNews.jpg', NULL, 12, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, '2020-10-02 18:43:29', '2020-10-02 18:43:29'),
(62, 'বাংলা লিখছি বাংলা বুঝে নাও tooo', 'বাংলা-লিখছি-বাংলা-বুঝে-নাও-tooo', NULL, '<p>বাংলা লিখছি বাংলা বুঝে নাও&nbsp;</p>', NULL, NULL, 'defaultNews.jpg', NULL, 12, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, '2020-10-02 18:56:05', '2020-10-02 18:56:18'),
(63, 'শান্তির ধর্ম ইসলাম', 'শান্তির-ধর্ম-ইসলাম', 'Islamic post', '<p style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; color: #555555;\">যে কথাকে কাজে লাগাতে চাও, তাকে কাজে লাগানোর কথা চিন্তা করার আগে ভাবো, তুমি কি সেই কথার জাদুতে আচ্ছন্ন হয়ে গেছ কিনা। তুমি যদি নিশ্চিত হও যে, তুমি কোনো মোহাচ্ছাদিত আবহে আবিষ্ট হয়ে অন্যের শেখানো বুলি আত্মস্থ করছো না, তাহলে তুমি নির্ভয়ে, নিশ্চিন্তে অগ্রসর হও। তুমি সেই কথাকে জানো, বুঝো, আত্মস্থ করো; মনে রাখবে, যা অনুসরণ করতে চলেছো, তা আগে অনুধাবন করা জরুরি; এখানে কিংকর্তব্যবিমূঢ় হবার কোনো সুযোগ নেই।</p>\r\n<p style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; color: #555555;\">কোনো কথা শোনামাত্রই কি তুমি তা বিশ্বাস করবে? হয়তো বলবে, করবে, হয়তো বলবে &ldquo;আমি করবো না।&rdquo; হ্যা, &ldquo;আমি করবো না&rdquo; বললেই সবকিছু অস্বীকার করা যায় না, হয়তো তুমি মনের গহীন গভীর থেকে ঠিকই বিশ্বাস করতে শুরু করেছো সেই কথাটি, কিন্তু মুখে অস্বীকার করছো। তাই সচেতন থাকো, তুমি কী ভাবছো&mdash; তার প্রতি; সচেতন থাকো, তুমি কি আসলেই বিশ্বাস করতে চলেছো ঐ কথাটি&hellip; শুধু এতটুকু বলি, যা-ই বিশ্বাস করো না কেন, আগে যাচাই করে নাও; আর এতে চাই তোমার প্রত্যুৎপন্নমতিত্ব।</p>\r\n<p style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; color: #555555;\">তাই কোন কথাটি কাজে লাগবে, তা নির্ধারণ করবে তুমি&mdash; হ্যাঁ, তুমি। হয়তো সামান্য ক&rsquo;টা বাংলা অক্ষর: খন্ড-ত, অনুস্বার, বিঃসর্গ কিংবা চন্দ্রবিন্দু&mdash; কিন্তু যদি তুমি বিশ্বাস করো, তাহলে হয়তো তুমি তা দিয়েই তৈরি করতে পারো এক উচ্চমার্গীয় মহাকাব্য- এক চিরসবুজ অর্ঘ্য। রচিত হতে পারে পৃথিবীর ১ম বিরাম চিহ্নের ইতিকথা &ndash; এক নতুন ঊষা। &hellip;মহাকাব্য লিখতে ঋষি-মুনি হওয়া লাগে না।<br />অর্থহীনতা আর অর্থদ্যোতনার সেই ঈর্ষাকাতর মোহাবিষ্টতা তাই তৈরি করে নাও নিজের মাঝে- চাই একটুখানি ঔৎসুক্য। নিজেই ঠিক করো, নিজের ভাষাটা কি অর্থহীন, নাকি কিছু সত্যিই বলছে!!</p>', NULL, NULL, 'শান্তির ধর্ম ইসলাম-1602043280-featured_images.jpg', 'islamic post', 16, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, '2020-10-07 04:01:20', '2020-10-13 05:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reply_comment_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'It''s the main commment',
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_identity_visible` tinyint(1) NOT NULL DEFAULT 1,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=>approved, 0=>unapproved',
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` bigint(20) UNSIGNED DEFAULT NULL,
  `total_reaction` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'total reaction count',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`id`, `post_id`, `user_id`, `reply_comment_id`, `comment`, `is_identity_visible`, `ip_address`, `status`, `updated_by`, `deleted_by`, `deleted_at`, `total_reaction`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '<div>Welcome to our Comment Section <br /></div>', 1, NULL, 1, NULL, NULL, NULL, 100, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(2, NULL, NULL, NULL, '<div>Welcome to our Comment Section <br /></div>', 1, NULL, 1, NULL, NULL, NULL, 100, '2020-07-09 02:46:29', '2020-07-09 02:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`id`, `tag_id`, `post_id`, `created_at`, `updated_at`) VALUES
(42, 2, 14, '2020-07-14 04:58:20', '2020-07-14 04:58:20'),
(43, 2, 13, '2020-07-14 04:58:31', '2020-07-14 04:58:31'),
(44, 2, 12, '2020-07-14 04:58:44', '2020-07-14 04:58:44'),
(45, 1, 11, '2020-07-14 04:59:03', '2020-07-14 04:59:03'),
(46, 1, 10, '2020-07-14 04:59:13', '2020-07-14 04:59:13'),
(47, 1, 9, '2020-07-14 04:59:25', '2020-07-14 04:59:25'),
(48, 1, 8, '2020-07-14 04:59:43', '2020-07-14 04:59:43'),
(49, 2, 8, '2020-07-14 04:59:43', '2020-07-14 04:59:43'),
(50, 1, 6, '2020-07-14 05:00:04', '2020-07-14 05:00:04'),
(51, 1, 1, '2020-07-14 05:00:22', '2020-07-14 05:00:22'),
(52, 2, 1, '2020-07-14 05:00:22', '2020-07-14 05:00:22'),
(53, 2, 1, '2020-07-14 05:00:22', '2020-07-14 05:00:22'),
(54, 1, 15, '2020-07-14 05:07:35', '2020-07-14 05:07:35'),
(55, 2, 16, '2020-07-14 05:08:35', '2020-07-14 05:08:35'),
(56, 2, 17, '2020-07-14 05:09:24', '2020-07-14 05:09:24'),
(57, 2, 18, '2020-07-14 05:15:39', '2020-07-14 05:15:39'),
(59, 1, 20, '2020-07-14 05:17:12', '2020-07-14 05:17:12'),
(60, 1, 21, '2020-07-14 05:17:59', '2020-07-14 05:17:59'),
(61, 1, 22, '2020-07-14 05:18:49', '2020-07-14 05:18:49'),
(63, 1, 24, '2020-07-21 01:19:52', '2020-07-21 01:19:52'),
(64, 2, 25, '2020-07-21 01:58:12', '2020-07-21 01:58:12'),
(65, 3, 26, '2020-07-21 02:01:24', '2020-07-21 02:01:24'),
(66, 4, 26, '2020-07-21 02:01:24', '2020-07-21 02:01:24'),
(67, 4, 27, '2020-07-21 02:02:45', '2020-07-21 02:02:45'),
(68, 3, 28, '2020-07-21 02:04:03', '2020-07-21 02:04:03'),
(69, 3, 29, '2020-07-21 03:19:12', '2020-07-21 03:19:12'),
(70, 4, 29, '2020-07-21 03:19:12', '2020-07-21 03:19:12'),
(71, 3, 30, '2020-07-21 03:24:27', '2020-07-21 03:24:27'),
(72, 4, 30, '2020-07-21 03:24:27', '2020-07-21 03:24:27'),
(73, 3, 31, '2020-07-22 10:08:23', '2020-07-22 10:08:23'),
(74, 4, 31, '2020-07-22 10:08:23', '2020-07-22 10:08:23'),
(75, 3, 32, '2020-07-22 10:11:01', '2020-07-22 10:11:01'),
(76, 4, 33, '2020-07-22 10:13:07', '2020-07-22 10:13:07'),
(77, 3, 34, '2020-07-22 10:15:12', '2020-07-22 10:15:12'),
(78, 4, 34, '2020-07-22 10:15:12', '2020-07-22 10:15:12'),
(83, 3, 37, '2020-07-22 10:24:21', '2020-07-22 10:24:21'),
(84, 4, 37, '2020-07-22 10:24:21', '2020-07-22 10:24:21'),
(85, 3, 38, '2020-07-22 10:25:37', '2020-07-22 10:25:37'),
(86, 4, 38, '2020-07-22 10:25:37', '2020-07-22 10:25:37'),
(87, 1, 39, '2020-07-22 10:26:56', '2020-07-22 10:26:56'),
(88, 3, 39, '2020-07-22 10:26:56', '2020-07-22 10:26:56'),
(89, 4, 39, '2020-07-22 10:26:56', '2020-07-22 10:26:56'),
(90, 3, 40, '2020-07-22 10:28:32', '2020-07-22 10:28:32'),
(91, 4, 40, '2020-07-22 10:28:32', '2020-07-22 10:28:32'),
(94, 1, 36, '2020-07-22 10:40:23', '2020-07-22 10:40:23'),
(95, 3, 36, '2020-07-22 10:40:23', '2020-07-22 10:40:23'),
(96, 4, 41, '2020-07-22 11:54:26', '2020-07-22 11:54:26'),
(97, 3, 42, '2020-07-22 11:56:40', '2020-07-22 11:56:40'),
(98, 1, 43, '2020-07-22 11:58:04', '2020-07-22 11:58:04'),
(99, 4, 43, '2020-07-22 11:58:04', '2020-07-22 11:58:04'),
(100, 1, 23, '2020-07-25 22:44:03', '2020-07-25 22:44:03'),
(103, 3, 44, '2020-08-15 13:15:36', '2020-08-15 13:15:36'),
(104, 4, 44, '2020-08-15 13:15:36', '2020-08-15 13:15:36'),
(111, 4, 58, '2020-09-03 08:46:24', '2020-09-03 08:46:24'),
(112, 2, 35, '2020-09-14 11:04:06', '2020-09-14 11:04:06'),
(113, 4, 35, '2020-09-14 11:04:06', '2020-09-14 11:04:06'),
(119, 3, 63, '2020-10-13 05:28:31', '2020-10-13 05:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_name` bigint(20) UNSIGNED NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('like','dislike','love','wow','sad','prayer','care') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'like',
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
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Subscriber', 'admin', '2020-07-09 02:46:27', '2020-07-09 02:46:27'),
(2, 'Admin', 'admin', '2020-07-09 02:46:27', '2020-07-09 02:46:27'),
(3, 'Editor', 'admin', '2020-07-09 02:46:27', '2020-07-09 02:46:27'),
(4, 'Super Admin', 'admin', '2020-07-09 02:46:27', '2020-07-09 02:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 4),
(21, 4),
(22, 4),
(23, 4),
(24, 4),
(25, 4),
(26, 4),
(27, 4),
(28, 4),
(29, 2),
(29, 3),
(29, 4),
(30, 2),
(30, 3),
(30, 4),
(31, 2),
(31, 3),
(31, 4),
(32, 2),
(32, 3),
(32, 4),
(33, 4),
(34, 4),
(35, 4),
(36, 4),
(37, 4),
(38, 4),
(39, 4),
(40, 4),
(41, 4),
(42, 4),
(43, 4),
(44, 4),
(45, 4),
(46, 4),
(47, 4),
(48, 4),
(49, 4),
(50, 4),
(51, 4),
(52, 4),
(53, 4),
(54, 4),
(55, 4),
(56, 4),
(57, 4),
(58, 4),
(59, 2),
(59, 3),
(59, 4),
(60, 4),
(61, 4),
(62, 4),
(63, 4),
(64, 4),
(65, 4),
(66, 4),
(67, 4),
(68, 4),
(69, 4),
(70, 4),
(71, 4),
(72, 4),
(73, 4);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'News Portal',
  `site_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `site_favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'favicon.ico',
  `site_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_copyright_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_working_day_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_linkedin_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_custom_data1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_custom_data2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_custom_data3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_custom_data4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured_image_enable` tinyint(1) NOT NULL DEFAULT 1,
  `default_featured_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/public/assets/images/defaults/default-post.png',
  `voting_yes_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#537d00',
  `voting_no_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#cc0000',
  `voting_no_comment_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000000',
  `is_slider_enable` tinyint(1) NOT NULL DEFAULT 1,
  `is_post_slider_enable` tinyint(1) NOT NULL DEFAULT 1,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_logo`, `site_favicon`, `site_description`, `site_copyright_text`, `site_meta_description`, `site_meta_keywords`, `site_meta_author`, `site_contact_no`, `site_phone`, `site_email`, `site_address`, `site_working_day_hours`, `site_facebook_link`, `site_youtube_link`, `site_twitter_link`, `site_linkedin_link`, `site_custom_data1`, `site_custom_data2`, `site_custom_data3`, `site_custom_data4`, `is_featured_image_enable`, `default_featured_image`, `voting_yes_color`, `voting_no_color`, `voting_no_comment_color`, `is_slider_enable`, `is_post_slider_enable`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Our News Portal', 'logo.png', 'favicon.ico', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'public/assets/images/defaults/default-post.png', '#537d00', '#cc0000', '#000000', 1, 1, NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_button_enable` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>enabled, 0=>disabled',
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_blank_redirect` tinyint(1) NOT NULL DEFAULT 1,
  `is_description_enable` tinyint(1) NOT NULL DEFAULT 1,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>active, 0=>inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `slug`, `image`, `is_button_enable`, `button_text`, `button_link`, `is_blank_redirect`, `is_description_enable`, `short_description`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'This is a simple slider from admin panel', 'this-is-a-simple-slider-from-admin-panel', NULL, 1, NULL, NULL, 1, 1, '<div>Welcome to our slider <br /></div>', 1, NULL, NULL, NULL, NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(2, 'This is another slider from admin panel', 'this-is-another-slider-from-admin-panel', NULL, 1, NULL, NULL, 1, 1, '<div>Welcome to our slider <br /></div>', 1, NULL, NULL, NULL, NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=>active, 0=>inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `email`, `status`, `deleted_at`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'abc@test.com', 1, NULL, 1, NULL, '2020-07-09 02:46:29', '2020-07-09 05:02:34'),
(2, 1, 'xyz@test.com', 1, NULL, NULL, NULL, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(4, 1, 'speedbangla@akij.net', 1, NULL, NULL, NULL, '2020-07-09 05:01:10', '2020-07-09 05:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>active, 0=>inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `total_reaction` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'total reaction count',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `description`, `meta_description`, `image`, `banner_image`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `total_reaction`, `created_at`, `updated_at`) VALUES
(1, 'This is a Tag from admin panel', 'this-is-a-tag-from-admin-panel', '<div>Welcome to our Tag <br /></div>', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 10, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(2, 'This is tag from admin panel', 'this-is-tag2-from-admin-panel', '<div>Welcome to our Tag <br /></div>', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 10, '2020-07-09 02:46:29', '2020-07-09 02:46:29'),
(3, 'Top News', 'rwtrfvv', '<p>fasgvfsfvv</p>', 'fssfxvcvxzxfg', NULL, NULL, 1, NULL, 1, NULL, NULL, 0, '2020-07-21 01:59:13', '2020-07-21 01:59:13'),
(4, 'Country', 'rrtrxvxvfgfs', '<p>grfgfbf</p>', 'gfgwrwrrgsr', NULL, NULL, 1, NULL, 1, NULL, NULL, 0, '2020-07-21 01:59:39', '2020-07-21 01:59:39'),
(5, 'Crime', 'kkvhbnxcdfs', '<p>grgfgxffg</p>', 'fgrfgrgsr', NULL, NULL, 1, NULL, 1, NULL, NULL, 0, '2020-07-21 02:00:03', '2020-07-21 02:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'If there is possible to keep any reference link',
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `title`, `description`, `reference_link`, `admin_id`, `deleted_at`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'speedbangla@akij.net', 'New Subscription has been created', NULL, 1, NULL, NULL, '2020-07-09 05:01:10', '2020-07-09 05:01:10'),
(2, 'shakib@testmail.com', 'New Subscription has been created', NULL, 1, NULL, NULL, '2020-07-09 05:01:30', '2020-07-09 05:01:30'),
(3, 'shakib@test.com', 'Subscription has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-09 05:02:19', '2020-07-09 05:02:19'),
(4, 'abc@test.com', 'Subscription has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-09 05:02:34', '2020-07-09 05:02:34'),
(5, 'shakib@test.com', 'Subscription has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-09 05:03:04', '2020-07-09 05:03:04'),
(6, 'First Post', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-09 05:12:23', '2020-07-09 05:12:23'),
(7, 'First Post', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-09 05:12:45', '2020-07-09 05:12:45'),
(8, 'First Post', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-09 05:13:11', '2020-07-09 05:13:11'),
(9, 'First Post', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-09 05:13:26', '2020-07-09 05:13:26'),
(10, 'First Post', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-09 05:18:07', '2020-07-09 05:18:07'),
(11, 'First Post', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-09 05:18:28', '2020-07-09 05:18:28'),
(12, 'Second Post', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-09 05:46:44', '2020-07-09 05:46:44'),
(13, 'My country is beautiful', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-11 21:52:02', '2020-07-11 21:52:02'),
(14, 'My country is beautiful', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-11 23:41:40', '2020-07-11 23:41:40'),
(15, 'fsgfgfgfdfgfdg', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-11 23:49:57', '2020-07-11 23:49:57'),
(16, 'fsgfgfgfdfgfdg', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-12 00:40:18', '2020-07-12 00:40:18'),
(17, 'It is raining', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-12 00:45:19', '2020-07-12 00:45:19'),
(18, 'efrearere', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-12 00:55:27', '2020-07-12 00:55:27'),
(19, 'efrearere', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-12 01:28:37', '2020-07-12 01:28:37'),
(20, 'efrearere', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-12 01:29:13', '2020-07-12 01:29:13'),
(21, 'Final post', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-12 02:36:58', '2020-07-12 02:36:58'),
(22, 'Final post', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-12 02:37:10', '2020-07-12 02:37:10'),
(23, 'Today is Sunday', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-12 04:46:23', '2020-07-12 04:46:23'),
(24, 'Final post', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-14 04:22:56', '2020-07-14 04:22:56'),
(25, 'ঈদ', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-14 04:24:15', '2020-07-14 04:24:15'),
(26, 'First Post', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-14 04:25:20', '2020-07-14 04:25:20'),
(27, 'Featured', 'New Category has been created', NULL, 1, NULL, NULL, '2020-07-14 04:26:47', '2020-07-14 04:26:47'),
(28, 'Sports', 'New Category has been created', NULL, 1, NULL, NULL, '2020-07-14 04:27:29', '2020-07-14 04:27:29'),
(29, 'একটি মানবিক আকুতি', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-14 04:31:53', '2020-07-14 04:31:53'),
(30, 'খুবই কম বেতনে খাটানো হচ্ছে সফটওয়্যার ইঞ্জিনিয়ার দের।', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-14 04:33:58', '2020-07-14 04:33:58'),
(31, 'শান্তি সমৃদ্ধি তে এগিয়ে যাচ্ছে বাংলাদেশ।', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-14 04:35:29', '2020-07-14 04:35:29'),
(32, 'Final post', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-14 04:40:12', '2020-07-14 04:40:12'),
(33, 'ঈদ', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-14 04:42:16', '2020-07-14 04:42:16'),
(34, 'First Post', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-14 04:43:47', '2020-07-14 04:43:47'),
(35, 'বিশ্বকাপ জিতলো বাংলাদেশ ক্রিকেট টীম।', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-14 04:46:58', '2020-07-14 04:46:58'),
(36, 'ফুটবল বিশ্বকাপের সেমিফাইনালে বাংলাদেশ।', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-14 04:48:20', '2020-07-14 04:48:20'),
(37, 'অলিম্পিকে সর্বাধিক স্বর্ণ জয়ের গৌরব বাংলাদেশের।', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-14 04:49:24', '2020-07-14 04:49:24'),
(38, 'অলিম্পিকে সর্বাধিক স্বর্ণ জয়ের গৌরব বাংলাদেশের।', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-14 04:58:20', '2020-07-14 04:58:20'),
(39, 'ফুটবল বিশ্বকাপের সেমিফাইনালে বাংলাদেশ।', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-14 04:58:31', '2020-07-14 04:58:31'),
(40, 'বিশ্বকাপ জিতলো বাংলাদেশ ক্রিকেট টীম।', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-14 04:58:44', '2020-07-14 04:58:44'),
(41, 'শান্তি সমৃদ্ধি তে এগিয়ে যাচ্ছে বাংলাদেশ।', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-14 04:59:03', '2020-07-14 04:59:03'),
(42, 'খুবই কম বেতনে খাটানো হচ্ছে সফটওয়্যার ইঞ্জিনিয়ার দের।', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-14 04:59:13', '2020-07-14 04:59:13'),
(43, 'একটি মানবিক আকুতি', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-14 04:59:25', '2020-07-14 04:59:25'),
(44, 'Ananta Jalil', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-14 04:59:43', '2020-07-14 04:59:43'),
(45, 'Pohela Boishakh', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-14 05:00:04', '2020-07-14 05:00:04'),
(46, 'Donald Trump', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-14 05:00:22', '2020-07-14 05:00:22'),
(47, 'হলিউডে মুক্তি পেলো বাংলাদেশী ছবি।', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-14 05:07:35', '2020-07-14 05:07:35'),
(48, 'কানাডায় আইয়ুব বাচ্চুর কনসার্টে উপচে পড়া ভিড়।', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-14 05:08:35', '2020-07-14 05:08:35'),
(49, 'এই ঈদে আসছে তাহসানের ২৭ টি নাটক।', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-14 05:09:24', '2020-07-14 05:09:24'),
(50, 'আগামীকাল শুরু হচ্ছে এস.এস.সি এবং সমমানের পরীক্ষা', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-14 05:15:39', '2020-07-14 05:15:39'),
(51, 'যে বনের সৌন্দর্য মন কাড়ে সবার।', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-14 05:16:22', '2020-07-14 05:16:22'),
(52, 'সফলভাবে রকেট উৎক্ষেপণ করলো বাংলাদেশ', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-14 05:17:12', '2020-07-14 05:17:12'),
(53, 'রাজশাহী তে নতুন রাস্তা উদ্বোধন করলেন প্রধানমন্ত্রী', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-14 05:17:59', '2020-07-14 05:17:59'),
(54, 'গার্মেন্টস শিল্পে সবার শীর্ষে বাংলাদেশ', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-14 05:18:49', '2020-07-14 05:18:49'),
(55, 'Noapara', 'New Category has been created', NULL, 1, NULL, NULL, '2020-07-19 23:35:35', '2020-07-19 23:35:35'),
(56, 'Economic', 'New Category has been created', NULL, 1, NULL, NULL, '2020-07-19 23:38:11', '2020-07-19 23:38:11'),
(57, 'Science', 'New Category has been created', NULL, 1, NULL, NULL, '2020-07-19 23:38:56', '2020-07-19 23:38:56'),
(58, 'Bangladesh', 'New Category has been created', NULL, 1, NULL, NULL, '2020-07-19 23:39:46', '2020-07-19 23:39:46'),
(59, 'Top News', 'New Category has been created', NULL, 1, NULL, NULL, '2020-07-19 23:47:37', '2020-07-19 23:47:37'),
(60, 'উন্নয়নের রোল মডেল  - বাংলাদেশ', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-19 23:56:23', '2020-07-19 23:56:23'),
(61, 'যশোরে বাড়ছে পর্যটকদের ভিড়', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-21 01:19:52', '2020-07-21 01:19:52'),
(62, 'যশোরে বায়ু দূষণের পরিমাণ অধিক', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-21 01:58:12', '2020-07-21 01:58:12'),
(63, 'Top News', 'New Tag has been created', NULL, 1, NULL, NULL, '2020-07-21 01:59:14', '2020-07-21 01:59:14'),
(64, 'Country', 'New Tag has been created', NULL, 1, NULL, NULL, '2020-07-21 01:59:39', '2020-07-21 01:59:39'),
(65, 'Crime', 'New Tag has been created', NULL, 1, NULL, NULL, '2020-07-21 02:00:03', '2020-07-21 02:00:03'),
(66, 'উদ্বোধন হলো আন্তর্জাতিক মানের এয়ারপোর্ট', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-21 02:01:24', '2020-07-21 02:01:24'),
(67, 'সুন্দর রাস্তার নগরী এই যশোর', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-21 02:02:45', '2020-07-21 02:02:45'),
(68, 'দেশের প্রথম হাই টেক পার্ক চালু হলো যশোরে', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-21 02:04:03', '2020-07-21 02:04:03'),
(69, 'মূল্যস্ফীতি কমেছে, বেড়েছে অর্থনীতি', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-21 03:19:12', '2020-07-21 03:19:12'),
(70, 'প্রবাসীদের আয়ে বাড়ছে  রেমিটেন্স', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-21 03:24:27', '2020-07-21 03:24:27'),
(71, 'শেয়ার বাজারে বিনিয়োগে লাভ বাড়ছে', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-22 10:08:23', '2020-07-22 10:08:23'),
(72, 'Life', 'New Category has been created', NULL, 1, NULL, NULL, '2020-07-22 10:09:55', '2020-07-22 10:09:55'),
(73, 'দারিদ্রতার হার কমছে সারা দেশে', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-22 10:11:01', '2020-07-22 10:11:01'),
(74, 'স্বাস্থ্য সচেতন তরুন সমাজ', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-22 10:13:07', '2020-07-22 10:13:07'),
(75, 'বৃদ্ধ বয়সে উপার্জন করবেন যেভাবে', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-22 10:15:12', '2020-07-22 10:15:12'),
(76, 'কৃত্রিম বুদ্ধিমত্তা নিয়ে কাজ করছে দেশের শিক্ষার্থীরা', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-22 10:18:34', '2020-07-22 10:18:34'),
(77, 'আমেরিকায় রোবট প্রতিযোগিতায় প্রথম বুয়েটের শিক্ষার্থীরা', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-22 10:20:53', '2020-07-22 10:20:53'),
(78, 'মোবাইল ফোন রপ্তানি শুরু করলো বাংলাদেশ', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-22 10:24:21', '2020-07-22 10:24:21'),
(79, 'আগামী শনিবার পবিত্র ঈদুল আযহা', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-22 10:25:37', '2020-07-22 10:25:37'),
(80, 'নতুন জাতের ধান উৎপাদন শুরু', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-22 10:26:56', '2020-07-22 10:26:56'),
(81, 'দেশে শিক্ষিতের হার এখন শতকরা ৯৭ ভাগ', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-22 10:28:32', '2020-07-22 10:28:32'),
(82, 'কৃত্রিম বুদ্ধিমত্তা নিয়ে কাজ করছে শিক্ষার্থীরা', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-22 10:39:58', '2020-07-22 10:39:58'),
(83, 'আমেরিকায় রোবট প্রতিযোগিতায় প্রথম বুয়েট', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-22 10:40:23', '2020-07-22 10:40:23'),
(84, 'International', 'New Category has been created', NULL, 1, NULL, NULL, '2020-07-22 11:52:53', '2020-07-22 11:52:53'),
(85, 'স্বাধীনতার স্বাদ পেলো ফিলিস্তিন', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-22 11:54:26', '2020-07-22 11:54:26'),
(86, 'সৌদিতে ঈদ উদযাপন', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-22 11:56:40', '2020-07-22 11:56:40'),
(87, 'মার্কিন প্রেসিডেন্ট নির্বাচন', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-22 11:58:04', '2020-07-22 11:58:04'),
(88, 'উন্নয়নের রোল মডেল  - বাংলাদেশ', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-07-25 22:44:03', '2020-07-25 22:44:03'),
(89, 'আগামী শনিবার পবিত্র ঈদুল আযহা', 'New Post has been created', NULL, 1, NULL, NULL, '2020-07-25 22:55:43', '2020-07-25 22:55:43'),
(90, 'আগামী শনিবার পবিত্র ঈদুল আযহা', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-08-15 13:15:36', '2020-08-15 13:15:36'),
(91, 'test thursday', 'New Post has been created', NULL, 1, NULL, NULL, '2020-08-19 22:24:16', '2020-08-19 22:24:16'),
(92, 'Final check', 'New Post has been created', NULL, 1, NULL, NULL, '2020-08-19 22:28:55', '2020-08-19 22:28:55'),
(93, 'Alzajeera', 'New Category has been created', NULL, 1, NULL, NULL, '2020-08-27 01:10:10', '2020-08-27 01:10:10'),
(94, 'alzajeera', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-08-27 01:14:10', '2020-08-27 01:14:10'),
(95, 'United States Teenager charged over killings at Kenosha protest', 'New Post has been created', NULL, 1, NULL, NULL, '2020-08-27 01:56:37', '2020-08-27 01:56:37'),
(96, 'China fires \'aircraft-carrier killer\' missile in warning to US', 'New Post has been created', NULL, 1, NULL, NULL, '2020-08-27 01:57:11', '2020-08-27 01:57:11'),
(97, 'Pompeo blasts HSBC again over Hong Kong', 'New Post has been created', NULL, 1, NULL, NULL, '2020-08-27 01:58:01', '2020-08-27 01:58:01'),
(98, 'Reuters', 'New Category has been created', NULL, 1, NULL, NULL, '2020-08-27 03:34:07', '2020-08-27 03:34:07'),
(99, 'Novavax CEO expects filing for COVID-19 vaccine approval in December: paper', 'New Post has been created', NULL, 1, NULL, NULL, '2020-08-27 03:55:01', '2020-08-27 03:55:01'),
(100, 'China\'s offer of coronavirus tests for all in Hong Kong meets with public distrust', 'New Post has been created', NULL, 1, NULL, NULL, '2020-08-27 03:55:42', '2020-08-27 03:55:42'),
(101, 'Abbott wins U.S. authorization for $5 rapid COVID-19 antigen test', 'New Post has been created', NULL, 1, NULL, NULL, '2020-08-27 03:56:47', '2020-08-27 03:56:47'),
(102, 'Test Alzajeera News', 'New Post has been created', NULL, 1, NULL, NULL, '2020-08-31 10:32:35', '2020-08-31 10:32:35'),
(103, 'Super Admin', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-09-02 09:46:30', '2020-09-02 09:46:30'),
(104, 'Super Admin', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-09-02 09:47:18', '2020-09-02 09:47:18'),
(105, 'Editor', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-09-02 09:47:38', '2020-09-02 09:47:38'),
(106, 'Admin', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-09-02 09:48:10', '2020-09-02 09:48:10'),
(107, 'Editor', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-09-02 09:48:26', '2020-09-02 09:48:26'),
(108, 'Test Auth', 'New Post has been created', NULL, 3, NULL, NULL, '2020-09-02 11:28:04', '2020-09-02 11:28:04'),
(109, 'Test Auth', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-09-03 03:46:49', '2020-09-03 03:46:49'),
(110, 'Test Auth', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-09-03 03:47:08', '2020-09-03 03:47:08'),
(111, 'Test Auth', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-09-03 04:08:32', '2020-09-03 04:08:32'),
(112, 'Test Auth', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-09-03 04:08:58', '2020-09-03 04:08:58'),
(113, 'সুন্দর পৃথিবীর আশায়', 'New Post has been created', NULL, 3, NULL, NULL, '2020-09-03 06:12:26', '2020-09-03 06:12:26'),
(114, 'সুন্দর পৃথিবীর আশায়', 'Post has been updated successfully !!', NULL, 3, NULL, NULL, '2020-09-03 06:13:21', '2020-09-03 06:13:21'),
(115, 'একটি সুন্দর পৃথিবীর আশায় আমরা সবাই', 'Post has been updated successfully !!', NULL, 3, NULL, NULL, '2020-09-03 06:14:29', '2020-09-03 06:14:29'),
(116, 'একটি সুন্দর পৃথিবীর আশায় আমরা সবাই', 'Post has been updated successfully !!', NULL, 3, NULL, NULL, '2020-09-03 06:18:16', '2020-09-03 06:18:16'),
(117, 'Global Environment', 'New Post has been created', NULL, 3, NULL, NULL, '2020-09-03 06:19:18', '2020-09-03 06:19:18'),
(118, 'Global Environment', 'Post has been updated successfully !!', NULL, 3, NULL, NULL, '2020-09-03 06:19:54', '2020-09-03 06:19:54'),
(119, 'বন্যা পরিস্থিতি স্বাভাবিক হচ্ছে', 'New Post has been created', NULL, 3, NULL, NULL, '2020-09-03 06:22:49', '2020-09-03 06:22:49'),
(120, 'বন্যা পরিস্থিতি স্বাভাবিক হচ্ছে', 'Post has been updated successfully !!', NULL, 3, NULL, NULL, '2020-09-03 06:23:11', '2020-09-03 06:23:11'),
(121, 'বন্যা পরিস্থিতি স্বাভাবিক হচ্ছে', 'Post has been updated successfully !!', NULL, 3, NULL, NULL, '2020-09-03 06:24:12', '2020-09-03 06:24:12'),
(122, 'Global Environment', 'Post has been updated successfully !!', NULL, 3, NULL, NULL, '2020-09-03 06:24:50', '2020-09-03 06:24:50'),
(123, 'Global Environment', 'Post has been updated successfully !!', NULL, 3, NULL, NULL, '2020-09-03 06:27:08', '2020-09-03 06:27:08'),
(124, 'বন্যা পরিস্থিতি স্বাভাবিক হচ্ছে', 'Post has been updated successfully !!', NULL, 3, NULL, NULL, '2020-09-03 06:27:29', '2020-09-03 06:27:29'),
(125, 'বন্যা পরিস্থিতি স্বাভাবিক হচ্ছে', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-09-03 06:28:15', '2020-09-03 06:28:15'),
(126, 'বন্যা পরিস্থিতি স্বাভাবিক হচ্ছে', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-09-03 06:29:01', '2020-09-03 06:29:01'),
(127, 'Global Environment', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-09-03 06:29:21', '2020-09-03 06:29:21'),
(128, 'বন্যা পরিস্থিতি স্বাভাবিক হচ্ছে', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-09-03 08:46:24', '2020-09-03 08:46:24'),
(129, 'Education', 'New Category has been created', NULL, 1, NULL, NULL, '2020-09-14 11:01:43', '2020-09-14 11:01:43'),
(130, 'কৃত্রিম বুদ্ধিমত্তা নিয়ে কাজ করছে শিক্ষার্থীরা', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-09-14 11:04:06', '2020-09-14 11:04:06'),
(131, 'Test post', 'New Post has been created', NULL, 1, NULL, NULL, '2020-09-21 05:25:32', '2020-09-21 05:25:32'),
(132, 'বাংলা লিখছি বাংলা বুঝে নাও', 'New Post has been created', NULL, 1, NULL, NULL, '2020-10-02 18:41:39', '2020-10-02 18:41:39'),
(133, 'বাংলা লিখছি বাংলা বুঝে নাও', 'New Post has been created', NULL, 1, NULL, NULL, '2020-10-02 18:43:29', '2020-10-02 18:43:29'),
(134, 'বাংলা লিখছি বাংলা বুঝে নাও tooo', 'New Post has been created', NULL, 1, NULL, NULL, '2020-10-02 18:56:05', '2020-10-02 18:56:05'),
(135, 'বাংলা লিখছি বাংলা বুঝে নাও tooo', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-10-02 18:56:18', '2020-10-02 18:56:18'),
(136, 'Quran Hadith', 'New Category has been created', NULL, 1, NULL, NULL, '2020-10-07 03:50:55', '2020-10-07 03:50:55'),
(137, 'শান্তির ধর্ম ইসলাম', 'New Post has been created', NULL, 1, NULL, NULL, '2020-10-07 04:01:20', '2020-10-07 04:01:20'),
(138, 'শান্তির ধর্ম ইসলাম', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-10-13 03:55:17', '2020-10-13 03:55:17'),
(139, 'শান্তির ধর্ম ইসলাম???????????????????????', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-10-13 05:27:29', '2020-10-13 05:27:29'),
(140, 'শান্তির ধর্ম ইসলাম!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-10-13 05:27:45', '2020-10-13 05:27:45'),
(141, 'শান্তির ধর্ম ইসলাম!@#%^&*()*!@#$%^&*()??><~!!@', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-10-13 05:28:16', '2020-10-13 05:28:16'),
(142, 'শান্তির ধর্ম ইসলাম', 'Post has been updated successfully !!', NULL, 1, NULL, NULL, '2020-10-13 05:28:31', '2020-10-13 05:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=active, 0=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone_no`, `email`, `email_verified_at`, `password`, `avatar`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Maniruzzaman', 'Akash', 'akash', '01951233084', 'manirujjamanakash@gmail.com', NULL, '$2y$10$h/fzYEDg9WFg6lWois6gge9LH7Wu4JAv8sOU8saobgh.2kgzGASzK', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2020-07-09 02:46:27', '2020-07-09 02:46:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_created_by_foreign` (`created_by`),
  ADD KEY `admins_updated_by_foreign` (`updated_by`),
  ADD KEY `admins_deleted_by_foreign` (`deleted_by`),
  ADD KEY `admins_first_name_index` (`first_name`),
  ADD KEY `admins_phone_no_index` (`phone_no`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_created_by_foreign` (`created_by`),
  ADD KEY `blogs_updated_by_foreign` (`updated_by`),
  ADD KEY `blogs_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_created_by_foreign` (`created_by`),
  ADD KEY `categories_updated_by_foreign` (`updated_by`),
  ADD KEY `categories_deleted_by_foreign` (`deleted_by`),
  ADD KEY `categories_parent_category_id_foreign` (`parent_category_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_updated_by_foreign` (`updated_by`),
  ADD KEY `contacts_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_created_by_foreign` (`created_by`),
  ADD KEY `documents_updated_by_foreign` (`updated_by`),
  ADD KEY `documents_deleted_by_foreign` (`deleted_by`),
  ADD KEY `documents_type_index` (`type`),
  ADD KEY `documents_link_type_index` (`link_type`),
  ADD KEY `documents_extension_index` (`extension`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD KEY `pages_created_by_foreign` (`created_by`),
  ADD KEY `pages_updated_by_foreign` (`updated_by`),
  ADD KEY `pages_deleted_by_foreign` (`deleted_by`),
  ADD KEY `pages_category_id_foreign` (`category_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `polls_slug_unique` (`slug`),
  ADD KEY `polls_created_by_foreign` (`created_by`),
  ADD KEY `polls_updated_by_foreign` (`updated_by`),
  ADD KEY `polls_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `poll_responses`
--
ALTER TABLE `poll_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll_responses_poll_id_foreign` (`poll_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_created_by_foreign` (`created_by`),
  ADD KEY `posts_updated_by_foreign` (`updated_by`),
  ADD KEY `posts_deleted_by_foreign` (`deleted_by`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_title_index` (`title`),
  ADD KEY `posts_slug_index` (`slug`),
  ADD KEY `posts_total_view_index` (`total_view`),
  ADD KEY `posts_total_search_index` (`total_search`),
  ADD KEY `posts_total_liked_index` (`total_liked`),
  ADD KEY `posts_total_disliked_index` (`total_disliked`),
  ADD KEY `posts_total_comment_index` (`total_comment`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_comments_updated_by_foreign` (`updated_by`),
  ADD KEY `post_comments_deleted_by_foreign` (`deleted_by`),
  ADD KEY `post_comments_post_id_foreign` (`post_id`),
  ADD KEY `post_comments_user_id_foreign` (`user_id`),
  ADD KEY `post_comments_reply_comment_id_foreign` (`reply_comment_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tags_tag_id_foreign` (`tag_id`),
  ADD KEY `post_tags_post_id_foreign` (`post_id`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reactions_user_id_foreign` (`user_id`),
  ADD KEY `reactions_model_name_index` (`model_name`),
  ADD KEY `reactions_model_id_index` (`model_id`),
  ADD KEY `reactions_type_index` (`type`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sliders_slug_unique` (`slug`),
  ADD KEY `sliders_created_by_foreign` (`created_by`),
  ADD KEY `sliders_updated_by_foreign` (`updated_by`),
  ADD KEY `sliders_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_email_unique` (`email`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `subscriptions_updated_by_foreign` (`updated_by`),
  ADD KEY `subscriptions_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`),
  ADD KEY `tags_created_by_foreign` (`created_by`),
  ADD KEY `tags_updated_by_foreign` (`updated_by`),
  ADD KEY `tags_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tracks_deleted_by_foreign` (`deleted_by`),
  ADD KEY `tracks_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_created_by_foreign` (`created_by`),
  ADD KEY `users_updated_by_foreign` (`updated_by`),
  ADD KEY `users_deleted_by_foreign` (`deleted_by`),
  ADD KEY `users_first_name_index` (`first_name`),
  ADD KEY `users_phone_no_index` (`phone_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `poll_responses`
--
ALTER TABLE `poll_responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contacts_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `documents_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `documents_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `polls_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `polls_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `polls_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `poll_responses`
--
ALTER TABLE `poll_responses`
  ADD CONSTRAINT `poll_responses_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_comments_reply_comment_id_foreign` FOREIGN KEY (`reply_comment_id`) REFERENCES `post_comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_comments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reactions`
--
ALTER TABLE `reactions`
  ADD CONSTRAINT `reactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sliders_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sliders_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tags_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tags_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `tracks_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tracks_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
