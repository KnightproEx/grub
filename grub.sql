-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Sep 17, 2020 at 08:07 AM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grub`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `total` decimal(10,2) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `house_unit` varchar(200) NOT NULL,
  `cust_email` varchar(200) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `payment_id` (`payment_id`),
  KEY `cust_email` (`cust_email`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `total`, `order_date`, `house_unit`, `cust_email`, `payment_id`) VALUES
(24, '42.10', '2020-09-16', '69 jalan semerbak', 'aizensousuke464@gmail.com', 3),
(25, '15.60', '2020-09-16', 'test home', 'test@mail.com', 1),
(26, '27.26', '2020-09-16', '299', 'test@mail.com', 1),
(27, '70.72', '2020-09-16', '299', 'test@mail.com', 1),
(28, '70.72', '2020-09-16', '299', 'test@mail.com', 1),
(29, '141.73', '2020-09-16', '30', 'test@mail.com', 1),
(30, '349.50', '2020-09-16', '30', 'test@mail.com', 1),
(31, '175.55', '2020-09-16', '30', 'test@mail.com', 1),
(32, '504.26', '2020-09-16', '30', 'test@mail.com', 1),
(33, '66.59', '2020-09-16', '30', 'test@mail.com', 1),
(34, '55.88', '2020-09-16', '299', 'test@mail.com', 1),
(35, '97.22', '2020-09-16', '28', 'test@mail.com', 1),
(36, '36.79', '2020-09-16', '30', 'test@mail.com', 2),
(37, '54.71', '2020-09-17', '30', 'test@mail.com', 3),
(38, '54.71', '2020-09-17', '30', 'test@mail.com', 3),
(39, '157.63', '2020-09-17', '30', 'test@mail.com', 2),
(40, '43.16', '2020-09-17', '30', 'test@mail.com', 1),
(41, '20.90', '2020-09-17', '300', 'test@mail.com', 1),
(42, '20.90', '2020-09-17', '30', 'ayam@mail.com', 3),
(43, '20.90', '2020-09-17', '30', 'ayam@mail.com', 1),
(44, '20.90', '2020-09-17', '30', 'ayam@mail.com', 1),
(45, '20.90', '2020-09-17', '30', 'ayam@mail.com', 1),
(46, '20.90', '2020-09-17', '300', 'ayam@mail.com', 1),
(47, '20.90', '2020-09-17', '88', 'ayam@mail.com', 1),
(48, '20.90', '2020-09-17', 'iutu', 'ayam@mail.com', 1),
(49, '20.90', '2020-09-17', 'kg', 'ayam@mail.com', 2),
(50, '97.75', '2020-09-17', '50', 'ayam@mail.com', 2),
(51, '20.90', '2020-09-17', '88', 'ayam@mail.com', 1),
(52, '27.26', '2020-09-17', '30', 'ayam@mail.com', 3),
(53, '66.59', '2020-09-17', '69', 'ayam@mail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

DROP TABLE IF EXISTS `cart_details`;
CREATE TABLE IF NOT EXISTS `cart_details` (
  `cart_details_id` int(10) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cart_details_id`),
  KEY `cart_id` (`cart_id`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`cart_details_id`, `cart_id`, `quantity`, `subtotal`, `item_id`) VALUES
(30, 24, 1, '6.00', 54),
(31, 24, 1, '25.00', 49),
(32, 24, 1, '4.00', 51),
(33, 25, 1, '10.00', 40),
(34, 26, 1, '21.00', 78),
(35, 27, 1, '25.00', 49),
(36, 27, 1, '22.00', 87),
(37, 27, 1, '15.00', 86),
(38, 28, 1, '25.00', 49),
(39, 28, 1, '22.00', 87),
(40, 28, 1, '15.00', 86),
(41, 29, 1, '15.00', 57),
(42, 29, 1, '21.00', 56),
(43, 29, 1, '18.00', 58),
(44, 29, 1, '18.00', 55),
(45, 29, 1, '9.00', 64),
(46, 29, 1, '9.99', 65),
(47, 29, 1, '20.00', 59),
(48, 29, 1, '18.00', 60),
(49, 30, 1, '65.00', 66),
(50, 30, 1, '65.00', 67),
(51, 30, 1, '65.00', 68),
(52, 30, 1, '65.00', 69),
(53, 30, 1, '65.00', 70),
(54, 31, 3, '50.70', 72),
(55, 31, 3, '42.60', 73),
(56, 31, 3, '47.40', 74),
(57, 31, 1, '20.20', 75),
(58, 32, 3, '63.00', 78),
(59, 32, 2, '256.00', 44),
(60, 32, 2, '56.00', 77),
(61, 32, 2, '44.00', 79),
(62, 32, 1, '52.00', 76),
(63, 33, 1, '11.80', 80),
(64, 33, 1, '12.30', 81),
(65, 33, 1, '8.90', 82),
(66, 33, 1, '11.80', 83),
(67, 33, 1, '13.30', 84),
(68, 34, 8, '48.00', 85),
(69, 35, 2, '50.00', 49),
(70, 35, 1, '22.00', 87),
(71, 35, 1, '15.00', 86),
(72, 36, 1, '9.99', 65),
(73, 36, 1, '20.00', 59),
(74, 37, 1, '16.90', 72),
(75, 37, 1, '14.20', 73),
(76, 37, 1, '15.80', 74),
(77, 38, 1, '16.90', 72),
(78, 38, 1, '14.20', 73),
(79, 38, 1, '15.80', 74),
(80, 39, 1, '15.00', 57),
(81, 39, 1, '21.00', 56),
(82, 39, 1, '18.00', 58),
(83, 39, 1, '18.00', 55),
(84, 39, 1, '9.00', 64),
(85, 39, 1, '9.99', 65),
(86, 39, 1, '20.00', 59),
(87, 39, 1, '18.00', 60),
(88, 39, 1, '15.00', 61),
(89, 40, 1, '15.00', 57),
(90, 40, 1, '21.00', 56),
(91, 41, 1, '15.00', 57),
(92, 42, 1, '15.00', 57),
(93, 43, 1, '15.00', 57),
(94, 44, 1, '15.00', 57),
(95, 45, 1, '15.00', 57),
(96, 46, 1, '15.00', 57),
(97, 47, 1, '15.00', 57),
(98, 48, 1, '15.00', 57),
(99, 49, 1, '15.00', 57),
(100, 50, 1, '87.50', 88),
(101, 51, 1, '15.00', 57),
(102, 52, 1, '21.00', 56),
(103, 53, 1, '11.80', 80),
(104, 53, 1, '12.30', 81),
(105, 53, 1, '8.90', 82),
(106, 53, 1, '11.80', 83),
(107, 53, 1, '13.30', 84);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cust_email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `psswd` varchar(200) NOT NULL,
  PRIMARY KEY (`cust_email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_email`, `name`, `contact`, `psswd`) VALUES
('dorispower@mail.com', 'Doris Power', '019898766', 'password'),
('kumingsun@mail.com', 'Kuming Sun', '019898766', 'password'),
('janeread@mail.com', 'Jane Read', '018788655', 'password'),
('aizensousuke464@gmail.com', 'aizen2905', '0132321314', 'password'),
('test@mail.com', 'test', '0192669580', 'password'),
('ayam@mail.com', 'kambing', '0123456789', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `del_stats`
--

DROP TABLE IF EXISTS `del_stats`;
CREATE TABLE IF NOT EXISTS `del_stats` (
  `stats_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`stats_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `del_stats`
--

INSERT INTO `del_stats` (`stats_id`, `description`) VALUES
(4, 'delivered'),
(3, 'on the way'),
(2, 'picking up'),
(1, 'preparing');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `type` varchar(200) NOT NULL,
  `food_img` varchar(200) NOT NULL,
  `ssm_reg` varchar(200) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `ssm_reg` (`ssm_reg`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_id`, `name`, `description`, `price`, `type`, `food_img`, `ssm_reg`) VALUES
(57, 'Double Cheeseburger', 'Double Cheeseburger', '15.00', '', '../../Uploads/Restaurant/mcd@mail.com/Menu/57.jpg', '190876'),
(78, 'Chicken Macaroni and Cheese', 'Don\'t sue us when the real dish doesn\'t look like that', '21.00', '', '../../Uploads/Restaurant/krr@mail.com/Menu/78.jpg', '190878'),
(56, 'Quarter Pounder', 'Quarter Pounder with Cheese', '21.00', '', '../../Uploads/Restaurant/mcd@mail.com/Menu/56.jpg', '190876'),
(44, 'Kenny\'s Family Meal', 'The truth is, you\'re eating this alone right?', '128.00', '', '../../Uploads/Restaurant/krr@mail.com/Menu/44.png', '190878'),
(77, 'Kenny\'s Quarter Meal', 'Cause you\'re forever alone, we know.', '28.00', '', '../../Uploads/Restaurant/krr@mail.com/Menu/77.jpg', '190878'),
(76, 'Kenny\'s Half Meal', 'Cause Quarter is for kids and you\'re a man', '52.00', '', '../../Uploads/Restaurant/krr@mail.com/Menu/76.jpg', '190878'),
(88, 'The All Protein Burger', 'You\'ll never find 1kg of protein in a burger', '87.50', '', '../../Uploads/Restaurant/zach@mail.com/Menu/88.jpg', '699420'),
(49, 'The Double Whopper', 'Biggest beef burger on the planet.', '25.00', '', '../../Uploads/Restaurant/burgerking@mail.com/Menu/49.png', '109897'),
(87, 'BK Bacon Cheese Burger', 'JB said Yumyyyy yumm yummyyy yumm', '22.00', '', '../../Uploads/Restaurant/burgerking@mail.com/Menu/87.png', '109897'),
(86, 'BK Mushroom Swiss', 'shroomz', '15.00', '', '../../Uploads/Restaurant/burgerking@mail.com/Menu/86.png', '109897'),
(66, 'CHICKEN CONFIDENTIAL', 'mipan zuzuzu', '65.00', '', '../../Uploads/Restaurant/dominos@mail.com/Menu/66.jpg', '0419060A'),
(58, 'Spicy Chicken McDeluxe™', 'Spicy Chicken', '18.00', '', '../../Uploads/Restaurant/mcd@mail.com/Menu/58.jpg', '190876'),
(55, 'Big Mac™', 'for dem fatt bois', '18.00', '', '../../Uploads/Restaurant/mcd@mail.com/Menu/55.jpg', '190876'),
(64, 'Filet-O-Fish™', 'too skinny for fries too fat for big mac', '9.00', '', '../../Uploads/Restaurant/mcd@mail.com/Menu/64.jpg', '190876'),
(65, 'Chicken McNuggets®', 'coddamnit elizabeth\r\n20pcs please\r\nthis is Murica', '9.99', '', '../../Uploads/Restaurant/mcd@mail.com/Menu/65.jpg', '190876'),
(59, 'GCB - Grilled Chicken Burger', 'A delicious grilled chicken thigh', '20.00', '', '../../Uploads/Restaurant/mcd@mail.com/Menu/59.jpg', '190876'),
(60, 'Ayam Goreng McD™', 'Juicy and tasty! (regular/spicy)', '18.00', '', '../../Uploads/Restaurant/mcd@mail.com/Menu/60.jpg', '190876'),
(61, 'Nasi Lemak Rendang', 'Nasi Lemak McD™ + Rendang Ayam Crispy', '15.00', '', '../../Uploads/Restaurant/mcd@mail.com/Menu/61.png', '190876'),
(62, 'Nasi Lemak Cutlet', 'Nasi Lemak McD™ + Spicy Chicken McDeluxe Cutlet', '16.00', '', '../../Uploads/Restaurant/mcd@mail.com/Menu/62.png', '190876'),
(63, 'Sweet Chilli Fish Burger', 'Sweet Chilli Fish Burger', '11.00', '', '../../Uploads/Restaurant/mcd@mail.com/Menu/63.jpg', '190876'),
(67, 'MEATASAURUS', 'ashkashkush nyum nyum nyum', '65.00', '', '../../Uploads/Restaurant/dominos@mail.com/Menu/67.jpg', '0419060A'),
(68, 'ULTIMATE HAWAIIAN', 'to like or not to like?', '65.00', '', '../../Uploads/Restaurant/dominos@mail.com/Menu/68.jpg', '0419060A'),
(69, 'PAPARONNY', 'ronny ronny yes papa', '65.00', '', '../../Uploads/Restaurant/dominos@mail.com/Menu/69.jpg', '0419060A'),
(70, 'MEAT MANIA', 'carnivor..u nasty', '65.00', '', '../../Uploads/Restaurant/dominos@mail.com/Menu/70.jpg', '0419060A'),
(72, '2-PC COMBO', '2 pieces of chicken, coleslaw, whipped potato, drink', '16.90', '', '../../Uploads/Restaurant/kfc@mail.com/Menu/72.png', '0010237H'),
(73, '6-PC CRISPY TENDERS', '6 pieces of Crispy Tenders, dip.', '14.20', '', '../../Uploads/Restaurant/kfc@mail.com/Menu/73.png', '0010237H'),
(74, 'ZINGER CHEEZY COMBO', 'Zinger Cheezy, potato wedges, drink', '15.80', '', '../../Uploads/Restaurant/kfc@mail.com/Menu/74.png', '0010237H'),
(75, '3-PC COMBO', '3 pieces of chicken, coleslaw, whipped potato, drink.', '20.20', '', '../../Uploads/Restaurant/kfc@mail.com/Menu/75.png', '0010237H'),
(79, 'Roasted Chicken Salad', 'Erm.. hit the gym yet?', '22.00', '', '../../Uploads/Restaurant/krr@mail.com/Menu/79.jpg', '190878'),
(80, 'Tower Burger™', 'Our Signature Tower Burger™.', '11.80', '', '../../Uploads/Restaurant/mbcare@marrybrown.com/Menu/80.jpeg', '0166331X'),
(81, 'Lucky Plate™', 'Hand-breaded 2 pieces of MB Crispy Chicken™', '12.30', '', '../../Uploads/Restaurant/mbcare@marrybrown.com/Menu/81.jpeg', '0166331X'),
(82, 'Nasi Lemak MB™', 'The ever popular Nasi Lemak MB™!', '8.90', '', '../../Uploads/Restaurant/mbcare@marrybrown.com/Menu/82.png', '0166331X'),
(83, 'Nasi Kandar MB', 'Dig into our well-loved Malaysian dish – Nasi Kandar', '11.80', '', '../../Uploads/Restaurant/mbcare@marrybrown.com/Menu/83.png', '0166331X'),
(84, 'Fish ‘n’ Chips', 'Crispy, golden breaded 100% ocean fresh Alaska Pollock', '13.30', '', '../../Uploads/Restaurant/mbcare@marrybrown.com/Menu/84.png', '0166331X'),
(85, 'Nasi Kukus Ayam Goreng Berempah', 'Resepi tradisi', '6.00', '', '../../Uploads/Restaurant/ilham@mail.com/Menu/85.jpg', '18517975');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `description`) VALUES
(1, 'card'),
(2, 'online banking'),
(3, 'e-wallet'),
(4, 'QR pay');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `ssm_reg` varchar(200) NOT NULL,
  `rest_name` varchar(200) NOT NULL,
  `co_name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `rest_email` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `psswd` varchar(200) NOT NULL,
  `ssm_copy` varchar(200) NOT NULL,
  `rest_img` varchar(200) NOT NULL,
  PRIMARY KEY (`ssm_reg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`ssm_reg`, `rest_name`, `co_name`, `description`, `rest_email`, `contact`, `address`, `psswd`, `ssm_copy`, `rest_img`) VALUES
('190876', 'Mc Donald\'s', 'Golden Arches Restaurants', 'I\'m lovin it', 'mcd@mail.com', '039878678', 'Kepong', 'password', '../../Uploads/Restaurant/mcd@mail.com/Profile/ssm_img.png', '../../Uploads/Restaurant/mcd@mail.com/Profile/res_img.jpg'),
('190878', 'Kenny Rogers Roasters', 'Berjaya Group', 'Less salt, less fat, less calories.', 'krr@mail.com', '038987677', 'Batu', 'password', '../../Uploads/Restaurant/krr@mail.com/Profile/ssm_img.png', '../../Uploads/Restaurant/krr@mail.com/Profile/res_img.png'),
('109897', 'Burger King', 'Burger King Corporation', 'The best burgers in town.', 'burgerking@mail.com', '0378667899', 'Titiwangsa', 'password', '../../Uploads/Restaurant/burgerking@mail.com/Profile/ssm_img.png', '../../Uploads/Restaurant/burgerking@mail.com/Profile/res_img.jpg'),
('0419060A', 'Dominos Pizza', 'DOMMAL FOOD SERVICES SDN. BHD.', 'It\'s what we do', 'dominos@mail.com', '130-088-8333', 'kepong', 'password', '../../Uploads/Restaurant/dominos@mail.com/Profile/ssm_img.jpg', '../../Uploads/Restaurant/dominos@mail.com/Profile/res_img.jpg'),
('0010237H', 'KFC', 'KENTUCKY FRIED CHICKEN (MALAYSIA) SENDIRIAN BERHAD', 'Finger Lickin Good', 'kfc@mail.com', '1300-222-888', 'kepong', 'password', '../../Uploads/Restaurant/aizensousuke464@gmail.com/Profile/ssm_img.jpg', '../../Uploads/Restaurant/kfc@mail.com/Profile/res_img.jpg'),
('0166331X', 'Marrybrown', 'MARRYBROWN SDN. BHD.', 'Marrybrown® is World Largest HALAL Quick Service Restaurant chains.', 'mbcare@marrybrown.com', '1-300-22-0300', 'batu', 'password', '../../Uploads/Restaurant/mbcare@marrybrown.com/Profile/ssm_img.jpg', '../../Uploads/Restaurant/mbcare@marrybrown.com/Profile/res_img.jpg'),
('18517975', 'Nasi Kukus Ilham', 'ilham food sdn bhd', 'Nasi kukus ayam berempah', 'ilham@mail.com', '012339580', 'batu', 'password', '../../Uploads/Restaurant/ilham@mail.com/Profile/ssm_img.jpg', '../../Uploads/Restaurant/ilham@mail.com/Profile/res_img.jpg'),
('699420', 'Restoran Zach', 'Zach Catering', 'The most sado food in town', 'zach@mail.com', '0189900987', 'Klang', 'password', '../../Uploads/Restaurant/zach@mail.com/Profile/ssm_img.jpg', '../../Uploads/Restaurant/zach@mail.com/Profile/res_img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

DROP TABLE IF EXISTS `rider`;
CREATE TABLE IF NOT EXISTS `rider` (
  `rid_email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `psswd` varchar(200) NOT NULL,
  `face_id` varchar(200) NOT NULL,
  `license` varchar(200) NOT NULL,
  `ic_copy` varchar(200) NOT NULL,
  PRIMARY KEY (`rid_email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`rid_email`, `name`, `contact`, `address`, `psswd`, `face_id`, `license`, `ic_copy`) VALUES
('jstat@mail.com', 'Jason Statham', '019897899', 'Kepong', 'password ', '../../Uploads/Rider/jstat@mail.com/Profile/selfie.png', '../../Uploads/Rider/jstat@mail.com/Profile/license.png', '../../Uploads/Rider/jstat@mail.com/Profile/ic.png'),
('tomholland@mail.com', 'Tom Holland', '0198976788', 'Batu', 'password', '../../Uploads/Rider/tomholland@mail.com/Profile/selfie.png', '../../Uploads/Rider/tomholland@mail.com/Profile/license.png', '../../Uploads/Rider/tomholland@mail.com/Profile/ic.png'),
('tony@mail.com', 'Tony Stuck', '019890987', 'Titiwangsa', 'password', '../../Uploads/Rider/tony@mail.com/Profile/selfie.png', '../../Uploads/Rider/tony@mail.com/Profile/license.png', '../../Uploads/Rider/tony@mail.com/Profile/ic.png');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

DROP TABLE IF EXISTS `tracking`;
CREATE TABLE IF NOT EXISTS `tracking` (
  `track_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) DEFAULT NULL,
  `stats_id` int(11) DEFAULT NULL,
  `rid_email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`track_id`),
  KEY `cart_id` (`cart_id`),
  KEY `stats_id` (`stats_id`),
  KEY `rid_email` (`rid_email`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`track_id`, `cart_id`, `stats_id`, `rid_email`) VALUES
(7, 24, 1, NULL),
(8, 25, 1, NULL),
(9, 26, 1, NULL),
(10, 27, 1, NULL),
(11, 28, 1, NULL),
(12, 29, 1, NULL),
(13, 30, 1, NULL),
(14, 31, 1, NULL),
(15, 32, 1, NULL),
(16, 33, 1, NULL),
(17, 34, 1, NULL),
(18, 35, 1, NULL),
(19, 36, 1, NULL),
(20, 37, 1, NULL),
(21, 38, 1, NULL),
(22, 39, 1, NULL),
(23, 40, 1, NULL),
(24, 41, 1, NULL),
(25, 42, 4, NULL),
(26, 43, 4, NULL),
(27, 44, 4, NULL),
(28, 45, 4, NULL),
(29, 46, 4, NULL),
(30, 47, 4, NULL),
(31, 48, 4, NULL),
(32, 49, 4, NULL),
(33, 50, 4, NULL),
(34, 51, 4, NULL),
(35, 52, 4, NULL),
(36, 53, 4, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
