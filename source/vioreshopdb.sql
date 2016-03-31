-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2016 at 05:27 AM
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
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id_announcement` int(6) NOT NULL,
  `announcement_title` varchar(256) NOT NULL,
  `announcement_description` text NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id_announcement`, `announcement_title`, `announcement_description`, `user_create`, `user_edit`, `date_created`, `date_edited`, `active`) VALUES
(1, 'Percobaan 12', 'Percobaan 1 tes testing uup', 1, 1, '2016-02-18 09:15:03', '2016-02-18 09:32:13', 1),
(2, 'Bum bum', 'Cha cha cha chaa', 1, 1, '2016-02-18 09:33:09', '2016-02-18 09:33:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(5) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_description` text NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `bank_name`, `bank_description`, `user_create`, `user_edit`, `date_created`, `date_edited`, `active`) VALUES
(1, 'BCA', 'Bank Central Asia', 1, 1, '2016-03-21 09:36:41', '2016-03-21 09:36:41', 1),
(2, 'Mandiri', 'Bank Mandiri.', 1, 1, '2016-03-21 09:37:19', '2016-03-21 09:37:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(10) NOT NULL,
  `banner_title` varchar(256) NOT NULL,
  `banner_url` varchar(256) NOT NULL,
  `banner_description` text NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `banner_title`, `banner_url`, `banner_description`, `user_create`, `user_edit`, `date_created`, `date_edited`, `active`) VALUES
(1, 'Sinful Bags', 'pages.php?page=about', '&lt;p&gt;asssaa&lt;/p&gt;\r\n', 1, 1, '2016-02-10 16:11:07', '2016-03-15 13:35:36', 1),
(2, 'Banner 3', 'pages.php?page=about', '&lt;p&gt;banner23&lt;/p&gt;\r\n', 1, 1, '2016-02-25 15:26:10', '2016-03-21 15:25:04', 1);

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
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id_city` int(10) NOT NULL,
  `city_name` varchar(30) DEFAULT NULL,
  `id_province` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id_city`, `city_name`, `id_province`) VALUES
(1, 'Kabupaten Aceh Barat', 1),
(2, 'Kabupaten Aceh Barat Daya', 1),
(3, 'Kabupaten Aceh Besar', 1),
(4, 'Kabupaten Aceh Jaya', 1),
(5, 'Kabupaten Aceh Selatan', 1),
(6, 'Kabupaten Aceh Singkil', 1),
(7, 'Kabupaten Aceh Tamiang', 1),
(8, 'Kabupaten Aceh Tengah', 1),
(9, 'Kabupaten Aceh Tenggara', 1),
(10, 'Kabupaten Aceh Timur', 1),
(11, 'Kabupaten Aceh Utara', 1),
(12, 'Kabupaten Bener Meriah', 1),
(13, 'Kabupaten Bireuen', 1),
(14, 'Kabupaten Gayo Luwes', 1),
(15, 'Kabupaten Nagan Raya', 1),
(16, 'Kabupaten Pidie', 1),
(17, 'Kabupaten Pidie Jaya', 1),
(18, 'Kabupaten Simeulue', 1),
(19, 'Kota Banda Aceh', 1),
(20, 'Kota Langsa', 1),
(21, 'Kota Lhokseumawe', 1),
(22, 'Kota Sabang', 1),
(23, 'Kota Subulussalam', 1),
(24, 'Kabupaten Asahan', 2),
(25, 'Kabupaten Batubara', 2),
(26, 'Kabupaten Dairi', 2),
(27, 'Kabupaten Deli Serdang', 2),
(28, 'Kabupaten Humbang Hasundutan', 2),
(29, 'Kabupaten Karo', 2),
(30, 'Kabupaten Labuhan Batu', 2),
(31, 'Kabupaten Labuhanbatu Selatan', 2),
(32, 'Kabupaten Labuhanbatu Utara', 2),
(33, 'Kabupaten Langkat', 2),
(34, 'Kabupaten Mandailing Natal', 2),
(35, 'Kabupaten Nias', 2),
(36, 'Kabupaten Nias Barat', 2),
(37, 'Kabupaten Nias Selatan', 2),
(38, 'Kabupaten Nias Utara', 2),
(39, 'Kabupaten Padang Lawas', 2),
(40, 'Kabupaten Padang Lawas Utara', 2),
(41, 'Kabupaten Pakpak Barat', 2),
(42, 'Kabupaten Samosir', 2),
(43, 'Kabupaten Serdang Bedagai', 2),
(44, 'Kabupaten Simalungun', 2),
(45, 'Kabupaten Tapanuli Selatan', 2),
(46, 'Kabupaten Tapanuli Tengah', 2),
(47, 'Kabupaten Tapanuli Utara', 2),
(48, 'Kabupaten Toba Samosir', 2),
(49, 'Kota Binjai', 2),
(50, 'Kota Gunung Sitoli', 2),
(51, 'Kota Medan', 2),
(52, 'Kota Padangsidempuan', 2),
(53, 'Kota Pematang Siantar', 2),
(54, 'Kota Sibolga', 2),
(55, 'Kota Tanjung Balai', 2),
(56, 'Kota Tebing Tinggi', 2),
(57, 'Kabupaten Agam', 3),
(58, 'Kabupaten Dharmas Raya', 3),
(59, 'Kabupaten Kepulauan Mentawai', 3),
(60, 'Kabupaten Lima Puluh Kota', 3),
(61, 'Kabupaten Padang Pariaman', 3),
(62, 'Kabupaten Pasaman', 3),
(63, 'Kabupaten Pasaman Barat', 3),
(64, 'Kabupaten Pesisir Selatan', 3),
(65, 'Kabupaten Sijunjung', 3),
(66, 'Kabupaten Solok', 3),
(67, 'Kabupaten Solok Selatan', 3),
(68, 'Kabupaten Tanah Datar', 3),
(69, 'Kota Bukittinggi', 3),
(70, 'Kota Padang', 3),
(71, 'Kota Padang Panjang', 3),
(72, 'Kota Pariaman', 3),
(73, 'Kota Payakumbuh', 3),
(74, 'Kota Sawah Lunto', 3),
(75, 'Kota Solok', 3),
(76, 'Kabupaten Bengkalis', 4),
(77, 'Kabupaten Indragiri Hilir', 4),
(78, 'Kabupaten Indragiri Hulu', 4),
(79, 'Kabupaten Kampar', 4),
(80, 'Kabupaten Kuantan Singingi', 4),
(81, 'Kabupaten Meranti', 4),
(82, 'Kabupaten Pelalawan', 4),
(83, 'Kabupaten Rokan Hilir', 4),
(84, 'Kabupaten Rokan Hulu', 4),
(85, 'Kabupaten Siak', 4),
(86, 'Kota Dumai', 4),
(87, 'Kota Pekanbaru', 4),
(88, 'Kabupaten Bintan', 5),
(89, 'Kabupaten Karimun', 5),
(90, 'Kabupaten Kepulauan Anambas', 5),
(91, 'Kabupaten Lingga', 5),
(92, 'Kabupaten Natuna', 5),
(93, 'Kota Batam', 5),
(94, 'Kota Tanjung Pinang', 5),
(95, 'Kabupaten Bangka', 6),
(96, 'Kabupaten Bangka Barat', 6),
(97, 'Kabupaten Bangka Selatan', 6),
(98, 'Kabupaten Bangka Tengah', 6),
(99, 'Kabupaten Belitung', 6),
(100, 'Kabupaten Belitung Timur', 6),
(101, 'Kota Pangkal Pinang', 6),
(102, 'Kabupaten Kerinci', 7),
(103, 'Kabupaten Merangin', 7),
(104, 'Kabupaten Sarolangun', 7),
(105, 'Kabupaten Batang Hari', 7),
(106, 'Kabupaten Muaro Jambi', 7),
(107, 'Kabupaten Tanjung Jabung Timur', 7),
(108, 'Kabupaten Tanjung Jabung Barat', 7),
(109, 'Kabupaten Tebo', 7),
(110, 'Kabupaten Bungo', 7),
(111, 'Kota Jambi', 7),
(112, 'Kota Sungai Penuh', 7),
(113, 'Kabupaten Bengkulu Selatan', 8),
(114, 'Kabupaten Bengkulu Tengah', 8),
(115, 'Kabupaten Bengkulu Utara', 8),
(116, 'Kabupaten Kaur', 8),
(117, 'Kabupaten Kepahiang', 8),
(118, 'Kabupaten Lebong', 8),
(119, 'Kabupaten Mukomuko', 8),
(120, 'Kabupaten Rejang Lebong', 8),
(121, 'Kabupaten Seluma', 8),
(122, 'Kota Bengkulu', 8),
(123, 'Kabupaten Banyuasin', 9),
(124, 'Kabupaten Empat Lawang', 9),
(125, 'Kabupaten Lahat', 9),
(126, 'Kabupaten Muara Enim', 9),
(127, 'Kabupaten Musi Banyu Asin', 9),
(128, 'Kabupaten Musi Rawas', 9),
(129, 'Kabupaten Ogan Ilir', 9),
(130, 'Kabupaten Ogan Komering Ilir', 9),
(131, 'Kabupaten Ogan Komering Ulu', 9),
(132, 'Kabupaten Ogan Komering Ulu Se', 9),
(133, 'Kabupaten Ogan Komering Ulu Ti', 9),
(134, 'Kota Lubuklinggau', 9),
(135, 'Kota Pagar Alam', 9),
(136, 'Kota Palembang', 9),
(137, 'Kota Prabumulih', 9),
(138, 'Kabupaten Lampung Barat', 10),
(139, 'Kabupaten Lampung Selatan', 10),
(140, 'Kabupaten Lampung Tengah', 10),
(141, 'Kabupaten Lampung Timur', 10),
(142, 'Kabupaten Lampung Utara', 10),
(143, 'Kabupaten Mesuji', 10),
(144, 'Kabupaten Pesawaran', 10),
(145, 'Kabupaten Pringsewu', 10),
(146, 'Kabupaten Tanggamus', 10),
(147, 'Kabupaten Tulang Bawang', 10),
(148, 'Kabupaten Tulang Bawang Barat', 10),
(149, 'Kabupaten Way Kanan', 10),
(150, 'Kota Bandar Lampung', 10),
(151, 'Kota Metro', 10),
(152, 'Kabupaten Lebak', 11),
(153, 'Kabupaten Pandeglang', 11),
(154, 'Kabupaten Serang', 11),
(155, 'Kabupaten Tangerang', 11),
(156, 'Kota Cilegon', 11),
(157, 'Kota Serang', 11),
(158, 'Kota Tangerang', 11),
(159, 'Kota Tangerang Selatan', 11),
(160, 'Kabupaten Adm. Kepulauan Serib', 12),
(161, 'Kota Jakarta Barat', 12),
(162, 'Kota Jakarta Pusat', 12),
(163, 'Kota Jakarta Selatan', 12),
(164, 'Kota Jakarta Timur', 12),
(165, 'Kota Jakarta Utara', 12),
(166, 'Kabupaten Bandung', 13),
(167, 'Kabupaten Bandung Barat', 13),
(168, 'Kabupaten Bekasi', 13),
(169, 'Kabupaten Bogor', 13),
(170, 'Kabupaten Ciamis', 13),
(171, 'Kabupaten Cianjur', 13),
(172, 'Kabupaten Cirebon', 13),
(173, 'Kabupaten Garut', 13),
(174, 'Kabupaten Indramayu', 13),
(175, 'Kabupaten Karawang', 13),
(176, 'Kabupaten Kuningan', 13),
(177, 'Kabupaten Majalengka', 13),
(178, 'Kabupaten Purwakarta', 13),
(179, 'Kabupaten Subang', 13),
(180, 'Kabupaten Sukabumi', 13),
(181, 'Kabupaten Sumedang', 13),
(182, 'Kabupaten Tasikmalaya', 13),
(183, 'Kota Bandung', 13),
(184, 'Kota Banjar', 13),
(185, 'Kota Bekasi', 13),
(186, 'Kota Bogor', 13),
(187, 'Kota Cimahi', 13),
(188, 'Kota Cirebon', 13),
(189, 'Kota Depok', 13),
(190, 'Kota Sukabumi', 13),
(191, 'Kota Tasikmalaya', 13),
(192, 'Kabupaten Banjarnegara', 14),
(193, 'Kabupaten Banyumas', 14),
(194, 'Kabupaten Batang', 14),
(195, 'Kabupaten Blora', 14),
(196, 'Kabupaten Boyolali', 14),
(197, 'Kabupaten Brebes', 14),
(198, 'Kabupaten Cilacap', 14),
(199, 'Kabupaten Demak', 14),
(200, 'Kabupaten Grobogan', 14),
(201, 'Kabupaten Jepara', 14),
(202, 'Kabupaten Karanganyar', 14),
(203, 'Kabupaten Kebumen', 14),
(204, 'Kabupaten Kendal', 14),
(205, 'Kabupaten Klaten', 14),
(206, 'Kabupaten Kota Tegal', 14),
(207, 'Kabupaten Kudus', 14),
(208, 'Kabupaten Magelang', 14),
(209, 'Kabupaten Pati', 14),
(210, 'Kabupaten Pekalongan', 14),
(211, 'Kabupaten Pemalang', 14),
(212, 'Kabupaten Purbalingga', 14),
(213, 'Kabupaten Purworejo', 14),
(214, 'Kabupaten Rembang', 14),
(215, 'Kabupaten Semarang', 14),
(216, 'Kabupaten Sragen', 14),
(217, 'Kabupaten Sukoharjo', 14),
(218, 'Kabupaten Temanggung', 14),
(219, 'Kabupaten Wonogiri', 14),
(220, 'Kabupaten Wonosobo', 14),
(221, 'Kota Magelang', 14),
(222, 'Kota Pekalongan', 14),
(223, 'Kota Salatiga', 14),
(224, 'Kota Semarang', 14),
(225, 'Kota Surakarta', 14),
(226, 'Kota Tegal', 14),
(227, 'Kabupaten Bantul', 15),
(228, 'Kabupaten Gunung Kidul', 15),
(229, 'Kabupaten Kulon Progo', 15),
(230, 'Kabupaten Sleman', 15),
(231, 'Kota Yogyakarta', 15),
(232, 'Kabupaten Bangkalan', 16),
(233, 'Kabupaten Banyuwangi', 16),
(234, 'Kabupaten Blitar', 16),
(235, 'Kabupaten Bojonegoro', 16),
(236, 'Kabupaten Bondowoso', 16),
(237, 'Kabupaten Gresik', 16),
(238, 'Kabupaten Jember', 16),
(239, 'Kabupaten Jombang', 16),
(240, 'Kabupaten Kediri', 16),
(241, 'Kabupaten Lamongan', 16),
(242, 'Kabupaten Lumajang', 16),
(243, 'Kabupaten Madiun', 16),
(244, 'Kabupaten Magetan', 16),
(245, 'Kabupaten Malang', 16),
(246, 'Kabupaten Mojokerto', 16),
(247, 'Kabupaten Nganjuk', 16),
(248, 'Kabupaten Ngawi', 16),
(249, 'Kabupaten Pacitan', 16),
(250, 'Kabupaten Pamekasan', 16),
(251, 'Kabupaten Pasuruan', 16),
(252, 'Kabupaten Ponorogo', 16),
(253, 'Kabupaten Probolinggo', 16),
(254, 'Kabupaten Sampang', 16),
(255, 'Kabupaten Sidoarjo', 16),
(256, 'Kabupaten Situbondo', 16),
(257, 'Kabupaten Sumenep', 16),
(258, 'Kabupaten Trenggalek', 16),
(259, 'Kabupaten Tuban', 16),
(260, 'Kabupaten Tulungagung', 16),
(261, 'Kota Batu', 16),
(262, 'Kota Blitar', 16),
(263, 'Kota Kediri', 16),
(264, 'Kota Madiun', 16),
(265, 'Kota Malang', 16),
(266, 'Kota Mojokerto', 16),
(267, 'Kota Pasuruan', 16),
(268, 'Kota Probolinggo', 16),
(269, 'Kota Surabaya', 16),
(270, 'Kabupaten Badung', 17),
(271, 'Kabupaten Bangli', 17),
(272, 'Kabupaten Buleleng', 17),
(273, 'Kabupaten Gianyar', 17),
(274, 'Kabupaten Jembrana', 17),
(275, 'Kabupaten Karang Asem', 17),
(276, 'Kabupaten Klungkung', 17),
(277, 'Kabupaten Tabanan', 17),
(278, 'Kota Denpasar', 17),
(279, 'Kabupaten Bima', 18),
(280, 'Kabupaten Dompu', 18),
(281, 'Kabupaten Lombok Barat', 18),
(282, 'Kabupaten Lombok Tengah', 18),
(283, 'Kabupaten Lombok Timur', 18),
(284, 'Kabupaten Lombok Utara', 18),
(285, 'Kabupaten Sumbawa', 18),
(286, 'Kabupaten Sumbawa Barat', 18),
(287, 'Kota Bima', 18),
(288, 'Kota Mataram', 18),
(289, 'Kabupaten Alor', 19),
(290, 'Kabupaten Belu', 19),
(291, 'Kabupaten Ende', 19),
(292, 'Kabupaten Flores Timur', 19),
(293, 'Kabupaten Kupang', 19),
(294, 'Kabupaten Lembata', 19),
(295, 'Kabupaten Manggarai', 19),
(296, 'Kabupaten Manggarai Barat', 19),
(297, 'Kabupaten Manggarai Timur', 19),
(298, 'Kabupaten Nagekeo', 19),
(299, 'Kabupaten Ngada', 19),
(300, 'Kabupaten Rote Ndao', 19),
(301, 'Kabupaten Sabu Raijua', 19),
(302, 'Kabupaten Sikka', 19),
(303, 'Kabupaten Sumba Barat', 19),
(304, 'Kabupaten Sumba Barat Daya', 19),
(305, 'Kabupaten Sumba Tengah', 19),
(306, 'Kabupaten Sumba Timur', 19),
(307, 'Kabupaten Timor Tengah Selatan', 19),
(308, 'Kabupaten Timor Tengah Utara', 19),
(309, 'Kota Kupang', 19),
(310, 'Kabupaten Bengkayang', 20),
(311, 'Kabupaten Kapuas Hulu', 20),
(312, 'Kabupaten Kayong Utara', 20),
(313, 'Kabupaten Ketapang', 20),
(314, 'Kabupaten Kubu Raya', 20),
(315, 'Kabupaten Landak', 20),
(316, 'Kabupaten Melawi', 20),
(317, 'Kabupaten Pontianak', 20),
(318, 'Kabupaten Sambas', 20),
(319, 'Kabupaten Sanggau', 20),
(320, 'Kabupaten Sekadau', 20),
(321, 'Kabupaten Sintang', 20),
(322, 'Kota Pontianak', 20),
(323, 'Kota Singkawang', 20),
(324, 'Kabupaten Barito Selatan', 21),
(325, 'Kabupaten Barito Timur', 21),
(326, 'Kabupaten Barito Utara', 21),
(327, 'Kabupaten Gunung Mas', 21),
(328, 'Kabupaten Kapuas', 21),
(329, 'Kabupaten Katingan', 21),
(330, 'Kabupaten Kotawaringin Barat', 21),
(331, 'Kabupaten Kotawaringin Timur', 21),
(332, 'Kabupaten Lamandau', 21),
(333, 'Kabupaten Murung Raya', 21),
(334, 'Kabupaten Pulang Pisau', 21),
(335, 'Kabupaten Seruyan', 21),
(336, 'Kabupaten Sukamara', 21),
(337, 'Kota Palangkaraya', 21),
(338, 'Kabupaten Balangan', 22),
(339, 'Kabupaten Banjar', 22),
(340, 'Kabupaten Barito Kuala', 22),
(341, 'Kabupaten Hulu Sungai Selatan', 22),
(342, 'Kabupaten Hulu Sungai Tengah', 22),
(343, 'Kabupaten Hulu Sungai Utara', 22),
(344, 'Kabupaten Kota Baru', 22),
(345, 'Kabupaten Tabalong', 22),
(346, 'Kabupaten Tanah Bumbu', 22),
(347, 'Kabupaten Tanah Laut', 22),
(348, 'Kabupaten Tapin', 22),
(349, 'Kota Banjar Baru', 22),
(350, 'Kota Banjarmasin', 22),
(351, 'Kabupaten Berau', 23),
(352, 'Kabupaten Bulongan', 23),
(353, 'Kabupaten Kutai Barat', 23),
(354, 'Kabupaten Kutai Kartanegara', 23),
(355, 'Kabupaten Kutai Timur', 23),
(356, 'Kabupaten Malinau', 23),
(357, 'Kabupaten Nunukan', 23),
(358, 'Kabupaten Paser', 23),
(359, 'Kabupaten Penajam Paser Utara', 23),
(360, 'Kabupaten Tana Tidung', 23),
(361, 'Kota Balikpapan', 23),
(362, 'Kota Bontang', 23),
(363, 'Kota Samarinda', 23),
(364, 'Kota Tarakan', 23),
(365, 'Kabupaten Boalemo', 24),
(366, 'Kabupaten Bone Bolango', 24),
(367, 'Kabupaten Gorontalo', 24),
(368, 'Kabupaten Gorontalo Utara', 24),
(369, 'Kabupaten Pohuwato', 24),
(370, 'Kota Gorontalo', 24),
(371, 'Kabupaten Bantaeng', 25),
(372, 'Kabupaten Barru', 25),
(373, 'Kabupaten Bone', 25),
(374, 'Kabupaten Bulukumba', 25),
(375, 'Kabupaten Enrekang', 25),
(376, 'Kabupaten Gowa', 25),
(377, 'Kabupaten Jeneponto', 25),
(378, 'Kabupaten Luwu', 25),
(379, 'Kabupaten Luwu Timur', 25),
(380, 'Kabupaten Luwu Utara', 25),
(381, 'Kabupaten Maros', 25),
(382, 'Kabupaten Pangkajene Kepulauan', 25),
(383, 'Kabupaten Pinrang', 25),
(384, 'Kabupaten Selayar', 25),
(385, 'Kabupaten Sidenreng Rappang', 25),
(386, 'Kabupaten Sinjai', 25),
(387, 'Kabupaten Soppeng', 25),
(388, 'Kabupaten Takalar', 25),
(389, 'Kabupaten Tana Toraja', 25),
(390, 'Kabupaten Toraja Utara', 25),
(391, 'Kabupaten Wajo', 25),
(392, 'Kota Makassar', 25),
(393, 'Kota Palopo', 25),
(394, 'Kota Pare-pare', 25),
(395, 'Kabupaten Bombana', 26),
(396, 'Kabupaten Buton', 26),
(397, 'Kabupaten Buton Utara', 26),
(398, 'Kabupaten Kolaka', 26),
(399, 'Kabupaten Kolaka Utara', 26),
(400, 'Kabupaten Konawe', 26),
(401, 'Kabupaten Konawe Selatan', 26),
(402, 'Kabupaten Konawe Utara', 26),
(403, 'Kabupaten Muna', 26),
(404, 'Kabupaten Wakatobi', 26),
(405, 'Kota Bau-bau', 26),
(406, 'Kota Kendari', 26),
(407, 'Kabupaten Banggai', 27),
(408, 'Kabupaten Banggai Kepulauan', 27),
(409, 'Kabupaten Buol', 27),
(410, 'Kabupaten Donggala', 27),
(411, 'Kabupaten Morowali', 27),
(412, 'Kabupaten Parigi Moutong', 27),
(413, 'Kabupaten Poso', 27),
(414, 'Kabupaten Sigi', 27),
(415, 'Kabupaten Tojo Una-Una', 27),
(416, 'Kabupaten Toli Toli', 27),
(417, 'Kota Palu', 27),
(418, 'Kabupaten Bolaang Mangondow', 28),
(419, 'Kabupaten Bolaang Mangondow Se', 28),
(420, 'Kabupaten Bolaang Mangondow Ti', 28),
(421, 'Kabupaten Bolaang Mangondow Ut', 28),
(422, 'Kabupaten Kepulauan Sangihe', 28),
(423, 'Kabupaten Kepulauan Siau Tagul', 28),
(424, 'Kabupaten Kepulauan Talaud', 28),
(425, 'Kabupaten Minahasa', 28),
(426, 'Kabupaten Minahasa Selatan', 28),
(427, 'Kabupaten Minahasa Tenggara', 28),
(428, 'Kabupaten Minahasa Utara', 28),
(429, 'Kota Bitung', 28),
(430, 'Kota Kotamobagu', 28),
(431, 'Kota Manado', 28),
(432, 'Kota Tomohon', 28),
(433, 'Kabupaten Majene', 29),
(434, 'Kabupaten Mamasa', 29),
(435, 'Kabupaten Mamuju', 29),
(436, 'Kabupaten Mamuju Utara', 29),
(437, 'Kabupaten Polewali Mandar', 29),
(438, 'Kabupaten Buru', 30),
(439, 'Kabupaten Buru Selatan', 30),
(440, 'Kabupaten Kepulauan Aru', 30),
(441, 'Kabupaten Maluku Barat Daya', 30),
(442, 'Kabupaten Maluku Tengah', 30),
(443, 'Kabupaten Maluku Tenggara', 30),
(444, 'Kabupaten Maluku Tenggara Bara', 30),
(445, 'Kabupaten Seram Bagian Barat', 30),
(446, 'Kabupaten Seram Bagian Timur', 30),
(447, 'Kota Ambon', 30),
(448, 'Kota Tual', 30),
(449, 'Kabupaten Halmahera Barat', 31),
(450, 'Kabupaten Halmahera Selatan', 31),
(451, 'Kabupaten Halmahera Tengah', 31),
(452, 'Kabupaten Halmahera Timur', 31),
(453, 'Kabupaten Halmahera Utara', 31),
(454, 'Kabupaten Kepulauan Sula', 31),
(455, 'Kabupaten Pulau Morotai', 31),
(456, 'Kota Ternate', 31),
(457, 'Kota Tidore Kepulauan', 31),
(458, 'Kabupaten Fakfak', 32),
(459, 'Kabupaten Kaimana', 32),
(460, 'Kabupaten Manokwari', 32),
(461, 'Kabupaten Maybrat', 32),
(462, 'Kabupaten Raja Ampat', 32),
(463, 'Kabupaten Sorong', 32),
(464, 'Kabupaten Sorong Selatan', 32),
(465, 'Kabupaten Tambrauw', 32),
(466, 'Kabupaten Teluk Bintuni', 32),
(467, 'Kabupaten Teluk Wondama', 32),
(468, 'Kota Sorong', 32),
(469, 'Kabupaten Merauke', 33),
(470, 'Kabupaten Jayawijaya', 33),
(471, 'Kabupaten Nabire', 33),
(472, 'Kabupaten Kepulauan Yapen', 33),
(473, 'Kabupaten Biak Numfor', 33),
(474, 'Kabupaten Paniai', 33),
(475, 'Kabupaten Puncak Jaya', 33),
(476, 'Kabupaten Mimika', 33),
(477, 'Kabupaten Boven Digoel', 33),
(478, 'Kabupaten Mappi', 33),
(479, 'Kabupaten Asmat', 33),
(480, 'Kabupaten Yahukimo', 33),
(481, 'Kabupaten Pegunungan Bintang', 33),
(482, 'Kabupaten Tolikara', 33),
(483, 'Kabupaten Sarmi', 33),
(484, 'Kabupaten Keerom', 33),
(485, 'Kabupaten Waropen', 33),
(486, 'Kabupaten Jayapura', 33),
(487, 'Kabupaten Deiyai', 33),
(488, 'Kabupaten Dogiyai', 33),
(489, 'Kabupaten Intan Jaya', 33),
(490, 'Kabupaten Lanny Jaya', 33),
(491, 'Kabupaten Mamberamo Raya', 33),
(492, 'Kabupaten Mamberamo Tengah', 33),
(493, 'Kabupaten Nduga', 33),
(494, 'Kabupaten Puncak', 33),
(495, 'Kabupaten Supiori', 33),
(496, 'Kabupaten Yalimo', 33),
(497, 'Kota Jayapura', 33),
(498, 'Kabupaten Bulungan', 34),
(499, 'Kabupaten Malinau', 34),
(500, 'Kabupaten Nunukan', 34),
(501, 'Kabupaten Tana Tidung', 34),
(502, 'Kota Tarakan', 34);

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
  `phone_number` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `subscribe` int(1) NOT NULL DEFAULT '0',
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `last_online` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `customer_name`, `gender`, `birthday`, `email`, `phone_number`, `password`, `subscribe`, `user_create`, `user_edit`, `date_created`, `date_edited`, `last_online`, `active`) VALUES
(1, 'Mary Jane Watson', 2, '1987-03-17', 'maryjane@viore.biz', '', '7b81a7a76693d0321b94', 1, 1, 1, '2016-03-21 14:03:27', '2016-03-22 09:47:59', '2016-03-21 14:03:27', 1),
(2, 'Bruce Wayne', 1, '2006-03-01', 'bruce-wayne@vioreshop.com', '', 'brucewayne', 1, 1, 1, '2016-03-22 09:47:10', '2016-03-22 09:47:10', '2016-03-22 09:47:10', 1),
(3, 'Brian Adams', 1, '2006-03-01', 'brianadams@viore.com', '', '40a1f700d02fd6a322a6', 0, 1, 1, '2016-03-23 13:25:31', '2016-03-24 09:09:09', '2016-03-23 13:25:31', 1),
(4, 'Bebinyuu', 1, '2006-03-04', 'bebinyuu@yahoo.com', '', 'bebinyu', 0, 1, 1, '2016-03-23 15:49:42', '2016-03-23 15:49:42', '2016-03-23 15:49:42', 1),
(5, 'Jessica Alba', 2, '1992-08-08', 'jessicaalba@yahoo.com', '0815789878989', 'jessicaalba', 1, 1, 1, '2016-03-23 15:55:02', '2016-03-24 10:15:09', '2016-03-23 15:55:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customeraddress`
--

CREATE TABLE `customeraddress` (
  `id_customeraddress` int(10) NOT NULL,
  `id_customer` int(5) NOT NULL,
  `id_city` int(5) NOT NULL,
  `address` varchar(256) NOT NULL,
  `address2` varchar(256) NOT NULL,
  `address_name` varchar(256) NOT NULL,
  `address_phone` varchar(30) NOT NULL,
  `shipping_address` int(1) NOT NULL,
  `billing_address` int(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customeraddress`
--

INSERT INTO `customeraddress` (`id_customeraddress`, `id_customer`, `id_city`, `address`, `address2`, `address_name`, `address_phone`, `shipping_address`, `billing_address`, `date_created`, `date_edited`, `active`) VALUES
(4, 1, 162, 'Pelabuhan Selatan 121', 'Kota Kuno', 'Mary Jane Watson', '987654311', 1, 1, '2016-03-24 14:16:38', '2016-03-24 14:54:05', 1);

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
  `barcode` varchar(20) NOT NULL,
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

INSERT INTO `item` (`id_item`, `id_product`, `id_size`, `id_color`, `sku`, `barcode`, `stock`, `location`, `user_create`, `user_edit`, `date_created`, `date_edited`, `active`) VALUES
(2, 1, 5, 1, '123456', '', 1, '', 1, 1, '2015-12-17 17:01:59', '2015-12-17 17:01:59', 1),
(3, 1, 5, 1, '123456', '', 1, '', 1, 1, '2015-12-17 17:02:01', '2015-12-17 17:02:01', 1),
(4, 1, 5, 1, '123456', '', 1, '', 1, 1, '2015-12-17 17:02:01', '2015-12-17 17:02:01', 1),
(5, 1, 5, 1, '123456', '', 1, '', 1, 1, '2015-12-17 17:02:02', '2015-12-17 17:02:02', 1),
(6, 1, 5, 2, '165587', '', 125, '125A', 1, 1, '2015-12-19 13:40:48', '2015-12-19 13:40:48', 1),
(7, 1, 5, 2, '184547', '', 8, '64A', 1, 1, '2015-12-19 13:42:01', '2015-12-19 13:42:01', 1),
(8, 1, 5, 3, '987540', '', 60, '45A', 1, 1, '2015-12-19 13:43:46', '2015-12-19 13:43:46', 1),
(9, 1, 5, 3, '100', '', 15, '11', 1, 1, '2015-12-19 13:48:29', '2015-12-19 13:48:29', 1),
(10, 1, 5, 3, 'TRY001', '', 5, '13', 1, 1, '2015-12-21 09:34:39', '2015-12-21 09:34:39', 1),
(11, 1, 5, 2, 'TRY002', '', 5, '1243', 1, 1, '2015-12-21 09:58:58', '2015-12-21 09:58:58', 1),
(12, 2, 5, 2, 'TRY003', '', 4, '1', 1, 1, '2015-12-21 10:07:21', '2015-12-21 10:07:21', 1),
(13, 2, 5, 1, 'TRY004', '', 1, '12', 1, 1, '2015-12-21 10:41:23', '2015-12-21 10:41:23', 1),
(14, 2, 5, 3, 'TRY005', '', 1, '12', 1, 1, '2015-12-21 10:43:15', '2015-12-21 10:43:15', 1),
(15, 2, 14, 1, 'TRY007', '', 12, '12', 1, 1, '2015-12-21 11:43:09', '2015-12-21 11:43:09', 1),
(16, 2, 13, 1, 'TRY006', '', 12, '12', 1, 1, '2015-12-21 11:44:16', '2015-12-21 11:44:16', 1),
(17, 2, 12, 1, 'TRY008', '', 12, '12', 1, 1, '2015-12-21 11:44:49', '2015-12-21 11:44:49', 1),
(19, 45, 6, 1, '25-W35', '', 3, 'A45', 1, 1, '2015-12-28 11:39:58', '2015-12-28 11:39:58', 1),
(20, 46, 6, 1, 'TRY23-W35', '', 4, '4', 1, 1, '2015-12-28 11:46:25', '2015-12-28 11:46:25', 1),
(21, 46, 7, 1, 'TRY23-W36', '', 4, '4', 1, 1, '2015-12-28 11:52:30', '2015-12-28 11:52:30', 1),
(22, 47, 6, 1, 'TRY24-W35', '', 12, '12', 1, 1, '2015-12-28 11:56:06', '2015-12-28 11:56:06', 1),
(23, 47, 7, 1, 'TRY24-W36', '', 12, '12', 1, 1, '2015-12-28 11:57:27', '2015-12-28 11:57:27', 1),
(24, 47, 8, 1, 'TRY24-W37', '', 12, '12', 1, 1, '2015-12-28 11:57:35', '2015-12-28 11:57:35', 1),
(25, 48, 6, 1, 'try31-w35', '', 5, '5', 1, 1, '2015-12-28 11:59:15', '2015-12-28 11:59:15', 1),
(26, 48, 7, 1, 'try31-w36', '', 5, '5', 1, 1, '2015-12-28 11:59:31', '2015-12-28 11:59:31', 1),
(27, 49, 6, 1, 'TRY33-W35', '', 1, '12', 1, 1, '2015-12-28 14:31:07', '2015-12-28 14:31:07', 1),
(28, 49, 7, 1, 'TRY33-W36', '', 1, '12', 1, 1, '2015-12-28 14:31:17', '2015-12-28 14:31:17', 1),
(30, 31, 6, 1, '001-001-1', '', 12, '125A', 1, 1, '2016-01-06 09:55:52', '2016-01-06 09:55:52', 1),
(31, 31, 7, 1, '001-001-2', '', 12, '125A', 1, 1, '2016-01-06 09:56:01', '2016-01-06 09:56:01', 1),
(33, 51, 6, 2, '133-31-ROSE35', '', 3, '31', 1, 1, '2016-01-18 11:15:46', '2016-01-18 11:15:46', 1),
(34, 51, 7, 2, '133-31-ROSE36', '', 3, '31', 1, 1, '2016-01-18 11:15:58', '2016-01-18 11:15:58', 1),
(35, 51, 11, 2, '133-31-ROSE37', '', 3, '31', 1, 1, '2016-01-18 11:16:19', '2016-01-18 11:16:19', 1),
(36, 50, 4, 1, 'JERSER-001', '', 3, '1', 1, 1, '2016-01-18 11:24:44', '2016-01-18 11:24:44', 1),
(37, 52, 2, 5, '1234564', '', 15, '', 1, 1, '2016-01-30 09:29:42', '2016-01-30 09:29:42', 1),
(38, 53, 2, 2, 'SKU2', '', 15, '16', 1, 1, '2016-02-01 10:55:50', '2016-02-04 15:49:46', 1),
(39, 54, 6, 3, '750-102-BLACK35', '750-102-BLC35', 3, '', 1, 1, '2016-02-01 11:01:50', '2016-02-13 12:15:29', 1),
(40, 54, 7, 3, '750-102-BLACK36', '750-102-BLC36', 3, '', 1, 1, '2016-02-01 11:02:10', '2016-02-13 12:15:53', 1),
(41, 55, 6, 4, '750-102-BROWN35', '750-123456', 35, '', 1, 1, '2016-02-13 09:45:23', '2016-02-13 11:42:33', 1),
(42, 55, 7, 4, '750-102-BROWN36', '750-102-B35', 35, '', 1, 1, '2016-02-13 09:45:29', '2016-02-13 11:55:26', 1),
(43, 55, 11, 4, '750-102-BROWN37', '', 35, '', 1, 1, '2016-02-13 09:45:34', '2016-02-13 09:45:34', 1),
(44, 55, 5, 4, '750-102-BROWN38', '', 35, '', 1, 1, '2016-02-13 09:45:49', '2016-02-13 09:45:49', 1),
(45, 55, 12, 4, '750-102-BROWN39', '', 35, '', 1, 1, '2016-02-13 09:46:00', '2016-02-13 09:46:00', 1),
(46, 55, 13, 4, '750-102-BROWN40', '', 0, '', 1, 1, '2016-02-13 09:46:06', '2016-02-13 10:09:40', 1),
(47, 55, 14, 4, '750-102-BROWN41', '', 0, '', 1, 1, '2016-02-13 09:46:12', '2016-02-13 10:09:23', 1),
(48, 56, 1, 1, 'CRGTM1452-WHITE-S', 'CRGTM1452-WHITE-S', 1, '', 1, 1, '2016-02-15 11:18:44', '2016-02-15 11:18:44', 1),
(49, 57, 1, 2, 'ABC123-S', 'ABC123.S', 3, '', 1, 1, '2016-03-18 14:49:16', '2016-03-18 14:49:16', 1),
(50, 57, 2, 2, 'ABC123-M', 'ABC123.M', 3, '', 1, 1, '2016-03-18 14:49:24', '2016-03-18 14:49:24', 1);

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
(1, 1, 'about', 'About Us', 'page.php?page=about', '&lt;div class=&quot;right&quot;&gt;\r\n&lt;div class=&quot;about-img&quot;&gt;&lt;img alt=&quot;about us&quot; src=&quot;../source/images/about1.png&quot; title=&quot;about us&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;left&quot;&gt;\r\n&lt;div class=&quot;page-block&quot;&gt;\r\n&lt;h3&gt;Viore&lt;/h3&gt;\r\n\r\n&lt;div class=&quot;editor&quot;&gt;\r\n&lt;p&gt;Viore is a fashion company that was founded on August 1, 2000 by Mr. Alexander. Located in Serpong, Tangerang, Banten, Viore company engaged in the production of fashion products, whose main product is T-shirts. Superior in quality materials for its products, Viore offers very competitive price for each product, along with a unique design and follows the latest fashion update.&lt;/p&gt;\r\n\r\n&lt;p&gt;Viore now has two subsidiary Company that are also engaged in fashion business. Sinful Shoes for its women shoes products and Pendekar Kaos for its T-shirts products.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;page-block&quot;&gt;\r\n&lt;h3&gt;Sinful&lt;/h3&gt;\r\n\r\n&lt;div class=&quot;editor&quot;&gt;\r\n&lt;div class=&quot;content editor&quot;&gt;\r\n&lt;p&gt;Sinful is a fashion brand company which is one of subsidiary of Viore Company. Sinful was founded in December 2014. Located in Gading Griya Lestari Blok D1 Kav no 18 - 20, Jakarta Utara, DKI Jakarta, Indonesia, Sinful provides a wide range of women&amp;#39;s fashion needs including Shoes, Bags, Jewelry and other fashion accessories.&lt;/p&gt;\r\n\r\n&lt;p&gt;To maintain its customer satisfaction, Sinful only use the best materials for its products, which are comfortable to wear and still stay up to date with the fashion trends.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;page-block&quot;&gt;\r\n&lt;h3&gt;Pendekar Kaos&lt;/h3&gt;\r\n\r\n&lt;div class=&quot;editor&quot;&gt;\r\n&lt;div class=&quot;content editor&quot;&gt;\r\n&lt;p&gt;The other subsidiary of Viore is Pendekar Kaos. Just like its name, Pendekar Kaos puts more its focus on the production of custom T-shirts , where customers can order T-shirts with its own unique design in a certain quality.&lt;/p&gt;\r\n\r\n&lt;p&gt;Pendekar Kaos is located in Kampung Bojong Nangka no 9, Tangerang, Banten. With its great capability in producing many custom requests in T-shirt making, Pendekar Kaos often receives orders from many large corporations with various demands.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;clear&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n', 1, 1, '2016-01-04 16:29:50', '2016-01-14 16:29:54', 1),
(2, 1, 'contact', 'Contact Us', 'page.php?page="contact"', '&lt;div class=&quot;page-block&quot;&gt;\r\n	&lt;h3&gt;Viore Shop ITC Mangga Dua&lt;/h3&gt;\r\n	&lt;address&gt;\r\n		&lt;span&gt;ITC Mangga Dua Lt. 4 Blok AB No. 68A-68B&lt;/span&gt;\r\n		&lt;span&gt;Jl. Mangga Dua&lt;/span&gt;\r\n		&lt;span&gt;Jakarta Utara&lt;/span&gt;\r\n		&lt;span&gt;Daerah Khusus Ibukota Jakarta 14430&lt;/span&gt;\r\n		&lt;span&gt;Indonesia&lt;/span&gt;\r\n		&lt;span&gt;(021) 6120054&lt;/span&gt;\r\n	&lt;/address&gt;\r\n	&lt;div class=&quot;open-hours&quot;&gt;\r\n		&lt;h6&gt;Open Hours&lt;/h6&gt;\r\n		&lt;p&gt;Monday - Sunday 10:00 AM â€“ 6:00 PM&lt;/p&gt;\r\n	&lt;/div&gt;\r\n	&lt;div class=&quot;map&quot;&gt;\r\n		&lt;iframe src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.9617134198825!2d106.82165231527001!3d-6.135846661865349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5f8ab15206b%3A0x3f50e82f4c003880!2sViore+Shop!5e0!3m2!1sen!2sid!4v1452675396937&quot; width=&quot;400&quot; height=&quot;300&quot; frameborder=&quot;0&quot; style=&quot;border:0&quot; allowfullscreen&gt;\r\n		&lt;/iframe&gt;		\r\n	&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;page-block&quot;&gt;\r\n	&lt;h3&gt;Viore Office&lt;/h3&gt;\r\n	&lt;address&gt;\r\n		&lt;span&gt;Gading Griya Lestari Blok D1 no 18 - 20&lt;/span&gt;\r\n		&lt;span&gt;RT 002, RW 012&lt;/span&gt;\r\n		&lt;span&gt;Kel. Sukapura, Kec. Cilincing&lt;/span&gt;\r\n		&lt;span&gt;Jakarta Utara 14140&lt;/span&gt;\r\n		&lt;span&gt;Indonesia&lt;/span&gt;\r\n		&lt;span&gt;(021) 4403670&lt;/span&gt;\r\n	&lt;/address&gt;\r\n	&lt;div class=&quot;open-hours&quot;&gt;\r\n		&lt;h6&gt;Open Hours&lt;/h6&gt;\r\n		&lt;p&gt;Monday - Friday 9:00 AM â€“ 5:00 PM&lt;/p&gt;\r\n		&lt;p&gt;Sunday 9:00 AM â€“ 2:00 PM&lt;/p&gt;\r\n	&lt;/div&gt;\r\n	&lt;div class=&quot;map&quot;&gt;\r\n		&lt;iframe src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.7308041452987!2d106.91824348811242!3d-6.141016666311648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698aae71b5bee5%3A0x45fe35b39af7dcd6!2sJl.+Gading+Griya+Lestari+Raya+No.10%2C+Cilincing%2C+Kota+Jkt+Utara%2C+Daerah+Khusus+Ibukota+Jakarta+14140!5e0!3m2!1sen!2sid!4v1452741488414&quot; width=&quot;400&quot; height=&quot;300&quot; frameborder=&quot;0&quot; style=&quot;border:0&quot; allowfullscreen&gt;&lt;/iframe&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n', 1, 1, '2016-01-04 16:45:35', '2016-01-14 10:44:51', 1),
(3, 1, 'exhibition', 'Sinful Exhibition', 'page.php?page="exhibition"', '&lt;div class=&quot;page-block&quot;&gt;\r\n&lt;h3&gt;Mall of Indonesia&lt;/h3&gt;\r\n\r\n&lt;address&gt;\r\n&lt;p&gt;Jl. Raya Boulevard Barat, Kelapa Gading,&lt;/p&gt;\r\n\r\n&lt;p&gt;Kota Jakarta Utara, Daerah Khusus Ibukota Jakarta 14240&lt;/p&gt;\r\n\r\n&lt;p&gt;In Mall Location : Lobby 6 &amp;amp; Pizza Hut&lt;/p&gt;\r\n&lt;/address&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;page-block&quot;&gt;\r\n&lt;h3&gt;Mangga Dua Square&lt;/h3&gt;\r\n\r\n&lt;address&gt;\r\n&lt;p&gt;Jalan Gunung Sahari Raya No. 1,&lt;/p&gt;\r\n\r\n&lt;p&gt;Pademangan, Jakarta Utara, DKI Jakarta 14420&lt;/p&gt;\r\n&lt;/address&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;page-block&quot;&gt;\r\n&lt;h3&gt;Summarecon Mall Serpong&lt;/h3&gt;\r\n\r\n&lt;address&gt;\r\n&lt;p&gt;Jl. Boulevard Gading Serpong,&lt;/p&gt;\r\n\r\n&lt;p&gt;Sentra Gading Serpong, Kec. Tangerang, Banten 15810&lt;/p&gt;\r\n&lt;/address&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;page-block&quot;&gt;\r\n&lt;h3&gt;Central Park Mall&lt;/h3&gt;\r\n\r\n&lt;address&gt;\r\n&lt;p&gt;Jl. Letjen. S. Parman No.28,&lt;/p&gt;\r\n\r\n&lt;p&gt;Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11470&lt;/p&gt;\r\n&lt;/address&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;page-block&quot;&gt;\r\n&lt;h3&gt;Supermall Karawaci&lt;/h3&gt;\r\n\r\n&lt;address&gt;\r\n&lt;p&gt;Jl. Boulevard Diponegoro No. 105,&lt;/p&gt;\r\n\r\n&lt;p&gt;Kec. Tangerang, Banten 15811&lt;/p&gt;\r\n&lt;/address&gt;\r\n&lt;/div&gt;\r\n', 1, 1, '2016-01-14 13:18:20', '2016-01-14 13:18:20', 1);

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
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `id_paymentmethod` int(5) NOT NULL,
  `method_title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `howto` text NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`id_paymentmethod`, `method_title`, `description`, `howto`, `user_create`, `user_edit`, `date_created`, `date_edited`, `active`) VALUES
(1, 'Transfer Bank Mandiri', '&lt;p&gt;transfer bank mandiri&lt;/p&gt;\r\n', '&lt;p&gt;wuhuu&lt;/p&gt;\r\n', 1, 1, '2016-03-30 17:15:49', '2016-03-30 17:20:31', 1),
(2, 'Transfer Bank BCA', '&lt;p&gt;transfer bank bca&lt;/p&gt;\r\n', '&lt;p&gt;cuma ngetes&lt;/p&gt;\r\n', 1, 1, '2016-03-30 17:16:27', '2016-03-30 17:16:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(20) NOT NULL,
  `id_category` int(5) NOT NULL,
  `id_subcategory` int(5) NOT NULL,
  `id_brand` int(5) NOT NULL,
  `gender` int(1) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_model` varchar(50) NOT NULL,
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

INSERT INTO `product` (`id_product`, `id_category`, `id_subcategory`, `id_brand`, `gender`, `product_name`, `product_model`, `product_description`, `product_dimension`, `product_price`, `product_discount`, `product_discount_active`, `user_create`, `user_edit`, `date_created`, `date_edited`, `active`) VALUES
(1, 0, 0, 0, 2, '', '', '', '', 0, 0, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 1, 1, 0, 2, 'Sinful shoes 123', '', '', '1234', 124500, 0, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 1, 1, 0, 2, 'Sinful 123', '', '', '', 12500, 1, 0, 1, 1, '2015-12-14 10:25:14', '2015-12-14 10:25:14', 1),
(4, 1, 1, 0, 2, 'Sinful 1234', '', '', '', 50000, 0, 0, 1, 1, '2015-12-14 10:26:30', '2015-12-14 10:26:30', 1),
(5, 1, 1, 0, 2, 'Sinful 12345', '', '', '', 50000, 0, 0, 1, 1, '2015-12-14 10:26:54', '2015-12-14 10:26:54', 1),
(6, 1, 1, 0, 2, 'sinful', '', '', '', 30000, 0, 0, 1, 1, '2015-12-14 10:31:28', '2015-12-14 10:31:28', 1),
(7, 1, 1, 0, 2, 'Sinful 4322', '', '', '', 25000, 31, 1, 1, 1, '2015-12-14 10:56:45', '2015-12-14 10:56:45', 1),
(8, 1, 1, 0, 2, 'Sinful 123456789', '', '', '', 45000, 6, 1, 1, 1, '2015-12-14 10:59:36', '2015-12-14 10:59:36', 1),
(9, 1, 1, 0, 2, 'Sinful 5522', '', '', '', 500, 10, 0, 1, 1, '2015-12-14 11:56:21', '2015-12-14 11:56:21', 1),
(10, 1, 1, 0, 2, '124124125', '', '', '', 124124, 0, 0, 1, 1, '2015-12-14 11:57:55', '2015-12-14 11:57:55', 1),
(11, 1, 1, 0, 2, 'Sinful 123456', '', '&lt;p&gt;yahoo yahoo&lt;/p&gt;\r\n', '', 20000, 12, 0, 1, 1, '2015-12-14 12:59:36', '2015-12-14 12:59:36', 1),
(12, 1, 1, 0, 2, 'Februari', '', '', '8 x 5 x54', 2500000, 9, 1, 1, 1, '2015-12-14 13:26:24', '2015-12-14 13:26:24', 1),
(13, 1, 1, 0, 2, 'Maret', '', '', '1 x 1x 1', 250000, 25, 0, 1, 1, '2015-12-14 13:28:52', '2015-12-14 13:28:52', 1),
(14, 1, 1, 0, 2, 'Maret 1', '', '&lt;p&gt;yahooo yahooo&lt;/p&gt;\r\n', '1 x 1x 1', 250000, 25, 0, 1, 1, '2015-12-14 13:29:03', '2015-12-14 13:29:03', 1),
(15, 1, 1, 0, 2, 'april', '', '', '1 x 12 x 20', 520000, 12, 0, 1, 1, '2015-12-14 13:31:04', '2015-12-14 13:31:04', 1),
(16, 1, 1, 0, 2, 'september', '', '&lt;p&gt;adududuuu napa ga masuk ya&lt;/p&gt;\r\n', '', 1, 1, 0, 1, 1, '2015-12-14 13:33:49', '2015-12-14 13:33:49', 0),
(17, 1, 1, 0, 2, 'desember', '', '&lt;p&gt;&lt;strong&gt;&lt;em&gt;desember &lt;/em&gt;&lt;/strong&gt;ya desember yaa&lt;/p&gt;\r\n', '12x12x12', 120000, 12, 1, 1, 1, '2015-12-14 13:35:39', '2015-12-14 13:35:39', 1),
(18, 1, 1, 0, 2, 'Viore', '', '&lt;p&gt;auuooo&lt;/p&gt;\r\n', '', 5000, 0, 0, 1, 1, '2015-12-14 16:21:04', '2015-12-14 16:21:04', 1),
(19, 1, 1, 0, 2, 'Sinful 96544', '', '&lt;p&gt;this is the best shoes you have ever see&lt;/p&gt;\r\n', '12 x 5 x48 ', 258000, 10, 1, 1, 1, '2015-12-15 09:31:28', '2015-12-15 09:31:28', 1),
(20, 1, 1, 0, 2, 'Sinful Shoes 252525', '', '&lt;p&gt;bun bum bum bul bul lalala&lt;/p&gt;\r\n', '10 x 20 x 30', 1500000, 20, 1, 1, 1, '2015-12-22 13:47:41', '2015-12-22 13:47:41', 1),
(21, 1, 1, 0, 2, 'Sinful 2255', '', '&lt;p&gt;asf sf sdf sdf sdf sfd sdf sdf sdf sd&lt;/p&gt;\r\n', '10 x 20 x 30', 150000, 20, 1, 1, 1, '2015-12-22 13:48:33', '2015-12-22 13:48:33', 1),
(22, 1, 1, 0, 2, 'Sinful Woman Shoes 125-45', '', '&lt;p&gt;Sinful with luxury design.&lt;/p&gt;\r\n', '10 x 20 x 30', 450000, 10, 1, 1, 1, '2015-12-22 13:53:14', '2015-12-22 13:53:14', 1),
(23, 1, 1, 0, 2, 'Sinful Shoes Wedge 123', '', '&lt;p&gt;sinful shoes wedges super kw1&lt;/p&gt;\r\n', '10 x 20 x 30', 450000, 20, 1, 0, 0, '2015-12-22 14:09:19', '2015-12-22 14:09:19', 1),
(24, 1, 1, 0, 2, 'Sinful TRy01', '', '&lt;p&gt;asasfasf asf afsaf afsa&amp;nbsp;&lt;/p&gt;\r\n', '10 x 20 x 30', 450000, 20, 1, 0, 0, '2015-12-22 14:10:47', '2015-12-22 14:10:47', 1),
(25, 1, 1, 0, 2, 'Sinful TRy02', '', '&lt;p&gt;asasfasf asf afsaf afsa&amp;nbsp;&lt;/p&gt;\r\n', '10 x 20 x 30', 450000, 20, 1, 0, 0, '2015-12-22 14:11:35', '2015-12-22 14:11:35', 1),
(26, 1, 1, 0, 2, 'Sinful try03', '', '', '10 x 20 x 30', 50000, 0, 0, 0, 0, '2015-12-22 14:16:20', '2015-12-22 14:16:20', 1),
(27, 1, 2, 0, 2, 'Sinful TRY04', '', '&lt;p&gt;trying 4x&lt;/p&gt;\r\n', '10 x 20 x 30', 225000, 15, 0, 1, 1, '2015-12-22 14:21:47', '2015-12-22 14:21:47', 0),
(28, 1, 2, 0, 2, 'Sinful TRY05', '', '&lt;p&gt;trying 4x&lt;/p&gt;\r\n', '10 x 20 x 30', 225000, 15, 0, 1, 1, '2015-12-22 14:23:03', '2015-12-22 14:23:03', 0),
(30, 1, 2, 0, 2, 'Sinful Shoes A001', '', '&lt;p&gt;Sinful shoes Abcsd&lt;/p&gt;\r\n', '12 x 20 x 25', 580000, 10, 1, 1, 1, '2015-12-28 10:30:27', '2015-12-28 10:30:27', 0),
(31, 1, 1, 0, 2, 'Sinful Try 001', '', '&lt;p&gt;auiiiii ohoy ohoy&lt;/p&gt;\r\n', '12 x 12 x 12 cm', 450000, 10, 1, 1, 1, '2015-12-28 10:35:34', '2016-01-06 09:55:14', 1),
(32, 1, 1, 0, 2, 'Sinful Try 11', '', '&lt;p&gt;Sin fu l aw aw&lt;/p&gt;\r\n', '12 x 12', 120000, 10, 1, 1, 1, '2015-12-28 11:08:36', '2015-12-28 11:08:36', 1),
(33, 1, 1, 0, 2, 'Sinful Try11', '', '&lt;p&gt;asfasf asf asf asf as&lt;/p&gt;\r\n', '10 x 10', 150000, 15, 0, 1, 1, '2015-12-28 11:12:39', '2015-12-28 11:12:39', 0),
(34, 1, 1, 0, 2, 'Sinful Try12', '', '&lt;p&gt;asfasf asf asf asf as&lt;/p&gt;\r\n', '10 x 10', 150000, 15, 0, 1, 1, '2015-12-28 11:13:21', '2015-12-28 11:13:21', 0),
(35, 1, 1, 0, 2, 'Sinful Try13', '', '&lt;p&gt;afasf as&lt;/p&gt;\r\n', '', 650000, 0, 0, 1, 1, '2015-12-28 11:13:44', '2015-12-28 11:13:44', 0),
(36, 1, 1, 0, 2, 'Sinful Try14', '', '&lt;p&gt;456465464&lt;/p&gt;\r\n', '12 x 25', 450000, 0, 0, 1, 1, '2015-12-28 11:26:08', '2015-12-28 11:26:08', 0),
(37, 1, 1, 0, 2, 'Sinful Try15', '', '', '', 565, 1, 0, 1, 1, '2015-12-28 11:26:49', '2015-12-28 11:26:49', 0),
(38, 1, 1, 0, 2, 'Sinful Try16', '', '', '', 4500000, 0, 0, 1, 1, '2015-12-28 11:27:36', '2015-12-28 11:27:36', 0),
(39, 1, 1, 0, 2, 'Sinful TRy17', '', '&lt;p&gt;Trying and trying&lt;/p&gt;\r\n', '', 790000, 0, 0, 1, 1, '2015-12-28 11:29:11', '2015-12-28 11:29:11', 0),
(40, 1, 1, 0, 2, 'Sinful Try18', '', '', '', 450000, 0, 0, 1, 1, '2015-12-28 11:29:59', '2015-12-28 11:29:59', 0),
(41, 1, 1, 0, 2, 'Sinful Try19', '', '&lt;p&gt;a&lt;/p&gt;\r\n', '', 1223000, 0, 0, 1, 1, '2015-12-28 11:31:47', '2015-12-28 11:31:47', 0),
(42, 1, 1, 0, 2, 'Sinful 19', '', '', '', 500000, 0, 0, 1, 1, '2015-12-28 11:32:36', '2015-12-28 11:32:36', 0),
(43, 1, 1, 0, 2, 'sinful Try21', '', '', '', 5400000, 0, 0, 1, 1, '2015-12-28 11:33:29', '2015-12-28 11:33:29', 0),
(44, 1, 1, 0, 2, 'Sinful Try22', '', '', '', 450000, 0, 0, 1, 1, '2015-12-28 11:34:26', '2015-12-28 11:34:26', 0),
(45, 1, 1, 0, 2, 'Sinful Try25', '', '', '25 x 25', 4500000, 0, 0, 1, 1, '2015-12-28 11:39:29', '2015-12-28 11:39:29', 1),
(46, 1, 1, 0, 2, 'Sinful Try23', '', '', '25 x 25', 650000, 0, 0, 1, 1, '2015-12-28 11:46:02', '2015-12-28 11:46:02', 0),
(47, 1, 1, 0, 2, 'Sinful Try24', '', '', '', 650000, 0, 0, 1, 1, '2015-12-28 11:55:51', '2015-12-28 11:55:51', 0),
(48, 1, 1, 0, 2, 'sinful try31', '', '', '', 450000, 0, 0, 1, 1, '2015-12-28 11:59:00', '2015-12-28 11:59:00', 0),
(49, 1, 1, 0, 2, 'Sinful Try33', '', '&lt;p&gt;asfasfasfasf&lt;/p&gt;\r\n', '12 x 25 x 10', 560000, 0, 0, 1, 1, '2015-12-28 14:30:35', '2015-12-28 14:30:35', 0),
(50, 2, 4, 3, 2, 'Jersey', '', '&lt;p&gt;super jersey&lt;/p&gt;\r\n', '12 x 25 x 20', 150000, 10, 1, 1, 1, '2016-01-05 10:17:25', '2016-02-13 15:54:54', 1),
(51, 1, 1, 0, 2, 'Apple Ceri', '', '&lt;p&gt;apel ceriton&lt;/p&gt;\r\n', '50 x 50 x 12', 270000, 10, 1, 1, 1, '2016-01-05 15:38:16', '2016-01-18 11:15:26', 1),
(52, 2, 2, 0, 2, 'Apple Ceriton', '', '&lt;p&gt;asfasfa&lt;/p&gt;\r\n', '12 x 55 x 62 cm', 4564998, 1, 1, 1, 1, '2016-01-30 09:29:33', '2016-01-30 09:29:33', 0),
(53, 2, 2, 0, 2, 'Testing 1', '', '', '', 45000, 0, 0, 1, 1, '2016-02-01 10:39:50', '2016-02-01 10:39:50', 1),
(54, 1, 1, 3, 2, 'Sinful Woman Flat Shoes 750-102 Black', '750-102', '&lt;p&gt;Bum bum cha cha&lt;/p&gt;\r\n', '12 x 15 x12', 250000, 12, 1, 1, 1, '2016-02-01 11:01:29', '2016-02-15 13:56:06', 1),
(55, 1, 2, 3, 2, 'Sinful Woman Flat Shoes 750-102 Brown', '750-102', '&lt;p&gt;asdad&lt;/p&gt;\r\n', '12 ', 369900, 30, 1, 1, 1, '2016-02-03 10:01:05', '2016-02-15 13:55:31', 1),
(56, 2, 4, 5, 2, 'Courage T-shirt Men CRGTM1452 White', 'CRGTM1452', '&lt;p&gt;adsad&lt;/p&gt;\r\n', '12 5x', 125000, 30, 1, 1, 1, '2016-02-15 09:36:25', '2016-02-15 10:02:58', 1),
(57, 2, 4, 4, 1, 'Testing ABC123', 'ABC123', '&lt;p&gt;ABC 123 is the newest product launced by Viore Corporation.&lt;/p&gt;\r\n', '56 x 73', 69000, 10, 0, 1, 1, '2016-03-18 14:48:46', '2016-03-18 14:48:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id_province` int(10) NOT NULL,
  `province_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id_province`, `province_name`) VALUES
(1, 'Nanggroe Aceh Darussalam'),
(2, 'Sumatera Utara'),
(3, 'Sumatera Barat'),
(4, 'Riau'),
(5, 'Kepulauan Riau'),
(6, 'Kepulauan Bangka-Belitung'),
(7, 'Jambi'),
(8, 'Bengkulu'),
(9, 'Sumatera Selatan'),
(10, 'Lampung'),
(11, 'Banten'),
(12, 'DKI Jakarta'),
(13, 'Jawa Barat'),
(14, 'Jawa Tengah'),
(15, 'Daerah Istimewa Yogyakarta  '),
(16, 'Jawa Timur'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat'),
(19, 'Nusa Tenggara Timur'),
(20, 'Kalimantan Barat'),
(21, 'Kalimantan Tengah'),
(22, 'Kalimantan Selatan'),
(23, 'Kalimantan Timur'),
(24, 'Gorontalo'),
(25, 'Sulawesi Selatan'),
(26, 'Sulawesi Tenggara'),
(27, 'Sulawesi Tengah'),
(28, 'Sulawesi Utara'),
(29, 'Sulawesi Barat'),
(30, 'Maluku'),
(31, 'Maluku Utara'),
(32, 'Papua Barat'),
(33, 'Papua'),
(34, 'Kalimantan Utara');

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
  `status` int(1) NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_detail`
--

CREATE TABLE `purchase_order_detail` (
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
-- Table structure for table `reseller`
--

CREATE TABLE `reseller` (
  `id_reseller` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `cashback` double NOT NULL,
  `join_date` datetime NOT NULL,
  `bank_acc_no` varchar(20) NOT NULL,
  `id_bank` int(5) NOT NULL,
  `acc_holder_name` varchar(256) NOT NULL,
  `last_purchase` datetime NOT NULL,
  `user_create` int(5) NOT NULL,
  `user_edit` int(5) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reseller`
--

INSERT INTO `reseller` (`id_reseller`, `id_customer`, `cashback`, `join_date`, `bank_acc_no`, `id_bank`, `acc_holder_name`, `last_purchase`, `user_create`, `user_edit`, `date_created`, `date_edited`, `active`) VALUES
(1, 2, 0, '2016-03-29 10:00:10', '100100100', 1, 'Bruce Wayne', '2016-03-29 10:00:10', 1, 1, '2016-03-29 10:00:10', '2016-03-29 15:50:05', 0),
(2, 1, 1000, '2016-03-29 10:02:52', '5156465464', 1, '5646546', '2016-03-29 10:02:52', 1, 1, '2016-03-29 10:02:52', '2016-03-29 10:02:52', 1),
(3, 5, 231, '2016-03-29 13:32:07', '123456798', 1, 'Jessica Alba', '2016-03-29 13:32:07', 1, 1, '2016-03-29 13:32:07', '2016-03-29 13:32:07', 1),
(4, 4, 0, '2016-03-29 13:53:46', '654321', 1, 'Bebi Unyu', '2016-03-29 13:53:46', 1, 1, '2016-03-29 13:53:46', '2016-03-29 13:53:46', 1);

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
(8, 1, 'Heels', 'Any kind of heels.', 2147483647, 1, '0000-00-00 00:00:00', '2015-12-31 12:44:30', 0),
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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2015-11-28 09:29:55', '2015-11-28 09:29:55', '2016-03-31 09:25:23', 1, 1, 1),
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
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id_announcement`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`),
  ADD KEY `id_banner` (`id_banner`),
  ADD KEY `id_banner_2` (`id_banner`);

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
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id_city`),
  ADD KEY `pro_kota` (`id_province`);

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
-- Indexes for table `customeraddress`
--
ALTER TABLE `customeraddress`
  ADD PRIMARY KEY (`id_customeraddress`);

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
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`id_paymentmethod`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id_province`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `reseller`
--
ALTER TABLE `reseller`
  ADD PRIMARY KEY (`id_reseller`);

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
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id_announcement` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id_city` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customeraddress`
--
ALTER TABLE `customeraddress`
  MODIFY `id_customeraddress` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `page_type`
--
ALTER TABLE `page_type`
  MODIFY `id_page_type` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `id_paymentmethod` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id_province` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `reseller`
--
ALTER TABLE `reseller`
  MODIFY `id_reseller` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `pro_kota` FOREIGN KEY (`id_province`) REFERENCES `master_provinsi` (`id_province`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
