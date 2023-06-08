-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 08:02 AM
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
(1, 1, 'Instamurals 2023', 'Active'),
(2, 1, 'Wellness Week', 'Active');

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
(1, 1, 1, 'Attention to all Bethelians', ' Naa tay activity for Intrams.', '2023-05-18 03:15:00', '2023-05-19 03:16:00', 'Active'),
(2, 1, 1, 'adasdada111', 'asdasdasd ', '2023-06-07 21:47:00', '2023-06-09 21:47:00', 'Active'),
(3, 2, 1, 'Gooooooooo', ' rertr', '2023-06-06 08:00:00', '2023-06-09 17:59:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 2, 'Gcash', 270, '5006289283841', 'onlinepay_20230601_101610.jpg', '2023-06-01 10:38:27', 'Approved'),
(2, 10, 'Cash', 180, '', '', '2023-06-02 12:03:00', 'Approved'),
(3, 2, 'Gcash', 410, '122334', 'onlinepay_20230605_142033.jpg', '2023-06-05 14:22:15', 'Approved');

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
(1, 6, 'Gcash', 'image_20230521_143651.jpg', '09457664949', '2023-05-21 14:43:44', 'Active');

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
(1, 2, 270, 'Not wearing ID', '2023-06-01 10:11:09'),
(2, 2, 150, 'Incomplete Uniform', '2023-06-02 09:10:59'),
(3, 8, 60, 'No ID', '2023-06-02 10:13:27'),
(4, 10, 150, 'Incomplete Uniform', '2023-06-02 11:48:40'),
(5, 10, 10, 'No ID', '2023-06-02 11:51:41'),
(6, 10, 20, 'late', '2023-06-02 11:52:19'),
(7, 2, 60, 'No ID', '2023-06-05 14:16:05'),
(8, 2, 200, 'Incomplete Uniform', '2023-06-05 14:16:37');

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
(1, 21, 2, 'Transportation', 'Purchasing Tinapa', 12, '2242858372', 'expense_20230608_080356.png', '2023-06-08 08:03:56', 'Active');

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
(1, 'User', '', 'Admin', '', 'Male', 'admin@gmail.com', '09347637483', '0192023a7bbd73250516f069df18b500', '', '', 0, 'user_20230605_125424.jpg', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 1, 1),
(2, 'Mark Lester', '', 'Summinguit', '', 'Male', 'student@gmail.com', '09545454545', '0192023a7bbd73250516f069df18b500', '21024851', 'Grade 10', 0, 'user_20230601_095924.png', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 6, 1),
(3, 'Vince', '', 'Mutya', '', 'Male', 'president@gmail.com', '09656764646', '0192023a7bbd73250516f069df18b500', '', '', 0, 'user_20230601_100129.png', '0000-00-00 00:00:00', 'User Admin', '2023-06-02 11:09:24', 2, 3),
(4, 'Angelo', '', 'Nobleza', '', 'Male', 'vicepresident@gmail.com', '09267464616', '0192023a7bbd73250516f069df18b500', '', '', 0, 'user_20230601_100217.png', '0000-00-00 00:00:00', 'User Admin', '2023-06-02 11:09:10', 3, 3),
(5, 'Kate', '', 'Ozaraga', 'II', 'Female', 'secretary@gmail.com', '09355474316', '0192023a7bbd73250516f069df18b500', '', '', 0, 'user_20230601_100301.png', '0000-00-00 00:00:00', 'User Admin', '2023-06-02 11:08:19', 4, 3),
(6, 'Mike', '', 'Cuadra', 'Sr', 'Male', 'treasurer@gmail.com', '09756531646', '0192023a7bbd73250516f069df18b500', '', '', 0, 'user_20230601_100340.png', '0000-00-00 00:00:00', 'User Admin', '2023-06-02 11:08:44', 5, 3),
(7, 'Jovito', 'Darug', 'Ebarat', '', 'Male', 'parent@gmail.com', '09846564646', '0192023a7bbd73250516f069df18b500', '', '', 0, 'user_20230601_132159.png', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 7, 1),
(8, 'Markie', 'Akin', 'Rone', '', 'Male', 'Rone@gmail.com', '9230903200', 'cd3de8bef2c8599ea13c8bfced1587f0', '12340000', 'Grade 11', 60, '', '2023-06-02 10:11:58', '', '0000-00-00 00:00:00', 6, 1),
(9, 'Marky', '', 'Rone', '', 'Male', 'marky@gmail.com', '9356447755', 'd84e0e878a8f37e61b1afc8be8f8065d', '12350000', 'Grade 11', 0, '', '2023-06-02 10:11:58', '', '0000-00-00 00:00:00', 6, 1),
(10, 'James', 'Humana', 'Jiee', 'III', 'Male', 'Jiee@gmail.com', '9104848585', '6e73c67af36178b9d0ff000932720f83', '12360000', 'Grade 11', 0, '', '2023-06-02 10:11:58', '', '0000-00-00 00:00:00', 6, 1),
(11, 'Jericho', 'Agoy', 'Tero', '', 'Male', 'Tero@gmail.com', '9656272747', 'aa0fb246fb1daa4110e37de059b0eb11', '12370000', 'Grade 11', 0, '', '2023-06-02 10:11:58', '', '0000-00-00 00:00:00', 6, 1),
(12, 'Jeick', 'Uy', 'Ebarat', 'jr.', 'Male', 'Ebarat@gmail.com', '9073737357', 'cb1ab00eb4bf2d5ca3f32cee8a1b84dd', '12380000', 'Grade 11', 0, '', '2023-06-02 10:11:58', '', '0000-00-00 00:00:00', 6, 1),
(13, 'Kent', 'Yu', 'Ebarat', '', 'Male', 'Ebarat@gmail.com', '9567373737', '069171304c9e1a1a60d870a4d059ec20', '12390000', 'Grade 11', 0, '', '2023-06-02 10:11:58', '', '0000-00-00 00:00:00', 6, 1),
(14, 'Killer', 'Guest', 'Bara', '', 'Female', 'Bara@gmail.com', '9106451319', 'a7ced08c24d10c7b5846d4779b2643a7', '12400000', 'Grade 11', 0, '', '2023-06-02 10:11:58', '', '0000-00-00 00:00:00', 6, 1),
(15, 'Science', '', 'Bah', '', 'Female', 'science@gmail.com', '9546161738', 'eed54097722c83cb47cbbafd1e51e704', '12410000', 'Grade 11', 0, '', '2023-06-02 10:11:58', '', '0000-00-00 00:00:00', 6, 1),
(16, 'Math', 'Gum', 'Bikil', '', 'Male', 'Bikil@gmail.com', '9374748747', '6a9212be4c4ff2a89bc5be57b1e67b34', '12420000', 'Grade 11', 0, '', '2023-06-02 10:11:58', '', '0000-00-00 00:00:00', 6, 1),
(17, 'English', 'Gyu', 'Bukbok', '', 'Female', 'Bukbok@gmail.com', '9837363646', '7f0f6d4d12067f4e5a1c80b31207a880', '12430000', 'Grade 11', 0, '', '2023-06-02 10:11:58', '', '0000-00-00 00:00:00', 6, 1),
(18, 'Marlon', 'Exit', 'Bajolo', 'V', 'Male', 'suminguitmarklester@gmail.com', '09825356242', '8055278ae6f23b5b9bd0e8b826dd7f5e', '', '', 0, 'user_20230602_112427.jpg', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 2, 1),
(19, 'Angel', 'Acuna', 'Bual', '', 'Female', 'mark.rone.20@gmail.com', '09765433565', 'ec9fbfe8005c98ccf49a839d969ca91f', '', '', 0, 'user_20230602_113016.jpg', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 4, 1),
(20, 'Brianna', 'Cajote', 'Ebarat', '', 'Female', 'mark.rone.2000@gmail.com', '09346554337', '7843fe3a32bbba041df608711eb671ce', '', '', 0, 'user_20230602_113210.jpg', '0000-00-00 00:00:00', 'User Admin', '2023-06-02 11:38:20', 5, 3),
(21, 'Brianna', 'Cajote', 'Ebarat', '', 'Female', 'buslonremar25@gmail.com', '09725353662', '11a2f37df3de91505624d4ebe19520fb', '', '', 0, 'user_20230602_113943.jpg', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 5, 1),
(22, 'Nicole', 'Daza', 'Palma', '', 'Female', 'nicole@23@gmail.com', '9564921098', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-04 19:37:48', '', '0000-00-00 00:00:00', 7, 1),
(23, 'Angelica', 'Lemuel', 'Ortega', '', 'Female', 'angela99@gmail.com', '9418878704', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-04 19:37:48', '', '0000-00-00 00:00:00', 7, 1),
(24, 'Mary Joy', 'Ruiz', 'Molina', '', 'Female', 'jm08@gmail.com', '9369465130', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-04 19:37:48', '', '0000-00-00 00:00:00', 7, 1),
(25, 'Mariel', 'Morales', 'Serrano', '', 'Female', 'mariel27@gmail.com', '9825762384', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-04 19:37:48', '', '0000-00-00 00:00:00', 7, 1),
(26, 'Jasmine', 'Calvo', 'Chavez', '', 'Female', 'jasmine@gmail.com', '9735452846', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-04 19:37:48', '', '0000-00-00 00:00:00', 7, 1),
(27, 'Michelle', 'Rubio', 'Briones', '', 'Female', 'michelle9@gmail.com', '9464257452', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-04 19:37:48', '', '0000-00-00 00:00:00', 7, 1),
(28, 'Kyla', 'Delgado', 'Medina', '', 'Female', 'kyla65@gmail.com', '9036457253', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-04 19:37:48', '', '0000-00-00 00:00:00', 7, 1),
(29, 'Kimberly', 'Lopez', 'Tamayo', '', 'Female', 'kimberly20@gmail.com', '9475537352', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-04 19:37:48', '', '0000-00-00 00:00:00', 7, 1),
(30, 'Jenny', 'Serrano', 'Abad', '', 'Female', 'jenny22@gmail.com', '9251143807', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-04 19:37:48', '', '0000-00-00 00:00:00', 7, 1),
(31, 'Mary Grace', 'Gomez', 'Villamor', '', 'Female', 'mary grace24@gmail.com', '9362563547', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-04 19:37:48', '', '0000-00-00 00:00:00', 7, 1),
(32, 'Mark', '', 'Rone', '', 'Male', 'suminguitmatilde@gmail.com', '09876766565', 'ccc1bf971531f26202686857e71844cc', '', '', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 2, 1),
(33, 'Markie', 'Akin', 'Uya', '', 'Male', 'uya@gmail.com', '09354768193', '1880a52f95cb0ed7d3ef4d631ea449a8', '234500000', 'Grade 12', 0, '', '2023-06-05 13:52:02', '', '0000-00-00 00:00:00', 6, 1),
(34, 'Marky', '', 'Chong', '', 'Male', 'chong@gmail.com', '09558585858', '3b4630c4c2cc385080f01b414d01a7e3', '234600000', 'Grade 12', 0, '', '2023-06-05 13:52:02', '', '0000-00-00 00:00:00', 6, 1),
(35, 'James', 'Humana', 'Ching', 'III', 'Male', 'ching@gjail.com', '09713385858', '4e907f65b2bae5c9699d44a3e813c962', '234700000', 'Grade 12', 0, '', '2023-06-05 13:52:02', '', '0000-00-00 00:00:00', 6, 1),
(36, 'Jericho', 'Agoy', 'Chang', '', 'Male', 'chang@gjeil.com', '09623143535', 'a4fecbbb8e8c89add1eb8734d5f0f20b', '234800000', 'Grade 12', 0, '', '2023-06-05 13:52:02', '', '0000-00-00 00:00:00', 6, 1),
(37, 'Jeick', 'Uy', 'Cheng', 'jr.', 'Male', 'cheng@gjeil.com', '09274747484', '12b85417830987760c48e9fb2aa31d31', '234900000', 'Grade 12', 0, '', '2023-06-05 13:52:02', '', '0000-00-00 00:00:00', 6, 1),
(38, 'Kent', 'Yu', 'Tong', '', 'Male', 'tong@gkeil.com', '09284742553', '007ed8f8d509aa850e5e0ef174f84f34', '235000000', 'Grade 12', 0, '', '2023-06-05 13:52:02', '', '0000-00-00 00:00:00', 6, 1),
(39, 'Killer', 'Guest', 'Ting', '', 'Female', 'ting@gkiil.com', '09571857284', '7347e11d0ba18eb29a5b9713b2e4d1b4', '235100000', 'Grade 12', 0, '', '2023-06-05 13:52:02', '', '0000-00-00 00:00:00', 6, 1),
(40, 'Science', 'Giss', 'Tong', '', 'Female', 'stong@gscil.com', '09274658275', '400719541cf7cfa3bf4fdcecdc0cf318', '235200000', 'Grade 12', 0, '', '2023-06-05 13:52:02', '', '0000-00-00 00:00:00', 6, 1),
(41, 'Math', 'Gum', 'Tiki', '', 'Male', 'tiki@gmail.com', '09746575847', 'd799c12568d6e869674f8ff1e87776b7', '235300000', 'Grade 12', 0, '', '2023-06-05 13:52:02', '', '0000-00-00 00:00:00', 6, 1),
(42, 'English', 'Gyu', 'Tuko', '', 'Female', 'tuko@genil.com', '09274658264', '7c8de1264610e94c8c5b462e98630f15', '235400000', 'Grade 12', 0, '', '2023-06-05 13:52:02', '', '0000-00-00 00:00:00', 6, 1),
(43, 'Susan', 'Alvarez', 'Estrada', '', 'Female', 'susan07@gmail.com', '9028254397', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-05 13:56:32', '', '0000-00-00 00:00:00', 7, 1),
(44, 'Helen', 'Diaz', 'Robles', '', 'Female', 'helen6@gmail.com', '9236218939', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-05 13:56:32', '', '0000-00-00 00:00:00', 7, 1),
(45, 'Adam', 'Romero', 'Ortiz', '', 'Male', 'adam123@gmail.com', '9367328703', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-05 13:56:32', '', '0000-00-00 00:00:00', 7, 1),
(46, 'John Carlo', 'Ramos', 'Acosta', '', 'Male', 'john carlo12@gmail.com', '9352345076', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-05 13:56:32', '', '0000-00-00 00:00:00', 7, 1),
(47, 'Angelo', 'Castillo', 'Sison', '', 'Male', 'angelo18@gmail.com', '9617394660', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-05 13:56:32', '', '0000-00-00 00:00:00', 7, 1),
(48, 'Francis Jay', 'Galindo', 'Castro', '', 'Male', 'francis jay26@gmail.com', '9256156750', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-05 13:56:32', '', '0000-00-00 00:00:00', 7, 1),
(49, 'James ', 'Lozano', 'Villegas', 'Jr.', 'Male', 'james25@gmail.com', '9236745450', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-05 13:56:32', '', '0000-00-00 00:00:00', 7, 1),
(50, 'Christian', 'Ramirez', 'De La Cruz', '', 'Male', 'christian15@gmail.com', '9363557232', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-05 13:56:32', '', '0000-00-00 00:00:00', 7, 1),
(51, 'Ashley', 'Navarro', 'Tan', '', 'Female', 'ashley02@gmail.com', '9465689601', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-05 13:56:32', '', '0000-00-00 00:00:00', 7, 1),
(52, 'Nataniel', 'Dominguez', 'Lim', 'Sr.', 'Male', 'nataniel05@gmail.com', '9646756324', '25d55ad283aa400af464c76d713c07ad', '', '', 0, '', '2023-06-05 13:56:32', '', '0000-00-00 00:00:00', 7, 1),
(53, 'Jhona', '', 'Suminguit', '', 'Female', 'suminguitjhonamell7@gmail.com', '09736363646', '87fd19e705ff7e130120676c2eec9ae8', '', '', 0, '', '0000-00-00 00:00:00', 'User Admin', '2023-06-08 13:01:34', 8, 3),
(54, 'Jhona', '', 'Mell', '', 'Female', 'cuba@gmail.com', '09574362535', '1bf984e49d4e8db5a1e37988a2f68a52', '', '', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 8, 1);

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
  `user_status_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_status_id`, `user_type`) VALUES
(1, 1, 'Admin'),
(2, 1, 'President'),
(3, 1, 'Vice President'),
(4, 1, 'Secretary'),
(5, 1, 'Treasurer'),
(6, 1, 'Student'),
(7, 1, 'Parent'),
(8, 3, 'P.I.O.T');

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
-- Indexes for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  ADD KEY `user_id` (`user_id`);

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
  ADD PRIMARY KEY (`user_type_id`),
  ADD KEY `user_status_id` (`user_status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_platform`
--
ALTER TABLE `payment_platform`
  MODIFY `platform_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penalties`
--
ALTER TABLE `penalties`
  MODIFY `penalty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ssg_expenses`
--
ALTER TABLE `ssg_expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `user_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Constraints for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  ADD CONSTRAINT `password_reset_temp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

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

--
-- Constraints for table `user_type`
--
ALTER TABLE `user_type`
  ADD CONSTRAINT `user_type_ibfk_1` FOREIGN KEY (`user_status_id`) REFERENCES `user_status` (`user_status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
