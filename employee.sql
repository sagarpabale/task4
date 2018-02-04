-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 04, 2018 at 05:15 PM
-- Server version: 5.0.27
-- PHP Version: 5.2.1
-- 
-- Database: `employee`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_employee`
-- 

CREATE TABLE `tbl_employee` (
  `SerialNo` int(5) NOT NULL auto_increment,
  `Year` int(5) NOT NULL,
  `EmployeeCount` decimal(5,0) NOT NULL,
  `UpdatedOn` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`SerialNo`),
  UNIQUE KEY `Year` (`Year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `tbl_employee`
-- 

INSERT INTO `tbl_employee` (`SerialNo`, `Year`, `EmployeeCount`, `UpdatedOn`) VALUES 
(1, 2016, 100, '2018-02-04 22:43:08'),
(2, 2017, 50, '2018-02-04 22:44:07'),
(3, 2018, 75, '2018-02-04 22:44:07');
