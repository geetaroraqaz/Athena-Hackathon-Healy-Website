-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2021 at 11:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healy`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `doctor_id` INT(11) NOT NULL,
  `patient_name` varchar(20) NOT NULL,
  `symptoms` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `meet_link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(1, 'test001', 'test1@gmail.com', '$2y$10$K9V3okKM6Bkbwi8ByqRAF.sY1sdvIDjaAU4yZYIbJj1EPt3sCITrq', 0),
(2, 'test002', 'test2@gmail.com', '$2y$10$Dt9ZCAchXk1KeL0NRwxA6.fXo2XA./hTZgZyi927B01RDu/1I.sGa', 0),
(3, 'test003', 'test3@gmail.com', '$2y$10$w0dkdWkXvKiPp9SQwIsEzuzTR6JHsMGmagP8kSc6Pq5J3tT0Fg3P6', 0),
(4, 'test004', 'test5@gmail.com', '$2y$10$QgD5gNxB0K3gzXNUl3b4gurwIO2.8tFF17r51UmAPl9CDugpK6syy', 0),
(5, 'doctor_1', 'doctor1@gmail.com', '$2y$10$QzlrpusNCbY1bYk3C9ZN/uY1ikSEZS1E9REFsyf6ijC8L7Vm4EHOS', 1),
(6, 'doctor_2', 'doctor2@gmail.com', '$2y$10$lVVGn6pSjlNZYxM6h83sFO.gH/MlwBWil7.mStyLNBmQpVr850Tji', 1),
(7, 'doctor_3', 'doctor3@gmail.com', '$2y$10$yfPQurIkcKi74zC6QSx8zuU1pNwH.lEA2sCHvq7J2UX4/ZXJr8RYC', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
