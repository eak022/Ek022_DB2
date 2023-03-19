-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 06:04 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `เตี๋ยวกับตำ`
--
CREATE DATABASE IF NOT EXISTS `เตี๋ยวกับตำ` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `เตี๋ยวกับตำ`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_ID` char(6) NOT NULL,
  `cus_name` varchar(30) NOT NULL,
  `cus_table` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_ID`, `cus_name`, `cus_table`) VALUES
('CT 1', 'เปิ้ล', 22),
('CT 2', 'เอก', 1);

-- --------------------------------------------------------

--
-- Table structure for table `drink`
--

CREATE TABLE `drink` (
  `D_ID` char(6) NOT NULL,
  `D_Name` varchar(30) NOT NULL,
  `D_Price` int(4) NOT NULL,
  `menu_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drink`
--

INSERT INTO `drink` (`D_ID`, `D_Name`, `D_Price`, `menu_ID`) VALUES
('D01', 'มะนาวโซดา', 40, '002'),
('D02', 'นมชมพู', 40, '002'),
('D03', 'ชาไทย', 40, '002');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `F_ID` char(6) NOT NULL,
  `F_Name` varchar(30) NOT NULL,
  `F_price` int(4) NOT NULL,
  `menu_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`F_ID`, `F_Name`, `F_price`, `menu_ID`) VALUES
('F01', 'เตี๋ยวแห้ง', 45, '001'),
('F02', 'เตี๋ยวต้มส้ม', 45, '001'),
('F03', 'ผัดซีอิ้วหมู', 50, '001');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_ID` char(6) NOT NULL,
  `menu_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_ID`, `menu_Name`) VALUES
('001', 'อาหาร'),
('002', 'เครื่องดื่ม');

-- --------------------------------------------------------

--
-- Table structure for table `orderd_detail`
--

CREATE TABLE `orderd_detail` (
  `order_ID` char(6) NOT NULL,
  `D_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderd_detail`
--

INSERT INTO `orderd_detail` (`order_ID`, `D_ID`) VALUES
('000192', 'D01'),
('000192', 'D02'),
('000001', 'D03');

-- --------------------------------------------------------

--
-- Table structure for table `orderf_detail`
--

CREATE TABLE `orderf_detail` (
  `order_ID` char(6) NOT NULL,
  `F_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderf_detail`
--

INSERT INTO `orderf_detail` (`order_ID`, `F_ID`) VALUES
('000192', 'F01'),
('000192', 'F02'),
('000192', 'F03'),
('000001', 'F03');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` char(6) NOT NULL,
  `cus_ID` char(6) NOT NULL,
  `order_Date` date NOT NULL,
  `order_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `cus_ID`, `order_Date`, `order_Time`) VALUES
('000001', 'CT 2', '2021-10-27', '09:09:00'),
('000192', 'CT 1', '2023-03-12', '00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_ID`);

--
-- Indexes for table `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`D_ID`),
  ADD KEY `menu_ID` (`menu_ID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`F_ID`),
  ADD KEY `menu_ID` (`menu_ID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_ID`);

--
-- Indexes for table `orderd_detail`
--
ALTER TABLE `orderd_detail`
  ADD KEY `D_ID` (`D_ID`),
  ADD KEY `order_ID` (`order_ID`);

--
-- Indexes for table `orderf_detail`
--
ALTER TABLE `orderf_detail`
  ADD KEY `F_ID` (`F_ID`),
  ADD KEY `order_ID` (`order_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `cus_ID` (`cus_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drink`
--
ALTER TABLE `drink`
  ADD CONSTRAINT `drink_ibfk_1` FOREIGN KEY (`menu_ID`) REFERENCES `menu` (`menu_ID`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`menu_ID`) REFERENCES `menu` (`menu_ID`);

--
-- Constraints for table `orderd_detail`
--
ALTER TABLE `orderd_detail`
  ADD CONSTRAINT `orderd_detail_ibfk_1` FOREIGN KEY (`D_ID`) REFERENCES `drink` (`D_ID`),
  ADD CONSTRAINT `orderd_detail_ibfk_2` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`);

--
-- Constraints for table `orderf_detail`
--
ALTER TABLE `orderf_detail`
  ADD CONSTRAINT `orderf_detail_ibfk_1` FOREIGN KEY (`F_ID`) REFERENCES `food` (`F_ID`),
  ADD CONSTRAINT `orderf_detail_ibfk_2` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cus_ID`) REFERENCES `customer` (`cus_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
