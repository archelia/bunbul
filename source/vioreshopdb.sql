-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2016 at 05:07 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vioreshopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id_ads` int(5) NOT NULL,
  `ads_title` varchar(256) NOT NULL,
  `ads_link` text NOT NULL,
  `ads_description` text NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(5) NOT NULL,
  `brand_name` varchar(256) NOT NULL,
  `brand_desc` text NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `brand_name`, `brand_desc`, `user_create`, `user_edit`, `date_created`, `date_edited`, `active`) VALUES
(3, 'Sinful', 'Sinful Shoes', 1, 1, '2015-11-26 11:11:54', '2015-12-31 09:21:24', 1),
(4, 'Excited', 'Excited is one of the best brand we have.', 1, 1, '2015-11-26 14:05:52', '2015-12-31 09:30:12', 1),
(5, 'Courage', 'Courage', 1, 1, '2015-12-01 00:00:00', '2015-12-31 09:27:29', 1),
(6, 'Fierce', 'Fierce', 1, 1, '2015-12-01 00:00:00', '2015-12-31 09:27:36', 1),
(7, 'Salvage', 'SALVAGE', 1, 1, '2015-12-01 00:00:00', '2015-12-31 09:27:49', 1),
(8, 'Spoon', 'Spoon', 1, 1, '2015-12-31 09:24:13', '2015-12-31 09:29:52', 1),
(9, 'Brand 1', 'asdasd', 1, 1, '2015-12-31 09:25:53', '2015-12-31 09:25:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(5) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category_name`, `category_description`, `user_create`, `user_edit`, `date_created`, `date_edited`, `active`) VALUES
(1, 'Shoes', 'Sinful Shoes', 1, 1, '2015-11-26 15:19:52', '2015-12-31 10:40:25', 1),
(2, 'T-Shirt', 'Just unordinary T-Shirt', 1, 1, '2015-11-26 15:20:07', '2015-12-31 10:35:23', 1),
(3, 'Jewelry', 'Fashion Accessories', 1, 1, '2015-12-31 00:00:00', '2015-12-31 00:00:00', 1),
(4, 'Bags', 'Sinful Super Quality Bags', 1, 1, '2015-12-31 00:00:00', '2015-12-31 00:00:00', 1),
(5, 'Clutch', 'Sinful  Clutch', 1, 1, '2015-12-31 00:00:00', '2015-12-31 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id_color` int(5) NOT NULL,
  `color_name` varchar(100) NOT NULL,
  `html_code` varchar(6) NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id_color`, `color_name`, `html_code`, `user_create`, `user_edit`, `date_created`, `date_edited`, `active`) VALUES
(1, 'White', 'FFFFFF', 1, 1, '2015-11-26 14:22:37', '2015-12-31 10:01:23', 1),
(2, 'Pink', 'FFC0CB', 1, 1, '2015-11-26 14:22:49', '2015-12-31 10:02:35', 1),
(3, 'Black', '000000', 1, 1, '2015-12-03 14:30:33', '2015-12-03 14:30:33', 1),
(4, 'Brown', 'A52A2A', 1, 1, '2015-12-31 09:37:21', '2015-12-31 10:08:37', 1),
(5, 'Grey', 'AAAAAA', 1, 1, '2015-12-31 09:39:09', '2015-12-31 09:39:09', 1),
(6, 'Apricot', 'FBCEB1', 1, 1, '2015-12-31 10:12:05', '2015-12-31 10:12:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(10) NOT NULL,
  `customer_name` varchar(256) NOT NULL,
  `gender` int(1) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date_joined` datetime NOT NULL,
  `last_online` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `id_customer` int(5) NOT NULL,
  `id_city` int(5) NOT NULL,
  `address` varchar(256) NOT NULL,
  `address2` varchar(256) NOT NULL,
  `address_name` varchar(256) NOT NULL,
  `address_phone` varchar(30) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupon`
--

CREATE TABLE `discount_coupon` (
  `id_coupon` int(10) NOT NULL,
  `code_coupon` varchar(20) NOT NULL,
  `discount_type` int(1) NOT NULL,
  `discount_amount` double NOT NULL,
  `discount_percent` int(2) NOT NULL,
  `discount_description` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_start` datetime NOT NULL,
  `date_expired` datetime NOT NULL,
  `date_used` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(10) NOT NULL,
  `gallery_title` varchar(256) NOT NULL,
  `gallery_url` varchar(256) NOT NULL,
  `gallery_description` text NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `gallery_title`, `gallery_url`, `gallery_description`, `user_create`, `user_edit`, `date_created`, `date_edited`, `active`) VALUES
(1, 'Birthday Cake', 'localhost/gallery?id=1', '&lt;p&gt;A birthday cake, Can be used as birthday present. Yup, it&amp;#39;s so tasty.&lt;/p&gt;\r\n', 1, 1, '2015-12-29 11:17:54', '2016-01-04 10:56:20', 1),
(2, 'Koala', 'localhost/gallery?id=1', '&lt;p&gt;This is Koala. It is so cute.&lt;/p&gt;\r\n', 1, 1, '2015-12-29 11:19:18', '2016-01-04 10:55:01', 1),
(3, 'Pinguin', 'localhost/gallery?id=3', '&lt;p&gt;This is Pinguin. Live in North Pole.&lt;/p&gt;\r\n', 1, 1, '2015-12-29 11:21:07', '2016-01-04 10:54:24', 1),
(4, 'Desserted Island', '/gallery?id=4', '&lt;p&gt;As far as you can see only sand.&lt;/p&gt;\r\n', 1, 1, '2016-01-04 10:59:42', '2016-01-04 10:59:42', 1),
(5, 'Light House', '/gallery?id=5', '&lt;p&gt;As far as you can see only ?&lt;/p&gt;\r\n', 1, 1, '2016-01-04 11:02:28', '2016-01-04 11:03:29', 1),
(6, 'Tulips', '/gallery?id=6', '&lt;p&gt;Yellow Tulips Flower.&lt;/p&gt;\r\n', 1, 1, '2016-01-04 11:02:51', '2016-01-04 11:02:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(20) NOT NULL,
  `id_product` int(20) NOT NULL,
  `id_size` int(5) NOT NULL,
  `id_color` int(5) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `stock` int(5) NOT NULL,
  `location` varchar(10) NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `id_product`, `id_size`, `id_color`, `sku`, `stock`, `location`, `user_create`, `user_edit`, `date_created`, `date_edited`, `active`) VALUES
(1, 0, 5, 1, '123465', 5, '1A', 1, 1, '2015-12-17 16:20:49', '2015-12-17 16:20:49', 1),
(2, 1, 5, 1, '123456', 1, '', 1, 1, '2015-12-17 17:01:59', '2015-12-17 17:01:59', 1),
(3, 1, 5, 1, '123456', 1, '', 1, 1, '2015-12-17 17:02:01', '2015-12-17 17:02:01', 1),
(4, 1, 5, 1, '123456', 1, '', 1, 1, '2015-12-17 17:02:01', '2015-12-17 17:02:01', 1),
(5, 1, 5, 1, '123456', 1, '', 1, 1, '2015-12-17 17:02:02', '2015-12-17 17:02:02', 1),
(6, 1, 5, 2, '165587', 125, '125A', 1, 1, '2015-12-19 13:40:48', '2015-12-19 13:40:48', 1),
(7, 1, 5, 2, '184547', 8, '64A', 1, 1, '2015-12-19 13:42:01', '2015-12-19 13:42:01', 1),
(8, 1, 5, 3, '987540', 60, '45A', 1, 1, '2015-12-19 13:43:46', '2015-12-19 13:43:46', 1),
(9, 1, 5, 3, '100', 15, '11', 1, 1, '2015-12-19 13:48:29', '2015-12-19 13:48:29', 1),
(10, 1, 5, 3, 'TRY001', 5, '13', 1, 1, '2015-12-21 09:34:39', '2015-12-21 09:34:39', 1),
(11, 1, 5, 2, 'TRY002', 5, '1243', 1, 1, '2015-12-21 09:58:58', '2015-12-21 09:58:58', 1),
(12, 2, 5, 2, 'TRY003', 4, '1', 1, 1, '2015-12-21 10:07:21', '2015-12-21 10:07:21', 1),
(13, 2, 5, 1, 'TRY004', 1, '12', 1, 1, '2015-12-21 10:41:23', '2015-12-21 10:41:23', 1),
(14, 2, 5, 3, 'TRY005', 1, '12', 1, 1, '2015-12-21 10:43:15', '2015-12-21 10:43:15', 1),
(15, 2, 14, 1, 'TRY007', 12, '12', 1, 1, '2015-12-21 11:43:09', '2015-12-21 11:43:09', 1),
(16, 2, 13, 1, 'TRY006', 12, '12', 1, 1, '2015-12-21 11:44:16', '2015-12-21 11:44:16', 1),
(17, 2, 12, 1, 'TRY008', 12, '12', 1, 1, '2015-12-21 11:44:49', '2015-12-21 11:44:49', 1),
(18, 0, 13, 2, 'Sinful Try22-12', 20, 'A45', 1, 1, '2015-12-28 11:35:59', '2015-12-28 11:35:59', 1),
(19, 45, 6, 1, '25-W35', 3, 'A45', 1, 1, '2015-12-28 11:39:58', '2015-12-28 11:39:58', 1),
(20, 46, 6, 1, 'TRY23-W35', 4, '4', 1, 1, '2015-12-28 11:46:25', '2015-12-28 11:46:25', 1),
(21, 46, 7, 1, 'TRY23-W36', 4, '4', 1, 1, '2015-12-28 11:52:30', '2015-12-28 11:52:30', 1),
(22, 47, 6, 1, 'TRY24-W35', 12, '12', 1, 1, '2015-12-28 11:56:06', '2015-12-28 11:56:06', 1),
(23, 47, 7, 1, 'TRY24-W36', 12, '12', 1, 1, '2015-12-28 11:57:27', '2015-12-28 11:57:27', 1),
(24, 47, 8, 1, 'TRY24-W37', 12, '12', 1, 1, '2015-12-28 11:57:35', '2015-12-28 11:57:35', 1),
(25, 48, 6, 1, 'try31-w35', 5, '5', 1, 1, '2015-12-28 11:59:15', '2015-12-28 11:59:15', 1),
(26, 48, 7, 1, 'try31-w36', 5, '5', 1, 1, '2015-12-28 11:59:31', '2015-12-28 11:59:31', 1),
(27, 49, 6, 1, 'TRY33-W35', 1, '12', 1, 1, '2015-12-28 14:31:07', '2015-12-28 14:31:07', 1),
(28, 49, 7, 1, 'TRY33-W36', 1, '12', 1, 1, '2015-12-28 14:31:17', '2015-12-28 14:31:17', 1),
(29, 51, 1, 2, '85-85632-01', 12, '125A', 1, 1, '2016-01-05 15:41:15', '2016-01-05 15:41:15', 1),
(30, 31, 6, 1, '001-001-1', 12, '125A', 1, 1, '2016-01-06 09:55:52', '2016-01-06 09:55:52', 1),
(31, 31, 7, 1, '001-001-2', 12, '125A', 1, 1, '2016-01-06 09:56:01', '2016-01-06 09:56:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` int(30) NOT NULL,
  `id_order` int(20) NOT NULL,
  `id_item` int(20) NOT NULL,
  `qty` double NOT NULL,
  `price` double NOT NULL,
  `discount` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id_page` int(5) NOT NULL,
  `page_type` int(2) NOT NULL,
  `page_name` varchar(256) NOT NULL,
  `page_title` varchar(256) NOT NULL,
  `page_url` varchar(256) NOT NULL,
  `page_content` text NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id_page`, `page_type`, `page_name`, `page_title`, `page_url`, `page_content`, `user_create`, `user_edit`, `date_created`, `date_edited`, `active`) VALUES
(1, 1, 'about', 'About Us', 'page.php?page=about', '&lt;p&gt;About us&lt;/p&gt;\r\n', 1, 1, '2016-01-04 16:29:50', '2016-01-04 16:49:07', 1),
(2, 1, 'contact', 'Contact Us', 'page.php?page="contact"', '&lt;p&gt;Contact Us here 123456789&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;source/content/contact-1.jpg&quot; style=&quot;height:150px; width:150px&quot; /&gt;&lt;/p&gt;\r\n', 1, 1, '2016-01-04 16:45:35', '2016-01-04 16:48:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_type`
--

CREATE TABLE `page_type` (
  `id_page_type` int(5) NOT NULL,
  `page_type_name` varchar(256) NOT NULL,
  `page_type_desc` text NOT NULL,
  `page_type_content` text NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_update` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(20) NOT NULL,
  `id_category` int(5) NOT NULL,
  `id_subcategory` int(5) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_description` text NOT NULL,
  `product_dimension` varchar(50) NOT NULL,
  `product_price` double NOT NULL,
  `product_discount` int(11) NOT NULL,
  `product_discount_active` int(1) NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_category`, `id_subcategory`, `product_name`, `product_description`, `product_dimension`, `product_price`, `product_discount`, `product_discount_active`, `user_create`, `user_edit`, `date_created`, `date_edited`, `active`) VALUES
(1, 0, 0, '', '', '', 0, 0, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 1, 1, 'Sinful shoes 123', '', '1234', 124500, 0, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 1, 1, 'Sinful 123', '', '', 12500, 1, 0, 1, 1, '2015-12-14 10:25:14', '2015-12-14 10:25:14', 1),
(4, 1, 1, 'Sinful 1234', '', '', 50000, 0, 0, 1, 1, '2015-12-14 10:26:30', '2015-12-14 10:26:30', 1),
(5, 1, 1, 'Sinful 12345', '', '', 50000, 0, 0, 1, 1, '2015-12-14 10:26:54', '2015-12-14 10:26:54', 1),
(6, 1, 1, 'sinful', '', '', 30000, 0, 0, 1, 1, '2015-12-14 10:31:28', '2015-12-14 10:31:28', 1),
(7, 1, 1, 'Sinful 4322', '', '', 25000, 31, 1, 1, 1, '2015-12-14 10:56:45', '2015-12-14 10:56:45', 1),
(8, 1, 1, 'Sinful 123456789', '', '', 45000, 6, 1, 1, 1, '2015-12-14 10:59:36', '2015-12-14 10:59:36', 1),
(9, 1, 1, 'Sinful 5522', '', '', 500, 10, 0, 1, 1, '2015-12-14 11:56:21', '2015-12-14 11:56:21', 1),
(10, 1, 1, '124124125', '', '', 124124, 0, 0, 1, 1, '2015-12-14 11:57:55', '2015-12-14 11:57:55', 1),
(11, 1, 1, 'Sinful 123456', '&lt;p&gt;yahoo yahoo&lt;/p&gt;\r\n', '', 20000, 12, 0, 1, 1, '2015-12-14 12:59:36', '2015-12-14 12:59:36', 1),
(12, 1, 1, 'Februari', '', '8 x 5 x54', 2500000, 9, 1, 1, 1, '2015-12-14 13:26:24', '2015-12-14 13:26:24', 1),
(13, 1, 1, 'Maret', '', '1 x 1x 1', 250000, 25, 0, 1, 1, '2015-12-14 13:28:52', '2015-12-14 13:28:52', 1),
(14, 1, 1, 'Maret 1', '&lt;p&gt;yahooo yahooo&lt;/p&gt;\r\n', '1 x 1x 1', 250000, 25, 0, 1, 1, '2015-12-14 13:29:03', '2015-12-14 13:29:03', 1),
(15, 1, 1, 'april', '', '1 x 12 x 20', 520000, 12, 0, 1, 1, '2015-12-14 13:31:04', '2015-12-14 13:31:04', 1),
(16, 1, 1, 'september', '&lt;p&gt;adududuuu napa ga masuk ya&lt;/p&gt;\r\n', '', 1, 1, 0, 1, 1, '2015-12-14 13:33:49', '2015-12-14 13:33:49', 1),
(17, 1, 1, 'desember', '&lt;p&gt;&lt;strong&gt;&lt;em&gt;desember &lt;/em&gt;&lt;/strong&gt;ya desember yaa&lt;/p&gt;\r\n', '12x12x12', 120000, 12, 1, 1, 1, '2015-12-14 13:35:39', '2015-12-14 13:35:39', 1),
(18, 1, 1, 'Viore', '&lt;p&gt;auuooo&lt;/p&gt;\r\n', '', 5000, 0, 0, 1, 1, '2015-12-14 16:21:04', '2015-12-14 16:21:04', 1),
(19, 1, 1, 'Sinful 96544', '&lt;p&gt;this is the best shoes you have ever see&lt;/p&gt;\r\n', '12 x 5 x48 ', 258000, 10, 1, 1, 1, '2015-12-15 09:31:28', '2015-12-15 09:31:28', 1),
(20, 1, 1, 'Sinful Shoes 252525', '&lt;p&gt;bun bum bum bul bul lalala&lt;/p&gt;\r\n', '10 x 20 x 30', 1500000, 20, 1, 1, 1, '2015-12-22 13:47:41', '2015-12-22 13:47:41', 1),
(21, 1, 1, 'Sinful 2255', '&lt;p&gt;asf sf sdf sdf sdf sfd sdf sdf sdf sd&lt;/p&gt;\r\n', '10 x 20 x 30', 150000, 20, 1, 1, 1, '2015-12-22 13:48:33', '2015-12-22 13:48:33', 1),
(22, 1, 1, 'Sinful Woman Shoes 125-45', '&lt;p&gt;Sinful with luxury design.&lt;/p&gt;\r\n', '10 x 20 x 30', 450000, 10, 1, 1, 1, '2015-12-22 13:53:14', '2015-12-22 13:53:14', 1),
(23, 1, 1, 'Sinful Shoes Wedge 123', '&lt;p&gt;sinful shoes wedges super kw1&lt;/p&gt;\r\n', '10 x 20 x 30', 450000, 20, 1, 0, 0, '2015-12-22 14:09:19', '2015-12-22 14:09:19', 1),
(24, 1, 1, 'Sinful TRy01', '&lt;p&gt;asasfasf asf afsaf afsa&amp;nbsp;&lt;/p&gt;\r\n', '10 x 20 x 30', 450000, 20, 1, 0, 0, '2015-12-22 14:10:47', '2015-12-22 14:10:47', 1),
(25, 1, 1, 'Sinful TRy02', '&lt;p&gt;asasfasf asf afsaf afsa&amp;nbsp;&lt;/p&gt;\r\n', '10 x 20 x 30', 450000, 20, 1, 0, 0, '2015-12-22 14:11:35', '2015-12-22 14:11:35', 1),
(26, 1, 1, 'Sinful try03', '', '10 x 20 x 30', 50000, 0, 0, 0, 0, '2015-12-22 14:16:20', '2015-12-22 14:16:20', 1),
(27, 1, 2, 'Sinful TRY04', '&lt;p&gt;trying 4x&lt;/p&gt;\r\n', '10 x 20 x 30', 225000, 15, 0, 1, 1, '2015-12-22 14:21:47', '2015-12-22 14:21:47', 1),
(28, 1, 2, 'Sinful TRY05', '&lt;p&gt;trying 4x&lt;/p&gt;\r\n', '10 x 20 x 30', 225000, 15, 0, 1, 1, '2015-12-22 14:23:03', '2015-12-22 14:23:03', 1),
(29, 1, 2, 'Sinful Try06', '&lt;p&gt;trial 06&lt;/p&gt;\r\n', '10 x 20 x 30', 450000, 10, 1, 1, 1, '2015-12-22 14:29:54', '2015-12-22 14:29:54', 1),
(30, 1, 2, 'Sinful Shoes A001', '&lt;p&gt;Sinful shoes Abcsd&lt;/p&gt;\r\n', '12 x 20 x 25', 580000, 10, 1, 1, 1, '2015-12-28 10:30:27', '2015-12-28 10:30:27', 1),
(31, 1, 1, 'Sinful Try 001', '&lt;p&gt;auiiiii ohoy ohoy&lt;/p&gt;\r\n', '12 x 12 x 12 cm', 450000, 10, 1, 1, 1, '2015-12-28 10:35:34', '2016-01-06 09:55:14', 1),
(32, 1, 1, 'Sinful Try 11', '&lt;p&gt;Sin fu l aw aw&lt;/p&gt;\r\n', '12 x 12', 120000, 10, 1, 1, 1, '2015-12-28 11:08:36', '2015-12-28 11:08:36', 1),
(33, 1, 1, 'Sinful Try11', '&lt;p&gt;asfasf asf asf asf as&lt;/p&gt;\r\n', '10 x 10', 150000, 15, 0, 1, 1, '2015-12-28 11:12:39', '2015-12-28 11:12:39', 1),
(34, 1, 1, 'Sinful Try12', '&lt;p&gt;asfasf asf asf asf as&lt;/p&gt;\r\n', '10 x 10', 150000, 15, 0, 1, 1, '2015-12-28 11:13:21', '2015-12-28 11:13:21', 1),
(35, 1, 1, 'Sinful Try13', '&lt;p&gt;afasf as&lt;/p&gt;\r\n', '', 650000, 0, 0, 1, 1, '2015-12-28 11:13:44', '2015-12-28 11:13:44', 1),
(36, 1, 1, 'Sinful Try14', '&lt;p&gt;456465464&lt;/p&gt;\r\n', '12 x 25', 450000, 0, 0, 1, 1, '2015-12-28 11:26:08', '2015-12-28 11:26:08', 1),
(37, 1, 1, 'Sinful Try15', '', '', 565, 1, 0, 1, 1, '2015-12-28 11:26:49', '2015-12-28 11:26:49', 1),
(38, 1, 1, 'Sinful Try16', '', '', 4500000, 0, 0, 1, 1, '2015-12-28 11:27:36', '2015-12-28 11:27:36', 1),
(39, 1, 1, 'Sinful TRy17', '&lt;p&gt;Trying and trying&lt;/p&gt;\r\n', '', 790000, 0, 0, 1, 1, '2015-12-28 11:29:11', '2015-12-28 11:29:11', 1),
(40, 1, 1, 'Sinful Try18', '', '', 450000, 0, 0, 1, 1, '2015-12-28 11:29:59', '2015-12-28 11:29:59', 1),
(41, 1, 1, 'Sinful Try19', '&lt;p&gt;a&lt;/p&gt;\r\n', '', 1223000, 0, 0, 1, 1, '2015-12-28 11:31:47', '2015-12-28 11:31:47', 1),
(42, 1, 1, 'Sinful 19', '', '', 500000, 0, 0, 1, 1, '2015-12-28 11:32:36', '2015-12-28 11:32:36', 1),
(43, 1, 1, 'sinful Try21', '', '', 5400000, 0, 0, 1, 1, '2015-12-28 11:33:29', '2015-12-28 11:33:29', 1),
(44, 1, 1, 'Sinful Try22', '', '', 450000, 0, 0, 1, 1, '2015-12-28 11:34:26', '2015-12-28 11:34:26', 1),
(45, 1, 1, 'Sinful Try25', '', '25 x 25', 4500000, 0, 0, 1, 1, '2015-12-28 11:39:29', '2015-12-28 11:39:29', 1),
(46, 1, 1, 'Sinful Try23', '', '25 x 25', 650000, 0, 0, 1, 1, '2015-12-28 11:46:02', '2015-12-28 11:46:02', 1),
(47, 1, 1, 'Sinful Try24', '', '', 650000, 0, 0, 1, 1, '2015-12-28 11:55:51', '2015-12-28 11:55:51', 1),
(48, 1, 1, 'sinful try31', '', '', 450000, 0, 0, 1, 1, '2015-12-28 11:59:00', '2015-12-28 11:59:00', 1),
(49, 1, 1, 'Sinful Try33', '&lt;p&gt;asfasfasfasf&lt;/p&gt;\r\n', '12 x 25 x 10', 560000, 0, 0, 1, 1, '2015-12-28 14:30:35', '2015-12-28 14:30:35', 1),
(50, 2, 2, 'Jersey', '&lt;p&gt;gyahahahaha&lt;/p&gt;\r\n', '12 x 25 x 20', 1500000, 10, 0, 1, 1, '2016-01-05 10:17:25', '2016-01-05 10:17:25', 1),
(51, 2, 2, 'Apple Ceri', '&lt;p&gt;apel ceriton&lt;/p&gt;\r\n', '50 x 50 x 12', 210000, 10, 1, 1, 1, '2016-01-05 15:38:16', '2016-01-05 15:38:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id_order` int(20) NOT NULL,
  `id_customer` int(5) NOT NULL,
  `order_date` datetime NOT NULL,
  `total_item` int(7) NOT NULL,
  `subtotal` double NOT NULL,
  `discount` double NOT NULL,
  `grandtotal` double NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id_shop` int(5) NOT NULL,
  `shop_tagline` varchar(256) NOT NULL,
  `shop_description` text NOT NULL,
  `shop_history` text NOT NULL,
  `shop_address` text NOT NULL,
  `gmap_link` text NOT NULL,
  `shop_phone1` varchar(30) NOT NULL,
  `shop_phone2` varchar(30) NOT NULL,
  `shop_email` varchar(100) NOT NULL,
  `bbm` varchar(8) NOT NULL,
  `facebook` varchar(256) NOT NULL,
  `pinterest` varchar(256) NOT NULL,
  `instagram` varchar(256) NOT NULL,
  `twitter` varchar(256) NOT NULL,
  `gplus` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shop_setting`
--

CREATE TABLE `shop_setting` (
  `product_code_prefix` varchar(50) NOT NULL,
  `show_discontinue_product` int(1) NOT NULL,
  `show_soldout_product` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id_size` int(5) NOT NULL,
  `id_category` int(5) NOT NULL,
  `size_name` varchar(100) NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id_size`, `id_category`, `size_name`, `user_create`, `user_edit`, `date_created`, `date_edited`, `active`) VALUES
(1, 2, 'S', 1, 1, '2015-11-26 13:07:46', '2015-11-26 13:07:46', 1),
(2, 2, 'M', 1, 1, '2015-11-26 14:10:38', '2015-11-26 14:10:38', 1),
(3, 2, 'XL', 1, 1, '2015-11-26 14:11:04', '2015-11-26 14:11:04', 1),
(4, 2, 'L', 1, 1, '2015-11-26 14:13:03', '2015-11-26 14:13:03', 1),
(5, 1, '38', 1, 1, '2015-11-26 14:13:11', '2015-11-26 14:13:11', 1),
(6, 1, '35', 1, 1, '2015-12-21 10:59:19', '2015-12-21 10:59:19', 1),
(7, 1, '36', 1, 1, '2015-12-21 10:59:24', '2015-12-21 10:59:24', 1),
(8, 1, '34', 1, 1, '2015-12-21 10:59:32', '2015-12-21 10:59:32', 1),
(9, 1, '43', 1, 1, '2015-12-21 10:59:49', '2015-12-31 09:36:15', 1),
(11, 1, '37', 1, 1, '2015-12-21 11:13:44', '2015-12-21 11:13:44', 1),
(12, 1, '39', 1, 1, '2015-12-21 11:14:52', '2015-12-21 11:14:52', 1),
(13, 1, '40', 1, 1, '2015-12-21 11:14:57', '2015-12-21 11:14:57', 1),
(14, 1, '41', 1, 1, '2015-12-21 11:14:59', '2015-12-21 11:14:59', 1),
(15, 1, '42', 1, 1, '2015-12-31 08:57:23', '2015-12-31 08:57:23', 1),
(16, 2, 'XXL', 1, 1, '2016-01-04 17:02:43', '2016-01-04 17:02:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id_subcategory` int(5) NOT NULL,
  `id_category` int(5) NOT NULL,
  `subcategory_name` varchar(256) NOT NULL,
  `subcategory_desc` text NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id_subcategory`, `id_category`, `subcategory_name`, `subcategory_desc`, `user_create`, `user_edit`, `date_created`, `date_edited`, `active`) VALUES
(1, 1, 'Wedges', 'Shoes with flat high heels.', 1, 1, '2015-12-03 13:19:24', '2015-12-03 13:19:24', 1),
(2, 1, 'Flat Shoes', 'Flat Shoes', 2147483647, 2147483647, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 2, 'V-neck T-Shirt', 'just v neck', 2147483647, 1, '0000-00-00 00:00:00', '2015-12-31 12:42:51', 1),
(4, 2, 'Round neck', 'round and round and round', 2147483647, 1, '0000-00-00 00:00:00', '2015-12-31 11:56:28', 1),
(5, 2, 'Multi Fabric', 'multi fabric', 2147483647, 2147483647, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 2, 'Crew Neck', 'What is exactly a crew neck?', 2147483647, 1, '0000-00-00 00:00:00', '2015-12-31 12:13:48', 1),
(7, 2, 'Turtle Neck', 'Turtle Neck', 2147483647, 2147483647, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, 1, 'Heels', 'Any kind of heels.', 2147483647, 1, '0000-00-00 00:00:00', '2015-12-31 12:44:30', 1),
(9, 3, 'Bracelet', 'Gelang', 2147483647, 2147483647, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testi` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `testimoni` text NOT NULL,
  `date_created` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` int(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `user_type`, `date_created`, `date_edited`, `last_login`, `user_create`, `user_edit`, `active`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2015-11-28 09:29:55', '2015-11-28 09:29:55', '2016-01-06 08:46:43', 1, 1, 1),
(2, 'archelia', '9289f7eaaf869e4a025f408993566b4f', 2, '2015-11-28 09:30:49', '2016-01-04 09:31:47', '2016-01-04 09:32:02', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id_ads`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `discount_coupon`
--
ALTER TABLE `discount_coupon`
  ADD PRIMARY KEY (`id_coupon`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `page_type`
--
ALTER TABLE `page_type`
  ADD PRIMARY KEY (`id_page_type`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id_shop`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id_subcategory`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id_ads` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `page_type`
--
ALTER TABLE `page_type`
  MODIFY `id_page_type` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id_shop` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id_subcategory` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testi` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
