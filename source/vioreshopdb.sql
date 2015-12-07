-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2015 at 11:26 AM
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
(1, 'Sinful', 'Sinful is an edqy brand for our high quality shoes.', 1, 1, '2015-11-26 10:36:54', '2015-11-26 10:36:54', 1),
(2, 'Sinful', 'Sinful is an edqy brand for our high quality shoes.', 1, 1, '2015-11-26 10:38:11', '2015-11-26 10:38:11', 1),
(3, 'Sinful', 'Sinful is an edqy brand for our high quality shoes.', 1, 1, '2015-11-26 11:11:54', '2015-11-26 11:11:54', 1),
(4, 'Excited', '', 1, 1, '2015-11-26 14:05:52', '2015-11-26 14:05:52', 1);

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
(1, 'Shoes', 'Shoes', 1, 1, '2015-11-26 15:19:52', '2015-11-26 15:19:52', 1),
(2, 'T-Shirt', 'T-shirt', 1, 1, '2015-11-26 15:20:07', '2015-11-26 15:20:07', 1);

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
(1, 'White', '', 1, 1, '2015-11-26 14:22:37', '2015-11-26 14:22:37', 1),
(2, 'Pink', '', 1, 1, '2015-11-26 14:22:49', '2015-11-26 14:22:49', 1),
(3, 'Black', '000000', 1, 1, '2015-12-03 14:30:33', '2015-12-03 14:30:33', 1);

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
  `product_type` int(1) NOT NULL,
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
  `date_created` int(11) NOT NULL,
  `date_edited` int(11) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 2, 'XL', 1, 1, '2015-11-26 13:07:46', '2015-11-26 13:07:46', 1),
(2, 2, 'XL', 1, 1, '2015-11-26 14:10:38', '2015-11-26 14:10:38', 1),
(3, 2, 'XL', 1, 1, '2015-11-26 14:11:04', '2015-11-26 14:11:04', 1),
(4, 2, 'L', 1, 1, '2015-11-26 14:13:03', '2015-11-26 14:13:03', 1),
(5, 1, '38', 1, 1, '2015-11-26 14:13:11', '2015-11-26 14:13:11', 1);

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
(1, 1, 'Wedges', 'Shoes with flat high heels.', 1, 1, '2015-12-03 13:19:24', '2015-12-03 13:19:24', 1);

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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2015-11-28 09:29:55', '2015-11-28 09:29:55', '2015-12-07 13:22:48', 1, 1, 1),
(2, 'archelia', '9289f7eaaf869e4a025f408993566b4f', 2, '2015-11-28 09:30:49', '2015-11-28 09:30:49', '2015-11-28 09:30:49', 1, 1, 1);

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
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

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
  MODIFY `id_brand` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page_type`
--
ALTER TABLE `page_type`
  MODIFY `id_page_type` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id_shop` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id_subcategory` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
