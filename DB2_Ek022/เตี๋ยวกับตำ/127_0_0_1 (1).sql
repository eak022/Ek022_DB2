-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 03:04 PM
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
  `menu_ID` char(6) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_drink`
--

INSERT INTO `food_drink` (`F_D_ID`, `F_Name`, `F_price`, `menu_ID`, `Image`) VALUES
('D01', 'มะนาวโซดา', 40, '002', '1.jpg'),
('D02', 'นมชมพูเย็น', 40, '002', '5.jpg'),
('D03', 'ชาไทย', 40, '002', '0.jpg'),
('F01', 'เตี๋ยวแห้ง', 45, '001', '2.jpg'),
('F02', 'เตี๋ยวต้มส้ม', 45, '001', '4.jpg'),
('F04', 'ผัดซีอิ๋ว', 40, '001', '3.jpg');

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
-- Constraints for dumped tables
--

--
-- Constraints for table `food_drink`
--
ALTER TABLE `food_drink`
  ADD CONSTRAINT `food_drink_ibfk_1` FOREIGN KEY (`menu_ID`) REFERENCES `menu` (`menu_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
