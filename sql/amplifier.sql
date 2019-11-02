-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 10:35 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amplifier`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist_tags`
--

CREATE TABLE `artist_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` bigint(20) NOT NULL,
  `tag_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artist_types`
--

CREATE TABLE `artist_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` bigint(20) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `performer_id` bigint(20) NOT NULL,
  `package_id` bigint(20) NOT NULL,
  `venue_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `event_from` time NOT NULL,
  `event_to` time NOT NULL,
  `full_amount` decimal(8,2) NOT NULL,
  `payment_status` enum('dp','paid','none','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_booked` date DEFAULT NULL,
  `down_payment` decimal(8,2) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('approve','block','cancel','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_rating` int(11) DEFAULT NULL,
  `performer_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `incoming_id` bigint(20) NOT NULL,
  `outgoing_id` bigint(20) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `incoming_id`, `outgoing_id`, `message`, `created_at`, `updated_at`) VALUES
(87, 45, 44, 'hello nike gwapo', '2019-10-29 09:04:37', '2019-10-29 09:04:37'),
(88, 44, 45, 'angela diay ko hehe', '2019-10-29 09:05:21', '2019-10-29 09:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversion_members`
--

CREATE TABLE `conversion_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` bigint(20) NOT NULL,
  `booking_id` bigint(20) NOT NULL,
  `to_id` smallint(6) NOT NULL,
  `from_id` smallint(6) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `album_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sample_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_id` bigint(20) NOT NULL,
  `media_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` bigint(20) NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_21_095917_create_artist_tags_table', 2),
(10, '2019_08_21_100321_create_members_table', 2),
(11, '2019_08_21_100620_create_artist_types_table', 2),
(12, '2019_08_21_101017_create_conversion_members_table', 2),
(13, '2019_08_21_101521_create_chats_table', 2),
(14, '2019_08_21_101923_create_conversations_table', 2),
(15, '2019_08_21_102540_create_notifications_table', 2),
(16, '2019_08_21_102909_create_bookings_table', 2),
(17, '2019_08_21_103431_create_feedbacks_table', 2),
(18, '2019_08_21_103736_create_galleries_table', 2),
(19, '2019_08_21_104002_create_media_table', 2),
(20, '2019_08_21_104213_create_venues_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` bigint(20) NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` bigint(20) NOT NULL,
  `booked` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `price`, `details`, `owner`, `booked`, `date_created`, `created_at`, `updated_at`) VALUES
(19, 'music delight', '25000.00', '<p>* 3 hours of singing</p>\r\n\r\n<p>* client&#39;s choice of songs</p>\r\n\r\n<p>* first five songs are free</p>\r\n', 44, 1, '0000-00-00', '2019-10-22 09:39:18', '2019-10-22 12:22:45'),
(20, 'Christmas', '2000.00', '<p>Angela is Main Host</p>\r\n', 44, 1, '0000-00-00', '2019-10-24 09:06:37', '2019-10-24 09:06:49'),
(21, 'package', '10000.00', '<p>lorem</p>\r\n', 45, 0, '0000-00-00', '2019-10-29 08:58:24', '2019-10-29 08:59:41');

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
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` bigint(20) NOT NULL,
  `booking_id` bigint(20) NOT NULL,
  `report_from` bigint(20) NOT NULL,
  `report_to` bigint(20) NOT NULL,
  `report_photo` varchar(255) NOT NULL,
  `report_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `user_type` enum('client','performer','admin','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('block','verified','pending','banned') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `offense` set('1','2','3','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `report_count` int(11) NOT NULL DEFAULT 0,
  `media_fk` bigint(20) UNSIGNED DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block_end` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `artist_type` enum('photographer','videographer','host','restaurant gig','graduation ball') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artist_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `username`, `password`, `status`, `fname`, `email`, `address`, `rate`, `photo`, `telephone_1`, `telephone_2`, `created_at`, `offense`, `report_count`, `media_fk`, `lname`, `block_end`, `updated_at`, `artist_type`, `artist_desc`) VALUES
(1, 'client', 'user1', 'pass', 'banned', 'client', 'email@gmail.com', 'cebu', '1200.00', 'assets/img/1.jpg', '09123331', '09123123123', '2019-10-09 17:00:00', '3', 0, NULL, 'last', '0000-00-00', '2019-10-16 12:06:09', '', ''),
(2, 'performer', 'user2', 'pas', 'block', 'perforemr', 'email2@gmail.com', 'talamban', '12333.00', 'assets/img/1.jpg', '09123331', '0912333', '2019-10-21 17:00:00', '2', 1, NULL, 'name', '2019-11-14', '2019-10-16 12:06:09', '', ''),
(3, '', 'bad', 'bad', 'banned', 'bad', 'bad', 'baduser', '1200.00', 'assets/img/1.jpg', '1231231', '12313123', '2019-10-23 17:00:00', '3', 100, NULL, 'invalid', '0000-00-00', '2019-10-16 12:06:09', '', ''),
(7, 'performer', 'username12345', 'password', '', 'brittmon', 'enarosal04@yahoo.com', '', '0.00', '', '09127055497', '0909', '2019-10-06 17:00:00', '0', 0, NULL, 'talvo', '0000-00-00', '2019-10-16 12:06:09', '', ''),
(8, 'performer', 'usernameeee', 'password', '', 'brittttt', 'gshockxd01@gmail.com', '', '0.00', '', '0917055497', '', '2019-10-07 17:00:00', '0', 0, NULL, 'maosdasd', '0000-00-00', '2019-10-16 12:06:09', 'graduation ball', ''),
(44, 'client', 'ShiroViper', '41fd220f05ed0d8c56e3b83af87d45d7', 'pending', 'Nike', 'nikemarticaballes@gmail.com', 'Banilad', '0.00', 'assets/img/performer/2019_10_22_15_06_02.PNG', '09321902242', '09321902242', '2019-10-22 07:06:02', '', 0, NULL, 'Caballes', '0000-00-00', '2019-10-29 08:52:27', 'restaurant gig', '<p>I can host in different events</p>\r\n\r\n<p>and do nothing&nbsp;</p>\r\n\r\n<p>hehe</p>\r\n'),
(45, 'performer', 'JhonCena', '41fd220f05ed0d8c56e3b83af87d45d7', 'pending', 'Angela', 'ceuva@gmail.com', 'Banilad', '0.00', 'assets/img/client/2019_10_22_17_12_19.jpg', '09321902242', '09365468580', '2019-10-22 09:12:19', '', 0, NULL, 'Cueva', '0000-00-00', '2019-10-22 09:12:19', NULL, NULL),
(46, 'client', 'NikeMarti1', '41fd220f05ed0d8c56e3b83af87d45d7', 'pending', 'Shiro', 'cortes@gmail.com', 'banilad', '0.00', 'assets/img/client/2019_10_29_13_30_15.jpg', '09321902242', '09321902242', '2019-10-29 05:30:15', '', 0, NULL, 'Viper', '0000-00-00', '2019-10-29 05:30:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `venue_id` bigint(20) NOT NULL,
  `venue_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(2,1) NOT NULL,
  `registered_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venue_id`, `venue_name`, `address`, `owner`, `photo`, `rate`, `registered_date`) VALUES
(1, 'casa', 'casa,blanca', 'pablo', 'assets/img/1.jpg\r\n', '9.9', '2019-10-09 17:00:00'),
(2, 'pablo', 'escobar', 'escobar', 'assets/img/1.jpg\r\n', '9.9', '2019-10-22 17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist_tags`
--
ALTER TABLE `artist_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist_types`
--
ALTER TABLE `artist_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `user_id` (`performer_id`),
  ADD KEY `venue_id` (`venue_name`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incoming_id` (`incoming_id`),
  ADD KEY `outgoing_id` (`outgoing_id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversion_members`
--
ALTER TABLE `conversion_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `owner` (`owner`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `report_from` (`report_from`),
  ADD KEY `report_to` (`report_to`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `media_fk` (`media_fk`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist_tags`
--
ALTER TABLE `artist_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artist_types`
--
ALTER TABLE `artist_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversion_members`
--
ALTER TABLE `conversion_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `venue_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`performer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`);

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`incoming_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`outgoing_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`report_from`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `reports_ibfk_3` FOREIGN KEY (`report_to`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
