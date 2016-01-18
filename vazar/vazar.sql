-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2015 at 08:22 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vazar`
--
CREATE DATABASE IF NOT EXISTS `vazar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vazar`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Electronics'),
(2, 'Vehicles'),
(3, 'Clothing'),
(4, 'Musical instruments'),
(5, 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE IF NOT EXISTS `fields` (
  `field_id` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(32) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`field_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`field_id`, `field_name`, `sub_category_id`) VALUES
(1, 'Color', 1),
(2, 'Brand', 1),
(3, 'OS', 1),
(4, 'Color', 2),
(5, 'Brand', 2),
(6, 'Display Size', 2),
(7, 'Color', 3),
(8, 'Brand', 3),
(9, 'Warranty', 3),
(10, 'Mileage', 4),
(11, 'Brand', 4),
(12, 'Color', 4),
(13, 'Mileage', 5),
(14, 'Brand', 5),
(15, 'Color', 5),
(16, 'Gear', 6),
(17, 'Brand', 6),
(18, 'Color', 6),
(19, 'Color', 7),
(20, 'Brand', 7),
(21, 'Size', 7),
(22, 'Color', 8),
(23, 'Brand', 8),
(24, 'Size', 8),
(25, 'Color', 9),
(26, 'Brand', 9),
(27, 'Size', 9),
(28, 'Brand', 10),
(29, 'Color', 10),
(30, 'Type', 10),
(31, 'Brand', 11),
(32, 'Color', 11),
(33, 'Type', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_date_time` datetime NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `buyer_id`, `seller_id`, `total`, `order_date_time`) VALUES
(1, 3, 2, 288000, '2015-01-31 14:13:32'),
(2, 3, 3, 108000, '2015-01-31 14:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `order_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`order_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 2, 7),
(2, 1, 1, 8),
(3, 2, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `sold_quantity` int(11) DEFAULT '0',
  `product_name` varchar(32) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `product_description` varchar(300) NOT NULL,
  `product_link1` varchar(128) NOT NULL,
  `product_link2` varchar(128) NOT NULL,
  `product_link3` varchar(128) NOT NULL,
  `product_date_time` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `sold_quantity`, `product_name`, `product_quantity`, `product_price`, `product_description`, `product_link1`, `product_link2`, `product_link3`, `product_date_time`, `user_id`, `category_id`, `sub_category_id`) VALUES
(1, 7, 'Nokia Lumia 1520', 50, 36000, 'Latest Nokia Lumia by Windows', 'files/06arl19mf0.jpg', 'files/zoorcyoyo4.jpg', 'files/2bbz5x30h4.jpg', '2015-01-31 04:56:50', 2, 1, 1),
(2, 7, 'Samsung Galaxy S5', 10, 44000, 'Samsungs latest model', 'files/bqoulejghk.jpg', 'files/dc9nakhso8.jpg', 'files/2nopsgz7uy.jpg', '2015-01-31 05:00:18', 2, 1, 1),
(4, 0, 'Dell Inspiron Touch Screen', 7, 89000, 'A brilliant model of DELL Laptop', 'files/gemift3w4a.jpg', 'files/gpqeb0k6hu.jpg', 'files/w8kstn444v.jpg', '2015-01-31 05:06:55', 3, 1, 2),
(7, 2, 'Dell XPS', 12, 54000, 'It''s one of the Best Seller of Dell', 'files/a5sbrybeoc.jpg', 'files/wzo8rnm4lw.jpg', 'files/maxoykv1vl.jpg', '2015-01-31 06:05:42', 3, 1, 2),
(14, 0, 'BMW M6', 1, 10000000, 'Used with personal care.', 'files/apgv6xcbyc.jpg', 'files/3dexl2xjrq.jpg', 'files/9q8q30t6wf.jpg', '2015-01-31 18:10:29', 3, 2, 4),
(15, 0, 'Personal Toyota Car For Sale. ', 1, 2500000, 'Fresh condition. ', 'files/jajvcfmhua.jpg', 'files/dojghf6cch.jpg', 'files/b2g06ot2hn.jpg', '2015-01-31 18:12:34', 3, 2, 4),
(16, 0, 'Ford Car', 2, 50000000, 'My personal favorite car. Selling due to some money crisis. ', 'files/jjoi7zs9jz.jpg', 'files/bwys0h4hwq.jpg', 'files/lqxsfxqtrd.jpg', '2015-01-31 18:19:22', 3, 2, 4),
(17, 0, 'HTC Desire', 5, 20000, 'Brand new. With warranty.', 'files/s0eyd7iutg.jpg', 'files/wzw10lr01r.jpg', 'files/49ngzoxu6u.jpg', '2015-01-31 18:22:51', 1, 1, 1),
(18, 0, 'HTC One M8', 10, 15000, 'Brand new.', 'files/et2lqmptkr.jpg', 'files/mthwh90oyp.jpg', 'files/7vzmki26yj.jpg', '2015-01-31 18:24:02', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_fields`
--

CREATE TABLE IF NOT EXISTS `product_fields` (
  `product_field_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `field_value` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`product_field_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `product_fields`
--

INSERT INTO `product_fields` (`product_field_id`, `product_id`, `field_id`, `field_value`) VALUES
(1, 1, 1, 'Yellow'),
(2, 1, 2, 'Nokia'),
(3, 1, 3, 'Windows'),
(4, 2, 1, 'Silver'),
(5, 2, 2, 'Samsung'),
(6, 2, 3, 'Android'),
(7, 3, 1, 'Black'),
(8, 3, 2, 'HTC'),
(9, 3, 3, 'Android'),
(10, 4, 4, 'Silver'),
(11, 4, 5, 'DELL'),
(12, 4, 6, '15 Inch Touchscreen'),
(13, 5, 4, 'Black'),
(14, 5, 5, 'ASUS'),
(15, 5, 6, '14 inch LED display'),
(16, 0, 1, 'a'),
(17, 0, 2, 'a'),
(18, 0, 3, 'a'),
(19, 12, 1, 'a'),
(20, 12, 2, 'a'),
(21, 12, 3, 'a'),
(22, 13, 4, 'Black'),
(23, 13, 5, 'Dell'),
(24, 13, 6, '14'),
(25, 14, 10, '2000'),
(26, 14, 11, 'BMW'),
(27, 14, 12, 'Gray'),
(28, 15, 10, '10'),
(29, 15, 11, 'Toyota'),
(30, 15, 12, 'Gray'),
(31, 16, 10, '10'),
(32, 16, 11, 'Ford'),
(33, 16, 12, 'Gray'),
(34, 17, 1, 'Gray'),
(35, 17, 2, 'HTC'),
(36, 17, 3, 'Android'),
(37, 18, 1, 'Black'),
(38, 18, 2, 'HTC'),
(39, 18, 3, 'Android');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `sub_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_category_name` varchar(32) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sub_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_category_id`, `sub_category_name`, `category_id`) VALUES
(1, 'Mobile', 1),
(2, 'Laptop', 1),
(3, 'Electronic Accessories', 1),
(4, 'Cars', 2),
(5, 'Motorbike', 2),
(6, 'Bicycle', 2),
(7, 'Men', 3),
(8, 'Women', 3),
(9, 'Baby', 3),
(10, 'Guitar', 4),
(11, 'Drums', 4),
(12, 'Flute', 4),
(13, 'Chairs', 5),
(14, 'Tables', 5),
(15, 'Bed', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE IF NOT EXISTS `user_accounts` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(32) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_mobile` varchar(16) NOT NULL,
  `user_location` varchar(64) DEFAULT NULL,
  `user_date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_id`, `user_name`, `user_email`, `user_password`, `user_mobile`, `user_location`, `user_date_time`) VALUES
(1, 'Anik', 'd10ca8d11301c2f4993ac2279ce4b930', 'c4ca4238a0b923820dcc509a6f75849b', '1234', '1/D-7/31 Mirpur, Dhaka-1216', '2015-01-30 13:17:43'),
(2, 'Sakib', '94e7e96a7353db64ff3ebbf1403e3e0b', 'c4ca4238a0b923820dcc509a6f75849b', '12345', '1/19, Nurzahan Road, Mohammadour', '2015-01-31 04:04:49'),
(3, 'Zilani', 'f877d16d9aea8f16686eec439d4de1e6', '7815696ecbf1c96e6894b779456d330e', '123456', '', '2015-01-31 04:08:15'),
(6, 'abc', '6bb2827c1f4324ed075408e7f5b4207b', '7815696ecbf1c96e6894b779456d330e', '12345678901', 'Mirpur', '2015-01-31 20:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `wishlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`wishlist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `user_id`, `product_id`) VALUES
(6, 1, 1),
(7, 1, 14),
(8, 6, 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
