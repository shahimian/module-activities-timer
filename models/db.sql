-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2019-06-15 11:53:25
-- Server version: 5.7.25-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `sit_activities`
--

CREATE TABLE `sit_activities` (
  `activity_id` int(11) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` text COLLATE utf8_persian_ci,
  `value` int(11) DEFAULT NULL,
  `iteration` int(11) DEFAULT NULL,
  `break` int(11) DEFAULT NULL,
  `total_iteration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sit_activities_scenario`
--

CREATE TABLE `sit_activities_scenario` (
  `scenario_id` int(11) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` text COLLATE utf8_persian_ci,
  `scenario` text COLLATE utf8_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------
--
-- Indexes for table `sit_activities`
--
ALTER TABLE `sit_activities`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `sit_activities_scenario`
--
ALTER TABLE `sit_activities_scenario`
  ADD PRIMARY KEY (`scenario_id`),
  ADD KEY `user` (`user_id`);

--
-- AUTO_INCREMENT for table `sit_activities`
--
ALTER TABLE `sit_activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sit_activities_scenario`
--
ALTER TABLE `sit_activities_scenario`
  MODIFY `scenario_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for table `sit_activities`
--
ALTER TABLE `sit_activities`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;
