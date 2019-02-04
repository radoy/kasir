-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 01:38 PM
-- Server version: 5.7.18-log
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `levelId` int(11) NOT NULL,
  `levelNama` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`levelId`, `levelNama`) VALUES
(1, 'Administrator'),
(2, 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `masakan`
--

CREATE TABLE `masakan` (
  `masakanId` int(11) NOT NULL,
  `masakanNama` varchar(128) NOT NULL,
  `masakanHarga` double(10,2) NOT NULL,
  `masakanStatus` varchar(2) NOT NULL,
  `masakanTipe` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masakan`
--

INSERT INTO `masakan` (`masakanId`, `masakanNama`, `masakanHarga`, `masakanStatus`, `masakanTipe`) VALUES
(1, 'Ubi Goreng', 10000.00, '1', '1'),
(2, 'Indomie Kuah', 12000.00, '1', '1'),
(3, 'Nila Goreng', 18000.00, '0', '1'),
(4, 'Jus Jeruk', 12000.00, '1', '2'),
(5, 'Kangkung Seafood', 12000.00, '1', '1'),
(6, 'Jus Sirsak', 17000.00, '0', '2'),
(7, 'Nasi Goreng', 23000.00, '1', '1'),
(8, 'Teh Manis Dingin', 7000.00, '0', '2'),
(9, 'Wagyu Steak', 65000.99, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderId` int(11) NOT NULL,
  `orderNoMeja` varchar(5) NOT NULL,
  `orderTanggal` datetime NOT NULL,
  `orderUserId` int(11) NOT NULL,
  `orderKeterangan` text,
  `orderStatus` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderDetailId` int(11) NOT NULL,
  `orderDetailOrderId` int(11) NOT NULL,
  `orderDetailMasakanId` int(11) NOT NULL,
  `orderDetailKeterangan` text,
  `orderDetailStatus` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksiId` int(11) NOT NULL,
  `transaksiUserId` int(11) NOT NULL,
  `transaksiOrderId` int(11) NOT NULL,
  `transaksiTanggal` date NOT NULL,
  `transaksiTotal` double(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userLogin` varchar(30) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `userLevelId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userLogin`, `userPassword`, `userName`, `userLevelId`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator Aplikasia', 1),
(2, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Kasir', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`levelId`),
  ADD UNIQUE KEY `levelNama` (`levelNama`);

--
-- Indexes for table `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`masakanId`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `orderUserId` (`orderUserId`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderDetailId`),
  ADD KEY `orderDetailOrderId` (`orderDetailOrderId`),
  ADD KEY `orderDetailMasakanId` (`orderDetailMasakanId`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksiId`),
  ADD KEY `transaksiUserId` (`transaksiUserId`),
  ADD KEY `transaksiOrderId` (`transaksiOrderId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userLogin` (`userLogin`),
  ADD KEY `userLevelId` (`userLevelId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `levelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `masakan`
--
ALTER TABLE `masakan`
  MODIFY `masakanId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderDetailId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksiId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`orderUserId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`orderDetailOrderId`) REFERENCES `order` (`orderId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`orderDetailMasakanId`) REFERENCES `masakan` (`masakanId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`transaksiUserId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`transaksiOrderId`) REFERENCES `order` (`orderId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userLevelId`) REFERENCES `level` (`levelId`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
