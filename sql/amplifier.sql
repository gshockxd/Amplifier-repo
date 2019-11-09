-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 06:27 AM
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
-- Table structure for table `band_galleries`
--

CREATE TABLE `band_galleries` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `band_photo` varchar(255) NOT NULL,
  `video_1` varchar(255) NOT NULL,
  `video_2` varchar(255) NOT NULL,
  `video_3` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `band_galleries`
--

INSERT INTO `band_galleries` (`id`, `user_id`, `band_photo`, `video_1`, `video_2`, `video_3`, `created_at`, `updated_at`) VALUES
(5, 57, 'assets/img/performer/2019_11_06_10_54_361.jpg', 'assets/video/performer/2019_11_06_10_54_36.mp4', 'assets/video/performer/2019_11_06_10_54_361.mp4', 'assets/video/performer/2019_11_06_10_54_362.mp4', '2019-11-06 02:54:36', '2019-11-06 02:54:36'),
(6, 58, 'assets/img/performer/2019_11_06_18_43_06.jpg', 'assets/video/performer/2019_11_06_18_43_06.mp4', 'assets/video/performer/2019_11_06_18_43_061.mp4', 'assets/video/performer/2019_11_06_18_43_062.mp4', '2019-11-06 10:43:06', '2019-11-06 10:43:06'),
(7, 59, 'assets/img/performer/2019_11_06_19_11_301.jpg', 'assets/video/performer/2019_11_06_19_11_30.mp4', 'assets/video/performer/2019_11_06_19_11_301.mp4', 'assets/video/performer/2019_11_06_19_11_302.mp4', '2019-11-06 11:11:30', '2019-11-06 11:11:30');

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

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `client_id`, `performer_id`, `package_id`, `venue_name`, `event_date`, `event_from`, `event_to`, `full_amount`, `payment_status`, `date_booked`, `down_payment`, `notes`, `status`, `event_name`, `artist_type`, `client_rating`, `performer_rating`) VALUES
(43, 53, 59, 39, 'Nasipit Talamban Cebu City', '2019-12-23', '09:00:00', '21:00:00', '0.00', 'dp', '2019-11-07', '2000.00', '<p>The event is stricly held at 9:00 am to 9:00 pm on December 16, 2019. Please be come on December 10 to 13, 2019 for preparation of the event.</p>', 'approve', 'University of San Carlos Graduation', 'graduation ball', NULL, NULL);

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
(94, 57, 53, 'hello', '2019-11-06 22:44:41', '2019-11-06 22:44:41'),
(95, 58, 57, 'hi', '2019-11-06 22:46:42', '2019-11-06 22:46:42'),
(96, 57, 53, 'hi', '2019-11-06 22:48:15', '2019-11-06 22:48:15'),
(97, 53, 57, 'hello sad', '2019-11-06 22:48:24', '2019-11-06 22:48:24'),
(98, 53, 57, 'good morning', '2019-11-06 22:48:40', '2019-11-06 22:48:40'),
(99, 57, 53, 'yup', '2019-11-08 02:16:44', '2019-11-08 02:16:44');

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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `venue_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_from` time NOT NULL,
  `event_to` time NOT NULL,
  `down_payment` decimal(8,2) NOT NULL,
  `notes` text NOT NULL,
  `status` enum('approve','block','cancel','pending') NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(29, 'Music Delight', '5000.00', '<p>The band is available in the evening between 6:00 pm to 12:00 am.</p>', 57, 0, '0000-00-00', '2019-11-06 10:33:43', '2019-11-06 10:33:43'),
(30, 'Instrument Lend', '10000.00', '<p>The price is negotiable but not less than 8,000 pesos.</p>', 57, 0, '0000-00-00', '2019-11-06 10:37:27', '2019-11-06 10:37:27'),
(32, 'Giggling Music', '15000.00', '<p>We perform random rock, slow, modern and classic song.</p>', 58, 0, '0000-00-00', '2019-11-06 11:02:50', '2019-11-06 11:02:50'),
(38, 'Restaurant Performers', '20000.00', '<p>We the performer, perform anything before payment.</p>', 58, 0, '0000-00-00', '2019-11-06 11:04:24', '2019-11-06 11:04:24'),
(39, 'GraduationPlanner', '25000.00', '<p>We are available anytime and anywhere.</p>', 59, 1, '0000-00-00', '2019-11-06 11:12:48', '2019-11-06 11:12:48');

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
(52, 'admin', 'Kirito', '41fd220f05ed0d8c56e3b83af87d45d7', 'pending', 'Kirigaya', 'kirigaya@gmail.com', 'Apas, Cebu City', '0.00', 'assets/img/client/2019_11_06_09_11_46.jpg', '09123456789', '09123456790', '2019-11-06 01:11:46', '', 0, NULL, 'Kazuto', '0000-00-00', '2019-11-06 01:11:46', NULL, NULL),
(53, 'client', 'AliceSynthesisThirty', '41fd220f05ed0d8c56e3b83af87d45d7', 'pending', 'Alice', 'alice@gmail.com', 'Banilad, Cebu City', '0.00', 'assets/img/client/2019_11_06_10_20_33.jpg', '09123456890', '09123457890', '2019-11-06 02:20:34', '', 0, NULL, 'Zuberg', '0000-00-00', '2019-11-08 03:07:34', NULL, NULL),
(54, 'client', 'YujioEugeo', '41fd220f05ed0d8c56e3b83af87d45d7', 'pending', 'Yujio', 'yujio@gmail.com', 'Capitol Site, Cebu City', '0.00', 'assets/img/client/2019_11_06_10_24_24.jpg', '09123457890', '09123467890', '2019-11-06 02:24:24', '', 0, NULL, 'Eugeo', '0000-00-00', '2019-11-06 02:24:24', NULL, NULL),
(55, 'client', 'Asuna', '41fd220f05ed0d8c56e3b83af87d45d7', 'pending', 'Yuki', 'yuki@gmail.com', 'Day-As, Cebu City', '0.00', 'assets/img/client/2019_11_06_10_33_08.jpg', '09123567890', '09124567890', '2019-11-06 02:33:08', '', 0, NULL, 'Asuna', '0000-00-00', '2019-11-06 02:33:08', NULL, NULL),
(56, 'client', 'EldrieSynthesisThirtyone', '41fd220f05ed0d8c56e3b83af87d45d7', 'pending', 'Eldrie', 'eldrie@gmail.com', 'Ermita, Cebu City', '0.00', 'assets/img/client/2019_11_06_10_36_02.jpg', '09124567890', '09124567890', '2019-11-06 02:36:02', '', 0, NULL, 'Woolsburg', '0000-00-00', '2019-11-06 02:36:02', NULL, NULL),
(57, 'performer', 'OmaShu', '41fd220f05ed0d8c56e3b83af87d45d7', 'pending', 'Oma', 'oma@gmail.com', 'Guba, Cebu City', '0.00', 'assets/img/performer/2019_11_06_10_54_36.jpg', '09134567890', '09234567890', '2019-11-06 02:54:36', '', 0, NULL, 'Shu', '0000-00-00', '2019-11-06 02:54:36', 'graduation ball', '<p>My band can do:</p><ul><li>Singing Classic and Modern song</li></ul><p>The band can perform before payment.</p>'),
(58, 'performer', 'YuzurihaInori', '41fd220f05ed0d8c56e3b83af87d45d7', 'pending', 'Yuzuriha', 'yuzuriha@gmail.com', 'Kalubihan, Cebu City', '0.00', 'assets/img/performer/2019_11_06_18_43_06.png', '09134567890', '09234567890', '2019-11-06 10:43:06', '', 0, NULL, 'Inori', '0000-00-00', '2019-11-06 10:43:06', 'restaurant gig', '<p>The band can only perform within restaurant gigs.</p>'),
(59, 'performer', 'GaiTsutsugami', '41fd220f05ed0d8c56e3b83af87d45d7', 'pending', 'Gai', 'gai@gmail.com', 'Lahug, Cebu City', '0.00', 'assets/img/performer/2019_11_06_19_11_30.jpg', '09234567890', '09408861879', '2019-11-06 11:11:30', '', 0, NULL, 'Tsutsugami', '0000-00-00', '2019-11-06 11:11:30', 'graduation ball', '<p>We can make reservation plan and setup plan for graduation ball.</p>');

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
-- Indexes for table `band_galleries`
--
ALTER TABLE `band_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `band_galleries`
--
ALTER TABLE `band_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

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
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `venue_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `band_galleries`
--
ALTER TABLE `band_galleries`
  ADD CONSTRAINT `band_galleries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`performer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`);

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`incoming_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`outgoing_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
