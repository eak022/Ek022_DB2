-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 06:21 PM
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
-- Table structure for table `food_drink`
--

CREATE TABLE `food_drink` (
  `F_D_ID` char(6) NOT NULL,
  `F_Name` varchar(30) NOT NULL,
  `F_price` int(4) NOT NULL,
  `menu_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_drink`
--

INSERT INTO `food_drink` (`F_D_ID`, `F_Name`, `F_price`, `menu_ID`) VALUES
('D01', 'มะนาวโซดา', 40, '002'),
('D02', 'นมชมพูเย็น', 40, '002'),
('D03', 'ชาไทย', 40, '002'),
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

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_ID` char(6) NOT NULL,
  `F_D_ID` char(6) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_ID`, `F_D_ID`, `Quantity`) VALUES
('000192', 'F01', 1),
('000192', 'F02', 1),
('000192', 'F03', 1),
('000001', 'F03', 1),
('000192', 'D01', 1),
('000192', 'D02', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_ID`);

--
-- Indexes for table `food_drink`
--
ALTER TABLE `food_drink`
  ADD PRIMARY KEY (`F_D_ID`),
  ADD KEY `menu_ID` (`menu_ID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `cus_ID` (`cus_ID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `F_ID` (`F_D_ID`),
  ADD KEY `order_ID` (`order_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_drink`
--
ALTER TABLE `food_drink`
  ADD CONSTRAINT `food_drink_ibfk_1` FOREIGN KEY (`menu_ID`) REFERENCES `menu` (`menu_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cus_ID`) REFERENCES `customer` (`cus_ID`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`F_D_ID`) REFERENCES `food_drink` (`F_D_ID`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
