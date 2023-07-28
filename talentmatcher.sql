-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4306
-- Generation Time: Jul 27, 2023 at 01:59 AM
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
-- Database: `talentmatcher`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_id` int(11) NOT NULL,
  `location_long` varchar(64) DEFAULT NULL,
  `location_lat` varchar(64) DEFAULT NULL,
  `event_start_datetime` datetime NOT NULL,
  `event_end_datetime` datetime NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `created_at`, `updated_at`, `event_id`, `location_long`, `location_lat`, `event_start_datetime`, `event_end_datetime`, `user_id`, `location`) VALUES
(1, '2023-07-25 12:44:51', '2023-07-25 12:44:51', 2, '116.1679476849668', '39.73300374413002', '2023-07-07 04:44:00', '2023-07-22 04:44:00', 3, NULL),
(2, '2023-07-25 23:31:47', '2023-07-25 23:31:47', 1, '116.16801072867445', '39.73302158192429', '2023-07-14 15:31:00', '2023-07-28 15:31:00', 3, 'Location');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `event_id`, `user_id`, `body`, `likes`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'dasda', 0, '2023-07-15 07:13:35', '2023-07-15 07:13:35'),
(2, 1, 1, 'dasda', 0, '2023-07-15 07:13:36', '2023-07-15 07:13:36'),
(3, 1, 1, 'dasda', 0, '2023-07-15 07:13:36', '2023-07-15 07:13:36'),
(4, 1, 1, 'dasda', 0, '2023-07-15 07:13:37', '2023-07-15 07:13:37'),
(5, 1, 1, 'dasda', 0, '2023-07-15 07:13:37', '2023-07-15 07:13:37'),
(6, 1, 1, 'dasdadqwd', 0, '2023-07-15 07:13:38', '2023-07-15 07:13:38'),
(7, 1, 1, 'dasd', 0, '2023-07-15 07:16:05', '2023-07-15 07:16:05'),
(8, 1, 1, 'dasd', 0, '2023-07-15 07:16:07', '2023-07-15 07:16:07'),
(9, 1, 1, 'dasda', 0, '2023-07-15 07:18:50', '2023-07-15 07:18:50'),
(10, 1, 1, 'dasda', 0, '2023-07-15 07:18:51', '2023-07-15 07:18:51'),
(11, 1, 1, 'fdsfsd', 0, '2023-07-15 07:18:58', '2023-07-15 07:18:58'),
(12, 1, 1, 'da', 0, '2023-07-15 07:22:25', '2023-07-15 07:22:25'),
(13, 1, 1, 'dqw', 0, '2023-07-15 07:30:17', '2023-07-15 07:30:17'),
(14, 1, 1, 'dqw', 0, '2023-07-15 07:30:19', '2023-07-15 07:30:19'),
(15, 1, 1, 'dsada', 0, '2023-07-15 07:34:14', '2023-07-15 07:34:14'),
(16, 1, 1, 'dasd', 0, '2023-07-15 07:37:47', '2023-07-15 07:37:47'),
(17, 1, 1, 'dasd', 0, '2023-07-15 07:41:24', '2023-07-15 07:41:24'),
(18, 1, 1, 'dasd', 0, '2023-07-15 07:41:26', '2023-07-15 07:41:26'),
(19, 1, 1, 'dsad', 0, '2023-07-15 08:58:30', '2023-07-15 08:58:30'),
(20, 1, 1, 'qwewqe', 0, '2023-07-15 08:58:43', '2023-07-15 08:58:43'),
(21, 1, 1, 'qwewqe', 0, '2023-07-15 08:58:44', '2023-07-15 08:58:44'),
(22, 1, 1, 'qwewqe', 0, '2023-07-15 08:58:44', '2023-07-15 08:58:44'),
(23, 1, 1, 'qwewqe', 0, '2023-07-15 08:58:44', '2023-07-15 08:58:44'),
(24, 1, 1, 'qwewqe', 0, '2023-07-15 08:58:45', '2023-07-15 08:58:45'),
(25, 1, 1, 'lets go', 0, '2023-07-15 09:01:08', '2023-07-15 09:01:08'),
(26, 1, 1, 'teets', 0, '2023-07-15 18:12:26', '2023-07-15 18:12:26'),
(27, 1, 1, 'lets gooo', 0, '2023-07-16 07:32:12', '2023-07-16 07:32:12'),
(28, 1, 3, '123', 0, '2023-07-24 04:35:12', '2023-07-24 04:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(64) NOT NULL,
  `event_type` int(11) NOT NULL,
  `event_category` int(11) NOT NULL,
  `event_image` varchar(64) NOT NULL DEFAULT 'default.jpg',
  `event_budget` int(11) NOT NULL,
  `event_description` varchar(250) NOT NULL,
  `event_location_text` varchar(64) NOT NULL,
  `event_location_long` varchar(64) DEFAULT NULL,
  `event_location_lat` varchar(64) DEFAULT NULL,
  `event_start_datetime` datetime NOT NULL,
  `event_end_datetime` datetime NOT NULL,
  `event_max_participants` int(11) NOT NULL,
  `event_enrolled_participants` int(11) NOT NULL DEFAULT 0,
  `event_likes` int(11) NOT NULL DEFAULT 0,
  `event_status` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_type`, `event_category`, `event_image`, `event_budget`, `event_description`, `event_location_text`, `event_location_long`, `event_location_lat`, `event_start_datetime`, `event_end_datetime`, `event_max_participants`, `event_enrolled_participants`, `event_likes`, `event_status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'test', 2, 3, 'default.jpg', 12, 'test', 'test', NULL, NULL, '2023-07-29 22:33:00', '2023-07-31 22:33:00', 12, 0, 0, 0, 1, '2023-07-15 06:33:12', '2023-07-15 06:33:12'),
(2, '12', 1, 2, 'default.jpg', 12, '12', '123', NULL, NULL, '2023-06-27 02:26:00', '2023-07-21 02:26:00', 12, 0, 0, 0, 3, '2023-07-24 05:26:12', '2023-07-24 10:26:58'),
(3, '123', 1, 1, 'default.jpg', 123, '345', '123', NULL, NULL, '2023-07-14 15:28:00', '2023-07-28 15:28:00', 12, 0, 0, 0, 3, '2023-07-25 23:29:52', '2023-07-25 23:29:52');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_07_03_133132_create_events_table', 1),
(7, '2023_07_05_113116_create_event_comments_table', 1),
(8, '2023_07_05_113323_create_event_participants_table', 1),
(9, '2023_07_25_064001_create_appointment_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `cost` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `bind_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `type` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `full_name` varchar(64) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `email` varchar(64) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `profile_picture` varchar(250) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `experiences` varchar(2550) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `full_name`, `type`, `email`, `email_verified_at`, `password`, `description`, `phone_number`, `profile_picture`, `remember_token`, `created_at`, `updated_at`, `skills`, `experiences`, `education`) VALUES
(1, 'test', NULL, 0, 'test@localhost', NULL, '$2y$10$slhrbqnywyfR/1QfZIClfeQVJwqgacjbvc4nPcES0f2OKR2pHVjia', NULL, NULL, NULL, NULL, '2023-07-15 06:32:41', '2023-07-15 06:32:41', NULL, NULL, NULL),
(3, '1234', NULL, 0, 'xinyi.wzy@gmail.com', NULL, '$2y$10$L6TKzQugqoY/972apNlhy.U1FEVXBCKWK0rf0nHK1ChTo935d4t0q', NULL, NULL, NULL, 'BImpsP6lVGoLNqCeAEEsguzmsdNbx1BUoo19y52YR1Cib8GE3Jm3ZoThWS4Q', '2023-07-24 04:26:27', '2023-07-24 09:58:42', NULL, '123', '0'),
(4, 'homo', NULL, 0, '114@514.com', NULL, '$2y$10$V5vnKIEzaDUNnfoqYCdaj.HruARXS8NcysPx8d5urIisO0FsOj0bu', NULL, NULL, NULL, NULL, '2023-07-25 22:45:25', '2023-07-25 22:45:25', NULL, NULL, NULL),
(5, 'Pinky Li', NULL, 0, 'pinkykeos@gmail.com', NULL, '$2y$10$7r2EaVtqhu8P39drTg16G.Z5IRUcaGAse9XLuXurW0GerhX/i87m2', NULL, NULL, NULL, NULL, '2023-07-26 15:51:28', '2023-07-26 15:51:28', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `comments_event_id_foreign` (`event_id`) USING BTREE,
  ADD KEY `comments_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `events_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `participants_event_id_foreign` (`event_id`) USING BTREE,
  ADD KEY `participants_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`) USING BTREE,
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`) USING BTREE;

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_name_unique` (`name`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `participants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
