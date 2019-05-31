-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2019 at 03:45 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `le_id` int(10) NOT NULL,
  `le_name` varchar(40) DEFAULT NULL,
  `le_ln` varchar(40) DEFAULT NULL,
  `le_tel` varchar(10) DEFAULT NULL,
  `le_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`le_id`, `le_name`, `le_ln`, `le_tel`, `le_date`) VALUES
(1, 'รพิพรรณ ', 'สุวรรณพันธ์', '923580896', '2019-05-15'),
(2, '', 'สืบวงศ์รุ่ง', '930745136', '2019-05-25'),
(3, '', 'สืบวงศ์รุ่ง', '930745136', '2019-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pd_id` int(10) NOT NULL,
  `pd_name` varchar(40) NOT NULL,
  `pd_pa` varchar(20) NOT NULL,
  `pd_color` varchar(20) NOT NULL,
  `pd_sp` int(20) NOT NULL,
  `pd_py` date NOT NULL,
  `pd_le_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pd_id`, `pd_name`, `pd_pa`, `pd_color`, `pd_sp`, `pd_py`, `pd_le_id`) VALUES
(1, 'าดไก', '', '', 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `se_id` int(40) NOT NULL,
  `se_name` varchar(40) NOT NULL,
  `se_price` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`se_id`, `se_name`, `se_price`) VALUES
(1, 'lddwphu', 3900),
(2, 'lddwp', 3900);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detail`
-- (See below for the actual view)
--
CREATE TABLE `view_detail` (
`pd_id` int(10)
,`pd_name` varchar(40)
,`pd_pa` varchar(20)
,`pd_color` varchar(20)
,`pd_sp` int(20)
,`pd_py` date
,`le_name` varchar(40)
,`le_ln` varchar(40)
);

-- --------------------------------------------------------

--
-- Structure for view `view_detail`
--
DROP TABLE IF EXISTS `view_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detail`  AS  select `product`.`pd_id` AS `pd_id`,`product`.`pd_name` AS `pd_name`,`product`.`pd_pa` AS `pd_pa`,`product`.`pd_color` AS `pd_color`,`product`.`pd_sp` AS `pd_sp`,`product`.`pd_py` AS `pd_py`,`lecturer`.`le_name` AS `le_name`,`lecturer`.`le_ln` AS `le_ln` from (`lecturer` join `product` on((`product`.`pd_le_id` = `lecturer`.`le_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`le_id`),
  ADD KEY `le_name` (`le_name`),
  ADD KEY `le_ln` (`le_ln`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `pd_le_id` (`pd_le_id`),
  ADD KEY `pd_name` (`pd_name`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`se_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `le_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pd_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `se_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
