-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 14, 2016 at 10:02 AM
-- Server version: 5.5.36-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `davidros_medicale`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_articals`
--

CREATE TABLE IF NOT EXISTS `tbl_articals` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_pos_id` int(11) DEFAULT NULL,
  `men_id` int(11) NOT NULL,
  `art_title` varchar(225) DEFAULT NULL,
  `art_description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `art_lang` varchar(10) DEFAULT NULL,
  `art_date_created` datetime DEFAULT NULL,
  `art_date_modified` datetime DEFAULT NULL,
  `art_status` int(11) DEFAULT '1',
  PRIMARY KEY (`art_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_articals`
--

INSERT INTO `tbl_articals` (`art_id`, `art_pos_id`, `men_id`, `art_title`, `art_description`, `type`, `art_lang`, `art_date_created`, `art_date_modified`, `art_status`) VALUES
(1, 4, 1, 'Medicales', '\nhttps://www.youtube.com/embed/_52aNawMXSI\n\n', 'vedio', 'en', '2015-12-15 00:00:00', NULL, 1),
(2, 3, 1, '', 'http://www.youtube.com/embed/ADL-vSBMnhw', 'vedio', 'en', '2015-09-01 00:00:00', NULL, 1),
(3, 2, 1, 'IMPORTANT TEMODAR', '2.jpg', '', 'en', '2015-12-15 00:00:00', NULL, 1),
(4, 1, 1, 'Team Activity', 'mfm_flipped.jpg', '', 'en', '2015-09-01 00:00:00', NULL, 1),
(5, NULL, 4, 'Chantra', '<h4>Management1</h4>\n<ol>\n<li>Chanlach Hem:&nbsp;&nbsp;&nbsp;&nbsp; Managing director</li>\n<li>Channy Tan:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Operation Officer</li>\n<li>Saros Kong: &nbsp; &nbsp; &nbsp; &nbsp; Accounting and finance Officer</li>\n<li>Oula Chay: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Marketing and Sale Officer</li>\n<li>Socheata Sorn:&nbsp;&nbsp;&nbsp;&nbsp; Medical Representative</li>\n<li>Sopisey Pok:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Medical Representative</li>\n<li>SreyVouch Teav: &nbsp; Medical Representative</li>\n<li>Rithy Chea:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Medical Representative</li>\n</ol>\n<h4>History</h4>\n<p class="text_justify">Our company was established in early 2011. David &amp; Rosa Pharma Co.Ltd specializes in registration, import, marketing and distribution of a wide range of high quality medicines. Our office and warehouse are located in Phnom Penh. We supply a broad range of medical products to hospitals, clinics, pharmacies. If you need a reliable source of quality healthcare and medical products, David &amp; Rosa Pharma Co.Ltd is your trusted and sustainable partner. We offer expertise and tailored solutions to fit your unique needs in Cambodia.</p>', '', 'en', '2015-12-26 00:00:00', NULL, 1),
(6, 10, 1, NULL, '<table class="table no_border_top">\n                    <tr>\n                        <td width="250"> <img src="http://david-rosapharma.com//templates/front_end/img/body/ss.jpg" class="img-responsive img-thumbnail form_no_radius img_respon " /></td>\n                        <td>\n                          <p class="title_sub_text">Management</p>\n                          <p class="text_justify">\n<b> Managing Director:</b> Mr. Hem Chanlach has the experience more than 10 years in pharmaceutical market with the position of Sale Representative, Medical Representative, Product Specialist and Business Manager with world leading pharmaceutical companies such as Roche, Bayer, Schering Plough and MSD.\n\n                              \n</p>\n</td>\n </tr>\n </table>\n                  ', '', 'en', NULL, NULL, 1),
(7, 11, 1, NULL, '<table class="table no_border_top">\n                    <tr>\n                        <td width="250"> <img src="http://david-rosapharma.com/templates/front_end/img/body/shop_n.jpg" class="img-responsive img-thumbnail form_no_radius img_respon " /></td>\n                        <td>\n                          <p   <p class="title_sub_text">Objective</p>\n                <p class="text_justify">\n\n                 David & Rosa Pharma Co.; Ltd is a trusted partner. We import only high quality products and will become one of the leading pharmaceutical companies in Cambodia. We will try our best to expand our business in neighbor countries in the near future.\n                 </p>\n                        </td>\n                    </tr>\n                </table>\n                  ', '', 'en', NULL, NULL, 1),
(8, 5, 1, 'Welcome', '\r\n                   <p class="text_justify">\r\n\r\n                    <strong>David & Rosa Pharma Co.; Ltd</strong> was established in February 2011. The company is focusing on logistic, warehousing, marketing and distribution.\r\n                 </p>', '', 'en', NULL, NULL, 1),
(9, 6, 1, 'Our Service', '<div class="info-card"><img src="../../uploads/images/tadinex_574d4ba554266.jpg" alt="" width="526" height="371" /><br />\n<div class="info-card-details animate">\n<div class="info-card-header">\n<h3>Our Services</h3>\n</div>\n<div class="info-card-detail">\n<p>- Marketing and Sales</p>\n<p>- Distribution and Logistics</p>\n<p>-Regulatory Services</p>\n</div>\n</div>\n</div>', '', 'en', '2016-05-31 00:00:00', NULL, 1),
(10, 7, 1, 'Our Activity', '<div class="info-card"><img src="../../uploads/images/download.jpg" alt="" width="150" height="135" /><br />\n<div class="info-card-details animate">\n<div class="info-card-header">\n<h3>Our Activity១</h3>\n</div>\n<div class="info-card-detail"><!-- Description -->\n<p>We import only high quality products and will become one of the leading pharmaceutical companies in Cambodia</p>\n</div>\n</div>\n</div>', '', 'en', '2016-01-25 00:00:00', NULL, 1),
(11, 8, 1, 'Our Vision', '<div class="info-card"><img src="../../uploads/images/images.jpg" alt="" width="189" height="116" /><br />\n<div class="info-card-details animate">\n<div class="info-card-header">\n<h3>Our Vision</h3>\n</div>\n<div class="info-card-detail">\n<p>Delivery Trust</p>\n</div>\n</div>\n</div>', '', 'en', '2015-12-15 00:00:00', NULL, 1),
(12, 9, 1, ' OUR MISSION', '<div class="info-card">\n                          <img src="http://www.david-rosapharma.com/templates/front_end/img/body/mission.jpg" class="img-responsive img-thumbnail form_no_radius img_respon " />\n                          <div class="info-card-details animate">\n                            <div class="info-card-header">\n                              <h3> OUR MISSION</h3>\n\n                            </div>\n                            <div class="info-card-detail">\ncommit to build strong collaboration with Health Care Professional for a better health in Cambodia and the world\n</p>\n\n                            </div>\n                          </div>\n                        </div>', '', 'en', NULL, NULL, 1),
(15, NULL, 8, '', '<ul>\n<li>Marketing and Sales</li>\n<li>Distribution and Logistics</li>\n<li>Regulary Services</li>\n</ul>', '', 'en', '2015-12-26 00:00:00', NULL, 1),
(16, NULL, 2, '', '<ul>\n<li>Marketing and Sales</li>\n<li>Distribution and Logistics</li>\n<li>Regulary Services</li>\n</ul>', '', 'kh', '2015-12-21 00:00:00', NULL, 1),
(17, NULL, 11, 'Test', '<p>sdfsdfsdfsdf</p>', '', 'en', '2015-12-26 00:00:00', NULL, 1),
(18, NULL, 5, 'តែស', '<p>សដថសដថ</p>', '', 'kh', '2015-12-26 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(225) DEFAULT NULL,
  `cat_description` varchar(225) NOT NULL,
  `cat_date_created` datetime DEFAULT NULL,
  `cat_date_modified` datetime DEFAULT NULL,
  `cat_status` int(11) DEFAULT NULL,
  `cat_lang` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_id_UNIQUE` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`cat_id`, `cat_name`, `cat_description`, `cat_date_created`, `cat_date_modified`, `cat_status`, `cat_lang`) VALUES
(1, 'Banana11', '<p>Helloee</p>', '2015-09-26 00:00:00', NULL, 1, NULL),
(3, 'Grap', '<p><span style="text-decoration: underline;">my testing</span></p>', '2015-09-26 00:00:00', '2015-09-26 00:00:00', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menus`
--

CREATE TABLE IF NOT EXISTS `tbl_menus` (
  `men_id` int(11) NOT NULL AUTO_INCREMENT,
  `men_name` varchar(100) DEFAULT NULL,
  `men_level` int(11) DEFAULT NULL,
  `men_combine_menu` varchar(220) DEFAULT NULL,
  `men_parent` int(11) DEFAULT NULL,
  `men_order` int(11) DEFAULT NULL,
  `men_description` text NOT NULL,
  `men_lang` varchar(10) DEFAULT NULL,
  `men_date_created` datetime DEFAULT NULL,
  `men_date_modified` datetime DEFAULT NULL,
  `men_status` int(11) DEFAULT NULL,
  `men_url` varchar(150) NOT NULL,
  PRIMARY KEY (`men_id`),
  UNIQUE KEY `men_id_UNIQUE` (`men_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_menus`
--

INSERT INTO `tbl_menus` (`men_id`, `men_name`, `men_level`, `men_combine_menu`, `men_parent`, `men_order`, `men_description`, `men_lang`, `men_date_created`, `men_date_modified`, `men_status`, `men_url`) VALUES
(1, 'ទំព័រដើម', 2, '1,2', 0, 1, '', 'kh', NULL, NULL, 1, 'home'),
(2, 'សេវាកម្ម', 2, '', 0, 2, '', 'kh', NULL, NULL, 1, 'our_service'),
(3, 'ដែគូរពាណិជ្ជកម្ម', 2, '', 0, 3, '', 'kh', NULL, '2015-10-29 00:00:00', 1, 'partnership'),
(4, 'អំពីពួកយើង', 1, '', 0, 1, '', 'kh', NULL, NULL, 1, 'about_us'),
(5, 'ផលិតផល', 1, '', 0, 2, '', 'kh', NULL, NULL, 1, 'product'),
(6, 'ទំនាក់ទំនង', 1, '', 0, 2, '', 'kh', NULL, NULL, 1, 'contact'),
(7, 'Home', 2, '1,2', 0, 1, '', 'en', NULL, NULL, 1, 'home'),
(8, 'Our Service', 2, '', 0, 2, '', 'en', NULL, NULL, 1, 'our_service'),
(9, 'PartnerShip', 2, '', 0, 3, '', 'en', NULL, NULL, 1, 'partnership'),
(10, 'About Us', 1, '', 0, 1, '', 'en', NULL, NULL, 1, 'about_us'),
(11, 'Product', 1, '', 0, 2, '', 'en', NULL, NULL, 1, 'product'),
(12, 'Contact Us', 1, '', 0, 2, '', 'en', NULL, NULL, 1, 'contact'),
(13, 'a', 1, NULL, 0, NULL, '', 'en', '2015-11-02 00:00:00', NULL, NULL, ''),
(14, 'អេ', 1, NULL, 0, NULL, '', 'kh', '2015-11-02 00:00:00', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE IF NOT EXISTS `tbl_modules` (
  `mod_id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_name` varchar(225) DEFAULT NULL,
  `mod_lang` varchar(10) DEFAULT NULL,
  `mod_date_created` datetime DEFAULT NULL,
  `mod_date_modified` datetime DEFAULT NULL,
  `mod_status` int(11) DEFAULT '1',
  PRIMARY KEY (`mod_id`),
  UNIQUE KEY `mod_UNIQUE` (`mod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`mod_id`, `mod_name`, `mod_lang`, `mod_date_created`, `mod_date_modified`, `mod_status`) VALUES
(1, 'User Management', NULL, '2015-11-17 00:00:00', NULL, 1),
(2, 'Manage Categories', NULL, '2015-11-17 00:00:00', NULL, 1),
(3, 'Manage Menu', NULL, '2015-11-17 00:00:00', NULL, 1),
(4, 'Mange Articles', NULL, '2015-11-17 00:00:00', NULL, 1),
(5, 'Manage Partner', NULL, '2015-11-17 00:00:00', NULL, 1),
(6, 'Manage Position', NULL, '2015-11-17 00:00:00', NULL, 1),
(7, 'Setting', NULL, '2015-11-17 00:00:00', NULL, 1),
(8, 'Manage Product', NULL, '2015-11-19 00:00:00', NULL, 1),
(9, 'Manage SlideShow', NULL, '2015-11-19 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partner_ships`
--

CREATE TABLE IF NOT EXISTS `tbl_partner_ships` (
  `part_id` int(11) NOT NULL AUTO_INCREMENT,
  `part_name` varchar(225) DEFAULT NULL,
  `part_image` varchar(225) DEFAULT NULL,
  `part_description` varchar(255) DEFAULT NULL,
  `part_date_create` datetime DEFAULT NULL,
  `part_date_modified` datetime DEFAULT NULL,
  `part_status` int(1) DEFAULT NULL,
  PRIMARY KEY (`part_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_partner_ships`
--

INSERT INTO `tbl_partner_ships` (`part_id`, `part_name`, `part_image`, `part_description`, `part_date_create`, `part_date_modified`, `part_status`) VALUES
(1, 'Novell Pharmaceutical Laboratories', 'P002-Novell.png', '<p>"You" are patients longing for cost efficient yet effective drugs to cure all kind of diseases.<br /> <br /> "You" are medical community and healthcare providers, who cares about excellent quality products and trusted partners in providing medical info', NULL, '2015-12-23 00:00:00', 1),
(3, 'PPM', 'ppm.jpg', 'Cellcard is company mobile tell that provide call 24 hours in cambodia and other country.', NULL, NULL, 1),
(5, 'SDBS', 'SDBS', '<p>Hello sdbs&nbsp;</p>', '2015-11-06 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permissions`
--

CREATE TABLE IF NOT EXISTS `tbl_permissions` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `per_mod_id` int(11) NOT NULL,
  `per_rol_id` int(11) NOT NULL,
  `per_date_created` datetime NOT NULL,
  `per_date_modified` datetime NOT NULL,
  `per_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `tbl_permissions`
--

INSERT INTO `tbl_permissions` (`per_id`, `per_mod_id`, `per_rol_id`, `per_date_created`, `per_date_modified`, `per_status`) VALUES
(1, 1, 3, '2015-11-17 00:00:00', '0000-00-00 00:00:00', 1),
(2, 2, 3, '2015-11-17 00:00:00', '0000-00-00 00:00:00', 1),
(3, 3, 3, '2015-11-17 00:00:00', '0000-00-00 00:00:00', 1),
(4, 4, 3, '2015-11-17 00:00:00', '0000-00-00 00:00:00', 1),
(17, 6, 4, '2015-11-17 00:00:00', '0000-00-00 00:00:00', 1),
(18, 7, 4, '2015-11-17 00:00:00', '0000-00-00 00:00:00', 1),
(32, 2, 2, '2015-11-18 00:00:00', '0000-00-00 00:00:00', 1),
(33, 3, 2, '2015-11-18 00:00:00', '0000-00-00 00:00:00', 1),
(34, 4, 2, '2015-11-18 00:00:00', '0000-00-00 00:00:00', 1),
(35, 5, 2, '2015-11-18 00:00:00', '0000-00-00 00:00:00', 1),
(36, 6, 2, '2015-11-18 00:00:00', '0000-00-00 00:00:00', 1),
(37, 1, 1, '2015-11-19 00:00:00', '0000-00-00 00:00:00', 1),
(38, 2, 1, '2015-11-19 00:00:00', '0000-00-00 00:00:00', 1),
(39, 3, 1, '2015-11-19 00:00:00', '0000-00-00 00:00:00', 1),
(40, 4, 1, '2015-11-19 00:00:00', '0000-00-00 00:00:00', 1),
(41, 5, 1, '2015-11-19 00:00:00', '0000-00-00 00:00:00', 1),
(42, 6, 1, '2015-11-19 00:00:00', '0000-00-00 00:00:00', 1),
(43, 7, 1, '2015-11-19 00:00:00', '0000-00-00 00:00:00', 1),
(44, 8, 1, '2015-11-19 00:00:00', '0000-00-00 00:00:00', 1),
(45, 9, 1, '2015-11-19 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_positions`
--

CREATE TABLE IF NOT EXISTS `tbl_positions` (
  `pos_id` int(11) NOT NULL,
  `pos_name` varchar(225) DEFAULT NULL,
  `pos_description` varchar(225) NOT NULL,
  `pos_lang` varchar(10) DEFAULT NULL,
  `pos_date_created` datetime DEFAULT NULL,
  `pos_date_modified` datetime DEFAULT NULL,
  `pos_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`pos_id`),
  UNIQUE KEY `pos_id_UNIQUE` (`pos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_positions`
--

INSERT INTO `tbl_positions` (`pos_id`, `pos_name`, `pos_description`, `pos_lang`, `pos_date_created`, `pos_date_modified`, `pos_status`) VALUES
(0, 'Left', '<p>left</p>', NULL, '2015-11-07 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_cat_id` int(11) NOT NULL,
  `pro_name` varchar(255) DEFAULT NULL,
  `pro_image` varchar(150) NOT NULL,
  `pro_detail` text NOT NULL,
  `pro_date_created` datetime DEFAULT NULL,
  `pro_date_modified` datetime DEFAULT NULL,
  `pro_status` int(11) DEFAULT NULL,
  `pro_lang` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`pro_id`),
  UNIQUE KEY `pro_id_UNIQUE` (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`pro_id`, `pro_cat_id`, `pro_name`, `pro_image`, `pro_detail`, `pro_date_created`, `pro_date_modified`, `pro_status`, `pro_lang`) VALUES
(8, 0, 'Tadinex® 10mg', 'P007-Tadinex.JPG', '<p class="class_justify"><strong class="text_green">Indications</strong><br />relief of symptoms associated with allergic rhinitis, eg. Sneezing, nasal discharge and itching, as well as ocular itching and burning. Also indicated for relief of symptoms and signs of chronic urticaria and other allergic dermatological disorders.</p>\n<p class="class_justify"><strong class="text_green">Pharmacology</strong></p>\n<p>Loratatine is a portent long action tricyclic antihistamine with selective peripheral H1-receptor antagonistic activity without central sedation or anticholinergic effects.</p>\n<p class="class_justify"><strong class="text_green">Package Quantities</strong><br />10x3b/box</p>', '2015-12-25 00:00:00', NULL, 1, 'en'),
(9, 0, '', 'P007-Tadinex.JPG', '<p class="class_justify"><strong class="text_green">Indications</strong><br />relief of symptoms associated with allergic rhinitis, eg. Sneezing, nasal discharge and itching, as well as ocular itching and burning. Also indicated for relief of symptoms and signs of chronic urticaria and other allergic dermatological disorders.</p>\n<p class="class_justify"><strong class="text_green">Pharmacology</strong></p>\n<p>Loratatine is a portent long action tricyclic antihistamine with selective peripheral H1-receptor antagonistic activity without central sedation or anticholinergic effects.</p>\n<p class="class_justify"><strong class="text_green">Package Quantities</strong><br />10x3b/box</p>', '2015-12-26 00:00:00', NULL, 1, 'kh'),
(10, 0, 'Penyl® 10mg', 'P003-Penyl_10mg.JPG', '<p class="class_justify"><strong class="text_green">Indications</strong><br />acute nausea and vomiting, not recommended for routine prevention of nausea after surgery, treatment of chronic dyspeptic symptoms</p>\n<p class="class_justify"><strong class="text_green">Pharmacology</strong></p>\n<p>Domperidone is a dopamine antagonist with antiemetic properties similar to those of metoclopramide and certain neuroleptic drugs. Unlike these other drugs, however, domperidone does not readily cross the blood-brain barrier</p>\n<p class="class_justify"><strong class="text_green">Package Quantities</strong><br />10x5b/box</p>', '2015-12-25 00:00:00', NULL, 1, 'en'),
(11, 0, '', 'P003-Penyl_10mg.JPG', '<p class="class_justify"><strong class="text_green">Indications</strong><br />relief of symptoms associated with allergic rhinitis, eg. Sneezing, nasal discharge and itching, as well as ocular itching and burning. Also indicated for relief of symptoms and signs of chronic urticaria and other allergic dermatological disorders.</p>\n<p class="class_justify"><strong class="text_green">Pharmacology</strong></p>\n<p>Loratatine is a portent long action tricyclic antihistamine with selective peripheral H1-receptor antagonistic activity without central sedation or anticholinergic effects.</p>\n<p class="class_justify"><strong class="text_green">Package Quantities</strong><br />10x3b/box</p>', '2015-12-23 00:00:00', NULL, 1, 'kh'),
(12, 0, 'Rosta® 5mg', 'P005-Rosta.png', '<p class="class_justify"><strong class="text_green">Indications</strong><br />hypertension and angina</p>\n<p class="class_justify"><strong class="text_green">Pharmacology</strong></p>\n<p>amlodipine is a calcium ion influx inhibitor (slow channel blocker or calcium ion antagonist) and inhibits the transmembrane influx of calcium ions into cardiac and vascular smooth muscle.</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -amlodipine dilates peripheral arterioles and thus, reduces the total peripheral resistance (afterload) against which the heart works.</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -amlodipine also involves dilatation of t</p>\n<p>&nbsp;E main coronary arteries and coronary arterioles, both in normal and ischemic region. This dilatation increases myocardial oxygen delivery in patient with coronary artery spasm</p>\n<p class="class_justify"><strong class="text_green">Package Quantities</strong></p>\n<p class="class_justify">10x3b/box</p>', '2015-12-25 00:00:00', NULL, 1, 'en'),
(13, 0, 'Amlodipine 5mg', 'P005-Rosta.png', '<p class="class_justify"><strong class="text_green">Indications</strong><br />hypertension and angina</p>\n<p class="class_justify"><strong class="text_green">Pharmacology</strong></p>\n<p>amlodipine is a calcium ion influx inhibitor (slow channel blocker or calcium ion antagonist) and inhibits the transmembrane influx of calcium ions into cardiac and vascular smooth muscle.</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -amlodipine dilates peripheral arterioles and thus, reduces the total peripheral resistance (afterload) against which the heart works.</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -amlodipine also involves dilatation of t</p>\n<p>&nbsp;E main coronary arteries and coronary arterioles, both in normal and ischemic region. This dilatation increases myocardial oxygen delivery in patient with coronary artery spasm</p>\n<p class="class_justify"><strong class="text_green">Package Quantities</strong></p>\n<p class="class_justify">10x3b/box</p>', '2015-12-23 00:00:00', NULL, 1, 'kh'),
(14, 0, 'Roxacin 500mg', 'P006-Roxacin.jpg', '<p class="class_justify"><strong class="text_green">Indications</strong></p>\n<p class="class_justify">infections with susceptible microorganism, such as acute maxillary sinusitis, acute bacterial exacerbations of chronic bronchitis, community acquired pneumonia, uncomplicated skin and skin structure infections, complicated urinary tract infections and acute pyelonephritis.</p>\n<p class="class_justify"><strong class="text_green">Pharmacology</strong></p>\n<p class="class_justify">Levofloxacin, an oral fluoroquinolone, is the optical S-(-) isomer of ofloxacin. It has a wide spectrum antibacterial effect. Levofloxacin is active against gram-positive bacteria including anaerobes</p>\n<p class="class_justify"><strong class="text_green">Package Quantities</strong><br />10x1b/box</p>', '2015-12-25 00:00:00', NULL, 1, 'en'),
(15, 0, 'Levofloxacine 500mg', 'P006-Roxacin.jpg', '<p class="class_justify"><strong class="text_green">Indications</strong></p>\n<p class="class_justify">infections with susceptible microorganism, such as acute maxillary sinusitis, acute bacterial exacerbations of chronic bronchitis, community acquired pneumonia, uncomplicated skin and skin structure infections, complicated urinary tract infections and acute pyelonephritis.</p>\n<p class="class_justify"><strong class="text_green">Pharmacology</strong></p>\n<p class="class_justify">Levofloxacin, an oral fluoroquinolone, is the optical S-(-) isomer of ofloxacin. It has a wide spectrum antibacterial effect. Levofloxacin is active against gram-positive bacteria including anaerobes</p>\n<p class="class_justify"><strong class="text_green">Package Quantities</strong><br />10x1b/box</p>', '2015-12-26 00:00:00', NULL, 1, 'kh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_name` varchar(255) DEFAULT NULL,
  `rol_description` varchar(225) NOT NULL,
  `rol_mod_id` int(11) DEFAULT NULL,
  `rol_date_created` datetime DEFAULT NULL,
  `rol_date_modified` datetime DEFAULT NULL,
  `rol_status` int(11) DEFAULT '1',
  PRIMARY KEY (`rol_id`),
  UNIQUE KEY `rol_id_UNIQUE` (`rol_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`rol_id`, `rol_name`, `rol_description`, `rol_mod_id`, `rol_date_created`, `rol_date_modified`, `rol_status`) VALUES
(1, 'Administrator', 'this is descritpion of administrator', NULL, '2015-11-17 00:00:00', '2015-11-19 00:00:00', 1),
(2, 'Employee', 'this is description of employee', NULL, '2015-11-17 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE IF NOT EXISTS `tbl_settings` (
  `set_id` int(11) NOT NULL AUTO_INCREMENT,
  `set_company` varchar(45) DEFAULT NULL,
  `set_email_show` varchar(255) DEFAULT NULL,
  `set_email_recieved` varchar(220) NOT NULL,
  `set_phone` varchar(110) NOT NULL,
  `set_mobile` varchar(110) NOT NULL,
  `set_address` varchar(225) NOT NULL,
  `set_website` varchar(220) NOT NULL,
  `set_logo` varchar(220) NOT NULL,
  PRIMARY KEY (`set_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`set_id`, `set_company`, `set_email_show`, `set_email_recieved`, `set_phone`, `set_mobile`, `set_address`, `set_website`, `set_logo`) VALUES
(4, 'David Rosapharma', 'info.rosa.cambodia@gmail.com', 'sothornkta@gmail.com', '(+855)70 845 777', '097610919', '<p>#590, Sangkat Toek Thla, Khan Sen Sok,Phnom Penh, Cambodia</p>', 'david-rosapharma.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sliders`
--

CREATE TABLE IF NOT EXISTS `tbl_sliders` (
  `sli_id` int(11) NOT NULL AUTO_INCREMENT,
  `sli_image` varchar(225) DEFAULT NULL,
  `sli_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`sli_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_sliders`
--

INSERT INTO `tbl_sliders` (`sli_id`, `sli_image`, `sli_status`) VALUES
(1, 'img2.jpg', b'1'),
(2, 'img1.jpg', b'1'),
(3, 'img3.jpg', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sliders_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_sliders_menu` (
  `sli_men_id` int(11) NOT NULL AUTO_INCREMENT,
  `men_id` int(11) NOT NULL,
  `sli_id` int(11) NOT NULL,
  PRIMARY KEY (`sli_men_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_sliders_menu`
--

INSERT INTO `tbl_sliders_menu` (`sli_men_id`, `men_id`, `sli_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `use_id` int(11) NOT NULL AUTO_INCREMENT,
  `use_username` varchar(225) DEFAULT NULL,
  `use_password` varchar(225) NOT NULL,
  `use_first_name` varchar(225) DEFAULT NULL,
  `use_last_name` varchar(255) DEFAULT NULL,
  `use_gender` varchar(10) NOT NULL,
  `use_email` varchar(225) DEFAULT NULL,
  `use_phone` varchar(225) DEFAULT NULL,
  `use_address` varchar(225) NOT NULL,
  `use_date_created` datetime DEFAULT NULL,
  `use_date_modified` datetime DEFAULT NULL,
  `use_status` int(11) DEFAULT '1',
  `use_rol_id` int(11) NOT NULL,
  PRIMARY KEY (`use_id`),
  UNIQUE KEY `use_id_UNIQUE` (`use_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`use_id`, `use_username`, `use_password`, `use_first_name`, `use_last_name`, `use_gender`, `use_email`, `use_phone`, `use_address`, `use_date_created`, `use_date_modified`, `use_status`, `use_rol_id`) VALUES
(1, 'admin', '63e0eea4fb99fa54c90bb94275d71455', 'sothorn', 'khong', '1', 'sothorn.khong@gmail.com', '098610919', '', '2015-09-24 23:16:57', NULL, 1, 1),
(2, 'meyleang', '202cb962ac59075b964b07152d234b70', 'mey1', 'leang', '1', 'meyleang@gmail.com', '0987221231', 'pp, cambodia', NULL, NULL, 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
