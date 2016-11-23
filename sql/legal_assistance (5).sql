-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2016 at 08:34 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `legal_assistance`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `status` enum('OPENED','CLOSED','UNDER-REVIEW','CANCELLED') DEFAULT NULL,
  `client` varchar(30) NOT NULL,
  `lawyer` int(11) NOT NULL,
  `description` text,
  `category` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `status`, `client`, `lawyer`, `description`, `category`) VALUES
(25, 'OPENED', 'tyfevav@yahoo.com', 1, NULL, 'Divorce'),
(26, 'UNDER-REVIEW', 'kyludyfybu@hotmail.com', 1, NULL, 'Divorce'),
(27, NULL, 'wupanuc@hotmail.com', 2, NULL, 'Property'),
(29, NULL, 'myjijozobo@hotmail.com', 1, NULL, 'Divorce');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Divorce'),
(2, 'Property');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `username`, `password`, `email`) VALUES
(2, 'myjijozobo@hotmail.com', '4qlX7GxMib', 'myjijozobo@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer`
--

CREATE TABLE `lawyer` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('Male','Female','','') NOT NULL,
  `dob` date DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lawyer`
--

INSERT INTO `lawyer` (`id`, `firstname`, `middlename`, `lastname`, `address`, `contact`, `email`, `gender`, `dob`, `rate`, `username`, `password`, `image`, `description`) VALUES
(1, 'Jade', 'Simone Gibson', 'Weeks', 'Eum eiusmod beatae quia eum irure dolorem voluptat', '5744736', 'kiwazifid@hotmail.com', 'Male', '0000-00-00', 100, 'jade', 'jade', 'jade.jpg', 'Eum eiusmod beatae quia eum irure dolorem voluptat Eum eiusmod beatae quia eum irure dolorem voluptat'),
(2, 'May', 'Leilani Bray', 'Sears', 'Non qui labore perspiciatis sint aut ex ut ea pari', '3044843', 'ruqop@gmail.com', 'Male', '0000-00-00', 54, 'may', 'may', 'may.JPG', 'Non qui labore perspiciatis sint aut ex ut ea pari Non qui labore perspiciatis sint aut ex ut ea pari');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_category`
--

CREATE TABLE `lawyer_category` (
  `id` int(11) NOT NULL,
  `lawyer` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lawyer_category`
--

INSERT INTO `lawyer_category` (`id`, `lawyer`, `category`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_questionnaire_answer`
--

CREATE TABLE `lawyer_questionnaire_answer` (
  `id` int(11) NOT NULL,
  `lawyer` int(11) NOT NULL,
  `questionnaire_answer` int(11) NOT NULL,
  `cases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lawyer_questionnaire_answer`
--

INSERT INTO `lawyer_questionnaire_answer` (`id`, `lawyer`, `questionnaire_answer`, `cases`) VALUES
(35, 1, 236, 25),
(36, 1, 237, 25),
(37, 1, 238, 25),
(38, 1, 239, 26),
(39, 1, 240, 26),
(40, 1, 241, 26),
(41, 2, 242, 27),
(42, 2, 243, 27),
(43, 2, 244, 27),
(47, 1, 248, 29),
(48, 1, 249, 29),
(49, 1, 250, 29);

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `category`, `question`) VALUES
(1, 1, 'How long have been your marriage'),
(2, 1, 'what is the main cause for divorce?'),
(3, 1, 'do you have children?'),
(4, 2, 'What is issue of property?'),
(5, 2, 'When did you own your propery?'),
(6, 2, 'Are you immigrant or non-immigrant?');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire_answer`
--

CREATE TABLE `questionnaire_answer` (
  `id` int(11) NOT NULL,
  `client` varchar(30) NOT NULL,
  `answer` text NOT NULL,
  `questionnaire` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaire_answer`
--

INSERT INTO `questionnaire_answer` (`id`, `client`, `answer`, `questionnaire`, `status`) VALUES
(236, 'tyfevav@yahoo.com', 'Dolor sint asperiores voluptatem, velit aut rerum quis quia nihil esse voluptas nulla eveniet, ut excepturi ut laudantium, qui.', 1, 0),
(237, 'tyfevav@yahoo.com', 'Cupidatat velit quia dignissimos a eaque sunt, doloremque quia ut qui mollitia facere et rerum aperiam cupidatat libero.', 2, 0),
(238, 'tyfevav@yahoo.com', 'Incididunt qui sed labore voluptatibus temporibus ea provident, est, quo odit fuga. Laborum.', 3, 0),
(239, 'kyludyfybu@hotmail.com', 'Optio, eaque nesciunt, pariatur? Duis laboriosam, ut iste ad odio culpa, culpa culpa.', 1, 0),
(240, 'kyludyfybu@hotmail.com', 'Illo veniam, velit saepe consectetur, dolor exercitation aut ratione veniam, eum atque expedita.', 2, 0),
(241, 'kyludyfybu@hotmail.com', 'Aliquid totam facere reiciendis aut sint corporis et est qui sint a molestiae totam delectus, ratione architecto maxime porro ab.', 3, 0),
(242, 'wupanuc@hotmail.com', 'Est dolor maxime dolorem magna optio, necessitatibus non dolore est autem deserunt sint inventore sit eum nisi illo quaerat.', 4, 0),
(243, 'wupanuc@hotmail.com', 'Tempor error et delectus, consequatur aliquam et illum, quam officia non eius ratione.', 5, 0),
(244, 'wupanuc@hotmail.com', 'Quo architecto repellendus. Reprehenderit dolores voluptatem vel sed dolores consequatur asperiores et est culpa consequat.', 6, 0),
(248, 'myjijozobo@hotmail.com', 'Non voluptates in minim magni sint autem assumenda rem natus beatae sit dolor dolore minus in commodo est, ad.', 1, 0),
(249, 'myjijozobo@hotmail.com', 'Dolores expedita et quia excepturi nisi officiis molestias ad recusandae. Ea culpa tenetur anim eligendi accusamus facere omnis.', 2, 0),
(250, 'myjijozobo@hotmail.com', 'Et iure et ea commodi ut ipsa, aut tempore, doloribus exercitation.', 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer`
--
ALTER TABLE `lawyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_category`
--
ALTER TABLE `lawyer_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_questionnaire_answer`
--
ALTER TABLE `lawyer_questionnaire_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaire_answer`
--
ALTER TABLE `questionnaire_answer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lawyer`
--
ALTER TABLE `lawyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `lawyer_category`
--
ALTER TABLE `lawyer_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lawyer_questionnaire_answer`
--
ALTER TABLE `lawyer_questionnaire_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `questionnaire_answer`
--
ALTER TABLE `questionnaire_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
