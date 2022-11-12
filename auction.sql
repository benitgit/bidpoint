-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 10:11 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_identification` int(11) NOT NULL,
  `account_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `amount`, `user_identification`, `account_number`) VALUES
(3, 300000000, 7, 'cdjj223nfjmeje334'),
(4, 300000000, 10, 'awaswedfrwsdf345'),
(5, 300000000, 11, '234ertgddfgtedew2'),
(6, 300000000, 13, 'sasdfr3456yghtyyyhjjhf'),
(7, 300000000, 9, 'wqw3f44555654ttdgdfgge');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `bid_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL,
  `bid_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`bid_id`, `pro_id`, `use_id`, `bid_amount`) VALUES
(7, 17, 11, 3000000),
(8, 17, 10, 4000000),
(10, 17, 13, 5000000),
(11, 1, 13, 8);

-- --------------------------------------------------------

--
-- Table structure for table `gasproduct`
--

CREATE TABLE `gasproduct` (
  `g_id` int(11) NOT NULL,
  `gasname` varchar(30) NOT NULL,
  `weight` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `message` varchar(255) NOT NULL,
  `product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender`, `receiver`, `message`, `product`) VALUES
(1, '13', '7', 'Admin there is a new order From benitha', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `o_content` varchar(20) NOT NULL,
  `proid` int(11) NOT NULL,
  `o_status` varchar(20) NOT NULL,
  `u_id` int(11) NOT NULL,
  `soldon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `o_content`, `proid`, `o_status`, `u_id`, `soldon`) VALUES
(1, 'Gas Stove', 3, 'seen', 13, '2016-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payed_cash` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `pdate` date NOT NULL,
  `minbid` int(11) NOT NULL,
  `ptype` varchar(30) NOT NULL,
  `pdesc` varchar(1000) NOT NULL,
  `pstatus` varchar(30) NOT NULL,
  `pic1` varchar(100) NOT NULL,
  `pic2` varchar(100) NOT NULL,
  `pic3` varchar(100) NOT NULL,
  `pic4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `pdate`, `minbid`, `ptype`, `pdesc`, `pstatus`, `pic1`, `pic2`, `pic3`, `pic4`) VALUES
(1, 'SP gas can ', '2016-12-20', 120000, '12KG Gas can', 'test', '', '2016-12-09/IMG-20161207-WA0038.jpg', '2016-12-09/IMG-20161207-WA0036.jpg', '2016-12-09/IMG-20161207-WA0035.jpg', '2016-12-09/IMG-20161207-WA0037.jpg'),
(3, 'Gas Stove', '2032-11-24', 30000, '2 Plate', 'gas stove made in germany and can handle house made material works', 'sold', '2016-12-11/IMG-20161207-WA0030.jpg', '2016-12-11/IMG-20161207-WA0038.jpg', '2016-12-11/IMG-20161207-WA0036.jpg', '2016-12-11/IMG-20161207-WA0036.jpg'),
(4, 'Pipe', '2017-12-14', 4000, 'Others', 'Made in Kampala and is brand new and very reliable', '', '2016-12-11/IMG-20161207-WA0032.jpg', '2016-12-11/need_for_speed_most_wanted-wallpaper-1366x768.jpg', '2016-12-11/world_of_warcraft___horde_sign-wallpaper-1366x768.jpg', '2016-12-11/white_bengal_tiger-wallpaper-1366x768.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `address` varchar(40) NOT NULL,
  `tel` int(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `access_level` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(8) NOT NULL,
  `idnum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `fname`, `lname`, `address`, `tel`, `password`, `access_level`, `gender`, `email`, `status`, `idnum`) VALUES
(7, 'ingabire', 'elsi', 'kicukiro', 788491083, '1234', 'admin', 'Male', 'elsie@gmail.com', 'unlock', 0),
(10, 'batman', 'papa', 'kicukiro', 788492383, '234', '', 'Male', 'cyusa@gmail.com', 'unlocked', 0),
(11, 'luther', 'papa', 'kicukiro', 788492383, '123', '', 'Male', 'cyusa@gmail.com', 'unlocked', 0),
(13, 'benitha', 'shema', 'kicukiro', 788492333, '1234', '', 'Male', 'benit@gmail.com', 'unlocked', 0),
(15, 'Secyiza', 'Fridoline', 'Kicukiro', 920909203, '123', '', 'Male', 'cyu@gmail.com', 'unlocked', 2147483647),
(16, 'Nzeyimana', 'Emmy', 'Kicukiro-Kanombe', 788368333, '123', '', 'Male', 'Emmy24@gmail.com', 'unlocked', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`),
  ADD KEY `user_identification` (`user_identification`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`bid_id`),
  ADD KEY `use_id` (`use_id`);

--
-- Indexes for table `gasproduct`
--
ALTER TABLE `gasproduct`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `proid` (`proid`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `gasproduct`
--
ALTER TABLE `gasproduct`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`product`) REFERENCES `product` (`pid`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`proid`) REFERENCES `product` (`pid`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
