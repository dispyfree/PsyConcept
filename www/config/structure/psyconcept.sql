-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2017 at 09:40 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psyconcept`
--

-- --------------------------------------------------------

--
-- Table structure for table `characteristic`
--

CREATE TABLE `characteristic` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `criterion_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `criterion_category`
--

CREATE TABLE `criterion_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `file_name` int(11) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `norm`
--

CREATE TABLE `norm` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `applicability_bottom_age_bound` int(11) NOT NULL,
  `applicability_upper_age_bound` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `round`
--

CREATE TABLE `round` (
  `id` int(11) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `round_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_characteristic`
--

CREATE TABLE `task_characteristic` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `characteristic_id` int(11) NOT NULL,
  `value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `short_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `short_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `license_costs` int(11) NOT NULL,
  `duration` double NOT NULL,
  `required_personnel` double NOT NULL,
  `applicability_bottom_age_bound` int(11) NOT NULL,
  `applicability_upper_age_bound` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_acquirement`
--

CREATE TABLE `test_acquirement` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `round_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_application`
--

CREATE TABLE `test_application` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_characteristic`
--

CREATE TABLE `test_characteristic` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `characteristic_id` int(11) NOT NULL,
  `value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_package`
--

CREATE TABLE `test_package` (
  `id` int(11) NOT NULL,
  `parent_test_id` int(11) NOT NULL,
  `child_test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characteristic`
--
ALTER TABLE `characteristic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criterion_category_id` (`criterion_category_id`);

--
-- Indexes for table `criterion_category`
--
ALTER TABLE `criterion_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `norm`
--
ALTER TABLE `norm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `round`
--
ALTER TABLE `round`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `round_id` (`round_id`);

--
-- Indexes for table `task_characteristic`
--
ALTER TABLE `task_characteristic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`,`characteristic_id`),
  ADD KEY `characteristic_id` (`characteristic_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_acquirement`
--
ALTER TABLE `test_acquirement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`,`team_id`),
  ADD KEY `round_id` (`round_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `test_application`
--
ALTER TABLE `test_application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`,`test_id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `test_characteristic`
--
ALTER TABLE `test_characteristic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`,`characteristic_id`),
  ADD KEY `characteristic_id` (`characteristic_id`);

--
-- Indexes for table `test_package`
--
ALTER TABLE `test_package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_test_id` (`parent_test_id`,`child_test_id`),
  ADD KEY `child_test_id` (`child_test_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characteristic`
--
ALTER TABLE `characteristic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `criterion_category`
--
ALTER TABLE `criterion_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `norm`
--
ALTER TABLE `norm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `round`
--
ALTER TABLE `round`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task_characteristic`
--
ALTER TABLE `task_characteristic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test_acquirement`
--
ALTER TABLE `test_acquirement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test_application`
--
ALTER TABLE `test_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test_characteristic`
--
ALTER TABLE `test_characteristic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test_package`
--
ALTER TABLE `test_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `characteristic`
--
ALTER TABLE `characteristic`
  ADD CONSTRAINT `characteristic_ibfk_1` FOREIGN KEY (`criterion_category_id`) REFERENCES `criterion_category` (`id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`round_id`) REFERENCES `round` (`id`);

--
-- Constraints for table `task_characteristic`
--
ALTER TABLE `task_characteristic`
  ADD CONSTRAINT `task_characteristic_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`),
  ADD CONSTRAINT `task_characteristic_ibfk_2` FOREIGN KEY (`characteristic_id`) REFERENCES `characteristic` (`id`);

--
-- Constraints for table `test_acquirement`
--
ALTER TABLE `test_acquirement`
  ADD CONSTRAINT `test_acquirement_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`),
  ADD CONSTRAINT `test_acquirement_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `test_acquirement_ibfk_3` FOREIGN KEY (`round_id`) REFERENCES `round` (`id`);

--
-- Constraints for table `test_application`
--
ALTER TABLE `test_application`
  ADD CONSTRAINT `test_application_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `test_application_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`),
  ADD CONSTRAINT `test_application_ibfk_3` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`);

--
-- Constraints for table `test_characteristic`
--
ALTER TABLE `test_characteristic`
  ADD CONSTRAINT `test_characteristic_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`),
  ADD CONSTRAINT `test_characteristic_ibfk_2` FOREIGN KEY (`characteristic_id`) REFERENCES `characteristic` (`id`);

--
-- Constraints for table `test_package`
--
ALTER TABLE `test_package`
  ADD CONSTRAINT `test_package_ibfk_1` FOREIGN KEY (`parent_test_id`) REFERENCES `test` (`id`),
  ADD CONSTRAINT `test_package_ibfk_2` FOREIGN KEY (`child_test_id`) REFERENCES `test` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
