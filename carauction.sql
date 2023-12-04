-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 02:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carauction`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `portal_settings`
--

CREATE TABLE `portal_settings` (
  `id` int(11) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `logo` longtext NOT NULL,
  `email` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portal_settings`
--

INSERT INTO `portal_settings` (`id`, `phone`, `logo`, `email`, `created_at`, `updated_at`, `name`, `address`) VALUES
(1, '1155 das', '/uploads/products/1637061636.jpeg', 'dasdasd', '2021-08-05 19:00:00', '2021-11-16 07:22:24', 'Car Auction', 'asdasdsda');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_title` varchar(500) NOT NULL,
  `role_access` text DEFAULT NULL,
  `access` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_title`, `role_access`, `access`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL, '2021-08-02 03:57:25', '2021-08-02 03:58:50'),
(3, 'Manager', NULL, NULL, '2021-08-06 12:50:51', '2021-11-16 07:16:09'),
(4, 'User', NULL, NULL, '2021-11-16 07:16:16', '2021-11-16 07:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `training_resource`
--

CREATE TABLE `training_resource` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(500) NOT NULL,
  `title` text DEFAULT NULL,
  `benefits` longtext DEFAULT NULL,
  `description` longtext NOT NULL,
  `tags` varchar(500) NOT NULL,
  `share` varchar(500) DEFAULT NULL,
  `access_control` varchar(500) DEFAULT NULL,
  `file_upload` varchar(500) DEFAULT NULL,
  `status` varchar(500) DEFAULT NULL,
  `duration` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_resource`
--

INSERT INTO `training_resource` (`id`, `user_id`, `type`, `title`, `benefits`, `description`, `tags`, `share`, `access_control`, `file_upload`, `status`, `duration`, `created_at`, `updated_at`) VALUES
(1, 13, 'tutorial', 'asdf', NULL, 'According to ServerPilot support: “No services, including PHP-FPM, should need to be restarted when deploying new code. Envoyer shouldn’t need to modify any server configurations or restart services.” So go ahead and uncheck Restart FPM After Deployments in the Deployments section.', 'Love,Journey,Process', 'OFF', 'All', '/uploads/tutorials/1629977662-1626618858598.jpg', 'Published', '1 Week', '2021-08-23 02:26:58', '2021-09-02 06:18:22'),
(2, 1, 'tutorial', 'test tur', NULL, 'asdfasfd', 'Love', 'OFF', 'All', '/uploads/tutorials/4a45b8a4-aa7d-4bcc-8924-25215746ec58.jpg', 'Published', '2 Week', '2021-08-23 02:27:21', '2021-09-22 13:31:39'),
(4, 13, 'tutorial', 'Web Development', NULL, 'adsf', 'World', 'OFF', 'Exclusive to Premium Members', '/uploads/tutorials/1629974241-photo-1508830524289-0adcbe822b40.jpg', 'Unpublished', '', '2021-08-26 05:37:23', '2021-09-23 06:34:25'),
(5, 1, 'course', 'test course', NULL, 'asdfasfd', 'Love', 'ON', NULL, '/uploads/tutorials/1629974923-131fef7b-3aa4-4092-a0d9-8fb27d8f8b6a.jpg', 'Published', '1 Week', '2021-08-26 05:48:45', '2021-09-02 06:35:54'),
(6, 13, 'video', 'test video', NULL, 'asdf', 'World', 'ON', 'Yearly Only', '/uploads/tutorials/1630671519-Login(1).mp4', 'Unpublished', '1 Week', '2021-08-26 05:49:43', '2021-09-03 07:18:43'),
(7, 13, 'tutorial', 'testing', NULL, 'That’s it. Let’s test the session now. It should start storing the session now. If it’s not, then please follow the other solution as below.', 'Love,World,Motivation', 'OFF', 'Available to All Members', '/uploads/tutorials/1630583067-1st_banner.png', 'Published', '2 Week', '2021-08-26 12:19:27', '2021-09-02 06:44:28'),
(8, 1, 'course', 'asd', 'asads', 'test g', 'Love,Motivation,Journey', 'ON', 'All', '/uploads/tutorials/1630564712-1st_banner.png', 'Unpublished', '1 Week', '2021-09-02 01:38:37', '2021-09-03 02:56:00'),
(10, 1, 'video', 'xbbvx', NULL, 'dsf', '', 'ON', 'All', '/uploads/tutorials/1631618017-ReactApp.mp4', 'Published', '1 Week', '2021-09-03 03:14:49', '2021-09-14 06:13:40'),
(11, 13, 'certifiedcourses', 'certified courses', NULL, 'certifiedcourses', 'World', 'ON', 'All', '/uploads/tutorials/1630665291-loginbg.jpg', 'Published', '1 Week', '2021-09-03 05:34:51', '2021-09-03 05:34:51'),
(15, 13, 'tetsss', 'Web', 'testing purpose', 'testing aim', 'Love,World,Motivation', 'dads', 'saddasdasd', '/uploads/tutorials/1633506210-user2.jpg', 'sadasdasd', 'asddsadads', '2021-10-06 05:29:22', '2021-10-06 02:58:45'),
(16, 13, 'testing2', 'Jhone', 'testing aim ', 'testing the current date record', 'World,Motivation', 'dsdsd', 'sdsd', '/uploads/tutorials/1633506257-user5.jpg', 'sddsdsd', 'dsdss', '2021-10-06 05:29:22', '2021-10-06 02:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dp` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `first_name`, `last_name`, `user_name`, `email`, `email_verified_at`, `password`, `address`, `postal_code`, `city`, `phone`, `status`, `dp`, `facebook`, `twitter`, `instagram`, `linkedin`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 3, 'Test 1', 'Test', '1', 'test', 'test@gmail.com', NULL, '$2y$10$1xe8VlZXF5poaBH6N.0UQOEdTgqwIWaoft6Zf7A26auQ1r2MbUTVq', 'test', '232', NULL, '12345', 'Active', '/public/uploads/users/dp/1637062490-WhatsAppImage2021-11-02at11.12.46PM(1).jpeg', 'www.facebook.com', 'www.twitter.com', 'www.instagram.com', 'www.linkedin.com', NULL, '2021-09-01 02:46:17', '2021-11-16 07:34:40'),
(21, 1, 'Super Admin', 'Super', 'Admin', NULL, 'admin@gmail.com', NULL, '$2y$10$CQYvCt1ndiTnl8ykeQveJ.NPG4L/HPMGnB0XA4JiBrOSO2CMN4rGi', 'hfs', '878', NULL, '4343434', 'Active', '/uploads/users/dp/1634058843-images(1).jpg', 'www.facebook.com', 'www.twitter.com', 'www.instagram.com', 'www.linkedin.com', NULL, '2021-10-09 06:05:20', '2021-11-16 07:34:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `portal_settings`
--
ALTER TABLE `portal_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_resource`
--
ALTER TABLE `training_resource`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portal_settings`
--
ALTER TABLE `portal_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `training_resource`
--
ALTER TABLE `training_resource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
