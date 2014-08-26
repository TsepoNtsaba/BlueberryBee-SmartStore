-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2014 at 11:50 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spazadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost_price` decimal(10,0) NOT NULL,
  `selling_price` decimal(10,0) NOT NULL,
  `mark_up_amount` decimal(10,0) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brandname` varchar(150) NOT NULL,
  `unit_volume` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `product_name` varchar(150) DEFAULT NULL,
  `image_url` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `owner`, `quantity`, `cost_price`, `selling_price`, `mark_up_amount`, `category_id`, `brandname`, `unit_volume`, `description`, `product_name`, `image_url`) VALUES
(1, 2, 0, 123666321, 123666321, 0, 1, 'Coca Cola', '123123123', 'cooler', '123123123', NULL),
(2, 2, 123123123, 123666321, 123666321, 0, 1, 'Coca Cola', '123123123', 'cooler', '123123123', NULL),
(3, 2, 1000, 666, 6669, 6003, 2, 'Simba', '3 grams', 'cooler', 'Braai BBQ chips', NULL),
(4, 2, 120, 10, 16, 6, 1, 'Coca Cola', '2 liter', 'cooler', 'Coke', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store_details`
--

CREATE TABLE IF NOT EXISTS `store_details` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_user` int(11) NOT NULL,
  `store_name` varchar(100) NOT NULL,
  `store_address` varchar(100) NOT NULL,
  `store_city` varchar(100) NOT NULL,
  `store_zip` varchar(11) DEFAULT NULL,
  `store_phone` varchar(20) DEFAULT NULL,
  `store_email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`store_id`),
  KEY `store_user` (`store_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `store_details`
--

INSERT INTO `store_details` (`store_id`, `store_user`, `store_name`, `store_address`, `store_city`, `store_zip`, `store_phone`, `store_email`) VALUES
(2, 2, 'Wozani Supermarket', '9 Geluk Place Nellmapius', 'Pretoria', '0122', '0790788189', 'mp.mello5@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `user_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
  `user_account_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'user''s account type (basic, premium, etc)',
  `user_has_avatar` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has a local avatar, 0 if not',
  `user_rememberme_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s remember-me cookie token',
  `user_creation_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of user''s account',
  `user_last_login_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of user''s last login',
  `user_failed_logins` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s failed login attempts',
  `user_last_failed_login` int(10) DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
  `user_activation_hash` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s email verification hash string',
  `user_password_reset_hash` char(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password reset code',
  `user_password_reset_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the password reset request',
  `user_provider_type` text COLLATE utf8_unicode_ci,
  `user_facebook_uid` bigint(20) unsigned DEFAULT NULL COMMENT 'optional - facebook UID',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`),
  KEY `user_facebook_uid` (`user_facebook_uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`, `user_active`, `user_account_type`, `user_has_avatar`, `user_rememberme_token`, `user_creation_timestamp`, `user_last_login_timestamp`, `user_failed_logins`, `user_last_failed_login`, `user_activation_hash`, `user_password_reset_hash`, `user_password_reset_timestamp`, `user_provider_type`, `user_facebook_uid`) VALUES
(2, 'admin', '$2y$10$hlJLX2ut8bLX2Q1EI/ZB6Ou5D3e5uIUcTsPgQb9gWweY.94IzPumO', 'mp.mello5@gmail.com', 1, 1, 0, NULL, 1408153440, 1409046613, 0, NULL, NULL, NULL, NULL, 'DEFAULT', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `store_details`
--
ALTER TABLE `store_details`
  ADD CONSTRAINT `store_details_ibfk_1` FOREIGN KEY (`store_user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
