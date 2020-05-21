-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 09:33 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cherry_advance`
--

-- --------------------------------------------------------

--
-- Table structure for table `appsgloballookupvariables`
--

CREATE TABLE `appsgloballookupvariables` (
  `code` varchar(50) NOT NULL,
  `lookupname` varchar(50) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appsgloballookupvariables`
--

INSERT INTO `appsgloballookupvariables` (`code`, `lookupname`, `name`, `value`) VALUES
('BAN1304716', 'Bank', 'BCA', 'BCA'),
('ETH9370779', 'Ethnic', 'Sumatran', 'Bataknese'),
('GEN1443891', 'Gender', 'Male', 'Male'),
('GEN1456736', 'Gender', 'Female  ', 'Female'),
('REL1432148', 'Religion', 'Moslem', 'Moslem'),
('REL1952270', 'Religion', 'Buddhist', 'Buddhist'),
('REL3112071', 'Religion', 'Catholic', 'Catholic'),
('REL3408822', 'Religion', 'Hindu', 'Hindu'),
('REL9850320', 'Religion', 'Christian', 'Christian');

-- --------------------------------------------------------

--
-- Table structure for table `appsuseraccount`
--

CREATE TABLE `appsuseraccount` (
  `code` varchar(50) NOT NULL,
  `employeecode` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `rolecode` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `insertstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appsuseraccount`
--

INSERT INTO `appsuseraccount` (`code`, `employeecode`, `name`, `username`, `password`, `email`, `rolecode`, `status`, `insertstamp`, `updatestamp`) VALUES
('U001', '', 'Admin', 'admin12', '1844156d4166d94387f1a4ad031ca5fa', NULL, 'ADM', 1, '2019-11-22 04:06:24', '2019-11-22 11:01:16'),
('U003', 'JU219159', 'Juan Rudolf', 'juan12', '2a3fe1edc8b2166958e8c5db2b3d2b42', 'juan@mail.com', 'EMP', 1, '2019-12-15 00:42:21', NULL),
('U004', 'IN159860', 'Indra Jaya', 'indra12', '7277cd4cb8fa1f4a2f8a750e4355daf9', 'indra@mail.com', 'ADM', 1, '2019-12-31 11:14:33', NULL),
('U005', 'SR207085', 'Sri Yanti', 'yanti12', 'e1cfeec963bf5d9e950809a00ba9debc', 'yanti@mail.com', 'EMP', 1, '2019-12-31 11:17:52', NULL),
('U006', 'RE133448', 'Reza Mahendra', 'reza12', '27902b23242cc98c00f03c0928f60a8a', 'reza@mail.com', 'EMP', 1, '2019-12-31 11:19:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employeeinformations`
--

CREATE TABLE `employeeinformations` (
  `code` varchar(50) NOT NULL,
  `joindate` date DEFAULT NULL,
  `insertstamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeeinformations`
--

INSERT INTO `employeeinformations` (`code`, `joindate`, `insertstamp`) VALUES
('IN159860', '1975-12-18', '2019-12-31 11:14:33'),
('JU219159', '2019-12-18', '2019-12-15 00:42:21'),
('RE133448', '1994-10-15', '2019-12-31 11:19:22'),
('SR207085', '1990-12-17', '2019-12-31 11:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `employeelaverequestdetails`
--

CREATE TABLE `employeelaverequestdetails` (
  `code` varchar(50) NOT NULL,
  `leavecode` varchar(50) NOT NULL,
  `items` varchar(50) NOT NULL,
  `amount` decimal(12,0) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeelaverequestdetails`
--

INSERT INTO `employeelaverequestdetails` (`code`, `leavecode`, `items`, `amount`, `notes`) VALUES
('16XW4A50BG', 'AR/05/2020/007', 'Tol', '96000', ''),
('1N6NKO35LQ', 'AR/05/2020/004', 'Transport', '250000', 'travel'),
('3U1RRXTNJI', 'AR/05/2020/010', 'Transport', '125000', ''),
('3VNAAMLUDZ', 'AR/05/2020/005', 'Makan', '200000', ''),
('6QIFG2547R', 'AR/05/2020/003', 'Transport', '40000', ''),
('75JDKI1REC', 'AR/05/2020/001', 'Parkir', '12000', ''),
('BU23MNENMJ', 'AR/05/2020/008', 'Makan', '42000', ''),
('FCQ8YP12TE', 'AR/05/2020/005', 'Taxi', '250000', 'Blue Bird'),
('H0LNREM63O', 'AR/05/2020/010', 'Parkir', '7500', ''),
('OCNJKPW2TV', 'AR/05/2020/007', 'Makan', '50000', ''),
('OVJX9ZWTFI', 'AR/05/2020/010', 'Tol', '16000', ''),
('Q7SWTGH23O', 'AR/05/2020/008', 'Tol', '78000', ''),
('QCMXLYZU6A', 'AR/05/2020/003', 'Makan', '28000', ''),
('QMOROCL29Y', 'AR/05/2020/008', 'Transport', '150000', ''),
('QUBI1ME5V8', 'AR/05/2020/001', 'Makan', '73000', 'makan siang dan sore'),
('R7IV2X1GE3', 'AR/05/2020/005', 'Hotel', '300000', ''),
('R7U8IHZRK3', 'AR/05/2020/003', 'Parkir', '18000', ''),
('RG5EAQJNW1', 'AR/05/2020/007', 'Transport', '200000', ''),
('RMMSNXIQHZ', 'AR/05/2020/010', 'Makan', '35000', ''),
('RY60ZRBC7L', 'AR/05/2020/005', 'Transport', '1250000', 'tiket'),
('TTZG5IUB1O', 'AR/05/2020/001', 'Transport', '40000', 'Bensin pulang pergi'),
('VYP6E8KRWM', 'AR/05/2020/004', 'Makan', '100000', '');

-- --------------------------------------------------------

--
-- Table structure for table `employeeleaverequests`
--

CREATE TABLE `employeeleaverequests` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `employeecode` varchar(50) NOT NULL,
  `leavedate` date NOT NULL,
  `untildate` date NOT NULL,
  `reminderdate` date NOT NULL,
  `destination` varchar(100) NOT NULL,
  `trippurpose` varchar(200) NOT NULL,
  `notes` text DEFAULT NULL,
  `requestedcost` decimal(12,0) DEFAULT 0,
  `approvedcost` decimal(12,0) DEFAULT 0,
  `usedcost` decimal(12,0) DEFAULT 0,
  `attachment` text NOT NULL,
  `status` enum('Not Claimed','Claimed') NOT NULL DEFAULT 'Not Claimed',
  `approvalstatus` tinyint(1) NOT NULL DEFAULT 0,
  `close` tinyint(1) NOT NULL DEFAULT 0,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `insertstamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeeleaverequests`
--

INSERT INTO `employeeleaverequests` (`id`, `code`, `employeecode`, `leavedate`, `untildate`, `reminderdate`, `destination`, `trippurpose`, `notes`, `requestedcost`, `approvedcost`, `usedcost`, `attachment`, `status`, `approvalstatus`, `close`, `month`, `year`, `insertstamp`) VALUES
(1, 'AR/05/2020/001', 'JU219159', '2020-05-17', '2020-05-17', '2020-05-15', 'Ciputra', 'Project Progress', '', '125000', '125000', '125000', '1588470686cake.jpeg', 'Claimed', 1, 1, 5, 2020, '2020-05-03'),
(2, 'AR/05/2020/002', 'JU219159', '2020-06-01', '2020-06-01', '2020-05-29', 'Client B', 'Maintenance', '', '325000', '250000', '0', '', 'Not Claimed', 1, 0, 6, 2020, '2020-05-03'),
(3, 'AR/05/2020/003', 'RE133448', '2020-05-22', '2020-05-22', '2020-05-25', 'Bogor', 'Testing System', '', '86000', '100000', '86000', '1588470914potrait.jpg', 'Claimed', 1, 1, 5, 2020, '2020-05-03'),
(4, 'AR/05/2020/004', 'RE133448', '2020-06-02', '2020-06-02', '2020-06-04', 'Bandung', 'Meeting', '', '350000', '300000', '350000', '1588494285backdrop.jpg', 'Claimed', 1, 1, 6, 2020, '2020-05-03'),
(5, 'AR/05/2020/005', 'RE133448', '2020-02-05', '2020-02-07', '2020-03-04', ' Palembang', ' Meeting', '', '2000000', '1800000', '2000000', '1588494511blue.jpeg', 'Claimed', 1, 1, 2, 2020, '2020-05-03'),
(6, 'AR/05/2020/006', 'RE133448', '2020-02-10', '2020-02-11', '0000-00-00', 'Aceh', 'Meeting', '', '2000000', '0', '0', '', 'Not Claimed', 0, 0, 2, 2020, '2020-05-03'),
(7, 'AR/05/2020/007', 'RE133448', '2020-03-03', '2020-03-03', '2020-03-03', 'Bogor', 'Membahas Report Progress', '', '350000', '350000', '346000', '1588494660flower.jpg', 'Claimed', 1, 0, 3, 2020, '2020-05-03'),
(8, 'AR/05/2020/008', 'RE133448', '2020-04-15', '2020-04-15', '2020-04-15', 'Cilengon', 'Project Progress', '', '300000', '300000', '270000', '1588494756d.jpg', 'Claimed', 1, 0, 4, 2020, '2020-05-03'),
(9, 'AR/05/2020/009', 'RE133448', '2020-05-01', '2020-05-02', '2020-04-30', 'Jambi', 'Weekly Meeting', '', '1750000', '0', '0', '', 'Not Claimed', 0, 0, 5, 2020, '2020-05-03'),
(10, 'AR/05/2020/010', 'RE133448', '2020-05-12', '2020-05-12', '2020-05-12', 'Client X', 'Membahas Report Progress', '', '250000', '250000', '183500', '1588494854abu.jpeg', 'Claimed', 1, 0, 5, 2020, '2020-05-03'),
(11, 'AR/05/2020/011', 'SR207085', '2020-01-22', '2020-01-22', '2020-01-22', 'Tigaraksa', 'Membahas Report Progress', '', '250000', '0', '0', '', 'Not Claimed', 0, 0, 1, 2020, '2020-05-03'),
(12, 'AR/05/2020/012', 'SR207085', '2020-02-11', '2020-02-11', '0000-00-00', 'Merak', 'Prospect Client', '', '400000', '350000', '0', '', 'Not Claimed', 1, 0, 2, 2020, '2020-05-03'),
(13, 'AR/05/2020/013', 'SR207085', '2020-03-10', '2020-03-10', '2020-03-10', 'Bandung', 'Meeting', '', '500000', '450000', '0', '', 'Not Claimed', 1, 0, 3, 2020, '2020-05-03'),
(14, 'AR/05/2020/014', 'SR207085', '2020-04-20', '2020-04-20', '2020-04-20', 'Cilacap', 'Meeting', '', '600000', '0', '0', '', 'Not Claimed', 0, 0, 4, 2020, '2020-05-03'),
(15, 'AR/05/2020/015', 'SR207085', '2020-04-28', '2020-04-29', '2020-04-27', 'Surabaya', 'Meeting', '', '2000000', '2000000', '0', '', 'Not Claimed', 1, 0, 4, 2020, '2020-05-03'),
(16, 'AR/05/2020/016', 'SR207085', '2020-05-07', '2020-05-08', '2020-05-06', 'Bali', 'Project Progress', '', '2000000', '0', '0', '', 'Not Claimed', 0, 0, 5, 2020, '2020-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `employeeprofile`
--

CREATE TABLE `employeeprofile` (
  `code` varchar(50) NOT NULL,
  `employeecode` varchar(50) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `bankcode` varchar(50) DEFAULT NULL,
  `bankaccount_number` varchar(200) DEFAULT NULL,
  `bankaccount_name` varchar(200) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `religioncode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeeprofile`
--

INSERT INTO `employeeprofile` (`code`, `employeecode`, `name`, `bankcode`, `bankaccount_number`, `bankaccount_name`, `phone_number`, `email`, `religioncode`) VALUES
('0DKNAEFB', 'IN159860', 'Indra Jaya', 'BAN1304716', '90901999090912', 'Indra Jaya', '081214238909', 'indra@mail.com', 'REL3112071'),
('36DT9KEJ', 'JU219159', 'Juan Rudolf', 'BAN1304716', '091242380893823920', 'Juan Rudolf', '085217607096', 'juan@mail.com', 'REL9850320'),
('J19NW6EK', 'RE133448', 'Reza Mahendra', 'BAN1304716', '8981923123123', 'Reza Mahendra', '089890908787', 'reza@mail.com', 'REL1432148'),
('MGLINZ3E', 'SR207085', 'Sri Yanti', 'BAN1304716', '180280902903891231', 'Sri Yanti', '081313238080', 'yanti@mail.com', 'REL1432148');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appsgloballookupvariables`
--
ALTER TABLE `appsgloballookupvariables`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `appsuseraccount`
--
ALTER TABLE `appsuseraccount`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `employeeinformations`
--
ALTER TABLE `employeeinformations`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `employeelaverequestdetails`
--
ALTER TABLE `employeelaverequestdetails`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `employeeleaverequests`
--
ALTER TABLE `employeeleaverequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeeprofile`
--
ALTER TABLE `employeeprofile`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeeleaverequests`
--
ALTER TABLE `employeeleaverequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
