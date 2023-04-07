-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 01:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `bank` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `bank`) VALUES
(1, 'Brac Bank');

-- --------------------------------------------------------

--
-- Table structure for table `carmodel`
--

CREATE TABLE `carmodel` (
  `id` int(11) NOT NULL,
  `modelname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `carmodel`
--

INSERT INTO `carmodel` (`id`, `modelname`) VALUES
(1, 'TOYOTA'),
(2, 'HONDA'),
(3, 'TATA'),
(4, 'WALTON'),
(5, 'FORD'),
(6, 'FERRARI'),
(7, 'MINI'),
(8, 'ABCX'),
(9, 'XYZ'),
(10, 'YAMAHA'),
(11, 'NISSAN'),
(12, 'qqq'),
(13, 'QATAR'),
(14, 'CHAMP');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `carid` int(11) NOT NULL,
  `lcno` varchar(50) NOT NULL,
  `chassis` varchar(50) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `series` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `color` varchar(20) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `entrydate` date NOT NULL,
  `fobcost` decimal(10,2) NOT NULL,
  `dent` int(11) NOT NULL,
  `paint` int(11) NOT NULL,
  `misc` varchar(50) NOT NULL,
  `dcost` decimal(10,2) NOT NULL,
  `miscamount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`carid`, `lcno`, `chassis`, `brand`, `series`, `model`, `color`, `cost`, `qty`, `stock`, `entrydate`, `fobcost`, `dent`, `paint`, `misc`, `dcost`, `miscamount`) VALUES
(31, '20229981771X', '9918817717', 'FORD', 'Axio', '2018', 'Red', '1055396.00', 1, 1, '2022-11-26', '10000.00', 99, 99, '99', '99.00', 99),
(32, '20229981771X', '909090909X', 'NISSAN', 'Axio', '2016', 'black', '738852.00', 1, 1, '2022-11-26', '7000.00', 88, 88, '88', '88.00', 88),
(33, '20229981771X', '99900088X', 'TOYOTA', 'Axio', '2017', 'blue', '633308.00', 1, 1, '2022-11-26', '6000.00', 77, 77, '77', '77.00', 77),
(34, 'JJ29000009', 'XX299282882', 'TOYOTA', 'Axio', '2018', 'Red', '531500.00', 2, 2, '2022-11-28', '10000.00', 1000, 1000, 'misc1', '1000.00', 1000),
(35, 'JJ29000009', 'ZZ909090909X', 'TOYOTA', 'Premio', '2016', 'black', '742500.00', 1, 1, '2022-11-28', '7000.00', 1000, 1000, 'misc2', '1000.00', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `carseries`
--

CREATE TABLE `carseries` (
  `id` int(11) NOT NULL,
  `seriesname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `carseries`
--

INSERT INTO `carseries` (`id`, `seriesname`) VALUES
(1, 'Axio'),
(2, 'Premio');

-- --------------------------------------------------------

--
-- Table structure for table `cartype`
--

CREATE TABLE `cartype` (
  `id` int(11) NOT NULL,
  `cartype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cledger`
--

CREATE TABLE `cledger` (
  `ltno` int(11) NOT NULL,
  `ldate` date NOT NULL,
  `cidf` int(11) NOT NULL,
  `dno` int(11) NOT NULL,
  `des` varchar(100) NOT NULL,
  `cashin` decimal(10,2) NOT NULL,
  `cashout` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `contact_person` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `cname`, `address`, `city`, `phone`, `contact_person`) VALUES
(1, 'Hasan Al Mamun', 'House# 86, Road# 10, Cosmopolitan Residential Area', 'Chittagong', '0191818181', 'Mamun');

-- --------------------------------------------------------

--
-- Table structure for table `dollar`
--

CREATE TABLE `dollar` (
  `rate` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dollar`
--

INSERT INTO `dollar` (`rate`) VALUES
('105.50');

-- --------------------------------------------------------

--
-- Table structure for table `expensehead`
--

CREATE TABLE `expensehead` (
  `xid` int(11) NOT NULL,
  `xname` varchar(30) NOT NULL,
  `default` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `expensehead`
--

INSERT INTO `expensehead` (`xid`, `xname`, `default`, `status`) VALUES
(1, 'Denting', '0.00', ''),
(2, 'Painting', '0.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `lc`
--

CREATE TABLE `lc` (
  `lcid` int(11) NOT NULL,
  `lcno` varchar(30) NOT NULL,
  `lcdate` date NOT NULL,
  `supplier` int(11) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `lcamount` decimal(10,2) NOT NULL,
  `actualamount` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `lc`
--

INSERT INTO `lc` (`lcid`, `lcno`, `lcdate`, `supplier`, `bank`, `lcamount`, `actualamount`, `status`, `user`) VALUES
(7, '019LC9298188XY', '2022-11-23', 1, '1', '45000.00', '60000.00', 'approved', 0),
(8, '019LC777777', '2022-11-23', 1, '1', '45000.00', '60000.00', 'approved', 0),
(9, '019LC777778', '2022-11-23', 1, '1', '45000.00', '60000.00', 'new', 0),
(10, '019LC777766', '2022-11-23', 1, '1', '45000.00', '60000.00', 'new', 0),
(11, '019LC777755X', '2022-11-23', 1, '1', '45000.00', '60000.00', 'new', 0),
(12, '20229981771X', '2022-11-23', 1, '1', '50000.00', '70000.00', 'approved', 0),
(13, 'JJ29000009', '2022-11-28', 1, '1', '50000.00', '70000.00', 'received', 0),
(14, 'ABC2022', '2022-11-28', 1, '1', '30000.00', '40000.00', 'approved', 0),
(15, 'JP20229999188', '2022-11-28', 2, '1', '60000.00', '80000.00', 'approved', 0),
(16, '124578', '2023-01-05', 2, '1', '55000.00', '75000.00', 'approved', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lc_cost`
--

CREATE TABLE `lc_cost` (
  `lcid` int(11) NOT NULL,
  `costhead` varchar(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `lc_cost`
--

INSERT INTO `lc_cost` (`lcid`, `costhead`, `amount`, `remarks`) VALUES
(9, 'LC related', 2000, 'NA'),
(9, 'Misc expens', 1000, 'NA'),
(16, 'Denting', 2000, ''),
(16, 'Painting', 2000, '');

-- --------------------------------------------------------

--
-- Table structure for table `lc_detail`
--

CREATE TABLE `lc_detail` (
  `lcidf` int(11) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `series` varchar(20) NOT NULL,
  `model` varchar(4) NOT NULL,
  `cartype` varchar(15) NOT NULL,
  `color` varchar(20) NOT NULL,
  `chassis` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `unitprice` decimal(10,2) NOT NULL,
  `freight` decimal(10,2) NOT NULL,
  `actual` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `lc_detail`
--

INSERT INTO `lc_detail` (`lcidf`, `brand`, `series`, `model`, `cartype`, `color`, `chassis`, `qty`, `unitprice`, `freight`, `actual`) VALUES
(8, 'FERRARI', 'Axio', '2018', '', 'Red', '9918817717', 1, '8000.00', '300.00', '10000.00'),
(9, 'FERRARI', 'Axio', '2018', '', 'Red', '9918817717', 1, '8000.00', '300.00', '10000.00'),
(10, 'FERRARI', 'Axio', '2018', '', 'Red', '9918817717', 1, '8000.00', '300.00', '10000.00'),
(12, 'FORD', 'Axio', '2018', '', 'Red', '9918817717', 1, '8000.00', '300.00', '10000.00'),
(12, 'NISSAN', 'Axio', '2016', '', 'black', '909090909X', 1, '5000.00', '200.00', '7000.00'),
(12, 'TOYOTA', 'Axio', '2017', '', 'blue', '99900088X', 1, '4000.00', '200.00', '6000.00'),
(7, 'FERRARI', 'Premio', '2018', '', 'Red', '9918817717X', 1, '8000.00', '300.00', '10000.00'),
(13, 'TOYOTA', 'Axio', '2018', '', 'Red', 'XX299282882', 2, '8000.00', '300.00', '10000.00'),
(13, 'TOYOTA', 'Premio', '2016', '', 'black', 'ZZ909090909X', 1, '5000.00', '200.00', '7000.00'),
(14, 'TOYOTA', 'Premio', '2020', '', 'blue', 'WW229999099', 2, '5000.00', '200.00', '7000.00'),
(14, 'TOYOTA', 'Axio', '2021', '', 'Red', '909090909XYZ', 2, '6000.00', '200.00', '8000.00'),
(14, 'TOYOTA', 'Axio', '2017', '', 'black', 'AA99900088X', 1, '4000.00', '200.00', '6000.00'),
(15, 'TOYOTA', 'Axio', '2018', '', 'Red', '9918817717SD', 1, '8000.00', '300.00', '10000.00'),
(15, 'TOYOTA', 'Premio', '2021', '', 'Black', '991881771XXX', 2, '6000.00', '200.00', '8000.00'),
(16, 'TOYOTA', 'Axio', '2018', '', 'Red', 'abc123456', 1, '8000.00', '300.00', '10000.00'),
(16, 'TOYOTA', 'Premio', '2021', '', 'black', 'xyz543210', 1, '6000.00', '200.00', '7000.00');

-- --------------------------------------------------------

--
-- Table structure for table `lc_expense`
--

CREATE TABLE `lc_expense` (
  `lcidf` int(11) NOT NULL,
  `expense` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `approved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(2) NOT NULL,
  `head` varchar(20) NOT NULL,
  `menutext` varchar(30) NOT NULL,
  `link` varchar(50) NOT NULL,
  `menuorder` int(2) NOT NULL,
  `status` int(11) NOT NULL,
  `access` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `head`, `menutext`, `link`, `menuorder`, `status`, `access`) VALUES
(1, 'Services', 'Department', 'department', 21, 1, 1),
(2, 'Services', 'Service', 'service', 22, 1, 1),
(3, 'Services', 'Test', 'dtest', 23, 1, 1),
(4, 'News', 'News', 'news', 26, 1, 1),
(5, 'Doctor', 'Department', 'dr_department', 32, 1, 1),
(6, 'Doctor', 'Doctor', 'doctor', 33, 1, 1),
(7, 'Appointment', 'appointments', 'appointments', 42, 1, 1),
(8, 'Services', 'Consult Department', 'cons_dept', 24, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `invoiceno` int(11) NOT NULL,
  `sdate` date NOT NULL,
  `cidf` int(11) NOT NULL,
  `shipto` varchar(150) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `adv` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`invoiceno`, `sdate`, `cidf`, `shipto`, `remarks`, `total`, `adv`, `status`) VALUES
(3, '2022-11-28', 1, 'Dhaka', 'Test remark', '3000000.00', '2000000.00', 'new'),
(4, '2022-11-28', 1, 'Dhaka', 'Test remark', '3000000.00', '2000000.00', 'new'),
(5, '2022-11-28', 1, 'Dhaka', 'Test remark', '3000000.00', '2000000.00', 'new'),
(6, '2022-11-28', 1, 'Dhaka', 'ok', '1000000.00', '1000000.00', 'new'),
(7, '2022-12-27', 1, '', '', '2000000.00', '2000000.00', 'new'),
(8, '2023-01-01', 1, 'Dhaka', 'ok', '4500000.00', '4500000.00', 'new'),
(9, '2023-01-01', 1, 'Dhaka', 'ok', '2500000.00', '2500000.00', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `sales_detail`
--

CREATE TABLE `sales_detail` (
  `invf` int(11) NOT NULL,
  `caridf` int(11) NOT NULL,
  `des` varchar(100) NOT NULL,
  `unitprice` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `remarks` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sales_detail`
--

INSERT INTO `sales_detail` (`invf`, `caridf`, `des`, `unitprice`, `qty`, `remarks`) VALUES
(2, 33, 'TOYOTA, Axio,2017, blue, Chassis: 99900088X', '1000000.00', 1, 0),
(2, 32, 'NISSAN, Axio,2016, black, Chassis: 909090909X', '2000000.00', 1, 0),
(7, 33, 'TOYOTA, Axio,2017, blue, Chassis: 99900088X', '2000000.00', 1, 0),
(8, 32, 'NISSAN, Axio,2016, black, Chassis: 909090909X', '2000000.00', 1, 0),
(8, 31, 'FORD, Axio,2018, Red, Chassis: 9918817717', '2500000.00', 1, 0),
(9, 31, 'FORD, Axio,2018, Red, Chassis: 9918817717', '2500000.00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sledger`
--

CREATE TABLE `sledger` (
  `ltno` int(11) NOT NULL,
  `ldate` date NOT NULL,
  `sidf` int(11) NOT NULL,
  `dno` int(11) NOT NULL,
  `des` varchar(100) NOT NULL,
  `cashin` decimal(10,2) NOT NULL,
  `cashout` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spayment`
--

CREATE TABLE `spayment` (
  `pid` int(11) NOT NULL,
  `pdate` date NOT NULL,
  `sidf` int(11) NOT NULL,
  `pdes` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sid` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `saddress` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sid`, `sname`, `saddress`, `phone`) VALUES
(1, 'SA CORPORATION', 'Tokyo, Japan', '+918818818'),
(2, 'TOYOPET', 'Tokyo, Japan', '0001111999');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_ledger`
--

CREATE TABLE `supplier_ledger` (
  `tno` int(11) NOT NULL,
  `ldate` date NOT NULL,
  `sidf` int(11) NOT NULL,
  `des` varchar(100) NOT NULL,
  `amount` float NOT NULL,
  `paid` float NOT NULL,
  `lcid` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `supplier_ledger`
--

INSERT INTO `supplier_ledger` (`tno`, `ldate`, `sidf`, `des`, `amount`, `paid`, `lcid`, `status`) VALUES
(1, '2022-11-28', 1, 'LC actual amount', 70000, 0, 13, 'new'),
(2, '2022-11-28', 1, 'LC actual amount', 40000, 0, 14, 'new'),
(3, '2022-11-28', 1, 'dd', 0, 10000, 0, 'new'),
(4, '2022-11-28', 1, 'Test payment', 0, 20000, 0, 'new'),
(5, '2022-11-28', 1, 'Test payment', 0, 10000, 0, 'new'),
(6, '2022-11-28', 1, 'dd', 0, 10000, 0, 'new'),
(7, '2022-11-28', 1, 'test', 0, 7000, 0, 'new'),
(8, '2022-11-28', 1, 'Test payment', 0, 5000, 1991881, 'new'),
(9, '2022-11-28', 2, 'LC actual amount', 80000, 0, 15, 'new'),
(10, '2022-11-28', 2, 'LC Payment', 0, 60000, 0, 'new'),
(11, '2022-11-28', 2, 'TT Payment', 0, 20000, 0, 'new'),
(12, '2022-12-12', 1, 'LC actual amount', 60000, 0, 8, 'new'),
(13, '2023-01-05', 2, 'LC actual amount', 75000, 0, 16, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` int(1) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `level`, `description`, `status`) VALUES
(1, 'admin', 'kk22', 1, 'Admin master user', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carmodel`
--
ALTER TABLE `carmodel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`carid`);

--
-- Indexes for table `carseries`
--
ALTER TABLE `carseries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cartype`
--
ALTER TABLE `cartype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cledger`
--
ALTER TABLE `cledger`
  ADD PRIMARY KEY (`ltno`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `expensehead`
--
ALTER TABLE `expensehead`
  ADD PRIMARY KEY (`xid`);

--
-- Indexes for table `lc`
--
ALTER TABLE `lc`
  ADD PRIMARY KEY (`lcid`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`invoiceno`);

--
-- Indexes for table `sledger`
--
ALTER TABLE `sledger`
  ADD PRIMARY KEY (`ltno`);

--
-- Indexes for table `spayment`
--
ALTER TABLE `spayment`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `supplier_ledger`
--
ALTER TABLE `supplier_ledger`
  ADD PRIMARY KEY (`tno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carmodel`
--
ALTER TABLE `carmodel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `carid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `carseries`
--
ALTER TABLE `carseries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cartype`
--
ALTER TABLE `cartype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cledger`
--
ALTER TABLE `cledger`
  MODIFY `ltno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expensehead`
--
ALTER TABLE `expensehead`
  MODIFY `xid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lc`
--
ALTER TABLE `lc`
  MODIFY `lcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `invoiceno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sledger`
--
ALTER TABLE `sledger`
  MODIFY `ltno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spayment`
--
ALTER TABLE `spayment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier_ledger`
--
ALTER TABLE `supplier_ledger`
  MODIFY `tno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
