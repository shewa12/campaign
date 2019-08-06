-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2019 at 08:29 PM
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
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL DEFAULT '0',
  `asin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_price` decimal(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id`, `user_id`, `employee_id`, `asin`, `product_link`, `full_price`, `created_at`, `updated_at`) VALUES
(6, 16, 0, 'asin', 'http://localhost', '120.00', '2019-08-05 02:56:58', '2019-08-05 02:56:58'),
(7, 16, 0, 'asin2', 'http://localhost', '120.00', '2019-08-05 03:01:02', '2019-08-05 03:01:02'),
(8, 16, 0, 'asin', 'http://localhost', '10.00', '2019-08-05 03:02:37', '2019-08-05 03:02:37'),
(9, 16, 0, 'asin', 'http://localhost', '10.00', '2019-08-05 03:03:38', '2019-08-05 03:03:38'),
(10, 16, 0, 'asin', 'http://localhost', '10.00', '2019-08-05 03:05:02', '2019-08-05 03:05:02'),
(11, 16, 0, 'asin', 'http://localhost', '10.00', '2019-08-05 03:05:16', '2019-08-05 03:05:16'),
(12, 16, 18, 'what is this', 'http://localhost', '10.00', '2019-08-05 03:07:54', '2019-08-06 10:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE `keyword` (
  `id` int(11) UNSIGNED NOT NULL,
  `campaign_id` int(11) UNSIGNED DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `perday_sale` int(11) NOT NULL,
  `product_page` int(11) NOT NULL,
  `duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keyword`
--

INSERT INTO `keyword` (`id`, `campaign_id`, `keyword`, `created_at`, `updated_at`, `perday_sale`, `product_page`, `duration`) VALUES
(4, 6, 'web design', '2019-08-05 02:56:59', '2019-08-05 02:56:59', 10, 20, '5'),
(5, 7, 'development', '2019-08-05 03:01:02', '2019-08-05 03:01:02', 20, 200, '10'),
(6, 7, 'software', '2019-08-05 03:01:02', '2019-08-05 03:01:02', 13, 20, '3'),
(7, 7, 'rajeeb', '2019-08-05 03:01:02', '2019-08-05 03:01:02', 15, 25, '3'),
(8, 8, 'web design', '2019-08-05 03:02:37', '2019-08-05 03:02:37', 10, 20, '3'),
(9, 10, 'web design', '2019-08-05 03:05:02', '2019-08-05 03:05:02', 20, 200, '3'),
(10, 11, 'web design', '2019-08-05 03:05:16', '2019-08-05 03:05:16', 10, 100, '3'),
(11, 12, 'web design', '2019-08-05 03:07:54', '2019-08-05 03:07:54', 20, 20, '7'),
(12, 12, 'web design', '2019-08-05 03:07:54', '2019-08-05 03:07:54', 1, 20, '7'),
(13, 12, 'feroz', '2019-08-05 03:07:54', '2019-08-05 03:07:54', 2, 5, '3');

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
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(11) UNSIGNED NOT NULL,
  `keyword_id` int(11) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `sale_datetime` datetime DEFAULT NULL,
  `persone_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `order_no` varchar(255) DEFAULT NULL,
  `paypal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `role` int(2) NOT NULL DEFAULT '1',
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
(5, 'shewa', 'shewa@gmail.com', 'shewa.jpg', 'C:\\wamp64\\tmp\\phpEFBC.tmp', 'Hi, I am web developer', '$2y$10$p5aaAxOufhccfq81EY.OjOTwT11KqfpqfKunbw12/ecwzXA8QuWSq', 'CV8fMBqZlgvbMhDNqMqHgqzCfflzXNVBabdd4qaa5fJieLVOOgNhlUG8Rbdd', '2018-07-17 05:43:50', '2019-08-05 22:22:38', 3, 0, '', '', '', '', NULL),
(16, 'shahidul', 'shahidul@gmail.com', 'shahidul.jpg', 'C:\\wamp64\\tmp\\php7079.tmp', NULL, '$2y$10$QxDdUHuLOWDVRdeHGl5yiOz.mpQUJVBghOMG8wvuecf/zkfqs4dVO', 'lraaXous5kZg88WaS0j8Xr3PDmNR58NPiJLKFKjvOHqZlNYu6GNAKUv0Z8fp', '2019-08-04 00:46:37', '2019-08-06 10:59:33', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Rajeeb', 'rajeeb@gmail.com', 'Rajib-vai.jpg', 'C:\\wamp64\\tmp\\php7BD6.tmp', NULL, '$2y$10$/VxWXSPHGF2uHFXeQ75Gj.MNFVTWVTRdFVRveNQsvDHrkeDAGrSpu', NULL, '2019-08-04 01:36:55', '2019-08-04 01:36:55', 1, NULL, '', '', '', '', NULL),
(18, 'employee', 'employee@gmail.com', 'shewa.jpg', 'C:\\wamp64\\tmp\\php3416.tmp', NULL, '$2y$10$vkLx68egjWk46nTbVROjpefm.Cr//9zgkbcSvggD6Tw6j1GWFziC6', 'MVirVXay75TNBC5snufd7w1nSv9AZ2kOQOikoRjw3Z0uNhvL9z8ldBroEmM6', '2019-08-04 02:00:38', '2019-08-06 10:57:29', 2, NULL, '', '', '', '', NULL),
(19, 'Hamid', 'hamid@gmail.com', 'hamid.jpg', 'C:\\wamp64\\tmp\\php1E77.tmp', NULL, '$2y$10$qYvm7Vh7liLPLzaTBbMdE.qfWFnuzrTW8hnv3heTgaPFBKa7naZwS', NULL, '2019-08-04 02:01:38', '2019-08-04 02:01:38', 1, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_userIdForServices` (`user_id`);

--
-- Indexes for table `keyword`
--
ALTER TABLE `keyword`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_serviceId` (`campaign_id`);

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
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keyword_id` (`keyword_id`);

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
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `keyword`
--
ALTER TABLE `keyword`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `worklog`
--
ALTER TABLE `worklog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaign`
--
ALTER TABLE `campaign`
  ADD CONSTRAINT `FK_userIdForServices` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `keyword`
--
ALTER TABLE `keyword`
  ADD CONSTRAINT `fk_serviceId` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`id`);

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`keyword_id`) REFERENCES `keyword` (`id`);

--
-- Constraints for table `worklog`
--
ALTER TABLE `worklog`
  ADD CONSTRAINT `FK_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
