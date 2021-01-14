-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 08:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u964064311_iass`
--

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `code` varchar(4) NOT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`id`, `name`, `code`, `city`, `state`) VALUES
(1, 'Chhatrapati Shivaji International Airport', 'BOM', 'Mumbai', 'Maharashtra'),
(2, 'Kempegowda International Airport', 'BLR', 'Bangalore', 'Karnataka '),
(3, 'Chennai International Airport', 'MAA', 'Chennai', 'Tamil Nadu '),
(4, 'Netaji Subhas Chandra Bose International Airport', 'CCU', 'Kolkata', 'West Bengal '),
(5, 'Chaudhary Charan Singh International Airport', 'LKO ', 'Lucknow', 'Uttar Pradesh '),
(6, 'Sri Guru Ram Dass Jee International Airport', 'ATQ', 'Amritsar', 'Punjab '),
(7, 'Visakhapatnam International Airport', 'VTZ', 'Visakhapatnam', 'Andhra Pradesh '),
(8, 'Kannur International Airport', 'CNN', 'Kannur', 'Kerala '),
(9, 'Surat International Airport', 'STV', 'Surat', 'Gujarat '),
(10, 'Devi Ahilya Bai Holkar Airport', 'IDR', 'Indore', 'Madhya Pradesh '),
(11, 'Cochin International Airport', 'COK ', 'Kochi', 'Kerala '),
(12, 'Sardar Vallabhbhai Patel International Airport', 'AMD', 'Ahmedabad', 'Gujarat '),
(13, 'Indira Gandhi International Airport', 'DEL', 'Delhi', 'Delhi '),
(14, 'Dabolim Airport', 'GOI', 'Goa', 'Goa '),
(15, 'Pune Airport', 'PNQ', 'Pune', 'Maharashtra '),
(16, 'Thiruvananthapuram International Airport', 'TRV', 'Thiruvananthapuram', 'Kerala '),
(17, 'Coimbatore International Airport', 'CJB', 'Coimbatore', 'Tamil Nadu '),
(18, 'Calicut International Airport', 'CCJ', 'Calicut', 'Kerala '),
(19, 'Biju Patnaik International Airport', 'BBI', 'Bhubaneswar', 'Odisha '),
(20, 'Lokpriya Gopinath Bordoloi International Airport', 'GAU', 'Guwahati', 'Assam '),
(21, 'Lal Bahadur Shastri International Airport', 'VNS', 'Varanasi', 'Uttar Pradesh '),
(22, 'Rajiv Gandhi International Airport', 'HYD', 'Hyderabad', 'Telangana '),
(23, 'Tiruchirappalli International Airport', 'TRZ', 'Tiruchirappalli', 'Tamil Nadu '),
(24, 'Dr. Babasaheb Ambedkar International Airport', 'NAG', 'Nagpur', 'Maharashtra '),
(25, 'Sheikhul Aalam International Airport', 'SXR', 'Srinagar', 'Jammu and Kashmir '),
(26, 'Imphal International Airport', 'IMF', 'Imphal', 'Meghalaya '),
(27, 'Jaipur International Airport', 'JAI', 'Jaipur', 'Rajasthan '),
(28, 'Madurai Airport', 'IXM', 'Madurai', 'Tamil Nadu '),
(29, 'Bagdogra International Airport', 'IXB', 'Siliguri', 'West Bengal '),
(30, 'Jay Prakash Narayan International Airport', 'PAT', 'Patna', 'Bihar '),
(31, 'Mangalore International Airport', 'IXE', 'Mangalore', 'Karnataka '),
(32, 'Chandigarh International Airport', 'IXC', 'Chandigarh', 'Chandigarh ');

-- --------------------------------------------------------

--
-- Table structure for table `customer_login`
--

CREATE TABLE `customer_login` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_login`
--

INSERT INTO `customer_login` (`id`, `username`, `mobile`, `email`, `password`) VALUES
(1, 'Danish Shaikh', '8655332519', 'shaikh.danish4444@gmail.com', '123456'),
(2, 'Shaikh Danish', '8655332518', 'shaikh.danish44444@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `id` int(11) NOT NULL,
  `plane_id` int(11) NOT NULL,
  `pilot_id` int(11) NOT NULL,
  `economy_fare` int(11) NOT NULL,
  `business_fare` int(11) NOT NULL,
  `departure_id` int(11) NOT NULL,
  `arrival_id` int(11) NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_date` date NOT NULL,
  `arrival_time` time NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`id`, `plane_id`, `pilot_id`, `economy_fare`, `business_fare`, `departure_id`, `arrival_id`, `departure_date`, `departure_time`, `arrival_date`, `arrival_time`, `status`) VALUES
(1, 1, 1, 300, 500, 1, 2, '2021-01-12', '21:21:00', '2021-01-12', '23:21:00', '0'),
(2, 2, 2, 3000, 5000, 3, 5, '2021-01-13', '07:27:00', '2021-01-13', '09:28:00', '0'),
(3, 1, 2, 5000, 6000, 1, 2, '2021-01-13', '17:46:00', '2021-01-13', '18:46:00', '0'),
(4, 1, 1, 4000, 5000, 6, 4, '2021-01-15', '03:39:00', '2021-01-15', '04:40:00', '0'),
(5, 2, 1, 6000, 7000, 1, 2, '2021-01-14', '00:44:00', '2021-01-14', '05:44:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `immigration`
--

CREATE TABLE `immigration` (
  `id` int(11) NOT NULL,
  `passport_number` varchar(20) NOT NULL,
  `location` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `immigration`
--

INSERT INTO `immigration` (`id`, `passport_number`, `location`, `datetime`) VALUES
(4, '451313541', 1, '2021-01-14 00:07:04'),
(5, '153411', 1, '2021-01-14 00:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `luggage`
--

CREATE TABLE `luggage` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `luggage`
--

INSERT INTO `luggage` (`id`, `ticket_id`, `weight`, `status`) VALUES
(1, 2, 30, 'collected'),
(2, 1, 20, 'veification');

-- --------------------------------------------------------

--
-- Table structure for table `management_login`
--

CREATE TABLE `management_login` (
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `management_login`
--

INSERT INTO `management_login` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pilot`
--

CREATE TABLE `pilot` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pilot`
--

INSERT INTO `pilot` (`id`, `name`, `contact`, `address`) VALUES
(1, 'Danish Shiakh', '8655332519', 'Mumbai Kurla'),
(2, 'Pilot 2', '4512135132', 'Mumbai\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `plane`
--

CREATE TABLE `plane` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plane`
--

INSERT INTO `plane` (`id`, `name`, `capacity`) VALUES
(1, 'Indigo', 200),
(2, 'AirIndia', 600);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `passenger_passport_number` varchar(20) NOT NULL,
  `passenger_details` text NOT NULL,
  `seat_number` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `stage` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `flight_id`, `customer_id`, `passenger_passport_number`, `passenger_details`, `seat_number`, `booking_date`, `booking_time`, `stage`) VALUES
(1, 1, 1, '451313541', '{\"name\":\"Danish Shaikh\",\"dob\":\"04 Jan 1999\",\"gender\":\"Male\",\"contact\":\"8655332519\",\"email\":\"shaikh.danish4444@gmail.com\",\"doi\":\"15 April 2018\",\"doe\":\"15 April 2025\"}', 1, '2021-01-11', '23:05:28', 'onboard'),
(2, 1, 1, '153411', '{\"name\":\"Danish Shaikh\",\"dob\":\"2021-12-31\",\"gender\":\"Male\",\"contact\":\"1214512315\",\"email\":\"121@mai.co\",\"doi\":\"2021-12-31\",\"doe\":\"2021-12-30\"}', 2, '2021-01-13', '00:00:02', 'onboard'),
(3, 2, 1, '54132153', '{\"name\":\"Danish Shaikh\",\"dob\":\"2021-01-05\",\"gender\":\"Female\",\"contact\":\"8655332519\",\"email\":\"shaikh.danish4444@gmail.com\",\"doi\":\"2021-01-31\",\"doe\":\"2021-12-01\"}', 1, '2021-01-13', '00:00:03', 'check-in'),
(4, 2, 1, '95411231', '{\"name\":\"Danish Shaikh\",\"dob\":\"2021-12-30\",\"gender\":\"Male\",\"contact\":\"4513135131\",\"email\":\"sa@ma.co\",\"doi\":\"2021-12-31\",\"doe\":\"2021-12-31\"}', 2, '2021-01-13', '04:14:47', 'check-in'),
(5, 2, 1, '45123151', '{\"name\":\"Pravin Shinde\",\"dob\":\"2021-12-31\",\"gender\":\"Male\",\"contact\":\"1234567890\",\"email\":\"email@mail.com\",\"doi\":\"2021-01-12\",\"doe\":\"2021-01-12\"}', 3, '2021-01-13', '12:45:30', 'check-in'),
(6, 3, 1, '451231', '{\"name\":\"Danish Shaikh\",\"dob\":\"2021-12-30\",\"gender\":\"Male\",\"contact\":\"8655332519\",\"email\":\"shaikh.danish444@ma.com\",\"doi\":\"2021-12-31\",\"doe\":\"2021-12-31\"}', 1, '2021-01-13', '12:48:14', 'check-in');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `immigration`
--
ALTER TABLE `immigration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `luggage`
--
ALTER TABLE `luggage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management_login`
--
ALTER TABLE `management_login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pilot`
--
ALTER TABLE `pilot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plane`
--
ALTER TABLE `plane`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `customer_login`
--
ALTER TABLE `customer_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `immigration`
--
ALTER TABLE `immigration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `luggage`
--
ALTER TABLE `luggage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pilot`
--
ALTER TABLE `pilot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plane`
--
ALTER TABLE `plane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
