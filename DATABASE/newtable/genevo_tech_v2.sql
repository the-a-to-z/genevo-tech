-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2016 at 02:51 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

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
  `slug` varchar(80) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `css_icon_class` varchar(50) DEFAULT NULL,
  `menu_site_id` tinyint(1) NOT NULL,
  `permission_id` smallint(5) DEFAULT NULL,
  `menu_position_id` tinyint(1) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `page_id`, `slug`, `name`, `description`, `css_icon_class`, `menu_site_id`, `permission_id`, `menu_position_id`, `parent_id`, `active`, `created_at`, `updated_at`) VALUES
(1, NULL, 'users', 'Users', 'List All Users', 'pe-7s-users', 2, 1, 2, 0, 1, '2016-07-01 09:33:45', '2016-07-01 09:33:45'),
(2, NULL, 'roles', 'Roles', 'Display all roles', 'pe-7s-id', 2, 2, 2, 0, 1, '2016-07-01 09:39:09', '2016-07-01 09:39:09'),
(3, NULL, 'permissions', 'Permissions', 'Manage Permissions', 'pe-7s-medal', 2, 6, 2, 0, 1, '2016-07-02 06:14:10', '2016-07-02 06:14:10'),
(4, NULL, 'menus', 'Menu', 'Manage menus', 'pe-7s-menu', 2, 36, 2, 0, 1, '2016-07-03 08:12:42', '2016-07-03 08:12:42'),
(5, 1, 'home', 'Home', 'Default page for frontend', NULL, 2, 0, 1, 0, 1, '2016-07-03 02:45:13', '2016-07-03 02:45:13'),
(6, NULL, 'career-inspiration', 'Career Inspiration', '', NULL, 2, 0, 1, 0, 1, '2016-07-03 02:54:52', '2016-07-03 02:54:52'),
(7, NULL, 'job-vacancies', 'Job Vacandies', '', NULL, 2, 0, 1, 0, 1, '2016-07-03 02:56:19', '2016-07-03 02:56:19'),
(8, NULL, 'pages', 'Pages', '', 'pe-7s-browser', 1, 41, 2, 0, 1, '2016-07-03 03:48:04', '2016-07-03 03:48:04'),
(9, NULL, 'modules', 'Modules', '', 'pe-7s-copy-file', 1, 43, 2, 0, 1, '2016-07-03 05:12:51', '2016-07-03 05:12:51');

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
(1, 'frontend', '', 'Backend'),
(2, 'backend', 'admin/', 'Frontend');

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
  `display_name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `active`) VALUES
(1, 'about-description', 'About Genevo Description', '2015-11-17 00:00:00', NULL, 1),
(10, 'home-slideshow', 'Home slideshow', '2016-07-03 23:00:40', '2016-07-03 23:00:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module_about_description`
--

CREATE TABLE `module_about_description` (
  `id` tinyint(1) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text,
  `hide_title` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_about_description`
--

INSERT INTO `module_about_description` (`id`, `title`, `description`, `hide_title`, `created_at`, `updated_at`) VALUES
(1, 'What is Genevo?', '<p>&nbsp; &nbsp; &nbsp; Genovo tech is a technology training school located at Toul Kork, a great place for weekend party. Genovo was found in 2012 by two people, Mr Sok and Mr Sao, who have achieved the great skills and cerifications from largest technology organization in the world. Genovo has seen the future of technology and we are willing to give new students the best education as possible to be successful in their future career.</p>', 0, '2016-07-03 19:00:29', '2016-07-04 01:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `module_slider`
--

CREATE TABLE `module_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'tp-caption rev-subheading sfb', 'center ', '250', 300, 2500, '', ''),
(3, 'tp-caption rev-subheading sfb rev-white', '100', '330', 300, 2500, '', ''),
(4, 'tp-caption rev-subheading sfl', '290', '330', 500, 3000, '', ''),
(5, 'tp-caption rev-subheading sfr', '490', '400', 500, 3000, '', ''),
(6, 'tp-caption rev-desc fade rev-white', '100', '270', 500, 2700, '', ''),
(7, 'tp-caption customin customout rev-heading rev-white', 'center', '300', 500, 2500, 'x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;', 'x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;');

-- --------------------------------------------------------

--
-- Table structure for table `module_slider_detail`
--

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
  `slider_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `module_slider_text_type`
--

CREATE TABLE `module_slider_text_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_slider_text_type`
--

INSERT INTO `module_slider_text_type` (`id`, `name`, `value`) VALUES
(1, 'Title', 'title'),
(2, 'Label', 'label'),
(3, 'Text (Line three)', 'text'),
(4, 'Button (Single button)', 'button'),
(5, 'Button One', 'button_one'),
(6, 'Button Two', 'button_two');

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
  `ceated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `display_name`, `name`, `description`, `created_by`, `updated_by`, `ceated_at`, `updated_at`) VALUES
(1, 'Home', 'home', 'This is default page for frontend', 1, 1, '2016-07-03 10:21:56', '2016-07-03 10:21:56'),
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
(1, 'view-users', 'View User list', 'test', '2016-07-02 12:06:48', '2016-07-02 05:03:44'),
(2, 'view-roles', 'List Roles', 'Display all roles', '2016-07-02 11:58:40', '2016-07-01 09:40:08'),
(3, 'create-user', 'Add user', NULL, '2016-07-02 04:27:58', '2016-07-01 09:40:58'),
(4, 'edit-user', 'Edit user', NULL, '2016-07-01 09:40:58', '2016-07-01 09:40:58'),
(5, 'view-permissions', 'Permissions', 'Manage Permissions', '2016-07-02 12:05:43', '2016-07-02 06:13:32'),
(6, 'create-permission', 'Create new permission', NULL, '2016-07-02 06:13:32', '2016-07-02 06:13:32'),
(7, 'create-role', 'Create Role', NULL, '2016-07-02 06:15:58', '2016-07-02 06:15:58'),
(8, 'edit-role', 'Edit Role', NULL, '2016-07-02 06:15:58', '2016-07-02 06:15:58'),
(9, 'delete-user', 'Delete User', NULL, '2016-07-02 06:17:05', '2016-07-02 06:17:05'),
(10, 'delete-role', 'Delete Role', NULL, '2016-07-02 06:17:05', '2016-07-02 06:17:05'),
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
(45, 'edit-module', 'Edit module', '', '2016-07-03 09:18:40', '2016-07-03 09:18:40');

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
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(1, 12),
(1, 14),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 13),
(3, 1),
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
(3, 10),
(1, 33),
(1, 32),
(1, 34),
(1, 36),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45);

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
(1, 1, 'Admininistrator', 'admin@gmail.com', '$2y$10$LnYvzbIzDzx4ezze7EJ67uhLuazGK.f9yBPR7/BMjB1WEaqmhXkDC', 'emoaFINXWoLz5wkGydBluLPQ67sUrAYCIMnlvK0O2ePLj1OjVPQO5AtsWo6q', '2016-06-30 17:00:00', '2016-07-04 02:01:58'),
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
-- Indexes for table `module_about_description`
--
ALTER TABLE `module_about_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_slider`
--
ALTER TABLE `module_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_slider_animation`
--
ALTER TABLE `module_slider_animation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_slider_detail`
--
ALTER TABLE `module_slider_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_slider_text_type`
--
ALTER TABLE `module_slider_text_type`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `module_about_description`
--
ALTER TABLE `module_about_description`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `module_slider`
--
ALTER TABLE `module_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `module_slider_animation`
--
ALTER TABLE `module_slider_animation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `module_slider_detail`
--
ALTER TABLE `module_slider_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `module_slider_text_type`
--
ALTER TABLE `module_slider_text_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
