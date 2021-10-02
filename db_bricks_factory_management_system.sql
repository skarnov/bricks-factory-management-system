-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 02, 2018 at 04:05 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evistec1_bricks_factory_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `admin_registration_date` varchar(35) NOT NULL,
  `admin_level` tinyint(1) NOT NULL,
  `admin_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cashbook`
--

CREATE TABLE `tbl_cashbook` (
  `cashbook_id` int(10) NOT NULL,
  `cashbook_description` text NOT NULL,
  `transaction_time` varchar(35) NOT NULL,
  `cashbook_debit` float(10,2) DEFAULT NULL,
  `cashbook_debit_receivable` float(20,2) NOT NULL,
  `cashbook_credit` float(10,2) DEFAULT NULL,
  `cashbook_credit_payable` float(20,2) NOT NULL,
  `cashbook_balance` float(10,2) NOT NULL,
  `contractor_transaction_id` int(7) DEFAULT NULL,
  `customer_transaction_id` int(5) DEFAULT NULL,
  `salary_id` int(5) DEFAULT NULL,
  `sale_id` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contractor`
--

CREATE TABLE `tbl_contractor` (
  `contractor_id` int(3) NOT NULL,
  `contractor_category_id` int(2) NOT NULL,
  `contractor_name` varchar(100) NOT NULL,
  `contractor_address` text NOT NULL,
  `contractor_mobile` varchar(20) NOT NULL,
  `number_of_labor` varchar(10) NOT NULL,
  `due_amount` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contractor_category`
--

CREATE TABLE `tbl_contractor_category` (
  `contractor_category_id` int(2) NOT NULL,
  `contractor_category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contractor_transaction`
--

CREATE TABLE `tbl_contractor_transaction` (
  `contractor_transaction_id` int(7) NOT NULL,
  `contractor_id` int(3) NOT NULL,
  `net_amount` float(10,2) NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `total_due_amount` float(10,2) NOT NULL,
  `previous_due` float(10,2) NOT NULL,
  `contractor_transaction_time` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_credit_category`
--

CREATE TABLE `tbl_credit_category` (
  `credit_category_id` int(2) NOT NULL,
  `credit_category_name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_mobile` varchar(20) NOT NULL,
  `due_amount` float(10,2) NOT NULL,
  `due_bricks` float(10,2) NOT NULL,
  `bricks_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_transaction`
--

CREATE TABLE `tbl_customer_transaction` (
  `customer_transaction_id` int(7) NOT NULL,
  `customer_id` int(3) NOT NULL,
  `net_amount` float(10,2) NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `total_due_amount` float(10,2) NOT NULL,
  `previous_due` float(10,2) NOT NULL,
  `customer_transaction_time` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_debit_category`
--

CREATE TABLE `tbl_debit_category` (
  `debit_category_id` int(2) NOT NULL,
  `debit_category_name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `employee_id` int(4) NOT NULL,
  `employee_type` tinyint(1) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `employee_address` text NOT NULL,
  `employee_mobile` varchar(20) NOT NULL,
  `employee_nid` varchar(20) NOT NULL,
  `employee_salary` float(10,2) NOT NULL,
  `due_amount` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_price`
--

CREATE TABLE `tbl_price` (
  `price_id` int(2) NOT NULL,
  `quality` varchar(1) NOT NULL,
  `price` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary`
--

CREATE TABLE `tbl_salary` (
  `salary_id` int(7) NOT NULL,
  `employee_id` int(3) NOT NULL,
  `net_amount` float(10,2) NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `total_due_amount` float(10,2) NOT NULL,
  `previous_due` float(10,2) NOT NULL,
  `salary_time` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale`
--

CREATE TABLE `tbl_sale` (
  `sale_id` int(7) NOT NULL,
  `ref_no` varchar(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_mobile` varchar(20) NOT NULL,
  `vehicle_no` varchar(20) DEFAULT NULL,
  `time` varchar(35) NOT NULL,
  `bricks_name` varchar(20) DEFAULT NULL,
  `net_price` float(20,2) DEFAULT NULL,
  `discount` float(20,2) NOT NULL,
  `note` text,
  `due_bricks` varchar(10) NOT NULL,
  `quantity` varchar(10) DEFAULT NULL,
  `due` float(10,2) NOT NULL DEFAULT '0.00',
  `paid` float(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_cashbook`
--
ALTER TABLE `tbl_cashbook`
  ADD PRIMARY KEY (`cashbook_id`);

--
-- Indexes for table `tbl_contractor`
--
ALTER TABLE `tbl_contractor`
  ADD PRIMARY KEY (`contractor_id`);

--
-- Indexes for table `tbl_contractor_category`
--
ALTER TABLE `tbl_contractor_category`
  ADD PRIMARY KEY (`contractor_category_id`);

--
-- Indexes for table `tbl_contractor_transaction`
--
ALTER TABLE `tbl_contractor_transaction`
  ADD PRIMARY KEY (`contractor_transaction_id`);

--
-- Indexes for table `tbl_credit_category`
--
ALTER TABLE `tbl_credit_category`
  ADD PRIMARY KEY (`credit_category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_customer_transaction`
--
ALTER TABLE `tbl_customer_transaction`
  ADD PRIMARY KEY (`customer_transaction_id`);

--
-- Indexes for table `tbl_debit_category`
--
ALTER TABLE `tbl_debit_category`
  ADD PRIMARY KEY (`debit_category_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `tbl_price`
--
ALTER TABLE `tbl_price`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cashbook`
--
ALTER TABLE `tbl_cashbook`
  MODIFY `cashbook_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contractor`
--
ALTER TABLE `tbl_contractor`
  MODIFY `contractor_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contractor_category`
--
ALTER TABLE `tbl_contractor_category`
  MODIFY `contractor_category_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contractor_transaction`
--
ALTER TABLE `tbl_contractor_transaction`
  MODIFY `contractor_transaction_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_credit_category`
--
ALTER TABLE `tbl_credit_category`
  MODIFY `credit_category_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer_transaction`
--
ALTER TABLE `tbl_customer_transaction`
  MODIFY `customer_transaction_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_debit_category`
--
ALTER TABLE `tbl_debit_category`
  MODIFY `debit_category_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `employee_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_price`
--
ALTER TABLE `tbl_price`
  MODIFY `price_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  MODIFY `salary_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  MODIFY `sale_id` int(7) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
