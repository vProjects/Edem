-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost:80
-- Generation Time: Jun 30, 2014 at 06:14 PM
-- Server version: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `course_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `students_info`
--

CREATE TABLE IF NOT EXISTS `students_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(500) NOT NULL,
  `institute_id` varchar(500) NOT NULL,
  `curriculum_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(200) NOT NULL,
  `session` varchar(500) NOT NULL,
  `joining_date` varchar(300) NOT NULL,
  `address_l_1` varchar(500) NOT NULL,
  `address_l_2` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `state` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `postal_code` varchar(300) NOT NULL,
  `student_status` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `students_info`
--

INSERT INTO `students_info` (`id`, `user_id`, `institute_id`, `curriculum_id`, `name`, `email`, `dob`, `sex`, `session`, `joining_date`, `address_l_1`, `address_l_2`, `mobile`, `city`, `state`, `country`, `postal_code`, `student_status`, `status`) VALUES
(1, 'STU53a04ae7236c6', 'INS539f1ad3113c6', '11', 'asdfsdafs', 'anand.singh989@gmail.com', '2014-06-03', 'male', '2012', '2014-06-19', 'qaedfasd', 'asdfasd', '123456', 'asdf', '284', '16', '700115', '1', 1),
(2, 'STU53a04cb068b5a', 'INS539f1af709988', 'asd,ds,asdf,qwdsa,', 'asdfsdafs', 'anand.s89@gmail.com', '2014-06-10', 'male', '2012', '2014-06-19', 'qaedfasd', 'asdfasd', '123456', 'Kolkata', '2263', '145', '700114', '1', 1),
(3, 'STU53a04ce1248b6', 'INS539f1af709988', 'asd,ds,asdf,qwdsa', 'asdfsdafs', 'anand.s89@gmail.com', '2014-06-10', 'male', '2012', '2014-06-19', 'qaedfasd', 'asdfasd', '123456', 'Kolkata', '2263', '145', '700114', '1', 1),
(4, 'STU53a04d534539b', 'INS539f1af709988', 'asd,ds,asdf,qwdsa', 'asdfsdafs', 'anand.s89@gmail.com', '2014-06-10', 'male', '2012', '2014-06-19', 'qaedfasd', 'asdfasd', '123456', 'Kolkata', '2263', '145', '700114', '1', 1),
(5, 'STU53a30ef8e51ee', 'INS539f4abf3f572', 'asd', 'test student', 'anand.singh989@gmail.com', '1989-06-14', 'male', '2012', '2014-06-19', 'qaedfasd', 'asdfasd', '988966655', 'Kolkata', '3613', '223', 'asdf', '1', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
