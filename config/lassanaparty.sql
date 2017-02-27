-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2017 at 04:25 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lassanaparty`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `Comments` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `Name`, `Email`, `subject`, `Comments`) VALUES
(1, 'Kalani Nanayakkara', 'kala@gmail.com', 'Good items', 'Had a good event! Thank you!'),
(2, 'mad', 'desilvamadhuka@gmail.com', 'Bad chairs', 'Some were defect');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `Customer_ID` int(10) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Contact_Number` int(10) NOT NULL,
  `NIC` varchar(10) NOT NULL,
  `Email_Address` varchar(256) NOT NULL,
  PRIMARY KEY (`Customer_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `First_Name`, `Last_Name`, `Contact_Number`, `NIC`, `Email_Address`) VALUES
(1, 'Nimasha', 'Jayathunga', 715914800, '935802458V', 'nimasha.jayathunga@gmail.com'),
(2, 'Madhuka', 'Silve', 712456789, '93546783V', 'madsila@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `Employee_ID` varchar(20) NOT NULL,
  `Employee_type` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Contact_Number` int(10) NOT NULL,
  `NIC` varchar(10) NOT NULL,
  `Address` varchar(256) NOT NULL,
  `Email_Address` varchar(256) NOT NULL,
  `Image` varchar(100) NOT NULL,
  PRIMARY KEY (`Employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `Employee_type`, `Password`, `First_Name`, `Last_Name`, `Contact_Number`, `NIC`, `Address`, `Email_Address`, `Image`) VALUES
('C001', 'Clerk', '12345', 'Nuwan', 'Tharaka', 713245678, '934828930V', 'No:01, Padukka', 'nuwan.manche@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `Gallery_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`Gallery_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`Gallery_ID`, `Title`, `image`) VALUES
(1, 'Formal Gathering', '../assets/img/website/gallery/official.jpg'),
(4, 'Party Outdoor', '../assets/img/website/gallery/party.jpg'),
(5, 'Wedding Reception', '../assets/img/website/gallery/wedding.jpg'),
(6, 'Beach Wedding', '../assets/img/website/gallery/dummy1.jpg'),
(7, 'Banquet Wedding', '../assets/img/website/gallery/dummy2.jpg'),
(8, 'Church Wedding', '../assets/img/website/gallery/dummy3.jpg'),
(9, 'Beach Wedding', '../assets/img/website/gallery/dummy4.jpg'),
(10, 'Beach Wedding', '../assets/img/website/gallery/dummy5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `ava_no` int(11) NOT NULL,
  `Item_ID` varchar(10) NOT NULL,
  `Item_Type` varchar(10) NOT NULL,
  `Item_Name` varchar(30) NOT NULL,
  `Color` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `Stock_Out` int(11) NOT NULL,
  `Stock_In` int(11) NOT NULL,
  `Unit_Price` double NOT NULL,
  `Employee_ID` varchar(10) NOT NULL,
  `Image` varchar(100) NOT NULL,
  PRIMARY KEY (`ava_no`),
  KEY `Employee_ID` (`Employee_ID`),
  KEY `Item_ID` (`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ava_no`, `Item_ID`, `Item_Type`, `Item_Name`, `Color`, `Date`, `Stock_Out`, `Stock_In`, `Unit_Price`, `Employee_ID`, `Image`) VALUES
(0, 'ch001', 'Chair', 'Tiffiny Chair', 'white', '2016-09-15', 50, 100, 70, 'C001', ''),
(1, 'ch001', 'Chair', 'Tiffiny Chair', 'white', '2016-09-15', 50, 100, 70, 'C001', '');

-- --------------------------------------------------------

--
-- Table structure for table `month_summary`
--

CREATE TABLE IF NOT EXISTS `month_summary` (
  `month` varchar(15) NOT NULL,
  `number_of_orders` int(11) NOT NULL,
  `total_sales` float NOT NULL,
  PRIMARY KEY (`month`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month_summary`
--

INSERT INTO `month_summary` (`month`, `number_of_orders`, `total_sales`) VALUES
('2017-02', 1, 6900);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `id` int(30) NOT NULL,
  `title` varchar(20) NOT NULL,
  `details` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `details`) VALUES
(1, 'Seasonal!', '20% for celebrating new year 2017!'),
(2, 'GRAND offer!', '50% off for glassware this month'),
(3, 'Priviledge offer!', '20% off for loyalty purchases');

-- --------------------------------------------------------

--
-- Table structure for table `order1`
--

CREATE TABLE IF NOT EXISTS `order1` (
  `Reservation_ID` int(11) NOT NULL,
  `Item_ID` varchar(10) NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`Reservation_ID`,`Item_ID`),
  KEY `Item_ID` (`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(10) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `cnumber` int(10) NOT NULL,
  `items` varchar(200) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(20) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `address` varchar(150) NOT NULL,
  `specialnotes` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cname`, `cnumber`, `items`, `Quantity`, `date`, `time`, `city`, `address`, `specialnotes`) VALUES
(1, 'Maduka Silva', 715016234, 'ch001', 20, '2016/08/28', '12.00 pm', 'Colombo', 'University of Colombo', '2 black and 2 white'),
(2, 'Nimasha Jayathunga', 715974800, 'Tb 003', 4, '2016/08/29', '12.00pm', 'Galle', '45/1, galle', ''),
(21, 'Kasun Silva', 71865232, NULL, NULL, '2017-02-15', NULL, 'Kegalle', 'No1343,dfdsf ', NULL),
(23, 'MT De Silva ', 778057786, NULL, NULL, '2017-02-22', NULL, 'Colombo', '23,perera road,dehiwala', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_new`
--

CREATE TABLE IF NOT EXISTS `orders_new` (
  `ResID` int(20) NOT NULL,
  `CusName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `ConNum` int(11) NOT NULL,
  `ResDate` date NOT NULL,
  `Duration` int(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `Location` text NOT NULL,
  `TotalCost` double NOT NULL,
  `Labour_Charge` double DEFAULT NULL,
  `Delivery_Charge` double DEFAULT NULL,
  `Advance_Fee` double DEFAULT NULL,
  `Done` varchar(10) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`ResID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Details about tempory reservation.';

--
-- Dumping data for table `orders_new`
--

INSERT INTO `orders_new` (`ResID`, `CusName`, `Email`, `ConNum`, `ResDate`, `Duration`, `District`, `Location`, `TotalCost`, `Labour_Charge`, `Delivery_Charge`, `Advance_Fee`, `Done`) VALUES
(21, 'Kasun Silva', 'kasun@gmail.com', 71865232, '2017-02-15', 1, 'Kegalle', 'No1343,dfdsf ', 2900, 750, 1100, 1500, 'No'),
(23, 'MT De Silva ', 'desilvamadhuka@gmail.com', 778057786, '2017-02-22', 2, 'Colombo', '23,perera road,dehiwala', 4800, 1000, 800, 1200, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `Order_ID` int(10) NOT NULL,
  `Item_ID` varchar(10) NOT NULL,
  `Qty` int(10) NOT NULL,
  `UnitPrize` double NOT NULL,
  `SubTotal` double NOT NULL,
  `Res_Date` date NOT NULL,
  PRIMARY KEY (`Order_ID`,`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`Order_ID`, `Item_ID`, `Qty`, `UnitPrize`, `SubTotal`, `Res_Date`) VALUES
(1, 'ch001', 20, 0, 0, '2017-01-31'),
(21, 'ch001', 10, 50, 500, '2017-02-15'),
(21, 'ch002', 15, 60, 900, '2017-02-15'),
(21, 'ch003', 20, 75, 1500, '2017-02-15'),
(23, 'ch001', 12, 50, 600, '2017-02-22'),
(23, 'ch002', 20, 60, 1200, '2017-02-22'),
(23, 'ch003', 40, 75, 3000, '2017-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `Invoice_Number` varchar(10) NOT NULL,
  `Payment_Type` varchar(10) NOT NULL,
  `Advance_Payment` double NOT NULL,
  `Balance_Payment` double NOT NULL,
  `Reservation_ID` int(11) NOT NULL,
  PRIMARY KEY (`Invoice_Number`),
  KEY `Reservation_ID` (`Reservation_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `Reservation_ID` int(11) NOT NULL,
  `Location` varchar(30) NOT NULL,
  `Destination_Address` varchar(256) NOT NULL,
  `Amount` double NOT NULL,
  `Employee_ID` varchar(10) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  PRIMARY KEY (`Reservation_ID`),
  KEY `Employee_ID` (`Employee_ID`),
  KEY `Customer_ID` (`Customer_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `Item_ID` varchar(10) NOT NULL,
  `Item_Name` varchar(50) NOT NULL,
  `Item_Type` varchar(256) NOT NULL,
  `Unit_Price` double NOT NULL,
  `location` varchar(256) NOT NULL,
  `color` varchar(256) NOT NULL,
  `Total_Stock` int(255) NOT NULL,
  PRIMARY KEY (`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`Item_ID`, `Item_Name`, `Item_Type`, `Unit_Price`, `location`, `color`, `Total_Stock`) VALUES
('ch001', 'Banquet', 'Chair', 50, '../assets/img/website/stock/Banquet.png', 'White', 152),
('ch002', 'Official', 'Chair', 100, '../assets/img/website/stock/Official.png', 'Blue', 300),
('ch003', 'Banquet Gold', 'Chair', 150, '../assets/img/website/stock/BanquetGold.png', 'Red', 500),
('ch004', 'Stool High', 'Chair', 100, '../assets/img/website/stock/StoolHigh.png', 'Blue', 250),
('ch005', 'Stool Wooden', 'Chair', 150, '../assets/img/website/stock/StoolWooden.png', 'Red', 200),
('ch006', 'Wooden Cushion', 'Chair', 200, '../assets/img/website/stock/WoodenCushion.png', 'Yellow', 100),
('ch007', 'Plastic Red', 'Chair', 50, '../assets/img/website/stock/PlasticRed.png', 'Red', 300),
('ch008', 'Plastic Green', 'Chair', 100, '../assets/img/website/stock/PlasticGreen.png', 'Green', 100);

-- --------------------------------------------------------

--
-- Table structure for table `temp_res`
--

CREATE TABLE IF NOT EXISTS `temp_res` (
  `ResID` int(20) NOT NULL AUTO_INCREMENT,
  `CusName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `ConNum` int(11) NOT NULL,
  `ResDate` date NOT NULL,
  `Duration` int(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `Location` text NOT NULL,
  `TotalCost` double NOT NULL,
  `Labour_Charge` double DEFAULT NULL,
  `Delivery_Charge` double DEFAULT NULL,
  `Discount` double DEFAULT NULL,
  `Advance_Fee` double DEFAULT NULL,
  `Confirm` varchar(20) NOT NULL DEFAULT 'Not Decided',
  `Paid` varchar(20) NOT NULL DEFAULT 'not',
  `Cancelled` varchar(20) NOT NULL DEFAULT 'not',
  `AddToOrder` varchar(20) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`ResID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Details about tempory reservation.' AUTO_INCREMENT=32 ;

--
-- Dumping data for table `temp_res`
--

INSERT INTO `temp_res` (`ResID`, `CusName`, `Email`, `ConNum`, `ResDate`, `Duration`, `District`, `Location`, `TotalCost`, `Labour_Charge`, `Delivery_Charge`, `Discount`, `Advance_Fee`, `Confirm`, `Paid`, `Cancelled`, `AddToOrder`) VALUES
(23, 'MT De Silva ', 'desilvamadhuka@gmail.com', 778057786, '2017-02-22', 2, 'Colombo', '23,perera road,dehiwala', 4800, 400, 500, 200, 600, 'Cancelled', 'not', 'not', 'Yes'),
(21, 'Kasun Silva', 'kasun@gmail.com', 71865232, '2017-02-15', 1, 'Kegalle', 'No1343,dfdsf ', 2900, 750, 1100, NULL, 1500, 'Confirmed', 'Paid', 'not', 'Yes'),
(20, 'Nuwan Tharaka', 'mnuwantharaka@gmail.com', 1234535, '2017-01-28', 1, 'Galle', '123', 5425, 1350, 4500, 200, 1000, 'Confirmed', 'not', 'not', 'No'),
(25, 'e45e4', 'drterr', 25245245, '0000-00-00', 1, 'Hambantota', 'w45w45w4', 3600, NULL, NULL, NULL, NULL, 'Not Decided', 'not', 'not', 'No'),
(26, 'Kalani Nanayakkara', 'desilvamadhuka@yahoo.com', 778057786, '0000-00-00', 1, 'Colombo', '23,wawa road, Dehiwala', 3600, 100, 200, 360, 200, 'Not Decided', 'not', 'not', 'No'),
(27, 'Harsha Kasun', 'harsha@gmail.com', 778057786, '2017-01-23', 1, 'Gampaha', '24,ela para, Kaduwala', 8500, NULL, NULL, NULL, NULL, 'Not Decided', 'not', 'not', 'No'),
(28, 'Harsha Kasun', 'harsha@gmail.com', 778057786, '2017-01-23', 1, 'Gampaha', '24,ela para, Kaduwala', 8500, NULL, NULL, NULL, NULL, 'Not Decided', 'not', 'not', 'No'),
(29, 'Harsha Kasun', 'harsha@gmail.com', 778057786, '2017-01-23', 1, 'Gampaha', '24,ela para, Kaduwala', 8500, NULL, NULL, NULL, NULL, 'Not Decided', 'not', 'not', 'No'),
(30, 'Harsha Kasun', 'harsha@gmail.com', 778057786, '2017-01-23', 1, 'Gampaha', '24,ela para, Kaduwala', 8500, NULL, NULL, NULL, NULL, 'Not Decided', 'not', 'not', 'No'),
(31, 'MT de silva', 'desilvamadhuka@yahoo.com', 776945612, '2017-01-26', 1, 'Colombo', '23, Nawala, Rajagirya', 4100, NULL, NULL, NULL, NULL, 'Not Decided', 'not', 'not', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `temp_res_details`
--

CREATE TABLE IF NOT EXISTS `temp_res_details` (
  `ResID` int(20) NOT NULL,
  `ItemID` varchar(50) NOT NULL,
  `Qty` int(10) NOT NULL,
  `UnitPrize` double NOT NULL,
  `SubTotal` double NOT NULL,
  `ResDate` date NOT NULL,
  PRIMARY KEY (`ResID`,`ItemID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='item details about tem reservation.';

--
-- Dumping data for table `temp_res_details`
--

INSERT INTO `temp_res_details` (`ResID`, `ItemID`, `Qty`, `UnitPrize`, `SubTotal`, `ResDate`) VALUES
(23, 'ch003', 40, 75, 3000, '2017-02-22'),
(23, 'ch002', 20, 60, 1200, '2017-02-22'),
(23, 'ch001', 12, 50, 600, '2017-02-22'),
(21, 'ch003', 20, 75, 1500, '2017-02-15'),
(21, 'ch002', 15, 60, 900, '2017-02-15'),
(21, 'ch001', 10, 50, 500, '2017-02-15'),
(20, 'ch003', 35, 75, 2625, '2017-01-28'),
(20, 'ch002', 30, 60, 1800, '2017-01-28'),
(20, 'ch001', 20, 50, 1000, '2017-01-28'),
(25, 'ch001', 12, 50, 600, '0000-00-00'),
(25, 'ch002', 12, 250, 3000, '0000-00-00'),
(26, 'ch001', 12, 50, 600, '0000-00-00'),
(26, 'ch002', 12, 250, 3000, '0000-00-00'),
(27, 'ch001', 20, 50, 1000, '2017-01-23'),
(27, 'ch002', 30, 250, 7500, '2017-01-23'),
(28, 'ch001', 20, 50, 1000, '2017-01-23'),
(28, 'ch002', 30, 250, 7500, '2017-01-23'),
(29, 'ch001', 20, 50, 1000, '2017-01-23'),
(29, 'ch002', 30, 250, 7500, '2017-01-23'),
(30, 'ch001', 20, 50, 1000, '2017-01-23'),
(30, 'ch002', 30, 250, 7500, '2017-01-23'),
(31, 'ch001', 2, 50, 100, '2017-01-26'),
(31, 'ch002', 10, 100, 1000, '2017-01-26'),
(31, 'ch005', 20, 150, 3000, '2017-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE IF NOT EXISTS `users1` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `employee_type` varchar(30) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `fullname` varchar(100) NOT NULL,
  `contact` int(10) NOT NULL,
  `NIC` varchar(10) DEFAULT NULL,
  `Address` varchar(75) NOT NULL,
  `uemail` varchar(70) NOT NULL,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uname` (`uname`,`uemail`),
  KEY `NIC` (`NIC`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`uid`, `employee_type`, `upass`, `uname`, `fullname`, `contact`, `NIC`, `Address`, `uemail`, `location`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'lasantha', 'lasantha malavige', 1234556778, NULL, 'fdgdfhdhd', 'lasantha@gmail.com', '../assets/img/users/lasantha.png'),
(2, 'stock', '827ccb0eea8a706c4c34a16891f84e7b', 'nimasha', 'Nimasha Jayathunga', 0, NULL, '', 'nimasha.jayathunga@gmail.com', '../assets/img/users/nimasha.png'),
(3, 'clerk', '827ccb0eea8a706c4c34a16891f84e7b', 'upeksha', 'Upeksha Silva', 0, NULL, '', 'upeksha@gmail.com', '../assets/img/users/upeksha.png'),
(4, 'clerk', '827ccb0eea8a706c4c34a16891f84e7b', 'mad', 'Madhuka De Silva', 778057786, '936070140V', 'vvvvvvvvvv', 'desilvamadhuka@yahoo.com', '../assets/img/users/Madhuka.png');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `Vehicle_ID` varchar(10) NOT NULL,
  `Vehicle_Type` varchar(10) NOT NULL,
  `Employee_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`Vehicle_ID`),
  KEY `Employee_ID` (`Employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_allocation`
--

CREATE TABLE IF NOT EXISTS `vehicle_allocation` (
  `Reservation_ID` int(11) NOT NULL,
  `Vehicle_ID` varchar(10) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`Reservation_ID`,`Vehicle_ID`),
  KEY `Vehicle_ID` (`Vehicle_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `year_summary`
--

CREATE TABLE IF NOT EXISTS `year_summary` (
  `year` int(11) NOT NULL,
  `number_of_orders` int(11) NOT NULL,
  `total_sales` float NOT NULL,
  PRIMARY KEY (`year`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year_summary`
--

INSERT INTO `year_summary` (`year`, `number_of_orders`, `total_sales`) VALUES
(2017, 1, 6900);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`Item_ID`) REFERENCES `stock` (`Item_ID`);

--
-- Constraints for table `order1`
--
ALTER TABLE `order1`
  ADD CONSTRAINT `order1_ibfk_1` FOREIGN KEY (`Reservation_ID`) REFERENCES `reservation` (`Reservation_ID`),
  ADD CONSTRAINT `order1_ibfk_2` FOREIGN KEY (`Item_ID`) REFERENCES `stock` (`Item_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Reservation_ID`) REFERENCES `reservation` (`Reservation_ID`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`);

--
-- Constraints for table `vehicle_allocation`
--
ALTER TABLE `vehicle_allocation`
  ADD CONSTRAINT `vehicle_allocation_ibfk_1` FOREIGN KEY (`Vehicle_ID`) REFERENCES `vehicle` (`Vehicle_ID`),
  ADD CONSTRAINT `vehicle_allocation_ibfk_2` FOREIGN KEY (`Reservation_ID`) REFERENCES `reservation` (`Reservation_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
