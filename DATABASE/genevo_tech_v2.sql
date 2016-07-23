SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


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

INSERT INTO `menus` (`id`, `page_id`, `module_id`, `url`, `slug`, `name`, `description`, `css_icon_class`, `menu_site_id`, `permission_id`, `menu_position_id`, `parent_id`, `active`, `default_order`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, '', 'users', 'Users', 'List All Users', 'pe-7s-users', 2, 1, 2, 0, 1, 1, '2016-07-01 09:33:45', '2016-07-01 09:33:45'),
(2, NULL, 0, '', 'roles', 'Roles', 'Display all roles', 'pe-7s-id', 2, 2, 2, 0, 1, 2, '2016-07-01 09:39:09', '2016-07-01 09:39:09'),
(3, NULL, 0, '', 'permissions', 'Permissions', 'Manage Permissions', 'pe-7s-medal', 2, 6, 2, 0, 1, 3, '2016-07-02 06:14:10', '2016-07-02 06:14:10'),
(4, NULL, 0, '', 'menus', 'Menu', 'Manage menus', 'pe-7s-menu', 2, 36, 2, 0, 1, 4, '2016-07-03 08:12:42', '2016-07-03 08:12:42'),
(5, 1, NULL, NULL, NULL, 'Home', 'Default page for frontend', '', 1, NULL, 1, 0, 1, 5, '2016-07-03 02:45:13', '2016-07-09 06:19:01'),
(6, 2, NULL, NULL, 'career-aspiration', 'Career Aspiration', '', '', 1, NULL, 1, 0, 1, 6, '2016-07-03 02:54:52', '2016-07-18 10:16:52'),
(7, 5, NULL, NULL, 'job-vacancies', 'Job Vacandies', '', '', 1, NULL, 1, 0, 1, 7, '2016-07-03 02:56:19', '2016-07-16 05:11:15'),
(8, NULL, 0, '', 'pages', 'Pages', '', 'pe-7s-browser', 1, 41, 2, 0, 1, 8, '2016-07-03 03:48:04', '2016-07-03 03:48:04'),
(9, NULL, 0, '', 'modules', 'Modules', '', 'pe-7s-copy-file', 1, 43, 2, 0, 1, 9, '2016-07-03 05:12:51', '2016-07-03 05:12:51'),
(12, NULL, 0, '', 'settings', 'Settings', '', 'pe-7s-config', 2, 51, 2, 0, 1, 0, '2016-07-06 09:34:31', '2016-07-06 09:34:31'),
(13, NULL, 1, NULL, 'about', 'About', '', '', 1, NULL, 1, 0, 1, 0, '2016-07-09 04:37:20', '2016-07-09 06:01:47'),
(20, NULL, 17, NULL, 'contact', 'Contact', '', '', 1, NULL, 1, 0, 1, 0, '2016-07-09 05:35:52', '2016-07-22 11:46:41'),
(21, NULL, 14, NULL, 'course', 'Our Courses', '', '', 1, NULL, 1, 0, 1, 0, '2016-07-23 04:07:29', '2016-07-23 04:07:29'),
(22, NULL, 13, NULL, 'schedule', 'Schedule', '', '', 1, NULL, 1, 0, 1, 0, '2016-07-23 04:30:31', '2016-07-23 04:30:31');

CREATE TABLE `menu_position` (
  `id` tinyint(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `display_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `menu_position` (`id`, `name`, `display_name`) VALUES
(1, 'top', 'Top menu'),
(2, 'left', 'Sidebar left');

CREATE TABLE `menu_site` (
  `id` tinyint(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `display_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `menu_site` (`id`, `name`, `slug`, `display_name`) VALUES
(1, 'frontend', '', 'Frontend'),
(2, 'backend', 'admin/', 'Backend');

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_07_23_044950_create_job_listing_categories_table', 2),
('2016_07_23_051245_create_job_listing_items_table', 2),
('2016_07_23_053111_create_job_listing_item_categories_table', 2);

CREATE TABLE `modules` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `widget_name` varchar(100) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `modules` (`id`, `name`, `widget_name`, `display_name`, `created_at`, `updated_at`, `active`) VALUES
(1, 'about-description', 'basic', 'About Genevo Description', '2015-11-17 00:00:00', NULL, 1),
(10, 'reasons-you-should-train-with-us', 'portfolio-style-1', 'Why should train with us', '2016-07-03 23:00:40', '2016-07-03 23:00:40', 1),
(13, 'schedule', 'basic', 'Schedule', '2016-07-10 08:43:44', '2016-07-10 08:43:44', 1),
(14, 'course', 'portfolio-style-2', 'Courses', '2016-07-11 13:29:16', '2016-07-11 13:29:16', 1),
(15, 'career-aspiration', 'portfolio-style-2', 'Career Aspiration', '2016-07-16 07:02:04', '2016-07-16 07:02:04', 1),
(16, 'job-vacancy', 'job-listing', 'Job-vacancy', '2016-07-16 10:19:44', '2016-07-16 10:19:44', 1),
(17, 'contact', 'contact-form', 'Contact Genevo Form', '2016-07-19 16:33:54', '2016-07-19 16:33:54', 1),
(18, 'logo-list', 'portfolio-style-1', 'Specified and specialized list', '2016-07-20 12:37:08', '2016-07-20 12:37:08', 1),
(19, 'home-slider', 'slider', 'Home Slider', '2016-07-23 11:33:11', '2016-07-23 11:33:11', 1);

CREATE TABLE `module_slider` (
  `id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `module_slider` (`id`, `module_id`, `status`, `created_at`, `updated_at`) VALUES
(0, 19, 1, '2016-07-23 11:33:14', '2016-07-23 11:33:14');

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

CREATE TABLE `module_slider_detail` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `animation_id` int(11) NOT NULL,
  `color` varchar(6) NOT NULL,
  `bg_color` varchar(6) NOT NULL,
  `icon` text NOT NULL,
  `font_size` int(2) NOT NULL,
  `type_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `slider_item_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `module_slider_items` (
  `id` int(11) NOT NULL,
  `slider_id` tinyint(3) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `module_slider_items` (`id`, `slider_id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(0, 0, 'New CCNA up coming class', '57301.png', '2016-07-23 04:35:24', '2016-07-23 04:35:24');

CREATE TABLE `module_widget_basic` (
  `id` int(1) NOT NULL,
  `module_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text,
  `css_class` varchar(100) DEFAULT NULL,
  `show_title` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `module_widget_basic` (`id`, `module_id`, `title`, `description`, `css_class`, `show_title`, `created_at`, `updated_at`) VALUES
(2, 1, 'What is Genevo?', '<p>Genovo tech is a technology training school located at Toul Kork, a great place for weekend party. Genovo was found in 2012 by two people, Mr Sok and Mr Sao, who have achieved the great skills and cerifications from largest technology organization in the world. Genovo has seen the future of technology and we are willing to give new students the best education as possible to be successful in their future career.</p>', 'gray-bg', 1, '2016-07-03 19:00:29', '2016-07-18 12:33:58'),
(4, 12, 'test titlle', '<p>Of course, sometimes you will need to capture segments of the URI within your route. For example, you may need to capture a user\'s ID from the URL. You may do so by defining route parameters:Of course, sometimes you will need to capture segments of the URI within your route. For example, you may need to capture a user\'s ID from the URL. You may do so by defining route parameters:Of course, sometimes you will need to capture segments of the URI within your route. For example, you may need to capture a user\'s ID from the URL. You may do so by defining route parameters:</p>', NULL, 1, '2016-07-08 10:31:48', '2016-07-08 20:07:51'),
(5, 18, 'about', '<p>thissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiiithissifaoisjdflaiiiiiiiiiiiiiiiiiiiiiiiiii</p>', '', 1, '2016-07-16 06:11:00', '2016-07-16 06:11:00'),
(6, 13, 'Schedule', '<h3 class="text-uppercase" style="box-sizing: border-box; font-family: \'Open Sans\', sans-serif; font-weight: normal; line-height: 1.5; color: #374046; margin: 0px; font-size: 24px; letter-spacing: 2px; text-transform: uppercase; text-align: center;">RUNNING CLASS</h3>\r\n<table class="table" style="border: 1px solid #dddddd; box-sizing: border-box; border-spacing: 0px; border-collapse: collapse; width: 100%; max-width: 100%; margin-bottom: 20px; color: #374046; font-family: \'Open Sans\', sans-serif; font-size: 15px; line-height: 22.5px; background-color: transparent;" cellspacing="0">\r\n<thead style="box-sizing: border-box;">\r\n<tr style="box-sizing: border-box;">\r\n<td style="box-sizing: border-box; padding: 8px 16px; line-height: 1.42857; vertical-align: top; border-top-width: 0px; color: #ec6719; width: 392px;">Class Name</td>\r\n<td style="box-sizing: border-box; padding: 8px 16px; line-height: 1.42857; vertical-align: top; border-top-width: 0px; color: #ec6719; width: 376px;">Date Start</td>\r\n<td style="box-sizing: border-box; padding: 8px 16px; line-height: 1.42857; vertical-align: top; border-top-width: 0px; color: #ec6719; width: 201px;">Time</td>\r\n<td style="box-sizing: border-box; padding: 8px 16px; line-height: 1.42857; vertical-align: top; border-top-width: 0px; color: #ec6719; width: 10px;">Class Schedule</td>\r\n</tr>\r\n</thead>\r\n<tbody style="box-sizing: border-box;">\r\n<tr style="box-sizing: border-box;">\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 392px;"><a href="../../../course/oracle-12c">Cisco CCNA1 &ndash; Introduction to Network</a>s</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 376px;">July 25, 2016</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 201px;">2:00PM-5:00PM</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 10px;">Weekend</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 392px;">Cisco CCNA4 &ndash; Connecting Network</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 376px;"><span style="line-height: 20px;">July 25, 2016</span></td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 201px;">2:00PM-5:00PM</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 10px;">Weekend</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 392px;">Cisco CCNA4 &ndash; Connecting Network</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 376px;"><span style="line-height: 20px;">July 25, 2016</span></td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 201px;">2:00PM-5:00PM</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 10px;">Weekend</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 392px;">Cisco CCNA4 &ndash; Connecting Network</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 376px;"><span style="line-height: 20px;">July 25, 2016</span></td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 201px;">2:00PM-5:00PM</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 10px;">Weekend</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 392px;">Cisco CCNA4 &ndash; Connecting Network</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 376px;"><span style="line-height: 20px;">July 25, 2016</span></td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 201px;">2:00PM-5:00PM</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 10px;">Weekend</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 392px;">Cisco CCNA4 &ndash; Connecting Network</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 376px;"><span style="line-height: 20px;">July 25, 2016</span></td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 201px;">2:00PM-5:00PM</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 10px;">Weekend</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<h3 class="text-uppercase" style="font-family: \'Open Sans\', sans-serif; font-size: 24px; color: #374046; line-height: 1.5; box-sizing: border-box; font-weight: normal; margin: 0px; letter-spacing: 2px; text-transform: uppercase; text-align: center;">UPCOMING&nbsp;CLASS</h3>\r\n<table class="table" style="border: 1px solid #dddddd; box-sizing: border-box; border-spacing: 0px; border-collapse: collapse; width: 100%; max-width: 100%; margin-bottom: 20px; color: #374046; font-family: \'Open Sans\', sans-serif; font-size: 15px; line-height: 22.5px; background-color: transparent;" cellspacing="0">\r\n<thead style="box-sizing: border-box;">\r\n<tr style="box-sizing: border-box;">\r\n<td style="box-sizing: border-box; padding: 8px 16px; line-height: 1.42857; vertical-align: top; border-top-width: 0px; color: #ec6719; width: 392px;">Class Name</td>\r\n<td style="box-sizing: border-box; padding: 8px 16px; line-height: 1.42857; vertical-align: top; border-top-width: 0px; color: #ec6719; width: 376px;">Date Start</td>\r\n<td style="box-sizing: border-box; padding: 8px 16px; line-height: 1.42857; vertical-align: top; border-top-width: 0px; color: #ec6719; width: 201px;">Time</td>\r\n<td style="box-sizing: border-box; padding: 8px 16px; line-height: 1.42857; vertical-align: top; border-top-width: 0px; color: #ec6719; width: 10px;">Class Schedule</td>\r\n</tr>\r\n</thead>\r\n<tbody style="box-sizing: border-box;">\r\n<tr style="box-sizing: border-box;">\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 392px;">Cisco CCNA1 &ndash; Introduction to Networks</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 376px;">July 25, 2016</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 201px;">2:00PM-5:00PM</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 10px;">Weekend</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 392px;">Cisco CCNA4 &ndash; Connecting Network</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 376px;"><span style="line-height: 20px;">July 25, 2016</span></td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 201px;">2:00PM-5:00PM</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 10px;">Weekend</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 392px;">Cisco CCNA4 &ndash; Connecting Network</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 376px;"><span style="line-height: 20px;">July 25, 2016</span></td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 201px;">2:00PM-5:00PM</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 10px;">Weekend</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 392px;">Cisco CCNA4 &ndash; Connecting Network</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 376px;"><span style="line-height: 20px;">July 25, 2016</span></td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 201px;">2:00PM-5:00PM</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 10px;">Weekend</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 392px;">Cisco CCNA4 &ndash; Connecting Network</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 376px;"><span style="line-height: 20px;">July 25, 2016</span></td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 201px;">2:00PM-5:00PM</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 10px;">Weekend</td>\r\n</tr>\r\n<tr style="box-sizing: border-box;">\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 392px;">Cisco CCNA4 &ndash; Connecting Network</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 376px;"><span style="line-height: 20px;">July 25, 2016</span></td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 201px;">2:00PM-5:00PM</td>\r\n<td style="box-sizing: border-box; padding: 16px; line-height: 1.42857; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: #ffffff; width: 10px;">Weekend</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'gray-bg', 0, '2016-07-18 12:21:03', '2016-07-20 06:44:39');

CREATE TABLE `module_widget_contact_form` (
  `id` int(1) NOT NULL,
  `module_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `response_message` text,
  `css_class` varchar(100) DEFAULT NULL,
  `show_title` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `module_widget_contact_form` (`id`, `module_id`, `title`, `response_message`, `css_class`, `show_title`, `created_at`, `updated_at`) VALUES
(1, 17, 'Contact Us', '<p>Thank you for your contacting us. We are going to contact you soon.</p>', '', 1, '2016-07-19 09:37:38', '2016-07-19 09:37:38');

CREATE TABLE `module_widget_job_listing` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `css_class` varchar(100) DEFAULT NULL,
  `show_category_filter` tinyint(1) DEFAULT '1',
  `theme` varchar(100) DEFAULT NULL,
  `display_per_page` smallint(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `module_widget_job_listing` (`id`, `module_id`, `title`, `css_class`, `show_category_filter`, `theme`, `display_per_page`, `created_at`, `updated_at`) VALUES
(1, 16, 'Openning job opportunities', NULL, 1, NULL, 1, '2016-07-17 01:25:32', '2016-07-23 05:32:35');

CREATE TABLE `module_widget_job_listing_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `widget_id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `module_widget_job_listing_categories` (`id`, `parent_id`, `lft`, `rgt`, `depth`, `widget_id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 0, 1, 'uncategorized', 'Uncategorized', '2016-07-22 23:07:47', '2016-07-22 23:07:47'),
(2, 1, 3, 4, 0, 1, 'databases', 'Databases', '2016-07-22 23:07:55', '2016-07-22 23:07:55'),
(3, 1, 5, 6, 0, 1, 'programming', 'Programming', '2016-07-22 23:08:01', '2016-07-22 23:08:01'),
(4, 1, 7, 8, 0, 1, 'networking', 'Networking', '2016-07-22 23:08:06', '2016-07-22 23:08:06'),
(5, 1, 9, 10, 0, 1, 'it-management', 'IT Management', '2016-07-22 23:08:15', '2016-07-22 23:08:15');

CREATE TABLE `module_widget_job_listing_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `widget_id` smallint(5) UNSIGNED NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `job_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company_logo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `close_on` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `module_widget_job_listing_items` (`id`, `parent_id`, `lft`, `rgt`, `depth`, `widget_id`, `slug`, `job_title`, `company`, `description`, `company_logo`, `close_on`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 0, 1, 'java-developer', 'Java Developer', 'Genevo Technology', '<p>some descriptions.</p>', '', '2016-07-31', '2016-07-22 23:08:40', '2016-07-22 23:08:40'),
(3, 1, 3, 4, 0, 1, 'sql-administrator', 'SQL Administrator', 'Genevo Technology', '<p>Some description.</p>', '', '2016-07-31', '2016-07-22 23:17:34', '2016-07-22 23:17:34');

CREATE TABLE `module_widget_job_listing_item_categories` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `module_widget_job_listing_item_categories` (`item_id`, `category_id`) VALUES
(1, 1),
(1, 3),
(3, 1);

CREATE TABLE `module_widget_portfolio_1` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `css_class` varchar(100) DEFAULT NULL,
  `theme` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `module_widget_portfolio_1` (`id`, `module_id`, `title`, `css_class`, `theme`, `created_at`, `updated_at`) VALUES
(1, 10, 'Why should you train with us?', '', '', '2016-07-10 01:16:21', '2016-07-10 01:16:21'),
(2, 17, 'hello', '', '', '2016-07-16 06:09:23', '2016-07-16 06:09:23'),
(3, 18, 'OUR SPECIFIED AND SPECIALIZED', '', 'image-list', '2016-07-20 05:37:35', '2016-07-20 05:46:21');

CREATE TABLE `module_widget_portfolio_1_items` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `widget_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `image` varchar(200) NOT NULL,
  `css_class` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `module_widget_portfolio_1_items` (`id`, `widget_id`, `title`, `description`, `image`, `css_class`, `created_at`, `updated_at`) VALUES
(2, 1, 'Profession Instructors', '<p>They are not a story teller. They have dozen of experience in real work. They know how to transfer thier knowledge and skills to you effectively.</p>', '1468142641.jpg', NULL, '2016-07-10 02:24:01', '2016-07-10 10:10:51'),
(3, 1, 'We care about your future', '<p>We cannot teach you everything, but we teach you for the needs of job market and the future of your career.</p>', '1468167671.jpg', NULL, '2016-07-10 02:25:01', '2016-07-10 09:21:11'),
(4, 1, 'Real Practical Lap', '<p>We provide you not just theory but experience of real work in our full-equipped lap.</p>', '1468146518.jpg', NULL, '2016-07-10 03:28:38', '2016-07-10 03:28:38'),
(5, 3, 'Cisco', '', '1469018765.png', NULL, '2016-07-20 05:46:05', '2016-07-20 05:46:05'),
(6, 3, 'Microsoft Certificate', '', '1469019541.png', NULL, '2016-07-20 05:59:01', '2016-07-20 05:59:01'),
(7, 3, 'BTI', '', '1469019588.png', NULL, '2016-07-20 05:59:48', '2016-07-20 05:59:48'),
(8, 3, 'Linux Professional', '', '1469019612.png', NULL, '2016-07-20 06:00:12', '2016-07-20 06:00:12'),
(9, 3, 'VMWare', '', '1469019636.png', NULL, '2016-07-20 06:00:36', '2016-07-20 06:00:36'),
(10, 3, 'Mikro Tik', '', '1469019668.png', NULL, '2016-07-20 06:01:08', '2016-07-20 06:01:08'),
(11, 3, 'Cisco 2', '', '1469019682.png', NULL, '2016-07-20 06:01:22', '2016-07-20 06:01:22');

CREATE TABLE `module_widget_portfolio_2` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `css_class` varchar(100) DEFAULT NULL,
  `show_category_filter` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `module_widget_portfolio_2` (`id`, `module_id`, `title`, `css_class`, `show_category_filter`, `created_at`, `updated_at`) VALUES
(1, 14, 'Our Available Courses', '', 1, '2016-07-11 06:34:58', '2016-07-13 07:54:25'),
(2, 15, 'What would you like to become?', '', 0, '2016-07-16 00:02:36', '2016-07-16 01:52:48'),
(3, 16, 'Job vacancies', '', 1, '2016-07-16 05:59:23', '2016-07-16 05:59:23');

CREATE TABLE `module_widget_portfolio_2_category` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `widget_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `module_widget_portfolio_2_category` (`id`, `widget_id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'database', 'Database', '2016-07-11 15:22:28', '2016-07-11 15:22:28'),
(2, 1, 'network', 'Network', '2016-07-12 07:45:23', '2016-07-13 07:47:40'),
(3, 1, 'system', 'System', '2016-07-12 07:46:33', '2016-07-12 07:46:33'),
(4, 1, 'programming', 'Programming', '2016-07-13 09:20:24', '2016-07-13 09:20:24'),
(5, 2, 'uncategorized', 'Uncategorized', '2016-07-16 00:03:13', '2016-07-16 00:03:13'),
(6, 3, 'uncategorized', 'Uncategorized', '2016-07-16 05:59:47', '2016-07-16 05:59:47'),
(7, 1, 'uncategorized', 'Uncategorized', '2016-07-18 05:08:54', '2016-07-18 05:08:54');

CREATE TABLE `module_widget_portfolio_2_items` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `widget_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text,
  `image` varchar(200) NOT NULL,
  `css_class` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `module_widget_portfolio_2_items` (`id`, `widget_id`, `title`, `slug`, `description`, `image`, `css_class`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cisco CCNA', 'cisco-ccna', '<div id="desc" data-action="full-description-read" data-course-id="BkMTdlta" data-user-id="" data-target-selector-class="js-simple-collapse-more-btn" data-purpose="course-description">\r\n<h3>Course Description</h3>\r\n<div data-more="Full details">\r\n<div>\r\n<p>One of the biggest issue with CCNAs is that they do not take their Training seriously. With this course, we will dive into the necessary technology that you will need to pass the CCNA exam and be a real CCNA at your job. CCNA is meant for anyone who wants to be in the networking field or to get certified.<br /><br />Use this course along with your CCNA books and your labs. You will find that there is lots of topics and lots of training. You want to be a CCNA, here is the place to do it.<br /><br />With this course you will learn the below topics and more:<br /><br />Networking Fundamentals, How a switch operates, IP Address and Subnetting, Routing Protocols like RIP, EIGRP, and OSPF. You will need to practice what you have learned on real equipment which includes 3 routers and 3 switches.&nbsp;<br /><br />If you do not have real equipment, you can purchase it off ebay. If that is sill not an option, then you can use an emulator like GNS3 but this will not allow you do perform switching is a reliable method. All configurations in this course is done on real live equipment.<br /><br />This is a detailed course and requires the mindset of discipline and patience to become a CCNA. No Prior Knowlege is neeeded.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div id="requirements">\r\n<h3>What are the requirements?</h3>\r\n<ul>\r\n<li>This course requires mental focus and determination</li>\r\n<li>Requires Time and self-effort along with going through the course</li>\r\n<li>Requires no pre-knowledge of Networking</li>\r\n<li>Requires Extra Reading on topics and lots of hours of labbing</li>\r\n<li>Must be prepared to work hard and put in the time to get through it all</li>\r\n</ul>\r\n</div>\r\n<div id="what-you-get">\r\n<h3>What am I going to get from this course?</h3>\r\n<div data-more="Full details">\r\n<div>\r\n<ul>\r\n<li>Understand the Basics of Networking</li>\r\n<li>Be able to setup Routers and Switches</li>\r\n<li>Learn the OSI Model</li>\r\n<li>Go through the TCP/IP</li>\r\n<li>Understand how a LAN Operates</li>\r\n<li>Learn the IOS</li>\r\n<li>Become Familiar with Cisco ISO</li>\r\n<li>Learn Port Security</li>\r\n<li>Understand VLANs</li>\r\n<li>Knowing the existing of DTP</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div id="who-should-attend">\r\n<h3>What is the target audience?</h3>\r\n<div data-more="Full details">\r\n<div>\r\n<ul>\r\n<li>Anyone who wants a CCNA Certification</li>\r\n<li>Those who need a solid understanding of Routing and Switching</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>', '1468432271.png', NULL, '2016-07-11 10:25:13', '2016-07-13 10:51:12'),
(2, 1, 'Oracle 12c', 'oracle-12c', '<div id="desc" data-action="full-description-read" data-course-id="BkcTdV5a" data-user-id="" data-target-selector-class="js-simple-collapse-more-btn" data-purpose="course-description">\r\n<h3>Course Description</h3>\r\n<div data-more="Full details">\r\n<div>\r\n<p><strong>Quick Info:</strong></p>\r\n<ul>\r\n<li>Course Launched on: 19-May-2016</li>\r\n<li><strong>More than 220 Lectures</strong></li>\r\n<li>Very Comprehensive with extra&nbsp;lectures on&nbsp;Database Administration</li>\r\n<li>May help in obtaining&nbsp;Oracle Database&nbsp;12c&nbsp;SQL&nbsp;Certification.</li>\r\n<li>With&nbsp;FULL&nbsp;Subtitles&nbsp;for all the video lessons</li>\r\n</ul>\r\n<p><strong>About This Course:</strong></p>\r\n<p>Welcome to the course, \'Oracle SQL: Oracle Database 12c SQL Certified Associate\'.</p>\r\n<p>This course introduces SQL, which is an acronym for \'Structured Query Language\', to its students. This is based on Oracle\'s SQL&nbsp;implementation for Oracle Databases. The lessons are based on Oracle 12c Database and SQL&nbsp;Developer Tools running in Windows 10.</p>\r\n<p><strong>About SQL:</strong></p>\r\n<p>SQL&nbsp;is used to interact with Database Systems. As per ANSI (American National Standards Institute), SQL&nbsp;is the standard language for Relational Database Management Systems.</p>\r\n<p>SQL has been the prominent language to interact with various Database Systems for many decades. While many languages that existed&nbsp;two decades ago are extinct now, SQL has always maintained its supremacy in the RDBMS world. Over the time, it has only advanced with new features and standards. And it seems to stay that way for years to come.</p>\r\n<p><strong>About Oracle Database:</strong></p>\r\n<p>Oracle Database is one of the prominent Database Systems&nbsp;in the RDBMS (Relational Database Management Systems) segment. Some of the other prominent&nbsp;Database Systems are</p>\r\n<ul>\r\n<li>Microsoft SQL Server</li>\r\n<li>MySQL</li>\r\n<li>Sybase ASE.</li>\r\n</ul>\r\n<div>They also use SQL to interact with their Database Systems. While there are subtle differences between each of their SQL implementations, a SQL as a whole, is generally very standard. So&nbsp;a person with SQL knowledge in one platform such as Oracle,&nbsp;may find it easier to learn and code for other&nbsp;Database Systems such as Microsoft SQL or MySQL.&nbsp;</div>\r\n<div>The point is, once you learn SQL, then your reach into the job market is very wide.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>About the Curriculum:</strong></div>\r\n<ul>\r\n<li>The curriculum has been carefully designed to introduce the Oracle RDBMS environment first.</li>\r\n<li>Then it moves on to various types of SQL Statements such as DDL, DML and TCL.</li>\r\n<li>And next, it goes to the depths of various SQL Statements, Conditions, Sorting, Functions, Grouping etc..</li>\r\n<li>It also gives Database Administration tips, as needed.</li>\r\n<li>It is also&nbsp;covers most of the topics&nbsp;from the&nbsp;Oracle SQL Certification Exam 1Z0-071</li>\r\n</ul>\r\n<div>&nbsp;</div>\r\n<div><strong>Oracle Certification:</strong></div>\r\n<ul>\r\n<li>Oracle awards certain certifications that are recognized globally</li>\r\n<li>One such certification is Oracle Database 12c SQL Certified Associate</li>\r\n<li>The exam for that certification is (currently as of May 2016), 1Z0-071.</li>\r\n<li>The topics&nbsp;in this course covers most of the topics for that exam.</li>\r\n</ul>\r\n<div>&nbsp;</div>\r\n<div><strong>Oracle Certification - Declarations</strong></div>\r\n<ul>\r\n<li>&nbsp;While this course covers most of the topics for that exam, this course is not a sole material for that exam. Additional materials such as Oracle\'s recommended Books may be needed.</li>\r\n<li>This course is&nbsp;NOT an official course from&nbsp;Oracle Corporation.</li>\r\n<li>This course has been developed individually by its author.</li>\r\n</ul>\r\n<div>&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id="requirements">\r\n<h3>What are the requirements?</h3>\r\n<ul>\r\n<li>Basic computer skills</li>\r\n<li>Strong motivation to learn</li>\r\n<li>Download and install Oracle 12c in Windows 10 as explained in one of the lectures</li>\r\n<li>Use Oracle SQL Developer in Windows 10 as explained in the lectures</li>\r\n</ul>\r\n</div>\r\n<div id="what-you-get">\r\n<h3>What am I going to get from this course?</h3>\r\n<div data-more="Full details">\r\n<div>\r\n<ul>\r\n<li>Do database development</li>\r\n<li>Develop codes using Oracle SQL</li>\r\n<li>Understand the fundamentals of SQL (Structured Query Language)</li>\r\n<li>Understand the basics of Oracle RDBMS Architecture</li>\r\n<li>Learn the basics of Oracle RDBMS Architecture</li>\r\n<li>Can gain considerable SQL knowledge to apply for a beginner level, SQL Developer or Database Developer Job</li>\r\n<li>Understand about Oracle 12c Database</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<div id="who-should-attend">\r\n<h3>What is the target audience?</h3>\r\n<div data-more="Full details">\r\n<div>\r\n<ul>\r\n<li>This SQL course is for beginners who would like to learn about SQL syntax and get into SQL Development. No prior programming knowledge is needed.</li>\r\n<li>This is probably not for you if you are looking for advanced and complex queries</li>\r\n<li>This course covers most of the topics for the Oracle SQL Certification exam, 1Z0-071. So this course can also be helpful, along with Oracle\'s recommended study materials, if you are planning to get Oracle\'s SQL Certification such as &ldquo;Oracle Database 12c SQL Certified Associate&rdquo;</li>\r\n<li>College Students can take this course to understand SQL and Oracle Database Fundamentals</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>', '1468432297.jpg', NULL, '2016-07-11 10:34:02', '2016-07-13 10:51:37'),
(3, 1, 'Java', 'java', '<p><span style="color: #333333; font-family: OpenSans, Arial, sans-serif; line-height: 19px; white-space: pre-wrap;">In this course, you will use computers to creatively design web pages using HTML and CSS. You will then use Javascript to develop programs and algorithms--ways to get the computer to solve problems. As you progress, you will master the programming process that will be used through the remainder of the courses in this Specialization. After completing this course you will be able to: 1. Make a web page with HTML and CSS; 2. Explain the high-level process of developing a program; 3. Think critically about how to solve a problem; 4. Solve programming problems with Javascript, including if/else and looping constructs; 5. Use Javascript to manipulate images and process data; and 6. Recognize debugging as an application of the scientific method. By the end of this course, you will complete a mini-project where you will use Javascript to create your own images algorithmically and a website you have built with HTML, CSS, and Javascript.</span></p>', '1468432362.png', NULL, '2016-07-13 09:20:42', '2016-07-13 10:52:42'),
(4, 2, 'Oracle DBA', 'oracle-dba', '<p>Oracle is among the world\'s most complex and sophisticated databases, and mastering this complex set of computer programs requires many college-level skills.</p>\r\n<p>Learning Oracle is only appropriate for experienced computer scientists and information systems professionals with appropriate prerequisite training.</p>\r\n<p>Every year, young computer professionals leave the hallowed halls and ivory towers of college and survey the landscape for computer jobs. They look at the salary surveys and drool at the&nbsp;<a href="http://www.dba-oracle.com/t_2010_oracle_salary_survey.htm">average Oracle DBA salary of $100,000</a>&nbsp;and the prospect of earning up to $250,000 per year as a production DBA.&nbsp; Many of them don\'t know what a DBA does, but they sure like the money.&nbsp;</p>\r\n<p>An Oracle DBA is a senior-level manager who often earns as much as a Vice President, and has lots of responsibility, managing the mission-critical data for the whole company.&nbsp;</p>\r\n<p style="padding-left: 30px;"><strong>WARNING!</strong>&nbsp;&nbsp;Some fraudsters prey on the uninitiated and say that Oracle is an easy to learn trade.&nbsp; They are trying to sell "DBA Boot camp" training courses to people who do not possess the academic background to perform the job.&nbsp; Remember, a Database Administrator is a profession, just like an architect, business executive or attorney.&nbsp;&nbsp;<a href="http://www.dba-oracle.com/t_oracle_dba_bootcamp_scam.htm">Oracle DBA boot camp scam</a>.&nbsp;</p>\r\n<p>Like any profession, becoming a DBA requires years of college preparation and many years of careful preparation. Most beginning DBA\'s start learning Oracle after earning a Bachelors or masters degree in computer science or information systems.</p>', '1468654974.png', NULL, '2016-07-16 00:42:55', '2016-07-16 00:42:55'),
(5, 2, 'Java Developer', 'java-developer', '<p>Java Standard Edition has gone through numerous major revisions during its history; these have typically been identified by code names like Dolphin or Merlin. There have been many more security updates and fixes that haven&rsquo;t been honored with names. The development process is ongoing. What does this mean to a programmer? Some very savvy Java developers are hired by the Oracle company itself, working on new releases of JSE or helping create the Oracle Cloud Social Platform!</p>\r\n<div>30% job growth in the software development industry between 2010 and 2020. ~ BLS</div>\r\n<p>The majority of Java developers, though, work for other companies in industries from content management to health care. Starbucks and Wells Fargo are among the big name companies that sometimes advertise for software engineers with Java expertise.</p>\r\n<p>Java developers create dynamic applications and websites. Some design interfaces; others do work that&rsquo;s completely behind the scenes. One of the basic duties is writing class files. Java developers work at all stages of the engineering process, though: soliciting requirements, designing prototypes, and configuring products.</p>\r\n<p>There are different types of Java developer, proficient in different Java systems (standard, enterprise, and mobile). JEE (or J2EE) development is sometimes considered more advanced than JSE, even though some things that must be done by hand in JSE are automated in JEE. JEE projects are often large scale and transactional.</p>\r\n<p>Some Java developers advance to lead or architect positions. A senior Java developer may analyze complex problems, develop documentation, review coding, and evaluate the development process. An architect, meanwhile, directs the project at the front end. EE architect is among the highest positions a developer can attain.</p>\r\n<p>Like other computer engineers and programmers, Java developers often work long hours. Some industries, like gaming, are known for tight deadlines. The job is not physically demanding, however. Some work environments are quite casual.</p>', '1468655852.jpg', NULL, '2016-07-16 00:57:32', '2016-07-16 00:57:32'),
(6, 1, 'happy', 'happy', '<p>adsdasdsd</p>', '1468675260.png', NULL, '2016-07-16 06:21:00', '2016-07-16 06:21:00');

CREATE TABLE `module_widget_portfolio_2_item_categories` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `module_widget_portfolio_2_item_categories` (`item_id`, `category_id`) VALUES
(1, 1),
(2, 1),
(3, 1);

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

INSERT INTO `pages` (`id`, `display_name`, `name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 'This is default page for frontend', 1, 1, '2016-07-03 10:21:56', '2016-07-04 08:55:33'),
(2, 'Career Aspiration', 'career-aspiration', '', 1, 1, '2016-07-03 10:24:45', '2016-07-16 00:57:59'),
(5, 'Job Vancdies', 'job-vacancy', '', NULL, NULL, '2016-07-16 05:10:59', '2016-07-16 05:10:59');

CREATE TABLE `page_modules` (
  `page_id` mediumint(9) NOT NULL,
  `module_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `page_modules` (`page_id`, `module_id`) VALUES
(2, 15),
(5, 16),
(1, 10),
(1, 1),
(1, 14),
(1, 13),
(1, 18),
(1, 17);

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `permission` (
  `id` smallint(5) NOT NULL,
  `name` varchar(80) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `roles` (
  `id` tinyint(4) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `level`, `created_at`, `updated_at`) VALUES
(1, 'root', 'Root', 'Super user', 1, '2016-06-30 17:00:00', '2016-06-30 17:00:00'),
(2, 'admin', 'Administrator', 'Administrator can do everything except touching root user.', 2, '2016-07-02 04:08:58', '2016-07-02 04:08:58'),
(3, 'site-owner', 'Website Owner', 'Website owner can edit page content, manage lower level users', 3, '2016-07-01 13:28:48', '2016-07-02 02:04:33'),
(5, 'visitor', 'Visitor', 'Visitor can only visit frontend website', 4, '2016-07-02 02:40:28', '2016-07-02 02:40:28');

CREATE TABLE `role_permission` (
  `role_id` tinyint(4) NOT NULL,
  `permission_id` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

INSERT INTO `settings` (`id`, `name`, `display_name`, `description`, `value`, `setting_default`, `created_at`, `updated_at`) VALUES
(1, 'header-logo', 'Header Logo', 'The logo that appears on top of the page', 'logo.png', 0, '2016-07-06 17:19:26', '2016-07-08 07:35:34'),
(2, 'footer-logo', 'Footer Logo', 'Logo that appears on the bottom of the page', 'logo.png', 0, '2016-07-06 17:19:26', '2016-07-08 07:35:34'),
(3, 'company-address', 'Company Address', 'Location address of the company', '#46, Street 558, Boeng Kork I, Khan Toulkork, Phnom Penh, Cambodia ', 0, '2016-07-06 17:19:26', '2016-07-19 09:16:06'),
(4, 'company-contact-number', 'Company contact number', 'Phone number for contact company', '023 555 31 38 ', 0, '2016-07-06 17:19:26', '2016-07-19 09:16:06'),
(5, 'company-contact-email', 'Company contact email', 'Email for contact company', 'info@genevotech.com', 0, '2016-07-06 17:19:26', '2016-07-19 09:16:06'),
(6, 'company-name', 'Company Name', '', 'Genevo Technology', 1, '2016-07-19 15:30:14', '2016-07-19 09:16:06'),
(7, 'company-map-coordination', 'Map Coordinatoin', '', '11.579605, 104.901490', 1, '2016-07-19 15:49:37', '2016-07-19 15:49:37'),
(8, 'company-map-longitude', 'Map Longtitude', '', '104.901490', 1, '2016-07-19 15:57:19', '2016-07-19 15:57:19');

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

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admininistrator', 'admin@gmail.com', '$2y$10$LnYvzbIzDzx4ezze7EJ67uhLuazGK.f9yBPR7/BMjB1WEaqmhXkDC', 'O3yqVOJkV0KsIIrMWWAtykF2soBD2tkkOPveilLCIUlcCi6BFtiBXehPZbGT', '2016-06-30 17:00:00', '2016-07-05 10:59:15'),
(2, 2, 'Mao Meyleang', 'mao.meyleang@gmail.com', '$2y$10$oDmZzx77o46tb02VQ4LmW.qvo/K6roMGsrj6SbOrOtrMh1bQsia/K', NULL, '2016-06-30 17:00:00', '2016-07-01 19:38:23'),
(3, 3, 'PON Lyhong', 'lyhong.pon@gmail.com', '$2y$10$BpWMqQkwGNiwFaPGlolZbO2bl2FUJX/bIJ91lkt7QwZzEFkNoZ22a', 'h71bbNoLya22B6lm2Y9yovuL48izpBL2voisYXghmHGwliUvee4qJNBfqIqE', '2016-07-01 22:32:56', '2016-07-03 00:03:58'),
(20, 3, 'Kong Sothorn', 'sothorn.kong@gmail.com', '123456', NULL, '2016-07-03 00:17:02', '2016-07-03 00:17:02');


ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `menu_position`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `menu_site`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mod_UNIQUE` (`id`);

ALTER TABLE `module_widget_basic`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `module_widget_contact_form`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `module_widget_job_listing`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `module_widget_job_listing_categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `module_widget_job_listing_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_widget_job_listing_items_parent_id_index` (`parent_id`),
  ADD KEY `module_widget_job_listing_items_lft_index` (`lft`),
  ADD KEY `module_widget_job_listing_items_rgt_index` (`rgt`);

ALTER TABLE `module_widget_job_listing_item_categories`
  ADD PRIMARY KEY (`item_id`,`category_id`);

ALTER TABLE `module_widget_portfolio_1`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `module_widget_portfolio_1_items`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `module_widget_portfolio_2`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `module_widget_portfolio_2_category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `module_widget_portfolio_2_items`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);


ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
ALTER TABLE `menu_position`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `menu_site`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `modules`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
ALTER TABLE `module_widget_basic`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
ALTER TABLE `module_widget_contact_form`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `module_widget_job_listing`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `module_widget_job_listing_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `module_widget_job_listing_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `module_widget_portfolio_1`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `module_widget_portfolio_1_items`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
ALTER TABLE `module_widget_portfolio_2`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `module_widget_portfolio_2_category`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
ALTER TABLE `module_widget_portfolio_2_items`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `permission`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
ALTER TABLE `roles`
  MODIFY `id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `settings`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
