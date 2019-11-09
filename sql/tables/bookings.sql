-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2019 at 10:34 AM
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
  `full_amount` float(8,2) DEFAULT NULL,
  `payment_status` enum('dp','paid','none','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_booked` date DEFAULT NULL,
  `down_payment` decimal(8,2) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('approve','block','cancel','pending','hide') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_rating` int(11) DEFAULT NULL,
  `performer_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `client_id`, `performer_id`, `package_id`, `venue_name`, `event_date`, `event_from`, `event_to`, `full_amount`, `payment_status`, `date_booked`, `down_payment`, `notes`, `status`, `event_name`, `artist_type`, `client_rating`, `performer_rating`) VALUES
(43, 53, 59, 39, 'Nasipit Talamban Cebu City', '2019-12-23', '09:00:00', '21:00:00', 0.00, 'dp', '2019-11-07', '2000.00', '<p>The event is stricly held at 9:00 am to 9:00 pm on December 16, 2019. Please be come on December 10 to 13, 2019 for preparation of the event.</p>', 'approve', 'University of San Carlos Graduation', 'graduation ball', 2, NULL),
(44, 53, 59, 39, 'Nasipit Talamban Cebu City', '2019-12-23', '09:00:00', '21:00:00', 0.00, 'dp', '2019-11-07', '2000.00', '<p>The event is stricly held at 9:00 am to 9:00 pm on December 16, 2019. Please be come on December 10 to 13, 2019 for preparation of the event.</p>', 'approve', 'University of San Carlos Graduation', 'graduation ball', NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`performer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
