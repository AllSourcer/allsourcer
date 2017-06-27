-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2017 at 01:59 AM
-- Server version: 10.1.22-MariaDB-
-- PHP Version: 7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AlphaDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `filters`
--

CREATE TABLE `filters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_06_03_101734_create_task_table', 1),
('2017_06_03_101940_create_task_creator_table', 1),
('2017_06_03_102118_create_taskclaim_table', 1),
('2017_06_03_105027_create_filter_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taskclaims`
--

CREATE TABLE `taskclaims` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taskclaims`
--

INSERT INTO `taskclaims` (`id`, `user_id`, `task_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taskcreators`
--

CREATE TABLE `taskcreators` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taskcreators`
--

INSERT INTO `taskcreators` (`id`, `user_id`, `task_id`, `created_at`, `updated_at`) VALUES
(1, 0, 6, NULL, NULL),
(2, 5, 7, NULL, NULL),
(3, 5, 8, NULL, NULL),
(4, 5, 9, NULL, NULL),
(5, 5, 10, NULL, NULL),
(6, 4, 13, '2017-06-04 14:37:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `filter_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `filter_id`, `type`, `title`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, '', 'harisu', 'government high school ndu', 2000, '2017-06-03 13:37:53', '2017-06-03 13:37:53'),
(2, 1, '', 'harisu', 'government high school ndu', 2000, '2017-06-03 13:39:05', '2017-06-03 13:39:05'),
(3, 1, 'code', '', 'code the entire operating system inassebly language an tell me the result of the ooutcome of you finding if this is dione i will call you a guru', 1000000, NULL, NULL),
(4, 1, 'code', '', 'code the entire operating system inassebly language an tell me the result of the ooutcome of you finding if this is dione i will call you a guru', 1000000, NULL, NULL),
(5, 2, 'gam', '', 'Build a graphical user game in assebly language ', 200000000, NULL, NULL),
(6, 2, 'gam', '', 'Build a graphical user game in assebly language ', 200000000, NULL, NULL),
(7, 2, '12345', '', 'do some work an get paid', 1000000, NULL, NULL),
(8, 4, 'code', '', 'do some work an get paid', 2000, NULL, NULL),
(9, 5, 'money', '', 'value', 3, NULL, NULL),
(10, 7, 'tom', '', 'tom and jerry work', 510, NULL, NULL),
(11, 3, 'code', '', 'tom and jerry work', 600, NULL, NULL),
(12, 8, 'me', '', 'ths is a useles task', 4500, NULL, NULL),
(13, 9, 'code', '', 'gabbage in gabbage out', 4000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Harisu', 'fanyuiharisu@gmail.com', '$2y$10$FE4HsPqGDxs5udxKQZPuIuuEk13vYV9CBBTr.NM4VvnALjnsXBZua', '', 'ZLNiOJPnEsxMYza67S76T4HHeYAVqv5thNi5cm9fXl675SDOFioh9Vem9Xfo', '2017-06-03 11:58:50', '2017-06-03 14:06:31'),
(2, 'harisu', 'fan\n@gmail.com', '123456', '123', NULL, NULL, NULL),
(3, 'gome', 'john@hotmail.com', '12345', '1234567', NULL, NULL, NULL),
(4, 'gome', 'gome@gmail.com', '12345', '12345', NULL, NULL, NULL),
(5, 'myaccount', 'my@gmail.com', '12345', '12345', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `taskclaims`
--
ALTER TABLE `taskclaims`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taskclaims_user_id_index` (`user_id`),
  ADD KEY `taskclaims_task_id_index` (`task_id`);

--
-- Indexes for table `taskcreators`
--
ALTER TABLE `taskcreators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taskcreators_user_id_index` (`user_id`),
  ADD KEY `taskcreators_task_id_index` (`task_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_filter_id_index` (`filter_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filters`
--
ALTER TABLE `filters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taskclaims`
--
ALTER TABLE `taskclaims`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `taskcreators`
--
ALTER TABLE `taskcreators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
