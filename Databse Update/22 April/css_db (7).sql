-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2022 at 08:12 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`id`, `email`, `sender`, `msg`, `time`, `date`) VALUES
(1, 'customer1@gmail.com', 'sam', 'Hello there, I am created a ticket to solve my problem', '06:04 pm', '21-Apr-2022'),
(2, 'customer1@gmail.com', 'sam', 'Hello there, I am created a ticket to solve my problem', '06:05 pm', '21-Apr-2022'),
(3, 'staff1@gmail.com', '', 'Ok hello', '06:07 pm', '21-Apr-2022'),
(4, 'staff1@gmail.com', '', 'Let check', '06:08 pm', '21-Apr-2022'),
(5, 'customer1@gmail.com', 'sam', 'Hello admin', '06:17 pm', '21-Apr-2022'),
(6, 'admin', '', 'Ok hy there', '06:17 pm', '21-Apr-2022'),
(7, 'admin', '', 'SO its work', '06:17 pm', '21-Apr-2022'),
(8, 'customer1@gmail.com', 'sam', 'Ok cool', '06:17 pm', '21-Apr-2022'),
(9, 'customer1@gmail.com', 'sam', 'Hello there , any one here to help me', '10:32 pm', '21-Apr-2022'),
(10, 'staff1@gmail.com', '', 'Ok please share how we can help you', '10:32 pm', '21-Apr-2022');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `user_type`, `ticket_id`, `comment`, `date_created`) VALUES
(1, 1, 3, 8, '&lt;p&gt;Please check It&amp;nbsp;&lt;/p&gt;', '2022-04-21 18:07:09'),
(2, 2, 2, 8, '&lt;p&gt;Ok we&amp;#x2019;re assign it to supplier&amp;nbsp;&lt;/p&gt;', '2022-04-21 18:12:08'),
(3, 1, 3, 9, '&lt;p&gt;Ok i have created a ticket, please check...&lt;/p&gt;', '2022-04-21 22:34:34'),
(4, 2, 2, 9, '&lt;p&gt;zOk we&amp;#x2019;re checking&amp;nbsp;&lt;/p&gt;', '2022-04-21 22:36:59'),
(5, 2, 2, 9, '&lt;p&gt;Hello sir, you collect your device&amp;nbsp;&lt;/p&gt;', '2022-04-21 22:41:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `middlename`, `contact`, `address`, `email`, `password`, `date_created`, `status`) VALUES
(1, 'sam', 'customer', 'customer', '32543', 'd', 'customer1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-19 17:48:10', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `date_created`) VALUES
(1, 'IT Department ', 'It information ', '2022-04-19 17:44:45'),
(2, 'Mobile department ', 'Mobile ', '2022-04-19 17:44:57');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `description`, `date_created`) VALUES
(1, 'Xiaomi Mobile ', 'china mobile ', '2022-04-19 17:45:27'),
(2, 'Website ', 'premium web', '2022-04-19 17:45:45'),
(3, 'Headphone', 's', '2022-04-21 18:16:16');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `department_id`, `firstname`, `lastname`, `middlename`, `contact`, `address`, `email`, `password`, `date_created`, `status`) VALUES
(1, 1, 'sabbir', 'sabbir', 'staffs', '0130449896848', 'saint martin ', 'staff1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-19 17:47:17', 0),
(2, 2, 'Demo', 'One', 'Test', '0148496365', 's', 'test@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-21 18:10:39', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `product_id`, `firstname`, `lastname`, `middlename`, `contact`, `address`, `email`, `password`, `department_id`, `date_created`) VALUES
(1, 2, 'saiful', 'saiful', 'supplier', '12345', 'Dhaka ', 'supplier1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2022-04-19 17:46:32'),
(2, 2, 'z', 'z', 'z', '0130449896848', 'z', 'z@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, '2022-04-19 17:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_ticket`
--

DROP TABLE IF EXISTS `supplier_ticket`;
CREATE TABLE IF NOT EXISTS `supplier_ticket` (
  `id` int NOT NULL AUTO_INCREMENT,
  `select_suplier_id` varchar(500) NOT NULL,
  `Ticket_id` int NOT NULL,
  `supplier_name_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier_ticket`
--

INSERT INTO `supplier_ticket` (`id`, `select_suplier_id`, `Ticket_id`, `supplier_name_id`) VALUES
(1, 'Z, Z Z', 4, 2),
(2, 'Z, Z Z', 3, 0),
(3, 'Saiful, Saiful Supplier', 1, 0),
(4, 'Saiful, Saiful Supplier', 6, 1),
(5, 'Z, Z Z', 8, 2),
(6, 'Z, Z Z', 9, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `subject`, `description`, `status`, `department_id`, `customer_id`, `staff_id`, `admin_id`, `supplier_id`, `date_created`) VALUES
(2, 'Web', '&lt;p&gt;web&lt;br&gt;&lt;/p&gt;', 0, 2, 1, 0, 0, 0, '2022-04-19 18:01:36'),
(3, 'It 2', '&lt;p&gt;it 2&lt;br&gt;&lt;/p&gt;', 0, 1, 1, 0, 0, 0, '2022-04-19 18:01:49'),
(4, 'web 2', '&lt;p&gt;web 2&lt;br&gt;&lt;/p&gt;', 0, 2, 1, 0, 0, 0, '2022-04-19 18:02:00'),
(5, 'sa', '&lt;p&gt;s&lt;/p&gt;', 0, 2, 1, 0, 0, 2, '2022-04-19 18:08:25'),
(6, 'sa', '&lt;p&gt;mi&lt;/p&gt;', 0, 1, 1, 0, 0, 2, '2022-04-19 18:09:00'),
(7, 'Ok lets check', '&lt;p&gt;sa&lt;/p&gt;', 0, 1, 1, 0, 1, 1, '2022-04-21 17:58:15'),
(8, 'My mobile hang', '&lt;h6&gt;&lt;b&gt;&lt;u&gt;My mobile is broke&amp;nbsp;&lt;/u&gt;&lt;/b&gt;&lt;/h6&gt;', 2, 2, 1, 0, 0, 2, '2022-04-21 18:06:03'),
(9, 'My mobile is not turned on', '&lt;p&gt;&lt;b&gt;&lt;i&gt;Its not working.&amp;nbsp;&lt;/i&gt;&lt;/b&gt;&lt;/p&gt;&lt;ol&gt;&lt;li&gt;&lt;b&gt;&lt;i&gt;some text&lt;/i&gt;&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b&gt;&lt;i&gt;some&amp;nbsp;&lt;/i&gt;&lt;/b&gt;&lt;/li&gt;&lt;/ol&gt;', 2, 2, 1, 0, 0, 2, '2022-04-21 22:33:54');

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
(1, 'admin@gmail.com', 'Admin', '', 'sabbir', 1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
