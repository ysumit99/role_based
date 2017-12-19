-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2017 at 12:07 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_based`
--

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `user_id`, `password`) VALUES
(1, 'test_manager', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'test_manager_2', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 'test_manager_3', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `project_id` varchar(40) NOT NULL,
  `assigned` int(1) NOT NULL,
  `manager` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_id`, `assigned`, `manager`) VALUES
(1, 'test_project', 1, 'test_manager'),
(2, 'test_project2', 1, 'test_manager_2'),
(3, 'test_project3', 1, 'test_manager'),
(4, 'test_project4', 1, 'test_manager');

-- --------------------------------------------------------

--
-- Table structure for table `project_assignment`
--

CREATE TABLE `project_assignment` (
  `id` int(11) NOT NULL,
  `project_id` varchar(40) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `manager` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_assignment`
--

INSERT INTO `project_assignment` (`id`, `project_id`, `user_id`, `manager`) VALUES
(1, 'test_project', 'test_user', 'test_manager'),
(2, 'test_project', 'test_user_3', 'test_manager'),
(7, 'test_project2', 'test_user_2', 'test_manager_2'),
(5, 'test_project4', 'test_user_4', 'test_manager'),
(6, 'test_project3', 'test_user_3', 'test_manager');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `registered_user_id` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `manager` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `registered_user_id`, `password`, `manager`) VALUES
(1, 'test_user', '81dc9bdb52d04dc20036dbd8313ed055', 'test_manager'),
(2, 'test_user_2', '81dc9bdb52d04dc20036dbd8313ed055', 'test_manager_2'),
(3, 'test_user_3', '81dc9bdb52d04dc20036dbd8313ed055', 'test_manager'),
(4, 'test_user_4', '81dc9bdb52d04dc20036dbd8313ed055', 'test_manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_assignment`
--
ALTER TABLE `project_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `project_assignment`
--
ALTER TABLE `project_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
