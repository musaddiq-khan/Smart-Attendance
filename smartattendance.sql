-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2017 at 08:26 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `roomsupervisionallocationsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `name` text NOT NULL,
  `lname` text NOT NULL,
  `username` text NOT NULL,
  `passwrd` text NOT NULL,
  `profile_img` text NOT NULL,
  `city_id` int(11) NOT NULL,
  `contact` text NOT NULL,
  `login_type` varchar(10) NOT NULL COMMENT 'SA->SuperAdmin,A->Agent',
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL COMMENT '0->active;1->inactive;2->pending;3->new',
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `lname`, `username`, `passwrd`, `profile_img`, `city_id`, `contact`, `login_type`, `created_date`, `modified_date`, `status`, `last_login`) VALUES
(1, 'vinaysagarsd@gmail.com', 'Lakshminarayana P', '', 'vinaysagarsd@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'assets/profile_images/plakshminarayana_p1499350148.jpg', 1, '9449751831', 'SA', '0000-00-00 00:00:00', '2017-07-07 02:14:38', 0, '2017-11-24 08:00:18'),
(2, 'vsd42032@gmail.com', 'Vinay Sagar', 'Bhat', 'vsd42032@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'assets/profile_images/pstory3_abc__abc_abc1499375356.png', 0, '8884040443', 'US', '2017-07-06 19:42:23', '2017-07-07 02:39:16', 0, '2017-07-17 01:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_duties`
--

CREATE TABLE IF NOT EXISTS `assigned_duties` (
  `id` bigint(200) NOT NULL AUTO_INCREMENT,
  `exam_id` text NOT NULL,
  `unique_key` text NOT NULL,
  `date` text NOT NULL,
  `m3` int(11) NOT NULL,
  `m4` int(11) NOT NULL,
  `a3` int(11) NOT NULL,
  `a4` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `m3_designation` text NOT NULL,
  `a3_designation` text NOT NULL,
  `a4_designation` text NOT NULL,
  `m4_designation` text NOT NULL,
  `db_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=453 ;

--
-- Dumping data for table `assigned_duties`
--

INSERT INTO `assigned_duties` (`id`, `exam_id`, `unique_key`, `date`, `m3`, `m4`, `a3`, `a4`, `prof_id`, `m3_designation`, `a3_designation`, `a4_designation`, `m4_designation`, `db_date`) VALUES
(367, 'test 3', '24-10-2017__test 3', '24-10-2017', 1, 0, 0, 0, 25, 'RS', '', '', '', '2017-10-24'),
(366, 'test 3', '24-10-2017__test 3', '24-10-2017', 1, 0, 0, 0, 56, 'RS', '', '', '', '2017-10-24'),
(365, 'test 3', '24-10-2017__test 3', '24-10-2017', 1, 0, 0, 0, 52, 'RS', '', '', '', '2017-10-24'),
(289, 'test 2017', '21-07-2017__test 2017', '21-07-2017', 1, 0, 0, 0, 52, 'RS', '', '', '', '2017-07-21'),
(290, 'test 2017', '21-07-2017__test 2017', '21-07-2017', 1, 0, 0, 0, 42, 'DS', '', '', '', '2017-07-21'),
(368, 'test 3', '24-10-2017__test 3', '24-10-2017', 1, 0, 0, 0, 40, 'RS', '', '', '', '2017-10-24'),
(369, 'test 3', '24-10-2017__test 3', '24-10-2017', 1, 0, 0, 0, 35, 'RS', '', '', '', '2017-10-24'),
(370, 'test 3', '24-10-2017__test 3', '24-10-2017', 1, 0, 0, 0, 29, 'RS', '', '', '', '2017-10-24'),
(371, 'test 3', '24-10-2017__test 3', '24-10-2017', 1, 0, 0, 0, 27, 'RS', '', '', '', '2017-10-24'),
(372, 'test 3', '24-10-2017__test 3', '24-10-2017', 1, 0, 0, 0, 5, 'RLS', '', '', '', '2017-10-24'),
(373, 'test 3', '24-10-2017__test 3', '24-10-2017', 1, 0, 0, 0, 14, 'DS', '', '', '', '2017-10-24'),
(452, 'jun 2017', '24-11-2017__jun 2017', '24-11-2017', 1, 0, 0, 0, 19, 'DS', '', '', '', '2017-11-24'),
(451, 'jun 2017', '24-11-2017__jun 2017', '24-11-2017', 1, 0, 0, 0, 52, 'RS', '', '', '', '2017-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE IF NOT EXISTS `dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`id`, `name`, `status`) VALUES
(1, 'MCA', 1),
(2, 'ARC', 1),
(3, 'ENGG', 1),
(4, 'MECH', 1),
(5, 'MBA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `name`, `status`) VALUES
(1, 'Asst. Prof', 1),
(2, 'Asso. Prof', 1),
(3, 'Professor', 1),
(4, 'Academic Intrn.', 1),
(5, 'Lecturer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `duty_designation`
--

CREATE TABLE IF NOT EXISTS `duty_designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `duty_designation`
--

INSERT INTO `duty_designation` (`id`, `name`) VALUES
(1, 'RS'),
(2, 'RLS'),
(3, 'DS');

-- --------------------------------------------------------

--
-- Table structure for table `exam_id`
--

CREATE TABLE IF NOT EXISTS `exam_id` (
  `exam_id` varchar(20) NOT NULL,
  `edited` int(11) NOT NULL,
  `printed` int(11) NOT NULL,
  `informed` int(11) NOT NULL,
  `assigned` int(11) NOT NULL,
  UNIQUE KEY `exam_id` (`exam_id`),
  UNIQUE KEY `exam_id_2` (`exam_id`),
  UNIQUE KEY `exam_id_3` (`exam_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_id`
--

INSERT INTO `exam_id` (`exam_id`, `edited`, `printed`, `informed`, `assigned`) VALUES
('jun 2017', 0, 0, 0, 1),
('test 2017', 0, 1, 1, 1),
('test 3', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_report`
--

CREATE TABLE IF NOT EXISTS `login_report` (
  `user_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_report`
--

INSERT INTO `login_report` (`user_id`, `login_time`, `logout_time`) VALUES
(1, '2017-07-02 19:29:07', '0000-00-00 00:00:00'),
(1, '2017-07-02 22:50:45', '0000-00-00 00:00:00'),
(1, '2017-07-03 11:33:04', '0000-00-00 00:00:00'),
(1, '2017-07-03 14:36:41', '0000-00-00 00:00:00'),
(1, '2017-07-03 15:10:53', '0000-00-00 00:00:00'),
(1, '2017-07-03 19:55:14', '0000-00-00 00:00:00'),
(1, '2017-07-04 13:23:42', '0000-00-00 00:00:00'),
(1, '2017-07-04 17:17:58', '0000-00-00 00:00:00'),
(1, '2017-07-05 18:42:30', '0000-00-00 00:00:00'),
(1, '2017-07-05 23:47:52', '0000-00-00 00:00:00'),
(1, '2017-07-06 18:19:02', '2017-07-06 19:19:12'),
(1, '2017-07-06 19:18:50', '2017-07-06 19:43:46'),
(2, '2017-07-06 19:43:30', '2017-07-07 01:36:19'),
(2, '2017-07-07 01:37:02', '2017-07-07 01:37:32'),
(2, '2017-07-07 01:56:56', '0000-00-00 00:00:00'),
(2, '2017-07-07 02:05:16', '2017-07-07 02:06:00'),
(1, '2017-07-07 02:05:48', '2017-07-07 02:06:37'),
(2, '2017-07-07 02:10:41', '2017-07-07 02:13:09'),
(1, '2017-07-07 02:13:48', '2017-07-07 02:21:33'),
(2, '2017-07-07 02:21:14', '2017-07-07 02:22:09'),
(2, '2017-07-07 02:21:47', '2017-07-07 02:28:26'),
(2, '2017-07-07 02:29:18', '0000-00-00 00:00:00'),
(1, '2017-07-07 12:29:59', '2017-07-07 13:48:41'),
(2, '2017-07-07 13:48:33', '0000-00-00 00:00:00'),
(2, '2017-07-07 20:06:49', '0000-00-00 00:00:00'),
(2, '2017-07-08 00:24:57', '0000-00-00 00:00:00'),
(1, '2017-07-08 10:56:01', '0000-00-00 00:00:00'),
(1, '2017-07-08 20:37:55', '0000-00-00 00:00:00'),
(1, '2017-07-09 14:09:13', '0000-00-00 00:00:00'),
(1, '2017-07-09 22:53:43', '0000-00-00 00:00:00'),
(1, '2017-07-11 01:33:36', '0000-00-00 00:00:00'),
(1, '2017-07-11 11:31:57', '0000-00-00 00:00:00'),
(1, '2017-07-11 22:46:49', '0000-00-00 00:00:00'),
(1, '2017-07-12 00:16:42', '0000-00-00 00:00:00'),
(1, '2017-07-12 13:26:07', '2017-07-12 14:09:06'),
(1, '2017-07-12 14:08:53', '0000-00-00 00:00:00'),
(1, '2017-07-12 18:25:33', '0000-00-00 00:00:00'),
(1, '2017-07-13 10:58:15', '0000-00-00 00:00:00'),
(1, '2017-07-13 19:54:29', '0000-00-00 00:00:00'),
(1, '2017-07-15 12:39:01', '0000-00-00 00:00:00'),
(1, '2017-07-15 23:24:31', '2017-07-15 23:56:01'),
(2, '2017-07-15 23:55:42', '0000-00-00 00:00:00'),
(1, '2017-07-16 00:04:26', '0000-00-00 00:00:00'),
(1, '2017-07-16 23:20:18', '2017-07-17 01:02:38'),
(2, '2017-07-17 01:03:38', '2017-07-17 01:20:56'),
(2, '2017-07-17 01:44:25', '0000-00-00 00:00:00'),
(1, '2017-07-17 12:07:14', '0000-00-00 00:00:00'),
(1, '2017-07-18 00:16:33', '0000-00-00 00:00:00'),
(1, '2017-07-21 10:18:03', '2017-07-21 12:15:48'),
(1, '2017-07-21 12:18:10', '2017-07-21 12:39:01'),
(1, '2017-07-21 12:39:08', '0000-00-00 00:00:00'),
(1, '2017-07-21 12:39:09', '0000-00-00 00:00:00'),
(1, '2017-07-22 12:07:32', '0000-00-00 00:00:00'),
(1, '2017-09-29 16:20:19', '0000-00-00 00:00:00'),
(1, '2017-10-24 00:04:30', '0000-00-00 00:00:00'),
(1, '2017-11-07 00:40:08', '0000-00-00 00:00:00'),
(1, '2017-11-24 08:00:18', '2017-11-24 08:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `prof`
--

CREATE TABLE IF NOT EXISTS `prof` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usn` varchar(15) NOT NULL,
  `name` text NOT NULL,
  `designation` int(11) NOT NULL,
  `duty_code` int(11) NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `dept` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `priority` int(11) NOT NULL COMMENT '1->yes 0->no',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usn` (`usn`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `prof`
--

INSERT INTO `prof` (`id`, `usn`, `name`, `designation`, `duty_code`, `email`, `phone`, `dept`, `status`, `priority`) VALUES
(1, '1BM16MCA242', 'Dr Ranganath R V', 3, 3, 'vinaysagarsd@gmail.com', '9449751831', 3, 1, 0),
(2, '1BM16MCA114', 'Dr Mangala Keshava', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 4, 1, 0),
(3, '1BM16MCA115', 'Dr A S Arun Kumar', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 1, 1, 0),
(4, '1BM16MCA116', 'Dr Udaya Simha L', 3, 3, 'vinaysagarsd@gmail.com', '9449751831', 5, 1, 0),
(5, '1BM16MCA117', 'Dr C R Ramakrishnaiah', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 2, 1, 1),
(6, '1BM16MCA118', 'Prathima B', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 5, 1, 0),
(7, '1BM16MCA119', 'Satish H S', 3, 3, 'vinaysagarsd@gmail.com', '9449751831', 1, 1, 0),
(8, '1BM16MCA120', 'Dr Suresh B S', 3, 3, 'vinaysagarsd@gmail.com', '9449751831', 2, 1, 0),
(9, '1BM16MCA121', 'Dr Sharanabasavaraj J', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 5, 1, 0),
(10, '1BM16MCA122', 'Dr Shivashankar R Srivatsa', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 1, 1, 0),
(11, '1BM16MCA123', 'Dr Sarada B N', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 3, 1, 0),
(12, '1BM16MCA124', 'Dr Jayanthi K Murthy', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 4, 1, 0),
(13, '1BM16MCA125', 'Dr Veena M B', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 1, 1, 0),
(14, '1BM16MCA126', 'Dr Akhila S', 3, 3, 'vinaysagarsd@gmail.com', '9449751831', 5, 1, 0),
(15, '1BM16MCA127', 'Dr Arathi R Shankar', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 3, 1, 0),
(16, '1BM16MCA128', 'Dr Prerana Gupta Poddar', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 5, 1, 0),
(17, '1BM16MCA129', 'Dr R Jayagowri', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 1, 1, 0),
(18, '1BM16MCA130', 'Dr Vasundhara Patel K S', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 5, 1, 0),
(19, '1BM16MCA131', 'Dr Suma M S', 3, 3, 'vinaysagarsd@gmail.com', '9449751831', 3, 1, 0),
(20, '1BM16MCA132', 'Appaji M Abhishek', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 5, 1, 0),
(21, '1BM16MCA133', 'Dr Usha A', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 1, 1, 0),
(22, '1BM16MCA134', 'Kavitha Rani', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 2, 1, 0),
(23, '1BM16MCA135', 'Disha Nayak', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 2, 1, 0),
(24, '1BM16MCA136', 'Dr G Vara Prasad', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 5, 1, 0),
(25, '1BM16MCA137', 'Selva Kumar S', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 1, 1, 0),
(26, '1BM16MCA138', 'Dr R Ashok Kumar', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 3, 1, 0),
(27, '1BM16MCA139', 'Dr Sandeep Varma N', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 4, 1, 0),
(28, '1BM16MCA140', 'Dr Chetan A Nayak', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 1, 1, 0),
(29, '1BM16MCA141', 'Sowmen Panda', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 5, 1, 0),
(30, '1BM16MCA142', 'Dr G Keerthiga', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 2, 1, 0),
(31, '1BM16MCA143', 'Dr Sujatha D N', 3, 3, 'vinaysagarsd@gmail.com', '9449751831', 5, 1, 0),
(32, '1BM16MCA144', 'Uma S', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 1, 1, 0),
(33, '1BM16MCA145', 'Lakshminarayana P', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 2, 1, 0),
(34, '1BM16MCA146', 'Dr K Vijayakumar', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 5, 1, 0),
(35, '1BM16MCA147', 'Pushpa T S', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 1, 1, 0),
(36, '1BM16MCA148', 'Shailaja K P', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 1, 1, 0),
(37, '1BM16MCA149', 'Shilpa S', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 2, 1, 0),
(38, '1BM16MCA150', 'V Padmapriya', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 3, 1, 0),
(39, '1BM16MCA151', 'Ram Mohan Reddy', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 4, 1, 0),
(40, '1BM16MCA152', 'Raghavendra Rao RV', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 1, 1, 0),
(41, '1BM16MCA153', 'Siva Ramakrishna M', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 5, 1, 0),
(42, '1BM16MCA154', 'Dr John Manohar', 3, 3, 'vinaysagarsd@gmail.com', '9449751831', 3, 1, 0),
(43, '1BM16MCA155', 'Dr Satya Nandini A', 3, 3, 'vinaysagarsd@gmail.com', '9449751831', 5, 1, 0),
(44, '1BM16MCA156', 'Dr Shubha B N', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 1, 1, 0),
(45, '1BM16MCA157', 'Dr S Manoharan', 2, 2, 'vinaysagarsd@gmail.com', '9449751831', 2, 1, 0),
(46, '1BM16MCA158', 'Dr Minu Zachariah', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 2, 1, 0),
(47, '1BM16MCA159', 'Prathima Bhat K', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 5, 1, 0),
(48, '1BM16MCA160', 'Balaji K R A', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 1, 1, 0),
(49, '1BM16MCA161', 'Tejaswi Patil', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 3, 1, 0),
(50, '1BM16MCA162', 'Shaheen Sheriff', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 4, 1, 0),
(51, '1BM16MCA163', 'Sridhar H R', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 1, 1, 0),
(52, '1BM16MCA164', 'Dr Shubha Muralidhar', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 5, 1, 1),
(53, '1BM16MCA165', 'Smitha V Shenoy', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 2, 1, 0),
(54, '1BM16MCA166', 'Ganesh Kumar', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 5, 1, 0),
(55, '1BM16MCA167', 'Leena S', 1, 1, 'vinaysagarsd@gmail.com', '9449751831', 1, 1, 0),
(56, 'EMP20011', 'sandeepa verma', 1, 1, 'Sandeepverms.ise@bmsce.ac.in', '9567489420', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `email_text` text NOT NULL,
  `msg_text` text NOT NULL,
  `from_email` text NOT NULL,
  `email_subject` text NOT NULL,
  `email_password` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rp_note_text` text NOT NULL,
  `rs_priority_duty` int(11) NOT NULL,
  `rls_priority_duty` int(11) NOT NULL,
  `ds_priority_duty` int(11) NOT NULL,
  `rp_text_head` text NOT NULL,
  `rs_remuneration` int(11) NOT NULL,
  `rls_remuneration` int(11) NOT NULL,
  `ds_remuneration` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`email_text`, `msg_text`, `from_email`, `email_subject`, `email_password`, `id`, `rp_note_text`, `rs_priority_duty`, `rls_priority_duty`, `ds_priority_duty`, `rp_text_head`, `rs_remuneration`, `rls_remuneration`, `ds_remuneration`) VALUES
('<p>Hello <strong>[PROF_NAME]</strong> ([PROF_DESIG], [PROF_DEPT]),<br /> This is to inform that you have been assigned the following exam duties for [EXAM_ID].<br /> Please refer the below duty table.</p>', '<p>Hello [PROF_NAME], This is to inform that, today you have examination duty at [M_START_TIME] and [A_START_TIME] for the exam&nbsp;<span style="font-family:open sans,sans-serif">[EXAM_ID].</span></p>', 'vinaysagarsd@gmail.com', 'Test Mail from BMSSCE', '8884040443', 1, '<p>NOTE: YOU ARE REQUESTED TO REPORT AT CONTROL ROOM ROOM NUMBER 3001 III FLOOR , CHEMICAL ENGG. DEPT. B.S NARAYANA BLOCK.</p>', 4, 0, 0, '<h4>BMS College of Engineering, Bangalore - 56001925<br /> Examination Duties For ENGG. AUTS Examination [EXAM_ID]</h4>', 25, 50, 75);

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE IF NOT EXISTS `time_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m3strength` text NOT NULL,
  `m4strength` text NOT NULL,
  `a3strength` text NOT NULL,
  `a4strength` text NOT NULL,
  `m3start_time` text NOT NULL,
  `m4start_time` text NOT NULL,
  `a3start_time` text NOT NULL,
  `a4start_time` text NOT NULL,
  `date` text NOT NULL,
  `exam_id` text NOT NULL,
  `unique_key` varchar(25) NOT NULL,
  `db_date` date NOT NULL,
  `sms` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_key` (`unique_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`id`, `m3strength`, `m4strength`, `a3strength`, `a4strength`, `m3start_time`, `m4start_time`, `a3start_time`, `a4start_time`, `date`, `exam_id`, `unique_key`, `db_date`, `sms`) VALUES
(21, '30', '-1', '-1', '-1', '8:30 AM', '-1', '-1', '-1', '24-11-2017', 'jun 2017', '24-11-2017__jun 2017', '2017-11-24', 1),
(13, '30', '-1', '-1', '-1', '8:30 AM', '-1', '-1', '-1', '21-07-2017', 'test 2017', '21-07-2017__test 2017', '2017-07-21', 1),
(17, '200', '-1', '-1', '-1', '9:15 AM', '-1', '-1', '-1', '24-10-2017', 'test 3', '24-10-2017__test 3', '2017-10-24', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
