-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 06:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lu-food-hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `db_id` int(20) NOT NULL,
  `db_username` varchar(100) NOT NULL,
  `db_email` varchar(100) NOT NULL,
  `db_mobile` varchar(100) NOT NULL,
  `db_password` varchar(100) NOT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`db_id`, `db_username`, `db_email`, `db_mobile`, `db_password`, `code`) VALUES
(85, 'apu', 'cse_2012020341@lus.ac.bd', '01725291718', '@Admin1234', NULL),
(106, 'apue', 'lu.velocity@gmail.com', '01725291714', '$2y$10$xvssNPIRHP.Uz/tWJwKfYOD91/Qknjy2QWlq5rEQ3dAL7M7gTXTYC', NULL),
(112, 'apd', 'apudeb2000@gmail.com', '01725291718', '$2y$10$Cy6V0xONUTR18IXrfrOZReFCXILuEkoeaoABnHyqONxerSjf2.flq', NULL),
(131, 'Arpita Roy', 'kawserahmedpk2017@gmail.com', '01750160850', '$2y$10$xyeHvyQLgFIBCrAfVPp1TuwLON1Hkt5V7vm.uSBcgHoLY96WdObQ.', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`db_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `db_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
