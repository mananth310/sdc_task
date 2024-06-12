-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2024 at 06:59 AM
-- Server version: 8.3.0
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdc_class`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `id` int NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`id`, `student_name`, `username`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Ss', 'ss', 1, '2024-06-12 06:17:54', NULL, NULL),
(2, 'ANANTH', 'ananth@vcew', 1, '2024-06-12 06:28:17', NULL, NULL),
(3, 'ANANTH', 'ananth@vcew', 1, '2024-06-12 06:28:52', NULL, NULL),
(4, 'ANANTH', 'ananth@vcew', 1, '2024-06-12 06:28:54', NULL, NULL),
(5, 'ANANTH', '123', 1, '2024-06-12 06:29:02', NULL, NULL),
(6, 'ANANTH', '123', 1, '2024-06-12 06:31:29', NULL, NULL),
(7, 'ANANTH', '123', 1, '2024-06-12 06:32:48', NULL, NULL),
(8, 'ANANTH', '123', 1, '2024-06-12 06:32:55', NULL, NULL),
(9, 'ANANTH', '123', 1, '2024-06-12 06:32:57', NULL, NULL),
(10, 'ANANTH', '123', 1, '2024-06-12 06:32:57', NULL, NULL),
(11, 'A', '1', 1, '2024-06-12 06:33:23', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
