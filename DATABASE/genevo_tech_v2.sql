-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2016 at 09:14 PM
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
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `module_id` smallint(6) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `css_icon_class` varchar(50) DEFAULT NULL,
  `menu_site_id` tinyint(1) NOT NULL,
  `permission_id` smallint(5) DEFAULT NULL,
  `menu_position_id` tinyint(1) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `default_order` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `page_id`, `module_id`, `url`, `slug`, `name`, `description`, `css_icon_class`, `menu_site_id`, `permission_id`, `menu_position_id`, `parent_id`, `active`, `default_order`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, '', 'users', 'Users', 'List All Users', 'pe-7s-users', 2, 1, 2, 0, 1, 1, '2016-07-01 09:33:45', '2016-07-01 09:33:45'),
(2, NULL, 0, '', 'roles', 'Roles', 'Display all roles', 'pe-7s-id', 2, 2, 2, 0, 1, 2, '2016-07-01 09:39:09', '2016-07-01 09:39:09'),
(3, NULL, 0, '', 'permissions', 'Permissions', 'Manage Permissions', 'pe-7s-medal', 2, 6, 2, 0, 1, 3, '2016-07-02 06:14:10', '2016-07-02 06:14:10'),
(4, NULL, 0, '', 'menus', 'Menu', 'Manage menus', 'pe-7s-menu', 2, 36, 2, 0, 1, 4, '2016-07-03 08:12:42', '2016-07-03 08:12:42'),
(5, 1, NULL, NULL, NULL, 'Home', 'Default page for frontend', '', 1, NULL, 1, 0, 1, 5, '2016-07-03 02:45:13', '2016-07-09 06:19:01'),
(6, NULL, 0, '', 'career-inspiration', 'Career Inspiration', '', NULL, 2, 0, 1, 0, 1, 6, '2016-07-03 02:54:52', '2016-07-03 02:54:52'),
(7, NULL, 0, '', 'job-vacancies', 'Job Vacandies', '', NULL, 2, 0, 1, 0, 1, 7, '2016-07-03 02:56:19', '2016-07-03 02:56:19'),
(8, NULL, 0, '', 'pages', 'Pages', '', 'pe-7s-browser', 1, 41, 2, 0, 1, 8, '2016-07-03 03:48:04', '2016-07-03 03:48:04'),
(9, NULL, 0, '', 'modules', 'Modules', '', 'pe-7s-copy-file', 1, 43, 2, 0, 1, 9, '2016-07-03 05:12:51', '2016-07-03 05:12:51'),
(12, NULL, 0, '', 'settings', 'Settings', '', 'pe-7s-config', 2, 51, 2, 0, 1, 0, '2016-07-06 09:34:31', '2016-07-06 09:34:31'),
(13, NULL, 1, NULL, 'about', 'About', '', '', 1, NULL, 1, 0, 1, 0, '2016-07-09 04:37:20', '2016-07-09 06:01:47'),
(20, NULL, NULL, 'http://google.com', 'contact', 'Contact', '', '', 1, NULL, 1, 0, 1, 0, '2016-07-09 05:35:52', '2016-07-09 06:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `menu_position`
--

CREATE TABLE `menu_position` (
  `id` tinyint(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `display_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_position`
--

INSERT INTO `menu_position` (`id`, `name`, `display_name`) VALUES
(1, 'top', 'Top menu'),
(2, 'left', 'Sidebar left');

-- --------------------------------------------------------

--
-- Table structure for table `menu_site`
--

CREATE TABLE `menu_site` (
  `id` tinyint(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `display_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_site`
--

INSERT INTO `menu_site` (`id`, `name`, `slug`, `display_name`) VALUES
(1, 'frontend', '', 'Frontend'),
(2, 'backend', 'admin/', 'Backend');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `widget_name` varchar(100) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `widget_name`, `display_name`, `created_at`, `updated_at`, `active`) VALUES
(1, 'about-description', 'basic', 'About Genevo Description', '2015-11-17 00:00:00', NULL, 1),
(10, 'reasons-you-should-train-with-us', 'portfolio-style-1', 'Why should train with us', '2016-07-03 23:00:40', '2016-07-03 23:00:40', 1),
(13, 'introdocution', 'basic', 'Introduction', '2016-07-10 08:43:44', '2016-07-10 08:43:44', 1),
(14, 'course', 'portfolio-style-2', 'Courses', '2016-07-11 13:29:16', '2016-07-11 13:29:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module_widget_basic`
--

CREATE TABLE `module_widget_basic` (
  `id` int(1) NOT NULL,
  `module_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text,
  `css_class` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_widget_basic`
--

INSERT INTO `module_widget_basic` (`id`, `module_id`, `title`, `description`, `css_class`, `created_at`, `updated_at`) VALUES
(2, 1, 'What is Genevo?', '<p>Genovo tech is a technology training school located at Toul Kork, a great place for weekend party. Genovo was found in 2012 by two people, Mr Sok and Mr Sao, who have achieved the great skills and cerifications from largest technology organization in the world. Genovo has seen the future of technology and we are willing to give new students the best education as possible to be successful in their future career.</p>', 'gray-bg', '2016-07-03 19:00:29', '2016-07-10 10:09:56'),
(4, 12, 'test titlle', '<p>Of course, sometimes you will need to capture segments of the URI within your route. For example, you may need to capture a user\'s ID from the URL. You may do so by defining route parameters:Of course, sometimes you will need to capture segments of the URI within your route. For example, you may need to capture a user\'s ID from the URL. You may do so by defining route parameters:Of course, sometimes you will need to capture segments of the URI within your route. For example, you may need to capture a user\'s ID from the URL. You may do so by defining route parameters:</p>', NULL, '2016-07-08 10:31:48', '2016-07-08 20:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `module_widget_portfolio_1`
--

CREATE TABLE `module_widget_portfolio_1` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `css_class` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_widget_portfolio_1`
--

INSERT INTO `module_widget_portfolio_1` (`id`, `module_id`, `title`, `css_class`, `created_at`, `updated_at`) VALUES
(1, 10, 'Why should you train with us?', '', '2016-07-10 01:16:21', '2016-07-10 01:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `module_widget_portfolio_1_items`
--

CREATE TABLE `module_widget_portfolio_1_items` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `module_widget_portfolio_1_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `image` varchar(200) NOT NULL,
  `css_class` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_widget_portfolio_1_items`
--

INSERT INTO `module_widget_portfolio_1_items` (`id`, `module_widget_portfolio_1_id`, `title`, `description`, `image`, `css_class`, `created_at`, `updated_at`) VALUES
(2, 1, 'Profession Instructors', '<p>They are not a story teller. They have dozen of experience in real work. They know how to transfer thier knowledge and skills to you effectively.</p>', '1468142641.jpg', NULL, '2016-07-10 02:24:01', '2016-07-10 10:10:51'),
(3, 1, 'We care about your future', '<p>We cannot teach you everything, but we teach you for the needs of job market and the future of your career.</p>', '1468167671.jpg', NULL, '2016-07-10 02:25:01', '2016-07-10 09:21:11'),
(4, 1, 'Real Practical Lap', '<p>We provide you not just theory but experience of real work in our full-equipped lap.</p>', '1468146518.jpg', NULL, '2016-07-10 03:28:38', '2016-07-10 03:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `module_widget_portfolio_2`
--

CREATE TABLE `module_widget_portfolio_2` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `css_class` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_widget_portfolio_2`
--

INSERT INTO `module_widget_portfolio_2` (`id`, `module_id`, `title`, `css_class`, `created_at`, `updated_at`) VALUES
(1, 14, 'Our Available Courses', 'gray-bg', '2016-07-11 06:34:58', '2016-07-11 06:34:58'),
(2, 14, 'Cisco', NULL, '2016-07-11 09:10:18', '2016-07-11 09:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `module_widget_portfolio_2_category`
--

CREATE TABLE `module_widget_portfolio_2_category` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_widget_portfolio_2_category`
--

INSERT INTO `module_widget_portfolio_2_category` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'database', 'Database', '2016-07-11 15:22:28', '2016-07-11 15:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `module_widget_portfolio_2_items`
--

CREATE TABLE `module_widget_portfolio_2_items` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `widget_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `image` varchar(200) NOT NULL,
  `css_class` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_widget_portfolio_2_items`
--

INSERT INTO `module_widget_portfolio_2_items` (`id`, `widget_id`, `title`, `description`, `image`, `css_class`, `created_at`, `updated_at`) VALUES
(1, 1, 'fafa', '<p>sadfasdf</p>', '1468257913.jpg', NULL, '2016-07-11 10:25:13', '2016-07-11 10:25:13'),
(2, 1, 'Oracle 12c', '<div id="desc" data-action="full-description-read" data-course-id="BkcTdV5a" data-user-id="" data-target-selector-class="js-simple-collapse-more-btn" data-purpose="course-description">\r\n<h3>Course Description</h3>\r\n<div data-more="Full details">\r\n<div>\r\n<p><strong>Quick Info:</strong></p>\r\n<ul>\r\n<li>Course Launched on: 19-May-2016</li>\r\n<li><strong>More than 220 Lectures</strong></li>\r\n<li>Very Comprehensive with extra&nbsp;lectures on&nbsp;Database Administration</li>\r\n<li>May help in obtaining&nbsp;Oracle Database&nbsp;12c&nbsp;SQL&nbsp;Certification.</li>\r\n<li>With&nbsp;FULL&nbsp;Subtitles&nbsp;for all the video lessons</li>\r\n</ul>\r\n<p><strong>About This Course:</strong></p>\r\n<p>Welcome to the course, \'Oracle SQL: Oracle Database 12c SQL Certified Associate\'.</p>\r\n<p>This course introduces SQL, which is an acronym for \'Structured Query Language\', to its students. This is based on Oracle\'s SQL&nbsp;implementation for Oracle Databases. The lessons are based on Oracle 12c Database and SQL&nbsp;Developer Tools running in Windows 10.</p>\r\n<p><strong>About SQL:</strong></p>\r\n<p>SQL&nbsp;is used to interact with Database Systems. As per ANSI (American National Standards Institute), SQL&nbsp;is the standard language for Relational Database Management Systems.</p>\r\n<p>SQL has been the prominent language to interact with various Database Systems for many decades. While many languages that existed&nbsp;two decades ago are extinct now, SQL has always maintained its supremacy in the RDBMS world. Over the time, it has only advanced with new features and standards. And it seems to stay that way for years to come.</p>\r\n<p><strong>About Oracle Database:</strong></p>\r\n<p>Oracle Database is one of the prominent Database Systems&nbsp;in the RDBMS (Relational Database Management Systems) segment. Some of the other prominent&nbsp;Database Systems are</p>\r\n<ul>\r\n<li>Microsoft SQL Server</li>\r\n<li>MySQL</li>\r\n<li>Sybase ASE.</li>\r\n</ul>\r\n<div>They also use SQL to interact with their Database Systems. While there are subtle differences between each of their SQL implementations, a SQL as a whole, is generally very standard. So&nbsp;a person with SQL knowledge in one platform such as Oracle,&nbsp;may find it easier to learn and code for other&nbsp;Database Systems such as Microsoft SQL or MySQL.&nbsp;</div>\r\n<div>The point is, once you learn SQL, then your reach into the job market is very wide.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>About the Curriculum:</strong></div>\r\n<ul>\r\n<li>The curriculum has been carefully designed to introduce the Oracle RDBMS environment first.</li>\r\n<li>Then it moves on to various types of SQL Statements such as DDL, DML and TCL.</li>\r\n<li>And next, it goes to the depths of various SQL Statements, Conditions, Sorting, Functions, Grouping etc..</li>\r\n<li>It also gives Database Administration tips, as needed.</li>\r\n<li>It is also&nbsp;covers most of the topics&nbsp;from the&nbsp;Oracle SQL Certification Exam 1Z0-071</li>\r\n</ul>\r\n<div>&nbsp;</div>\r\n<div><strong>Oracle Certification:</strong></div>\r\n<ul>\r\n<li>Oracle awards certain certifications that are recognized globally</li>\r\n<li>One such certification is Oracle Database 12c SQL Certified Associate</li>\r\n<li>The exam for that certification is (currently as of May 2016), 1Z0-071.</li>\r\n<li>The topics&nbsp;in this course covers most of the topics for that exam.</li>\r\n</ul>\r\n<div>&nbsp;</div>\r\n<div><strong>Oracle Certification - Declarations</strong></div>\r\n<ul>\r\n<li>&nbsp;While this course covers most of the topics for that exam, this course is not a sole material for that exam. Additional materials such as Oracle\'s recommended Books may be needed.</li>\r\n<li>This course is&nbsp;NOT an official course from&nbsp;Oracle Corporation.</li>\r\n<li>This course has been developed individually by its author.</li>\r\n</ul>\r\n<div>&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id="requirements">\r\n<h3>What are the requirements?</h3>\r\n<ul>\r\n<li>Basic computer skills</li>\r\n<li>Strong motivation to learn</li>\r\n<li>Download and install Oracle 12c in Windows 10 as explained in one of the lectures</li>\r\n<li>Use Oracle SQL Developer in Windows 10 as explained in the lectures</li>\r\n</ul>\r\n</div>\r\n<div id="what-you-get">\r\n<h3>What am I going to get from this course?</h3>\r\n<div data-more="Full details">\r\n<div>\r\n<ul>\r\n<li>Do database development</li>\r\n<li>Develop codes using Oracle SQL</li>\r\n<li>Understand the fundamentals of SQL (Structured Query Language)</li>\r\n<li>Understand the basics of Oracle RDBMS Architecture</li>\r\n<li>Learn the basics of Oracle RDBMS Architecture</li>\r\n<li>Can gain considerable SQL knowledge to apply for a beginner level, SQL Developer or Database Developer Job</li>\r\n<li>Understand about Oracle 12c Database</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div id="who-should-attend">\r\n<h3>What is the target audience?</h3>\r\n<div data-more="Full details">\r\n<div>\r\n<ul>\r\n<li>This SQL course is for beginners who would like to learn about SQL syntax and get into SQL Development. No prior programming knowledge is needed.</li>\r\n<li>This is probably not for you if you are looking for advanced and complex queries</li>\r\n<li>This course covers most of the topics for the Oracle SQL Certification exam, 1Z0-071. So this course can also be helpful, along with Oracle\'s recommended study materials, if you are planning to get Oracle\'s SQL Certification such as &ldquo;Oracle Database 12c SQL Certified Associate&rdquo;</li>\r\n<li>College Students can take this course to understand SQL and Oracle Database Fundamentals</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>', '1468258442.jpg', NULL, '2016-07-11 10:34:02', '2016-07-11 10:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `module_widget_portfolio_2_item_categories`
--

CREATE TABLE `module_widget_portfolio_2_item_categories` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_widget_portfolio_2_item_categories`
--

INSERT INTO `module_widget_portfolio_2_item_categories` (`item_id`, `category_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `display_name` varchar(150) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `display_name`, `name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 'This is default page for frontend', 1, 1, '2016-07-03 10:21:56', '2016-07-04 08:55:33'),
(2, 'Career Aspiration', 'career-aspiration', NULL, 1, 1, '2016-07-03 10:24:45', '2016-07-03 10:24:45'),
(3, 'Career Aspiration Detail', 'career-aspiration-detail', NULL, NULL, NULL, '2016-07-03 10:26:23', '2016-07-03 10:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `page_modules`
--

CREATE TABLE `page_modules` (
  `page_id` mediumint(9) NOT NULL,
  `module_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_modules`
--

INSERT INTO `page_modules` (`page_id`, `module_id`) VALUES
(1, 10),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` smallint(5) NOT NULL,
  `name` varchar(80) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'view-users', 'View users', 'test', '2016-07-05 13:04:38', '2016-07-05 06:04:38'),
(2, 'view-roles', 'List Roles', 'Display all roles', '2016-07-02 11:58:40', '2016-07-01 09:40:08'),
(3, 'create-user', 'Add user', NULL, '2016-07-02 04:27:58', '2016-07-01 09:40:58'),
(4, 'edit-user', 'Edit user', NULL, '2016-07-01 09:40:58', '2016-07-01 09:40:58'),
(5, 'view-permissions', 'Permissions', 'Manage Permissions', '2016-07-02 12:05:43', '2016-07-02 06:13:32'),
(6, 'create-permission', 'Create new permission', NULL, '2016-07-02 06:13:32', '2016-07-02 06:13:32'),
(7, 'create-role', 'Create Role', NULL, '2016-07-02 06:15:58', '2016-07-02 06:15:58'),
(8, 'edit-role', 'Edit Role', NULL, '2016-07-02 06:15:58', '2016-07-02 06:15:58'),
(9, 'delete-user', 'Delete User', NULL, '2016-07-02 06:17:05', '2016-07-02 06:17:05'),
(11, 'edit-permission', 'Edit Permission', NULL, '2016-07-02 08:18:04', '2016-07-02 08:18:04'),
(12, 'visit-website', 'Visit Website', NULL, '2016-07-02 09:33:02', '2016-07-02 09:33:02'),
(13, 'edit-user-role', 'Change User Role', NULL, '2016-07-02 12:06:02', '2016-07-02 10:46:49'),
(14, 'view-pages', 'View pages', '', '2016-07-02 11:58:08', '2016-07-02 04:48:58'),
(32, 'edit-his-own-permission', 'Edit his/her permission', '', '2016-07-03 06:36:14', '2016-07-02 23:36:14'),
(33, 'edit-his-own-role', 'Edit his/her role', '', '2016-07-02 23:36:45', '2016-07-02 23:36:45'),
(34, 'delete-permission', 'Delete Permission', '', '2016-07-03 01:04:53', '2016-07-03 01:04:53'),
(36, 'view-menus', 'View All Menus', '', '2016-07-03 01:12:18', '2016-07-03 01:12:18'),
(38, 'create-menu', 'Create menu', '', '2016-07-03 01:53:14', '2016-07-03 01:53:14'),
(39, 'edit-menu', 'Edit menu', '', '2016-07-03 01:53:26', '2016-07-03 01:53:26'),
(40, 'delete-menu', 'Delete menu', '', '2016-07-03 01:53:37', '2016-07-03 01:53:37'),
(41, 'view-pages', 'Pages', '', '2016-07-03 10:51:24', '2016-07-03 03:47:16'),
(42, 'edit-page', 'Edit Page', '', '2016-07-03 04:25:53', '2016-07-03 04:25:53'),
(43, 'view-modules', 'View Page Module', '', '2016-07-03 12:21:27', '2016-07-03 04:43:11'),
(44, 'create-module', 'Create Module', '', '2016-07-03 09:18:26', '2016-07-03 09:18:26'),
(45, 'edit-module', 'Edit module', '', '2016-07-03 09:18:40', '2016-07-03 09:18:40'),
(47, 'create-page', 'Create Page', '', '2016-07-05 06:11:09', '2016-07-05 06:11:09'),
(49, 'delete-page', 'Delete Page', '', '2016-07-06 08:38:10', '2016-07-06 08:38:10'),
(50, 'delete-module', 'Delete module', '', '2016-07-06 09:19:33', '2016-07-06 09:19:33'),
(51, 'settings', 'View Settings', '', '2016-07-06 09:32:55', '2016-07-06 09:32:55'),
(52, 'edit-setting', 'Edit Setting', '', '2016-07-07 06:16:55', '2016-07-07 06:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(4) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `level`, `created_at`, `updated_at`) VALUES
(1, 'root', 'Root', 'Super user', 1, '2016-06-30 17:00:00', '2016-06-30 17:00:00'),
(2, 'admin', 'Administrator', 'Administrator can do everything except touching root user.', 2, '2016-07-02 04:08:58', '2016-07-02 04:08:58'),
(3, 'site-owner', 'Website Owner', 'Website owner can edit page content, manage lower level users', 3, '2016-07-01 13:28:48', '2016-07-02 02:04:33'),
(5, 'visitor', 'Visitor', 'Visitor can only visit frontend website', 4, '2016-07-02 02:40:28', '2016-07-02 02:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `role_id` tinyint(4) NOT NULL,
  `permission_id` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`role_id`, `permission_id`) VALUES
(5, 12),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 9),
(3, 11),
(3, 12),
(3, 8),
(2, 2),
(2, 3),
(2, 4),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 32),
(2, 33),
(2, 34),
(2, 36),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 47),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 32),
(1, 33),
(1, 34),
(1, 36),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 47),
(1, 1),
(1, 49),
(1, 50),
(1, 51),
(1, 52);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admininistrator', 'admin@gmail.com', '$2y$10$LnYvzbIzDzx4ezze7EJ67uhLuazGK.f9yBPR7/BMjB1WEaqmhXkDC', 'O3yqVOJkV0KsIIrMWWAtykF2soBD2tkkOPveilLCIUlcCi6BFtiBXehPZbGT', '2016-06-30 17:00:00', '2016-07-05 10:59:15'),
(2, 2, 'Mao Meyleang', 'mao.meyleang@gmail.com', '$2y$10$oDmZzx77o46tb02VQ4LmW.qvo/K6roMGsrj6SbOrOtrMh1bQsia/K', NULL, '2016-06-30 17:00:00', '2016-07-01 19:38:23'),
(3, 3, 'PON Lyhong', 'lyhong.pon@gmail.com', '$2y$10$BpWMqQkwGNiwFaPGlolZbO2bl2FUJX/bIJ91lkt7QwZzEFkNoZ22a', 'h71bbNoLya22B6lm2Y9yovuL48izpBL2voisYXghmHGwliUvee4qJNBfqIqE', '2016-07-01 22:32:56', '2016-07-03 00:03:58'),
(20, 3, 'Kong Sothorn', 'sothorn.kong@gmail.com', '123456', NULL, '2016-07-03 00:17:02', '2016-07-03 00:17:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_position`
--
ALTER TABLE `menu_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_site`
--
ALTER TABLE `menu_site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mod_UNIQUE` (`id`);

--
-- Indexes for table `module_widget_basic`
--
ALTER TABLE `module_widget_basic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_widget_portfolio_1`
--
ALTER TABLE `module_widget_portfolio_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_widget_portfolio_1_items`
--
ALTER TABLE `module_widget_portfolio_1_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_widget_portfolio_2`
--
ALTER TABLE `module_widget_portfolio_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_widget_portfolio_2_category`
--
ALTER TABLE `module_widget_portfolio_2_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_widget_portfolio_2_items`
--
ALTER TABLE `module_widget_portfolio_2_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `menu_position`
--
ALTER TABLE `menu_position`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu_site`
--
ALTER TABLE `menu_site`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `module_widget_basic`
--
ALTER TABLE `module_widget_basic`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `module_widget_portfolio_1`
--
ALTER TABLE `module_widget_portfolio_1`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `module_widget_portfolio_1_items`
--
ALTER TABLE `module_widget_portfolio_1_items`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `module_widget_portfolio_2`
--
ALTER TABLE `module_widget_portfolio_2`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `module_widget_portfolio_2_category`
--
ALTER TABLE `module_widget_portfolio_2_category`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `module_widget_portfolio_2_items`
--
ALTER TABLE `module_widget_portfolio_2_items`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
