-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2019 at 05:55 PM
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
  `payment_status` tinyint(4) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `campaign` (`id`, `user_id`, `payment_status`, `title`, `employee_id`, `asin`, `product_link`, `full_price`, `created_at`, `updated_at`) VALUES
(6, 16, 0, '', 18, 'asin', 'http://localhost', '120.00', '2019-08-05 02:56:58', '2019-08-10 03:19:45'),
(7, 16, 0, '', 0, 'asin2', 'http://localhost', '120.00', '2019-08-05 03:01:02', '2019-08-05 03:01:02'),
(8, 16, 0, '', 0, 'asin', 'http://localhost', '10.00', '2019-08-05 03:02:37', '2019-08-05 03:02:37'),
(9, 16, 0, '', 0, 'asin', 'http://localhost', '10.00', '2019-08-05 03:03:38', '2019-08-05 03:03:38'),
(10, 16, 0, '', 0, 'asin', 'http://localhost', '10.00', '2019-08-05 03:05:02', '2019-08-05 03:05:02'),
(11, 16, 0, '', 0, 'asin', 'http://localhost', '10.00', '2019-08-05 03:05:16', '2019-08-05 03:05:16'),
(12, 16, 0, '', 18, 'what is this', 'http://localhost', '10.00', '2019-08-05 03:07:54', '2019-08-06 10:25:11'),
(13, 16, 0, '', 0, 'ASIN', 'http://facebook', '20.00', '2019-08-08 12:07:39', '2019-08-08 12:07:39'),
(14, 16, 1, 'Test title', 18, 'ASIN', 'http://facebok.com', '343.00', '2019-08-10 03:24:19', '2019-08-10 04:43:57'),
(15, 16, 0, 'Youtube camp', 0, 'test asin', 'http://youtube.com', '10.00', '2019-08-10 11:12:24', '2019-08-10 11:12:24');

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
(13, 12, 'feroz', '2019-08-05 03:07:54', '2019-08-05 03:07:54', 2, 5, '3'),
(14, 13, 'ad center', '2019-08-08 12:07:39', '2019-08-08 12:07:39', 12, 33, '5'),
(15, 14, 'fdsf', '2019-08-10 03:24:19', '2019-08-10 03:24:19', 343, 343, '5'),
(16, 15, 'Youtube', '2019-08-10 11:12:25', '2019-08-10 11:12:25', 5, 244, '5');

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `type` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `type`, `created_at`, `updated_at`) VALUES
(4, NULL, '<p><b>Account No: 70957820830989</b></p><p><b>Account Name: Shewa</b></p><p><b>Account Type: Current Account</b></p><p><b>Swift Code: 3342</b></p><p><b>Branch: Mirpur 1</b><br></p>', 'bank', NULL, '2019-08-10 08:47:08'),
(5, NULL, '<ol><li><strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. </li><li>Lorem Ipsum has been the industry''s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. </li><li>It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged.<br></li></ol>', 'faq', NULL, '2019-08-10 08:38:26'),
(6, NULL, '<p><br></p><table class="table table-bordered"><tbody><tr><td>Dummy table<br></td><td>Dummy content<br></td></tr><tr><td>testing<br></td><td>testing<br></td></tr></tbody></table><p><br></p>', 'affiliate', NULL, '2019-08-10 08:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(11) UNSIGNED NOT NULL,
  `keyword_id` int(11) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `sale_datetime` varchar(255) DEFAULT NULL,
  `person_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `order_no` varchar(255) DEFAULT NULL,
  `paypal` varchar(255) DEFAULT NULL,
  `note` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `keyword_id`, `date`, `sale_datetime`, `person_name`, `email`, `order_no`, `paypal`, `note`, `created_at`, `updated_at`) VALUES
(1, 4, '2019-08-10', '15:54', 'shewa', 'shewa@gmail.com', '24', '49794809283', 'firs order', '2019-08-10 11:00:36', '2019-08-10 11:00:36'),
(2, 15, '2019-08-10', '17:03', 'shewa', 'shewa@gmail.com', '444', '4795948489', 'notes', '2019-08-10 11:03:18', '2019-08-10 11:03:18'),
(3, 15, '2019-08-13', NULL, 'shewa', 'shewa@gmail.com', '24', '4795948489', '', '2019-08-13 08:58:33', '2019-08-13 08:58:33'),
(4, 15, '', NULL, 'shewa', 'shewa@gmail.com', '930480', '4795948489', '', '2019-08-13 08:59:46', '2019-08-13 08:59:46'),
(5, 4, '2019-08-13', '09:27', 'shewa', 'shewa@gmail.com', '#4444', '345355245', 'notes', '2019-08-13 15:28:08', '2019-08-13 15:28:08'),
(6, 4, '2019-08-13', '06:41 PM', 'shewa', 'shewa@gmail.com', '#44444', '12445', 'not', '2019-08-13 15:45:24', '2019-08-13 15:45:24'),
(7, 15, '2019-08-13', '10:50 PM', 'shewa', 'shewa@gmail.com', '69', '12445', '', '2019-08-13 15:53:11', '2019-08-13 15:53:11');

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
(5, 'shewa', 'shewa@gmail.com', 'shewa.jpg', 'C:\\wamp64\\tmp\\phpEFBC.tmp', 'Hi, I am web developer', '$2y$10$p5aaAxOufhccfq81EY.OjOTwT11KqfpqfKunbw12/ecwzXA8QuWSq', 'geQPCYiosBEOFqByghkMLWKGv8MwysKdmrw1MiHSsrWcTSw5ZzZwCvQSHQVZ', '2018-07-17 05:43:50', '2019-08-13 02:57:33', 3, 0, '', '', '', '', NULL),
(16, 'shahidul', 'shahidul@gmail.com', 'shahidul.jpg', 'C:\\wamp64\\tmp\\php7079.tmp', NULL, '$2y$10$QxDdUHuLOWDVRdeHGl5yiOz.mpQUJVBghOMG8wvuecf/zkfqs4dVO', 'AVwYElENSbegPr5R1xSr1bS7Tje6AJnYUTig1HbxbALGnSiljTK8FznSoKgM', '2019-08-04 00:46:37', '2019-08-13 02:02:51', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Rajeeb', 'rajeeb@gmail.com', 'Rajib-vai.jpg', 'C:\\wamp64\\tmp\\php7BD6.tmp', NULL, '$2y$10$/VxWXSPHGF2uHFXeQ75Gj.MNFVTWVTRdFVRveNQsvDHrkeDAGrSpu', NULL, '2019-08-04 01:36:55', '2019-08-04 01:36:55', 1, NULL, '', '', '', '', NULL),
(18, 'employee', 'employee@gmail.com', 'shewa.jpg', 'C:\\wamp64\\tmp\\php3416.tmp', NULL, '$2y$10$vkLx68egjWk46nTbVROjpefm.Cr//9zgkbcSvggD6Tw6j1GWFziC6', 'Yk358R5si7YgPuT7iIolDyZLBfBlNd2DHMW3Dlmj4rpSpxQstRiE2uutQhjn', '2019-08-04 02:00:38', '2019-08-13 02:02:20', 2, NULL, '', '', '', '', NULL),
(19, 'Hamid', 'hamid@gmail.com', 'hamid.jpg', 'C:\\wamp64\\tmp\\php1E77.tmp', NULL, '$2y$10$qYvm7Vh7liLPLzaTBbMdE.qfWFnuzrTW8hnv3heTgaPFBKa7naZwS', NULL, '2019-08-04 02:01:38', '2019-08-04 02:01:38', 1, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `keyword`
--
ALTER TABLE `keyword`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
