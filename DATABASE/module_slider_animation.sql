-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2016 at 06:59 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genevo_tech_v4`
--

-- --------------------------------------------------------

--
-- Table structure for table `module_slider_animation`
--

CREATE TABLE `module_slider_animation` (
  `id` int(11) NOT NULL,
  `class_animation` varchar(250) NOT NULL,
  `data_x` varchar(10) NOT NULL,
  `data_y` varchar(10) NOT NULL,
  `data_start` int(4) NOT NULL,
  `data_speed` int(4) NOT NULL,
  `data_customin` text NOT NULL,
  `data_customout` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_slider_animation`
--

INSERT INTO `module_slider_animation` (`id`, `class_animation`, `data_x`, `data_y`, `data_start`, `data_speed`, `data_customin`, `data_customout`) VALUES
(1, 'tp-caption rev-heading lft start', 'center', '150', 500, 1900, '', ''),
(2, 'tp-caption rev-subheading sfb', 'center', '250', 300, 2500, '', ''),
(3, 'tp-caption rev-subheading sfl', '290', '330', 500, 3000, '', ''),
(4, 'tp-caption rev-heading lft start', 'center', '200', 500, 1900, '', ''),
(5, 'tp-caption customin customout rev-heading rev-white', 'center', '300', 500, 2500, 'x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;', 'x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;'),
(6, 'tp-caption rev-subheading sfl', '290', '400', 500, 3000, '', ''),
(7, 'tp-caption rev-subheading sfr', '490', '400', 500, 3000, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `module_slider_animation`
--
ALTER TABLE `module_slider_animation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `module_slider_animation`
--
ALTER TABLE `module_slider_animation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
