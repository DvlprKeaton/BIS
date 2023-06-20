-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2022 at 04:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbarangay`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaintbl`
--

CREATE TABLE `complaintbl` (
  `comp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `complain_date` varchar(255) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaintbl`
--

INSERT INTO `complaintbl` (`comp_id`, `user_id`, `remarks`, `complain_date`, `Status`) VALUES
(1, 19, 'meron siyang kabit', '23/05/2022 - Monday - 02:13:19pm', 0),
(2, 20, 'Ang ingay ng kapit bahay namin', '24/05/2022 - Tuesday - 07:48:17pm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `description` varchar(200) NOT NULL,
  `location_status` tinyint(1) DEFAULT 0,
  `request` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `lat`, `lng`, `description`, `location_status`, `request`) VALUES
(1, 48.117702, -2.904753, 'Blk 11 lot 43 Sameera ', 1, 0),
(2, 17.873684, 120.453194, 'AYAN', 0, 0),
(3, 17.872335, 120.452553, 'Angel Baby', 0, 0),
(4, 17.868141, 120.458710, 'Blk 11 Lot 43 Subd, City Province', 1, 0),
(5, 17.870815, 120.454994, 'Kidnapping', 1, 0),
(6, 17.873726, 120.458298, 'Try', 0, 0),
(7, 17.873602, 120.458641, 'try2', 0, 0),
(8, 17.866943, 120.451866, '', 0, 0),
(9, 17.880014, 120.472939, '', 0, 3),
(10, 17.882137, 120.453926, '', 1, 3),
(11, 17.864616, 120.465210, 'final', 0, 0),
(12, 17.869680, 120.457703, 'sige nga', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(60) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`id`, `username`, `password`, `type`, `status`, `created`) VALUES
(1, 'admin', 'd299375c81abf98c20c0038335fbb4c7', 'official', 'active', '2021-12-13 10:43:20'),
(2, 'admin1', 'd299375c81abf98c20c0038335fbb4c7', 'official', 'active', '2021-12-15 12:05:32'),
(3, 'admin2', '596cf6a7695f616e9675947b700d3b51', 'official', 'active', '2021-12-15 12:32:10'),
(4, 'admin3', 'cdad5bb6bbe89691ced1ddeb335c45ac', 'official', 'active', '2021-12-15 01:10:43'),
(5, 'admin4', 'd299375c81abf98c20c0038335fbb4c7', 'official', 'active', '2021-12-15 01:12:21'),
(6, 'admin5', 'a1408321e8891f2c5c7d5c19602eb408', 'official', 'active', '2021-12-15 01:15:43'),
(7, 'admin6', '614e7a0e5f9efd87c5d69fb8c134446e', 'official', 'active', '2021-12-15 01:23:36'),
(8, 'ADMIN12', 'd299375c81abf98c20c0038335fbb4c7', 'official', 'active', '2022-01-12 21:59:41'),
(12, 'Michael123456', '1', 'Punong Barangay', 'active', '0000-00-00 00:00:00'),
(16, 'Keaton123456', '1', 'Secretary', 'active', '0000-00-00 00:00:00'),
(19, 'Kim123456', '1', 'Resident', 'active', '0000-00-00 00:00:00'),
(20, 'Vane123456', '1', 'Resident', 'active', '0000-00-00 00:00:00'),
(21, 'Carmelie123456', '1', 'Resident', 'active', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `user_id` int(11) NOT NULL,
  `lname` varchar(55) NOT NULL,
  `fname` varchar(55) NOT NULL,
  `mname` varchar(55) NOT NULL,
  `suffix` varchar(55) NOT NULL,
  `birthdate` date NOT NULL,
  `age` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `VerificationCode` varchar(255) NOT NULL,
  `Verify` tinyint(4) NOT NULL,
  `Request` tinyint(4) NOT NULL,
  `profile` varbinary(1052) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_id`, `lname`, `fname`, `mname`, `suffix`, `birthdate`, `age`, `position`, `mobile_number`, `user_name`, `user_password`, `Status`, `VerificationCode`, `Verify`, `Request`, `profile`) VALUES
(1, 'Ibuos', 'Kim Jem', 'Sanchez', '', '2000-07-18', 0, '', '09182166281', 'kimpoy', 'd299375c81abf98c20c0038335fbb4c7', 1, '', 0, 0, ''),
(2, 'Mata', 'Vanezza Mhae', 'Pascua', '', '1999-04-12', 0, '', '+63-945-256-2975', 'van', '00de13219167a43cb1f7379d48e9b09d', 1, '', 0, 0, ''),
(3, 'Javier', 'Pete Andrei', 'Javier', 'Jr.', '1999-08-27', 0, '', '+63-951-272-1490', 'andrei', '0fa45673dee40a00fa60c56ea3fe74a7', 1, '', 0, 0, ''),
(4, 'Espiritu', 'Jakob', 'Ibuos', '', '2007-07-20', 0, '', '+63-926-475-1557', 'jj', '66004338e8bb37729058bdbe3c63a022', 1, '', 0, 0, ''),
(5, 'Mercado', 'Gloria', 'Ibuos', '', '1977-05-16', 0, '', '+63-905-698-7246', 'gloria', '08d9c25a01e000e055e3a18f5e72fa14', 1, '', 0, 0, ''),
(6, 'Espiritu', 'Kim', 'Ibuos', 'Jr.', '2015-01-02', 0, '', '0987654321', 'hakdog', 'd299375c81abf98c20c0038335fbb4c7', 1, '', 0, 0, ''),
(7, 'Doe', 'John', 'Recto', 'Jr.', '1999-03-16', 0, '', '09876543212', 'JD', 'd299375c81abf98c20c0038335fbb4c7', 1, '', 0, 0, ''),
(8, 'Doe', 'Jane', 'Robredo', 'III.', '1985-03-21', 0, '', '09876543212', 'jane', 'd299375c81abf98c20c0038335fbb4c7', 1, '', 0, 0, ''),
(9, 'Ibuos', 'Kim Jem', 'Sanchez', '', '2000-07-18', 0, '', '09876543212', 'kimpoy', 'd299375c81abf98c20c0038335fbb4c7', 1, '', 0, 0, ''),
(12, 'Aguilar', 'Michael', 'Guevarra', 'Jr', '1999-07-01', 22, 'Punong Barangay', '09089430851', 'Michael123456', '$2y$10$NAXg8ojcXUlJWAIpUwISoOFeAw.i4QPEq1Tq1.kpczK0G.7etLs46', 1, '', 1, 0, ''),
(16, 'Aguilar', 'Keaton', 'Guevarra', 'n/a', '1999-07-01', 22, 'Secretary', '09089430851', 'Keaton123456', '$2y$10$prnIe.yitKK7dRLq3nZ9qedqiDC7y2vh6VktIFvJjRaMy1Ljhv1BC', 1, '', 1, 0, ''),
(19, 'Caguntas', 'Kim', 'Guevarra', '', '1999-07-01', 22, 'Resident', '09089430851', 'Kim123456', '$2y$10$6RmZ0ZuE6Qq.9yh.dkmr5.GC0uglk1JvWvLLPPpbtEN1vz9wepmta', 1, '4353', 1, 0, 0x353334352d63633566643835353932343031353433333038633131346133343638373434652d2d646f6f646c652d616e696d652d70696374757265732e6a7067),
(20, 'Mata', 'Vanezza', 'Pascua', '', '1999-07-01', 22, 'Resident', '09162138522', 'Vane123456', '$2y$10$KdUjSnXJVgh3aHUTE7ap5eC3hRd8foIMpKwUlOcqf5rH/Fw5zQndO', 1, '2388', 1, 0, ''),
(21, 'Aguilar', 'Carmelie', 'Bondoc', '', '1999-07-01', 22, 'Resident', '09089430851', 'Carmelie123456', '$2y$10$ce3TWYzkmsW0rSBjlICgN.EDKFxNze7LbqRTrSWNltk3Ums/GUS5.', 1, '1271', 1, 0, 0x383831392d63633566643835353932343031353433333038633131346133343638373434652d2d646f6f646c652d616e696d652d70696374757265732e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_msg`
--

CREATE TABLE `tbl_msg` (
  `id_msg` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  `msg_status` int(11) NOT NULL,
  `msg_date` varchar(255) NOT NULL,
  `ProfRequest` tinyint(4) NOT NULL,
  `ClearRequest` tinyint(4) NOT NULL,
  `IndiRequest` tinyint(4) NOT NULL,
  `ResiRequest` tinyint(4) NOT NULL,
  `ReqReply` varchar(255) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `Declined` tinyint(4) NOT NULL,
  `RequestType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_msg`
--

INSERT INTO `tbl_msg` (`id_msg`, `sender_id`, `sender_name`, `message`, `msg_status`, `msg_date`, `ProfRequest`, `ClearRequest`, `IndiRequest`, `ResiRequest`, `ReqReply`, `Status`, `Declined`, `RequestType`) VALUES
(8, 21, 'Carmelie123456', 'Hello, I want to update my profile', 0, '04/06/2022 - Saturday - 09:33:35pm', 0, 0, 0, 0, 'You can now Update Your Profile!', 0, 0, 'Profile'),
(9, 21, 'Carmelie123456', 'Hello, I want to request for a Barangay Clearance', 1, '04/06/2022 - Saturday - 09:35:09pm', 0, 2, 0, 0, 'Your barangay clearance request was approved!', 0, 0, 'Clearance'),
(10, 21, 'Carmelie123456', 'Hello, I want to request for a Certificate of Indigency', 1, '04/06/2022 - Saturday - 09:50:51pm', 0, 0, 2, 0, 'Your certificate of indigency request was approved!', 0, 0, 'Indigency');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_official`
--

CREATE TABLE `tbl_official` (
  `id_official` int(11) NOT NULL,
  `lname_official` varchar(55) NOT NULL,
  `fname_official` varchar(55) NOT NULL,
  `mname_official` varchar(55) NOT NULL,
  `suffix_official` varchar(55) NOT NULL,
  `position` varchar(55) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `sTerm` int(11) NOT NULL,
  `eTerm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_official`
--

INSERT INTO `tbl_official` (`id_official`, `lname_official`, `fname_official`, `mname_official`, `suffix_official`, `position`, `Status`, `sTerm`, `eTerm`) VALUES
(1, 'Yadao', 'Rodel', 'N.', '', 'Kagawad', 1, 0, 0),
(2, 'Ibuos', 'Marietta', 'I.', '', 'Secretary', 1, 0, 0),
(3, 'Fernandez', 'Joshua', 'J.', '', 'Kagawad', 1, 0, 0),
(4, 'Yadao', 'Larry', 'S.', '', 'Kagawad', 1, 0, 0),
(5, 'Gaddon', 'Maria Cristina', 'V.', '', 'Treasurer', 1, 0, 0),
(6, 'Catalma', 'Dan', 'Rosete', '', 'Treasurer', 1, 0, 0),
(7, 'Ebora', 'Haidee', 'R.', '', 'Treasurer', 1, 0, 0),
(8, 'Templanza', 'Marko', 'L.', 'Jr.', 'Treasurer', 1, 0, 0),
(9, 'Ibe', 'Jerwin', 'I.', '', 'Treasurer', 1, 0, 0),
(10, 'Ibe', 'Judy', 'I.', '', 'Treasurer', 1, 0, 0),
(13, 'Aguilar', 'Keaton', 'Guevarra', '', 'Tanod', 1, 0, 0),
(14, 'Aguilar', 'Michael', 'Guevarra', '', 'SK Chairman', 0, 2022, 2025);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resident`
--

CREATE TABLE `tbl_resident` (
  `id_resident` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lname_resident` varchar(55) NOT NULL,
  `fname_resident` varchar(55) NOT NULL,
  `mname_resident` varchar(55) NOT NULL,
  `suffix_resident` varchar(55) NOT NULL,
  `birthdate_resident` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(55) NOT NULL,
  `purok` varchar(55) NOT NULL,
  `voter_status` varchar(55) NOT NULL,
  `civil_status` varchar(55) NOT NULL,
  `nationality` varchar(55) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `valid_id` varbinary(1052) NOT NULL,
  `ClearCert` varbinary(1052) NOT NULL,
  `IndiCert` varbinary(1052) NOT NULL,
  `ResiCert` varbinary(1052) NOT NULL,
  `id_uploadDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_resident`
--

INSERT INTO `tbl_resident` (`id_resident`, `user_id`, `lname_resident`, `fname_resident`, `mname_resident`, `suffix_resident`, `birthdate_resident`, `age`, `gender`, `purok`, `voter_status`, `civil_status`, `nationality`, `Status`, `valid_id`, `ClearCert`, `IndiCert`, `ResiCert`, `id_uploadDate`) VALUES
(17, 19, 'Caguntas', 'Kim', 'Guevarra', '', '1999-07-01', 22, 'male', 'PurokUno', 'Validated', 'Single', 'Filipino', 1, 0x353937392d416e6f6e796d6f75732d57617272696f722e706e67, 0x343733352d46756e6374696f6e616c6974794f6642504f43202833292e706466, 0x393634382d4365727469666963617465206f6620496e646967656e63792e706466, 0x313134302d4365727469666963617465206f66205265736964656e63792e706466, ''),
(18, 20, 'Mata', 'Vanezza', 'Pascua', '', '1999-07-01', 22, 'female', 'PurokUno', 'Validated', 'Single', 'Filipino', 1, 0x323330352d64656a756f76322d62653431623132622d663866632d346533612d383366652d3264633035646131373866652e706e67, 0x313530382d46756e6374696f6e616c6974794f6642504f43202833292e706466, '', '', ''),
(19, 21, 'Aguilar', 'Carmelie', 'Bondoc', '', '1999-07-01', 22, 'female', 'PurokKwatro', 'Validated', 'Married', 'Filipino', 1, 0x393434392d74656d706c6174655f332e6a7067, '', 0x343338342d46756e6374696f6e616c6974794f6642504f43202833292e706466, 0x373331302d46756e6374696f6e616c6974794f6642504f43202833292e706466, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaintbl`
--
ALTER TABLE `complaintbl`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_msg`
--
ALTER TABLE `tbl_msg`
  ADD PRIMARY KEY (`id_msg`);

--
-- Indexes for table `tbl_official`
--
ALTER TABLE `tbl_official`
  ADD PRIMARY KEY (`id_official`);

--
-- Indexes for table `tbl_resident`
--
ALTER TABLE `tbl_resident`
  ADD PRIMARY KEY (`id_resident`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaintbl`
--
ALTER TABLE `complaintbl`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbllogin`
--
ALTER TABLE `tbllogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_msg`
--
ALTER TABLE `tbl_msg`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_official`
--
ALTER TABLE `tbl_official`
  MODIFY `id_official` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_resident`
--
ALTER TABLE `tbl_resident`
  MODIFY `id_resident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
