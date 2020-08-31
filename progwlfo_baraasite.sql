-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2020 at 08:59 AM
-- Server version: 10.3.23-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progwlfo_baraasite`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_imgs`
--

CREATE TABLE `about_imgs` (
  `id` int(11) NOT NULL,
  `imgId` int(11) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_imgs`
--

INSERT INTO `about_imgs` (`id`, `imgId`, `title`) VALUES
(1, 1, 'baraa_1'),
(2, 30, 'Screenshot (560)'),
(3, 3, 'baraa_3'),
(4, 4, 'baraa_4'),
(5, 5, 'baraa_5'),
(6, 6, 'baraa_6'),
(7, 7, 'baraa_7');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `imgId` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `imgId`, `title`) VALUES
(1, 8, 'mercycorps'),
(2, 9, 'microsoft'),
(3, 10, 'work-without-border'),
(4, 11, 'newline'),
(5, 12, 'gazaskygeeks'),
(6, 13, 'prography'),
(7, 14, 'kookies'),
(8, 15, 'msq');

-- --------------------------------------------------------

--
-- Table structure for table `imgs`
--

CREATE TABLE `imgs` (
  `id` int(11) NOT NULL,
  `img` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imgs`
--

INSERT INTO `imgs` (`id`, `img`) VALUES
(1, 'baraa_1.jpg'),
(2, 'baraa_2.jpg'),
(3, 'baraa_3.jpg'),
(4, 'baraa_4.jpg'),
(5, 'baraa_5.jpg'),
(6, 'baraa_6.jpg'),
(7, 'baraa_7.jpg'),
(8, 'mercycorps1.png'),
(9, 'microsoft.svg'),
(10, 'work-without-border.svg'),
(11, 'newline.svg'),
(12, 'gazaskygeeks.svg'),
(13, 'prography.svg'),
(14, 'kookies.svg'),
(15, 'msq.svg'),
(16, 'home1.png'),
(17, 'home2.png'),
(18, 'project1.png'),
(19, 'project2.png'),
(20, 'gWLylV.jpg'),
(21, 'cymjPz.jpg'),
(22, 'GTstnu.y'),
(23, 'FdteMQ.jpg'),
(24, 'YmuvU.jpg'),
(25, 'uDtyHm.jpg'),
(26, 'UQuNw.png'),
(27, 'uwTOpk.png'),
(28, 'cBXKG.png'),
(29, 'dNViUm.png'),
(30, 'WOoHLR.png'),
(31, 'qfLWK.png'),
(32, 'hFBXJ.png');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `client` varchar(30) NOT NULL,
  `head_img` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `client`, `head_img`) VALUES
(1, 'sammeer kraem . ux', 16),
(2, 'sammeer kraem . ux', 17),
(3, 'sammeer kraem . ux', 16),
(4, 'sammeer kraem . ux jasf', 27);

-- --------------------------------------------------------

--
-- Table structure for table `projects_en`
--

CREATE TABLE `projects_en` (
  `projId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `name2` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects_en`
--

INSERT INTO `projects_en` (`projId`, `name`, `name2`, `type`, `details`, `title`) VALUES
(1, 'Personal', ' Re-Branding', 'Logo & Brand Identity', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod', 'Lorem ipsum dolor sit amet, consetetur sadipscing '),
(2, 'Personal', ' Re-Branding', 'Let\'s start working together for', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod', 'Lorem ipsum dolor sit amet, consetetur sadipscing '),
(3, 'Personal', ' Re-Branding', 'Let\'s start working together for', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod', 'Lorem ipsum dolor sit amet, consetetur sadipscing '),
(4, 'Personal dssdsaf ', 'Re-Branding', 'Let\'s start working together for me', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod jaskhlf', 'Lorem ipsum dolor sit amet, consetetur sadipscing ');

-- --------------------------------------------------------

--
-- Table structure for table `proj_img`
--

CREATE TABLE `proj_img` (
  `id` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `imgId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proj_img`
--

INSERT INTO `proj_img` (`id`, `prodId`, `imgId`) VALUES
(1, 1, 18),
(2, 1, 19),
(3, 2, 18),
(4, 3, 19),
(5, 4, 19),
(9, 4, 31),
(10, 4, 32);

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` varchar(20) NOT NULL,
  `link` varchar(250) NOT NULL DEFAULT 'https://'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `link`) VALUES
('facebook', 'https://www.facebook.com/baraazorob/'),
('twitter', 'https://twitter.com/baraazoroub'),
('instagram', 'https://www.instagram.com/baraazoroub/'),
('linkedin', 'https://www.linkedin.com/in/barazoroub/'),
('behance', 'https://www.behance.net/baraazoroub'),
('dribbble', 'https://dribbble.com/BaraaZoroub'),
('whatsapp', 'https://api.whatsapp.com/send?phone=+970568775318'),
('mail', 'barazoroub@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_imgs`
--
ALTER TABLE `about_imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imgId` (`imgId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `imgId` (`imgId`);

--
-- Indexes for table `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `img` (`img`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `head_img` (`head_img`);

--
-- Indexes for table `projects_en`
--
ALTER TABLE `projects_en`
  ADD PRIMARY KEY (`projId`);

--
-- Indexes for table `proj_img`
--
ALTER TABLE `proj_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodId` (`prodId`),
  ADD KEY `imgId` (`imgId`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link` (`link`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_imgs`
--
ALTER TABLE `about_imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `proj_img`
--
ALTER TABLE `proj_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
