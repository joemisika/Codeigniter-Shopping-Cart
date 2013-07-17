-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 18, 2013 at 12:00 AM
-- Server version: 5.5.31
-- PHP Version: 5.3.10-1ubuntu3.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `advertiser`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `urlid` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  `moddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `urlid`, `parent_id`, `createdate`, `moddate`) VALUES
(2, 'Section 2', 'section-2', 0, '2012-02-17 15:21:48', '2012-02-17 15:21:51'),
(4, 'Testing two', 'testing-two', 1, '2012-05-24 11:02:17', '2012-05-24 11:02:17'),
(5, 'Testing this teb2', 'testing-this-teb2', 2, '2012-05-24 11:21:54', '2012-05-24 11:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) NOT NULL,
  `vatno` varchar(255) NOT NULL,
  `title` varchar(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cellphone` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `billingaddress` text NOT NULL,
  `billingcode` varchar(6) NOT NULL,
  `deliveryaddress` text NOT NULL,
  `deliverycode` varchar(6) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `createdate` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  `approved` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `company`, `vatno`, `title`, `firstname`, `lastname`, `email`, `username`, `password`, `cellphone`, `telephone`, `billingaddress`, `billingcode`, `deliveryaddress`, `deliverycode`, `city`, `province`, `country`, `createdate`, `lastlogin`, `approved`) VALUES
(1, '', '', '0', 'test2', 'Trigger', 'test@marko.com', 'Trudy-Lee', 'tdffg', 'test', 'test', 'test', 'test', 'test', 'test', 'test', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, '', '', '0', 'test2', 'Trigger', 'test@marko.com', 'Trudy-Lee', 'tdffg', 'test', 'test', 'test', 'test', 'test', 'test', 'test', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, '', '', '0', 'test2', 'Trigger', 'test@marko.com', 'Trudy-Lee', 'tdffg', 'test', 'test', 'test', 'test', 'test', 'test', 'test', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, '', '', 'Mr', 'Test2', 'Test2', 'Test2', 'Test2', 'Test2', 'Test2', 'Test2', 'Test2', 'Test2', 'Test2', 'Test2', 'Test2', 'Eastern Cape', 'South Africa', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, '', '', 'Mr', 'test2', 'Trigger', 'test@marko.com', 'Trudy-Lee', 'tdffg', '', 'test', 'test', 'test', 'test', 'test', 'test', 'Gauteng', 'Botswana', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 'TheCompany', '0123847756/F56', 'Mr', 'Testuser', 'Testuser', 'joe@joemisika.com', 'testuser', 'testuser', '0117657787', '0123456434', 'testuser', '2134', 'testuser', '2134', 'testuser', '0', 'testuser', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, '', '', 'Ms', 'Trigger', 'Test', 'Gauteng', 'estee_lauder', 'test', '0117657787', '0123456434', 'test', '0987', 'test', '0987', 'Joburg', 'Gauteng', 'South Africa', '2012-03-24 20:49:21', '0000-00-00 00:00:00', 0),
(8, '', '', 'Mr', 'testing ', 'test', 'test@marko.com', '0', 'test', '0112507456', '0847767456', 'test', '2134', '0', '0', 'test', 'Eastern Cape', 'South Africa', '2012-03-28 13:16:58', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `order_ref` varchar(20) NOT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `total` varchar(20) NOT NULL,
  `vat_total` varchar(20) NOT NULL,
  `grand_total` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_ref`, `order_status`, `created_at`, `updated_at`, `total`, `vat_total`, `grand_total`) VALUES
(1, 6, '', 'Order placed successfully', '2012-03-22 13:38:08', '2012-03-22 13:38:08', '', '0', '0'),
(2, 6, '', 'Order placed successfully', '2012-03-22 13:38:30', '2012-03-22 13:38:30', '', '0', '0'),
(3, 6, '', 'Order placed successfully', '2012-03-22 13:38:45', '2012-03-22 13:38:45', '', '0', '0'),
(4, 6, '', 'Order placed successfully', '2012-03-22 13:39:26', '2012-03-22 13:39:26', '', '0', '0'),
(5, 6, '', 'Order placed successfully', '2012-03-22 13:39:29', '2012-03-22 13:39:29', '', '0', '0'),
(6, 6, '', 'Order placed successfully', '2012-03-22 13:39:58', '2012-03-22 13:39:58', '', '0', '0'),
(7, 6, '', 'Order placed successfully', '2012-03-22 13:43:14', '2012-03-22 13:43:14', '', '0', '0'),
(8, 6, '', 'Order placed successfully', '2012-03-22 13:43:56', '2012-03-22 13:43:56', '', '0', '0'),
(9, 6, '', 'Order placed successfully', '2012-03-22 14:19:35', '2012-03-22 14:19:35', '', '0', '0'),
(10, 6, '', 'Order placed successfully', '2012-03-22 14:19:37', '2012-03-22 14:19:37', '', '0', '0'),
(11, 6, '', 'Order placed successfully', '2012-03-22 14:19:47', '2012-03-22 14:19:47', '', '0', '0'),
(12, 6, '', 'Order placed successfully', '2012-03-22 15:09:47', '2012-03-22 15:09:47', '', '0', '0'),
(13, 6, '', 'Order placed successfully', '2012-03-22 15:10:05', '2012-03-22 15:10:05', '', '0', '0'),
(14, 6, '', 'Order placed successfully', '2012-03-22 15:36:03', '2012-03-22 15:36:03', '', '0', '0'),
(15, 6, '', 'Order placed successfully', '2012-03-22 16:38:57', '2012-03-22 16:38:57', '', '0', '0'),
(16, 6, '', 'Order placed successfully', '2012-03-22 16:39:17', '2012-03-22 16:39:17', '', '0', '0'),
(17, 6, '', 'Order placed successfully', '2012-03-22 16:39:20', '2012-03-22 16:39:20', '', '0', '0'),
(18, 6, '', 'Order placed successfully', '2012-03-22 16:40:16', '2012-03-22 16:40:16', '', '0', '0'),
(19, 6, '', 'Order placed successfully', '2012-03-22 16:41:56', '2012-03-22 16:41:56', '', '0', '0'),
(20, 6, '', 'Order placed successfully', '2012-03-22 16:42:09', '2012-03-22 16:42:09', '', '0', '0'),
(21, 6, '', 'Order placed successfully', '2012-03-22 16:43:47', '2012-03-22 16:43:47', '', '0', '0'),
(22, 6, '', 'Order placed successfully', '2012-03-22 16:43:50', '2012-03-22 16:43:50', '', '0', '0'),
(23, 6, '', 'Order placed successfully', '2012-03-22 16:44:04', '2012-03-22 16:44:04', '', '0', '0'),
(24, 6, '', 'Order placed successfully', '2012-03-22 16:44:54', '2012-03-22 16:44:54', '', '0', '0'),
(25, 6, '', 'Order placed successfully', '2012-03-22 16:49:30', '2012-03-22 16:49:30', '', '0', '0'),
(26, 6, '', 'Order placed successfully', '2012-03-22 16:58:09', '2012-03-22 16:58:09', '', '0', '0'),
(27, 6, '', 'Order placed successfully', '2012-03-22 16:58:32', '2012-03-22 16:58:32', '', '0', '0'),
(28, 6, '', 'Order placed successfully', '2012-03-22 16:59:26', '2012-03-22 16:59:26', '', '0', '0'),
(29, 6, '', 'Order placed successfully', '2012-03-22 16:59:51', '2012-03-22 16:59:51', '', '0', '0'),
(30, 6, '', 'Order placed successfully', '2012-03-22 17:01:48', '2012-03-22 17:01:48', '', '0', '0'),
(31, 6, '', 'Order placed successfully', '2012-03-22 17:05:29', '2012-03-22 17:05:29', '', '0', '0'),
(32, 6, '', 'Order placed successfully', '2012-03-22 17:09:06', '2012-03-22 17:09:06', '', '0', '0'),
(33, 6, '', 'Order placed successfully', '2012-03-22 17:10:24', '2012-03-22 17:10:24', '', '0', '0'),
(34, 6, '', 'Order placed successfully', '2012-03-22 17:12:07', '2012-03-22 17:12:07', '', '0', '0'),
(35, 6, '', 'Order placed successfully', '2012-03-22 17:12:37', '2012-03-22 17:12:37', '', '0', '0'),
(36, 6, '', 'Order placed successfully', '2012-03-22 17:13:34', '2012-03-22 17:13:34', '', '0', '0'),
(37, 6, '', 'Order placed successfully', '2012-03-22 17:18:08', '2012-03-22 17:18:08', '', '0', '0'),
(38, 6, '', 'Order placed successfully', '2012-03-23 19:46:29', '2012-03-23 19:46:29', '', '0', '0'),
(39, 6, '', 'Order placed successfully', '2012-03-28 18:09:01', '2012-03-28 18:09:01', '', '0', '0'),
(40, 6, '', 'Order placed successfully', '2012-03-28 20:10:06', '2012-03-28 20:10:06', '', '0', '0'),
(41, 6, '', 'Order placed successfully', '2012-03-28 20:11:30', '2012-03-28 20:11:30', '', '0', '0'),
(42, 6, '', 'Order placed successfully', '2012-03-28 20:11:36', '2012-03-28 20:11:36', '', '0', '0'),
(43, 6, '', 'Order placed successfully', '2012-03-28 20:24:01', '2012-03-28 20:24:01', '', '0', '0'),
(44, 6, '', 'Order placed successfully', '2012-03-28 20:27:23', '2012-03-28 20:27:23', '', '0', '0'),
(45, 6, '', 'Order placed successfully', '2012-03-28 20:49:33', '2012-03-28 20:49:33', '', '0', '0'),
(46, 6, '', 'Order placed successfully', '2012-03-28 20:50:46', '2012-03-28 20:50:46', '', '0', '0'),
(47, 6, '', 'Order placed successfully', '2012-03-28 20:54:09', '2012-03-28 20:54:09', '', '0', '0'),
(48, 6, '', 'Order placed successfully', '2012-03-28 20:54:55', '2012-03-28 20:54:55', '', '0', '0'),
(49, 6, '', 'Order placed successfully', '2012-03-28 20:55:36', '2012-03-28 20:55:36', '', '0', '0'),
(50, 6, '', 'Order placed successfully', '2012-03-29 09:05:40', '2012-03-29 09:05:40', '', '0', '0'),
(51, 6, '', 'Order placed successfully', '2012-04-03 12:54:22', '2012-04-03 12:54:22', '', '10.63', '75.96'),
(52, 6, '', 'Order placed successfully', '2012-04-03 13:00:05', '2012-04-03 13:00:05', '75.96', '10.63', '86.59'),
(53, 6, 'TESTES6-000053', 'Order placed successfully', '2012-04-03 15:27:26', '2012-04-03 13:01:19', '75.96', '10.63', '86.59'),
(54, 6, 'TESTES6-000054', 'Order placed successfully', '2012-04-03 16:05:34', '2012-04-03 16:05:34', '36.99', '5.18', '42.17'),
(55, 6, 'TESTES6-000055', 'Order placed successfully', '2012-05-10 11:05:54', '2012-05-10 11:05:54', '72.00', '10.08', '82.08');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `quantity` tinyint(5) NOT NULL,
  `price` varchar(20) NOT NULL,
  `subtotal` varchar(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `code`, `quantity`, `price`, `subtotal`, `date_created`, `date_updated`) VALUES
(1, 1, 1, '01009839', 1, '9.00', '9', '2012-03-22 13:38:09', '2012-03-22 13:38:09'),
(2, 2, 1, '01009839', 1, '9.00', '9', '2012-03-22 13:38:30', '2012-03-22 13:38:30'),
(3, 3, 1, '01009839', 1, '9.00', '9', '2012-03-22 13:38:45', '2012-03-22 13:38:45'),
(4, 4, 1, '01009839', 1, '9.00', '9', '2012-03-22 13:39:26', '2012-03-22 13:39:26'),
(5, 5, 1, '01009839', 1, '9.00', '9', '2012-03-22 13:39:29', '2012-03-22 13:39:29'),
(6, 6, 1, '01009839', 1, '9.00', '9', '2012-03-22 13:39:58', '2012-03-22 13:39:58'),
(7, 7, 1, '01009839', 1, '9.00', '9', '2012-03-22 13:43:14', '2012-03-22 13:43:14'),
(8, 8, 1, '01009839', 1, '9.00', '9', '2012-03-22 13:43:56', '2012-03-22 13:43:56'),
(9, 9, 1, '01009839', 1, '9.00', '9', '2012-03-22 14:19:35', '2012-03-22 14:19:35'),
(10, 10, 1, '01009839', 1, '9.00', '9', '2012-03-22 14:19:37', '2012-03-22 14:19:37'),
(11, 11, 1, '01009839', 1, '9.00', '9', '2012-03-22 14:19:47', '2012-03-22 14:19:47'),
(12, 12, 1, '01009839', 1, '9.00', '9', '2012-03-22 15:09:47', '2012-03-22 15:09:47'),
(13, 13, 1, '01009839', 1, '9.00', '9', '2012-03-22 15:10:05', '2012-03-22 15:10:05'),
(14, 14, 1, '01009839', 1, '9.00', '9', '2012-03-22 15:36:03', '2012-03-22 15:36:03'),
(15, 15, 1, '01009839', 1, '9.00', '9', '2012-03-22 16:38:57', '2012-03-22 16:38:57'),
(16, 16, 1, '01009839', 1, '9.00', '9', '2012-03-22 16:39:17', '2012-03-22 16:39:17'),
(17, 17, 1, '01009839', 1, '9.00', '9', '2012-03-22 16:39:20', '2012-03-22 16:39:20'),
(18, 18, 1, '01009839', 1, '9.00', '9', '2012-03-22 16:40:16', '2012-03-22 16:40:16'),
(19, 19, 1, '01009839', 1, '9.00', '9', '2012-03-22 16:41:56', '2012-03-22 16:41:56'),
(20, 20, 1, '01009839', 1, '9.00', '9', '2012-03-22 16:42:09', '2012-03-22 16:42:09'),
(21, 21, 1, '01009839', 1, '9.00', '9', '2012-03-22 16:43:47', '2012-03-22 16:43:47'),
(22, 22, 1, '01009839', 1, '9.00', '9', '2012-03-22 16:43:50', '2012-03-22 16:43:50'),
(23, 23, 1, '01009839', 1, '9.00', '9', '2012-03-22 16:44:04', '2012-03-22 16:44:04'),
(24, 24, 1, '01009839', 1, '9.00', '9', '2012-03-22 16:44:54', '2012-03-22 16:44:54'),
(25, 25, 1, '01009839', 1, '9.00', '9', '2012-03-22 16:49:30', '2012-03-22 16:49:30'),
(26, 26, 1, '01009839', 1, '9.00', '9', '2012-03-22 16:58:09', '2012-03-22 16:58:09'),
(27, 27, 1, '01009839', 1, '9.00', '9', '2012-03-22 16:58:32', '2012-03-22 16:58:32'),
(28, 28, 1, '01009839', 1, '9.00', '9', '2012-03-22 16:59:26', '2012-03-22 16:59:26'),
(29, 29, 1, '01009839', 1, '9.00', '9', '2012-03-22 16:59:51', '2012-03-22 16:59:51'),
(30, 30, 1, '01009839', 1, '9.00', '9', '2012-03-22 17:01:48', '2012-03-22 17:01:48'),
(31, 36, 1, '01009839', 3, '9.00', '27', '2012-03-22 17:13:34', '2012-03-22 17:13:34'),
(32, 38, 1, '01009839', 1, '9.00', '9', '2012-03-23 19:46:29', '2012-03-23 19:46:29'),
(33, 39, 1, '01009839', 6, '9.00', '54', '2012-03-28 18:09:01', '2012-03-28 18:09:01'),
(34, 40, 1, '01009839', 1, '9.00', '9', '2012-03-28 20:10:06', '2012-03-28 20:10:06'),
(35, 43, 1, '01009839', 1, '9.00', '9', '2012-03-28 20:24:01', '2012-03-28 20:24:01'),
(36, 44, 1, '01009839', 6, '9.00', '54', '2012-03-28 20:27:23', '2012-03-28 20:27:23'),
(37, 44, 1, '01009839', 5, '9.00', '45', '2012-03-28 20:27:23', '2012-03-28 20:27:23'),
(38, 50, 1, '01009839', 3, '9.00', '27', '2012-03-29 09:05:40', '2012-03-29 09:05:40'),
(39, 51, 24, '0948847', 4, '18.99', '75.96', '2012-04-03 12:54:22', '2012-04-03 12:54:22'),
(40, 52, 24, '0948847', 4, '18.99', '75.96', '2012-04-03 13:00:05', '2012-04-03 13:00:05'),
(41, 53, 24, '0948847', 4, '18.99', '75.96', '2012-04-03 13:01:19', '2012-04-03 13:01:19'),
(42, 54, 2, '01009839', 2, '9.00', '18', '2012-04-03 16:05:34', '2012-04-03 16:05:34'),
(43, 54, 21, '09488474', 1, '18.99', '18.99', '2012-04-03 16:05:34', '2012-04-03 16:05:34'),
(44, 55, 2, '01009839', 5, '9.00', '45', '2012-05-10 11:05:54', '2012-05-10 11:05:54'),
(45, 55, 2, '01009839', 3, '9.00', '27', '2012-05-10 11:05:54', '2012-05-10 11:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urlid` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `createdate` datetime NOT NULL,
  `submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `urlid`, `title`, `body`, `createdate`, `submitted`) VALUES
(1, 'about-us', 'About Us', 'This is the about us page where we specify about us', '2012-03-13 21:12:34', '2012-03-13 21:13:06'),
(2, 'contact-us', 'Contact Us', 'this is the contact us page', '2012-03-13 21:13:02', '2012-03-13 21:13:06'),
(3, 'terms-of-service', 'Terms Of Service', 'this is the terms of service page us page', '2012-03-13 21:13:02', '2012-03-13 21:13:06'),
(4, 'new-page-test', 'New Page Test', 'As an added bonus, CodeIgniter permits your libraries to extend native classes if you simply need to add some functionality to an existing library. Or you can even replace native libraries just by placing identically named versions in your application/libraries folder.', '2012-04-02 16:52:27', '2012-04-02 16:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `urlid` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `mainimage` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `urlid`, `description`, `mainimage`, `thumbnail`, `price`, `category_id`, `edited`, `createdate`) VALUES
(2, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '01009839', 'Test', 'test', '', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '01009839', 'Test for two', 'test-for-two', '0', 'test_main.jpg', 'test_thumb.jpg', 'R9.00', 2, '2012-08-16 18:35:14', '2012-03-30 16:13:41'),
(21, '09488474', 'New Poster', 'new-poster', 'ou''ll notice we are using a form helper to create the opening form tag. File uploads require a multipart form', 'test_main.jpg', 'test_thumb.jpg', '18.99', 2, '2012-08-16 18:35:14', '2012-04-02 11:10:58'),
(22, '09847857', 'Test Test', 'test', 'The new poster', 'test_main.jpg', 'test_thumb.jpg', '10.99', 2, '2012-08-16 18:35:14', '2012-04-02 11:13:36'),
(23, '09847857', 'Test Test', 'test', 'The new poster', 'test_main.jpg', 'test_thumb.jpg', '10.99', 2, '2012-08-16 18:35:14', '2012-04-02 11:13:50'),
(24, '0948847', 'Name of Product', 'name-of-product', 'This is now working fine', 'test_main.jpg', 'test_thumb.jpg', '18.99', 2, '2012-08-16 18:35:14', '2012-04-02 14:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `createdate`) VALUES
(1, 'Joe', 'Misika', 'joe@joemisika.com', 'joe', 'joe1234', '2012-02-22 12:27:17'),
(8, 'Testuser', 'Test', 'test@test.com', 'testuser', 'testuser1234', '2012-08-16 18:31:57');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
