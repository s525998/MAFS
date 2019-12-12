-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 03:42 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mafs`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `ID` int(11) NOT NULL,
  `Type` text CHARACTER SET swe7 NOT NULL,
  `Announcement` longtext CHARACTER SET swe7 NOT NULL,
  `fileName` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `isText` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`ID`, `Type`, `Announcement`, `fileName`, `isText`) VALUES
(4, 'Announcement', 'Membership in MAFS provides Faculty Senate respresentatives opportunities to visit one-on-one with Missouri Legislators, Liaisons, and Representatives of Higher Education across the Senate. It offers attendees a glimpse into current and upcoming legislation affecting higher education. The netwroking opportunities with other institutions of higher education offers Faculty Senates a means to collaborates and support the shared governance work that is being done across campuses. <br><br>\r\nThe 2019-2020 Missouri Association of Faculty Senate Membership dues are being collected now. Each institution is allowed to have two voting member per membership. A third member is welcome, non-voting, to attend. Use the attached invoice to submit your dues today.', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `current_employee`
--

CREATE TABLE `current_employee` (
  `id` int(11) NOT NULL,
  `Officer_Name` char(255) COLLATE latin1_general_ci NOT NULL,
  `University` char(255) COLLATE latin1_general_ci NOT NULL,
  `Address1` char(255) COLLATE latin1_general_ci NOT NULL,
  `Address2` char(255) COLLATE latin1_general_ci NOT NULL,
  `E-Mail` char(255) COLLATE latin1_general_ci NOT NULL,
  `Position` char(255) COLLATE latin1_general_ci NOT NULL,
  `isVacant` tinyint(1) NOT NULL,
  `picture` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `hasPic` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `current_employee`
--

INSERT INTO `current_employee` (`id`, `Officer_Name`, `University`, `Address1`, `Address2`, `E-Mail`, `Position`, `isVacant`, `picture`, `hasPic`) VALUES
(1, 'Suzzane Kissock Esp', 'Missouri Western State University', '4525 Downs Dr Wilson Hall 203C', 'Saint Jospeh, Missouri 64507', 'kissock@missouriwestern.edu', 'President', 0, '', 0),
(2, '', '', '', '', '', 'VicePresident', 0, '', 0),
(3, 'William \"Bill\" Church, PhD', 'Missouri Western State University', '4525 Downs Dr, Eder Hall 2220', 'Saint Joseph, Missouri 64507', 'church@missouriwestern.edu', 'SecretaryTreasurer', 0, '', 0),
(4, 'Sue Myllykangas PhD., CTRS', 'Northwest Missouri State University', '800 University Dr, Martindale Hall 108', 'Maryville, Missouri 64468', 'susanm@nwmissouri.edu', 'MemberAtLarge', 0, 'DrSue.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `EventName` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `EventDetails` longtext COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `Date`, `EventName`, `EventDetails`) VALUES
(19, '2020-02-03', 'Spring', '   When you make your reservations please mention you are part of the MAFS meeting. The room rate for this meeting is $99. Make certain to tell them you are with the Missouri Association of Faculty Senates.');

-- --------------------------------------------------------

--
-- Table structure for table `mafsfile`
--

CREATE TABLE `mafsfile` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `University` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `File` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mafs_report`
--

CREATE TABLE `mafs_report` (
  `ID` int(11) NOT NULL,
  `Report` text COLLATE latin1_general_ci NOT NULL,
  `report_by` int(11) NOT NULL,
  `mafs_id` int(11) NOT NULL,
  `submitDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meetingagendaminute`
--

CREATE TABLE `meetingagendaminute` (
  `ID` int(11) NOT NULL,
  `EventName` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `EventDate` date NOT NULL,
  `MeetingAgenda` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `MeetingMinute` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `Note` text COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_report`
--

CREATE TABLE `meeting_report` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) CHARACTER SET hp8 NOT NULL,
  `University` varchar(30) CHARACTER SET hp8 NOT NULL,
  `File` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Note` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `ID` int(6) NOT NULL,
  `First Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Last Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `UserName` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `E-Mail` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Position` enum('Admin','Member','Secretary','Inactive') COLLATE latin1_general_ci NOT NULL DEFAULT 'Member',
  `numTopic` int(4) NOT NULL DEFAULT '0',
  `numAgenda` int(4) NOT NULL DEFAULT '0',
  `numReport` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`ID`, `First Name`, `Last Name`, `UserName`, `Password`, `E-Mail`, `Position`, `numTopic`, `numAgenda`, `numReport`) VALUES
(1, 'Suzanne', 'Kissock', 'president', 'gr3atSneeze34', 'pres@MAFS.org', 'Admin', 0, 0, 0),
(2, 'Katie', 'Jacobs', 'vpresident', 'flatcuRves52', 'vp@MAFS.org', 'Admin', 0, 0, 0),
(3, 'Sue', 'Myllykangas', 'memberlarge', 'dampCircle90', 'MAL@MAFS.org', 'Admin', 0, 0, 0),
(4, 'William', '\"Bill\"  Church', 'secretary', 'th!nIndigo35', 'secretary@MAFS.org', 'Admin', 0, 0, 0),
(5, 'Pemba', 'Sherpa', 'psherpa', 'mafs123', 'pemba02@gmail.com', 'Member', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pastemployee`
--

CREATE TABLE `pastemployee` (
  `ID` int(11) NOT NULL,
  `Name` text COLLATE latin1_general_ci NOT NULL,
  `University` text COLLATE latin1_general_ci NOT NULL,
  `Position` text COLLATE latin1_general_ci NOT NULL,
  `Year` text COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pastemployee`
--

INSERT INTO `pastemployee` (`ID`, `Name`, `University`, `Position`, `Year`) VALUES
(2, 'Max Fridell', 'Northwest Missouri State University', 'Member At Large', '2013-2015'),
(3, 'Stephanie Chamberlain', 'Southeast Missouri State University', 'President', '2014-2015'),
(4, 'Robert Bergland', 'Missouri Western State University', 'Secretary/Treasurer', '2014-2015'),
(5, 'Nicole Monnier', 'Universiy of Missouri', 'Vice President', '2014-2015');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `post_content` mediumtext COLLATE latin1_general_ci NOT NULL,
  `post_by` int(11) NOT NULL,
  `post_topic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `replypost1`
--

CREATE TABLE `replypost1` (
  `reply_id` int(11) NOT NULL,
  `reply_post` int(11) NOT NULL,
  `reply_content` mediumtext COLLATE latin1_general_ci NOT NULL,
  `reply_by` int(11) NOT NULL,
  `reply_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `replypost2`
--

CREATE TABLE `replypost2` (
  `reply2_id` int(11) NOT NULL,
  `reply2_content` text COLLATE latin1_general_ci NOT NULL,
  `reply2_by` int(11) NOT NULL,
  `reply2_date` date NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `replypost3`
--

CREATE TABLE `replypost3` (
  `reply3_id` int(11) NOT NULL,
  `reply3_content` text COLLATE latin1_general_ci NOT NULL,
  `reply3_by` int(11) NOT NULL,
  `reply3_date` date NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `topic_subject` text COLLATE latin1_general_ci NOT NULL,
  `topic_date` date NOT NULL,
  `topic_message` mediumtext COLLATE latin1_general_ci NOT NULL,
  `topic_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `id` int(11) NOT NULL,
  `UniName` text COLLATE latin1_general_ci NOT NULL,
  `FacultyLink` text COLLATE latin1_general_ci NOT NULL,
  `isMember` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`id`, `UniName`, `FacultyLink`, `isMember`) VALUES
(1, ' Harris Stowe State University', ' http://go.hssu.edu/rsp_content.cfm?wid=65&pid=691&CFID=3299457&CFTOKEN=41103063ee0e742d-9F7391F7-D67F-C73F-4509BF193432B31C', 1),
(2, ' Lincoln University', ' https://www.lincolnu.edu/web/faculty-senate', 1),
(3, ' Missouri State University', 'https://www.missouristate.edu/facultysenate/', 1),
(4, ' Missouri Western State University', ' https://www.missouriwestern.edu/facsenate/', 1),
(5, ' Missouri University of Science and Technology', ' https://facultysenate.mst.edu/', 1),
(6, ' Northwest Missouri State University', ' https://www.nwmissouri.edu/fsenate/index.htm', 1),
(7, ' Truman State University', ' https://www.truman.edu/academic-affairs/', 1),
(8, ' University of Central Missouri', ' https://www.ucmo.edu/offices/faculty-senate/', 1),
(9, ' University of Missouri', ' https://facultycouncil.missouri.edu/', 1),
(10, ' Southeast Missouri State University', ' https://semo.edu/facultysenate/', 0),
(11, ' University of Missouri-Kansas City', ' https://www.umkc.edu/facultysenate/', 0),
(12, ' University of Missouri-St. Louis', ' http://www.umsl.edu/committees/senate/', 0),
(14, ' Missouri Southern University', ' https://www.mssu.edu/board-of-governors/faculty-senate-representative.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `id` int(11) NOT NULL,
  `UniName` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `vName1` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `vName2` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`id`, `UniName`, `vName1`, `vName2`) VALUES
(1, ' Harris Stowe State University', ' Owolabi Tiamiyu', ''),
(2, ' Southeast Missouri State University', 'Diane L. Wood', ' '),
(3, ' Lincoln University', ' Amy Gossett', ' '),
(4, ' Truman State University', ' James Guffey', ' '),
(5, ' Missouri Southern State University', ' Michael Garoutte', ' '),
(6, ' University of Central Missouri', 'David Ewing', ' ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `current_employee`
--
ALTER TABLE `current_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mafsfile`
--
ALTER TABLE `mafsfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mafs_report`
--
ALTER TABLE `mafs_report`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `mafs_id` (`mafs_id`),
  ADD KEY `report_by` (`report_by`);

--
-- Indexes for table `meetingagendaminute`
--
ALTER TABLE `meetingagendaminute`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `meeting_report`
--
ALTER TABLE `meeting_report`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pastemployee`
--
ALTER TABLE `pastemployee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_ibfk_1` (`post_topic`),
  ADD KEY `post_by` (`post_by`);

--
-- Indexes for table `replypost1`
--
ALTER TABLE `replypost1`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `reply_post` (`reply_post`),
  ADD KEY `reply_by` (`reply_by`);

--
-- Indexes for table `replypost2`
--
ALTER TABLE `replypost2`
  ADD PRIMARY KEY (`reply2_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `reply2_by` (`reply2_by`);

--
-- Indexes for table `replypost3`
--
ALTER TABLE `replypost3`
  ADD PRIMARY KEY (`reply3_id`),
  ADD KEY `reply3_by` (`reply3_by`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `topic_by` (`topic_by`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `current_employee`
--
ALTER TABLE `current_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mafsfile`
--
ALTER TABLE `mafsfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mafs_report`
--
ALTER TABLE `mafs_report`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meetingagendaminute`
--
ALTER TABLE `meetingagendaminute`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting_report`
--
ALTER TABLE `meeting_report`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pastemployee`
--
ALTER TABLE `pastemployee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replypost1`
--
ALTER TABLE `replypost1`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replypost2`
--
ALTER TABLE `replypost2`
  MODIFY `reply2_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replypost3`
--
ALTER TABLE `replypost3`
  MODIFY `reply3_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `voter`
--
ALTER TABLE `voter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mafs_report`
--
ALTER TABLE `mafs_report`
  ADD CONSTRAINT `mafs_report_ibfk_2` FOREIGN KEY (`mafs_id`) REFERENCES `mafsaction` (`ID`),
  ADD CONSTRAINT `mafs_report_ibfk_3` FOREIGN KEY (`report_by`) REFERENCES `member` (`ID`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `topic` (`topic_id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `member` (`ID`);

--
-- Constraints for table `replypost1`
--
ALTER TABLE `replypost1`
  ADD CONSTRAINT `replypost1_ibfk_1` FOREIGN KEY (`reply_post`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `replypost1_ibfk_2` FOREIGN KEY (`reply_by`) REFERENCES `member` (`ID`);

--
-- Constraints for table `replypost2`
--
ALTER TABLE `replypost2`
  ADD CONSTRAINT `replypost2_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `replypost1` (`reply_id`),
  ADD CONSTRAINT `replypost2_ibfk_2` FOREIGN KEY (`reply2_by`) REFERENCES `member` (`ID`);

--
-- Constraints for table `replypost3`
--
ALTER TABLE `replypost3`
  ADD CONSTRAINT `replypost3_ibfk_1` FOREIGN KEY (`reply3_by`) REFERENCES `member` (`ID`),
  ADD CONSTRAINT `replypost3_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `replypost2` (`reply2_id`);

--
-- Constraints for table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`topic_by`) REFERENCES `member` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
