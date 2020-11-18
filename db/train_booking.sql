-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 07:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `train_booking`
--

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
(3, '2020_11_18_140204_trains', 2),
(4, '2020_11_18_154255_add_is_vacunt_colun_to_train_table', 3),
(5, '2020_11_18_154718_train_bookings', 4),
(6, '2020_11_18_173526_add_ref_no_column_to_train_table', 5),
(7, '2020_11_18_175037_add_remaining_seats_column_to_train_table', 6);

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
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `number_of_seats` int(11) NOT NULL DEFAULT 10,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_vacant` int(11) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `name`, `departure_date`, `departure_time`, `number_of_seats`, `status`, `is_vacant`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'train 1', '2020-11-19', '20:40:00', 0, 1, 0, 1, '2020-11-17 18:30:00', '2020-11-18 12:41:11'),
(7, 'train 2', '2020-11-19', '20:40:00', 10, 1, 1, 1, '2020-11-17 18:30:00', '2020-11-18 12:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `train_bookings`
--

CREATE TABLE `train_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `train_id` bigint(20) UNSIGNED NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_seats` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `train_bookings`
--

INSERT INTO `train_bookings` (`id`, `ref_no`, `train_id`, `nic`, `number_of_seats`, `status`, `created_at`, `updated_at`) VALUES
(1, '4827LLeEg', 1, '12312312312', 1, 1, '2020-11-17 18:30:00', '2020-11-18 12:18:27'),
(2, '5719hwWr6', 1, '123123123v', 4, 1, '2020-11-17 18:30:00', '2020-11-18 12:27:19'),
(3, '5736kVp0X', 1, '123123123v', 4, 1, '2020-11-17 18:30:00', '2020-11-18 12:27:36'),
(4, '5756nuhnF', 1, '123123123v', 4, 1, '2020-11-17 18:30:00', '2020-11-18 12:27:56'),
(5, '5818zFHyu', 1, '12341234422', 5, 1, '2020-11-17 18:30:00', '2020-11-18 12:28:18'),
(6, '5834tPQn0', 1, 'ssssssssss', 1, 1, '2020-11-17 18:30:00', '2020-11-18 12:28:34'),
(7, '5850UsAdX', 1, 'sadsdssssss', 1, 1, '2020-11-17 18:30:00', '2020-11-18 12:28:50'),
(8, '1111O1rd8', 1, '1212121212', 1, 1, '2020-11-17 18:30:00', '2020-11-18 12:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@test.com', NULL, '$2y$10$WJDc40yZ1kGxV33mC6dPLuCqoZerOCbFW7oPml3i5ull.eIAsBvAW', NULL, '2020-11-18 08:50:00', '2020-11-18 08:50:00');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trains_created_by_foreign` (`created_by`);

--
-- Indexes for table `train_bookings`
--
ALTER TABLE `train_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `train_bookings_train_id_foreign` (`train_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `train_bookings`
--
ALTER TABLE `train_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trains`
--
ALTER TABLE `trains`
  ADD CONSTRAINT `trains_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `train_bookings`
--
ALTER TABLE `train_bookings`
  ADD CONSTRAINT `train_bookings_train_id_foreign` FOREIGN KEY (`train_id`) REFERENCES `trains` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
