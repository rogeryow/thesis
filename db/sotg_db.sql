-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 01:01 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sotg_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladminlogin`
--

CREATE TABLE `tbladminlogin` (
  `ID` int(11) NOT NULL,
  `Username_admin` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladminlogin`
--

INSERT INTO `tbladminlogin` (`ID`, `Username_admin`, `Password`) VALUES
(1, 'admin', 'epoyadmin05');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(11) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Category_Desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `Category`, `Category_Desc`) VALUES
(33, 'Computer Service', ''),
(34, 'Home Cleaning', ''),
(35, 'Plumbing', ''),
(36, 'Electrician', ''),
(44, 'Massage', ''),
(45, 'Repair', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblchat_messages`
--

CREATE TABLE `tblchat_messages` (
  `ID` int(11) NOT NULL,
  `sender_name` varchar(45) NOT NULL,
  `receiver_name` varchar(45) NOT NULL,
  `messages_text` text NOT NULL,
  `Receiver_image` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblclient`
--

CREATE TABLE `tblclient` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Password_Con` varchar(255) NOT NULL,
  `Phone_No` varchar(15) NOT NULL,
  `Address` text NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Image_name` varchar(100) NOT NULL,
  `Profile_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclient`
--

INSERT INTO `tblclient` (`ID`, `First_Name`, `Last_Name`, `Username`, `Password`, `Password_Con`, `Phone_No`, `Address`, `Gender`, `Image_name`, `Profile_image`) VALUES
(11, 'Jephunneh', 'Arobo', 'epoy05', 'siyalangpo', 'siyalangpo', '09203354765', 'Tres de Mayo, Digos City', 'Male', 'none', 'none'),
(12, 'James', 'Traya', 'james05', 'james05', 'james05', '09203354656', 'Tienda Aplaya, Digos City', 'Male', 'none', 'none'),
(13, 'Vincent', 'Alagao', 'vincent05', 'vincent05', 'vincent05', '09203343223', 'Don Lorenzo, Digos City', 'Male', 'none', 'none'),
(14, 'd', 'sds', 'user', 'user', 'wwwwwwwwww', '444', 's', 'Female', 'none', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `Comment_ID` int(11) NOT NULL,
  `Name_comment` text NOT NULL,
  `Comment_sender_name` text NOT NULL,
  `comment_msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcompanyinfo`
--

CREATE TABLE `tblcompanyinfo` (
  `ID` int(11) NOT NULL,
  `Company_Name` varchar(100) NOT NULL,
  `Company_MobileNo` varchar(15) NOT NULL,
  `Company_telNo` text NOT NULL,
  `Company_Add` varchar(100) NOT NULL,
  `Company_Picture` varchar(100) NOT NULL,
  `Username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcompanyinfo`
--

INSERT INTO `tblcompanyinfo` (`ID`, `Company_Name`, `Company_MobileNo`, `Company_telNo`, `Company_Add`, `Company_Picture`, `Username`) VALUES
(11, '', '', '', '', '', 'epoy05'),
(12, '', '', '', '', '', 'james05'),
(13, '', '', '', '', '', 'vincent05'),
(14, '', '', '', '', '', 'sdwwww');

-- --------------------------------------------------------

--
-- Table structure for table `tblposting`
--

CREATE TABLE `tblposting` (
  `ID` int(11) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `First_Name` text NOT NULL,
  `Last_Name` text NOT NULL,
  `Comment` varchar(400) NOT NULL,
  `Services_Code` text NOT NULL,
  `Services_Name` text NOT NULL,
  `Date` datetime NOT NULL,
  `Posting_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblposting`
--

INSERT INTO `tblposting` (`ID`, `Username`, `First_Name`, `Last_Name`, `Comment`, `Services_Code`, `Services_Name`, `Date`, `Posting_order`) VALUES
(100, 'epoy05', 'Jephunneh', 'Arobo', 'ok pd ni\r\n', 'Services.5e27f1ca9d6b77.90808637.jpg', 'Repairing', '2020-01-22 07:57:52', 0),
(101, 'epoy05', 'Jephunneh', 'Arobo', 'dugay lng jd kaau ni...', 'Services.5e27f1ca9d6b77.90808637.jpg', 'Repairing', '2020-01-22 07:58:03', 0),
(102, 'epoy05', 'Jephunneh', 'Arobo', 'ok pd ni\r\n', 'Services.5e27f195e58d55.25215396.jpg', 'House Cleaning', '2020-01-22 07:58:15', 0),
(103, 'vincent05', 'Vincent', 'Alagao', 'Web lng iyaha nahibal-an', 'sd.5e27f5130fc276.68094868.jpg', 'Creating Program', '2020-01-22 08:36:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblrequestservices`
--

CREATE TABLE `tblrequestservices` (
  `ID` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `Complete_Add` varchar(50) NOT NULL,
  `Phone_No` varchar(50) NOT NULL,
  `Services_Pic` varchar(50) NOT NULL,
  `Services_Name` text NOT NULL,
  `Services_Type` varchar(50) NOT NULL,
  `Services_Price` int(11) NOT NULL,
  `SP_Name` varchar(50) NOT NULL,
  `SP_Username` text NOT NULL,
  `Date` datetime NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblrequestservices`
--

INSERT INTO `tblrequestservices` (`ID`, `Username`, `Fullname`, `Complete_Add`, `Phone_No`, `Services_Pic`, `Services_Name`, `Services_Type`, `Services_Price`, `SP_Name`, `SP_Username`, `Date`, `Status`) VALUES
(77, 'james05', 'James Traya', 'Tienda Aplaya, Digos City', '09203354656', 'sd.5e27f4c0115613.74784297.jpg', 'Repairing Computer', 'Other', 200, '', 'epoy05', '2020-01-24 09:49:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `IDServices` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Company_Name` varchar(45) NOT NULL,
  `Services_Title` longtext NOT NULL,
  `Services_Desc` longtext NOT NULL,
  `Services_Img` longtext NOT NULL,
  `Services_Price` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `subcategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`IDServices`, `Username`, `Company_Name`, `Services_Title`, `Services_Desc`, `Services_Img`, `Services_Price`, `category`, `subcategory`) VALUES
(130, 'james05', '', 'Roof Repair', 'Other', 'computer.jpg', 300, '45', '4'),
(132, 'james05', '', 'House Cleaning', 'Other', 'cleaning.jpg', 200, '34', '5'),
(133, 'epoy05', '', 'Computer Repair', 'Other', 'computer.jpg', 200, '33', '1'),
(134, 'epoy05', '', 'Computer Repair', 'Other', 'computer.jpg', 200, '33', '1'),
(135, 'epoy05', '', 'Networking ', 'Computer', 'programming.jpg', 200, '33', '6'),
(136, 'epoy05', '', 'Reformat PC', 'Computer', 'programming.jpg', 300, '33', '1'),
(137, 'epoy05', '', 'Video Editing', 'Other', 'editing.jpg', 300, '33', '3'),
(138, 'epoy05', '', 'Create Programs', 'Other', 'editing.jpg', 200, '33', '6'),
(139, 'epoy05', '', 'Layout', 'Computer', 'programming.jpg', 300, '33', '2'),
(140, 'epoy05', '', 'House Cleaning', 'Home', 'cleaning.jpg', 200, '34', '5'),
(141, 'vincent05', '', 'House Cleaning', 'Home', 'cleaning.jpg', 200, '34', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `ID` int(11) NOT NULL,
  `Category_ID` varchar(255) NOT NULL,
  `Subcategory` varchar(255) NOT NULL,
  `Subcategory_Desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`ID`, `Category_ID`, `Subcategory`, `Subcategory_Desc`) VALUES
(1, '33', 'Computer Repair', ''),
(2, '33', 'Layout', ''),
(3, '33', 'Video Editing\r\n', ''),
(4, '45', 'Roof Repair', ''),
(5, '34', 'House Cleaning', ''),
(6, '33', 'Programming', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbluploadimages`
--

CREATE TABLE `tbluploadimages` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Images_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_services`
--
CREATE TABLE `vw_services` (
`Services_Title` longtext
,`Services_Price` int(11)
,`Services_Img` longtext
,`Category` varchar(50)
,`Subcategory` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_services`
--
DROP TABLE IF EXISTS `vw_services`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_services`  AS  select `tblservices`.`Services_Title` AS `Services_Title`,`tblservices`.`Services_Price` AS `Services_Price`,`tblservices`.`Services_Img` AS `Services_Img`,`tblcategory`.`Category` AS `Category`,`tblsubcategory`.`Subcategory` AS `Subcategory` from ((`tblservices` left join `tblcategory` on((`tblservices`.`category` = `tblcategory`.`ID`))) left join `tblsubcategory` on((`tblservices`.`subcategory` = `tblsubcategory`.`ID`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladminlogin`
--
ALTER TABLE `tbladminlogin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblchat_messages`
--
ALTER TABLE `tblchat_messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblclient`
--
ALTER TABLE `tblclient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`Comment_ID`);

--
-- Indexes for table `tblcompanyinfo`
--
ALTER TABLE `tblcompanyinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblposting`
--
ALTER TABLE `tblposting`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblrequestservices`
--
ALTER TABLE `tblrequestservices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`IDServices`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluploadimages`
--
ALTER TABLE `tbluploadimages`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladminlogin`
--
ALTER TABLE `tbladminlogin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tblchat_messages`
--
ALTER TABLE `tblchat_messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;
--
-- AUTO_INCREMENT for table `tblclient`
--
ALTER TABLE `tblclient`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tblcompanyinfo`
--
ALTER TABLE `tblcompanyinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tblposting`
--
ALTER TABLE `tblposting`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `tblrequestservices`
--
ALTER TABLE `tblrequestservices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `IDServices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbluploadimages`
--
ALTER TABLE `tbluploadimages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
