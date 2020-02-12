-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2019 at 08:44 AM
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
(3, 6),
(4, 2),
(4, 5);

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
(3, 'editor', 'Pengedit'),
(4, 'author', 'Pengesah');

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
  `last_name` varchar(50) DEFAULT NULL,
  `CAN_CREATE` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `CAN_CREATE`) VALUES
(1, '127.0.0.1', 'webmaster', '$2y$08$VbBl6laOs0UEbQyQUAjXq.kp0pR8D8GvPXSTdb3xC2aU2S6tB3r8y', NULL, NULL, NULL, NULL, NULL, NULL, 1451900190, 1550456531, 1, 'Webmaster', '', 0),
(2, '127.0.0.1', 'admin', '$2y$08$7Bkco6JXtC3Hu6g9ngLZDuHsFLvT7cyAxiz1FzxlX5vwccvRT7nKW', NULL, NULL, NULL, NULL, NULL, NULL, 1451900228, 1553744373, 1, 'Admin', '', 0),
(3, '::1', 'editor', '$2y$08$mi0X9Z96FC8r7VPxWC3xLeYljtV.oe4I7Sv6clPDufU6SqVAqonca', NULL, NULL, NULL, NULL, NULL, NULL, 1550466617, 1553758774, 1, 'editor', '', 1),
(4, '::1', 'author', '$2y$08$YPvIv4938ZKSxoio3FvUlOqV5wzY37Baaf43iuLJsARvq0BHRir1a', NULL, NULL, NULL, NULL, NULL, NULL, 1550466626, 1550466721, 1, 'author', '', 1);

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
(3, 3, 3),
(4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `ID_ARTICLES` int(11) NOT NULL,
  `TITLE_ARTICLES` varchar(50) DEFAULT NULL,
  `SUMMARY_ARTICLES` varchar(200) DEFAULT NULL,
  `BODY_ARTICLES` text,
  `CREATED_DATE` datetime DEFAULT NULL,
  `IS_HEADLINE` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`ID_ARTICLES`, `TITLE_ARTICLES`, `SUMMARY_ARTICLES`, `BODY_ARTICLES`, `CREATED_DATE`, `IS_HEADLINE`) VALUES
(2, 'coba lagi', 'kenapa', '<p>kenapa aja sih<br></p>', '2019-03-28 11:03:12', 1),
(3, 'test', 'test', 'cobain aja sih<br>', '2019-03-28 13:24:50', 1),
(4, 'test category', 'cat', '<p>test category pagenation <a href=\"http://localhost/BeritaSatu/admin/www.google.com\" title=\"\" target=\"www.google.com\" aria-describedby=\"ui-tooltip-12\">www.google.com</a></p><p><a href=\"www.google.com\"></a></p>', '2019-03-28 13:25:11', 1),
(5, 'coba', 'tester', 'cobain cobain aja ea<br>', '2019-03-06 09:25:00', 1),
(6, 'Real Madrid', 'Tim Asal Spanyol', 'Real Madrid menjual pemain andalannya, adalah Ronaldo<br>', '2019-03-22 13:19:35', 1),
(7, 'percobaan embed', 'embeded to blank target', '<a href=\"https://www.google.com/\" target=\"_blank\">link to google</a>', '2019-03-28 13:25:25', 0),
(11, 'percobaan 4', 'ke 4 store', 'storing time<br>', '2019-03-28 13:25:33', 0);

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
(24, 5),
(23, 5),
(24, 2),
(23, 2),
(24, 3),
(24, 6),
(23, 6),
(24, 4),
(27, 7),
(27, 11);

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
(3, 5),
(4, 2),
(7, 6),
(9, 3),
(9, 7),
(10, 4),
(10, 11);

-- --------------------------------------------------------

--
-- Table structure for table `articles_have_tag`
--

CREATE TABLE `articles_have_tag` (
  `ID_TAG` int(11) NOT NULL,
  `ID_ARTICLES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID_CATEGORY` int(11) NOT NULL,
  `ID_PARENT_CATEGORY` int(11) DEFAULT NULL,
  `NAME_CATEGORY` varchar(50) DEFAULT NULL,
  `DESCRIPTION_CATEGORY` text,
  `SLUG_CATEGORY` varchar(50) DEFAULT NULL,
  `STATUS_CATEGORY` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID_CATEGORY`, `ID_PARENT_CATEGORY`, `NAME_CATEGORY`, `DESCRIPTION_CATEGORY`, `SLUG_CATEGORY`, `STATUS_CATEGORY`) VALUES
(23, NULL, 'Sport', NULL, 'sport', 1),
(24, 23, 'Sepak Bola', NULL, 'sepak-bola', 1),
(25, NULL, 'Kesehatan', NULL, 'kesehatan', 1),
(26, NULL, 'Dunia', NULL, 'dunia', 1),
(27, NULL, 'Nasional', NULL, 'nasional', 1),
(28, NULL, 'Otomotif', NULL, 'otomotif', 1),
(29, 26, 'Asia', NULL, 'asia', 1),
(31, 23, 'Basket', NULL, 'basket', 1),
(32, 26, 'Eropa', NULL, 'eropa', 1),
(33, 26, 'Afrika', NULL, 'afrika', 1),
(34, 26, 'Amerika', NULL, 'amerika', 1),
(35, NULL, 'Politik', NULL, 'politik', 1),
(36, NULL, 'Hiburan', NULL, 'hiburan', 1),
(37, NULL, 'Busana', NULL, 'busana', 1);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `ID_MEDIA` int(11) NOT NULL,
  `TITLE_MEDIA` varchar(255) DEFAULT NULL,
  `DESCRIPTION_MEDIA` text,
  `URL_MEDIA` varchar(255) DEFAULT NULL,
  `CAPTION_MEDIA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`ID_MEDIA`, `TITLE_MEDIA`, `DESCRIPTION_MEDIA`, `URL_MEDIA`, `CAPTION_MEDIA`) VALUES
(3, 'Logo-Navbar', 'Logo Website', 'navbar-logo.jpg', '#Logo'),
(4, 'Wolf', NULL, '772a1-wolf.jpg', '#wolf#serigala'),
(7, 'Ultron', NULL, 'b3aaa-ultron_avengers_age_of_ultron.jpg', NULL),
(8, 'Itachi', NULL, '49f7e-itachi.jpg', NULL),
(9, 'Rocket Racoon', 'Karakter Guardian of the Galaxy', '5267e-guardians_of_the_galaxy_raccoon_rocket_98783_1920x1080.jpg', '#rocket'),
(10, 'Captain Amerika Logo', 'Captain Amerika Logo with shield and name', '3d3f4-captain_america_marvel_hero_avenger_98389_2560x1600.jpg', '#captain');

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
(1, 'Sepak Bola', 'sepak-bola'),
(2, 'Liga Inggris', 'liga-inggris'),
(3, 'Liga Indonesia', 'liga-indonesia'),
(4, 'Liga Champions', 'liga-champions');

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
  ADD KEY `FK_ARTICLES_HAVE_CATEGORY` (`ID_CATEGORY`),
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
  ADD PRIMARY KEY (`ID_CATEGORY`) USING BTREE,
  ADD KEY `FK_CATEGORY_HAVE_PARENT` (`ID_PARENT_CATEGORY`);

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
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_users_groups`
--
ALTER TABLE `admin_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `ID_ARTICLES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID_CATEGORY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `ID_MEDIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `ID_TAG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_CATEGORY_HAVE_PARENT` FOREIGN KEY (`ID_PARENT_CATEGORY`) REFERENCES `category` (`ID_CATEGORY`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
