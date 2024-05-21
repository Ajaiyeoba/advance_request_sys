-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 12:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cash_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`id`, `name`, `email`, `password`) VALUES
(1, 'mhmhee@gmail.com', 'umhar', '12345678'),
(2, 'brymo', 'brymo@gmail.com', '$2y$10$pKhUkyrNPwkF3hnBaB6djuEEjitXz9wytPwMK7jqS3F'),
(3, 'Ajaiyeoba Ajibola', 'yoo@gmail.com', 'zrcjtgXnkBSv984'),
(4, 'dayo', 'ajaiyeobanjoh@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `id` int(11) NOT NULL,
  `hod_name` varchar(40) NOT NULL,
  `department` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`id`, `hod_name`, `department`, `password`) VALUES
(1, 'Adegbile', 'Computer Science', 'kEUyjgfXNPQp4DV'),
(2, 'Adegbile', 'Computer Science', '3mYJpbmfMkBx6su'),
(3, 'Adekunle', 'Animal Health', 'UqAkUsJSW3uiADM'),
(4, 'akin', 'Computer Science', 'g9jX98XjWXqkXgD');

-- --------------------------------------------------------

--
-- Table structure for table `staff_requests`
--

CREATE TABLE `staff_requests` (
  `id` int(11) NOT NULL,
  `amount` int(100) NOT NULL,
  `staff_id` varchar(100) NOT NULL,
  `request` varchar(250) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff_requests`
--

INSERT INTO `staff_requests` (`id`, `amount`, `staff_id`, `request`, `status`, `date`) VALUES
(1, 13000, 'ah212', 'food stuff and data', 'rejected', '2024-05-09'),
(2, 123000, '121', 'new sound system', 'confirmed', '2024-05-10'),
(3, 34000, '121', 'fresh breeze', 'Pending', '2024-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `department` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `staff_id`, `name`, `email`, `department`, `password`) VALUES
(1, 'nd12', 'john', 'johnajibolajaiyeoba@gmail.com', 'Computer Science', 'qBGUr6h9tLS3BQ5'),
(2, 'ah212', 'aminatayodele', 'olonitolastephen28@gmail.com', 'Computer Science', 'Pm2vFSmFQmErh7s'),
(3, '121', 'Oluyemi', 'olu@gmail.com', 'Animal Health', 'RNqw56gdp5G2Bnx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_requests`
--
ALTER TABLE `staff_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_requests`
--
ALTER TABLE `staff_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
