-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2016 at 09:43 PM
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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `setting_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `display_name`, `description`, `value`, `setting_default`, `created_at`, `updated_at`) VALUES
(1, 'header-logo', 'Header Logo', 'The logo that appears on top of the page', 'logo.png', 0, '2016-07-06 17:19:26', '2016-07-08 07:35:34'),
(2, 'footer-logo', 'Footer Logo', 'Logo that appears on the bottom of the page', 'logo.png', 0, '2016-07-06 17:19:26', '2016-07-08 07:35:34'),
(3, 'company-address', 'Company Address', 'Location address of the company', '#46, Street 558, Boeng Kork I, Khan Toulkork, Phnom Penh, Cambodia ', 0, '2016-07-06 17:19:26', '2016-07-08 07:35:34'),
(4, 'company-contact-number', 'Company contact number', 'Phone number for contact company', '023 555 31 38 ', 0, '2016-07-06 17:19:26', '2016-07-08 07:35:34'),
(5, 'company-contact-email', 'Company contact email', 'Email for contact company', 'info@genevotech.com', 0, '2016-07-06 17:19:26', '2016-07-08 07:35:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
