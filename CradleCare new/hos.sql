-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2020 at 11:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hos`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `appointment_id` varchar(50) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `a_date` varchar(50) NOT NULL,
  `a_time` varchar(50) NOT NULL,
  `patient_email` varchar(100) NOT NULL,
  `patient_phone` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_update` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `appointment_id`, `patient_name`, `dept`, `doctor`, `a_date`, `a_time`, `patient_email`, `patient_phone`, `note`, `status`, `date_update`) VALUES
(1, '1', 'Anu Oluwafemi', 'Doctor', 'Gbolahan Adegoke', '20/10/2020', '12:30AM', 'sam@gmail.com', '09088391843', 'Doctor consultation', 'Active', ''),
(2, '2', 'Aweda Afolabi', 'Lab', 'Anu Oluwafemi', '27/10/2020', '11:09 AM', 'text@gmail.com', '08069159748', 'Maleria Test', 'Active', ''),
(4, '3', 'Peter Obiebe', 'Pharmacy', 'Anu Oluwafemi', '28/10/2020', '2:12 PM', 'afolabihabeeb1@gmail.com', '08069159748', 'Buy Drugs', 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `chat_group`
--
-- Error reading structure for table hos.chat_group: #1932 - Table 'hos.chat_group' doesn't exist in engine
-- Error reading data for table hos.chat_group: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `hos`.`chat_group`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `datechecker`
--

CREATE TABLE `datechecker` (
  `id` int(11) NOT NULL,
  `currentDate` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datechecker`
--

INSERT INTO `datechecker` (`id`, `currentDate`) VALUES
(1, '2020-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `diagnose_patients`
--

CREATE TABLE `diagnose_patients` (
  `id` int(11) NOT NULL,
  `d_id` varchar(11) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `symptoms` varchar(500) NOT NULL,
  `note` varchar(2000) NOT NULL,
  `diagnose_disease` varchar(500) DEFAULT NULL,
  `prescription` varchar(500) NOT NULL,
  `treatment_charges` decimal(13,2) NOT NULL,
  `due_payment` decimal(13,2) NOT NULL,
  `partial_payment` decimal(13,2) NOT NULL DEFAULT '0.00',
  `total_amount_paid` decimal(13,2) NOT NULL DEFAULT '0.00',
  `doctor` varchar(100) NOT NULL,
  `diagnose_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnose_patients`
--

INSERT INTO `diagnose_patients` (`id`, `d_id`, `patient_id`, `symptoms`, `note`, `diagnose_disease`, `prescription`, `treatment_charges`, `due_payment`, `partial_payment`, `total_amount_paid`, `doctor`, `diagnose_date`) VALUES
(1, 'J53T45', '2020_681979', 'Swollen abdomen,', 'take it', 'malaria', 'vitamin', '2000.00', '0.00', '0.00', '2000.00', 'Habeeb Bello', '2020-06-22 15:08:45'),
(2, 'X3CM2', '2020_681979', 'High Tempreture,  Loss of appetite,', 'i dont know it', 'Coro virus', 'coro drug', '5000.00', '4000.00', '1000.00', '1000.00', 'Habeeb Bello', '2020-06-22 17:53:02'),
(3, 'T4F511', '2020_9822696', 'High Tempreture, fever', 'daily', 'cold', 'vimi', '1000.00', '0.00', '0.00', '1000.00', 'Habeeb Bello', '2020-06-23 15:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `item` varchar(250) NOT NULL,
  `p_from` varchar(250) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `p_by` varchar(250) NOT NULL,
  `date_created` varchar(10) NOT NULL,
  `paid_by` varchar(50) NOT NULL,
  `month` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `item`, `p_from`, `amount`, `p_by`, `date_created`, `paid_by`, `month`) VALUES
(1, 'Equipment', 'Tuyil', '500', 'Tosin', '2020-06-26', 'Cash', '11/2020'),
(2, 'Drugs for phamacy', 'One Step', '200', 'Gbolahan', '2020-06-26', 'Cash', ''),
(3, 'Scan Machine', 'TIFF medical equipment company', '60000', 'Mr Tope', '29/11/2020', 'Cash', '11/2020');

-- --------------------------------------------------------

--
-- Table structure for table `group_chat`
--

CREATE TABLE `group_chat` (
  `message_id` int(11) NOT NULL,
  `from_user_id` varchar(100) NOT NULL,
  `to_userid` text NOT NULL,
  `sender_name` varchar(250) NOT NULL,
  `group_id` varchar(100) NOT NULL,
  `chat_in` text NOT NULL,
  `chat_out` text NOT NULL,
  `chat_time` varchar(100) NOT NULL,
  `chat_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_chat`
--

INSERT INTO `group_chat` (`message_id`, `from_user_id`, `to_userid`, `sender_name`, `group_id`, `chat_in`, `chat_out`, `chat_time`, `chat_date`) VALUES
(1, 'ADMIN-001', 'DC-001', 'Gbolahan Adegoke', '1603461034-Capture.png', '', 'I welcome all Standfirm staff!', '3:31PM', '5/11/2020'),
(2, 'DC-001', 'ADMIN-001', 'Anu', '1604580689-Aburo Mi 20180625_153716.jpg', '', 'Thanks Developer', '3:40PM', '5/11/2020'),
(3, 'ADMIN-001', 'DC-001', 'Gbolahan Adegoke', '1603461034-Capture.png', '', 'Still testing', '12:11:54pm', '17/11/2020'),
(4, 'ADMIN-001', 'DC-001', 'Gbolahan Adegoke', '1603461034-Capture.png', '', 'Testing mood', '12:16:34pm', '17/11/2020'),
(20, 'ADMIN-001', 'DC-001', 'Gbolahan Adegoke', '1603461034-Capture.png', '', 'Hello', '01:08:36pm', '17/11/2020'),
(21, 'ADMIN-001', 'DC-001', '', '1603461034-Capture.png', '', 'gooo', '01:20:26pm', '17/11/2020'),
(22, 'ADMIN-001', 'DC-001', '', '1603461034-Capture.png', '', 'Go', '01:23:12pm', '17/11/2020'),
(58, 'ADMIN-001', 'DC-001', 'Gbolahan Adegoke', '1603461034-Capture.png', '', 'Good to go', '11:56:40am', '19/11/2020'),
(59, 'ADMIN-001', 'DC-001', 'Gbolahan Adegoke', '1603461034-Capture.png', '', 'Output now', '12:23:02pm', '19/11/2020'),
(60, 'ADMIN-001', 'DC-001', 'Gbolahan Adegoke', '1603461034-Capture.png', '', 'Output now', '12:23:07pm', '19/11/2020'),
(61, 'ADMIN-001', 'DC-001', 'Gbolahan Adegoke', '1603461034-Capture.png', '', 'Whats holding you', '12:26:34pm', '19/11/2020'),
(62, 'ADMIN-001', 'DC-001', 'Gbolahan Adegoke', '1603461034-Capture.png', '', 'I welcome all Standfirm staff!', '12:27:54pm', '19/11/2020'),
(63, 'ADMIN-001', 'DC-001', 'Gbolahan Adegoke', '1603461034-Capture.png', '', 'Got you', '12:30:45pm', '19/11/2020'),
(64, 'ADMIN-001', 'DC-001', 'Gbolahan Adegoke', '1603461034-Capture.png', '', 'Wow wow!', '12:32:15pm', '19/11/2020'),
(65, 'ADMIN-001', 'DC-001', 'Gbolahan Adegoke', '1603461034-Capture.png', '', 'wow', '12:34:27pm', '19/11/2020'),
(67, 'ADMIN-001', 'DC-001', 'Gbolahan Adegoke', '1603461034-Capture.png', '', 'NAN', '12:37:39pm', '19/11/2020'),
(68, 'ADMIN-001', 'DC-001', 'Gbolahan Adegoke', '1603461034-Capture.png', '', 'Why not showing', '12:38:13pm', '19/11/2020'),
(69, 'ADMIN-001', 'DC-001', 'Gbolahan Adegoke', '1603461034-Capture.png', '', '????', '12:39:06pm', '19/11/2020'),
(70, 'ADMIN-001', 'DC-001', 'Gbolahan Adegoke', '1603461034-Capture.png', '', 'Great work', '12:40:02pm', '19/11/2020'),
(71, 'ADMIN-001', 'DC-001', 'GBolahan', '1603461034-Capture.png', 'Testing Refresh', 'Testing Refresh', '5:00AM', '5/4/2020'),
(72, 'DC-001', 'DC-001', 'Anu Oluwafemi', '1604580689-Aburo Mi 20180625_153716.jpg', '', 'Hello', '01:34:07pm', '19/11/2020'),
(73, 'DC-001', 'ADMIN-001', 'Anu Oluwafemi', '1604580689-Aburo Mi 20180625_153716.jpg', '', 'Why again', '01:37:54pm', '19/11/2020'),
(74, 'DC-001', 'ADMIN-001', 'Anu Oluwafemi', '1604580689-Aburo Mi 20180625_153716.jpg', '', 'Better', '01:39:55pm', '19/11/2020'),
(75, '', '', '', '', '', '', '04:01:45pm', '20/11/2020'),
(76, '', '', '', '', '', '', '04:01:46pm', '20/11/2020'),
(77, '', '', '', '', '', '', '04:01:46pm', '20/11/2020'),
(78, '', '', '', '', '', '', '04:01:46pm', '20/11/2020');

-- --------------------------------------------------------

--
-- Table structure for table `group_member`
--

CREATE TABLE `group_member` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `group_id` varchar(50) NOT NULL,
  `join_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inv`
--

CREATE TABLE `inv` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `patient` varchar(250) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `paid_amount` varchar(100) NOT NULL,
  `total_amount` varchar(100) NOT NULL,
  `invoice_date` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tax` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv`
--

INSERT INTO `inv` (`id`, `invoice_id`, `patient_id`, `patient`, `payment_type`, `paid_amount`, `total_amount`, `invoice_date`, `due_date`, `email`, `tax`, `address`) VALUES
(1, '2', '2020_681979', 'Gbolahan Adegoke', 'Medical Bills', '2500', '2500', '12/07/2020', '12/07/2020', 'Samadex5050@gmail.com', '200', 'Ilorin, Kwara State');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--
-- Error reading structure for table hos.invoice: #1932 - Table 'hos.invoice' doesn't exist in engine
-- Error reading data for table hos.invoice: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `hos`.`invoice`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `item_1` varchar(100) NOT NULL,
  `description_1` varchar(150) NOT NULL,
  `unit_cost_1` varchar(50) NOT NULL,
  `qty_1` varchar(50) NOT NULL,
  `amount_1` varchar(50) NOT NULL,
  `item_2` varchar(250) NOT NULL,
  `description_2` varchar(250) NOT NULL,
  `unit_cost_2` varchar(250) NOT NULL,
  `qty_2` varchar(250) NOT NULL,
  `amount_2` varchar(50) NOT NULL,
  `item_3` varchar(250) NOT NULL,
  `description_3` varchar(250) NOT NULL,
  `unit_cost_3` varchar(50) NOT NULL,
  `qty_3` varchar(50) NOT NULL,
  `amount_3` varchar(50) NOT NULL,
  `other_info` varchar(250) NOT NULL,
  `tax` varchar(50) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `total_amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_detail`
--

INSERT INTO `invoice_detail` (`id`, `invoice_id`, `item_1`, `description_1`, `unit_cost_1`, `qty_1`, `amount_1`, `item_2`, `description_2`, `unit_cost_2`, `qty_2`, `amount_2`, `item_3`, `description_3`, `unit_cost_3`, `qty_3`, `amount_3`, `other_info`, `tax`, `discount`, `total_amount`) VALUES
(1, '2', 'Medical Bills', 'medical', '2000', '1', '2000.00', 'Drugs', 'drug', '1200', '2', '2400.00', 'Lab Test', 'test', '3000', '1', '3000.00', 'All bill must be paid in full', '20.00', '', '7380.00');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `test` text NOT NULL,
  `resultW` text NOT NULL,
  `attendant` text NOT NULL,
  `result` text,
  `category` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `month` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id`, `patient_id`, `name`, `test`, `resultW`, `attendant`, `result`, `category`, `date_created`, `month`) VALUES
(6, '32', 'Adegoke Gbolahan', 'Maleria', 'GBolahan', 'Cross', 'Scan', '1605800464-cross1.jpg', '0000-00-00 00:00:00', ''),
(7, '32', 'Adegoke Gbolahan', 'Maleria', 'Cross', 'GBolahan', '1605800646-cross1.jpg', 'Scan', '0000-00-00 00:00:00', ''),
(8, '32', 'Adegoke Gbolahan', 'Maleria', 'Cross', 'GBolahan', '1605800739-cross1.jpg', 'Scan', '', ''),
(9, '32', 'Anu Oluwafemi', 'Maleria', 'Please check the results for any complecations', 'Adegoke S.G', '1605867730-41383013-high-resolution-abstract-background.jpg', 'X-Ray', '20/11/2020', '');

-- --------------------------------------------------------

--
-- Table structure for table `labpayment`
--

CREATE TABLE `labpayment` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `test` varchar(255) NOT NULL,
  `total_amount_paid` decimal(13,2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labpayment`
--

INSERT INTO `labpayment` (`id`, `patient_id`, `test`, `total_amount_paid`, `date_created`) VALUES
(1, '033', 'Scan', '1550.00', '2020-07-03 16:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `genotype` varchar(15) NOT NULL,
  `blood` varchar(15) NOT NULL,
  `address` varchar(500) NOT NULL,
  `nextofkin` varchar(100) NOT NULL,
  `nextofkin_phone` varchar(100) NOT NULL,
  `appointment` int(11) NOT NULL DEFAULT '0',
  `note` varchar(255) DEFAULT NULL,
  `date_created` varchar(100) NOT NULL,
  `date_updated` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patient_id`, `name`, `email`, `password`, `gender`, `dob`, `phone_no`, `genotype`, `blood`, `address`, `nextofkin`, `nextofkin_phone`, `appointment`, `note`, `date_created`, `date_updated`) VALUES
(30, '2020_681979', 'Gbolahan Adegoke S', 'sam@gmail.com', '123', 'Male', '10/12/2020', '08069159748', 'AA', 'A', 'Kwara State, Ilorin', '', '', 1, 'Good to go', '10/12/2020', '29/10/2020'),
(31, '2020_9822696', 'kg bl jkh', '', '0', 'Male', '6/16/2020', '08030683205', 'AA', 'A', 'l bk', '', '', 0, '', '17/53/2020', '17/33/2020'),
(32, '032', 'Aweda Afolabi ', '', '0', 'Male', '6/5/1991', '09047489381', 'AS', 'B', 'ilorin', '', '', 0, '', '26/59/2020', NULL),
(33, '033', 'test testing ', '', '0', 'Male', '6/26/2020', '08047489181', 'AS', 'AB', 'ilorin', '', '', 0, '', '26/01/2020', NULL),
(34, '33', 'Peter Obiebe', 'text@gmail.com', '123', 'male', '02/10/2020', '08069159749', 'AA', 'A-', 'Ilorin, Kwara state', 'Kenny OLuwafemi', '09033729437', 0, 'Good to go', '26/10/2020', NULL),
(40, '34', 'Peter O. GREATTTT', 'olawaleoyewale2102@gmail.com', '', 'male', '20/11/2020', '08069159748', 'SS', 'O+', 'Ilorin, Kwara state', 'Kenny OLuwafemi', '09033729437', 0, 'Good', '20/11/2020', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `recievedFrom` text NOT NULL,
  `paidFor` text NOT NULL,
  `date_created` varchar(10) NOT NULL,
  `amt` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `sn` int(11) NOT NULL,
  `invoice_id` varchar(12) NOT NULL,
  `payto` varchar(250) NOT NULL,
  `paidby` varchar(250) NOT NULL,
  `month` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`recievedFrom`, `paidFor`, `date_created`, `amt`, `time`, `sn`, `invoice_id`, `payto`, `paidby`, `month`) VALUES
('Adegoke Gbolahan', 'Medical Fee', '6/13/2020', '2000', 'June 2020', 1, '2020_681979', '', '', ''),
('Samson G', 'X-ray Scan Fee', '6/13/2020', '7500', 'June 2020', 2, '2020_681979', '', '', ''),
('Oluwafemi Joshua', 'Oluwafemi Joshua', '6/13/2020 ', '13000', 'June 2020', 4, '2020_458294', '', '', ''),
('Adegoke Gbolahan', '', '28/10/2020', '3000', '11:09 AM', 5, '2', 'Samson', 'Transfer', ''),
('Adegoke Gbolahan', 'Medical', '28/10/2020', '2000', '2:10 PM', 6, '2', 'Samson', 'Cash', ''),
('Adegoke Gbolahan', 'Medical', '28/10/2020', '1000', '2:10 PM', 7, '2', 'Samson', 'Cash', ''),
('Adegoke Gbolahan', 'Medical', '28/10/2020', '6000', '2:10 PM', 8, '2', 'Samson', 'Cash', '11/2020'),
('Adegoke Gbolahan', 'Medical', '20/11/2020', '1000', '11:09 AM', 9, '2', 'Samson', 'Cheque', '11/2020'),
('Adegoke Gbolahan', 'Medical', '20/11/2020', '1000', '11:09 AM', 10, '4', 'Samson', 'Cheque', '11/2020');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `symptoms` text NOT NULL,
  `prescription` text NOT NULL,
  `note` text NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `ill` text NOT NULL,
  `doctor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `patient_id`, `symptoms`, `prescription`, `note`, `date_created`, `ill`, `doctor`) VALUES
(13, '2020_681979', 'Cold,  Rash,  Sweating,', 'Funbat A, Paracetamol, Contact', 'Funbat A should be rubbed on the rashes suface\r\nParacetamol (II-II-II)\r\nContact (II at night)', '11/27/2020', 'Maleria', 'Gbolahan S.A');

-- --------------------------------------------------------

--
-- Table structure for table `referal`
--

CREATE TABLE `referal` (
  `id` int(11) NOT NULL,
  `referal_id` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `date_created` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referal`
--

INSERT INTO `referal` (`id`, `referal_id`, `name`, `gender`, `phone_no`, `email`, `reason`, `doctor`, `date_created`) VALUES
(4, '5', 'Come home', 'Male', '09030683205', 'come@me.com', 'come with me', 'doctor', '2020-06-26 15:53:15'),
(7, '6', 'Peter O.', 'male', '08069159748', 'samadex5050@gmail.com', 'Testing', 'Gbolahan', '20/11/2020');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `staff_name` varchar(250) NOT NULL,
  `basic_salary` varchar(20) NOT NULL,
  `allowance` varchar(20) NOT NULL,
  `other_salary` varchar(20) NOT NULL,
  `pro_dedt` varchar(20) NOT NULL,
  `tax_dedt` varchar(20) NOT NULL,
  `other_dedt` varchar(20) NOT NULL,
  `net_salary` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `staff_id`, `staff_name`, `basic_salary`, `allowance`, `other_salary`, `pro_dedt`, `tax_dedt`, `other_dedt`, `net_salary`) VALUES
(1, 'DC-001', 'Anu Oluwafemi', '120000', '20000', '0', '2500', '3000', '0', '134500.00'),
(2, 'ADMIN-001', 'Gbolahan Adegoke', '500000', '50000', '0', '3000', '5000', '0', '542000.00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `staff_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype_id` int(3) NOT NULL,
  `job_role` varchar(100) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `passport` varchar(250) NOT NULL,
  `short_bio` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `join_date` varchar(100) NOT NULL,
  `date_updated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `firstname`, `lastname`, `staff_id`, `email`, `password`, `usertype_id`, `job_role`, `dob`, `gender`, `address`, `city`, `state`, `phone`, `passport`, `short_bio`, `status`, `salary`, `date_created`, `join_date`, `date_updated`) VALUES
(1, 'Gbolahan', 'Adegoke', 'ADMIN-001', 'sam@gmail.com', '123', 1, 'Admin', '24/04/1995', 'Male', 'Ilorin, Kwara state,Nigeria', 'Ilorin', 'Kwara', '09033826476', '1603461034-Capture.png', 'Developer', 'active', '542000.00', '23/10/2020', '23/10/2020', '25/10/2020'),
(2, 'Anu', 'Oluwafemi', 'DC-001', 'test@gmail.com', '123', 1, 'Doctor', '05/10/2020', 'Female', 'Ilorin', 'Ilorin', 'Kwara', '08110130288', '1604580689-Aburo Mi 20180625_153716.jpg', 'Doctor', 'Inactive', '132500.00', '23/10/2020', '08/10/2020', ''),
(3, 'Peter', 'Obiebe', 'NU-001', 'smart@gmail.com', '123', 2, 'Nurse', '19/11/1987', 'Male', 'Ilorin, Kwara state,Nigeria', 'Sapele', 'Ogun', '09033826475', '1605790607-fu.jpg ', 'Contractor', 'active', '', '19/11/2020', '19/11/2020', ''),
(4, 'Ibrahim', 'Adashofunjo', 'LAB-001', 'samadex5050@gmail.com', '123', 3, 'Laboratorist', '19/11/2020', 'Male', 'Ilorin', 'Ilorin', 'Ogun', '09033826476', '1605798290-aviary-image-1527342946538.jpeg ', 'Lab Attendance', 'active', '', '19/11/2020', '19/11/2020', '');

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `id` int(11) NOT NULL,
  `symptoms` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`id`, `symptoms`) VALUES
(1, 'Headache'),
(2, 'Weakness and fatigue'),
(3, 'Dry cough'),
(4, 'Loss of appetite'),
(5, 'Abdominal pain'),
(6, 'Diarrhea or constipation'),
(7, 'Rash'),
(8, 'Sweating'),
(9, 'Extremely swollen abdomen'),
(11, 'Weight Loss'),
(15, 'High Temperature');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--
-- Error reading structure for table hos.treatment: #1932 - Table 'hos.treatment' doesn't exist in engine
-- Error reading data for table hos.treatment: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `hos`.`treatment`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype_id` int(2) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `phone_no`, `password`, `usertype_id`, `created_at`, `updated_at`) VALUES
(1, 'Gbolahan', 'Adegoke', 'sam@gmail.com', '08069359748', '123', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `phone_no`, `email`, `usertype_id`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Habeeb', 'Bello', '08144911799', 'admin', 1, '3244185981728979115075721453575112', '2020-06-15 14:51:22', '2020-06-15 14:51:22'),
(4, 'afolabi', 'nee', '08144911790', 'nee@gmail.com', 2, '3244185981728979115075721453575112', '2020-06-16 15:25:51', '2020-06-16 15:25:51'),
(5, 'Aweda', 'Habeeb', '08144911791', 'nee1@gmail.com', 2, '3244185981728979115075721453575112', '2020-06-16 15:34:52', '2020-06-16 15:34:52'),
(7, 'aweda', 'habeeb', '09047489381', 'lab@gmail.com', 3, '3244185981728979115075721453575112', '2020-06-25 13:58:18', '2020-06-25 13:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `type`) VALUES
(1, 'Specialist'),
(2, 'Nurse'),
(3, 'Lab');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_flow`
--

CREATE TABLE `wallet_flow` (
  `id` int(11) NOT NULL,
  `credit_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `debit_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `type` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet_flow`
--

INSERT INTO `wallet_flow` (`id`, `credit_amount`, `debit_amount`, `type`, `created_by`, `date_created`) VALUES
(1, '100.00', '0.00', 'Treatment charges', 'afolabi nee', '2020-06-01 15:08:45'),
(2, '150.00', '0.00', 'Treatment charges', 'afolabi nee', '2020-06-22 15:08:45'),
(3, '500.00', '0.00', 'Treatment charges', 'afolabi nee', '2020-06-22 15:08:45'),
(4, '500.00', '0.00', 'Treatment charges', 'afolabi nee', '2020-06-23 15:08:45'),
(5, '0.00', '200.00', 'Expenses', ' ', '2020-06-26 11:36:50'),
(6, '1000.00', '0.00', 'Lab charges', 'afolabi nee', '2020-06-26 14:24:55'),
(7, '1000.00', '0.00', 'Treatment charges', 'afolabi nee', '2020-07-02 13:15:47'),
(8, '200.00', '0.00', 'Lab charges', 'afolabi nee', '2020-07-02 13:26:27'),
(9, '100.00', '0.00', 'Lab charges', 'afolabi nee', '2020-07-02 13:30:53'),
(10, '100.00', '0.00', 'Lab charges', 'afolabi nee', '2020-07-02 13:35:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datechecker`
--
ALTER TABLE `datechecker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnose_patients`
--
ALTER TABLE `diagnose_patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_chat`
--
ALTER TABLE `group_chat`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `group_member`
--
ALTER TABLE `group_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv`
--
ALTER TABLE `inv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labpayment`
--
ALTER TABLE `labpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referal`
--
ALTER TABLE `referal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_flow`
--
ALTER TABLE `wallet_flow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `datechecker`
--
ALTER TABLE `datechecker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diagnose_patients`
--
ALTER TABLE `diagnose_patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_chat`
--
ALTER TABLE `group_chat`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `group_member`
--
ALTER TABLE `group_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inv`
--
ALTER TABLE `inv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `labpayment`
--
ALTER TABLE `labpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `referal`
--
ALTER TABLE `referal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wallet_flow`
--
ALTER TABLE `wallet_flow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
