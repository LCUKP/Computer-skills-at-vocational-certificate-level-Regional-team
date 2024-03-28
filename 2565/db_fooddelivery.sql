-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 12:57 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fooddelivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `AdID` int(4) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสแอดมิน',
  `Adminname` varchar(50) NOT NULL COMMENT 'ชื่อผู้ใช้ของแอดมิน',
  `Password` varchar(50) NOT NULL COMMENT 'รหัสผ่านของแอดมิน',
  `Adfname` varchar(255) NOT NULL COMMENT 'ชื่อจริงแอดมิน',
  `Adlname` varchar(255) NOT NULL COMMENT 'นามสกุลแอดมิน',
  `Adimage` varchar(255) DEFAULT NULL COMMENT 'รูปภาพของแอดมิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`AdID`, `Adminname`, `Password`, `Adfname`, `Adlname`, `Adimage`) VALUES
(0001, 'AdminLuck', '69113435', 'Puwanas', 'Chaichitvhaem', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_food`
--

CREATE TABLE `tb_food` (
  `FoodID` int(7) UNSIGNED ZEROFILL NOT NULL,
  `fdName` varchar(255) NOT NULL,
  `fdPrice` int(7) NOT NULL,
  `fdDiscount` int(7) DEFAULT NULL,
  `fdDetails` varchar(255) DEFAULT NULL,
  `Res_name` varchar(255) NOT NULL,
  `SelID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `fdImage` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_food`
--

INSERT INTO `tb_food` (`FoodID`, `fdName`, `fdPrice`, `fdDiscount`, `fdDetails`, `Res_name`, `SelID`, `fdImage`) VALUES
(0000008, 'ข้าวผัดกระเพรา', 50, 0, '', '', 00002, 'ภาพ_2022-12-11_175155579.png'),
(0000010, 'มาม่าผัดพริกเกลือใส่หมู', 300, 0, 'มีฮาลาน', '', 00005, 'ภาพ_2022-12-11_164500305.png'),
(0000011, 'ข้าวขาหมา', 60, 0, '', 'คลองหอยโข่ง', 00006, 'ภาพ_2022-11-27_234304907.png'),
(0000012, 'ข้าวมันไก่', 50, NULL, '', 'คลองหอยโข่ง', 00006, 'ภาพ_2022-11-28_000028577.png'),
(0000013, 'ข้าวหมูทอด', 50, NULL, '', 'ข้าวมันไก่พี่ตา', 00007, 'ภาพ_2022-12-04_190030496.png'),
(0000014, 'ข้าวต้มกุ้ง', 20, NULL, '', 'ข้าวมันไก่พี่ตา', 00007, 'ภาพ_2022-12-04_191606404.png'),
(0000015, 'หมูทอด', 80, NULL, '', '', 00003, 'ภาพ_2022-12-11_164739846.png'),
(0000016, 'ต้มยำจุ้ง', 50, 0, '', '', 00004, 'ภาพ_2022-12-11_175014976.png'),
(0000017, 'ข้าวหมูทอด', 50, 0, '', '', 00004, 'ภาพ_2022-12-11_174822224.png'),
(0000018, 'ข้าวหมูทอด', 30, 0, 'แดกทีหีหมาระเบิด', '', 00006, 'ภาพ_2022-12-16_220940074.png'),
(0000019, 'ข้าวมันไก่', 300, NULL, 'มีฮาลาน', '', 00002, 'Katui.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_restype`
--

CREATE TABLE `tb_restype` (
  `SelTypyID` int(3) NOT NULL,
  `Seltypename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rider`
--

CREATE TABLE `tb_rider` (
  `RiderID` int(5) UNSIGNED ZEROFILL NOT NULL COMMENT 'ไอดีของผู้ส่งอาหาร',
  `Ridername` varchar(50) NOT NULL COMMENT 'ชื่อลงทะเบียนของผู้ส่ง',
  `Password` varchar(50) NOT NULL COMMENT 'รหัสของผู้ส่งอาหาร',
  `Ridfname` varchar(255) NOT NULL COMMENT 'ชื่อของผู้ส่งอาหาร',
  `Ridlname` varchar(255) NOT NULL COMMENT 'นามสกุลผู้ส่งอาหาร',
  `Ridphone` varchar(15) NOT NULL COMMENT 'เบอร์ของผู้ส่งอาหาร',
  `Ridimage` varchar(50) DEFAULT NULL COMMENT 'รูปของผู้ส่งอาหาร',
  `verify` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rider`
--

INSERT INTO `tb_rider` (`RiderID`, `Ridername`, `Password`, `Ridfname`, `Ridlname`, `Ridphone`, `Ridimage`, `verify`) VALUES
(00001, 'Jumbo', '12345', 'Assnee', 'Kee', '0654321987', NULL, 'Y'),
(00003, 'FIfa', '1234', 'FI', 'FA', '0852147963', '073_TempageH2.png', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_seller`
--

CREATE TABLE `tb_seller` (
  `SelID` int(5) UNSIGNED ZEROFILL NOT NULL COMMENT 'ไอดีร้านอาหาร',
  `Sellername` varchar(50) NOT NULL COMMENT 'ชื่อลงทะเบียนของร้านอาหาร',
  `Password` varchar(50) NOT NULL COMMENT 'รหัสของร้าน',
  `Res_name` varchar(255) NOT NULL COMMENT 'ชื่อร้านอาหาร',
  `Seladdress` varchar(255) NOT NULL COMMENT 'ที่อยู่ร้านอาหาร',
  `Selphone` varchar(15) NOT NULL COMMENT 'เบอร์ร้านอาหาร',
  `Selimage` varchar(50) DEFAULT NULL COMMENT 'รูปร้านอาหาร',
  `verify` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_seller`
--

INSERT INTO `tb_seller` (`SelID`, `Sellername`, `Password`, `Res_name`, `Seladdress`, `Selphone`, `Selimage`, `verify`) VALUES
(00002, 'Hajibang', '12345', 'ฮาจิบัง', 'central HDY', '073216549', 'album_2022-12-11_03-37-39.gif', 'Y'),
(00003, 'Test1', '12345', 'Test1', 'wasd', '1236547890', 'album_2022-12-11_03-37-02.gif', 'Y'),
(00004, 'Test2', '1234', 'Test2', 'wasd', '1236547890', 'album_2022-12-11_03-39-25.gif', 'Y'),
(00005, 'NANZUY', '1234', 'KuTo', '141/33333333333', '06595626799', 'album_2022-12-11_03-38-17.gif', 'Y'),
(00006, 'KHK', '1234', 'คลองหอยโข่ง', 'สายกลาง 19', '0876543219', 'FjBC11gWAAAW6jm.jfif', 'Y'),
(00007, 'Test3', '1234', 'ข้าวมันไก่พี่ตา', 'HTC', '0852177963', 'large.jfif', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `UserID` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'ไอดีผู้ใช้',
  `Username` varchar(50) NOT NULL COMMENT 'ชื่อลงทะเบียนของผู้ใช้',
  `Password` varchar(50) NOT NULL COMMENT 'รหัสผ่านของผู้ใช้',
  `Userfname` varchar(255) NOT NULL COMMENT 'ชื่อจริงผู้ใช้',
  `Userlname` varchar(255) NOT NULL COMMENT 'นามสกุลผู้ใช้',
  `Useraddress` varchar(255) NOT NULL COMMENT 'ที่อยู่ผู้ใช้',
  `Userphone` varchar(15) NOT NULL COMMENT 'เบอร์โทรของผู้ใช้',
  `Userimage` varchar(50) DEFAULT NULL COMMENT 'รูปของผู้ใช้',
  `verify` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`UserID`, `Username`, `Password`, `Userfname`, `Userlname`, `Useraddress`, `Userphone`, `Userimage`, `verify`) VALUES
(000009, 'Luckr', '12345', 'คุณ', 'ลัค', '122 HDY', '0987654321', 'Week7_1.JPG', 'Y'),
(000010, 'Panuwat555', '12345', 'Panuwat', 'Jaidee', '120 Yala', '0852147963', NULL, 'N'),
(000015, 'Somjai69', '12345', 'สมใจ', 'ใจดี', 'หาดใหญ่ สงขลา', '0898788877', NULL, 'Y'),
(000018, 'Somsak', '1234', 'สมศักดิ์', 'ฮาฮาฮา', 'haven', '1234567890', NULL, 'N'),
(000019, 'Kampol', '1234', 'ครู กัม', 'พล', 'IT HTC', '0123456789', 'นายกัมพล1.png', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`AdID`);

--
-- Indexes for table `tb_food`
--
ALTER TABLE `tb_food`
  ADD PRIMARY KEY (`FoodID`),
  ADD KEY `SelID` (`SelID`);

--
-- Indexes for table `tb_restype`
--
ALTER TABLE `tb_restype`
  ADD PRIMARY KEY (`SelTypyID`);

--
-- Indexes for table `tb_rider`
--
ALTER TABLE `tb_rider`
  ADD PRIMARY KEY (`RiderID`);

--
-- Indexes for table `tb_seller`
--
ALTER TABLE `tb_seller`
  ADD PRIMARY KEY (`SelID`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `AdID` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสแอดมิน', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_food`
--
ALTER TABLE `tb_food`
  MODIFY `FoodID` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_restype`
--
ALTER TABLE `tb_restype`
  MODIFY `SelTypyID` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rider`
--
ALTER TABLE `tb_rider`
  MODIFY `RiderID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ไอดีของผู้ส่งอาหาร', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_seller`
--
ALTER TABLE `tb_seller`
  MODIFY `SelID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ไอดีร้านอาหาร', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `UserID` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ไอดีผู้ใช้', AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_food`
--
ALTER TABLE `tb_food`
  ADD CONSTRAINT `tb_food_ibfk_1` FOREIGN KEY (`SelID`) REFERENCES `tb_seller` (`SelID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
