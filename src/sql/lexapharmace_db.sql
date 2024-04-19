-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 11:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lexapharmace_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `last_inserted`
--

CREATE TABLE `last_inserted` (
  `id` int(24) NOT NULL,
  `md_id` int(24) NOT NULL,
  `medical_name` varchar(255) NOT NULL,
  `medical_dosage` varchar(255) NOT NULL,
  `expiring_date` varchar(24) NOT NULL,
  `added_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `total_price` varchar(90) NOT NULL,
  `utoken` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medics`
--

CREATE TABLE `medics` (
  `id` int(23) NOT NULL,
  `medical_category` varchar(90) NOT NULL DEFAULT 'NULL',
  `medical_name` varchar(90) NOT NULL DEFAULT 'NULL',
  `medical_dosage` varchar(5) NOT NULL DEFAULT 'NULL',
  `medical_lebel` varchar(255) NOT NULL DEFAULT 'NULL',
  `expiring_date` varchar(255) NOT NULL DEFAULT 'NULL',
  `utoken` varchar(255) NOT NULL DEFAULT 'NULL',
  `added_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medics`
--

INSERT INTO `medics` (`id`, `medical_category`, `medical_name`, `medical_dosage`, `medical_lebel`, `expiring_date`, `utoken`, `added_date`) VALUES
(1, 'Pain Relief', 'paracetam', '24', 'NULL', '2025-04-27', '16618739fc9a3c4.25671431', '2024-04-19 21:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `id` int(23) NOT NULL,
  `medical_name` varchar(240) DEFAULT NULL,
  `dose` varchar(70) DEFAULT NULL,
  `total_price` varchar(25) DEFAULT NULL,
  `utoken` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_setting`
--

CREATE TABLE `system_setting` (
  `id` int(23) NOT NULL,
  `system_name` varchar(100) NOT NULL DEFAULT 'NULL',
  `default_profile` varchar(5) NOT NULL DEFAULT 'true',
  `custome_profile` varchar(200) NOT NULL DEFAULT 'NULL',
  `default_logo` varchar(5) NOT NULL DEFAULT 'true',
  `custome_logo` varchar(230) NOT NULL DEFAULT 'NULL',
  `about_content` varchar(755) NOT NULL DEFAULT 'NULL',
  `physical_address` varchar(233) NOT NULL DEFAULT 'NULL',
  `utoken` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_setting`
--

INSERT INTO `system_setting` (`id`, `system_name`, `default_profile`, `custome_profile`, `default_logo`, `custome_logo`, `about_content`, `physical_address`, `utoken`) VALUES
(1, 'Some', 'true', 'NULL', 'true', 'NULL', 'about content', 'Tabata', '16618739fc9a3c4.25671431');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(23) NOT NULL,
  `name` varchar(24) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL DEFAULT 'NULL',
  `utoken` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `profile`, `utoken`) VALUES
(1, 'Hamisi Faraji Hamisi', '0715500626', 'hamisi@gmail.com', '$2y$10$fdqNX/c/HYFs3vnN1cB97uIB7FhADY.lyEr6hiP9LbcDymuALa7RC', '../assets/server/16622c7964d73e2.28611979.hamisi faraji hamisi', '16618739fc9a3c4.25671431');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `last_inserted`
--
ALTER TABLE `last_inserted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medics`
--
ALTER TABLE `medics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_setting`
--
ALTER TABLE `system_setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `default_profile` (`default_profile`,`default_logo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utoken` (`utoken`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `last_inserted`
--
ALTER TABLE `last_inserted`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medics`
--
ALTER TABLE `medics`
  MODIFY `id` int(23) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` int(23) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_setting`
--
ALTER TABLE `system_setting`
  MODIFY `id` int(23) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(23) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
