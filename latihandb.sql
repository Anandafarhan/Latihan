-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 12, 2021 at 08:43 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `CategoryId` int(4) NOT NULL,
  `CategoryName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`CategoryId`, `CategoryName`) VALUES
(1, 'CPU'),
(2, 'Graphics Card'),
(3, 'Case'),
(4, 'Aasjlkas'),
(5, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE `productlist` (
  `ProductName` varchar(50) NOT NULL,
  `SKU` varchar(20) NOT NULL,
  `Stock` int(4) NOT NULL,
  `CategoryId` int(4) NOT NULL,
  `SupplierId` int(10) NOT NULL,
  `CostPrice` int(10) NOT NULL,
  `SalePrice` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`ProductName`, `SKU`, `Stock`, `CategoryId`, `SupplierId`, `CostPrice`, `SalePrice`) VALUES
('Ryzen 5', 'AMD-R5', 10, 1, 1, 3000000, 3500000),
('Ryzen 7', 'AMD-R7', 12, 1, 1, 4800000, 5000000),
('Ryzen 9', 'AMD-R9', 20, 1, 1, 6000000, 6500000);

-- --------------------------------------------------------

--
-- Table structure for table `supplierlist`
--

CREATE TABLE `supplierlist` (
  `SupplierId` int(4) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `ContactName` varchar(30) NOT NULL,
  `Address` varchar(254) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Website` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplierlist`
--

INSERT INTO `supplierlist` (`SupplierId`, `CompanyName`, `ContactName`, `Address`, `Email`, `Phone`, `Website`) VALUES
(1, 'ABC', 'User', 'ABC Street', 'abc@corp.com', '1231231231', 'abc.xyz'),
(2, 'ABCD', 'Alpha', 'Beta Street', 'abc@corp.com', '123', 'abc.xyz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `productlist`
--
ALTER TABLE `productlist`
  ADD PRIMARY KEY (`SKU`);

--
-- Indexes for table `supplierlist`
--
ALTER TABLE `supplierlist`
  ADD PRIMARY KEY (`SupplierId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `CategoryId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplierlist`
--
ALTER TABLE `supplierlist`
  MODIFY `SupplierId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
