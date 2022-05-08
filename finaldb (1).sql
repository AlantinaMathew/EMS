-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 09:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambus`
--

CREATE TABLE `ambus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `fuel_loc`
--

CREATE TABLE `fuel_loc` (
  `id` int(10) NOT NULL,
  `fid` int(10) NOT NULL,
  `place` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuel_loc`
--

INSERT INTO `fuel_loc` (`id`, `fid`, `place`) VALUES
(1, 1, 'kanjirappaly'),
(2, 4, 'kanjirappaly'),
(3, 4, 'erumely'),
(4, 8, 'kanjirappaly'),
(5, 8, 'koovappaly'),
(6, 8, 'erumely'),
(7, 8, 'mundakayam'),
(8, 9, 'koovappaly'),
(9, 9, 'mundakayam'),
(10, 10, 'kanjirappaly'),
(11, 10, 'mundakayam');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_05_163605_create_logs_table', 1),
(6, '2022_03_29_093215_add_phone_field_to_users_table', 2),
(7, '2022_03_29_093757_add_phone_field_to_users_table', 3),
(8, '2022_03_31_035056_add_status_field_to_users_table', 4),
(9, '2022_04_01_063557_add_place_field_to_users', 5),
(10, '2022_04_02_050545_donor', 6),
(11, '2022_04_06_175515_create_ambus_table', 7),
(12, '2022_05_03_075536_admin', 7),
(13, '2022_05_03_161905_ambu', 8),
(14, '2022_05_03_180144_fuel', 9),
(15, '2022_05_03_180531_repair', 10),
(16, '2022_05_05_161924_req_ambu', 11),
(17, '2022_05_08_130215_req_fuel', 12);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rep_loc`
--

CREATE TABLE `rep_loc` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `place` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rep_loc`
--

INSERT INTO `rep_loc` (`id`, `rid`, `place`) VALUES
(1, 1, 'kanjirappaly'),
(2, 2, 'koovappaly'),
(3, 4, 'kanjirappaly'),
(4, 4, 'koovappaly'),
(5, 4, 'erumely'),
(6, 4, 'mundakayam');

-- --------------------------------------------------------

--
-- Table structure for table `rep_service`
--

CREATE TABLE `rep_service` (
  `id` int(10) NOT NULL,
  `rid` int(10) NOT NULL,
  `service` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ambu`
--

CREATE TABLE `tbl_ambu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_num` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_num` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(15) NOT NULL,
  `place` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_ambu`
--

INSERT INTO `tbl_ambu` (`id`, `email`, `password`, `vehicle_num`, `license_num`, `phone`, `place`, `status`) VALUES
(18, 'ambu@gmail.com', '12345678', 'DL 01 C AA 1111', '78123456', 9934567890, 'kanjirappaly', 1),
(19, 'ambu1@gmail.com', '12345678', 'DL 01 B AA 1111', '12345678', 9947306123, 'kanjirappaly', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donor`
--

CREATE TABLE `tbl_donor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL,
  `dob` date NOT NULL,
  `medlyf` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donor` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bloodgrp` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_donor`
--

INSERT INTO `tbl_donor` (`id`, `uid`, `dob`, `medlyf`, `weight`, `gender`, `donor`, `bloodgrp`, `status`) VALUES
(6, 10, '2000-06-13', 'No', 76, 'Female', 'Yes', 'B Positive', 1),
(12, 12, '2003-05-14', 'No', 67, 'Female', 'Yes', 'O Negative', 1),
(14, 11, '1986-03-05', 'No', 67, 'Male', 'Yes', 'AB Positive', 1),
(16, 26, '2001-04-05', 'No', 62, 'Male', 'Yes', 'A Negative', 1),
(17, 27, '1999-02-26', 'Yes', 56, 'Male', 'Yes', 'O Negative', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fuel`
--

CREATE TABLE `tbl_fuel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(15) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 1,
  `petrol_rs` decimal(10,4) DEFAULT 0.0000,
  `disel_rs` decimal(10,4) DEFAULT 0.0000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_fuel`
--

INSERT INTO `tbl_fuel` (`id`, `name`, `email`, `password`, `phone`, `status`, `petrol_rs`, `disel_rs`) VALUES
(1, 'kanjirappally fuel', 'fuel@gmail.com', '12345678', 9539331911, 1, '10.0000', '0.0000'),
(4, 'fuels india', 'fuelindia@gmail.com', '12345678', 9934567890, 1, '110.7800', '105.5000'),
(8, 'fuel2', 'fuel2@gmail.com', '12345678', 8899776600, 1, '110.7800', '0.0000'),
(9, 'fuel3', 'fuel3@gmail.co', '12345678', 7755997744, 1, '110.7800', '0.0000'),
(10, 'fuel1', 'fuel1@gmail.com', '12345678', 7788990023, 1, '110.7800', '0.0000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_repair`
--

CREATE TABLE `tbl_repair` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(15) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_repair`
--

INSERT INTO `tbl_repair` (`id`, `name`, `email`, `password`, `phone`, `status`) VALUES
(1, 'repair kjprly', 'rep@mec.in', '12345678', 7755669944, 1),
(2, 'repair kvply', 'rep1@mec.in', '12345678', 7755669944, 1),
(4, 'Repair All India', 'repairindia@gmail.com', '12345678', 9988776655, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_req_ambu`
--

CREATE TABLE `tbl_req_ambu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `location` varchar(110) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_req_ambu`
--

INSERT INTO `tbl_req_ambu` (`id`, `uid`, `aid`, `location`, `created_at`, `updated_at`, `status`) VALUES
(4, 28, 18, 'near petta kavala', '2022-05-06 23:54:49', '2022-05-07 12:18:58', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_req_fuel`
--

CREATE TABLE `tbl_req_fuel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `place` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_req_fuel`
--

INSERT INTO `tbl_req_fuel` (`id`, `uid`, `fid`, `place`, `location`, `fuel`, `price`, `created_at`, `updated_at`, `status`) VALUES
(4, 28, 8, 'koovappaly', 'near ajce', 'Petrol', '110.7800', '2022-05-08 12:07:46', '2022-05-08 13:35:07', '3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `place` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `status`, `place`) VALUES
(10, 'aa', 'aaa@gmail.com', '2022-04-07 22:48:50', '$2y$10$Mrhi2eiX44hc/zr.xwB6nugXQh3G9mNqsLR.xpeLTXQNQHwfZBIym', 'Zkeunj6C6d4MickqWEzxSrRqT4J34m3g1r0OPRQSzMD5lchvPQ1ywVNPuO1N', '2022-03-30 22:33:23', '2022-04-07 22:48:50', 9947306123, 1, 'kanjirappaly'),
(11, 'aab', 'aab@gmail.com', NULL, '$2y$10$xYVfdhp8DK1i.ZjqWUwKDeI/gMK7JO5xdN4nJof6ZVRXrCy.HTJoy', NULL, '2022-04-01 12:17:03', '2022-04-01 12:17:03', 1234567890, 1, 'kanjirappaly'),
(12, 'aaab', 'aaab@gmail.com', NULL, '$2y$10$.GuMRKjNCQCr6/Im6yU4MePq/mbnlKLTaweJXkfoRdMddSwHiSNDK', NULL, '2022-04-05 10:38:01', '2022-04-05 10:38:01', 9539331911, 1, 'kanjirappaly'),
(19, 'haloo', 'halo@gmail.com', NULL, '$2y$10$2hjar4ON7pgce0CISyYA.eYbO8bVtJSxFKxI3MEyAdAEcSCl.8wtO', NULL, '2022-04-06 11:04:13', '2022-04-06 11:04:13', 9539331911, 1, 'mundakayam'),
(20, 'jj', 'jj@gmail.com', '2022-04-06 11:26:02', '$2y$10$XsCYrpxXV.lvdQYzPZj1ne9v1QrU9OZ/GPGCJ98Y/O9K/PaPZGIaK', 'Y2hjATlAOyONFpzQxL1bffDDVohnmNiBG3oMYmcbseQH2xymqyGOlTTIqLJs', '2022-04-06 11:09:20', '2022-04-06 11:40:03', 9539331911, 1, 'koovappaly'),
(21, 'hh', 'hh@gmail.com', NULL, '$2y$10$fIAlWDHKlr0keKRYJmASZuAYy7dAYWbJO8Qwy4OdCN.pwX9sV7jLO', NULL, '2022-04-06 11:30:39', '2022-04-06 11:30:39', 1234567890, 1, 'koovappaly'),
(26, 'user', 'user@gmail.com', '2022-04-07 23:06:49', '$2y$10$bjaLLzmEnaHBkfWtZqsS9uFaytXOhF.aLZkX0g1AipNbyv1/T1gbe', NULL, '2022-04-07 23:06:01', '2022-04-07 23:06:49', 8979651255, 1, 'erumely'),
(27, 'user1', 'user1@gm.com', '2022-04-07 23:17:50', '$2y$10$VosMQPGJibaXeFMzj99ZpelRQeq8/YYvq5cSuBfGqHGc8iYL5oSXm', NULL, '2022-04-07 23:17:13', '2022-04-07 23:17:50', 9967556980, 1, 'kanjirappaly'),
(28, 'user2', 'user2@gmail.com', '2022-05-05 10:28:25', '$2y$10$mXWnqtQT3QbKFnyRGtlB0OfWx4PgFb2vfVCw1xoofkwbvZ6bYMdU2', NULL, '2022-05-05 10:24:33', '2022-05-05 10:28:25', 9539331911, 1, 'mundakayam'),
(29, 'user3', 'user3@gmail.com', NULL, '$2y$10$g18pFw25KhvhPciORnKTTuJCMTkhZTLDmtu6cmKIC71W8YllW7U5q', NULL, '2022-05-05 22:14:00', '2022-05-05 22:14:00', 9947306123, 1, 'erumely');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambus`
--
ALTER TABLE `ambus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fuel_loc`
--
ALTER TABLE `fuel_loc`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rep_loc`
--
ALTER TABLE `rep_loc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rep_service`
--
ALTER TABLE `rep_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_admin_email_unique` (`email`);

--
-- Indexes for table `tbl_ambu`
--
ALTER TABLE `tbl_ambu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_ambu_email_unique` (`email`);

--
-- Indexes for table `tbl_donor`
--
ALTER TABLE `tbl_donor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `tbl_fuel`
--
ALTER TABLE `tbl_fuel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_fuel_email_unique` (`email`);

--
-- Indexes for table `tbl_repair`
--
ALTER TABLE `tbl_repair`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_repair_email_unique` (`email`);

--
-- Indexes for table `tbl_req_ambu`
--
ALTER TABLE `tbl_req_ambu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_req_fuel`
--
ALTER TABLE `tbl_req_fuel`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `ambus`
--
ALTER TABLE `ambus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuel_loc`
--
ALTER TABLE `fuel_loc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rep_loc`
--
ALTER TABLE `rep_loc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rep_service`
--
ALTER TABLE `rep_service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ambu`
--
ALTER TABLE `tbl_ambu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_donor`
--
ALTER TABLE `tbl_donor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_fuel`
--
ALTER TABLE `tbl_fuel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_repair`
--
ALTER TABLE `tbl_repair`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_req_ambu`
--
ALTER TABLE `tbl_req_ambu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_req_fuel`
--
ALTER TABLE `tbl_req_fuel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
