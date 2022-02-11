-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Jan 16, 2022 at 04:19 PM
-- Server version: 8.0.1-dmr
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_management`
--
CREATE DATABASE IF NOT EXISTS `product_management` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `product_management`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `room` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Male',
  `birthday` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '01/01/1990',
  `avatar` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/images/a.jpg',
  `id` int(200) NOT NULL,
  `free` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `type`, `name`, `room`, `gender`, `birthday`, `avatar`, `id`, `free`) VALUES
('admin123', '$2y$10$PIlNM89EMneUJPBYc.qDS.vCeHKiUhU1pppaG85e4O7iU3XPhpqBW', 'admin', 'can', 'boss', 'Male', '01/01/1990', '/images/boss.png', 5, 1),
('ngcan123', '$2y$10$dAE42s5s9FHreWZ1LVcZqO3lS0gRahHNCiBB.nRZBdPX8hxxuvJ6S', 'qly', 'cẩn', 'room 3', 'male', '26/12/2021', '/images/a.jpg', 24, 1),
('tructruc', '$2y$10$wAY8BSQiIBrmN8RXOarUkONKG9RcrK1g61VQaAYSVjyG6BNez3eWS', 'nv', 'truc', 'room 3', 'female', '26/12/2021', '/images/a.jpg', 28, 1),
('tranthanh', '$2y$10$su2W4l2G4qT862eOzIcrM.ou3kJNL2iwlL6oXuJP0.XfGsM2RP2iu', 'qly', 'thanh', 'room 2', 'female', '14/05/2021', '/images/a.jpg', 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(200) NOT NULL DEFAULT '0',
  `manager` int(200) NOT NULL,
  `id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`name`, `mota`, `count`, `manager`, `id`) VALUES
('room 3', 'phong 3', 100, 24, 1),
('room 2', 'phong 2', 200, 30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `title` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `time` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(2000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '""',
  `idnv` int(200) NOT NULL,
  `room` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`title`, `mota`, `id`, `time`, `file`, `idnv`, `room`, `status`) VALUES
('task 1', 'test task', 1, '29/01/2022', '\"\"', 28, '1', 'In progress'),
('task 2', 'task 2', 2, '25/01/2022', '\"\"', 28, '1', 'New');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
