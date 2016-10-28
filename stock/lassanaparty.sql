-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2016 at 04:16 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lassanaparty`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(10) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Contact_Number` int(10) NOT NULL,
  `NIC` varchar(10) NOT NULL,
  `Email_Address` varchar(256) NOT NULL
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

CREATE TABLE `employee` (
  `Employee_ID` varchar(20) NOT NULL,
  `Employee_type` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Contact_Number` int(10) NOT NULL,
  `NIC` varchar(10) NOT NULL,
  `Address` varchar(256) NOT NULL,
  `Email_Address` varchar(256) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `Employee_type`, `Password`, `First_Name`, `Last_Name`, `Contact_Number`, `NIC`, `Address`, `Email_Address`, `Image`) VALUES
('C001', 'Clerk', '12345', 'Nuwan', 'Tharaka', 713245678, '934828930V', 'No:01, Padukka', 'nuwan.manche@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
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
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ava_no`, `Item_ID`, `Item_Type`, `Item_Name`, `Color`, `Date`, `Stock_Out`, `Stock_In`, `Unit_Price`, `Employee_ID`, `Image`) VALUES
(0, 'ch001', 'Chair', 'Tiffiny Chair', 'white', '2016-09-15', 50, 100, 70, 'C001', ''),
(1, 'ch001', 'Chair', 'Tiffiny Chair', 'white', '2016-09-15', 50, 100, 70, 'C001', '');

-- --------------------------------------------------------

--
-- Table structure for table `order1`
--

CREATE TABLE `order1` (
  `Reservation_ID` int(11) NOT NULL,
  `Item_ID` varchar(10) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `cnumber` int(10) NOT NULL,
  `items` varchar(200) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  `address` varchar(150) NOT NULL,
  `specialnotes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cname`, `cnumber`, `items`, `Quantity`, `date`, `time`, `city`, `address`, `specialnotes`) VALUES
(1, 'Maduka Silva', 715016234, 'ch001', 20, '2016/08/28', '12.00 pm', 'Colombo', 'University of Colombo', '2 black and 2 white'),
(2, 'Nimasha Jayathunga', 715974800, 'Tb 003', 4, '2016/08/29', '12.00pm', 'Galle', '45/1, galle', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Invoice_Number` varchar(10) NOT NULL,
  `Payment_Type` varchar(10) NOT NULL,
  `Advance_Payment` double NOT NULL,
  `Balance_Payment` double NOT NULL,
  `Reservation_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Reservation_ID` int(11) NOT NULL,
  `Location` varchar(30) NOT NULL,
  `Destination_Address` varchar(256) NOT NULL,
  `Amount` double NOT NULL,
  `Employee_ID` varchar(10) NOT NULL,
  `Customer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `Item_ID` varchar(10) NOT NULL,
  `Item_Name` varchar(50) NOT NULL,
  `Total_Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`Item_ID`, `Item_Name`, `Total_Stock`) VALUES
('ch001', '', 130),
('ch002', '', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `uid` int(11) NOT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `upass` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `uemail` varchar(70) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`uid`, `uname`, `upass`, `fullname`, `uemail`, `location`) VALUES
(2, 'nimasha', '827ccb0eea8a706c4c34a16891f84e7b', 'Nimasha Jayathunga', 'nimasha.jayathunga@gmail.com', 'images/nimasha.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Vehicle_ID` varchar(10) NOT NULL,
  `Vehicle_Type` varchar(10) NOT NULL,
  `Employee_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_allocation`
--

CREATE TABLE `vehicle_allocation` (
  `Reservation_ID` int(11) NOT NULL,
  `Vehicle_ID` varchar(10) NOT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ava_no`),
  ADD KEY `Employee_ID` (`Employee_ID`),
  ADD KEY `Item_ID` (`Item_ID`);

--
-- Indexes for table `order1`
--
ALTER TABLE `order1`
  ADD PRIMARY KEY (`Reservation_ID`,`Item_ID`),
  ADD KEY `Item_ID` (`Item_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Invoice_Number`),
  ADD KEY `Reservation_ID` (`Reservation_ID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Reservation_ID`),
  ADD KEY `Employee_ID` (`Employee_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`Item_ID`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uname` (`uname`,`uemail`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`Vehicle_ID`),
  ADD KEY `Employee_ID` (`Employee_ID`);

--
-- Indexes for table `vehicle_allocation`
--
ALTER TABLE `vehicle_allocation`
  ADD PRIMARY KEY (`Reservation_ID`,`Vehicle_ID`),
  ADD KEY `Vehicle_ID` (`Vehicle_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
