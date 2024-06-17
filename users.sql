-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2024 at 05:57 AM
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
-- Database: `loginphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(255) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `reg_date`) VALUES
(3, 'test1', '$2y$10$qhAEusaymxMSjKLhgoklyuj1fB3xdkqcQj3mQQUXwIOCs1Ww4lsuu', '2024-06-16 22:08:07'),
(4, 'test2', '$2y$10$3ytFUnU.bD/7246CDVxqWev3znighS.7twNMLQpD9hlHzp0ZC4I2O', '2024-06-17 09:32:04'),
(5, 'test3', '$2y$10$zeD6XsCd4p2t5WKiAcFczuaGO06yo/Jb63PBcJnHI3X1pa3A.RcZu', '2024-06-17 10:34:48'),
(6, 'test4', '$2y$10$o8Fv46askF2FJglVkxhNs.a6SUcMdLoKWEn/kOEaWB/Ece4RLLQm.', '2024-06-17 10:52:11'),
(7, 'test', '$2y$10$xH1hCmwniIne851gRbfiT.evZgDXfNtLOmfhMIEZFq/bOcvyPV5AW', '2024-06-17 10:56:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
