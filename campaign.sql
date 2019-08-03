-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 07:03 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campaign`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `service_id` int(11) UNSIGNED DEFAULT NULL,
  `name` varchar(555) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `service_id`, `name`, `created_at`, `updated_at`) VALUES
(3, 3, 'wash room and bath room cleaning ', '2018-07-31 01:19:13', '2018-07-31 01:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `country`, `city`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 'Dhaka', '27 dhanmondi', '2018-07-31 02:59:22', '2018-07-31 03:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 2),
(5, '2018_04_15_042243_create_admin_table', 2),
(6, '2018_07_29_044952_age', 2),
(7, '2018_07_29_070803_services', 3),
(8, '2018_07_29_072758_add_detail_columnsTo_usersTable', 4),
(9, '2018_07_29_074137_add_col_to_usersTable', 5),
(10, '2018_07_31_074526_locations', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `featuers` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `created_at`, `updated_at`, `featuers`) VALUES
(1, 'plumber', '2018-07-29 21:46:26', '2018-07-29 21:46:26', NULL),
(3, 'Cleaner', '2018-07-30 03:15:23', '2018-07-30 03:15:23', NULL),
(4, 'painter', '2018-07-30 03:15:34', '2018-07-30 03:15:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_path` varchar(555) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8_unicode_ci,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(2) NOT NULL DEFAULT '1',
  `age` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipCode` varchar(33) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(22) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recognitionSign` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `image_path`, `about`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `age`, `address`, `region`, `zipCode`, `phoneNumber`, `recognitionSign`) VALUES
(5, 'shewa', 'shewa@gmail.com', 'IMG_20190515_152608_20190515_153219146.jpg', 'C:\\xampp\\tmp\\phpFCB1.tmp', 'Hi, I am web developer', '$2y$10$ywKW5TEdnI6z77PF6aOiUu/emjxBd.q9xlBiIbs65oF0eloFMOZFC', 'oxHuryO0zdLnbLrEU8bHF1uSkihCX9QSowwZC4w4mTJ5p9MkXUiVlYst5e6e', '2018-07-17 05:43:50', '2019-08-03 00:50:08', 3, 0, '', '', '', '', NULL),
(6, 'shewa', 'shewa1234@gmail.com', 'shewa-min.jpg', 'C:\\xampp\\tmp\\phpB4E9.tmp', 'hello', 'shewa123', NULL, '2018-07-30 03:14:16', '2018-07-30 03:14:16', 1, 27, '27 dhanmondi dhaka', 'dhaka', '1200', '0099033200', 'sun glass'),
(7, 'campUser', 'campaign@gmail.com', NULL, NULL, NULL, '$2y$10$xMSs8tT5.3PHp9OpxCLVxu9.wIZqX8htK93WSkrRt6LtQT9pUUM.W', NULL, '2019-08-03 10:42:37', '2019-08-03 10:42:37', 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `worklog`
--

CREATE TABLE `worklog` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `hour` varchar(55) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext,
  `created_at` date DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worklog`
--

INSERT INTO `worklog` (`id`, `user_id`, `hour`, `title`, `description`, `created_at`, `updated_at`) VALUES
(3, 5, '2nd Hour', 'website security', 'fsdf', '2018-07-29', '2018-07-29 08:39:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_serviceId` (`service_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `worklog`
--
ALTER TABLE `worklog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_userid` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `worklog`
--
ALTER TABLE `worklog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `fk_serviceId` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `worklog`
--
ALTER TABLE `worklog`
  ADD CONSTRAINT `FK_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
