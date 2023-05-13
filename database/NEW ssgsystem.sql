-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 04:16 PM
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
-- Table structure for table `fines_transaction`
--

CREATE TABLE `fines_transaction` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fines_fee` double NOT NULL,
  `fines_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fines_transaction`
--

INSERT INTO `fines_transaction` (`transaction_id`, `user_id`, `fines_fee`, `fines_date`) VALUES
(1, 4, 256.75, '2023-03-02 13:52:35'),
(2, 4, 500, '2023-04-10 08:43:32'),
(3, 4, 1000, '2023-05-01 15:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `referencenumber` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `platform`, `referencenumber`, `picture`, `date`, `status`) VALUES
(1, 4, 'Gcash', '14568435355', 'user_20230503_232958.jpg', '2023-05-03 15:24:45', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `qrcode`
--

CREATE TABLE `qrcode` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `amount` varchar(255) NOT NULL,
  `or_number` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ssg_expenses`
--

INSERT INTO `ssg_expenses` (`expense_id`, `user_id`, `activity_id`, `type`, `purpose`, `amount`, `or_number`, `photo`, `date`) VALUES
(1, 1, 1, 'Materials', 'plywood', '374.75', '1686425', 'user_20230503_232958.jpg', '2023-04-17 15:30:15'),
(2, 1, 1, 'Supply', 'Gamit sa intrams', '175', '116542', 'user_20230503_232958.jpg', '2023-04-17 15:40:15');

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
  `penalty` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL,
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

INSERT INTO `user` (`user_id`, `fname`, `mname`, `lname`, `suffix`, `gender`, `email`, `phone`, `password`, `student_id`, `level`, `penalty`, `balance`, `photo`, `date_added`, `deleted_by`, `date_deleted`, `user_type_id`, `user_status_id`) VALUES
(1, 'User', '', 'Admin', '', '', 'admin@gmail.com', '09457664949', '0192023a7bbd73250516f069df18b500', '', '', '', '', 'user_20230504_101038.png', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 1, 1),
(2, 'Francis', '', 'Carlo', 'Jr', 'Male', 'franzcarl13@yahoo.com', '09457664949', 'da9c57995b3ecdbe8621f7f7fcf477ab', '', '', '', '', 'user_20230504_101038.png', '0000-00-00 00:00:00', 'User Admin', '2023-05-09 15:10:34', 2, 1),
(3, 'new parent1', '', 'new', 'Jr', 'Male', 'franzcarl13@yahoo.com', '09457664949', 'da9c57995b3ecdbe8621f7f7fcf477ab', '', '', '', '', 'user_20230504_104014.png', '2023-05-03 04:06:31', 'User Admin', '2023-05-09 15:12:41', 4, 1),
(4, 'Student', '', 'Franz', 'Sr', 'Male', 'franzcarl13@yahoo.com', '09457664949', 'da9c57995b3ecdbe8621f7f7fcf477ab', '2019300208', 'Grade 10', '', '', 'user_20230504_140135.png', '2023-04-21 12:07:07', 'User Admin', '2023-05-09 15:13:33', 6, 1),
(5, 'new', '', 'admin', '', 'Male', 'admin1@gmail.com', '09457664949', 'f7b8bb95e0c1c5138688c03f2fce0b2a', '', '', '', '', 'user_20230504_150919.png', '0000-00-00 00:00:00', 'User Admin', '2023-05-01 03:11:07', 5, 1);

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
-- Indexes for table `fines_transaction`
--
ALTER TABLE `fines_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `fines_transaction`
--
ALTER TABLE `fines_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ssg_expenses`
--
ALTER TABLE `ssg_expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `fines_transaction`
--
ALTER TABLE `fines_transaction`
  ADD CONSTRAINT `fines_transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `qrcode`
--
ALTER TABLE `qrcode`
  ADD CONSTRAINT `qrcode_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

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
