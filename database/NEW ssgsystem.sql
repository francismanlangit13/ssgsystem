-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 01:42 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssgsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `user_id`, `activity_title`, `status`) VALUES
(1, 1, 'Instamurals 2023', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `announcement_body` text NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `activity_id`, `user_id`, `announcement_title`, `announcement_body`, `date_start`, `date_end`, `status`) VALUES
(1, 1, 1, 'Attention to all Bethelians', ' Naa tay activity for Intrams.', '2023-05-18 03:15:00', '2023-05-19 03:16:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `referencenumber` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_id`, `platform`, `amount`, `referencenumber`, `picture`, `date`, `status`) VALUES
(1, 4, 'Gcash', 240, '14568435355', 'user_20230503_232958.jpg', '2023-04-22 07:05:27', 'Approved'),
(2, 21, 'Cash', 300, '56546546', 'sdasdasd', '2023-05-20 22:19:05', 'Approved'),
(3, 21, 'Cash', 300, '56546546', 'sdasdasd', '2023-05-20 23:07:54', 'Approved'),
(4, 21, 'Cash', 300, '', '', '2023-05-20 23:45:22', ''),
(5, 21, 'Cash', 20, '', '', '2023-05-20 23:46:51', ''),
(6, 21, 'Cash', 20, '', '', '2023-05-20 23:49:03', ''),
(7, 21, 'Cash', 50, '', '', '2023-05-20 23:49:31', ''),
(8, 21, 'Cash', 1, '', '', '2023-05-20 23:49:45', ''),
(10, 4, 'Gcash', 10, '234234234', 'onlinepay_20230522_070116.jpg', '2023-05-22 07:32:57', 'Approved'),
(11, 4, 'Cash', 10, '', '', '2023-05-22 07:36:02', 'Approved'),
(12, 21, 'Cash', 10, '', '', '2023-05-22 07:38:21', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `payment_platform`
--

CREATE TABLE `payment_platform` (
  `platform_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_platform`
--

INSERT INTO `payment_platform` (`platform_id`, `user_id`, `name`, `photo`, `account_number`, `date`, `status`) VALUES
(1, 1, 'Gcash', 'image_20230521_143651.jpg', '09457664949', '2023-05-21 14:43:44', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `penalties`
--

CREATE TABLE `penalties` (
  `penalty_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `penalty_fee` double NOT NULL,
  `penalty_reason` varchar(255) NOT NULL,
  `penalty_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penalties`
--

INSERT INTO `penalties` (`penalty_id`, `user_id`, `penalty_fee`, `penalty_reason`, `penalty_date`) VALUES
(1, 4, 256.75, '', '2023-03-02 13:52:35'),
(2, 4, 500, '', '2023-04-10 08:43:32'),
(3, 4, 1000, '', '2023-05-01 15:54:33'),
(14, 21, 10, 'Francis Carlo', '2023-05-19 09:50:51'),
(15, 21, 250, 'Not Wearing Complete uniform', '2023-05-19 11:24:37'),
(16, 21, 10, 'sadasdsadasd', '2023-05-19 11:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `ssg_expenses`
--

CREATE TABLE `ssg_expenses` (
  `expense_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `or_number` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ssg_expenses`
--

INSERT INTO `ssg_expenses` (`expense_id`, `user_id`, `activity_id`, `type`, `purpose`, `amount`, `or_number`, `photo`, `date`, `status`) VALUES
(1, 1, 1, 'Materials', 'plywood', 374.75, '1686425', 'user_20230503_232958.jpg', '2023-04-17 15:30:15', ''),
(2, 1, 1, 'Supply', 'Gamit sa intrams', 175, '116542', 'user_20230503_232958.jpg', '2023-04-17 15:40:15', ''),
(3, 1, 1, 'Ballon', 'Buwan ng Wika 2024', 150, '12345435345', 'expense_20230521_163737.jpg', '2023-05-21 16:22:28', 'Archived');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `balance` double NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `date_deleted` datetime NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `user_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `mname`, `lname`, `suffix`, `gender`, `email`, `phone`, `password`, `student_id`, `level`, `balance`, `photo`, `date_added`, `deleted_by`, `date_deleted`, `user_type_id`, `user_status_id`) VALUES
(1, 'User', '', 'Admin', '', '', 'admin@gmail.com', '09457664949', '0192023a7bbd73250516f069df18b500', '', '', 250, 'user_20230504_101038.png', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 5, 1),
(2, 'Francis', '', 'Carlo', 'Jr', 'Male', 'franzcarl13@yahoo.com', '09457664949', 'da9c57995b3ecdbe8621f7f7fcf477ab', '', '', 0, 'user_20230504_101038.png', '0000-00-00 00:00:00', 'User Admin', '2023-05-09 15:10:34', 2, 1),
(3, 'new parent1', '', 'new', 'Jr', 'Male', 'franzcarl13@yahoo.com', '09457664949', 'da9c57995b3ecdbe8621f7f7fcf477ab', '', '', 0, 'user_20230504_104014.png', '2023-05-03 04:06:31', 'User Admin', '2023-05-09 15:12:41', 4, 1),
(4, 'Student', '', 'Franz', 'Sr', 'Male', 'franzcarl13@yahoo.com', '09457664949', '0192023a7bbd73250516f069df18b500', '2019300208', 'Grade 10', -20, 'user_20230504_140135.png', '2023-04-21 12:07:07', 'User Admin', '2023-05-09 15:13:33', 6, 1),
(5, 'new', '', 'admin', '', 'Male', 'admin1@gmail.com', '09457664949', 'f7b8bb95e0c1c5138688c03f2fce0b2a', '', '', 0, 'user_20230504_150919.png', '0000-00-00 00:00:00', 'User Admin', '2023-05-01 03:11:07', 5, 1),
(10, 'Francis Carlo', 'A', 'Manlangit', '', 'Male', 'franzcarl13@yahoo.com', '9457664949', 'edf44baefd0446161387123dda451842', '3-2019300208', 'Grade 12', 0, '', '2023-05-13 23:57:05', 'User Admin', '2023-05-16 16:00:32', 6, 3),
(11, 'Christine Mae', 'I', 'Balmadres', '', 'Female', 'christinemae@gmail.com', '9457664948', '9757a3ae2eee5925ce7db02aa692241e', '3-2019300207', 'Grade 11', 0, '', '2023-05-13 23:57:05', 'User Admin', '2023-05-16 16:00:35', 6, 3),
(12, 'Andrie', 'A', 'Manlangit', '', 'Male', 'andrie164@yahoo.com', '9452671554', 'edf44baefd0446161387123dda451842', '3-2019300208', '', 0, '', '2023-05-14 00:28:14', 'User Admin', '2023-05-14 00:29:45', 6, 3),
(13, 'Karl', 'S', 'Tare', '', 'Male', 'karltare@gmail.com', '9154625468', '9757a3ae2eee5925ce7db02aa692241e', '3-2019300207', '', 0, '', '2023-05-14 00:28:14', 'User Admin', '2023-05-14 00:29:49', 6, 3),
(14, 'Andrie', 'A', 'Manlangit', '', 'Male', 'andrie164@yahoo.com', '9452671554', 'edf44baefd0446161387123dda451842', '', '', 0, '', '2023-05-14 00:29:59', 'User Admin', '2023-05-14 00:30:04', 7, 3),
(15, 'Karl', 'S', 'Tare', '', 'Male', 'karltare@gmail.com', '9154625468', '9757a3ae2eee5925ce7db02aa692241e', '', '', 0, '', '2023-05-14 00:29:59', 'User Admin', '2023-05-14 00:30:07', 7, 3),
(16, 'Andrie', 'A', 'Manlangit', '', 'Male', 'andrie164@yahoo.com', '9452671554', 'edf44baefd0446161387123dda451842', '', '', 0, '', '2023-05-14 00:30:34', '', '0000-00-00 00:00:00', 7, 1),
(17, 'Karl', 'S', 'Tare', '', 'Male', 'karltare@gmail.com', '9154625468', '9757a3ae2eee5925ce7db02aa692241e', '', '', 0, '', '2023-05-14 00:30:34', '', '0000-00-00 00:00:00', 7, 1),
(18, 'Francis Carlo', 'A', 'Manlangit', '', 'Male', 'franzcarl13@yahoo.com', '9457664949', 'edf44baefd0446161387123dda451842', '3-2019300208', 'Grade 7', 0, '', '2023-05-16 16:00:47', 'User Admin', '2023-05-16 16:02:12', 6, 3),
(19, 'Christine Mae', 'I', 'Balmadres', '', 'Female', 'christinemae@gmail.com', '9457664948', '9757a3ae2eee5925ce7db02aa692241e', '3-2019300207', 'Grade 7', 0, '', '2023-05-16 16:00:47', 'User Admin', '2023-05-16 16:02:15', 6, 3),
(20, 'Francis Carlo', 'A', 'Manlangit', '', 'Male', 'franzcarl13@yahoo.com', '9457664949', 'edf44baefd0446161387123dda451842', '3-2019300208', 'Grade 11', -1, '', '2023-05-16 16:02:23', '', '0000-00-00 00:00:00', 6, 1),
(21, 'Christine Mae', 'I', 'Balmadres', '', 'Female', 'christinemae@gmail.com', '9457664948', '9757a3ae2eee5925ce7db02aa692241e', '3-2019300207', 'Grade 11', -10, '', '2023-05-16 16:02:23', '', '0000-00-00 00:00:00', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `user_status_id` int(11) NOT NULL,
  `user_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`user_status_id`, `user_status`) VALUES
(1, 'Active'),
(2, 'In Active'),
(3, 'Archive');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type`) VALUES
(1, 'Admin'),
(2, 'President'),
(3, 'Vice President'),
(4, 'Secretary'),
(5, 'Treasurer'),
(6, 'Student'),
(7, 'Parent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `payment_platform`
--
ALTER TABLE `payment_platform`
  ADD PRIMARY KEY (`platform_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `penalties`
--
ALTER TABLE `penalties`
  ADD PRIMARY KEY (`penalty_id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `ssg_expenses`
--
ALTER TABLE `ssg_expenses`
  ADD PRIMARY KEY (`expense_id`),
  ADD KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_type_id` (`user_type_id`,`user_status_id`) USING BTREE,
  ADD KEY `user_status_id` (`user_status_id`) USING BTREE;

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`user_status_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment_platform`
--
ALTER TABLE `payment_platform`
  MODIFY `platform_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penalties`
--
ALTER TABLE `penalties`
  MODIFY `penalty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ssg_expenses`
--
ALTER TABLE `ssg_expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `user_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `announcement_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `payment_platform`
--
ALTER TABLE `payment_platform`
  ADD CONSTRAINT `payment_platform_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `penalties`
--
ALTER TABLE `penalties`
  ADD CONSTRAINT `penalties_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `ssg_expenses`
--
ALTER TABLE `ssg_expenses`
  ADD CONSTRAINT `ssg_expenses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `ssg_expenses_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`user_type_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`user_status_id`) REFERENCES `user_status` (`user_status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
