-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 03:02 PM
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
-- Database: `bluedot_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Corporate'),
(2, 'Individual');

-- --------------------------------------------------------

--
-- Table structure for table `contracttor`
--

CREATE TABLE `contracttor` (
  `contracttorid` int(200) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `contactperson` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contracttor`
--

INSERT INTO `contracttor` (`contracttorid`, `cname`, `address`, `phone`, `contactperson`, `status`) VALUES
(1, 'contracttor1', 'demo', '017********', 'demo', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerid` int(11) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `area` varchar(20) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `remark` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `cname`, `address`, `area`, `mobile`, `email`, `category`, `remark`) VALUES
(5, 'raju', 'chittagong,Bangladesh', 'd', '01644836367', 'dd@gmail.com', '1', 'none'),
(6, 'rajudev', 'chittagong,Bangladesh', 'dampara', '01644836367', 'raju@gmail.com', '1', 'none'),
(7, 'dummy', 'chittagong,Bangladesh', 'dummy area', '01644836367', 'dummy@gmail.com', '2', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `customer_ledger`
--

CREATE TABLE `customer_ledger` (
  `tid` int(11) NOT NULL,
  `tdate` datetime NOT NULL,
  `customerid` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `dr` int(11) NOT NULL,
  `cr` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `ref` int(11) NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer_ledger`
--

INSERT INTO `customer_ledger` (`tid`, `tdate`, `customerid`, `description`, `dr`, `cr`, `status`, `ref`, `remarks`) VALUES
(5, '2023-05-19 00:00:00', 5, 'none', 0, 66, 'none', 0, 'none'),
(6, '2023-06-06 00:00:00', 6, 'none', 0, 0, 'none', 0, 'none'),
(7, '2023-06-26 00:00:00', 7, 'none', 36, 100, 'none', 0, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `empid` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `dob` date NOT NULL,
  `joindate` date NOT NULL,
  `mob` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `salary` int(11) NOT NULL,
  `basic` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `misc` int(11) NOT NULL,
  `attnbonus` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `itemcode` int(11) NOT NULL,
  `lotno` int(11) NOT NULL,
  `pidf` int(11) NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `uom` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `total` int(20) NOT NULL,
  `advance` int(20) NOT NULL,
  `discount` int(20) NOT NULL,
  `grand_total` int(100) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `invoice_date` date NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `total`, `advance`, `discount`, `grand_total`, `customer_id`, `project_id`, `invoice_no`, `invoice_date`, `status`) VALUES
(5, 80, 20, 10, 50, 6, 6, 1, '2023-06-20', 'done'),
(7, 64, 0, 0, 64, 5, 5, 2, '2023-06-20', 'done'),
(8, 100, 10, 10, 80, 7, 7, 3, '2023-06-25', 'done'),
(9, 100, 10, 10, 60, 7, 7, 4, '2023-06-25', 'done'),
(10, 100, 10, 5, 45, 7, 7, 5, '2023-06-25', 'done'),
(11, 100, 10, 0, 35, 7, 7, 6, '2023-06-25', 'done'),
(13, 100, 10, 0, 25, 7, 7, 7, '2023-06-25', 'done'),
(14, 100, 5, 0, 20, 7, 7, 8, '2023-06-25', 'done'),
(15, 100, 3, 0, 17, 7, 7, 9, '2023-06-25', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemcode` int(11) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `uom` varchar(10) NOT NULL,
  `reorder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itemcategory`
--

CREATE TABLE `itemcategory` (
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `name`, `address`, `phone`) VALUES
(1, 'Raj dev', 'chittagong,Bangladesh', '01644836367');

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
  `icon` varchar(30) NOT NULL,
  `status` varchar(11) NOT NULL,
  `access` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `head`, `menutext`, `link`, `menuorder`, `icon`, `status`, `access`) VALUES
(4, 'Employee', 'Employee (Active)', 'employee', 2, 'users', 'Active', 1),
(5, 'Attendance', 'Import attendance', 'attendance_import', 21, 'upload', 'Active', 1),
(6, 'Attendance', 'Attendance', 'attendance', 22, 'check-square', 'Active', 1),
(7, 'Attendance', 'Job card', 'jobcard_launcher', 23, 'table', 'Active', 1),
(8, 'Salary', 'Salary sheet', 'salarysheet_launcher', 41, 'grid', 'Active', 1),
(10, 'Holiday', 'Holiday setting', 'holiday', 501, 'calendar', 'Active', 1),
(11, 'Attendance', 'Daily Attendance', 'attendance_daily', 25, 'check-square', 'Active', 1),
(12, 'Settings', 'Department setup', 'department', 2001, 'settings', 'Active', 1),
(13, 'Salary', 'Salary component', 'salary_component', 47, 'users', 'Active', 1),
(14, 'Salary', 'Overtime deduct ', 'salary_otdeduct', 48, 'check-square', 'Active', 1),
(15, 'Attendance', 'Monthly closing', 'attendance_closing', 30, 'check-square', 'Active', 1),
(16, 'Attendance', 'Missing attendance', 'attendance_missing', 26, 'check-square', 'Active', 1),
(17, 'Attendance', 'Department IN-OUT', 'attendance_dept_launcher', 28, 'check-square', 'Active', 1),
(18, 'Attendance', 'Month attendance', 'attendance_grid_launcher', 30, 'check-square', 'Active', 1),
(19, 'Salary', 'Increment due', 'incrementdue', 49, 'check-square', 'Active', 1),
(20, 'Salary', 'Pay slip', 'payslip_launcher', 42, 'check-square', 'Active', 1),
(21, 'Employee', 'Blocked Employee', 'employee_blocked', 3, 'check-square', 'Active', 1),
(22, 'Employee', 'Add Employee', 'employee_new', 1, 'check-square', 'Active', 1),
(23, 'Employee', 'Max id', 'employee_maxid', 7, 'check-square', 'Active', 1),
(24, 'Attendance', 'Absent', 'attendance_absent', 27, '', 'Active', 1),
(25, 'Settings', 'Designation', 'designation', 2002, 'check-square', 'Active', 1),
(26, 'Quotation', 'Pending Request', 'req_quotation_list', 101, 'list', 'Active', 1),
(27, 'Quotation', 'Show Quotation', 'show_quotation', 102, 'list', 'Active', 1),
(31, 'Project', 'Show Project', 'show_project', 122, 'list', 'Active', 1),
(32, 'Project', 'Accepted quotations', 'accepted_quotations', 120, 'list', 'Active', 1),
(33, 'Project', 'Project profile', 'project_profile', 121, 'list', 'Active', 1),
(51, 'Payment-Payout', 'Payment Receive', 'payment_receive', 141, 'list', 'Active', 1),
(52, 'Payment-Payout', 'Payout Requisition', 'payout_requisition', 142, 'list', 'Active', 1),
(53, 'Payment-Payout', 'Payout request list', 'payout_request_list', 143, 'list', 'Active', 1),
(54, 'Payment-Payout', 'Payout list', 'payout_list', 144, 'list', 'Active', 1),
(61, 'Type', 'Create Type', 'create_type', 151, 'list', 'Active', 1),
(62, 'Type', 'Create Worker/Others', 'create_worker', 152, 'list', 'Active', 1),
(72, 'Manager', 'Show Manager', 'show_manager', 162, 'list', 'Active', 1),
(82, 'Invoice', 'Show List', 'show_data', 172, 'list', 'Active', 1),
(93, 'RFQ', 'Request Quotaion', 'req_quotation_rfq', 91, 'list', 'Active', 1),
(94, 'RFQ', 'RFQ list', 'req_quotation_list', 92, 'list', 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paymentin`
--

CREATE TABLE `paymentin` (
  `memo` int(11) NOT NULL,
  `pdate` date NOT NULL,
  `customerid` int(11) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL,
  `paytype` varchar(10) NOT NULL,
  `chequeinfo` varchar(150) NOT NULL,
  `chequedate` date NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `paymentin`
--

INSERT INTO `paymentin` (`memo`, `pdate`, `customerid`, `ref`, `description`, `amount`, `paytype`, `chequeinfo`, `chequedate`, `status`) VALUES
(1, '2023-05-27', 5, 'raju', 'raju', 120, 'cash', 'nothing', '2023-05-27', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `id` int(11) NOT NULL,
  `pname` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_mode`
--

INSERT INTO `payment_mode` (`id`, `pname`) VALUES
(1, '25% starting');

-- --------------------------------------------------------

--
-- Table structure for table `payment_req`
--

CREATE TABLE `payment_req` (
  `prid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payee` int(11) NOT NULL,
  `type` int(30) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `paydate` date NOT NULL,
  `app_amount` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `payment_req`
--

INSERT INTO `payment_req` (`prid`, `amount`, `payee`, `type`, `purpose`, `paydate`, `app_amount`, `status`) VALUES
(2, 100, 80, 3, 'ciment', '2023-06-07', 60, 'done'),
(3, 500, 300, 2, 'ciment', '2023-07-20', 350, 'done'),
(4, 700, 100, 3, 'water', '2023-07-20', 50, 'pay');

-- --------------------------------------------------------

--
-- Table structure for table `payout`
--

CREATE TABLE `payout` (
  `payoutid` int(11) NOT NULL,
  `paydate` date NOT NULL,
  `amount` int(11) NOT NULL,
  `payee` int(11) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `ptype` varchar(200) NOT NULL,
  `chequeinfo` varchar(150) NOT NULL,
  `chequedate` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `payout`
--

INSERT INTO `payout` (`payoutid`, `paydate`, `amount`, `payee`, `purpose`, `type`, `ptype`, `chequeinfo`, `chequedate`, `status`) VALUES
(2, '2023-06-07', 100, 80, 'ciment', 3, 'cash', 'no', '2023-06-07', 'pending'),
(3, '2023-07-20', 500, 300, 'ciment', 2, 'cash', 'nothing', '2023-07-19', 'pending'),
(4, '2023-07-20', 700, 100, 'water', 3, 'cash', '11111', '2023-07-20', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectid` int(11) NOT NULL,
  `projectname` varchar(30) NOT NULL,
  `customer` int(100) NOT NULL,
  `datecreated` date NOT NULL,
  `description` varchar(3000) NOT NULL,
  `paymentmode` varchar(300) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `duration` int(11) NOT NULL,
  `pm` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectid`, `projectname`, `customer`, `datecreated`, `description`, `paymentmode`, `startdate`, `enddate`, `duration`, `pm`, `status`) VALUES
(5, 'demo', 5, '2023-04-11', 'flood', '25% starting', '2023-05-19', '2023-05-24', 3, 1, 'done'),
(6, 'new project', 6, '2023-06-05', 'raju', '25% starting', '2023-06-06', '2023-06-08', 2, 1, 'done'),
(7, 'dummy project', 7, '2023-06-25', 'dummy', '25% starting', '2023-06-26', '2023-06-27', 1, 1, 'done');

-- --------------------------------------------------------

--
-- Table structure for table `projectdetail`
--

CREATE TABLE `projectdetail` (
  `projectidf` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `uom` varchar(10) NOT NULL,
  `rate` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `projectdetail`
--

INSERT INTO `projectdetail` (`projectidf`, `service`, `description`, `quantity`, `uom`, `rate`, `amount`, `duration`, `startdate`, `status`) VALUES
(5, 2, 'fllood', 2, 'inch', 12, '24.00', 1, '2023-05-19', 'pending'),
(5, 1, 'ceilling', 2, 'inch', 10, '20.00', 1, '2023-05-19', 'pending'),
(5, 1, 'ceilling', 2, 'inch', 10, '20.00', 1, '2023-05-19', 'pending'),
(6, 1, 'ceilling', 2, 'inch', 10, '20.00', 0, '0000-00-00', ''),
(6, 2, 'fllood', 5, 'inch', 12, '60.00', 0, '0000-00-00', ''),
(7, 1, 'ceilling', 10, 'inch', 10, '100.00', 1, '2023-06-26', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `project_task`
--

CREATE TABLE `project_task` (
  `taskid` int(11) NOT NULL,
  `taskname` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `assignedto` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `app_amount` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `project_task`
--

INSERT INTO `project_task` (`taskid`, `taskname`, `description`, `assignedto`, `startdate`, `enddate`, `app_amount`, `pid`, `status`) VALUES
(2, 'demo', 'demo', 1, '2023-05-19', '2023-05-19', 0, 5, '1'),
(4, 'demo', 'ceilling', 1, '2023-06-07', '2023-06-08', 0, 5, '0'),
(5, 'demo5', 'demo5', 1, '2023-06-08', '2023-06-08', 0, 5, '1'),
(6, 'demo', 'demo5', 1, '2023-06-13', '2023-06-13', 0, 6, '1'),
(7, 'dummy', 'dummy', 1, '2023-06-26', '2023-06-26', 0, 7, '0');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `pid` int(11) NOT NULL,
  `pdate` date NOT NULL,
  `supplier` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `paytype` varchar(10) NOT NULL,
  `purchaseby` varchar(20) NOT NULL,
  `shipto` varchar(10) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `user` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetail`
--

CREATE TABLE `purchasedetail` (
  `pidf` int(11) NOT NULL,
  `itemcode` int(11) NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `qid` int(11) NOT NULL,
  `qdate` date NOT NULL,
  `customer` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `area` varchar(30) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `paymentmode` varchar(300) NOT NULL,
  `terms` varchar(5000) NOT NULL,
  `status` varchar(200) NOT NULL,
  `preparedby` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`qid`, `qdate`, `customer`, `address`, `area`, `mobile`, `email`, `category`, `description`, `paymentmode`, `terms`, `status`, `preparedby`) VALUES
(32, '2023-04-11', 'raj', 'chittagong,Bangladesh', 'd', '01644836367', 'a@gmail.com', '2', 'ceiling', '25% starting', 'conditions maintain all', 'done', 'admin'),
(33, '2023-04-11', 'raju', 'chittagong,Bangladesh', 'd', '01644836367', 'dd@gmail.com', '1', 'flood', '25% starting', 'conditions maintain all', 'done', 'admin'),
(36, '2023-06-05', 'new1', 'chittagong,Bangladesh', 'r', '01644836367', 'r@gmail.com', '2', 'new', '25% starting', 'conditions maintain all', 'done', 'Admin'),
(37, '2023-06-05', 'rajudev', 'chittagong,Bangladesh', 'dampara', '01644836367', 'raju@gmail.com', '1', 'raju', '25% starting', 'conditions maintain all', 'done', 'Admin'),
(38, '2023-06-25', 'dummy', 'chittagong,Bangladesh', 'dummy area', '01644836367', 'dummy@gmail.com', '2', 'dummy', '25% starting', 'conditions maintain all', 'done', 'Admin'),
(39, '2023-06-25', 'dummy', 'chittagong,Bangladesh', 'dummy', '01644836367', 'r@gmail.com', '2', 'dummy', '25% starting', 'conditions maintain all', 'pending', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `quotationdetail`
--

CREATE TABLE `quotationdetail` (
  `qidf` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `uom` varchar(30) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `quotationdetail`
--

INSERT INTO `quotationdetail` (`qidf`, `service`, `description`, `quantity`, `uom`, `rate`, `amount`, `remarks`) VALUES
(29, 1, 'ceilling', '1.00', 'inch', '10.00', '2.00', 'n'),
(29, 2, 'flood', '1.00', 'inch', '12.00', '2.00', 'n'),
(0, 1, 'ceilling', '1.00', 'inch', '10.00', '10.00', 'n'),
(32, 1, 'ceilling', '1.00', 'inch', '10.00', '1.00', 'n'),
(33, 2, 'fllood', '2.00', 'inch', '12.00', '24.00', 'n'),
(33, 1, 'ceilling', '2.00', 'inch', '10.00', '20.00', 'n'),
(30, 1, 'ceilling', '1.00', 'inch', '10.00', '10.00', 'n-u-t'),
(30, 2, 'fllood', '2.00', 'inch', '12.00', '24.00', 'n-u'),
(34, 1, 'demo', '0.00', 'inch', '10.00', '10.00', 'n'),
(35, 0, '', '0.00', '', '0.00', '0.00', ''),
(36, 1, 'fllood', '0.00', 'inch', '10.00', '10.00', 'n'),
(37, 1, 'ceilling', '10.00', 'inch', '10.00', '100.00', 'n'),
(38, 1, 'ceilling', '10.00', 'inch', '10.00', '100.00', 'nothing'),
(39, 1, 'demo', '2.00', 'inch', '10.00', '20.00', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `rfp`
--

CREATE TABLE `rfp` (
  `id` int(11) NOT NULL,
  `rdate` date NOT NULL,
  `customer` varchar(30) NOT NULL,
  `mob` varchar(12) NOT NULL,
  `address` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL,
  `budget` varchar(50) NOT NULL,
  `surveryschedule` date NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rfp`
--

INSERT INTO `rfp` (`id`, `rdate`, `customer`, `mob`, `address`, `description`, `budget`, `surveryschedule`, `remarks`, `status`) VALUES
(1, '2023-04-09', 'raj', '01644836367', 'chittagong,Bangladesh', 'demo', '10lac', '2023-04-18', '10 tai sokal', 'done'),
(2, '2023-04-09', 'raj', '01644836367', 'chittagong,Bangladesh', 'demo2', '5lac', '2023-04-19', '4 tai bekal', 'done'),
(3, '2023-04-11', 'raj', '01644836367', 'chittagong,Bangladesh', 'ceiling', '5lac', '2023-04-19', '10 tai sokal', 'done'),
(4, '2023-04-11', 'raju', '01644836367', 'chittagong,Bangladesh', 'flood', '10lac', '2023-04-29', '4 tai bekal', 'done'),
(5, '2023-06-05', 'new1', '01644836367', 'chittagong,Bangladesh', 'new', '10lac', '2023-06-06', '10 tai sokal', 'done'),
(6, '2023-06-05', 'new9', '01644836367', 'chittagong,Bangladesh', 'raj', '10lac', '2023-06-14', '10 tai sokal', 'done'),
(7, '2023-06-05', 'rajudev', '01644836367', 'chittagong,Bangladesh', 'raju', '10lac', '2023-06-07', '10 tai sokal', 'done'),
(8, '2023-06-25', 'dummy', '01644836367', 'chittagong,Bangladesh', 'dummy', '10lac', '2023-06-26', '10 tai sokal', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceid` int(11) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `uom` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceid`, `sname`, `rate`, `uom`) VALUES
(1, 'Ceilling Design', '10.00', 'inch'),
(2, 'Flood Design', '12.00', 'inch');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierid` int(11) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `contactperson` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierid`, `sname`, `address`, `phone`, `contactperson`, `status`) VALUES
(1, 'supplier1', 'demo', '016*********', 'demo', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `terms_cond`
--

CREATE TABLE `terms_cond` (
  `id` int(11) NOT NULL,
  `tname` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms_cond`
--

INSERT INTO `terms_cond` (`id`, `tname`) VALUES
(1, 'conditions maintain all');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `tid` int(11) NOT NULL,
  `tname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`tid`, `tname`) VALUES
(1, 'Contracttor'),
(2, 'Supplier');

-- --------------------------------------------------------

--
-- Table structure for table `type_details`
--

CREATE TABLE `type_details` (
  `tdid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `tdname` varchar(100) NOT NULL,
  `tdaddress` varchar(100) NOT NULL,
  `tdphone` varchar(100) NOT NULL,
  `tdcperson` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_details`
--

INSERT INTO `type_details` (`tdid`, `tid`, `tdname`, `tdaddress`, `tdphone`, `tdcperson`, `status`) VALUES
(1, 2, 'supplier1', 'chittagong,Bangladesh', '01644836367', 'raj', 'pending'),
(2, 1, 'contacttor1', 'chittagong,Bangladesh', '01644836367', 'raj', 'pending'),
(3, 2, 'supplier2', 'chittagong,Bangladesh', '01644836367', 'raj', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `uom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracttor`
--
ALTER TABLE `contracttor`
  ADD PRIMARY KEY (`contracttorid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `customer_ledger`
--
ALTER TABLE `customer_ledger`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`lotno`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemcode`);

--
-- Indexes for table `itemcategory`
--
ALTER TABLE `itemcategory`
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentin`
--
ALTER TABLE `paymentin`
  ADD PRIMARY KEY (`memo`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_req`
--
ALTER TABLE `payment_req`
  ADD PRIMARY KEY (`prid`);

--
-- Indexes for table `payout`
--
ALTER TABLE `payout`
  ADD PRIMARY KEY (`payoutid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectid`);

--
-- Indexes for table `project_task`
--
ALTER TABLE `project_task`
  ADD PRIMARY KEY (`taskid`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `rfp`
--
ALTER TABLE `rfp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierid`);

--
-- Indexes for table `terms_cond`
--
ALTER TABLE `terms_cond`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `type_details`
--
ALTER TABLE `type_details`
  ADD PRIMARY KEY (`tdid`);

--
-- Indexes for table `uom`
--
ALTER TABLE `uom`
  ADD UNIQUE KEY `uom` (`uom`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contracttor`
--
ALTER TABLE `contracttor`
  MODIFY `contracttorid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_ledger`
--
ALTER TABLE `customer_ledger`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `empid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `lotno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemcode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `paymentin`
--
ALTER TABLE `paymentin`
  MODIFY `memo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_req`
--
ALTER TABLE `payment_req`
  MODIFY `prid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payout`
--
ALTER TABLE `payout`
  MODIFY `payoutid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project_task`
--
ALTER TABLE `project_task`
  MODIFY `taskid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `rfp`
--
ALTER TABLE `rfp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_cond`
--
ALTER TABLE `terms_cond`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_details`
--
ALTER TABLE `type_details`
  MODIFY `tdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
