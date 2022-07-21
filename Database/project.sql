-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 07:47 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Name`, `Email`, `Mobile`, `Password`) VALUES
(1, 'Meet Bhatt', 'meetbhatt777@gmail.com', '7801802437', '123'),
(2, 'NehaMeet Bhatt', 'neha@gmail.com', '7878787878', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `B_Id` int(11) NOT NULL,
  `B_Title` varchar(25) NOT NULL,
  `B_Image` varchar(255) NOT NULL,
  `B_Overview` mediumtext NOT NULL,
  `B_Message` text NOT NULL,
  `B_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `U_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Cat_Id` int(11) NOT NULL,
  `Cat_Name` varchar(25) NOT NULL,
  `Cat_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Cat_Id`, `Cat_Name`, `Cat_Date`) VALUES
(11, 'PHP', '2020-02-19 04:14:01'),
(12, 'Java', '2020-02-19 04:14:07'),
(13, 'Python', '2020-02-19 04:15:09'),
(14, 'Android', '2020-02-19 04:15:15'),
(15, 'iPhone', '2020-02-19 04:15:28'),
(16, 'Angular', '2020-02-19 04:15:34'),
(17, 'Node JS', '2020-02-19 04:15:40'),
(18, 'C++', '2020-02-19 04:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `Cont_Id` int(11) NOT NULL,
  `Cont_Name` varchar(25) NOT NULL,
  `Cont_Email` varchar(25) NOT NULL,
  `Cont_Mobile` varchar(10) NOT NULL,
  `Cont_Subject` varchar(25) NOT NULL,
  `Cont_Message` varchar(255) NOT NULL,
  `Cont_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`Cont_Id`, `Cont_Name`, `Cont_Email`, `Cont_Mobile`, `Cont_Subject`, `Cont_Message`, `Cont_Date`) VALUES
(5, 'Meet Bhatt', 'meetbhatt777@gmail.com', '7801802437', 'PHP', 'ProjectHub is a global company that provides hosting for software development version control using Project. ProjectHub offers plans for free, professional, and enterprise accounts.', '2020-01-21 11:11:15'),
(9, 'Neha Bhatt', 'meet.bhatt15622@marwadied', '7801802437', 'Java', 'ProjectHub is a global company that provides hosting for software development version control using Project. ProjectHub offers plans for free, professional, and enterprise accounts.', '2020-01-21 11:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `project_detail`
--

CREATE TABLE `project_detail` (
  `Pro_Id` int(11) NOT NULL,
  `Pro_Name` varchar(70) NOT NULL,
  `Pro_Type` varchar(25) NOT NULL,
  `Overview` longtext NOT NULL,
  `Developer_Name` varchar(15) NOT NULL,
  `How_To_Run` varchar(150) DEFAULT NULL,
  `Details` longtext NOT NULL,
  `File_Upload` varchar(255) DEFAULT NULL,
  `Index_Image` varchar(255) DEFAULT NULL,
  `Pro_Fees` varchar(20) DEFAULT NULL,
  `Pro_Price` int(25) DEFAULT NULL,
  `Cat_Id` int(20) DEFAULT NULL,
  `Pro_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `U_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_detail`
--

INSERT INTO `project_detail` (`Pro_Id`, `Pro_Name`, `Pro_Type`, `Overview`, `Developer_Name`, `How_To_Run`, `Details`, `File_Upload`, `Index_Image`, `Pro_Fees`, `Pro_Price`, `Cat_Id`, `Pro_Date`, `U_Id`) VALUES
(31, 'An Analytical Report on Marvel And DC Comic Characters', 'Python (Default)', 'The project training in a studentâ€™s life is like a live experience in the practice. So it is very essential part of the educational qualification. This Project is developed on Marvel& DC Comic Characters Data Analysis.', 'Meet Bhatt', 'Run Python IDLE and open particular .py file and run it.', 'The project training in a studentâ€™s life is like a live experience in the practice. So it is very essential part of the educational qualification. This Project is developed on Marvel& DC Comic Characters Data Analysis. The aim of the project training, byunderstanding a project, is to have practical experience of the real world. Marvel& DC Comic Characters-Data where you can get information on the different marvel and dc characters like itâ€™s Eyes,First appearance,Alive etc.. Know over other character show in Different Mining & Graphs. So that we can expand our view about the implications of the theoretical knowledge in the practical field.', 'uploads/20-02-2020 02-43-32 PM Meet-Mohit.rar', 'project_image/20-02-2020 02-43-32 PM marvel.jpg', 'Free', 0, 13, '2020-02-20 13:43:32', 13),
(32, 'ONLINE COMPUTERS AND ACCESSORIES ', 'Django', 'â€œOnline Computers & Accessories Shopâ€ is a web-based project which is made for remote-shopping or shopping through Internet. As the technology is being advanced the way of life is changing accordance. Now a dayâ€™s we can place the order for anything from our home. There is no need to go the shop of the things we want. The order can be placed online through Internet.', 'Meet Bhatt', 'Open CMD and type \"python manage.py runserver\" then after open browser and write localhost:8000 in URL.', 'â€œOnline Computers & Accessories Shopâ€ is a web-based project which is made for remote-shopping or shopping through Internet. As the technology is being advanced the way of life is changing accordance. Now a dayâ€™s we can place the order for anything from our home. There is no need to go the shop of the things we want. The order can be placed online through Internet. The payment, the confirmation of purchasing; we can do everything we want. Now we can think that how the days have been changed with time. People had to stand in rows to wait there terms to buy a particular thing from a popular shop. But what is happening now a dayâ€™s; we can extremely surprise that those things can be available on the door-step in few hours.', 'uploads/21-02-2020 07-01-31 AM ', 'project_image/21-02-2020 07-01-31 AM django.png', 'Paid', 2500, 13, '2020-02-21 06:01:31', 13);

-- --------------------------------------------------------

--
-- Table structure for table `pro_review`
--

CREATE TABLE `pro_review` (
  `R_Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Subject` varchar(30) NOT NULL,
  `Message` longtext NOT NULL,
  `Pro_Id` int(10) NOT NULL,
  `U_Id` int(10) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pro_review`
--

INSERT INTO `pro_review` (`R_Id`, `Name`, `Email`, `Subject`, `Message`, `Pro_Id`, `U_Id`, `Date`) VALUES
(1, 'Meet Bhatt', 'meetbhatt777@gmail.com', 'ABC', 'hiddenhiddenhiddenhiddenhidden', 31, 13, '2020-02-20 14:39:10'),
(2, 'NehaMeet Bhatt', 'neha@gmail.com', 'Python', 'Python is very Good Language.\r\nThis is very nice project.\r\n\r\nThank You..', 31, 14, '2020-02-20 14:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `S_Id` int(11) NOT NULL,
  `S_Name` varchar(30) NOT NULL,
  `S_Details` longtext NOT NULL,
  `S_File` blob NOT NULL,
  `Date_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`S_Id`, `S_Name`, `S_Details`, `S_File`, `Date_Time`) VALUES
(2, 'Utorrent', 'Î¼Torrent, or uTorrent is a proprietary adware BitTorrent client owned and developed by BitTorrent, Inc. With over 150 million users it is the most widely used BitTorrent client outside China; globally only behind Xunlei.', 0x736f6674776172652f32382d30312d323032302030352d32382d343320414d2075546f7272656e742e657865, '2020-01-28 04:30:37'),
(3, 'Notepad++', 'Notepad++ is a text editor and source code editor for use with Microsoft Windows. It supports tabbed editing, which allows working with multiple open files in a single window', 0x736f6674776172652f32382d30312d323032302030362d32302d353820414d20, '2020-01-28 05:20:58'),
(4, '7 Sticky Notes', '7 Sticky Notes is a cool 100% free desktop notes software that creates Sticky Notes directly\r\nat the Desktop of your computer to help you organizing your everyday tasks and to-do lists. It has a\r\ngreat-looking realistic sticky note appearance for ultimate fun usage and great interaction, and also offers\r\namazing and cool features, which makes 7 Sticky Notes at the same time powerful, simple to use, reliable, and light!', 0x736f6674776172652f32382d30312d323032302030362d33362d313220414d20536574757037537469636b794e6f7465737631392e657865, '2020-01-28 05:36:12'),
(5, 'Xampp-windows-x64', 'XAMPP is a free and open-source cross-platform web server solution stack package developed by Apache Friends, consisting mainly of the Apache HTTP Server, MariaDB database, and interpreters for scripts written in the PHP and Perl programming languages.', 0x736f6674776172652f32392d30312d323032302030362d32362d353320414d2078616d70702d77696e646f77732d7836342d372e332e392d302d564331352d696e7374616c6c65722e657865, '2020-01-29 05:26:53'),
(6, 'Sublime Text 3', 'Sublime Text 3 is the current version of Sublime Text. For bleeding-edge releases, see the dev builds. Version: Build 3211. OS X (10.7 or later is required) Linux repos - also available as a 64 bit or 32 bit', 0x736f6674776172652f32392d30312d323032302030362d34302d353220414d205375626c696d652054657874204275696c642033323131207836342e726172, '2020-01-29 05:40:52'),
(7, 'GoogleChrome', 'Google Chrome is a cross-platform web browser developed by Google. It was first released in 2008 for Microsoft Windows, and was later ported to Linux, macOS, iOS, and Android. The browser is also the main component of Chrome OS, where it serves as the platform for web apps.', 0x736f6674776172652f32392d30312d323032302030362d35352d343920414d204368726f6d6553657475702e657865, '2020-01-29 05:55:49'),
(8, 'Microsoft Office 2016 HOME', 'Microsoft Office 2016 is a version of the Microsoft Office productivity suite, succeeding both Office 2013 and Office for Mac 2011, and preceding Office 2019 for both platforms. It was released on macOS on July 9, 2015 and on Microsoft Windows on September 22, 2015 for Office 365 subscribers.', 0x736f6674776172652f32392d30312d323032302030362d35372d303620414d206d6963726f736f66745f6f66666963655f323031365f6f66666963655f323031365f686f6d655f616e645f73747564656e745f736f667466616d6f75735f646f776e6c6f61645f6d616e61676572383534345f313639303237393132372e657865, '2020-01-29 05:57:06'),
(9, 'VLC 3.0.7.1', 'VLC media player is a free and open-source portable cross-platform media player software and streaming media server developed by the VideoLAN project. VLC is available for desktop operating systems and mobile platforms, such as Android, iOS, iPadOS, Tizen, Windows 10 Mobile and Windows Phone.', 0x736f6674776172652f32392d30312d323032302030362d35382d303020414d20766c632d332e302e372e312d77696e36342e657865, '2020-01-29 05:58:00'),
(10, 'Python 3.7.4-amd64-webinstall', 'Python is an easy to learn, powerful programming language. It has efficient high-level data structures and a simple but effective approach to object-oriented programming. Pythonâ€™s elegant syntax and dynamic typing, together with its interpreted nature, make it an ideal language for scripting and rapid application development in many areas on most platforms.', 0x736f6674776172652f32392d30312d323032302030362d35392d353120414d20707974686f6e2d332e372e342d616d6436342d776562696e7374616c6c2e657865, '2020-01-29 05:59:51'),
(11, 'WinRAR', 'WinRAR is a 32-bit Windows version of RAR Archiver. It can backup your data and reduce the size of email attachments, decompress RAR, ZIP and other files downloaded from Internet and create new archives in RAR and ZIP file format.', 0x736f6674776172652f32392d30312d323032302030372d30312d343620414d20777261723537312e657865, '2020-01-29 06:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `S_Id` int(11) NOT NULL,
  `S_Email` varchar(40) NOT NULL,
  `S_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`S_Id`, `S_Email`, `S_Date`) VALUES
(1, 'meetbhatt777@gmail.com', '2020-01-20 09:58:57'),
(5, 'meet.bhatt15622@marwadieducation.edu.in', '2020-01-20 10:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `Gender` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Pincode` int(6) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`Id`, `UserName`, `Gender`, `Email`, `Password`, `Mobile`, `Address`, `Pincode`, `City`, `State`, `Date`) VALUES
(5, 'Mohit', 'Male', 'mohit@gmail.com', '123', '1234567890', 'Rajkot', 360001, 'Rajkot', 'Gujarat', '2020-01-21 05:03:28'),
(13, 'Meet Bhatt', 'Male', 'meetbhatt777@gmail.com', '123456', '7801802437', '\"ANAND\" 57 Municipal Staff Society B/H Kishanpara Raiya Road, Rajkot', 360001, 'Rajkot', 'Gujarat', '2020-02-19 04:37:27'),
(14, 'NehaMeet Bhatt', 'Female', 'neha@gmail.com', '123456', '9662243689', '\"ANAND\" 57 Municipal Staff Society B/H Kishanpara Raiya Road Rajkot', 360001, 'Rajkot', 'Gujarat', '2020-02-20 14:50:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`B_Id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Cat_Id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`Cont_Id`);

--
-- Indexes for table `project_detail`
--
ALTER TABLE `project_detail`
  ADD PRIMARY KEY (`Pro_Id`),
  ADD KEY `Cat_Id` (`Cat_Id`);

--
-- Indexes for table `pro_review`
--
ALTER TABLE `pro_review`
  ADD PRIMARY KEY (`R_Id`),
  ADD KEY `Pro_Id` (`Pro_Id`),
  ADD KEY `U_Id` (`U_Id`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`S_Id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`S_Id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `B_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Cat_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `Cont_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `project_detail`
--
ALTER TABLE `project_detail`
  MODIFY `Pro_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pro_review`
--
ALTER TABLE `pro_review`
  MODIFY `R_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `S_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `S_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pro_review`
--
ALTER TABLE `pro_review`
  ADD CONSTRAINT `Pro_Id` FOREIGN KEY (`Pro_Id`) REFERENCES `project_detail` (`Pro_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `U_Id` FOREIGN KEY (`U_Id`) REFERENCES `user_master` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
