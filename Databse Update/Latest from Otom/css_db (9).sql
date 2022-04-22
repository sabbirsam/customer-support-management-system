-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2022 at 07:53 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `css_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `box`
--

DROP TABLE IF EXISTS `box`;
CREATE TABLE IF NOT EXISTS `box` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`id`, `email`, `sender`, `msg`, `time`, `date`) VALUES
(135, 'demo@gmail.com', 'Customer', 'hello sir', '01:22 pm', '26-Mar-2022'),
(136, 'admin', '', 'hello sir', '01:28 pm', '26-Mar-2022'),
(137, 'stuff@gmail.com', '', 'hi', '10:12 am', '27-Mar-2022'),
(138, 'admin', '', 'Plase ', '12:59 pm', '02-Apr-2022'),
(139, 'staff@gmail.com', '', 'Dear sir', '07:50 pm', '03-Apr-2022'),
(140, 'admin', '', 'Ok hello', '08:02 pm', '09-Apr-2022'),
(141, 'admin', '', 'Ok hello', '08:02 pm', '09-Apr-2022'),
(142, 'admin', '', 'nice ', '08:03 pm', '09-Apr-2022'),
(143, 'admin', '', 'nice ', '08:04 pm', '09-Apr-2022'),
(144, 'admin', '', 'some data', '03:45 am', '13-Apr-2022'),
(145, 'admin', '', 'Ok please creatn an tickt so our support team can help you', '11:13 pm', '13-Apr-2022');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `user_type` tinyint(1) NOT NULL COMMENT '1= admin, 2= staff,3= customer',
  `ticket_id` int NOT NULL,
  `comment` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `user_type`, `ticket_id`, `comment`, `date_created`) VALUES
(2, 5, 2, 3, '&lt;p&gt;ok working&lt;/p&gt;', '2022-03-26 23:57:46'),
(3, 7, 2, 5, '&lt;p&gt;Your issue want found&lt;/p&gt;', '2022-04-02 00:00:17'),
(4, 7, 3, 5, '&lt;p&gt;Thank you&amp;nbsp;&lt;/p&gt;', '2022-04-02 00:00:58'),
(5, 7, 3, 5, '&lt;p&gt;&lt;span style=&quot;font-size: 24px;&quot;&gt;﻿&lt;/span&gt;&lt;span style=&quot;font-size: 24px;&quot;&gt;Hello&lt;/span&gt;&lt;/p&gt;', '2022-04-02 00:01:21'),
(6, 1, 1, 5, '&lt;p&gt;Sorry&lt;/p&gt;', '2022-04-02 00:02:08'),
(7, 12, 3, 9, '&lt;p&gt;Please fix as soon as possible&amp;nbsp;&lt;/p&gt;', '2022-04-09 19:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `middlename`, `contact`, `address`, `email`, `password`, `date_created`, `status`) VALUES
(4, 'Sabbir ', 'sam', 'Ahmed ', '01892465677', 'Dhaka Bangladesh ', 'sabbir1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-02-22 14:45:19', 0),
(10, 'akhi', 'tonima', 'akter ', '0123457888', 'khulna ', 'akhi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-05 22:20:23', 0),
(14, 'kabir ', 'abir', 'hossain', '01777890071', 'khulna ', 'kabir0@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-13 03:57:51', 0),
(15, 'anika  ', 'mou ', 'akhter ', '0181516001', 'Gazipur', 'anika@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-13 03:58:24', 0),
(16, 'dipu', 'rony', 'Ahmed ', '01912345678', 'mirpur10,dhaka', 'dipu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-15 00:51:49', 0),
(17, 'mahbub', 'rubel', 'alom', '018923467821', 'barisal ', 'mahbub@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-15 00:54:16', 0),
(18, 'asraful', 'asif', 'alom', '01780713112', 'Manikganj ', 'asif@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-15 00:58:58', 0),
(19, 'monira ', 'moni', 'akter ', '017807111131', 'chittagong', 'moni@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-15 01:00:42', 0),
(20, 'rafsunjani', 'rafsun', 'Ahmed ', '01934569801', 'Madaripur', 'rafsun@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-15 01:04:04', 0),
(21, 'alamin ', 'tamim', 'khan', '01312455091', 'bhola', 'alamin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-15 01:06:28', 0),
(22, 'roman', 'jamir', 'hossain', '5448961', 'bougra', 'roman@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-15 12:32:27', 0),
(23, 'mohin', 'monir', 'Ahmed ', '2598528', 'mirpur 1,dhaka', 'mohin@gamil.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-15 19:34:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `date_created`) VALUES
(1, 'I.T. Department', 'Information technology Department', '2020-11-09 11:43:18'),
(3, 'Walton Ref', 'Some test', '2022-02-24 14:14:34'),
(8, 'Mobile Department', 'mobile repair', '2022-04-15 01:09:22'),
(10, '  walton Refrigerator', 'Refrigerator repair service ', '2022-04-15 01:20:22'),
(11, 'Engine & Home Appliance ', 'eng and home apply service ', '2022-04-15 01:23:24'),
(12, 'television ', 'television repair service ', '2022-04-15 12:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` text NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `description`, `date_created`) VALUES
(1, 'WALTON Laptop', 'LAPTOP Accecoriesss', '2020-11-09 11:43:18'),
(5, 'refrigerator', 'refrigerator  problem solved ', '2022-04-06 16:41:48'),
(7, 'mobile phone ', 'mobile realtive  problem solve', '2022-04-06 17:25:03'),
(8, 'Charger ', 'China charger ', '2022-04-09 19:51:48'),
(9, 'air cooler ', 'home apply product  ', '2022-04-15 01:24:31'),
(10, 'romjansorpot', 'good ', '2022-04-15 12:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `department_id` int NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `department_id`, `firstname`, `lastname`, `middlename`, `contact`, `address`, `email`, `password`, `date_created`, `status`) VALUES
(2, 1, 'sakbib', 'bappy', 'rahman', '0130449896848', 'Dhaka bangladesh ', 'staff@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-02-22 14:44:07', 0),
(5, 3, 'Rahim', 'kabir', 'hossain', '1546528', 'Pabna', 'staff1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-03-26 23:54:22', 0),
(8, 8, 'saimon ', 'rohman', 'ahmed ', '5448961', 'kumila', 'staff4@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-05 22:15:43', 0),
(9, 12, 'rojan', 'romjan', 'rojan', '0016846851', 'pabna', 'staffrom@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-15 12:29:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `department_id` int NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `product_id`, `firstname`, `lastname`, `middlename`, `contact`, `address`, `email`, `password`, `department_id`, `date_created`) VALUES
(7, 7, 'Marco ', 'devin', 'moshe ', '0016846851', 'china', 'supplier@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2022-04-11 22:09:46'),
(8, 5, 'Rahim', 'sam', 'Ahmed ', '1546528', 'japan', 'saml@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 3, '2022-04-11 22:15:08'),
(9, 7, 'don ', 'jr', 'naimar ', '009123456789777', 'south korea', 'supplier2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 8, '2022-04-15 01:36:34'),
(10, 10, 'jam', 'roy', 'king', '0016846851', 'dubai', 'suppliertel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 12, '2022-04-15 12:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_ticket`
--

DROP TABLE IF EXISTS `supplier_ticket`;
CREATE TABLE IF NOT EXISTS `supplier_ticket` (
  `id` int NOT NULL AUTO_INCREMENT,
  `select_suplier_id` varchar(500) NOT NULL,
  `Ticket_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier_ticket`
--

INSERT INTO `supplier_ticket` (`id`, `select_suplier_id`, `Ticket_id`) VALUES
(9, 'Sam, Demo Title  Demo0', 10),
(10, 'Sam, Demo Title  Hossain', 12),
(11, 'Modu, Supplier Kodu Jodu', 13),
(12, 'Jr, Don  Naimar ', 21),
(13, 'Jr, Don  Naimar ', 22),
(14, 'Sam, Rahim Ahmed ', 17),
(15, 'Sam, Rahim Ahmed ', 18),
(16, 'Sap, Rom Jan', 27);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=Pending,1=on process,2= Closed',
  `department_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `admin_id` int NOT NULL,
  `supplier_id` int NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `subject`, `description`, `status`, `department_id`, `customer_id`, `staff_id`, `admin_id`, `supplier_id`, `date_created`) VALUES
(2, 'My mobile phone is broke ', 'OK', 2, 1, 9, 2, 0, 2, '2022-04-05 00:00:00'),
(6, 'My mobile phone is broke ', 'OWW Joss', 2, 1, 9, 2, 0, 2, '2022-04-05 00:00:00'),
(13, 'Xiaomi phone screen is black', 'Sudden my mobile screen turned ', 0, 1, 4, 0, 1, 7, '2022-04-11 00:00:00'),
(16, 'My phone broken ', '&lt;p&gt;Hello Trst&lt;/p&gt;', 0, 1, 4, 0, 0, 7, '2022-04-11 00:00:00'),
(17, ' Walton Fridge issues  ', '&lt;p&gt;Ok&lt;/p&gt;', 0, 3, 14, 0, 0, 0, '2017-04-10 00:00:00'),
(18, 'demo', '&lt;p&gt;Some&amp;nbsp;&lt;/p&gt;', 0, 3, 14, 0, 1, 7, '2018-04-11 00:00:00'),
(20, 'Walton WFA-2A3-GDEL-XX ', '&lt;p&gt;&lt;span style=&quot;color: rgb(32, 33, 36); font-family: arial, sans-serif; font-size: 14px;&quot;&gt;Refrigerator problem food don&quot;t cool.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, 3, 15, 0, 1, 8, '2022-04-14 00:00:00'),
(24, 'mobile sumsang ', '&lt;p&gt;mobile phone sound dont work&lt;/p&gt;', 0, 8, 21, 0, 0, 0, '2022-04-15 00:00:00'),
(25, 'refgator', '&lt;p&gt;some problem&lt;/p&gt;', 0, 3, 21, 0, 0, 0, '2022-04-15 00:00:00'),
(26, 'romjan', '&lt;p&gt;goood&amp;nbsp;&lt;/p&gt;', 0, 12, 22, 0, 0, 0, '2022-04-15 00:00:00'),
(27, 'Mobile screen', '&lt;p&gt;Romjan&lt;/p&gt;', 1, 12, 22, 0, 0, 0, '2022-04-15 00:00:00'),
(28, 'Mobile damage ', '&lt;p&gt;gcjggh&lt;/p&gt;', 1, 8, 21, 0, 0, 0, '2022-04-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL COMMENT '1 = Admin,2=support',
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `date_created` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `middlename`, `lastname`, `role`, `username`, `password`, `date_created`, `status`) VALUES
(1, 'admin@gmail.com', 'Admin', '', '', 1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
