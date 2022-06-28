-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 10:41 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pss_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pss_accounts`
--

CREATE TABLE `pss_accounts` (
  `id` int(20) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pss_accounts`
--

INSERT INTO `pss_accounts` (`id`, `full_name`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `pss_packinglist`
--

CREATE TABLE `pss_packinglist` (
  `id` int(20) NOT NULL,
  `parts_name` varchar(50) NOT NULL,
  `description` varchar(20) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `pallet` varchar(50) NOT NULL,
  `no_of_boxes` varchar(50) NOT NULL,
  `measurement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pss_packinglist`
--

INSERT INTO `pss_packinglist` (`id`, `parts_name`, `description`, `qty`, `pallet`, `no_of_boxes`, `measurement`) VALUES
(17, 'PR-76R30-FALP ', 'Protector', '69', 'M5-0017', '20', '1.21'),
(20, 'COH-74P10-2', 'Connector', '1920', 'palletdaw', '78', '1.21');

-- --------------------------------------------------------

--
-- Table structure for table `pss_po_details`
--

CREATE TABLE `pss_po_details` (
  `id` int(11) NOT NULL,
  `po_num` varchar(30) DEFAULT NULL,
  `parts_code` varchar(7) DEFAULT NULL,
  `parts_name` varchar(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `supplier_code` varchar(50) DEFAULT NULL,
  `customer_code` varchar(7) NOT NULL,
  `quantity` varchar(10) DEFAULT NULL,
  `shipping_mode` varchar(5) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pss_po_details`
--

INSERT INTO `pss_po_details` (`id`, `po_num`, `parts_code`, `parts_name`, `description`, `supplier_code`, `customer_code`, `quantity`, `shipping_mode`, `Status`) VALUES
(4, 'P22-013-FALP', '00AWR ', 'PR-76R30-FALP ', 'Protector', 'PIMES', 'FAS', '69', 'AIR', 'Transact'),
(7, 'P22-013-FALP', '01WTK', 'COH-74P10-2', 'Connector', 'PIMES', 'FAS', '1920', 'AIR', 'Transact');

-- --------------------------------------------------------

--
-- Table structure for table `pss_set_invoice`
--

CREATE TABLE `pss_set_invoice` (
  `id` int(50) NOT NULL,
  `invoice_count` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pss_set_invoice`
--

INSERT INTO `pss_set_invoice` (`id`, `invoice_count`) VALUES
(1, '00000');

-- --------------------------------------------------------

--
-- Table structure for table `pss_stocks`
--

CREATE TABLE `pss_stocks` (
  `id` int(11) NOT NULL,
  `parts_code` varchar(50) DEFAULT NULL,
  `parts_name` varchar(20) DEFAULT NULL,
  `supplier_code` varchar(20) DEFAULT NULL,
  `description` varchar(12) NOT NULL,
  `qty_per_box` int(11) NOT NULL,
  `net` varchar(11) NOT NULL,
  `box_weight` varchar(11) NOT NULL,
  `gross` varchar(11) NOT NULL,
  `remaining_stck` varchar(20) DEFAULT NULL,
  `unit` varchar(5) DEFAULT NULL,
  `customer_unit_price` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `date_registered` varchar(50) DEFAULT NULL,
  `date_updated` varchar(50) DEFAULT NULL,
  `customer_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pss_stocks`
--

INSERT INTO `pss_stocks` (`id`, `parts_code`, `parts_name`, `supplier_code`, `description`, `qty_per_box`, `net`, `box_weight`, `gross`, `remaining_stck`, `unit`, `customer_unit_price`, `total_amount`, `date_registered`, `date_updated`, `customer_code`) VALUES
(4, '007KS', 'DA-584-B-FALP', 'BIG PH', 'Clip', 120, '0.02325', '0.005', '', '100', 'pcs', 1000, NULL, '2022-06-17', '2022-06-17', 'FAS'),
(5, '007KS', 'DA-584-B-FALP', 'BIG PH', 'Clip', 120, '0.02325', '0.005', '', '100', 'pcs', NULL, NULL, '2022-06-17', NULL, 'FAPV'),
(6, '007KS', 'DA-584-B-FALP', 'BIG PH', 'Clip', 120, '0.02325', '0.005', '', '100', 'pcs', NULL, NULL, '2022-06-17', NULL, 'FAVV'),
(7, ' 00AWR ', 'PR-76R30-FALP ', 'PIMES', 'Protector', 60, '0.04732', '0.016666667', '', '500', 'pcs', NULL, NULL, '2022-06-21', '2022-06-24', 'FAS'),
(8, ' 00AWR ', 'PR-76R30-FALP ', 'PIMES', 'Protector', 60, '0.04732', '0.016666667', '', '500', 'pcs', NULL, NULL, '2022-06-21', '2022-06-24', 'FAPV'),
(9, ' 00AWR ', 'PR-76R30-FALP ', 'PIMES', 'Protector', 60, '0.04732', '0.016666667', '', '500', 'pcs', 69000, NULL, '2022-06-21', '2022-06-24', 'FAVV'),
(10, '00ATD', 'PR-142T20A-FALP', 'BIG PH', 'Protector', 60, '0.03159', '0.002', '', '500', 'pcs', 1000, NULL, '2022-06-24', '2022-06-24', 'FAS'),
(11, '00ATD', 'PR-142T20A-FALP', 'BIG PH', 'Protector', 60, '0.03159', '0.002', '', '500', 'pcs', NULL, NULL, '2022-06-24', NULL, 'FAPV'),
(12, '00ATD', 'PR-142T20A-FALP', 'BIG PH', 'Protector', 60, '0.03159', '0.002', '', '500', 'pcs', NULL, NULL, '2022-06-24', NULL, 'FAVV'),
(13, '01WTK', 'COH-74P10-2', 'PIMES', 'Connector', 60, '0.029', '0.0068', '', '6080', 'pcs', NULL, NULL, '2022-06-24', '2022-06-24', 'FAS'),
(14, '01WTK', 'COH-74P10-2', 'PIMES', 'Connector', 60, '0.029', '0.0068', '', '6080', 'pcs', NULL, NULL, '2022-06-24', '2022-06-24', 'FAPV'),
(15, '01WTK', 'COH-74P10-2', 'PIMES', 'Connector', 60, '0.029', '0.0068', '', '6080', 'pcs', NULL, NULL, '2022-06-24', '2022-06-24', 'FAVV');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pss_accounts`
--
ALTER TABLE `pss_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pss_packinglist`
--
ALTER TABLE `pss_packinglist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pss_po_details`
--
ALTER TABLE `pss_po_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pss_set_invoice`
--
ALTER TABLE `pss_set_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pss_stocks`
--
ALTER TABLE `pss_stocks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pss_accounts`
--
ALTER TABLE `pss_accounts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pss_packinglist`
--
ALTER TABLE `pss_packinglist`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pss_po_details`
--
ALTER TABLE `pss_po_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pss_set_invoice`
--
ALTER TABLE `pss_set_invoice`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pss_stocks`
--
ALTER TABLE `pss_stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
