-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 11:16 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sthapotik_nirman`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `hover_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(1023) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `category_id`, `hover_text`, `image`, `description`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Somporko', 2, '', '2018-02-12_18-15-33_88262.jpg', '', 1, 2, NULL, NULL, '2018-02-11 09:07:49', '2018-02-12 12:15:33'),
(2, 'T H Farhad Residence', 1, '', '2018-02-12_17-07-12_61702.jpg', '', 1, 2, NULL, NULL, '2018-02-11 09:15:52', '2018-02-12 11:46:52'),
(3, 'Kazi Agro Residence', 1, '', '2018-02-11_15-16-56_24046.jpg', '', 1, 2, NULL, NULL, '2018-02-11 09:16:56', '2018-02-12 10:54:01'),
(4, 'Cordial Design Ltd1', 5, '', '2018-02-12_17-09-48_95253.jpg', '', 2, 2, NULL, NULL, '2018-02-12 10:24:45', '2018-02-12 11:09:48'),
(5, 'A One Polar Bhulta', 5, '', 'A One Polar Bhulta.jpg', '', 2, 2, NULL, NULL, '2018-02-12 10:30:00', '2018-02-12 10:30:35'),
(6, 'JAGANNATH UNIVERSITY', 3, '', '2018-02-12_16-40-10_22646.jpg', '', 2, NULL, NULL, NULL, '2018-02-12 10:40:10', '2018-02-12 10:40:10'),
(7, 'Liberty Kintware Ltd', 3, '', '2018-02-12_16-42-26_69978.jpg', '', 2, NULL, NULL, NULL, '2018-02-12 10:42:26', '2018-02-12 10:42:26'),
(8, 'Micro Fiber Office', 3, '', '2018-02-12_16-46-39_99492.jpg', '', 2, 2, NULL, NULL, '2018-02-12 10:45:44', '2018-02-12 10:46:39'),
(9, 'Crown Cement', 4, '', '2018-02-12_16-49-39_81648.jpg', '', 2, 1, NULL, NULL, '2018-02-12 10:49:39', '2018-07-10 06:43:28'),
(10, 'Single Family Residence Banani', 1, '', '2018-02-12_17-15-43_12478.jpg', '', 2, 2, NULL, NULL, '2018-02-12 10:52:05', '2018-02-12 11:15:43'),
(11, 'ASSURANCE APARTMENT ', 2, '', '2018-02-12_17-02-46_48326.jpg', '', 2, NULL, NULL, NULL, '2018-02-12 11:02:46', '2018-02-12 11:02:46'),
(12, 'Micro Fiber Office2', 4, '', '2018-02-12_17-21-51_51306.jpg', '', 2, 2, NULL, NULL, '2018-02-12 11:20:59', '2018-02-12 11:21:51'),
(13, 'Micro Fiber Office3', 4, '', '2018-02-12_17-57-03_87232.jpg', '', 2, NULL, NULL, NULL, '2018-02-12 11:57:03', '2018-02-12 11:57:03'),
(14, 'Micro Fiber Office4', 4, '', '2018-02-12_17-57-54_95953.jpg', '', 2, NULL, NULL, NULL, '2018-02-12 11:57:54', '2018-02-12 11:57:54'),
(15, 'Micro Fiber Office5', 4, '', '2018-02-12_17-59-38_11436.jpg', '', 2, NULL, NULL, NULL, '2018-02-12 11:59:38', '2018-02-12 11:59:38'),
(16, 'Micro Fiber Office6', 4, '', '2018-02-12_18-03-26_38792.jpg', '', 2, NULL, NULL, NULL, '2018-02-12 12:03:26', '2018-02-12 12:03:26'),
(17, '8 Storied Apartment Uttara', 1, '', '2018-02-12_18-05-57_76246.jpg', '', 2, NULL, NULL, NULL, '2018-02-12 12:05:57', '2018-02-12 12:05:57'),
(18, 'Indira Road Interior', 2, '', '2018-02-12_18-10-50_32026.jpg', '', 2, NULL, NULL, NULL, '2018-02-12 12:10:50', '2018-02-12 12:10:50'),
(19, 'nai', 0, '', '2018-02-12_18-13-19_48421.jpg', '', 2, NULL, NULL, NULL, '2018-02-12 12:13:19', '2018-02-12 12:13:19'),
(23, 'Mr Shafi Residence', 1, '', 'Shafi_Residence_P2.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Mr Atik Residence', 1, '', 'Atik_Residence_P1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Dr Shalehin Residence', 1, '', 'Dr_Shalehin_P1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Somporko at Bashundhara', 1, '', 'Somporko_p1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Midland Knitwear Ltd', 5, '', 'Midland Knitwear Ltd1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Apartment Interior For Assurance 8', 2, '', 'APARTMENT INTERIOR FOR ASSURANCE VIEW 08.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'RESIDENCE INTERIOR MR FARHAD 12', 2, '', 'RESIDENCE INTERIOR FOR MR FARHAD 12.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'RESIDENCE INTERIOR MR FARHAD 2', 2, '', 'RESIDENCE INTERIOR FOR MR FARHAD VIEW 02.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'RESIDENCE INTERIOR MR WADUD 1', 2, '', 'RESIDENCE INTERIOR FOR MR WADUD VIEW 01.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'RESIDENCE INTERIOR MR FARHAD 4', 2, '', 'RESIDENCE INTERIOR FOR MR FARHAD_ 04.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(32, ' 	RESIDENCE INTERIOR MR FARHAD 5', 2, '', 'RESIDENCE INTERIOR FOR MR FARHAD_5.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'APARTMENT INTERIOR  Joya Group', 2, '', 'APARTMENT INTERIOR AT Joya_Group.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'ETP AND FACTORY Midland Knitwear Ltd', 5, '', 'ETP AND FACTORY Midland Knitwear Ltd2.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'ETP AND FACTORY Midland Knitwear Ltd1', 5, '', 'ETP AND FACTORY BUILDING FOR MICRO FIBR_1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Factory A One Polar Bhulta', 5, '', 'Factory A One Polar Bhulta.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Cordial Design Ltd2', 5, '', 'FACTORY BUILDING FOR CORDIAL DESIGN LTD2 .jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Cordial Design Ltd3', 5, '', 'FACTORY BUILDING FOR CORDIAL DESIGN LTD3.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'MICRO FIBRE CHAIRMAN ROOM', 3, '', 'CHAIRMAN ROOM FOR QA.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'DIRECTOR ROOM FOR MICRO FIBRE', 3, '', 'DIRECTOR ROOM FOR MICRO FIBRE GROUP.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'FACTORY INTERIOR FOR MICRO FIBRE GROUP', 3, '', 'FACTORY INTERIOR FOR MICRO FIBRE GROUP.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'MD ROOM FOR MICRO FIBRE GROUP', 3, '', 'MD ROOM FOR MICRO FIBRE GROUP.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'MD ROOM FOR SMART CARE LTD', 3, '', 'MD ROOM FOR SMART CARE LTD.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'MEETING ROOM FOR QA', 3, '', 'MEETING ROOM FOR QA.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'MEETING ROOM FOR SMART CARE LTD', 3, '', 'MEETING ROOM FOR SMART CARE LTD.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'MULTIPURPOSE HALL SITE ', 3, '', 'MULTIPURPOSE HALL SITE IMAGE.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'OFFICE INTERIOR FOR LIBERTY KNITWEAR LTD', 3, '', 'OFFICE INTERIOR FOR LIBERTY KNITWEAR.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'OFFICE INTERIOR FOR QA', 3, '', 'OFFICE INTERIOR FOR QA2.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'RECEPTION FOR QA', 3, '', 'RECEPTION FOR QA.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'RECEPTION FOR SMART CARE', 3, '', 'RECEPTION FOR SMART CARE LTD.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'TOILET ZONE FOR QA', 3, '', 'TOILET ZONE FOR QA.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'MEETING ROOM', 3, '', 'MEETING ROOM.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'TRAINING ROOM ', 3, '', 'brand.PNG', '', NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'RESIDENCE INTERIOR FOR MR FARHAD 11', 2, '', 'RESIDENCE INTERIOR FOR MR FARHAD_11.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'APARTMENT INTERIOR AT INDIRA ROAD', 2, '', 'APARTMENT INTERIOR AT INDIRA ROAD.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'RESIDENCE INTERIOR FOR MR WADUD 3', 2, '', 'RESIDENCE INTERIOR FOR MR WADUD_03.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'APARTMENT INTERIOR FOR MR SAROWAR 1', 2, '', 'APARTMENT INTERIOR FOR MR SAROWAR_1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'APARTMENT INTERIOR FOR ASSURANCE 5', 2, '', 'APARTMENT INTERIOR FOR ASSURANCE_05.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'APARTMENT INTERIOR FOR ASSURANCE 6', 2, '', 'APARTMENT INTERIOR FOR ASSURANCE_06.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'vbnvbn', 4, '', 'CRM_field_user.PNG', '', NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'nb,mbn,', 2, '', 'dashbord.PNG', '', NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'f', 2, '', 'iDialer.PNG', '', NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'under mohsin', 10, 'test', 'CRM_agent.PNG', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_categories`
--

CREATE TABLE `project_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_categories`
--

INSERT INTO `project_categories` (`id`, `name`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Residential Building Project', 1, 1, NULL, NULL, '2018-02-08 11:42:16', '2018-02-11 04:39:00'),
(2, 'Residencial Interior Project', 1, 1, NULL, NULL, '2018-02-08 12:21:36', '2018-02-11 04:39:31'),
(3, 'Commercial Interior Project', 1, NULL, NULL, NULL, '2018-02-11 04:40:25', '2018-02-11 04:40:25'),
(4, 'Commercial Project', 1, NULL, NULL, NULL, '2018-02-11 04:42:19', '2018-02-11 04:42:19'),
(5, 'Factory Projects', 2, NULL, NULL, NULL, '2018-02-12 10:20:21', '2018-02-12 10:20:21'),
(10, 'mohsin', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_projects`
--

CREATE TABLE `sub_projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `sub_hover_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_description` varchar(1023) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_projects`
--

INSERT INTO `sub_projects` (`id`, `sub_name`, `project_id`, `sub_hover_text`, `sub_image`, `sub_description`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'MMMM', 2, 'gfdgdfgKKKK', 'cou.PNG', 'l;kjljk', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'mohsin', 2, 'iqbal', 'fgfghf.jpg', 'ssss', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'dghf', 2, 'gfhjgfj', 'empty_36302_36335.PNG', 'hjkhkhjk', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'fdhg', 6, '', 'cur_auto.PNG', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_categories`
--
ALTER TABLE `project_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_projects`
--
ALTER TABLE `sub_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_projects`
--
ALTER TABLE `sub_projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
