-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2023 at 08:59 AM
-- Server version: 5.6.51
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
-- Database: `immiyami`
--

-- --------------------------------------------------------

--
-- Table structure for table `controller_func`
--

DROP TABLE IF EXISTS `controller_func`;
CREATE TABLE IF NOT EXISTS `controller_func` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `controller` varchar(255) DEFAULT NULL,
  `func` varchar(255) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `controller_func`
--

INSERT INTO `controller_func` (`id`, `controller`, `func`, `created`) VALUES
(1, 'Users', '*', '2022-08-16 12:07:32'),
(2, 'Users', 'index', '2022-08-16 12:07:32'),
(3, 'Users', 'member', '2022-08-16 12:07:32'),
(4, 'Users', 'sponsor', '2022-08-16 12:07:32'),
(5, 'Users', 'supplier', '2022-08-16 12:07:32'),
(6, 'Users', 'add', '2022-08-16 12:07:32'),
(7, 'Users', 'addMember', '2022-08-16 12:07:32'),
(8, 'Users', 'addSponsor', '2022-08-16 12:07:32'),
(9, 'Users', 'addSupplier', '2022-08-16 12:07:32'),
(10, 'Users', 'changestatusmember', '2022-08-16 12:07:32'),
(11, 'Users', 'changestatussupplier', '2022-08-16 12:07:32'),
(12, 'Users', 'edit', '2022-08-16 12:07:32'),
(13, 'Users', 'editMember', '2022-08-16 12:07:32'),
(14, 'Users', 'editSponsor', '2022-08-16 12:07:32'),
(15, 'Users', 'editSupplier', '2022-08-16 12:07:32'),
(16, 'Users', 'delete', '2022-08-16 12:07:32'),
(17, 'Users', 'multiAction', '2022-08-16 12:07:32'),
(18, 'Users', 'view', '2022-08-16 12:07:32'),
(19, 'Access', '*', '2022-08-16 12:07:32'),
(20, 'Access', 'index', '2022-08-16 12:07:32'),
(21, 'Access', 'add', '2022-08-16 12:07:32'),
(22, 'Access', 'edit', '2022-08-16 12:07:32'),
(23, 'Access', 'delete', '2022-08-16 12:07:32'),
(24, 'Access', 'multiAction', '2022-08-16 12:07:32'),
(25, 'Access', 'view', '2022-08-16 12:07:32'),
(26, 'Articles', '*', '2022-08-16 12:07:32'),
(27, 'Articles', 'index', '2022-08-16 12:07:32'),
(28, 'Articles', 'add', '2022-08-16 12:07:32'),
(29, 'Articles', 'edit', '2022-08-16 12:07:32'),
(30, 'Articles', 'delete', '2022-08-16 12:07:32'),
(31, 'Articles', 'multiAction', '2022-08-16 12:07:32'),
(32, 'Articles', 'view', '2022-08-16 12:07:32'),
(33, 'Banners', '*', '2022-08-16 12:07:32'),
(34, 'Banners', 'index', '2022-08-16 12:07:32'),
(35, 'Banners', 'changestatus', '2022-08-16 12:07:32'),
(36, 'Banners', 'add', '2022-08-16 12:07:32'),
(37, 'Banners', 'edit', '2022-08-16 12:07:32'),
(38, 'Banners', 'delete', '2022-08-16 12:07:32'),
(39, 'Banners', 'multiAction', '2022-08-16 12:07:32'),
(40, 'Banners', 'view', '2022-08-16 12:07:32'),
(41, 'BannerTypes', '*', '2022-08-16 12:07:32'),
(42, 'BannerTypes', 'index', '2022-08-16 12:07:32'),
(43, 'BannerTypes', 'add', '2022-08-16 12:07:32'),
(44, 'BannerTypes', 'edit', '2022-08-16 12:07:32'),
(45, 'BannerTypes', 'delete', '2022-08-16 12:07:32'),
(46, 'BannerTypes', 'multiAction', '2022-08-16 12:07:32'),
(47, 'BannerTypes', 'view', '2022-08-16 12:07:32'),
(48, 'Categories', '*', '2022-08-16 12:07:32'),
(49, 'Categories', 'index', '2022-08-16 12:07:32'),
(50, 'Categories', 'add', '2022-08-16 12:07:32'),
(51, 'Categories', 'edit', '2022-08-16 12:07:32'),
(52, 'Categories', 'delete', '2022-08-16 12:07:32'),
(53, 'Categories', 'multiAction', '2022-08-16 12:07:32'),
(54, 'Categories', 'view', '2022-08-16 12:07:32'),
(55, 'ControllerFunc', '*', '2022-08-16 12:07:32'),
(56, 'ControllerFunc', 'index', '2022-08-16 12:07:32'),
(57, 'ControllerFunc', 'add', '2022-08-16 12:07:32'),
(58, 'ControllerFunc', 'edit', '2022-08-16 12:07:32'),
(59, 'ControllerFunc', 'delete', '2022-08-16 12:07:32'),
(60, 'ControllerFunc', 'multiAction', '2022-08-16 12:07:32'),
(61, 'ControllerFunc', 'view', '2022-08-16 12:07:32'),
(62, 'Countries', '*', '2022-08-16 12:07:32'),
(63, 'Countries', 'index', '2022-08-16 12:07:32'),
(64, 'Countries', 'add', '2022-08-16 12:07:32'),
(65, 'Countries', 'edit', '2022-08-16 12:07:32'),
(66, 'Countries', 'delete', '2022-08-16 12:07:32'),
(67, 'Countries', 'multiAction', '2022-08-16 12:07:32'),
(68, 'Countries', 'view', '2022-08-16 12:07:32'),
(69, 'Coupons', '*', '2022-08-16 12:07:32'),
(70, 'Coupons', 'index', '2022-08-16 12:07:32'),
(71, 'Coupons', 'add', '2022-08-16 12:07:32'),
(72, 'Coupons', 'edit', '2022-08-16 12:07:32'),
(73, 'Coupons', 'delete', '2022-08-16 12:07:32'),
(74, 'Coupons', 'multiAction', '2022-08-16 12:07:32'),
(75, 'Coupons', 'view', '2022-08-16 12:07:32'),
(76, 'Galleries', '*', '2022-08-16 12:07:32'),
(77, 'Galleries', 'index', '2022-08-16 12:07:32'),
(78, 'Galleries', 'add', '2022-08-16 12:07:32'),
(79, 'Galleries', 'edit', '2022-08-16 12:07:32'),
(80, 'Galleries', 'delete', '2022-08-16 12:07:32'),
(81, 'Galleries', 'multiAction', '2022-08-16 12:07:32'),
(82, 'Galleries', 'view', '2022-08-16 12:07:32'),
(83, 'Payments', '*', '2022-08-16 12:07:32'),
(84, 'Payments', 'index', '2022-08-16 12:07:32'),
(85, 'Payments', 'add', '2022-08-16 12:07:32'),
(86, 'Payments', 'edit', '2022-08-16 12:07:32'),
(87, 'Payments', 'delete', '2022-08-16 12:07:32'),
(88, 'Payments', 'multiAction', '2022-08-16 12:07:32'),
(89, 'Payments', 'view', '2022-08-16 12:07:32'),
(90, 'PostImages', '*', '2022-08-16 12:07:32'),
(91, 'PostImages', 'index', '2022-08-16 12:07:32'),
(92, 'PostImages', 'add', '2022-08-16 12:07:32'),
(93, 'PostImages', 'edit', '2022-08-16 12:07:32'),
(94, 'PostImages', 'delete', '2022-08-16 12:07:32'),
(95, 'PostImages', 'multiAction', '2022-08-16 12:07:32'),
(96, 'PostImages', 'view', '2022-08-16 12:07:32'),
(97, 'Posts', '*', '2022-08-16 12:07:32'),
(98, 'Posts', 'index', '2022-08-16 12:07:32'),
(99, 'Posts', 'add', '2022-08-16 12:07:32'),
(100, 'Posts', 'edit', '2022-08-16 12:07:32'),
(101, 'Posts', 'delete', '2022-08-16 12:07:32'),
(102, 'Posts', 'multiAction', '2022-08-16 12:07:32'),
(103, 'Posts', 'view', '2022-08-16 12:07:32'),
(104, 'PreferredCountries', '*', '2022-08-16 12:07:32'),
(105, 'PreferredCountries', 'index', '2022-08-16 12:07:32'),
(106, 'PreferredCountries', 'add', '2022-08-16 12:07:32'),
(107, 'PreferredCountries', 'edit', '2022-08-16 12:07:32'),
(108, 'PreferredCountries', 'delete', '2022-08-16 12:07:32'),
(109, 'PreferredCountries', 'multiAction', '2022-08-16 12:07:32'),
(110, 'PreferredCountries', 'view', '2022-08-16 12:07:32'),
(111, 'Settings', '*', '2022-08-16 12:07:32'),
(112, 'Settings', 'index', '2022-08-16 12:07:32'),
(113, 'Settings', 'add', '2022-08-16 12:07:32'),
(114, 'Settings', 'edit', '2022-08-16 12:07:32'),
(115, 'Settings', 'delete', '2022-08-16 12:07:32'),
(116, 'Settings', 'multiAction', '2022-08-16 12:07:32'),
(117, 'Settings', 'view', '2022-08-16 12:07:32'),
(118, 'Subscriptions', '*', '2022-08-16 12:07:32'),
(119, 'Subscriptions', 'index', '2022-08-16 12:07:32'),
(120, 'Subscriptions', 'add', '2022-08-16 12:07:32'),
(121, 'Subscriptions', 'edit', '2022-08-16 12:07:32'),
(122, 'Subscriptions', 'delete', '2022-08-16 12:07:32'),
(123, 'Subscriptions', 'multiAction', '2022-08-16 12:07:32'),
(124, 'Subscriptions', 'view', '2022-08-16 12:07:32'),
(125, 'Videos', '*', '2022-08-16 12:07:32'),
(126, 'Videos', 'index', '2022-08-16 12:07:32'),
(127, 'Videos', 'add', '2022-08-16 12:07:32'),
(128, 'Videos', 'edit', '2022-08-16 12:07:32'),
(129, 'Videos', 'delete', '2022-08-16 12:07:32'),
(130, 'Videos', 'multiAction', '2022-08-16 12:07:32'),
(131, 'Videos', 'view', '2022-08-16 12:07:32'),

(132, 'Users', 'changestatussupplierq', '2022-08-16 12:07:32'),
(133, 'Users', 'changestatussupplierp', '2022-08-16 12:07:32'),

(134, 'Campaigns', '*', '2022-08-16 12:07:32'),
(135, 'Campaigns', 'add', '2022-08-16 12:07:32'),
(136, 'Campaigns', 'edit', '2022-08-16 12:07:32'),
(137, 'Campaigns', 'delete', '2022-08-16 12:07:32'),
(138, 'Campaigns', 'multiAction', '2022-08-16 12:07:32'),
(139, 'Campaigns', 'view', '2022-08-16 12:07:32'),


(140, 'Helps', '*', '2022-08-16 12:07:32'),
(141, 'Helps', 'add', '2022-08-16 12:07:32'),
(142, 'Helps', 'edit', '2022-08-16 12:07:32'),
(143, 'Helps', 'delete', '2022-08-16 12:07:32'),
(144, 'Helps', 'multiAction', '2022-08-16 12:07:32'),
(145, 'Helps', 'view', '2022-08-16 12:07:32'),
(146, 'Payments', 'indexSponsor', '2022-08-16 12:07:32'),
(147, 'Payments', 'padd', '2022-08-16 12:07:32'),
(148, 'Payments', 'pedit', '2022-08-16 12:07:32'),

(150, 'QueueSubmissions', '*', '2022-08-16 12:07:32'),
(151, 'QueueSubmissions', 'add', '2022-08-16 12:07:32'),
(152, 'QueueSubmissions', 'edit', '2022-08-16 12:07:32'),
(153, 'QueueSubmissions', 'delete', '2022-08-16 12:07:32'),
(154, 'QueueSubmissions', 'multiAction', '2022-08-16 12:07:32'),
(155, 'QueueSubmissions', 'view', '2022-08-16 12:07:32'),

(156, 'XmlSheets', '*', '2022-08-16 12:07:32'),
(157, 'XmlSheets', 'add', '2022-08-16 12:07:32'),
(158, 'XmlSheets', 'edit', '2022-08-16 12:07:32'),
(159, 'XmlSheets', 'delete', '2022-08-16 12:07:32'),
(160, 'XmlSheets', 'multiAction', '2022-08-16 12:07:32'),
(161, 'XmlSheets', 'view', '2022-08-16 12:07:32'),

(162, 'Discussions', '*', '2022-08-16 12:07:32'),
(163, 'Discussions', 'add', '2022-08-16 12:07:32'),
(164, 'Discussions', 'edit', '2022-08-16 12:07:32'),
(165, 'Discussions', 'delete', '2022-08-16 12:07:32'),
(166, 'Discussions', 'multiAction', '2022-08-16 12:07:32'),
(167, 'Discussions', 'view', '2022-08-16 12:07:32');


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
