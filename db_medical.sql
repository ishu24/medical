-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2018 at 05:04 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Appointmentid` int(10) NOT NULL,
  `Userid` int(10) NOT NULL,
  `Doctorid` int(10) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Statusid` int(10) NOT NULL DEFAULT '5',
  `Dtime` varchar(255) DEFAULT NULL,
  `Prescription` varchar(500) DEFAULT NULL,
  `Report` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Appointmentid`, `Userid`, `Doctorid`, `Description`, `Statusid`, `Dtime`, `Prescription`, `Report`) VALUES
(40, 3, 1, 'root canal', 1, '2018-02-24 13:01', NULL, 'reports/13IMG_20171213_145240800.jpg,reports/13IMG_20171213_145248622.jpg,reports/13IMG-20170219-WA0000.jpg'),
(41, 3, 3, 'ENT', 5, NULL, NULL, 'reports/33Screenshot_20170922-230002.png,reports/33Screenshot_20170923-223324.png'),
(42, 2, 4, 'jnjknjkjfkfrmvkg', 5, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Doctorid` int(10) NOT NULL,
  `Userid` int(10) NOT NULL,
  `Meadicalstoreid` int(10) NOT NULL,
  `License` varchar(50) NOT NULL,
  `Policy` varchar(255) NOT NULL,
  `Skill` varchar(50) NOT NULL,
  `Simg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Doctorid`, `Userid`, `Meadicalstoreid`, `License`, `Policy`, `Skill`, `Simg`) VALUES
(1, 25, 1, 'J-12421', '', 'Dentist', 'dentist.jpg'),
(3, 26, 1, 'I-90453', '', 'Surgeon', 'surgeon.jpg'),
(4, 28, 2, 'hu-785643', 'mediclaim ', 'Dentist', 'radiologist.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `medicalstore`
--

CREATE TABLE `medicalstore` (
  `Medicalstoreid` int(10) NOT NULL,
  `Userid` int(10) NOT NULL,
  `Since` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicalstore`
--

INSERT INTO `medicalstore` (`Medicalstoreid`, `Userid`, `Since`) VALUES
(1, 19, 1992),
(2, 27, 1992);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Statusid` int(10) NOT NULL,
  `Statusname` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Statusid`, `Statusname`) VALUES
(1, 'Approved'),
(2, 'Disapproved'),
(3, 'Visited'),
(4, 'Done'),
(5, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Userid` int(10) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `Usertypeid` int(10) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `DOB` varchar(255) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Userid`, `Firstname`, `Lastname`, `Email`, `Password`, `Address`, `City`, `Contact`, `Usertypeid`, `Image`, `DOB`, `Gender`) VALUES
(1, 'ishani', 'vora', 'voraishani24@gmail.com', 'admin', 'gurukul char rasta', 'Ahmedabad', 9409544867, 1, 'dfghj', '1996-02-24', 'Female'),
(2, 'Aditi', 'gupta', 'adi@gmail.com', 'adi123', 'pragti nager', 'Surat', 9856345215, 2, 'H:ISHANIextraScreenshot_2015-10-31-20-17-49.png', '1996-02-09', 'female'),
(3, 'riya', 'patel', 'riya@gmail.com', 'riya123', 'fghjk', 'Baroda', 8945346789, 2, 'H:ISHANIextraScreenshot_2015-09-10-21-57-40.png', '1996-07-17', 'female'),
(4, 'viral', 'shah', 'viral@gmail.com', 'viral123', 'rtyuicvbn', 'Gandhinager', 8723190456, 3, 'Screenshot_2014-09-15-17-43-43.png', '1996-08-27', 'female'),
(19, '24 hour', '', '24hour@gmail.com', '24hour', 'Bhuyngdev char rasta', 'Gandhinager', 7856478935, 4, 'Screenshot_2014-09-15-17-43-43.png', '', ''),
(25, 'Jainy', 'vora', 'jainy@gmail.com', 'jainy123', 'gurukul cross road', 'Ahmedabad', 8212342314, 3, 'IMG-20171006-WA0009.jpg', '1992-11-30', 'female'),
(26, 'nisarg', 'vora', 'nisarg@gmail.com', 'nisarg123', 'vishvketu building tv tower', 'Baroda', 7812342310, 3, 'Screenshot_2016-05-17-14-43-39.png', '1960-02-23', 'male'),
(27, 'abc', '', 'abc@gmail.com', '12345', 'd/9 a panchratna', 'Gandhinager', 7893456789, 4, 'IMG_20171213_145248622.jpg', '', ''),
(28, 'Bhavna', 'vora', 'bhavna@gmail.com', 'bhavna123', 'vishvketu', 'Baroda', 8934278190, 3, 'download.jpg', '1978-02-23', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `Usertypeid` int(10) NOT NULL,
  `Usertypename` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`Usertypeid`, `Usertypename`) VALUES
(1, 'Admin'),
(2, 'Patient'),
(3, 'Doctor'),
(4, 'Medicalstore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appointmentid`),
  ADD KEY `Doctorid` (`Doctorid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Doctorid`),
  ADD KEY `Userid` (`Userid`),
  ADD KEY `Meadicalstoreid` (`Meadicalstoreid`);

--
-- Indexes for table `medicalstore`
--
ALTER TABLE `medicalstore`
  ADD PRIMARY KEY (`Medicalstoreid`),
  ADD KEY `Userid` (`Userid`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Statusid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Userid`),
  ADD KEY `Usertypeid` (`Usertypeid`),
  ADD KEY `Usertypeid_2` (`Usertypeid`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`Usertypeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Appointmentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `Doctorid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `medicalstore`
--
ALTER TABLE `medicalstore`
  MODIFY `Medicalstoreid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Statusid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `Usertypeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`Doctorid`) REFERENCES `doctor` (`Doctorid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`Userid`) REFERENCES `user` (`Userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`Meadicalstoreid`) REFERENCES `medicalstore` (`Medicalstoreid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicalstore`
--
ALTER TABLE `medicalstore`
  ADD CONSTRAINT `medicalstore_ibfk_1` FOREIGN KEY (`Userid`) REFERENCES `user` (`Userid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
