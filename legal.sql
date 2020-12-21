-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 10:39 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `legal`
--

CREATE TABLE `legal` (
  `leg_id` int(11) NOT NULL,
  `leg_loc_id` int(5) NOT NULL,
  `leg_reg_type` varchar(15) NOT NULL,
  `leg_modif_contract` varchar(30) NOT NULL,
  `leg_taxs` varchar(15) NOT NULL,
  `leg_comm_reg` varchar(15) NOT NULL,
  `leg_vat` varchar(15) NOT NULL,
  `leg_vat_no` varchar(15) NOT NULL,
  `leg_follower` int(5) NOT NULL COMMENT 'user',
  `leg_license_status` varchar(15) NOT NULL,
  `leg_start_rent_date` varchar(60) NOT NULL,
  `leg_end_rant_date` varchar(60) NOT NULL,
  `leg_rent_price` int(6) NOT NULL,
  `leg_elect_status` varchar(15) NOT NULL,
  `leg_reales_taxs` varchar(15) NOT NULL,
  `leg_observation` varchar(100) NOT NULL,
  `leg_branch_no` varchar(12) NOT NULL,
  `leg_owner_name` int(50) NOT NULL,
  `leg_owner_number` int(11) NOT NULL,
  `leg_contract_copy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `legal`
--
ALTER TABLE `legal`
  ADD PRIMARY KEY (`leg_id`),
  ADD KEY `leg_loc_id` (`leg_loc_id`),
  ADD KEY `leg_follower` (`leg_follower`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `legal`
--
ALTER TABLE `legal`
  MODIFY `leg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `legal`
--
ALTER TABLE `legal`
  ADD CONSTRAINT `legal_ibfk_1` FOREIGN KEY (`leg_loc_id`) REFERENCES `locations` (`loc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `legal_ibfk_2` FOREIGN KEY (`leg_follower`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
