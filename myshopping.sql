-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 مايو 2016 الساعة 17:27
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myshopping`
--

-- --------------------------------------------------------

--
-- بنية الجدول `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_sess` char(50) NOT NULL,
  `cart_itemcode` varchar(20) NOT NULL,
  `cart_quantity` smallint(6) NOT NULL,
  `cart_item_name` varchar(100) DEFAULT NULL,
  `cart_price` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `cart`
--

INSERT INTO `cart` (`cart_sess`, `cart_itemcode`, `cart_quantity`, `cart_item_name`, `cart_price`) VALUES
('2e5vea8b23k5hh5upl5pln6nr7', 'ag2', 2, 'Ø§Ù„ØªÙˆØ±Ù…Ø§Ù„ÙŠÙ†', '1030.00'),
('2e5vea8b23k5hh5upl5pln6nr7', 'ag3', 1, 'Ø§Ù„Ù„Ø²ÙˆØ±Ø¯', '1030.00');

-- --------------------------------------------------------

--
-- بنية الجدول `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `email_address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `complete_name` varchar(50) DEFAULT NULL,
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `cellphone_no` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `customers`
--

INSERT INTO `customers` (`email_address`, `password`, `complete_name`, `address_line1`, `address_line2`, `city`, `state`, `zipcode`, `country`, `cellphone_no`) VALUES
('ahmed@hotmail.com', '*593CA673B80CC5435E03F5702D456C2CED9299FF', 'Ø£Ø­Ù…Ø¯ Ù‡ÙŠÙƒÙ„ Ø£Ø­Ù…Ø¯ Ø§Ù„Ø³Ù…ÙŠÙ†ÙŠ', 'ØµÙ†Ø¹Ø§Ø¡ - Ø§Ù„Ø­ØµØ¨Ø© ', 'ØµÙ†Ø¹Ø§Ø¡ - Ø§Ù„Ø­ØµØ¨Ø© Ù…Ø§Ø²Ø¯Ø§', 'ØµÙ†Ø¹Ø§Ø¡', 'Ø°ÙƒØ±', '00967', 'Ø§Ù„ÙŠÙ…Ù†', '771770434');

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_no` int(6) NOT NULL AUTO_INCREMENT,
  `order_date` date DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `shipping_address_line1` varchar(255) DEFAULT NULL,
  `shipping_address_line2` varchar(255) DEFAULT NULL,
  `shipping_city` varchar(50) DEFAULT NULL,
  `shipping_state` varchar(50) DEFAULT NULL,
  `shipping_country` varchar(50) DEFAULT NULL,
  `shipping_zipcode` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`order_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- بنية الجدول `orders_details`
--

CREATE TABLE IF NOT EXISTS `orders_details` (
  `order_no` int(6) NOT NULL,
  `item_code` varchar(20) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `price` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- بنية الجدول `payment_details`
--

CREATE TABLE IF NOT EXISTS `payment_details` (
  `order_no` int(6) NOT NULL,
  `order_date` date DEFAULT NULL,
  `amount_paid` decimal(7,2) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `payment_type` varchar(20) DEFAULT NULL,
  `name_on_card` varchar(30) DEFAULT NULL,
  `card_number` varchar(20) DEFAULT NULL,
  `expiration_date` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- بنية الجدول `productfeatures`
--

CREATE TABLE IF NOT EXISTS `productfeatures` (
  `item_code` varchar(20) NOT NULL,
  `feature1` varchar(255) DEFAULT NULL,
  `feature2` varchar(255) DEFAULT NULL,
  `feature3` varchar(255) DEFAULT NULL,
  `feature4` varchar(255) DEFAULT NULL,
  `feature5` varchar(255) DEFAULT NULL,
  `feature6` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `productfeatures`
--

INSERT INTO `productfeatures` (`item_code`, `feature1`, `feature2`, `feature3`, `feature4`, `feature5`, `feature6`) VALUES
('ag1', 'Ø§Ù† Ù‡Ø°Ø§ Ø§Ù„ØµÙ†Ù Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ù‡Ùˆ Ù…Ù† Ø§Ø¬ÙˆØ¯ Ø§Ù†ÙˆØ§Ø¹ Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ ', 'ÙˆÙŠØ¹ØªØ¨Ø±Ù‡ Ø§Ù„ÙƒØ«ÙŠØ± Ø§Ù†Ù‡ Ù…Ù† Ø¹Ø§Ø¦Ù„Ø© Ø§Ù„Ù…Ø§Ø³ ', ' ÙŠØ¹ØªØ¨Ø± Ù‡Ø°Ø§ Ø§Ù„Ù†ÙˆØ¹ Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ Ø§Ù„Ù†Ø§Ø¯Ø± Ø¹Ù„Ù‰ Ù…Ø± Ø§Ù„ØªØ§Ø±ÙŠØ® ', '', '', ''),
('ag2', 'Ø§Ù† Ù‡Ø°Ø§ Ø§Ù„ØµÙ†Ù Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ù‡Ùˆ Ù…Ù† Ø§Ø¬ÙˆØ¯ Ø§Ù†ÙˆØ§Ø¹ Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ ', 'ÙˆÙŠØ¹ØªØ¨Ø±Ù‡ Ø§Ù„ÙƒØ«ÙŠØ± Ø§Ù†Ù‡ Ù…Ù† Ø¹Ø§Ø¦Ù„Ø© Ø§Ù„Ù…Ø§Ø³ ', ' ÙŠØ¹ØªØ¨Ø± Ù‡Ø°Ø§ Ø§Ù„Ù†ÙˆØ¹ Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ Ø§Ù„Ù†Ø§Ø¯Ø± Ø¹Ù„Ù‰ Ù…Ø± Ø§Ù„ØªØ§Ø±ÙŠØ® ', '', '', ''),
('ag3', 'Ø§Ù† Ù‡Ø°Ø§ Ø§Ù„ØµÙ†Ù Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ù‡Ùˆ Ù…Ù† Ø§Ø¬ÙˆØ¯ Ø§Ù†ÙˆØ§Ø¹ Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ ', 'ÙˆÙŠØ¹ØªØ¨Ø±Ù‡ Ø§Ù„ÙƒØ«ÙŠØ± Ø§Ù†Ù‡ Ù…Ù† Ø¹Ø§Ø¦Ù„Ø© Ø§Ù„Ù…Ø§Ø³ ', ' ÙŠØ¹ØªØ¨Ø± Ù‡Ø°Ø§ Ø§Ù„Ù†ÙˆØ¹ Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ Ø§Ù„Ù†Ø§Ø¯Ø± Ø¹Ù„Ù‰ Ù…Ø± Ø§Ù„ØªØ§Ø±ÙŠØ® ', '', '', ''),
('ag4', 'Ø§Ù† Ù‡Ø°Ø§ Ø§Ù„ØµÙ†Ù Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ù‡Ùˆ Ù…Ù† Ø§Ø¬ÙˆØ¯ Ø§Ù†ÙˆØ§Ø¹ Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ ', 'ÙˆÙŠØ¹ØªØ¨Ø±Ù‡ Ø§Ù„ÙƒØ«ÙŠØ± Ø§Ù†Ù‡ Ù…Ù† Ø¹Ø§Ø¦Ù„Ø© Ø§Ù„Ù…Ø§Ø³ ', ' ÙŠØ¹ØªØ¨Ø± Ù‡Ø°Ø§ Ø§Ù„Ù†ÙˆØ¹ Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ Ø§Ù„Ù†Ø§Ø¯Ø± Ø¹Ù„Ù‰ Ù…Ø± Ø§Ù„ØªØ§Ø±ÙŠØ® ', '', '', ''),
('ag5', 'Ø§Ù† Ù‡Ø°Ø§ Ø§Ù„ØµÙ†Ù Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ù‡Ùˆ Ù…Ù† Ø§Ø¬ÙˆØ¯ Ø§Ù†ÙˆØ§Ø¹ Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ ', 'ÙˆÙŠØ¹ØªØ¨Ø±Ù‡ Ø§Ù„ÙƒØ«ÙŠØ± Ø§Ù†Ù‡ Ù…Ù† Ø¹Ø§Ø¦Ù„Ø© Ø§Ù„Ù…Ø§Ø³ ', ' ÙŠØ¹ØªØ¨Ø± Ù‡Ø°Ø§ Ø§Ù„Ù†ÙˆØ¹ Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ Ø§Ù„Ù†Ø§Ø¯Ø± Ø¹Ù„Ù‰ Ù…Ø± Ø§Ù„ØªØ§Ø±ÙŠØ® ', '', '', ''),
('ag6', 'Ø§Ù† Ù‡Ø°Ø§ Ø§Ù„ØµÙ†Ù Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ù‡Ùˆ Ù…Ù† Ø§Ø¬ÙˆØ¯ Ø§Ù†ÙˆØ§Ø¹ Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ ', 'ÙˆÙŠØ¹ØªØ¨Ø±Ù‡ Ø§Ù„ÙƒØ«ÙŠØ± Ø§Ù†Ù‡ Ù…Ù† Ø¹Ø§Ø¦Ù„Ø© Ø§Ù„Ù…Ø§Ø³ ', ' ÙŠØ¹ØªØ¨Ø± Ù‡Ø°Ø§ Ø§Ù„Ù†ÙˆØ¹ Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ Ø§Ù„Ù†Ø§Ø¯Ø± Ø¹Ù„Ù‰ Ù…Ø± Ø§Ù„ØªØ§Ø±ÙŠØ® ', '', '', ''),
('ag7', 'Ø§Ù† Ù‡Ø°Ø§ Ø§Ù„ØµÙ†Ù Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ù‡Ùˆ Ù…Ù† Ø§Ø¬ÙˆØ¯ Ø§Ù†ÙˆØ§Ø¹ Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ ', 'ÙˆÙŠØ¹ØªØ¨Ø±Ù‡ Ø§Ù„ÙƒØ«ÙŠØ± Ø§Ù†Ù‡ Ù…Ù† Ø¹Ø§Ø¦Ù„Ø© Ø§Ù„Ù…Ø§Ø³ ', ' ÙŠØ¹ØªØ¨Ø± Ù‡Ø°Ø§ Ø§Ù„Ù†ÙˆØ¹ Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ Ø§Ù„Ù†Ø§Ø¯Ø± Ø¹Ù„Ù‰ Ù…Ø± Ø§Ù„ØªØ§Ø±ÙŠØ® ', '', '', ''),
('ag8', 'Ø§Ù† Ù‡Ø°Ø§ Ø§Ù„ØµÙ†Ù Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ù‡Ùˆ Ù…Ù† Ø§Ø¬ÙˆØ¯ Ø§Ù†ÙˆØ§Ø¹ Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ ', 'ÙˆÙŠØ¹ØªØ¨Ø±Ù‡ Ø§Ù„ÙƒØ«ÙŠØ± Ø§Ù†Ù‡ Ù…Ù† Ø¹Ø§Ø¦Ù„Ø© Ø§Ù„Ù…Ø§Ø³ ', ' ÙŠØ¹ØªØ¨Ø± Ù‡Ø°Ø§ Ø§Ù„Ù†ÙˆØ¹ Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ Ø§Ù„Ù†Ø§Ø¯Ø± Ø¹Ù„Ù‰ Ù…Ø± Ø§Ù„ØªØ§Ø±ÙŠØ® ', '', '', ''),
('ag9', 'Ø§Ù† Ù‡Ø°Ø§ Ø§Ù„ØµÙ†Ù Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ù‡Ùˆ Ù…Ù† Ø§Ø¬ÙˆØ¯ Ø§Ù†ÙˆØ§Ø¹ Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ ', 'ÙˆÙŠØ¹ØªØ¨Ø±Ù‡ Ø§Ù„ÙƒØ«ÙŠØ± Ø§Ù†Ù‡ Ù…Ù† Ø¹Ø§Ø¦Ù„Ø© Ø§Ù„Ù…Ø§Ø³ ', ' ÙŠØ¹ØªØ¨Ø± Ù‡Ø°Ø§ Ø§Ù„Ù†ÙˆØ¹ Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ Ø§Ù„Ù†Ø§Ø¯Ø± Ø¹Ù„Ù‰ Ù…Ø± Ø§Ù„ØªØ§Ø±ÙŠØ® ', '', '', ''),
('ag10', 'Ø§Ù† Ù‡Ø°Ø§ Ø§Ù„ØµÙ†Ù Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ù‡Ùˆ Ù…Ù† Ø§Ø¬ÙˆØ¯ Ø§Ù†ÙˆØ§Ø¹ Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ ', 'ÙˆÙŠØ¹ØªØ¨Ø±Ù‡ Ø§Ù„ÙƒØ«ÙŠØ± Ø§Ù†Ù‡ Ù…Ù† Ø¹Ø§Ø¦Ù„Ø© Ø§Ù„Ù…Ø§Ø³ ', ' ÙŠØ¹ØªØ¨Ø± Ù‡Ø°Ø§ Ø§Ù„Ù†ÙˆØ¹ Ù…Ù† Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ù†ÙŠ Ø§Ù„Ù†Ø§Ø¯Ø± Ø¹Ù„Ù‰ Ù…Ø± Ø§Ù„ØªØ§Ø±ÙŠØ® ', '', '', '');

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `item_code` varchar(20) NOT NULL,
  `item_name` varchar(150) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `model_number` varchar(30) NOT NULL,
  `weight` varchar(20) DEFAULT NULL,
  `dimension` varchar(50) DEFAULT NULL,
  `description` text,
  `category` varchar(50) DEFAULT NULL,
  `quantity` smallint(6) NOT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `imagename` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`item_code`, `item_name`, `brand_name`, `model_number`, `weight`, `dimension`, `description`, `category`, `quantity`, `price`, `imagename`) VALUES
('ag1', 'Ø§Ù„Ø²Ø±ÙŠØ® Ø§Ù„Ø§Ø­Ù…Ø±', 'Ù…Ø§Ø³ÙŠ', 'Ø­1', '200 Ø¬Ø±Ø§Ù…', ' ', ' Ø§Ù„Ø²Ø±ÙŠØ® Ø§Ù„Ø§Ø­Ù…Ø± Ø§Ù„Ù…Ø§Ø³ÙŠ ', ' ', 1, '1000.00', 'img/hagig/pro/1.png'),
('ag2', 'Ø§Ù„ØªÙˆØ±Ù…Ø§Ù„ÙŠÙ†', 'Ù…Ø§Ø³ÙŠ', 'Ø­1', '200 Ø¬Ø±Ø§Ù…', ' ', '    Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ØªÙˆØ±Ù…Ø§Ù„ÙŠÙ† Ø§Ù„ÙŠÙ…Ù†ÙŠ', ' ', 1, '1030.00', 'img/hagig/pro/2.png'),
('ag3', 'Ø§Ù„Ù„Ø²ÙˆØ±Ø¯', 'Ù…Ø§Ø³ÙŠ', 'Ø­1', '240 Ø¬Ø±Ø§Ù…', ' ', '    Ø¹Ù‚ÙŠÙ‚ Ø§Ù„Ù„Ø²ÙˆØ±Ø¯ Ø§Ù„ÙŠÙ…Ù†ÙŠ', ' ', 1, '1030.00', 'img/hagig/pro/3.png'),
('ag4', 'Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„Ø§Ø­Ù…Ø±', 'Ù…Ø§Ø³ÙŠ', 'Ø­1', '240 Ø¬Ø±Ø§Ù…', ' ', '    Ø¹Ù‚ÙŠÙ‚ Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„Ø§Ø­Ù…Ø± Ø§Ù„ÙŠÙ…Ù†ÙŠ', ' ', 1, '1030.00', 'img/hagig/pro/4.png'),
('ag5', 'Ø¬ÙŠÙˆØ¯ Ø§Ù„Ù…Ø±Ùˆ Ø§Ù„ÙˆØ±Ø¯ÙŠ', 'Ù…Ù† Ø§Ù†ÙˆØ§Ø¹ Ø§Ù„Ù…Ø§Ø³', 'Ø­1', '240 Ø¬Ø±Ø§Ù…', ' ', '    Ø¹Ù‚ÙŠÙ‚ Ø¬ÙŠÙˆØ¯ Ø§Ù„Ù…Ø±Ùˆ Ø§Ù„ÙˆØ±Ø¯ÙŠ Ù„ÙŠÙ…Ù†ÙŠ', ' ', 1, '1020.00', 'img/hagig/pro/5.png'),
('ag6', 'Ø§Ù„Ø¨Ø²Ù…ÙˆØª', 'Ù…Ù† Ø§Ù†ÙˆØ§Ø¹ Ø§Ù„Ù…Ø§Ø³', 'Ø­1', '240 Ø¬Ø±Ø§Ù…', ' ', 'Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„Ø¨Ø²Ù…ÙˆØª Ø§Ù„ÙØ¶ÙŠ', ' ', 1, '1020.00', 'img/hagig/pro/6.png'),
('ag7', 'Ø§Ù„Ù…Ø­ÙŠØ· Ø¯Ø§Ø®Ù„ Ø§Ù„Ø¹Ù‚ÙŠÙ‚', 'Ù…Ø§Ø³ÙŠ ÙŠÙ…ÙŠÙ†ÙŠ', 'Ø­1', '240 Ø¬Ø±Ø§Ù…', ' ', ' Ø§Ù„Ù…Ø­ÙŠØ· Ø¯Ø§Ø®Ù„ Ø§Ù„Ø¹Ù‚ÙŠÙ‚Øª Ø§Ù„ÙØ¶ÙŠ', '', 1, '600.00', 'img/hagig/pro/7.png'),
('ag8', 'Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„Ø§Ø­ÙÙˆØ±ÙŠ', 'Ù…Ø§Ø³ÙŠ ÙŠÙ…ÙŠÙ†ÙŠ', 'Ø­1', '240 Ø¬Ø±Ø§Ù…', ' ', ' Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„Ø§Ø­ÙÙˆØ±ÙŠ Ù…Ù† Ø£Ø´Ù‡Ø± Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ø§Ù†ÙŠ ÙƒØ§Ù† ÙŠØ³ØªØ®Ø¯Ù…Ø© Ø§Ù„ÙŠÙ…Ù†ÙŠÙˆÙ† ÙƒØ³Ù„Ø¹Ø©', '', 1, '1100.00', 'img/hagig/pro/8.png'),
('ag9', 'Ø¹Ù‚ÙŠÙ‚ Ù†Ø§Ø± ØºØ±ÙˆØ¨ Ø§Ù„Ø´Ù…Ø³', 'Ù…Ø§Ø³ÙŠ ÙŠÙ…ÙŠÙ†ÙŠ', 'Ø­1', '240 Ø¬Ø±Ø§Ù…', ' ', ' Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„Ø§Ø­ÙÙˆØ±ÙŠ Ù…Ù† Ø£Ø´Ù‡Ø± Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„ÙŠÙ…Ø§Ù†ÙŠ ÙƒØ§Ù† ÙŠØ³ØªØ®Ø¯Ù…Ø©Ø¹Ù‚ÙŠÙ‚ Ù†Ø§Ø± ØºØ±ÙˆØ¨ Ø§Ù„Ø´Ù…Ø³   ', '', 1, '1600.00', 'img/hagig/pro/9.png'),
('ag10', 'Ù…Ø¬Ø±Ø© Ø¯Ø§Ø®Ù„ Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„Ø§Ø²Ø±Ù‚', ' Ù…Ø§Ø³ÙŠ Ø§Ø²Ø±Ù‚ Ù‚Ø¯ÙŠÙ…', 'Ø­1', '240 Ø¬Ø±Ø§Ù…', ' ', ' Ù…Ø¬Ø±Ø© Ø¯Ø§Ø®Ù„ Ø§Ù„Ø¹Ù‚ÙŠÙ‚ Ø§Ù„Ø§Ø²Ø±Ù‚  ', '', 1, '1600.00', 'img/hagig/pro/10.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
