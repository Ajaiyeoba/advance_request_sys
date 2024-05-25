-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 04:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
(4, 'dayo', 'ajaiyeobanjoh@gmail.com', '12345678'),
(5, 'Hannah', 'Hannah23@gmail.com', '222222');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `id` int(11) NOT NULL,
  `hod_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`id`, `hod_name`, `department`, `password`) VALUES
(1, 'Dr TOPE', 'Computer Science', '123456'),
(3, 'flex dr', 'Animal Health', '123456'),
(4, 'dr flex', 'SLT', '123456'),
(5, 'Iyanuoluwapo', 'Fishries', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `staff_requests`
--

CREATE TABLE `staff_requests` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `request` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_requests`
--

INSERT INTO `staff_requests` (`id`, `staff_id`, `request`, `amount`, `bank`, `number`, `date`, `name`, `status`, `department`) VALUES
(7, 'ahpt123', 'album promotion', '40000.00', 'ayra starr', '1234567890', '2024-06-06 23:00:00', 'kuda', 'approved', 'Animal Health'),
(8, 'ah1234', 'album promotion party', '40000.00', 'ayra starr', '2345678900', '2024-06-13 23:00:00', 'opay', 'rejected', 'Animal Health'),
(9, 'csc100', 'internet ', '75000.00', 'John Ajibola', '1234567890', '2024-06-04 23:00:00', 'opay', 'approved', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `s_feedback`
--

CREATE TABLE `s_feedback` (
  `id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `staff_id` varchar(100) NOT NULL,
  `receipt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `s_feedback`
--

INSERT INTO `s_feedback` (`id`, `comment`, `staff_id`, `receipt`) VALUES
(1, 'purchased and used the pfizer vaccines for the animals', 'ah212', 'cng.PNG'),
(2, 'Wheat offal from my mill', 'ah212', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `staff_id`, `name`, `email`, `department`, `password`) VALUES
(4, 'ahpt123', 'Hannah', 'Obinna@gmail.com', 'Computer Science', '1234567'),
(5, 'ah1234', 'ayra starr', 'ayra@gmail.com', 'Animal Health', '123456'),
(6, 'csc100', 'John Ajibola', 'john@gmail.com', 'Computer Science', '1234asd');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department` (`department`);

--
-- Indexes for table `staff_requests`
--
ALTER TABLE `staff_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department` (`department`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `s_feedback`
--
ALTER TABLE `s_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_id` (`staff_id`),
  ADD KEY `department` (`department`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff_requests`
--
ALTER TABLE `staff_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `s_feedback`
--
ALTER TABLE `s_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `staff_requests`
--
ALTER TABLE `staff_requests`
  ADD CONSTRAINT `staff_requests_ibfk_1` FOREIGN KEY (`department`) REFERENCES `dept` (`department`),
  ADD CONSTRAINT `staff_requests_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `users` (`staff_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`department`) REFERENCES `dept` (`department`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
