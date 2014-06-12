-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost:80
-- Generation Time: Jun 12, 2014 at 10:05 PM
-- Server version: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4

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
-- Table structure for table `chairperson_info`
--

CREATE TABLE IF NOT EXISTS `chairperson_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(500) NOT NULL,
  `institute_id` varchar(500) NOT NULL,
  `curriculum_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `address_|_1` varchar(500) NOT NULL,
  `address_|_2` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `state` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `division` varchar(500) NOT NULL,
  `chairman_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course_info`
--

CREATE TABLE IF NOT EXISTS `course_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(500) NOT NULL,
  `curriculum_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `session` varchar(500) NOT NULL,
  `hours` varchar(500) NOT NULL,
  `detail` varchar(1000) NOT NULL,
  `course_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `curriculum_info`
--

CREATE TABLE IF NOT EXISTS `curriculum_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curriculum_id` varchar(500) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `semester` varchar(500) NOT NULL,
  `session` varchar(500) NOT NULL,
  `curriculum_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event_info`
--

CREATE TABLE IF NOT EXISTS `event_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` varchar(500) NOT NULL,
  `institute_id` varchar(500) NOT NULL,
  `group_id` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `chairperson_id` varchar(500) NOT NULL,
  `teacher_id` varchar(500) NOT NULL,
  `duration` time NOT NULL,
  `event_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_info`
--

CREATE TABLE IF NOT EXISTS `group_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` varchar(500) NOT NULL,
  `created_by` varchar(500) NOT NULL,
  `teacher` varchar(500) NOT NULL,
  `students` varchar(500) NOT NULL,
  `group_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `institute_info`
--

CREATE TABLE IF NOT EXISTS `institute_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `institute_id` varchar(500) NOT NULL,
  `institute_type` varchar(500) NOT NULL,
  `address_|_1` varchar(500) NOT NULL,
  `address_|_2` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `state` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `institute_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `students_course_progress`
--

CREATE TABLE IF NOT EXISTS `students_course_progress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curriculum_id` varchar(500) NOT NULL,
  `course_id` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `earned_hour` varchar(500) NOT NULL,
  `count_needed` varchar(500) NOT NULL,
  `actual_count` varchar(500) NOT NULL,
  `grade` varchar(500) NOT NULL,
  `course_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `students_curriculum_progress`
--

CREATE TABLE IF NOT EXISTS `students_curriculum_progress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(500) NOT NULL,
  `curriculum_id` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `hr_needed` varchar(500) NOT NULL,
  `hr_earned` varchar(500) NOT NULL,
  `hr_progress` varchar(500) NOT NULL,
  `count_needed` varchar(500) NOT NULL,
  `actual_count` varchar(500) NOT NULL,
  `quality_points` varchar(500) NOT NULL,
  `gpa` varchar(500) NOT NULL,
  `curriculum_status` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `address_|_1` varchar(500) NOT NULL,
  `address_|_2` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `state` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `session` varchar(500) NOT NULL,
  `student_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teachers_info`
--

CREATE TABLE IF NOT EXISTS `teachers_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(500) NOT NULL,
  `institute_id` varchar(500) NOT NULL,
  `curriculum_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(200) NOT NULL,
  `address_|_1` varchar(500) NOT NULL,
  `address_|_2` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `state` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `subjects` varchar(500) NOT NULL,
  `joined_on` varchar(500) NOT NULL,
  `division` varchar(500) NOT NULL,
  `teachers_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `user_type` varchar(500) NOT NULL,
  `user_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `user_id`, `email`, `password`, `date`, `user_type`, `user_status`) VALUES
(1, 'anand989', '10001', 'anand.singh989@gmail.com', '123456', '2014-06-06', 'admin', 1),
(2, 'james989', '100002', 'webprogem1@gmail.com', '123456', '2014-06-08', 'institution', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
