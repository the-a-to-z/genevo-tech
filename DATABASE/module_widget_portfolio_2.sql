-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2016 at 04:24 PM
-- Server version: 5.7.12-0ubuntu1.1
-- PHP Version: 7.0.8-3+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genevo_tech_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `module_widget_portfolio_2`
--

CREATE TABLE `module_widget_portfolio_2` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `css_class` varchar(100) DEFAULT NULL,
  `show_category_filter` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_widget_portfolio_2`
--

INSERT INTO `module_widget_portfolio_2` (`id`, `module_id`, `title`, `css_class`, `show_category_filter`, `created_at`, `updated_at`) VALUES
(1, 14, 'Our Available Courses', '', 1, '2016-07-11 06:34:58', '2016-07-13 07:54:25'),
(2, 15, 'What would you like to become?', '', 0, '2016-07-16 00:02:36', '2016-07-16 01:52:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `module_widget_portfolio_2`
--
ALTER TABLE `module_widget_portfolio_2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `module_widget_portfolio_2`
--
ALTER TABLE `module_widget_portfolio_2`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
