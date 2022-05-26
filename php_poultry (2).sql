-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 12:16 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_poultry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_breed`
--

CREATE TABLE `tbl_breed` (
  `Breed_Id` int(10) NOT NULL,
  `Breed_Type` varchar(20) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_breed`
--

INSERT INTO `tbl_breed` (`Breed_Id`, `Breed_Type`, `Status`) VALUES
(1, 'Gramasri', 1),
(2, 'Giriraja', 0),
(3, 'Saaso', 0),
(4, 'Indbro', 0),
(5, 'BV380', 0),
(6, 'Kalinga Brown', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `Category_Id` int(10) NOT NULL,
  `Category_name` varchar(50) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`Category_Id`, `Category_name`, `Status`) VALUES
(1, 'Breeds', 0),
(2, 'Eggs', 0),
(3, 'Feeds', 0),
(4, 'Cages', 0),
(5, 'Medicine', 0),
(6, 'Vaccine', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chickrate`
--

CREATE TABLE `tbl_chickrate` (
  `Rate_Id` int(10) NOT NULL,
  `Rate_Date` date NOT NULL,
  `Rate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chickrate`
--

INSERT INTO `tbl_chickrate` (`Rate_Id`, `Rate_Date`, `Rate`) VALUES
(1, '2022-02-26', 58),
(2, '2022-02-26', 60),
(3, '2022-03-03', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `start` datetime(6) NOT NULL,
  `end` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `title`, `start`, `end`) VALUES
(1, 'Meet Guide', '2022-03-30 00:00:00.000000', '2022-03-31 00:00:00.000000'),
(2, 'bjbh', '2022-03-04 00:00:00.000000', '2022-03-05 00:00:00.000000'),
(3, 'Birthday', '2022-04-08 00:00:00.000000', '2022-04-09 00:00:00.000000'),
(4, 'Odus Birthdy', '2022-05-08 00:00:00.000000', '2022-05-09 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feed`
--

CREATE TABLE `tbl_feed` (
  `Feed_Id` int(10) NOT NULL,
  `Feed_Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feed`
--

INSERT INTO `tbl_feed` (`Feed_Id`, `Feed_Type`) VALUES
(1, 'Layer Mash'),
(2, 'Layer Grower'),
(3, 'Layer Pellet'),
(4, 'Layer Starter'),
(5, 'Layer Chick'),
(6, 'Quil Crumble');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `Order_Id` int(10) NOT NULL,
  `User_Id` int(10) DEFAULT NULL,
  `Product_Id` int(10) DEFAULT NULL,
  `Quantity` int(10) DEFAULT NULL,
  `OrderDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `PaymentMethod` varchar(10) DEFAULT NULL,
  `OrderStatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`Order_Id`, `User_Id`, `Product_Id`, `Quantity`, `OrderDate`, `PaymentMethod`, `OrderStatus`) VALUES
(1, 1, 40, 1, '2022-04-11 14:58:34.607529', 'Debit / Cr', ''),
(2, 1, 41, 1, '2022-04-11 14:58:34.607529', 'Debit / Cr', ''),
(3, 1, 42, 1, '2022-04-11 14:58:34.607529', 'Debit / Cr', ''),
(4, 1, 40, 1, '2022-04-11 15:02:56.784802', '', ''),
(5, 1, 41, 3, '2022-04-11 15:03:34.556093', '', ''),
(6, 1, 42, 1, '2022-04-11 15:04:53.376918', '', ''),
(7, 1, 41, 1, '2022-04-11 15:09:53.795649', 'COD', NULL),
(8, 1, 42, 1, '2022-04-12 03:24:11.131347', 'COD', NULL),
(9, 1, 42, 1, '2022-04-12 05:21:42.939663', 'COD', NULL),
(10, 1, 46, 1, '2022-05-03 05:30:25.248615', 'COD', NULL),
(11, 1, 40, 1, '2022-05-04 03:44:50.533935', 'Debit / Cr', NULL),
(12, 1, 41, 1, '2022-05-04 03:44:50.533935', 'Debit / Cr', NULL),
(13, 1, 44, 1, '2022-05-04 06:31:53.671227', 'Debit / Cr', NULL),
(14, 1, 44, 1, '2022-05-04 06:31:53.671227', 'Debit / Cr', NULL),
(15, 1, 44, 1, '2022-05-04 06:31:53.671227', 'Debit / Cr', NULL),
(16, 1, 41, 1, '2022-05-04 06:38:31.187537', 'Debit / Cr', NULL),
(17, 1, 40, 1, '2022-05-04 06:50:45.585607', 'Debit / Cr', NULL),
(18, 1, 40, 1, '2022-05-04 09:08:17.944904', '', NULL),
(19, 1, 41, 1, '2022-05-04 09:09:28.740767', 'Debit / Cr', NULL),
(20, 1, 40, 1, '2022-05-04 09:41:03.609032', 'Debit / Cr', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ordertrackhistory`
--

CREATE TABLE `tbl_ordertrackhistory` (
  `Track_Id` int(10) NOT NULL,
  `Order_Id` int(10) NOT NULL,
  `Status` tinyint(2) NOT NULL,
  `Remark` varchar(50) NOT NULL,
  `PostingDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ordertrackhistory`
--

INSERT INTO `tbl_ordertrackhistory` (`Track_Id`, `Order_Id`, `Status`, `Remark`, `PostingDate`) VALUES
(1, 0, 0, 'nxs', '2022-05-03 11:33:46.267493'),
(2, 0, 0, 'bnn', '2022-05-04 09:12:51.425650');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productreviews`
--

CREATE TABLE `tbl_productreviews` (
  `Review_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Quality` int(10) NOT NULL,
  `Price` int(10) NOT NULL,
  `Value` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Summary` varchar(50) NOT NULL,
  `Review` longtext NOT NULL,
  `ReviewDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_productreviews`
--

INSERT INTO `tbl_productreviews` (`Review_Id`, `Product_Id`, `Quality`, `Price`, `Value`, `Name`, `Summary`, `Review`, `ReviewDate`) VALUES
(1, 40, 4, 4, 4, 'Jinta Susan Mathew', 'Good', 'Good', '2022-04-11 16:11:01.947085');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(10) NOT NULL,
  `Category_Id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `productDescription` varchar(100) NOT NULL,
  `code` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `productPriceBeforeDiscount` int(10) NOT NULL,
  `productShippingcharge` int(10) NOT NULL,
  `productPrice` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `productAvailability` varchar(10) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `Category_Id`, `name`, `productDescription`, `code`, `image`, `productPriceBeforeDiscount`, `productShippingcharge`, `productPrice`, `quantity`, `productAvailability`, `Status`) VALUES
(40, 1, 'Gramsri', 'gramsri', 'GRM1000', 'gramasri.jpg', 800, 20, 400, 4998, 'In Stock', 0),
(41, 2, 'Layer Eggs', 'layer egg', 'LAY1000', 'eggs.jpg', 12, 2, 8, 500, 'In Stock', 0),
(42, 1, 'Indbro', 'Indbro', 'IND2500', 'indbro.jpg', 800, 20, 500, 5000, 'In Stock', 0),
(44, 4, 'Single Cage', 'Cage', 'CAG1460', 'singlecage.jpg', 1500, 0, 1200, 100, 'In Stock', 0),
(45, 5, 'Eccoli Medicine', 'Medicine', 'ECC1000', 'med1.png', 80, 20, 50, 500, 'In Stock', 0),
(46, 6, 'Vaccine Hepti', 'Vaccine', 'VAC1000', 'vacc1.jpg', 100, 20, 50, 500, 'In Stock', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `Type_Id` int(10) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`Type_Id`, `Type`, `Status`) VALUES
(1, 'Farmer', 1),
(2, 'Wholesaler', 0),
(3, 'Supplier', 0),
(4, 'Hatchery', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userlog`
--

CREATE TABLE `tbl_userlog` (
  `Userlog_Id` int(10) NOT NULL,
  `UserEmail` varchar(50) NOT NULL,
  `UserIp` binary(100) NOT NULL,
  `LoginTime` timestamp(6) NULL DEFAULT NULL,
  `Logout` varchar(100) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_userlog`
--

INSERT INTO `tbl_userlog` (`Userlog_Id`, `UserEmail`, `UserIp`, `LoginTime`, `Logout`, `Status`) VALUES
(1, 'jintasusanmathew10@gmail.com', 0x3a3a3100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, '2022-04-10 14:14:19.936376', '', 1),
(2, 'jintasusanmathew10@gmail.com', 0x3a3a3100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, '2022-04-11 05:17:47.919240', '', 1),
(3, 'jintasusanmathew10@gmail.com', 0x3a3a3100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, '2022-04-20 03:46:59.231790', '', 0),
(4, 'jintasusanmathew10@gmail.com', 0x3a3a3100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, '2022-04-20 03:47:13.435703', '', 1),
(5, 'jintasusanmathew10@gmail.com', 0x3a3a3100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, NULL, '', 1),
(6, 'jintasusanmathew10@gmail.com', 0x3a3a3100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, NULL, '', 1),
(7, 'jintasusanmathew10@gmail.com', 0x3a3a3100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, NULL, '', 1),
(8, 'jintasusanmathew10@gmail.com', 0x3a3a3100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, NULL, '', 1),
(9, 'jintasusanmathew10@gmail.com', 0x3a3a3100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, NULL, '', 1),
(10, 'jintasusanmathew10@gmail.com', 0x3a3a3100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, NULL, '', 1),
(11, 'jintasusanmathew10@gmail.com', 0x3a3a3100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, NULL, '', 1),
(12, 'jintasusanmathew10@gmail.com', 0x3a3a3100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `User_Id` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone_No` bigint(10) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `shippingAddress` varchar(100) NOT NULL,
  `shippingCity` varchar(10) NOT NULL,
  `shippingState` varchar(10) NOT NULL,
  `shippingPincode` int(10) NOT NULL,
  `billingAddress` varchar(50) NOT NULL,
  `billingCity` varchar(10) NOT NULL,
  `billingState` varchar(10) NOT NULL,
  `billingPincode` int(10) NOT NULL,
  `RegDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `UpdationDate` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`User_Id`, `Name`, `Email`, `Phone_No`, `Password`, `shippingAddress`, `shippingCity`, `shippingState`, `shippingPincode`, `billingAddress`, `billingCity`, `billingState`, `billingPincode`, `RegDate`, `UpdationDate`) VALUES
(1, 'Jinta Susan Mathew', 'jintasusanmathew10@gmail.com', 9845632102, 'Jinta@14', 'Pullolickal', 'Pathanmthi', 'Kerala', 689643, 'Madayikkal House, KalathuVayal PO, Ambalavayal,Way', 'Ambalavaya', 'Kerala', 673593, '2022-04-11 14:39:54.425111', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `Wishlist_Id` int(10) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Posting_Date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`Wishlist_Id`, `User_Id`, `Product_Id`, `Posting_Date`) VALUES
(3, 1, 2, '2022-04-10 15:07:43.462978'),
(4, 1, 2, '2022-04-10 15:07:57.493980'),
(6, 1, 1, '2022-04-10 15:13:21.657868'),
(7, 1, 1, '2022-04-10 15:13:39.393786'),
(9, 1, 2, '2022-04-10 15:14:06.196255'),
(11, 1, 2, '2022-04-10 15:19:00.398572'),
(13, 1, 1, '2022-04-10 15:22:09.684470'),
(15, 1, 1, '2022-04-11 05:18:33.475440'),
(16, 1, 1, '2022-04-11 05:18:54.484510');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_breed`
--
ALTER TABLE `tbl_breed`
  ADD PRIMARY KEY (`Breed_Id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `tbl_chickrate`
--
ALTER TABLE `tbl_chickrate`
  ADD PRIMARY KEY (`Rate_Id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feed`
--
ALTER TABLE `tbl_feed`
  ADD PRIMARY KEY (`Feed_Id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `tbl_ordertrackhistory`
--
ALTER TABLE `tbl_ordertrackhistory`
  ADD PRIMARY KEY (`Track_Id`);

--
-- Indexes for table `tbl_productreviews`
--
ALTER TABLE `tbl_productreviews`
  ADD PRIMARY KEY (`Review_Id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`Type_Id`);

--
-- Indexes for table `tbl_userlog`
--
ALTER TABLE `tbl_userlog`
  ADD PRIMARY KEY (`Userlog_Id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`User_Id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`Wishlist_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_breed`
--
ALTER TABLE `tbl_breed`
  MODIFY `Breed_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `Category_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_chickrate`
--
ALTER TABLE `tbl_chickrate`
  MODIFY `Rate_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_feed`
--
ALTER TABLE `tbl_feed`
  MODIFY `Feed_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `Order_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_ordertrackhistory`
--
ALTER TABLE `tbl_ordertrackhistory`
  MODIFY `Track_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_productreviews`
--
ALTER TABLE `tbl_productreviews`
  MODIFY `Review_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `Type_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_userlog`
--
ALTER TABLE `tbl_userlog`
  MODIFY `Userlog_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `User_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `Wishlist_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
