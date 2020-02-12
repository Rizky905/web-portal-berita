-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2019 at 10:28 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_create_articles`
--

CREATE TABLE `admin_create_articles` (
  `ID` int(11) NOT NULL,
  `ID_ARTICLE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_create_articles`
--

INSERT INTO `admin_create_articles` (`ID`, `ID_ARTICLE`) VALUES
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `admin_groups`
--

CREATE TABLE `admin_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_groups`
--

INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES
(1, 'webmaster', 'Webmaster'),
(2, 'admin', 'Administrator'),
(3, 'manager', 'Manager'),
(4, 'staff', 'Staff'),
(5, 'Editor', 'Pengedit'),
(6, 'Author', 'Pengesah');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES
(1, '127.0.0.1', 'webmaster', '$2y$08$VbBl6laOs0UEbQyQUAjXq.kp0pR8D8GvPXSTdb3xC2aU2S6tB3r8y', NULL, NULL, NULL, NULL, NULL, NULL, 1451900190, 1550130534, 1, 'Webmaster', ''),
(2, '127.0.0.1', 'admin', '$2y$08$7Bkco6JXtC3Hu6g9ngLZDuHsFLvT7cyAxiz1FzxlX5vwccvRT7nKW', NULL, NULL, NULL, NULL, NULL, NULL, 1451900228, 1550217917, 1, 'Admin', ''),
(3, '127.0.0.1', 'manager', '$2y$08$snzIJdFXvg/rSHe0SndIAuvZyjktkjUxBXkrrGdkPy1K6r5r/dMLa', NULL, NULL, NULL, NULL, NULL, NULL, 1451900430, 1550217905, 1, 'Manager', NULL),
(4, '127.0.0.1', 'staff', '$2y$08$NigAXjN23CRKllqe3KmjYuWXD5iSRPY812SijlhGeKfkrMKde9da6', NULL, NULL, NULL, NULL, NULL, NULL, 1451900439, 1550217889, 1, 'Staff', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users_groups`
--

CREATE TABLE `admin_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users_groups`
--

INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(13, 5, 2),
(14, 3, 3),
(15, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `ID_ARTICLES` int(11) NOT NULL,
  `TITLE_ARTICLES` varchar(50) DEFAULT NULL,
  `SUMMARY_ARTICLES` varchar(200) DEFAULT NULL,
  `BODY_ARTICLES` text,
  `CREATED_DATE` date DEFAULT NULL,
  `IS_HEADLINE` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`ID_ARTICLES`, `TITLE_ARTICLES`, `SUMMARY_ARTICLES`, `BODY_ARTICLES`, `CREATED_DATE`, `IS_HEADLINE`) VALUES
(1, 'Magang', 'Magang adalah syarat kelulusan', '<p>percobaan, ini hanyalah untuk simulasi</p><br><br>', '2019-02-14', 0),
(2, 'coba lagi', 'kenapa', 'kenapa aja sih<br>', '2019-02-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `articles_have_category`
--

CREATE TABLE `articles_have_category` (
  `ID_CATEGORY` int(11) NOT NULL,
  `ID_ARTICLES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles_have_category`
--

INSERT INTO `articles_have_category` (`ID_CATEGORY`, `ID_ARTICLES`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `articles_have_media`
--

CREATE TABLE `articles_have_media` (
  `ID_MEDIA` int(11) NOT NULL,
  `ID_ARTICLES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles_have_media`
--

INSERT INTO `articles_have_media` (`ID_MEDIA`, `ID_ARTICLES`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `articles_have_tag`
--

CREATE TABLE `articles_have_tag` (
  `ID_TAG` int(11) NOT NULL,
  `ID_ARTICLES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles_have_tag`
--

INSERT INTO `articles_have_tag` (`ID_TAG`, `ID_ARTICLES`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID_CATEGORY` int(11) NOT NULL,
  `NAME_CATEGORY` varchar(50) DEFAULT NULL,
  `SLUG_CATEGORY` varchar(50) DEFAULT NULL,
  `STATUS_CATEGORY` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID_CATEGORY`, `NAME_CATEGORY`, `SLUG_CATEGORY`, `STATUS_CATEGORY`) VALUES
(1, 'Sport', 'sport', 1),
(2, 'World', 'world', 1),
(3, 'ASAL-ASALAN', 'asal-asalan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `ID_MEDIA` int(11) NOT NULL,
  `TITLE_MEDIA` varchar(255) DEFAULT NULL,
  `DESCRIPTION_MEDIA` text,
  `URL_MEDIA` varchar(50) DEFAULT NULL,
  `CAPTION_MEDIA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`ID_MEDIA`, `TITLE_MEDIA`, `DESCRIPTION_MEDIA`, `URL_MEDIA`, `CAPTION_MEDIA`) VALUES
(1, 'Percobaan', 'Ini hanyalah sebuah percobaan', 'https://s.id/3lmFx', 'coba');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `ID_TAG` int(11) NOT NULL,
  `TAG_NAME` varchar(50) DEFAULT NULL,
  `SLUG` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`ID_TAG`, `TAG_NAME`, `SLUG`) VALUES
(1, 'tag 1', 'tag-1'),
(2, 'tag 2', 'tag-2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_create_articles`
--
ALTER TABLE `admin_create_articles`
  ADD PRIMARY KEY (`ID`,`ID_ARTICLE`);

--
-- Indexes for table `admin_groups`
--
ALTER TABLE `admin_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users_groups`
--
ALTER TABLE `admin_users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID_ARTICLES`);

--
-- Indexes for table `articles_have_category`
--
ALTER TABLE `articles_have_category`
  ADD PRIMARY KEY (`ID_CATEGORY`,`ID_ARTICLES`),
  ADD KEY `FK_ARTICLES_HAVE_CATEGORY2` (`ID_ARTICLES`);

--
-- Indexes for table `articles_have_media`
--
ALTER TABLE `articles_have_media`
  ADD PRIMARY KEY (`ID_MEDIA`,`ID_ARTICLES`),
  ADD KEY `FK_ARTICLES_HAVE_MEDIA2` (`ID_ARTICLES`);

--
-- Indexes for table `articles_have_tag`
--
ALTER TABLE `articles_have_tag`
  ADD PRIMARY KEY (`ID_TAG`,`ID_ARTICLES`),
  ADD KEY `FK_ARTICLES_HAVE_TAG2` (`ID_ARTICLES`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID_CATEGORY`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`ID_MEDIA`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`ID_TAG`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_groups`
--
ALTER TABLE `admin_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_users_groups`
--
ALTER TABLE `admin_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `ID_ARTICLES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID_CATEGORY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `ID_MEDIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `ID_TAG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles_have_category`
--
ALTER TABLE `articles_have_category`
  ADD CONSTRAINT `FK_ARTICLES_HAVE_CATEGORY` FOREIGN KEY (`ID_CATEGORY`) REFERENCES `category` (`ID_CATEGORY`),
  ADD CONSTRAINT `FK_ARTICLES_HAVE_CATEGORY2` FOREIGN KEY (`ID_ARTICLES`) REFERENCES `articles` (`ID_ARTICLES`);

--
-- Constraints for table `articles_have_media`
--
ALTER TABLE `articles_have_media`
  ADD CONSTRAINT `FK_ARTICLES_HAVE_MEDIA` FOREIGN KEY (`ID_MEDIA`) REFERENCES `media` (`ID_MEDIA`),
  ADD CONSTRAINT `FK_ARTICLES_HAVE_MEDIA2` FOREIGN KEY (`ID_ARTICLES`) REFERENCES `articles` (`ID_ARTICLES`);

--
-- Constraints for table `articles_have_tag`
--
ALTER TABLE `articles_have_tag`
  ADD CONSTRAINT `FK_ARTICLES_HAVE_TAG` FOREIGN KEY (`ID_TAG`) REFERENCES `tag` (`ID_TAG`),
  ADD CONSTRAINT `FK_ARTICLES_HAVE_TAG2` FOREIGN KEY (`ID_ARTICLES`) REFERENCES `articles` (`ID_ARTICLES`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
