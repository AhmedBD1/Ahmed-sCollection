-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2020 at 01:43 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahmedc`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

DROP TABLE IF EXISTS `catagory`;
CREATE TABLE IF NOT EXISTS `catagory` (
  `catagory_id` int(100) NOT NULL AUTO_INCREMENT,
  `catagory_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`catagory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catagory_id`, `catagory_name`) VALUES
(1, 'One Deno'),
(2, 'Solid'),
(3, 'RADAR'),
(5, 'Science'),
(6, 'Scientists'),
(7, 'Antique');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(100) NOT NULL AUTO_INCREMENT,
  `item_img1` varchar(255) DEFAULT NULL,
  `item_img2` varchar(255) DEFAULT NULL,
  `item_img3` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_type` varchar(255) DEFAULT NULL,
  `item_value` varchar(255) DEFAULT NULL,
  `item_origin` varchar(255) DEFAULT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_img1`, `item_img2`, `item_img3`, `item_name`, `item_type`, `item_value`, `item_origin`, `item_description`) VALUES
(1, './img/bd-10TK-Radar.jpg', './img/bd-10TK-Radar.jpg', '', '10 Taka note', 'Bank Note', '10 taka', 'Bangladesh', '10 Taka note'),
(5, './img/others-antique.jpg', '', '', 'Antique spoon, plate & Kettle', 'Antique', 'N/A', 'Bangladesh', 'Antique spoon, plate & Kettle'),
(3, './img/1pound-Science-1Denopic1.jpg', './img/1pound-Science-1Denopic2.jpg', '', 'One Pound', 'Bank Note', '1 Pound', 'England', 'Bank Note');

-- --------------------------------------------------------

--
-- Table structure for table `item_catagory_ref`
--

DROP TABLE IF EXISTS `item_catagory_ref`;
CREATE TABLE IF NOT EXISTS `item_catagory_ref` (
  `list_id` int(100) NOT NULL AUTO_INCREMENT,
  `catagory_name` varchar(255) DEFAULT NULL,
  `item_id` int(100) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`list_id`),
  KEY `item_id` (`item_id`,`item_name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_catagory_ref`
--

INSERT INTO `item_catagory_ref` (`list_id`, `catagory_name`, `item_id`, `item_name`) VALUES
(1, 'Solid', 1, '10 Taka note'),
(2, 'One Deno', 3, '1 Pound '),
(3, 'Science', 3, '1 Pound '),
(4, 'Antique', 5, 'Antique spoon, plate & Kettle');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
