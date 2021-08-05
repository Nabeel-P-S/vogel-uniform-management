-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 09:35 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vogel`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `addon_id` int(11) NOT NULL,
  `addon` varchar(250) NOT NULL,
  `addon_price1` varchar(250) NOT NULL,
  `addon_price2` varchar(250) NOT NULL,
  `addon_price3` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`addon_id`, `addon`, `addon_price1`, `addon_price2`, `addon_price3`) VALUES
(1, 'CHEST EMBROIDERY 3.5\"', '100', '30', '20'),
(2, 'BACK EMBROIDERY 10\"', '100', '35', '25'),
(3, 'SLEEVE  EMBROIDERY 3.5\"', '100', '30', '20'),
(4, 'CHEST PRINT 3.5\" 1 COLOUR', '50 ', '20', '15'),
(5, 'CHEST PRINT 3.5\" 2 COLOUR', '90', '30', '20'),
(6, 'CHEST PRINT 3.5\" 3 COLOUR', '130', '40', '25'),
(7, 'FRONT PRINT 8\" 1 COLOUR', '50', '20', '15'),
(8, 'FRONT PRINT 8\" 2 COLOUR', '90', '30', '20'),
(9, 'FRONT PRINT 8\" 3 COLOUR', '130', '40', '25'),
(10, 'BACK PRINT 5\" 1 COLOUR', '50', '20', '15'),
(11, 'BACK PRINT 5\" 2 COLOUR', '90', '30', '20'),
(12, 'BACK PRINT 5\" 3 COLOUR', '130', '40', '25'),
(13, 'BACK PRINT 10\" 1 COLOUR', '55', '25', '20'),
(14, 'BACK PRINT 10\" 2 COLOUR', '95', '35', '25'),
(15, 'BACK PRINT 10\"3 COLOUR', '135', '14', '30'),
(16, 'FRONT HALF SUBLIMATION', '55', '55', '55'),
(17, 'FRONT FULL SUBLIMATION', '90', '90', '90'),
(18, 'FRONT LOGO 3.5\" SUBLIMATION', '20', '20', '20'),
(19, 'BACK HALF SUBLIMATION', '55', '55', '55'),
(20, 'BACK FULL SUBLIMATION', '90', '90', '90'),
(21, 'BACK NUMBER SUBLIMATION', '55', '55', '55'),
(22, 'FRONT & BACK HALF SUBLIMATION', '120', '120', '120'),
(23, 'FRONT & BACK FULL SUBLIMATION', '190', '190', '190'),
(24, 'SLEEVE SUBLIMATION', '50', '50', '50');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` int(11) NOT NULL,
  `color` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color`) VALUES
(1, 'PEACH'),
(2, 'BLACK'),
(3, 'CHARCOL MILANCHI'),
(4, 'CREAM'),
(5, 'DARK GREEN'),
(6, 'DARK GREY'),
(7, 'FLORESENT GREEN'),
(8, 'FLORESENT ORANGE'),
(9, 'GREEN'),
(10, 'GREY'),
(11, 'GREY MILANCHI'),
(12, 'LIGHT GREEN'),
(13, 'MEROON'),
(14, 'NAVY BLUE'),
(15, 'ORANGE'),
(16, 'PINK'),
(17, 'RED'),
(18, 'ROYAL BLUE'),
(19, 'SKY BLUE'),
(20, 'VIOLET'),
(21, 'WHITE'),
(22, 'YELLOW');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `shop_name` varchar(250) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_image` varchar(250) NOT NULL DEFAULT 'profile.png',
  `customer_address` varchar(250) NOT NULL,
  `customer_place` varchar(250) NOT NULL,
  `customer_pincode` varchar(250) NOT NULL,
  `customer_district` varchar(250) NOT NULL,
  `customer_state` varchar(250) NOT NULL,
  `customer_country` varchar(250) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_mobile1` varchar(200) NOT NULL,
  `customer_mobile2` varchar(200) NOT NULL,
  `customer_adhar` varchar(250) NOT NULL,
  `customer_license` varchar(250) NOT NULL,
  `customer_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `shop_name`, `customer_name`, `customer_image`, `customer_address`, `customer_place`, `customer_pincode`, `customer_district`, `customer_state`, `customer_country`, `customer_email`, `customer_mobile1`, `customer_mobile2`, `customer_adhar`, `customer_license`, `customer_status`) VALUES
(1, 'LAUS DEO', 'BLASSAN', 'profile.png', 'NEAR VADAKURUMPAKAV TEMPLE', 'THIROOR', '', 'THRISSUR', '', '', 'BLASSAN2D3CB@GMAIL.COM', '9846900956', '9567017298', '', '', 1),
(2, 'SHINE LAND', 'SHYLA .JOY', 'profile.png', 'EASY TOWER BIT ,NEAR POST OFFICE', 'OLARIKKARA', '680012', 'THRISSUR', '', '', 'SHYLAJOY1965@GMAIL.COM', '9388484169', '', '595127870194', 'AYL/117/18-19', 1),
(3, 'SHEE POINT', 'HASNEED P.M', 'profile.png', 'THANKAMANI KAYATTAM', 'THANKAMANI KAYATTAM', '680007', 'THRISSUR', '', '', 'HASNEED@GMAIL.COM', '9061382358', '9645693998', '', '', 1),
(4, 'AL RAYYAN', 'NAJEED M.A', 'profile.png', 'SNBP COMPLEX, NEAR ELITE HOSPITAL', 'KOORKANCHERY', '', 'THRISSUR', '', '', '', '9037507985', '7012119889', '', '', 1),
(5, 'BLUE MENS FASHION', 'ARAVIND', 'profile.png', 'SREE KRISHNA SHOPING COMPLEX,NEAR HP PETROL PUMP', 'THAIKKAD JN', '680104', 'THRISSUR', '', '', 'ARVINNDALUKKAL@YAHOO.COM', '7025092615', '9846441174', '918089087299', '21/8/19', 1),
(6, 'BIG BRO', 'SUJITH', 'profile.png', 'KBM BUILDING PO THAIKKAD', 'CHOVALLUR PADI', '680104', 'THRISSUR', '', '', 'SIJITHCB9@GMAIL.COM', '7012303706', '9037555637', '981565848616', '', 1),
(7, 'ROYAL FABRICS', 'GEETHA', 'profile.png', 'PANCHAYATH SHOPPING COMPLEX,PO PUZHAKKAL', 'MUTHUVARA', '680553', 'THRISSUR', '', '', '', '7736808849', '9742907799', '838734582469', '48/2019 20', 1),
(8, 'TRENDY', 'SANTHOSH GOPALAN', 'profile.png', 'SCHOOL ROAD,PO PERAMANGALAM', 'PERAMANGALAM', '680545', 'THRISSUR', '', '', 'SANTHOSH.GOPALAN@HOTMAIL.COM', '7736656211', '5', '787720856076', '5', 1),
(9, 'RACE BAND', 'SHAFEEQ', 'profile.png', 'NEAR GOVT HOSPITAL,OPP SALAFI MASJID,MAIN ROAD OTTUPARA', 'OTTUPARA', '680509', 'THRISSUR', '', '', '', '7736656211', '04884231171', '5', '5', 1),
(10, 'TRENDZ MENS WEAR', 'SIVAN TS', 'profile.png', 'NRAR NEHRU MANDAPAM', 'MUNDUR', '680541', 'THRISSUR', '', '', '', '7736656211', '', '784195646771', 'B3-140(146)2019-20-..479', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fabrics`
--

CREATE TABLE `fabrics` (
  `fabric_id` int(11) NOT NULL,
  `fabric` varchar(250) NOT NULL,
  `fabric_price` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fabrics`
--

INSERT INTO `fabrics` (`fabric_id`, `fabric`, `fabric_price`) VALUES
(1, 'PP', '0'),
(2, 'SALINA', '30'),
(3, 'ADDIDAS SALINA', '40'),
(4, 'SUPER SALINA (WHITE ONLY)', '40'),
(5, 'NORMAL HONEY COMP', '20'),
(6, 'SPAN HONEY COMP', '30'),
(7, 'POLI COTTON 60 *40', '10'),
(8, 'POLI COTTON 70*30', '10'),
(9, 'POLI COTTON 50*50', '10'),
(10, 'NIRMAL KNIT NJ', '40'),
(11, 'SPAN NIRMAL NIT SNJ', '40'),
(12, 'LACOSTA', '40'),
(13, 'SUPER POLI (ONLY FOR SHORTS)', '0'),
(14, 'JACK PRO', '0');

-- --------------------------------------------------------

--
-- Table structure for table `factory_addon_price`
--

CREATE TABLE `factory_addon_price` (
  `factory_addon_cost_id` int(11) NOT NULL,
  `addon_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `factory_addon_price1` varchar(250) NOT NULL,
  `factory_addon_price2` varchar(250) NOT NULL,
  `factory_addon_price3` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factory_addon_price`
--

INSERT INTO `factory_addon_price` (`factory_addon_cost_id`, `addon_id`, `vendor_id`, `factory_addon_price1`, `factory_addon_price2`, `factory_addon_price3`) VALUES
(3, 1, 1, '80', '24', '16'),
(4, 2, 1, '80', '28', '20');

-- --------------------------------------------------------

--
-- Table structure for table `factory_cost`
--

CREATE TABLE `factory_cost` (
  `factory_item_cost_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `factory_item_cost1` varchar(250) NOT NULL,
  `factory_item_cost2` varchar(250) NOT NULL,
  `factory_item_cost3` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factory_cost`
--

INSERT INTO `factory_cost` (`factory_item_cost_id`, `item_id`, `vendor_id`, `factory_item_cost1`, `factory_item_cost2`, `factory_item_cost3`) VALUES
(6, 1, 1, '180', '150', '150'),
(7, 2, 1, '180', '150', '150'),
(8, 3, 1, '180', '150', '150'),
(9, 4, 1, '192', '160', '160'),
(10, 5, 1, '180', '150', '150');

-- --------------------------------------------------------

--
-- Table structure for table `factory_fabric_price`
--

CREATE TABLE `factory_fabric_price` (
  `id` int(11) NOT NULL,
  `fabric_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `factory_fabric_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factory_fabric_price`
--

INSERT INTO `factory_fabric_price` (`id`, `fabric_id`, `vendor_id`, `factory_fabric_price`) VALUES
(3, 2, 1, 21),
(4, 3, 1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_no` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `item_details` varchar(250) NOT NULL,
  `item_category_id` int(11) NOT NULL,
  `item_image` varchar(500) NOT NULL DEFAULT 'profile.png',
  `item_cost1` varchar(250) NOT NULL,
  `item_cost2` varchar(250) NOT NULL,
  `item_cost3` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_no`, `item_name`, `item_details`, `item_category_id`, `item_image`, `item_cost1`, `item_cost2`, `item_cost3`) VALUES
(1, 3011, 'SHOP  SALES STAFF', 'T SHIRT LACOSTE WITH COLLAR STIP', 3, '3011 soft_2019-12-16 01-09-07.jpg', '370', '295', '270'),
(2, 3012, 'SHOP  SALES STAFF', 'T SHIRT LACOSTE  PLANE', 3, '3012 soft_2019-12-16 01-10-02.jpg', '370', '295', '270'),
(3, 3014, 'SHOP  SALES STAFF', 'T SHIRT LACOSTE WITH COLLOR  STRIP ', 3, '3014 soft_2019-12-16 01-10-51.jpg', '370', '295', '270'),
(4, 2027, 'RESTAURANT SERVICE', 'HALF SLEEVE T SHIRT WITH CUT AND SEW ( CHEST)', 2, '2027 soft_2019-12-16 01-11-44.jpg', '385', '310', '280'),
(5, 2028, 'RESTAURANT SERVICE', 'HALF SLEEVE T SHIRT WITH APRON', 2, '2028 soft_2019-12-16 01-15-32.jpg', '370', '295', '270'),
(6, 2029, 'RESTAURANT SERVICE', 'HALF SLEEVE T SHIRT  POLO TYPE WITH APRON', 2, '2029 soft_2019-12-16 01-16-42.jpg', '370', '295', '270'),
(7, 20210, 'RESTAURANT SERVICE', 'HALF SLEEVE T SHIRT  POLO TYPE ', 2, '20210 soft_2019-12-16 01-17-36.jpg', '370', '295', '270'),
(8, 20211, 'RESTAURANT SERVICE', 'HALF SLEEVE T SHIRT  CUT AND SEW ( COLLAR & SLEEVE EDGE)', 2, '20211 soft_2019-12-16 01-19-16.jpg', '370', '295', '270'),
(9, 20212, 'RESTAURANT SERVICE', 'HALF SLEEVE T SHIRT CUT  AND SEW (CHEST) WITH APRON ', 2, '20212 soft_2019-12-16 01-20-38.jpg', '385', '310', '280'),
(10, 4011, 'JERSEY FOOTBALL', 'FRONT AND BACK BODY SUBLIMATION ', 4, '4011 soft_2019-12-16 01-21-27.jpg', '550', '470', '445'),
(11, 4012, 'JERSEY FOOTBALL', 'FRONT AND BACK BODY  HALF SUBLIMATION ', 4, '4012 soft_2019-12-16 01-22-20.jpg', '430', '355', '330'),
(12, 4013, 'JERSEY FOOTBALL', 'FRONT AND BACK  FULL SUBLIMATION', 4, '4013 soft_2019-12-16 01-23-11.jpg', '570', '495', '465'),
(13, 4014, 'JERSEY FOOTBALL', 'FRONT BODY SUBLIMATION', 4, '4014 soft_2019-12-16 01-23-59.jpg', '430', '355', '330'),
(14, 4015, 'JERSEY FOOTBALL', 'FRONT BODY  NAME AND LOGO', 4, '4015 soft_2019-12-16 01-24-41.jpg', '335', '260', '235'),
(15, 4016, 'JERSEY FOOTBALL', 'FRONT AND BACK BODY NAME AND LOGO', 4, '4016 soft_2019-12-16 01-25-49.jpg', '370', '295', '270'),
(16, 4017, 'JERSEY FOOTBALL', 'FRONT AND BACK BODY SUBLIMATION ', 4, '4017 soft_2019-12-16 01-26-51.jpg', '550', '470', '445'),
(17, 4018, 'JERSEY FOOTBALL', 'FRONT AND BACK BODY  HALF SUBLIMATION ', 4, '4018 soft_2019-12-16 01-27-41.jpg', '500', '425', '395'),
(18, 4019, 'JERSEY FOOTBALL', 'FRONT AND BACK  FULL SUBLIMATION', 4, '4019 soft_2019-12-16 01-28-40.jpg', '600', '520', '490'),
(19, 40110, 'JERSEY FOOTBALL', 'FRONT BODY SUBLIMATION', 4, '40110 soft_2019-12-16 01-30-59.jpg', '480', '400', '375'),
(20, 40111, 'JERSEY FOOTBALL', 'FRONT BODY  NAME AND LOGO', 4, '40111 soft_2019-12-16 01-32-09.jpg', '335', '260', '235'),
(21, 40112, 'JERSEY FOOTBALL', 'FRONT AND BACK BODY NAME AND LOGO', 4, '40112 soft_2019-12-16 01-33-14.jpg', '370', '295', '270'),
(22, 40113, 'JERSEY FOOTBALL', 'FRONT AND BACK BODY SUBLIMATION ', 4, '40113 soft_2019-12-16 01-34-09.jpg', '550', '470', '445'),
(23, 40114, 'JERSEY FOOTBALL', 'FRONT AND BACK BODY  HALF SUBLIMATION ', 4, '40114 soft_2019-12-16 01-38-34.jpg', '500', '425', '395'),
(24, 40115, 'JERSEY FOOTBALL', 'FRONT AND BACK  FULL SUBLIMATION', 4, '40115 soft_2019-12-16 01-39-14.jpg', '600', '520', '490'),
(25, 40116, 'JERSEY FOOTBALL', 'FRONT BODY SUBLIMATION', 4, '40116 soft_2019-12-16 01-40-03.jpg', '480', '400', '375'),
(26, 40117, 'JERSEY FOOTBALL', 'FRONT BODY  NAME AND LOGO', 4, '40117 soft_2019-12-16 01-40-50.jpg', '335', '260', '235'),
(27, 40118, 'JERSEY FOOTBALL', 'FRONT AND BACK BODY NAME AND LOGO', 4, '40118 soft_2019-12-16 01-41-31.jpg', '370', '295', '270'),
(28, 40119, 'JERSEY FOOTBALL', 'CUT & SEW  CHINESE COLLAR FRONT BODY  NAME AND LOGO', 4, '40119 soft_2019-12-16 01-42-16.jpg', '370', '295', '270'),
(29, 401110, 'JERSEY FOOTBALL', 'CUT & SEW  CHINESE COLLAR FRONT & BACK BODY  NAME AND LOGO', 4, '401110 soft_2019-12-16 01-43-35.jpg', '370', '295', '270'),
(30, 401111, 'JERSEY FOOTBALL', 'CUT & SEW  V NECK  FRONT BODY  NAME AND LOGO', 4, '401111 soft_2019-12-16 01-44-18.jpg', '370', '295', '270'),
(31, 401112, 'JERSEY FOOTBALL', 'CUT & SEW  V NECK FRONT & BACK BODY  NAME AND LOGO', 4, '401112 soft_2019-12-16 01-45-02.jpg', '370', '295', '270'),
(32, 401113, 'JERSEY FOOTBALL', 'CUT & SEW  ROUND NECK FRONT  NAME AND LOGO', 4, '401113 soft_2019-12-16 01-45-54.jpg', '430', '355', '330'),
(33, 401114, 'JERSEY FOOTBALL', 'CUT & SEW  ROUND NECK FRONT & BACK  NAME AND LOGO', 4, '401114 soft_2019-12-16 01-46-38.jpg', '455', '375', '350'),
(34, 4021, 'JERSEY CRICKET', ' FULL SLEEVE  BODY FRONT & BACK FULL SUBLIMATION', 4, '4021 CRICKET JERSEY_2019-12-16 01-47-31.jpg', '610', '525', '500'),
(35, 4022, 'JERSEY CRICKET', 'FULL SLEEVE BODY HALF  SUBLIMATION', 4, '4022 CRICKET JERSEY_2019-12-16 01-48-17.jpg', '480', '400', '375'),
(36, 4023, 'JERSEY CRICKET', 'HALF SLEEVE BODY FULL SUBLIMATION ', 4, '4023 CRICKET JERSEY_2020-01-06 11-24-28.jpg', '610', '525', '500'),
(37, 4024, 'JERSEY CRICKET', 'HALF SLEEVE BODY HALF SUBLIMATION', 4, '4024 CRICKET JERSEY_2020-01-06 11-25-36.jpg', '480', '400', '375'),
(38, 4025, 'JERSEY CRICKET', 'HALF SLEEVE FULL SUBLIMATION', 4, '4025 CRICKET JERSEY_2020-01-06 11-26-33.jpg', '630', '550', '525'),
(39, 4026, 'JERSEY CRICKET', 'HALF  SLEEVE FRONT SUBLIMATION', 4, '4026 CRICKET JERSEY_2020-01-06 11-27-19.jpg', '480', '400', '375'),
(40, 4027, 'JERSEY CRICKET', 'HALF  SLEEVE FRONT NAME AND LOGO', 4, '4027 CRICKET JERSEY_2020-01-06 11-28-13.jpg', '385', '310', '280'),
(41, 4028, 'JERSEY CRICKET', 'HALF SLEEVE FRONT AND BACK NAME AND LOGO', 4, '4028 CRICKET JERSEY_2020-01-06 11-28-58.jpg', '430', '355', '330'),
(42, 4029, 'JERSEY CRICKET', 'FULL SLEEVE FULL SUBLIMATION ', 4, '4029 CRICKET JERSEY_2020-01-06 11-29-50.jpg', '630', '550', '525');

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`category_id`, `category`) VALUES
(1, 'HOSPITAL'),
(2, 'RESTAURANT'),
(3, 'SHOP'),
(4, 'JERSEY'),
(5, 'MENS T SHIRT'),
(6, 'LADIES WEARS'),
(7, 'SCHOOL'),
(8, 'SECURITY'),
(9, 'FESTIVALS'),
(10, 'MARTIAL ARTS'),
(11, 'WORKERS'),
(12, 'SPA'),
(13, 'CAP'),
(14, 'CUSTOM'),
(15, 'SCHOOL ACCESSORIES'),
(16, 'BOTTOM');

-- --------------------------------------------------------

--
-- Table structure for table `item_quantity`
--

CREATE TABLE `item_quantity` (
  `quantity_id` int(11) NOT NULL,
  `quantity_details` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `reference_no` varchar(250) NOT NULL,
  `order_date` datetime NOT NULL,
  `store_delivery_date` date NOT NULL,
  `main_delivery_date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `fabric_id` int(11) NOT NULL,
  `order_quantity` varchar(250) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `order_item_cost` varchar(250) NOT NULL,
  `order_fabric_cost` varchar(250) NOT NULL,
  `order_addon_cost` varchar(250) NOT NULL,
  `order_total_cost` varchar(250) NOT NULL,
  `order_factory_item_cost` varchar(250) NOT NULL,
  `order_factory_fabric_cost` varchar(250) NOT NULL,
  `order_factory_addon_cost` varchar(250) NOT NULL,
  `order_factory_total_cost` varchar(250) NOT NULL,
  `agent_advance` varchar(250) NOT NULL,
  `factory_advance` varchar(250) NOT NULL,
  `agent_balance` varchar(250) NOT NULL,
  `factory_balance` varchar(250) NOT NULL,
  `production_status` int(11) NOT NULL DEFAULT 0,
  `fabric_status` int(11) NOT NULL DEFAULT 0,
  `stitch_status` int(11) NOT NULL DEFAULT 0,
  `pack_status` int(11) NOT NULL DEFAULT 0,
  `store_status` int(11) NOT NULL DEFAULT 0,
  `dispatch_status` int(11) NOT NULL DEFAULT 0,
  `delivery_status` int(11) NOT NULL DEFAULT 0,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `status` varchar(250) NOT NULL DEFAULT 'Order Confirmed',
  `color_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `reference_no`, `order_date`, `store_delivery_date`, `main_delivery_date`, `customer_id`, `item_id`, `fabric_id`, `order_quantity`, `vendor_id`, `order_item_cost`, `order_fabric_cost`, `order_addon_cost`, `order_total_cost`, `order_factory_item_cost`, `order_factory_fabric_cost`, `order_factory_addon_cost`, `order_factory_total_cost`, `agent_advance`, `factory_advance`, `agent_balance`, `factory_balance`, `production_status`, `fabric_status`, `stitch_status`, `pack_status`, `store_status`, `dispatch_status`, `delivery_status`, `payment_status`, `status`, `color_id`) VALUES
(1, '1000', '2020-01-04 11:41:19', '2020-01-11', '2020-01-20', 6, 3, 2, '93', 1, '25110', '2790', '8370', '36270', '13950', '1953', '0', '13950', '20000', '10000', '16270', '3950', 0, 0, 0, 0, 0, 0, 0, 0, 'Order Confirmed', 15),
(2, '9952207985', '2020-01-04 12:25:01', '2020-01-11', '2020-01-20', 8, 5, 7, '15', 1, '4425', '150', '1800', '6375', '2250', '0', '360', '2610', '5800', '2000', '575', '610', 0, 0, 0, 0, 0, 0, 0, 0, 'Order Confirmed', 22);

-- --------------------------------------------------------

--
-- Table structure for table `order_addons`
--

CREATE TABLE `order_addons` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `addon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_addons`
--

INSERT INTO `order_addons` (`id`, `order_id`, `addon_id`) VALUES
(1, 1, 6),
(2, 1, 13),
(3, 2, 1),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_images`
--

CREATE TABLE `order_images` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_image` varchar(250) NOT NULL,
  `image_data` varchar(250) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_quantity`
--

CREATE TABLE `order_quantity` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `order_quantity` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_quantity`
--

INSERT INTO `order_quantity` (`id`, `order_id`, `size_id`, `order_quantity`) VALUES
(1, 1, 1, '15'),
(2, 1, 3, '33'),
(3, 1, 5, '45'),
(4, 2, 3, '5'),
(5, 2, 4, '5'),
(6, 2, 5, '5');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(11) NOT NULL,
  `size` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`size_id`, `size`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XXL'),
(7, 'XXXL'),
(8, 'OTHER');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `status`) VALUES
(1, 'user', '$2y$10$rKjNefPxetSgJmwfs2D23uyfWOA5uh1fQGmmPnpWeOT8RIGVtOgcu', '2019-11-01 18:40:28', 0),
(2, 'staff', '$2y$10$ZXB86FEoLfe.UD.Nf9GvquRksfa4zOqZDW41KF3oUYLIbQqu47eSq', '2019-12-03 12:33:53', 0),
(3, 'admin', '$2y$10$rKjNefPxetSgJmwfs2D23uyfWOA5uh1fQGmmPnpWeOT8RIGVtOgcu', '2021-08-05 12:52:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int(11) NOT NULL,
  `factory_name` varchar(250) NOT NULL,
  `vendor_name` varchar(250) NOT NULL,
  `vendor_address` varchar(250) NOT NULL,
  `vendor_place` varchar(250) NOT NULL,
  `vendor_district` varchar(250) NOT NULL,
  `vendor_state` varchar(250) NOT NULL DEFAULT 'Kerala',
  `vendor_pincode` varchar(250) NOT NULL,
  `vendor_email` varchar(250) NOT NULL,
  `vendor_mobile1` varchar(200) NOT NULL,
  `vendor_mobile2` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `factory_name`, `vendor_name`, `vendor_address`, `vendor_place`, `vendor_district`, `vendor_state`, `vendor_pincode`, `vendor_email`, `vendor_mobile1`, `vendor_mobile2`) VALUES
(1, 'kl garments', 'lakshman', 'old bus stand ,avinasi road', 'thiruppoor', '', 'Kerala', '', '1234567890', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`addon_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `fabrics`
--
ALTER TABLE `fabrics`
  ADD PRIMARY KEY (`fabric_id`);

--
-- Indexes for table `factory_addon_price`
--
ALTER TABLE `factory_addon_price`
  ADD PRIMARY KEY (`factory_addon_cost_id`);

--
-- Indexes for table `factory_cost`
--
ALTER TABLE `factory_cost`
  ADD PRIMARY KEY (`factory_item_cost_id`);

--
-- Indexes for table `factory_fabric_price`
--
ALTER TABLE `factory_fabric_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `item_quantity`
--
ALTER TABLE `item_quantity`
  ADD PRIMARY KEY (`quantity_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_addons`
--
ALTER TABLE `order_addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_images`
--
ALTER TABLE `order_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_quantity`
--
ALTER TABLE `order_quantity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `addon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fabrics`
--
ALTER TABLE `fabrics`
  MODIFY `fabric_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `factory_addon_price`
--
ALTER TABLE `factory_addon_price`
  MODIFY `factory_addon_cost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `factory_cost`
--
ALTER TABLE `factory_cost`
  MODIFY `factory_item_cost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `factory_fabric_price`
--
ALTER TABLE `factory_fabric_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `item_quantity`
--
ALTER TABLE `item_quantity`
  MODIFY `quantity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_addons`
--
ALTER TABLE `order_addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_images`
--
ALTER TABLE `order_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_quantity`
--
ALTER TABLE `order_quantity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
