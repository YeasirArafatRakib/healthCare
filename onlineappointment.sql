-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2021 at 05:46 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
CREATE DATABASE onlineappointment;
--
-- Database: `onlineappointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

CREATE TABLE `appoinments` (
  `id` int(11) NOT NULL,
  `hospital_name` varchar(200) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `doctor_specilist` varchar(30) NOT NULL,
  `district` varchar(30) DEFAULT NULL,
  `patient_name` varchar(50) NOT NULL,
  `patient_email` varchar(50) NOT NULL,
  `time` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `conform_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appoinments`
--

INSERT INTO `appoinments` (`id`, `hospital_name`, `doctor_name`, `doctor_specilist`, `district`, `patient_name`, `patient_email`, `time`, `date`, `conform_status`) VALUES
(1, 'Lake View Clinic', 'Dr. Shawan Biswas', 'Medicine', 'Dhaka', 'Bohni', 'bohni@gmail.com', '11.50', '2021-02-01', 0),
(2, 'Lake View Clinic', 'Dr. Anisul Rahaman', 'Neurologist', 'Dhaka', 'Bohnishikha', 'bohni@gmail.com', '9.15', '2021-02-01', 0),
(3, 'Lake View Clinic', 'Dr. Anisul Rahaman', 'Neurologist', 'Dhaka', 'Rakib', 'rakib@gmail', '9.45', '2021-02-01', 0),
(4, 'Lake View Clinic', 'Dr. Anisul Rahaman', 'Neurologist', 'Dhaka', 'Yasir', 'yasir@gmail.com', '9.3', '2021-02-01', 0),
(7, 'Lake View Clinic', 'Dr. Anisul Rahaman', 'Neurologist', 'Sampa', 'sampa46@gmail.com', 'Barisal', '9.15 ', '2021-02-08', 0),
(8, 'Lake View Clinic', 'Dr. Shawan Biswas', 'Medicine', 'Barisal', 'Sampa', 'sampa46@gmail.com ', '11.3AM ', '2021-02-08', 0),
(9, 'fgg@u.com', 'Dr. Shawan Biswas', 'Medicine', 'Barisal', 'Bohni', ' ', '4.1PM ', '2021-02-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctordetails`
--

CREATE TABLE `doctordetails` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `study` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `specalist` varchar(30) DEFAULT NULL,
  `patient_watching_time` int(11) DEFAULT NULL,
  `bmdc_no` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctordetails`
--

INSERT INTO `doctordetails` (`id`, `name`, `study`, `phone`, `specalist`, `patient_watching_time`, `bmdc_no`) VALUES
(1, 'Dr. Anisul Rahaman', 'Barishal Medical, Barishal', '+8801935666666', 'Neurologist', 15, 'A-9098'),
(2, 'Dr. Shawan Biswas', 'Dhaka Medicale, Dhaka', '+8801654676543', 'Medicine', 10, 'A-9897'),
(3, 'Dr. Asif RAhaman', 'Khulna Medical college Hospital, Khulna', '+88019845644', 'Medicine', 10, 'A-9097');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_speclist`
--

CREATE TABLE `doctor_speclist` (
  `id` int(11) NOT NULL,
  `specealist_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_speclist`
--

INSERT INTO `doctor_speclist` (`id`, `specealist_name`) VALUES
(1, 'Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `hospitaldetails`
--

CREATE TABLE `hospitaldetails` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `district` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitaldetails`
--

INSERT INTO `hospitaldetails` (`id`, `name`, `address`, `phone`, `district`, `password`, `email`) VALUES
(1, 'Ad-Din Hospital', 'Moghbazar, Dhaka', '+880-2-9353391-3', 'Dhaka', '567', 'fgg@u.com'),
(2, 'Lake View Clinic', 'Sadar Road, Barishal', '+880-2-9667762', 'Barishal', '7657', 'hjg@w.com'),
(3, 'Lab-aid Cardiac and Specialized Hospital    ', 'House- 06, Road-04, Dhanmondi, Dhaka-1205, Bangladesh    ', '+88 0171-333-3336   ', 'Dhaka    ', '1234    ', 'info@labaidgroup.com');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_doctor`
--

CREATE TABLE `hospital_doctor` (
  `hdid` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `start_time` varchar(20) NOT NULL,
  `time_range_start` varchar(10) NOT NULL,
  `end_time` varchar(30) NOT NULL,
  `time_range_end` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_doctor`
--

INSERT INTO `hospital_doctor` (`hdid`, `doctor_id`, `hospital_id`, `start_time`, `time_range_start`, `end_time`, `time_range_end`) VALUES
(1, 1, 2, '8.00  ', 'AM  ', '12.00  ', 'AM  '),
(2, 2, 1, '5.00  ', 'PM  ', '8.00  ', 'PM  '),
(3, 2, 2, '11.00', 'AM', '4.00', 'PM'),
(4, 3, 1, '09', 'AM', '4', 'PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoinments`
--
ALTER TABLE `appoinments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctordetails`
--
ALTER TABLE `doctordetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bmdc_no_pc` (`bmdc_no`);

--
-- Indexes for table `doctor_speclist`
--
ALTER TABLE `doctor_speclist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitaldetails`
--
ALTER TABLE `hospitaldetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_pc` (`email`);

--
-- Indexes for table `hospital_doctor`
--
ALTER TABLE `hospital_doctor`
  ADD PRIMARY KEY (`hdid`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoinments`
--
ALTER TABLE `appoinments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `doctordetails`
--
ALTER TABLE `doctordetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `doctor_speclist`
--
ALTER TABLE `doctor_speclist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hospitaldetails`
--
ALTER TABLE `hospitaldetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hospital_doctor`
--
ALTER TABLE `hospital_doctor`
  MODIFY `hdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hospital_doctor`
--
ALTER TABLE `hospital_doctor`
  ADD CONSTRAINT `hospital_doctor_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctordetails` (`id`),
  ADD CONSTRAINT `hospital_doctor_ibfk_2` FOREIGN KEY (`hospital_id`) REFERENCES `hospitaldetails` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
