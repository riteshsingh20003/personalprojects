-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 12:29 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2022-02-24 14:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `BookingId` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Passengers` int(10) NOT NULL,
  `PassengersDetails` longtext NOT NULL,
  `TotalPrice` int(100) NOT NULL,
  `FromDate` varchar(200) NOT NULL,
  `Comment` mediumtext NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `CancelledBy` varchar(5) NOT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`BookingId`, `PackageId`, `UserEmail`, `Passengers`, `PassengersDetails`, `TotalPrice`, `FromDate`, `Comment`, `RegDate`, `status`, `CancelledBy`, `UpdationDate`) VALUES
(119, 1, 'solankiujash2802@gmail.com', 1, 'Name :- asdasd	Age :- 22	 Gender :- Male,\n', 6999, '2022-03-31', '', '2022-03-15 12:21:06', 2, 'u', '2022-03-15 12:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(111) NOT NULL,
  `EmailId` varchar(111) NOT NULL,
  `MobileNumber` varchar(10) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblenquiry`
--

INSERT INTO `tblenquiry` (`Id`, `FullName`, `EmailId`, `MobileNumber`, `Subject`, `Description`, `PostingDate`, `Status`) VALUES
(3, 'Solanki Ujash Prahladbhai', 'solankiujash2802@gmail.com', '9316003088', 'for my name', 'i like your web', '2022-01-18 12:26:09', 1),
(5, 'Solanki Ujash Prahladbhai', 'solankiujash28024@gmail.com', '9316003088', 'Tourism', 'i want this Job', '2022-01-31 12:58:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblissues`
--

CREATE TABLE `tblissues` (
  `Id` int(11) NOT NULL,
  `UserEmail` varchar(111) NOT NULL,
  `Issue` varchar(111) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminremarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblissues`
--

INSERT INTO `tblissues` (`Id`, `UserEmail`, `Issue`, `Description`, `PostingDate`, `AdminRemark`, `AdminremarkDate`) VALUES
(3, 'ram@gmail.com', 'Cancellation', 'i am not able to cancel my tour can you help me to solve this problem ', '2022-02-01 15:04:31', NULL, NULL),
(4, 'solankiujash2802@gmail.com', 'Refund', 'i need refund boss', '2022-02-28 08:54:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `type` varchar(233) NOT NULL,
  `detail` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `type`, `detail`) VALUES
(1, 'footer1', '<div id=\"myhr3\">\r\n  <hr>\r\n</div>\r\n<div id=\"copyright\">\r\n  <h4>Copyright © 2021 Tourism Tours & Travels Pvt. Ltd.</h4>\r\n</div>'),
(2, 'footer', '<footer>\r\n<div class=\"footer\">\r\n  <div id=\"quickLinks\">\r\n    <ul>\r\n      <li><h2>Quick Links</h2></li>\r\n      <li><a href=\"#\">Home</a></li>\r\n      <li><a href=\"http://localhost/ujash/Project/tourism/PhpFile/page.php?type=about\">About Us</a></li>\r\n      <li><a href=\"http://localhost/ujash/Project/tourism/PhpFile/myProject.php#quickLinks\">Contact</a></li>\r\n    </ul>\r\n  </div>\r\n  <div id=\"operationalOffice\">\r\n    <h2>Operational Office</h2>\r\n    <div id=\"office\">\r\n\r\n      <img src=\"https://t4.ftcdn.net/jpg/02/72/89/67/240_F_272896745_tlTivOH81qWIVzz34KqFGm8LO3N9hMYQ.jpg\" alt=\"\">\r\n      <h6>12 DivyaJyoti Complex CGRoad near law garden</h6>\r\n    </div>\r\n  </div>\r\n  <div id=\"registeredOffice\">\r\n    <h2>Registered Office</h2>\r\n    <div id=\"office1\">\r\n      <img src=\"https://t4.ftcdn.net/jpg/02/72/89/67/240_F_272896745_tlTivOH81qWIVzz34KqFGm8LO3N9hMYQ.jpg\" alt=\"\">\r\n      <h6>20 Maruti Complex Near Naranpura Char Rasta Ahmedabad</h6>\r\n    </div>\r\n\r\n  </div>\r\n  <div id=\"reservation\">\r\n    <h2>Make a Reservation</h2>\r\n    <h6>Our Support and Sales team is available 24/7 to answer your query</h6>\r\n       <BUTTON class=\"btn btn-primary\">\r\n\r\n<a href=\"tel:+91-9316003088\" style=\"text-decoration:none;\">\r\nBook Now\r\n</a>\r\n</BUTTON>\r\n  </div>\r\n</div>\r\n</footer>\r\n'),
(3, 'privacy', '										<div class=\"Privacy\">\r\n    <h1> \r\n        Privacy Policy\r\n    </h1>\r\n\r\n<h4>Welcome to Tourism Management System!!! </h4>\r\n<h6>\r\n    <hr>\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis quaerat perspiciatis doloribus optio maxime soluta, consequatur porro quidem veritatis aperiam non nam, officiis autem, eum aspernatur accusantium incidunt alias. Hic qui repellendus sint ducimus voluptatibus commodi unde accusamus, rem omnis nobis repudiandae obcaecati architecto quam nemo, aperiam sapiente. Dicta reprehenderit a eaque! Maxime, odit deleniti ipsa similique voluptas unde aspernatur eos modi, voluptatem officiis dignissimos sed corporis, maiores error! Praesentium, dolor, mollitia perferendis blanditiis inventore a voluptatibus deleniti nulla porro hic dicta similique excepturi sunt reiciendis optio rerum doloribus ipsam fugiat quod unde laudantium dignissimos ullam! Veniam saepe est eligendi sint delectus, ipsam, iure recusandae aliquid molestias nobis optio tempora in laboriosam expedita dolorem, quos sit dicta eum! Obcaecati nobis quisquam officia. Est \r\n<br>\r\n<hr>\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Atque, modi. Voluptatum fuga provident, inventore magni mollitia sunt necessitatibus? Dolore voluptate quas culpa eligendi beatae excepturi ipsam eos dolor alias numquam dicta accusamus doloremque facere, exercitationem incidunt, tempora nam quam? Eveniet nisi obcaecati nostrum ipsum cum iusto ipsa aut consectetur, ea ipsam provident saepe quae, voluptatem labore nobis nam quod inventore! Libero blanditiis quod odit eaque porro numquam incidunt ab neque veritatis quis animi ut et quasi eius expedita saepe minus, quam iendis expedita ad tempore officiis? Perspiciatis ipsa incidunt dolorum iusto deserunt eligendi corporis nihil hic, quas nesciunt officiis, aut repellat fugit. Soluta illo error laboriosam a blanditiis autem nesciunt, corrupti nam non voluptas nihil?\r\n</div>\r\n</h6>\r\n										'),
(4, 'about', '																																																																																																																																		<div class=\"aboutUS\">\r\n    <h1> \r\n        About Us\r\n    </h1>\r\n\r\n<h4>Welcome to Tourism Management System!!! </h4>\r\n<h6>\r\n    <hr>\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis quaerat perspiciatis doloribus optio maxime soluta, consequatur porro quidem veritatis aperiam non nam, officiis autem, eum aspernatur accusantium incidunt alias. Hic qui repellendus sint ducimus voluptatibus commodi unde accusamus, rem omnis nobis repudiandae obcaecati architecto quam nemo, aperiam sapiente. Dicta reprehenderit a eaque! Maxime, odit deleniti ipsa similique voluptas unde aspernatur eos modi, voluptatem officiis dignissimos sed corporis, maiores error! Praesentium, dolor, mollitia perferendis blanditiis inventore a voluptatibus deleniti nulla porro hic dicta similique excepturi sunt reiciendis optio rerum doloribus ipsam fugiat quod unde laudantium dignissimos ullam! Veniam saepe est eligendi sint delectus, ipsam, iure recusandae aliquid molestias nobis optio tempora in laboriosam expedita dolorem, quos sit dicta eum! Obcaecati nobis quisquam officia. Est \r\n<br>\r\n<hr>\r\n<a href=\"https://www.instagram.com/gujarattouristguide/\"><img src=\"https://cdn-icons-png.flaticon.com/512/174/174855.png\" height=\"50\" width=\"50\" style=\"border-radius:10px ; margin-left:43%; margin-top:20px;\"></a>\r\n<a href=\"https://www.facebook.com/search/top?q=gujarat%20tourism\"><img src=\"https://cdn-icons-png.flaticon.com/512/124/124010.png\" height=\"50\" width=\"50\" style=\"border-radius:10px;  margin-left:2%; margin-top:20px;\"></a>\r\n</div>\r\n</h6>\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										'),
(5, 'contact', '										<div id=\"Emergency\">\n  <img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBXbqdCFBzRWH8LAoi4Pvemjq62hSXSlyz-A&usqp=CAU\" alt=\"\">\n  <div class=\"myText\">\n\n    <h4>EMERGENCY CALL 24/7 </h4>\n    <h1>+91-9316003088</h1>\n    <h6>BOOK AN APPOINTMENT TODAY</h6>\n    \n    <BUTTON class=\"btn btn-primary\">\n\n<a href=\"tel:+91-9316003088\">\nBook Now\n</a>\n</BUTTON>\n  </div>\n</div>\n										');

-- --------------------------------------------------------

--
-- Table structure for table `tbltourpackages`
--

CREATE TABLE `tbltourpackages` (
  `PackageId` int(11) NOT NULL,
  `PackageName` varchar(222) NOT NULL,
  `PackageType` varchar(134) NOT NULL,
  `PackageLocation` varchar(111) NOT NULL,
  `PackagePrice` int(11) NOT NULL,
  `Day/Night` varchar(100) NOT NULL,
  `PackageFetures` varchar(233) NOT NULL,
  `PackageDetails` mediumtext NOT NULL,
  `PackageImage` varchar(100) NOT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltourpackages`
--

INSERT INTO `tbltourpackages` (`PackageId`, `PackageName`, `PackageType`, `PackageLocation`, `PackagePrice`, `Day/Night`, `PackageFetures`, `PackageDetails`, `PackageImage`, `Creationdate`, `UpdationDate`) VALUES
(1, 'Char Dham Yatra 2021 Deewali Special', 'Family Package', 'India', 6999, '8/7', 'Round Trip |\nEconomy Class\nTrain | Travel \n|Free Food\n| BreakFast', 'Pick this deewali for Bhagwan Puja', '4.jpg', '2022-01-18 12:44:24', '2022-02-28 08:47:50'),
(2, 'Gujarat & Kutchh Rann', 'Family', 'Gujarat', 10001, '6/5', 'Rann utsavfree foodvolvo busgood hotel stay', 'in this package we will see many  places like kutchh and saurashtra also world heritage city ahmedabad with riverfront', '5.jpg', '2022-01-18 12:47:00', '2022-03-14 16:22:41'),
(3, 'South India', 'Friends', 'Kerala \r\nKarnataka\r\nTamilNadu', 15000, '10/11', 'Free wifi. Free BreakaFast,Free pickup and drop', 'Visit Most Natural beauty with us', '6.jpg', '2022-01-18 12:48:59', '2022-02-28 07:33:17'),
(4, 'Gangtok and Darjeeling Holiday(Without Flight)', 'Family Package', 'Sikkim', 20000, '7/8', 'Free Breakfast,Pick up ,DROp,Wifi', 'ideal tour for family ', '7.jpg', '2022-01-18 12:53:00', '2022-02-28 07:33:26'),
(5, 'Sikkim Delight With Darjeeling', 'Group', 'Sikkim', 2000, '10/11', 'Free Breakfast,free Lauch and Dinner also\r\nfree wifi\r\nfree pickup\r\nfree drop', 'Changdu Lake and New Baba Mandir \r\nView of sunset', 'c2.jpg', '2022-01-18 12:55:51', '2022-02-28 07:33:32'),
(6, 'Mumbai and Nashik', 'Family and group', 'Maharashtra', 10999, '10/9', 'Free Meal | Free Accomdation | Free SightSeeing | Free Imagica', 'in this tour we are seeing many beautiful places of maharashtra like mumbai and nashik shirdi etc. ', 'c3.jpg', '2022-01-28 14:18:02', '2022-02-28 07:33:38'),
(7, 'Kullu and Manali', 'Special Package', 'Uttrakhand', 20000, '10/9', 'Free Meal  | Free Helicopter Ride | Free WIfi | Sleeper AC Coach Bus', 'we will see many natural places of uttrakhand in this season we will enjoy many domestic festivals there', 'c5.jpg', '2022-01-28 14:20:59', '2022-02-28 07:33:45'),
(8, 'Goa', 'Special Package', 'Goa', 20000, '5/6', 'Free Wifi | Free Meal | Free Boating | Free sunset | Hotel ', 'we will see sunset of goa and we will enjoy sunburn festival in goa and  also beach party ', 'c4.jpg', '2022-01-28 14:23:31', '2022-02-28 07:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(111) NOT NULL,
  `MobileNumber` char(10) NOT NULL,
  `EmailId` varchar(89) NOT NULL,
  `Password` varchar(111) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Password`, `RegDate`, `UpdationDate`) VALUES
(41, 'Solanki Ujash Prahladbhai', '9316003088', 'solankiujash2802@gmail.com', '4fecb6912dc9f099e82fcd636903a65e74d8240d', '2022-02-25 10:26:28', '2022-03-18 11:27:54'),
(42, 'Solanki Akash ', '9328741522', 'akash@gmail.com', 'e4cf979cf717fd295f4e4edc427ee1aee78fa7dc', '2022-02-26 14:20:05', '2022-03-18 11:23:45'),
(43, 'Shah Rikesh', '8401405508', 'rikesh@gmail.com', '5bd0abaa8ec21051d0e46953f1e791022c24b0dd', '2022-02-26 14:21:55', NULL),
(44, 'solanki mittal', '7202033465', 'solankimittal311@gmail.com', '4fecb6912dc9f099e82fcd636903a65e74d8240d', '2022-03-15 14:17:36', '2022-03-18 11:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `userreview`
--

CREATE TABLE `userreview` (
  `BookingId` int(11) NOT NULL,
  `PackageName` varchar(255) NOT NULL,
  `EmailId` varchar(255) NOT NULL,
  `Star` int(1) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userreview`
--

INSERT INTO `userreview` (`BookingId`, `PackageName`, `EmailId`, `Star`, `Description`) VALUES
(76, 'Sikkim Delight With Darjeeling', 'solankiujash2802@gmail.com', 4, '12'),
(77, 'Gujarat & Kutchh Rann', 'akash@gmail.com', 4, 'I like this tour so much'),
(78, 'South India', 'rikesh@gmail.com', 1, 'I donot Like this Tour');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`BookingId`),
  ADD KEY `PackageId` (`PackageId`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblissues`
--
ALTER TABLE `tblissues`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  ADD PRIMARY KEY (`PackageId`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EmailId` (`EmailId`);

--
-- Indexes for table `userreview`
--
ALTER TABLE `userreview`
  ADD PRIMARY KEY (`BookingId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblissues`
--
ALTER TABLE `tblissues`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD CONSTRAINT `ID` FOREIGN KEY (`PackageId`) REFERENCES `tbltourpackages` (`PackageId`) ON DELETE CASCADE;

--
-- Constraints for table `userreview`
--
ALTER TABLE `userreview`
  ADD CONSTRAINT `test` FOREIGN KEY (`BookingId`) REFERENCES `tblbooking` (`BookingId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
