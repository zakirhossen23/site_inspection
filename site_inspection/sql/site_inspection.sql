-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 05:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site_inspection`
--

-- --------------------------------------------------------

--
-- Table structure for table `inspections`
--

CREATE TABLE `inspections` (
  `ID` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `site_name` varchar(200) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `post_code` varchar(200) NOT NULL,
  `site_description` varchar(200) NOT NULL,
  `equipment` varchar(200) NOT NULL,
  `hour` varchar(200) NOT NULL,
  `expire` date DEFAULT NULL,
  `total_budget` varchar(255) NOT NULL,
  `inspectior_name` varchar(255) NOT NULL,
  `qoute` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inspections`
--

INSERT INTO `inspections` (`ID`, `client_name`, `date`, `site_name`, `address1`, `address2`, `title`, `post_code`, `site_description`, `equipment`, `hour`, `expire`, `total_budget`, `inspectior_name`, `qoute`) VALUES
(1, 'test', '2022-07-21', 'testing', 'test site', 'werwe', '', 'Goes Description', 'High', 'ewr werwefd gdf', '11:53', '2022-09-06', '34', 'wer', '2022-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `username`, `email`, `gender`, `role`, `password`) VALUES
(2, 'manager', 'manager', 'manager@gmail.com', 'manager@gmail.com', 'Male', 'Manager', '12345'),
(3, 'site', 'inspector', 'site_inspector@gmail.com', 'site_inspector@gmail.com', 'Male', 'Site_inspector', '12345'),
(26, 'admin', 'admin', 'admin@gmail.com', 'admin@gmail.com', 'Male', 'Admin', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inspections`
--
ALTER TABLE `inspections`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `@` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inspections`
--
ALTER TABLE `inspections`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
