-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2021 at 12:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `valeurdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_master` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `admin_name`, `password`, `email`, `is_master`) VALUES
(5, 'harryadmin', '$2y$10$2fi40pPDHdW5BAZuhnahfOsxnOehigppv/HpiThCVBoscxkIk45zi', 'hvalentinow@gmail.com', 1),
(6, 'valeuradmin', '$2y$10$to7QA1Ah5rc/6/NnmwzOwOMqrrATUnPaxofcoMqBj7puBr/GN63Xm', 'Valeurrush@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `photography_projects`
--

CREATE TABLE `photography_projects` (
  `project_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL DEFAULT 'Project ',
  `image_pointer` varchar(64) NOT NULL DEFAULT '',
  `horizontal` int(11) NOT NULL DEFAULT 50,
  `vertical` int(11) NOT NULL DEFAULT 50,
  `date` date DEFAULT NULL,
  `order_index` int(11) NOT NULL,
  `number_of_photos` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photography_projects`
--

INSERT INTO `photography_projects` (`project_id`, `name`, `image_pointer`, `horizontal`, `vertical`, `date`, `order_index`, `number_of_photos`) VALUES
(1, 'Project Vava', 'vava', 50, 50, '2021-03-08', 1, 4),
(2, 'Project Football', 'football', 50, 50, '2021-03-08', 2, 3),
(3, 'Project City', 'city', 50, 50, '2021-03-08', 3, 5),
(4, 'Project Streets', 'streets', 50, 50, '2021-03-08', 4, 6),
(5, 'Project Smoke', 'smoke', 50, 50, '2021-03-08', 5, 3),
(6, 'Project 6', 'project_06', 50, 50, '2021-03-10', 6, 3),
(7, 'Project 7', 'project_07', 50, 50, '2021-03-10', 7, 12),
(8, 'Project 8', 'project_08', 50, 50, '2021-03-10', 8, 12),
(9, 'Project 9', 'project_09', 50, 50, '2021-03-10', 9, 7),
(10, 'Project 10', 'project_10', 50, 50, '2021-03-10', 10, 3),
(11, 'Project 11', 'project_11', 50, 50, '2021-03-10', 11, 4),
(12, 'Project 12', 'project_12', 50, 50, '2021-03-10', 12, 3),
(13, 'Project 13', 'project_13', 50, 50, '2021-03-10', 13, 4),
(14, 'Project 14', 'project_14', 50, 50, '2021-03-10', 14, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photography_projects`
--
ALTER TABLE `photography_projects`
  ADD PRIMARY KEY (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `photography_projects`
--
ALTER TABLE `photography_projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
