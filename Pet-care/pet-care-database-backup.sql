-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2025 at 12:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet-care`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_table`
--

CREATE TABLE `appointment_table` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Pet_type` text NOT NULL,
  `Pet_name` text NOT NULL,
  `Date` date NOT NULL,
  `Service_type` text NOT NULL,
  `Comments` text NOT NULL,
  `Status` text NOT NULL,
  `Price` int(11) NOT NULL,
  `Payment_Type` text NOT NULL,
  `Username` text NOT NULL,
  `E_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_table`
--

INSERT INTO `appointment_table` (`id`, `Name`, `Pet_type`, `Pet_name`, `Date`, `Service_type`, `Comments`, `Status`, `Price`, `Payment_Type`, `Username`, `E_Date`) VALUES
(1, 'Jayesh', 'Cat', 'Jonny', '2025-05-10', 'Service 2', 'Comment', 'Pending', 0, '0', '', NULL),
(4, 'Jayesh Maheshwari', 'Dog', 'Jackkky', '2025-06-18', 'Service 2', 'DESSSSSSS', 'Pending', 0, '0', '', NULL),
(5, 'Jayesh Maheshwari', 'Cat', 'Skuizi', '2025-12-12', 'Service 2', 'JAOSJDsao', 'Pending', 0, '0', '', NULL),
(6, 'Jayesh Maheshwari', 'Dog', 'The JOnny The Dog', '2025-08-05', 'Service 3', 'TTHTHT', 'Pending', 0, '0', '', NULL),
(7, 'Jayesh Maheshwari', 'Dog', 'New Dog', '2025-05-05', 'Service 2', 'hjfsa', 'Pending', 750, '0', '', NULL),
(8, 'Jayesh Maheshwari', 'Dog', 'NEw New dog', '2025-05-05', 'Service 1', 'HAgas', 'Cancelled', 500, 'UPI', 'Jeizu', NULL),
(9, 'Jayesh Maheshwari', 'Cat', 'New CAt', '2025-06-05', 'Service 1', 'dadasdasd', 'Pending', 500, 'Cash', 'Jeizu', NULL),
(10, 'Jayesh Maheshwari', 'Cat', 'Noddy the cat', '2025-05-05', 'House Sitting', 'this cat eats a lot', 'Pending', 8000, 'Cash', 'Jeizu', '2025-05-20'),
(11, 'Jack Maheshwari', 'Dog', 'NODDY', '2025-04-25', 'House Sitting', 'He eat a lot', 'Pending', 2500, 'Cash', 'Jeizu', '2025-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`id`, `username`, `name`, `password`) VALUES
(1, 'Jeizu', 'Jack Maheshwari', '$2y$10$WANS1HJe4yxMzYlNdhVp0uGBvo0qIBdoVlbrSspmfO5/3g9kmCj5C'),
(3, 'ABC', 'Jayesh', '$2y$10$wKK1r4zFwU9HNbVqaWqNX.CzwYaDLgE6LNQ4OdsjUNo5SmqKyhP9S'),
(6, 'NewUser', 'Naruto', '$2y$10$7EHTpKdLRBkqLCj2A8evzeTTDZb.YV9fqFRU91gKOjjzF/7Otd2dq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_table`
--
ALTER TABLE `appointment_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment_table`
--
ALTER TABLE `appointment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
