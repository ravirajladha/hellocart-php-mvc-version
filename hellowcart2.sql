-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 24, 2022 at 04:08 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hellowcart2`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `latlong` varchar(100) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `address` text,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `latlong`, `area`, `address`, `name`) VALUES
(1, 12, '12.9795038,77.515564', 'hellowcart india bloom building', 'next nexa showroom opp karavali lanch home', 'nagarbhavi'),
(2, 10, '12.9795425,77.5155162', 'nagarbhavi ', 'nagarbhavi ', 'bangalore 560057'),
(3, 12, '12.992512,77.5684096', 'thfhdh', 'kengeri', 'kengeri'),
(4, 10, '12.9795266,77.5155768', 'bloom co works', 'opp to kravali lunch home nagarbhavi', ''),
(5, 10, '12.9244679,77.4818249', 'basaveshwara nagar bangalore 560079', 'no 456 1st cross 3rd main 4th stage', ''),
(6, 10, '12.9244679,77.4818249', 'basaveshwar nagar bangalore 560079', 'no 456 1dt cross 3rd main 4th stage ', 'basaveshwara nagar'),
(7, 27, '12.9513177,77.4925555', 'Ullal', 'Ullal star complex', 'sdhsadgas'),
(8, 10, '12.9795103,77.5155692', 'bloom working building opp to karavali', 'Nagarbhavi ring road ', 'office '),
(9, 37, '12.892364,77.5267569', 'sdf', 'sfdq', 'sdfsdfs');

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `sub_type` varchar(200) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `type`, `name`, `email`, `phone`, `password`, `status`, `created_at`, `sub_type`, `vendor_id`) VALUES
(1, 'admin', 'Admin', 'admin@hellowcart.com', '', '$2y$10$Eg18EbyMVKsuBFTor0neuOsxkWbJsgLku/Z.qq1DMOyoDjqf9svyy', '0', '2022-04-06 16:46:11', NULL, NULL),
(2, 'vendor', 'SHETTY', 'AVINSHETTY1307@GMAIL.COM', '9620363160', '$2y$10$O0EWHjgar9qbIwzn8gByM.4GxLwwexVaoCZ.29hBmZAkmudkqkU0i', '0', '2022-04-07 09:18:45', NULL, NULL),
(3, 'vendor', 'SHETTY', 'BANGALOREBIRIYANI@GMAIL.COM', '9740675321', '$2y$10$X.r/NIo9x2aNl1vC/Rrh5OioaBUO0G52xPfBG3FKXZUXreAEuDkma', '0', '2022-04-07 09:21:56', NULL, NULL),
(4, 'vendor', 'GANESH', 'PARAMPARA@GMAIL.COM', '9008995720', '$2y$10$uyj0sbkVIn2GWzhYvF55OuTVRXIAK5U8Y6fDIv3VQy1xPaZgGf/bC', '0', '2022-04-07 10:18:33', NULL, NULL),
(5, 'vendor', 'SHETTY', 'A1AVINSHETTY@GMAIL.COM', '9886002046', '$2y$10$4TyP5u/ja14QLPG8autKI.HQbntLOlFPy5vV1GL.Av653wJeOmEf6', '0', '2022-04-07 11:20:48', NULL, NULL),
(6, 'vendor', 'SHETTY', 'BANGALORE12345@GMAIL.COM', '9632121703', '$2y$10$KueOIShUK9SUjvS2SK6TR.Hrs0cCxScXSk.5rFHX/HFQnM8sxJIDu', '0', '2022-04-07 11:48:21', NULL, NULL),
(7, 'vendor', 'AFL ', 'AYODHYAFOODLINE@GMAIL.COM', '8762687767', '$2y$10$LOdnDC0bv3lHVk4h/2s9g.OaE5yaqkgXipSqV.ar8CMqTMab1SOIW', '0', '2022-04-07 11:48:58', NULL, NULL),
(8, 'vendor', 'SHETTY', 'BIRIYANIHOUSEYESHWATHPUR@GMAIL.COM', '9740675322', '$2y$10$I5YaQ9.msbYzFyXez21EVeRHifRO6gbOUZMfdxtuMVkzqU6oCPPPK', '0', '2022-04-08 10:49:36', NULL, NULL),
(9, 'vendor', 'SHETTY', 'v@v.v', '888', '$2y$10$Iqwa4LKZcLg1sGGGhe5SXeDILZ8uN47HpsOxOxiNIFrWvCFwBPeNm', '0', '2022-04-08 11:02:21', NULL, NULL),
(10, 'user', 'avin', 'avin@gmail.com', '9740676672', '$2y$10$c6h4cxsxoKiJ6SAdXKZ2TO/dK9kaiyE5.UOMrLHwn9eiLxYLTf39e', '0', '2022-04-08 11:25:19', NULL, NULL),
(11, 'vendor', 'Test', 'test@test.com', 'test', '$2y$10$Qefr4gHAvlpxN3ztCSL5k.IRlIxaCVNpLSPj/0P2pYSD6bD60VuHq', '0', '2022-04-08 11:41:08', NULL, NULL),
(12, 'user', 'Ganeeh', 'gs6080661@gmail.com', '9886002045', '$2y$10$Vgvu3qDiZBokHH7KHZcac.R7a/IHRsheA4enRsVJZWa7DY/TN0rTm', '0', '2022-04-08 13:15:26', NULL, NULL),
(13, 'user', 'Shanaz', 'shanazshaikh9513@gmail.com', '9742521596', '$2y$10$b7omuB3ipBxndGU8YAjc7OEUWaJtnh8qlIh5HFY/zdWQxLB2DHyO.', '0', '2022-04-08 13:27:39', NULL, NULL),
(14, 'vendor', 'avin', 'superwiser@parampara.com', '1234567890', '$2y$10$mWQb6GH3NU6ESvrBT8saiOvtYt4T0hVTc9B/BUYzFWrQ0RXlgkDBK', '0', '2022-04-18 12:10:33', 'supervisor', 4),
(15, 'vendor', 'avin', 'casher@parampara.com', '0987654321', '$2y$10$T4TlblF3qESRoMN5l1DAKugdiMOnNRUA6NgLdPRMNupedSw4bHvhO', '0', '2022-04-18 12:11:48', 'cashier', 4),
(16, 'vendor', 'avin', 'manager@parampara.com', '5432167890', '$2y$10$QIc1rsqiSkh0M0N1CxJRculxJ5vS7GlC4w0vGUDDrK1LajIo9FVyO', '0', '2022-04-18 12:12:39', 'manager', 4),
(17, 'vendor', 'NAGARAJ SHETTY', 'swathigrand@gmail.com', '9600112233', '$2y$10$/L3tb.R5UhXpzzw28rLZyePhvs8ADAj7sEjpNNMd4r1L8k4V6Upou', '0', '2022-04-19 14:30:39', NULL, NULL),
(18, 'vendor', 'GOPAL NAIK', 'hotelkadamba@gmail.com', '9876543210', '$2y$10$j.19OfDQF50CrZw5za4XX.NxPy6VoxvcPfqhFvVNkhFzvQfrC7tIS', '0', '2022-04-19 14:40:13', NULL, NULL),
(19, 'vendor', 'zxxdd', 'sdsds@swe.com', '345345343434', '$2y$10$K85WzIiXEBnxq2jVJZ6DHOuhLq2f98ahZ3ISsFT4G2n0CPcd5vpPa', '0', '2022-04-20 17:23:12', 'supervisor', 18),
(20, 'user', 'Bect', 'alexmixeev323@gmail.com', '89388326879', '$2y$10$lSc6XLu.Np0JbcwqlnLy..8m73uCkNzfFs548XZv5.FUM.Q/j2caG', '0', '2022-04-22 23:17:27', NULL, NULL),
(21, 'vendor', 'Demo', 'ts@gmail.com', '9876543212', '$2y$10$iLzDdx1RlzvsKCAy1lYEIu3vI86K23H1ooZxEv.c4RI0jRAWCpNP.', '0', '2022-04-25 14:38:36', NULL, NULL),
(22, 'vendor', 'demo 1', 'dem@gmail.com', '9876543213', '$2y$10$1mVI.Xm4.q.CW/EyTRJ4/OglVjUAuY1vyetF9OxakysdnY0xeENNa', '0', '2022-04-26 17:21:46', NULL, NULL),
(23, 'user', 'Darshan', 'darshan8mr@gmail.com', '9535135278', '$2y$10$vwJpdlfPT9inaXnZHN.JTe.PAjJXZrjg/Ta3Lpp.ZaEMoeYo.RVt.', '0', '2022-04-27 10:44:18', NULL, NULL),
(24, 'user', 'Webbirth', 'webbirthsm@gmail.com', '8217063541', '$2y$10$7P10Ti7k/R5iCvZy7FE.oO9vlPCVewYv23.6Xg3tdlneu/clePIOG', '0', '2022-04-27 10:46:16', NULL, NULL),
(25, 'user', 'Test3', 'test3@gmail.com', '8884464462', '$2y$10$GkE4eiAp2x7D.zc2XROXoOJGVr.3HEF1yFm1IWR2ga5li4Obqjc/m', '0', '2022-04-27 10:49:21', NULL, NULL),
(26, 'user', 'test5', 'test5@gmail.com', '99887898989080', '$2y$10$6DrxSlTiwqEQls20ws7jS.SCqB9CeWZv9X4Nv4xSvfsaRD/rfpVDS', '0', '2022-04-27 13:05:03', NULL, NULL),
(27, 'user', 'Chaitra', 'Test@gmail.com', '6362335321', '$2y$10$BDtUH9nJOdwCPVdxBz0KQO4THbYc7Bu/3SXhM0RytzkFOS6lXsJv.', '0', '2022-04-27 13:09:03', NULL, NULL),
(28, 'vendor', 'Staffone', 'Staff@gmail.com', '9876543211', '$2y$10$x9r0XL3j/Nwo99eIc48/6u5PdUhpCQ74oMgYwFBEm0hXFUlgpEHT.', '0', '2022-04-27 13:19:04', 'supervisor', 18),
(29, 'vendor', 'avin', 'dfghjhgfd@gmail.com', '678123987', '$2y$10$ohYOX8aKoZGKWzOanXqz/.sAl3PGkTo42avGhsrJAoh5Ct10eEVqO', '0', '2022-04-27 16:28:18', 'cashier', 4),
(30, 'vendor', 'test', 'emailtest@gmail.com', '546544646', '$2y$10$anAJgxuULn4816A6vBIhAerTtUDeVEHSpjRtgtuHdSV5qcypjjrY2', '0', '2022-04-27 16:31:14', 'supervisor', 18),
(34, 'user', 'Test3', 'test3@gmail.comew', '88844644623', '$2y$10$GkE4eiAp2x7D.zc2XROXoOJGVr.3HEF1yFm1IWR2ga5li4Obqjc/m', '0', '2022-04-27 10:49:21', NULL, NULL),
(35, 'user', 'test5', 'test5@gmail.com32', '998878989890802', '$2y$10$6DrxSlTiwqEQls20ws7jS.SCqB9CeWZv9X4Nv4xSvfsaRD/rfpVDS', '0', '2022-04-27 13:05:03', NULL, NULL),
(36, 'user', 'Chaitra', 'Test@gmail.com23', '636233532123\r\n', '$2y$10$BDtUH9nJOdwCPVdxBz0KQO4THbYc7Bu/3SXhM0RytzkFOS6lXsJv.', '0', '2022-04-27 13:09:03', NULL, NULL),
(37, 'user', 'lkjh', 'arun@hc.com', '9066669964\r\n', '$2y$10$JAj.3LUarsVByDf9Yv3j6uLY2R8Fu90clowtxqMjvb3qDyoVBV/1y', '0', '2022-04-28 10:51:31', NULL, NULL),
(38, 'user', 'mm', 'mm@mm', '90809', '$2y$10$XKh3Mzo4vDZfLTXbVFyZDOh9h6Qaurg2iwGylfyvSMkvLDtCGy5xa', '0', '2022-04-29 00:29:57', NULL, NULL),
(39, 'user', 'jlkkj', 'kjlkj@jlkj', '9066669966', '$2y$10$veWMGULzMK7BcV6pemXuZ.Qq/DvRqJDJaDEYZRe27rpy7yEWLnYT.', '0', '2022-04-30 13:53:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL,
  `banner_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `banner_file`) VALUES
(5, '202204271651060089.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cart_user_id` varchar(250) DEFAULT NULL,
  `cart_vendor_id` int(11) DEFAULT NULL,
  `items` json DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `item_total_price` float DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cart_user_id`, `cart_vendor_id`, `items`, `coupon_id`, `item_total_price`, `created_at`, `status`) VALUES
(2, '13', 9, '{\"67\": {\"item_qty\": \"1\", \"item_price\": \"100\", \"item_status\": 0, \"item_total_price\": 100}, \"68\": {\"item_qty\": \"1\", \"item_price\": \"110\", \"item_status\": 0, \"item_total_price\": 110}}', NULL, NULL, '2022-04-08 04:13:37', 1),
(25, '10', 4, '{\"2\": {\"item_qty\": \"1\", \"item_price\": \"40\", \"item_status\": 0, \"item_total_price\": 40}}', NULL, NULL, '2022-04-22 02:34:15', 1),
(26, '25', 18, '{\"100\": {\"item_qty\": \"5\", \"item_price\": \"40\", \"item_status\": 0, \"item_total_price\": 200}}', NULL, NULL, '2022-04-27 01:20:08', 1),
(27, '26', 17, '{\"112\": {\"item_qty\": \"2\", \"item_price\": \"10\", \"item_status\": 0, \"item_total_price\": 20}}', NULL, NULL, '2022-04-27 03:38:00', 1),
(28, '27', 4, '{\"1\": {\"item_qty\": \"3\", \"item_price\": \"50\", \"item_status\": 0, \"item_total_price\": 150}, \"2\": {\"item_qty\": \"3\", \"item_price\": \"40\", \"item_status\": 0, \"item_total_price\": 120}}', NULL, NULL, '2022-04-27 03:40:07', 1),
(29, '12', 4, '{\"1\": {\"item_qty\": \"3\", \"item_price\": \"50\", \"item_status\": 0, \"item_total_price\": 150}}', NULL, NULL, '2022-04-27 23:04:55', 1),
(33, '37', 4, '{\"1\": {\"item_qty\": \"5\", \"item_price\": \"50\", \"item_status\": 0, \"item_total_price\": 250}, \"2\": {\"item_qty\": \"5\", \"item_price\": \"40\", \"item_status\": 0, \"item_total_price\": 200}}', NULL, NULL, '2022-04-30 11:52:19', 1),
(34, '39', 4, '{\"2\": {\"item_qty\": \"3\", \"item_price\": \"40\", \"item_status\": 0, \"item_total_price\": 120}, \"4\": {\"item_qty\": \"3\", \"item_price\": \"90\", \"item_status\": 0, \"item_total_price\": 270}}', NULL, NULL, '2022-04-30 19:04:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_dine`
--

CREATE TABLE `cart_dine` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_name` varchar(250) DEFAULT NULL,
  `item_price` float DEFAULT NULL,
  `item_qty` int(11) DEFAULT NULL,
  `item_total_price` int(11) DEFAULT NULL,
  `table_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_dine`
--

INSERT INTO `cart_dine` (`id`, `user_id`, `item_id`, `item_name`, `item_price`, `item_qty`, `item_total_price`, `table_id`, `created_at`) VALUES
(74, 10, 96, 'Chicken Biriyani ', 100, 1, 100, 11, '2022-04-21 17:01:39'),
(75, 10, 111, 'Cock', 50, 1, 50, 11, '2022-04-21 17:14:20'),
(76, 10, 112, 'Meneral Water 500ml', 10, 1, 10, 11, '2022-04-21 17:30:32'),
(129, 39, 2, 'IDLI VADA SAMBAR', 50, 8, 400, 7, '2022-04-30 23:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_vendor_id` int(11) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_img` varchar(255) DEFAULT NULL,
  `category_start_time` time DEFAULT NULL,
  `category_end_time` time DEFAULT NULL,
  `category_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_vendor_id`, `category_name`, `category_img`, `category_start_time`, `category_end_time`, `category_status`) VALUES
(1, 4, 'BREAKFAST', '4202204191650362176.png', '12:00:00', '23:59:00', 2),
(2, 4, 'BEVERAGES', '4202204191650362081.jpg', '07:00:00', '22:00:00', 0),
(3, 4, 'SNACKS', '4202204191650362120.png', '10:00:00', '21:40:00', 0),
(4, 11, 'test1', '11202204081649398461.png', '11:44:00', '11:44:00', 1),
(5, 11, 'test2', '11202204081649398484.png', '11:44:00', '11:44:00', 1),
(6, 9, 'Tandoori starter', '9202204081649398517.jpg', '12:00:00', '10:30:00', 1),
(7, 4, 'CHINISE VEG FRY', '4202204081649398947.png', '12:00:00', '23:00:00', 0),
(8, 11, NULL, 'cat_imgpng', NULL, NULL, 1),
(9, 11, NULL, 'cat_imgpng', NULL, NULL, 1),
(10, 11, 'test', '11202204081649399375.png', '11:59:00', '11:59:00', 1),
(11, 4, 'INDIAN BREADS', '4202204081649399743.jpeg', '12:00:00', '23:00:00', 0),
(12, 4, 'NORTH INDIAN GRAVY', '4202204081649399777.jpeg', '12:00:00', '23:00:00', 0),
(13, 4, 'NORTH INDIAN RICE', '4202204081649399882.jpeg', '12:00:00', '23:00:00', 0),
(14, 4, 'CHINESS  STARTERS ', '4202204081649399924.jpeg', '12:00:00', '23:00:00', 0),
(15, 9, 'BIRIYANI', '9202204081649400069.jpg', '10:00:00', '23:00:00', 1),
(16, 9, 'CHINISE STATERS', '9202204081649400503.jpg', '12:00:00', '23:00:00', 1),
(17, 9, 'CHINISE VEG DRY', '9202204081649401182.jpg', '12:00:00', '23:00:00', 1),
(18, 9, 'EGGS', '9202204081649401763.jpg', '12:00:00', '23:00:00', 1),
(19, 9, 'MUTTON', '9202204081649402147.jpg', '11:00:00', '23:00:00', 1),
(20, 9, 'NORTH INDIAN CURRY', '9202204081649402996.jpg', '10:00:00', '23:00:00', 1),
(21, 3, 'INDIAN BREADS', '3202204181650257553.jpg', '10:00:00', '23:30:00', 1),
(22, 3, 'Chicken Dry ', '3202204181650257631.jpg', '10:00:00', '23:30:00', 1),
(23, 17, 'Biriyani', '17202204191650359411.jpg', '12:00:00', '23:00:00', 1),
(24, 17, 'Tandoori', '17202204191650360271.jpg', '11:00:00', '23:00:00', 1),
(25, 18, 'BREAK FAST', '18202204201650430949.png', '07:00:00', '22:00:00', 1),
(26, 18, 'SNACKS', '18202204201650432502.png', '10:00:00', '22:00:00', 1),
(27, 18, 'DOSA', '18202204201650433436.png', '07:00:00', '22:00:00', 1),
(28, NULL, 'Beverages', '202204211650524186.jpg', '10:00:00', '23:00:00', 1),
(29, 17, 'beverages', '17202204211650524499.jpg', '10:00:00', '23:00:00', 1),
(30, 17, 'INDIAN BREAD ', '17202204221650622770.jpg', '10:00:00', '23:00:00', 1),
(31, 17, 'Chicken Curry', '17202204221650622930.jpg', '10:00:00', '22:00:00', 1),
(32, 18, 'chinese  Rice', '18202204221650625554.jpg', '10:00:00', '23:00:00', 1),
(33, 18, 'Chinese Dry', '18202204221650625792.jpg', '10:00:00', '23:00:00', 1),
(34, 18, 'Chines', '18202204261650977810.jpg', '09:00:00', '12:26:00', 1),
(35, 18, 'Masal dosaa', '18202204271651045878.png', '04:21:00', '16:21:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(11) NOT NULL,
  `coupon_title` varchar(50) DEFAULT NULL,
  `coupon_code` varchar(20) DEFAULT NULL,
  `coupon_type` varchar(20) DEFAULT NULL,
  `coupon_usage` int(11) DEFAULT NULL,
  `coupon_value` int(11) DEFAULT NULL,
  `coupon_cap` int(11) DEFAULT NULL,
  `coupon_status` int(11) DEFAULT NULL,
  `coupon_vendor_id` int(11) DEFAULT NULL,
  `coupon_min_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_title`, `coupon_code`, `coupon_type`, `coupon_usage`, `coupon_value`, `coupon_cap`, `coupon_status`, `coupon_vendor_id`, `coupon_min_order`) VALUES
(1, 'bangalore biriyani house', 'BBHNEW10', '1', 1, 10, 100, 1, 9, 100),
(2, 'TEST', 'TEST98', '1', 2, 98, 1000, 0, 1, 100),
(3, 'PARAM50', 'PARAM50', '1', 1, 100, 100, 0, 4, 100),
(4, 'WELCOME50', 'WEL50', '2', 1, 50, 100, 0, 4, 200),
(5, 'WELCOME', 'WILCOME', '1', 2, 50, 100, 0, 1, 200),
(6, 'new10', 'new10', '1', 1, 10, 50, 0, 17, 100),
(7, 'new98', 'new98', '1', 1, 98, 500, 0, 1, 20),
(9, 'test', 'KADAMBA002', '2', 1, 200, 2, 0, 18, 1000),
(10, 'testdemo', 'ADDDEMO', '1', 1, 100, 2, 1, 22, 1000),
(11, 'TEST1', 'TEST1', '1', 1, 25, 100, 1, 1, 200),
(12, 'aaa', 'aaa', '2', 1, 258, 10, 1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `order_id` varchar(100) DEFAULT NULL,
  `task_id` varchar(255) DEFAULT NULL,
  `agent_name` varchar(100) DEFAULT NULL,
  `agent_phone` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `order_id`, `task_id`, `agent_name`, `agent_phone`, `status`) VALUES
(2, '19', NULL, NULL, NULL, 'Order Created'),
(3, '20', NULL, NULL, NULL, 'Order Created'),
(4, '25', NULL, NULL, NULL, 'Order Created'),
(5, '26', NULL, NULL, NULL, 'Order Created'),
(6, '27', NULL, NULL, NULL, 'Order Created'),
(7, '28', NULL, NULL, NULL, 'Order Created'),
(8, '29', NULL, NULL, NULL, 'Order Created'),
(9, '30', NULL, NULL, NULL, 'Order Created'),
(10, '33', NULL, NULL, NULL, 'Order Created'),
(11, '34', NULL, NULL, NULL, 'Order Created'),
(12, '35', NULL, NULL, NULL, 'Order Created'),
(13, '41', NULL, NULL, NULL, 'Order Created'),
(14, '42', NULL, NULL, NULL, 'Order Created'),
(15, '58', '148657f3-4f74-41a2-b6a7-1605c43ca778', NULL, NULL, 'Order Created'),
(16, '59', NULL, NULL, NULL, 'Order Created'),
(17, '60', NULL, NULL, NULL, 'Order Created'),
(18, '61', NULL, NULL, NULL, 'Order Created'),
(19, '62', NULL, NULL, NULL, 'Order Created'),
(20, '81', NULL, NULL, NULL, 'Order Created'),
(21, '82', NULL, NULL, NULL, 'Order Created'),
(22, '86', NULL, NULL, NULL, 'Order Created'),
(23, '90', 'e2faf7cb-9aaf-4736-aba5-97c748e2f9fe', NULL, NULL, 'Order Created'),
(24, '93', '721c08af-1e18-4f6e-977e-6a03d3e42da5', NULL, NULL, 'Order Created'),
(25, '102', NULL, NULL, NULL, 'Order Created'),
(26, '117', 'ff6a2e20-ffe5-4f15-ac5e-f5ee9e6b206a', NULL, NULL, 'Order Created'),
(27, '118', '90134718-a602-4a15-a122-d7489133029a', NULL, NULL, 'Order Created'),
(28, '119', '1bfe057a-c837-4375-b3ab-51f3521b5688', NULL, NULL, 'Order Created');

-- --------------------------------------------------------

--
-- Table structure for table `dunzo`
--

CREATE TABLE `dunzo` (
  `dunzo_id` int(11) NOT NULL,
  `val` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_type` int(11) DEFAULT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `item_vendor_id` int(11) DEFAULT NULL,
  `item_cat_id` int(11) DEFAULT NULL,
  `item_img` varchar(250) DEFAULT NULL,
  `item_desc` text,
  `item_price` int(11) DEFAULT NULL,
  `item_discount_price` int(11) DEFAULT NULL,
  `item_price_dine` int(11) DEFAULT NULL,
  `item_discount_price_dine` int(11) DEFAULT NULL,
  `item_status` int(11) NOT NULL DEFAULT '1',
  `stock` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_type`, `item_name`, `item_vendor_id`, `item_cat_id`, `item_img`, `item_desc`, `item_price`, `item_discount_price`, `item_price_dine`, `item_discount_price_dine`, `item_status`, `stock`) VALUES
(1, 1, 'CRISPY MASALA DOSA', 4, 1, '4202204081649396284.jpg', 'CRISPY DOSA VERY POPULAR FOOD', 70, 50, 60, 0, 1, 4),
(2, 1, 'IDLI VADA SAMBAR', 4, 1, '4202204081649396522.jpg', 'IDLI VADA SAMBAR', 60, 40, 50, 0, 1, 87),
(3, 1, 'GOBI PEOOER DRY', 4, 7, '4202204181650270212.png', 'Crispy & spicy', 100, NULL, 0, NULL, 1, 99),
(4, 1, 'ONION RAVA MASALA DOSA', 4, 1, '4202204081649396672.jpg', 'ONION RAVA DOSA WITH SAMBAR', 90, 0, 80, 0, 1, 88),
(5, 1, 'PLAIN RAVA IDLI', 4, 1, '4202204081649396778.jpg', 'PLAIN RAVA IDLI', 80, 0, 70, 0, 1, 96),
(6, 1, 'PURI SAGU', 4, 1, '4202204081649396911.jpg', 'PURI SAGU', 60, 0, 50, 0, 1, 99),
(7, 1, 'GHEE MASALA DOSA', 4, 1, '4202204081649397014.jpg', 'GHEE MASALA DOSA', 80, 0, 70, 0, 1, 99),
(8, 1, 'PURI BHAJI', 4, 1, '4202204081649397129.jpg', 'PURI BHAJI', 70, 0, 60, 0, 1, 99),
(9, 1, 'PANEER IDLI', 4, 1, '4202204081649397237.jpg', 'PANEER IDLI', 40, 0, 40, 0, 1, 99),
(10, 1, 'CHOW CHOW BATH', 4, 1, '4202204081649397380.jpg', 'CHOW CHOW BATH', 60, 0, 50, 0, 1, 99),
(11, 1, 'KHARA BAAT', 4, 1, '4202204081649397474.jpg', 'KHARA BATH', 40, 0, 30, 0, 1, 99),
(12, 1, 'KESERI BATH', 4, 1, '4202204081649397583.jpg', 'KESERI BATH', 70, 0, 60, 0, 1, 99),
(13, 1, 'BISE BALE BAAT', 4, 1, '4202204081649397669.jpg', 'BISI BALE BATH', 60, 0, 50, 0, 1, 99),
(14, 1, 'PINEAPPLE KESARI BATH', 4, 1, '4202204081649397811.jpg', 'PINEAPPLE KESARI BATH', 80, 0, 70, 0, 1, 99),
(15, 1, 'JOWER OTS RAVA IDLI', 4, 1, '4202204081649397938.jpg', 'JOWER OTS RAVA IDLI', 60, 0, 50, 0, 1, 99),
(16, 1, 'LEMON JUICE', 4, 2, '4202204081649398613.webp', 'LEMON JUICE', 70, 0, 60, 0, 1, 94),
(17, 1, '7 UP', 4, 2, '4202204081649398694.webp', '7 UP', 70, 0, 60, 0, 1, 99),
(18, 1, 'BABY CORN CHILLY GRAVY', 4, 7, '4202204081649399238.png', 'BABY CORN CHILLY GRAVY', 90, 0, 80, 0, 1, 99),
(19, 1, 'BABY CORN MANCHURIAN GRAVY', 4, 7, '4202204081649399361.png', 'BABY CORN MANCHURIAN GRAVY', 100, 0, 90, 0, 1, 99),
(20, 1, 'BABY CORN MASALA', 4, 7, '4202204081649399467.jpg', 'BABY CORN MASALA', 70, 0, 60, 0, 1, 99),
(21, 1, 'ALOO GOBI', 4, 7, '4202204081649399596.jpg', 'ALOO GOBI', 75, 0, 65, 0, 1, 99),
(22, 1, 'ALOO MATAR', 4, 7, '4202204081649399655.jpg', 'ALOO MATAR', 85, 0, 75, 0, 1, 99),
(23, 1, 'ALOO PALAK', 4, 7, '4202204081649399706.jpg', 'ALOO PALAK', 90, 0, 80, 0, 1, 99),
(24, 1, 'CAPSICUM MASALA ', 4, 7, '4202204081649399775.png', 'CAPSICUM MASALA', 100, 0, 90, 0, 1, 99),
(25, 1, 'DAAL TADKA', 4, 7, '4202204081649399856.png', 'DAAL TADKA', 70, 0, 60, 0, 1, 99),
(26, 1, 'ALO PANNER', 4, 12, '4202204081649400107.jpg', 'North Indian Delicious gravy..', 120, 0, 100, 0, 1, 99),
(27, 2, 'CHICKEN BIRIYANI', 9, 15, '9202204081649400190.jpg', 'CHICKEN BIRIYANI YUMMY', 110, 0, 100, 0, 1, 41),
(28, 1, 'BABY CORN MASALA', 4, 12, '4202204081649400240.jpg', ' BabyCorn Masala is a North Indian Delicious gravy..', 120, 110, 100, 90, 1, 99),
(29, 2, 'EGG BIRIYANI', 9, 15, '9202204081649400252.jpg', 'EGG BIRIYANI TASTY ', 90, 0, 80, 0, 1, 42),
(30, 1, 'CHANNA MASALA', 4, 12, '4202204081649400350.jpg', 'Channa masala gravy combination for Chapati/parota, etc Breads Items..', 120, 0, 100, 0, 1, 99),
(31, 2, 'HYDRABADI CHICKEN BIRIYANI', 9, 15, '9202204081649400353.jpg', 'MOST FAMOUS BIRIYANI', 130, 0, 120, 0, 1, 0),
(32, 1, 'MUTTON BIRIYANI', 9, 15, '9202204081649400416.jpg', 'MUTTON BIRIYANI YUMMY', 110, 0, 100, 0, 1, 31),
(33, 1, 'DALL FRY', 4, 12, '4202204081649400460.jpg', 'this gravy is support for rice & roteis also.', 115, 0, 95, 0, 1, 99),
(34, 1, 'MUSHROOM MASALA', 4, 12, '4202204081649400556.jpg', 'This is North Indian Delicious gravy..', 0, 0, 0, 0, 1, 99),
(35, 2, 'CHICKEN CHILLI GRAVY', 9, 16, '9202204081649400574.jpg', 'CHICKEN CHILLI GRAVY', 90, 0, 80, 0, 1, 0),
(36, 2, 'CHICKEN CHILLI ', 9, 16, '9202204081649400641.jpg', 'CHICKEN CHILLI', 70, 0, 60, 0, 1, 0),
(37, 1, 'CHICKEN GHEE ROAST ', 9, 16, '9202204081649400702.jpg', 'CHICKEN GHEE ROAST ', 130, 0, 120, 0, 1, 0),
(38, 2, 'CHICKEN MANCHURIAN GAVY ', 9, 16, '9202204081649400778.jpg', 'CHICKEN MANCHURIAN GRAVY', 110, 0, 100, 0, 1, 0),
(39, 2, 'CHICKEN MANCHURI', 9, 16, '9202204081649400836.jpg', 'CHICKEN MANCHURI', 100, 0, 90, 0, 1, 0),
(40, 1, 'VEG HYDRABADI', 4, 13, '4202204081649400902.jpg', 'Spicy gravy..', 130, 0, 110, 0, 1, 99),
(41, 2, 'CHICKEN PEPPER ROAST', 9, 16, '9202204081649400907.jpg', 'CHICKEN PEPPER ROAST', 150, 0, 140, 0, 1, 0),
(42, 2, 'FRENCH CHICKEN', 9, 16, '9202204081649400974.jpg', 'FRENCH CHICKEN', 100, 0, 90, 0, 1, 0),
(43, 2, 'LEMON CHICKEN', 9, 16, '9202204081649401075.jpg', 'LEMON CHICKEN', 110, 0, 100, 0, 1, 0),
(44, 1, 'BABY CORN CHILLI', 9, 17, '9202204081649401282.jpg', 'BABY CORN CHILLI', 110, 0, 100, 0, 1, 0),
(45, 1, 'BABY CORN MANCHURIAN', 9, 17, '9202204081649401345.jpg', 'BABY CORN MANCHURIAN', 110, 0, 100, 0, 1, 0),
(46, 1, 'GOBI CHILLY', 9, 17, '9202204081649401408.jpg', 'GOBI CHILLY', 110, 0, 100, 0, 1, 0),
(47, 1, 'MASHROOM MANCHURI', 9, 17, '9202204081649401512.jpg', 'MASHROOM MANCHURI', 100, 0, 100, 0, 1, 0),
(48, 1, 'MASHROOM PANEER DRY', 9, 17, '9202204081649401579.jpg', 'MASHROOM PANEER DRY ', 110, 0, 100, 0, 1, 0),
(49, 1, 'PANEER CHILLI', 9, 17, '9202204081649401635.jpg', 'PANEER CHILLI', 110, 0, 100, 0, 1, 0),
(50, 1, 'PANEER MANCHURI ', 9, 17, '9202204081649401696.jpg', 'PANEER MANCHURI ', 110, 0, 100, 0, 1, 0),
(51, 2, 'CHILLI EGG CURRY ', 9, 18, '9202204081649401839.jpg', 'CHILLI EGG CURRY', 100, 0, 90, 0, 1, 0),
(52, 2, 'ALOO ANDA CURRY ', 9, 18, '9202204081649401904.jpg', 'ALOO ANDA CURRY', 100, 0, 90, 0, 1, 0),
(53, 2, 'EGG BOILED ', 9, 18, '9202204081649401965.jpg', 'EGG BOILED', 30, 0, 20, 0, 1, 0),
(54, 2, 'EGG BURJI', 9, 18, '9202204081649402025.jpg', 'EGG BURJI ', 60, 0, 50, 0, 1, 0),
(55, 2, 'EGG CURRY ', 9, 18, '9202204081649402083.jpg', 'EGG CURRY', 90, 0, 80, 0, 1, 0),
(56, 2, 'MUTTON BUTTER MASALA ', 9, 19, '9202204081649402220.jpg', 'MUTTON BUTTER MASALA ', 110, 0, 100, 0, 1, 0),
(57, 2, 'MUTTON CHILLI', 9, 19, '9202204081649402293.jpg', 'MUTTON CHILLI', 110, 0, 100, 0, 1, 0),
(58, 2, 'MUTTON CHOPS', 9, 19, '9202204081649402352.jpg', 'MUTTON CHOPS', 110, 0, 100, 0, 1, 0),
(59, 2, 'MUTTON GHEE ROAST', 9, 19, '9202204081649402451.jpg', 'MUTTON GHEE ROAST', 110, 0, 100, 0, 1, 0),
(60, 2, 'MUTTON HYDRABADI ', 9, 19, '9202204081649402507.jpg', 'MUTTON HYDRABADI ', 120, 0, 110, 0, 1, 0),
(61, 2, 'MUTTON KEEMA', 9, 19, '9202204081649402562.jpg', 'MUTTON KEEMA', 110, 0, 100, 0, 1, 0),
(62, 2, 'MUTTON KHOLAPURI ', 9, 19, '9202204081649402618.jpg', 'MUTTON KHOLAPURI', 110, 0, 100, 0, 1, 0),
(63, 2, 'MUTTON MASALA ', 9, 19, '9202204081649402681.jpg', 'MUTTON MASALA ', 110, 0, 100, 0, 1, 0),
(64, 2, 'MUTTON MOUGHLAI', 9, 19, '9202204081649402760.jpg', 'MUTTON MOUGHLAI ', 110, 0, 100, 0, 1, 0),
(65, 2, 'MUTTON PEPPER', 9, 19, '9202204081649402824.jpg', 'MUTTON PEPPER', 110, 0, 100, 0, 1, 0),
(66, 2, 'MUTTON ROUGAN GHOSH', 9, 19, '9202204081649402909.jpg', 'MUTTON ROUGAN GHOSH', 110, 0, 100, 0, 1, 0),
(67, 2, 'CHICKEN KADAI', 9, 20, '9202204081649403076.jpg', 'CHICKEN KADAI ', 100, 0, 90, 0, 1, 0),
(68, 2, 'CHICKEN MOUGHLAI MASALA', 9, 20, '9202204081649403167.jpg', 'CHICKEN MOUGHLAI MASALA', 110, 0, 100, 0, 1, 0),
(69, 2, 'CHICKEN PEPPER', 9, 20, '9202204081649403231.jpg', 'CHICKEN PEPPER', 120, 0, 110, 0, 1, 0),
(70, 2, 'BUTTER CHICKEN', 9, 20, '9202204081649403318.jpg', 'BUTTER CHICKEN', 130, 0, 120, 0, 1, 0),
(71, 2, 'CHICKEN 65', 9, 20, '9202204081649403392.jpg', 'CHICKEN 65', 100, 0, 90, 0, 1, 0),
(72, 2, 'CHICKEN HYDRABADI ', 9, 20, '9202204081649403462.jpg', 'CHICKEN HYDRABADI ', 130, 0, 120, 0, 1, 0),
(73, 2, 'CHICKEN MASALA', 9, 20, '9202204081649403518.jpg', 'CHICKEN MASALA ', 130, 0, 120, 0, 1, 0),
(74, 2, 'CHILLI CHICKEN ', 9, 20, '9202204081649403589.jpg', 'CHILLI CHICKEN', 130, 0, 120, 0, 1, 0),
(75, 2, 'GINGER CHICKEN', 9, 20, '9202204081649403649.jpg', 'GINGER CHICKEN', 120, 0, 110, 0, 1, 0),
(76, 2, 'GUNTUR CHICKEN ', 9, 20, '9202204081649403713.jpg', 'GUNTUR CHICKEN', 120, 0, 110, 0, 1, 0),
(77, 2, 'KHOLAPURI CHICKEN', 9, 20, '9202204081649403780.jpg', 'KHOLAPURI CHICKEN', 120, 0, 110, 0, 1, 0),
(78, 2, 'KUNDAPUR CHICKEN CURRY', 9, 20, '9202204081649403851.jpg', 'KUNDAPUR CHICKEN CURRY ', 130, 0, 120, 0, 1, 0),
(79, 2, 'PUDINA CHICKEN', 9, 20, '9202204081649403908.jpg', 'PUDINA CHICKEN', 120, 0, 110, 0, 1, 0),
(80, 2, 'BUTTER FRIED CHICKEN', 9, 6, '9202204081649404048.jpg', 'BUTTER FRIED CHICKEN', 210, 0, 200, 0, 1, 0),
(81, 2, 'CHICKEN LOLIPOP', 9, 6, '9202204081649404106.jpg', 'CHICKEN LOLIPOP', 140, 0, 130, 0, 1, 0),
(82, 2, 'GARLIC ROASTED CHICKEN', 9, 6, '9202204081649404171.jpg', 'GARLIC ROASTED CHICKEN', 210, 0, 200, 0, 1, 0),
(83, 2, 'TANDOORI CHICKEN GRILL', 9, 6, '9202204081649404231.jpg', 'TANDOORI CHICKEN GRILL', 360, 0, 350, 0, 1, 0),
(84, 2, 'TANDOORI CHICKEN TIKA', 9, 6, '9202204081649404303.jpg', 'TANDOORI CHICKEN TIKA', 260, 0, 250, 0, 1, 0),
(85, 1, 'VEG BIRIYANI', 4, 13, '4202204091649482065.png', 'TESTY FOOD', 130, 0, 110, 0, 1, 99),
(86, 1, 'VEG MUGAKAI BIRIYANI', 4, 13, '4202204091649482163.jpg', 'SPICY & TESTY RICE.', 150, 0, 130, 0, 1, 99),
(87, 1, 'VEG FRIED RICE', 4, 13, '4202204091649482244.png', 'CHINEES RICE..', 110, 100, 90, 0, 1, 99),
(88, 1, 'VEG SEZWAN RICE', 4, 13, '4202204091649482347.png', 'THIS IS MOST POPULAR SALES ITEAMS IN OUR RESTAURANT.', 150, 0, 130, 120, 1, 99),
(89, 1, 'PULAV', 4, 1, '4202204111649656235.png', 'SPICY', 0, 0, 40, 0, 1, 99),
(90, 1, 'Roti', 3, 21, '3202204181650257724.jpg', 'Tandoori wheat Roti ', 25, 0, 20, 0, 1, 0),
(91, 1, 'Naan', 3, 21, '3202204181650257765.jpg', 'tandoori naan', 50, 0, 40, 0, 1, 0),
(92, 2, 'kabab', 3, 22, '3202204181650257803.jpg', 'oil fry kabab', 150, 0, 130, 0, 1, 0),
(93, 2, 'chicken Lollipop', 3, 22, '3202204181650257977.jpg', 'lollipop', 150, 0, 0, 0, 1, 0),
(94, 1, 'gobi pepper test', 4, 7, '4202204181650270697.png', 'spicy', 0, 0, 100, 0, 1, 99),
(95, 1, 'Gobi pepper test 2', 4, 7, '4202204181650271050.png', 'crispy', 100, 0, 0, 0, 1, 99),
(96, 2, 'Chicken Biriyani ', 17, 23, '17202204191650360061.jpg', 'special made from basumati rice mouth watering tasty biriyani.', 220, 0, 200, 100, 1, 99),
(97, 2, 'Mutton Biriyani', 17, 23, '17202204191650360169.jpg', 'nicely cooked mutton with basumathi rice biriyani', 275, 0, 0, 0, 1, 99),
(98, 2, 'Tandoori Chicken Full', 17, 24, '17202204191650360344.jpg', 'Rosted with tandoori', 430, 0, 0, 0, 1, 99),
(99, 2, 'Tandoori Kabab', 17, 24, '17202204191650360426.jpg', 'tandoori roasted chicken 6 pcs', 215, 0, 0, 0, 1, 98),
(100, 1, '2 IDLY 1 VADA ', 18, 25, '18202204201650431282.png', 'SAMBAR', 50, 40, 40, 20, 1, 8),
(101, 1, 'KHARA BATH', 18, 25, '18202204201650431393.png', 'Spicy & Healthy food.', 30, 0, 25, 5, 1, 96),
(102, 1, 'KESARI BATH', 18, 25, '18202204201650431515.png', 'Pineapple, banana mix sweet desearts.', 30, 0, 25, 5, 1, 99),
(103, 1, 'TOMATO BATH', 18, 25, '18202204201650436051.jpg', 'with chatni serve..', 50, 0, 40, 5, 1, 99),
(104, 1, 'VEG PULAV', 18, 25, '18202204201650436166.jpg', 'Serve with raita.. testy & spicy south Indian ricebath.', 50, 0, 40, 5, 1, 98),
(105, 1, 'VADA 1 PC', 18, 25, '18202204201650436282.png', 'Sambar', 25, 0, 30, 5, 1, 98),
(106, 1, 'ALOO BONDA', 18, 25, '18202204201650436361.png', 'With serve chatni..', 35, 0, 30, 0, 1, 99),
(107, 1, 'MASALA VADA ', 18, 26, '18202204201650436606.png', '2 pcs with Chatni.', 25, 0, 20, 0, 1, 99),
(108, 1, 'IDLY SAMBAR', 18, 25, '18202204201650436705.png', '2 pcs Idly with Sambar & chatni.', 30, 0, 25, 0, 1, 99),
(109, 1, 'CHOW - CHOW BATH', 18, 25, '18202204201650436822.png', 'sweet N  Spicy Delious Food..', 65, 0, 55, 0, 1, 98),
(110, 1, 'POORI SAGU', 18, 25, '18202204201650436921.png', 'Chatni with vegitable Sagu.', 70, 0, 60, 0, 1, 99),
(111, 1, 'Cock', 17, 29, '17202204211650524545.jpg', 'cock', 0, 0, 50, 0, 1, 92),
(112, 1, 'Meneral Water 500ml', 17, 29, '17202204211650542283.jpg', '500 ml', 10, 0, 10, 0, 1, 98),
(113, 1, 'CRISPY MASALA DOSA', 18, 27, '18202204221650619261.jpg', 'Crispy dosa', 60, 0, 0, 0, 1, 10),
(114, 1, 'Butter Naan', 17, 30, '17202204221650623017.jpg', 'Tandoori naan with butter', 45, 0, 45, 0, 1, 99),
(115, 1, 'Roti', 17, 30, '17202204221650623067.jpg', 'tandoori roti', 25, 0, 25, 0, 1, 99),
(116, 1, 'Butter Roti', 17, 30, '17202204221650623208.jpg', 'Tandoori Roti with butter', 30, 0, 30, 0, 1, 99),
(117, 1, 'Naan', 17, 30, '17202204221650623249.jpg', 'tandoori naan', 40, 0, 40, 0, 1, 99),
(118, 2, 'Chicken Hyderababi', 17, 31, '17202204221650623341.jpg', 'chicken green spicy curry', 180, 0, 180, 0, 1, 0),
(119, 2, 'chicken Kolapuri', 17, 31, '17202204221650624247.jpg', 'spicy red curry', 180, 0, 180, 0, 1, 99),
(120, 1, 'Veg Fried Rice', 18, 32, '18202204221650625695.jpg', 'Chinese veg fried rice', 140, 0, 140, 0, 1, 99),
(121, 1, 'Mushroom Chilly', 18, 33, '18202204221650625858.jpg', 'chinese dry', 175, 0, 175, 0, 1, 99),
(122, 1, 'CRISPY MASALA ', 18, 27, '18202204261650977251.jpg', 'CRISPY MASALA DOSA', 50, 0, 20, 0, 1, 0),
(123, 2, 'dsffsfs', 18, 33, '18202204261650977917.png', 'sadadadad', 1255, 0, 1233, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_type` int(11) DEFAULT '0',
  `user_id` varchar(255) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `address_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `items` json DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `delivery_cost` int(11) DEFAULT NULL,
  `tax_percentage` int(11) DEFAULT NULL,
  `tax_value` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `coupon_id` varchar(50) DEFAULT NULL,
  `coupon_value` varchar(50) NOT NULL DEFAULT '0',
  `net_total` int(11) DEFAULT NULL,
  `instruction` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT '0',
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `transaction_id` varchar(255) DEFAULT NULL,
  `pay_cash` int(11) NOT NULL DEFAULT '0',
  `picked` int(11) NOT NULL DEFAULT '0',
  `settled` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_type`, `user_id`, `vendor_id`, `table_id`, `address_id`, `name`, `email`, `phone`, `items`, `total`, `delivery_cost`, `tax_percentage`, `tax_value`, `sub_total`, `coupon_id`, `coupon_value`, `net_total`, `instruction`, `created_at`, `status`, `payment_status`, `transaction_id`, `pay_cash`, `picked`, `settled`) VALUES
(1, 1, '37', 4, 2, NULL, 'lkjh', 'arun@hc.com', '9066669964\r\n', '{\"1\": {\"item_qty\": \"2\", \"item_price\": \"60\", \"item_status\": 0, \"item_total_price\": \"120\"}}', 120, NULL, NULL, NULL, 120, NULL, '0', 120, NULL, '2022-05-03 15:18:12', '2', 0, NULL, 0, 0, 0),
(2, 1, '37', 4, 2, NULL, 'lkjh', 'arun@hc.com', '9066669964\r\n', '{\"2\": {\"item_qty\": \"1\", \"item_price\": \"50\", \"item_status\": 0, \"item_total_price\": \"50\"}}', 50, NULL, NULL, NULL, 50, NULL, '0', 50, NULL, '2022-05-03 15:18:24', '2', 0, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `page_counter`
--

CREATE TABLE `page_counter` (
  `pc_id` int(11) NOT NULL,
  `pc_val` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_counter`
--

INSERT INTO `page_counter` (`pc_id`, `pc_val`) VALUES
(1, 20214),
(2, 689);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` varchar(250) DEFAULT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `user_id`, `order_id`, `vendor_id`, `rating`, `review`, `datetime`) VALUES
(1, 12, 5, 4, 5, '', '2022-04-11 01:16:15'),
(2, 12, 9, 4, 5, 'GOOD FOOD', '2022-04-11 01:38:16'),
(3, 12, 25, 4, 5, 'GOOD FOOD', '2022-04-18 03:12:25'),
(4, 10, 64, 9, 5, 'good ', '2022-04-19 02:54:06'),
(5, 10, 86, 17, 5, 'good', '2022-04-21 04:12:13'),
(6, 12, 102, 4, 2, 'WORST FOOD', '2022-04-27 23:02:29'),
(7, 37, 118, 4, 3, 'sdfsdf', '2022-04-29 08:53:52');

-- --------------------------------------------------------

--
-- Table structure for table `settlements`
--

CREATE TABLE `settlements` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `order_ids` varchar(500) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `commission` int(11) DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `reciept_file` varchar(100) DEFAULT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settlements`
--

INSERT INTO `settlements` (`id`, `vendor_id`, `order_ids`, `amount`, `commission`, `transaction_id`, `reciept_file`, `datetime`, `status`) VALUES
(5, 4, '9,19,20,25,26,27,28,29,30,31,32,34,35,41,42,43,45,46,47,48,49,50,51,52,53,54,58', 1440, 160, 'URI0005d', '202204191650344486.png', '2022-04-19 01:01:27', 0),
(6, 17, '86', 680, 76, 'dfgh87654', '202204231650696912.jpeg', '2022-04-23 02:55:12', 0),
(7, 4, '81,82,90,93', 774, 86, '87654rrtyui', '202204231650696962.jpeg', '2022-04-23 02:56:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(20) NOT NULL,
  `subcategory_vendor_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_img` varchar(255) NOT NULL,
  `subcategory_tax` int(11) NOT NULL,
  `delivery_cost` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `table_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `vendor_id`, `table_name`, `table_status`) VALUES
(1, 9, '01', 0),
(2, 4, '01', 0),
(3, 9, '02', 0),
(4, 9, '03', 0),
(5, 9, '04', 0),
(6, 9, '05', 0),
(7, 4, '02', 0),
(8, 3, '01', 0),
(9, 18, '01', 0),
(10, 18, 'test', 0),
(11, 17, '01', 0),
(12, 4, '02', 0),
(13, 18, '', 0),
(14, 18, '', 0),
(15, 18, 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(400) DEFAULT NULL,
  `vendor_img` varchar(255) DEFAULT NULL,
  `vendor_address` varchar(100) DEFAULT NULL,
  `vendor_latlong` text,
  `vendor_gst` varchar(200) DEFAULT NULL,
  `vendor_fssai` varchar(255) DEFAULT NULL,
  `vendor_start_time` time DEFAULT NULL,
  `vendor_end_time` time DEFAULT NULL,
  `vendor_start_time2` time DEFAULT NULL,
  `vendor_end_time2` time DEFAULT NULL,
  `vendor_bank_account` varchar(255) DEFAULT NULL,
  `vendor_bank_ifsc` varchar(255) DEFAULT NULL,
  `vendor_permissions` varchar(20) NOT NULL DEFAULT '0',
  `vendor_verified` int(11) NOT NULL DEFAULT '0',
  `vendor_status` int(11) NOT NULL DEFAULT '1',
  `featured` int(11) DEFAULT '0',
  `gst_file` varchar(100) DEFAULT NULL,
  `fssai_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `vendor_name`, `vendor_img`, `vendor_address`, `vendor_latlong`, `vendor_gst`, `vendor_fssai`, `vendor_start_time`, `vendor_end_time`, `vendor_start_time2`, `vendor_end_time2`, `vendor_bank_account`, `vendor_bank_ifsc`, `vendor_permissions`, `vendor_verified`, `vendor_status`, `featured`, `gst_file`, `fssai_file`) VALUES
(4, 'HOTEL PARAMPARA ', '202204191650359618.jpg', 'OUTER RING ROAD NEXT KENT BUILDING NAGARBHAVI BANGALORE', '12.9626633,77.5122661', '5432WER12345', '876543WERT', '00:00:00', '23:59:00', '00:00:00', '23:59:00', '64157991063', 'SBIN0040780', '0', 1, 1, 1, NULL, NULL),
(7, 'AFL CATERINGS', '202204071649312338.jpeg', 'PRASHANTH NAGAR CIRCLE NAGARBHAVI BANGALORE', '12.9761356,77.5310683', 'AFH87654IN', 'FGHJ4321AS', '07:00:00', '16:00:00', '16:00:00', '21:30:00', '64157991063', 'SBIN0040780', '0', 0, 1, 1, NULL, NULL),
(9, 'BANGALORE BIRIYANI', '202204081649395941.jpg', '10/30/1, 1st Main, Gokul 1st Stage, 2nd Phase Mathikere, Yeswanthpur, Bengaluru, Karnataka 560054', '13.0300571,77.5574841', 'STIN5285YTS', 'LINGOFLD', '09:00:00', '16:00:00', '16:00:00', '22:30:00', '0202052525255', 'SBIN00005685', '0', 1, 0, 1, NULL, NULL),
(11, 'test', '202204081649398268.png', 'test', '88', 'test', 'test', '11:40:00', '11:40:00', '11:40:00', '11:40:00', 'test', 'test', '0', 1, 1, 0, NULL, NULL),
(17, 'SWATHI GRAND', '202204191650358839.png', 'OUTER RING ROAD NAGARBHAVI BANGALORE 560072', '12.961102265586176, 77.50754265433565', 'ASD1234ASD123', 'FGHJ54321', '11:30:00', '23:00:00', '11:45:00', '23:00:00', '1234567890', 'ASFGQW12345', '0', 1, 1, 1, 'vendor.png', 'vendor.png'),
(18, 'HOTEL KADAMBA', '202204191650359413.png', 'NO 552 OUTER RING ROAD NAGARBHAVI BANGALORE', '12.961856,77.512053', 'ASDF09876543', 'ZXCV1234WER', '07:00:00', '22:00:00', '00:00:00', '00:00:00', '0987654321', 'OIUYTR12345', '0', 1, 1, 1, 'vendor.png', 'vendor.png'),
(21, 'Name', '202204251650877716.png', 'address', 'google', 'ffgdfgdfgsfsdfsdf', 'sdsgs', '10:00:00', '20:00:00', '00:00:00', '00:00:00', '987654321234', '435345435', '0', 1, 1, 1, 'g202204251650877716.png', 'f202204251650877716.png'),
(22, 'demo ', '202204261650973906.png', 'test', 'test', '29BATPK234546', '8732664', '08:20:00', '12:00:00', '00:00:00', '00:00:00', '6676246756', 'SDV1234', '0', 1, 1, 1, 'g202204261650973906.png', 'f202204261650973906.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`phone`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_dine`
--
ALTER TABLE `cart_dine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `dunzo`
--
ALTER TABLE `dunzo`
  ADD PRIMARY KEY (`dunzo_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_counter`
--
ALTER TABLE `page_counter`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `settlements`
--
ALTER TABLE `settlements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `cart_dine`
--
ALTER TABLE `cart_dine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `dunzo`
--
ALTER TABLE `dunzo`
  MODIFY `dunzo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page_counter`
--
ALTER TABLE `page_counter`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settlements`
--
ALTER TABLE `settlements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
