-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2022 at 03:44 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

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
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`id`, `email`, `sender`, `msg`, `time`, `date`) VALUES
(123, 'admin', '', 'Hi Jaman what is your issue', '01:55 pm', '24-Feb-2022'),
(124, 'demo@gmail.com', 'Customer', 'My phone is broke', '01:55 pm', '24-Feb-2022'),
(125, 'stuff@gmail.com', '', 'Ok we will fix it', '01:55 pm', '24-Feb-2022'),
(126, 'admin', '', 'Super ', '01:58 pm', '24-Feb-2022'),
(127, 'admin', '', 'Ok jaman good bye', '01:58 pm', '24-Feb-2022'),
(128, 'demo@gmail.com', 'Customer', 'Thanks', '01:59 pm', '24-Feb-2022'),
(129, 'demo@gmail.com', 'Customer', 'So', '01:59 pm', '24-Feb-2022'),
(130, 'admin', '', 'ds', '01:59 pm', '24-Feb-2022'),
(131, 'admin', '', 'Hi sabbir ', '02:13 pm', '24-Feb-2022'),
(132, 'stuff@gmail.com', '', 'Ho ', '02:23 pm', '24-Feb-2022'),
(133, 'admin', '', 'Really', '02:07 pm', '05-Apr-2022');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `user_id` int(30) NOT NULL,
  `user_type` tinyint(1) NOT NULL COMMENT '1= admin, 2= staff,3= customer',
  `ticket_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `user_type`, `ticket_id`, `comment`, `date_created`) VALUES
(1, 1, 1, 1, '&lt;p&gt;Sample Comment only&lt;/p&gt; ', '2020-11-09 14:52:16'),
(3, 2, 3, 1, '&lt;p&gt;Sample&amp;nbsp;&lt;/p&gt;', '2020-11-09 15:36:56'),
(4, 1, 1, 1, '&lt;p&gt;Ok&lt;/p&gt;', '2022-04-08 14:51:04'),
(5, 1, 1, 3, '', '2022-04-09 03:16:06'),
(6, 1, 1, 3, '', '2022-04-09 03:16:44'),
(7, 1, 1, 2, '&lt;p&gt;Ok&lt;br&gt;&lt;/p&gt;', '2022-04-11 21:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `middlename`, `contact`, `address`, `email`, `password`, `date_created`) VALUES
(1, 'John', 'Smith', 'C', '+18456-5455-55', 'Sample', 'jsmith@sample.com', '1254737c076cf867dc53d60a0364f38e', '2020-11-09 10:24:42'),
(2, 'Claire', 'Blake', 'C', '+18456-5455-55', 'Sample address', 'cblake@sample.com', '4744ddea876b11dcb1d169fadf494418', '2020-11-09 10:48:30'),
(3, 'Sabbir', 'Sam', 'Ahmed', '01307107409', 'Dhaka, Bangladesh. ', 'sabbir@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-08 14:45:18'),
(4, 'Demo', 'Ferdows', 'Test', '0148496365', 'sa', 'demo2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-08 14:51:43'),
(5, 'Demo', 'Ferdows', 'customer', '0130449896848', 'sa', 'demo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-08 14:58:16'),
(6, 'Stuff new one', 'Ferdows', 'Staff ', '0148496365', 'sa', 'saiftheboss7@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-11 21:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `date_created`) VALUES
(1, 'I.T. Department', 'Information technology Department', '2020-11-09 11:43:18'),
(2, 'Sample Department', 'Sample Department', '2020-11-09 11:44:08'),
(3, 'Test Department', 'Test Department', '2020-11-09 11:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `product_name` text NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `description`, `date_created`) VALUES
(1, 'WALTON Laptop', 'LAPTOP Accecories', '2020-11-09 11:43:18'),
(3, 'Friz', 'Refegrator Department', '2020-11-09 11:44:41'),
(4, 'ss', 'ss', '2022-04-06 16:47:00'),
(5, 'Headphone', 'Premium headphone', '2022-04-08 14:40:11'),
(6, 'Laptop', 'Walton brand', '2022-04-08 14:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `department_id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `department_id`, `firstname`, `lastname`, `middlename`, `contact`, `address`, `email`, `password`, `date_created`) VALUES
(1, 1, 'George', 'Wilson', 'D', '+6948 8542 623', 'Sample Address', 'staff@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2020-11-09 11:59:01'),
(2, 2, 'Stuff', 'Ferdows', 'Staff ', '0130449896848', 's', 'samiubat14@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-08 14:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `product_id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `department_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `product_id`, `firstname`, `lastname`, `middlename`, `contact`, `address`, `email`, `password`, `department_id`, `date_created`) VALUES
(1, 1, 'supplier George', 'Wilson', 'K', '+6948 8542 623', 'Sample Address', 'supplier@sample.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, '2020-11-09 11:59:01'),
(2, 6, 'Kodu', 'jodu', 'hasan', '4554', 'Walton', 'kodu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2022-04-08 14:41:41'),
(3, 4, 'Stuff', 'One', 'Test', '0130449896848', 's', 'sa@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, '2022-04-08 15:38:36'),
(4, 6, '1', '1', '1', '1', '1', 'azizul@wppool.dev', 'c4ca4238a0b923820dcc509a6f75849b', 1, '2022-04-11 21:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_ticket`
--

DROP TABLE IF EXISTS `supplier_ticket`;
CREATE TABLE IF NOT EXISTS `supplier_ticket` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `select_suplier_id` varchar(500) NOT NULL,
  `Ticket_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_ticket`
--

INSERT INTO `supplier_ticket` (`id`, `select_suplier_id`, `Ticket_id`) VALUES
(1, 'One, Stuff Test', 7),
(2, 'Jodu, Kodu Hasan', 2),
(8, 'Wilson, Supplier George K', 8),
(9, 'Wilson, Supplier George K', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=Pending,1=on process,2= Closed',
  `department_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `subject`, `description`, `status`, `department_id`, `customer_id`, `staff_id`, `admin_id`, `supplier_id`, `date_created`) VALUES
(2, 'Walton Fridge issues  ', '&lt;p&gt;Walton fridge creating problem&amp;nbsp;&lt;/p&gt;', 0, 3, 4, 5, 1, 4, '2022-03-26 23:47:31'),
(3, 'Walton Fridge issues  ', '&lt;p&gt;Walton fridge creating problem&amp;nbsp;&lt;/p&gt;', 1, 3, 4, 5, 0, 1, '2022-03-26 23:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL COMMENT '1 = Admin,2=support',
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `role`, `username`, `password`, `date_created`) VALUES
(1, 'Administrator', '', '', 1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
