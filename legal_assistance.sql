-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2016 at 07:37 PM
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
(55, 'CANCELLED', 'qurew@yahoo.com', 1, NULL, 'Divorce'),
(56, NULL, 'qurew@yahoo.com', 35, NULL, 'Divorce'),
(57, 'UNDER-REVIEW', 'dezisid@yahoo.com', 2, NULL, 'Property'),
(58, NULL, 'dezisid@yahoo.com', 36, NULL, 'Property'),
(59, NULL, 'buzuv@yahoo.com', 35, NULL, 'Corporate'),
(60, NULL, 'buzuv@yahoo.com', 36, NULL, 'Corporate'),
(61, 'OPENED', 'dezola@hotmail.com', 1, NULL, 'Divorce'),
(62, 'OPENED', 'jexuci@hotmail.com', 2, NULL, 'Property'),
(63, 'OPENED', 'rixuhebazi@yahoo.com', 1, NULL, 'Divorce');

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
(2, 'Property'),
(3, 'Corporate'),
(4, 'Patent'),
(5, 'General');

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
(17, 'qurew@yahoo.com', 'gSPbGpNHtJ', 'qurew@yahoo.com'),
(18, 'dezisid@yahoo.com', 'BXWTn9cYxz', 'dezisid@yahoo.com'),
(19, 'buzuv@yahoo.com', '7kYlSh1cFh', 'buzuv@yahoo.com'),
(20, 'dezola@hotmail.com', '5PWadaVqEd', 'dezola@hotmail.com'),
(21, 'jexuci@hotmail.com', 'ki0FwhmLkj', 'jexuci@hotmail.com'),
(22, 'rixuhebazi@yahoo.com', 'XLByD1fNpr', 'rixuhebazi@yahoo.com');

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
(2, 'May', 'Leilani Bray', 'Sears', 'Non qui labore perspiciatis sint aut ex ut ea pari', '3044843', 'ruqop@gmail.com', 'Male', '0000-00-00', 54, 'may', 'may', 'may.JPG', 'Non qui labore perspiciatis sint aut ex ut ea pari Non qui labore perspiciatis sint aut ex ut ea pari'),
(35, 'Valentine', 'Allistair Wiggins', 'Delacruz', 'Excepturi architecto ut pariatur Qui', '90', 'dejylyg@hotmail.com', 'Male', '1970-01-01', 99, 'vujoq', 'Pa$$w0rd!', 'vujoq.jpg', 'Est reprehenderit minus sapiente quia in explicabo Illo eligendi ea sed maxime officia sit molestiae velit voluptatem non temporibus veniam'),
(36, 'Lynn', 'Melodie Roach', 'Dennis', 'Pariatur Quasi ut consequatur sint consequat Accus', '9', 'fagutufubo@yahoo.com', 'Female', '1970-01-01', 58, 'cebesyry', 'Pa$$w0rd!', 'cebesyry.jpg', 'Possimus esse praesentium eum omnis cupidatat qui cillum dicta fugit eius suscipit temporibus similique et cillum');

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
(2, 2, 2),
(101, 35, 1),
(102, 35, 2),
(103, 35, 3),
(104, 35, 4),
(105, 35, 5),
(106, 36, 1),
(107, 36, 2),
(108, 36, 3),
(109, 36, 4),
(110, 36, 5);

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
(122, 1, 302, 55),
(123, 1, 303, 55),
(124, 1, 304, 55),
(125, 35, 302, 56),
(126, 35, 303, 56),
(127, 35, 304, 56),
(128, 2, 305, 57),
(129, 2, 306, 57),
(130, 2, 307, 57),
(131, 36, 305, 58),
(132, 36, 306, 58),
(133, 36, 307, 58),
(134, 35, 308, 59),
(135, 35, 309, 59),
(136, 35, 310, 59),
(137, 36, 308, 60),
(138, 36, 309, 60),
(139, 36, 310, 60),
(140, 1, 311, 61),
(141, 1, 312, 61),
(142, 1, 313, 61),
(143, 2, 314, 62),
(144, 2, 315, 62),
(145, 2, 316, 62),
(146, 1, 317, 63),
(147, 1, 318, 63),
(148, 1, 319, 63);

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
(6, 2, 'Are you immigrant or non-immigrant?'),
(7, 3, 'What was the contract signed?'),
(8, 3, 'What is the type of contract?'),
(9, 3, 'What are the possible penalties of contact violation?'),
(10, 4, 'What is the patent number?'),
(11, 4, 'What is the name of individual or company who alleged? '),
(12, 4, 'What are the compensation for the patent violation?'),
(13, 5, 'Describe the case type?'),
(14, 5, 'What are the case supporting proof?'),
(15, 5, 'Is the case urgent?');

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
(302, 'qurew@yahoo.com', 'Enim molestias est aliquip dolores ullamco sit, exercitationem animi, quia sed odio et.', 1, 0),
(303, 'qurew@yahoo.com', 'Est, sit, provident, maiores sit magna voluptatum labore voluptatibus quia et in provident, qui sunt magna dolor lorem.', 2, 0),
(304, 'qurew@yahoo.com', 'Consectetur totam corrupti, quo reiciendis eos officiis sunt libero voluptatibus est autem ut dolor assumenda sit, cupidatat sed amet.', 3, 0),
(305, 'dezisid@yahoo.com', 'Nisi est, accusamus ad sit consequatur? Ipsum, sunt quod provident, consequatur? Consequatur, omnis qui omnis rerum veritatis totam iste vel.', 4, 0),
(306, 'dezisid@yahoo.com', 'Qui quam deserunt aut dolor excepteur architecto sed autem architecto sunt, aut odit.', 5, 0),
(307, 'dezisid@yahoo.com', 'Quis dolor rerum perspiciatis, et cumque libero consequatur exercitation delectus.', 6, 0),
(308, 'buzuv@yahoo.com', 'Aperiam molestiae reiciendis natus sit, aliquam quos eaque vitae est.', 7, 0),
(309, 'buzuv@yahoo.com', 'Amet, eu Nam quis ratione cupidatat voluptatem. Facere sunt, a necessitatibus qui aliqua. Laborum. Nobis.', 8, 0),
(310, 'buzuv@yahoo.com', 'Aut aliquid quod iure amet, nostrud incididunt non natus autem elit, architecto quae quibusdam.', 9, 0),
(311, 'dezola@hotmail.com', 'Mollitia sit ut debitis et placeat, reprehenderit, cupiditate debitis quo illum, iure voluptates recusandae.', 1, 0),
(312, 'dezola@hotmail.com', 'In mollitia est consectetur, sequi molestias illo magna sint iure cumque sit recusandae. Molestiae aut ut error.', 2, 0),
(313, 'dezola@hotmail.com', 'Iste debitis amet, et libero quo accusantium cillum rerum tempor aut sint, quo distinctio. Qui.', 3, 0),
(314, 'jexuci@hotmail.com', 'Qui sequi qui rerum pariatur? Eu numquam reiciendis impedit, consequatur.', 4, 0),
(315, 'jexuci@hotmail.com', 'Eligendi ad ipsa, ut proident, odio fugiat assumenda vel a sit.', 5, 0),
(316, 'jexuci@hotmail.com', 'Corporis iure et et voluptate dolore sapiente reprehenderit quia exercitationem.', 6, 0),
(317, 'rixuhebazi@yahoo.com', 'Illo corrupti, voluptatem ipsa, ea quidem natus culpa, suscipit labore itaque eligendi cupidatat nihil.', 1, 0),
(318, 'rixuhebazi@yahoo.com', 'Fugiat adipisicing ad aut doloremque cupidatat quo voluptates sit accusantium quis est sed minima.', 2, 0),
(319, 'rixuhebazi@yahoo.com', 'Quis sed ipsum, pariatur. Enim tempor rerum ratione quo consequatur? Ipsa, voluptatem. Sed sapiente iusto doloremque occaecat.', 3, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `lawyer`
--
ALTER TABLE `lawyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `lawyer_category`
--
ALTER TABLE `lawyer_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `lawyer_questionnaire_answer`
--
ALTER TABLE `lawyer_questionnaire_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `questionnaire_answer`
--
ALTER TABLE `questionnaire_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
