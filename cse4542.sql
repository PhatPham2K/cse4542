-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 09:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse454`
--

-- --------------------------------------------------------

--
-- Table structure for table `cse4542`
--

CREATE TABLE `cse4542` (
  `id` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dateOfRegister` datetime NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cse4542`
--

INSERT INTO `cse4542` (`id`, `email`, `password`, `fullName`, `phoneNumber`, `address`, `dateOfRegister`, `type`, `status`) VALUES
(3, 'dsfgasd@dfsdf', '123', '123', '0916144799', '228 Long Nguyên', '2023-11-17 14:45:00', 'admin', 'activated'),
(5, 'hoangphat19102000@gmail.com', '123', 'S2342342', '0916144799', '228 Long Nguyên', '2023-11-16 16:00:00', 'admin', 'activated'),
(7, 'hoangphat19102000@gmail.com', 'phat', 'phat', '0916144799', '228 Long Nguyên', '2023-11-17 14:17:00', 'author', 'activated'),
(8, 'Test@gmail.com', '123', 'ha chi cao', '1234567890', 'Binh Duong', '2023-11-17 14:20:00', 'admin', 'activated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cse4542`
--
ALTER TABLE `cse4542`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cse4542`
--
ALTER TABLE `cse4542`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
