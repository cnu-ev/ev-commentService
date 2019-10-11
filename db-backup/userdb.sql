-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 19-08-23 18:32
-- 서버 버전: 10.3.16-MariaDB
-- PHP 버전: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `userdb`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `usersinfotbl`
--

CREATE TABLE `usersinfotbl` (
  `ID` varchar(20) NOT NULL,
  `PW` varchar(20) NOT NULL,
  `Address` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `PhoneNumber` varchar(13) CHARACTER SET utf8 DEFAULT NULL,
  `ProfileImageFileName` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `Gender` tinytext DEFAULT NULL,
  `Name` tinytext DEFAULT NULL,
  `SignUpDate` date NOT NULL,
  `Email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `usersinfotbl`
--

INSERT INTO `usersinfotbl` (`ID`, `PW`, `Address`, `PhoneNumber`, `ProfileImageFileName`, `Gender`, `Name`, `SignUpDate`, `Email`) VALUES
('ad2212', '1234', '', '', '', '', ' ', '2019-07-31', ''),
('ddwefw2134', '1234', '', '', 'ddwefw2134.jpg', 'man', ' ', '2019-08-12', ''),
('gravityc', '1234', '', '', 'gravityc.png', 'man', ' ', '2019-07-06', ''),
('jopebot', '1234', '', '', '', '', ' ', '2019-07-03', ''),
('jopebot1', '1234', '', '', '', '', ' ', '2019-07-31', ''),
('jopebot22', '1234', '', '', 'jopebot22.jpg', '', ' ', '2019-08-04', ''),
('jopebotdb', '1234', '', '', 'jopebotdb.jpg', '', ' ', '2019-08-04', ''),
('jopemachine', '1234', '', '', 'jopemachine.jpg', 'man', 'ê·œë´‰ ì´', '2019-07-06', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `usersurltbl`
--

CREATE TABLE `usersurltbl` (
  `URLTitle` varchar(100) NOT NULL,
  `URL` mediumtext NOT NULL,
  `UserID` varchar(20) CHARACTER SET utf8 NOT NULL,
  `URLID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `usersurltbl`
--

INSERT INTO `usersurltbl` (`URLTitle`, `URL`, `UserID`, `URLID`) VALUES
('Blog', 'https://jopemachine.github.io', 'jopemachine', 'bd4e14da537fb61f5a5b49b35fffe5c6b9b43a741476dead00ce395d10b8aca2'),
('localhost Test', 'http://localhost:4000', 'jopemachine', 'f07d805b534ea80743fd35994d2390828984815ab05be11f2d15d50cfef46214');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `usersinfotbl`
--
ALTER TABLE `usersinfotbl`
  ADD PRIMARY KEY (`ID`);

--
-- 테이블의 인덱스 `usersurltbl`
--
ALTER TABLE `usersurltbl`
  ADD PRIMARY KEY (`URLID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
