-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 07:58 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_webminiproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `บันทึกยืมคืน`
--

CREATE TABLE `บันทึกยืมคืน` (
  `idcard` varchar(17) NOT NULL,
  `idborrow` varchar(10) NOT NULL,
  `isbn` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `บันทึกยืมคืน`
--

INSERT INTO `บันทึกยืมคืน` (`idcard`, `idborrow`, `isbn`) VALUES
('1111111111111', '6509011345', '978-616-491-585-5'),
('1234567891234', '6509071426', '978-616-447-978-4'),
('2222222222222', '6509020133', '978-616-575-613-6'),
('3333333333333', '6509031920', '978-616-464-730-5'),
('4444444444444', '6509040809', '978-616-575-630-3');

-- --------------------------------------------------------

--
-- Table structure for table `ผู้ดูแลระบบ`
--

CREATE TABLE `ผู้ดูแลระบบ` (
  `idadmin` varchar(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `idcard` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ผู้ดูแลระบบ`
--

INSERT INTO `ผู้ดูแลระบบ` (`idadmin`, `name`, `idcard`, `email`) VALUES
('A001', 'กริน นน', '1-1111-11111-', 'krin@gmail.com'),
('A002', 'เบญญาภา ชวเจริญพันธ์', '2-2222-22222-', 'benyapa@gmail.com'),
('A003', 'นิชานันท์ สุขพันธ์', '1-1037-03378-', 'nichanan@gmail.com'),
('A004', 'ปิยวรรณ แปงนุจา', '1-1297-01259-', 'piyawan@gmail.com'),
('A005', 'นก ก้นเหลือง', '9-9999-99999-', 'birdyellow@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ผู้ใช้บริการ`
--

CREATE TABLE `ผู้ใช้บริการ` (
  `idcard` varchar(17) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ผู้ใช้บริการ`
--

INSERT INTO `ผู้ใช้บริการ` (`idcard`, `password`, `name`, `mobile`, `email`) VALUES
('11037033078112', '1', 'เอม', '0958216725', 'martin@gmail.com'),
('1111111111111', '12345', 'กอไก่ รักเอ', '0874123698', 'kailovea@gmail.com'),
('1234567891234', '12346', 'มิลกี้ เอเอเอ', '0963214522', 'milkkyaa@gmail.com'),
('2222222222222', '12347', 'คิมไค เก็บเอ', '0963214451', 'kmkai@gmail.com'),
('3333333333333', '12348', 'เยลลี่ หวังเอ', '0852144785', 'yellyhopea@gmail.com'),
('3660700380506', '12345', 'กำ', '0874123695', 's6304062616188@email.kmutnb.ac.th'),
('4444444444444', '12349', 'มาติน คิดถึงเอ', '0896322166', 'martinmissa@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ประวัติการยืมคืน`
--

CREATE TABLE `ประวัติการยืมคืน` (
  `idborrow` varchar(10) NOT NULL,
  `dateborrow` datetime NOT NULL DEFAULT current_timestamp(),
  `duedate` datetime NOT NULL,
  `idadmin` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ประวัติการยืมคืน`
--

INSERT INTO `ประวัติการยืมคืน` (`idborrow`, `dateborrow`, `duedate`, `idadmin`) VALUES
('6509011345', '2565-09-01 00:00:00', '2565-09-08 00:00:00', 'A001'),
('6509020133', '2565-09-02 00:00:00', '2565-09-09 00:00:00', 'A001'),
('6509031920', '2565-09-03 00:00:00', '2565-09-10 00:00:00', 'A001'),
('6509040809', '2565-09-04 00:00:00', '2565-09-11 00:00:00', 'A001'),
('6509071426', '2565-09-07 00:00:00', '2565-09-14 00:00:00', 'A001');

-- --------------------------------------------------------

--
-- Table structure for table `ยืมคืน`
--

CREATE TABLE `ยืมคืน` (
  `bname` varchar(100) NOT NULL,
  `idcart` varchar(10) NOT NULL,
  `isbn` varchar(17) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `รายละเอียด`
--

CREATE TABLE `รายละเอียด` (
  `isbn` varchar(17) NOT NULL,
  `category` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `รายละเอียด`
--

INSERT INTO `รายละเอียด` (`isbn`, `category`, `genre`) VALUES
('978-616-337-660-2', 'Light Novel', 'แฟนตาซี'),
('978-616-373-536-2', 'Manga', 'แฟนตาซี'),
('978-616-447-978-4', 'Manga', 'แฟนตาซี'),
('978-616-464-730-5', 'Light Novel', 'แฟนตาซี'),
('978-616-491-529-9', 'Manga', 'สายลับสืบสวน'),
('978-616-491-585-5', 'Manga', 'สายลับสืบสวน'),
('978-616-491-876-4', 'Manga', ' แอคชั่น-ผจญภัย'),
('978-616-492-479-6', 'Manga', 'สายลับสืบสวน'),
('978-616-492-559-5', 'Light Novel', 'แฟนตาซี'),
('978-616-492-560-1', 'Manga', 'สายลับสืบสวน'),
('978-616-561-123-7', 'Novel', 'แอคชั่น-ผจญภัย'),
('978-616-574-322-8', 'Novel', 'แฟนตาซี'),
('978-616-574-407-2', 'Manga', 'เลิฟคอมเมดี้'),
('978-616-574-408-9', 'Manga', 'เลิฟคอมเมดี้'),
('978-616-575-263-3', 'Manga', 'แอคชั่น-ผจญภัย'),
('978-616-575-613-6', 'Manga', 'แฟนตาซี'),
('978-616-575-630-3', 'Light Novel', 'แฟนตาซี'),
('978-616-575-732-4', 'Manga', 'เลิฟคอมเมดี้'),
('978-616-589-128-8', 'Manga', 'เลิฟคอมเมดี้'),
('978-616-589-416-6', 'Manga', 'แอคชั่น-ผจญภัย'),
('978-616-592-006-3', 'Manga', 'แอคชั่น-ผจญภัย'),
('978-616-592-231-9', 'Manga', 'สายลับสืบสวน');

-- --------------------------------------------------------

--
-- Table structure for table `หนังสือ`
--

CREATE TABLE `หนังสือ` (
  `bname` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `isbn` varchar(17) NOT NULL,
  `detailbook` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `หนังสือ`
--

INSERT INTO `หนังสือ` (`bname`, `author`, `publisher`, `price`, `isbn`, `detailbook`) VALUES
('AYAKASHI TRIANGLE เรื่องอลวน คน ปีศาจ เล่ม 5 สาวหิมะลึกลับ', 'Kentaro Yabuki', 'สยามอินเตอร์คอมิกส์', 90, '978-616-589-128-8', 'หนังสือเรื่อง \'AYAKASHI TRIANGLE เรื่องอลวน คน ปีศาจ เล่ม 5 สาวหิมะลึกลับ\''),
('One Piece วันพีซ เล่ม 99', 'Eiichiro Oda', 'สยามอินเตอร์คอมิกส์', 70, '978-616-575-613-6', 'หนังสือเรื่อง\'One Piece วันพีซ เล่ม 99\''),
('Re:ZERO รีเซทชีวิต ฝ่าวิกฤติต่างโลก เล่ม 16', 'Tappei Nagatsuki', 'Animag books', 240, '978-616-337-660-2', 'หนังสือเรื่อง\'Re:ZERO รีเซทชีวิต ฝ่าวิกฤติต่างโลก เล่ม 16\''),
('SPY X FAMILY เล่ม 1', 'Endou Tatsuya', 'สยามอินเตอร์คอมิกส์', 80, '978-616-492-479-6', 'หนังสือเรื่อง\'SPY X FAMILY เล่ม 1\''),
('SPY X FAMILY เล่ม 2', 'Endou Tatsuya', 'สยามอินเตอร์คอมิกส์', 80, '978-616-492-559-5', 'หนังสือเรื่อง\'SPY X FAMILY เล่ม 2\''),
('SPY X FAMILY เล่ม 3', 'Endou Tatsuya', 'สยามอินเตอร์คอมิกส์', 80, '978-616-492-560-1', 'หนังสือเรื่อง\'SPY X FAMILY เล่ม 3\''),
('SWORD ART ONLINE เล่ม 21', 'Reki Kawahara', 'ZENSHU', 200, '978-616-561-123-7', 'หนังสือเรื่อง\'SWORD ART ONLINE เล่ม 21\''),
('ขอต้อนรับสู่ห้องเรียนนิยม (เฉพาะ) ยอดคน ปี 2 เล่ม 3', 'Kinugasa Syougo', 'PHOENIX', 315, '978-616-464-730-5', 'หนังสือเรื่อง\'ขอต้อนรับสู่ห้องเรียนนิยม (เฉพาะ) ยอดคน ปี 2 เล่ม 3\''),
('คุณชิกิโมริไม่ได้น่ารักแค่อย่างเดียวนะ 8', 'Keigo Maki', 'Luckpim', 80, '978-616-574-407-2', 'หนังสือเรื่อง\'คุณชิกิโมริไม่ได้น่ารักแค่อย่างเดียวนะ 8\''),
('คุณชิกิโมริไม่ได้น่ารักแค่อย่างเดียวนะ 9\r\n', 'Keigo Maki', 'Luckpim', 90, '978-616-574-408-9', 'หนังสือเรื่อง\'คุณชิกิโมริไม่ได้น่ารักแค่อย่างเดียวนะ 9\''),
('ผ่าพิภพไททัน ฉบับ Full Color Edition เล่ม 1', 'Hajime Isayama', 'วิบูลย์กิจ', 350, '978-616-491-876-4', 'หนังสือเรื่อง\'ผ่าพิภพไททัน ฉบับ Full Color Edition เล่ม 1\''),
('ผ่าพิภพไททัน ฉบับ Full Color Edition เล่ม 2', 'Hajime Isayama', 'วิบูลย์กิจ', 350, '978-616-592-006-3', 'หนังสือเรื่อง\'ผ่าพิภพไททัน ฉบับ Full Color Edition เล่ม 2\''),
('มหาเวทย์ผนึกมาร เล่ม 13 อุบัติการณ์ชิบุยะ -สายฟ้ากัมปนาท-', 'Gege Akutami', 'สยามอินเตอร์คอมิกส์', 80, '978-616-575-263-3', 'หนังสือเรื่อง\'มหาเวทย์ผนึกมาร เล่ม 13 อุบัติการณ์ชิบุยะ -สายฟ้ากัมปนาท-\''),
('มหาเวทย์ผนึกมาร เล่ม 19 โคนีโตเกียวเขต 1 -ชายผู้โกรธซึ้ง-', 'Gege Akutami', 'สยามอินเตอร์คอมิกส์', 80, '978-616-589-416-6', 'หนังสือเรื่อง\'มหาเวทย์ผนึกมาร เล่ม 19 โคนีโตเกียวเขต 1 -ชายผู้โกรธซึ้ง-\''),
('ยอดนักสืบจิ๋ว โคนัน เล่ม 101\r\n', 'Gosho Aoyama', 'วิบูลย์กิจ', 90, '978-616-592-231-9', 'หนังสือเรื่อง\'ยอดนักสืบจิ๋ว โคนัน เล่ม 101\''),
('ยอดนักสืบจิ๋ว โคนัน เล่ม 97', 'Gosho Aoyama', 'วิบูลย์กิจ', 90, '978-616-491-529-9', 'หนังสือเรื่อง\'ยอดนักสืบจิ๋ว โคนัน เล่ม 97\''),
('ยอดนักสืบจิ๋ว โคนัน เล่ม 98', 'Gosho Aoyama', 'วิบูลย์กิจ', 90, '978-616-491-585-5', 'หนังสือเรื่อง\'ยอดนักสืบจิ๋ว โคนัน เล่ม 98\''),
('วันพีซ โนเวล ONE PIECE NOVEL HEROINES', 'Eiichiro Oda', 'สยามอินเตอร์คอมิกส์', 210, '978-616-575-630-3', 'หนังสือเรื่อง\'วันพีซ โนเวล ONE PIECE NOVEL HEROINES\''),
('เกิดใหม่ทั้งทีก็เป็นสไลม์ไปซะแล้ว (นิยาย) 15\r\n', 'Fuse', 'Luckpim', 329, '978-616-574-322-8', 'หนังสือเรื่อง\'เกิดใหม่ทั้งทีก็เป็นสไลม์ไปซะแล้ว (นิยาย) 15\''),
('เกิดใหม่ทั้งทีก็เป็นสไลม์ไปซะแล้ว เล่ม 14', 'Fuse', 'Luckpim', 90, '978-616-447-978-4', 'หนังสือเรื่อง\'เกิดใหม่ทั้งทีก็เป็นสไลม์ไปซะแล้ว เล่ม 14\''),
('เกิดใหม่ทั้งทีก็เป็นสไลม์ไปซะแล้ว เล่ม 15', 'Fuse', 'Luckpim', 90, '978-616-373-536-2', 'หนังสือเรื่อง\'เกิดใหม่ทั้งทีก็เป็นสไลม์ไปซะแล้ว เล่ม 15\''),
('เมื่อคุณเกมเมอร์เผลอใจเป็นทาสแมว เล่ม 2', 'Wataru Nadatani', 'สยามอินเตอร์คอมิกส์', 155, '978-616-575-732-4', 'หนังสือเรื่อง\'เมื่อคุณเกมเมอร์เผลอใจเป็นทาสแมว เล่ม 2\'');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `บันทึกยืมคืน`
--
ALTER TABLE `บันทึกยืมคืน`
  ADD PRIMARY KEY (`idcard`),
  ADD UNIQUE KEY `idcard` (`idcard`),
  ADD UNIQUE KEY `idborrow` (`idborrow`),
  ADD KEY `tobook` (`isbn`);

--
-- Indexes for table `ผู้ดูแลระบบ`
--
ALTER TABLE `ผู้ดูแลระบบ`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `ผู้ใช้บริการ`
--
ALTER TABLE `ผู้ใช้บริการ`
  ADD PRIMARY KEY (`idcard`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `idcard` (`idcard`);

--
-- Indexes for table `ประวัติการยืมคืน`
--
ALTER TABLE `ประวัติการยืมคืน`
  ADD PRIMARY KEY (`idborrow`),
  ADD KEY `admin` (`idadmin`);

--
-- Indexes for table `ยืมคืน`
--
ALTER TABLE `ยืมคืน`
  ADD PRIMARY KEY (`idcart`);

--
-- Indexes for table `รายละเอียด`
--
ALTER TABLE `รายละเอียด`
  ADD PRIMARY KEY (`isbn`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `หนังสือ`
--
ALTER TABLE `หนังสือ`
  ADD PRIMARY KEY (`bname`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `บันทึกยืมคืน`
--
ALTER TABLE `บันทึกยืมคืน`
  ADD CONSTRAINT `borrow` FOREIGN KEY (`idborrow`) REFERENCES `ประวัติการยืมคืน` (`idborrow`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idcard` FOREIGN KEY (`idcard`) REFERENCES `ผู้ใช้บริการ` (`idcard`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tobook` FOREIGN KEY (`isbn`) REFERENCES `หนังสือ` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ประวัติการยืมคืน`
--
ALTER TABLE `ประวัติการยืมคืน`
  ADD CONSTRAINT `admin` FOREIGN KEY (`idadmin`) REFERENCES `ผู้ดูแลระบบ` (`idadmin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `toborrow` FOREIGN KEY (`idborrow`) REFERENCES `บันทึกยืมคืน` (`idborrow`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `รายละเอียด`
--
ALTER TABLE `รายละเอียด`
  ADD CONSTRAINT `รายละเอียด` FOREIGN KEY (`isbn`) REFERENCES `หนังสือ` (`isbn`);

--
-- Constraints for table `หนังสือ`
--
ALTER TABLE `หนังสือ`
  ADD CONSTRAINT `หนังสือ` FOREIGN KEY (`isbn`) REFERENCES `รายละเอียด` (`isbn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
