DROP TABLE IF EXISTS contact;

CREATE TABLE `contact` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `Comments` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO contact VALUES("1","mad","desilvamadhuka@gmail.com","lol","sghdgjfhxjmxfhkm");
INSERT INTO contact VALUES("2","mad","desilvamadhuka@gmail.com","fgkkl","glyfltkdjfs");
INSERT INTO contact VALUES("3","mad","desilvamadhuka@gmail.com","fgkkl","glyfltkdjfs");
INSERT INTO contact VALUES("4","mad","desilvamadhuka@gmail.com","fgkkl","glyfltkdjfs");
INSERT INTO contact VALUES("5","jdd","desilvamadhuka@yahoo.com","d","djdjd");
INSERT INTO contact VALUES("6","sff","desilvamadhuka@yahoo.com","dffd","");
INSERT INTO contact VALUES("7","asd","desilvamadhuka@yahoo.com","sad","");
INSERT INTO contact VALUES("8","ada","desilvamadhuka@yahoo.com","hhdh","");


DROP TABLE IF EXISTS customer;

CREATE TABLE `customer` (
  `Customer_ID` int(10) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Contact_Number` int(10) NOT NULL,
  `NIC` varchar(10) NOT NULL,
  `Email_Address` varchar(256) NOT NULL,
  PRIMARY KEY (`Customer_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO customer VALUES("1","Nimasha","Jayathunga","715914800","935802458V","nimasha.jayathunga@gmail.com");
INSERT INTO customer VALUES("2","Madhuka","Silve","712456789","93546783V","madsila@gmail.com");


DROP TABLE IF EXISTS employee;

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
  `Image` varchar(100) NOT NULL,
  PRIMARY KEY (`Employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO employee VALUES("C001","Clerk","12345","Nuwan","Tharaka","713245678","934828930V","No:01, Padukka","nuwan.manche@gmail.com","");


DROP TABLE IF EXISTS gallery;

CREATE TABLE `gallery` (
  `Gallery_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  `Description` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`Gallery_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO gallery VALUES("1","","0","");
INSERT INTO gallery VALUES("2","dssdgsg","0","");
INSERT INTO gallery VALUES("3","fdf","0","");


DROP TABLE IF EXISTS item;

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
  `Image` varchar(100) NOT NULL,
  PRIMARY KEY (`ava_no`),
  KEY `Employee_ID` (`Employee_ID`),
  KEY `Item_ID` (`Item_ID`),
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`),
  CONSTRAINT `item_ibfk_2` FOREIGN KEY (`Item_ID`) REFERENCES `stock` (`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO item VALUES("0","ch001","Chair","Tiffiny Chair","white","2016-09-15","50","100","70","C001","");
INSERT INTO item VALUES("1","ch001","Chair","Tiffiny Chair","white","2016-09-15","50","100","70","C001","");


DROP TABLE IF EXISTS month_summary;

CREATE TABLE `month_summary` (
  `month` varchar(15) NOT NULL,
  `number_of_orders` int(11) NOT NULL,
  `total_sales` float NOT NULL,
  PRIMARY KEY (`month`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO month_summary VALUES("2017-02","1","6900");


DROP TABLE IF EXISTS offers;

CREATE TABLE `offers` (
  `id` int(30) NOT NULL,
  `title` varchar(20) NOT NULL,
  `details` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO offers VALUES("1","Seasonal offer!","30% on any this Xmas");
INSERT INTO offers VALUES("2","GRAND offer!","50% off for glassware this month");
INSERT INTO offers VALUES("3","Priviledge offer!","20% off for loyalty purchases");


DROP TABLE IF EXISTS order1;

CREATE TABLE `order1` (
  `Reservation_ID` int(11) NOT NULL,
  `Item_ID` varchar(10) NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`Reservation_ID`,`Item_ID`),
  KEY `Item_ID` (`Item_ID`),
  CONSTRAINT `order1_ibfk_1` FOREIGN KEY (`Reservation_ID`) REFERENCES `reservation` (`Reservation_ID`),
  CONSTRAINT `order1_ibfk_2` FOREIGN KEY (`Item_ID`) REFERENCES `stock` (`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS order_item;

CREATE TABLE `order_item` (
  `Order_ID` int(10) NOT NULL,
  `Item_ID` varchar(10) NOT NULL,
  `Qty` int(10) NOT NULL,
  `UnitPrize` double NOT NULL,
  `SubTotal` double NOT NULL,
  `Res_Date` date NOT NULL,
  PRIMARY KEY (`Order_ID`,`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO order_item VALUES("1","ch001","20","0","0","2017-01-31");
INSERT INTO order_item VALUES("21","ch001","10","50","500","2017-02-15");
INSERT INTO order_item VALUES("21","ch002","15","60","900","2017-02-15");
INSERT INTO order_item VALUES("21","ch003","20","75","1500","2017-02-15");
INSERT INTO order_item VALUES("23","ch001","12","50","600","2017-02-22");
INSERT INTO order_item VALUES("23","ch002","20","60","1200","2017-02-22");
INSERT INTO order_item VALUES("23","ch003","40","75","3000","2017-02-22");


DROP TABLE IF EXISTS orders;

CREATE TABLE `orders` (
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

INSERT INTO orders VALUES("1","Maduka Silva","715016234","ch001","20","2016/08/28","12.00 pm","Colombo","University of Colombo","2 black and 2 white");
INSERT INTO orders VALUES("2","Nimasha Jayathunga","715974800","Tb 003","4","2016/08/29","12.00pm","Galle","45/1, galle","");
INSERT INTO orders VALUES("21","Kasun Silva","71865232","","","2017-02-15","","Kegalle","No1343,dfdsf ","");
INSERT INTO orders VALUES("23","MT De Silva ","778057786","","","2017-02-22","","Colombo","23,perera road,dehiwala","");


DROP TABLE IF EXISTS orders_new;

CREATE TABLE `orders_new` (
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
  PRIMARY KEY (`ResID`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Details about tempory reservation.';

INSERT INTO orders_new VALUES("21","Kasun Silva","kasun@gmail.com","71865232","2017-02-15","1","Kegalle","No1343,dfdsf ","2900","750","1100","1500");
INSERT INTO orders_new VALUES("23","MT De Silva ","desilvamadhuka@gmail.com","778057786","2017-02-22","2","Colombo","23,perera road,dehiwala","4800","1000","800","1200");


DROP TABLE IF EXISTS payment;

CREATE TABLE `payment` (
  `Invoice_Number` varchar(10) NOT NULL,
  `Payment_Type` varchar(10) NOT NULL,
  `Advance_Payment` double NOT NULL,
  `Balance_Payment` double NOT NULL,
  `Reservation_ID` int(11) NOT NULL,
  PRIMARY KEY (`Invoice_Number`),
  KEY `Reservation_ID` (`Reservation_ID`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Reservation_ID`) REFERENCES `reservation` (`Reservation_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS reservation;

CREATE TABLE `reservation` (
  `Reservation_ID` int(11) NOT NULL,
  `Location` varchar(30) NOT NULL,
  `Destination_Address` varchar(256) NOT NULL,
  `Amount` double NOT NULL,
  `Employee_ID` varchar(10) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  PRIMARY KEY (`Reservation_ID`),
  KEY `Employee_ID` (`Employee_ID`),
  KEY `Customer_ID` (`Customer_ID`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`),
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS stock;

CREATE TABLE `stock` (
  `Item_ID` varchar(10) NOT NULL,
  `Item_Name` varchar(50) NOT NULL,
  `Item_Type` varchar(256) NOT NULL,
  `Unit_Price` double NOT NULL,
  `location` varchar(256) NOT NULL,
  `color` varchar(256) NOT NULL,
  `Total_Stock` int(255) NOT NULL,
  PRIMARY KEY (`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO stock VALUES("ch001","A Chair","Chair","50","../assets/img/website/chairs/c.png","","152");
INSERT INTO stock VALUES("ch002","Banquet","Chair","250","../assets/img/website/stock/c1.jpg","Yellow","200");


DROP TABLE IF EXISTS temp_res;

CREATE TABLE `temp_res` (
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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COMMENT='Details about tempory reservation.';

INSERT INTO temp_res VALUES("23","MT De Silva ","desilvamadhuka@gmail.com","778057786","2017-02-22","2","Colombo","23,perera road,dehiwala","4800","1000","1100","690","1200","Confirmed","Paid","not","Yes");
INSERT INTO temp_res VALUES("21","Kasun Silva","kasun@gmail.com","71865232","2017-02-15","1","Kegalle","No1343,dfdsf ","2900","750","1100","","1500","Confirmed","Paid","not","Yes");
INSERT INTO temp_res VALUES("20","Nuwan Tharaka","mnuwantharaka@gmail.com","1234535","2017-01-28","1","Galle","123","5425","1350","4500","","","Not Decided","not","not","No");


DROP TABLE IF EXISTS temp_res_details;

CREATE TABLE `temp_res_details` (
  `ResID` int(20) NOT NULL,
  `ItemID` varchar(50) NOT NULL,
  `Qty` int(10) NOT NULL,
  `UnitPrize` double NOT NULL,
  `SubTotal` double NOT NULL,
  `ResDate` date NOT NULL,
  PRIMARY KEY (`ResID`,`ItemID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='item details about tem reservation.';

INSERT INTO temp_res_details VALUES("23","ch003","40","75","3000","2017-02-22");
INSERT INTO temp_res_details VALUES("23","ch002","20","60","1200","2017-02-22");
INSERT INTO temp_res_details VALUES("23","ch001","12","50","600","2017-02-22");
INSERT INTO temp_res_details VALUES("21","ch003","20","75","1500","2017-02-15");
INSERT INTO temp_res_details VALUES("21","ch002","15","60","900","2017-02-15");
INSERT INTO temp_res_details VALUES("21","ch001","10","50","500","2017-02-15");
INSERT INTO temp_res_details VALUES("20","ch003","35","75","2625","2017-01-28");
INSERT INTO temp_res_details VALUES("20","ch002","30","60","1800","2017-01-28");
INSERT INTO temp_res_details VALUES("20","ch001","20","50","1000","2017-01-28");


DROP TABLE IF EXISTS users1;

CREATE TABLE `users1` (
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO users1 VALUES("1","admin","827ccb0eea8a706c4c34a16891f84e7b","lasantha","lasantha malavige","1234556778","","fdgdfhdhd","lasantha@gmail.com","../assets/img/users/lasantha.png");
INSERT INTO users1 VALUES("2","stock","827ccb0eea8a706c4c34a16891f84e7b","nimasha","Nimasha Jayathunga","0","","","nimasha.jayathunga@gmail.com","../assets/img/users/nimasha.png");
INSERT INTO users1 VALUES("3","clerk","827ccb0eea8a706c4c34a16891f84e7b","upeksha","Upeksha Silva","0","","","upeksha@gmail.com","../assets/img/users/upeksha.png");
INSERT INTO users1 VALUES("4","sk","123","wrwer","erwetwr","12345","143235","qqqqqqqqqqqq","seqrwqerweqr","");
INSERT INTO users1 VALUES("5","sef","123","www","www","716494260","123456789V","dfgdfh","buddhiupeksha1@gmail.com","layers.png");
INSERT INTO users1 VALUES("6","clerk","12345","mad","dsgd","778057786","936070140V","sfhjdj","desilvamadhuka@yahoo.com","logo2.jpg");
INSERT INTO users1 VALUES("7","clerk","202cb962ac59075b964b07152d234b70","madhuka","mmmmm","778057786","936070140V","gs","desilvamadhuka@yahoo.com","logo2.jpg");
INSERT INTO users1 VALUES("8","clerk","827ccb0eea8a706c4c34a16891f84e7b","patta","cccc","778057786","936070140V","sg","desilvamadhuka@yahoo.com","../assets/img/users/");
INSERT INTO users1 VALUES("9","clerk","827ccb0eea8a706c4c34a16891f84e7b","mala","cccc","778057786","936070140V","sg","desilvamadhuka@yahoo.com","ÿØÿáExif\0\0MM\0*\0\0\0\0\0\0\0\0\0€\0\0\0\0\0\0À\0\0\0\0\0\0\0\0\0ž\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0");
INSERT INTO users1 VALUES("10","clerk","827ccb0eea8a706c4c34a16891f84e7b","kalani","kkkk","778057786","936070140V","xhfhh","desilvamadhuka@yahoo.com","ÿØÿáExif\0\0MM\0*\0\0\0\0\0\0\0\0\0€\0\0\0\0\0\0À\0\0\0\0\0\0\0\0\0ž\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0");
INSERT INTO users1 VALUES("11","clerk","827ccb0eea8a706c4c34a16891f84e7b","maa","amma","778057786","936070140V","sgg","desilvamadhuka@yahoo.com","");
INSERT INTO users1 VALUES("12","clerk","827ccb0eea8a706c4c34a16891f84e7b","wap","sgsg","778057786","936070140V","dkfkf","desilvamadhuka@yahoo.com","../assets/img/users/Madhuka.jpg");


DROP TABLE IF EXISTS vehicle;

CREATE TABLE `vehicle` (
  `Vehicle_ID` varchar(10) NOT NULL,
  `Vehicle_Type` varchar(10) NOT NULL,
  `Employee_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`Vehicle_ID`),
  KEY `Employee_ID` (`Employee_ID`),
  CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employee` (`Employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS vehicle_allocation;

CREATE TABLE `vehicle_allocation` (
  `Reservation_ID` int(11) NOT NULL,
  `Vehicle_ID` varchar(10) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`Reservation_ID`,`Vehicle_ID`),
  KEY `Vehicle_ID` (`Vehicle_ID`),
  CONSTRAINT `vehicle_allocation_ibfk_1` FOREIGN KEY (`Vehicle_ID`) REFERENCES `vehicle` (`Vehicle_ID`),
  CONSTRAINT `vehicle_allocation_ibfk_2` FOREIGN KEY (`Reservation_ID`) REFERENCES `reservation` (`Reservation_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS year_summary;

CREATE TABLE `year_summary` (
  `year` int(11) NOT NULL,
  `number_of_orders` int(11) NOT NULL,
  `total_sales` float NOT NULL,
  PRIMARY KEY (`year`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO year_summary VALUES("2017","1","6900");


